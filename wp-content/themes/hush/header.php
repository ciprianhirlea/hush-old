<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<!-- dns prefetch -->
		<link href="//www.google-analytics.com" rel="dns-prefetch">

		<!-- meta -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<!-- icons 
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon"> 
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed"> -->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>

		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700' rel='stylesheet' type='text/css'>

		<!-- css + javascript -->
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

		<header role="banner">

			<!-- desktop header -->
		<div class="desktop-header">
			<div id="header-Bg">
				<div class="row">

					<div class="large-2 small-2 columns no-padding">
						<a href="<?php bloginfo('url')?>">
							<img class="logo" src="<?php bloginfo('template_directory')?>/img/logo.jpg" />
						</a>
					</div>

					<div class="large-10 small-10 columns no-padding">
						<div id="header-contact-details">
							<div class="phone-number">07968 498 223</div> <div class="email-address"><a href="mailto:info@hushaesthetics.com">info@hushaesthetics.com</a></div>

							<div class="twitter"></div><div class="facebook"></div>
						</div>

						<nav>

							<?php  wp_nav_menu(array('menu' => 'Menu 1', 'container_class' => 'menu')) ?>

						</nav>
					</div>

				</div>
			</div>

			<div class="sticky-header display" >

				<div id="header-Bg-fixed">

					<div class="row">

					<div class="large-2 columns no-padding">
						<a href="<?php bloginfo('url')?>">
							<img class="logo-fixed" src="<?php bloginfo('template_directory')?>/img/small-logo.jpg" />
						</a>
					</div>

					<div class="large-8 columns no-padding">

						<nav>

							<?php  wp_nav_menu(array('menu' => 'Menu 1', 'container_class' => 'menu')) ?>

						</nav>
					</div>

					</div>

				</div>
			</div>
		</div>

			<!-- end of desktop header -->

			<!-- mobile header -->

		<div class="mobile-header">
			<div id="header-Bg">

				
					<a href="<?php bloginfo('url')?>">
					<div class="mobile-logo">
						<img class="logo" src="<?php bloginfo('template_directory')?>/img/logo.jpg" />
					</div>
					</a>

					<div id="header-contact-details" class="mobile">
						<div class="phone-number">07968 498 223</div> <div class="email-address"><a href="mailto:info@hushaesthetics.com">info@hushaesthetics.com</a></div>
						<br><br>
						<div class="twitter"></div><div class="facebook"></div>
					</div>

						<?php  wp_nav_menu(array('mobile-menu' => 'Menu 1', 'container_class' => 'mobile-menu', 'items_wrap' => '<ul id="mobile-menu">%3$s</ul>')) ?>
				

			</div>

		</div>

			<!-- end of mobile header -->

		</header>

		
		

		

			
