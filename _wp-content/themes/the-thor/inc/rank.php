<?php
//////////////////////////////////////////////////
//ランキング機能用ファイルインクルード
//////////////////////////////////////////////////
require_once locate_template( 'inc/rank/rank.php' );                       // ランキング関数用ファイル
require_once locate_template( 'inc/rank/rank-ajax.php' );                  // ランキングAjax用ファイル
require_once locate_template( 'inc/rank/class-fit-rank.php' );             // ランキングクラス用ファイル
require_once locate_template( 'inc/rank/class-fit-post-view-action.php' ); // アクセス数カウントスクリプトのクラス
require_once locate_template( 'inc/rank/class-fit-get-rank-action.php' );  // アクセス数ランキング取得スクリプトのクラス
