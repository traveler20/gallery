<?php
////////////////////////////////////////////////////////
//オリジナルBODYクラスを作成
////////////////////////////////////////////////////////
function fit_body_class( $classes ) {
	$classes = array();
	if ( get_option('fit_bsStyle_fontFamily') != 'off' ){
		$classes[] = get_option('fit_bsStyle_fontFamily');
	}
	if ( get_option('fit_bsLogo_heightSp') != '20' ){
		$classes[] = 't-logoSp'.get_option('fit_bsLogo_heightSp');
	}
	if ( get_option('fit_bsLogo_heightPc') != '30' ){
		$classes[] = 't-logoPc'.get_option('fit_bsLogo_heightPc');
	}
	if ( get_option('fit_conHeader_gnavi') == 'u-none-sp' || get_option('fit_conHeader_gnavi') == 'off'  ){
		$classes[] = 't-naviNoneSp';
	}
	if ( get_option('fit_conHeader_gnavi') == 'u-none-pc' && get_option('fit_conHeader_subnavi') == 'value2' ||
	     get_option('fit_conHeader_gnavi') == 'off' && get_option('fit_conHeader_subnavi') == 'value2'){
		$classes[] = 't-naviNonePc';
	}
	if ( get_option('fit_conHeader_layout') == 'value2' ){
		$classes[] = 't-headerCenter';
	}
	if ( get_option('fit_conHeader_text') == 'white' ){
		$classes[] = 't-headerColor';
	}
	if (get_option('fit_conFooterSp_menu') == 'on' ){
		$classes[] = 't-footerFixed';
	}
	return $classes;
}
add_filter( 'body_class', 'fit_body_class' );
