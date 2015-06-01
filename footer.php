        <footer>
					<div class="row clearfix">
						<div class="column medium-6 rights">
							<div class="row">
								<h3>health arc</h3>
								<h4>boilermakers canada</h4>
							</div>
							<div class="row hide-for-small">
								<img src="<?php bloginfo('template_url'); ?>/assets/img/logo-healtharc-footer.png" />
								<img src="<?php bloginfo('template_url'); ?>/assets/img/logo-totalworker.png" />
							</div>
							<div class="row hide-for-small">
								<h5><?php bloginfo('description'); ?></h5>
								<small>@2015 Health Arc. All Rights Reserved.</small>
							</div>
						</div>
						<div class="column medium-3 contact">
							<div class="row">
								<h5>contact us</h5>
							</div>
							<div class="row">
								<p>
									Eastern Canada Head Office:<br>
									(506) 634-8203
								</p>
							</div>
							<div class="row">
								<p>
									Western Canada Head Office:<br>
									(780) 483-0823
								</p>
							</div>
							<div class="row">
								<a class="witharrow" href='mailto:healtharc@boilermaker.ca'>healtharc@boilermaker.ca
								<img src="<?php bloginfo('template_url'); ?>/assets/img/links-arrow-footer.png" /></a>
								<a class="witharrow" href="http://boilermaker.ca">boilermaker.ca
									<img src="<?php bloginfo('template_url'); ?>/assets/img/links-arrow-footer.png" /></a>
							</div>
						</div>
						<div class="column medium-3 newsletter">
							<div class="row">
								<a class="mpop more" rel="mailchimp">
									newsletter
								</a>
							</div>
							<div class="row">
								<p>Stay current - sign up and get the latest on all things Health Arc</p>
							</div>
							<div class="menu-social-media hide">
								<?php wp_nav_menu(array('theme_location'=>'social-media-menu','container'=>'ul','menu_class'=>'wrapper-menu'));?>
							</div>
						</div>
						<div class="column medium-3 show-for-small">
							<div class="row">
								<h5><?php bloginfo('description'); ?></h5>
								<small>@2015 Health Arc. All Rights Reserved.</small>
							</div>
						</div>
					</div>
        </footer>

    </div>
</div>

<?php include 'lb-mailchimp.php' ?>
<?php include 'lb-calculator.php' ?>
<?php include 'lb-quiz-healthy-eating.php' ?>
<?php include 'lb-quiz-physical-activity.php' ?>
<?php include 'lb-quiz-health-assessment.php' ?>

<?php wp_footer(); ?>

</body>
</html>