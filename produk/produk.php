<?php
/**
 * Produk Class
 * 
 * Post type wpkasir_produk
 *
*/

namespace WPKASIR;
use WP_REST_Server;

class Produk {

	protected $post_type    = 'wpkasir_produk';
	protected $kategori     = 'wpkasir_kategori_produk';
	protected $brand        = 'wpkasir_brand_produk';

    public function autoload(){
        add_action('init', array($this, 'register_taxonomy'));
        add_action('init', array($this, 'register_post_type'));
        add_filter('cmb2_admin_init', array($this, 'register_meta_boxes'));
    }
    
    public function register_post_type(){        
        $labels = array(
            'name'               => __('Produk', 'wp-kasir'),
            'singular_name'      => __('Produk', 'wp-kasir'),
            'menu_name'          => __('Produk Kasir', 'wp-kasir'),
            'name_admin_bar'     => __('Produk', 'wp-kasir'),
            'add_new'            => __('Tambah', 'wp-kasir'),
            'add_new_item'       => __('Tambah Produk Baru', 'wp-kasir'),
            'new_item'           => __('Produk Baru', 'wp-kasir'),
            'edit_item'          => __('Edit Produk', 'wp-kasir'),
            'view_item'          => __('Lihat Produk', 'wp-kasir'),
            'all_items'          => __('Semua Produk', 'wp-kasir'),
            'search_items'       => __('Cari Produk', 'wp-kasir'),
            'parent_item_colon'  => __('Parent Produk:', 'wp-kasir'),
            'not_found'          => __('Tidak ada produk ditemukan.', 'wp-kasir'),
            'not_found_in_trash' => __('Tidak ada produk di sampah.', 'wp-kasir')
        );
        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => false,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => $this->post_type),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 3,
            'supports'           => array('title', 'thumbnail'),
            'show_in_rest'       => true,
            'menu_icon'          => 'dashicons-store'
        );

        register_post_type($this->post_type, $args);
    }
    
    public function register_taxonomy() {
        $args = array(
            'labels'            => [
                'name'          => __('Kategori Produk', 'wp-kasir'),
                'singular_name' => __('Kategori Produk', 'wp-kasir'),
                'menu_name'     => __('Kategori Produk', 'wp-kasir'),
            ],
            'public'            => true,
            'hierarchical'      => true,
            'show_admin_column' => true,
            'rewrite'           => array('slug' => $this->kategori),
            'show_ui'           => true,
            'query_var'         => true
        );
        register_taxonomy($this->kategori, $this->post_type, $args);

        $args_brand = array(
            'labels'            => [
                'name'          => __('Brand Produk', 'wp-kasir'),
                'singular_name' => __('Brand Produk', 'wp-kasir'),
                'menu_name'     => __('Brand Produk', 'wp-kasir'),
            ],
            'public'            => true,
            'hierarchical'      => true,
            'show_admin_column' => true,
            'rewrite'           => array('slug' => $this->brand),
            'show_ui'           => true,
            'query_var'         => true
        );
        register_taxonomy($this->brand, $this->post_type, $args_brand);
    }

    public function register_meta_boxes(){
        $cmb = new_cmb2_box( array(
            'id'            => 'produk_metabox',
            'title'         => __( 'Detail Produk', 'wp-kasir' ),
            'object_types'  => array( $this->post_type ), 
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true,
        ) );
        $cmb->add_field( array(
            'name'          => __( 'SKU', 'wp-kasir' ),
            'desc'          => __( 'Stock Keeping Unit / Kode Unik Produk', 'wp-kasir' ),
            'id'            => 'sku',
            'type'          => 'text',
            'attributes'    => array(
                'required'  => 'required',
            ),
        ) );
        $cmb->add_field( array(
            'name'          => __( 'Harga', 'wp-kasir' ),
            'desc'          => __( '', 'wp-kasir' ),
            'id'            => 'harga',
            'type'          => 'text_money',
            'attributes'    => array(
                'required'  => 'required',
            ),
            'before_field' => 'Rp ',
        ) );
        $cmb->add_field( array(
            'name'          => __( 'Harga Promo', 'wp-kasir' ),
            'desc'          => __( '', 'wp-kasir' ),
            'id'            => 'harga_promo',
            'type'          => 'text_money',
            'before_field'  => 'Rp ',
        ) );
        $cmb->add_field( array(
            'name'          => __( 'Deskripsi Produk', 'wp-kasir' ),
            'desc'          => __( '', 'wp-kasir' ),
            'id'            => 'deskripsi',
            'type'          => 'wysiwyg',
        ) );
    }
}

$Produk = new Produk;
$Produk->autoload();