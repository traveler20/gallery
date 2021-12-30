<?php
////////////////////////////////////////////////////////
//ショートコードで記事中に広告を挿入
////////////////////////////////////////////////////////
function fit_shortcode_adcode() {
	if(get_option('fit_adPost_style')){
		$style = ' adPost-no';
	}else{
		$style = '';
	}
	if (isset($_GET["type"]) && $_GET['type'] == 'AMP' && is_single() && get_option('fit_ampFunction_switch') == 'on' && get_post_meta(get_the_ID(), 'amp_hide', true) != '1') {
		return '<div class="adPost'.$style.'">'.get_option('fit_ampAd_tag').'<span class="adPost__title">'.get_option('fit_adPost_text').'</span></div>';
	}else{
		return '<div class="adPost'.$style.'">'.get_option('fit_adPost_tag').'<span class="adPost__title">'.get_option('fit_adPost_text').'</span></div>';
	}
}
add_shortcode('adcode', 'fit_shortcode_adcode');

// 投稿内の最初のHタグの手前に広告ショートコードを表示
function fit_ad_headline( $the_content ) {
	if (
		get_option( 'fit_adPost_hFirst' )
		|| get_option( 'fit_adPost_hSecond' )
		|| get_option( 'fit_adPost_hThird' )
		|| get_option( 'fit_adPost_hFourth' )
		|| get_option( 'fit_adPost_hFifth' )
	) {
		// 投稿ページの場合
		if ( is_singular( 'post' ) ) {
			// hタグを表す正規表現
			$tag = '(<h[1-6][\s\S]*?<\/h[1-6]>)';
			// 本文中のタグの数
			$tag_count = preg_match_all( '/' . $tag . '/is', $the_content );
			if ( $tag_count > 0 ) {
				// 本文からタグを検索して置き換えるための正規表現
				$pattern = '/';
				$max_count = ( $tag_count <= 5 ) ? $tag_count : 5;
				for ( $i = 1; $i <= $max_count; $i++ ) {
					if ( $i !== 1) {
						$pattern .= '([\s\S]*?)';
					}
					$pattern .= $tag;
				}
				$pattern .= '/is';

				// 広告
				$ad = fit_shortcode_adcode();

				// 置換後の文字列(対象のタグの前に広告を追加している)
				$replacement = '';
				if ( $tag_count >= 1 ) {
					// 1番目のタグの直前に$adを挿入
					if ( get_option( 'fit_adPost_hFirst' ) ) {
						$replacement .= $ad;
					}
					$replacement .= '${1}';
				}
				if ( $tag_count >= 2 ) {
					$replacement .= '${2}';
					// 2番目のタグの直前に$adを挿入
					if ( get_option( 'fit_adPost_hSecond' ) ) {
						$replacement .= $ad;
					}
					$replacement .= '${3}';
				}
				if ( $tag_count >= 3 ) {
					$replacement .= '${4}';
					// 3番目のタグの直前に$adを挿入
					if ( get_option( 'fit_adPost_hThird' ) ) {
						$replacement .= $ad;
					}
					$replacement .= '${5}';
				}
				if ( $tag_count >= 4 ) {
					$replacement .= '${6}';
					// 4番目のタグの直前に$adを挿入
					if ( get_option( 'fit_adPost_hFourth' ) ) {
						$replacement .= $ad;
					}
					$replacement .= '${7}';
				}
				if ( $tag_count >= 5 ) {
					$replacement .= '${8}';
					// 5番目のタグの直前に$adを挿入
					if ( get_option( 'fit_adPost_hFifth' ) ) {
						$replacement .= $ad;
					}
					$replacement .= '${9}';
				}

				$the_content = preg_replace( $pattern, $replacement, $the_content );
			}
		}
	}
	return $the_content;
}
add_filter( 'the_content', 'fit_ad_headline', 21 );
