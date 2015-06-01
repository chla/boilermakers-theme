<?php get_header(); ?>
<?php $pagename = get_query_var('pagename'); ?>


<div class="content-page default <?php echo $pagename; ?>">
	<?php
	if (have_posts()):
	while (have_posts()): the_post();
	?>
	<section id="hero" class="hero">
		<div class="row">
			<div class="blurb">
				<h1><?php the_title() ?></h1>
			</div>
		</div>
		<?php
			if(types_render_field('header-image')){
				$image_render = types_render_field('header-image');
				$image = array();
				preg_match( '/src="(.*?)"/i', $image_render, $image ) ;
				$image[0] = $image[1];
			} else if(has_post_thumbnail()){
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'full' );
			}
		?>
		<div class="bg" style="background-image:url('<?php echo $image[0]; ?>');">
		</div>
	</section>
	<section class="body">
		<div class="row">
			<div class="columns medium-5 leftside">

			</div>
			<div class="columns medium-7 rightside">
					<?php the_content() ?>
			</div>
		</div>
	</section>
	<?php
	endwhile;
	endif;
	wp_reset_query();
	?>
</div>

<?php get_footer(); ?>