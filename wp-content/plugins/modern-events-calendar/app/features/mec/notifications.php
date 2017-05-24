<?php
/** no direct access **/
defined('_MECEXEC_') or die();

$notifications = $this->main->get_notifications();
?>
<div class="wrap" id="mec-wrap">
    <h1><?php _e('Modern Events Calendar', 'mec'); ?></h1>
    <h2 class="nav-tab-wrapper">
        <a href="<?php echo $this->main->remove_qs_var('tab'); ?>" class="nav-tab"><?php echo __('Settings', 'mec'); ?></a>
        <?php if(isset($this->settings['booking_status']) and $this->settings['booking_status']): ?>
        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-reg-form'); ?>" class="nav-tab"><?php echo __('Booking Form', 'mec'); ?></a>
        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-gateways'); ?>" class="nav-tab"><?php echo __('Payment Gateways', 'mec'); ?></a>
        <?php endif; ?>
        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-notifications'); ?>" class="nav-tab nav-tab-active"><?php echo __('Notifications', 'mec'); ?></a>
        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-styling'); ?>" class="nav-tab"><?php echo __('Styling Options', 'mec'); ?></a>
        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-customcss'); ?>" class="nav-tab"><?php echo __('Custom CSS', 'mec'); ?></a>
        <a href="<?php echo $this->main->add_qs_var('tab', 'MEC-support'); ?>" class="nav-tab"><?php echo __('Support', 'mec'); ?></a>
    </h2>
    <div class="mec-container">
        <form id="mec_notifications_form">
            <div class="mec-form-row" id="mec_notifications_form_container">
                <ul>
                    <?php if(isset($this->settings['booking_status']) and $this->settings['booking_status']): ?>
                    <li>
                        <h4 class="mec-form-subtitle"><?php _e('Booking Notification', 'mec'); ?></h4>
                        <p class="description"><?php _e('It sends to attendee after booking for notifying him/her.', 'mec'); ?></p>
                        <div class="mec-form-row">
                            <label for="mec_notifications_booking_notification_subject"><?php _e('Email Subject', 'mec'); ?></label>
                            <input type="text" name="mec[notifications][booking_notification][subject]" id="mec_notifications_booking_notification_subject" value="<?php echo (isset($notifications['booking_notification']['subject']) ? $notifications['booking_notification']['subject'] : ''); ?>" />
                        </div>
                        <div class="mec-form-row">
                            <label for="mec_notifications_booking_notification_recipients"><?php _e('Custom Recipients', 'mec'); ?></label>
                            <input type="text" name="mec[notifications][booking_notification][recipients]" id="mec_notifications_booking_notification_recipients" value="<?php echo (isset($notifications['booking_notification']['recipients']) ? $notifications['booking_notification']['recipients'] : ''); ?>" />
                            <a class="mec-tooltip" title="<?php esc_attr_e("Insert comma separated emails for multiple recipients.", 'mec'); ?>"><i title="" class="dashicons-before dashicons-editor-help"></i></a>
                        </div>
                        <div class="mec-form-row">
                            <input type="checkbox" name="mec[notifications][booking_notification][send_to_organizer]" value="1" id="mec_notifications_booking_notification_send_to_organizer" <?php echo ((isset($notifications['booking_notification']['send_to_organizer']) and $notifications['booking_notification']['send_to_organizer'] == 1) ? 'checked="checked"' : ''); ?> />
                            <label for="mec_notifications_booking_notification_send_to_organizer"><?php _e('Send the email to event organizer', 'mec'); ?></label>
                        </div>
                        <div class="mec-form-row">
                            <label for="mec_notifications_booking_notification_content"><?php _e('Email Content', 'mec'); ?></label>
                            <?php wp_editor((isset($notifications['booking_notification']) ? stripslashes($notifications['booking_notification']['content']) : ''), 'mec_notifications_booking_notification_content', array('textarea_name'=>'mec[notifications][booking_notification][content]')); ?>
                        </div>
                        <p class="description"><?php _e('You can use following placeholders', 'mec'); ?></p>
                        <ul>
                            <li><span>%%first_name%%</span>: <?php _e('First name of attendee', 'mec'); ?></li>
                            <li><span>%%last_name%%</span>: <?php _e('Last name of attendee', 'mec'); ?></li>
                            <li><span>%%user_email%%</span>: <?php _e('Email of attendee', 'mec'); ?></li>
                            <li><span>%%book_date%%</span>: <?php _e('Booked date of event', 'mec'); ?></li>
                            <li><span>%%blog_name%%</span>: <?php _e('Your website title', 'mec'); ?></li>
                            <li><span>%%blog_url%%</span>: <?php _e('Your website URL', 'mec'); ?></li>
                            <li><span>%%blog_description%%</span>: <?php _e('Your website description', 'mec'); ?></li>
                            <li><span>%%event_title%%</span>: <?php _e('Event title', 'mec'); ?></li>
                            <li><span>%%event_organizer_name%%</span>: <?php _e('Organizer name of booked event', 'mec'); ?></li>
                            <li><span>%%event_organizer_tel%%</span>: <?php _e('Organizer tel of booked event', 'mec'); ?></li>
                            <li><span>%%event_organizer_email%%</span>: <?php _e('Organizer email of booked event', 'mec'); ?></li>
                            <li><span>%%event_location_name%%</span>: <?php _e('Location name of booked event', 'mec'); ?></li>
                            <li><span>%%event_location_address%%</span>: <?php _e('Location address of booked event', 'mec'); ?></li>
                            <li><span>%%attendee_full_info%%</span>: <?php _e('Full Attendee info such as booking form data, name, email etc.', 'mec'); ?></li>
                        </ul>
                    </li>
                    <li>
                        <h4 class="mec-form-subtitle"><?php _e('Booking Verification', 'mec'); ?></h4>
                        <p class="description"><?php _e('It sends to attendee email for verifying their booking/email.', 'mec'); ?></p>
                        <div class="mec-form-row">
                            <label for="mec_notifications_email_verification_subject"><?php _e('Email Subject', 'mec'); ?></label>
                            <input type="text" name="mec[notifications][email_verification][subject]" id="mec_notifications_email_verification_subject" value="<?php echo (isset($notifications['email_verification']['subject']) ? $notifications['email_verification']['subject'] : ''); ?>" />
                        </div>
                        <div class="mec-form-row">
                            <label for="mec_notifications_email_verification_recipients"><?php _e('Custom Recipients', 'mec'); ?></label>
                            <input type="text" name="mec[notifications][email_verification][recipients]" id="mec_notifications_email_verification_recipients" value="<?php echo (isset($notifications['email_verification']['recipients']) ? $notifications['email_verification']['recipients'] : ''); ?>" />
                            <a class="mec-tooltip" title="<?php esc_attr_e("Insert multiple recipients, comma separated.", 'mec'); ?>"><i title="" class="dashicons-before dashicons-editor-help"></i></a>
                        </div>
                        <div class="mec-form-row">
                            <label for="mec_notifications_email_verification_content"><?php _e('Email Content', 'mec'); ?></label>
                            <?php wp_editor((isset($notifications['email_verification']) ? stripslashes($notifications['email_verification']['content']) : ''), 'mec_notifications_email_verification_content', array('textarea_name'=>'mec[notifications][email_verification][content]')); ?>
                        </div>
                        <p class="description"><?php _e('You can use following placeholders', 'mec'); ?></p>
                        <ul>
                            <li><span>%%first_name%%</span>: <?php _e('First name of attendee', 'mec'); ?></li>
                            <li><span>%%last_name%%</span>: <?php _e('Last name of attendee', 'mec'); ?></li>
                            <li><span>%%user_email%%</span>: <?php _e('Email of attendee', 'mec'); ?></li>
                            <li><span>%%book_date%%</span>: <?php _e('Booked date of event', 'mec'); ?></li>
                            <li><span>%%blog_name%%</span>: <?php _e('Your website title', 'mec'); ?></li>
                            <li><span>%%blog_url%%</span>: <?php _e('Your website URL', 'mec'); ?></li>
                            <li><span>%%blog_description%%</span>: <?php _e('Your website description', 'mec'); ?></li>
                            <li><span>%%event_title%%</span>: <?php _e('Event title', 'mec'); ?></li>
                            <li><span>%%event_organizer_name%%</span>: <?php _e('Organizer name of booked event', 'mec'); ?></li>
                            <li><span>%%event_organizer_tel%%</span>: <?php _e('Organizer tel of booked event', 'mec'); ?></li>
                            <li><span>%%event_organizer_email%%</span>: <?php _e('Organizer email of booked event', 'mec'); ?></li>
                            <li><span>%%event_location_name%%</span>: <?php _e('Location name of booked event', 'mec'); ?></li>
                            <li><span>%%event_location_address%%</span>: <?php _e('Location address of booked event', 'mec'); ?></li>
                            <li><span>%%verification_link%%</span>: <?php _e('Email/Booking verification link.', 'mec'); ?></li>
                        </ul>
                    </li>
                    <li>
                        <h4 class="mec-form-subtitle"><?php _e('Booking Confirmation', 'mec'); ?></h4>
                        <p class="description"><?php _e('It sends to attendee after confirming the booking by admin.', 'mec'); ?></p>
                        <div class="mec-form-row">
                            <label for="mec_notifications_booking_confirmation_subject"><?php _e('Email Subject', 'mec'); ?></label>
                            <input type="text" name="mec[notifications][booking_confirmation][subject]" id="mec_notifications_booking_confirmation_subject" value="<?php echo (isset($notifications['booking_confirmation']['subject']) ? $notifications['booking_confirmation']['subject'] : ''); ?>" />
                        </div>
                        <div class="mec-form-row">
                            <label for="mec_notifications_booking_confirmation_recipients"><?php _e('Custom Recipients', 'mec'); ?></label>
                            <input type="text" name="mec[notifications][booking_confirmation][recipients]" id="mec_notifications_booking_confirmation_recipients" value="<?php echo (isset($notifications['booking_confirmation']['recipients']) ? $notifications['booking_confirmation']['recipients'] : ''); ?>" />
                            <a class="mec-tooltip" title="<?php esc_attr_e("Insert comma separated emails for multiple recipients.", 'mec'); ?>"><i title="" class="dashicons-before dashicons-editor-help"></i></a>
                        </div>
                        <div class="mec-form-row">
                            <label for="mec_notifications_booking_confirmation_content"><?php _e('Email Content', 'mec'); ?></label>
                            <?php wp_editor((isset($notifications['booking_confirmation']) ? stripslashes($notifications['booking_confirmation']['content']) : ''), 'mec_notifications_booking_confirmation_content', array('textarea_name'=>'mec[notifications][booking_confirmation][content]')); ?>
                        </div>
                        <p class="description"><?php _e('You can use following placeholders', 'mec'); ?></p>
                        <ul>
                            <li><span>%%first_name%%</span>: <?php _e('First name of attendee', 'mec'); ?></li>
                            <li><span>%%last_name%%</span>: <?php _e('Last name of attendee', 'mec'); ?></li>
                            <li><span>%%user_email%%</span>: <?php _e('Email of attendee', 'mec'); ?></li>
                            <li><span>%%book_date%%</span>: <?php _e('Booked date of event', 'mec'); ?></li>
                            <li><span>%%blog_name%%</span>: <?php _e('Your website title', 'mec'); ?></li>
                            <li><span>%%blog_url%%</span>: <?php _e('Your website URL', 'mec'); ?></li>
                            <li><span>%%blog_description%%</span>: <?php _e('Your website description', 'mec'); ?></li>
                            <li><span>%%event_title%%</span>: <?php _e('Event title', 'mec'); ?></li>
                            <li><span>%%event_organizer_name%%</span>: <?php _e('Organizer name of booked event', 'mec'); ?></li>
                            <li><span>%%event_organizer_tel%%</span>: <?php _e('Organizer tel of booked event', 'mec'); ?></li>
                            <li><span>%%event_organizer_email%%</span>: <?php _e('Organizer email of booked event', 'mec'); ?></li>
                            <li><span>%%event_location_name%%</span>: <?php _e('Location name of booked event', 'mec'); ?></li>
                            <li><span>%%event_location_address%%</span>: <?php _e('Location address of booked event', 'mec'); ?></li>
                            <li><span>%%cancellation_link%%</span>: <?php _e('Booking cancellation link.', 'mec'); ?></li>
                        </ul>
                    </li>
                    <li>
                        <h4 class="mec-form-subtitle"><?php _e('Admin Notification', 'mec'); ?></h4>
                        <p class="description"><?php _e('It sends to admin to notify him/her that a new booking received.', 'mec'); ?></p>
                        <div class="mec-form-row">
                            <label for="mec_notifications_admin_notification_subject"><?php _e('Email Subject', 'mec'); ?></label>
                            <input type="text" name="mec[notifications][admin_notification][subject]" id="mec_notifications_admin_notification_subject" value="<?php echo (isset($notifications['admin_notification']['subject']) ? $notifications['admin_notification']['subject'] : ''); ?>" />
                        </div>
                        <div class="mec-form-row">
                            <label for="mec_notifications_admin_notification_recipients"><?php _e('Custom Recipients', 'mec'); ?></label>
                            <input type="text" name="mec[notifications][admin_notification][recipients]" id="mec_notifications_admin_notification_recipients" value="<?php echo (isset($notifications['admin_notification']['recipients']) ? $notifications['admin_notification']['recipients'] : ''); ?>" />
                            <a class="mec-tooltip" title="<?php esc_attr_e("Insert comma separated emails for multiple recipients.", 'mec'); ?>"><i title="" class="dashicons-before dashicons-editor-help"></i></a>
                        </div>
                        <div class="mec-form-row">
                            <input type="checkbox" name="mec[notifications][admin_notification][send_to_organizer]" value="1" id="mec_notifications_admin_notification_send_to_organizer" <?php echo ((isset($notifications['admin_notification']['send_to_organizer']) and $notifications['admin_notification']['send_to_organizer'] == 1) ? 'checked="checked"' : ''); ?> />
                            <label for="mec_notifications_admin_notification_send_to_organizer"><?php _e('Send the email to event organizer', 'mec'); ?></label>
                        </div>
                        <div class="mec-form-row">
                            <label for="mec_notifications_admin_notification_content"><?php _e('Email Content', 'mec'); ?></label>
                            <?php wp_editor((isset($notifications['admin_notification']) ? stripslashes($notifications['admin_notification']['content']) : ''), 'mec_notifications_admin_notification_content', array('textarea_name'=>'mec[notifications][admin_notification][content]')); ?>
                        </div>
                        <p class="description"><?php _e('You can use following placeholders', 'mec'); ?></p>
                        <ul>
                            <li><span>%%first_name%%</span>: <?php _e('First name of attendee', 'mec'); ?></li>
                            <li><span>%%last_name%%</span>: <?php _e('Last name of attendee', 'mec'); ?></li>
                            <li><span>%%user_email%%</span>: <?php _e('Email of attendee', 'mec'); ?></li>
                            <li><span>%%book_date%%</span>: <?php _e('Booked date of event', 'mec'); ?></li>
                            <li><span>%%blog_name%%</span>: <?php _e('Your website title', 'mec'); ?></li>
                            <li><span>%%blog_url%%</span>: <?php _e('Your website URL', 'mec'); ?></li>
                            <li><span>%%blog_description%%</span>: <?php _e('Your website description', 'mec'); ?></li>
                            <li><span>%%event_title%%</span>: <?php _e('Event title', 'mec'); ?></li>
                            <li><span>%%event_organizer_name%%</span>: <?php _e('Organizer name of booked event', 'mec'); ?></li>
                            <li><span>%%event_organizer_tel%%</span>: <?php _e('Organizer tel of booked event', 'mec'); ?></li>
                            <li><span>%%event_organizer_email%%</span>: <?php _e('Organizer email of booked event', 'mec'); ?></li>
                            <li><span>%%event_location_name%%</span>: <?php _e('Location name of booked event', 'mec'); ?></li>
                            <li><span>%%event_location_address%%</span>: <?php _e('Location address of booked event', 'mec'); ?></li>
                            <li><span>%%admin_link%%</span>: <?php _e('Admin booking management link.', 'mec'); ?></li>
                            <li><span>%%attendee_full_info%%</span>: <?php _e('Full Attendee info such as booking form data, name, email etc.', 'mec'); ?></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <li>
                        <h4 class="mec-form-subtitle"><?php _e('New Event', 'mec'); ?></h4>
                        <div class="mec-form-row">
                            <label>
                                <input type="hidden" name="mec[notifications][new_event][status]" value="0" />
                                <input onchange="jQuery('#mec_notification_new_event_container_toggle').toggle();" value="1" type="checkbox" name="mec[notifications][new_event][status]" <?php if(isset($notifications['new_event']['status']) and $notifications['new_event']['status']) echo 'checked="checked"'; ?> /> <?php _e('Enable new event notification', 'mec'); ?>
                            </label>
                        </div>
                        <div id="mec_notification_new_event_container_toggle" class="<?php if((isset($notifications['new_event']) and !$notifications['new_event']['status']) or !isset($notifications['new_event'])) echo 'mec-util-hidden'; ?>">
                            <p class="description"><?php _e('It sends after adding a new event from frontend event submission or from website backend.', 'mec'); ?></p>
                            <div class="mec-form-row">
                                <label for="mec_notifications_new_event_subject"><?php _e('Email Subject', 'mec'); ?></label>
                                <input type="text" name="mec[notifications][new_event][subject]" id="mec_notifications_new_event_subject" value="<?php echo (isset($notifications['new_event']['subject']) ? $notifications['new_event']['subject'] : ''); ?>" />
                            </div>
                            <div class="mec-form-row">
                                <label for="mec_notifications_new_event_recipients"><?php _e('Custom Recipients', 'mec'); ?></label>
                                <input type="text" name="mec[notifications][new_event][recipients]" id="mec_notifications_new_event_recipients" value="<?php echo (isset($notifications['new_event']['recipients']) ? $notifications['new_event']['recipients'] : ''); ?>" />
                                <a class="mec-tooltip" title="<?php esc_attr_e("Insert comma separated emails for multiple recipients.", 'mec'); ?>"><i title="" class="dashicons-before dashicons-editor-help"></i></a>
                            </div>
                            <div class="mec-form-row">
                                <label for="mec_notifications_new_event_content"><?php _e('Email Content', 'mec'); ?></label>
                                <?php wp_editor((isset($notifications['new_event']) ? stripslashes($notifications['new_event']['content']) : ''), 'mec_notifications_new_event_content', array('textarea_name'=>'mec[notifications][new_event][content]')); ?>
                            </div>
                            <p class="description"><?php _e('You can use following placeholders', 'mec'); ?></p>
                            <ul>
                                <li><span>%%event_title%%</span>: <?php _e('Title of event', 'mec'); ?></li>
                                <li><span>%%event_status%%</span>: <?php _e('Status of event', 'mec'); ?></li>
                                <li><span>%%event_note%%</span>: <?php _e('Event Note', 'mec'); ?></li>
                                <li><span>%%blog_name%%</span>: <?php _e('Your website title', 'mec'); ?></li>
                                <li><span>%%blog_url%%</span>: <?php _e('Your website URL', 'mec'); ?></li>
                                <li><span>%%blog_description%%</span>: <?php _e('Your website description', 'mec'); ?></li>
                                <li><span>%%admin_link%%</span>: <?php _e('Admin events management link.', 'mec'); ?></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="mec-form-row">
                <?php wp_nonce_field('mec_options_form'); ?>
                <button id="mec_notifications_form_button" class="button button-primary mec-button-primary" type="submit"><?php _e('Save Changes', 'mec'); ?></button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
