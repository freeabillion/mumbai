<?php
/** no direct access **/
defined('_MECEXEC_') or die();

$styling = $this->main->get_styling();
$event_colorskin = (isset($styling['mec_colorskin']) || isset($styling['color'])) ? 'colorskin-custom' : '';
?>
<div class="mec-wrap <?php echo $event_colorskin; ?>">
	<div class="mec-event-list-<?php echo $this->style; ?>">
		<?php foreach($this->events as $date=>$events): ?>
        
            <?php $month = date('m', strtotime($date)); if($this->month_divider and $month != $current_month_divider): $current_month_divider = $month; ?>
            <div class="mec-month-divider"><span><?php echo date_i18n('F Y', strtotime($date)); ?></span></div>
            <?php endif; ?>
        
            <?php
                foreach($events as $event)
                {
                    $location = isset($event->data->locations[$event->data->meta['mec_location_id']]) ? $event->data->locations[$event->data->meta['mec_location_id']] : array();
                    $organizer = isset($event->data->organizers[$event->data->meta['mec_organizer_id']]) ? $event->data->organizers[$event->data->meta['mec_organizer_id']] : array();
                    $start_time = (isset($event->data->time) ? $event->data->time['start'] : '');
                    $end_time = (isset($event->data->time) ? $event->data->time['end'] : '');
                    $event_color = isset($event->data->meta['mec_color']) ? '<span class="event-color" style="background: #'.$event->data->meta['mec_color'].'"></span>' : '';
            ?>
            <article class="mec-event-article mec-clear">
                <?php if($this->style == 'modern'): ?>
                    <div class="col-md-2 col-sm-2">
                        <div class="mec-event-date">
                            <div class="event-d mec-color"><?php echo date_i18n($this->date_format_modern_1, strtotime($event->date['start']['date'])); ?></div>
                            <div class="event-f"><?php echo date_i18n($this->date_format_modern_2, strtotime($event->date['start']['date'])); ?></div>
                            <div class="event-da"><?php echo date_i18n($this->date_format_modern_3, strtotime($event->date['start']['date'])); ?></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <h4 class="mec-event-title"><a class="mec-color-hover" href="<?php echo $this->main->get_event_date_permalink($event->data->permalink, $event->date['start']['date']); ?>"><?php echo $event->data->title; ?></a><?php echo $event_color; ?></h4>
                        <div class="mec-event-detail"><?php echo (isset($location['name']) ? $location['name'] : '') . (isset($location['address']) ? ' | '.$location['address'] : ''); ?></div>
                        <ul class="mec-event-sharing"><?php echo $this->main->module('links.list', array('event'=>$event)); ?></ul>
                    </div>
                    <div class="col-md-4 col-sm-4 mec-btn-wrapper">
                        <a class="mec-booking-button" href="<?php echo $this->main->get_event_date_permalink($event->data->permalink, $event->date['start']['date']); ?>"><?php (is_array($event->data->tickets) and count($event->data->tickets)) ? _e('REGISTER', 'mec') : _e('View Detail', 'mec'); ?></a>
                    </div>
                <?php elseif($this->style == 'classic'): ?>
                    <div class="mec-event-image"><?php echo $event->data->thumbnails['thumbnail']; ?></div>
                    <div class="mec-event-date mec-color"><i class="mec-sl-calendar"></i> <?php echo $this->main->date_label($event->date['start'], $event->date['end'], $this->date_format_classic_1); ?></div>
                    <h4 class="mec-event-title"><a class="mec-color-hover" href="<?php echo $this->main->get_event_date_permalink($event->data->permalink, $event->date['start']['date']); ?>"><?php echo $event->data->title; ?></a><?php echo $event_color; ?></h4>
                    <?php if(isset($location['name'])): ?><div class="mec-event-detail"><i class="mec-sl-map-marker"></i> <?php echo (isset($location['name']) ? $location['name'] : ''); ?></div><?php endif; ?>
                <?php elseif($this->style == 'minimal'): ?>
                    <div class="col-md-9 col-sm-9">
                        <div class="mec-event-date mec-bg-color"><span><?php echo date_i18n($this->date_format_minimal_1, strtotime($event->date['start']['date'])); ?></span><?php echo date_i18n($this->date_format_minimal_2, strtotime($event->date['start']['date'])); ?></div>
                        <h4 class="mec-event-title"><?php echo $event->data->title . $event_color; ?></h4>
                        <div class="mec-event-detail"><?php echo date_i18n($this->date_format_minimal_3, strtotime($event->date['start']['date'])); ?>, <?php echo (isset($location['name']) ? $location['name'] : ''); ?></div>
                    </div>
                    <div class="col-md-3 col-sm-3 btn-wrapper"><a class="mec-detail-button" href="<?php echo $this->main->get_event_date_permalink($event->data->permalink, $event->date['start']['date']); ?>"><?php _e('EVENT DETAIL', 'mec'); ?></a></div>
                <?php elseif($this->style =='standard'): ?>
                    <?php
                        $excerpt = trim($event->data->post->post_excerpt) ? $event->data->post->post_excerpt : '';
                        
                        // Safe Excerpt for UTF-8 Strings
                        if(!trim($excerpt))
                        {
                            $ex = explode(' ', strip_tags($event->data->post->post_content));
                            $words = array_slice($ex, 0, 8);
                            
                            $excerpt = implode(' ', $words);
                        }
                    ?>
                    <div class="mec-topsec">
                        <div class="col-md-3 mec-event-image-wrap mec-col-table-c">
                            <div class="mec-event-image"><?php echo $event->data->thumbnails['thumblist']; ?></div>
                        </div>
                        <div class="col-md-6 mec-col-table-c mec-event-content-wrap">
                            <div class="mec-event-content">
                                <h3 class="mec-event-title"><a class="mec-color-hover" href="<?php echo $this->main->get_event_date_permalink($event->data->permalink, $event->date['start']['date']); ?>"><?php echo $event->data->title; ?></a><?php echo $event_color; ?></h3>
                                <div class="mec-event-description"><?php echo $excerpt.(trim($excerpt) ? ' ...' : ''); ?></div>
                            </div>
                        </div>
                        <div class="col-md-3 mec-col-table-c mec-event-meta-wrap">
                            <div class="mec-event-meta mec-color-before">
                                <div class="mec-date-details">
                                    <span class="mec-event-d"><?php echo $this->main->date_label($event->date['start'], $event->date['end'], $this->date_format_standard_1); ?></span>
                                </div>
                                <?php
                                    if(trim($start_time))
                                    {
                                        echo '<div class="mec-time-details"><span class="mec-start-time">'.$start_time.'</span>';
                                        if(trim($end_time)) echo ' - <span class="mec-end-time">'.$end_time.'</span>';
                                        echo '</div>';
                                    }
                                ?>
                                <?php if(isset($location['name'])): ?>
                                <div class="mec-venue-details">
                                    <span><?php echo (isset($location['name']) ? $location['name'] : ''); ?></span><address class="mec-event-address"><span><?php echo (isset($location['address']) ? $location['address'] : ''); ?></span></address>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="mec-event-footer">
                        <ul class="mec-event-sharing-wrap">
                            <li class="mec-event-share">
                                <a href="#" class="mec-event-share-icon">
                                    <i class="mec-sl-share"></i>
                                </a>
                            </li>
                            <ul class="mec-event-sharing"><?php echo $this->main->module('links.list', array('event'=>$event)); ?></ul> 
                        </ul>
                        <a class="mec-booking-button" href="<?php echo $this->main->get_event_date_permalink($event->data->permalink, $event->date['start']['date']); ?>"><?php (is_array($event->data->tickets) and count($event->data->tickets)) ? _e('REGISTER', 'mec') : _e('View Detail', 'mec'); ?></a>
                    </div>
                <?php endif; ?>
            </article>
            <?php } ?>
		<?php endforeach; ?>
	</div>
</div>