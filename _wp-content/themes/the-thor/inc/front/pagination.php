<?php
////////////////////////////////////////////////////////
//オリジナルページネーションを作成
////////////////////////////////////////////////////////
function fit_pagination( $pages = '', $range = 2 ) {
	$showitems = ( $range * 2 ) + 1;
	global $paged;
	if ( empty( $paged ) ) $paged = 1;
	if ( $pages == '' ) {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if ( !$pages ) $pages = 1;
	}
	if ( 1 != $pages ) {
		echo '<ul class="pager">';
		if ( $paged > 1 ) echo '<li class="pager__item pager__item-prev"><a href="'.get_pagenum_link($paged - 1).'">Prev</a></li>';
		for ( $i = 1; $i <= $pages; $i++ ) {
			if ( !( $i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems ) {
				echo ( $paged == $i ) ? '<li class="pager__item pager__item-current">'.$i.'</li>':'<li class="pager__item"><a href="'.get_pagenum_link( $i ).'">'.$i.'</a></li>';
			}
		}
		if ( $paged < $pages ) echo '<li class="pager__item pager__item-next"><a href="'. get_pagenum_link( $paged + 1 ) . '">Next</a></li>';
		echo '</ul>';
	}
}
