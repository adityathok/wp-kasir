<?php
/**
 * Function public frontend wp-kasir
 *
*/

//register page template
if ( ! function_exists( 'wpkasir_register_page_template' ) ) {
    function wpkasir_register_page_template( $template ) {

        if ( is_singular() ) {
            $page_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
            if ( 'templates_app_wpkasir' === $page_template ) {
                $template = WPKASIR_PLUGIN_DIR . 'public/page-app.php';
            }
        }

        return $template;
    }
    add_filter( 'template_include', 'wpkasir_register_page_template' );
    
    function wpkasir_templates_page($post_templates) {
        $post_templates['templates_app_wpkasir'] = __( 'App WP-Kasir', 'wp-kasir' );
        return $post_templates;
    }
    add_filter( "theme_page_templates", 'wpkasir_templates_page' );
}

if ( ! function_exists( 'wpkasir_pageapp_script' ) ) {  
	/**
	 * Load JavaScript and CSS sources.
	 */  
	function wpkasir_pageapp_script() {
        wp_enqueue_style('wpkasir-app', WPKASIR_PLUGIN_URL . 'public/assets/app.css', array(), WPKASIR_VERSION, false);
    }
    add_action( 'wp_enqueue_scripts', 'wpkasir_pageapp_script' );
}