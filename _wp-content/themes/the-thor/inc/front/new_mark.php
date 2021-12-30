<?php
////////////////////////////////////////////////////////
//newマーク表示条件&出力
////////////////////////////////////////////////////////
function fit_new_mark() {
	$days = 7;  // NEWマークを表示するデフォルト日数
	if( get_option('fit_archiveList_newNumber') ){
		$days = get_option('fit_archiveList_newNumber');
	}
  $now = current_time("timestamp");  // 今の時間
  $entry = get_the_time('U');  // 投稿日の時間
  $term = date_i18n('U',($now - $entry)) / 86400;
	$right = '';
	$icon = 'icon-new';
	if( get_option('fit_archiveList_aspect') == 'none' ){
		$right = ' the__ribbon-right';
	}
	if( get_option('fit_archiveList_newIcon') ){
		$icon = get_option('fit_archiveList_newIcon');
	}
  if( $days > $term ){
		echo '<div class="the__ribbon'.$right.'"><i class="'.$icon.'"></i></div>';
	}
}
