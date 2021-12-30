<?php
////////////////////////////////////////////////////////
//SEO<OGP>設定
////////////////////////////////////////////////////////
function fit_ogp_date(){
	echo '<meta property="og:site_name" content="'.get_bloginfo('name').'" />'."\n";
	if (is_singular()){
		echo '<meta property="og:type" content="article" />'."\n";
	}else {
		echo '<meta property="og:type" content="website" />'."\n";
	}
	if (is_singular()){
		echo '<meta property="og:title" content="'.get_the_title().'" />'."\n";
		if(fit_meta_description()){
			echo '<meta property="og:description" content="'.fit_meta_description().'" />'."\n";
		}elseif(have_posts()){
			while ( have_posts() ) {
				the_post();
				echo '<meta property="og:description" content="'.mb_substr(get_the_excerpt(), 0, 120).'" />'."\n";
			}
		}
		echo '<meta property="og:url" content="'.get_the_permalink().'" />'."\n";
	}
	elseif ( is_front_page() && get_option( 'show_on_front' ) == 'page' ) {
		if ( get_post_meta(get_the_ID(), 'title', true) ) {
			echo '<meta property="og:title" content="'.get_post_meta(get_the_ID(), 'title', true).'" />'."\n";
		}
		else{
			echo '<meta property="og:title" content="'.get_the_title().'" />'."\n";
		}
		if(fit_meta_description()){
			echo '<meta property="og:description" content="'.fit_meta_description().'" />'."\n";
		}
		else{
			echo '<meta property="og:description" content="'.get_bloginfo('description').'" />'."\n";
		}
		echo '<meta property="og:url" content="'.get_home_url().'" />'."\n";
	}
	elseif ( is_front_page() && get_option( 'show_on_front' ) == 'posts' ) {
		if ( get_option('fit_seoTop_title') ) {
			echo '<meta property="og:title" content="'.get_option('fit_seoTop_title').'" />'."\n";
		}else{
			echo '<meta property="og:title" content="'.get_bloginfo( 'name' ).'" />'."\n";
		}
		if(get_option('fit_seoTop_description')){
			echo '<meta property="og:description" content="'.get_option('fit_seoTop_description').'" />'."\n";
		}else{
			echo '<meta property="og:description" content="'.get_bloginfo('description').'" />'."\n";
		}
		echo '<meta property="og:url" content="'.get_home_url().'" />'."\n";
	}
	else {
		echo '<meta property="og:title" content="'.wp_get_document_title().'" />'."\n";
		if (fit_meta_description()) {
			echo '<meta property="og:description" content="'.fit_meta_description().'" />'."\n";
		}
		else{
			echo '<meta property="og:description" content="'.get_bloginfo('description').'" />'."\n";
		}
		if(is_year()){
			echo '<meta property="og:url" content="'.get_year_link('').'" />'."\n";
		}
		elseif(is_month()){
			echo '<meta property="og:url" content="'.get_month_link('', '').'" />'."\n";
		}
		elseif(is_day()){
			echo '<meta property="og:url" content="'.get_day_link('', '', '').'" />'."\n";
		}
		elseif(is_author()){
			echo '<meta property="og:url" content="'.get_author_posts_url(get_the_author_meta( 'ID' )).'" />'."\n";
		}
		elseif(is_search()){
			echo '<meta property="og:url" content="'.get_search_link().'" />'."\n";
		}
		elseif(is_category()){
			$cat = get_the_category();
			$cat_id = $cat[0]->cat_ID;
			echo '<meta property="og:url" content="'.get_category_link($cat_id).'" />'."\n";
		}
		elseif(is_tag()){
			$tag = get_the_tags();
			$tag_id = $tag[0]->term_id;
			echo '<meta property="og:url" content="'.get_tag_link($tag_id).'" />'."\n";
		}
		else{
			echo '<meta property="og:url" content="'.get_home_url().'" />'."\n";
		}
	}
	if (is_singular()){
		if (has_post_thumbnail()){//投稿にサムネイルがある場合
			$image_id = get_post_thumbnail_id();
			$image = wp_get_attachment_image_src( $image_id, 'icatch768');
			echo '<meta property="og:image" content="'.$image[0].'" />'."\n";
		}
		elseif(get_fit_image_ogp()){//投稿にサムネイルが無く、OGP用画像がある場合
			echo '<meta property="og:image" content="'.get_fit_image_ogp().'" />'."\n";
		}
		else{//何も無い場合
			echo '<meta property="og:image" content="'.get_template_directory_uri().'/img/img_no_768.gif" />'."\n";
		}
	}
	else {
		if(get_fit_image_ogp()){
			echo '<meta property="og:image" content="'.get_fit_image_ogp().'" />'."\n";
		}
		else{
			echo '<meta property="og:image" content="'.get_template_directory_uri().'/img/img_no_768.gif" />'."\n";
		}
	}
	if ( get_option('fit_snsOgp_TwitterCard')) {
		echo '<meta name="twitter:card" content="'.get_option('fit_snsOgp_TwitterCard').'" />'."\n";
	}
	else{
		echo '<meta name="twitter:card" content="summary" />'."\n";
	}
	$opt = get_option('fit_snsFollow');
	if ( $opt['twitterId']) {
		echo '<meta name="twitter:site" content="@'.$opt['twitterId'].'" />'."\n";
	}
	if ( get_option('fit_snsOgp_FBAppId')) {
		echo '<meta property="fb:app_id" content="'.get_option('fit_snsOgp_FBAppId').'" />'."\n";
	}
	if ( get_option('fit_snsOgp_FBAdmins')) {
		echo '<meta property="fb:admins" content="'.get_option('fit_snsOgp_FBAdmins').'" />'."\n";
	}
}
