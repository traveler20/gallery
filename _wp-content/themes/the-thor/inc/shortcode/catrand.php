<?php
////////////////////////////////////////////////////////
//カテゴリ指定ランダム記事一覧ショートコード
////////////////////////////////////////////////////////
function fit_get_catlistRand($atts, $content = null) {
    extract(shortcode_atts(array(
        "num" => '',
        "cat" => ''
    ), $atts));
    global $post;
    $oldpost = $post;
    $myposts = get_posts('numberposts='.$num.'&category='.$cat.'&orderby=rand');
	if($myposts) {
		$retHtml='<div class="archiveScode">';
		foreach($myposts as $post) :
			setup_postdata($post);
			$retHtml.='<div class="archiveScode__item">';
			$retHtml.= '<div class="eyecatch eyecatch-11">';
			if (get_option('fit_bsEyecatch_hover') && get_option('fit_bsEyecatch_hover') != 'off' ){
				$class = ' eyecatch__link-'.get_option('fit_bsEyecatch_hover');
			}
			$retHtml.= '<a class="eyecatch__link'.$class.'" href="'.get_permalink().'">';
			if ( has_post_thumbnail()) {
				$size = array( 100, 100 );
				$retHtml.= get_the_post_thumbnail($post,$size);
            }elseif ( get_fit_noimg()){
				$retHtml.= '<img '.fit_correct_src().'="'.get_fit_noimg().'" width="150" height="150" alt="NO IMAGE" '.fit_dummy_src().'>';
			}else{
				$retHtml.= '<img '.fit_correct_src().'="'.get_template_directory_uri().'/img/img_no_thumbnail.gif" width="150" height="150" alt="NO IMAGE" '.fit_dummy_src().'>';
			}
			$retHtml.='</a>';
			$retHtml.='</div>';
			$retHtml.='<div class="archiveScode__contents">';
			$cat = get_the_category();
			if(!is_category() && !empty($cat[0])){
				$retHtml.= '<div class="the__category cc-bg'.$cat[0]->term_id.'">';
				$retHtml.= '<a href="' . get_category_link( $cat[0]->term_id ) . '">' . $cat[0]->cat_name . '</a>';
				$retHtml.= '</div>';
			}
			$retHtml.='<div class="heading heading-secondary"><a href="'.get_permalink().'" >'.the_title("","",false).'</a></div>';
			$retHtml.='<p class="phrase phrase-tertiary">'.get_the_excerpt().'</p>';
			$retHtml.='</div>';
			$retHtml.='</div>';
		endforeach;
		$retHtml.='</div>';
	} else {
		$retHtml='<p>記事がありません。</p>';
	}
    $post = $oldpost;
    return $retHtml;
}
add_shortcode("randlist", "fit_get_catlistRand");
