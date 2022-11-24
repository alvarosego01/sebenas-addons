<?php
    if (! defined('ABSPATH')) {
        exit; // Exit if accessed directly.
    }
    function sbn_footer() {

        // Set UI labels for Custom Post Type
            $labels = array(
                'name'                => _x( 'Sebenas Footers', 'Post Type General Name', 'sbn_footer' ),
                'singular_name'       => _x( 'Sebenas Footer', 'Post Type Singular Name', 'sbn_footer' ),
                'menu_name'           => __( 'Sebenas Footers', 'sbn_footer' ),
                'parent_item_colon'   => __( 'Principal Sebenas Footers', 'sbn_footer' ),
                'all_items'           => __( 'Todos los Sebenas Footers', 'sbn_footer' ),
                'view_item'           => __( 'Ver Sebenas Footers', 'sbn_footer' ),
                'add_new_item'        => __( 'Añadir nuevo Sebenas Footer', 'sbn_footer' ),
                'add_new'             => __( 'Añadir nuevo', 'sbn_footer' ),
                'edit_item'           => __( 'Editar Sebenas Footer', 'sbn_footer' ),
                'update_item'         => __( 'Actualizar Sebenas Footer', 'sbn_footer' ),
                'search_items'        => __( 'Buscar Sebenas Footers', 'sbn_footer' ),
                'not_found'           => __( 'No se encuentra', 'sbn_footer' ),
                'not_found_in_trash'  => __( 'No se encuentra en papelera', 'sbn_footer' ),
            );

        // Set other options for Custom Post Type

            $args = array(
                'label'               => __( 'Sebenas Footers', 'sbn_footer' ),
                'description'         => __( 'Sebenas Footers nuevos y revisiones', 'sbn_footer' ),
                'labels'              => $labels,
                // Features this CPT supports in Post Editor
                'supports'           => array( 'title', 'custom-fields' ),
                // You can associate this CPT with a taxonomy or custom taxonomy.
                    // This is where we add taxonomies to our CPT
                'taxonomies'          => array( 'sbn_footer-category' ),
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
            register_post_type( 'sbn_footer', $args );

        }
        add_action( 'init', 'sbn_footer');



        function sbn_footer_taxo() {

            register_taxonomy(
                'sbn_footer-category-tax',
                'sbn_footer',
                array(
                    'label' => __( 'Category Footer' ),
                    'rewrite' => array( 'slug' => 'sbn_footer-category-tax' ),
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
            $parent_term = term_exists( 'sbn_footer-category-tax', 'sbn_footer-category-tax' ); // array is returned if taxonomy is given
            $parent_term_id = $parent_term['term_id']; // get numeric term id

            wp_insert_term(
                'Footer columns 4', // the term
                'sbn_footer-category-tax', // the taxonomy
                array(
                    'slug' => 'general_sbn_footer_columns4',
                    'parent'=> $parent_term_id
                )
            );

        }
        add_action( 'init', 'sbn_footer_taxo' );


        function sbn_footer_appear_set( $parameters, $page_id ){

            if( isset($parameters) && isset($page_id) ){


                    // sbn_type_template

                    $typePage = sbn_getField('sbn_type_template', $page_id);

                    if ( array_search( $typePage , $parameters['sbn_footer_appear']) !== false) {

                        if( $parameters['sbn_footer_template'] == 'sbn_footer_bootstrap_general_t1' ){

                            sbn_footer_general1( $parameters );

                        }

                    }else{

                        if( $parameters['sbn_footer_template'] == 'sbn_footer_bootstrap_general_t1' ){

                            sbn_footer_general1( $parameters );

                        }

                    }




            }

        }


        function sbn_footer_setup($page_id){

            $footer = array();

            $args = array(
                'post_type'=> 'sbn_footer',
                'order'    => 'ASC'
            );

            $the_query = new WP_Query( $args );
            $the_query = $the_query->posts;

            if(count( $the_query ) > 0){

                foreach ($the_query as $key => $value) {
                    # code...
                    $a = $value->post_title;
                    $footer[$value->ID] = $a;

                }

                foreach ($footer as $key => $value) {

                    $parameters = array(
                        'sbn_footer_template' => sbn_getField('sbn_footer_template', $key),
                        'sbn_footer_appear' => sbn_getField('sbn_footer_appear', $key),
                        'sbn_footer_postType' => $key
                    );

                    sbn_footer_appear_set( $parameters, $page_id );

                }

            }

        }



        function sbn_footer_output() {

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

                sbn_footer_setup($page_id);

            }

            // $output = ob_get_contents();
            // ob_end_clean();
            // return  $output;


        }
        add_action('wp_footer', 'sbn_footer_output');



?>