<?php
	header("Content-type: text/css",true);
	ob_start("vision_church_compress");
	function vision_church_compress($buffer) {
	  /* remove comments */
	  $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
	  /* remove tabs, spaces, newlines, etc. */
	  $buffer = str_replace(array("\r\n", "\r", "\n", "\t",'    '), '', $buffer);
	  return $buffer;
	}

	/* css files */
	include('./visualcomposer.css'); /* Import Modified Visual Composer Stylesheet */
	include('./base.css'); /* Import Basic Styles, Typography, Forms etc stylesheet */
	include('./scaffolding.css'); /* Import Responsive Grid System Stylesheet */
	include('./blox.css'); /* Import Full width Sections + Parallax Stylesheet */
	include('./plugins.css'); /* Import Plugins Stylesheet */
	include('./iconfonts.css'); /* Import Vector Icons Stylesheet */
	include('./blog.css'); /* Import Blog stylesheet */
	include('./elements.css'); /* Import Elements stylesheet */
	include('./widgets.css'); /* Import Widgets stylesheet */
	include('./icon-box.css'); /* Import Icon Boxes stylesheet */
	include('./live-search.css'); /* Import Live Search Stylesheet */
	include('./main-menu.css'); /* Import Menu Stylesheet */
	include('./main-style.css'); /* Import Main Stylesheet */

	ob_end_flush();