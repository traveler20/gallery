<?php
/**
 * ランキング機能の関数用ファイル
 */

if ( ! function_exists( 'fit_init_bsRank_startDatetime' ) ) {
	/**
	 * 日週月ランク用の集計開始日時初期化
	 */
	function fit_init_bsRank_startDatetime() {
		$rank = new Fit_Rank();

		if ( ! $rank->start_datetime ) {
			$rank->set_start_datetime();
		}
	}
	add_action( 'init_fit_post_accesslog_table', 'fit_init_bsRank_startDatetime' );
}

if ( ! function_exists( 'fit_update_database_post_views_script' ) ) {
	/**
	 * 投稿とタグのアクセス情報をDB登録するためのAjaxスクリプトを出力する
	 *
	 * @return void
	 */
	function fit_update_database_post_views_script( $postId ) {
		$url    = admin_url( 'admin-ajax.php' );
		$script = <<<EOS
<script>
jQuery( function( $ ) {
	$.ajax( {
		type: 'POST',
		url:  '$url',
		data: {
			'action' : 'fit_update_post_view_data',
			'post_id' : '$postId',
		},
	} );
} );
</script>
EOS;

		echo $script;
	}
}

if ( ! function_exists( 'fit_update_meta_post_views_by_period_script' ) ) {
	/**
	 * リアルタイムではない日週月ランキングのデータ更新用スクリプトを出力する
	 */
	function fit_update_meta_post_views_by_period_script() {
		$url    = admin_url( 'admin-ajax.php' );
		$script = <<<EOS
<script>
jQuery( function( $ ) {
	$.ajax( {
		type: 'POST',
		url:  '$url',
		data: {
			'action' : 'fit_update_post_views_by_period',
		},
	} );
} );
</script>
EOS;

		echo $script;
	}
	add_action( 'wp_footer', 'fit_update_meta_post_views_by_period_script' );
	add_action( 'admin_footer', 'fit_update_meta_post_views_by_period_script' );
}

if ( ! function_exists( 'fit_add_ranking_box_script' ) ) {
	/**
	 * TOPページにアクセスランキングを表示するスクリプト
	 */
	function fit_add_ranking_box_script() {
		$url    = admin_url( 'admin-ajax.php' );
		$script = <<<EOS
<script>
jQuery( function( $ ) {
	$.ajax( {
		type: 'POST',
		url:  '$url',
		data: {
			'action' : 'fit_add_ranking_box',
		},
	} )
	.done( function( data ) {
		$( '.rankingBox__inner' ).html( data );
	} );
} );
</script>
EOS;

		echo $script;
	}
}

if ( ! function_exists( 'fit_add_ranklist_scode_script' ) ) {
	/**
	 * ランキング表示ショートコードのHTMLを生成するスクリプト
	 */
	function fit_add_ranklist_scode_script( $id, $atts ) {
		$url    = admin_url( 'admin-ajax.php' );
		$num    = $atts['num'];
		$cat    = $atts['cat'];
		$tag    = $atts['tag'];
		$writer = $atts['writer'];
		$period = $atts['period'];
		$script = <<<EOS
<script>
jQuery( function( $ ) {
	$.ajax( {
		type: 'POST',
		url:  '$url',
		data: {
			'action' : 'fit_add_ranklist_scode',
			'num' : '$num',
			'cat' : '$cat',
			'tag' : '$tag',
			'writer' : '$writer',
			'period' : '$period',
		},
	} )
	.done( function( data ) {
		$( '#ranklist-$id' ).html( data );
	} );
} );
</script>
EOS;

		echo $script;
	}
}

if ( ! function_exists( 'fit_add_rank_widget_script' ) ) {
	/**
	 * 人気記事ウィジェットのHTMLを生成するスクリプト
	 */
	function fit_add_rank_widget_script( $id, $instance ) {
		$url      = admin_url( 'admin-ajax.php' );
		$instance = json_encode( $instance );
		$script   = <<<EOS
<script>
jQuery( function( $ ) {
	$.ajax( {
		type: 'POST',
		url:  '$url',
		data: {
			'action':   'fit_add_rank_widget',
			'instance': '$instance',
		},
	} )
	.done( function( data ) {
		$( '#rankwidget-$id' ).html( data );
	} );
} );
</script>
EOS;

		echo $script;
	}
}

if ( ! function_exists( 'fit_add_category_rank_widget_script' ) ) {
	/**
	 * 人気記事ウィジェットのHTMLを生成するスクリプト
	 */
	function fit_add_category_rank_widget_script( $id, $instance ) {
		$url      = admin_url( 'admin-ajax.php' );
		$instance = json_encode( $instance );
		$script   = <<<EOS
<script>
jQuery( function( $ ) {
	$.ajax( {
		type: 'POST',
		url:  '$url',
		data: {
			'action':   'fit_add_category_rank_widget',
			'instance': '$instance',
		},
	} )
	.done( function( data ) {
		$( '#categoryrankwidget-$id' ).html( data );
	} );
} );
</script>
EOS;

		echo $script;
	}
}

/**
 * アクセス数ランキングを表示するショートコードとウィジェットの識別用IDを生成する
 */
function fit_ranklist_id_hash() {
	$now = new DateTime();
	return md5( $now->format( 'YmdHisu' ) . mt_rand( 10, 99 ) );
}
