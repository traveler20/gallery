<?php
////////////////////////////////////////////////////////
//wp_headにオリジナル項目追加
////////////////////////////////////////////////////////

if(!function_exists('fit_head'))  {
	function fit_head() {

		//AMPページへのリンク
		if (is_single() && get_option('fit_ampFunction_switch') == 'on' && get_post_meta(get_the_ID(), 'amp_hide', true) != '1') {
			if (get_option( 'permalink_structure' ) == ''){
				echo '<link rel="amphtml" href="'.get_the_permalink().'&type=AMP">'."\n";
			}else{
				echo '<link rel="amphtml" href="'.get_the_permalink().'?type=AMP">'."\n";
			}

		}

		//スライダー用CSS
		if(get_option('fit_homeMainimg_switch') == 'on' && get_option('fit_homeMainimg_mode ') == 'slider' && is_front_page() || get_option('fit_homeCarousel_switch') == 'on' && is_front_page()){
			if ( get_option('fit_seoCss_swiper')) {
				echo '<link class="css-async" rel href="'.get_template_directory_uri().'/css/swiper.min.css">'."\n";
			}else{
				echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/css/swiper.min.css">'."\n";
			}
		}

		//背景動画用CSS
		if(!is_mobile() && get_option('fit_homeMainimg_switch') == 'on' && get_option('fit_homeMainimg_mode ') == 'movie' && is_front_page()){
			if ( get_option('fit_seoCss_YTPlayer')) {
				echo '<link class="css-async" rel href="'.get_template_directory_uri().'/css/jquery.mb.YTPlayer.min.css">'."\n";
			}else{
				echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/css/jquery.mb.YTPlayer.min.css">'."\n";
			}
		}

		//アイコンフォント用CSS
		if ( get_option('fit_seoCss_icon')) {
			echo '<link class="css-async" rel href="'.get_template_directory_uri().'/css/icon.min.css">'."\n";
		}else{
			echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/css/icon.min.css">'."\n";
		}

		//Googleフォント用CSS
		if ( get_option('fit_seoCss_lato')) {
			echo '<link class="css-async" rel href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900">'."\n";
		}else{
			echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900">'."\n";
		}

		//Googleフォント用CSS
		if ( get_option('fit_seoCss_fjalla')) {
			echo '<link class="css-async" rel href="https://fonts.googleapis.com/css?family=Fjalla+One">'."\n";
		}else{
			echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fjalla+One">'."\n";
		}

		//Googleフォント用CSS
		if ( get_option('fit_seoCss_noto')) {
			echo '<link class="css-async" rel href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,200,300,400,500,600,700,800,900">'."\n";
		}else{
			echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,200,300,400,500,600,700,800,900">'."\n";
		}

		//テーマ用CSS
		if ( get_option('fit_seoCss_main')) {
			echo '<link class="css-async" rel href="'.get_template_directory_uri().'/style.min.css">'."\n";
		}else{
			echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/style.min.css">'."\n";
		}

		//子テーマ用CSS
		if (is_child_theme() && get_option('fit_seoCss_child')) {
			echo '<link class="css-async" rel href="'.get_stylesheet_directory_uri() . '/style-user.css?' . filemtime( get_stylesheet_directory() . '/style-user.css').'">'."\n";
		}elseif(is_child_theme() && !get_option('fit_seoCss_child')){
			echo '<link rel="stylesheet" href="'.get_stylesheet_directory_uri() . '/style-user.css?' . filemtime( get_stylesheet_directory() . '/style-user.css').'">'."\n";
		}

		//PWAマニフェスト用json
		if (get_option('fit_pwaFunction_switch') == 'on') {
			echo '<link rel="manifest" href="'.get_template_directory_uri().'/js/manifest.json">'."\n";
		}


		if(is_singular()) {
			//1ページを複数に分けた分割ページでのタグ出力
			global $wp_query;
			$multipage = check_split_page();
			if($multipage[0] > 1) {
				$prev = fit_split_page_url('prev');
				$next = fit_split_page_url('next');
				if($prev) {
					echo '<link rel="prev" href="'.$prev.'" />'."\n";
				}
				if($next) {
					echo '<link rel="next" href="'.$next.'" />'."\n";
				}
			}else{
				//通常の固定・投稿ページではcanonicalタグを出力
				echo '<link rel="canonical" href="'.get_the_permalink().'" />'."\n";
			}

		} else{
			//トップページやカテゴリページなどのページネーションでのタグ出力
			global $paged;
			if ( get_previous_posts_link() ){
				echo '<link rel="prev" href="'.get_pagenum_link( $paged - 1 ).'" />'."\n";
			}
			if ( get_next_posts_link() ){
				echo '<link rel="next" href="'.get_pagenum_link( $paged + 1 ).'" />'."\n";
			}
		}

		//jQuery本体(WP同封ではなく、CDNを利用)
		echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>'."\n";
		echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">'."\n";
		echo '<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>'."\n";

		//Search Consoleの認証ID
		if (is_front_page() && !is_paged() && get_option('fit_bsAccess_gscid') ) {
			echo '<meta name="google-site-verification" content="'.get_option('fit_bsAccess_gscid').'" />'."\n";
		}

		//AnalyticsのトラッキングID
		if( get_option('fit_bsAccess_gaid')){
			require_once locate_template('inc/_analyticstracking.php');
		}

		echo '<style>'."\n";

		//テーマのカラー
		if ( get_theme_mod('fit_bsStyle_themeColor') ){
			$color  = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
			$colorcode = preg_replace("/#/", "", $color);
			$red = hexdec(substr($colorcode, 0, 2));
			$green = hexdec(substr($colorcode, 2, 2));
			$blue = hexdec(substr($colorcode, 4, 2));
			echo '.widget.widget_nav_menu ul.menu{border-color: rgba('.$red.','.$green.','.$blue.',0.15);}';
			echo '.widget.widget_nav_menu ul.menu li{border-color: rgba('.$red.','.$green.','.$blue.',0.75);}';
			echo '.widget.widget_nav_menu ul.menu .sub-menu li{border-color: rgba('.$red.','.$green.','.$blue.',0.15);}';
			echo '.widget.widget_nav_menu ul.menu .sub-menu li .sub-menu li:first-child{border-color: rgba('.$red.','.$green.','.$blue.',0.15);}';
			echo '.widget.widget_nav_menu ul.menu li a:hover{background-color: rgba('.$red.','.$green.','.$blue.',0.75);}';
			echo '.widget.widget_nav_menu ul.menu .current-menu-item > a{background-color: rgba('.$red.','.$green.','.$blue.',0.75);}';
			echo '.widget.widget_nav_menu ul.menu li .sub-menu li a:before {color:'.$color.';}';
			echo '.widget.widget_nav_menu ul.menu li a{background-color:'.$color.';}';
			echo '.widget.widget_nav_menu ul.menu .sub-menu a:hover{color:'.$color.';}';
			echo '.widget.widget_nav_menu ul.menu .sub-menu .current-menu-item a{color:'.$color.';}';

			echo '.widget.widget_categories ul{border-color: rgba('.$red.','.$green.','.$blue.',0.15);}';
			echo '.widget.widget_categories ul li{border-color: rgba('.$red.','.$green.','.$blue.',0.75);}';
			echo '.widget.widget_categories ul .children li{border-color: rgba('.$red.','.$green.','.$blue.',0.15);}';
			echo '.widget.widget_categories ul .children li .children li:first-child{border-color: rgba('.$red.','.$green.','.$blue.',0.15);}';
			echo '.widget.widget_categories ul li a:hover{background-color: rgba('.$red.','.$green.','.$blue.',0.75);}';
			echo '.widget.widget_categories ul .current-menu-item > a{background-color: rgba('.$red.','.$green.','.$blue.',0.75);}';
			echo '.widget.widget_categories ul li .children li a:before {color:'.$color.';}';
			echo '.widget.widget_categories ul li a{background-color:'.$color.';}';
			echo '.widget.widget_categories ul .children a:hover{color:'.$color.';}';
			echo '.widget.widget_categories ul .children .current-menu-item a{color:'.$color.';}';

			echo '.widgetSearch__input:hover{border-color:'.$color.';}';
			echo '.widgetCatTitle{background-color:'.$color.';}';
			echo '.widgetCatTitle__inner{background-color:'.$color.';}';
			echo '.widgetSearch__submit:hover{background-color:'.$color.';}';
			echo '.widgetProfile__sns{background-color:'.$color.';}';
			echo '.widget.widget_calendar .calendar_wrap tbody a:hover{background-color:'.$color.';}';
			echo '.widget ul li a:hover{color:'.$color.';}';
			echo '.widget.widget_rss .rsswidget:hover{color:'.$color.';}';
			echo '.widget.widget_tag_cloud a:hover{background-color:'.$color.';}';
			echo '.widget select:hover{border-color:'.$color.';}';
			echo '.widgetSearch__checkLabel:hover:after{border-color:'.$color.';}';
			echo '.widgetSearch__check:checked .widgetSearch__checkLabel:before, .widgetSearch__check:checked + .widgetSearch__checkLabel:before{border-color:'.$color.';}';
			echo '.widgetTab__item.current{border-top-color:'.$color.';}';
			echo '.widgetTab__item:hover{border-top-color:'.$color.';}';

			echo '.searchHead__title{background-color:'.$color.';}';
			echo '.searchHead__submit:hover{color:'.$color.';}';
			echo '.menuBtn__close:hover{color:'.$color.';}';
			echo '.menuBtn__link:hover{color:'.$color.';}';
			echo '@media only screen and (min-width: 992px){.menuBtn__link {background-color:'.$color.';}}';
			echo '.t-headerCenter .menuBtn__link:hover{color:'.$color.';}';
			echo '.searchBtn__close:hover{color:'.$color.';}';
			echo '.searchBtn__link:hover{color:'.$color.';}';
			echo '.breadcrumb__item a:hover{color:'.$color.';}';
			echo '.pager__item{color:'.$color.';}';
			echo '.pager__item:hover, .pager__item-current{background-color:'.$color.'; color:#fff;}';
			echo '.page-numbers{color:'.$color.';}';
			echo '.page-numbers:hover, .page-numbers.current{background-color:'.$color.'; color:#fff;}';
			echo '.pagePager__item{color:'.$color.';}';
			echo '.pagePager__item:hover, .pagePager__item-current{background-color:'.$color.'; color:#fff;}';
			echo '.heading a:hover{color:'.$color.';}';
			echo '.eyecatch__cat{background-color:'.$color.';}';
			echo '.the__category{background-color:'.$color.';}';
			echo '.dateList__item a:hover{color:'.$color.';}';
			echo '.controllerFooter__item:last-child{background-color:'.$color.';}';
			echo '.controllerFooter__close{background-color:'.$color.';}';
			echo '.bottomFooter__topBtn{background-color:'.$color.';}';
			echo '.mask-color{background-color:'.$color.';}';
			echo '.mask-colorgray{background-color:'.$color.';}';


			echo '.pickup3__item{background-color:'.$color.';}';
			echo '.categoryBox__title{color:'.$color.';}';
			echo '.comments__list .comment-meta{background-color:'.$color.';}';
			echo '.comment-respond .submit{background-color:'.$color.';}';
			echo '.prevNext__pop{background-color:'.$color.';}';
			echo '.swiper-pagination-bullet-active{background-color:'.$color.';}';
			echo '.swiper-slider .swiper-button-next, .swiper-slider .swiper-container-rtl .swiper-button-prev, .swiper-slider .swiper-button-prev, .swiper-slider .swiper-container-rtl .swiper-button-next	{background-color:'.$color.';}';
		}

		//背景のカラー＆背景画像
		if ( get_theme_mod('fit_bsStyle_bgColor') || get_fit_bgimg()) {
			$color  = '';
			$bgImg  = '';
			if ( get_theme_mod('fit_bsStyle_bgColor')) {
				$color  = esc_attr( get_theme_mod( 'fit_bsStyle_bgColor' ));
			}
			if ( get_fit_bgimg()) {
				$bgImg  = ' url('.get_fit_bgimg().') repeat center center';
			}
			echo 'body{background:'.$color.$bgImg.';}';
		}

		//ヘッダー検索窓のカラー
		if ( get_theme_mod('fit_conHeadBottom_colorSearch') && get_option('fit_conHeadBottom_switchSearch') == 'on' ) {
			$color = esc_attr( get_theme_mod( 'fit_conHeadBottom_colorSearch' ));
			echo '.searchHead{background-color:'.$color.';}';
		}

		//お知らせヘッダーのカラー
		if ( get_theme_mod('fit_conHeadBottom_color') && get_option('fit_conHeadBottom_switch') == 'on' ) {
			$color = esc_attr( get_theme_mod( 'fit_conHeadBottom_color' ));
			echo '.infoHead{background-color:'.$color.';}';
		}

		//ヘッダーのカラー(文字黒)
		if ( get_theme_mod('fit_conHeader_color') && get_option('fit_conHeader_text') != 'white') {
			$color = esc_attr( get_theme_mod( 'fit_conHeader_color' ));
			echo '.l-header{background-color:'.$color.';}';
			echo '.globalNavi::before{background: -webkit-gradient(linear,left top,right top,color-stop(0%,rgba(255,255,255,0)),color-stop(100%,'.$color.'));}';
		}
		//ヘッダーのカラー(文字白)
		if ( get_theme_mod('fit_conHeader_color') && get_option('fit_conHeader_text') == 'white') {
			$color = esc_attr( get_theme_mod( 'fit_conHeader_color' ));
			echo '.t-headerColor .l-header{background-color:'.$color.';}';
			echo '.t-headerColor .globalNavi::before{background: -webkit-gradient(linear,left top,right top,color-stop(0%,rgba(255,255,255,0)),color-stop(100%,'.$color.'));}';
			echo '.t-headerColor .subNavi__link-pickup:hover{color:'.$color.';}';
		}elseif ( get_theme_mod( 'fit_bsStyle_themeColor' ) && !get_theme_mod('fit_conHeader_color') && get_option('fit_conHeader_text') == 'white' ) {
			$color = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
			echo '.t-headerColor .l-header{background-color:'.$color.';}';
			echo '.t-headerColor .globalNavi::before{background: -webkit-gradient(linear,left top,right top,color-stop(0%,rgba(255,255,255,0)),color-stop(100%,'.$color.'));}';
			echo '.t-headerColor .subNavi__link-pickup:hover{color:'.$color.';}';
		}

		//フッターソーシャルリンクのカラー
		if ( get_theme_mod('fit_conFooter_snsBg') ){
			$color = esc_attr( get_theme_mod( 'fit_conFooter_snsBg' ));
			echo '.snsFooter{background-color:'.$color.'}';
		}elseif ( get_theme_mod('fit_bsStyle_themeColor') ){
			$color = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
			echo '.snsFooter{background-color:'.$color.'}';
		}

		//ウィジェット内見出し(メインエリア)のカラー
		if ( get_theme_mod('fit_conMain_color') ){
			$color = esc_attr( get_theme_mod( 'fit_conMain_color' ));
			echo '.widget-main .heading.heading-widget{background-color:'.$color.'}';
			echo '.widget-main .heading.heading-widgetsimple{background-color:'.$color.'}';
			echo '.widget-main .heading.heading-widgetsimplewide{background-color:'.$color.'}';
			echo '.widget-main .heading.heading-widgetwide{background-color:'.$color.'}';
			echo '.widget-main .heading.heading-widgetbottom:before{border-color:'.$color.'}';
			echo '.widget-main .heading.heading-widgetborder{border-color:'.$color.'}';
			echo '.widget-main .heading.heading-widgetborder::before,.widget-main .heading.heading-widgetborder::after{background-color:'.$color.'}';
		}elseif ( get_theme_mod('fit_bsStyle_themeColor') ){
			$color = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
			echo '.widget-main .heading.heading-widget{background-color:'.$color.'}';
			echo '.widget-main .heading.heading-widgetsimple{background-color:'.$color.'}';
			echo '.widget-main .heading.heading-widgetsimplewide{background-color:'.$color.'}';
			echo '.widget-main .heading.heading-widgetwide{background-color:'.$color.'}';
			echo '.widget-main .heading.heading-widgetbottom:before{border-color:'.$color.'}';
			echo '.widget-main .heading.heading-widgetborder{border-color:'.$color.'}';
			echo '.widget-main .heading.heading-widgetborder::before,.widget-main .heading.heading-widgetborder::after{background-color:'.$color.'}';
		}
		//ウィジェット内見出し(サイドエリア)のカラー
		if ( get_theme_mod('fit_conWidget_color') ){
			$color = esc_attr( get_theme_mod( 'fit_conWidget_color' ));
			echo '.widget-side .heading.heading-widget{background-color:'.$color.'}';
			echo '.widget-side .heading.heading-widgetsimple{background-color:'.$color.'}';
			echo '.widget-side .heading.heading-widgetsimplewide{background-color:'.$color.'}';
			echo '.widget-side .heading.heading-widgetwide{background-color:'.$color.'}';
			echo '.widget-side .heading.heading-widgetbottom:before{border-color:'.$color.'}';
			echo '.widget-side .heading.heading-widgetborder{border-color:'.$color.'}';
			echo '.widget-side .heading.heading-widgetborder::before,.widget-side .heading.heading-widgetborder::after{background-color:'.$color.'}';
		}elseif ( get_theme_mod('fit_bsStyle_themeColor') ){
			$color = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
			echo '.widget-side .heading.heading-widget{background-color:'.$color.'}';
			echo '.widget-side .heading.heading-widgetsimple{background-color:'.$color.'}';
			echo '.widget-side .heading.heading-widgetsimplewide{background-color:'.$color.'}';
			echo '.widget-side .heading.heading-widgetwide{background-color:'.$color.'}';
			echo '.widget-side .heading.heading-widgetbottom:before{border-color:'.$color.'}';
			echo '.widget-side .heading.heading-widgetborder{border-color:'.$color.'}';
			echo '.widget-side .heading.heading-widgetborder::before,.widget-side .heading.heading-widgetborder::after{background-color:'.$color.'}';
		}
		//ウィジェット内見出し(フッターエリア)のカラー
		if ( get_theme_mod('fit_conFooter_color') ){
			$color = esc_attr( get_theme_mod( 'fit_conFooter_color' ));
			echo '.widget-foot .heading.heading-widget{background-color:'.$color.'}';
			echo '.widget-foot .heading.heading-widgetsimple{background-color:'.$color.'}';
			echo '.widget-foot .heading.heading-widgetsimplewide{background-color:'.$color.'}';
			echo '.widget-foot .heading.heading-widgetwide{background-color:'.$color.'}';
			echo '.widget-foot .heading.heading-widgetbottom:before{border-color:'.$color.'}';
			echo '.widget-foot .heading.heading-widgetborder{border-color:'.$color.'}';
			echo '.widget-foot .heading.heading-widgetborder::before,.widget-foot .heading.heading-widgetborder::after{background-color:'.$color.'}';
		}elseif ( get_theme_mod('fit_bsStyle_themeColor') ){
			$color = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
			echo '.widget-foot .heading.heading-widget{background-color:'.$color.'}';
			echo '.widget-foot .heading.heading-widgetsimple{background-color:'.$color.'}';
			echo '.widget-foot .heading.heading-widgetsimplewide{background-color:'.$color.'}';
			echo '.widget-foot .heading.heading-widgetwide{background-color:'.$color.'}';
			echo '.widget-foot .heading.heading-widgetbottom:before{border-color:'.$color.'}';
			echo '.widget-foot .heading.heading-widgetborder{border-color:'.$color.'}';
			echo '.widget-foot .heading.heading-widgetborder::before,.widget-foot .heading.heading-widgetborder::after{background-color:'.$color.'}';
		}
		//ウィジェット内見出し(メニューパネル内)のカラー
		if ( get_theme_mod('fit_conHeader_menuColor') ){
			$color = esc_attr( get_theme_mod( 'fit_conHeader_menuColor' ));
			echo '.widget-menu .heading.heading-widget{background-color:'.$color.'}';
			echo '.widget-menu .heading.heading-widgetsimple{background-color:'.$color.'}';
			echo '.widget-menu .heading.heading-widgetsimplewide{background-color:'.$color.'}';
			echo '.widget-menu .heading.heading-widgetwide{background-color:'.$color.'}';
			echo '.widget-menu .heading.heading-widgetbottom:before{border-color:'.$color.'}';
			echo '.widget-menu .heading.heading-widgetborder{border-color:'.$color.'}';
			echo '.widget-menu .heading.heading-widgetborder::before,.widget-menu .heading.heading-widgetborder::after{background-color:'.$color.'}';
		}elseif ( get_theme_mod('fit_bsStyle_themeColor') ){
			$color = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
			echo '.widget-menu .heading.heading-widget{background-color:'.$color.'}';
			echo '.widget-menu .heading.heading-widgetsimple{background-color:'.$color.'}';
			echo '.widget-menu .heading.heading-widgetsimplewide{background-color:'.$color.'}';
			echo '.widget-menu .heading.heading-widgetwide{background-color:'.$color.'}';
			echo '.widget-menu .heading.heading-widgetbottom:before{border-color:'.$color.'}';
			echo '.widget-menu .heading.heading-widgetborder{border-color:'.$color.'}';
			echo '.widget-menu .heading.heading-widgetborder::before,.widget-menu .heading.heading-widgetborder::after{background-color:'.$color.'}';
		}


		//キービジュアルスマホの画面高さ
		if ( get_option('fit_homeMainimg_heightSp') ){
			$size = get_option( 'fit_homeMainimg_heightSp');
			if(get_option('fit_homeMainimg_mode') != 'slider'){echo '.still{height: '.$size.'px;}';}
			if(get_option('fit_homeMainimg_mode') == 'slider'){echo '.swiper-slider{height: '.$size.'px;}';}
		}
		//キービジュアルPCの画面高さ
		if ( get_option('fit_homeMainimg_heightPc') ){
			$size = get_option( 'fit_homeMainimg_heightPc');
			if(get_option('fit_homeMainimg_mode') != 'slider'){echo '@media only screen and (min-width: 768px){.still {height: '.$size.'px;}}';}
			if(get_option('fit_homeMainimg_mode') == 'slider'){echo '@media only screen and (min-width: 768px){.swiper-slider {height: '.$size.'px;}}';}
		}


		//キービジュアル静止画像マスクのカラー
		if ( get_theme_mod('fit_homeMainimg_stillColor') ){
			$color = esc_attr( get_theme_mod( 'fit_homeMainimg_stillColor' ));
			if ( get_option('fit_homeMainimg_stillMask') == 'color' ){
				echo '.still__bg.mask.mask-color{background-color:'.$color.'}';
			}
			if ( get_option('fit_homeMainimg_stillMask') == 'colorgray' ){
				echo '.still__bg.mask.mask-colorgray{background-color:'.$color.'}';
			}
		}elseif ( get_theme_mod('fit_bsStyle_themeColor') ){
			$color = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
			if ( get_option('fit_homeMainimg_stillMask') == 'color' ){
				echo '.still__bg.mask.mask-color{background-color:'.$color.'}';
			}
			if ( get_option('fit_homeMainimg_stillMask') == 'colorgray' ){
				echo '.still__bg.mask.mask-colorgray{background-color:'.$color.'}';
			}
		}

		//キービジュアル背景動画の背景静止画像
		if( get_fit_movieimg()){
			$date = get_fit_movieimg();
			$image_id = attachment_url_to_postid($date);
			$imagePc = wp_get_attachment_image_src( $image_id, 'full' );
			$imageSp = wp_get_attachment_image_src( $image_id, 'icatch768' );
			echo '.still.still-movie .still__box{background-image:url('.$imageSp[0].');}';
			echo '@media only screen and (min-width: 768px){.still.still-movie .still__box{background-image:url('.$imagePc[0].');}}';
		}


		//キービジュアル静止画像マスクのカラー
		if ( get_theme_mod('fit_homeMainimg_movieColor') ){
			$color = esc_attr( get_theme_mod( 'fit_homeMainimg_movieColor' ));
			if ( get_option('fit_homeMainimg_movieMask') == 'color' ){
				echo '.still.still-movie .still__box.mask.mask.mask-color{background-color:'.$color.'}';
			}
			if ( get_option('fit_homeMainimg_movieMask') == 'colorgray' ){
				echo '.still.still-movie .still__box.mask.mask-colorgray{background-color:'.$color.'}';
			}
		}elseif ( get_theme_mod('fit_bsStyle_themeColor') ){
			$color = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
			if ( get_option('fit_homeMainimg_movieMask') == 'color' ){
				echo '.still.still-movie .still__box.mask.mask-color{background-color:'.$color.'}';
			}
			if ( get_option('fit_homeMainimg_movieMask') == 'colorgray' ){
				echo '.still.still-movie .still__box.mask.mask-colorgray{background-color:'.$color.'}';
			}
		}

		//スライダー1のカラー
		if ( get_theme_mod('fit_homeMainimg_slide1Color') ){
			$color = esc_attr( get_theme_mod( 'fit_homeMainimg_slide1Color' ));
			if ( get_option('fit_homeMainimg_slide1Mask') == 'color' ){
				echo '.swiper-slide1.mask.mask-color{background-color:'.$color.'}';
			}
			if ( get_option('fit_homeMainimg_slide1Mask') == 'colorgray' ){
				echo '.swiper-slide1.mask.mask-colorgray{background-color:'.$color.'}';
			}
		}elseif ( get_theme_mod('fit_bsStyle_themeColor') ){
			$color = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
			if ( get_option('fit_homeMainimg_slide1Mask') == 'color' ){
				echo '.swiper-slide1.mask.mask-color{background-color:'.$color.'}';
			}
			if ( get_option('fit_homeMainimg_slide1Mask') == 'colorgray' ){
				echo '.swiper-slide1.mask.mask-colorgray{background-color:'.$color.'}';
			}
		}
		//スライダー2のカラー
		if ( get_theme_mod('fit_homeMainimg_slide2Color') ){
			$color = esc_attr( get_theme_mod( 'fit_homeMainimg_slide2Color' ));
			if ( get_option('fit_homeMainimg_slide2Mask') == 'color' ){
				echo '.swiper-slide2.mask.mask-color{background-color:'.$color.'}';
			}
			if ( get_option('fit_homeMainimg_slide2Mask') == 'colorgray' ){
				echo '.swiper-slide2.mask.mask-colorgray{background-color:'.$color.'}';
			}
		}elseif ( get_theme_mod('fit_bsStyle_themeColor') ){
			$color = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
			if ( get_option('fit_homeMainimg_slide2Mask') == 'color' ){
				echo '.swiper-slide2.mask.mask-color{background-color:'.$color.'}';
			}
			if ( get_option('fit_homeMainimg_slide2Mask') == 'colorgray' ){
				echo '.swiper-slide2.mask.mask-colorgray{background-color:'.$color.'}';
			}
		}
		//スライダー3のカラー
		if ( get_theme_mod('fit_homeMainimg_slide3Color') ){
			$color = esc_attr( get_theme_mod( 'fit_homeMainimg_slide3Color' ));
			if ( get_option('fit_homeMainimg_slide3Mask') == 'color' ){
				echo '.swiper-slide3.mask.mask-color{background-color:'.$color.'}';
			}
			if ( get_option('fit_homeMainimg_slide3Mask') == 'colorgray' ){
				echo '.swiper-slide3.mask.mask-colorgray{background-color:'.$color.'}';
			}
		}elseif ( get_theme_mod('fit_bsStyle_themeColor') ){
			$color = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
			if ( get_option('fit_homeMainimg_slide3Mask') == 'color' ){
				echo '.swiper-slide3.mask.mask-color{background-color:'.$color.'}';
			}
			if ( get_option('fit_homeMainimg_slide3Mask') == 'colorgray' ){
				echo '.swiper-slide3.mask.mask-colorgray{background-color:'.$color.'}';
			}
		}
		//スライダー4のカラー
		if ( get_theme_mod('fit_homeMainimg_slide4Color') ){
			$color = esc_attr( get_theme_mod( 'fit_homeMainimg_slide4Color' ));
			if ( get_option('fit_homeMainimg_slide4Mask') == 'color' ){
				echo '.swiper-slide4.mask.mask-color{background-color:'.$color.'}';
			}
			if ( get_option('fit_homeMainimg_slide4Mask') == 'colorgray' ){
				echo '.swiper-slide4.mask.mask-colorgray{background-color:'.$color.'}';
			}
		}elseif ( get_theme_mod('fit_bsStyle_themeColor') ){
			$color = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
			if ( get_option('fit_homeMainimg_slide4Mask') == 'color' ){
				echo '.swiper-slide4.mask.mask-color{background-color:'.$color.'}';
			}
			if ( get_option('fit_homeMainimg_slide4Mask') == 'colorgray' ){
				echo '.swiper-slide4.mask.mask-colorgray{background-color:'.$color.'}';
			}
		}
		//スライダー5のカラー
		if ( get_theme_mod('fit_homeMainimg_slide5Color') ){
			$color = esc_attr( get_theme_mod( 'fit_homeMainimg_slide5Color' ));
			if ( get_option('fit_homeMainimg_slide5Mask') == 'color' ){
				echo '.swiper-slide5.mask.mask-color{background-color:'.$color.'}';
			}
			if ( get_option('fit_homeMainimg_slide5Mask') == 'colorgray' ){
				echo '.swiper-slide5.mask.mask-colorgray{background-color:'.$color.'}';
			}
		}elseif ( get_theme_mod('fit_bsStyle_themeColor') ){
			$color = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
			if ( get_option('fit_homeMainimg_slide5Mask') == 'color' ){
				echo '.swiper-slide5.mask.mask-color{background-color:'.$color.'}';
			}
			if ( get_option('fit_homeMainimg_slide5Mask') == 'colorgray' ){
				echo '.swiper-slide5.mask.mask-colorgray{background-color:'.$color.'}';
			}
		}

		//キービジュアル下エリアのカラー
		if ( get_theme_mod('fit_homePickup_color') ){
			$color = esc_attr( get_theme_mod( 'fit_homePickup_color' ));
			if ( get_option('fit_homePickup_switch') == 'on' ){
				echo '.pickupHead{background-color:'.$color.'}';
			}
		}elseif ( get_theme_mod('fit_bsStyle_themeColor') ){
			$color = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
			if ( get_option('fit_homePickup_switch') == 'on' ){
				echo '.pickupHead{background-color:'.$color.'}';
			}
		}

		//PICKUP3マスクのカラー
		if ( get_theme_mod('fit_homePickup3_color') ){
			$color = esc_attr( get_theme_mod( 'fit_homePickup3_color' ));
			if ( get_option('fit_homePickup3_mask') == 'color' ){
				echo '.pickup3__bg.mask.mask-color{background-color:'.$color.'}';
			}
			if ( get_option('fit_homePickup3_mask') == 'colorgray' ){
				echo '.pickup3__bg.mask.mask-colorgray{background-color:'.$color.'}';
			}
		}elseif ( get_theme_mod('fit_bsStyle_themeColor') ){
			$color = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
			if ( get_option('fit_homePickup3_mask') == 'color' ){
				echo '.pickup3__bg.mask.mask-color{background-color:'.$color.'}';
			}
			if ( get_option('fit_homePickup3_mask') == 'colorgray' ){
				echo '.pickup3__bg.mask.mask-colorgray{background-color:'.$color.'}';
			}
		}

		//TOPランキングボックス背景のカラー
		if ( get_theme_mod('fit_homeRank_color') ){
			$color = esc_attr( get_theme_mod( 'fit_homeRank_color' ));
			echo '.rankingBox__bg{background-color:'.$color.'}';
		}elseif ( get_theme_mod('fit_bsStyle_themeColor') ){
			$color = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
			echo '.rankingBox__bg{background-color:'.$color.'}';
		}

		//フッター共通CTRマスクのカラー
		if ( get_theme_mod('fit_conFootCta_color') ){
			$color = esc_attr( get_theme_mod( 'fit_conFootCta_color' ));
			if ( get_option('fit_conFootCta_mask') == 'color' ){
				echo '.commonCtr__bg.mask.mask-color{background-color:'.$color.'}';
			}
			if ( get_option('fit_conFootCta_mask') == 'colorgray' ){
				echo '.commonCtr__bg.mask.mask-colorgray{background-color:'.$color.'}';
			}
		}elseif ( get_theme_mod('fit_bsStyle_themeColor') ){
			$color = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
			if ( get_option('fit_conFootCta_mask') == 'color' ){
				echo '.commonCtr__bg.mask.mask-color{background-color:'.$color.'}';
			}
			if ( get_option('fit_conFootCta_mask') == 'colorgray' ){
				echo '.commonCtr__bg.mask.mask-colorgray{background-color:'.$color.'}';
			}
		}

		//アイキャッチリボンのカラー
		if ( get_theme_mod('fit_archiveList_ribbonColor') ){
			$color = esc_attr( get_theme_mod( 'fit_archiveList_ribbonColor' ));
			echo '.the__ribbon{background-color:'.$color.'}';
			echo '.the__ribbon:after{border-left-color:'.$color.'; border-right-color:'.$color.'}';
		}elseif ( get_theme_mod('fit_bsStyle_themeColor') ){
			$color = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
			echo '.the__ribbon{background-color:'.$color.'}';
			echo '.the__ribbon:after{border-left-color:'.$color.'; border-right-color:'.$color.'}';
		}

		//アイキャッチマスクのカラー
		if ( get_theme_mod('fit_bsEyecatch_maskColor') ){//アイキャッチマスクのカラーコードを16進数からRGBへ変換
			$color = esc_attr( get_theme_mod( 'fit_bsEyecatch_maskColor' ));
			$colorcode = preg_replace("/#/", "", $color);
			$red = hexdec(substr($colorcode, 0, 2));
			$green = hexdec(substr($colorcode, 2, 2));
			$blue = hexdec(substr($colorcode, 4, 2));
			echo '.eyecatch__link.eyecatch__link-mask:hover::after {background-color: rgba('.$red.','.$green.','.$blue.',0.5);}';
			echo '.eyecatch__link.eyecatch__link-maskzoom:hover::after {background-color: rgba('.$red.','.$green.','.$blue.',0.5);}';
			echo '.eyecatch__link.eyecatch__link-maskzoomrotate:hover::after {background-color: rgba('.$red.','.$green.','.$blue.',0.5);}';
		}

		//アイキャッチマスクのテキスト
		if ( get_option('fit_bsEyecatch_maskText') ){
			$text = get_option( 'fit_bsEyecatch_maskText');
			echo '.eyecatch__link.eyecatch__link-mask:hover::after{content: "'.$text.'";}';
			echo '.eyecatch__link.eyecatch__link-maskzoom:hover::after{content: "'.$text.'";}';
			echo '.eyecatch__link.eyecatch__link-maskzoomrotate:hover::after{content: "'.$text.'";}';
		}


		//吹き出しの画像サイズ
		if ( get_option('fit_partsList_balloonSize') == "big" ){
			echo '.content .balloon .balloon__img{width: 90px; height: 90px;}';
			echo '.content .balloon .balloon__img-left div {width: 90px;height: 90px;}';
			echo '.content .balloon .balloon__img-right div{width: 90px;height: 90px;}';
			echo '.content .balloon .balloon__text {max-width: calc(100% - 105px);}';
			echo '@media only screen and (min-width: 768px){';
				echo '.content .balloon .balloon__img{width: 120px; height: 120px;}';
				echo '.content .balloon .balloon__img-left div {width: 120px;height: 120px;}';
				echo '.content .balloon .balloon__img-right div{width: 120px;height: 120px;}';
				echo '.content .balloon .balloon__text {max-width: calc(100% - 280px);}';
			echo '}';
		}

		//吹き出しの画像(左)
		if ( get_theme_mod('fit_partsList_balloonImgLeft') ){
			$img = get_theme_mod( 'fit_partsList_balloonImgLeft');
			echo '.content .balloon .balloon__img-left div {background-image:url("'.$img.'");}';
		}
		//吹き出しの画像(右)
		if ( get_theme_mod('fit_partsList_balloonImgRight') ){
			$img = get_theme_mod( 'fit_partsList_balloonImgRight');
			echo '.content .balloon .balloon__img-right div {background-image:url("'.$img.'");}';
		}



		//カテゴリー系のカラー
		$categories = get_categories();//カテゴリカラーの出力
	    foreach($categories as $term){
			$term_id = $term->cat_ID; //タームID
			$taxonomy = $term->taxonomy; //タームIDに所属しているタクソノミー名
			$term_meta = get_option( $taxonomy . '_' . $term_id );//DBから情報を取得
			if($term_meta['color']){
				echo '.cc-ft'.$term_id.'{color:'.$term_meta['color'].';}';
				echo '.cc-hv'.$term_id.':hover{color:'.$term_meta['color'].';}';
				echo '.cc-bg'.$term_id.'{background-color:'.$term_meta['color'].';}';
				echo '.cc-br'.$term_id.'{border-color:'.$term_meta['color'].';}';
			}
		}


		//記事下CTA(投稿ページ)エリアのカラー
		if ( get_theme_mod('fit_postCta_color') ){
			$color = esc_attr( get_theme_mod( 'fit_postCta_color' ));
			if(get_option('fit_postCta_style') == 'u-border' ){
				echo '.postCta.u-border{border-color:'.$color.'}';
			}elseif(get_option('fit_postCta_style') == 'postcta-bg' ){
				echo '.postcta-bg{background-color:'.$color.'}';
			}
		}elseif ( get_theme_mod('fit_bsStyle_themeColor') ){
			$color = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
			if(get_option('fit_postCta_style') == 'u-border' ){
				echo '.postCta.u-border{border-color:'.$color.'}';
			}elseif(get_option('fit_postCta_style') == 'postcta-bg' ){
				echo '.postcta-bg{background-color:'.$color.'}';
			}
		}

		//記事下CTA(固定ページ)エリアのカラー
		if ( get_theme_mod('fit_pageCta_color') ){
			$color = esc_attr( get_theme_mod( 'fit_pageCta_color' ));
			if(get_option('fit_pageCta_style') == 'u-border' ){
				echo '.pageCta.u-border{border-color:'.$color.'}';
			}elseif(get_option('fit_pageCta_style') == 'pagecta-bg' ){
				echo '.pagecta-bg{background-color:'.$color.'}';
			}
		}elseif ( get_theme_mod('fit_bsStyle_themeColor') ){
			$color = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
			if(get_option('fit_pageCta_style') == 'u-border' ){
				echo '.pageCta.u-border{border-color:'.$color.'}';
			}elseif(get_option('fit_pageCta_style') == 'pagecta-bg' ){
				echo '.pagecta-bg{background-color:'.$color.'}';
			}
		}


		//タグボタン(in)のカラー
		if ( get_theme_mod('fit_bsAfTag_colorIn')) {
			$color  = esc_attr( get_theme_mod( 'fit_bsAfTag_colorIn' ));
			echo '.content .afTagBox__btnDetail{background-color:'.$color.';}';
			echo '.widget .widgetAfTag__btnDetail{background-color:'.$color.';}';
		}elseif ( get_theme_mod('fit_bsStyle_themeColor')) {
			$color  = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
			echo '.content .afTagBox__btnDetail{background-color:'.$color.';}';
			echo '.widget .widgetAfTag__btnDetail{background-color:'.$color.';}';
		}

		//タグボタン(out)のカラー
		if ( get_theme_mod('fit_bsAfTag_colorOut')) {
			$color  = esc_attr( get_theme_mod( 'fit_bsAfTag_colorOut' ));
			echo '.content .afTagBox__btnAf{background-color:'.$color.';}';
			echo '.widget .widgetAfTag__btnAf{background-color:'.$color.';}';
		}elseif ( get_theme_mod('fit_bsStyle_themeColor')) {
			$color  = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
			echo '.content .afTagBox__btnAf{background-color:'.$color.';}';
			echo '.widget .widgetAfTag__btnAf{background-color:'.$color.';}';
		}

		//個別ページテキストリンクのカラー
		if ( get_theme_mod('fit_bsStyle_linkColor')) {
			$color  = esc_attr( get_theme_mod( 'fit_bsStyle_linkColor' ));
			echo '.content a{color:'.$color.';}';
			echo '.phrase a{color:'.$color.';}';
			echo '.content .sitemap li a:hover{color:'.$color.';}';
			echo '.content h2 a:hover,.content h3 a:hover,.content h4 a:hover,.content h5 a:hover{color:'.$color.';}';
			echo '.content ul.menu li a:hover{color:'.$color.';}';
		}elseif ( get_theme_mod('fit_bsStyle_themeColor')) {
			$color  = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
			echo '.content a{color:'.$color.';}';
			echo '.phrase a{color:'.$color.';}';
			echo '.content .sitemap li a:hover{color:'.$color.';}';
			echo '.content h2 a:hover,.content h3 a:hover,.content h4 a:hover,.content h5 a:hover{color:'.$color.';}';
			echo '.content ul.menu li a:hover{color:'.$color.';}';
		}

		//個別ページその他エディタ用パーツ
			$color_icon      = '#a83f3f';
			$color_hatena    = '#005293';
			$color_excl      = '#b60105';
			$color_q         = '#005293';
			$color_a         = '#b60105';
			$color_subtitleA = '#ffffff';
			$color_subtitleB = '#b60105';
			$color_subtitleC = '#b60105';

			if(get_theme_mod( 'fit_partsEtc_icon' )){
				$color_icon = esc_attr( get_theme_mod( 'fit_partsEtc_icon' ));
			}
			if(get_theme_mod( 'fit_partsEtc_hatena' )){
				$color_hatena = esc_attr( get_theme_mod( 'fit_partsEtc_hatena' ));
			}
			if(get_theme_mod( 'fit_partsEtc_excl' )){
				$color_excl = esc_attr( get_theme_mod( 'fit_partsEtc_excl' ));
			}
			if(get_theme_mod( 'fit_partsEtc_q' )){
				$color_q = esc_attr( get_theme_mod( 'fit_partsEtc_q' ));
			}
			if(get_theme_mod( 'fit_partsEtc_a' )){
				$color_a = esc_attr( get_theme_mod( 'fit_partsEtc_a' ));
			}
			if(get_theme_mod( 'fit_partsEtc_subtitleA' )){
				$color_subtitleA = esc_attr( get_theme_mod( 'fit_partsEtc_subtitleA' ));
			}
			if(get_theme_mod( 'fit_partsEtc_subtitleB' )){
				$color_subtitleB = esc_attr( get_theme_mod( 'fit_partsEtc_subtitleB' ));
			}
			if(get_theme_mod( 'fit_partsEtc_subtitleC' )){
				$color_subtitleC = esc_attr( get_theme_mod( 'fit_partsEtc_subtitleC' ));
			}
			echo '.content .es-LiconBox:before{background-color:'.$color_icon.';}';
			echo '.content .es-LiconCircle:before{background-color:'.$color_icon.';}';
			echo '.content .es-BTiconBox:before{background-color:'.$color_icon.';}';
			echo '.content .es-BTiconCircle:before{background-color:'.$color_icon.';}';
			echo '.content .es-BiconObi{border-color:'.$color_icon.';}';
			echo '.content .es-BiconCorner:before{background-color:'.$color_icon.';}';
			echo '.content .es-BiconCircle:before{background-color:'.$color_icon.';}';

			echo '.content .es-BmarkHatena::before{background-color:'.$color_hatena.';}';
			echo '.content .es-BmarkExcl::before{background-color:'.$color_excl.';}';
			echo '.content .es-BmarkQ::before{background-color:'.$color_q.';}';
			echo '.content .es-BmarkQ::after{border-top-color:'.$color_q.';}';
			echo '.content .es-BmarkA::before{color:'.$color_a.';}';
			echo '.content .es-BsubTradi::before{color:'.$color_subtitleA.';background-color:'.$color_subtitleB.';border-color:'.$color_subtitleC.';}';

		//共通ページプライマリーボタンのカラー
			$colorA = '#ffffff';
			$colorB = '#3f3f3f';
			if(get_theme_mod( 'fit_partsBtn_primaryColorA' )){
				$colorA = esc_attr( get_theme_mod( 'fit_partsBtn_primaryColorA' ));
			}
			if(get_theme_mod( 'fit_partsBtn_primaryColorB' )){
				$colorB = esc_attr( get_theme_mod( 'fit_partsBtn_primaryColorB' ));
			}
			echo '.btn__link-primary{color:'.$colorA.'; background-color:'.$colorB.';}';
			echo '.content .btn__link-primary{color:'.$colorA.'; background-color:'.$colorB.';}';
			echo '.searchBtn__contentInner .btn__link-search{color:'.$colorA.'; background-color:'.$colorB.';}';


		//共通ページセカンダリーボタンのカラー
			$colorA = '#ffffff';
			$colorB = '#3f3f3f';
			if(get_theme_mod( 'fit_partsBtn_secondaryColorA' )){
				$colorA = esc_attr( get_theme_mod( 'fit_partsBtn_secondaryColorA' ));
			}
			if(get_theme_mod( 'fit_partsBtn_secondaryColorB' )){
				$colorB = esc_attr( get_theme_mod( 'fit_partsBtn_secondaryColorB' ));
			}
			echo '.btn__link-secondary{color:'.$colorA.'; background-color:'.$colorB.';}';
			echo '.content .btn__link-secondary{color:'.$colorA.'; background-color:'.$colorB.';}';
			echo '.btn__link-search{color:'.$colorA.'; background-color:'.$colorB.';}';

		//共通ページノーマルボタンのカラー
			$colorA = '#3f3f3f';
			if(get_theme_mod( 'fit_partsBtn_normalColorA' )){
				$colorA = esc_attr( get_theme_mod( 'fit_partsBtn_normalColorA' ));
			}
			echo '.btn__link-normal{color:'.$colorA.';}';
			echo '.content .btn__link-normal{color:'.$colorA.';}';
			echo '.btn__link-normal:hover{background-color:'.$colorA.';}';
			echo '.content .btn__link-normal:hover{background-color:'.$colorA.';}';
			echo '.comments__list .comment-reply-link{color:'.$colorA.';}';
			echo '.comments__list .comment-reply-link:hover{background-color:'.$colorA.';}';
			echo '@media only screen and (min-width: 992px){.subNavi__link-pickup{color:'.$colorA.';}}';
			echo '@media only screen and (min-width: 992px){.subNavi__link-pickup:hover{background-color:'.$colorA.';}}';


		//個別ページ見出し2のカラー
			$colorA = '#191919';
			$colorB = '#f2f2f2';
			$colorC = '#d8d8d8';
			$class  = 'partsH2-'.get_option('fit_partsHead_2');

			if(get_theme_mod( 'fit_partsHead_2colorA' )){
				$colorA = esc_attr( get_theme_mod( 'fit_partsHead_2colorA' ));
			}
			if(get_theme_mod( 'fit_partsHead_2colorB' )){
				$colorB = esc_attr( get_theme_mod( 'fit_partsHead_2colorB' ));
			}
			if(get_theme_mod( 'fit_partsHead_2colorC' )){
				$colorC = esc_attr( get_theme_mod( 'fit_partsHead_2colorC' ));
			}

			if ($class == 'partsH2-' || $class == 'partsH2-off'){echo '.content h2{color:'.$colorA.'}';}
			if ($class == 'partsH2-1' ){echo '.'.$class.' h2{color:'.$colorA.'; border-color:'.$colorB.';}';}
			if ($class == 'partsH2-2' ){echo '.'.$class.' h2{color:'.$colorA.';}';}
			if ($class == 'partsH2-2' ){echo '.'.$class.' h2::after{border-color:'.$colorB.';}';}
			if ($class == 'partsH2-3' ){echo '.'.$class.' h2{color:'.$colorA.'; border-color:'.$colorB.';}';}
			if ($class == 'partsH2-4' ){echo '.'.$class.' h2{color:'.$colorA.';}';}
			if ($class == 'partsH2-4' ){echo '.'.$class.' h2::before{border-color:'.$colorB.';}';}
			if ($class == 'partsH2-4' ){echo '.'.$class.' h2::after{border-color:'.$colorC.';}';}
			if ($class == 'partsH2-5' ){echo '.'.$class.' h2{color:'.$colorA.'; background: linear-gradient(transparent 60%, '.$colorB.' 60%);}';}
			if ($class == 'partsH2-6' ){echo '.'.$class.' h2{color:'.$colorA.';}';}
			if ($class == 'partsH2-6' ){echo '.'.$class.' h2::before{border-bottom-color:'.$colorB.';}';}
			if ($class == 'partsH2-6' ){echo '.'.$class.' h2::after{border-color:'.$colorB.';}';}
			if ($class == 'partsH2-7' ){echo '.'.$class.' h2{color:'.$colorA.';}';}
			if ($class == 'partsH2-7' ){echo '.'.$class.' h2::after{background: repeating-linear-gradient(-45deg, '.$colorB.', '.$colorB.' 2px, '.$colorC.' 2px, '.$colorC.' 4px);}';}
			if ($class == 'partsH2-8' ){echo '.'.$class.' h2{color:'.$colorA.';}';}
			if ($class == 'partsH2-8' ){echo '.'.$class.' h2::after{background: linear-gradient(to right, '.$colorB.', '.$colorC.');}';}
			if ($class == 'partsH2-9' ){echo '.'.$class.' h2{color:'.$colorA.';}';}
			if ($class == 'partsH2-9' ){echo '.'.$class.' h2::after{background-color:'.$colorB.';}';}
			if ($class == 'partsH2-10'){echo '.'.$class.' h2{color:'.$colorA.'; border-color:'.$colorB.';}';}
			if ($class == 'partsH2-10'){echo '.'.$class.' h2::before{border-top-color:'.$colorB.';}';}
			if ($class == 'partsH2-11'){echo '.'.$class.' h2{color:'.$colorA.'; border-color:'.$colorB.';}';}
			if ($class == 'partsH2-12'){echo '.'.$class.' h2{color:'.$colorA.'; border-left-color:'.$colorB.'; border-bottom-color:'.$colorC.';}';}
			if ($class == 'partsH2-13'){echo '.'.$class.' h2{color:'.$colorA.'; border-left-color:'.$colorB.'; border-bottom-color:'.$colorC.';}';}
			if ($class == 'partsH2-14'){echo '.'.$class.' h2{color:'.$colorA.'; border-color:'.$colorB.';}';}
			if ($class == 'partsH2-14'){echo '.'.$class.' h2::before{background-color:'.$colorC.';}';}
			if ($class == 'partsH2-14'){echo '.'.$class.' h2::after{border-color:'.$colorC.';}';}

			if ($class == 'partsH2-21'){echo '.'.$class.' h2{color:'.$colorA.'; background-color:'.$colorB.';}';}
			if ($class == 'partsH2-22'){echo '.'.$class.' h2{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH2-23'){echo '.'.$class.' h2{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH2-24'){echo '.'.$class.' h2{color:'.$colorA.'; background-color:'.$colorB.'; border-left-color:'.$colorC.';}';}
			if ($class == 'partsH2-25'){echo '.'.$class.' h2{color:'.$colorA.'; background-color:'.$colorB.';}';}
			if ($class == 'partsH2-25'){echo '.'.$class.' h2::after{border-top-color:'.$colorB.';}';}
			if ($class == 'partsH2-26'){echo '.'.$class.' h2{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH2-26'){echo '.'.$class.' h2::before{border-top-color:'.$colorC.';}';}
			if ($class == 'partsH2-26'){echo '.'.$class.' h2::after{border-top-color:'.$colorB.';}';}
			if ($class == 'partsH2-27'){echo '.'.$class.' h2{color:'.$colorA.'; background-color:'.$colorB.';}';}
			if ($class == 'partsH2-27'){echo '.'.$class.' h2::before{border-top-color:'.$colorC.'; border-left-color:'.$colorC.';}';}
			if ($class == 'partsH2-27'){echo '.'.$class.' h2::after{border-top-color:'.$colorC.'; border-right-color:'.$colorC.';}';}
			if ($class == 'partsH2-28'){echo '.'.$class.' h2{color:'.$colorA.'; background-color:'.$colorB.'}';}
			if ($class == 'partsH2-28'){echo '.'.$class.' h2::before{border-bottom-color:'.$colorC.';}';}
			if ($class == 'partsH2-29'){echo '.'.$class.' h2{color:'.$colorA.'; background-color:'.$colorB.'; box-shadow: 0px 0px 0px 5px '.$colorB.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH2-30'){echo '.'.$class.' h2{color:'.$colorA.'; background: repeating-linear-gradient(-45deg, '.$colorB.', '.$colorB.' 3px, '.$colorC.' 3px, '.$colorC.' 7px);}';}
			if ($class == 'partsH2-31'){echo '.'.$class.' h2{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH2-32'){echo '.'.$class.' h2{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH2-33'){echo '.'.$class.' h2{color:'.$colorA.';}';}
			if ($class == 'partsH2-33'){echo '.'.$class.' h2::before{border-color:'.$colorB.';}';}
			if ($class == 'partsH2-33'){echo '.'.$class.' h2::after{border-color:'.$colorB.';}';}
			if ($class == 'partsH2-34'){echo '.'.$class.' h2{color:'.$colorA.'; border-color:'.$colorB.';}';}
			if ($class == 'partsH2-34'){echo '.'.$class.' h2::before{background-color:'.$colorB.';}';}
			if ($class == 'partsH2-34'){echo '.'.$class.' h2::after{background-color:'.$colorB.';}';}

			if ($class == 'partsH2-41'){echo '.'.$class.' h2{color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%); border-color:'.$colorC.';}';}
			if ($class == 'partsH2-42'){echo '.'.$class.' h2{color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%); border-color:'.$colorC.';}';}
			if ($class == 'partsH2-43'){echo '.'.$class.' h2{color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%); border-color:'.$colorC.';}';}
			if ($class == 'partsH2-44'){echo '.'.$class.' h2{color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%); border-color:'.$colorC.';}';}
			if ($class == 'partsH2-45'){echo '.'.$class.' h2{color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%); border-color:'.$colorC.';}';}
			if ($class == 'partsH2-46'){echo '.'.$class.' h2{color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%); border-color:'.$colorC.';}';}
			if ($class == 'partsH2-47'){echo '.'.$class.' h2{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH2-48'){echo '.'.$class.' h2{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH2-49'){echo '.'.$class.' h2{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH2-50'){echo '.'.$class.' h2{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}

			if ($class == 'partsH2-61'){echo '.'.$class.' h2{color:'.$colorA.';}';}
			if ($class == 'partsH2-61'){echo '.'.$class.' h2::after{background-color:'.$colorB.';}';}
			if ($class == 'partsH2-62'){echo '.'.$class.' h2{color:'.$colorA.'; background-color: '.$colorB.';}';}
			if ($class == 'partsH2-62'){echo '.'.$class.' h2::after{background-color:'.$colorA.';}';}
			if ($class == 'partsH2-63'){echo '.'.$class.' h2{color:'.$colorA.'; background-color: '.$colorB.'; border-color: '.$colorC.';}';}
			if ($class == 'partsH2-63'){echo '.'.$class.' h2::after{background-color:'.$colorA.';}';}
			if ($class == 'partsH2-64'){echo '.'.$class.' h2{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH2-64'){echo '.'.$class.' h2::after{background-color:'.$colorA.';}';}
			if ($class == 'partsH2-65'){echo '.'.$class.' h2{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH2-65'){echo '.'.$class.' h2::after{background-color:'.$colorA.';}';}

			if ($class == 'partsH2-71'){echo '.'.$class.' h2{color:'.$colorA.';}';}
			if ($class == 'partsH2-71'){echo '.'.$class.' h2::after{border-color:'.$colorB.';}';}
			if ($class == 'partsH2-72'){echo '.'.$class.' h2{color:'.$colorA.'; background-color: '.$colorB.';}';}
			if ($class == 'partsH2-72'){echo '.'.$class.' h2::after{border-color:'.$colorA.';}';}
			if ($class == 'partsH2-73'){echo '.'.$class.' h2{color:'.$colorA.'; background-color: '.$colorB.'; border-color: '.$colorC.';}';}
			if ($class == 'partsH2-73'){echo '.'.$class.' h2::after{border-color:'.$colorA.';}';}
			if ($class == 'partsH2-74'){echo '.'.$class.' h2{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH2-74'){echo '.'.$class.' h2::after{border-color:'.$colorA.';}';}
			if ($class == 'partsH2-75'){echo '.'.$class.' h2{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH2-75'){echo '.'.$class.' h2::after{border-color:'.$colorA.';}';}

			if ($class == 'partsH2-81'){echo '.'.$class.' h2{color:'.$colorA.';}';}
			if ($class == 'partsH2-81'){echo '.'.$class.' h2:first-letter{color:'.$colorB.';}';}
			if ($class == 'partsH2-82'){echo '.'.$class.' h2{color:'.$colorA.';}';}
			if ($class == 'partsH2-82'){echo '.'.$class.' h2:first-letter{color:'.$colorB.';}';}
			if ($class == 'partsH2-83'){echo '.'.$class.' h2{color:'.$colorA.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH2-83'){echo '.'.$class.' h2:first-letter{color:'.$colorB.';}';}
			if ($class == 'partsH2-84'){echo '.'.$class.' h2{color:'.$colorA.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH2-84'){echo '.'.$class.' h2:first-letter{color:'.$colorB.';}';}

		//個別ページ見出し3のカラー
			$colorA = '#191919';
			$colorB = '#f2f2f2';
			$colorC = '#d8d8d8';
			$class  = 'partsH3-'.get_option('fit_partsHead_3');

			if(get_theme_mod( 'fit_partsHead_3colorA' )){
				$colorA = esc_attr( get_theme_mod( 'fit_partsHead_3colorA' ));
			}
			if(get_theme_mod( 'fit_partsHead_3colorB' )){
				$colorB = esc_attr( get_theme_mod( 'fit_partsHead_3colorB' ));
			}
			if(get_theme_mod( 'fit_partsHead_3colorC' )){
				$colorC = esc_attr( get_theme_mod( 'fit_partsHead_3colorC' ));
			}

			if ($class == 'partsH3-' || $class == 'partsH3-off'){echo '.content h3{color:'.$colorA.'}';}
			if ($class == 'partsH3-1' ){echo '.'.$class.' h3{color:'.$colorA.'; border-color:'.$colorB.';}';}
			if ($class == 'partsH3-2' ){echo '.'.$class.' h3{color:'.$colorA.';}';}
			if ($class == 'partsH3-2' ){echo '.'.$class.' h3::after{border-color:'.$colorB.';}';}
			if ($class == 'partsH3-3' ){echo '.'.$class.' h3{color:'.$colorA.'; border-color:'.$colorB.';}';}
			if ($class == 'partsH3-4' ){echo '.'.$class.' h3{color:'.$colorA.';}';}
			if ($class == 'partsH3-4' ){echo '.'.$class.' h3::before{border-color:'.$colorB.';}';}
			if ($class == 'partsH3-4' ){echo '.'.$class.' h3::after{border-color:'.$colorC.';}';}
			if ($class == 'partsH3-5' ){echo '.'.$class.' h3{color:'.$colorA.'; background: linear-gradient(transparent 60%, '.$colorB.' 60%);}';}
			if ($class == 'partsH3-6' ){echo '.'.$class.' h3{color:'.$colorA.';}';}
			if ($class == 'partsH3-6' ){echo '.'.$class.' h3::before{border-bottom-color:'.$colorB.';}';}
			if ($class == 'partsH3-6' ){echo '.'.$class.' h3::after{border-color:'.$colorB.';}';}
			if ($class == 'partsH3-7' ){echo '.'.$class.' h3{color:'.$colorA.';}';}
			if ($class == 'partsH3-7' ){echo '.'.$class.' h3::after{background: repeating-linear-gradient(-45deg, '.$colorB.', '.$colorB.' 2px, '.$colorC.' 2px, '.$colorC.' 4px);}';}
			if ($class == 'partsH3-8' ){echo '.'.$class.' h3{color:'.$colorA.';}';}
			if ($class == 'partsH3-8' ){echo '.'.$class.' h3::after{background: linear-gradient(to right, '.$colorB.', '.$colorC.');}';}
			if ($class == 'partsH3-9' ){echo '.'.$class.' h3{color:'.$colorA.';}';}
			if ($class == 'partsH3-9' ){echo '.'.$class.' h3::after{background-color:'.$colorB.';}';}
			if ($class == 'partsH3-10'){echo '.'.$class.' h3{color:'.$colorA.'; border-color:'.$colorB.';}';}
			if ($class == 'partsH3-10'){echo '.'.$class.' h3::before{border-top-color:'.$colorB.';}';}
			if ($class == 'partsH3-11'){echo '.'.$class.' h3{color:'.$colorA.'; border-color:'.$colorB.';}';}
			if ($class == 'partsH3-12'){echo '.'.$class.' h3{color:'.$colorA.'; border-left-color:'.$colorB.'; border-bottom-color:'.$colorC.';}';}
			if ($class == 'partsH3-13'){echo '.'.$class.' h3{color:'.$colorA.'; border-left-color:'.$colorB.'; border-bottom-color:'.$colorC.';}';}
			if ($class == 'partsH3-14'){echo '.'.$class.' h3{color:'.$colorA.'; border-color:'.$colorB.';}';}
			if ($class == 'partsH3-14'){echo '.'.$class.' h3::before{background-color:'.$colorC.';}';}
			if ($class == 'partsH3-14'){echo '.'.$class.' h3::after{border-color:'.$colorC.';}';}

			if ($class == 'partsH3-21'){echo '.'.$class.' h3{color:'.$colorA.'; background-color:'.$colorB.';}';}
			if ($class == 'partsH3-22'){echo '.'.$class.' h3{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH3-23'){echo '.'.$class.' h3{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH3-24'){echo '.'.$class.' h3{color:'.$colorA.'; background-color:'.$colorB.'; border-left-color:'.$colorC.';}';}
			if ($class == 'partsH3-25'){echo '.'.$class.' h3{color:'.$colorA.'; background-color:'.$colorB.';}';}
			if ($class == 'partsH3-25'){echo '.'.$class.' h3::after{border-top-color:'.$colorB.';}';}
			if ($class == 'partsH3-26'){echo '.'.$class.' h3{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH3-26'){echo '.'.$class.' h3::before{border-top-color:'.$colorC.';}';}
			if ($class == 'partsH3-26'){echo '.'.$class.' h3::after{border-top-color:'.$colorB.';}';}
			if ($class == 'partsH3-27'){echo '.'.$class.' h3{color:'.$colorA.'; background-color:'.$colorB.';}';}
			if ($class == 'partsH3-27'){echo '.'.$class.' h3::before{border-top-color:'.$colorC.'; border-left-color:'.$colorC.';}';}
			if ($class == 'partsH3-27'){echo '.'.$class.' h3::after{border-top-color:'.$colorC.'; border-right-color:'.$colorC.';}';}
			if ($class == 'partsH3-28'){echo '.'.$class.' h3{color:'.$colorA.'; background-color:'.$colorB.'}';}
			if ($class == 'partsH3-28'){echo '.'.$class.' h3::before{border-bottom-color:'.$colorC.';}';}
			if ($class == 'partsH3-29'){echo '.'.$class.' h3{color:'.$colorA.'; background-color:'.$colorB.'; box-shadow: 0px 0px 0px 5px '.$colorB.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH3-30'){echo '.'.$class.' h3{color:'.$colorA.'; background: repeating-linear-gradient(-45deg, '.$colorB.', '.$colorB.' 3px, '.$colorC.' 3px, '.$colorC.' 7px);}';}
			if ($class == 'partsH3-31'){echo '.'.$class.' h3{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH3-32'){echo '.'.$class.' h3{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH3-33'){echo '.'.$class.' h3{color:'.$colorA.';}';}
			if ($class == 'partsH3-33'){echo '.'.$class.' h3::before{border-color:'.$colorB.';}';}
			if ($class == 'partsH3-33'){echo '.'.$class.' h3::after{border-color:'.$colorB.';}';}
			if ($class == 'partsH3-34'){echo '.'.$class.' h3{color:'.$colorA.'; border-color:'.$colorB.';}';}
			if ($class == 'partsH3-34'){echo '.'.$class.' h3::before{background-color:'.$colorB.';}';}
			if ($class == 'partsH3-34'){echo '.'.$class.' h3::after{background-color:'.$colorB.';}';}

			if ($class == 'partsH3-41'){echo '.'.$class.' h3{color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%); border-color:'.$colorC.';}';}
			if ($class == 'partsH3-42'){echo '.'.$class.' h3{color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%); border-color:'.$colorC.';}';}
			if ($class == 'partsH3-43'){echo '.'.$class.' h3{color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%); border-color:'.$colorC.';}';}
			if ($class == 'partsH3-44'){echo '.'.$class.' h3{color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%); border-color:'.$colorC.';}';}
			if ($class == 'partsH3-45'){echo '.'.$class.' h3{color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%); border-color:'.$colorC.';}';}
			if ($class == 'partsH3-46'){echo '.'.$class.' h3{color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%); border-color:'.$colorC.';}';}
			if ($class == 'partsH3-47'){echo '.'.$class.' h3{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH3-48'){echo '.'.$class.' h3{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH3-49'){echo '.'.$class.' h3{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH3-50'){echo '.'.$class.' h3{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}

			if ($class == 'partsH3-61'){echo '.'.$class.' h3{color:'.$colorA.';}';}
			if ($class == 'partsH3-61'){echo '.'.$class.' h3::after{background-color:'.$colorB.';}';}
			if ($class == 'partsH3-62'){echo '.'.$class.' h3{color:'.$colorA.'; background-color: '.$colorB.';}';}
			if ($class == 'partsH3-62'){echo '.'.$class.' h3::after{background-color:'.$colorA.';}';}
			if ($class == 'partsH3-63'){echo '.'.$class.' h3{color:'.$colorA.'; background-color: '.$colorB.'; border-color: '.$colorC.';}';}
			if ($class == 'partsH3-63'){echo '.'.$class.' h3::after{background-color:'.$colorA.';}';}
			if ($class == 'partsH3-64'){echo '.'.$class.' h3{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH3-64'){echo '.'.$class.' h3::after{background-color:'.$colorA.';}';}
			if ($class == 'partsH3-65'){echo '.'.$class.' h3{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH3-65'){echo '.'.$class.' h3::after{background-color:'.$colorA.';}';}

			if ($class == 'partsH3-71'){echo '.'.$class.' h3{color:'.$colorA.';}';}
			if ($class == 'partsH3-71'){echo '.'.$class.' h3::after{border-color:'.$colorB.';}';}
			if ($class == 'partsH3-72'){echo '.'.$class.' h3{color:'.$colorA.'; background-color: '.$colorB.';}';}
			if ($class == 'partsH3-72'){echo '.'.$class.' h3::after{border-color:'.$colorA.';}';}
			if ($class == 'partsH3-73'){echo '.'.$class.' h3{color:'.$colorA.'; background-color: '.$colorB.'; border-color: '.$colorC.';}';}
			if ($class == 'partsH3-73'){echo '.'.$class.' h3::after{border-color:'.$colorA.';}';}
			if ($class == 'partsH3-74'){echo '.'.$class.' h3{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH3-74'){echo '.'.$class.' h3::after{border-color:'.$colorA.';}';}
			if ($class == 'partsH3-75'){echo '.'.$class.' h3{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH3-75'){echo '.'.$class.' h3::after{border-color:'.$colorA.';}';}

			if ($class == 'partsH3-81'){echo '.'.$class.' h3{color:'.$colorA.';}';}
			if ($class == 'partsH3-81'){echo '.'.$class.' h3:first-letter{color:'.$colorB.';}';}
			if ($class == 'partsH3-82'){echo '.'.$class.' h3{color:'.$colorA.';}';}
			if ($class == 'partsH3-82'){echo '.'.$class.' h3:first-letter{color:'.$colorB.';}';}
			if ($class == 'partsH3-83'){echo '.'.$class.' h3{color:'.$colorA.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH3-83'){echo '.'.$class.' h3:first-letter{color:'.$colorB.';}';}
			if ($class == 'partsH3-84'){echo '.'.$class.' h3{color:'.$colorA.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH3-84'){echo '.'.$class.' h3:first-letter{color:'.$colorB.';}';}

		//個別ページ見出し4のカラー
			$colorA = '#191919';
			$colorB = '#f2f2f2';
			$colorC = '#d8d8d8';
			$class  = 'partsH4-'.get_option('fit_partsHead_4');

			if(get_theme_mod( 'fit_partsHead_4colorA' )){
				$colorA = esc_attr( get_theme_mod( 'fit_partsHead_4colorA' ));
			}
			if(get_theme_mod( 'fit_partsHead_4colorB' )){
				$colorB = esc_attr( get_theme_mod( 'fit_partsHead_4colorB' ));
			}
			if(get_theme_mod( 'fit_partsHead_4colorC' )){
				$colorC = esc_attr( get_theme_mod( 'fit_partsHead_4colorC' ));
			}

			if ($class == 'partsH4-' || $class == 'partsH4-off'){echo '.content h4{color:'.$colorA.'}';}
			if ($class == 'partsH4-1' ){echo '.'.$class.' h4{color:'.$colorA.'; border-color:'.$colorB.';}';}
			if ($class == 'partsH4-2' ){echo '.'.$class.' h4{color:'.$colorA.';}';}
			if ($class == 'partsH4-2' ){echo '.'.$class.' h4::after{border-color:'.$colorB.';}';}
			if ($class == 'partsH4-3' ){echo '.'.$class.' h4{color:'.$colorA.'; border-color:'.$colorB.';}';}
			if ($class == 'partsH4-4' ){echo '.'.$class.' h4{color:'.$colorA.';}';}
			if ($class == 'partsH4-4' ){echo '.'.$class.' h4::before{border-color:'.$colorB.';}';}
			if ($class == 'partsH4-4' ){echo '.'.$class.' h4::after{border-color:'.$colorC.';}';}
			if ($class == 'partsH4-5' ){echo '.'.$class.' h4{color:'.$colorA.'; background: linear-gradient(transparent 60%, '.$colorB.' 60%);}';}
			if ($class == 'partsH4-6' ){echo '.'.$class.' h4{color:'.$colorA.';}';}
			if ($class == 'partsH4-6' ){echo '.'.$class.' h4::before{border-bottom-color:'.$colorB.';}';}
			if ($class == 'partsH4-6' ){echo '.'.$class.' h4::after{border-color:'.$colorB.';}';}
			if ($class == 'partsH4-7' ){echo '.'.$class.' h4{color:'.$colorA.';}';}
			if ($class == 'partsH4-7' ){echo '.'.$class.' h4::after{background: repeating-linear-gradient(-45deg, '.$colorB.', '.$colorB.' 2px, '.$colorC.' 2px, '.$colorC.' 4px);}';}
			if ($class == 'partsH4-8' ){echo '.'.$class.' h4{color:'.$colorA.';}';}
			if ($class == 'partsH4-8' ){echo '.'.$class.' h4::after{background: linear-gradient(to right, '.$colorB.', '.$colorC.');}';}
			if ($class == 'partsH4-9' ){echo '.'.$class.' h4{color:'.$colorA.';}';}
			if ($class == 'partsH4-9' ){echo '.'.$class.' h4::after{background-color:'.$colorB.';}';}
			if ($class == 'partsH4-10'){echo '.'.$class.' h4{color:'.$colorA.'; border-color:'.$colorB.';}';}
			if ($class == 'partsH4-10'){echo '.'.$class.' h4::before{border-top-color:'.$colorB.';}';}
			if ($class == 'partsH4-11'){echo '.'.$class.' h4{color:'.$colorA.'; border-color:'.$colorB.';}';}
			if ($class == 'partsH4-12'){echo '.'.$class.' h4{color:'.$colorA.'; border-left-color:'.$colorB.'; border-bottom-color:'.$colorC.';}';}
			if ($class == 'partsH4-13'){echo '.'.$class.' h4{color:'.$colorA.'; border-left-color:'.$colorB.'; border-bottom-color:'.$colorC.';}';}
			if ($class == 'partsH4-14'){echo '.'.$class.' h4{color:'.$colorA.'; border-color:'.$colorB.';}';}
			if ($class == 'partsH4-14'){echo '.'.$class.' h4::before{background-color:'.$colorC.';}';}
			if ($class == 'partsH4-14'){echo '.'.$class.' h4::after{border-color:'.$colorC.';}';}

			if ($class == 'partsH4-21'){echo '.'.$class.' h4{color:'.$colorA.'; background-color:'.$colorB.';}';}
			if ($class == 'partsH4-22'){echo '.'.$class.' h4{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH4-23'){echo '.'.$class.' h4{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH4-24'){echo '.'.$class.' h4{color:'.$colorA.'; background-color:'.$colorB.'; border-left-color:'.$colorC.';}';}
			if ($class == 'partsH4-25'){echo '.'.$class.' h4{color:'.$colorA.'; background-color:'.$colorB.';}';}
			if ($class == 'partsH4-25'){echo '.'.$class.' h4::after{border-top-color:'.$colorB.';}';}
			if ($class == 'partsH4-26'){echo '.'.$class.' h4{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH4-26'){echo '.'.$class.' h4::before{border-top-color:'.$colorC.';}';}
			if ($class == 'partsH4-26'){echo '.'.$class.' h4::after{border-top-color:'.$colorB.';}';}
			if ($class == 'partsH4-27'){echo '.'.$class.' h4{color:'.$colorA.'; background-color:'.$colorB.';}';}
			if ($class == 'partsH4-27'){echo '.'.$class.' h4::before{border-top-color:'.$colorC.'; border-left-color:'.$colorC.';}';}
			if ($class == 'partsH4-27'){echo '.'.$class.' h4::after{border-top-color:'.$colorC.'; border-right-color:'.$colorC.';}';}
			if ($class == 'partsH4-28'){echo '.'.$class.' h4{color:'.$colorA.'; background-color:'.$colorB.'}';}
			if ($class == 'partsH4-28'){echo '.'.$class.' h4::before{border-bottom-color:'.$colorC.';}';}
			if ($class == 'partsH4-29'){echo '.'.$class.' h4{color:'.$colorA.'; background-color:'.$colorB.'; box-shadow: 0px 0px 0px 5px '.$colorB.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH4-30'){echo '.'.$class.' h4{color:'.$colorA.'; background: repeating-linear-gradient(-45deg, '.$colorB.', '.$colorB.' 3px, '.$colorC.' 3px, '.$colorC.' 7px);}';}
			if ($class == 'partsH4-31'){echo '.'.$class.' h4{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH4-32'){echo '.'.$class.' h4{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH4-33'){echo '.'.$class.' h4{color:'.$colorA.';}';}
			if ($class == 'partsH4-33'){echo '.'.$class.' h4::before{border-color:'.$colorB.';}';}
			if ($class == 'partsH4-33'){echo '.'.$class.' h4::after{border-color:'.$colorB.';}';}
			if ($class == 'partsH4-34'){echo '.'.$class.' h4{color:'.$colorA.'; border-color:'.$colorB.';}';}
			if ($class == 'partsH4-34'){echo '.'.$class.' h4::before{background-color:'.$colorB.';}';}
			if ($class == 'partsH4-34'){echo '.'.$class.' h4::after{background-color:'.$colorB.';}';}

			if ($class == 'partsH4-41'){echo '.'.$class.' h4{color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%); border-color:'.$colorC.';}';}
			if ($class == 'partsH4-42'){echo '.'.$class.' h4{color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%); border-color:'.$colorC.';}';}
			if ($class == 'partsH4-43'){echo '.'.$class.' h4{color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%); border-color:'.$colorC.';}';}
			if ($class == 'partsH4-44'){echo '.'.$class.' h4{color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%); border-color:'.$colorC.';}';}
			if ($class == 'partsH4-45'){echo '.'.$class.' h4{color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%); border-color:'.$colorC.';}';}
			if ($class == 'partsH4-46'){echo '.'.$class.' h4{color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%); border-color:'.$colorC.';}';}
			if ($class == 'partsH4-47'){echo '.'.$class.' h4{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH4-48'){echo '.'.$class.' h4{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH4-49'){echo '.'.$class.' h4{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH4-50'){echo '.'.$class.' h4{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}

			if ($class == 'partsH4-61'){echo '.'.$class.' h4{color:'.$colorA.';}';}
			if ($class == 'partsH4-61'){echo '.'.$class.' h4::after{background-color:'.$colorB.';}';}
			if ($class == 'partsH4-62'){echo '.'.$class.' h4{color:'.$colorA.'; background-color: '.$colorB.';}';}
			if ($class == 'partsH4-62'){echo '.'.$class.' h4::after{background-color:'.$colorA.';}';}
			if ($class == 'partsH4-63'){echo '.'.$class.' h4{color:'.$colorA.'; background-color: '.$colorB.'; border-color: '.$colorC.';}';}
			if ($class == 'partsH4-63'){echo '.'.$class.' h4::after{background-color:'.$colorA.';}';}
			if ($class == 'partsH4-64'){echo '.'.$class.' h4{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH4-64'){echo '.'.$class.' h4::after{background-color:'.$colorA.';}';}
			if ($class == 'partsH4-65'){echo '.'.$class.' h4{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH4-65'){echo '.'.$class.' h4::after{background-color:'.$colorA.';}';}

			if ($class == 'partsH4-71'){echo '.'.$class.' h4{color:'.$colorA.';}';}
			if ($class == 'partsH4-71'){echo '.'.$class.' h4::after{border-color:'.$colorB.';}';}
			if ($class == 'partsH4-72'){echo '.'.$class.' h4{color:'.$colorA.'; background-color: '.$colorB.';}';}
			if ($class == 'partsH4-72'){echo '.'.$class.' h4::after{border-color:'.$colorA.';}';}
			if ($class == 'partsH4-73'){echo '.'.$class.' h4{color:'.$colorA.'; background-color: '.$colorB.'; border-color: '.$colorC.';}';}
			if ($class == 'partsH4-73'){echo '.'.$class.' h4::after{border-color:'.$colorA.';}';}
			if ($class == 'partsH4-74'){echo '.'.$class.' h4{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH4-74'){echo '.'.$class.' h4::after{border-color:'.$colorA.';}';}
			if ($class == 'partsH4-75'){echo '.'.$class.' h4{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH4-75'){echo '.'.$class.' h4::after{border-color:'.$colorA.';}';}

			if ($class == 'partsH4-81'){echo '.'.$class.' h4{color:'.$colorA.';}';}
			if ($class == 'partsH4-81'){echo '.'.$class.' h4:first-letter{color:'.$colorB.';}';}
			if ($class == 'partsH4-82'){echo '.'.$class.' h4{color:'.$colorA.';}';}
			if ($class == 'partsH4-82'){echo '.'.$class.' h4:first-letter{color:'.$colorB.';}';}
			if ($class == 'partsH4-83'){echo '.'.$class.' h4{color:'.$colorA.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH4-83'){echo '.'.$class.' h4:first-letter{color:'.$colorB.';}';}
			if ($class == 'partsH4-84'){echo '.'.$class.' h4{color:'.$colorA.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH4-84'){echo '.'.$class.' h4:first-letter{color:'.$colorB.';}';}

		//個別ページ見出し5のカラー
			$colorA = '#191919';
			$colorB = '#f2f2f2';
			$colorC = '#d8d8d8';
			$class  = 'partsH5-'.get_option('fit_partsHead_5');

			if(get_theme_mod( 'fit_partsHead_5colorA' )){
				$colorA = esc_attr( get_theme_mod( 'fit_partsHead_5colorA' ));
			}
			if(get_theme_mod( 'fit_partsHead_5colorB' )){
				$colorB = esc_attr( get_theme_mod( 'fit_partsHead_5colorB' ));
			}
			if(get_theme_mod( 'fit_partsHead_5colorC' )){
				$colorC = esc_attr( get_theme_mod( 'fit_partsHead_5colorC' ));
			}

			if ($class == 'partsH5-' || $class == 'partsH5-off'){echo '.content h5{color:'.$colorA.'}';}
			if ($class == 'partsH5-1' ){echo '.'.$class.' h5{color:'.$colorA.'; border-color:'.$colorB.';}';}
			if ($class == 'partsH5-2' ){echo '.'.$class.' h5{color:'.$colorA.';}';}
			if ($class == 'partsH5-2' ){echo '.'.$class.' h5::after{border-color:'.$colorB.';}';}
			if ($class == 'partsH5-3' ){echo '.'.$class.' h5{color:'.$colorA.'; border-color:'.$colorB.';}';}
			if ($class == 'partsH5-4' ){echo '.'.$class.' h5{color:'.$colorA.';}';}
			if ($class == 'partsH5-4' ){echo '.'.$class.' h5::before{border-color:'.$colorB.';}';}
			if ($class == 'partsH5-4' ){echo '.'.$class.' h5::after{border-color:'.$colorC.';}';}
			if ($class == 'partsH5-5' ){echo '.'.$class.' h5{color:'.$colorA.'; background: linear-gradient(transparent 60%, '.$colorB.' 60%);}';}
			if ($class == 'partsH5-6' ){echo '.'.$class.' h5{color:'.$colorA.';}';}
			if ($class == 'partsH5-6' ){echo '.'.$class.' h5::before{border-bottom-color:'.$colorB.';}';}
			if ($class == 'partsH5-6' ){echo '.'.$class.' h5::after{border-color:'.$colorB.';}';}
			if ($class == 'partsH5-7' ){echo '.'.$class.' h5{color:'.$colorA.';}';}
			if ($class == 'partsH5-7' ){echo '.'.$class.' h5::after{background: repeating-linear-gradient(-45deg, '.$colorB.', '.$colorB.' 2px, '.$colorC.' 2px, '.$colorC.' 4px);}';}
			if ($class == 'partsH5-8' ){echo '.'.$class.' h5{color:'.$colorA.';}';}
			if ($class == 'partsH5-8' ){echo '.'.$class.' h5::after{background: linear-gradient(to right, '.$colorB.', '.$colorC.');}';}
			if ($class == 'partsH5-9' ){echo '.'.$class.' h5{color:'.$colorA.';}';}
			if ($class == 'partsH5-9' ){echo '.'.$class.' h5::after{background-color:'.$colorB.';}';}
			if ($class == 'partsH5-10'){echo '.'.$class.' h5{color:'.$colorA.'; border-color:'.$colorB.';}';}
			if ($class == 'partsH5-10'){echo '.'.$class.' h5::before{border-top-color:'.$colorB.';}';}
			if ($class == 'partsH5-11'){echo '.'.$class.' h5{color:'.$colorA.'; border-color:'.$colorB.';}';}
			if ($class == 'partsH5-12'){echo '.'.$class.' h5{color:'.$colorA.'; border-left-color:'.$colorB.'; border-bottom-color:'.$colorC.';}';}
			if ($class == 'partsH5-13'){echo '.'.$class.' h5{color:'.$colorA.'; border-left-color:'.$colorB.'; border-bottom-color:'.$colorC.';}';}
			if ($class == 'partsH5-14'){echo '.'.$class.' h5{color:'.$colorA.'; border-color:'.$colorB.';}';}
			if ($class == 'partsH5-14'){echo '.'.$class.' h5::before{background-color:'.$colorC.';}';}
			if ($class == 'partsH5-14'){echo '.'.$class.' h5::after{border-color:'.$colorC.';}';}

			if ($class == 'partsH5-21'){echo '.'.$class.' h5{color:'.$colorA.'; background-color:'.$colorB.';}';}
			if ($class == 'partsH5-22'){echo '.'.$class.' h5{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH5-23'){echo '.'.$class.' h5{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH5-24'){echo '.'.$class.' h5{color:'.$colorA.'; background-color:'.$colorB.'; border-left-color:'.$colorC.';}';}
			if ($class == 'partsH5-25'){echo '.'.$class.' h5{color:'.$colorA.'; background-color:'.$colorB.';}';}
			if ($class == 'partsH5-25'){echo '.'.$class.' h5::after{border-top-color:'.$colorB.';}';}
			if ($class == 'partsH5-26'){echo '.'.$class.' h5{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH5-26'){echo '.'.$class.' h5::before{border-top-color:'.$colorC.';}';}
			if ($class == 'partsH5-26'){echo '.'.$class.' h5::after{border-top-color:'.$colorB.';}';}
			if ($class == 'partsH5-27'){echo '.'.$class.' h5{color:'.$colorA.'; background-color:'.$colorB.';}';}
			if ($class == 'partsH5-27'){echo '.'.$class.' h5::before{border-top-color:'.$colorC.'; border-left-color:'.$colorC.';}';}
			if ($class == 'partsH5-27'){echo '.'.$class.' h5::after{border-top-color:'.$colorC.'; border-right-color:'.$colorC.';}';}
			if ($class == 'partsH5-28'){echo '.'.$class.' h5{color:'.$colorA.'; background-color:'.$colorB.'}';}
			if ($class == 'partsH5-28'){echo '.'.$class.' h5::before{border-bottom-color:'.$colorC.';}';}
			if ($class == 'partsH5-29'){echo '.'.$class.' h5{color:'.$colorA.'; background-color:'.$colorB.'; box-shadow: 0px 0px 0px 5px '.$colorB.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH5-30'){echo '.'.$class.' h5{color:'.$colorA.'; background: repeating-linear-gradient(-45deg, '.$colorB.', '.$colorB.' 3px, '.$colorC.' 3px, '.$colorC.' 7px);}';}
			if ($class == 'partsH5-31'){echo '.'.$class.' h5{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH5-32'){echo '.'.$class.' h5{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH5-33'){echo '.'.$class.' h5{color:'.$colorA.';}';}
			if ($class == 'partsH5-33'){echo '.'.$class.' h5::before{border-color:'.$colorB.';}';}
			if ($class == 'partsH5-33'){echo '.'.$class.' h5::after{border-color:'.$colorB.';}';}
			if ($class == 'partsH5-34'){echo '.'.$class.' h5{color:'.$colorA.'; border-color:'.$colorB.';}';}
			if ($class == 'partsH5-34'){echo '.'.$class.' h5::before{background-color:'.$colorB.';}';}
			if ($class == 'partsH5-34'){echo '.'.$class.' h5::after{background-color:'.$colorB.';}';}

			if ($class == 'partsH5-41'){echo '.'.$class.' h5{color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%); border-color:'.$colorC.';}';}
			if ($class == 'partsH5-42'){echo '.'.$class.' h5{color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%); border-color:'.$colorC.';}';}
			if ($class == 'partsH5-43'){echo '.'.$class.' h5{color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%); border-color:'.$colorC.';}';}
			if ($class == 'partsH5-44'){echo '.'.$class.' h5{color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%); border-color:'.$colorC.';}';}
			if ($class == 'partsH5-45'){echo '.'.$class.' h5{color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%); border-color:'.$colorC.';}';}
			if ($class == 'partsH5-46'){echo '.'.$class.' h5{color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%); border-color:'.$colorC.';}';}
			if ($class == 'partsH5-47'){echo '.'.$class.' h5{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH5-48'){echo '.'.$class.' h5{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH5-49'){echo '.'.$class.' h5{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH5-50'){echo '.'.$class.' h5{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}

			if ($class == 'partsH5-61'){echo '.'.$class.' h5{color:'.$colorA.';}';}
			if ($class == 'partsH5-61'){echo '.'.$class.' h5::after{background-color:'.$colorB.';}';}
			if ($class == 'partsH5-62'){echo '.'.$class.' h5{color:'.$colorA.'; background-color: '.$colorB.';}';}
			if ($class == 'partsH5-62'){echo '.'.$class.' h5::after{background-color:'.$colorA.';}';}
			if ($class == 'partsH5-63'){echo '.'.$class.' h5{color:'.$colorA.'; background-color: '.$colorB.'; border-color: '.$colorC.';}';}
			if ($class == 'partsH5-63'){echo '.'.$class.' h5::after{background-color:'.$colorA.';}';}
			if ($class == 'partsH5-64'){echo '.'.$class.' h5{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH5-64'){echo '.'.$class.' h5::after{background-color:'.$colorA.';}';}
			if ($class == 'partsH5-65'){echo '.'.$class.' h5{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH5-65'){echo '.'.$class.' h5::after{background-color:'.$colorA.';}';}

			if ($class == 'partsH5-71'){echo '.'.$class.' h5{color:'.$colorA.';}';}
			if ($class == 'partsH5-71'){echo '.'.$class.' h5::after{border-color:'.$colorB.';}';}
			if ($class == 'partsH5-72'){echo '.'.$class.' h5{color:'.$colorA.'; background-color: '.$colorB.';}';}
			if ($class == 'partsH5-72'){echo '.'.$class.' h5::after{border-color:'.$colorA.';}';}
			if ($class == 'partsH5-73'){echo '.'.$class.' h5{color:'.$colorA.'; background-color: '.$colorB.'; border-color: '.$colorC.';}';}
			if ($class == 'partsH5-73'){echo '.'.$class.' h5::after{border-color:'.$colorA.';}';}
			if ($class == 'partsH5-74'){echo '.'.$class.' h5{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH5-74'){echo '.'.$class.' h5::after{border-color:'.$colorA.';}';}
			if ($class == 'partsH5-75'){echo '.'.$class.' h5{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
			if ($class == 'partsH5-75'){echo '.'.$class.' h5::after{border-color:'.$colorA.';}';}

			if ($class == 'partsH5-81'){echo '.'.$class.' h5{color:'.$colorA.';}';}
			if ($class == 'partsH5-81'){echo '.'.$class.' h5:first-letter{color:'.$colorB.';}';}
			if ($class == 'partsH5-82'){echo '.'.$class.' h5{color:'.$colorA.';}';}
			if ($class == 'partsH5-82'){echo '.'.$class.' h5:first-letter{color:'.$colorB.';}';}
			if ($class == 'partsH5-83'){echo '.'.$class.' h5{color:'.$colorA.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH5-83'){echo '.'.$class.' h5:first-letter{color:'.$colorB.';}';}
			if ($class == 'partsH5-84'){echo '.'.$class.' h5{color:'.$colorA.'; border-color:'.$colorC.';}';}
			if ($class == 'partsH5-84'){echo '.'.$class.' h5:first-letter{color:'.$colorB.';}';}

		//個別ページulリストのカラー
			$colorA = '#a83f3f';
			$colorB = '#191919';
			$colorC = '#f2f2f2';
			$class  = 'partsUl-'.get_option('fit_partsList_ul');

			if(get_theme_mod( 'fit_partsList_ulColorA' )){
				$colorA = esc_attr( get_theme_mod( 'fit_partsList_ulColorA' ));
			}
			if(get_theme_mod( 'fit_partsList_ulColorB' )){
				$colorB = esc_attr( get_theme_mod( 'fit_partsList_ulColorB' ));
			}
			if(get_theme_mod( 'fit_partsList_ulColorC' )){
				$colorC = esc_attr( get_theme_mod( 'fit_partsList_ulColorC' ));
			}

			echo '.content ul > li::before{color:'.$colorA.';}';

			if ($class == 'partsUl-' || $class == 'partsUl-off' ){echo '.content ul{color:'.$colorB.';}';}
			if ($class == 'partsUl-1' ){echo '.'.$class.' ul{color:'.$colorB.'; background-color:'.$colorC.';}';}
			if ($class == 'partsUl-2' ){echo '.'.$class.' ul{border-color:'.$colorB.'; background-color:'.$colorC.'; box-shadow: 0px 0px 0px 5px '.$colorC.';}';}
			if ($class == 'partsUl-3' ){echo '.'.$class.' ul{color:'.$colorB.'; background-color:'.$colorC.';}';}
			if ($class == 'partsUl-4' ){echo '.'.$class.' ul{color:'.$colorB.'; background-color:'.$colorC.';}';}
			if ($class == 'partsUl-5' ){echo '.'.$class.' ul{border-color:'.$colorB.'; background-color:'.$colorC.';}';}
			if ($class == 'partsUl-6' ){echo '.'.$class.' ul{border-color:'.$colorB.'; background-color:'.$colorC.';}';}
			if ($class == 'partsUl-7' ){echo '.'.$class.' ul{color:'.$colorB.'; border-color:'.$colorC.';}';}
			if ($class == 'partsUl-7' ){echo '.'.$class.' ul::before{background-color:'.$colorC.';}';}
			if ($class == 'partsUl-7' ){echo '.'.$class.' ul::after{background-color:'.$colorC.';}';}

		//個別ページolリストのカラー
			$colorA = '#a83f3f';
			$colorB = '#191919';
			$colorC = '#f2f2f2';
			$class  = 'partsOl-'.get_option('fit_partsList_ol');

			if(get_theme_mod( 'fit_partsList_olColorA' )){
				$colorA = esc_attr( get_theme_mod( 'fit_partsList_olColorA' ));
			}
			if(get_theme_mod( 'fit_partsList_olColorB' )){
				$colorB = esc_attr( get_theme_mod( 'fit_partsList_olColorB' ));
			}
			if(get_theme_mod( 'fit_partsList_olColorC' )){
				$colorC = esc_attr( get_theme_mod( 'fit_partsList_olColorC' ));
			}

			echo '.content ol > li::before{color:'.$colorA.'; border-color:'.$colorA.';}';
			echo '.content ol > li > ol > li::before{background-color:'.$colorA.'; border-color:'.$colorA.';}';
			echo '.content ol > li > ol > li > ol > li::before{color:'.$colorA.'; border-color:'.$colorA.';}';

			if ($class == 'partsOl-' || $class == 'partsOl-off' ){echo '.content ol{color:'.$colorB.';}';}
			if ($class == 'partsOl-1' ){echo '.'.$class.' ol{color:'.$colorB.'; background-color:'.$colorC.';}';}
			if ($class == 'partsOl-2' ){echo '.'.$class.' ol{border-color:'.$colorB.'; background-color:'.$colorC.'; box-shadow: 0px 0px 0px 5px '.$colorC.';}';}
			if ($class == 'partsOl-3' ){echo '.'.$class.' ol{color:'.$colorB.'; background-color:'.$colorC.';}';}
			if ($class == 'partsOl-4' ){echo '.'.$class.' ol{color:'.$colorB.'; background-color:'.$colorC.';}';}
			if ($class == 'partsOl-5' ){echo '.'.$class.' ol{border-color:'.$colorB.'; background-color:'.$colorC.';}';}
			if ($class == 'partsOl-6' ){echo '.'.$class.' ol{border-color:'.$colorB.'; background-color:'.$colorC.';}';}
			if ($class == 'partsOl-7' ){echo '.'.$class.' ol{color:'.$colorB.'; border-color:'.$colorC.';}';}
			if ($class == 'partsOl-7' ){echo '.'.$class.' ol::before{background-color:'.$colorC.';}';}
			if ($class == 'partsOl-7' ){echo '.'.$class.' ol::after{background-color:'.$colorC.';}';}

		//個別ページ吹き出しのカラー
			$colorA = '#191919';
			$colorB = '#f2f2f2';
			$colorC = '#191919';
			$colorD = '#ffffff';
			$colorE = '#d8d8d8';

			if(get_theme_mod( 'fit_partsList_balloonBgColorA' )){
				$colorA = esc_attr( get_theme_mod( 'fit_partsList_balloonBgColorA' ));
			}
			if(get_theme_mod( 'fit_partsList_balloonBgColorB' )){
				$colorB = esc_attr( get_theme_mod( 'fit_partsList_balloonBgColorB' ));
			}
			if(get_theme_mod( 'fit_partsList_balloonBrColorA' )){
				$colorC = esc_attr( get_theme_mod( 'fit_partsList_balloonBrColorA' ));
			}
			if(get_theme_mod( 'fit_partsList_balloonBrColorB' )){
				$colorD = esc_attr( get_theme_mod( 'fit_partsList_balloonBrColorB' ));
			}
			if(get_theme_mod( 'fit_partsList_balloonBrColorC' )){
				$colorE = esc_attr( get_theme_mod( 'fit_partsList_balloonBrColorC' ));
			}
			echo '.content .balloon .balloon__text{color:'.$colorA.'; background-color:'.$colorB.';}';
			echo '.content .balloon .balloon__text-left:before{border-left-color:'.$colorB.';}';
			echo '.content .balloon .balloon__text-right:before{border-right-color:'.$colorB.';}';

			echo '.content .balloon-boder .balloon__text{color:'.$colorC.'; background-color:'.$colorD.';  border-color:'.$colorE.';}';
			echo '.content .balloon-boder .balloon__text-left:before{border-left-color:'.$colorE.';}';
			echo '.content .balloon-boder .balloon__text-left:after{border-left-color:'.$colorD.';}';
			echo '.content .balloon-boder .balloon__text-right:before{border-right-color:'.$colorE.';}';
			echo '.content .balloon-boder .balloon__text-right:after{border-right-color:'.$colorD.';}';

		//個別ページ引用のカラー
			$colorA = '#191919';
			$colorB = '#f2f2f2';
			$colorC = '#d8d8d8';
			$colorD = '#cccccc';
			$class  = 'partsQuote-'.get_option('fit_partsList_quote');

			if(get_theme_mod( 'fit_partsList_quoteColorA' )){
				$colorA = esc_attr( get_theme_mod( 'fit_partsList_quoteColorA' ));
			}
			if(get_theme_mod( 'fit_partsList_quoteColorB' )){
				$colorB = esc_attr( get_theme_mod( 'fit_partsList_quoteColorB' ));
			}
			if(get_theme_mod( 'fit_partsList_quoteColorC' )){
				$colorC = esc_attr( get_theme_mod( 'fit_partsList_quoteColorC' ));
			}
			if(get_theme_mod( 'fit_partsList_quoteColorD' )){
				$colorD = esc_attr( get_theme_mod( 'fit_partsList_quoteColorD' ));
			}

			if ($class == 'partsQuote-' || $class == 'partsQuote-off'){echo '.content blockquote{color:'.$colorA.'; background-color:'.$colorB.';}';}
			if ($class == 'partsQuote-' || $class == 'partsQuote-off'){echo '.content blockquote::before{color:'.$colorC.';}';}

			if ($class == 'partsQuote-1' ){echo '.content blockquote{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorD.';}';}
			if ($class == 'partsQuote-1' ){echo '.content blockquote::before{color:'.$colorC.';}';}

			if ($class == 'partsQuote-2' ){echo '.content blockquote{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorD.';}';}
			if ($class == 'partsQuote-2' ){echo '.content blockquote::before{color:'.$colorC.';}';}

			if ($class == 'partsQuote-3' ){echo '.content blockquote{color:'.$colorA.'; background-color:'.$colorB.';}';}
			if ($class == 'partsQuote-3' ){echo '.content blockquote::before{color:'.$colorC.';}';}

			if ($class == 'partsQuote-4' ){echo '.content blockquote{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorD.';}';}
			if ($class == 'partsQuote-4' ){echo '.content blockquote::before{color:'.$colorC.';}';}
			if ($class == 'partsQuote-4' ){echo '.content blockquote::after{background-color:'.$colorD.';}';}

			if ($class == 'partsQuote-5' ){echo '.content blockquote{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorD.';}';}
			if ($class == 'partsQuote-5' ){echo '.content blockquote::before{color:'.$colorC.';}';}

			if ($class == 'partsQuote-6' ){echo '.content blockquote{color:'.$colorA.'; background-color:'.$colorB.';}';}
			if ($class == 'partsQuote-6' ){echo '.content blockquote::before{background-color:'.$colorC.';}';}
			if ($class == 'partsQuote-6' ){echo '.content blockquote::after{border-bottom-color:'.$colorD.';}';}

		//個別ページテーブルのカラー
			$colorA = '#191919';
			$colorB = '#E5E5E5';
			$colorC = '#7f7f7f';
			$colorD = '#ffffff';
			$colorE = '#ffffff';
			$colorF = '#f2f2f2';

			if(get_theme_mod( 'fit_partsList_tableColorA' )){
				$colorA = esc_attr( get_theme_mod( 'fit_partsList_tableColorA' ));
			}
			if(get_theme_mod( 'fit_partsList_tableColorB' )){
				$colorB = esc_attr( get_theme_mod( 'fit_partsList_tableColorB' ));
			}
			if(get_theme_mod( 'fit_partsList_tableColorC' )){
				$colorC = esc_attr( get_theme_mod( 'fit_partsList_tableColorC' ));
			}
			if(get_theme_mod( 'fit_partsList_tableColorD' )){
				$colorD = esc_attr( get_theme_mod( 'fit_partsList_tableColorD' ));
			}
			if(get_theme_mod( 'fit_partsList_tableColorE' )){
				$colorE = esc_attr( get_theme_mod( 'fit_partsList_tableColorE' ));
			}
			if(get_theme_mod( 'fit_partsList_tableColorF' )){
				$colorF = esc_attr( get_theme_mod( 'fit_partsList_tableColorF' ));
			}

			echo '.content table{color:'.$colorA.'; border-top-color:'.$colorB.'; border-left-color:'.$colorB.';}';
			echo '.content table th{background:'.$colorC.'; color:'.$colorD.'; ;border-right-color:'.$colorB.'; border-bottom-color:'.$colorB.';}';
			echo '.content table td{background:'.$colorE.'; ;border-right-color:'.$colorB.'; border-bottom-color:'.$colorB.';}';
			echo '.content table tr:nth-child(odd) td{background-color:'.$colorF.';}';




		echo "\n".'</style>'."\n";


	}
	add_action('wp_head', 'fit_head');
}




////////////////////////////////////////////////////////
//wp_head　不要タグの削除
////////////////////////////////////////////////////////

remove_action( 'wp_head', 'wp_generator' ); //WordPressのバージョン情報
remove_action( 'wp_head', 'rsd_link' ); //外部アプリケーションから情報を取得するタグ
remove_action( 'wp_head', 'wlwmanifest_link' ); //Windows Live Writer用のタグ
remove_action( 'wp_head', 'index_rel_link' ); //現在の文書に対する「索引」であることを示すタグ
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 ); //「?p=投稿ID」形式のデフォルトパーマリンクタグ

//「link rel=next」等のタグ
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

//フィード関連のタグ
remove_action( 'wp_head', 'feed_links', 2);
remove_action( 'wp_head', 'feed_links_extra', 3);

//絵文字関連タグ
remove_action( 'wp_head', 'print_emoji_detection_script', 7);
remove_action( 'admin_print_scripts', 'print_emoji_detection_script');
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles');
add_filter( 'emoji_svg_url', '__return_false' );

//canonical削除
remove_action('wp_head', 'rel_canonical');

//最近のコメント用インラインスタイルタグ
function remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'remove_recent_comments_style' );
