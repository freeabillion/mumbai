<?php
/** no direct access **/
defined('_MECEXEC_') or die();

/**
 * Webnus MEC books class.
 * @author Webnus <info@webnus.biz>
 */
class MEC_feature_books extends MEC_base
{
    /**
     * Constructor method
     * @author Webnus <info@webnus.biz>
     */
    public function __construct()
    {
        // Import MEC Factory
        $this->factory = $this->getFactory();
        
        // Import MEC Main
        $this->main = $this->getMain();
        
        // Import MEC DB
        $this->db = $this->getDB();
        
        // Import MEC Book
        $this->book = $this->getBook();
        
        // MEC Book Post Type Name
        $this->PT = $this->main->get_book_post_type();
        
        // MEC Settings
        $this->settings = $this->main->get_settings();
    }
    
    /**
     * Initialize books feature
     * @author Webnus <info@webnus.biz>
     */
    public function init()
    {
        // Show booking feature only if booking module is enabled
        if(!isset($this->settings['booking_status']) or (isset($this->settings['booking_status']) and !$this->settings['booking_status'])) return false;
        
        $this->factory->action('init', array($this, 'register_post_type'));
        $this->factory->action('add_meta_boxes_'.$this->PT, array($this, 'remove_taxonomies_metaboxes'));
        $this->factory->action('save_post', array($this, 'save_book'), 10);
        $this->factory->action('add_meta_boxes', array($this, 'register_meta_boxes'), 1);
        $this->factory->action('restrict_manage_posts', array($this, 'add_filters'));

        // Details Meta Box
        $this->factory->action('mec_book_metabox_details', array($this, 'meta_box_nonce'), 10);
        $this->factory->action('mec_book_metabox_details', array($this, 'meta_box_booking'), 10);
        
        // Status Meta Box
        $this->factory->action('mec_book_metabox_status', array($this, 'meta_box_status_form'), 10);

        $this->factory->action('pre_get_posts', array($this, 'filter_query'));
        $this->factory->filter('manage_'.$this->PT.'_posts_columns', array($this, 'filter_columns'));
        $this->factory->filter('manage_edit-'.$this->PT.'_sortable_columns', array($this, 'filter_sortable_columns'));
        $this->factory->action('manage_'.$this->PT.'_posts_custom_column', array($this, 'filter_columns_content'), 10, 2);

        // Bulk Actions
        $this->factory->action('admin_footer-edit.php', array($this, 'add_bulk_actions'));
        $this->factory->action('load-edit.php', array($this, 'do_bulk_actions'));

        // Book Event form
        $this->factory->action('wp_ajax_mec_book_form', array($this, 'book'));
        $this->factory->action('wp_ajax_nopriv_mec_book_form', array($this, 'book'));

        // Tickets Availability
        $this->factory->action('wp_ajax_mec_tickets_availability', array($this, 'tickets_availability'));
        $this->factory->action('wp_ajax_nopriv_mec_tickets_availability', array($this, 'tickets_availability'));
    }
    
    /**
     * Registers books post type and assign it to some taxonomies
     * @author Webnus <info@webnus.biz>
     */
    public function register_post_type()
    {
        register_post_type($this->PT,
            array(
                'labels'=>array
                (
                    'name'=>__('Bookings', 'mec'),
                    'singular_name'=>__('Booking', 'mec'),
                    'add_new'=>__('Add Booking', 'mec'),
                    'add_new_item'=>__('Add Booking', 'mec'),
                    'not_found'=>__('No bookings found!', 'mec'),
                    'all_items'=>__('Bookings', 'mec'),
                    'edit_item'=>__('Edit Bookings', 'mec'),
                    'not_found_in_trash'=>__('No bookings found in Trash!', 'mec')
                ),
                'public'=>false,
                'show_ui'=>(current_user_can('edit_others_posts') ? true : false),
                'show_in_menu'=>true,
                'show_in_admin_bar'=>false,
                'has_archive'=>false,
                'exclude_from_search'=>true,
                'publicly_queryable'=>false,
                'menu_icon'=>'dashicons-book',
                'menu_position'=>28,
                'supports'=>array('title', 'author'),
                'capabilities'=>array
                (
                    'read_post'=>'edit_dashboard',
                    'create_posts'=>false
                ),
                'map_meta_cap'=>true
            )
        );
    }
    
