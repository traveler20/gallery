<?php
////////////////////////////////////////////////////////
//SEO<title>タグの設定
////////////////////////////////////////////////////////

// <title>をwp_headで出力
function fit_title_setup() {
	add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'fit_title_setup' );

// <title>の区切り線を変更する
function fit_title_separator(){
	if ( get_option('fit_bsSeparator_symbol') ){
		$sep = get_option('fit_bsSeparator_symbol');
	}else{
		$sep = '│';
	}
    return $sep;
}
add_filter( 'document_title_separator', 'fit_title_separator' );

// <title>の設定
function fit_title_document() {
	// TOPページ(固定時)
	if ( is_front_page() && get_option( 'show_on_front' ) == 'page' ) {
		if ( get_post_meta(get_the_ID(), 'title', true) && get_post_meta(get_the_ID(), 'titleName', true) ) {
			$title = get_post_meta(get_the_ID(), 'title', true) .fit_title_separator() .get_bloginfo( 'name' );
		}
		elseif ( get_post_meta(get_the_ID(), 'title', true) && !get_post_meta(get_the_ID(), 'titleName', true) ) {
			$title = get_post_meta(get_the_ID(), 'title', true);
		}
		else {
			$title = get_the_title() .fit_title_separator() .get_bloginfo( 'name' );
		}
	}
	// TOPページ(投稿時)
	elseif ( is_front_page() && get_option( 'show_on_front' ) == 'posts' ) {
		if ( get_option('fit_seoTop_title') && get_option('fit_seoTop_name') ) {
			$title = get_option('fit_seoTop_title') .fit_title_separator() .get_bloginfo( 'name' );
		}
		elseif ( get_option('fit_seoTop_title') && !get_option('fit_seoTop_name') ) {
			$title = get_option('fit_seoTop_title');
		}
		else {
			$title = get_bloginfo( 'description' ) .fit_title_separator() .get_bloginfo( 'name' );
		}
	}
	// 詳細ページ
	elseif (is_singular() ) {
		if ( get_post_meta(get_the_ID(), 'title', true) && get_post_meta(get_the_ID(), 'titleName', true) ) {
			$title = get_post_meta(get_the_ID(), 'title', true) .fit_title_separator() .get_bloginfo( 'name' );
		}
        elseif ( get_post_meta(get_the_ID(), 'title', true) && !get_post_meta(get_the_ID(), 'titleName', true) ) {
			$title = get_post_meta(get_the_ID(), 'title', true);
		}
		else {
			$title = get_the_title() .fit_title_separator() .get_bloginfo( 'name' );
		}
    }
	// カテゴリアーカイブページ
	elseif (is_category() ) {
		$cat = get_query_var('cat');
		$cat_meta = get_option('category_'.$cat);
		if ( !empty($cat_meta['title']) && $cat_meta['titleName'] == 'on' ) {
			$title = $cat_meta['title'] .fit_title_separator() .get_bloginfo( 'name' );
		}
        elseif ( !empty($cat_meta['title']) && $cat_meta['titleName'] == 'off' || !empty($cat_meta['title']) && !$cat_meta['titleName'] ) {
			$title = $cat_meta['title'];
		}
		else {
			$title = fit_get_headline_title() .fit_title_separator() .get_bloginfo( 'name' );
		}
    }
	// タグアーカイブページ
	elseif (is_tag() ) {
		$tag = get_query_var('tag_id');
		$tag_meta = get_option('post_tag_'.$tag);
		if ( $tag_meta['title'] && $tag_meta['titleName'] == 'on' ) {
			$title = $tag_meta['title'] .fit_title_separator() .get_bloginfo( 'name' );
		}
        elseif ( $tag_meta['title'] && $tag_meta['titleName'] == 'off' || $tag_meta['title'] && !$tag_meta['titleName'] ) {
			$title = $tag_meta['title'];
		}
		else {
			$title = fit_get_headline_title() .fit_title_separator() .get_bloginfo( 'name' );
		}
    }
	// その他アーカイブ・検索結果・404などのページ
	else {
        $title = fit_get_headline_title() .fit_title_separator() .get_bloginfo( 'name' );
	}
	return $title;
}
add_filter( 'pre_get_document_title', 'fit_title_document' );
