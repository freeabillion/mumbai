<?php
/** no direct access **/
defined('_MECEXEC_') or die();

// MEC Settings
$settings = $this->get_settings();

// Export module on single page is disabled
if(!isset($settings['export_module_status']) or (isset($settings['export_module_status']) and !$settings['export_module_status'])) return;

$title = isset($event->data->title) ? $event->data->title : '';
$location = isset($event->data->locations[$event->data->meta['mec_location_id']]) ? $event->data->locations[$event->data->meta['mec_location_id']]['address'] : '';

$occurrence = isset($_GET['occurrence']) ? sanitize_text_field($_GET['occurrence']) : '';
$occurrence_end_date = trim($occurrence) ? $this->get_end_date_by_occurrence($event->data->ID, $occurrence) : '';

$start_time = strtotime((trim($occurrence) ? $occurrence : $event->date['start']['date']).' '.sprintf("%02d", $event->date['start']['hour']).':'.sprintf("%02d", $event->date['start']['minutes']).' '.$event->date['start']['ampm']);
$end_time = strtotime((trim($occurrence_end_date) ? $occurrence_end_date : $event->date['end']['date']).' '.sprintf("%02d", $event->date['end']['hour']).':'.sprintf("%02d", $event->date['end']['minutes']).' '.$event->date['end']['ampm']);

$gmt_offset_seconds = $this->get_gmt_offset_seconds();
?>
<div class="mec-event-export-module mec-frontbox">
     <ul class="mec-event-exporting">
        <div class="mec-export-details">
            <ul>
                <?php if($settings['sn']['googlecal']): ?><li><a class="mec-events-gcal mec-events-button mec-color mec-bg-color-hover mec-border-color" href="https://www.google.com/calendar/event?action=TEMPLATE&text=<?php echo $title; ?>&dates=<?php echo gmdate('Ymd\\THi00\\Z', ($start_time - $gmt_offset_seconds)); ?>/<?php echo gmdate('Ymd\\THi00\\Z', ($end_time - $gmt_offset_seconds)); ?>&details=<?php echo $title; ?>&location=<?php echo $location; ?>" target="_blank"><?php echo __('+ Add to Google Calendar', 'mec'); ?></a></li><?php endif; ?>
                <?php if($settings['sn']['ical']): ?><li><a class="mec-events-gcal mec-events-button mec-color mec-bg-color-hover mec-border-color" href="<?php echo $this->ical_URL($event->data->ID, $occurrence); ?>"><?php echo __('+ iCal export', 'mec'); ?></a></li><?php endif; ?>
            </ul>
        </div>
    </ul>
</div>