    /**
     * Remove normal meta boxes for some taxonomies
     * @author Webnus <info@webnus.biz>
     */
    public function remove_taxonomies_metaboxes()
    {
        remove_meta_box('tagsdiv-mec_coupon', $this->PT, 'side');
    }
    
    /**
     * Registers 2 meta boxes for book data
     * @author Webnus <info@webnus.biz>
     */
    public function register_meta_boxes()
    {
        add_meta_box('mec_book_metabox_details', __('Book Details', 'mec'), array($this, 'meta_box_details'), $this->PT, 'normal', 'high');
        add_meta_box('mec_book_metabox_status', __('Book Status', 'mec'), array($this, 'meta_box_status'), $this->PT, 'side', 'default');
    }
    
    /**
     * Show content of status meta box
     * @author Webnus <info@webnus.biz>
     * @param object $post
     */
    public function meta_box_status($post)
    {
        do_action('mec_book_metabox_status', $post);
    }
    
    /**
     * Show confirmation form
     * @author Webnus <info@webnus.biz>
     */
    public function meta_box_status_form($post)
    {
        $confirmed = get_post_meta($post->ID, 'mec_confirmed', true);
        $verified = get_post_meta($post->ID, 'mec_verified', true);
    ?>
        <div class="mec-book-status-form">
            <div class="mec-row">
                <label for="mec_book_confirmation"><?php _e('Confirmation', 'mec'); ?></label>
                <select id="mec_book_confirmation" name="confirmation">
                    <option value="0"><?php _e('Pending', 'mec'); ?></option>
                    <option value="1" <?php echo ($confirmed == '1' ? 'selected="selected"' : ''); ?>><?php _e('Confirmed', 'mec'); ?></option>
                    <option value="-1" <?php echo ($confirmed == '-1' ? 'selected="selected"' : ''); ?>><?php _e('Rejected', 'mec'); ?></option>
                </select>
            </div>
            <div class="mec-row">
                <label for="mec_book_verification"><?php _e('Verification', 'mec'); ?></label>
                <select id="mec_book_verification" name="verification">
                    <option value="0"><?php _e('Waiting', 'mec'); ?></option>
                    <option value="1" <?php echo ($verified == '1' ? 'selected="selected"' : ''); ?>><?php _e('Verified', 'mec'); ?></option>
                    <option value="-1" <?php echo ($verified == '-1' ? 'selected="selected"' : ''); ?>><?php _e('Canceled', 'mec'); ?></option>
                </select>
            </div>
        </div>
    <?php
    }
    
    /**
     * Show content of details meta box
     * @author Webnus <info@webnus.biz>
     * @param object $post
     */
    public function meta_box_details($post)
    {
        do_action('mec_book_metabox_details', $post);
    }
    
    /**
     * Add a security nonce to the Add/Edit books page
     * @author Webnus <info@webnus.biz>
     */
    public function meta_box_nonce($post)
    {
        // Add a nonce field so we can check for it later.
        wp_nonce_field('mec_book_data', 'mec_book_nonce');
    }
    
