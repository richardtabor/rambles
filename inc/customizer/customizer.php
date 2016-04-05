<?php 
/*===================================================================*/                							
/*  LIVE PREVIEW EDITING (JS) - GRABS THE JS		                							
/*===================================================================*/
add_action( 'customize_preview_init', 'bean_customizer_live_preview' );
function bean_customizer_live_preview() {
	wp_enqueue_script('customizer', BEAN_CUSTOMIZER_URL . '/assets/js/customizer-preview.js', 'jquery', '1.0', true);
}



/*===================================================================*/                							
/*  THEME CUSTOMIZER FUNCTIONS		                							
/*===================================================================*/

//add_theme_support( 'custom-header' ); NO SUPPORT NECESSARY
add_theme_support( 'custom-background' );

add_action( 'customize_register', 'Bean_Customize_Register' );
function Bean_Customize_Register( $wp_customize ) 
{


//REQUIRE CUSTOM CONTROLS
require_once( BEAN_FRAMEWORK_FUNCTIONS_DIR . '/bean-admin-customizer-controls.php' );


/*===================================================================*/         	
/*  MOVE STUFF TO OTHER SECTIONS               							
/*===================================================================*/	
//SITE TITLE/DESC
$wp_customize->get_control( 'blogname' )->section='logo';
$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
$wp_customize->get_control( 'blogname' )->priority=1;

$wp_customize->get_control( 'blogdescription' )->section='logo';
$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
$wp_customize->get_control( 'blogdescription' )->priority=2;

//BACKGROUND
$wp_customize->remove_section( 'background_image');
$wp_customize->get_control( 'background_color' )->section='background';
$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
$wp_customize->get_control( 'background_color' )->priority=98;
$wp_customize->get_setting( 'background_color' )->default='#FFF';

$wp_customize->get_control( 'background_image' )->section='background';
$wp_customize->get_setting( 'background_image' )->transport = 'postMessage';
$wp_customize->get_control( 'background_image' )->priority=99;

$wp_customize->get_control( 'background_repeat' )->section='background';
$wp_customize->get_setting( 'background_repeat' )->transport = 'postMessage';
$wp_customize->get_control( 'background_repeat' )->priority=100;

$wp_customize->get_control( 'background_position_x' )->section='background';
$wp_customize->get_setting( 'background_position_x' )->transport = 'postMessage';
$wp_customize->get_control( 'background_position_x' )->priority=101;

$wp_customize->get_control( 'background_attachment' )->section='background';
$wp_customize->get_setting( 'background_attachment' )->transport = 'postMessage';
$wp_customize->get_control( 'background_attachment' )->priority=102;




/*===================================================================*/         	
/*  LOGO SECTION			                							
/*===================================================================*/	
$wp_customize->add_section( 'logo', array(
        'title' => __( 'Site Title & Tagline', 'bean' ),
        'priority' => 1,
    )
);




/*===================================================================*/         	
/*  THEME SETTINGS SECTION			                							
/*===================================================================*/	
$wp_customize->add_section( 'theme_settings', array(
        'title' => __( 'Theme Settings', 'bean' ),
        'priority' => 2,
    )
);
	
	$wp_customize->add_setting( 'retina_option', array( 'default' => false ) );
	$wp_customize->add_control( 'retina_option',
	    array(
	        'type' => 'checkbox',
	        'label' => __( 'Enable Retina.js', 'bean' ),
	        'section' => 'theme_settings',
	        'priority' => 1,
	    )
	);
	
	$wp_customize->add_setting( 'framework_seo', array( 'default' => true ) );
	$wp_customize->add_control( 'framework_seo',
	    array(
	        'type' => 'checkbox',
	        'label' => __( 'Enable Framework SEO', 'bean' ),
	        'section' => 'theme_settings',
	        'priority' => 2,
	    )
	);


	
	
/*===================================================================*/         	
/*  GENERAL SETTINGS SECTION			                							
/*===================================================================*/		
$wp_customize->add_section( 'general_settings', array(
        'title' => __( 'General Settings', 'bean' ),
        'priority' => 3,
    )
);
	
	$wp_customize->add_setting( 'img-upload-login-logo', array() );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'img-upload-login-logo', array(
		'label' 	=> __( 'Login Logo', 'bean' ),
		'section' 	=> 'general_settings',
		'settings' 	=> 'img-upload-login-logo',
		'priority' 	=> 2
	) ) );
	
	$wp_customize->add_setting( 'img-upload-logo', array() );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'img-upload-logo', array(
		'label' 	=> __( 'Logo', 'bean' ),
		'section' 	=> 'general_settings',
		'settings' 	=> 'img-upload-logo',
		'priority' 	=> 1
	) ) );
	
	$wp_customize->add_setting( 'img-upload-favicon', array() );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'img-upload-favicon', array(
		'label' 	=> __( 'Favicon', 'bean' ),
		'section' 	=> 'general_settings',
		'settings' 	=> 'img-upload-favicon',
		'priority' 	=> 4
	) ) );
	
	$wp_customize->add_setting( 'img-upload-apple_touch', array() );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'img-upload-apple_touch', array(
		'label' 	=> __( 'Apple Touch Icon', 'bean' ),
		'section' 	=> 'general_settings',
		'settings' 	=> 'img-upload-apple_touch',
		'priority' 	=> 5
	) ) );

    $wp_customize->add_setting( 'google_analytics', array( 'default' => '' ) );
    $wp_customize->add_control( new Bean_Customize_Textarea_Control( $wp_customize, 'google_analytics', array(
            'label' => __( 'Google Analytics Script', 'bean' ),
            'section' => 'general_settings',
            'settings' => 'google_analytics',
            'priority' => 8
    ) ) );	
	
	
	
	
