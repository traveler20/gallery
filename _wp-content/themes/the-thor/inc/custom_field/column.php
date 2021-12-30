<?php
////////////////////////////////////////////////////////
//カラム設定用カスタムフィールド
////////////////////////////////////////////////////////
function fit_add_column_fields() {
	//add_meta_box(表示される入力ボックスのHTMLのID, ラベル, 表示する内容を作成する関数名, 投稿タイプ, 表示方法)
	add_meta_box( 'column_setting', 'カラム設定', 'fit_insert_column_fields', 'post', 'side');
	add_meta_box( 'column_setting', 'カラム設定', 'fit_insert_column_fields', 'page', 'side');
}
add_action('admin_menu', 'fit_add_column_fields');


// カスタムフィールドの入力エリア(PAGE)
if(!function_exists('fit_insert_column_fields'))  {
	function fit_insert_column_fields() {
		global $post;
		$column_single_check  = "";
		$column_double_check  = "";
		$column_default_check = "";

		if( !get_post_meta($post->ID,'column_layout',true) || get_post_meta($post->ID,'column_layout',true) == "0" ) {
			$column_default_check = "checked";
		}if( get_post_meta($post->ID,'column_layout',true) == "1" ) {
			$column_single_check = "checked";
		}if( get_post_meta($post->ID,'column_layout',true) == "2" ) {
			$column_double_check = "checked";
		}

		echo '<div class="fitInner">';
		echo '<input type="radio" name="column_layout" value="0" '.$column_default_check.'>デフォルト<br>';
		echo '<input type="radio" name="column_layout" value="1" '.$column_single_check.' >1カラムにする<br>';
		echo '<input type="radio" name="column_layout" value="2" '.$column_double_check.' >2カラムにする<br>';
		echo '</div>';

	}
}



// カスタムフィールドの値を保存
function fit_save_column_fields( $post_id ) {

	//自動保存の時は何もしない
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return $post_id;
	}

	// クイックポストの時は何もしない
	if(isset($_POST['action']) && $_POST['action'] == 'inline-save'){
		return $post_id;
	}

	// 各項目を保存
	if(!empty($_POST['column_layout'])){
		update_post_meta($post_id, 'column_layout', $_POST['column_layout'] );
	}else{
		delete_post_meta($post_id, 'column_layout');
	}

}
function fit_transition_column_status($new_status, $old_status, $post) {
	if (($old_status == 'auto-draft'
	|| $old_status == 'draft'
	|| $old_status == 'pending'
	|| $old_status == 'future')
	&& $new_status == 'publish') {
		return $post;
	} else {
		add_action('save_post', 'fit_save_column_fields');
	}
}
add_action('transition_post_status', 'fit_transition_column_status', 10, 3);
