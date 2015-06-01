<div id="quiz-cost-calculator" class="mpopup calculator fill">
	<div class="container">
		<?php
			query_posts(array('post_type'=>'page','name'=>'cost-calculator'));
			if (have_posts()):
			while (have_posts()): the_post();
		?>
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
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'full' ); ?>
			<div class="bg" style="background-image:url('<?php echo $image[0]; ?>');"></div>
		</section>
		<div class="pad-large"></div>
		<section class="section1">
			<div class="row">
				<table>
					<tbody>
						<tr>
							<td>
								<h2>I've spent $</h2>
							</td>
							<td>
								<input class="cal num" id="unit-pac" type="text" min="0" placeholder="0" />
							</td>
							<td>
								<h2>per pack</h2>
							</td>
						</tr>
						<tr>
							<td>
								<h2>and smoked</h2>
							</td>
							<td>
								<input class="cal num" id="unit-cig" type="text" min="0" placeholder="0" />
							</td>
							<td>
								<h2>cigarettes a day</h2>
							</td>
						</tr>
						<tr>
							<td>
								<h2>for</h2>
							</td>
							<td>
								<input class="cal num" id="unit-yea" type="text" min="0" placeholder="0" />
							</td>
							<td>
								<h2>years</h2>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</section>
		<section class="section2">
			<div class="row">
				<div class="cusborder up"></div>
				<div class="arrow-down"></div>
				<div class="result">
					<div class="row">
						<div class="columns medium-4">
							<h3>$<span id="costWeek">0.00</span></h3>
							<h5>a week</h5>
						</div>
						<div class="columns medium-4">
							<h3>$<span id="costMonth">0.00</span></h3>
							<h5>a month</h5>
						</div>
						<div class="columns medium-4">
							<h3>$<span id="costYear">0.00</span></h3>
							<h5>a year</h5>
						</div>
					</div>
					<div class="row ">
						<div class="columns medium-12">
							<h1>$<span id="savings">0.00</span></h1>
							<h5>total savings</h5>
						</div>
					</div>
				</div>
				<div class="cusborder down"></div>
			</div>
		</section>
		<section class="section3">
			<div class="row">
				<div class="columns medium-8">
					<h5>additional info</h5>
				</div>
				<div class="columns medium-4">
					<h5>Challenge a friend</h5>
					<?php include "inc/share.php"; ?>
				</div>
			</div>
		</section>
		<section class="section4">
			<div class="row">
				<div class="cta">
					<a class="btn secondary scroll" rel="mpoptop">recalculate</a>
					<a class="btn secondary popclose">close</a>
				</div>
				<div class="btm">
					<h5>a boilermaker total health program</h5>
				</div>
			</div>
		</section>
		<div class="pad-large"></div>
		<?php
			endwhile;
			endif;
			wp_reset_query();
		?>
	</div>
</div>