<?php
/** no direct access **/
defined('_MECEXEC_') or die();

// get screen id
$current_user = wp_get_current_user();

// user event created
$count_posts = wp_count_posts('mec-events');
$user_post_count = isset($count_posts->publish) ? $count_posts->publish : '0';

// user calendar created
$count_posts = wp_count_posts('mec_calendars');
$user_post_count_c = isset($count_posts->publish) ? $count_posts->publish : '0';

// mec location
$user_location_count_l = wp_count_terms('mec_location', array(
    'hide_empty'=>false,
    'parent'=>0
));

// mec orgnizer
$user_organizer_count_l = wp_count_terms('mec_organizer', array(
    'hide_empty'=>false,
    'parent'=>0
));

// get mec activation
$envato = $this->getEnvato();
$version = $envato->get_MEC_info('version')->version;
?>
<div id="webnus-dashboard" class="wrap about-wrap">
    <div class="welcome-head w-clearfix">
        <div class="w-row">
            <div class="w-col-sm-9">
                <h1> <?php echo sprintf(__('Welcome %s', 'mec'), $current_user->user_firstname); ?> </h1>
                <div class="w-welcome">
                    <p><?php echo __('Modern Event Calendar - Most Powerful & Easy to Use Events Management System', 'mec'); ?>
                        <?php if(version_compare( _MEC_VERSION_ , $version, '<')): ?>
                            <a class="mec-tooltip" title="<?php esc_attr_e("Update $version is ready for download.", 'mec'); ?>"><i title="" class="dashicons-before dashicons-editor-help"></i></a>
                        <?php endif; ?></p>
                </div>
            </div>
            <div class="w-col-sm-3">
                <img src="<?php echo plugin_dir_url(__FILE__ ) . '../../../assets/img/mec-logo-w.png'; ?>" />
                <span class="w-theme-version"><?php echo __('Version', 'mec'); ?> <?php echo _MEC_VERSION_; ?></span>
            </div>
        </div>
    </div>
    <div class="welcome-content w-clearfix extra">
        <div class="w-row">
            <?php if(current_user_can('read')): ?>
            <div class="w-col-sm-3">
                <div class="w-box doc">
                    <div class="w-box-child mec-count-child">
                        <p><?php echo '<p class="mec_dash_count">'.$user_post_count.'</p> '.__('Events', 'mec'); ?></p>
                    </div>
                </div>
            </div>
            <div class="w-col-sm-3">
                <div class="w-box doc">
                    <div class="w-box-child mec-count-child">
                        <p><?php echo '<p class="mec_dash_count">'.$user_post_count_c.'</p> '.__('Shortcodes', 'mec'); ?></p>
                    </div>
                </div>
            </div>
            <div class="w-col-sm-3">
                <div class="w-box doc">
                    <div class="w-box-child mec-count-child">
                        <p><?php echo '<p class="mec_dash_count">'.$user_location_count_l.'</p> '.__('Location', 'mec'); ?></p>
                    </div>
                </div>
            </div>            
            <div class="w-col-sm-3">
                <div class="w-box doc">
                    <div class="w-box-child mec-count-child">
                        <p><?php echo '<p class="mec_dash_count">'.$user_organizer_count_l.'</p> '. __('Orgnizer', 'mec'); ?></p>
                    </div>
                </div>
            </div>           
            <?php endif; ?>
            <div class="w-col-sm-6">
                <div class="w-box doc">
                    <div class="w-box-head">
                        <?php _e('Documentation', 'mec'); ?>
                    </div>
                    <div class="w-box-content">
                        <p><?php echo esc_html__('Our documentation is simple and functional with full details and cover all essential aspects from beginning to the most advanced parts.', 'mec'); ?></p>
                        <div class="w-button">
                            <a href="http://webnus.biz/dox/modern-event-calendar/" target="_blank"><?php echo esc_html__('DOCUMENTATION', 'mec'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-col-sm-6">
                <div class="w-box support">
                    <div class="w-box-head">
                        <?php echo esc_html__('Support Forum', 'mec'); ?>
                    </div>
                    <div class="w-box-content">
                        <p><?php echo esc_html__("Webnus is elite and trusted author with high percentage of satisfied user. If you have any issues please don't hesitate to contact us, we will reply as soon as possible.", 'mec'); ?></p>
                        <div class="w-button">
                            <a href="https://webnus.ticksy.com/" target="_blank"><?php echo esc_html__('OPEN A TICKET', 'mec'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-row">
            <div class="w-col-sm-12">
                <div class="w-box change-log">
                    <div class="w-box-head">
                        <?php echo esc_html__('Change Log', 'mec'); ?>
                    </div>
                    <div class="w-box-content">
                        <pre><?php echo file_get_contents(plugin_dir_path(__FILE__ ).'../../../changelog.txt'); ?></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>