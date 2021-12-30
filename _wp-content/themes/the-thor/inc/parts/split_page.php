<?php
////////////////////////////////////////////////////////
//ページ分割機能
////////////////////////////////////////////////////////
//分割ページURLの取得
function fit_split_page_url($rel='prev') {
	global $post;
	$url = '';
	$multipage = check_split_page();
	if($multipage[0] > 1) {
		$numpages = $multipage[0];
		$page = $multipage[1] == 0 ? 1 : $multipage[1];
		$i = 'prev' == $rel? $page - 1: $page + 1;
		if($i && $i > 0 && $i <= $numpages) {
			if(1 == $i) {
				$url = get_permalink();
			} else {
				if ('' == get_option('permalink_structure') || in_array($post->post_status, array('draft', 'pending'))) {
					$url = add_query_arg('page', $i, get_permalink());
				} else {
					$url = trailingslashit(get_permalink()).user_trailingslashit($i, 'single_paged');
				}
			}
		}
	}
	return $url;
}

//分割ページかどうかをチェック
function check_split_page() {
	global $post;
	$num_pages = substr_count($post->post_content,'<!--nextpage-->'  ) + 1;
	$current_page = get_query_var( 'page' );
	return array ( $num_pages, $current_page );
}

//分割ページ用ページャー設定
function fit_link_pages( $args = '' ) {
	$defaults = array(
		'before'           => '<ul class="pagePager">',
		'after'            => '</ul>',
		'next_or_number'   => 'number',
		'separator'        => '',
		'pagelink'         => '%',
		'echo'             => 1
	);
	$r = wp_parse_args( $args, $defaults );
	$r = apply_filters( 'wp_link_pages_args', $r );
	extract( $r, EXTR_SKIP );

	global $page, $numpages, $multipage, $more, $pagenow;
	$output = '';
	if ( $multipage ) {
		if ( 'number' == $next_or_number ) {
			$output .= $before;
			for ( $i = 1; $i < ( $numpages + 1 ); $i = $i + 1 ) {
			$j = str_replace( '%', $i, $pagelink );
			$output .= ' ';
			if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
				$output .= '<li class="pagePager__item">' . _wp_link_page( $i );
			else
				$output .= '<li class="pagePager__item pagePager__item-current">';

			$output .= $j;
			if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
				$output .= '</a></li>';
			else
				$output .= '</span></li>';
		}
		$output .= $after;
	} else {
		if ( $more ) {
			$output .= $before;
			$i = $page - 1;
				if ( $i && $more ) {
					$output .= _wp_link_page( $i );
					$output .= $previouspagelink. '</a>';
				}
				$i = $page + 1;
				if ( $i <= $numpages && $more ) {
					$output .= _wp_link_page( $i );
					$output .=  $nextpagelink . '</a>';
				}
				$output .= $after;
			}
		}
	}
	if ( $echo )
		echo $output;
	return $output;
}
