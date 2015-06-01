<?php /* Template Name: Health */ ?>

<?php get_header(); ?>

<?php $pagename = get_query_var('pagename'); ?>

<div class="content-page health <?php echo $pagename; ?>">
	<?php
	if (have_posts()):
	while (have_posts()): the_post();
	?>
	<section class="hero">
		<div class="row">
			<div class="blurb">
				<h1><?php the_title(); ?><span><?php the_content(); ?></span></h1>
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
		<div class="bg" style="background-image:url('<?php echo $image[0]; ?>');"></div>
	</section>
	<section class="section1">
		<div class="row clearfix">
			<div class="columns medium-5">
					<?php echo(types_render_field('health-section1-left')); ?>
			</div>
			<div class="columns medium-7">
					<?php echo(types_render_field('health-section1-right')); ?>
			</div>
		</div>
	</section>
	<section class="section2">
		<div class="row clearfix">
			<div class="columns medium-5">
					<?php echo(types_render_field('health-section2-left')); ?>
			</div>
			<div class="columns medium-7">
					<?php echo(types_render_field('health-section2-right')); ?>
			</div>
		</div>
	</section>
	<section class="section3">
		<div class="row clearfix">
			<div class="columns medium-5">
					<?php echo(types_render_field('health-section3-left')); ?>
			</div>
			<div class="columns medium-7">
					<?php echo(types_render_field('health-section3-right')); ?>
			</div>
		</div>
	</section>
	<section class="section4">
				<?php echo(types_render_field('health-section4-full')); ?>
	</section>
	<section class="section5">
		<div class="row clearfix">
			<div class="columns medium-5">
					<?php echo(types_render_field('health-section5-left')); ?>
			</div>
			<div class="columns medium-7">
					<?php echo(types_render_field('health-section5-right')); ?>
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