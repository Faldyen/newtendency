<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width">
		<title><?php bloginfo('name'); ?> <?php wp_title("&middot;",true); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<meta name="description" content="">

		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/normalize.min.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css">
		
		<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

		<?php wp_head(); ?>
	</head>


	<body <?php $body_class = str_replace( '/', ' ', str_replace( get_site_url(), '', get_permalink() ) ); body_class( $body_class ); ?>>
		<!--[if lt IE 7]>
			<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->
		
		<!-- FACEBOOK -->

		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=535273873152095";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

		<div class="header-container">

			<?php if ( wp_is_mobile() ) : ?>

			<header class="wrapper mobile clearfix">
				
				<a href="<?php echo get_home_url(); ?>" role="logo">
					
					<img src="<?php echo get_template_directory_uri(); ?>/img/NEW-TENDENCY-Logo.jpg" alt="NEW TENDENCY FURNITURE &amp; ACCESSORIES" />
					
				</a>
				
				<?php wp_nav_menu( array('menu' => 'primary', 'container' => 'nav', 'container_class' => 'primary' ) ); ?>
				<?php wp_nav_menu( array('menu' => 'secondary', 'container' => 'nav', 'container_class' => 'secondary' ) ); ?>
			
			</header>
			
			
			<?php else : ?>
					
			<header class="wrapper clearfix">
				
				<?php wp_nav_menu( array('menu' => 'primary', 'container' => 'nav', 'container_class' => 'primary' ) ); ?>

				<a href="<?php echo get_home_url(); ?>" role="logo">
					
					<img src="<?php echo get_template_directory_uri(); ?>/img/NEW-TENDENCY-Logo.jpg" alt="NEW TENDENCY FURNITURE &amp; ACCESSORIES" />
					
				</a>
				
				<?php wp_nav_menu( array('menu' => 'secondary', 'container' => 'nav', 'container_class' => 'secondary' ) ); ?>
								
			</header>
			
			<?php endif; ?>	
			
		</div>

		<div class="main-container<?php echo str_replace( '/', ' ', str_replace( get_site_url(), '', get_permalink() ) ); ?><?php if(is_single()) : ?>single <?php endif; ?><?php global $post; #echo get_post( $post )->post_name; ?>">
			<div class="main wrapper<?php echo str_replace( '/', ' ', str_replace( get_site_url(), '', get_permalink() ) ); ?><?php if(is_single()) : ?>single <?php endif; ?><?php global $post; #echo get_post( $post )->post_name; ?>clearfix">