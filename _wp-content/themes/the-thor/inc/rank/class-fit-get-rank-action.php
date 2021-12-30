<?php
/**
 * アクセス数ランキングを取得するスクリプトのクラスファイル
 */

if ( ! class_exists( 'Fit_Get_Rank_Action' ) ) {
	/**
	 * アクセス数ランキング取得用のスクリプトをフッターに追加したり削除したりするクラス
	 */
	class Fit_Get_Rank_Action {
		const TYPE_SCODE             = 'scode';
		const TYPE_RANK              = 'rank';
		const TYPE_CAT_RANK          = 'catrank';
		const FOOTER_ACTION_PRIORITY = 20;
		private $post_id;
		private $type;
		private $args;

		/**
		 * コンストラクタ
		 *
		 * @param mixed  $post_id 投稿ID
		 * @param string $type 処理区分 scode:ショートコード rank:人気記事ウィジェット catrank:カテゴリ人気記事ウィジェット
		 * @param array  $args 引数パラメーター
		 */
		public function __construct( $post_id, $type, $args ) {
			$this->post_id = $post_id;
			$this->type    = $type;
			$this->args    = $args;
		}

		/**
		 * コールされるメソッド
		 */
		public function __invoke() {
			switch ( $this->type ) {
				case self::TYPE_SCODE:
					if ( key_exists( 'atts', $this->args ) ) {
						fit_add_ranklist_scode_script( $this->post_id, $this->args['atts'] );
					}
					break;
				case self::TYPE_RANK:
					if ( key_exists( 'instance', $this->args ) ) {
						fit_add_rank_widget_script( $this->post_id, $this->args['instance'] );
					}
					break;
				case self::TYPE_CAT_RANK:
					if ( key_exists( 'instance', $this->args ) ) {
						fit_add_category_rank_widget_script( $this->post_id, $this->args['instance'] );
					}
					break;
			}
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
