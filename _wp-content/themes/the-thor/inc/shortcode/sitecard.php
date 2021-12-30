<?php
////////////////////////////////////////////////////////
//内部リンクをはてなカード風にするショートコード
////////////////////////////////////////////////////////


function fit_get_sitecard($atts) {
	extract(shortcode_atts(array(
		'url'=>"",
		'subtitle'=>"関連記事",
		'target'=>"self",
	),$atts));

	$id = url_to_postid($url);//URLから投稿IDを取得
	if($id != '0') {
		// URLから投稿IDが取得できたとき
		$thumbnail = get_the_post_thumbnail($id,'icatch375');
		if (empty($thumbnail)) {
			if ( get_fit_noimg()){
				$thumbnail = '<img width="150" height="150" alt="IMG" '.fit_correct_src().'="'.get_fit_noimg().'" '.fit_dummy_src().'>';
			}else{
				$thumbnail = '<img width="150" height="150" alt="IMG" '.fit_correct_src().'="'.get_template_directory_uri().'/img/img_no_thumbnail.gif" '.fit_dummy_src().'>';
			}
		}

		$title = esc_html(get_the_title($id));

		$post = get_post($id);
		$description = mb_substr(strip_tags(apply_filters('get_the_content', $post->post_content)), 0, 120).'[…]';

		$eyecatch_class = '';
		if (get_option('fit_bsEyecatch_hover') != 'off' ) {
			$eyecatch_class = ' eyecatch__link-'.get_option('fit_bsEyecatch_hover');
		}

		$sitecard = '';
		if ($url) {
			$sitecard = '
			<div class="sitecard">
				<div class="sitecard__subtitle">'.$subtitle.'</div>
				<div class="sitecard__contents">
					<div class="heading heading-secondary"><a href="'. $url .'" target="_'. $target .'">'. $title .'</a></div>
					<p class="phrase phrase-tertiary">'. $description .'</p>
				</div>
				<div class="eyecatch eyecatch-11"><a class="eyecatch__link'.$eyecatch_class.'" href="'. $url .'" target="_'. $target .'">'.$thumbnail.'</a></div>
			</div>';
		}

		return $sitecard;
	}


}

add_shortcode("sitecard", "fit_get_sitecard");
