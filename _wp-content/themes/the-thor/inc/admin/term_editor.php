<?php
////////////////////////////////////////////////////////
// ターム(カテゴリ・タグ)編集画面に項目を追加する
////////////////////////////////////////////////////////

//説明欄出力時に自動挿入されるPタグを削除
remove_filter('term_description','wpautop');


//編集画面の入力部分
function fit_add_taxonomy_fields($term) {
	$term_id = $term->term_id; //タームID
	$taxonomy = $term->taxonomy; //タームIDに所属しているタクソノミー名
	$term_meta = get_option( $term->taxonomy . '_' . $term_id );//すでにデータが保存されている場合はDBから取得する
	$titleNameOn = '';
	$titleNameOff = '';
	if($term_meta['titleName'] == 'on'){
		$titleNameOn = 'checked';
	}
	if($term_meta['titleName'] == 'off' || !$term_meta['titleName']){
		$titleNameOff = 'checked';
	}
?>
<tr class="form-field">
  <th scope="row"><label for="term_meta_title">titleタグ</label></th>
  <td><input name="term_meta[title]" id="term_meta_title" type="text" class="large-text" value="<?php echo isset($term_meta['title']) ? esc_attr( $term_meta['title'] ) : ''; ?>"><br>
	  後ろに［<?php echo fit_title_separator().get_bloginfo( 'name' ) ?>］を　<input name="term_meta[titleName]" type="radio" class="radio" value="on" <?php echo $titleNameOn; ?> />表示する　<input name="term_meta[titleName]" type="radio" class="radio" value="off" <?php echo $titleNameOff; ?> />表示しない<br><br>
		<span style="color: #7F7F7F;">※未入力時は「カテゴリ名 <?php echo fit_title_separator().get_bloginfo( 'name' )?>」が表示されます。</span>
  </td>
</tr>
<tr class="form-field">
  <th scope="row"><label for="term_meta_description">meta description</label></th>
  <td><textarea name="term_meta[description]" id="term_meta_description" rows="5" cols="50" class="large-text"><?php echo isset($term_meta['description']) ? esc_attr( $term_meta['description'] ) : ''; ?></textarea>
  </td>
</tr>
<tr class="form-field">
  <th scope="row"><label for="term_meta_img">画像URL</label></th>
  <td style="display:flex">
    <div style="width:calc(100% - 120px)">
      <input name="term_meta[img]" id="term_meta_img" type="text" class="large-text" value="<?php echo isset($term_meta['img']) ? esc_attr( $term_meta['img'] ) : ''; ?>"><br>
      <input type="button" id="upload_img_button" class="button button-add" value="画像を追加">
    </div>
    <div>
      <img style="vertical-align:bottom;" id="term_preview_img" width="100" src="<?php echo isset($term_meta['img']) ? esc_attr( $term_meta['img'] ) : ''; ?>" />
    </div>
  </td>
</tr>
<tr class="form-field">
  <th scope="row"><label for="term_meta_color">イメージカラー</label></th>
  <td><input name="term_meta[color]" id="term_meta_color" class="fitColorPicker" value="<?php echo isset($term_meta['color']) ? esc_attr( $term_meta['color'] ) : ''; ?>"></td>
</tr>
<tr class="form-field">
  <th scope="row"><label for="term_meta_free_input">自由コンテンツ</label></th>
  <td>
  <?php
    $settings = array('wpautop' => false, 'media_buttons' => true, 'quicktags' => true, 'textarea_rows' => '15', 'textarea_name' => 'term_meta[free_input]' );
    wp_editor(wp_kses_post($term_meta['free_input'] , ENT_QUOTES, 'UTF-8'), 'term_meta_free_input', $settings);
  ?>
  </td>
</tr>
<?php
}
add_action('category_edit_form_fields','fit_add_taxonomy_fields'); //カテゴリー
add_action('post_tag_edit_form_fields','fit_add_taxonomy_fields'); //タグ


//入力欄の保存
function fit_save_taxonomy_fileds( $term_id ) {
	global $taxonomy; //タクソノミー名を取得
	if ( isset( $_POST['term_meta'] ) ) {//追加項目に値が入っていたら処理する
		$term_meta = get_option( $taxonomy . '_' . $term_id );
		$term_keys = array_keys($_POST['term_meta']);
		foreach ($term_keys as $key){
			if (isset($_POST['term_meta'][$key])){
				$term_meta[$key] = stripslashes_deep( $_POST['term_meta'][$key] );
			}
		}
		update_option( $taxonomy . '_' . $term_id, $term_meta ); //保存
	}
}
add_action('edited_term', 'fit_save_taxonomy_fileds' );