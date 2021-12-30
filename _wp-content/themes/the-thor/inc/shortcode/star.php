<?php
////////////////////////////////////////////////////////
//スターショートコード
////////////////////////////////////////////////////////
function fit_get_starList($atts) {
	extract(shortcode_atts(array(
		'number'=>"",
	),$atts));
	$star = '<span class="starList"><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>';
	if($number == '0'){
		$star = '<span class="starList"><i class="icon-star-empty"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i></span>';
	}
	if($number == '0.5'){
		$star = '<span class="starList"><i class="icon-star-half"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i></span>';
	}
	if($number == '1'){
		$star = '<span class="starList"><i class="icon-star-full"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i></span>';
	}
	if($number == '1.5'){
		$star = '<span class="starList"><i class="icon-star-full"></i><i class="icon-star-half"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i></span>';
	}
	if($number == '2'){
		$star = '<span class="starList"><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i></span>';
	}
	if($number == '2.5'){
		$star = '<span class="starList"><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-half"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i></span>';
	}
	if($number == '3'){
		$star = '<span class="starList"><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i></span>';
	}
	if($number == '3.5'){
		$star = '<span class="starList"><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-half"></i><i class="icon-star-empty"></i></span>';
	}
	if($number == '4'){
		$star = '<span class="starList"><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-empty"></i></span>';
	}
	if($number == '4.5'){
		$star = '<span class="starList"><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-half"></i></span>';
	}
	if($number == '5'){
		$star = '<span class="starList"><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>';
	}

	return $star;
}
add_shortcode("star-list", "fit_get_starList");
