<?php
/**
 * THE THORで追加するテーブルを管理するファイル
 *
 * テーブルのバージョンを定義してinitアクションフックで
 * 現在登録されているバージョンと比較して処理を行う
 */

if ( ! defined( 'FIT_POST_ACCESSLOG_TABLE_VERSION' ) ) {
	// 投稿アクセス履歴保持テーブルのバージョン
	define( 'FIT_POST_ACCESSLOG_TABLE_VERSION', '20200301' );
}

if ( ! function_exists( 'fit_table_version_check' ) ) {
	/**
	 * テーブルのバージョンを確認して処理を分ける
	 */
	function fit_table_version_check() {
		if ( FIT_POST_ACCESSLOG_TABLE_VERSION != get_option( 'fit_post_accesslog_table_version' ) ) {
			do_action( 'init_fit_post_accesslog_table' );
		}
	}
	add_action( 'init', 'fit_table_version_check' );
}
