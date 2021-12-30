<?php
////////////////////////////////////////////////////////
//ランキング投稿画面にショートコード表示
////////////////////////////////////////////////////////
function add_afRanking_Scode_fields() {
	add_meta_box( 'afRanking_Scode_setting', 'ショートコード', 'insert_afRanking_Scode', 'afRanking', 'side');
}
add_action('admin_menu', 'add_afRanking_Scode_fields');


// カスタムフィールドの表示エリア
function insert_afRanking_Scode() {

	global $post;
	echo '<input type="text" value="[afRanking id='.esc_attr($post->ID).']" readonly>';

}
