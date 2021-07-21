<?php
/**
 * This file will create admin menu page.
 */

class WP_FD_Create_Admin_Page {

    public function __construct() {
        add_action( 'admin_menu', [ $this, 'create_admin_menu' ] );
    }

    public function create_admin_menu() {
        $capability = 'manage_options';
        $slug = 'wp-fd-settings';

        add_menu_page(
            __( 'WP Find Destination', 'wp-find-destination' ),
            __( 'WP Find Destination', 'wp-find-destination' ),
            $capability,
            $slug,
            [ $this, 'menu_page_template' ],
            'dashicons-buddicons-replies'
        );
    }

    public function menu_page_template() {
        echo '<div class="wrap"><div id="wp-fd-admin-app"></div></div>';
    }

}
new WP_FD_Create_Admin_Page();