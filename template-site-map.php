<?php
/**
 * Template Name: Site Map
 * The template for displaying the site map template.
 *
 * 
 * @package WordPress
 * @subpackage Rambles
 * @author ThemeBeans
 * @since Rambles 2.0
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
			
				<div class="archives-list">

				   	<ul><?php wp_list_pages('title_li='); ?></ul>
			 	
				</div><!-- END .archives-list --> 
	  	
	  		</div><!-- END .entry-content -->
	  	
	  	</div><!-- END .row -->
  
  	</section><!-- END #post-<?php the_ID(); ?> -->
  	
</div><!-- END #primary-container -->	

<?php get_footer();