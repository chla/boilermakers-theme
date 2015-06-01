<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
<title>
<?php
if (function_exists('is_tag') && is_tag()) {
single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
elseif (is_archive()) {
wp_title(''); echo ' Archive - '; }
elseif (is_search()) {
echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
elseif (!(is_404()) && (is_single()) || (is_page())) {
wp_title(''); echo ' - '; }
elseif (is_404()) {
echo 'Not Found - '; }
if (is_home()) { bloginfo('name'); echo ' - '; bloginfo('description'); }
else { bloginfo('name'); }
if ($paged>1) { echo ' - page '. $paged; }
?>
</title>


<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/dist/all.min.css">


<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>
<?php wp_head(); ?>

</head>