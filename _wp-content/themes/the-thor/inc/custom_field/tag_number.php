<?php
////////////////////////////////////////////////////////
//タグ管理に閲覧数&クリック数表示
////////////////////////////////////////////////////////
function add_afTag_day_fields() {
	add_meta_box( 'afTag_day_setting', '情報', 'insert_afTag_day', 'afTag', 'side');
}
add_action('admin_menu', 'add_afTag_day_fields');


// カスタムフィールドの表示エリア
function insert_afTag_day() {
	global $post;

	//投稿日をセット
	$Date1 = get_the_time('Y-m-d');
	$TimeStamp1 = strtotime($Date1);//日付をUNIXタイムスタンプに変換

	//今日をセット
	$Date2 = date_i18n("Y-m-d");
	$TimeStamp2 = strtotime($Date2);//日付をUNIXタイムスタンプに変換

	//投稿日から今日まで何日離れているか
	$SecondDiff = abs($TimeStamp2 - $TimeStamp1);//何秒離れているかを計算(絶対値)
	$DayDiff = $SecondDiff / (60 * 60 * 24) + 1;//秒を日数に変換(投稿日から何日？)

	//総合閲覧数をセット
	$Date3 = (int)$post->post_views;

	//平均閲覧数をセット
	$average = (int)$Date3 / (int)$DayDiff;//平均閲覧数(1日)
	$Date4 = (int)esc_attr($average);

	//総合クリック数をセット
	$Date5 = (int)$post->afTag_click;

	//平均クリック数をセット
	$averageC = (int)$Date5 / (int)$DayDiff;//平均クリック数(1日)
	$Date6 = (int)esc_attr($averageC);

	//CTRをセット
	$ctr = '0';
	if(!$Date3 == 0){
    $ctr = (int)$Date5 / (int)$Date3 * 100;//総合クリック数÷総合閲覧数×100
	}
	$Date7 = (int)esc_attr($ctr);

	//日付をUNIXタイムスタンプに変換
	$TimeStamp1 = strtotime($Date1);
	$TimeStamp2 = strtotime($Date2);

	//何秒離れているかを計算(絶対値)
	$SecondDiff = abs($TimeStamp2 - $TimeStamp1);

	//秒を日数に変換
	$DayDiff = $SecondDiff / (60 * 60 * 24) + 1;

	//出力
	echo '<div class="afTag_day">公開期間：<input type="text" value="'.$DayDiff.' 日" readonly=""></div>';
	echo '<div class="afTag_day">総合閲覧数：<input type="text" value="'.$Date3.' View" readonly=""></div>';
	echo '<div class="afTag_day">平均閲覧数(1日)：<input type="text" value="'.$Date4.' View" readonly=""></div>';
	echo '<div class="afTag_day">総合クリック数：<input type="text" value="'.$Date5.' Click" readonly=""></div>';
	echo '<div class="afTag_day">平均クリック数(1日)：<input type="text" value="'.$Date6.' Click" readonly=""></div>';
	echo '<div class="afTag_day">総合CTR：<input type="text" value="'.$Date7.' ％" readonly=""></div>';

}
