<?php
////////////////////////////////////////////////////////
//ウィジェット追加
////////////////////////////////////////////////////////
function fit_widgets_init() {
	$frame_side = '';
	$frame_main = '';
	$heading_main = '';
	$heading_side = '';
	$heading_menu = '';
	$heading_foot = '';
	if (get_option('fit_conWidget_frame') && get_option('fit_conWidget_frame') != 'off' ){
		$frame_side = get_option('fit_conWidget_frame');
	}
	if (get_option('fit_conMain_widgetFrame') && get_option('fit_conMain_widgetFrame') != 'off' ){
		$frame_main = get_option('fit_conMain_widgetFrame');
	}

	if (get_option('fit_conMain_heading') && get_option('fit_conMain_heading') != 'off' ){
		$heading_main = get_option('fit_conMain_heading');
	}
	if (get_option('fit_conWidget_heading') && get_option('fit_conWidget_heading') != 'off' ){
		$heading_side = get_option('fit_conWidget_heading');
	}
	if (get_option('fit_conHeader_menuHeading') && get_option('fit_conHeader_menuHeading') != 'off' ){
		$heading_menu = get_option('fit_conHeader_menuHeading');
	}
	if (get_option('fit_conFooter_heading') && get_option('fit_conFooter_heading') != 'off' ){
		$heading_foot = get_option('fit_conFooter_heading');
	}

	register_sidebar( array(
		'name' => 'トップページ上部エリア',
		'description' => 'トップページのメインカラム上部にコンテンツを表示します。',
		'id' => 'home_top',
		'before_widget' => '<aside class="widget widget-main '.$frame_main.' %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="heading heading-widget'.$heading_main.'">',
		'after_title' => '</h2>',
	));

	register_sidebar( array(
		'name' => 'トップページ下部エリア',
		'description' => 'トップページのメインカラム下部にコンテンツを表示します。',
		'id' => 'home_bottom',
		'before_widget' => '<aside class="widget widget-main '.$frame_main.' %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="heading heading-widget'.$heading_main.'">',
		'after_title' => '</h2>',
	));

	register_sidebar( array(
		'name' => '投稿ページ上部エリア',
		'description' => '投稿ページのメインカラム上部にコンテンツを表示します。',
		'id' => 'post_top',
		'before_widget' => '<aside class="widget widget-main '.$frame_main.' %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="heading heading-widget'.$heading_main.'">',
		'after_title' => '</h2>',
	));

	register_sidebar( array(
		'name' => '投稿ページ下部エリア',
		'description' => '投稿ページのメインカラム下部にコンテンツを表示します。',
		'id' => 'post_bottom',
		'before_widget' => '<aside class="widget widget-main '.$frame_main.' %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="heading heading-widget'.$heading_main.'">',
		'after_title' => '</h2>',
	));

	register_sidebar( array(
		'name' => 'メニューパネル',
		'description' => 'ヘッダーのメニューパネル内にコンテンツを表示します。',
		'id' => 'menu_panel',
		'before_widget' => '<aside class="widget widget-menu %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="heading heading-widget'.$heading_menu.'">',
		'after_title' => '</h2>',
	));

	register_sidebar( array(
		'name' => 'サイドバーエリア',
		'description' => 'サイドバーにコンテンツを表示します。',
		'id' => 'sidebar',
		'before_widget' => '<aside class="widget widget-side '.$frame_side.' %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="heading heading-widget'.$heading_side.'">',
		'after_title' => '</h2>',
	));

	register_sidebar( array(
		'name' => '追従サイドバーエリア',
		'description' => '追従するサイドバーにコンテンツを表示します。',
		'id' => 'sidebar-sticky',
		'before_widget' => '<aside class="widget widget-side '.$frame_side.' %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="heading heading-widget'.$heading_side.'">',
		'after_title' => '</h2>',
	));

	register_sidebar( array(
		'name' => 'フッターエリア[左]',
		'description' => 'フッターエリアの左にコンテンツを表示します。',
		'id' => 'footer_left',
		'before_widget' => '<aside class="widget widget-foot %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="heading heading-widget'.$heading_foot.'">',
		'after_title' => '</h2>',
	));

	register_sidebar( array(
		'name' => 'フッターエリア[中央]',
		'description' => 'フッターエリアの中央にコンテンツを表示します。',
		'id' => 'footer_center',
		'before_widget' => '<aside class="widget widget-foot %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="heading heading-widget'.$heading_foot.'">',
		'after_title' => '</h2>',
	));

	register_sidebar( array(
		'name' => 'フッターエリア[右]',
		'description' => 'フッターエリアの右にコンテンツを表示します。',
		'id' => 'footer_right',
		'before_widget' => '<aside class="widget widget-foot %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="heading heading-widget'.$heading_foot.'">',
		'after_title' => '</h2>',
	));

}
add_action( 'widgets_init', 'fit_widgets_init' );
