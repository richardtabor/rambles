<?php
/**
 * The template for displaying the header title content.
 *
 *
 * @package WordPress
 * @subpackage Rambles
 * @author ThemeBeans
 * @since Rambles 2.0
 */

if (is_archive()) { ?>

	<div class="row page-entry-meta">

	    <h1 class="entry-title">
	    
    	    <?php if(is_tag() ): ?>
    		    <?php printf( __( 'Tagged: %s', 'bean' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?>
    		    
    		    <?php $tag_description = tag_description();
    		    if ( ! empty( $tag_description ) )
    		    	echo apply_filters( 'tag_archive_meta', '<h3>' . $tag_description . '</h3>' ); ?>
    		
    		<?php elseif (is_category() ) : ?>
    		    <?php printf( __( 'Category: %s', 'bean' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
    		    
    		    <?php $category_description = category_description();
    		    	if ( ! empty( $category_description ) )
    		    		echo apply_filters( 'category_archive_meta', '<h3>' . $category_description . '</h3>' ); ?>
    		
    		<?php elseif ( is_day() ) : ?>
    			<?php printf( __( 'Daily Archives: %s', 'bean' ), '<span>' . get_the_date() . '</span>' ); ?>
    		
    		<?php elseif ( is_month() ) : ?>
    			<?php printf( __( 'Monthly Archives: %s', 'bean' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'bean' ) ) . '</span>' ); ?>
    		
    		<?php elseif ( is_year() ) : ?>
    			<?php printf( __( 'Yearly Archives: %s', 'bean' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'bean' ) ) . '</span>' ); ?>
    		
    		<?php elseif ( is_author() ) : ?>
    		    <?php _e( 'Author Archive', 'bean' ); ?> <span> <?php get_the_author(); ?></span>
    		
    		<?php elseif (  bean_theme_supports( 'plugin', 'bbpress' ) && bbp_get_topic_tag_tax_id() ) : ?>
    		    <?php printf( __( 'Topic Tag: %s', 'bean' ), '<span>' . bbp_get_topic_tag_name() . '</span>' ); ?>
    		
    		<?php else : ?>
    			<?php printf(  __( 'Archives', 'bean' ) ); ?>
    		
    		<?php endif; ?>

		</h1><!-- END .entry-title -->

	</div><!-- END .row page-entry-meta -->

<?php } elseif( is_search() ) { ?>	

	<h1 class="entry-title"><?php printf( __('Search Results', 'bean'), get_search_query()); ?></h1>

<?php } elseif ( 'post'== get_post_type() ) { 

	$blog = get_post(get_option('page_for_posts')); 
	?>

<?php } elseif ( 'page'== get_post_type() && is_front_page()) {
	
	$frontpage = get_post(get_option('page_on_front')); ?>

	<h1 class="entry-title"><?php the_title(''); ?></h1>

<?php } else { ?>

 	<h1 class="entry-title"><?php the_title(''); ?></h1>
 	
 	<?php if( get_post_meta( $post->ID, '_bean_subtitle', true ) ) { ?>
 	
 		<h3><?php echo get_post_meta( $post->ID, '_bean_subtitle', true ); ?></h3>
 	
 	<?php } ?>
 	
<?php }