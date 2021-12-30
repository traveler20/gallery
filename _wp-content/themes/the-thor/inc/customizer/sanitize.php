<?php
////////////////////////////////////////////////////////
//オリジナル sanitize_callback
////////////////////////////////////////////////////////
// CheckBox用
function fit_sanitize_checkbox( $checked ) {
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
function fit_sanitize_checkbox_ret_one_or_blank( $checked ) {
	// True or Falseだとプレビューでうまく動かなかったため、'1' or '' をセットする
	return ( ( isset( $checked ) && true === $checked ) ? '1' : '' );
}
// radio/select用
function fit_sanitize_select( $input, $setting ) {
	$input = sanitize_key( $input );
    $choices = $setting->manager->get_control($setting->id)->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
// number limit用
function fit_sanitize_number_range( $number, $setting ) {
    $number = absint( $number );
    $atts = $setting->manager->get_control( $setting->id )->input_attrs;
    $min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
    $max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
    $step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
    return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}
// uploader用
function fit_sanitize_image( $image, $setting ) {
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
    $file = wp_check_filetype( $image, $mimes );
    return ( $file['ext'] ? $image : $setting->default );
}
// number用(数字はすべてOK)
function fit_sanitize_number( $number, $setting ) {
    return (is_numeric($number) ? $number : $setting->default );
}
// 変更不可の項目用
function fit_sanitize_readonly( $input, $setting ) {
	return $setting->default ? $setting->default : null;
}
