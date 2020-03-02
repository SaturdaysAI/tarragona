<?php

if ( ! function_exists( 'roam_mikado_register_icon_list_item_widget' ) ) {
    /**
     * Function that register icon widget
     */
    function roam_mikado_register_icon_list_item_widget( $widgets ) {
        $widgets[] = 'RoamMikadoIconListItemWidget';

        return $widgets;
    }

    add_filter( 'roam_mikado_register_widgets', 'roam_mikado_register_icon_list_item_widget' );
}