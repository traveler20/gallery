<?php
////////////////////////////////////////////////////////
//タグランキング登録ビルダー
////////////////////////////////////////////////////////

//投稿ページにカスタムフィールド入力欄
function add_afRanking_post_fields() {
	add_meta_box('afRanking_post_setting', 'タグランキングビルダー', 'insert_afRanking_post', 'afRanking', 'normal' );
}
add_action('admin_menu', 'add_afRanking_post_fields');


function insert_afRanking_post() {
	global $post;
	$style  = get_post_meta($post->ID, 'afRanking_style', true);
	$crown  = get_post_meta($post->ID, 'afRanking_crown', true);
	$values = get_post_meta($post->ID, 'afRanking_post', true);

	// 投稿データ(afTag)の取得
	$args = array(
        'posts_per_page' => -1,           //表示（取得）する記事の数
        'post_type' => 'afTag', //投稿タイプの指定
		'order' => 'ASC',
		'orderby' => 'ID' //投稿ID順で並び替え
    );
    $the_query = new WP_Query( $args );

?>
<table class="afRankFormatBuilderTable">
  <tbody>
    <tr valign="top">
      <td>表示スタイル</td>
      <td>
        <label><input type="radio" name="afRanking_style" value="_0" <?php if($style == '_0' || empty($style)){echo 'checked';} ?>> フォーマットを利用しない</label>
        <label><input type="radio" name="afRanking_style" value="_1" <?php if($style == '_1'){echo 'checked';} ?>> 利用する(全項目表示)</label>
        <label><input type="radio" name="afRanking_style" value="_2" <?php if($style == '_2'){echo 'checked';} ?>> 利用する(簡易表示)</label>
        </td>
    </tr>
    <tr valign="top">
      <td>ランクマーク</td>
      <td>
        <label><input type="radio" name="afRanking_crown" value="_1" <?php if($crown == '_1' || empty($crown)){echo 'checked';} ?>> 画像1</label>
        <label><input type="radio" name="afRanking_crown" value="_2" <?php if($crown == '_2'){echo 'checked';} ?>>  画像2</label>
        <label><input type="radio" name="afRanking_crown" value="_3" <?php if($crown == '_3'){echo 'checked';} ?>>  画像3</label>
        <label><input type="radio" name="afRanking_crown" value="_4" <?php if($crown == '_4'){echo 'checked';} ?>>  画像4</label>
        <label><input type="radio" name="afRanking_crown" value="_5" <?php if($crown == '_5'){echo 'checked';} ?>>  画像5</label>
        </td>
    </tr>
  </tbody>
</table>

<table class="afRankBuilderTable">
  <thead>
    <tr valign="top">
      <th scope="col" width="10px"></th>
      <th scope="col">タグを指定</th>
      <th scope="col" width="130px">CONTROL</th>
    <tr>
  </thead>
  <tbody class="afRankBuilderTable__tbody">

<?php
if ( !empty( $values) ) {
	foreach ($values as $val) {
?>
    <tr valign="top" class="afRankBuilderTable__tr">
      <td></td>
      <td>
      <select name="afRanking_post[]" class="select__title">
      <?php
	  if ( $the_query->have_posts() ) {
		  while ( $the_query->have_posts() ) {
			  $the_query->the_post();
			  $selected = ((int)$val === get_the_ID())?' selected="selected"':'';
			  echo '<option value="'.get_the_ID().'"'.$selected.'>'.get_the_ID().'：'.get_the_title().'</option>';
		  }
	  }
	  wp_reset_postdata();
	  ?>
      </select>
      </td>
      <td>
        <input type="button" class="button button-delete" value="削除" />
        <input type="button" class="button button-moveup" value="↑" />
        <input type="button" class="button button-movedown" value="↓" />
      </td>
    </tr>
<?php }} else { ?>
    <tr valign="top" class="afRankBuilderTable__tr">
      <td></td>
      <td>
      <select name="afRanking_post[]" class="select__title">
      <?php
	  if ( $the_query->have_posts() ) {
		  while ( $the_query->have_posts() ) {
			  $the_query->the_post();
			  echo '<option value="'.get_the_ID().'">'.get_the_ID().'：'.get_the_title().'</option>';
		  }
	  }
	  wp_reset_postdata();
	  ?>
      </select>
      </td>
      <td>
        <input type="button" class="button button-delete" value="削除" />
        <input type="button" class="button button-moveup" value="↑" />
        <input type="button" class="button button-movedown" value="↓" />
      </td>
    </tr>
<?php } ?>
    <tr valign="top">
      <td colspan="3">
        <input type="button" class="button button-add" value="行を追加" />
      </td>
    </tr>
  </tbody>
</table>
<script>
(function($){
	$('.afRankBuilderTable__tbody').on('click', '.button-add', function(){
		var areaTr = '\
		<tr valign="top" class="afRankBuilderTable__tr">\
          <td></td>\
		  <td>\
		  <select name="afRanking_post[]" class="select__title">\
<?php
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		echo '<option value="'.get_the_ID().'">'.get_the_ID().'：'.get_the_title().'</option>';
	}
}
wp_reset_postdata();
?>
          </select>\
	      </td>\
          <td>\
            <input type="button" class="button button-delete" value="削除" />\
            <input type="button" class="button button-moveup" value="↑" />\
            <input type="button" class="button button-movedown" value="↓" />\
          </td>\
        </tr>';
        $(this).closest('tr').before(areaTr);
	});

	$('.afRankBuilderTable__tbody').on('click', '.button-delete', function(){
		$(this).closest('tr').remove();
	});
	$('.afRankBuilderTable__tbody').on('click', '.button-moveup',function(){
		var moveTr = $(this).parent().parent();
		if($(moveTr).prev('tr')){
			$(moveTr).insertBefore($(moveTr).prev('tr'));
		}
	});
	$('.afRankBuilderTable__tbody').on('click', '.button-movedown',function(){
		var moveTr = $(this).parent().parent();
		if($(moveTr).next('tr') && $(moveTr).next('tr').hasClass('afRankBuilderTable__tr')){
			$(moveTr).insertAfter($(moveTr).next('tr'));
		}
	});

	// sortstopイベントをバインド
	$('.afRankBuilderTable__tbody').bind('sortstop',function(){
		// 番号を設定している要素に対しループ処理
		$(this).find('[name="num_data"]').each(function(idx){
			// タグ内に通し番号を設定（idxは0始まりなので+1する）
			$(this).html(idx+1);
		});
	});
})(jQuery);


