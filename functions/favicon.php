<?php
add_action( 'wp_head', 'my_favicon');
function my_favicon(){ 
	$blogurl = get_bloginfo('template_url');
	$favurl = '/assets/img/favicon.png';
	echo "<link href='".$blogurl."/".$favurl."'  rel='shortcut icon' />";
};
?>