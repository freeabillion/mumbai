<?php
/** no direct access **/
defined('_MECEXEC_') or die();

$reg_fields = $this->main->get_reg_fields();
?>
<div class="wrap" id="mec-wrap">
    <h1><?php _e('Modern Events Calendar', 'mec'); ?></h1>
    <h2 class="nav-tab-wrapper">
        <a href="<?php echo $this->main->remove_qs_var('tab'); ?>" class="nav-tab"><?php echo __('Settings', 'mec'); ?></a>
        <?php if(isset($this->settings['booking_status']) and $this->settings['booking_status']): ?>
        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-reg-form'); ?>" class="nav-tab nav-tab-active"><?php echo __('Booking Form', 'mec'); ?></a>
        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-gateways'); ?>" class="nav-tab"><?php echo __('Payment Gateways', 'mec'); ?></a>
        <?php endif; ?>
        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-notifications'); ?>" class="nav-tab"><?php echo __('Notifications', 'mec'); ?></a>
        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-styling'); ?>" class="nav-tab"><?php echo __('Styling Options', 'mec'); ?></a>
        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-customcss'); ?>" class="nav-tab"><?php echo __('Custom CSS', 'mec'); ?></a>
        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-support'); ?>" class="nav-tab"><?php echo __('Support', 'mec'); ?></a>
    </h2>
    <div class="mec-container">
        <form id="mec_reg_fields_form">
            <div class="mec-form-row">
                <h4 class="mec-form-subtitle"><?php _e('Booking Form', 'mec'); ?></h4>
            </div>
            <div class="mec-form-row" id="mec_reg_form_container">
                
                <?php /** Don't remove this hidden field **/ ?>
                <input type="hidden" name="mec[reg_fields]" value="" />
                
                <ul id="mec_reg_form_fields">
                    <?php
                        $i = 0;
                        foreach($reg_fields as $key=>$reg_field)
                        {
                            if(!is_numeric($key)) continue;
                            $i = max($i, $key);
                            
                            if($reg_field['type'] == 'text') echo $this->main->field_text($key, $reg_field);
                            elseif($reg_field['type'] == 'email') echo $this->main->field_email($key, $reg_field);
                            elseif($reg_field['type'] == 'tel') echo $this->main->field_tel($key, $reg_field);
                            elseif($reg_field['type'] == 'textarea') echo $this->main->field_textarea($key, $reg_field);
                            elseif($reg_field['type'] == 'p') echo $this->main->field_p($key, $reg_field);
                            elseif($reg_field['type'] == 'checkbox') echo $this->main->field_checkbox($key, $reg_field);
                            elseif($reg_field['type'] == 'radio') echo $this->main->field_radio($key, $reg_field);
                            elseif($reg_field['type'] == 'select') echo $this->main->field_select($key, $reg_field);
                        }
                    ?>
                </ul>
                <div id="mec_reg_form_field_types">
                    <button type="button" class="button" data-type="text"><?php _e('Text'); ?></button>
                    <button type="button" class="button" data-type="email"><?php _e('Email'); ?></button>
                    <button type="button" class="button" data-type="tel"><?php _e('Tel'); ?></button>
                    <button type="button" class="button" data-type="textarea"><?php _e('Textarea'); ?></button>
                    <button type="button" class="button" data-type="checkbox"><?php _e('Checkboxes'); ?></button>
                    <button type="button" class="button" data-type="radio"><?php _e('Radio Buttons'); ?></button>
                    <button type="button" class="button" data-type="select"><?php _e('Dropdown'); ?></button>
                    <button type="button" class="button" data-type="p"><?php _e('Paragraph'); ?></button>
                </div>
			</div>
            <div class="mec-form-row">
                <?php wp_nonce_field('mec_options_form'); ?>
                <button id="mec_reg_fields_form_button" class="button button-primary mec-button-primary" type="submit"><?php _e('Save Changes', 'mec'); ?></button>
			</div>
        </form> 
    </div>
</div>
<input type="hidden" id="mec_new_reg_field_key" value="<?php echo $i+1; ?>" />
<div class="mec-util-hidden">
    <div id="mec_reg_field_text">
        <?php echo $this->main->field_text(':i:'); ?>
    </div>
    <div id="mec_reg_field_email">
        <?php echo $this->main->field_email(':i:'); ?>
    </div>
    <div id="mec_reg_field_tel">
        <?php echo $this->main->field_tel(':i:'); ?>
    </div>
    <div id="mec_reg_field_textarea">
        <?php echo $this->main->field_textarea(':i:'); ?>
    </div>
    <div id="mec_reg_field_checkbox">
        <?php echo $this->main->field_checkbox(':i:'); ?>
    </div>
    <div id="mec_reg_field_radio">
        <?php echo $this->main->field_radio(':i:'); ?>
    </div>
    <div id="mec_reg_field_select">
        <?php echo $this->main->field_select(':i:'); ?>
    </div>
    <div id="mec_reg_field_p">
        <?php echo $this->main->field_p(':i:'); ?>
    </div>
    <div id="mec_reg_field_option">
        <?php echo $this->main->field_option(':fi:', ':i:'); ?>
    </div>
</div>
<script type="text/javascript">
jQuery("#mec_reg_fields_form").on('submit', function(event)
{
    event.preventDefault();
    
    // Add loading Class to the button
    jQuery("#mec_reg_fields_form_button").addClass('loading').text("<?php echo esc_js(esc_attr__('Saved', 'mec')); ?>");
    
    var fields = jQuery("#mec_reg_fields_form").serialize();
    jQuery.ajax(
    {
        type: "POST",
        url: ajaxurl,
        data: "action=mec_save_reg_form&"+fields,
        success: function(data)
        {
            // Remove the loading Class to the button
            setTimeout(function(){
                jQuery("#mec_reg_fields_form_button").removeClass('loading').text("<?php echo esc_js(esc_attr__('Save Changes', 'mec')); ?>");
            }, 1000);
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Remove the loading Class to the button
            setTimeout(function(){
                jQuery("#mec_reg_fields_form_button").removeClass('loading').text("<?php echo esc_js(esc_attr__('Save Changes', 'mec')); ?>");
            }, 1000);
        }
    });
});
</script>