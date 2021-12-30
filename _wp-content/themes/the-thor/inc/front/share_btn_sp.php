<?php
////////////////////////////////////////////////////////
//SNSボタンリスト(スマホフッターメニュー用)
////////////////////////////////////////////////////////
function fit_share_btnFooter(){

	$options = '';
	if (get_option('fit_conFooterSp_menu_share')){
		$options = get_option('fit_conFooterSp_menu_share');
	}



	if ( !empty($options['facebook']) || !empty($options['twitter']) || !empty($options['google']) || !empty($options['hatebu']) || !empty($options['pocket']) || !empty($options['line']) || !empty($options['linkedin']) || !empty($options['pinterest']) ) {
		echo '<ul class="socialList socialList-type08">'."\n";
		if ( !empty($options['facebook']) ) {
			echo '<li class="socialList__item"><a class="socialList__link icon-facebook" href="http://www.facebook.com/sharer.php?u='. urlencode(get_the_fit_permalink()) .'&amp;t='. urlencode(fit_title_document()) .'" target="_blank" title="Facebook"></a></li>';
		}
		if ( !empty($options['twitter']) ) {
			echo '<li class="socialList__item"><a class="socialList__link icon-twitter" href="http://twitter.com/intent/tweet?text='. urlencode(fit_title_document()) .'&amp;'. urlencode(get_the_fit_permalink()) .'&amp;url='. urlencode(get_the_fit_permalink()) .'" target="_blank" title="Twitter"></a></li>';
		}
		if ( !empty($options['google']) ) {
			echo '<li class="socialList__item"><a class="socialList__link icon-google-plus" href="https://plus.google.com/share?url='. urlencode(get_the_fit_permalink()) .'" target="_blank" title="Google+"></a></li>';
    	}
		if ( !empty($options['hatebu']) ) {
			echo '<li class="socialList__item"><a class="socialList__link icon-hatenabookmark" href="http://b.hatena.ne.jp/add?mode=confirm&amp;url='. urlencode(get_the_fit_permalink()) .'&amp;title='. urlencode(fit_title_document()) .'" target="_blank" data-hatena-bookmark-title="'. urlencode(get_the_fit_permalink()) .'" title="はてブ"></a></li>';
		}
		if ( !empty($options['pocket']) ) {
			echo '<li class="socialList__item"><a class="socialList__link icon-pocket" href="http://getpocket.com/edit?url='. urlencode(get_the_fit_permalink()) .'" target="_blank" title="Pocket"></a></li>';
		}
		if ( !empty($options['line']) ) {
			echo '<li class="socialList__item"><a class="socialList__link icon-line" href="http://line.naver.jp/R/msg/text/?'. urlencode(fit_title_document()) .'%0D%0A'. urlencode(get_the_fit_permalink()) .'" target="_blank" title="LINE"></a></li>';
		}
		if ( !empty($options['linkedin']) ) {
			echo '<li class="socialList__item"><a class="socialList__link icon-linkedin"  href="http://www.linkedin.com/shareArticle?mini=true&url='. urlencode(get_the_fit_permalink()) .'" target="_blank" title="LinkedIn"></a></li>';
		}
		if ( !empty($options['pinterest']) ) {
			echo '<li class="socialList__item"><a class="socialList__link icon-pinterest"  href="http://www.pinterest.com/pin/create/button/?url='. urlencode(get_the_fit_permalink()) .'" target="_blank" title="Pinterest"></a></li>';
		}
    	echo '</ul>'."\n";
	}
}
