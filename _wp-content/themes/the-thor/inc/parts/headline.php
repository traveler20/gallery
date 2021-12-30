<?php
////////////////////////////////////////////////////////
// 各種ページのタイトル・サブタイトル設定
////////////////////////////////////////////////////////

// 各種ページ用見出し＆<title>用タイトル設定
function fit_get_headline_title() {
	//日付アーカイブページ
	if (is_date()) {
		if (is_year()) {
			$date_name = get_query_var('year').'年';
		}elseif (is_month()) {
			$date_name = get_query_var('year').'年'.get_query_var('monthnum').'月';
		}else{
			$date_name = get_query_var('year').'年'.get_query_var('monthnum').'月'.get_query_var('day').'日';
		}
		return $date_name;
	}
	//カスタム投稿タイプのアーカイブページ
	if (is_post_type_archive()) {
		return post_type_archive_title('',false);
	}
	//投稿者アーカイブページ
	if (is_author()) {
		return get_queried_object()->data->display_name;
	}
	//検索結果ページ
	if (is_search()) {
		if(get_search_query()){
			$search_name = '「'.get_search_query().'」の検索結果';
		}else{
			$search_name = '検索結果';
		}
		return $search_name;
	}
	//404ページ
	if (is_404()) {
		return 'Hello! My Name Is 404';
	}
	//それ以外(カテゴリ・タグ・タクソノミーアーカイブページ)
	return single_term_title('',false);
}


// 各種ページ用サブタイトル設定
function fit_get_headline_subtitle() {
	//日付アーカイブページ
	if (is_date()) {
		if (is_year()) {
			$date_name = '<i class="icon-calendar"></i>YEAR';
		}elseif (is_month()) {
			$date_name = '<i class="icon-calendar"></i>MONTH';
		}else{
			$date_name = '<i class="icon-calendar"></i>DAY';
		}
		return $date_name;
	}
	//投稿者アーカイブページ
	if (is_author()) {
		return '<i class="icon-user"></i>AUTHOR';
	}
	//検索アーカイブページ
	if (is_search()) {
		return '<i class="icon-search"></i>SEARCH';
	}
	//カテゴリアーカイブページ
	if (is_category()) {
		return '<i class="icon-folder"></i>CATEGORY';
	}
	//タグアーカイブページ
	if (is_tag()) {
		return '<i class="icon-tag"></i>TAG';
	}
	//それ以外(カスタム投稿・タクソノミーアーカイブページ)
	return '<i class="icon-book"></i>ARCHIVE';
}
