<?php
////////////////////////////////////////////////////////
//wp_footer JSファイル読み込み設定
////////////////////////////////////////////////////////

//JSファイル読み込み時にtype属性を削除
function fit_remove_script_type($tag) {
	return str_replace(" type='text/javascript'", "", $tag);
}
add_filter('script_loader_tag','fit_remove_script_type');


if(!function_exists('fit_footer_scripts'))  {

	function fit_footer_scripts() {
		//IE専用objectFitイメージ処理JS
		$ua = $_SERVER['HTTP_USER_AGENT'];
		if (strstr($ua, 'Trident') || strstr($ua, 'MSIE')) {
			wp_enqueue_script('ofi', get_template_directory_uri().'/js/ofi.min.js');
		}

		//コメント返信時、表示位置変更js
		if (is_single()){
			wp_enqueue_script("comment-reply");
		}

		//全ページ共通JS(ヘッダー固定時と通常時で分岐)
		if (get_option('fit_conHeader_fixed') == 'on' ){
			//スムーズスクロール & タブ・アコーディオンメニュー & 追従クローンヘッダー
			wp_enqueue_script('smoothlinkFixed', get_template_directory_uri().'/js/smoothlinkFixed.min.js');
		}else{
			//スムーズスクロール & タブ・アコーディオンメニュー
			wp_enqueue_script('smoothlink', get_template_directory_uri().'/js/smoothlink.min.js');
		}

		//背景動画用JS
		if(!is_mobile() && get_option('fit_homeMainimg_switch') == 'on' && get_option('fit_homeMainimg_mode') == 'movie' && is_front_page()){
			wp_enqueue_script('YTPlayer', get_template_directory_uri().'/js/jquery.mb.YTPlayer.min.js');
			?>
			<script>
			jQuery(function($){
				if( window.matchMedia('(min-width:768px)').matches ){
					$("#bgVideo").YTPlayer();
				}
			});
			</script>
			<?php
		}

		//スライドショー&カルーセル用JS
		if(get_option('fit_homeMainimg_switch') == 'on' && get_option('fit_homeMainimg_mode ') == 'slider' && is_front_page() ||
		   get_option('fit_homeCarousel_switch') == 'on' && is_front_page()){
			wp_enqueue_script('swiper', get_template_directory_uri().'/js/swiper.min.js' );
		}

		//レイアウト切替ボタンのcookie用JS
		if(get_option('fit_archiveCtl_switch') == 'on' && get_option('fit_archiveCtl_layout') == 'on' && !is_singular()){
			wp_enqueue_script('cookie', get_template_directory_uri().'/js/js.cookie.min.js');
		}

		//追従サイドバー用JS
		if(!is_mobile() && is_active_sidebar( 'sidebar-sticky' )){
			wp_enqueue_script('fit-sidebar', get_template_directory_uri().'/js/fit-sidebar.min.js');
			?>
			<script>
			jQuery(function($) {
				$('.widgetSticky').fitSidebar({
					wrapper : '.l-wrapper',
					responsiveWidth : 768
				});
			});
			</script>
			<?php
		}

		//img非同期読み込み用JS
		if(get_option('fit_seoImg_lazy')){
			global $is_IE;
			if( is_feed() || is_preview() || is_mobile() || is_admin() || $is_IE ) {}
			else{
				wp_enqueue_script('layzr', get_template_directory_uri().'/js/layzr.min.js');
			}
		}


		//CSS非同期読み込み用JS
		if(get_option('fit_seoCss_swiper') || get_option('fit_seoCss_YTPlayer') || get_option('fit_seoCss_icon') || get_option('fit_seoCss_lato') || get_option('fit_seoCss_fjalla') || get_option('fit_seoCss_main') ) {
			echo '<script>Array.prototype.forEach.call(document.getElementsByClassName("css-async"), function(e){e.rel = "stylesheet"});</script>'."\n";
		}

		//PWA用JS
		if (get_option('fit_pwaFunction_switch') == 'on') {
			echo '<script>
			window.addEventListener("load",function(){
				"serviceWorker"in navigator&&navigator.serviceWorker.register("'.(is_ssl() ? 'https' : 'http') . '://' . $_SERVER["HTTP_HOST"].'/serviceWorker.js").then(function(){
					console.log("serviceWorker registed.")
				})["catch"](function(e){
					console.warn("serviceWorker error.",e)
				})
			});</script>';
		} else {
			// サービスワーカーの登録解除とキャッシュのクリア
			wp_enqueue_script( 'unregeister-worker', get_template_directory_uri() . '/js/unregister-worker.min.js', array( 'jquery' ) );
		}


		//パンくず用構造化マークアップ
		if(is_singular('post')): //投稿ページ用
		?>
		<script type="application/ld+json">
		{ "@context":"http://schema.org",
		  "@type": "BreadcrumbList",
		  "itemListElement":
		  [
		    {"@type": "ListItem","position": 1,"item":{"@id": "<?php echo home_url(); ?>","name": "HOME"}},
		<?php
		//パンくずの階層用
		$i=1;
		//カテゴリーに関する情報を取得
		$categories = get_the_category(get_the_id());
		$cat = $categories[0];
		//先祖のカテゴリーがあれば(0でなければ)分岐
		if($cat -> parent != 0){
		    //先祖のカテゴリーを配列で取得
		    $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
		    //$ancestorsの配列から一つ一つ$ancestorに取り出してなくなるまでくりかえす
		    foreach($ancestors as $ancestor){
		        $i++;
		        echo '    {"@type": "ListItem","position": '.$i.',"item":{"@id": "'. get_category_link($ancestor).'","name": "'. get_cat_name($ancestor). '"}},'.PHP_EOL;
		    }
		}
		//属していてる直接のカテゴリーの情報を出力
		$i++;
		echo '    {"@type": "ListItem","position": '.$i.',"item":{"@id": "'. get_category_link($cat -> term_id). '","name": "'. $cat-> cat_name . '"}},'.PHP_EOL;
		//表示されている投稿ページの情報を出力
		$i++;
		echo '    {"@type": "ListItem","position": '.$i.',"item":{"@id": "'. esc_url(get_permalink()). '","name": "'. esc_html(get_the_title()) . '"}}'.PHP_EOL;
		?>
		  ]
		}
		</script>



	<?php elseif(is_page() && !is_front_page()): //固定ページ用(フロント固定以外) ?>
		<script type="application/ld+json">
		{ "@context":"http://schema.org",
		  "@type": "BreadcrumbList",
		  "itemListElement":
		  [
		    {"@type": "ListItem","position": 1,"item":{"@id": "<?php echo home_url(); ?>","name": "HOME"}},
		<?php
		global $post;
		//ベージごとに必要な情報のベースを取得。先祖の有無判断に利用。
		$obj = get_queried_object();
		$i=1;
		//先祖の固定ページがあれば(0でなければ)分岐
		if($obj -> post_parent != 0){
		    //先祖の固定ページを配列で取得
		    $pageAncestors = array_reverse( $post -> ancestors );
		    //$ancestorsの配列から一つ一つ$ancestorに取り出してなくなるまでくりかえす
		    foreach ($pageAncestors as $pageAncestor) {
		        $i++;
		        echo '    {"@type": "ListItem","position": '.$i.',"item":{"@id": "'. esc_url(get_permalink($pageAncestor)).'","name": "'. esc_html(get_the_title($pageAncestor)). '"}},'.PHP_EOL;
		    }
		}
		//表示されている固定ページの情報を出力
		$i++;
		echo '    {"@type": "ListItem","position": '.$i.',"item":{"@id": "'. esc_url(get_permalink()). '","name": "'. esc_html(get_the_title()) . '"}}'.PHP_EOL;
		?>
		  ]
		}
		</script>


		<?php elseif(is_category()): //カテゴリーアーカイブページ用 ?>
		<script type="application/ld+json">
		{ "@context":"http://schema.org",
		  "@type": "BreadcrumbList",
		  "itemListElement":
		  [
		    {"@type": "ListItem","position": 1,"item":{"@id": "<?php echo home_url(); ?>","name": "HOME"}},
		<?php
		//パンくずの階層用
		$i=1;
		//カテゴリーに関する情報を取得
		$categories = get_the_category(get_the_id());
		$cat = $categories[0];
		//カテゴリーアーカイブのタイトルを取得
		$cattitle = get_the_archive_title();
		//先祖のカテゴリーがあれば(0でなければ)分岐
		if($cat -> parent != 0){
		    //先祖のカテゴリーを配列で取得
		    $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
		    //$ancestorsの配列から一つ一つ$ancestorに取り出してなくなるまでくりかえす
		    foreach($ancestors as $ancestor){
		        $i++;
		        echo '    {"@type": "ListItem","position": '.$i.',"item":{"@id": "'. get_category_link($ancestor).'","name": "'. get_cat_name($ancestor). '"}},'.PHP_EOL;
		    }
		}
		//表示されているカテゴリーの情報を出力
		$i++;
		echo '    {"@type": "ListItem","position": '.$i.',"item":{"@id": "'. get_category_link($cat -> term_id). '","name": "'. $cattitle . '"}}'.PHP_EOL;
		?>
		  ]
		}
		</script>


		<?php elseif(is_tag()): //タグアーカイブページ用 ?>
		<script type="application/ld+json">
		{ "@context":"http://schema.org",
		  "@type": "BreadcrumbList",
		  "itemListElement":
		  [
		    {"@type": "ListItem","position": 1,"item":{"@id": "<?php echo home_url(); ?>","name": "HOME"}},
		<?php
		$tagName = single_tag_title('', false);
		$tag = get_term_by('name', $tagName, 'post_tag');
		$link = get_tag_link($tag->term_id);
		echo '    {"@type": "ListItem","position": 2,"item":{"@id": "'. esc_url($link). '","name": "'. esc_html($tagName) . '"}}'.PHP_EOL;
		?>
		  ]
		}
		</script>


		<?php elseif(is_author()): //投稿者アーカイブページ用 ?>
		<script type="application/ld+json">
		{ "@context":"http://schema.org",
		  "@type": "BreadcrumbList",
		  "itemListElement":
		  [
		    {"@type": "ListItem","position": 1,"item":{"@id": "<?php echo home_url(); ?>","name": "HOME"}},
		<?php
		//執筆者のIDを取得
		$userId = get_query_var('author');
		//執筆者の名前を取得
		$authorName = get_the_author_meta( 'display_name', $userId );
		echo '    {"@type": "ListItem","position": 2,"item":{"@id": "'. esc_url(get_author_posts_url($userId)). '","name": "'. esc_html($authorName) . '"}}'.PHP_EOL;
		?>
		  ]
		}
		</script>


		<?php elseif(is_date()): //年月日アーカイブページ用 ?>
		<script type="application/ld+json">
		{ "@context":"http://schema.org",
		  "@type": "BreadcrumbList",
		  "itemListElement":
		  [
		    {"@type": "ListItem","position": 1,"item":{"@id": "<?php echo home_url(); ?>","name": "HOME"}},
		<?php
		//年月日を取得
		$y = get_query_var('year');
		$m = get_query_var('monthnum');
		$d = get_query_var('day');
		//年月日のアーカイブのリンクを取得
		$linkY = get_year_link($y);
		$linkM = get_month_link($y,$m);
		$linkD = get_month_link($y,$m,$d);
		if(is_day()){
		    echo '    {"@type": "ListItem","position": 2,"item":{"@id": "'. esc_url($linkY).'","name": "'. esc_html($y).'年"}},'.PHP_EOL;
		    echo '    {"@type": "ListItem","position": 3,"item":{"@id": "'. esc_url($linkM).'","name": "'. esc_html($m).'月"}},'.PHP_EOL;
		    echo '    {"@type": "ListItem","position": 4,"item":{"@id": "'. esc_url($linkD).'","name": "'. esc_html($d). '日"}}'.PHP_EOL;
		} elseif(is_month()){
		    echo '    {"@type": "ListItem","position": 2,"item":{"@id": "'. esc_url($linkY).'","name": "'. esc_html($y).'年"}},'.PHP_EOL;
		    echo '    {"@type": "ListItem","position": 3,"item":{"@id": "'. esc_url($linkM).'","name": "'. esc_html($m).'月"}}'.PHP_EOL;
		} elseif(is_year()) {
		    echo '    {"@type": "ListItem","position": 2,"item":{"@id": "'. esc_url($linkY).'","name": "'. esc_html($y).'年"}}'.PHP_EOL;
		}
		?>
		  ]
		}
		</script>


		<?php elseif(is_search()): //検索ページ用 ?>
		<script type="application/ld+json">
		{ "@context":"http://schema.org",
		  "@type": "BreadcrumbList",
		  "itemListElement":
		  [
		    {"@type": "ListItem","position": 1,"item":{"@id": "<?php echo home_url(); ?>","name": "HOME"}},
		<?php
		echo '    {"@type": "ListItem","position": 2,"item":{"@id": "'. esc_url(get_search_link()). '","name": "「'. esc_html(get_search_query()) . '」で検索した結果"}}'.PHP_EOL;
		?>
		  ]
		}
		</script>


		<?php elseif(is_attachment()): //添付ファイルページ用 ?>
		<script type="application/ld+json">
		{ "@context":"http://schema.org",
		  "@type": "BreadcrumbList",
		  "itemListElement":
		  [
		    {"@type": "ListItem","position": 1,"item":{"@id": "<?php echo home_url(); ?>","name": "HOME"}},
		<?php
		//パンくずの階層用
		$i=1;
		//ベージごとに必要な情報のベースを取得。先祖の有無判断に利用。
		$obj = get_queried_object();
		//先祖の挿入元のページがあれば(0でなければ)分岐
		if($obj -> parent != 0){
		    $i++;
		    echo '    {"@type": "ListItem","position": '.$i.',"item":{"@id": "'. esc_url(get_permalink($pageAncestor)).'","name": "'. esc_html(get_the_title($pageAncestor)). '"}},'.PHP_EOL;
		}
		//表示されている固定ページの情報を出力
		$i++;
		echo '    {"@type": "ListItem","position": '.$i.',"item":{"@id": "'. esc_url(get_permalink()). '","name": "'. esc_html(get_the_title()) . '"}}'.PHP_EOL;
		?>
		  ]
		}
		</script>
		<?php endif;

	}
	add_action('wp_footer', 'fit_footer_scripts');
}
