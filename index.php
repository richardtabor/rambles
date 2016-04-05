<?php
/**
 * The main template file.
 * 
 * @package Frontline
 * @since RadiumFramework 1.0.0
 */

get_header(); 


?>

<div id="primary-container">
			
	<?php // THE LOOP
	if (have_posts()) : while (have_posts()) : the_post(); 
		$format = get_post_format(); 
		if( false === $format ) { $format = 'standard'; }
		if( $format == 'gallery' || $format == 'image' || $format == 'link' || $format == 'quote') { }
		get_template_part( 'inc/post-formats/content', $format ); 
	endwhile; endif; 
	?>

</div> <!-- END #primary-container -->
 
<?php get_footer();