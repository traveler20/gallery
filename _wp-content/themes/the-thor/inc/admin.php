<?php
//////////////////////////////////////////////////
//その他管理画面用パーツインクルード
//////////////////////////////////////////////////
if ( is_admin() ) {
	require_once locate_template('inc/admin/script_style.php'); // CSS＆JSファイル読み込み用ファイル
	require_once locate_template('inc/admin/user.php');         // ユーザープロフィール項目追加用ファイル
	require_once locate_template('inc/admin/term_editor.php');  // カテゴリ・タグ登録項目追加用ファイル
	require_once locate_template('inc/admin/data.php');         // 各種データ用ファイル
	require_once locate_template('inc/admin/dashboard.php');    // オリジナルダッシュボード設定用ファイル
	require_once locate_template('inc/admin/js_const.php');     // JSファイルでPHPで取得できる情報を使う用ファイル
}
require_once locate_template('inc/admin/security_login.php');   // セキュリティ対策ログイン用ファイル
require_once locate_template('inc/admin/rss.php');              // カスタム投稿フィード追加用ファイル
require_once locate_template('inc/admin/attachment.php');       // 添付ファイルページ設定用ファイル
