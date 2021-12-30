<?php
////////////////////////////////////////////////////////
//タグ管理登録ビルダー
////////////////////////////////////////////////////////
function add_afTagFormat_fields() {
	//add_meta_box(表示される入力ボックスのHTMLのID, ラベル, 表示する内容を作成する関数名, 投稿タイプ, 表示方法)
	add_meta_box( 'afTagFormat_setting', 'タグ管理オリジナルフォーマット', 'insert_afTagFormat_fields', 'afTag', 'normal');
}
add_action('admin_menu', 'add_afTagFormat_fields');



// カスタムフィールドの入力エリア
function insert_afTagFormat_fields() {
	global $post;

	$style   = get_post_meta($post->ID, 'afTagFormat_style', true);
	$star    = get_post_meta($post->ID, 'afTagFormat_star', true);
	$number  = get_post_meta($post->ID, 'afTagFormat_number', true);
	$banner  = get_post_meta($post->ID, 'afTagFormat_banner', true);
	$text    = get_post_meta($post->ID, 'afTagFormat_text', true);
	$d_id    = get_post_meta($post->ID, 'afTagFormat_d_id', true);
	$d_title = get_post_meta($post->ID, 'afTagFormat_d_title', true);
	$a_url   = get_post_meta($post->ID, 'afTagFormat_a_url', true);
	$a_title = get_post_meta($post->ID, 'afTagFormat_a_title', true);

	$ori_item1 = get_post_meta($post->ID, 'afTagFormat_ori_item1', true);
	$ori_item2 = get_post_meta($post->ID, 'afTagFormat_ori_item2', true);
	$ori_item3 = get_post_meta($post->ID, 'afTagFormat_ori_item3', true);
	$ori_item4 = get_post_meta($post->ID, 'afTagFormat_ori_item4', true);
	$ori_item5 = get_post_meta($post->ID, 'afTagFormat_ori_item5', true);
	$ori_item6 = get_post_meta($post->ID, 'afTagFormat_ori_item6', true);

	// 投稿データ(post)の取得
	$args = array(
    'posts_per_page' => -1,           //表示（取得）する記事の数
    'post_type' => array('post','page'), //投稿タイプの指定
		'order' => 'ASC',
		'orderby' => 'ID' //投稿ID順で並び替え
    );
    $the_query = new WP_Query( $args );


?>
<script>
jQuery( function( $ ) {

	if($('[id=style_0]').prop('checked')){
		$('.style_1').hide ();
		$('.style_2').hide ();
	}else if ($('[id=style_1]').prop('checked')) {
		$('.style_1').show ();
		$('.style_2').show ();
	}else if ($('[id=style_2]').prop('checked')) {
		$('.style_1').hide ();
		$('.style_2').show ();
	}

	$('[name="afTagFormat_style"]:radio').on('change', function() {
		if($('[id=style_0]').prop('checked')){
			$('.style_1').hide ();
			$('.style_2').hide ();
		}else if ($('[id=style_1]').prop('checked')) {
			$('.style_1').show ();
			$('.style_2').show ();
		}else if ($('[id=style_2]').prop('checked')) {
			$('.style_1').hide ();
			$('.style_2').show ();
		}
	});

} );
</script>
<table class="afTagFormatBuilderTable">
  <tbody>
    <tr>
      <th>表示スタイル</th>
      <td>
        <label><input type="radio" id="style_0" name="afTagFormat_style" value="_0" <?php if($style == '_0' || empty($style)){echo 'checked';} ?>> フォーマットを利用しない</label>
        <label><input type="radio" id="style_1" name="afTagFormat_style" value="_1" <?php if($style == '_1'){echo 'checked';} ?>> 利用する(全項目表示)</label>
        <label><input type="radio" id="style_2" name="afTagFormat_style" value="_2" <?php if($style == '_2' || empty($style)){echo 'checked';} ?>> 利用する(簡易表示)</label>
      </td>
    </tr>
    <tr class="style_1 style_2">
      <th>おすすめ度［スター］</th>
      <td>
        <span class="afTagFormatBuilderTable__inFirst">
        <label><input type="radio" name="afTagFormat_star" value="_0" <?php if($star == '_0' || empty($star)){echo 'checked';} ?>> なし</label>
        <label><input type="radio" name="afTagFormat_star" value="_1" <?php if($star == '_1'){echo 'checked';} ?>> 1</label>
        <label><input type="radio" name="afTagFormat_star" value="_2" <?php if($star == '_2'){echo 'checked';} ?>> 2</label>
        <label><input type="radio" name="afTagFormat_star" value="_3" <?php if($star == '_3'){echo 'checked';} ?>> 3</label>
        <label><input type="radio" name="afTagFormat_star" value="_4" <?php if($star == '_4'){echo 'checked';} ?>> 4</label>
        <label><input type="radio" name="afTagFormat_star" value="_5" <?php if($star == '_5'){echo 'checked';} ?>> 5</label>
        </span>
        ［数値］<input type="number" name="afTagFormat_number" placeholder="0～5" step="0.01" min="0" max="5" value="<?php echo $number; ?>">
      </td>
    </tr>
    <tr class="style_1 style_2">
      <th>バナー広告</th>
      <td>
        <textarea name="afTagFormat_banner" rows="3" cols="25"><?php echo $banner; ?></textarea>
      </td>
    </tr>
    <tr class="style_1 style_2">
      <th>バナー横テキスト</th>
      <td>
        <textarea name="afTagFormat_text" rows="3" cols="25"><?php echo $text; ?></textarea>
      </td>
    </tr>
    <tr class="style_1">
      <th>独自項目名：<?php if(get_option('fit_bsAfTag_Headline1')){echo get_option('fit_bsAfTag_Headline1');}else{echo '見出し1';}?></th>
      <td>
        <input type="text" name="afTagFormat_ori_item1" value="<?php echo $ori_item1; ?>" class="wide100">
      </td>
    </tr>
    <tr class="style_1">
      <th>独自項目名：<?php if(get_option('fit_bsAfTag_Headline2')){echo get_option('fit_bsAfTag_Headline2');}else{echo '見出し2';}?></th>
      <td>
        <input type="text" name="afTagFormat_ori_item2" value="<?php echo $ori_item2; ?>" class="wide100">
      </td>
    </tr>
    <tr class="style_1">
      <th>独自項目名：<?php if(get_option('fit_bsAfTag_Headline3')){echo get_option('fit_bsAfTag_Headline3');}else{echo '見出し3';}?></th>
      <td>
        <input type="text" name="afTagFormat_ori_item3" value="<?php echo $ori_item3; ?>" class="wide100">
      </td>
    </tr>
    <tr class="style_1">
      <th>独自項目名：<?php if(get_option('fit_bsAfTag_Headline4')){echo get_option('fit_bsAfTag_Headline4');}else{echo '見出し4';}?></th>
      <td>
        <input type="text" name="afTagFormat_ori_item4" value="<?php echo $ori_item4; ?>" class="wide100">
      </td>
    </tr>
    <tr class="style_1">
      <th>独自項目名：<?php if(get_option('fit_bsAfTag_Headline5')){echo get_option('fit_bsAfTag_Headline5');}else{echo '見出し5';}?></th>
      <td>
        <input type="text" name="afTagFormat_ori_item5" value="<?php echo $ori_item5; ?>" class="wide100">
      </td>
    </tr>
    <tr class="style_1">
      <th>独自項目名：<?php if(get_option('fit_bsAfTag_Headline6')){echo get_option('fit_bsAfTag_Headline6');}else{echo '見出し6';}?></th>
      <td>
        <input type="text" name="afTagFormat_ori_item6" value="<?php echo $ori_item6; ?>" class="wide100">
      </td>
    </tr>

    <tr class="style_1 style_2">
      <th>詳細ページボタン［リンク先ID］</th>
      <td>
        <span class="afTagFormatBuilderTable__inFirst">
        <select name="afTagFormat_d_id" class="wide">
					<option value="">選択してください</option>
		<?php
        if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				$selected = ((int)$d_id === get_the_ID())?' selected="selected"':'';
				echo '<option value="'.get_the_ID().'"'.$selected.'>'.get_the_ID().'：'.get_the_title().'</option>';
			}
		}
		wp_reset_postdata();
		?>
        </select>
        </span>
        ［ボタンのテキスト］<input type="text" name="afTagFormat_d_title" value="<?php echo $d_title; ?>" class="middle">
      </td>
    </tr>
    <tr class="style_1 style_2">
      <th>AFページボタン［リンク先URL］</th>
      <td>
        <span class="afTagFormatBuilderTable__inFirst"><input type="text" name="afTagFormat_a_url" value="<?php echo $a_url; ?>" class="wide"></span>
        ［ボタンのテキスト］<input type="text" name="afTagFormat_a_title" value="<?php echo $a_title; ?>" class="middle">
      </td>
    </tr>
    <tr class="style_1">
      <td colspan="2"><small>※独自項目名は[外観]→[カスタマイズ]→[基本設定]→[タグ管理設定]から変更可能</small></td>
    </tr>
  </tbody>
