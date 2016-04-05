<?php
/**
 * The template for displaying all single posts.
 *
 * 
 * @package WordPress
 * @subpackage Rambles
 * @author ThemeBeans
 * @since Rambles 1.0
 */

get_header();
setPostViews(get_the_ID()); 

//SHARING
$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$twitter_profile = get_theme_mod( 'twitter_profile' )
?>

<div id="primary-container">

	<?php 
	//LOOP
	if (have_posts()) : while (have_posts()) : the_post(); 
	
	$format = get_post_format(); 
	if( false === $format ) { $format = 'standard'; }
	if( $format == 'gallery' || $format == 'image' || $format == 'link' || $format == 'quote') { }
	get_template_part( 'inc/post-formats/content', $format ); 	
	endwhile;
	?>
	
	<div class="row">

		<?php if( get_theme_mod( 'social_sharing' ) == true ) { ?>
			
			<div class="share-btns"> 	 					
		
				<div class="post-share"> 					
					
					<a href="http://twitter.com/share?text=<?php the_title(); ?> <?php if ($twitter_profile !=''){ echo 'via @'. $twitter_profile.''; } ?>" target="_blank" class="btn post-share-btn twitter-btn"><?php _e( 'Share on Twitter', 'bean' ); ?></a>
					
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"  class="btn post-share-btn facebook-btn"><?php _e( 'Share on Facebook', 'bean' ); ?></a>

				</div><!-- END .post-share -->
			
			</div><!-- END .share-btns --> 

		<?php } ?>

		<?php if( get_theme_mod( 'about_author' ) == true ) { ?>

			<div class="about-author">
						
				<h6><?php _e('About the Author', 'radium'); ?></h6> 
			
				<?php echo get_avatar( get_the_author_meta('user_email'), '55', '' ); ?>
				
				<div class="author-right">
				
					<p><?php the_author_meta('description'); ?></p>
				
				</div><!-- END #author-right --> 
			
			</div><!-- END #about-author -->

		<?php } ?>

		<?php
		//PAGE LINK
		wp_link_pages( array(
			'before' => '<p><strong>'.__('Pages:', 'bean').'</strong> ', 
			'after' => '</p>', 
			'next_or_number' => 'number')
		);
		
		//COMMENTS
		if( bean_theme_supports( 'comments', 'posts' )) 
		{
			bean_comments_start();
			comments_template('', true);
			bean_comments_end();
		}
		
		endif; 
		?>

		<div class="pagination">
			<span class="pagination-arrows">
				<span class="page-previous">
					<?php previous_post_link('%link', 'Prev'); ?>
				</span><!-- END .page-previous -->
			</span><!-- END .pagination arrows -->
			
			<span class="pagination-arrows">
				<span class="page-next">
					<?php next_post_link('%link', 'Next'); ?>
				</span><!-- END .page-next -->
			</span><!-- END .pagination-arrows -->
		</div><!-- END .pagination -->

	</div><!-- END .row -->

</div><!-- END #primary-container -->

<script type="text/javascript">
	jQuery(window).load(function(){ 		
		if(jQuery().validate) { jQuery("#commentform").validate(); }		
		});
</script>

<?php get_footer();