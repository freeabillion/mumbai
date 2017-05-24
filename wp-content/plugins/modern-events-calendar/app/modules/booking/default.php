<?php
/** no direct access **/
defined('_MECEXEC_') or die();

// MEC Settings
$settings = $this->get_settings();

// Booking module is disabled
if(!isset($settings['booking_status']) or (isset($settings['booking_status']) and !$settings['booking_status'])) return;

$event = $event[0];

$tickets = isset($event->data->tickets) ? $event->data->tickets : array();
$dates = isset($event->dates) ? $event->dates : $event->date;

// No Dates
if(!count($dates)) return;

// No Tickets
if(!count($tickets)) return;

// Generate JavaScript code of Booking Module
$javascript = '<script type="text/javascript">
jQuery("#mec_book_form").on("submit", function(event)
{
    event.preventDefault();
    mec_book_form_submit();
});

var mec_tickets_availability_ajax = false;
function mec_get_tickets_availability(event_id, date)
{
    // Add loading Class to the ticket list
    jQuery(".mec-event-tickets-list").addClass("loading");
    
    // Abort previous request
    if(mec_tickets_availability_ajax) mec_tickets_availability_ajax.abort();
    
    mec_tickets_availability_ajax = jQuery.ajax(
    {
        type: "GET",
        url: "'.admin_url('admin-ajax.php', NULL).'",
        data: "action=mec_tickets_availability&event_id="+event_id+"&date="+date,
        dataType: "JSON",
        success: function(data)
        {
            // Remove the loading Class to the ticket list
            jQuery(".mec-event-tickets-list").removeClass("loading");
            
            for(ticket_id in data.availability)
            {
                var limit = data.availability[ticket_id];
                
                jQuery("#mec_event_ticket"+ticket_id+"").addClass(".mec-event-ticket"+limit);
                
                if(limit == "-1")
                {
                    jQuery("#mec_event_ticket"+ticket_id+" .mec-book-ticket-limit").attr("max", "");
                    jQuery("#mec_event_ticket"+ticket_id+" .mec-event-ticket-available span").html("'.esc_html__("Unlimited", 'mec').'");
                }
                else
                {
                    var cur_count = jQuery("#mec_event_ticket"+ticket_id+" .mec-book-ticket-limit").val();
                    if(cur_count > limit) jQuery("#mec_event_ticket"+ticket_id+" .mec-book-ticket-limit").val(limit);
                    
                    jQuery("#mec_event_ticket"+ticket_id+" .mec-book-ticket-limit").attr("max", limit);
                    jQuery("#mec_event_ticket"+ticket_id+" .mec-event-ticket-available span").html(limit);
                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Remove the loading Class to the ticket list
            jQuery(".mec-event-tickets-list").removeClass("loading");
        }
    });
}

function mec_check_tickets_availability(ticket_id, count)
{
    var max = jQuery("#mec_event_ticket"+ticket_id+" .mec-book-ticket-limit").attr("max");
    if(parseInt(count) > parseInt(max)) jQuery("#mec_event_ticket"+ticket_id+" .mec-book-ticket-limit").val(max);
}

function mec_book_form_submit()
{
    var step = jQuery("#mec_book_form input[name=step]").val();
    
    // Validate Checkboxes and Radio Buttons on Booking Form
    if(step == 2)
    {
        var valid = true;
        jQuery(".mec-book-reg-field-checkbox.mec-reg-mandatory").each(function(i)
        {
            var ticket_id = jQuery(this).data("ticket-id");
            var field_id = jQuery(this).data("field-id");
            
            if(!jQuery("#mec_book_form input[name=\'book[tickets]["+ticket_id+"][reg]["+field_id+"][]\']").is(":checked"))
            {
                valid = false;
                jQuery(this).addClass("mec-red-notification");
            }
            else jQuery(this).removeClass("mec-red-notification");
        });
        
        jQuery(".mec-book-reg-field-radio.mec-reg-mandatory").each(function(i)
        {
            var ticket_id = jQuery(this).data("ticket-id");
            var field_id = jQuery(this).data("field-id");
            
            if(!jQuery("#mec_book_form input[name=\'book[tickets]["+ticket_id+"][reg]["+field_id+"]\']:checked").val())
            {
                valid = false;
                jQuery(this).addClass("mec-red-notification");
            }
            else jQuery(this).removeClass("mec-red-notification");
        });
        
        if(!valid) return false;
    }
    
    // Add loading Class to the button
    jQuery("#mec_book_form button[type=submit]").addClass("loading");
    jQuery("#mec_booking_message").removeClass("mec-success mec-error").hide();
    
    var data = jQuery("#mec_book_form").serialize();
    jQuery.ajax(
    {
        type: "GET",
        url: "'.admin_url('admin-ajax.php', NULL).'",
        data: data,
        dataType: "JSON",
        success: function(data)
        {
            // Remove the loading Class to the button
            jQuery("#mec_book_form button[type=submit]").removeClass("loading");
            
            if(data.success)
            {
                jQuery("#mec_booking").html(data.output);

                jQuery("#mec_book_form").off("submit");
                jQuery("#mec_book_form").on("submit", function(event)
                {
                    event.preventDefault();
                    mec_book_form_submit();
                });
                
                // Redirect to thank you page
                if(typeof data.data.redirect_to != "undefined" && data.data.redirect_to != "")
                {
                    setTimeout(function(){window.location.href = data.data.redirect_to;}, 2000);
                }
            }
            else
            {
                jQuery("#mec_booking_message").addClass("mec-error").html(data.message).show();
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Remove the loading Class to the button
            jQuery("#mec_book_form button[type=submit]").removeClass("loading");
        }
    });
}

function mec_book_apply_coupon()
{
    // Add loading Class to the button
    jQuery("#mec_book_form_coupon button[type=submit]").addClass("loading");
    jQuery(".mec-book-form-coupon .mec-coupon-message").removeClass("mec-success mec-error").hide();
    
    var data = jQuery("#mec_book_form_coupon").serialize();
    jQuery.ajax(
    {
        type: "GET",
        url: "'.admin_url('admin-ajax.php', NULL).'",
        data: data,
        dataType: "JSON",
        success: function(data)
        {
            // Remove the loading Class to the button
            jQuery("#mec_book_form_coupon button[type=submit]").removeClass("loading");
            
            if(data.success)
            {
                jQuery(".mec-book-form-coupon .mec-coupon-message").addClass("mec-success").html(data.message).show();
                
                jQuery(".mec-book-price-details").append(data.data.price_details);
                jQuery(".mec-book-price-total").html(data.data.price);
                jQuery("#mec_do_transaction_paypal_express_form"+data.data.transaction_id+" input[name=amount]").val(data.data.price_raw);
            }
            else
            {
                jQuery(".mec-book-form-coupon .mec-coupon-message").addClass("mec-error").html(data.message).show();
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Remove the loading Class to the button
            jQuery("#mec_book_form_coupon button[type=submit]").removeClass("loading");
        }
    });
}
</script>';

// Include javascript code into the footer
$factory->params('footer', $javascript);
?>
<div class="mec-booking" id="mec_booking">
    <?php
        $path = MEC::import('app.modules.booking.steps.tickets', true, true);
        include $path;
    ?>
</div>
<div id="mec_booking_message" class="mec-util-hidden"></div>