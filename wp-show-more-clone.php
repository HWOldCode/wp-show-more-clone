<?php
/*
Plugin Name: WP show more clone
Plugin URI:  http://plugins.wordpress.org/wp-show-more/
Description: Add a user-defined link to display more content.
Version:     1.0.5
Author:      JAMOS Web Service + Modded by Stefan Werfling, Hüttner und Werfling Softwareentwicklung GbR
Author URI:  http://www.jamos.ch/plugins/wp-show-more and https://www.hw-softwareentwicklung.de
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: WP show more clone
*/

// -----------------------------------------------------------------------------

//add_shortcode( 'show_more_clone', 'wpsmc');

/*function wpsmc( $attr, $smcontent ) {
  if (!isset($attr['color'])) $attr['color'] = '#cc0000';
  if (!isset($attr['list'])) $attr['list'] = '';
  if (!isset($attr['more'])) $attr['more'] = 'show more';
  if (!isset($attr['less'])) $attr['less'] = 'show less';

  $wpsm_string  = '<div class="show_more">';
  $wpsm_string .= '<p class="wpsm-show" style="color: ' . $attr['color'] . ' ">';
  $wpsm_string .= $attr['list']. ' '  . $attr['more'];
  $wpsm_string .= '</p><div class="wpsm-content">';
  $wpsm_string .= $smcontent;
  $wpsm_string .= ' <p class="wpsm-hide" style="color: ' . $attr['color'] . ' ">';
  $wpsm_string .= $attr['list']. ' '  . $attr['less'];
  $wpsm_string .= '</p>';
  $wpsm_string .= '</div></div>';

  return $wpsm_string;
}*/

// -----------------------------------------------------------------------------

add_shortcode( 'show_more_clone_button', 'wpsmc_button');

function wpsmc_button( $attr, $smcontent=null) {
	if( !isset($attr['class']) ) {
		$attr['class'] = '';
	}

	if( !isset($attr['name']) ) {
		return '<p></p>';
	}

	$attr['name'] = str_replace('&quot;', "", $attr['name']);

	$wpsm_string  = '<div class="show_more show_more_clone">';
	$wpsm_string .= '<p class="wpsmc-show ' . $attr['class'] . '" id="show_more_clone_' . $attr['name'] . '">';
	$wpsm_string .= do_shortcode($smcontent);
	$wpsm_string .= '</p></div>';

	return $wpsm_string;
}

// -----------------------------------------------------------------------------

add_shortcode('show_more_clone_content', 'wpsmc_mcontent');

function wpsmc_mcontent( $attr, $smcontent=null) {
	if( !isset($attr['class']) ) {
		$attr['class'] = '';
	}

	if( !isset($attr['name']) ) {
		return '<p></p>';
	}

	if( !isset($attr['less']) ) {
		$attr['less'] = 'show less';
	}

	$attr['name'] = str_replace('&quot;', "", $attr['name']);

	$wpsm_string  = '';
	$wpsm_string .= '<div class="wpsmc-content wpsmc-content-hide" id="show_more_clone_' . $attr['name'] . '_content">';
	$wpsm_string .= do_shortcode($smcontent);
	$wpsm_string .= '<p class="wpsmc-hide ' . $attr['class'] . '">';
	$wpsm_string .= $attr['less'];
	$wpsm_string .= '</p>';
	$wpsm_string .= '</div>';

	return $wpsm_string;
}

// -----------------------------------------------------------------------------

add_action('wp_enqueue_scripts', 'smc_scripts');

function smc_scripts (){
  $plugin_url = plugins_url( '/', __FILE__ );

  wp_enqueue_style(
  	'smc-style',
  	$plugin_url . 'wpsmc-style.css'
  );

  wp_enqueue_script(
  	'smc-script',
  	$plugin_url . 'wpsmc-script.js',
  	array( 'jquery' ),
  	'1.0.1',
  	true
  );
}

add_action('wp_footer', 'smc_scripts');
?>