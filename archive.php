<?php get_header(); ?>

<div class="page-background cover" style="background-image:url('<?php $url = content_url(); echo $url; ?>/uploads/2013/09/WaterFoam0019_1_L.png')">
	<div class="texture alpha25"></div>
</div>

<div class="wrapper clearfix postlist no-border">
	<div class="container width">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<div <?php post_class() ?>>
			<a href="<?php the_permalink() ?>">
				<div class="pad_20 clearfix">
					<h4 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h4>
					<h5><?php include (TEMPLATEPATH . '/_inc/meta.php' ); ?></h5>
					<p><?php the_excerpt() ?></p>
					<div class="btn">
						<div class="shape"></div>
						<span>READ</span>
					</div>
				</div>
			</a>
		</div>
		
		<div class="pad_5 clearfix"></div>
		
	<?php endwhile; endif; ?>
	</div>
</div>


<div class="wrapper clearfix">
	<div class="pagination">
		<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
	</div>
</div>

<?php get_footer(); ?>