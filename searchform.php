<?php
/**
 * The template for displaying the default searchform whenever it is called in the theme.
 *
 * @package WordPress
 * @subpackage Rambles
 * @author ThemeBeans
 * @since Rambles 1.0
 */
 ?>

<form method="get" id="searchform" class="searchform" action="<?php echo home_url(); ?>/">
	<input type="text" name="s" id="s" value="<?php _e('Type, hit enter... ', 'bean') ?>" onfocus="if(this.value=='<?php _e('Type, hit enter... ', 'bean') ?>')this.value='';" onblur="if(this.value=='')this.value='<?php _e('Type, hit enter... ', 'bean') ?>';" />
</form><!-- END #searchform -->