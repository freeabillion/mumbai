<?php
/** no direct access **/
defined('_MECEXEC_') or die();

/**
 * Webnus MEC map skin class.
 * @author Webnus <info@webnus.biz>
 */
class MEC_skin_map extends MEC_skins
{
    /**
     * @var string
     */
    public $skin = 'map';
    
    /**
     * Constructor method
     * @author Webnus <info@webnus.biz>
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Registers skin actions into WordPress
     * @author Webnus <info@webnus.biz>
     */
    public function actions()
    {
        $this->factory->action('wp_ajax_mec_map_get_markers', array($this, 'get_markers'));
        $this->factory->action('wp_ajax_nopriv_mec_map_get_markers', array($this, 'get_markers'));
    }
    
    /**
     * Initialize the skin
     * @author Webnus <info@webnus.biz>
     * @param array $atts
     */
    public function initialize($atts)
    {
        $this->atts = $atts;
        
        // Skin Options
        $this->skin_options = (isset($this->atts['sk-options']) and isset($this->atts['sk-options'][$this->skin])) ? $this->atts['sk-options'][$this->skin] : array();
        
        // Search Form Options
        $this->sf_options = (isset($this->atts['sf-options']) and isset($this->atts['sf-options'][$this->skin])) ? $this->atts['sf-options'][$this->skin] : array();
        
        // Search Form Status
        $this->sf_status = isset($this->atts['sf_status']) ? $this->atts['sf_status'] : true;
        
        // Generate an ID for the sking
        $this->id = isset($this->atts['id']) ? $this->atts['id'] : mt_rand(100, 999);
        
        // Set the ID
        if(!isset($this->atts['id'])) $this->atts['id'] = $this->id;
        
        // HTML class
        $this->html_class = '';
        if(isset($this->atts['html-class']) and trim($this->atts['html-class']) != '') $this->html_class = $this->atts['html-class'];
        
        // From Widget
        $this->widget = (isset($this->atts['widget']) and trim($this->atts['widget'])) ? true : false;
        
        // Init MEC
        $this->args['mec-skin'] = $this->skin;
        
        // Post Type
        $this->args['post_type'] = $this->main->get_main_post_type();
        
        // Keyword Query
        $this->args['s'] = $this->keyword_query();
        
        // Taxonomy
        $this->args['tax_query'] = $this->tax_query();
        
        // Meta
        $this->args['meta_query'] = $this->meta_query();
        
        // Tag
        $this->args['tag'] = $this->tag_query();
        
        // Author
        $this->args['author'] = $this->author_query();
        
        // Pagination Options
        $this->paged = get_query_var('paged', 1);
        $this->limit = (isset($this->skin_options['limit']) and trim($this->skin_options['limit'])) ? $this->skin_options['limit'] : 200;
        
        $this->args['posts_per_page'] = $this->limit;
        $this->args['paged'] = $this->paged;
        
        // Sort Options
        $this->args['orderby'] = 'meta_value';
        $this->args['order'] = 'ASC';
        $this->args['meta_key'] = 'mec_start_day_seconds';
        
        // Show Past Events
        $this->args['mec-past-events'] = isset($this->atts['show_past_events']) ? $this->atts['show_past_events'] : '0';
        
        // Start Date
        $this->start_date = $this->get_start_date();
    }
    
    /**
     * Returns start day of skin for filtering events
     * @author Webnus <info@webnus.biz>
     * @return array
     */
    public function get_start_date()
    {
        // Default date
        $date = date('Y-m-d');
        
        if(isset($this->skin_options['start_date_type']) and $this->skin_options['start_date_type'] == 'today') $date = date('Y-m-d');
        elseif(isset($this->skin_options['start_date_type']) and $this->skin_options['start_date_type'] == 'tomorrow') $date = date('Y-m-d', strtotime('Tomorrow'));
        elseif(isset($this->skin_options['start_date_type']) and $this->skin_options['start_date_type'] == 'start_current_month') $date = date('Y-m-d', strtotime('first day of this month'));
        elseif(isset($this->skin_options['start_date_type']) and $this->skin_options['start_date_type'] == 'start_next_month') $date = date('Y-m-d', strtotime('first day of next month'));
        elseif(isset($this->skin_options['start_date_type']) and $this->skin_options['start_date_type'] == 'date') $date = date('Y-m-d', strtotime($this->skin_options['start_date']));
        
        // Hide past events
        if(isset($this->atts['show_past_events']) and !trim($this->atts['show_past_events']))
        {
            $today = date('Y-m-d');
            if(strtotime($date) < strtotime($today)) $date = $today;
        }
        
        return $date;
    }
    
    /**
     * Search and returns the filtered events
     * @author Webnus <info@webnus.biz>
     * @return list of objects
     */
    public function search()
    {
        $events = array();
        
        // The Query
        $query = new WP_Query($this->args);
        
        if($query->have_posts())
        {
            // The Loop
            while($query->have_posts())
            {
                $query->the_post();

                $event_id = get_the_ID();
                $rendered = $this->render->data($event_id);

                $data = new stdClass();
                $data->ID = $event_id;
                $data->data = $rendered;
                $data->dates = $this->render->dates($event_id, $rendered, 6);
                $data->date = isset($data->dates[0]) ? $data->dates[0] : array();
                
                // Proceed to next event is it's expired
                if((isset($this->atts['show_past_events']) and !$this->atts['show_past_events']) and strtotime($data->date['start']['date']) < strtotime($this->start_date)) continue;
                
                $events[$event_id] = $data;
            }
        }
        
        // Restore original Post Data
        wp_reset_postdata();
        
        return $events;
    }
    
    /**
     * Get markers for AJAX requert
     * @author Webnus <info@webnus.biz>
     * @return void
     */
    public function get_markers()
    {
        $this->sf = $this->request->getVar('sf', array());
        $apply_sf_date = $this->request->getVar('apply_sf_date', 1);
        $atts = $this->sf_apply($this->request->getVar('atts', array()), $this->sf, $apply_sf_date);
        
        // Initialize the skin
        $this->initialize($atts);
        
        // Return the events
        $this->atts['return_items'] = true;
        
        // Fetch the events
        $this->fetch();
        
        // Return the output
        $output = $this->output();
        
        echo json_encode($output);
        exit;
    }
}