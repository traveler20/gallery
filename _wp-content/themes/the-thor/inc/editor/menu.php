<?php
////////////////////////////////////////////////////////
//ビジュアルエディタにオリジナルメニューを追加
////////////////////////////////////////////////////////

// 三列目にリスト用独自のカスタムメニューを追加
function fit_mce_menu( $menu ) {
	$menu[] = 'styleselect';
	$menu[] = 'style_css'; // スタイル用
	$menu[] = 'common_btn'; // 共通ボタン用
	$menu[] = 'column_layout'; // カラム用
	$menu[] = 'scode'; // ショートコード用
	$menu[] = 'subtitle_set'; // サブタイトル編集用
	$menu[] = 'icon_set'; // アイコンセット用
	$menu[] = 'button_html'; // HTML直入力用
	$menu[] = 'table_respo'; // レスポンシブテーブル
	$menu[] = 'content';
	$menu[] = 'aftag'; // タグ挿入用

	return $menu;
}
add_filter( 'mce_buttons_3', 'fit_mce_menu' );


// 二列目にリスト用独自のカスタムメニューを追加
function fit_mce_menu_second( $menu ) {
	$menu[] = 'table';
	$menu[] = 'fontsizeselect';
	$menu[] = 'fontselect';

	return $menu;
}
add_filter( 'mce_buttons_2', 'fit_mce_menu_second' );

// 一列目にカスタムメニューを追加
function fit_mce_menu_first( $menu, $id ){
	if ( 'content' != $id ){
		return $menu;
	}

	array_splice( $menu, 13, 0, 'wp_page' );
	return $menu;
}
add_filter( 'mce_buttons', 'fit_mce_menu_first', 1, 2 );