    /**
     * Show book details
     * @author Webnus <info@webnus.biz>
     */
    public function meta_box_booking($post)
    {
        $meta = $this->main->get_post_meta($post->ID);
        
        $event_id = (isset($meta['mec_event_id']) and $meta['mec_event_id']) ? $meta['mec_event_id'] : 0;
        $tickets = get_post_meta($event_id, 'mec_tickets', true);
        
        $ticket_id = (isset($meta['mec_ticket_id']) and $meta['mec_ticket_id']) ? $meta['mec_ticket_id'] : 0;
        $dates = isset($meta['mec_date']) ? explode(':', $meta['mec_date']) : array();
        
        $attendee = isset($meta['mec_attendee']) ? $meta['mec_attendee'] : array();
        
        $reg_form = isset($attendee['reg']) ? $attendee['reg'] : array();
        $reg_fields = $this->main->get_reg_fields();
    ?>
        <div class="mec-book-details">
            <h3><?php _e('Payment', 'mec'); ?></h3>
            <div class="mec-row">
                <strong><?php _e('Price', 'mec'); ?></strong>
                <span><?php echo $this->main->render_price(($meta['mec_price'] ? $meta['mec_price'] : 0)); ?></span>
            </div>
            <div class="mec-row">
                <strong><?php _e('Gateway', 'mec'); ?></strong>
                <span><?php echo ((isset($meta['mec_gateway_label']) and trim($meta['mec_gateway_label'])) ? __($meta['mec_gateway_label'], 'mec') : __('Unknown', 'mec')); ?></span>
            </div>
            <div class="mec-row">
                <strong><?php _e('Transaction ID', 'mec'); ?></strong>
                <span><?php echo ((isset($meta['mec_transaction_id']) and trim($meta['mec_transaction_id'])) ? __($meta['mec_transaction_id'], 'mec') : __('Unknown', 'mec')); ?></span>
            </div>
            <h3><?php _e('Ticket', 'mec'); ?></h3>
            <div class="mec-row">
                <strong><?php _e('Event', 'mec'); ?></strong>
                <span><?php echo ($event_id ? '<a href="'.get_permalink($event_id).'">'.get_the_title($event_id).'</a>' : __('Unknown', 'mec')); ?></span>
            </div>
            <div class="mec-row">
                <strong><?php _e('Ticket', 'mec'); ?></strong>
                <span><?php echo (isset($tickets[$ticket_id]['name']) ? $tickets[$ticket_id]['name'] : __('Unknown', 'mec')); ?></span>
            </div>
            <div class="mec-row">
                <strong><?php _e('Date', 'mec'); ?></strong>
                <span><?php echo ((isset($dates[0]) and isset($dates[1])) ? sprintf(__('%s to %s', 'mec'), $this->main->render_date($dates[0]), $this->main->render_date($dates[1])) : __('Unknown', 'mec')); ?></span>
            </div>
            <h3><?php _e('Attendee', 'mec'); ?></h3>
            <div class="mec-row">
                <strong><?php _e('Name', 'mec'); ?></strong>
                <span><?php echo ((isset($attendee['name']) and trim($attendee['name'])) ? $attendee['name'] : '---'); ?></span>
            </div>
            <div class="mec-row">
                <strong><?php _e('Email', 'mec'); ?></strong>
                <span><?php echo ((isset($attendee['email']) and trim($attendee['email'])) ? $attendee['email'] : '---'); ?></span>
            </div>
            <?php if(count($reg_form)) echo '<hr />'; ?>
            <?php foreach($reg_form as $field_id=>$value): $label = isset($reg_fields[$field_id]) ? $reg_fields[$field_id]['label'] : ''; ?>
            <div class="mec-row">
                <strong><?php _e($label, 'mec'); ?></strong>
                <span><?php echo (is_string($value) ? $value : (is_array($value) ? implode(', ', $value) : '---')); ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    <?php
    }
    
    /**
     * Filters columns of book feature
     * @author Webnus <info@webnus.biz>
     * @param array $columns
     * @return array
     */
    public function filter_columns($columns)
    {
        unset($columns['date']);
        unset($columns['author']);
        
        $columns['event'] = __('Event', 'mec');
        $columns['price'] = __('Price', 'mec');
        $columns['confirmation'] = __('Confirmation', 'mec');
        $columns['verification'] = __('Verification', 'mec');
        $columns['transaction'] = __('Transaction ID', 'mec');
        $columns['bdate'] = __('Book Date', 'mec');
        $columns['author'] = __('Booker', 'mec');
        
        return $columns;
    }
    
    /**
     * Filters sortable columns of book feature
     * @author Webnus <info@webnus.biz>
     * @param array $columns
     * @return array
     */
    public function filter_sortable_columns($columns)
    {
        $columns['event'] = 'event';
        $columns['price'] = 'price';
        $columns['confirmation'] = 'confirmation';
        $columns['verification'] = 'verification';
        $columns['author'] = 'author';
        $columns['bdate'] = 'date';
        
        return $columns;
    }
    
