<?php
////////////////////////////////////////////////////////
//フロント画面からアクセス数を保存
////////////////////////////////////////////////////////

if ( ! function_exists( 'set_post_views_script' ) ) {
	/**
	 * 投稿とタグのアクセス数登録するためのAjaxスクリプトを出力する
	 *
	 * @return void
	 */
	function set_post_views_script( $postId ) {
		$url    = admin_url( 'admin-ajax.php' );
		$script = <<<EOS
<script>
jQuery( function( $ ) {
	$.ajax( {
		type: 'POST',
		url:  '$url',
		data: {
			'action'  : 'fit_set_post_views',
			'post_id' : '$postId',
		},
	} );
} );
</script>
EOS;

		echo $script;
	}
}

if ( ! function_exists( 'fit_ajax_set_post_views' ) ) {
	/**
	 * 投稿とタグのアクセス数を増やす
	 *
	 * @return void
	 */
	function fit_ajax_set_post_views() {
		$postID    = filter_input( INPUT_POST, 'post_id', FILTER_VALIDATE_INT );
		$count_key = 'post_views';
		$count     = get_post_meta( $postID, $count_key, true );

		// アクセス数をカスタムタクソノミーのキーに保存
		if ( $count == '' ) {
			$count = 0;
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, '1' );
		} else {
			$count = $count + 1;
			update_post_meta( $postID, $count_key, $count );
		}

		die();
	}
	add_action( 'wp_ajax_nopriv_fit_set_post_views', 'fit_ajax_set_post_views' );
}
