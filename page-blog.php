<?php /* Template Name: blog */ ?>

<?php get_header(); ?>

<div class="content-page blog">
	<!-- HERO -->
	<?php
	if (have_posts()):
	while (have_posts()): the_post();
	?>
	<section id="hero" class="hero">
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
		<div class="bg" style="background-image:url('<?php echo $image[0]; ?>'); background-size: cover; background-position: center center;">
		</div>
	</section>
	<?php
	endwhile;
	endif;
	wp_reset_query();
	?>
	<div class="pad-large"></div>
	<!-- POST LIST -->
	<section class="body">
		<div class="row">
			<div class="middle-line"></div>
			<?php include 'sidebar.php' ?>
			<div class="columns medium-9 post-list">
				<?php
					query_posts(array('category_name'=>'blog','order'=>'DESC','posts_per_page'=>'4','paged'=> $paged));
					if (have_posts()):
				?>
					<!-- BLOG POST LIST -->
					<?php include "inc/blogpost.php"; ?>
					<!-- PAGINATION -->
					<div class="pagination clearfix">
						<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
					</div>
				<?php
					endif;
					wp_reset_query();
				?>
			</div>
		</div>
	</section>
	<div class="pad-large"></div>
</div>

<?php get_footer(); ?>




