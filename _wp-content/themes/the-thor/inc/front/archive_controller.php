<?php
////////////////////////////////////////////////////////
//アーカイブコントローラー表示条件&出力
////////////////////////////////////////////////////////
function fit_archive_controller() {

	$wide = '';
	$card = '';
	$normal = '';
	$frame = '';
	if(get_option('fit_archiveCtl_checked') == 'wide' || get_option('fit_archiveCtl_checked') == '' ){
		$wide = 'checked';
	}if(get_option('fit_archiveCtl_checked') == 'card' ){
		$card = 'checked';
	}if(get_option('fit_archiveCtl_checked') == 'normal' ){
		$normal = 'checked';
	}if ( get_option('fit_archiveCtl_frame') != 'off' ){
		$frame = get_option('fit_archiveCtl_frame');
	}

	echo '<input type="radio" name="controller__viewRadio" value="viewWide" class="controller__viewRadio" id="viewWide" '.$wide.'>';
  echo '<input type="radio" name="controller__viewRadio" value="viewCard" class="controller__viewRadio" id="viewCard" '.$card.'>';
  echo '<input type="radio" name="controller__viewRadio" value="viewNormal" class="controller__viewRadio" id="viewNormal" '.$normal.'>';

	if(get_option('fit_archiveCtl_switch') == 'on' ){
		echo '<ul class="controller '.$frame.'">';
		if(get_option('fit_archiveCtl_sort') == 'on' ){
			echo '<li class="controller__item">';
			$url     = get_pagenum_link(1); //URL
			$sortset = get_query_var('sort'); //取得
			$newer   = '新着順';
			$popular = '人気順';
			$newer_crt = '';
			$popular_crt = '';

			if(get_option('fit_archiveCtl_newer')){
				$newer   = get_option('fit_archiveCtl_newer');
			}if(get_option('fit_archiveCtl_popular')){
				$popular   = get_option('fit_archiveCtl_popular');
			}if($sortset != 'popular' ){
				$newer_crt = ' is-current';
			}if($sortset == 'popular' ){
				$popular_crt = ' is-current';
			}

			echo '<form method="get" name="newer" action="'.$url.'">';
			if (isset($_GET["s"])) {
				echo '<input type="hidden" name="s" value="'.$_GET["s"].'" />';
			}
			if (isset($_GET["cat"])) {
				echo '<input type="hidden" name="cat" value="'.$_GET["cat"].'" />';
			}

			if (isset($_GET["tag"])) {
				foreach ($_GET["tag"] as $val){
					echo '<input type="hidden" name="tag[]" value="'.$val.'" />';
				}
			}
			echo '<input type="hidden" name="sort" value="newer" />';
			echo '<a class="controller__link'.$newer_crt.'" href="javascript:newer.submit()">'.$newer.'</a>';
      echo '</form>';
			echo '</li>';
			echo '<li class="controller__item">';
      echo '<form method="get" name="popular" action="'.$url.'">';
			if (isset($_GET["s"])) {
				echo '<input type="hidden" name="s" value="'.$_GET["s"].'" />';
			}
			if (isset($_GET["cat"])) {
				echo '<input type="hidden" name="cat" value="'.$_GET["cat"].'" />';
			}

			if (isset($_GET["tag"])) {
				foreach ($_GET["tag"] as $val){
					echo '<input type="hidden" name="tag[]" value="'.$val.'" />';
				}
			}
      echo '<input type="hidden" name="sort" value="popular" />';
      echo '<a class="controller__link'.$popular_crt.'" href="javascript:popular.submit()">'.$popular.'</a>';
      echo '</form>';
			echo '</li>';
    }

		if( get_option('fit_archiveCtl_cat') == 'on' && get_option('fit_archiveCtl_catId') ){
			echo '<li class="controller__item">';
			$title = 'お勧めカテゴリ';
			if(get_option('fit_archiveCtl_catTitle')){
				$title   = get_option('fit_archiveCtl_catTitle');
			}

			echo '<input class="controller__catCheck" id="categoryPanel" type="checkbox">';
      echo '<label class="controller__catLabel" for="categoryPanel">'.$title.'</label>';
      echo '<ul class="controller__catPanel">';
      $catId = explode(',', get_option('fit_archiveCtl_catId'));
      foreach($catId as $val){
			echo '<li><a href="'.get_category_link($val).'">'.get_the_category_by_ID($val).'</a></li>';
		}
    echo '</ul>';
		echo '</li>';
  }

	if(get_option('fit_archiveCtl_layout') == 'on' ){
		echo '<li class="controller__item controller__item-end">';
		echo '<label for="viewWide" class="controller__viewLabel viewWide icon-view_wide"></label>';
		echo '</li>';
		echo '<li class="controller__item">';
		echo '<label for="viewCard" class="controller__viewLabel viewCard icon-view_card"></label>';
		echo '</li>';
		echo '<li class="controller__item">';
		echo '<label for="viewNormal" class="controller__viewLabel viewNormal icon-view_normal"></label>';
		echo '</li>';
  }
  echo '</ul>';
	}
}
