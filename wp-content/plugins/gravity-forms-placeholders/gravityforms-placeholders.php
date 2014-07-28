<?php
/*
Plugin Name: Gravity Forms - Placeholders add-on
Plugin URI: http://github.com/neojp/gravity-forms-placeholders/
Description: Adds HTML5 placeholder support to Gravity Forms' fields with a javascript fallback. Javascript & jQuery are required.
Version: 1.2.1
Author: Joan Piedra
Author URI: http://joanpiedra.com

Instructions:
Just add a "gplaceholder" CSS classname to the required fields or form

*/

if ( isset( $GLOBALS['pagenow'] ) && $GLOBALS['pagenow'] == 'wp-login.php' )
	return;

add_action('wp_enqueue_scripts', 'gf_placeholder_addon_script_enqueue');

function gf_placeholder_addon_script_enqueue() {
	$placeholder_js = plugins_url( basename(dirname(__FILE__)) ).'"/jquery.placeholder-1.0.1.js';
	wp_enqueue_script('gf_placeholder_add_on',  get_bloginfo('template_directory').'/js/gf.placeholders.js', array('jquery'), '1.0' );
	wp_localize_script('gf_placeholder_add_on', 'gf_placeholder_vars', array('jquery_placeholder_url' => $placeholder_js) );
}
