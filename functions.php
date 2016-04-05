<?php
/**
 * This is the theme's functions.php file.
 * This file loads the theme's constants.
 * Please be cautious when editing this file, errors here cause big problems.
 *
 *
 * @package WordPress
 * @subpackage Rambles
 * @author ThemeBeans
 * @since Rambles 1.0
 *
 *
 * CONTENTS:
 * 1. THEME FEATURES FILTER
 * 2. LOAD FRAMEWORK
 * 3. GENERAL THEME SETUP
 * 4. ADD OUR SCRIPTS
 * 5. REGISTER WIDGET AREAS
 * 6. THEME SPECIFIC FUNCTIONS
 */

/*===================================================================*/
/* 1. THEME FEATURES FILTER
/*===================================================================*/
do_action( 'bean_pre' );

//FEATURE SETUP
if ( !function_exists( 'bean_feature_setup' ) )
{
	function bean_feature_setup()
	{
		$args = array(
			'primary' => array(
				'adminstyles'		=> true,
				'customizer'		=> true,
				'edd' 			=> false,
				'free'              => true,
				'fonts'			=> false,
				'hideadminbar'      => false,
				'meta'			=> true,
				'seo'		 	=> true,
				'widgets'			=> true,
				'widgetareas'		=> true,
				'updates'			=> false,
				),
			'plugins' => array(
				'notice'			=> true,
				'portfolio'		=> false,
				'shortcodes'		=> true,
				'twitter'			=> true,
				'instagram'		=> true,
				'social'			=> true,
				'pricingtables'	=> true,
				'500px'			=> true,
				),
			'comments' => array(
				'pages'			=> false,
				'posts'			=> true,
				),
			'debug' => array(
				'footer'			=> false,
				'queries'			=> false,
				),
		);

		return apply_filters( 'bean_theme_config_args', $args );
	}
	add_action('bean_init', 'bean_feature_setup');
} //END if ( !function_exists( 'bean_feature_setup' ) )

//FEATURE SETUP RETURN
function bean_theme_supports( $group, $feature )
{
	$setup = bean_feature_setup();
	if( isset( $setup[$group][$feature] ) && $setup[$group][$feature] )
		return true;
	else
		return false;
}




/*===================================================================*/
/* 2. LOAD FRAMEWORK
/*===================================================================*/
function bean_load_framework()
{
	do_action( 'bean_pre_framework' );

	// FRAMEWORK FUNCTIONS
	$tempdir = get_template_directory();
	require_once($tempdir .'/framework/functions/bean-admin-init.php');
	require_once($tempdir .'/inc/functions/init.php');

	// THEME CUSTOMIZER
	if( bean_theme_supports( 'primary', 'customizer' ))
	{
		require( BEAN_CUSTOMIZER_DIR . '/customizer.php' );
		require( BEAN_CUSTOMIZER_DIR . '/customizer-css.php' );

			//CUSTOMIZER CSS
		    function bean_customizer_ui_css() 
		    {
		        wp_register_style('customizer-ui-css', BEAN_CUSTOMIZER_URL . '/assets/css/customizer-ui.css', 'all');
		        wp_enqueue_style('customizer-ui-css');
		    }
		    add_action( 'customize_controls_print_scripts', 'bean_customizer_ui_css' );
		    
	    	//CUSTOMIZER JS
	        function bean_customizer_ui_js()
	        {    
	            wp_register_script('customizer-ui-js', BEAN_CUSTOMIZER_URL . '/assets/js/customizer-ui.js', 'jquery');
	            wp_enqueue_script('customizer-ui-js');
	        }
			add_action( 'customize_controls_print_scripts', 'bean_customizer_ui_js' );
    
	} //END if( bean_theme_supports( 'primary', 'customizer' ))
	

} //END function bean_load_framework()

add_action( 'bean_init', 'bean_load_framework' );

/* RUN THE BEAN_INIT HOOK */
do_action( 'bean_init' );

/* RUN THE BEAN_SETUP HOOK */
do_action( 'bean_setup' );




