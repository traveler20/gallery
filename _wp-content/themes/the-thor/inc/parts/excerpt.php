<?php
////////////////////////////////////////////////////////
//excerpt抜粋文字数設定
////////////////////////////////////////////////////////
function fit_excerpt_length( $length ) {
	if (get_option('fit_archiveList_excerpt')){
		$excerpt = get_option('fit_archiveList_excerpt');
	}else{
		$excerpt = 200;
	}
	return $excerpt;
}
add_filter( 'excerpt_length', 'fit_excerpt_length', 999 );
