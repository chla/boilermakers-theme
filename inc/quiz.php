<section class="hero">
	<div class="row">
		<div class="blurb">
			<div class="logo">
				<img src="<?php bloginfo('template_url'); ?>/assets/img/logo-healtharc-quiz.png" />
			</div>
			<div class="title cusborder up">
				<h1 class="cusborder down"><?php the_title() ?></h1>
			</div>
			<div class="intro">
				<?php the_content() ?>
			</div>
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
	</div>
</section>
<section class="section-head">
	<div class="row clearfix">
		<ul class="title TabNav clearfix">
			<li><h5>quiz</h5></li>
			<li class="disabled"><h5>result</h5></li>
		</ul>
		<div class="horLine"></div>
	</div>
</section>
<section class="section-body">
	<div class="row clearfix">
		<ul class="Tab">
			<li class="questions">
				<?php echo(types_render_field('questions'));  ?>
			</li>
			<li class="results">
				<h4>your results</h4>
				<div class="clearfix">
					<?php echo(types_render_field('answers'));  ?>
					<div class="share">
						<h4>Challenge a friend<h4>
						<?php include "share.php"; ?>
					</div>
				</div>
				<div class="cta">
					<a class="btn secondary backToQuiz">back</a>
					<a class="btn secondary popclose">close</a>
				</div>
			</li>
		</ul>
	</div>
</section>
<section class="section-footer">
	<div class="row">
		<div class="btm">
			<h5>a boilermaker total health program</h5>
		</div>
	</div>
</section>
<div class="pad-large"></div>