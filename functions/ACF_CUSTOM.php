<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

     function sbn_setACF()
     {
         if (function_exists('acf_add_local_field_group')) {
             sbn_registerFieldGroups(
                sbn_type_page_settings()
            );
             sbn_registerFieldGroups(
                sbn_popups_settings()
            );
             sbn_registerFieldGroups(
                sbn_footer_settings()
            );
             sbn_registerFieldGroups(
                sbn_template_popups()
            );
         }
     }

    function sbn_type_page_settings()
    {
        return [
            [
            'key' => 'sbn_type_template_page',
            'title' => 'Set type template page',
            'fields' => [
                [
                    'key' => 'sbn_type_template',
                    'name' => 'sbn_type_template',
                    'label' => 'Sbn type page',
                    'type' => 'select',
                    'choices' => [
                        'sbn_type_page_regular' => 'Type regular page',
                        'sbn_type_page_landing' => 'Type landing page',
                        'sbn_type_page_product' => 'Type product page',
                    ],
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '!=',
                        'value' => 'sbn_footer',
                    ],
                    [
                        'param' => 'post_type',
                        'operator' => '!=',
                        'value' => 'sbn_popups',
                    ],
                ],
            ],
        ],
        ];
    }

    function sbn_template_popups()
    {
        return [
            [
            'key' => 'sbn_popup_template_setting',
            'title' => 'Sebenas popup template setting',
            'fields' => [
                [
                    'key' => 'sbn_popup_template',
                    'name' => 'sbn_popup_template',
                    'label' => 'Sbn popup model',
                    'type' => 'select',
                    'choices' => [
                        'sbn_popup_template_1' => 'Popup template 1',
                    ],
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'sbn_popups',
                    ],
                ],
            ],
        ],
            [
            'key' => 'sbn_popup_template1',
            'title' => 'Sebenas popup template 1',
            'fields' => [
                [
                    'key' => 'popup_template1_field_1',
                    'name' => 'popup_template1_field_1',
                    'label' => 'popup_template1_field_1',
                    'type' => 'text',
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'sbn_popups',
                    ],
                    [
                        'param' => 'post_taxonomy',
                        'operator' => '==',
                        'value' => 'popup-category-tax:prueba_template_1',
                    ],
                ],
            ],
        ],
        ];
    }

    function sbn_popups_settings()
    {
        $args = [
            'sort_order' => 'asc',
            'sort_column' => 'post_title',
            'post_type' => 'page',
            'post_status' => 'publish',
        ];
        $all_pages = get_pages($args); // get all pages based on supplied args

        if (count($all_pages) > 0) {
            $aux = [];

            foreach ($all_pages as $key => $value) {
                $aux[$value->ID] = $value->ID.' - '.$value->post_title;
            }

            $all_pages = $aux;
        }

        $allProducts = get_posts([
            'post_type' => 'product',
            'numberposts' => -1,
            'post_status' => 'publish',
            // 'fields' => 'ids',
            'tax_query' => [
            //    array(
            // 	  'taxonomy' => 'product_cat',
            // 	  'field' => 'slug',
            // 	  'terms' => 'your_product_cat',
            // 	  'operator' => 'IN',
            //    )
            ],
        ]);

        if (count($allProducts) > 0) {
            $aux = [];

            foreach ($allProducts as $key => $value) {
                $aux[$value->ID] = $value->ID.' - '.$value->post_title;
            }

            $allProducts = $aux;
        }

        global $wpdb;
        $sql = "SELECT * FROM wp_terms where term_id in (SELECT term_id FROM wp_term_taxonomy where parent = 0 and taxonomy = 'product_cat') order by name asc";
        $parents = $wpdb->get_results($sql);

        $product_categories = $parents;

        if (count($product_categories) > 0) {
            $aux = [];

            foreach ($product_categories as $key => $value) {
                $aux[$value->term_id] = $value->term_id.' - '.$value->name;
            }

            $product_categories = $aux;
        }

        return [
            [
                'key' => 'sebenas_popups_principal_settings',
                'title' => 'Sebenas popups principal options',
                'fields' => [
                    [
                        'key' => 'popup_call_class',
                        'name' => 'popup_call_class',
                        'label' => 'Popup call open class Nota: Debe iniciar con popup-',
                        'type' => 'text',
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'sbn_popups',
                        ],
                    ],
                ],
            ],
            [
                'key' => 'sebenas_popups_conditions_settings',
                'title' => 'Sebenas popups conditions options',
                'fields' => [
                    // condiciones de locacion
                    [
                        'key' => 'location_condition',
                        'name' => 'location_condition',
                        'label' => 'Location popup',
                        'type' => 'select',
                        'multiple' => 1,
                        'choices' => [
                            'sbn_popup_location_pageConditions' => 'By page conditions',
                            // 'sbn_popup_location_userConditions' => 'By user conditions',
                            // 'sbn_popup_location_woocommerceConditions' => 'By Woocommerce conditions',
                            'sbn_popup_location_productConditions' => 'By product conditions',
                        ],
                    ],

                    // condiciones de aparición
                    [
                        'key' => 'type_appear_condition',
                        'name' => 'type_appear_condition',
                        'label' => 'Conditional appear type',
                        'type' => 'select',
                        'multiple' => 1,
                        'choices' => [
                            'sbn_popup_appear_click' => 'Only by click',
                            'sbn_popup_appear_seconds' => 'By Seconds',
                            'sbn_popup_appear_scroll' => 'By Scroll',
                        ],
                    ],

                    // aparición por scroll
                    [
                        'key' => 'appear_condition_scroll',
                        'name' => 'appear_condition_scroll',
                        'label' => 'Popup condition by scroll',
                        'type' => 'number',
                        'conditional_logic' => [
                            [
                                [
                                    'field' => 'type_appear_condition',
                                    'operator' => '==',
                                    'value' => 'sbn_popup_appear_scroll',
                                ],
                            ],
                        ],
                    ],
                    // aparición por segundos
                    [
                        'key' => 'appear_condition_seconds',
                        'name' => 'appear_condition_seconds',
                        'label' => 'Popup condition by seconds (Miliseconds)',
                        'type' => 'number',
                        'conditional_logic' => [
                            [
                                [
                                    'field' => 'type_appear_condition',
                                    'operator' => '==',
                                    'value' => 'sbn_popup_appear_seconds',
                                ],
                            ],
                        ],
                    ],

                    // por pagina
                    [
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
                                    'value' => 'sbn_popup_location_pageConditions',
                                ],
                            ],
                        ],
                    ],

                    // por prudcto base
                    [
                        'key' => 'location_by_product',
                        'name' => 'location_by_product',
                        'label' => 'Type product appear',
                        'type' => 'select',
                        'multiple' => 1,
                        'choices' => [
                            'location_by_product_category' => 'By product category',
                            'location_by_product_specific' => 'By product Specific',
                        ],
                        'conditional_logic' => [
                            [
                                [
                                    'field' => 'location_condition',
                                    'operator' => '==',
                                    'value' => 'sbn_popup_location_productConditions',
                                ],
                            ],
                        ],
                    ],
                    //  por producto categoria
                    [
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
                                    'value' => 'sbn_popup_location_productConditions',
                                ],
                                [
                                    'field' => 'location_by_product',
                                    'operator' => '==',
                                    'value' => 'location_by_product_category',
                                ],
                            ],
                        ],
                    ],

                    // por producto especifico
                    [
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
                                    'value' => 'sbn_popup_location_productConditions',
                                ],
                                [
                                    'field' => 'location_by_product',
                                    'operator' => '==',
                                    'value' => 'location_by_product_specific',
                                ],
                            ],
                        ],
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'sbn_popups',
                        ],
                    ],
                ],
            ],
        ];
    }

    function sbn_footer_settings()
    {
        $aux = wp_get_nav_menus();

        $body = [];

        if (count($aux) > 0) {
            foreach ($aux as $key => $value) {
                // code...
                // array_push( $body, [
                // $value['term_id' => $value['name']]
                // ])
                $body[$value->term_id] = $value->name;
            }
        }

        $postTypes = get_post_types();

        return [
            [
                'key' => 'sbn_footer_settings_1c_4c',
                'title' => 'Columna 1 ( 4c )',
                'fields' => [
                    [
                        'key' => 'sbn_footer_logo_1c_4c',
                        'name' => 'sbn_footer_logo_1c_4c',
                        'label' => 'Sebenas footer logo',
                        'type' => 'image',
                    ],

                    [
                        'key' => 'sbn_footer_texto_1c_4c',
                        'name' => 'sbn_footer_texto_1c_4c',
                        'label' => 'Texto columna 1',
                        'type' => 'textarea',
                    ],

                    [
                        'key' => 'enable_menu_1c_4c',
                        'name' => 'enable_menu_1c_4c',
                        'label' => 'Habilitar menu columna 1',
                        'type' => 'true_false',
                    ],

                    [
                        'key' => 'title_menu_1c_4c',
                        'name' => 'title_menu_1c_4c',
                        'label' => 'Titulo Menu columna 1',
                        'type' => 'text',
                        'conditional_logic' => [
                            [
                                [
                                    'field' => 'enable_menu_1c_4c',
                                    'operator' => '==',
                                    'value' => 1,
                                ],
                            ],
                        ],
                    ],

                    [
                        'key' => 'menu_1c_4c',
                        'name' => 'menu_1c_4c',
                        'label' => 'Menu columna 1',
                        'type' => 'select',
                        'choices' => $body,
                        'conditional_logic' => [
                            [
                                [
                                    'field' => 'enable_menu_1c_4c',
                                    'operator' => '==',
                                    'value' => 1,
                                ],
                            ],
                        ],
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'sbn_footer',
                        ],
                        [
                            'param' => 'post_taxonomy',
                            'operator' => '==',
                            'value' => 'sbn_footer-category-tax:general_sbn_footer_columns4',
                        ],
                    ],
                ],
            ],
            [
                'key' => 'sbn_footer_settings_2c_4c',
                'title' => 'Columna 2 ( 4c )',
                'fields' => [
                    [
                        'key' => 'enable_menu_2c_4c',
                        'name' => 'enable_menu_2c_4c',
                        'label' => 'Habilitar menu columna 2',
                        'type' => 'true_false',
                    ],

                    [
                        'key' => 'title_menu_2c_4c',
                        'name' => 'title_menu_2c_4c',
                        'label' => 'Titulo Menu columna 2',
                        'type' => 'text',
                        'conditional_logic' => [
                            [
                                [
                                    'field' => 'enable_menu_2c_4c',
                                    'operator' => '==',
                                    'value' => 1,
                                ],
                            ],
                        ],
                    ],

                    [
                        'key' => 'menu_2c_4c',
                        'name' => 'menu_2c_4c',
                        'label' => 'Menu columna 2',
                        'type' => 'select',
                        'choices' => $body,
                        'conditional_logic' => [
                            [
                                [
                                    'field' => 'enable_menu_2c_4c',
                                    'operator' => '==',
                                    'value' => 1,
                                ],
                            ],
                        ],
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'sbn_footer',
                        ],
                        [
                            'param' => 'post_taxonomy',
                            'operator' => '==',
                            'value' => 'sbn_footer-category-tax:general_sbn_footer_columns4',
                        ],
                    ],
                ],
            ],

            [
                'key' => 'sbn_footer_settings_3c_4c',
                'title' => 'Columna 3 ( 4c )',
                'fields' => [
                    [
                        'key' => 'enable_menu_3c_4c',
                        'name' => 'enable_menu_3c_4c',
                        'label' => 'Habilitar menu columna 3',
                        'type' => 'true_false',
                    ],

                    [
                        'key' => 'title_menu_3c_4c',
                        'name' => 'title_menu_3c_4c',
                        'label' => 'Titulo Menu columna 3',
                        'type' => 'text',
                        'conditional_logic' => [
                            [
                                [
                                    'field' => 'enable_menu_3c_4c',
                                    'operator' => '==',
                                    'value' => 1,
                                ],
                            ],
                        ],
                    ],

                    [
                        'key' => 'menu_3c_4c',
                        'name' => 'menu_3c_4c',
                        'label' => 'Menu columna 3',
                        'type' => 'select',
                        'choices' => $body,
                        'conditional_logic' => [
                            [
                                [
                                    'field' => 'enable_menu_3c_4c',
                                    'operator' => '==',
                                    'value' => 1,
                                ],
                            ],
                        ],
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'sbn_footer',
                        ],
                        [
                            'param' => 'post_taxonomy',
                            'operator' => '==',
                            'value' => 'sbn_footer-category-tax:general_sbn_footer_columns4',
                        ],
                    ],
                ],
            ],
            [
                'key' => 'sbn_footer_settings_4c_4c',
                'title' => 'Columna 4 ( 4c )',
                'fields' => [
                    [
                        'key' => 'enable_menu_4c_4c',
                        'name' => 'enable_menu_4c_4c',
                        'label' => 'Habilitar menu columna 4',
                        'type' => 'true_false',
                    ],

                    [
                        'key' => 'title_menu_4c_4c',
                        'name' => 'title_menu_4c_4c',
                        'label' => 'Titulo Menu columna 4',
                        'type' => 'text',
                        'conditional_logic' => [
                            [
                                [
                                    'field' => 'enable_menu_4c_4c',
                                    'operator' => '==',
                                    'value' => 1,
                                ],
                            ],
                        ],
                    ],

                    [
                        'key' => 'menu_4c_4c',
                        'name' => 'menu_4c_4c',
                        'label' => 'Menu columna 4',
                        'type' => 'select',
                        'choices' => $body,
                        'conditional_logic' => [
                            [
                                [
                                    'field' => 'enable_menu_4c_4c',
                                    'operator' => '==',
                                    'value' => 1,
                                ],
                            ],
                        ],
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'sbn_footer',
                        ],
                        [
                            'param' => 'post_taxonomy',
                            'operator' => '==',
                            'value' => 'sbn_footer-category-tax:general_sbn_footer_columns4',
                        ],
                    ],
                ],
            ],

            [
                'key' => 'sbn_footer_settings_base_4c',
                'title' => 'Sebenas footer base ( 4c )',
                'fields' => [
                    [
                        'key' => 'sbn_footer_texto_base_4c',
                        'name' => 'sbn_footer_texto_base_4c',
                        'label' => 'Texto base',
                        'type' => 'textarea',
                    ],

                    [
                        'key' => 'title_footer_base_menu',
                        'name' => 'title_footer_base_menu',
                        'label' => 'Titulo footer base menu 4c',
                        'type' => 'text',
                    ],

                    [
                        'key' => 'menu_base_4c',
                        'name' => 'menu_base_4c',
                        'label' => 'Menu footer base',
                        'type' => 'select',
                        'choices' => $body,
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'sbn_footer',
                        ],
                        [
                            'param' => 'post_taxonomy',
                            'operator' => '==',
                            'value' => 'sbn_footer-category-tax:general_sbn_footer_columns4',
                        ],
                    ],
                ],
            ],

            [
                'key' => 'sbn_footer_settings',
                'title' => 'Sebenas footer template',
                'fields' => [
                    [
                        'key' => 'sbn_footer_template',
                        'label' => 'Bootstrap Sebenas footer model',
                        'name' => 'sbn_footer_template',
                        'type' => 'select',
                        'choices' => [
                            'sbn_footer_bootstrap_general_t1' => 'Sebenas footer general 1',
                        ],
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'sbn_footer',
                        ],
                    ],
                ],
            ],
            [
                'key' => 'sbn_order_appear_footer',
                'title' => 'Sebenas footer Appear',
                'fields' => [
                    [
                        'key' => 'sbn_footer_appear',
                        'label' => 'Bootstrap Sebenas footer appear',
                        'name' => 'sbn_footer_appear',
                        'type' => 'select',
                        'multiple' => 1,
                        'choices' => [
                            'sbn_type_page_regular' => 'Type regular page',
                            'sbn_type_page_landing' => 'Type landing page',
                            'sbn_type_page_product' => 'Type product page',
                        ],
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'sbn_footer',
                        ],
                    ],
                ],
            ],
        ];
    }

      function sbn_registerFieldGroups($fieldsPack)
      {
          if (count($fieldsPack) > 0) {
              foreach ($fieldsPack as $key => $fieldGroup) {
                  // $fieldGroup['location'] = self::$rules[$key];
                  if (function_exists('acf_add_local_field_group')) {
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

      function sbn_getFields($post_id, $format_value = 0)
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

    add_action('acf/init', sbn_setACF());
