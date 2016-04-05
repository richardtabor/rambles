<?php
/**
 * Template Name: Post Archives
 * The template for displaying the post archives template.
 *
 * 
 * @package WordPress
 * @subpackage Rambles
 * @author ThemeBeans
 * @since Rambles 1.0
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

				   	<h6><?php _e( 'Last 30 Posts', 'bean' );?></h6>
			
					   	<ul>
							<?php $archive_30 = get_posts('numberposts=30');
							foreach($archive_30 as $post) : ?>
							<li><a href="<?php the_permalink(); ?>"><?php the_title();?></a></li>
							<?php endforeach; ?>
						</ul>
			   			  
				   	<h6><?php _e( 'Monthly Archive', 'bean' );?></h6>
			
				   		<ul><?php wp_get_archives('type=monthly'); ?></ul>
			
				   	<h6><?php _e( 'Category Archive', 'bean' );?></h6>
				   	
				   		<ul><?php wp_list_categories( 'title_li=' ); ?></ul>
			 	
				</div><!-- END .archives-list --> 
	  	
	  		</div><!-- END .entry-content -->
	  	
	  	</div><!-- END .row -->
  
  	</section><!-- END #post-<?php the_ID(); ?> -->
  	
</div><!-- END #primary-container -->	

<?php get_footer();