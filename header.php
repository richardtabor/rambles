<?php
/**
 * The Header template for our theme.
 *
 * Displays all of the <head> section that is pulled on every page.
 *
 * @package WordPress
 * @subpackage Rambles
 * @author ThemeBeans
 * @since Rambles 1.0
 */
 ?>
<!DOCTYPE html>
<!-- BEGIN html -->
<html <?php language_attributes(); ?>>

<head>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<?php bean_meta_head(); ?>
	
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<?php echo get_theme_mod( 'google_analytics', '' ); ?>
	
	<?php bean_head(); wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>

	<?php bean_body_start(); ?>

		<?php bean_header_start(); ?>
	
		<nav id="mobile-nav">
			<?php if ( function_exists('wp_nav_menu') ) {
				wp_nav_menu( array(
					'theme_location' => 'primary-menu'
				));
			} ?>
		</nav><!-- END #mobile-nav -->

	<div id="wrapper">	
		
		<div id="sidebar" class="three columns">
			
			<?php get_sidebar(); ?>
		
		</div><!-- END #sidebar -->
			
		<div id="content">	
			
			<div id="branding" class="show-for-small" >
			
				<?php get_template_part( 'content', 'logo' ); //PULL CONTENT-LOGO.PHP ?>
				
				<div class="site-description">
					<p><?php echo get_bloginfo ( 'description' ); ?></p>
				</div><!-- END .site-description -->
				
			</div><!-- END #branding -->