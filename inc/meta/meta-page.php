<?php
/**
 * The file is for creating the page post type meta. 
 * Meta output is defined on the page editor.
 * Corresponding meta functions are located in framework/metaboxes.php
 *
 *  
 * @package WordPress
 * @subpackage Rambles
 * @author ThemeBeans
 * @since Rambles 1.0
 */
 
add_action('add_meta_boxes', 'bean_metabox_page');
function bean_metabox_page(){

$prefix = '_bean_';




/*===================================================================*/
/*  PAGE META SETTINGS							   			          							
/*===================================================================*/
$meta_box = array(
	'id' => 'page-meta',
	'title' =>  __('Page Meta Settings', 'bean'),
	'page' => 'page',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name'		=> 'Page Subtitle:',
			'id' 		=> $prefix.'subtitle',
			'type'		=> 'text',
			'std' 		=> '',
			'desc'		=> 'Add a subtitle to this page.'
		),
	)
);
bean_add_meta_box( $meta_box );
} // END function bean_metabox_page()