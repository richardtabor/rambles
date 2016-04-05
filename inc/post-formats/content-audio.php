<?php
/**
 *The template for displaying posts in the Audio post format.
 *
 *
 * @package WordPress
 * @subpackage Rambles
 * @author ThemeBeans
 * @since Rambles 1.0
 */

//AUDIO META
$audio_poster = get_post_meta($post->ID, '_bean_audio_poster_url', true);
?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>		

	<div class="row">
	
		<div class="entry-header">
			   
			<div class="entry-content-media">
				<div class="post-thumb">
					<?php if ( $audio_poster ) { echo '<img src='. $audio_poster .' class="wp-post-image"/>'; } ?>
				</div><!-- END .post-thumb -->
		
				<?php bean_audio($post->ID); ?>
		
			</div><!-- END .entry-content-media -->
	
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