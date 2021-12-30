<?php
////////////////////////////////////////////////////////
//Contentボックスにスタイルパーツ用class追加
////////////////////////////////////////////////////////

//フロント画面
function fit_content_class() {
	$classes = array();
	if (get_option('fit_partsHead_2') && get_option('fit_partsHead_2') != 'off' ){
		$classes[] = ' partsH2-'.get_option('fit_partsHead_2');
	}
	if (get_option('fit_partsHead_3') && get_option('fit_partsHead_3') != 'off' ){
		$classes[] = ' partsH3-'.get_option('fit_partsHead_3');
	}
	if (get_option('fit_partsHead_4') && get_option('fit_partsHead_4') != 'off' ){
		$classes[] = ' partsH4-'.get_option('fit_partsHead_4');
	}
	if (get_option('fit_partsHead_5') && get_option('fit_partsHead_5') != 'off' ){
		$classes[] = ' partsH5-'.get_option('fit_partsHead_5');
	}
	if (get_option('fit_partsList_ul') && get_option('fit_partsList_ul') != 'off' ){
		$classes[] = ' partsUl-'.get_option('fit_partsList_ul');
	}
	if (get_option('fit_partsList_ol') && get_option('fit_partsList_ol') != 'off' ){
		$classes[] = ' partsOl-'.get_option('fit_partsList_ol');
	}
	if (get_option('fit_partsList_quote') && get_option('fit_partsList_quote') != 'off' ){
		$classes[] = ' partsQuote-'.get_option('fit_partsList_quote');
	}
	if (get_option('fit_partsList_table') && get_option('fit_partsList_table') != 'off' ){
		$classes[] = ' partsTable-'.get_option('fit_partsList_table');
	}
	foreach($classes as $val ){
		echo $val ;
	}
}

//管理画面(エディタ)
function custom_tiny_mce_body_class( $settings ){
	$base = 'content';
	$h2 = '';
	$h3 = '';
	$h4 = '';
	$h5 = '';
	$ul = '';
	$ol = '';
	$quote = '';
	$table = '';
	if (get_option('fit_partsHead_2') && get_option('fit_partsHead_2') != 'off' ){
		$h2 = ' partsH2-'.get_option('fit_partsHead_2');
	}
	if (get_option('fit_partsHead_3') && get_option('fit_partsHead_3') != 'off' ){
		$h3 = ' partsH3-'.get_option('fit_partsHead_3');
	}
	if (get_option('fit_partsHead_4') && get_option('fit_partsHead_4') != 'off' ){
		$h4 = ' partsH4-'.get_option('fit_partsHead_4');
	}
	if (get_option('fit_partsHead_5') && get_option('fit_partsHead_5') != 'off' ){
		$h5 = ' partsH5-'.get_option('fit_partsHead_5');
	}
	if (get_option('fit_partsList_ul') && get_option('fit_partsList_ul') != 'off' ){
		$ul = ' partsUl-'.get_option('fit_partsList_ul');
	}
	if (get_option('fit_partsList_ol') && get_option('fit_partsList_ol') != 'off' ){
		$ol = ' partsOl-'.get_option('fit_partsList_ol');
	}
	if (get_option('fit_partsList_quote') && get_option('fit_partsList_quote') != 'off' ){
		$quote = ' partsQuote-'.get_option('fit_partsList_quote');
	}
	if (get_option('fit_partsList_table') && get_option('fit_partsList_table') != 'off' ){
		$table = ' partsTable-'.get_option('fit_partsList_table');
	}
	$settings['body_class'] = $base.$h2.$h3.$h4.$h5.$ul.$ol.$quote.$table;
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'custom_tiny_mce_body_class' );
