<?php

if ( ! function_exists( 'roam_mikado_like' ) ) {
	/**
	 * Returns RoamMikadoLike instance
	 *
	 * @return RoamMikadoLike
	 */
	function roam_mikado_like() {
		return RoamMikadoLike::get_instance();
	}
}

function roam_mikado_get_like() {
	
	echo wp_kses( roam_mikado_like()->add_like(), array(
		'span' => array(
			'class'       => true,
			'aria-hidden' => true,
			'style'       => true,
			'id'          => true
		),
		'i'    => array(
			'class' => true,
			'style' => true,
			'id'    => true
		),
		'a'    => array(
			'href'  => true,
			'class' => true,
			'id'    => true,
			'title' => true,
			'style' => true
		)
	) );
}