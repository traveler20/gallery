<?php
/**
 * @package snow-monkey
 * @author inc2734
 * @license GPL-2.0+
 * @version 14.2.0
 */

use Inc2734\WP_Customizer_Framework\Framework;

Framework::control(
	'number',
	'base-line-height',
	[
		'label'       => __( 'Base line height', 'snow-monkey' ),
		'priority'    => 112,
		'default'     => 1.8,
		'input_attrs' => [
			'min'  => 1,
			'max'  => 3,
			'step' => 0.1,
		],
	]
);

if ( ! is_customize_preview() ) {
	return;
}

$panel   = Framework::get_panel( 'design' );
$section = Framework::get_section( 'base-design' );
$control = Framework::get_control( 'base-line-height' );
$control->join( $section )->join( $panel );
