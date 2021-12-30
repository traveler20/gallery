<?php
////////////////////////////////////////////////////////
//カスタムメニュー用ショートコード
////////////////////////////////////////////////////////
function fit_get_custom_menu($atts, $content = null) {
	extract(shortcode_atts(array('menu' => '', 'echo' => true), $atts));
	return wp_nav_menu( array('menu' => $menu, 'echo' => false));
}
add_shortcode("customenu", "fit_get_custom_menu");
