<?php
/**
 * The template for displaying the footer
 *
 *
 * @package WordPress
 * @subpackage Rambles
 * @author ThemeBeans
 * @since Rambles 2.0
 */

bean_content_end();

bean_body_end(); //PULLS DEBUG INFO  

wp_footer(); ?>

<!--<?php echo ''. BEAN_THEME_NAME .' WordPress Theme (ThemeBeans.com) with '. $wpdb->num_queries .' queries in '. timer_stop(0, 2) .' seconds'; ?>-->

</body>
</html>