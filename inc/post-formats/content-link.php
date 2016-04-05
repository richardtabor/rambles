<?php
/**
 *The template for displaying posts in the Link post format.
 *
 *
 * @package WordPress
 * @subpackage Rambles
 * @author ThemeBeans
 * @since Rambles 1.0
 */

//POST META
$link = get_post_meta($post->ID, '_bean_link_url', true);
?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
			
		<?php if( is_singular()) { ?>
		
		<div class="entry-content-media">
			<a target="blank" href="<?php echo esc_url($link); ?>">
				<div class="entry-link">
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<span><?php echo stripslashes( esc_html($link) ); ?></span>
				</div><!-- END .entry-link -->
			</a>
		</div><!-- END .entry-link.entry-content-media -->		
			
		<?php } else { ?>
		
			<a target="blank" href="<?php echo esc_url($link); ?>">
				<div class="entry-link">
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<span><?php echo stripslashes( esc_html($link) ); ?></span>
				</div><!-- END .entry-link -->
			</a>
			
		<?php } ?>

	</div><!-- END .row -->
</section><!-- END #post-<?php the_ID(); ?> -->