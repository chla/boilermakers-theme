<?php get_header(); ?>

<?php 
	if (have_posts()):
	while (have_posts()): the_post();
?>

<div class="pad-large"></div>

<div class="content-page single">
	<section class="body">
		<div class="row clearfix">
			<div class="line"></div>
			<div class="columns medium-4 title-area">
				<a class="back">
					<i class="fa fa-angle-left"></i>
					back
				</a>
				<div class="title">
					<h3><?php the_title(); ?></h3>
				</div>
				<div class="date">
					<h5><?php include "inc/meta.php"; ?></h5>
				</div>
				<div class="share">
					<h5>share this</h5>
					<?php include "inc/share.php"; ?>
				</div>
			</div>
			<div class="columns medium-8 content-area">
				<?php the_content(); ?>
			</div>
		</div>
	</section>
</div>

<div class="pad-large"></div>

<?php 
	endwhile;
	endif; 
	wp_reset_query();
?>


<?php get_footer(); ?>