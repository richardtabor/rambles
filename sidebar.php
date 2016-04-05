<?php
/**
 * The sidebar containing the default sidebar
 *
 *
 * @package WordPress
 * @subpackage Rambles
 * @author ThemeBeans
 * @since Rambles 1.0
 */
 ?>
     
<div id="branding">

	<?php get_template_part( 'content', 'logo' ); //PULL CONTENT-LOGO.PHP ?>

	<div class="site-description">
		<p><?php echo get_bloginfo ( 'description' ); ?></p>
	</div><!-- END .site-description -->
	
</div><!-- END #branding -->
 	
<?php if( has_nav_menu( 'primary-menu' ) ) { ?>
	
	<div class="widget">
		
		<h3 class="widget-title"><span><?php _e( 'Menu', 'bean' ); ?></span></h3>	
		
		<nav class="hide-for-small">	
			<div class="container">
				<div class="main_menu">
					<?php wp_nav_menu( array( 
						'theme_location' => 'primary-menu', 
						'container' => '', 
						'depth' 		=> 2,
						'menu_id' => 'primary-menu',
						'menu_class' => 'main-menu menu',
						) ); 
					?>
				</div><!-- END .main_menu -->
			</div><!-- END .container -->	
		</nav><!-- END .hide-for-small -->
	
	</div><!-- END .widget -->

<?php } //END if( has_nav_menu( 'primary-menu' ) ?>

<?php dynamic_sidebar('Internal Sidebar');