    /**
     * Filters columns content of book feature
     * @author Webnus <info@webnus.biz>
     * @param string $column_name
     * @param int $post_id
     * @return string
     */
    public function filter_columns_content($column_name, $post_id)
    {
        if($column_name == 'event')
        {
            $event_id = get_post_meta($post_id, 'mec_event_id', true);
            
            $title = get_the_title($event_id);
            $tickets = get_post_meta($event_id, 'mec_tickets', true);
            
            $ticket_id = get_post_meta($post_id, 'mec_ticket_id', true);
            
            echo ($event_id ? '<a href="'.$this->main->add_qs_var('mec_event_id', $event_id).'">'.$title.'</a>' : '');
            echo (isset($tickets[$ticket_id]['name']) ? ' - <a title="'.__('Ticket', 'mec').'" href="'.$this->main->add_qs_vars(array('mec_ticket_id'=>$ticket_id, 'mec_event_id'=>$event_id)).'">'.$tickets[$ticket_id]['name'].'</a>' : '');
        }
        elseif($column_name == 'price')
        {
            $price = get_post_meta($post_id, 'mec_price', true);
            
            echo $this->main->render_price(($price ? $price : 0));
            echo ' '.get_post_meta($post_id, 'mec_gateway_label', true);
        }
        elseif($column_name == 'confirmation')
        {
            $confirmed = get_post_meta($post_id, 'mec_confirmed', true);
            
            echo '<a href="'.$this->main->add_qs_var('mec_confirmed', $confirmed).'">'.$this->get_confirmation_label($confirmed).'</a>';
        }
        elseif($column_name == 'verification')
        {
            $verified = get_post_meta($post_id, 'mec_verified', true);
            
            echo '<a href="'.$this->main->add_qs_var('mec_verified', $verified).'">'.$this->get_verification_label($verified).'</a>';
        }
        elseif($column_name == 'transaction')
        {
            $transaction_id = get_post_meta($post_id, 'mec_transaction_id', true);
            echo '<a href="'.$this->main->add_qs_var('mec_transaction_id', $transaction_id).'">'.$transaction_id.'</a>';
        }
        elseif($column_name == 'bdate')
        {
            echo '<a href="'.$this->main->add_qs_var('m', date('Ymd', get_post_time('U', false, $post_id))).'">'.get_the_date('', $post_id).'</a>';
        }
    }
    
    public function filter_query($query)
    {
        if(!is_admin() or $query->get('post_type') != $this->PT) return;
        
        $orderby = $query->get('orderby');

        if($orderby == 'event')
        {
            $query->set('meta_key', 'mec_event_id');
            $query->set('orderby', 'mec_event_id');
        }
        elseif($orderby == 'booker')
        {
            $query->set('orderby', 'user_id');
        }
        elseif($orderby == 'price')
        {
            $query->set('meta_key', 'mec_price');
            $query->set('orderby', 'mec_price');
        }
        elseif($orderby == 'confirmation')
        {
            $query->set('meta_key', 'mec_confirmed');
            $query->set('orderby', 'mec_confirmed');
        }
        elseif($orderby == 'verification')
        {
            $query->set('meta_key', 'mec_verified');
            $query->set('orderby', 'mec_verified');
        }
        
        // Meta Query
        $meta_query = array();
        
        // Filter by Event ID
        if(isset($_GET['mec_event_id']) and trim($_GET['mec_event_id']))
        {
            $meta_query[] = array(
                'key'=>'mec_event_id',
                'value'=>sanitize_text_field($_GET['mec_event_id']),
                'compare'=>'=',
                'type'=>'numeric'
            );
        }
        
        // Filter by Ticket ID
        if(isset($_GET['mec_ticket_id']) and trim($_GET['mec_ticket_id']))
        {
            $meta_query[] = array(
                'key'=>'mec_ticket_id',
                'value'=>sanitize_text_field($_GET['mec_ticket_id']),
                'compare'=>'=',
                'type'=>'numeric'
            );
        }
        
        // Filter by Transaction ID
        if(isset($_GET['mec_transaction_id']) and trim($_GET['mec_transaction_id']))
        {
            $meta_query[] = array(
                'key'=>'mec_transaction_id',
                'value'=>sanitize_text_field($_GET['mec_transaction_id']),
                'compare'=>'='
            );
        }
        
        // Filter by Confirmation
        if(isset($_GET['mec_confirmed']) and trim($_GET['mec_confirmed']) != '')
        {
            $meta_query[] = array(
                'key'=>'mec_confirmed',
                'value'=>sanitize_text_field($_GET['mec_confirmed']),
                'compare'=>'=',
                'type'=>'numeric'
            );
        }
        
        // Filter by Verification
        if(isset($_GET['mec_verified']) and trim($_GET['mec_verified']) != '')
        {
            $meta_query[] = array(
                'key'=>'mec_verified',
                'value'=>sanitize_text_field($_GET['mec_verified']),
                'compare'=>'=',
                'type'=>'numeric'
            );
        }
        
        if(count($meta_query)) $query->set('meta_query', $meta_query);
    }
    
