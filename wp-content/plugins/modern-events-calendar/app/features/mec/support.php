<?php
/** no direct access **/
defined('_MECEXEC_') or die();
?>
<div class="wrap" id="mec-wrap">
    <h1><?php _e('Modern Events Calendar', 'mec'); ?></h1>
    <h2 class="nav-tab-wrapper">
        <a href="<?php echo $this->main->remove_qs_var('tab'); ?>" class="nav-tab"><?php echo __('Settings', 'mec'); ?></a>
        <?php if(isset($this->settings['booking_status']) and $this->settings['booking_status']): ?>
        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-reg-form'); ?>" class="nav-tab"><?php echo __('Booking Form', 'mec'); ?></a>
        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-gateways'); ?>" class="nav-tab"><?php echo __('Payment Gateways', 'mec'); ?></a>
        <?php endif; ?>
        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-notifications'); ?>" class="nav-tab"><?php echo __('Notifications', 'mec'); ?></a>
        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-styling'); ?>" class="nav-tab"><?php echo __('Styling Options', 'mec'); ?></a>
        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-customcss'); ?>" class="nav-tab"><?php echo __('Custom CSS', 'mec'); ?></a>
        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-support'); ?>" class="nav-tab nav-tab-active"><?php echo __('Support', 'mec'); ?></a>
    </h2>
    <div id="webnus-dashboard" class="mec-container">
        <div class="welcome-content w-clearfix extra">
            <div class="w-col-sm-6">
                <div class="w-box doc">
                    <div class="w-box-head">
                        <?php _e('Documentation', 'mec'); ?>
                    </div>
                    <div class="w-box-content">
                        <p>
                            <?php echo esc_html__('Our documentation is simple and functional with full details and cover all essential aspects from beginning to the most advanced parts.', 'mec'); ?>
                        </p>
                        <div class="w-button">
                            <a href="http://webnus.biz/dox/modern-event-calendar/" target="_blank"><?php echo esc_html__('DOCUMENTATION', 'mec'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-col-sm-1"></div>
            <div class="w-col-sm-6">
                <div class="w-box support">
                    <div class="w-box-head">
                        <?php echo esc_html__('Support Forum', 'mec'); ?>
                    </div>
                    <div class="w-box-content">
                        <p>
                            <?php echo esc_html__("Webnus is elite and trusted author with high percentage of satisfied user. If you have any issues please don't hesitate to contact us, we will reply as soon as possible.", 'mec'); ?>
                        </p>
                        <div class="w-button">
                            <a href="https://webnus.ticksy.com/" target="_blank"><?php echo esc_html__('OPEN A TICKET', 'mec'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-col-sm-1"></div>
            <div class="w-col-sm-12">
                <div class="w-box knowledgebase">
                    <div class="w-box-head w-Knowledgebase">
                        <?php _e('Knowledgebase', 'mec'); ?>
                    </div>
                    <div class="w-box-content">
                        <ul>
                            <li><a href="https://webnus.ticksy.com/article/8597/"><?php _e('How to create a new event?', 'mec'); ?></a></li>
                            <li><a href="https://webnus.ticksy.com/article/8600/"><?php _e("Booking module doesn't work", 'mec'); ?></a></li>
                            <li><a href="https://webnus.ticksy.com/article/8601/"><?php _e("How to export events in iCal format?", 'mec'); ?></a></li>
                            <li><a href="https://webnus.ticksy.com/article/8603/"><?php _e("How to override MEC template files?", 'mec'); ?></a></li>
                            <li><a href="https://webnus.ticksy.com/article/8599/"><?php _e("How to add/manage shortcodes?", 'mec'); ?></a></li>
                            <li class="mec-view-all-articles"><a href="https://webnus.ticksy.com/articles/100004962/"><?php _e("View all Articles", 'mec'); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>