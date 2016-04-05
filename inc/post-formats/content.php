<?php
/**
 * The default template for displaying content for the standard post.
 *
 *
 * @package WordPress
 * @subpackage Rambles
 * @author ThemeBeans 
 * @since Rambles 1.0
 */
 ?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>		
	
	<div class="row">
		
		<div class="entry-header">
		   
			<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
				<div class="entry-content-media">
					<div class="post-thumb">
						<?php
						if( is_singular() ) 
							{ the_post_thumbnail('post-feat'); }			
						else { ?><a title="<?php printf(__('Permanent Link to %s', 'bean'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-feat'); ?></a>	
							<?php 
						} ?>
					</div><!-- END .post-thumb -->
				</div><!-- END .entry-content-media -->
			<?php } //END if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) ?>
	
			<h1 class="entry-title">
				<?php
				if( is_singular() ) { the_title(); } else { // IF SINGLE ?>
					<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bean' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>				
				<?php } ?>
			</h1><!-- END .entry-title -->
			
			<?php get_template_part( 'content', 'post-meta' ); ?>
		
		</div><!-- END .entry-header -->
	
		<article class="entry-content">
			<?php the_content( __( '<span>Read More</span>', 'bean' ) ); ?>
		</article><!-- END .entry-content -->

	</div><!-- END .row -->		

</section><!-- END #post-<?php the_ID(); ?> -->