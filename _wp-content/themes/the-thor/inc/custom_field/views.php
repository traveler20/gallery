<?php
////////////////////////////////////////////////////////
//投稿画面(管理画面)にPV数を表示
////////////////////////////////////////////////////////
function add_post_views_fields() {
	add_meta_box( 'post_views_setting', '閲覧数', 'insert_post_views', 'post', 'side');
}
add_action('admin_menu', 'add_post_views_fields');


// カスタムフィールドの表示エリア
function insert_post_views($post_id) {
	$Date1 = get_the_time('Y-m-d', $post_id);//投稿日をセット
	$Date2 = date_i18n("Y-m-d");//今日をセット
	$TimeStamp1 = strtotime($Date1);//日付をUNIXタイムスタンプに変換
	$TimeStamp2 = strtotime($Date2);//日付をUNIXタイムスタンプに変換
	$SecondDiff = abs($TimeStamp2 - $TimeStamp1);//何秒離れているかを計算(絶対値)
	$DayDiff = $SecondDiff / (60 * 60 * 24) + 1;//秒を日数に変換(投稿日から何日？)
	$count   = $post_id->post_views;//総合閲覧数
	$average = (int)$count / (int)$DayDiff;//平均閲覧数(1日)

	echo '<div class="afTag_day">総合閲覧数：<input type="text" value="'.(int)esc_attr($count).'" readonly=""></div>';
	echo '<div class="afTag_day">平均閲覧数(1日)：<input type="text" value="'.(int)esc_attr($average).'" readonly=""></div>';

}
