<?php get_header(); ?>

<div class="content-page no-result">
	<?php 
	if (have_posts()):
	while (have_posts()): the_post(); 
	?>
	<section id="hero" class="hero">
		<div class="row">
			<div class="blurb">
				<h1>404</h1>
			</div>
			<div class="bg">
				<?php 
				if(types_render_field('header-image')){
					echo(types_render_field('header-image')); 
				} else if(has_post_thumbnail()){
					the_post_thumbnail('full');
				}
				?>
			</div>
		</div>
	</section>
	<div class="pad-large"></div>
	<section id="section1">
		<div class="row">
			No Result Found.
		</div>
	</section>
	<div class="pad-large"></div>
	<?php 
	endwhile;
	endif;
	wp_reset_query(); 
	?>
</div>

<?php get_footer(); ?>











