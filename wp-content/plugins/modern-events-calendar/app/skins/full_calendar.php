<?php
/** no direct access **/
defined('_MECEXEC_') or die();

/**
 * Webnus MEC Full Calendar class.
 * @author Webnus <info@webnus.biz>
 */
class MEC_skin_full_calendar extends MEC_skins
{
    /**
     * @var string
     */
    public $skin = 'full_calendar';
    
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
        $this->factory->action('wp_ajax_mec_full_calendar_switch_skin', array($this, 'switch_skin'));
        $this->factory->action('wp_ajax_nopriv_mec_full_calendar_switch_skin', array($this, 'switch_skin'));
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
        
        // Start Date
        $this->start_date = $this->get_start_date();
        
        // Generate an ID for the skin
        $this->id = isset($this->atts['id']) ? $this->atts['id'] : mt_rand(100, 999);
        
        // Default View of Full Calendar
        $this->default_view = isset($this->skin_options['default_view']) ? $this->skin_options['default_view'] : 'list';
        if(isset($this->skin_options[$this->default_view]) and !$this->skin_options[$this->default_view]) $this->default_view = 'list';
        
        $this->monthly = isset($this->skin_options['monthly']) ? $this->skin_options['monthly'] : true;
        $this->weekly = isset($this->skin_options['weekly']) ? $this->skin_options['weekly'] : true;
        $this->daily = isset($this->skin_options['daily']) ? $this->skin_options['daily'] : true;
        $this->list = isset($this->skin_options['list']) ? $this->skin_options['list'] : true;
        
        // If all of skins are disabled
        if(!$this->monthly and !$this->weekly and !$this->daily and !$this->list)
        {
            $this->monthly = true;
            $this->list = true;
        }
        
        // Set the ID
        if(!isset($this->atts['id'])) $this->atts['id'] = $this->id;
    }
    
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
    
    public function search()
    {
    }
    
    public function load_skin($skin = 'list')
    {
        // Skin Output
        $output = '';
        
        switch($skin)
        {
            case 'monthly':
                
                $atts = $this->atts;
                $atts['sk-options']['monthly_view']['start_date_type'] = isset($this->skin_options['start_date_type']) ? $this->skin_options['start_date_type'] : '';
                $atts['sk-options']['monthly_view']['start_date'] = isset($this->skin_options['start_date']) ? $this->skin_options['start_date'] : '';
                $atts['sk-options']['monthly_view']['style'] = 'clean';
                $atts['sf_status'] = false;
                
                $output = $this->render->vmonth($atts);
                
                break;
            
            case 'weekly':
                
                $atts = $this->atts;
                $atts['sk-options']['weekly_view']['start_date_type'] = isset($this->skin_options['start_date_type']) ? $this->skin_options['start_date_type'] : '';
                $atts['sk-options']['weekly_view']['start_date'] = isset($this->skin_options['start_date']) ? $this->skin_options['start_date'] : '';
                $atts['sf_status'] = false;
                
                $output = $this->render->vweek($atts);
                
                break;
            
            case 'daily':
                
                $atts = $this->atts;
                $atts['sk-options']['daily_view']['start_date_type'] = isset($this->skin_options['start_date_type']) ? $this->skin_options['start_date_type'] : '';
                $atts['sk-options']['daily_view']['start_date'] = isset($this->skin_options['start_date']) ? $this->skin_options['start_date'] : '';
                $atts['sf_status'] = false;
                
                $output = $this->render->vday($atts);
                
                break;
            
            case 'list':
            default:
                
                $atts = $this->atts;
                $atts['sk-options']['list']['start_date_type'] = isset($this->skin_options['start_date_type']) ? $this->skin_options['start_date_type'] : '';
                $atts['sk-options']['list']['start_date'] = isset($this->skin_options['start_date']) ? $this->skin_options['start_date'] : '';
                $atts['sk-options']['list']['style'] = 'standard';
                $atts['sf_status'] = false;
                
                $output = $this->render->vlist($atts);
                
                break;
        }
        
        return $output;
    }
    
    /**
     * Load skin for AJAX requert
     * @author Webnus <info@webnus.biz>
     * @return void
     */
    public function switch_skin()
    {
        $this->sf = $this->request->getVar('sf', array());
        $apply_sf_date = $this->request->getVar('apply_sf_date', 1);
        $atts = $this->sf_apply($this->request->getVar('atts', array()), $this->sf, $apply_sf_date);
        
        $skin = $this->request->getVar('skin', 'list');
        
        // Append JS codes
        $atts['append_js_codes'] = true;
        
        // Initialize the skin
        $this->initialize($atts);
        
        // Return the output
        $output = $this->load_skin($skin);
        
        echo json_encode($output);
        exit;
    }
}