<?php
////////////////////////////////////////////////////////
//表示/非表示、個別選択設定
////////////////////////////////////////////////////////
function fit_add_hide_fields() {
	//add_meta_box(表示される入力ボックスのHTMLのID, ラベル, 表示する内容を作成する関数名, 投稿タイプ, 表示方法)
	if(get_option('fit_postOutline_switch') == 'on' ||
	   get_option('fit_postShare_top') == 'on' ||
	   get_option('fit_postShare_bottom') == 'on' ||
	   get_option('fit_postSns_switch') == 'on' ||
	   get_option('fit_postCta_switch') == 'on' ||
	   get_option('fit_postPrevNext_switch') == 'on' ||
	   get_option('fit_postProfile_switch') == 'on' ||
	   get_option('fit_postRelated_switch') == 'on' ||
	   get_option('fit_postCategory_switch') == 'on' ||
	   get_option('fit_adPost_doubleLeft') ||
	   get_option('fit_adPost_doubleRight') ||
	   get_option('fit_ampFunction_switch') == 'on'
	   ){
		add_meta_box( 'hide_setting', '個別非表示設定', 'fit_insert_hidePost_fields', 'post', 'side');
	}
	if(get_option('fit_pageOutline_switch') == 'on' ||
	   get_option('fit_pageShare_top') == 'on' ||
	   get_option('fit_pageShare_bottom') == 'on' ||
	   get_option('fit_pageCta_switch') == 'on'
	   ){
		add_meta_box( 'hide_setting', '個別非表示設定', 'fit_insert_hidePage_fields', 'page', 'side');
	}
}
add_action('admin_menu', 'fit_add_hide_fields');



// カスタムフィールドの入力エリア(POST)
function fit_insert_hidePost_fields() {
	global $post;
	$outline_hide_check = "";
	$share_hide_check = "";
	$follow_hide_check = "";
	$cta_hide_check = "";
	$prevNext_hide_check = "";
	$profile_hide_check = "";
	$related_hide_check = "";
	$category_hide_check = "";
	$rectangle_hide_check = "";
	$amp_hide_check = "";


	if( get_post_meta($post->ID,'outline_hide',true) == "1" ) {
		$outline_hide_check = "checked";
	}if( get_post_meta($post->ID,'share_hide',true) == "1" ) {
		$share_hide_check = "checked";
	}if( get_post_meta($post->ID,'follow_hide',true) == "1" ) {
		$follow_hide_check = "checked";
	}if( get_post_meta($post->ID,'cta_hide',true) == "1" ) {
		$cta_hide_check = "checked";
	}if( get_post_meta($post->ID,'prevNext_hide',true) == "1" ) {
		$prevNext_hide_check = "checked";
	}if( get_post_meta($post->ID,'profile_hide',true) == "1" ) {
		$profile_hide_check = "checked";
	}if( get_post_meta($post->ID,'related_hide',true) == "1" ) {
		$related_hide_check = "checked";
	}if( get_post_meta($post->ID,'category_hide',true) == "1" ) {
		$category_hide_check = "checked";
	}if( get_post_meta($post->ID,'rectangle_hide',true) == "1" ) {
		$rectangle_hide_check = "checked";
	}if( get_post_meta($post->ID,'amp_hide',true) == "1" ) {
		$amp_hide_check = "checked";
	}

	echo '<div class="fitInner">';
	if(get_option('fit_postOutline_switch') == 'on' ){
		echo '<input type="checkbox" name="outline_hide" value="1" '.$outline_hide_check.' >目次を非表示にする<br>';
	}
	if(get_option('fit_postShare_top') == 'on' || get_option('fit_postShare_bottom') == 'on' ){
		echo '<input type="checkbox" name="share_hide" value="1" '.$share_hide_check.' >シェアボタンを非表示にする<br>';
	}
	if(get_option('fit_postSns_switch') == 'on' ){
		echo '<input type="checkbox" name="follow_hide" value="1" '.$follow_hide_check.' >フォローボタンを非表示にする<br>';
	}
	if(get_option('fit_postCta_switch') == 'on' ){
		echo '<input type="checkbox" name="cta_hide" value="1" '.$cta_hide_check.' >記事下CTAを非表示にする<br>';
	}
	if(get_option('fit_postPrevNext_switch') == 'on' ){
		echo '<input type="checkbox" name="prevNext_hide" value="1" '.$prevNext_hide_check.' >Prev Next記事を非表示にする<br>';
	}
	if(get_option('fit_postProfile_switch') == 'on' ){
		echo '<input type="checkbox" name="profile_hide" value="1" '.$profile_hide_check.' >プロフィールを非表示にする<br>';
	}
	if(get_option('fit_postRelated_switch') == 'on' ){
		echo '<input type="checkbox" name="related_hide" value="1" '.$related_hide_check.' >関連記事を非表示にする<br>';
	}
	if(get_option('fit_postCategory_switch') == 'on' ){
		echo '<input type="checkbox" name="category_hide" value="1" '.$category_hide_check.' >所属カテゴリ最新記事を非表示にする<br>';
	}
	if(get_option('fit_adPost_doubleLeft') || get_option('fit_adPost_doubleRight')){
		echo '<input type="checkbox" name="rectangle_hide" value="1" '.$rectangle_hide_check.' >レクタングル広告を非表示にする<br>';
	}
	if(get_option('fit_ampFunction_switch') == 'on' ){
		echo '<input type="checkbox" name="amp_hide" value="1" '.$amp_hide_check.' >AMPページを非表示にする<br>';
	}
	echo '</div>';
}