/*===================================================================*/                							
/*  DIVIDER SECTION			                							
/*===================================================================*/
	$wp_customize->add_section('divider1', array('priority' => 4 ));
	$wp_customize->add_setting('divider1');
	$wp_customize->add_control('divider1', array('section' => 'divider1'));




/*===================================================================*/                							
/*  BACKGROUND SECTION			                							
/*===================================================================*/
	$wp_customize->add_section( 'background', array(
	        'title' => __( 'Background', 'bean' ),
	        'priority' => 5,
	    )
	);

	
	
	
/*===================================================================*/                							
/*  COLORS SECTION			                							
/*===================================================================*/
	$wp_customize->add_section( 'custom_styles', array(
	        'title' => __( 'Custom Styles', 'bean' ),
	        'priority' => 6,
	    )
	);
	
	// THEME ACCENT COLOR
	$wp_customize->add_setting( 'theme_accent_color', array(
		'default' => '#1DA6D3',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_accent_color', array(
		'label'   	=> __( 'Accent Color', 'bean' ),
		'section' 	=> 'custom_styles',
		'settings'  => 'theme_accent_color',
		'priority' 	=> 1
	) ) );
	
	
	
	
/*===================================================================*/                							
/*  DIVIDER SECTION			                							
/*===================================================================*/	
	$wp_customize->add_section('divider2', array('priority' => 9 ));
	$wp_customize->add_setting('divider2');
	$wp_customize->add_control('divider2', array('section' => 'divider2'));		




/*===================================================================*/         	
/*  BLOG SETTINGS SECTION			                							
/*===================================================================*/		
$wp_customize->add_section( 'blog_settings', array(
        'title' => __( 'Blog Settings', 'bean' ),
        'priority' => 11,
    )
);	

	$wp_customize->add_setting( 'about_author', array( 'default' => true, ) );
	$wp_customize->add_control( 'about_author',
	    array(
	        'type' => 'checkbox',
	        'label' => __( 'Display About the Author', 'bean' ),
	        'section' => 'blog_settings',
	        'priority' => 1,
	    )
	);

	$wp_customize->add_setting( 'social_sharing', array( 'default' => true, ) );
	$wp_customize->add_control( 'social_sharing',
	    array(
	        'type' => 'checkbox',
	        'label' => __( 'Display Post Sharing', 'bean' ),
	        'section' => 'blog_settings',
	        'priority' => 2,
	    )
	);

	$wp_customize->add_setting( 'twitter_profile', array('default' => ''));
	$wp_customize->add_control( 'twitter_profile',
	array(
		'label' => __( 'Twitter Username (eg:ThemeBeans)', 'bean' ),
		'section' => 'blog_settings',
		'type' => 'text',
		'priority' => 3,
		)
	 );


	
	
