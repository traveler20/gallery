<?php
//////////////////////////////////////////////////
//その他パーツインクルード
//////////////////////////////////////////////////
require_once locate_template('inc/parts/wp_head.php');         //wp_head用ファイル
require_once locate_template('inc/parts/wp_footer.php');       //wp_footer用ファイル
require_once locate_template('inc/parts/gallery_css.php');     //デフォルトのギャラリーCSSを無効化用ファイル
require_once locate_template('inc/parts/permalink.php');       //現在のページURLを取得用ファイル
require_once locate_template('inc/parts/img_id.php');          //イメージURLから画像のIDを取得用ファイル
require_once locate_template('inc/parts/class_content.php');   //Contentボックスにスタイルパーツ用class追加用ファイル
require_once locate_template('inc/parts/class_body.php');      //オリジナルBODYクラスを作成用ファイル
require_once locate_template('inc/parts/is_mobile.php');       //スマホとタブレット・PCで分岐設定用ファイル
require_once locate_template('inc/parts/is_bot.php');          //クローラーのアクセス判別用ファイル
require_once locate_template('inc/parts/split_page.php');      //ページ分割機能用ファイル
require_once locate_template('inc/parts/custom_menu.php');     //オリジナルカスタムメニュー設定用ファイル
require_once locate_template('inc/parts/search.php');          //検索対象を指定用ファイル
require_once locate_template('inc/parts/headline.php');        //各種ページのタイトル・サブタイトル設定用ファイル
require_once locate_template('inc/parts/eyecatch.php');        //アイキャッチ画像設定用ファイル
require_once locate_template('inc/parts/parameter.php');       //URLパラメータキーを追加用ファイル
require_once locate_template('inc/parts/archive_sort.php');    //アーカイブソート機能用ファイル
require_once locate_template('inc/parts/excerpt.php');         //excerpt抜粋文字数設定用ファイル
require_once locate_template('inc/parts/youtube_oembed.php');  //YouTube oEmbed DIVで囲む用ファイル
require_once locate_template('inc/parts/search_tag.php');      //複数タグ検索時の検索方法指定用ファイル