/*===================================================================*/
/* 3. GENERAL THEME SETUP
/*===================================================================*/
if ( !function_exists( 'bean_theme_setup' ) )
{
	function bean_theme_setup()
	{
		// MENUS
		register_nav_menus( array(
			'primary-menu' => __( 'Primary Navigation', 'bean' )
		));

		// TRANSLATION
		load_theme_textdomain( 'bean', get_template_directory() . '/languages' );

		// THUMBNAILS
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size( 150, 150 );
		add_image_size( 'post-feat', 9999, 9999, false  );

		// FEED LINKS
		add_theme_support( 'automatic-feed-links' );

		// POST FORMATS
		add_theme_support('post-formats', array('gallery', 'link', 'quote', 'video', 'audio'));

		// CONTENT WIDTH
		if ( ! isset( $content_width ) ) $content_width = 1280;
	}
}
add_action('after_setup_theme', 'bean_theme_setup');




/*===================================================================*/
/* 4. ADD OUR SCRIPTS
/*===================================================================*/
if ( !function_exists( 'bean_enqueue_scripts') )
{
	function bean_enqueue_scripts()
	{
		// STYLESHEETS
	 	wp_enqueue_style('main', get_stylesheet_directory_uri(). '/style.css', false, '1.0', 'all');
		wp_enqueue_style('mobile', get_stylesheet_directory_uri(). '/assets/css/mobile.css',false,'1.0','all');
		
		// REGISTER SCRIPTS
		wp_register_script('validation', 'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js', 'jquery', '1.9', true);
		wp_register_script('custom', get_template_directory_uri() . '/assets/js/custom.js', 'jquery', '1.0', TRUE);
		wp_register_script('custom-libraries', get_template_directory_uri() . '/assets/js/custom-libraries.js', 'jquery', '1.0', TRUE);
		wp_register_script('retina', get_template_directory_uri() . '/assets/js/retina.js', 'jquery', '1.0', TRUE);

		// ENQUEUE SCRIPTS
		wp_enqueue_script('jquery');
		wp_enqueue_script('custom');
		wp_enqueue_script('custom-libraries');
		
		// CONDITIONALLY LOADED ENQUEUE SCRIPTS
		if( get_theme_mod( 'retina_option' ) == true) {
			wp_enqueue_script('retina');
		}

		if ( is_page_template('page-contact.php') || is_singular('post') ) {
			wp_enqueue_script('validation');
		}

		if ( is_singular('post') && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
	} //END function bean_enqueue_scripts()

	add_action( 'wp_enqueue_scripts', 'bean_enqueue_scripts');

} //END if ( !function_exists( 'bean_enqueue_scripts') )




/*===================================================================*/
/* 5. REGISTER WIDGET AREAS	
/*===================================================================*/
if ( !function_exists( 'bean_widget_areas_init' ) ) 
{
	function bean_widget_areas_init() 
	{
		register_sidebar(array(
			'name' => __('Internal Sidebar', 'bean'),
			'description' => __('Widget area for the primary sidebar.', 'bean'),
			'id' => 'internal-sidebar',
			'before_widget' => '<div class="widget %2$s clearfix">',
			'after_widget' => '</div>',
			'before_title' => '<h6 class="widget-title">',
			'after_title' => '</h6>',
		));
	} //END function bean_widget_areas_init()

	add_action( 'widgets_init', 'bean_widget_areas_init' );
	
} //END if ( !function_exists( 'bean_widget_areas_init' ) )








/*===================================================================*/
/*
/* THEME SPECIFIC FUNCTIONS
/*
/*===================================================================*/

/*===================================================================*/             							
/*  LOOP BY VIEWS - VIEW COUNT FUNCTION 								               							
/*===================================================================*/
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0';
    }
    return $count;
}

function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}




/*===================================================================*/             							
/*  ONLY SEARCH POSTS & PAGES 								               							
/*===================================================================*/
function bean_search_filter($query) 
{
	if ( !$query->is_admin && $query->is_search) 
		{
			//$query->set('post_type', array('post', 'page') ); UNCOMMENT THIS AND COMMENT BELOW TO ENABLE PAGE SEARCH
			$query->set('post_type', array('post') );
		}
	return $query;
}
add_filter( 'pre_get_posts', 'bean_search_filter' );




