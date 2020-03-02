<?php

if(!function_exists('roam_mikado_register_required_plugins')) {
    /**
     * Registers theme required and optional plugins. Hooks to tgmpa_register hook
     */
    function roam_mikado_register_required_plugins() {
        $plugins = array(
            array(
                'name'               => esc_html__('WPBakery Visual Composer', 'roam'),
                'slug'               => 'js_composer',
                'source'             => get_template_directory().'/includes/plugins/js_composer.zip',
                'version'            => '5.7',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            ),
            array(
                'name'               => esc_html__('Revolution Slider', 'roam'),
                'slug'               => 'revslider',
                'source'             => get_template_directory().'/includes/plugins/revslider.zip',
                'version'            => '5.4.8.3',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            ),
	        array(
		        'name'     => esc_html__( 'Envato Market', 'roam' ),
		        'slug'     => 'envato-market',
		        'source'   => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
		        'required' => false
	        ),
            array(
                'name'               => esc_html__('Mikado Core', 'roam'),
                'slug'               => 'mikado-core',
                'source'             => get_template_directory().'/includes/plugins/mikado-core.zip',
                'version'            => '1.2',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            ),
            array(
                'name'               => esc_html__('Mikado Instagram Feed', 'roam'),
                'slug'               => 'mikado-instagram-feed',
                'source'             => get_template_directory().'/includes/plugins/mikado-instagram-feed.zip',
                'version'            => '1.0.1',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            ),
            array(
                'name'               => esc_html__('Mikado Twitter Feed', 'roam'),
                'slug'               => 'mikado-twitter-feed',
                'source'             => get_template_directory().'/includes/plugins/mikado-twitter-feed.zip',
                'version'            => '1.0.1',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            ),
            array(
                'name'               => esc_html__('Mikado Tours', 'roam'),
                'slug'               => 'mikado-tours',
                'source'             => get_template_directory().'/includes/plugins/mikado-tours.zip',
                'version'            => '1.0.1',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            ),
            array(
                'name'               => esc_html__('Mikado Membership', 'roam'),
                'slug'               => 'mikado-membership',
                'source'             => get_template_directory().'/includes/plugins/mikado-membership.zip',
                'version'            => '1.0.2',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            ),
	        array(
		        'name'         => esc_html__( 'WooCommerce plugin', 'roam' ),
		        'slug'         => 'woocommerce',
		        'external_url' => 'https://wordpress.org/plugins/woocommerce/',
		        'required'     => false
	        ),
	        array(
		        'name'         => esc_html__( 'Contact Form 7', 'roam' ),
		        'slug'         => 'contact-form-7',
		        'external_url' => 'https://wordpress.org/plugins/contact-form-7/',
		        'required'     => false
	        )
        );

        $config = array(
            'domain'           => 'roam',
            'default_path'     => '',
            'parent_slug' 	   => 'themes.php',
            'capability' 	   => 'edit_theme_options',
            'menu'             => 'install-required-plugins',
            'has_notices'      => true,
            'is_automatic'     => false,
            'message'          => '',
            'strings'          => array(
                'page_title'                      => esc_html__('Install Required Plugins', 'roam'),
                'menu_title'                      => esc_html__('Install Plugins', 'roam'),
                'installing'                      => esc_html__('Installing Plugin: %s', 'roam'),
                'oops'                            => esc_html__('Something went wrong with the plugin API.', 'roam'),
                'notice_can_install_required'     => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'roam'),
                'notice_can_install_recommended'  => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'roam'),
                'notice_cannot_install'           => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'roam'),
                'notice_can_activate_required'    => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'roam'),
                'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'roam'),
                'notice_cannot_activate'          => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'roam'),
                'notice_ask_to_update'            => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'roam'),
                'notice_cannot_update'            => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'roam'),
                'install_link'                    => _n_noop('Begin installing plugin', 'Begin installing plugins', 'roam'),
                'activate_link'                   => _n_noop('Activate installed plugin', 'Activate installed plugins', 'roam'),
                'return'                          => esc_html__('Return to Required Plugins Installer', 'roam'),
                'plugin_activated'                => esc_html__('Plugin activated successfully.', 'roam'),
                'complete'                        => esc_html__('All plugins installed and activated successfully. %s', 'roam'),
                'nag_type'                        => 'updated'
            )
        );

        tgmpa($plugins, $config);
    }

    add_action('tgmpa_register', 'roam_mikado_register_required_plugins');
}