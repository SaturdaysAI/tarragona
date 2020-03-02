<?php

class RoamMikadoIconListItemWidget extends RoamMikadoWidget {
    public function __construct() {
        parent::__construct(
            'mkdf_icon_list_item_widget',
            esc_html__( 'Mikado Icon List Item Widget', 'roam' ),
            array( 'description' => esc_html__( 'Add icons list items to widget areas', 'roam' ) )
        );

        $this->setParams();
    }

    protected function setParams() {
        $this->params = array_merge(
            roam_mikado_icon_collections()->getIconWidgetParamsArray(),
            array(
                array(
                    'type'  => 'textfield',
                    'name'  => 'icon_size',
                    'title' => esc_html__( 'Icon Size (px)', 'roam' )
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'icon_color',
                    'title' => esc_html__( 'Icon Color', 'roam' )
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'title',
                    'title' => esc_html__( 'Title', 'roam' )
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'title_size',
                    'title' => esc_html__( 'Title Size (px)', 'roam' )
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'title_color',
                    'title' => esc_html__( 'Title Color', 'roam' )
                ),
            )
        );
    }

    public function widget( $args, $instance ) {

        $holder_classes = array( 'mkdf-icon-list-item-widget-holder' );

        $holder_styles = array();
        if ( ! empty( $instance['icon_color'] ) ) {
            $holder_styles[] = 'color: ' . $instance['icon_color'];
        }

        if ( ! empty( $instance['icon_size'] ) ) {
            $holder_styles[] = 'font-size: ' . roam_mikado_filter_px( $instance['icon_size'] ) . 'px';
        }

        $title_styles = array();
        if ( ! empty( $instance['title_color'] ) ) {
            $title_styles[] = 'color: ' . $instance['title_color'];
        }

        if ( ! empty( $instance['title_size'] ) ) {
            $title_styles[] = 'font-size: ' . roam_mikado_filter_px( $instance['title_size'] ) . 'px';
        }

        $icon_holder_html = '';
        if ( ! empty( $instance['icon_pack'] ) ) {
            $icon_class   = array();
            $icon_class[] = ! empty( $instance['fa_icon'] ) && $instance['icon_pack'] === 'font_awesome' ? 'fa ' . $instance['fa_icon'] : '';
            $icon_class[] = ! empty( $instance['fe_icon'] ) && $instance['icon_pack'] === 'font_elegant' ? $instance['fe_icon'] : '';
            $icon_class[] = ! empty( $instance['ion_icon'] ) && $instance['icon_pack'] === 'ion_icons' ? $instance['ion_icon'] : '';
            $icon_class[] = ! empty( $instance['linea_icon'] ) && $instance['icon_pack'] === 'linea_icons' ? $instance['linea_icon'] : '';
            $icon_class[] = ! empty( $instance['linear_icon'] ) && $instance['icon_pack'] === 'linear_icons' ? 'lnr ' . $instance['linear_icon'] : '';
            $icon_class[] = ! empty( $instance['simple_line_icon'] ) && $instance['icon_pack'] === 'simple_line_icons' ? $instance['simple_line_icon'] : '';

            $icon_class = array_filter( $icon_class, function ( $value ) {
                return $value !== '';
            } );

            if ( ! empty( $icon_class ) ) {
                $icon_class = implode( ' ', $icon_class );

                $icon_holder_html = '<span class="mkdf-icon-element ' . esc_attr( $icon_class ) . '"></span>';
            }
        }

        $icon_text_html  = '';
        if ( ! empty( $instance['title'] ) ) {
            $icon_text_html = '<p class="mkdf-il-text" '.roam_mikado_get_inline_style( $title_styles ).'>' . esc_html( $instance['title'] ) . '</p>';
        }
        ?>

        <div class="mkdf-icon-list-holder">
        <div class="mkdf-il-icon-holder" <?php echo roam_mikado_get_inline_style( $holder_styles ); ?>>
        <?php echo wp_kses( $icon_holder_html, array(
                'span' => array(
                    'class' => true
                )
            ) ); ?>
        </div>
            <?php echo wp_kses( $icon_text_html, array(
                'p' => array(
                    'class' => true,
                    'style' => true,
                )
            ) ); ?>
        </div>
        <?php
    }
}