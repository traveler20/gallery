<?php
////////////////////////////////////////////////////////
// 管理画面用 style & script アセット設定
////////////////////////////////////////////////////////
function fit_admin_script_style(){
	wp_enqueue_media();
	wp_enqueue_script('uploader_script',    get_template_directory_uri().'/admin/js/uploader.js', array( 'jquery' ), true);
	wp_enqueue_script('themecustomizer',    get_template_directory_uri().'/admin/js/theme-customizer.js', array( 'jquery', 'customize-preview' ), false, true );
	wp_enqueue_script('icon_window_script', get_template_directory_uri().'/admin/js/icon_window.js' );
	wp_enqueue_script('term_img_uploader',  get_template_directory_uri().'/admin/js/term_img_uploader.js');
	wp_enqueue_script('wp-color-picker');
	wp_enqueue_script('color_picker',       get_template_directory_uri().'/admin/js/color_picker.js', array( 'wp-color-picker' ), false, true );
	wp_enqueue_style ('admin_style',        get_template_directory_uri().'/admin/css/style.css' );
	wp_enqueue_style ('admin_icon_style',   get_template_directory_uri().'/css/icon.min.css' );
}
add_action( 'admin_enqueue_scripts', 'fit_admin_script_style' );
