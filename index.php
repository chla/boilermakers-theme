<?php /* Template Name: index */ ?>
<?php get_header(); ?>

<div class="content-page home">
	<!-- HERO -->
	<section class="homehero">
		<?php
			if (have_posts()):
			while (have_posts()): the_post();
		?>
			<div class="row">
				<div class="blurb">
					<?php the_content(); ?>
					<a class="scroll" rel="quizintro">
						scroll
						<img src="<?php bloginfo('template_url'); ?>/assets/img/ico-scroll-down.png">
					</a>
				</div>
			</div>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'full' ); ?>
			<div class="bg" style="background-image:url('<?php echo $image[0]; ?>');"></div>
		<?php
		endwhile;
		endif;
		wp_reset_query();
		?>
		<div class="nav">
			<div class="row">
				<div class="medium-8 columns">
					<div class="postlist">
						<div class="mslider">
							<ul>
								<?php
								query_posts(array('category_name'=>'blog','order'=>'DESC'));
								if (have_posts()):
								while (have_posts()): the_post();
								?>
								<li>
									<div class="container">
										<h4><?php the_title(); ?></h4>
										<p><?php the_excerpt() ?></p>
										<a class="more" href="<?php the_permalink(); ?>">
											learn more
											<i class="fa fa-angle-right"></i>
										</a>
									</div>
								</li>
								<?php
								endwhile;
								endif;
								wp_reset_query();
								?>
							</ul>
						</div>
					</div>
				</div>
				<div class="medium-4 columns">
					<div class='newsletter'>
						<div class="container">
							<h4>newsletter</h4>
							<p>Stay current - sign up and get the latest on all things Health Arc</p>
							<a href="#" class="more mpop" rel="mailchimp">
								sign up
								<i class="fa fa-angle-right"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--SECTION-->
	<section class="quizintro fullscreen">
		<?php
			query_posts(array('post_type'=>'page','post__in'=>array(38),'order'=>'DESC'));
			if (have_posts()):
			while (have_posts()): the_post();
		?>
			<div class="row">
				<div class="blurb">
					<h2 class="cusborder down">longer, healthier, more rewarding life</h2>
					<?php the_content(); ?>
					<div class="clearfix">
						<a href="#" class="btn primary mpop" rel="quiz-health-assessment">
							take the quiz
							<i class="bm-icon-icon-quiz"></i>
						</a>
				  </div>
					<div class="clearfix">
						<a class="scroll" rel="features">
							scroll
							<img src="<?php bloginfo('template_url'); ?>/assets/img/ico-scroll-down.png">
						</a>
					</div>
				</div>
			</div>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'full' ); ?>
			<div class="bg" style="background-image:url('<?php echo $image[0]; ?>');"></div>
		<?php
			endwhile;
			endif;
			wp_reset_query();
		?>
	</section>
	<!--SECTION-->
	<section class="features fullscreen">
		<ul class="col2 clearfix over">
			<li></li>
			<li>
				<?php
					query_posts(array('post_type'=>'page','post__in'=>array(11),'order'=>'DESC'));
					if (have_posts()):
					while (have_posts()): the_post();
				?>
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'full' ); ?>
				<div class="bg" style="background-image:url('<?php echo $image[0]; ?>');"></div>
				<?php
					endwhile;
					endif;
					wp_reset_query();
				?>
			</li>
			<li>
				<?php
					query_posts(array('post_type'=>'page','post__in'=>array(13),'order'=>'DESC'));
					if (have_posts()):
					while (have_posts()): the_post();
				?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'full' ); ?>
					<div class="bg" style="background-image:url('<?php echo $image[0]; ?>');"></div>
				<?php
					endwhile;
					endif;
					wp_reset_query();
				?>
			</li>
			<li>
				<?php
					query_posts(array('post_type'=>'page','post__in'=>array(15),'order'=>'DESC'));
					if (have_posts()):
					while (have_posts()): the_post();
				?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'full' ); ?>
					<div class="bg" style="background-image:url('<?php echo $image[0]; ?>');"></div>
				<?php
					endwhile;
					endif;
					wp_reset_query();
				?>
			</li>
		</ul>
		<div class="row">
			<ul class="col2 clearfix featured">
				<li>
					<div class="row">
						<div class="blurb">
							<h1>build on <br />the basics</h1>
							<h4 class="cusborder down">3 pillars of better health</h4>
							<p>Enjoying good food, activity and reducing smoking are the basics. But they are also the solution.</p>
						</div>
					</div>
				</li>
				<li>
					<?php
						query_posts(array('post_type'=>'page','post__in'=>array(11),'order'=>'DESC'));
						if (have_posts()):
						while (have_posts()): the_post();
					?>
						<div class="row">
							<div class="blurb">
								<h4>eat good food</h4>
								<p><?php the_excerpt(); ?></p>
								<a class="more" href="<?php the_permalink(); ?>">
									learn more
									<i class="fa fa-angle-right"></i>
								</a>
							</div>
							<a href="#" class="btn primary mpop hide" rel="quiz-healthy-eating">
								healthy eating quiz
								<i class="fa fa-apple"></i>
							</a>
						</div>
					<?php
						endwhile;
						endif;
						wp_reset_query();
					?>
				</li>
				<li>
					<?php
						query_posts(array('post_type'=>'page','post__in'=>array(13),'order'=>'DESC'));
						if (have_posts()):
						while (have_posts()): the_post();
					?>
						<div class="row">
							<div class="blurb">
								<h4>move it</h4>
								<p><?php the_excerpt(); ?></p>
								<a class="more" href="<?php the_permalink(); ?>">
									learn more
									<i class="fa fa-angle-right"></i>
								</a>
							</div>
							<a href="#" class="btn primary mpop hide" rel="quiz-physical-activity">
								physical activity quiz
								<i class="fa fa-bicycle"></i>
							</a>
						</div>
					<?php
						endwhile;
						endif;
						wp_reset_query();
					?>
				</li>
				<li>
					<?php
						query_posts(array('post_type'=>'page','post__in'=>array(15),'order'=>'DESC'));
						if (have_posts()):
						while (have_posts()): the_post();
					?>
						<div class="row">
							<div class="blurb">
								<h4>cut smoking</h4>
								<p><?php the_excerpt(); ?></p>
								<a class="more" href="<?php the_permalink(); ?>">
									learn more
									<i class="fa fa-angle-right"></i>
								</a>
							</div>
							<a href="#" class="btn primary mpop" rel="quiz-cost-calculator">
								cost calculator
								<i class="bm-icon-icon-calculator"></i>
							</a>
						</div>
					<?php
						endwhile;
						endif;
						wp_reset_query();
					?>
				</li>
			</ul>
		</div>
	</section>
	<!--SECTION-->
	<section class="resources">
		<div class="row">
			<ul class="col2 clearfix">
				<?php
					query_posts(array('post_type'=>'page','post__in'=>array(17),'order'=>'DESC'));
					if (have_posts()):
					while (have_posts()): the_post();
				?>
				<li>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'full' ); ?>
					<div class="bg" style="background-image:url('<?php echo $image[0]; ?>');">
					</div>
				</li>
				<li>
					<div class="blurb">
						<h2><?php the_title(); ?></h2>
						<p><?php the_excerpt(); ?></p>
						<a href="<?php the_permalink(); ?>" class="btn primary">
							find resources near you
							<i class="bm-icon-icon-pin"></i>
						</a>
					</div>
				</li>
				<?php
					endwhile;
					endif;
					wp_reset_query();
				?>
			</ul>
		</div>
	</section>
</div>

<?php get_footer(); ?>