<?php
/**
	Plugin Name: Modern Events Calendar
	Plugin URI: http://webnus.biz
	Description: An awesome plugin for events calendar
	Author: Webnus Team
	Version: 1.9.3
    Text Domain: mec
    Domain Path: /languages
	Author URI: http://webnus.biz
**/

/** MEC Execution **/
define('_MECEXEC_', 1);

/** Directory Separator **/
if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);

/** MEC Absolute Path **/
define('_MEC_ABSPATH_', dirname(__FILE__).DS);

/** Plugin Directory Name **/
define('_MEC_DIRNAME_', basename(_MEC_ABSPATH_));

/** Plugin Base Name **/
define('_MEC_BASENAME_', plugin_basename(__FILE__)); // modern-events-calendar/mec.php

/** Plugin Version **/
define('_MEC_VERSION_', '1.9.3');

/** Include Webnus MEC class if not included before **/
if(!class_exists('MEC')) require_once _MEC_ABSPATH_.'mec-init.php';

/** Initialize Webnus MEC **/
$MEC = MEC::instance();
$MEC->init();