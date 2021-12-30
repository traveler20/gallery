<?php
////////////////////////////////////////////////////////
//content_width
////////////////////////////////////////////////////////
if (!isset($content_width)) $content_width = 1140;


////////////////////////////////////////////////////////
//srcset none
////////////////////////////////////////////////////////
add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );


//////////////////////////////////////////////////
//インクルード
//////////////////////////////////////////////////
require_once locate_template('inc/_t-check.php');             // ファイルチェックファイル
require_once locate_template('inc/fit-table-manager.php');    // 追加テーブル管理用ファイル
require_once locate_template('inc/db/post-accesslog.php');    // 投稿アクセス履歴保持テーブル用ファイル
require_once locate_template('inc/customizer.php');           // カスタマイザー設定用ファイル
require_once locate_template('inc/custom_post_taxonomy.php'); // カスタム投稿タイプ・タクソノミー用ファイル
require_once locate_template('inc/custom_field.php');         // カスタムフィールド用ファイル
require_once locate_template('inc/editor.php');               // ビジュアル・テキストエディター用ファイル
require_once locate_template('inc/list.php');                 // 管理画面の各種一覧画面用ファイル
require_once locate_template('inc/admin.php');                // その他管理画面用ファイル
require_once locate_template('inc/widget.php');               // ウィジェット関連パーツ用ファイル
require_once locate_template('inc/shortcode.php');            // ショートコードパーツ用ファイル
require_once locate_template('inc/front.php');                // フロント表示パーツ用ファイル
require_once locate_template('inc/seo.php');                  // SEOパーツ用ファイル
require_once locate_template('inc/amp.php');                  // AMP用ファイル
require_once locate_template('inc/pwa.php');                  // PWA用ファイル
require_once locate_template('inc/parts.php');                // その他パーツ用ファイル
require_once locate_template('inc/taxonomy_order.php');       // カテゴリー・タグの並び順変更用ファイル
require_once locate_template('inc/rank.php');                 // ランキング用ファイル
