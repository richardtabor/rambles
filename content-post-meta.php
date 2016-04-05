<?php
/**
 * The file is for displaying the blog post meta.
 * This has it's own content file because we call it among various post formats.
 * If you edit this file, its output will be edited on all post formats.
 *  
 *   
 * @package WordPress
 * @subpackage Rambles
 * @author ThemeBeans
 * @since Rambles 1.0
 */
 ?>

<div class="entry-meta">
	<ul>
		<li><?php the_time(get_option('date_format')); ?></li><span>&middot;</span>
		<li><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author(); ?></a></li><span>&middot;</span>
		<li><?php echo getPostViews(get_the_ID()); ?><?php _e( ' Views', 'bean' ); ?></li><span>&middot;</span>
		<li><?php comments_popup_link(__('0 Comments', 'bean'), __('1 Comment', 'bean'), __('% Comments', 'bean')); ?></li>
		<li class="post-edit-link"><?php edit_post_link( __( '[Edit]', 'bean' )); ?></li>
	</ul>
</div><!-- END .entry-meta -->