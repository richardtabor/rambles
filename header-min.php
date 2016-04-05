<?php
/**
 * The Header template for our theme.
 *
 * Displays all of the <head> section that is pulled on every page.
 *
 * @package WordPress
 * @subpackage Rambles
 * @author ThemeBeans
 * @since Rambles 2.0
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