/*===================================================================*/                						
/*  CONTACT TEMPLATE SECTION			                							
/*===================================================================*/		
$wp_customize->add_section( 'contact_settings', array(
        'title' => __( 'Contact Template', 'bean' ),
        'priority' => 12,
    )
);
	
	$wp_customize->add_setting( 'hide_required', array( 'default' => false, ) );
	$wp_customize->add_control( 'hide_required',
	    array(
	        'type' => 'checkbox',
	        'label' => __( 'Hide Required Asterisks', 'bean' ),
	        'section' => 'contact_settings',
	        'priority' => 2,
	    )
	);
	
	$wp_customize->add_setting( 'admin_custom_email',array( 'default' => '',));
	$wp_customize->add_control( 'admin_custom_email',
	    array(
	        'label' => __( 'Contact Form Email', 'bean' ),
	        'section' => 'contact_settings',
	        'type' => 'text',
	        'priority' => 4,
	    )
	);
	
	$wp_customize->add_setting('contact_button_text',array( 'default' => 'Send Message',));
	$wp_customize->add_control('contact_button_text',
	    array(
	        'label' => __( 'Contact Button Text', 'bean' ),
	        'section' => 'contact_settings',
	        'type' => 'text',
	        'priority' => 5,
	    )
	);
	
	
	

/*===================================================================*/         	
/*  404 PAGE SECTION			                							
/*===================================================================*/		
$wp_customize->add_section( '404_settings', array(
        'title' => __( '404 Error Settings', 'bean' ),
        'priority' => 200,
    )
);	

	$wp_customize->add_setting( 'error_title',array( 'default' => 'Shucks.' ));
	$wp_customize->add_control( 'error_title',
	    array(
	        'label' => __( '404 Header', 'bean' ),
	        'section' => '404_settings',
	        'type' => 'text',
	        'priority' => 1,
	    )
	);
	
	$wp_customize->add_setting( 'error_text',array( 'default' => 'Unfortunately, this page is long gone.' ));
	$wp_customize->add_control( 'error_text',
	    array(
	        'label' => __( '404 Text', 'bean' ),
	        'section' => '404_settings',
	        'type' => 'text',
	        'priority' => 2,
	    )
	);	
	
	
	

/*===================================================================*/                							
/*  DIVIDER SECTION			                							
/*===================================================================*/
$wp_customize->add_section('divider3', array('priority' => 201 ));
$wp_customize->add_setting('divider3');
$wp_customize->add_control('divider3', array('section' => 'divider3'));	




/*===================================================================*/                						
/*  CUSTOM CSS SECTION			                							
/*===================================================================*/	
$wp_customize->add_section( 'tools', array(
        'title' => __( 'Tools CSS', 'bean' ),
        'priority' => 200,
    )
);
		
$default_css =
'/*
List your Custom CSS in this textarea. All your styles will be 
minimized and printed in the theme header. 
You are free to remove this note. Enjoy! 

CSS for Beginners: http://www.w3schools.com/css/
*/
';		

$wp_customize->add_setting( 'bean_tools_css', array( 'default' => $default_css ) );
$wp_customize->add_control( new Bean_Customize_Textarea_Control( $wp_customize, 'bean_tools_css', array(
        'label' => __( 'Custom CSS Editor', 'bean' ),
        'section' => 'tools',
        'settings' => 'bean_tools_css',
        'priority' => 8
) ) );




/*===================================================================*/                							
/*  TRANSPORTS FOR LIVE PREVIEW EDITING		                							
/*===================================================================*/
	//LIVE HTML
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'contact_button_text' )->transport = 'postMessage';
}