<?php
////////////////////////////////////////////////////////
//embed非対応サイト用ブログカードショートコード
////////////////////////////////////////////////////////
function fit_get_blogcard( $atts ) {
	extract(shortcode_atts(array(
		'url'=>"",
	),$atts));

	$urlHash = sha1($url);
	$cache = get_site_transient($urlHash);
	if($cache){
    return $cache;
	}else{
		// OpenGraph.phpを読み込み
		require_once locate_template('inc/_OpenGraph.php');

		// OGP情報を取得
		$ogp = OpenGraph::fetch($url);
		$blogcard = '';

		// OGPがあればタイトル、説明文、画像を取得
		if ($ogp) {
			$detects = array('ASCII','EUC-JP','SJIS', 'JIS','CP51932','UTF-16', 'ISO-8859-1'); //文字コード
			$title       = $ogp->title;
			$description = $ogp->description;
			$site        = $ogp->site_name;

			$title_check = utf8_decode($title);
			if(mb_detect_encoding($title_check) == 'UTF-8'){
				$title = $title_check; // 文字化け解消
			}
			if(mb_detect_encoding($title) != 'UTF-8'){
				$title = mb_convert_encoding($title, 'UTF-8', mb_detect_encoding($title, $detects, true));
			}

			$description_check = utf8_decode($description);
			if(mb_detect_encoding($description_check) == 'UTF-8'){
				$description = $description_check; // 文字化け解消
			}
			if(mb_detect_encoding($description) != 'UTF-8'){
				$description = mb_convert_encoding($description, 'UTF-8', mb_detect_encoding($description, $detects, true));
			}

			$site_check = utf8_decode($site);
			if(mb_detect_encoding($site_check) == 'UTF-8'){
				$site = $site_check; // 文字化け解消
			}
			if(mb_detect_encoding($site) != 'UTF-8'){
				$site = mb_convert_encoding($site, 'UTF-8', mb_detect_encoding($site, $detects, true));
			}

			$thumbnail   = $ogp->image;
			if (empty($thumbnail)) {
				if ( get_fit_noimg()){
					$thumbnail = get_fit_noimg();
				}else{
					$thumbnail = get_template_directory_uri().'/img/img_no_768.gif';
				}
			}

			$descriptionExcerpt = mb_substr($description, 0, 60);

			$eyecatch_class = '';
			if (get_option('fit_bsEyecatch_hover') != 'off' ) {
				$eyecatch_class = ' eyecatch__link-'.get_option('fit_bsEyecatch_hover');
			}
			$fit_correct_src = fit_correct_src();
			$fit_dummy_src = fit_dummy_src();



			// ブログカードを構成するHTMLを作成
			$blogcard = '
			<div class="blogcard">
			  <div class="blogcard__subtitle icon-sphere">'.$site.'</div>
		      <div class="blogcard__contents">
		        <div class="heading heading-secondary"><a href="'. $url .'" target="_blank">'. $title .'</a></div>
			    <p class="phrase phrase-tertiary">'. $descriptionExcerpt .'…</p>
		      </div>
			  <div class="eyecatch eyecatch-11"><a class="eyecatch__link'.$eyecatch_class.'" href="'. $url .'" target="_blank"><img width="100" height="100" '.$fit_correct_src.'="'.$thumbnail.'" '.$fit_dummy_src.'></a></div>
		    </div>
			';

			// ブログカードを構成するHTMLを1週間キャッシュ
			set_site_transient($urlHash, $blogcard, WEEK_IN_SECONDS);
		}
		// $blogcardを返す
		return $blogcard;
	}
}
add_shortcode('blogcard', 'fit_get_blogcard');
