<?php
////////////////////////////////////////////////////////
// 添付ファイルページの設定
////////////////////////////////////////////////////////

//画像挿入時の添付ファイルページの選択肢を消す
function media_script_buffer_start() {
		ob_start();
}
add_action( 'post-upload-ui', 'media_script_buffer_start' );

function media_script_buffer_get() {
		$scripts = ob_get_clean();
		$scripts = preg_replace( '#<option value="post">.*?</option>#s', '', $scripts );
		echo $scripts;
}
add_action( 'print_media_templates', 'media_script_buffer_get' );

//添付ファイルページattachment_id=に404を返す
add_action( 'template_redirect', 'gs_attachment_template_redirect' );
function gs_attachment_template_redirect() {
		if ( is_attachment() ) { // 添付ファイルの個別ページなら
				global $wp_query;
				$wp_query->set_404();
				status_header(404);
		}
}
