<?php
/** no direct access **/
defined('_MECEXEC_') or die();

// MEC Settings
$settings = $this->get_settings();

// Social networds on single page is disabled
if(!isset($settings['social_network_status']) or (isset($settings['social_network_status']) and !$settings['social_network_status'])) return;

$url = isset($event->data->permalink) ? $event->data->permalink : '';
if(trim($url) == '') return;

$socials = $this->get_social_networks();
?>
<div class="mec-event-social mec-frontbox">
     <h3 class="mec-social-single mec-frontbox-title"><?php _e('Share this event', 'mec'); ?></h3>
     <ul class="mec-event-sharing">
        <div class="mec-links-details">
            <ul>
                <?php
                foreach($socials as $social)
                {
                    if(!$settings['sn'][$social['id']]) continue;
                    if(is_callable($social['function'])) echo call_user_func($social['function'], $url, $event);
                }
                ?>
            </ul>
        </div>
    </ul>
</div>