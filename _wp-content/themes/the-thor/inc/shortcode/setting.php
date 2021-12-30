<?php
////////////////////////////////////////////////////////
//ショートコードの基本セッティング
////////////////////////////////////////////////////////
//ショートコードを囲むPタグを削除
function fit_shortcode_empty_paragraph( $content ) {
	$array = array(
		'<p>['    => '[',
		']</p>'   => ']',
		']<br />' => ']'
	);
	return strtr( $content, $array );
}
add_filter( 'the_content', 'fit_shortcode_empty_paragraph' );
