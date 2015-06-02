<?php /* Template Name: local resources */ ?>

<?php get_header(); ?>

<div class="content-page local-resources">
	<div class="pad-large"></div>
	<section id="hero" class="hero">
		<div class="row">
			<?php
				if (have_posts()):
					while (have_posts()): the_post();
			?>
				<h1><?php the_title(); ?></h1>
			<?php
				endwhile;
				endif;
				wp_reset_query();
			?>
		</div>
	</section>
	<div class="pad-large"></div>
	<section class="head">
		<div class="row clearfix nav">
			<h4>search</h4>
			<div class="dropdown location">
				<ul>
					<li><a href="resource-location">All Locations</a></li>
					<?php wp_list_categories('orderby=name&child_of=10&hierarchical=0&title_li='); ?>
				</ul>
				<span class="drop">
					<i class="fa fa-angle-down"></i>
				</span>
			</div>
			<div class="dropdown subject">
				<ul>
					<li><a href="resource-subject">All Subjects</a></li>
					<?php wp_list_categories('orderby=name&child_of=25&hierarchical=0&title_li='); ?>
				</ul>
				<span class="drop">
					<i class="fa fa-angle-down"></i>
				</span>
			</div>
		</div>
		<div class="row clearfix filter-info">
			<h2><span class="location"></span><span class="subject"></span></h2>
		</div>
	</section>
	<section class="body">
		<div class="row clearfix list">
			<ul class="clearfix" id="resource-results">
			<?php
			  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			  $args = array (
			   'post_type' => 'local-resource',
			   'order' => 'ASC',
			   'posts_per_page' => 9,
			   'paged'=> $paged
			  );
			  $list_of_posts = new WP_Query( $args );
			  $temp_query = $wp_query;
			  $wp_query   = NULL;
			  $wp_query   = $list_of_posts;
				if ( $list_of_posts->have_posts() ) :
				while ( $list_of_posts->have_posts() ) : $list_of_posts->the_post();
			?>
					<li>
						<div class="container">
						<div class="title">
							<strong><?php the_title(); ?></strong>
						</div>
						<div class="address">
							<?php the_content() ?>
						</div>
						<div class="link">
							<?php if(types_render_field('resource-web-site')){ ?>
							<a target="_blank" href="<?php echo(types_render_field('resource-web-site',array("output"=>"raw"))); ?>">
								website
								<img src="<?php bloginfo('template_url'); ?>/assets/img/links-arrow-footer.png" />
							</a>
							<?php }; ?>
						</div>
						<div class="phone">
							<?php if(types_render_field('resource-phone')){ ?>
							<p><?php echo(types_render_field('resource-phone')); ?></p>
							<?php }; ?>
						</div>
						<div class="gmap">
							<?php if(types_render_field('resource-address')){ ?>
							<a target="_blank"
							href="http://maps.google.com/?q=<?php echo(types_render_field('resource-address',array("output"=>"raw"))); ?>">
								Get Direction
								<i class="fa fa-map-marker"></i>
							</a>
							<?php }; ?>
						</div>
						</div>
					</li>
			<?php
				endwhile;
			?>
			</ul>
			<div class="noresults hide">
				<p>No result. Try to broaden your search..
			</div>
			<div class="cta clearfix">
				<a class="btn primary loadmore">load more</a>
			</div>
			<?php
				endif;
				wp_reset_postdata();
			?>
		</div>
	</section>
	<div class="pad-large"></div>
</div>

<?php get_footer(); ?>