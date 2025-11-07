<?php

/* ------------------------------------------------------------------------*
 * Tabs
 * ------------------------------------------------------------------------*/
 
function show_tabs($atts, $content = null){
	extract(shortcode_atts(array(
			                "titles" => '',
	                      ), $atts));	
	$all_title = explode(',',$titles);	
	$html='<ul class="tabs-nav">';	
	foreach($all_title as $title){
			$html.= '<li><a href="#">'.$title.'</a></li>';
	}
	$html.='</ul><div class="tabs-container">'.do_shortcode($content).'</div>';	
	return $html;
}
add_shortcode('tabs', 'show_tabs');


function show_tab_pane($atts, $content = null) {
		
	return '<div class="tab-content">'.do_shortcode($content).'</div>';
}
add_shortcode('tab_pane', 'show_tab_pane');



/* ------------------------------------------------------------------------*
 * Accordion Shortcode
 * ------------------------------------------------------------------------*/
function show_accor_wrap($atts, $content = null) {
	return '<div class="accordion">'.do_shortcode($content).'</div>';
}
add_shortcode('accordion', 'show_accor_wrap');


function show_accor_block($atts, $content = null) {
	extract(shortcode_atts(array(
			                      'title' => '',
			                      'active' => false
	                            ), $atts));
	
	$ac_class = '';
	
	if($active == true)
	  		$ac_class = 'current';
		
	return '<h5 class="'.$ac_class.'"><span></span>'.$title.'</h5><div class="pane '.$ac_class.'">'.do_shortcode($content).'</div>';
}
add_shortcode('accor_block', 'show_accor_block');



/* ------------------------------------------------------------------------*
 * Messages Shortcode
 * ------------------------------------------------------------------------*/
 // Error
function show_error($atts, $content = null) {
	return '<p class="error">'.do_shortcode($content).'</p>';
}
add_shortcode('error', 'show_error');

 // Success
function show_success($atts, $content = null) {
	return '<p class="success">'.do_shortcode($content).'</p>';
}
add_shortcode('success', 'show_success');

// Information
function show_info($atts, $content = null) {
	return '<p class="info">'.do_shortcode($content).'</p>';
}
add_shortcode('info', 'show_info');

// Notice
function show_notice($atts, $content = null) {
	return '<p class="notice">'.do_shortcode($content).'</p>';
}
add_shortcode('notice', 'show_notice');


/* ------------------------------------------------------------------------*
 * Typography
 * ------------------------------------------------------------------------*/
 
// colored h4
function colored_h4($atts, $content = null) {
	return '<h4 class="colored">'.do_shortcode($content).'</h4>';
}
add_shortcode('colored_h4', 'colored_h4');

// colored h5
function colored_h5($atts, $content = null) {
	return '<h5 class="colored">'.do_shortcode($content).'</h5>';
}
add_shortcode('colored_h5', 'colored_h5');


/* ------------------------------------------------------------------------*
 * Button
 * ------------------------------------------------------------------------*/
function readmore_button($atts, $content = null) {
    extract(shortcode_atts(array(
                                'link' => '#',
                                'target' => ''
                            ), $atts));

    return '<a class="readmore" href="'.$link.'" target="'.$target.'">'.do_shortcode($content).'</a>';
}
add_shortcode('button', 'readmore_button');


?>