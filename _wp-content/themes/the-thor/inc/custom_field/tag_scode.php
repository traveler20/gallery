<?php
////////////////////////////////////////////////////////
//タグ管理画面にショートコード表示
////////////////////////////////////////////////////////
function add_afTag_Scode_fields() {
	add_meta_box( 'afTag_Scode_setting', 'ショートコード', 'insert_afTag_Scode', 'afTag', 'side');
}
add_action('admin_menu', 'add_afTag_Scode_fields');


// カスタムフィールドの表示エリア
function insert_afTag_Scode() {
	global $post;
	echo '<input type="text" value="[afTag id='.esc_attr($post->ID).']" readonly>';

}
