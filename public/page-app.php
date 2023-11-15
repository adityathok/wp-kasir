<?php
/**
 * Template Name: App WP-Kasir
 *
 * Template for displaying a App WP-Kasir page.
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php wpzaro_bs_colormode(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php wpzaro_body_attributes(); ?>>
    
    <?php
    // disable admin bar
    add_filter('show_admin_bar', '__return_false');
    // Navbar
    require_once(WPKASIR_PLUGIN_DIR . 'public/app-navbar.php');

    ///get page
    $pg = isset($_GET['pg'])?$_GET['pg']:'';
    switch ($pg) {
        case 'produk':
            require_once(WPKASIR_PLUGIN_DIR . 'public/app-produk.php');
            break;        
        default:
            require_once(WPKASIR_PLUGIN_DIR . 'public/app-main.php');
            break;
    }
    ?>

</body>

<?php wp_footer(); ?>

</html>