<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ForeFront_Starter
 */
$logo 				= get_field('logo', 'options');
$meta_title 		= get_field('meta_title');
$meta_description 	= get_field('meta_description');
$keywords 			= get_field('keywords');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<?php if($meta_title) { ?>
			<title><?php echo $meta_title; ?></title>
		<?php } ?>
		<?php if($meta_description) { ?>
			<meta name="description" content="<?php echo $meta_description; ?>" />
		<?php } ?>
		<?php if($keywords) { ?>
			<meta name="keywords" content="<?php echo $keywords; ?>">
		<?php } ?>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php wp_head(); ?>
		<?php 
			include_once(ABSPATH . 'wp-admin/includes/plugin.php'); 
			if(is_plugin_active('advanced-custom-fields-pro/acf.php')) {
		?>
			<?php if(have_rows('header_scripts', 'options')) : ?>
				<?php while(have_rows('header_scripts', 'options')) : the_row(); ?>
					<?php 
						$script = get_sub_field('script');
					?>
					<?php echo $script; ?>
				<?php endwhile; ?>
			<?php endif; ?>

			<?php if(have_rows('page_specific_scripts')) : ?>
				<?php while(have_rows('page_specific_scripts')) : the_row(); ?>
					<?php 
						$script = get_sub_field('script');
					?>
					<?php echo $script; ?>
				<?php endwhile; ?>
			<?php endif; ?>
		<?php } ?>
	</head>
	<body <?php body_class(); ?>>
		<header id="masthead" class="site-header">
			<div class="section-wrap">
				<div class="inner">
					<div class="logo-nav-wrap">
						<div class="logo-burger">
							<?php if($logo) { ?>
								<div class="logo-wrap" data-aos="fade-down">
									<a href="<?php echo bloginfo('url'); ?>" title="<?php echo bloginfo('name'); ?>" rel="home">
										<img src="<?php echo $logo; ?>" class="header-logo" />
									</a>
								</div>
							<?php } ?>
							<div class="burger-wrap" data-aos="zoom-in-down" data-aos-delay="200">
								<div class="hamburger hamburger--spin nav-toggle">
									<span class="hamburger-box">
										<span class="hamburger-inner"></span>
									</span>
								</div>
							</div>
						</div>
						<?php get_template_part('template-parts/navs/nav', 'primary'); ?>
					</div>
				</div>
			</div>
		</header>