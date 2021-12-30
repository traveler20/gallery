<?php
////////////////////////////////////////////////////////
//SNSボタンリスト
////////////////////////////////////////////////////////
function fit_share_btn(){
	$style = '01';
	if (get_option('fit_partsShare_style')){
		$style = get_option('fit_partsShare_style');
	}

	$options = '';
	if (is_singular('post') && get_option('fit_postShare')){
		$options = get_option('fit_postShare');
	}elseif (is_page() && get_option('fit_pageShare')){
		$options = get_option('fit_pageShare');
	}


	if ( !empty($options['facebook']) || !empty($options['twitter']) || !empty($options['google']) || !empty($options['hatebu']) || !empty($options['pocket']) || !empty($options['line']) || !empty($options['linkedin']) || !empty($options['pinterest']) ) {
		echo '<ul class="socialList socialList-type'.$style.'">'."\n";
		if ( !empty($options['facebook']) ) {
			echo '<li class="socialList__item"><a class="socialList__link icon-facebook" href="http://www.facebook.com/sharer.php?u='. urlencode(get_permalink()) .'&amp;t='. urlencode(the_title("","",0)) .'" target="_blank" title="Facebook"></a></li>';
		}
		if ( !empty($options['twitter']) ) {
			echo '<li class="socialList__item"><a class="socialList__link icon-twitter" href="http://twitter.com/intent/tweet?text='. urlencode(the_title("","",0)) .'&amp;'. urlencode(get_permalink()) .'&amp;url='. urlencode(get_permalink()) .'" target="_blank" title="Twitter"></a></li>';
		}
		if ( !empty($options['google']) ) {
			echo '<li class="socialList__item"><a class="socialList__link icon-google-plus" href="https://plus.google.com/share?url='. urlencode(get_permalink()) .'" target="_blank" title="Google+"></a></li>';
    	}
		if ( !empty($options['hatebu']) ) {
			echo '<li class="socialList__item"><a class="socialList__link icon-hatenabookmark" href="http://b.hatena.ne.jp/add?mode=confirm&amp;url='. urlencode(get_permalink()) .'&amp;title='. urlencode(the_title("","",0)) .'" target="_blank" data-hatena-bookmark-title="'. urlencode(get_permalink()) .'" title="はてブ"></a></li>';
		}
		if ( !empty($options['pocket']) ) {
			echo '<li class="socialList__item"><a class="socialList__link icon-pocket" href="http://getpocket.com/edit?url='. urlencode(get_permalink()) .'" target="_blank" title="Pocket"></a></li>';
		}
		if ( !empty($options['line']) ) {
			echo '<li class="socialList__item"><a class="socialList__link icon-line" href="http://line.naver.jp/R/msg/text/?'. urlencode(the_title("","",0)) .'%0D%0A'. urlencode(get_permalink()) .'" target="_blank" title="LINE"></a></li>';
		}
		if ( !empty($options['linkedin']) ) {
			echo '<li class="socialList__item"><a class="socialList__link icon-linkedin"  href="http://www.linkedin.com/shareArticle?mini=true&url='. urlencode(get_permalink()) .'" target="_blank" title="LinkedIn"></a></li>';
		}
		if ( !empty($options['pinterest']) ) {
			echo '<li class="socialList__item"><a class="socialList__link icon-pinterest"  href="http://www.pinterest.com/pin/create/button/?url='. urlencode(get_permalink()) .'" target="_blank" title="Pinterest"></a></li>';
		}
    	echo '</ul>'."\n";
	}
}
