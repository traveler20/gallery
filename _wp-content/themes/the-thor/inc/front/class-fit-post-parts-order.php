<?php

if ( ! class_exists( 'Fit_Post_Parts_Order' ) ) {
	/**
	 * 投稿ページのコンテンツ並び替え用のユーティリティークラス
	 */
	class Fit_Post_Parts_Order {
		// フォローボタン
		public static $follow = 'follow';
		// Prev Next記事
		public static $prevnext = 'prevnext';
		// プロフィール
		public static $profile = 'profile';
		// 関連記事
		public static $related = 'related';

		/**
		 * 表示する順番で並べた配列を返す
		 */
		public static function get_parts_order() {
			$parts = array(
				array(
					'name'         => self::$follow,
					'defaultOrder' => 1,
					'order'        => get_option( 'fit_postSns_order' ),
				),
				array(
					'name'         => self::$prevnext,
					'defaultOrder' => 2,
					'order'        => get_option( 'fit_postPrevNext_order' ),
				),
				array(
					'name'         => self::$profile,
					'defaultOrder' => 3,
					'order'        => get_option( 'fit_postProfile_order' ),
				),
				array(
					'name'         => self::$related,
					'defaultOrder' => 4,
					'order'        => get_option( 'fit_postRelated_order' ),
				),
			);

			foreach ( $parts as $key => $value ) {
				$tempOrderArray[ $key ]        = $value['order'];
				$tempDefaultOrderArray[ $key ] = $value['defaultOrder'];
			}

			array_multisort( $tempOrderArray, SORT_NUMERIC, $tempDefaultOrderArray, $parts );

			return $parts;
		}
	}
}
