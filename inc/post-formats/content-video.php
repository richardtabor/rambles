<?php
/**
 *The template for displaying posts in the Video post format.
 *
 *
 * @package WordPress
 * @subpackage Rambles
 * @author ThemeBeans
 * @since Rambles 1.0
 */
 
//META 
$embed = get_post_meta($post->ID, '_bean_video_embed', true);
?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>		
	
	<div class="row">
		
		<div class="entry-header">
	
			<div class="entry-content-media">
				<?php 
				if( !empty($embed) ) {
				echo "<div class='video-frame animated BeanFadeIn'>";
				    echo stripslashes(htmlspecialchars_decode($embed));
				echo "</div>";
				} ?>
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