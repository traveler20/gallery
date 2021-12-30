<?php
////////////////////////////////////////////////////////
//一覧管理画面で各種項目をソート可能にする
////////////////////////////////////////////////////////
function fit_column_orderby_custom( $vars ) {
    if ( isset( $vars['orderby'] ) && 'views' == $vars['orderby'] ) {
        $vars = array_merge( $vars, array(
            'meta_key' => 'post_views',
            'orderby' => 'meta_value_num'
        ));
	}
	if (isset($vars['orderby']) && 'click' == $vars['orderby']) {
		$vars = array_merge($vars, array(
			'meta_key' => 'afTag_click',
			'orderby' => 'meta_value_num'
		));
	}

    return $vars;
}
add_filter( 'request', 'fit_column_orderby_custom' );


function fit_posts_register_sortable( $sortable_column ) {
    $sortable_column['modified-last'] = 'modified';
	$sortable_column['views'] = 'views';
	$sortable_column['click'] = 'click';

    return $sortable_column;
}
add_filter( 'manage_edit-post_sortable_columns', 'fit_posts_register_sortable' );
add_filter( 'manage_edit-aftag_sortable_columns', 'fit_posts_register_sortable' );
