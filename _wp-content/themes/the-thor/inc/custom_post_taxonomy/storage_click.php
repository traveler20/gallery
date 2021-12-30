<?php
////////////////////////////////////////////////////////
//フロント画面からタグ管理のクリック数を保存
////////////////////////////////////////////////////////

//ajaxでデータをPOSTする
function post_ajax_send($id) {
	return '
	<script>
	(function($){
		$(".afTag-'.$id.' a[href]").on("click",function(){
			if (!this.href.match(new RegExp("^(#|\/|(https?:\/\/" + location.hostname + "))"))) {
				$.ajax({
					type: "POST",
					url: "'.admin_url('admin-ajax.php').'",
					data: {
						"action" : "tag_ajax",
						"meta_key" : "afTag_click",
						"post_id" : '.$id.',
						"meta_value" : '.get_post_meta($id, 'afTag_click', true ).' + 1
					},
					dataType: "json",
				});
			}
		});
	})(jQuery);
	</script>
	';
}

//ajaxで受け取ったデータをカスタムタクソノミーのキーに保存する
function post_ajax_reception() {
	$meta_key = $_POST['meta_key'];
	$meta_value = $_POST['meta_value'];
	$post_id = $_POST['post_id'];
	if(!empty($meta_key) && !empty($meta_value) && !empty($post_id)){
		update_post_meta($post_id, $meta_key, $meta_value );
	}else{
		delete_post_meta($post_id, $meta_key);
	}
}
add_action('wp_ajax_tag_ajax', 'post_ajax_reception');
add_action('wp_ajax_nopriv_tag_ajax', 'post_ajax_reception');
