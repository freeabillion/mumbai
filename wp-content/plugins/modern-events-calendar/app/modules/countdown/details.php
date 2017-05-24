<?php
/** no direct access **/
defined('_MECEXEC_') or die();

// MEC Settings
$settings = $this->get_settings();

// Countdown on single page is disabled
if(!isset($settings['countdown_status']) or (isset($settings['countdown_status']) and !$settings['countdown_status'])) return;

$event = $event[0];
$date = $event->date;

$start_date = (isset($date['start']) and isset($date['start']['date'])) ? $date['start']['date'] : date('Y-m-d H:i:s');

$current_time = '';
$current_time .= sprintf("%02d", $date['start']['hour']).':';
$current_time .= sprintf("%02d", $date['start']['minutes']);
$current_time .= trim($date['start']['ampm']);

$start_time = date('D M j Y G:i:s', strtotime($start_date.' '.date('H:i:s', strtotime($current_time))));
$start_time_f = date('D M Y', strtotime($start_date.' '.date('H:i:s', strtotime($current_time))));

$d1 = new DateTime($start_time);
$d2 = new DateTime(date("D M j Y G:i:s"));

if($d1 < $d2)
{
    echo '<div class="mec-end-counts"><h3>'.__('The Event Is Finished.', 'mec').'</h3></div>';
    return;
}

$gmt_offset = $this->get_gmt_offset();
if(isset($_SERVER['HTTP_USER_AGENT']) and strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') === false) $gmt_offset = ' : '.$gmt_offset;
if(isset($_SERVER['HTTP_USER_AGENT']) and strpos($_SERVER['HTTP_USER_AGENT'], 'Edge') == true) $gmt_offset = '';

// Generating javascript code of countdown default module
$defaultjs = '<script type="text/javascript">
jQuery(document).ready(function()
{
    jQuery("#countdown").mecCountDown(
    {
        date: "'.$start_time.$gmt_offset.'",
        format: "off"
    },
    function()
    {
    });
});
</script>';

// Generating javascript code of countdown flip module
$flipjs = '<script type="text/javascript">
var clock;
jQuery(document).ready(function()
{
    var futureDate = new Date("'.$start_time.$gmt_offset.'");
    var currentDate = new Date();
    var diff = parseInt((futureDate.getTime() / 1000 - currentDate.getTime() / 1000));
    
    function dayDiff(first, second)
    {
        return (second-first)/(1000*3600*24);
    }
    
    if(dayDiff(currentDate, futureDate) < 100) jQuery(".clock").addClass("twodaydigits");
    else jQuery(".clock").addClass("threedaydigits");
    
    if(diff < 0)
    {
        diff = 0;
        jQuery(".countdown-message").html();
    }
    
    var clock = jQuery(".clock").FlipClock(diff, {
        clockFace: "DailyCounter",
        countdown: true,
        autoStart: true,
            callbacks: {
            stop: function() {
                jQuery(".countdown-message").html()
            }
        }
    });

    jQuery(".mec-wrap .flip-clock-wrapper ul li, a .shadow, a .inn").on("click", function(event)
    {
        event.preventDefault();
    });
});
</script>';
?>
<?php if(!isset($settings['countdown_list']) or (isset($settings['countdown_list']) and $settings['countdown_list'] === 'default')): $factory->params('footer', $defaultjs); ?>
<div class="mec-countdown-details" id="mec_countdown_details">
    <div class="countdown-w ctd-simple">
        <ul class="clockdiv" id="countdown">
            <div class="days-w block-w">
                <li>
                    <i class="icon-w mec-li_calendar"></i>
                    <span class="mec-days">00</span>
                    <p class="mec-timeRefDays label-w"><?php _e('days', 'mec'); ?></p>
                </li>
            </div>
            <div class="hours-w block-w">    
                <li>
                    <i class="icon-w mec-fa-clock-o"></i>
                    <span class="mec-hours">00</span>
                    <p class="mec-timeRefHours label-w"><?php _e('hours', 'mec'); ?></p>
                </li>
            </div>  
            <div class="minutes-w block-w">
                <li>
                    <i class="icon-w mec-li_clock"></i>
                    <span class="mec-minutes">00</span>
                    <p class="mec-timeRefMinutes label-w"><?php _e('minutes', 'mec'); ?></p>
                </li>
            </div>
            <div class="seconds-w block-w">
                <li>
                    <i class="icon-w mec-li_heart"></i>
                    <span class="mec-seconds">00</span>
                    <p class="mec-timeRefSeconds label-w"><?php _e('seconds', 'mec'); ?></p>
                </li>
            </div>
        </ul>
    </div>
</div>
<?php elseif(isset($settings['countdown_list']) and $settings['countdown_list'] === 'flip'): ?>
<?php
    // Include FlipCount library
    wp_enqueue_script('mec-flipcount-script', $this->asset('js/flipcount.js'));
    
    // Include the JS code
    $factory->params('footer', $flipjs);
?>
<div class="clock"></div>
<div class="countdown-message"></div>
<?php endif;