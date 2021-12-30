<?php
////////////////////////////////////////////////////////
//ビジュアルエディタをテーマCSSに合わせる
////////////////////////////////////////////////////////
if (get_option('fit_bsEditorCss_switch') != 'off' ){
	//クラシックeditor用
	add_editor_style("style-editor.php");
}

function gutenberg_editor_style() {
	 if (get_option('fit_bsEditorCss_switch') != 'off' ){
		 //ブロックeditor用
		 wp_enqueue_style( 'style-editor', get_template_directory_uri() . '/style-editor.php' , false, '1.0', 'all' );
	 }
}
add_action( 'enqueue_block_editor_assets', 'gutenberg_editor_style' );