    public function add_filters($post_type)
    {
        if($post_type != $this->PT) return;
        
        $events = get_posts(array('post_type'=>$this->main->get_main_post_type(), 'post_status'=>'publish', 'posts_per_page'=>-1));
        $mec_event_id = isset($_GET['mec_event_id']) ? $_GET['mec_event_id'] : '';
        
        echo '<select name="mec_event_id">';
        echo '<option value="">'.__('Event', 'mec').'</option>';
        foreach($events as $event) echo '<option value="'.$event->ID.'" '.($mec_event_id == $event->ID ? 'selected="selected"' : '').'>'.$event->post_title.'</option>';
        echo '</select>';
        
        $mec_confirmed = isset($_GET['mec_confirmed']) ? $_GET['mec_confirmed'] : '';
        
        echo '<select name="mec_confirmed">';
        echo '<option value="">'.__('Confirmation', 'mec').'</option>';
        echo '<option value="1" '.($mec_confirmed == '1' ? 'selected="selected"' : '').'>'.__('Confirmed', 'mec').'</option>';
        echo '<option value="0" '.($mec_confirmed == '0' ? 'selected="selected"' : '').'>'.__('Pending', 'mec').'</option>';
        echo '<option value="-1" '.($mec_confirmed == '-1' ? 'selected="selected"' : '').'>'.__('Rejected', 'mec').'</option>';
        echo '</select>';
        
        $mec_verified = isset($_GET['mec_verified']) ? $_GET['mec_verified'] : '';
        
        echo '<select name="mec_verified">';
        echo '<option value="">'.__('Verification', 'mec').'</option>';
        echo '<option value="1" '.($mec_verified == '1' ? 'selected="selected"' : '').'>'.__('Verified', 'mec').'</option>';
        echo '<option value="0" '.($mec_verified == '0' ? 'selected="selected"' : '').'>'.__('Waiting', 'mec').'</option>';
        echo '<option value="-1" '.($mec_verified == '-1' ? 'selected="selected"' : '').'>'.__('Canceled', 'mec').'</option>';
        echo '</select>';
    }
    
    public function add_bulk_actions()
    {
        global $post_type;
 
        if($post_type == $this->PT)
        {
            ?>
            <script type="text/javascript">
            jQuery(document).ready(function()
            {
                <?php foreach(array('pending'=>__('Pending', 'mec'), 'confirm'=>__('Confirm', 'mec'), 'reject'=>__('Reject', 'mec'), 'csv-export'=>__('CSV Export', 'mec'), 'ms-excel-export'=>__('MS Excel Export', 'mec')) as $action=>$label): ?>
                jQuery('<option>').val('<?php echo $action; ?>').text('<?php echo $label; ?>').appendTo("select[name='action']");
                jQuery('<option>').val('<?php echo $action; ?>').text('<?php echo $label; ?>').appendTo("select[name='action2']");
                <?php endforeach; ?>
            });
            </script>
            <?php
        }
    }
    
