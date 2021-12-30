<?php
////////////////////////////////////////////////////////
// アーカイブソート機能
////////////////////////////////////////////////////////
function fit_archive_sort( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}
	$index = 'post_views';
	$sortset = (string)filter_input(INPUT_GET, 'sort');
	if ( $sortset === 'older' ) {//古い
		$query->set( 'orderby', 'date' );
		$query->set( 'order', 'ASC' );
	} elseif ( $sortset === 'popular' ) { //閲覧多
		$query->set( 'meta_key', $index );
		$query->set( 'orderby', 'meta_value_num' );
	} elseif ( $sortset === 'unpopular' ) { //閲覧少
		$query->set( 'meta_key', $index );
		$query->set( 'orderby', 'meta_value_num' );
		$query->set( 'order', 'ASC' );
	} else { //それ以外（新しい）
		$query->set( 'orderby', 'date' );
	}
	return;
}
add_action( 'pre_get_posts', 'fit_archive_sort' );
