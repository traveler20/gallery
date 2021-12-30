<?php
////////////////////////////////////////////////////////
//日時ショートコード
////////////////////////////////////////////////////////
//年ショートコード
function fit_get_year($atts) {
	extract(shortcode_atts(array(
		'number'=>"",
	),$atts));
	$dateYear = date_i18n('Y', strtotime($number.'year'));;
	return $dateYear;
}
add_shortcode("date-year", "fit_get_year");

//月ショートコード
function fit_get_month($atts) {
	extract(shortcode_atts(array(
		'number'=>"",
	),$atts));
	$dateYear = date_i18n('m', strtotime($number.'month'));;
	return $dateYear;
}
add_shortcode("date-month", "fit_get_month");

//日ショートコード
function fit_get_day($atts) {
	extract(shortcode_atts(array(
		'number'=>"",
	),$atts));
	$dateYear = date_i18n('d', strtotime($number.'day'));;
	return $dateYear;
}
add_shortcode("date-day", "fit_get_day");
