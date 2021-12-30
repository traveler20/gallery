<?php
////////////////////////////////////////////////////////
//検索対象を指定
////////////////////////////////////////////////////////
function fit_posts_search($search) {

	if ( get_option('fit_bsSearch_object') == 'post' ) {
		if(is_search()) {
			$search .= " AND post_type = 'post'";
		}
		return $search;
	}elseif ( get_option('fit_bsSearch_object') == 'page' ) {
		if(is_search()) {
			$search .= " AND post_type = 'page'";
		}
		return $search;
	}else{
		if(is_search()) {
			$search .= " AND (post_type = 'post' OR post_type='page')";
		}
		return $search;
	}
}
if ( !is_admin() ) {
	add_filter('posts_search', 'fit_posts_search', 10,2);
}
