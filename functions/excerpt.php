<?php
// Changing excerpt length
function new_excerpt_length($length) {
	return 26;
}
add_filter('excerpt_length', 'new_excerpt_length');
// Allow Excerpt for pages
add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
	add_post_type_support( 'page', 'excerpt' );
};
//Remove p tag
remove_filter('the_excerpt', 'wpautop');
?>