</table>
<?php

}



// カスタムフィールドの値を保存
function fit_save_afTagFormat_fields( $post_id ) {

	//自動保存の時は何もしない
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return $post_id;
	}

	// クイックポストの時は何もしない
	if(isset($_POST['action']) && $_POST['action'] == 'inline-save'){
		return $post_id;
	}

	// 各項目を保存
	if(!empty($_POST['afTagFormat_style'])){
		update_post_meta($post_id, 'afTagFormat_style', $_POST['afTagFormat_style'] );
	}else{
		delete_post_meta($post_id, 'afTagFormat_style');
	}
	if(!empty($_POST['afTagFormat_star'])){
		update_post_meta($post_id, 'afTagFormat_star', $_POST['afTagFormat_star'] );
	}else{
		delete_post_meta($post_id, 'afTagFormat_star');
	}
	if(!empty($_POST['afTagFormat_number'])){
		update_post_meta($post_id, 'afTagFormat_number', $_POST['afTagFormat_number'] );
	}else{
		delete_post_meta($post_id, 'afTagFormat_number');
	}
	if(!empty($_POST['afTagFormat_banner'])){
		update_post_meta($post_id, 'afTagFormat_banner', $_POST['afTagFormat_banner'] );
	}else{
		delete_post_meta($post_id, 'afTagFormat_banner');
	}
	if(!empty($_POST['afTagFormat_text'])){
		update_post_meta($post_id, 'afTagFormat_text', $_POST['afTagFormat_text'] );
	}else{
		delete_post_meta($post_id, 'afTagFormat_text');
	}
	if(!empty($_POST['afTagFormat_d_id'])){
		update_post_meta($post_id, 'afTagFormat_d_id', $_POST['afTagFormat_d_id'] );
	}else{
		delete_post_meta($post_id, 'afTagFormat_d_id');
	}
	if(!empty($_POST['afTagFormat_d_title'])){
		update_post_meta($post_id, 'afTagFormat_d_title', $_POST['afTagFormat_d_title'] );
	}else{
		delete_post_meta($post_id, 'afTagFormat_d_title');
	}
	if(!empty($_POST['afTagFormat_a_url'])){
		update_post_meta($post_id, 'afTagFormat_a_url', $_POST['afTagFormat_a_url'] );
	}else{
		delete_post_meta($post_id, 'afTagFormat_a_url');
	}
	if(!empty($_POST['afTagFormat_a_title'])){
		update_post_meta($post_id, 'afTagFormat_a_title', $_POST['afTagFormat_a_title'] );
	}else{
		delete_post_meta($post_id, 'afTagFormat_a_title');
	}
	if(!empty($_POST['afTagFormat_ori_item1'])){
		update_post_meta($post_id, 'afTagFormat_ori_item1', $_POST['afTagFormat_ori_item1'] );
	}else{
		delete_post_meta($post_id, 'afTagFormat_ori_item1');
	}
	if(!empty($_POST['afTagFormat_ori_item2'])){
		update_post_meta($post_id, 'afTagFormat_ori_item2', $_POST['afTagFormat_ori_item2'] );
	}else{
		delete_post_meta($post_id, 'afTagFormat_ori_item2');
	}
	if(!empty($_POST['afTagFormat_ori_item3'])){
		update_post_meta($post_id, 'afTagFormat_ori_item3', $_POST['afTagFormat_ori_item3'] );
	}else{
		delete_post_meta($post_id, 'afTagFormat_ori_item3');
	}
	if(!empty($_POST['afTagFormat_ori_item4'])){
		update_post_meta($post_id, 'afTagFormat_ori_item4', $_POST['afTagFormat_ori_item4'] );
	}else{
		delete_post_meta($post_id, 'afTagFormat_ori_item4');
	}
	if(!empty($_POST['afTagFormat_ori_item5'])){
		update_post_meta($post_id, 'afTagFormat_ori_item5', $_POST['afTagFormat_ori_item5'] );
	}else{
		delete_post_meta($post_id, 'afTagFormat_ori_item5');
	}
	if(!empty($_POST['afTagFormat_ori_item6'])){
		update_post_meta($post_id, 'afTagFormat_ori_item6', $_POST['afTagFormat_ori_item6'] );
	}else{
		delete_post_meta($post_id, 'afTagFormat_ori_item6');
	}

}
function fit_transition_afTagFormat_status($new_status, $old_status, $post) {
	if (($old_status == 'auto-draft'
	|| $old_status == 'draft'
	|| $old_status == 'pending'
	|| $old_status == 'future')
	&& $new_status == 'publish') {
		return $post;
	} else {
		add_action('save_post', 'fit_save_afTagFormat_fields');
	}
}
add_action('transition_post_status', 'fit_transition_afTagFormat_status', 10, 3);
