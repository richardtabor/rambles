<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Rambles
 * @author ThemeBeans
 * @since Rambles 1.0
 */

get_header(); ?>

<div id="primary-container">

	<section class="page type-page">

		<?php if ( have_posts() ) { ?>

			<div class="hfeed">
				<?php // THE LOOP
				if (have_posts()) : while (have_posts()) : the_post(); 
				$format = get_post_format(); 
				if( false === $format ) { $format = 'standard'; }
				if( $format == 'aside' || $format == 'gallery' || $format == 'image' || $format == 'link' || $format == 'quote') { }
					get_template_part( 'inc/post-formats/content', $format ); 	
				endwhile; endif; 
				?>
			</div><!-- END .hfeed -->

		<?php } else { ?>	

			<div class="row">
	
				<div class="page-header">
					<?php get_template_part( 'content-header' ); ?>
				</div><!-- END .page-header -->

				<div class="entry-content">

					<p><?php printf( __('Sorry, but we couldn&#39;t find anything for "%s".','bean'), get_search_query() ); ?></p>
					
					<form method="get" id="searchform" class="searchform search" action="<?php echo home_url(); ?>/">
						<input type="text" name="s" id="s" value="<?php _e('To search type & hit enter', 'bean') ?>" onfocus="if(this.value=='<?php _e('To search type & hit enter', 'bean') ?>')this.value='';" onblur="if(this.value=='')this.value='<?php _e('To search type & hit enter', 'bean') ?>';" />
					</form><!-- END #searchform -->

				</div><!-- END .entry-content -->

			</div><!-- END .row -->

		<?php } //END else ?>		
  	
  	</section><!-- END #post-<?php the_ID(); ?> -->
  	
</div><!-- END #primary-container -->

<?php get_footer();