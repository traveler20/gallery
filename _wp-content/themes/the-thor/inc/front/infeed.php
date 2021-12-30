<?php
////////////////////////////////////////////////////////
// アーカイブinfeed広告
////////////////////////////////////////////////////////
function fit_infeed(){
	$class = "";
	if ( get_option('fit_archiveList_frame') != 'off' ){
		$class = get_option('fit_archiveList_frame');
	}

	if( get_option('fit_archiveCtl_layout') != 'on' ){
		if( is_mobile()){//スマホ時
			if (get_option('fit_adInfeed_tagSp1') && get_option('fit_archiveCtl_checked') == 'wide'){
				echo '<div class="archive__item archive__item-infeedSp1 '.$class.'">';
				echo get_option('fit_adInfeed_tagSp1');
				echo '</div>';
			}
			if (get_option('fit_adInfeed_tagSp2') && get_option('fit_archiveCtl_checked') == 'normal'){
				echo '<div class="archive__item archive__item-infeedSp2 '.$class.'">';
				echo get_option('fit_adInfeed_tagSp2');
				echo '</div>';
			}
		}
		else{//PC・TABLET時
			if (get_option('fit_adInfeed_tagPc1') && get_option('fit_archiveCtl_checked') == 'wide'){
				echo '<div class="archive__item archive__item-infeedPc1 '.$class.'">';
				echo get_option('fit_adInfeed_tagPc1');
				echo '</div>';
			}
			if (get_option('fit_adInfeed_tagPc2') && get_option('fit_archiveCtl_checked') == 'card'){
				echo '<div class="archive__item archive__item-infeedPc2 '.$class.'">';
				echo get_option('fit_adInfeed_tagPc2');
				echo '</div>';
			}
			if (get_option('fit_adInfeed_tagPc3') && get_option('fit_archiveCtl_checked') == 'normal'){
				echo '<div class="archive__item archive__item-infeedPc3 '.$class.'">';
				echo get_option('fit_adInfeed_tagPc3');
				echo '</div>';
			}
		}
	}
}
