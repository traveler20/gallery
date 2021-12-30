<?php
////////////////////////////////////////////////////////
//アイコン用モーダルウィンドウ追加
////////////////////////////////////////////////////////
// ボタンを表示
function fit_editor_setwindow_button( $content_id ) {
	echo '
<button type="button" id="show" class="button" >
  <span class="wp-media-buttons-icon dashicons dashicons-admin-tools"></span> アイコンオプション
</button>
	';
}
add_action( 'media_buttons', 'fit_editor_setwindow_button' );


// モーダルウィンドウの中身を管理画面のフッター部分で読み込む(このエリアで読み込まないと表示が崩れる)
function fit_editor_setwindow_page() {
	get_template_part('admin/template/icon_window');
}
add_action('admin_footer', 'fit_editor_setwindow_page');
