<?php
////////////////////////////////////////////////////////
// URLパラメータキーを追加
////////////////////////////////////////////////////////
function fit_add_query_vars( $public_query_vars ) {
	$public_query_vars[] = 'meta_key'; //カスタムフィールドのキー
	$public_query_vars[] = 'meta_value'; //カスタムフィールドの値（文字列）
	$public_query_vars[] = 'sort'; //記事並べ替え用キー
	return $public_query_vars;
}
add_filter( 'query_vars', 'fit_add_query_vars' );
