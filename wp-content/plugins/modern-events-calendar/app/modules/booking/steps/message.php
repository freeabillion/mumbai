<?php
/** no direct access **/
defined('_MECEXEC_') or die();

$event_id = $event->ID;
?>
<h4><?php _e('Thanks for your booking.', 'mec'); ?></h4>
<div class="mec-event-book-message">
    <div class="<?php echo $message_class; ?>"><?php echo $message; ?></div>
</div>