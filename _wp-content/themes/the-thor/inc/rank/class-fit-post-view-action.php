<?php
/**
 * 投稿閲覧時に動かしてアクセス数をカウントするスクリプトのクラスファイル
 */

if ( ! class_exists( 'Fit_Post_View_Action' ) ) {
	/**
	 * アクセス数カウント用のスクリプトをフッターに追加したり削除したりするクラス
	 */
	class Fit_Post_View_Action {
		const FOOTER_ACTION_PRIORITY = 20;
		private $post_id;

		/**
		 * コンストラクタ
		 *
		 * @param mixed $post_id 投稿ID
		 */
		public function __construct( $post_id ) {
			$this->post_id = $post_id;
		}

		/**
		 * コールされるメソッド
		 */
		public function __invoke() {
			set_post_views_script( $this->post_id );
			fit_update_database_post_views_script( $this->post_id );
		}

		/**
		 * wp_footerにadd_actionする
		 */
		public function add_wp_footer() {
			add_action( 'wp_footer', $this, self::FOOTER_ACTION_PRIORITY );
		}

		/**
		 * wp_footerからremove_actionする
		 */
		public function remove_wp_footer() {
			remove_action( 'wp_footer', $this, self::FOOTER_ACTION_PRIORITY );
		}
	}
}