    public function do_bulk_actions()
    {
        $wp_list_table = _get_list_table('WP_Posts_List_Table');
        
        $action = $wp_list_table->current_action();
        if(!$action) return false;
        
        $post_type = isset($_GET['post_type']) ? $_GET['post_type'] : 'post';
        if($post_type != $this->PT) return false;
        
        check_admin_referer('bulk-posts');
        
        switch($action)
        {
            case 'confirm':
                
                $post_ids = $_GET['post'];
                foreach($post_ids as $post_id) $this->book->confirm($post_id);
                
                break;
            case 'pending':
                
                $post_ids = $_GET['post'];
                foreach($post_ids as $post_id) $this->book->pending($post_id);
                
                break;
            case 'reject':
                
                $post_ids = $_GET['post'];
                foreach($post_ids as $post_id) $this->book->reject($post_id);
                
                break;
            case 'csv-export':
                
                header('Content-Type: text/csv; charset=utf-8');
                header('Content-Disposition: attachment; filename=bookings-'.md5(time().mt_rand(100, 999)).'.csv');

                $post_ids = $_GET['post'];
                
                $reg_fields = $this->main->get_reg_fields();
                $columns = array(__('ID', 'mec'), __('Event', 'mec'), __('Date', 'mec'), __('Ticket', 'mec'), __('Name', 'mec'), __('Email', 'mec'), __('Tel', 'mec'), __('Confirmed', 'mec'), __('Verified', 'mec'));
                foreach($reg_fields as $reg_field) $columns[] = __($reg_field['label'], 'mec');
                
                $output = fopen('php://output', 'w');
                fputcsv($output, $columns);
                
                foreach($post_ids as $post_id)
                {
                    $event_id = get_post_meta($post_id, 'mec_event_id', true);
                    $ticket_id = get_post_meta($post_id, 'mec_ticket_id', true);
                    $booker_id = get_post_field('post_author', $post_id);
                    
                    $booker = get_userdata($booker_id);
                    $phone = get_user_meta($booker_id, 'mec_phone', true);
                    
                    $confirmed = $this->get_confirmation_label(get_post_meta($post_id, 'mec_confirmed', true));
                    $verified = $this->get_verification_label(get_post_meta($post_id, 'mec_verified', true));
                    
                    $booking = array($post_id, get_the_title($event_id), get_the_date('', $post_id), $ticket_id, (isset($booker->first_name) ? trim($booker->first_name.' '.$booker->last_name) : ''), (isset($booker->user_email) ? $booker->user_email : ''), $phone, $confirmed, $verified);
                    
                    $attendee = get_post_meta($post_id, 'mec_attendee', true);
        
                    $reg_form = isset($attendee['reg']) ? $attendee['reg'] : array();
                    foreach($reg_fields as $field_id=>$reg_field) $booking[] = (isset($reg_form[$field_id]) and trim($reg_form[$field_id])) ? (is_string($reg_form[$field_id]) ? $reg_form[$field_id] : (is_array($reg_form[$field_id]) ? implode(' | ', $reg_form[$field_id]) : '---')) : '';
                    
                    fputcsv($output, $booking);
                }
                
                exit;
                
                break;
            case 'ms-excel-export':
                
                header('Content-Type: application/vnd.ms-excel; charset=utf-8');
                header('Content-Disposition: attachment; filename=bookings-'.md5(time().mt_rand(100, 999)).'.csv');
                
                $post_ids = $_GET['post'];
                
                $reg_fields = $this->main->get_reg_fields();
                $columns = array(__('ID', 'mec'), __('Event', 'mec'), __('Date', 'mec'), __('Ticket', 'mec'), __('Name', 'mec'), __('Email', 'mec'), __('Tel', 'mec'), __('Confirmed', 'mec'), __('Verified', 'mec'));
                foreach($reg_fields as $reg_field) $columns[] = __($reg_field['label'], 'mec');
                
                $output = fopen('php://output', 'w');
                fwrite($output, "sep=\t".PHP_EOL);
                fputcsv($output, $columns, "\t");
                
                foreach($post_ids as $post_id)
                {
                    $event_id = get_post_meta($post_id, 'mec_event_id', true);
                    $ticket_id = get_post_meta($post_id, 'mec_ticket_id', true);
                    $booker_id = get_post_field('post_author', $post_id);
                    
                    $booker = get_userdata($booker_id);
                    $phone = get_user_meta($booker_id, 'mec_phone', true);
                    
                    $confirmed = $this->get_confirmation_label(get_post_meta($post_id, 'mec_confirmed', true));
                    $verified = $this->get_verification_label(get_post_meta($post_id, 'mec_verified', true));
                    
                    $booking = array($post_id, get_the_title($event_id), get_the_date('', $post_id), $ticket_id, (isset($booker->first_name) ? trim($booker->first_name.' '.$booker->last_name) : ''), (isset($booker->user_email) ? $booker->user_email : ''), $phone, $confirmed, $verified);
                    
                    $attendee = get_post_meta($post_id, 'mec_attendee', true);
        
                    $reg_form = isset($attendee['reg']) ? $attendee['reg'] : array();
                    foreach($reg_fields as $field_id=>$reg_field) $booking[] = isset($reg_form[$field_id]) ? ((is_string($reg_form[$field_id]) and trim($reg_form[$field_id])) ? $reg_form[$field_id] : (is_array($reg_form[$field_id]) ? implode(' | ', $reg_form[$field_id]) : '---')) : '';
                    
                    fputcsv($output, $booking, "\t");
                }
                
                exit;
                
                break;
            default: return;
        }
        
        wp_redirect('edit.php?post_type='.$this->PT);
        exit;
    }
    
