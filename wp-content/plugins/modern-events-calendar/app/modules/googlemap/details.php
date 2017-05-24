<?php
/** no direct access **/
defined('_MECEXEC_') or die();

// MEC Settings
$settings = $this->get_settings();

// Google Maps on single page is disabled
if(!isset($settings['google_maps_status']) or (isset($settings['google_maps_status']) and !$settings['google_maps_status'])) return;

$event = $event[0];

// Map is disabled for this event
if(isset($event->data->meta['mec_dont_show_map']) and $event->data->meta['mec_dont_show_map']) return;

$location = isset($event->data->locations[$event->data->meta['mec_location_id']]) ? $event->data->locations[$event->data->meta['mec_location_id']] : array();

// Event location geo point
$latitude = isset($location['latitude']) ? $location['latitude'] : '';
$longitude = isset($location['longitude']) ? $location['longitude'] : '';

if(!trim($latitude) or !trim($longitude)) return;

// Include Map Assets such as JS and CSS libraries
$this->load_map_assets();

// Get Direction Status
$get_direction = (isset($settings['google_maps_get_direction_status']) and in_array($settings['google_maps_get_direction_status'], array(0,1,2))) ? $settings['google_maps_get_direction_status'] : 0;

// Initialize MEC Google Maps jQuery plugin
$javascript = '<script type="text/javascript">
jQuery(document).ready(function()
{
    jQuery("#mec_googlemap_canvas").mecGoogleMaps(
    {
        latitude: "'.$latitude.'",
        longitude: "'.$longitude.'",
        zoom: '.(isset($settings['google_maps_zoomlevel']) ? $settings['google_maps_zoomlevel'] : 14).',
        icon: "'.apply_filters('mec_marker_icon', $this->asset('img/m-04.png')).'",
        styles: '.((isset($settings['google_maps_style']) and trim($settings['google_maps_style']) != '') ? $this->get_googlemap_style($settings['google_maps_style']) : "''").',
        markers: '.json_encode($render->markers($this->get_rendered_events(array('meta_key'=>'mec_location_id', 'meta_value'=>$event->data->meta['mec_location_id'])))).',
        getDirection: '.$get_direction.',
        directionOptions:
        {
            form: "#mec_get_direction_form",
            reset: "#mec_map_get_direction_reset",
            addr: "#mec_get_direction_addr",
            destination:
            {
                latitude: "'.$latitude.'",
                longitude: "'.$longitude.'",
            },
            startMarker: "'.apply_filters('mec_start_marker_icon', $this->asset('img/m-03.png')).'",
            endMarker: "'.apply_filters('mec_end_marker_icon', $this->asset('img/m-04.png')).'"
        }
    });
});
</script>';

// Include javascript code into the footer
$factory->params('footer', $javascript);
?>
<div class="mec-googlemap-details" id="mec_googlemap_canvas" style="height: 500px;">
</div>
<?php if($get_direction): ?>
<div class="mec-get-direction">
    <form method="post" action="#" id="mec_get_direction_form" class="clearfix">
        <div class="mec-map-get-direction-address-cnt">
            <input class="mec-map-get-direction-address" type="text" placeholder="<?php esc_attr_e('Address from ...', 'mec') ?>" id="mec_get_direction_addr" />
            <span class="mec-map-get-direction-reset mec-util-hidden" id="mec_map_get_direction_reset">X</span>
        </div>
        <div class="mec-map-get-direction-btn-cnt btn btn-primary">
            <input type="submit" value="<?php _e('Get Direction', 'mec'); ?>" />
        </div>
    </form>
</div>
<?php endif;