<?php
//////////////////////////////////////////////////
//カスタムフィールドインクルード
//////////////////////////////////////////////////
if ( is_admin() ) {
	require_once locate_template('inc/custom_field/seo.php');          // SEO設定用ファイル
	require_once locate_template('inc/custom_field/password.php');     // パスワード保護コンテンツ設定用ファイル
	require_once locate_template('inc/custom_field/column.php');       // カラム設定用ファイル
	require_once locate_template('inc/custom_field/cta.php');          // CTA設定用ファイル
	require_once locate_template('inc/custom_field/hide.php');         // 表示非表示設定用ファイル
	require_once locate_template('inc/custom_field/views.php');        // 投稿管理画面PV数表示用ファイル
	require_once locate_template('inc/custom_field/tag_scode.php');    // タグ管理ショートコード表示用ファイル
	require_once locate_template('inc/custom_field/tag_number.php');   // タグ管理閲覧数＆クリック数表示用ファイル
	require_once locate_template('inc/custom_field/rank_scode.php');   // タグランキングショートコード表示用ファイル
	require_once locate_template('inc/custom_field/tag_builder.php');  // タグ管理登録ビルダー用ファイル
	require_once locate_template('inc/custom_field/rank_builder.php'); // タグランキング登録ビルダー用ファイル
}
require_once locate_template('inc/custom_field/category.php');     // カテゴリー拡張用ファイル
require_once locate_template('inc/custom_field/tag.php');          // タグ拡張用ファイル
