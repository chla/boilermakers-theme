<?php include 'head.php' ?>

<body>
	<?php include_once("analyticstracking.php") ?>
	<div class="out-wrap">
		<div class="in-wrap">
			
			<header id="header">
				<div class="row clearfix">					
					<div class="menu-desktop">
						<div class="logo">
							<a class="logo-desktop" href="<?php bloginfo('url'); ?>">
								<img src="<?php bloginfo('template_url'); ?>/assets/img/logo-healtharc.png" />
								<span><?php bloginfo('description'); ?></span>
							</a>
						</div>
						<?php wp_nav_menu(array('theme_location'=>'primary-menu','container'=>'ul','menu_class'=>'wrapper-menu'));?>	
					</div>
					<div class="menu-mobile">
						<div class="logo">
							<a class="logo-mobile" href="<?php bloginfo('url'); ?>">
								<img src="<?php bloginfo('template_url'); ?>/assets/img/logo-healtharc-mobile.png" />
							</a>
						</div>
						<a class="menu-toggle" href="#menu">
							<span class="icon-hamburger"></span>
							<span class="icon-icon-exit"></span>
						</a>
						<a class="search-toggle hide" href="#search"><i class="fa fa-search"></i></a>
						<?php wp_nav_menu(array('theme_location'=>'primary-menu','container'=>'ul','menu_class'=>'wrapper-menu'));?>	
					</div>					
				</div>
			</header>