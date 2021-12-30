<?php
////////////////////////////////////////////////////////
// SEO<meta robots> <meta description>の設定
////////////////////////////////////////////////////////
//カスタムフィールドで設定したディスクリプションの改行を削除
function custom_description() {
	$description = get_post_meta(get_the_ID(), 'description', true);
	$description = strip_tags(str_replace(array("\r\n", "\r", "\n"), '', $description));//改行削除
	return $description;
}
//metaディスクリプションの設定
function fit_meta_description() {
	$description = '';

	//TOPページ
	if ( is_home() || is_front_page() ) {
		//TOPページが固定の時
		if ( get_option( 'show_on_front' ) == 'page' ) {
			if (custom_description()) {
				$description = custom_description();
			}
		}
		//TOPページが固定じゃない時
		else {
			if (get_option('fit_seoTop_description')) {
				$description = get_option('fit_seoTop_description');
			}
		}
	}

	// 詳細ページ
	elseif ( is_singular() ) {
		if (custom_description()) {
			$description = custom_description();
		}
	}

	// カテゴリーページ
	elseif (is_category()) {
		$cat = get_query_var('cat');
		$cat_meta = get_option('category_'.$cat);
		if ($cat_meta['description']) {
			$description = $cat_meta['description'];
		}
	}

	// タグページ
	elseif (is_tag()) {
		$tag = get_query_var('tag_id');
		$tag_meta = get_option('post_tag_'.$tag);
		if ($tag_meta['description']) {
			$description = $tag_meta['description'];
		}
	}
	
	return $description;
}


// 設定の反映　meta robots と meta description
function fit_seo_meta() {// カスタムフィールドの設定値の読み込み
	$noindex   = '';
	$nofollow  = '';
	$nosnippet = '';
	$noarchive = '';
	if( get_post_meta(get_the_ID(),'noindex',true)) {
		$noindex = get_post_meta(get_the_ID(),'noindex',true).',';
	}
	if( get_post_meta(get_the_ID(),'nofollow',true)) {
		$nofollow = get_post_meta(get_the_ID(),'nofollow',true).',';
	}
	if( get_post_meta(get_the_ID(),'nosnippet',true)) {
		$nosnippet = get_post_meta(get_the_ID(),'nosnippet',true).',';
	}
	if( get_post_meta(get_the_ID(),'noarchive',true)) {
		$noarchive = get_post_meta(get_the_ID(),'noarchive',true).',';
	}
	$robot = $noindex.$nofollow.$nosnippet.$noarchive;
	$metaRobots = rtrim($robot, ',');
	$metaDescription = fit_meta_description();



	//TOPページの時の出力
	if ( is_home() || is_front_page() ) {

		//TOPページが固定の時
		if ( get_option( 'show_on_front' ) == 'page' ) {
			//meta robots設定
			if (!empty($metaRobots)) {
				echo '<meta name="robots" content="'.$metaRobots.'">'."\n";
			}
			// meta description設定
			if (!empty($metaDescription)) {
				echo '<meta name="description" content="'.$metaDescription.'">'; echo "\n";
			}
		}
		//TOPページが固定じゃない時
		else {
			// meta description設定
			if (!empty($metaDescription)) {
				echo '<meta name="description" content="'.$metaDescription.'">'; echo "\n";
			}
		}
	}

	//TOPページじゃない時の出力
	else {
		//meta robots設定
		if (!empty($metaRobots)) {
			echo '<meta name="robots" content="'.$metaRobots.'">'."\n";
		}
		// meta description設定
		if (!empty($metaDescription)) {
			echo '<meta name="description" content="'.$metaDescription.'">'; echo "\n";
		}
	}


}
