<?php
/**
 * Produk Class
 * 
 * Post type wpkasir_produk
 *
*/

namespace WPKASIR;

class Produk {

	protected $post_type    = 'wpkasir_produk';
	protected $taxonomy     = 'wpkasir_kategori_produk';

    public function autoload(){
        add_action('init', array($this, 'register_taxonomy'));
        add_action('init', array($this, 'register_post_type'));
        add_filter('rwmb_meta_boxes', array($this, 'register_meta_boxes'));
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
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => $this->post_type),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 3,
            'supports'           => array('title', 'thumbnail')
        );

        register_post_type($this->post_type, $args);
    }
    
    public function register_taxonomy() {
        $args = array(
            'labels'            => [
                'name'          => __('Kategori Produk', 'text-domain'),
                'singular_name' => __('Kategori Produk', 'text-domain'),
                'menu_name'     => __('Kategori Produk', 'text-domain'),
            ],
            'public'            => true,
            'hierarchical'      => true,
            'show_admin_column' => true,
            'rewrite'           => array('slug' => $this->taxonomy),
            'show_ui'           => true,
            'query_var'         => true
        );
        register_taxonomy($this->taxonomy, $this->post_type, $args);
    }

    public function register_meta_boxes($meta_boxes){  
        $prefix = '';

        $meta_boxes[] = [
            'title'      => esc_html__( 'Detail Produk', 'wp-kasir' ),
            'id'         => 'detail_wpkasir_produk',
            'post_types' => [$this->post_type],
            'context'    => 'after_title',
            'fields'     => [
                [
                    'type' => 'text',
                    'name' => esc_html__( 'KODE', 'wp-kasir' ),
                    'id'   => $prefix . 'kode',
                    'desc' => esc_html__( 'Kode Produk', 'wp-kasir' ),
                    'std'  => rand(100000,999999),
                ],
                [
                    'type' => 'number',
                    'name' => esc_html__( 'Harga', 'wp-kasir' ),
                    'id'   => $prefix . 'harga',
                    'desc' => esc_html__( 'angka tanpa tanda baca', 'wp-kasir' ),
                    'std'  => 1000,
                ],
                [
                    'type' => 'number',
                    'name' => esc_html__( 'Stok', 'wp-kasir' ),
                    'id'   => $prefix . 'stok',
                ],
                [
                    'type' => 'textarea',
                    'name' => esc_html__( 'Deskripsi', 'wp-kasir' ),
                    'id'   => $prefix . 'deskripsi',
                ],
            ],
        ];

        return $meta_boxes;
    }
}

$Produk = new Produk;
$Produk->autoload();