</script>
<?php
}


// カスタムフィールドの値を保存
function fit_save_afRanking_fields( $post_id ) {

	//自動保存の時は何もしない
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return $post_id;
	}

	// クイックポストの時は何もしない
	if(isset($_POST['action']) && $_POST['action'] == 'inline-save'){
		return $post_id;
	}

	// 各項目を保存
	if(!empty($_POST['afRanking_style'])){
		update_post_meta($post_id, 'afRanking_style', $_POST['afRanking_style'] );
	}else{
		delete_post_meta($post_id, 'afRanking_style');
	}
	if(!empty($_POST['afRanking_crown'])){
		update_post_meta($post_id, 'afRanking_crown', $_POST['afRanking_crown'] );
	}else{
		delete_post_meta($post_id, 'afRanking_crown');
	}
	if(!empty($_POST['afRanking_post'])){
		update_post_meta($post_id, 'afRanking_post', $_POST['afRanking_post'] );
	}else{
		delete_post_meta($post_id, 'afRanking_post');
	}

}
function fit_transition_afRanking_status($new_status, $old_status, $post) {
	if (($old_status == 'auto-draft'
	|| $old_status == 'draft'
	|| $old_status == 'pending'
	|| $old_status == 'future')
	&& $new_status == 'publish') {
		return $post;
	} else {
		add_action('save_post', 'fit_save_afRanking_fields');
	}
}
add_action('transition_post_status', 'fit_transition_afRanking_status', 10, 3);
