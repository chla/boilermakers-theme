<ul class="wrapper-post-list clearfix">
	<?php while (have_posts()): the_post(); ?>
		<li class="clearfix cusborder down">
				<div class="thb">
					<a href="<?php the_permalink() ?>"><?php if(has_post_thumbnail()){the_post_thumbnail('medium');} ?></a>
				</div>
				<div class="blurb-area">
					<h5><?php include (TEMPLATEPATH . '/inc/meta.php' ); ?></h5>
					<a href="<?php the_permalink() ?>"><h4 class="ellipsis"><span><?php the_title(); ?></span></h4></a>
					<p class="ellipsis"><?php the_excerpt(); ?></p>
					<a href="<?php the_permalink() ?>" class="more">Read more <i class="fa fa-angle-right"></i></a>
				</div>
		</li>
	<?php endwhile; ?>
</ul>