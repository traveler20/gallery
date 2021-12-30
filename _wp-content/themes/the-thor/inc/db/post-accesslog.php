<?php
/**
 * 投稿アクセス履歴保持テーブル
 */

if ( ! function_exists( 'init_fit_post_accesslog' ) ) {
	/**
	 * バージョンが違うときにテーブルを最新の状態にする
	 */
	function init_fit_post_accesslog() {
		$post_accesslog = new Fit_Post_Accesslog();
		$post_accesslog->create_table();
		update_option( 'fit_post_accesslog_table_version', FIT_POST_ACCESSLOG_TABLE_VERSION );
	}
	add_action( 'init_fit_post_accesslog_table', 'init_fit_post_accesslog' );
}

if ( ! class_exists( 'Fit_Post_Accesslog' ) ) {
	/**
	 * 投稿アクセス履歴保持テーブル操作用クラス
	 */
	class Fit_Post_Accesslog {

		var $table_name = 'fit_post_accesslog';

		/**
		 * コンストラクター
		 */
		public function __construct() {
			global $wpdb;
			$this->table_name = $wpdb->prefix . $this->table_name;
		}

		/**
		 * テーブルの作成または更新
		 *
		 * @return void
		 */
		public function create_table() {
			global $wpdb;

			$charset = $wpdb->get_charset_collate();
			$sql     = <<<EOT
CREATE TABLE $this->table_name (
	id bigint(20) UNSIGNED AUTO_INCREMENT,
	post_id bigint(20) UNSIGNED NOT NULL,
	access_datetime datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
	UNIQUE KEY id (id),
	KEY fit_post_accesslog_idx_access_datetime_post_id (access_datetime, post_id)
) $charset;
EOT;

			require_once ABSPATH . 'wp-admin/includes/upgrade.php';
			dbDelta( $sql );
		}

		/**
		 * データ登録
		 *
		 * @param int    $post_id 投稿ID
		 * @param string $datetime 日時の文字列
		 * @return mixed データ登録に成功: 1 、失敗: false
		 */
		public function insert( $post_id, $datetime = '' ) {
			global $wpdb;

			if ( '' !== $datetime ) {
				try {
					$objectDatetime = new DateTime( $datetime );
					$datetime       = $objectDatetime->format( 'Y-m-d H:i:s' );
				} catch ( Exception $e ) {
					// 日付のフォーマットが正しくない場合は処理終了
					return false;
				}
			} else {
				$datetime = date_i18n( 'Y-m-d H:i:s' );
			}

			return $wpdb->insert(
				$this->table_name,
				array(
					'post_id'         => $post_id,
					'access_datetime' => $datetime,
				)
			);
		}

		/**
		 * データ削除
		 *
		 * @param int    $post_id 投稿ID
		 * @return mixed 削除した行数、失敗の場合はfalse
		 */
		/*
		 public function delete( int $post_id ) {
			global $wpdb;

			return $wpdb->delete(
				$this->table_name,
				array(
					'post_id' => $post_id,
				),
				array(
					'%d'
				),
			);
		}
		*/

		/**
		 * 全データ削除
		 *
		 * @return mixed 削除した行数、失敗の場合はfalse
		 */
		public function delete_all() {
			global $wpdb;

			return $wpdb->query(
				"
				DELETE FROM $this->table_name
				"
			);
		}

		/**
		 * 投稿IDごとにアクセス数を集計してを配列で取得する
		 *
		 * @param mixed $from 検索対象期間のFrom
		 * @param mixed $to 検索対象期間のTo
		 * @return array key:投稿ID value:アクセス数 の連想配列
		 */
		public function get_page_view_list_group_by_post_id( $from, $to ) {
			global $wpdb;

			$sql = <<<EOT
SELECT 
	post_id, 
	count(*) pv 
FROM 
	$this->table_name 
WHERE 
	access_datetime BETWEEN %s AND %s 
GROUP BY 
	post_id 
EOT;

			$results = $wpdb->get_results(
				$wpdb->prepare( $sql, esc_sql( $from ), esc_sql( $to ) )
			);

			$ret = array();
			foreach ( $results as $result ) {
				$ret[ $result->post_id ] = $result->pv;
			}
			return $ret;
		}
	}
}