/*===================================================================*/
/*  CUSTOM COMMENT OUTPUT
/*===================================================================*/
if ( !function_exists( 'bean_comment' ) )
{
	function bean_comment($comment, $args, $depth)
	{
	    $isByAuthor = false;

	    if($comment->comment_author_email == get_the_author_meta('email')) {
	        $isByAuthor = true;
	    }

	    $GLOBALS['comment'] = $comment; ?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<div id="comment-<?php comment_ID(); ?>">

				<div class="comment-author vcard">
					 <?php echo get_avatar($comment,$size='45'); ?>
					<?php printf(__('<cite class="fn">%s</cite> ', 'bean'), get_comment_author_link()) ?> <?php if($isByAuthor) { ?><span class="author-tag"><?php _e('(Author)', 'bean') ?></span><?php } ?>
				</div><!-- END .comment-author.vcard -->

				<div class="comment-meta commentmetadata subtext">
					<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s', 'bean'), get_comment_date()) ?></a><span>&middot;</span><?php edit_comment_link(__('Edit', 'bean'),'  ','<span>&middot;</span>') ?>  <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div><!-- END .comment-meta.commentmetadata.subtext -->

				<div class="comment-body">
					<?php if ($comment->comment_approved == '0') : ?>
						<em class="moderation"><?php _e('Your comment is awaiting moderation.', 'bean') ?></em><br />
					<?php endif; ?>
				<?php comment_text() ?>
				</div><!-- END .comment-body -->

			</div><!-- END #comment-<?php comment_ID(); ?> -->
		</li>
	<?php
	} //END function bean_comment($comment, $args, $depth)
} //END if ( !function_exists( 'bean_comment' ) )




/*===================================================================*/
/*  CUSTOM PING OUTPUT
/*===================================================================*/
if ( !function_exists( 'bean_ping' ) )
{
	function bean_ping($comment, $args, $depth)
	{
	    $GLOBALS['comment'] = $comment; ?>

		<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>

		<?php
	} //END //function bean_ping($comment, $args, $depth)
}//END if ( !function_exists( 'bean_ping' ) )




/*===================================================================*/
/*	COMMENTS FORM
/*===================================================================*/
 function bean_custom_form_filters( $args = array(), $post_id = null ) {

	global $id;

	if ( null === $post_id )
		$post_id = $id;
	else
		$id = $post_id;

	$commenter = wp_get_current_commenter();
	$user = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';
		
	$fields =  array(
		'author' => '
			<div class="comment-form-author clearfix">
				<label for="author">' . __( 'Name', 'bean' ) . ( '<span class="required">*</span>' ) . '</label>
				<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"/>
			</div>',
		
		'email'  => '
			<div class="comment-form-email clearfix">
				<label for="email">' . __( 'Email', 'bean' ) . ( '<span class="required">*</span>' ) . '</label>
				<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"/>
			</div>',
		
		'url'    => '
			<div class="comment-form-url clearfix">
				<label for="url">' . __( 'Website', 'bean') . '</label>
				<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />
			</div>',
	);
	 
	$defaults = array(
		'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'        => '
			<div class="comment-form-comment clearfix">
				<label for="url">' . __( 'Comment', 'bean') . '<span class="required">*</span></label>
				<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
			</div>',
		
		'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'bean' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'bean' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'comment_notes_before' => null,
		'comment_notes_after'  => null,
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'title_reply'          => sprintf( __( '', 'bean') ), 
		'title_reply_to'       => __( 'Leave a Reply to %s', 'bean' ),
		'cancel_reply_link'    => __( 'Cancel', 'bean' ),
		'label_submit'         => __( 'Submit Comment', 'bean' ),
	);
		
	return $defaults;

}

add_filter( 'comment_form_defaults', 'bean_custom_form_filters' );