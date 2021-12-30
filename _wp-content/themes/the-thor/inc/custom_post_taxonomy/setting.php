<?php
////////////////////////////////////////////////////////
//カスタム投稿タイプのその他設定
////////////////////////////////////////////////////////


//カスタム投稿(custom)個別ページ表示時のカスタムメニューのクラスを編集(現在地表示用)
function make_menu_current( $classes, $item ) {
	if ( $item->url == get_post_type_archive_link('custom') && ( is_tax( 'custom_category' ) || 'custom' == get_post_type() ) ) {
		$classes[] = 'current-menu-item';
	}
	$classes = array_unique( $classes );
	return $classes;
}
add_filter( 'nav_menu_css_class', 'make_menu_current', 10, 2 );


//カスタムタクソノミー(custom系)をリダイレクト
add_rewrite_rule('custom/category/([^/]+)/?$', 'index.php?custom_category=$matches[1]', 'top');
add_rewrite_rule('custom/tag/([^/]+)/?$', 'index.php?custom_tag=$matches[1]', 'top');
