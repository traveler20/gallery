<?php
////////////////////////////////////////////////////////
//デフォルト一覧(投稿・ページ・カテゴリー)に項目追加
////////////////////////////////////////////////////////

//本文からscriptタグ内の要素+PHP_EOLを削除する関数(項目表示で使用)
function removeScriptEOL($content){
	$content = preg_replace("/<script.+?<\/script>/is", "", $content) ;
	$content = str_replace(PHP_EOL, '', $content);
	return $content;
}


//キーワード使用率検索フォーム出力(POST)
function add_keyword_form( $views ){
  $keyword = '';
	if (isset($_GET["seo_keyword"])) {
		$keyword = $_GET['seo_keyword'];
	}
	$views['seo_keyword'] ='
	<p class="search-box">
	  <form id="posts-keyword" method="get">
		  <input type="search" id="post-search-keyword" name="seo_keyword" value="'.$keyword.'">
		  <input type="submit" id="search-submit" class="button" value="投稿内のキーワード使用数を検索">
	  </form>
	</p>
	';
  return $views;
}
add_filter('views_edit-post', 'add_keyword_form');

//テーブル追加(投稿)
function add_posts_columns($columns) {
	$columns['modified-last'] = '最終更新日';
	if(get_option('fit_bsAnalysis_views')){$columns['views'] = '総合閲覧数';}
	if(get_option('fit_bsAnalysis_averageViews')){$columns['averageViews'] = '平均閲覧数';}
	if(get_option('fit_bsAnalysis_titleNumber')){$columns['titleNumber'] = 'タイトル文字数';}
	if(get_option('fit_bsAnalysis_contentNumber')){$columns['contentNumber'] = '本文文字数';}
	if(get_option('fit_bsAnalysis_titleKeyword')){$columns['titleKeyword'] = 'タイトル内キーワード数';}
	if(get_option('fit_bsAnalysis_contentKeyword')){$columns['contentKeyword'] = '本文内キーワード数';}
	if(get_option('fit_bsAnalysis_contentInLink')){$columns['contentInLink'] = '内リンク数';}
	if(get_option('fit_bsAnalysis_contentOutLink')){$columns['contentOutLink'] = '発リンク数';}
	$columns['postid'] = 'ID';
	$columns['thumbnail'] = 'サムネイル';
	return $columns;
}
add_filter( 'manage_edit-post_columns', 'add_posts_columns' );


//テーブル追加(ページ)
function add_pages_columns($columns) {
	$columns['modified-last'] = '最終更新日';
	$columns['postid'] = 'ID';
	$columns['thumbnail'] = 'サムネイル';
	return $columns;
}
add_filter( 'manage_edit-page_columns', 'add_pages_columns' );


//テーブル追加(カテゴリー)
function add_category_columns($columns){
	$index = 2;
	return array_merge(
    array_slice($columns, 0, $index),
		array('id' => 'ID'),
    array_slice($columns, $index)
  );
}
add_filter("manage_edit-category_columns", "add_category_columns");

// テーブル追加(タグ)
function add_tag_columns( $columns ){
	// 2列目にIDを追加
	$index = 2;
	$columns = array_merge(
		array_slice( $columns, 0, $index ),
		array( 'id' => 'ID' ),
		array_slice( $columns, $index )
	);

	return $columns;
}
add_filter( "manage_edit-post_tag_columns", "add_tag_columns" );

