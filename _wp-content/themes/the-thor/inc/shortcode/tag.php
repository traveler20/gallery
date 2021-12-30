<?php
////////////////////////////////////////////////////////
//タグ管理をShortcode化
////////////////////////////////////////////////////////
function afTag_Scode($atts) {
	// ショートコードの属性
	extract(shortcode_atts(array(
		'id'        => '',
		'name'      => '',
		'class'     => 'afTagBox',
		), $atts));

	// WP_Query のパラメータ
	$args = array(
		'p'         => $id,
		'name'      => $name,
		'post_type' => 'afTag',
	);
	$the_query = new WP_Query( $args );
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		$title = get_the_title();
		$content = apply_filters( 'the_content', get_the_content() );
		$style = get_post_meta($id, 'afTagFormat_style', true);
		$star = get_post_meta($id, 'afTagFormat_star', true);
		$number = get_post_meta($id, 'afTagFormat_number', true);
		$banner = apply_filters('the_content', get_post_meta($id, 'afTagFormat_banner', true));
		$text = apply_filters('the_content', get_post_meta($id, 'afTagFormat_text', true));
		$d_id = get_post_meta($id, 'afTagFormat_d_id', true);
		$d_title = get_post_meta($id, 'afTagFormat_d_title', true);
		$a_url = get_post_meta($id, 'afTagFormat_a_url', true);
		$a_title = get_post_meta($id, 'afTagFormat_a_title', true);

		$d_btn = '';
		if(!empty($d_id) && !empty($d_title) && is_single($d_id) != $d_id){$d_btn = '<a class="afTagBox__btnDetail" href="'.get_permalink($d_id).'">'.$d_title.'</a>';}
		$a_btn = '';
		if(!empty($a_url) && !empty($a_title)){$a_btn = '<a class="afTagBox__btnAf" href="'.$a_url.'" target="_blank">'.$a_title.'</a>';}

		$ori_item1 = apply_filters('the_content', get_post_meta($id, 'afTagFormat_ori_item1', true));
		$ori_item2 = apply_filters('the_content', get_post_meta($id, 'afTagFormat_ori_item2', true));
		$ori_item3 = apply_filters('the_content', get_post_meta($id, 'afTagFormat_ori_item3', true));
		$ori_item4 = apply_filters('the_content', get_post_meta($id, 'afTagFormat_ori_item4', true));
		$ori_item5 = apply_filters('the_content', get_post_meta($id, 'afTagFormat_ori_item5', true));
		$ori_item6 = apply_filters('the_content', get_post_meta($id, 'afTagFormat_ori_item6', true));

		$ori_head1 = '見出し1';
		if(get_option('fit_bsAfTag_Headline1')){$ori_head1 = get_option('fit_bsAfTag_Headline1');}
		$ori_head2 = '見出し2';
		if(get_option('fit_bsAfTag_Headline2')){$ori_head2 = get_option('fit_bsAfTag_Headline2');}
		$ori_head3 = '見出し3';
		if(get_option('fit_bsAfTag_Headline3')){$ori_head3 = get_option('fit_bsAfTag_Headline3');}
		$ori_head4 = '見出し4';
		if(get_option('fit_bsAfTag_Headline4')){$ori_head4 = get_option('fit_bsAfTag_Headline4');}
		$ori_head5 = '見出し5';
		if(get_option('fit_bsAfTag_Headline5')){$ori_head5 = get_option('fit_bsAfTag_Headline5');}
		$ori_head6 = '見出し6';
		if(get_option('fit_bsAfTag_Headline6')){$ori_head6 = get_option('fit_bsAfTag_Headline6');}

		$ori_table1 = '';
		if(!empty($ori_item1)){$ori_table1 = '<tr><th width="33.3%">'.$ori_head1.'</th><td>'.$ori_item1.'</td></tr>';}
		$ori_table2 = '';
		if(!empty($ori_item2)){$ori_table2 = '<tr><th>'.$ori_head2.'</th><td>'.$ori_item2.'</td></tr>';}
		$ori_table3 = '';
		if(!empty($ori_item3)){$ori_table3 = '<tr><th>'.$ori_head3.'</th><td>'.$ori_item3.'</td></tr>';}
		$ori_table4 = '';
		if(!empty($ori_item4)){$ori_table4 = '<tr><th>'.$ori_head4.'</th><td>'.$ori_item4.'</td></tr>';}
		$ori_table5 = '';
		if(!empty($ori_item5)){$ori_table5 = '<tr><th>'.$ori_head5.'</th><td>'.$ori_item5.'</td></tr>';}
		$ori_table6 = '';
		if(!empty($ori_item6)){$ori_table6 = '<tr><th>'.$ori_head6.'</th><td>'.$ori_item6.'</td></tr>';}

		$jquery  = '';
		if(!is_user_logged_in() && !is_bot()){
			$post_view_action = new Fit_Post_View_Action( $id );
			$post_view_action->add_wp_footer();
			$jquery = post_ajax_send($id);
		}

	}
	wp_reset_postdata();

	if($style == '_0' || empty($style)){
		return '
<div class="'.$class.' afTag-'.$id.'">
  <div class="afTagBox__content">'.$content.'</div>
  '.$jquery.'
</div>
		';
	}else if($style == '_1'){
		return '
<div class="'.$class.' afTag-'.$id.'">
  <div class="afTagBox__header">
    <div class="afTagBox__title">'.$title.'</div>
    <div class="afTagBox__star afTagBox__star-number_'.$star.'"><span class="afTagBox__number">'.$number.'</span></div>
  </div>
  <div class="afTagBox__contentBox">
    <div class="afTagBox__banner">'.$banner.'</div>
		<div class="afTagBox__text">'.$text.'</div>
  </div>
  <table class="afTagBox__table">
    '.$ori_table1.'
	'.$ori_table2.'
	'.$ori_table3.'
	'.$ori_table4.'
	'.$ori_table5.'
	'.$ori_table6.'
  </table>
  <div class="afTagBox__content">'.$content.'</div>
  <div class="afTagBox__btnList">
    '.$d_btn.'
	'.$a_btn.'
  </div>
  '.$jquery.'
</div>
		';
	}else if($style == '_2'){
		return '
<div class="'.$class.' afTag-'.$id.'">
  <div class="afTagBox__header">
    <div class="afTagBox__title">'.$title.'</div>
    <div class="afTagBox__star afTagBox__star-number_'.$star.'"><span class="afTagBox__number">'.$number.'</span></div>
  </div>
  <div class="afTagBox__contentBox">
    <div class="afTagBox__banner">'.$banner.'</div>
	<div class="afTagBox__text">'.$text.'</div>
  </div>
  <div class="afTagBox__btnList">
    '.$d_btn.'
	'.$a_btn.'
  </div>
  '.$jquery.'
</div>
		';
	}

}
add_shortcode( 'afTag', 'afTag_Scode', true );
