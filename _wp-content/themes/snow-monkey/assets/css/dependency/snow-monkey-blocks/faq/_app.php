<?php
/**
 * @package snow-monkey
 * @author inc2734
 * @license GPL-2.0+
 */

use Framework\Helper;
use Inc2734\WP_Customizer_Framework\Style;

if ( ! Helper::is_ie() ) {
	return;
}

$accent_color = get_theme_mod( 'accent-color' );
if ( ! $accent_color ) {
	return;
}

$styles = [
	[
		'selectors'  => [
			'.smb-faq__item__question__label',
			'.smb-faq__item__answer__label',
		],
		'properties' => [ 'color: ' . $accent_color ],
	],
];

Style::attach(
	Helper::get_main_style_handle() . '-snow-monkey-blocks-app',
	$styles
);

foreach ( [ 'entry-content', 'entry-content-theme' ] as $placeholder ) {
	Style::extend(
		$placeholder,
		[
			'.smb-faq__item__question__body',
			'.smb-faq__item__answer__body',
		]
	);
}
