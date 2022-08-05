<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

     function sbn_setACF()
    {

        if (function_exists('acf_add_local_field_group')) {

            sbn_registerFieldGroups(
                sbn_popups_settings()
            );
            sbn_registerFieldGroups(
                sbn_template_popups()
            );

        }
    }


    function sbn_template_popups(){

        return array(
            array(
            'key' => 'sbn_popup_template_setting',
            'title' => 'Sebenas popup template setting',
            'fields' => array(
                array(
                    'key' => 'sbn_popup_template',
                    'name' => 'sbn_popup_template',
                    'label' => 'Sbn popup model',
                    'type' => 'select',
                    'choices' => array(
                        'sbn_popup_template_1' => 'Popup template 1',
                    ),
                )

            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'sbn_popups',
                    ),
                ),
            ),
        ),
            array(
            'key' => 'sbn_popup_template1',
            'title' => 'Sebenas popup template 1',
            'fields' => array(
                array(
                    'key' => 'popup_template1_field_1',
                    'name' => 'popup_template1_field_1',
                    'label' => 'popup_template1_field_1',
                    'type' => 'text',
                ),

            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'sbn_popups',
                    ),
                    array(
                        'param' => 'post_taxonomy',
                        'operator' => '==',
                        'value' => 'popup-category-tax:prueba_template_1',
                    ),
                ),
            ),
        )
        );

    }

    function sbn_popups_settings()
    {

        $args = array(
        	'sort_order' => 'asc',
        	'sort_column' => 'post_title',
        	'post_type' => 'page',
        	'post_status' => 'publish'
        );
        $all_pages = get_pages($args); // get all pages based on supplied args

        if(count($all_pages) > 0){

            $aux = array();

            foreach ($all_pages as $key => $value) {

                $aux[$value->ID] = $value->ID .' - '. $value->post_title;

            }

            $all_pages = $aux;

        }

        $allProducts = get_posts( array(
	    	'post_type' => 'product',
	    	'numberposts' => -1,
	    	'post_status' => 'publish',
	    	// 'fields' => 'ids',
	    	'tax_query' => array(
	    	//    array(
	    	// 	  'taxonomy' => 'product_cat',
	    	// 	  'field' => 'slug',
	    	// 	  'terms' => 'your_product_cat',
	    	// 	  'operator' => 'IN',
	    	//    )
	    	),
	    ) );

        if(count($allProducts) > 0){

            $aux = array();

            foreach ($allProducts as $key => $value) {

                $aux[$value->ID] = $value->ID .' - '. $value->post_title;

            }

            $allProducts = $aux;

        }

            global $wpdb;
            $sql = "SELECT * FROM wp_terms where term_id in (SELECT term_id FROM wp_term_taxonomy where parent = 0 and taxonomy = 'product_cat') order by name asc";
            $parents = $wpdb->get_results( $sql );

        $product_categories = $parents;


        if(count($product_categories) > 0){

            $aux = array();

            foreach ($product_categories as $key => $value) {

                $aux[$value->term_id] = $value->term_id .' - '. $value->name;

            }

            $product_categories = $aux;

        }


        return array(
            array(
                'key' => 'sebenas_popups_principal_settings',
                'title' => 'Sebenas popups principal options',
                'fields' => array(
                    array(
                        'key' => 'popup_call_class',
                        'name' => 'popup_call_class',
                        'label' => 'Popup call open class Nota: Debe iniciar con popup-',
                        'type' => 'text',
                    ),

                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'sbn_popups',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'sebenas_popups_conditions_settings',
                'title' => 'Sebenas popups conditions options',
                'fields' => array(

                    // condiciones de locacion
                    array(
                        'key' => 'location_condition',
                        'name' => 'location_condition',
                        'label' => 'Location popup',
                        'type' => 'select',
                        'multiple' => 1,
                        'choices' => array(
                            'sbn_popup_location_pageConditions' => 'By page conditions',
                            // 'sbn_popup_location_userConditions' => 'By user conditions',
                            // 'sbn_popup_location_woocommerceConditions' => 'By Woocommerce conditions',
                            'sbn_popup_location_productConditions' => 'By product conditions'
                        ),
                    ),

                    // condiciones de aparición
                    array(
                        'key' => 'type_appear_condition',
                        'name' => 'type_appear_condition',
                        'label' => 'Conditional appear type',
                        'type' => 'select',
                        'multiple' => 1,
                        'choices' => array(
                            'sbn_popup_appear_click' => 'Only by click',
                            'sbn_popup_appear_seconds' => 'By Seconds',
                            'sbn_popup_appear_scroll' => 'By Scroll',

                        ),
                    ),

                    // aparición por scroll
                    array(
                        'key' => 'appear_condition_scroll',
                        'name' => 'appear_condition_scroll',
                        'label' => 'Popup condition by scroll',
                        'type' => 'number',
                        'conditional_logic' => [
                            [
                                [
                                    'field' => 'type_appear_condition',
                                    'operator' => '==',
                                    'value' => 'sbn_popup_appear_scroll'
                                ]
                            ]
                        ]
                    ),
                    // aparición por segundos
                    array(
                        'key' => 'appear_condition_seconds',
                        'name' => 'appear_condition_seconds',
                        'label' => 'Popup condition by seconds (Miliseconds)',
                        'type' => 'number',
                        'conditional_logic' => [
                            [
                                [
                                    'field' => 'type_appear_condition',
                                    'operator' => '==',
                                    'value' => 'sbn_popup_appear_seconds'
                                ]
                            ]
                        ]
                    ),

                    // por pagina
                    array(
                        'key' => 'location_by_pages',
                        'name' => 'location_by_pages',
                        'label' => 'By pages appear',
                        'type' => 'select',
                        'multiple' => 1,
                        'choices' => $all_pages,
                        'conditional_logic' => [
                            [
                                [
                                    'field' => 'location_condition',
                                    'operator' => '==',
                                    'value' => 'sbn_popup_location_pageConditions'
                                ]
                            ]
                        ]
                    ),

                    // por prudcto base
                    array(
                        'key' => 'location_by_product',
                        'name' => 'location_by_product',
                        'label' => 'Type product appear',
                        'type' => 'select',
                        'multiple' => 1,
                        'choices' => array(

                            'location_by_product_category' => 'By product category',
                            'location_by_product_specific' => 'By product Specific',

                        ),
                        'conditional_logic' => [
                            [
                                [
                                    'field' => 'location_condition',
                                    'operator' => '==',
                                    'value' => 'sbn_popup_location_productConditions'
                                ]
                            ]
                        ]
                    ),
                    //  por producto categoria
                    array(
                        'key' => 'location_by_product_category',
                        'name' => 'location_by_product_category',
                        'label' => 'Type product category appear',
                        'type' => 'select',
                        'multiple' => 1,
                        'choices' => $product_categories,
                        'conditional_logic' => [
                            [
                                [
                                    'field' => 'location_condition',
                                    'operator' => '==',
                                    'value' => 'sbn_popup_location_productConditions'
                                ],
                                [
                                    'field' => 'location_by_product',
                                    'operator' => '==',
                                    'value' => 'location_by_product_category'
                                ]
                            ]
                        ]
                    ),

                    // por producto especifico
                    array(
                        'key' => 'location_by_product_specific',
                        'name' => 'location_by_product_specific',
                        'label' => 'Type product specific appear',
                        'type' => 'select',
                        'multiple' => 1,
                        'choices' => $allProducts,
                        'conditional_logic' => [
                            [
                                [
                                    'field' => 'location_condition',
                                    'operator' => '==',
                                    'value' => 'sbn_popup_location_productConditions'
                                ],
                                [
                                    'field' => 'location_by_product',
                                    'operator' => '==',
                                    'value' => 'location_by_product_specific'
                                ]
                            ]
                        ]
                    ),




                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'sbn_popups',
                        ),
                    ),
                ),
            ),

        );

    }


      function sbn_registerFieldGroups( $fieldsPack )
    {

        if( count($fieldsPack) > 0 ){

            foreach ($fieldsPack as $key => $fieldGroup) {
                // $fieldGroup['location'] = self::$rules[$key];
                if ( function_exists('acf_add_local_field_group') ) {

                    acf_add_local_field_group($fieldGroup);

                }
            }
        }
    }


      function sbn_getField($field, $id = null)
    {

        if (function_exists('get_field')) {

            $l = null;
            if ($id) {
                $l = get_field($field, $id);
            } else {
                $l = get_field($field);
            }

            if ($l != null || $l != '') {

                return $l;
            } else {
                return null;
            }
        } else {

            return null;
        }

    }

      function sbn_getFields( $post_id, $format_value = 0 )
    {

        if (function_exists('get_fields')) {

            $l = null;
            if ($format_value) {
                $l = get_fields($post_id, $format_value);
            } else {
                $l = get_fields($post_id);
            }

            if ($l != null || $l != '') {

                return $l;
            } else {
                return null;
            }



        } else {

            return null;
        }

    }


    add_action('acf/init', sbn_setACF() );





?>