<?php
/** no direct access **/
defined('_MECEXEC_') or die();

$gateways = $this->main->get_gateways();
?>
<div class="wrap" id="mec-wrap">
    <h1><?php _e('Modern Events Calendar', 'mec'); ?></h1>
    <h2 class="nav-tab-wrapper">
        <a href="<?php echo $this->main->remove_qs_var('tab'); ?>" class="nav-tab"><?php echo __('Settings', 'mec'); ?></a>
        <?php if(isset($this->settings['booking_status']) and $this->settings['booking_status']): ?>
        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-reg-form'); ?>" class="nav-tab"><?php echo __('Booking Form', 'mec'); ?></a>
        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-gateways'); ?>" class="nav-tab nav-tab-active"><?php echo __('Payment Gateways', 'mec'); ?></a>
        <?php endif; ?>
        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-notifications'); ?>" class="nav-tab"><?php echo __('Notifications', 'mec'); ?></a>
        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-styling'); ?>" class="nav-tab"><?php echo __('Styling Options', 'mec'); ?></a>
        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-customcss'); ?>" class="nav-tab"><?php echo __('Custom CSS', 'mec'); ?></a>
        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-support'); ?>" class="nav-tab"><?php echo __('Support', 'mec'); ?></a>
    </h2>
    <div class="mec-container">
        <form id="mec_gateways_form">
            <div class="mec-form-row">
                <h4 class="mec-form-subtitle"><?php _e('Payment Gateways', 'mec'); ?></h4>
			</div>
            <div class="mec-form-row" id="mec_gateways_form_container">
                <ul>
                    <?php foreach($gateways as $gateway): ?>
                    <li id="mec_gateway_id<?php echo $gateway->id(); ?>">
                        <?php $gateway->options_form(); ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
			</div>
            <div class="mec-form-row">
                <?php wp_nonce_field('mec_options_form'); ?>
                <button id="mec_gateways_form_button" class="button button-primary mec-button-primary" type="submit"><?php _e('Save Changes', 'mec'); ?></button>
			</div>
        </form>
    </div>
</div>
<script type="text/javascript">
jQuery("#mec_gateways_form").on('submit', function(event)
{
    event.preventDefault();
    
    // Add loading Class to the button
    jQuery("#mec_gateways_form_button").addClass('loading').text("<?php echo esc_js(esc_attr__('Saved', 'mec')); ?>");
    
    var gateways = jQuery("#mec_gateways_form").serialize();
    jQuery.ajax(
    {
        type: "POST",
        url: ajaxurl,
        data: "action=mec_save_gateways&"+gateways,
        success: function(data)
        {
            // Remove the loading Class to the button
            setTimeout(function(){
                jQuery("#mec_gateways_form_button").removeClass('loading').text("<?php echo esc_js(esc_attr__('Save Changes', 'mec')); ?>");
            }, 1000);
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Remove the loading Class to the button
            setTimeout(function(){
                jQuery("#mec_gateways_form_button").removeClass('loading').text("<?php echo esc_js(esc_attr__('Save Changes', 'mec')); ?>");
            }, 1000);
        }
    });
});
</script>