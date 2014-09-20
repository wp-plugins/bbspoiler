<?php
/*
Plugin Name: BBSpoiler
Plugin URI: http://wordpress.org/plugins/bbspoiler/
Description: This plugin allows you to hide text under the tags [spoiler]your text[/spoiler].
Version: 1.01
Author: Flector
Author URI: http://wordpress.org/plugins/bbspoiler/
*/ 

function bbspoiler_shortcode( $atts, $content ) {
	extract( shortcode_atts( array (
		'title' => __('Spoiler', 'bbspoiler'),
		'state' => 'folded',
		'collapse_link' => 'true'
	), $atts ) );

	$title = esc_attr( $title );
	$head_class = (esc_attr($state) == 'folded')?'':' unfolded';
	$body_class = (esc_attr($state) == 'folded')?' folded':'';

	$output  = "\n<div class=\"sp-wrap\">\n";
	$output .= "<div class=\"sp-head".$head_class."\" title=\"". __('Expand', 'bbspoiler') ."\">\n";
	$output .= $title;
	$output .= "\n</div>\n";
	$output .= "<div class=\"sp-body".$body_class."\">\n";
	$output .= wpautop(do_shortcode($content));
	if ($collapse_link == 'true') {
		$output .= "<div class=\"spdiv\">[". __('collapse', 'bbspoiler') . "]</div>\n";
	}
	$output .= "</div>\n</div>\n";

	return $output;
}
add_shortcode ('spoiler', 'bbspoiler_shortcode');

function bbspoiler_shortcode2( $atts, $content ) {
	extract( shortcode_atts( array (
		'title' => __('Spoiler', 'bbspoiler'),
		'state' => 'folded',
		'collapse_link' => 'true'
	), $atts ) );

	$title = esc_attr( $title );
	$head_class = (esc_attr($state) == 'folded')?'':' unfolded';
	$body_class = (esc_attr($state) == 'folded')?' folded':'';

	$output  = "\n<div class=\"sp-wrap\">\n";
	$output .= "<div class=\"sp-head".$head_class."\" title=\"". __('Expand', 'bbspoiler') ."\">\n";
	$output .= $title;
	$output .= "\n</div>\n";
	$output .= "<div class=\"sp-body".$body_class."\">\n";
	$output .= wpautop(do_shortcode($content));
	if ($collapse_link == 'true') {
		$output .= "<div class=\"spdiv\">[". __('collapse', 'bbspoiler') . "]</div>\n";
	}
	$output .= "</div>\n</div>\n";

	return $output;
}
add_shortcode ('spoiler2', 'bbspoiler_shortcode2');


function bbspoiler_files() {
	$purl = plugins_url();
	
	wp_register_script('bbspoiler', $purl . '/bbspoiler/inc/bbspoiler.js');  
	wp_register_style( 'bbspoiler', $purl . '/bbspoiler/inc/bbspoiler.css' );
	
	if(!wp_script_is('jquery')) {wp_enqueue_script('jquery');}
	wp_enqueue_script('bbspoiler');
	wp_enqueue_style('bbspoiler');
	
	$lang_array = array('unfolded' 	=> __('Expand', 'bbspoiler'), 
						'folded' 	=> __('Collapse', 'bbspoiler'));
	wp_localize_script('bbspoiler', 'title', $lang_array);   
}
add_action('wp_enqueue_scripts', 'bbspoiler_files');

function bbspoiler_setup(){
    load_plugin_textdomain('bbspoiler', null, dirname( plugin_basename( __FILE__ ) ) . '/lang' );
}
add_action('init', 'bbspoiler_setup');

add_action('admin_print_footer_scripts','eg_quicktags'); 
function eg_quicktags(){
?>
<script type="text/javascript" charset="utf-8">
buttonSpoiler = edButtons.length;
edButtons[edButtons.length] = new edButton('spoiler','spoiler','[spoiler title=\'Title\']Text[/spoiler]\n');

jQuery(document).ready(function($){
    jQuery("#ed_toolbar").append('<input type="button" value="spoiler" id="ed_spoiler" class="ed_button" onclick="edInsertTag(edCanvas, buttonSpoiler);" title="Spoiler" />');
});
</script>
<?php } 

function bbspoiler_add_tinymce() {
    global $typenow;
    if( ! in_array( $typenow, array( 'post', 'page' ) ) )
        return ;
    add_filter( 'mce_external_plugins', 'bbspoiler_add_tinymce_plugin' );
    add_filter( 'mce_buttons', 'bbspoiler_add_tinymce_button' );
}
add_action( 'admin_head', 'bbspoiler_add_tinymce' );

function bbspoiler_add_tinymce_plugin( $plugin_array ) {
	$lang = get_locale(); 
	//just for .po files
	$temp = __('Title', 'bbspoiler');
	$temp = __('Spoiler', 'bbspoiler');
	$temp = __('Text', 'bbspoiler');
	$temp = __('Show collapse link?', 'bbspoiler');
	if ($lang != "ru_RU") { $plugin_array['bbspoiler_test'] = plugins_url( '/inc/bbbutton-en_US.js', __FILE__ );}
	if ($lang == "ru_RU") { $plugin_array['bbspoiler_test'] = plugins_url( '/inc/bbbutton-ru_RU.js', __FILE__ );}
    return $plugin_array;
}

// Add the button key for address via JS
function bbspoiler_add_tinymce_button( $buttons ) {
    array_push( $buttons, 'bbspoiler_test_button_key' );
    return $buttons;
}

add_filter('bbp_get_reply_content', 'bb_enable_shortcode', 10,2);
add_filter('bbp_get_topic_content', 'bb_enable_shortcode', 10,2);
function bb_enable_shortcode($content) {
	return do_shortcode($content);
}

?>