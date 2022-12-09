<?php
if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>
<?php
    add_action('wp_enqueue_scripts', function () {
        wp_enqueue_style('sb_addons_Main.Css', SEBENAS_URL . 'assets/dist/styles/main.css', false, PLUGIN_VERSION);

        wp_enqueue_script('sb_addons_Main.js', SEBENAS_URL . 'assets/dist/scripts/main.js', [
            'jquery',
        ], PLUGIN_VERSION, true);

        wp_enqueue_script('sbn_popupsControl.js', SEBENAS_URL . 'assets/dist/scripts/functions/popupsControl.js', [
            'jquery',
        ], PLUGIN_VERSION, true);

        wp_enqueue_script('sbn_checkout_functions.js', SEBENAS_URL . 'assets/dist/scripts/functions/checkout_functions.js', [
            'jquery',
        ], PLUGIN_VERSION, true);
    });
    function tq73et_override_pagination_args( $args ) {
        $args['prev_text'] = __( '<i class="las la-angle-left"></i>' );
    	$args['next_text'] = __( '<i class="las la-angle-right"></i>' );
    	return $args;
    }
    add_filter( 'woocommerce_pagination_args' , 'tq73et_override_pagination_args' );

    /* Exclude Multiple Content Types From Yoast SEO Sitemap */
    add_filter( 'wpseo_sitemap_exclude_post_type', 'sitemap_exclude_post_type', 10, 2 );
    function sitemap_exclude_post_type( $value, $post_type ) {

        $post_type_to_exclude = array( 'sbn_popups','sbn_footer' );

        if( in_array( $post_type, $post_type_to_exclude ) ) return true;

    }

    /* Exclude Multiple Taxonomies From Yoast SEO Sitemap */
    add_filter( 'wpseo_sitemap_exclude_taxonomy', 'sitemap_exclude_taxonomy', 10, 2 );
    function sitemap_exclude_taxonomy( $value, $taxonomy ) {

        $taxonomy_to_exclude = array('popup-category-tax','sbn_footer-category-tax' );

        if( in_array( $taxonomy, $taxonomy_to_exclude ) ) return true;

    }

?>