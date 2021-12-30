<?php
/**
 * @package snow-monkey
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Customizer_Framework\Style;
use Framework\Helper;

if ( ! Helper::is_ie() ) {
	return;
}

$accent_color = get_theme_mod( 'accent-color' );
if ( ! $accent_color ) {
	return;
}

$styles = [
	[
		'selectors'  => [ '.c-sub-nav .c-navbar__item.sm-nav-menu-item-highlight' ],
		'properties' => [ 'color: ' . $accent_color ],
	],
];

Style::attach(
	Helper::get_main_style_handle() . '-app',
	$styles
);