// カスタムフィールドの入力エリア(PAGE)
function fit_insert_hidePage_fields() {
	global $post;
	$outline_hide_check = "";
	$share_hide_check = "";
	$cta_hide_check = "";


	if( get_post_meta($post->ID,'outline_hide',true) == "1" ) {
		$outline_hide_check = "checked";
	}if( get_post_meta($post->ID,'share_hide',true) == "1" ) {
		$share_hide_check = "checked";
	}if( get_post_meta($post->ID,'cta_hide',true) == "1" ) {
		$cta_hide_check = "checked";
	}

	echo '<div class="fitInner">';
	if(get_option('fit_pageOutline_switch') == 'on' ){
		echo '<input type="checkbox" name="outline_hide" value="1" '.$outline_hide_check.' >目次を非表示にする<br>';
	}
	if(get_option('fit_pageShare_top') == 'on' || get_option('fit_postShare_bottom') == 'on' ){
		echo '<input type="checkbox" name="share_hide" value="1" '.$share_hide_check.' >シェアボタンを非表示にする<br>';
	}
	if(get_option('fit_pageCta_switch') == 'on' ){
		echo '<input type="checkbox" name="cta_hide" value="1" '.$cta_hide_check.' >記事下CTAを非表示にする<br>';
	}
	echo '</div>';
}



// カスタムフィールドの値を保存
function fit_save_hide_fields( $post_id ) {

	//自動保存の時は何もしない
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return $post_id;
	}

	// クイックポストの時は何もしない
	if(isset($_POST['action']) && $_POST['action'] == 'inline-save'){
		return $post_id;
	}

	// 各項目を保存
	if(!empty($_POST['outline_hide'])){
		update_post_meta($post_id, 'outline_hide', $_POST['outline_hide'] );
	}else{
		delete_post_meta($post_id, 'outline_hide');
	}if(!empty($_POST['share_hide'])){
		update_post_meta($post_id, 'share_hide', $_POST['share_hide'] );
	}else{
		delete_post_meta($post_id, 'share_hide');
	}if(!empty($_POST['follow_hide'])){
		update_post_meta($post_id, 'follow_hide', $_POST['follow_hide'] );
	}else{
		delete_post_meta($post_id, 'follow_hide');
	}if(!empty($_POST['cta_hide'])){
		update_post_meta($post_id, 'cta_hide', $_POST['cta_hide'] );
	}else{
		delete_post_meta($post_id, 'cta_hide');
	}if(!empty($_POST['prevNext_hide'])){
		update_post_meta($post_id, 'prevNext_hide', $_POST['prevNext_hide'] );
	}else{
		delete_post_meta($post_id, 'prevNext_hide');
	}if(!empty($_POST['profile_hide'])){
		update_post_meta($post_id, 'profile_hide', $_POST['profile_hide'] );
	}else{
		delete_post_meta($post_id, 'profile_hide');
	}if(!empty($_POST['related_hide'])){
		update_post_meta($post_id, 'related_hide', $_POST['related_hide'] );
	}else{
		delete_post_meta($post_id, 'related_hide');
	}if(!empty($_POST['category_hide'])){
		update_post_meta($post_id, 'category_hide', $_POST['category_hide'] );
	}else{
		delete_post_meta($post_id, 'category_hide');
	}if(!empty($_POST['rectangle_hide'])){
		update_post_meta($post_id, 'rectangle_hide', $_POST['rectangle_hide'] );
	}else{
		delete_post_meta($post_id, 'rectangle_hide');
	}if(!empty($_POST['amp_hide'])){
		update_post_meta($post_id, 'amp_hide', $_POST['amp_hide'] );
	}else{
		delete_post_meta($post_id, 'amp_hide');
	}

}
function fit_transition_hide_status($new_status, $old_status, $post) {
	if (($old_status == 'auto-draft'
	|| $old_status == 'draft'
	|| $old_status == 'pending'
	|| $old_status == 'future')
	&& $new_status == 'publish') {
		return $post;
	} else {
		add_action('save_post', 'fit_save_hide_fields');
	}
}
add_action('transition_post_status', 'fit_transition_hide_status', 10, 3);
