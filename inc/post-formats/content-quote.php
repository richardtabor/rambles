<?php
/**
 * The template for displaying posts in the Quote post format.
 *
 *
 * @package WordPress
 * @subpackage Rambles
 * @author ThemeBeans
 * @since Rambles 1.0
 */
 
//POST META
$quote = get_post_meta($post->ID, '_bean_quote', true);
$quote_source = get_post_meta($post->ID, '_bean_quote_source', true);
?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">

		<?php if( is_singular()) { ?>
		
		<div class="entry-quote">
			<h1 class="entry-title"><?php echo stripslashes( esc_html($quote) ); ?></h1>
			<span><?php echo stripslashes( esc_html($quote_source) ); ?></span>
		</div><!-- END .entry-quote.entry-content-media -->
		
		<article class="entry-content">
			<?php the_content( __( '<span>Read More</span>', 'bean' ) ); ?>
		</article><!-- END .entry-content -->
			
		<?php } else { ?>
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bean' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">	
				<div class="entry-quote">
					<h1 class="entry-title"><?php echo stripslashes( esc_html($quote) ); ?></h1>
					<span><?php echo stripslashes( esc_html($quote_source) ); ?></span>
				</div><!-- END .entry-quote -->
			</a>
		<?php } ?>
	
	</div><!-- END .row -->
</section><!-- END #post-<?php the_ID(); ?> -->