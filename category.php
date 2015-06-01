<?php get_header(); ?>
<?php $pagename = get_query_var('pagename'); ?>
<div class="content-page blog">
	<?php
	query_posts(array('post_type'=>'page','post__in'=>array(28),'order'=>'DESC'));
	if (have_posts()):
	while (have_posts()): the_post();
	?>
	<section id="hero" class="hero">
		<div class="row">
			<div class="blurb">
				<h1><?php the_title(); ?><span><?php the_content(); ?></span></h1>
			</div>
		</div>
		<div class="bg btm">
			<?php
			if(types_render_field('header-image')){
				echo(types_render_field('header-image'));
			} else if(has_post_thumbnail()){
				the_post_thumbnail('full');
			}
			?>
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
			<?php include 'sidebar.php' ?>
			<div class="columns medium-9 post-list">
				<?php if (have_posts()): ?>
					<!-- POSTS -->
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