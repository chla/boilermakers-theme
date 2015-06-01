<?php

add_action("init","register_my_menus");
function register_my_menus() {
	register_nav_menus(
	array(
		"primary-menu" => __( "primary-menu" ),
		"social-media-menu" => __("social-media-menu"),
		)
	);
}

?>