jQuery("#mec_notifications_form").on('submit', function(event)
{
    event.preventDefault();
    
    jQuery("#mec_notifications_booking_notification_content-html").click();
    jQuery("#mec_notifications_booking_notification_content-tmce").click();
    
    jQuery("#mec_notifications_email_verification_content-html").click();
    jQuery("#mec_notifications_email_verification_content-tmce").click();
    
    jQuery("#mec_notifications_booking_confirmation_content-html").click();
    jQuery("#mec_notifications_booking_confirmation_content-tmce").click();
    
    jQuery("#mec_notifications_admin_notification_content-html").click();
    jQuery("#mec_notifications_admin_notification_content-tmce").click();
    
    jQuery("#mec_notifications_new_event_content-html").click();
    jQuery("#mec_notifications_new_event_content-tmce").click();

    // Add loading Class to the button
    jQuery("#mec_notifications_form_button").addClass('loading').text("<?php echo esc_js(esc_attr__('Saved', 'mec')); ?>");
    
    var notifications = jQuery("#mec_notifications_form").serialize();
    jQuery.ajax(
    {
        type: "POST",
        url: ajaxurl,
        data: "action=mec_save_notifications&"+notifications,
        success: function(data)
        {
            // Remove the loading Class to the button
            setTimeout(function(){
                jQuery("#mec_notifications_form_button").removeClass('loading').text("<?php echo esc_js(esc_attr__('Save Changes', 'mec')); ?>");
            }, 1000);
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Remove the loading Class to the button
            setTimeout(function(){
                jQuery("#mec_notifications_form_button").removeClass('loading').text("<?php echo esc_js(esc_attr__('Save Changes', 'mec')); ?>");
            }, 1000);
        }
    });
});
</script>