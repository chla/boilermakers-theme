
<?php get_header(); ?>

<?php if (have_posts()) : ?>

<div class="container width search">
	<div class="wrapper clearfix">
		<div class="single">
			<div class="head">
				<div class="pad_20">
					<h4 id="post-<?php the_ID(); ?>">Search Results for:</h4>
					<a><?php the_search_query();  ?></a>
				</div>
			</div>
		</div>
	</div>

	<div class="pad_10"></div>

	<div class="wrapper clearfix postlist">
		
		<?php while ( have_posts() ) : the_post(); ?>
			<div <?php post_class() ?>>
					<a href="<?php the_permalink() ?>">
						<div class="pad_20">
							<?php get_template_part( 'content', get_post_format() ); ?>
							<h4 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h4>
							<?php include (TEMPLATEPATH . '/_inc/meta.php' ); ?>
							<p><?php the_excerpt() ?></p>
							<div class="btn">
								<div class="shape"></div>
								<span>READ</span>
							</div>
						</div>
					</a>
			</div>
			
			<div class="pad_3"></div>
		<?php endwhile; ?>
		
	</div>
</div>

<?php else : ?>
	
<div class="container width search">
	
	<div class="wrapper clearfix">
		<div class="single">
			<div class="head">
				<div class="pad_20">
					<h4>No Result was found.</h4>
					<p>Try an other key word.</p>
				</div>
			</div>
		</div>
	</div>
	
</div>

<?php endif; ?>


<?php get_footer(); ?>

