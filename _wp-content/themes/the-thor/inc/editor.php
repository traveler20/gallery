<?php
//////////////////////////////////////////////////
//ビジュアル・テキストエディタ用パーツインクルード
//////////////////////////////////////////////////
if ( is_admin() ) {
	require_once locate_template('inc/editor/icon.php');         // エディタにアイコンウィンドウ追加用ファイル
	require_once locate_template('inc/editor/style.php');        // エディタにプレビュースタイル追加用ファイル
	require_once locate_template('inc/editor/menu.php');         // エディタにオリジナルメニュー追加用ファイル
	require_once locate_template('inc/editor/visual.php');       // ビジュアルエディタに項目追加用ファイル
	require_once locate_template('inc/editor/text.php');         // テキストエディタに項目追加用ファイル
}
