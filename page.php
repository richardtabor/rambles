<?php
/**
 *  The template for displaying all pages
 *
 *  This is the template that displays all pages by default.
 *  Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 *  @package WordPress
 *  @subpackage Rambles
 *  @author ThemeBeans
 *  @since Rambles 1.0
 */

get_header(); ?>

<div id="primary-container">

	<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	

		<div class="row">
			
			<div class="page-header">
				<?php get_template_part( 'content-header' ); ?>
			</div><!-- END .page-header -->

			<div class="entry-content">
				<?php while ( have_posts() ) : the_post(); the_content(); endwhile; // THE LOOP ?>
			
				<?php the_content(); ?>
	  	
	  		</div><!-- END .entry-content -->
	  	
	  	</div><!-- END .row -->
  
  	</section><!-- END #post-<?php the_ID(); ?> -->
  	
</div><!-- END #primary-container -->	

<?php get_footer();