    /**
     * Save book data from backend
     * @author Webnus <info@webnus.biz>
     * @param int $post_id
     * @return void
     */
    public function save_book($post_id)
    {
        // Check if our nonce is set.
        if(!isset($_POST['mec_book_nonce'])) return;

        // Verify that the nonce is valid.
        if(!wp_verify_nonce($_POST['mec_book_nonce'], 'mec_book_data')) return;

        // If this is an autosave, our form has not been submitted, so we don't want to do anything.
        if(defined('DOING_AUTOSAVE') and DOING_AUTOSAVE) return;
        
        $new_confirmation = isset($_POST['confirmation']) ? $_POST['confirmation'] : NULL;
        $new_verification = isset($_POST['verification']) ? $_POST['verification'] : NULL;
        
        $confirmed = get_post_meta($post_id, 'mec_confirmed', true);
        $verified = get_post_meta($post_id, 'mec_verified', true);
        
        // Change Confirmation Status
        if(!is_null($new_confirmation) and $new_confirmation != $confirmed)
        {
            switch($new_confirmation)
            {
                case '1':
                    
                    $this->book->confirm($post_id);
                    break;
                case '-1':
                    
                    $this->book->reject($post_id);
                    break;
                
                default:
                    
                    $this->book->pending($post_id);
                    break;
            }
        }
        
        // Change Verification Status
        if(!is_null($new_verification) and $new_verification != $verified)
        {
            switch($new_verification)
            {
                case '1':
                    
                    $this->book->verify($post_id);
                    break;
                case '-1':
                    
                    $this->book->cancel($post_id);
                    break;
                
                default:
                    
                    $this->book->waiting($post_id);
                    break;
            }
        }
    }
    
    /**
     * Get Label for booking confirmation
     * @author Webnus <info@webnus.biz>
     * @param int $confirmed
     * @return string
     */
    public function get_confirmation_label($confirmed = 1)
    {
        if($confirmed == '1') $label = __('Confirmed', 'mec');
        elseif($confirmed == '-1') $label = __('Rejected', 'mec');
        else $label = __('Pending', 'mec');
        
        return $label;
    }
    
    /**
     * Get Label for booking verification
     * @author Webnus <info@webnus.biz>
     * @param int $verified
     * @return string
     */
    public function get_verification_label($verified = 1)
    {
        if($verified == '1') $label = __('Verified', 'mec');
        elseif($verified == '-1') $label = __('Canceled', 'mec');
        else $label = __('Waiting', 'mec');
        
        return $label;
    }
    
