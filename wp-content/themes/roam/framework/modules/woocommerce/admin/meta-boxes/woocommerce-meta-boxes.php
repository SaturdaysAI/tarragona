<?php

if(!function_exists('roam_mikado_map_woocommerce_meta')) {
    function roam_mikado_map_woocommerce_meta() {
        $woocommerce_meta_box = roam_mikado_create_meta_box(
            array(
                'scope' => array('product'),
                'title' => esc_html__('Product Meta', 'roam'),
                'name' => 'woo_product_meta'
            )
        );

        roam_mikado_create_meta_box_field(array(
            'name'        => 'mkdf_product_featured_image_size',
            'type'        => 'select',
            'label'       => esc_html__('Dimensions for Product List Shortcode', 'roam'),
            'description' => esc_html__('Choose image layout when it appears in Mikado Product List - Masonry layout shortcode', 'roam'),
            'parent'      => $woocommerce_meta_box,
            'options'     => array(
                'mkdf-woo-image-normal-width' => esc_html__('Default', 'roam'),
                'mkdf-woo-image-large-width'  => esc_html__('Large Width', 'roam')
            )
        ));

        roam_mikado_create_meta_box_field(
            array(
                'name'          => 'mkdf_show_title_area_woo_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Show Title Area', 'roam'),
                'description'   => esc_html__('Disabling this option will turn off page title area', 'roam'),
                'parent'        => $woocommerce_meta_box,
                'options'       => roam_mikado_get_yes_no_select_array()
            )
        );
    }
	
    add_action('roam_mikado_meta_boxes_map', 'roam_mikado_map_woocommerce_meta', 99);
}