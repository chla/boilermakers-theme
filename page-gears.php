<?php /* Template Name: get the gears */ ?>


<?php get_header(); ?>

<div class="content-page get-the-gear">
	<?php
	if (have_posts()):
	while (have_posts()): the_post();
	?>
	<section class="hero">
		<div class="row">
			<div class="blurb">
				<h1><?php the_title() ?></h1>
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
	<section class="section1">
		<div class="row">
			<div class="clearfix">
				<div class="middle-line"></div>
				<div class="columns large-5">
					<div class="blurb-area">
						<?php echo(types_render_field('poster-blurb')); ?>
					</div>
				</div>
				<div class="columns large-7">
					<div class="download-area">
						<ul class="clearfix">
							<?php
								$items = get_post_meta($post->ID,'wpcf-poster');
								foreach($items as $item){
									$thb="<div class='thb'><img src='".$item."'/></div>";
									$lin="<a class='download' href='".$item."' download='download'>download<i class='bm-icon-icon-dl'></i></a>";
									echo "<li class='poster'>",$thb,$lin,"</li>";
								}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="row">
		<div class="separator"></div>
	</div>
	<section class="section2">
		<div class="row">
			<div class="clearfix">
				<div class="middle-line"></div>
				<div class="columns large-5">
				<div class="blurb-area">
					<?php echo(types_render_field('tshirts-and-stickers-blurb')); ?>
				</div>
			</div>
				<div class="columns large-7">
				<div class="download-area">
					<h5>stickers</h5>
<!-- 					<ul class="clearfix">
						<?php
							$items = get_post_meta($post->ID,'wpcf-t-shirt');
							foreach($items as $item){
								$thb="<div class='thb'><img src='".$item."'/></div>";
								$lin="<a class='download' href='".$item."' download='download'>download<i class='bm-icon-icon-dl'></i></a>";
								echo "<li class='tshirt'>",$thb,"</li>";
							}
						?>
					</ul> -->
					<ul class="clearfix">
						<?php
							$items = get_post_meta($post->ID,'wpcf-sticker');
							foreach($items as $item){
								$thb="<div class='thb'><img src='".$item."'/></div>";
								$lin="<a class='download' href='".$item."' download='download'>download<i class='bm-icon-icon-dl'></i></a>";
								echo "<li class='sticker'>",$thb,"</li>";
							}
						?>
					</ul>
				</div>
			</div>
			</div>
		</div>
	</section>
	<?php
	endwhile;
	endif;
	wp_reset_query();
	?>
</div>

<?php get_footer(); ?>