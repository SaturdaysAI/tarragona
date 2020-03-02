<?php
namespace RoamMikado\Modules\Header\Lib;
/**
 * Class RoamMikadoHeaderConnector
 *
 * Connects header module with other modules
 */
class RoamMikadoHeaderConnector {
    /**
     * @param HeaderType $object
     */
    public function __construct(HeaderType $object) {
        $this->object = $object;
    }

    /**
     * Connects given object with other modules based on pased config
     *
     * @param array $config
     */
    public function connect($config = array()) {
        do_action('roam_mikado_pre_header_connect');

        $defaultConfig = array(
            'affect_content' => true,
            'affect_title'   => true,
            'affect_slider'  => true
        );

        if(is_array($config) && count($config)) {
            $config = array_merge($defaultConfig, $config);
        }

        if(!empty($config['affect_content'])) {
            add_filter('roam_mikado_content_elem_style_attr', array($this, 'contentMarginFilter'));
        }

        if(!empty($config['affect_title'])) {
            add_filter('roam_mikado_title_content_padding', array($this, 'titlePaddingFilter'));
        }

        do_action('roam_mikado_after_header_connect');
    }

    /**
     * Adds margin-top property to content element based on height of transparent parts of header
     *
     * @param $styles
     *
     * @return array
     */
    public function contentMarginFilter($styles) {
        $marginTopValue = $this->object->getHeightOfTransparency();

        if(!empty($marginTopValue)) {
            $styles[] = 'margin-top: -'.$marginTopValue.'px';
        }

        return $styles;
    }

    /**
     * Returns padding value calculated from transparent header parts.
     *
     * Hooks to roam_mikado_title_content_padding filter
     *
     * @return int
     */
    public function titlePaddingFilter() {
        $heightOfTransparency = $this->object->getHeightOfTransparency();

        return !empty($heightOfTransparency) ? $heightOfTransparency : 0;
    }
}