//項目表示(投稿)
function add_posts_columns_list($column_name, $post_id) {

	//最終更新日表示
	if ( $column_name == 'modified-last' ){
		echo '<abbr title="'.get_the_modified_date( 'Y年m月d日 a G:i:s' ).'">'.get_the_modified_date( 'Y年n月d日' ).'</abbr>';
	}
	//閲覧数表示
	if ( $column_name == 'views' ) {
		$views = get_post_meta($post_id, 'post_views', true);
		echo (int)esc_attr($views);
	}
	//平均閲覧数表示
	if ( $column_name == 'averageViews' ) {
		$Date1 = get_the_time('Y-m-d', $post_id);//投稿日をセット
		$Date2 = date_i18n("Y-m-d");//今日をセット
		$TimeStamp1 = strtotime($Date1);//日付をUNIXタイムスタンプに変換
		$TimeStamp2 = strtotime($Date2);//日付をUNIXタイムスタンプに変換
		$SecondDiff = abs($TimeStamp2 - $TimeStamp1);//何秒離れているかを計算(絶対値)
		$DayDiff = $SecondDiff / (60 * 60 * 24) + 1;//秒を日数に変換(投稿日から何日？)
		$count   = get_post_meta($post_id, 'post_views', true);//総合閲覧数
		$average = (int)$count / (int)$DayDiff;//平均閲覧数(1日)
		echo (int)esc_attr($average);
	}
	//タイトル文字数
	if ( $column_name == 'titleNumber' ) {
		$title = get_the_title($post_id);
		echo mb_strlen( $title );
	}
	//本文文字数
	if( $column_name == 'contentNumber' ) {
		$post = get_post( $post_id );
		$excerpt_text	= wp_html_excerpt( $post->post_content, 99999);
		echo mb_strlen($excerpt_text);
	}
	//タイトル内キーワード数
	if ( $column_name == 'titleKeyword' ) {
		if (isset($_GET["seo_keyword"]) && $_GET["seo_keyword"] != "") {
			$keyword = $_GET['seo_keyword'];
			$title = get_the_title($post_id);
			echo '<b>'.mb_substr_count($title, $keyword).'</b>';
		} else {
			echo '0';
		}
	}
	//本文内キーワード数
	if ( $column_name == 'contentKeyword' ) {
		if (isset($_GET["seo_keyword"]) && $_GET["seo_keyword"] != "") {
			$keyword = $_GET['seo_keyword'];
			$content = get_page($post_id);
			$content = do_shortcode($content -> post_content);
			echo '<b>'.mb_substr_count($content, $keyword).'</b>';
		} else {
			echo '0';
		}
	}
	//内リンク数
	if ( $column_name == 'contentInLink' ) {
		$ajaxUrl = admin_url('admin-ajax.php');
		$numInLink = <<<"numInLink"
<p>取得中</p>
<script>
jQuery(document).ready(function() {
	jQuery.get("$ajaxUrl",
		{action: "get_in_link", post_id: $post_id},
		function(res) {
			jQuery("#post-$post_id > .contentInLink").text(res);
		}
	);
});
</script>
numInLink;
		echo $numInLink;
	}
	//発リンク数
	if ( $column_name == 'contentOutLink' ) {
		$ajaxUrl = admin_url('admin-ajax.php');
		$numOutLink = <<<"numOutLink"
<p>取得中</p>
<script>
jQuery(document).ready(function() {
	jQuery.get("$ajaxUrl",
		{action: "get_out_link", post_id: $post_id},
		function(res) {
			jQuery("#post-$post_id > .contentOutLink").text(res);
		}
	);
});
</script>
numOutLink;
		echo $numOutLink;
	}
	//記事ID表示
	if ( $column_name == 'postid' ) {
		echo $post_id;
	}
	//サムネイル表示
	if ( $column_name == 'thumbnail') {
		if (has_post_thumbnail($post_id)) {
				$thumb = get_the_post_thumbnail($post_id, array(50,50), 'thumbnail');
			}else {
				$thumb = '<img src="' . get_template_directory_uri() . '/img/img_no_thumbnail.gif' . '" width="50" height="50" />';
			}
		echo $thumb;
	}
}
add_action( 'manage_post_posts_custom_column', 'add_posts_columns_list', 10, 2 );


//項目表示(ページ)
function add_pages_columns_list($column_name, $post_id) {

	//最終更新日表示
	if ( $column_name == 'modified-last' ){
		echo '<abbr title="'.get_the_modified_date( 'Y年m月d日 a G:i:s' ).'">'.get_the_modified_date( 'Y年n月d日' ).'</abbr>';
	}
	//記事ID表示
	if ( $column_name == 'postid' ) {
		echo $post_id;
	}
	//サムネイル表示
	if ( $column_name == 'thumbnail') {
		if (has_post_thumbnail($post_id)) {
				$thumb = get_the_post_thumbnail($post_id, array(50,50), 'thumbnail');
			}else {
				$thumb = '<img src="' . get_template_directory_uri() . '/img/img_no_thumbnail.gif' . '" width="50" height="50" />';
			}
		echo $thumb;
	}
}
add_action( 'manage_pages_custom_column', 'add_pages_columns_list', 10, 2 );


//項目表示(カテゴリー)
function add_category_columns_list($string, $column_name, $id) {
	if ($column_name == 'id'){
		echo $id;
	}
}
add_action('manage_category_custom_column', 'add_category_columns_list', 10, 3);

// 項目表示(タグ)
function add_tag_columns_list( $string, $column_name, $id ) {
	if ( 'id' === $column_name ){
		echo $id;
	}
}
add_action( 'manage_post_tag_custom_column', 'add_tag_columns_list', 10, 3 );

//内リンク数を取得するAjax処理
function get_num_in_link() {
	$allUrl = get_links_from_content($_GET['post_id']);
	echo count_in_link($allUrl[1]);
	die();
}
add_action('wp_ajax_get_in_link', 'get_num_in_link');

//発リンク数を取得するAjax処理
function get_num_out_link() {
	$allUrl = get_links_from_content($_GET['post_id']);
	$inLinkNo = count_in_link($allUrl[1]);//内リンク数
	$allLinkNo = count($allUrl[0]); //全体リンク数
	echo $allLinkNo - $inLinkNo; //発リンク数
	die();
}
add_action('wp_ajax_get_out_link', 'get_num_out_link');

/**
 * 投稿の本文中からリンクを探して取得する。
 * @param $post_id 記事ID
 * @return array リンクの配列 [0][i]:aタグ全部 [1][i]:URLの//以降
 */
function get_links_from_content($post_id) {
	$content = get_page($post_id);
	$content = do_shortcode($content -> post_content);
	$linkPtn = '/<a[^>]href\s?=\s?[\"\']\s?https?:([^\"\']+)[\"\'][^>]*>/i';
	preg_match_all($linkPtn, $content, $allUrl);
	return $allUrl;
}

/**
 * URLの配列の中から内リンクがいくつあるかを取得する
 * @param $urls URLの配列
 * @return integer 内リンクの数
 */
function count_in_link($urls) {
	$homeUrl = get_home_url();
	$domain = strstr($homeUrl, '//');
	$strUrl = implode($urls);
	return mb_substr_count($strUrl, $domain);
}
