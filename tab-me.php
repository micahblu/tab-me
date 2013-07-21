<?php
/*
Plugin Name: Tab Me
Plugin URI: 
Description: Provides a shortcode which allows tabbed content
Version: 0.5
Author: Micah Blu
Author URI: http://www.micahblu.com/
License: GPL
Copyright: Micah Blu
*/

// Shortcode: tab
// Usage: [tab title="title 1"]Your content goes here...[/tab]
function tab_func( $atts, $content = null ) {
    extract(shortcode_atts(array(
	    'title'      => '',
    ), $atts));
    global $single_tab_array;
    $single_tab_array[] = array('title' => $title, 'content' => trim(do_shortcode($content)));
    return $single_tab_array;
}
add_shortcode('tab', 'tab_func');

/* Shortcode: tabs
 * Usage:   [tabs]
 * 		[tab title="title 1"]Your content goes here...[/tab]
 * 		[tab title="title 2"]Your content goes here...[/tab]
 * 	    [/tabs]
 */
function tabs_func( $atts, $content = null ) {
    global $single_tab_array;
    $single_tab_array = array(); // clear the array
    
 
    $tabs_nav = '<div class="tab-me-wrapper">';
    $tabs_nav .= '<ul class="tab-me-tabs">';
    
    do_shortcode($content); // execute the '[tab]' shortcode first to get the title and content
    
    foreach ($single_tab_array as $tab => $tab_attr_array) {
    
			$random_id = rand(1000,2000);
			
			$default = ( $tab == 0 ) ? ' class="active"' : '';
			
			$tabs_nav .= '<li><a href="javascript:void(0)"'.$default.' rel="tab'.$random_id.'"><span>'.$tab_attr_array['title'].'</span></a></li>';
			$tabs_content .= '<div class="tab-me-tab-content" id="tab' . $random_id . '">'.$tab_attr_array['content'].'</div>';
    }
    $tabs_nav .= '</ul>';
    
    $tabs_output .= $tabs_nav . '<div class="tab-me-content-wrapper">' . $tabs_content . '</div>';
    $tabs_output .= '</div><!-- tabs-wrapper end -->';

    return $tabs_output;
}
add_shortcode('tabs', 'tabs_func');


function tab_me_scripts(){
	wp_enqueue_style('tab-me-styles', plugins_url( 'tab-me.css', __FILE__) );
	
	wp_enqueue_script('tab-me-js', plugins_url( 'tab-me.js', __FILE__), array('jquery'), null, true );
}

add_action('wp_enqueue_scripts', 'tab_me_scripts');



?>