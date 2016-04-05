<?php
/**
 * The file is for creating the blog post type meta. 
 * Meta output is defined on the page editor.
 * Corresponding meta functions are located in framework/metaboxes.php
 *
 *  
 * @package WordPress
 * @subpackage Rambles
 * @author ThemeBeans
 * @since Rambles 1.0
 */
 
add_action('add_meta_boxes', 'bean_metabox_post');
function bean_metabox_post(){

$prefix = '_bean_';




/*===================================================================*/              							
/*  AUDIO POST FORMAT SETTINGS						   			          							
/*===================================================================*/
$meta_box = array(
	'id' => 'bean-meta-box-audio',
	'title' =>  __('Audio Post Format Settings', 'bean'),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( "name" => __('MP3 File URL:','bean'),
				"desc" => __('Upload or link to an MP3 file.','bean'),
				"id" => $prefix."audio_mp3",
				"type" => "file",
				"std" => ''
			),
		array( 
			'name' => __('Poster Image:', 'bean'),
			'desc' => __('Upload or link a poster image.', 'bean'),
			'id' => $prefix.'audio_poster_url',
			'type' => 'file',
			'std' => ''
			),	
	),
);
bean_add_meta_box( $meta_box );




/*===================================================================*/	
/*  GALLERY POST FORMAT SETTINGS						   			          							
/*===================================================================*/
$meta_box = array(
	'id' => 'bean-meta-box-gallery',
	'title' => __('Gallery Post Format Settings', 'bean'),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( 
			'name' => 'Gallery Images:',
			'desc' => 'Upload images here for your gallery post. Once uploaded, drag & drop to reorder.',
			'id' => $prefix .'post_upload_images',
			'type' => 'images',
			'std' => __('Browse & Upload', 'bean')
			),		
		array(
			'name'     => __('Randomize Gallery:', 'bean'),
			'id' => $prefix.'post_randomize',
			'type' => 'checkbox',
			'desc' => __('Randomize the gallery on page load.', 'bean'),
			'std' => false 
			),		
    )
);
bean_add_meta_box( $meta_box ); 




/*===================================================================*/               							
/*  LINK POST FORMAT SETTINGS							   			          							
/*===================================================================*/
$meta_box = array(
	'id' => 'bean-meta-box-link',
	'title' =>  __('Link Post Format Settings', 'bean'),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( "name" => __('Link URL:','bean'),
				"desc" => __('ex: http://themebeans.com','bean'),
				"id" => $prefix."link_url",
				"type" => "text",
				"std" => 'http://'
			),
	),
	
);
bean_add_meta_box( $meta_box );




/*===================================================================*/               							
/*  QUOTE POST FORMAT SETTINGS							   			          							
/*===================================================================*/
$meta_box = array(
	'id' => 'bean-meta-box-quote',
	'title' =>  __('Quote Post Format Settings', 'bean'),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( "name" => __('Quote Text:','bean'),
				"desc" => __('Insert your quote into this textarea.','bean'),
				"id" => $prefix."quote",
				"type" => "textarea",
				"std" => ''
			),
		array( "name" => __('Quote Source:','bean'),
				"desc" => __('Who said the quote above?','bean'),
				"id" => $prefix."quote_source",
				"type" => "text",
				"std" => ''
			),	
	),
	
);
bean_add_meta_box( $meta_box );




/*===================================================================*/               							
/*  VIDEO POST FORMAT SETTINGS						   			          							
/*===================================================================*/
$meta_box = array(
	'id' => 'bean-meta-box-video',
	'title' =>  __('Video Post Format Settings', 'bean'),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( "name" => __('Embeded Code:','bean'),
				"desc" => __('Add in your video embeded code here.','bean'),
				"id" => $prefix."video_embed",
				"type" => "textarea",
				"std" => ''
			),
	)
);
bean_add_meta_box( $meta_box );
} // END function bean_metabox_post()