<?php
/** no direct access **/
defined('_MECEXEC_') or die();

$styles = $this->main->get_styles();
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
        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-customcss'); ?>" class="nav-tab nav-tab-active"><?php echo __('Custom CSS', 'mec'); ?></a>
        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-support'); ?>" class="nav-tab"><?php echo __('Support', 'mec'); ?></a>
    </h2>
    <div class="mec-container">
        <h4 class="mec-form-subtitle"><?php _e('Custom Styles', 'mec'); ?></h4>
        <form id="mec_styles_form">
            <div class="mec-form-row">
                <textarea id="mec_styles_CSS" name="mec[styles][CSS]"><?php echo (isset($styles['CSS']) ? stripslashes($styles['CSS']) : ''); ?></textarea>
                <p class="description"><?php _e("If you're a developer or you have some knowledge about CSS codes, you can place your desired styles codes here. These codes will be included in your theme frontend after all styles so they will override MEC default (or theme) styles.", 'mec'); ?></p>
                <?php wp_nonce_field('mec_options_form'); ?>
                <button id="mec_styles_form_button" class="button button-primary mec-button-primary" type="submit"><?php _e('Save Changes', 'mec'); ?></button>
			</div>
        </form>
    </div>
</div>
<script type="text/javascript">
jQuery("#mec_styles_form").on('submit', function(event)
{
    event.preventDefault();
    
    // Add loading Class to the button
    jQuery("#mec_styles_form_button").addClass('loading').text("<?php echo esc_js(esc_attr__('Saved', 'mec')); ?>");
    
    var styles = jQuery("#mec_styles_form").serialize();
    jQuery.ajax(
    {
        type: "POST",
        url: ajaxurl,
        data: "action=mec_save_styles&"+styles,
        success: function(data)
        {
            // Remove the loading Class to the button
            setTimeout(function(){
                jQuery("#mec_styles_form_button").removeClass('loading').text("<?php echo esc_js(esc_attr__('Save Changes', 'mec')); ?>");
            }, 1000);
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Remove the loading Class to the button
            setTimeout(function(){
                jQuery("#mec_styles_form_button").removeClass('loading').text("<?php echo esc_js(esc_attr__('Save Changes', 'mec')); ?>");
            }, 1000);
        }
    });
});
</script>