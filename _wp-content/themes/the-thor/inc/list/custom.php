<?php
////////////////////////////////////////////////////////
//カスタム一覧(CTA・タグ管理・タグランキング・ユーザーカスタム)に項目追加
////////////////////////////////////////////////////////

//テーブル追加(CTA)
function add_cta_columns($columns) {
	$columns['postid'] = 'ID';
	return $columns;
}
add_filter( 'manage_edit-cta_columns', 'add_cta_columns' );


//テーブル追加(タグ管理)
function add_afTag_columns($columns) {
	$columns['views'] = '総合閲覧数';
	$columns['averageViews'] = '平均閲覧数';
	$columns['click'] = '総合クリック数';
	$columns['averageClick'] = '平均クリック数';
	$columns['ctr'] = 'CTR';
	$columns['scode'] = 'ショートコード';
	return $columns;
}
add_filter( 'manage_edit-aftag_columns', 'add_afTag_columns' );


//テーブル追加(タグランキング)
function add_afRanking_columns($columns) {
	$columns['scode'] = 'ショートコード';
	return $columns;
}
add_filter( 'manage_edit-afranking_columns', 'add_afRanking_columns' );


//テーブル追加(ユーザーカスタム)
function add_custom_columns($columns) {
	if(get_option('fit_custBasis_category') == 'on'){
		$columns['custom_category'] = 'カテゴリー';
	}
	if(get_option('fit_custBasis_tag') == 'on'){
		$columns['custom_tag'] = 'タグ';
	}
    return $columns;
}
add_filter( 'manage_edit-custom_columns', 'add_custom_columns' );


//項目表示(CTA)
function add_cta_columns_list($column_name, $post_id) {
	//記事ID表示
	if ( $column_name == 'postid' ) {
		echo $post_id;
	}
}
add_action( 'manage_cta_posts_custom_column', 'add_cta_columns_list', 10, 2 );


//項目表示(タグ管理)
function add_afTag_columns_list($column_name, $post_id) {
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
	//クリック数表示
	if ( $column_name == 'click' ) {
		$click = get_post_meta($post_id, 'afTag_click', true);
		echo (int)esc_attr($click);
	}
	//平均クリック数表示
	if ( $column_name == 'averageClick' ) {
		$Date1 = get_the_time('Y-m-d', $post_id);//投稿日をセット
		$Date2 = date_i18n("Y-m-d");//今日をセット
		$TimeStamp1 = strtotime($Date1);//日付をUNIXタイムスタンプに変換
		$TimeStamp2 = strtotime($Date2);//日付をUNIXタイムスタンプに変換
		$SecondDiff = abs($TimeStamp2 - $TimeStamp1);//何秒離れているかを計算(絶対値)
		$DayDiff = $SecondDiff / (60 * 60 * 24) + 1;//秒を日数に変換(投稿日から何日？)
		$count   = get_post_meta($post_id, 'afTag_click', true);//総合閲覧数
		$average = (int)$count / (int)$DayDiff;//平均閲覧数(1日)
		echo (int)esc_attr($average);
	}
	//CTR表示
	if ( $column_name == 'ctr' ) {
		$views = get_post_meta($post_id, 'post_views', true);
		$click = get_post_meta($post_id, 'afTag_click', true);
		if($views == 0){
			$ctr = '0';
		}else{
			$ctr = (int)$click / (int)$views * (int)100;//総合クリック数÷総合閲覧数×100
		}
		echo (int)esc_attr($ctr).'％';
	}
	//ショートコード表示
	if ( $column_name == 'scode') {
		echo '<input type="text" value="[afTag id='.esc_attr($post_id).']" readonly>';
	}
}
add_action( 'manage_aftag_posts_custom_column', 'add_afTag_columns_list', 10, 2 );


//項目表示(タグランキング)
function add_afRanking_columns_list($column_name, $post_id) {
	//ショートコード表示
	if ( $column_name == 'scode') {
		echo '<input type="text" value="[afRanking id='.esc_attr($post_id).']" readonly>';
	}
}
add_action( 'manage_afranking_posts_custom_column', 'add_afRanking_columns_list', 10, 2 );


//項目表示(ユーザーカスタム)
function add_custom_columns_list($column_name, $post_id) {
	if( $column_name == 'custom_category' && get_option('fit_custBasis_category') == 'on') {
		echo get_the_term_list($post_id, 'custom_category', '', ', ');
	}
	if( $column_name == 'custom_tag'  && get_option('fit_custBasis_tag') == 'on') {
		echo get_the_term_list($post_id, 'custom_tag', '', ', ');
	}
}
add_action( 'manage_custom_posts_custom_column', 'add_custom_columns_list', 10, 2 );
