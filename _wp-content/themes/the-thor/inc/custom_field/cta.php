<?php
////////////////////////////////////////////////////////
//個別CTA設定
////////////////////////////////////////////////////////
function fit_add_cta_fields() {
	//add_meta_box(表示される入力ボックスのHTMLのID, ラベル, 表示する内容を作成する関数名, 投稿タイプ, 表示方法)
	if(get_option('fit_postCta_switch') == 'on' ){add_meta_box( 'cta_setting', '記事下CTA設定', 'fit_insert_cta_fieldsPost', 'post', 'side');}
	if(get_option('fit_pageCta_switch') == 'on' ){add_meta_box( 'cta_setting', '記事下CTA設定', 'fit_insert_cta_fieldsPage', 'page', 'side');}
}
add_action('admin_menu', 'fit_add_cta_fields');


if(get_option('fit_postCta_switch') == 'on' ){
	// カスタムフィールドの入力エリア
	function fit_insert_cta_fieldsPost() {
		$cta_id = get_post_meta(get_the_id(),'cta_id',true);

		// 投稿データ(cta)の取得
		$args = array(
        	'posts_per_page' => -1, //表示（取得）する記事の数
        	'post_type' => 'cta', //投稿タイプの指定
			'order' => 'ASC',
			'orderby' => 'ID' //投稿ID順で並び替え
    	);
    	$the_query = get_posts( $args );

		echo '<div class="fitInner">';
		echo '<select name="cta_id" class="select__title">';
		echo '<option value="">デフォルトのCTAを利用する</option>';
		foreach ( $the_query as $post ) {
			setup_postdata( $post );

			$selected = ((int)$cta_id === $post->ID)?' selected="selected"':'';
			echo '<option value="'.$post->ID.'"'.$selected.'>'.$post->ID.'：'.$post->post_title.'</option>';
		}
		wp_reset_postdata();
		echo '</select>';
		echo '</div>';

	}
}

if(get_option('fit_pageCta_switch') == 'on' ){
	// カスタムフィールドの入力エリア
	function fit_insert_cta_fieldsPage() {
		$cta_id = get_post_meta(get_the_id(),'cta_id',true);

		// 投稿データ(cta)の取得
		$args = array(
        	'posts_per_page' => -1, //表示（取得）する記事の数
        	'post_type' => 'cta', //投稿タイプの指定
			'order' => 'ASC',
			'orderby' => 'ID' //投稿ID順で並び替え
    	);
    	$the_query = get_posts( $args );

		echo '<div class="fitInner">';
		echo '<select name="cta_id" class="select__title">';
		echo '<option value="">デフォルトのCTAを利用する</option>';
		foreach ( $the_query as $post ) {
			setup_postdata( $post );

			$selected = ((int)$cta_id === $post->ID)?' selected="selected"':'';
			echo '<option value="'.$post->ID.'"'.$selected.'>'.$post->ID.'：'.$post->post_title.'</option>';
		}
		wp_reset_postdata();
		echo '</select>';
		echo '</div>';

	}
}



// カスタムフィールドの値を保存
function fit_save_cta_fields( $post_id ) {

	//自動保存の時は何もしない
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return $post_id;
	}

	// クイックポストの時は何もしない
	if(isset($_POST['action']) && $_POST['action'] == 'inline-save'){
		return $post_id;
	}

	// 各項目を保存
	if(!empty($_POST['cta_id'])){
		update_post_meta($post_id, 'cta_id', $_POST['cta_id'] );
	}else{
		delete_post_meta($post_id, 'cta_id');
	}

}
function fit_transition_cta_status($new_status, $old_status, $post) {
	if (($old_status == 'auto-draft'
	|| $old_status == 'draft'
	|| $old_status == 'pending'
	|| $old_status == 'future')
	&& $new_status == 'publish') {
		return $post;
	} else {
		add_action('save_post', 'fit_save_cta_fields');
	}
}
add_action('transition_post_status', 'fit_transition_cta_status', 10, 3);