    /**
     * Process book steps from book form in frontend
     * @author Webnus <info@webnus.biz>
     */
    public function book()
    {
        $event_id = sanitize_text_field($_GET['event_id']);
        
        // Check if our nonce is set.
        if(!isset($_GET['_wpnonce'])) $this->main->response(array('success'=>0, 'message'=>__('Security nonce is missing.', 'mec'), 'code'=>'NONCE_MISSING'));

        // Verify that the nonce is valid.
        if(!wp_verify_nonce($_GET['_wpnonce'], 'mec_book_form_'.$event_id)) $this->main->response(array('success'=>0, 'message'=>__('Security nonce is invalid.', 'mec'), 'code'=>'NONCE_IS_INVALID'));
        
        $step = sanitize_text_field($_GET['step']);
        
        $book = $_GET['book'];
        $date = isset($book['date']) ? $book['date'] : NULL;
        $tickets = isset($book['tickets']) ? $book['tickets'] : NULL;
        
        if(is_null($date) or is_null($tickets)) $this->main->response(array('success'=>0, 'message'=>__('Invalid request.', 'mec'), 'code'=>'INVALID_REQUEST'));
        
        // Render libraary
        $render = $this->getRender();
        $rendered = $render->data($event_id, '');
        
        $event = new stdClass();
        $event->ID = $event_id;
        $event->data = $rendered;
        
        // Next Booking step
        $next_step = 'form';
        $response_data = array();
        
        switch($step)
        {
            case '1':
                
                $has_ticket = false;
                foreach($tickets as $ticket)
                {
                    if($ticket > 0)
                    {
                        $has_ticket = true;
                        break;
                    }
                }
                
                if(!$has_ticket) $this->main->response(array('success'=>0, 'message'=>__('Please select some tickets!', 'mec'), 'code'=>'NO_TICKET'));
                
                // Google recaptcha
                if($this->main->get_recaptcha_status('booking'))
                {
                    $g_recaptcha_response = isset($_GET['g-recaptcha-response']) ? $_GET['g-recaptcha-response'] : NULL;
                    if(!$this->main->get_recaptcha_response($g_recaptcha_response)) $this->main->response(array('success'=>0, 'message'=>__('Captcha is invalid. Please try again.', 'mec'), 'code'=>'CAPTCHA_IS_INVALID'));
                }
                
                $next_step = 'form';
                break;
            
            case '2':
                
                $raw_tickets = array();
                $validated_tickets = array();
                
                foreach($tickets as $ticket)
                {
                    if(isset($ticket['email']) and (trim($ticket['email']) == '' or !filter_var($ticket['email'], FILTER_VALIDATE_EMAIL))) continue;
                    
                    if(!isset($raw_tickets[$ticket['id']])) $raw_tickets[$ticket['id']] = 1;
                    else $raw_tickets[$ticket['id']] += 1;
                    
                    $validated_tickets[] = $ticket;
                }
                
                // Attendee form is not filled correctly
                if(!count($validated_tickets)) $this->main->response(array('success'=>0, 'message'=>__('Please fill the form correctly!', 'mec'), 'code'=>'ATTENDEE_FORM_INVALID'));
                
                $event_tickets = isset($event->data->tickets) ? $event->data->tickets : array();
                
                // Calculate price of bookings
                $price_details = $this->book->get_price_details($raw_tickets, $event_id, $event_tickets);
                
                $book['tickets'] = $validated_tickets;
                $book['price_details'] = $price_details;
                $book['total'] = $price_details['total'];
                $book['discount'] = 0;
                $book['price'] = $price_details['total'];
                $book['coupon'] = NULL;
                
                $next_step = 'checkout';
                $transaction_id = $this->book->temporary($book);
                
                // the booking is free
                if($price_details['total'] == 0)
                {
                    $free_gateway = new MEC_gateway_free();
                    $free_gateway->do_transaction($transaction_id);
                    
                    $next_step = 'message';
                    $message = __('Thanks for your booking. Your tickets booked, booking verification might be needed, please check your email.', 'mec');
                    $message_class = 'mec-success';
                    
                    if(isset($this->settings['booking_thankyou_page']) and trim($this->settings['booking_thankyou_page'])) $response_data['redirect_to'] = get_permalink($this->settings['booking_thankyou_page']);
                }
                
                break;
            
            case '3':
                
                $next_step = 'payment';
                break;
            
            case '4':
                
                $next_step = 'notifications';
                break;
        }
        
        $path = MEC::import('app.modules.booking.steps.'.$next_step, true, true);
        
        ob_start();
        include $path;
        $output = ob_get_clean();
        
        $this->main->response(array('success'=>1, 'output'=>$output, 'data'=>$response_data));
    }
    
    public function tickets_availability()
    {
        $event_id = isset($_GET['event_id']) ? sanitize_text_field($_GET['event_id']) : '';
        $date = isset($_GET['date']) ? sanitize_text_field($_GET['date']) : '';
        
        $ex = explode(':', $date);
        $date = $ex[0];
        
        $availability = $this->book->get_tickets_availability($event_id, $date);
        $this->main->response(array('success'=>1, 'availability'=>$availability));
    }
}