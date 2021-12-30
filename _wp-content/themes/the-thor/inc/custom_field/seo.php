<?php
////////////////////////////////////////////////////////
// SEO専用カスタムフィールド
////////////////////////////////////////////////////////
function fit_add_seo_fields() {
	add_meta_box( 'seo_setting', 'SEO対策', 'fit_insert_seo_fields', 'post', 'normal', 'high');
	add_meta_box( 'seo_setting', 'SEO対策', 'fit_insert_seo_fields', 'page', 'normal', 'high');
}
add_action('admin_menu', 'fit_add_seo_fields');


// カスタムフィールドの入力フィールド
function fit_insert_seo_fields() {
	global $post;
	$title = get_post_meta($post->ID,'title',true);
	$description = get_post_meta($post->ID,'description',true);

	$titleName_check = "";
	$noindex_check = "";
	$nofollow_check = "";
	$nosnippet_check = "";
	$noarchive_check = "";

	if( get_post_meta($post->ID,'titleName',true) == 1 ) {
		$titleName_check = "checked";
	}

	if( get_post_meta($post->ID,'noindex',true) == 'noindex' ) {
		$noindex_check = "checked";
	}

	if( get_post_meta($post->ID,'nofollow',true) == 'nofollow' ) {
		$nofollow_check = "checked";
	}

	if( get_post_meta($post->ID,'nosnippet',true) == 'nosnippet' ) {
		$nosnippet_check = "checked";
	}

	if( get_post_meta($post->ID,'noarchive',true) == 'noarchive' ) {
		$noarchive_check = "checked";
	}


?>
<table class="basicTable">
  <tbody>
    <tr>
      <th>title設定</th>
      <td>
        <input type="text" size="50" name="title" id="title" value="<?php echo esc_html($title) ?>"  /><br>
		<input type="checkbox" name="titleName" value="1" <?php echo $titleName_check ?>>後ろに［<?php echo fit_title_separator().get_bloginfo( 'name' ) ?>］を表示する<br>
		<span style="color: #7F7F7F;">※未入力時は「記事タイトル <?php echo fit_title_separator().get_bloginfo( 'name' )?>」が表示されます。</span>
      </td>
    </tr>
    <tr>
      <th>meta description設定</th>
      <td>
        <textarea name="description" id="description" cols="50" rows="4" /><?php echo esc_html($description) ?></textarea><br>
        <span>検索結果に表示される説明文です。</span>
      </td>
    </tr>
    <tr>
      <th>meta robot設定</th>
      <td>
        <input type="checkbox" name="noindex" value="noindex" <?php echo $noindex_check ?>>:NoIndex　
		<input type="checkbox" name="nofollow" value="nofollow" <?php echo $nofollow_check ?>>:NoFollow　
		<input type="checkbox" name="nosnippet" value="nosnippet" <?php echo $nosnippet_check ?>>:NoSnippet　
		<input type="checkbox" name="noarchive" value="noarchive" <?php echo $noarchive_check ?>>:NoArchive
      </td>
    </tr>
  </tbody>
</table>
<?php

}




// カスタムフィールドの値を保存
function fit_save_seo_fields( $post_id ) {

	//自動保存の時は何もしない
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return $post_id;
	}

	// クイックポストの時は何もしない
	if(isset($_POST['action']) && $_POST['action'] == 'inline-save'){
		return $post_id;
	}

	// 各項目を保存
	if(!empty($_POST['title'])){
		update_post_meta($post_id, 'title', $_POST['title'] );
	}else{
		delete_post_meta($post_id, 'title');
	}
	if(!empty($_POST['titleName'])){
		update_post_meta($post_id, 'titleName', $_POST['titleName'] );
	}else{
		delete_post_meta($post_id, 'titleName');
	}
	if(!empty($_POST['description'])){
		update_post_meta($post_id, 'description', $_POST['description'] );
	}else{
		delete_post_meta($post_id, 'description');
	}
	if(!empty($_POST['noindex'])){
		update_post_meta($post_id, 'noindex', $_POST['noindex'] );
	}else{
		delete_post_meta($post_id, 'noindex');
	}
	if(!empty($_POST['nofollow'])){
		update_post_meta($post_id, 'nofollow', $_POST['nofollow'] );
	}else{
		delete_post_meta($post_id, 'nofollow');
	}
	if(!empty($_POST['nosnippet'])){
		update_post_meta($post_id, 'nosnippet', $_POST['nosnippet'] );
	}else{
		delete_post_meta($post_id, 'nosnippet');
	}
	if(!empty($_POST['noarchive'])){
		update_post_meta($post_id, 'noarchive', $_POST['noarchive'] );
	}else{
		delete_post_meta($post_id, 'noarchive');
	}

}
function fit_transition_seo_status($new_status, $old_status, $post) {
	if (($old_status == 'auto-draft'
	|| $old_status == 'draft'
	|| $old_status == 'pending'
	|| $old_status == 'future')
	&& $new_status == 'publish') {
		return $post;
	} else {
		add_action('save_post', 'fit_save_seo_fields');
	}
}
add_action('transition_post_status', 'fit_transition_seo_status', 10, 3);
