<?php
function libraries(){
	$blogurl=get_bloginfo('template_url');
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery',''.$blogurl.'/assets/components/jquery/dist/jquery.min.js',false,'1',true);
		wp_enqueue_script('jquery');
		wp_register_script('jqueryui',''.$blogurl.'/assets/components/jquery-ui/jquery-ui.min.js',false,'1',true);
		wp_enqueue_script('jqueryui');
		wp_register_script('hammer',''.$blogurl.'/assets/components/hammerjs/hammer.min.js',false,'1',true);
		wp_enqueue_script('hammer');
		wp_register_script('jqhammer',''.$blogurl.'/assets/components/jquery-hammerjs/jquery.hammer.js',false,'1',true);
		wp_enqueue_script('jqhammer');
		wp_register_script('ellipsis',''.$blogurl.'/assets/components/jQuery.dotdotdot/src/js/jquery.dotdotdot.min.js',false,'1',true);
		wp_enqueue_script('ellipsis');
		wp_register_script('miraculous',''.$blogurl.'/assets/dist/concat.min.js',false,'1',true);
		wp_enqueue_script('miraculous');
	}
}
add_action('wp_enqueue_scripts','libraries');
?>