

<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!function_exists('sebenas_register_widgets')) {
    function sebenas_register_widgets($widgets_manager)
    {
        // Importaciones
        require_once SEBENAS_PATH.'includes/widgets/info/main.php';
        require_once SEBENAS_PATH.'includes/widgets/containersCTA/main.php';
        require_once SEBENAS_PATH.'includes/widgets/features/main.php';

        // Declaraciones
        // info
        $widgets_manager->register(new \C_ImageTextCtaSide_T1());
        $widgets_manager->register(new \C_images_text_3c_T1());
        // Containers CTA
        $widgets_manager->register(new \C_TitleTextCta_T1());
        $widgets_manager->register(new \C_TitleTextCta_T2());
        // features
        $widgets_manager->register(new \C_features_services_T1());
        $widgets_manager->register(new \C_features_services_T2());
        $widgets_manager->register(new \C_features_image_services_T1());
        // multi images section
        $widgets_manager->register(new \C_MultiplesImages_T1());

        // SI SON DE WOOCOMMERCE ENTONCES AQUI
        if (class_exists('WC_Widget')) {
        }
    }
}

?>