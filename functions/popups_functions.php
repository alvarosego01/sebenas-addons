<?php
if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function sbn_popups() {

    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Sebenas Popups', 'Post Type General Name', 'sbn_popups' ),
            'singular_name'       => _x( 'Sebenas Popup', 'Post Type Singular Name', 'sbn_popups' ),
            'menu_name'           => __( 'Sebenas Popups', 'sbn_popups' ),
            'parent_item_colon'   => __( 'Principal Sebenas Popups', 'sbn_popups' ),
            'all_items'           => __( 'Todos los Sebenas Popups', 'sbn_popups' ),
            'view_item'           => __( 'Ver Sebenas Popups', 'sbn_popups' ),
            'add_new_item'        => __( 'Añadir nuevo Sebenas Popup', 'sbn_popups' ),
            'add_new'             => __( 'Añadir nuevo', 'sbn_popups' ),
            'edit_item'           => __( 'Editar Sebenas Popup', 'sbn_popups' ),
            'update_item'         => __( 'Actualizar Sebenas Popup', 'sbn_popups' ),
            'search_items'        => __( 'Buscar Sebenas Popups', 'sbn_popups' ),
            'not_found'           => __( 'No se encuentra', 'sbn_popups' ),
            'not_found_in_trash'  => __( 'No se encuentra en papelera', 'sbn_popups' ),
        );

    // Set other options for Custom Post Type
        $args = array(
            'label'               => __( 'Sebenas Popups', 'sbn_popups' ),
            'description'         => __( 'Sebenas Popups nuevos y revisiones', 'sbn_popups' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'           => array( 'title', 'custom-fields' ),
            // You can associate this CPT with a taxonomy or custom taxonomy.
                // This is where we add taxonomies to our CPT
            'taxonomies'          => array( 'popup-category' ),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */
            'hierarchical'        => false,
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => true,
            'publicly_queryable'  => false,
            'capability_type'     => 'post',
            'show_in_rest' => false,

        );

        // Registering your Custom Post Type
        register_post_type( 'sbn_popups', $args );

    }
    add_action( 'init', 'sbn_popups');


    function sbn_popups_taxo() {

        register_taxonomy(
            'popup-category-tax',
            'sbn_popups',
            array(
                'label' => __( 'Category popup' ),
                'rewrite' => array( 'slug' => 'popup-category-tax' ),
                'hierarchical' => true,
                'capabilities' => array(
                    'manage_terms' => '',
                    'edit_terms' => '',
                    'delete_terms' => '',
                    'assign_terms' => 'edit_posts'
                ),

            ),
        );

        /*---------------------------------------Check to see if the days are created..if not, create them----*/
    $parent_term = term_exists( 'popup-category-tax', 'popup-category-tax' ); // array is returned if taxonomy is given
    $parent_term_id = $parent_term['term_id']; // get numeric term id

    wp_insert_term(//this should probably be an array, but I kept getting errors..
            'Prueba template 1', // the term
            'popup-category-tax', // the taxonomy
            array(
            'slug' => 'prueba_template_1',
            'parent'=> $parent_term_id ));



    }
    add_action( 'init', 'sbn_popups_taxo' );


    function sbn_popup_appear_set( $parameters, $appearId, $page_id ){

        if( isset($parameters) && isset($appearId) && isset($page_id) ){

            if( array_search( $page_id, $appearId ) !== false ){


                if( $parameters['sbn_popup_template'] == 'sbn_popup_template_1' ){

                    sbn_popup_1_setup( $parameters, $page_id );

                }

            }

        }

    }

    function sbn_popup_setup($page_id){

        $popupList = array();

        $args = array(
            'post_type'=> 'sbn_popups',
            'order'    => 'ASC'
        );

        $the_query = new WP_Query( $args );
        $the_query = $the_query->posts;

        if(count( $the_query ) > 0){

            foreach ($the_query as $key => $value) {
                # code...
                $a = $value->post_title;
                $popupList[$value->ID] = $a;

            }

            foreach ($popupList as $key => $value) {
                # code...

                $parameters = array(
                    'sbn_popup_template' => sbn_getField('sbn_popup_template', $key),
                    'popup_call_class' => sbn_getField('popup_call_class', $key),
                    'location_condition' => sbn_getField('location_condition', $key),
                    'type_appear_condition' => sbn_getField('type_appear_condition', $key),
                );



                    if ( array_search('sbn_popup_location_pageConditions', $parameters['location_condition']) !== false) {

                        $parameters['location_by_pages'] = sbn_getField('location_by_pages', $key);

                        sbn_popup_appear_set( $parameters, $parameters['location_by_pages'], $page_id );

                    }

                    if( array_search('sbn_popup_location_productConditions', $parameters['location_condition']) !== false ){

                        $parameters['location_by_product'] = sbn_getField('location_by_product', $key);

                        sbn_popup_appear_set( $parameters, $parameters['location_by_product'], $page_id );

                    }

                    ?>

                        <script>

                        jQuery('.sbn_open_popup').magnificPopup({
                          type:'inline',
                          removalDelay: 500, //delay removal by X to allow out-animation
                          callbacks: {
                            beforeOpen: function() {
                               this.st.mainClass = this.st.el.attr('data-effect');
                            }
                          },
                          midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
                        });

                        </script>

                    <?php

            }

        }


    }


    function sbn_popup_output() {

        // ob_start();

        $page_id = null;

        if ( function_exists( 'is_shop' ) && is_shop() ) {

            $page_id = get_option( 'woocommerce_shop_page_id' );

        }elseif ( function_exists( 'is_product' ) && is_product() ) {

            $page_id = get_the_ID();

        }else{

            $page_id = get_the_ID();

        }


        if( isset($page_id) && $page_id != null ){

            sbn_popup_setup($page_id);

        }


        // $output = ob_get_contents();
        // ob_end_clean();
        // return  $output;

    }
    add_action('wp_footer', 'sbn_popup_output');

?>