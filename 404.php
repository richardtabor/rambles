<?php
/**
 * The template for displaying the 404 error page
 * This page is set automatically, not through the use of a template
 *
 * @package WordPress
 * @subpackage Rambles
 * @author ThemeBeans
 * @since Rambles 1.0
 */
 
get_header('min'); ?>
  
<div id="primary-container">

	<div class="row">

		<div class="four columns centered">
		
			<h1 class="entry-title"><?php echo get_theme_mod( 'error_title' ); ?></h1>
			
			<p><?php echo get_theme_mod( 'error_text' ); ?></p>
			
			<p>&larr; <b><a href="javascript:javascript:history.go(-1)"><?php _e( 'Go Back', 'bean' ); ?></a></b><?php _e( ' or ', 'bean' ); ?><b><a href="<?php echo home_url(); ?>"><?php _e( 'Go Home', 'bean' ); ?></a></b> &rarr;</p>
		
		</div><!-- END .four.columns.centered -->

	</div><!-- END .row -->

</div><!-- END #primary-container -->

<?php get_footer('min');