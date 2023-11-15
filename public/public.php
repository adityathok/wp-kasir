<?php
/**
 * Function public frontend wp-kasir
 *
*/

//register page template
add_filter( 'template_include', 'wpkasir_register_page_template' );
function wpkasir_register_page_template( $template ) {

    if ( is_singular() ) {
        $page_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
        if ( 'templates_app_wpkasir' === $page_template ) {
            $template = WPKASIR_PLUGIN_DIR . 'public/page-app-wpkasir.php';
        }
    }

    return $template;
}
function wpkasir_templates_page($post_templates) {
    $post_templates['templates_app_wpkasir'] = __( 'App WP-Kasir', 'wp-kasir' );
    return $post_templates;
}
add_filter( "theme_page_templates", 'wpkasir_templates_page' );
