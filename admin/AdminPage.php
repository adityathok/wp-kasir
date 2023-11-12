<?php
/**
 * Admin_Page Class
 * 
 * Post type wpkasir_barang
 *
*/

namespace WPKASIR;

class Admin_Page {

    public function __construct() {
        add_action('admin_menu', array($this, 'register_admin_page'));
    }

    public function register_admin_page() {
        add_menu_page(
            __('WP Kasir', 'wp-kasir'),
            __('WP Kasir', 'wp-kasir'),
            'manage_options',
            'wpkasir-dashboard',
            array($this, 'render_admin_dashboard'),
            'dashicons-store',
            2
        );
    }

    public function render_admin_dashboard() {
        // Tampilkan konten halaman admin di sini
        ?>
        <div class="wrap">
            <h1><?php echo esc_html__('Admin Page', 'wp-kasir'); ?></h1>
            <p><?php echo esc_html__('This is a custom admin page.', 'wp-kasir'); ?></p>
        </div>
        <?php
    }
}

new Admin_Page();