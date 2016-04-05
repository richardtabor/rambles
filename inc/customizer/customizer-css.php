<?php
/*===================================================================*/                						
/*  THEME CUSTOMIZER STYLES	                							
/*===================================================================*/
if ( !function_exists('Bean_Customize_Variables') ) {
	function Bean_Customize_Variables() {
	
	//COLOR VARIABLES
	$theme_accent_color = get_theme_mod('theme_accent_color', '#1DA6D3');
	?>		
	
	
	
<style>
<?php
/*===================================================================*/        	
/*  THEME CUSTOMIZER COLORS/STYLES                							
/*===================================================================*/	
$customizations = 
'a:hover { color:'.$theme_accent_color.'; }

.bean_tweets_widget li span a:hover,
.main_menu > .current_page_item > a,
.comment-author a:hover,
.entry-content p a,
.bean-tabs > li.active > a,
.entry-header h1 a:hover,
.archives-list ul li a, 
h1.logo_text:hover,
.author-tag { color:'.$theme_accent_color.'!important; }

div.jp-play-bar, 
div.jp-volume-bar-value,		
.post-slider .flex-direction-nav .prev:hover,
.post-slider .flex-direction-nav .next:hover,
.tagcloud a, 
.featurearea_icon .icon ,
.comment-body .reply a:hover,
.btn, 
.button, 
.pagination-arrows a:hover,
button.button, 
a.more-link,
.entry-content a.more-link, 
.btn[type="submit"],
.button[type="submit"],
input[type="button"], 
input[type="reset"], 
input[type="submit"],
.bean-btn, 
.bean-button, 
.bean-btn[type="submit"],
.bean-button[type="submit"],
.pagination-arrows a:hover,
.entry-link:hover,
.blog .entry-quote:hover  { background-color:'.$theme_accent_color.'; }

.bean-quote { background-color:'.$theme_accent_color.'!important; }
';  




/*===================================================================*/         	
/*  BEAN PRICING TABLE PLUGIN, IF ACTIVATED	                							
/*===================================================================*/	
include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); if (is_plugin_active('bean-pricingtables/bean-pricingtables.php')) { 
	echo '.bean-pricing-table .pricing-column li span {color:'.$theme_accent_color.'!important;}#powerTip,.bean-pricing-table .pricing-highlighted{background-color:'.$theme_accent_color.'!important;}#powerTip:after {border-color:'.$theme_accent_color.' transparent!important; }';
}




/*===================================================================*/         	
/*  CUSTOM CSS	                							
/*===================================================================*/	
$customcss = get_theme_mod( 'bean_tools_css' );




/*===================================================================*/         	
/*  FINAL OUTPUT                							
/*===================================================================*/	
//COMBINE THE VARIABLES FROM ABOVE
$customizer_final_output = $customizations . $customcss;

$final_output = preg_replace('#/\*.*?\*/#s', '', $customizer_final_output);
$final_output = preg_replace('/\s*([{}|:;,])\s+/', '$1', $final_output);
$final_output = preg_replace('/\s\s+(.*)/', '$1', $final_output);
echo $final_output;
?>
</style>
<?php } add_action( 'wp_head', 'Bean_Customize_Variables', 1 );
}