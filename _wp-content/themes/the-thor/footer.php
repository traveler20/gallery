  <!--l-footerTop-->
  <div class="l-footerTop">

    <?php if(get_option('fit_conFootCta_switch') == 'on' ):?>
    <div class="wider">
      <!--commonCtr-->
      <div class="commonCtr">

        <div class="commonCtr__bg mask<?php if(get_option('fit_conFootCta_mask') && get_option('fit_conFootCta_mask') != 'off'): ?> mask-<?php echo get_option('fit_conFootCta_mask') ?><?php endif; ?>">
        <?php if(get_fit_FootCta_bgImg()):?>
          <?php
          $img_date = get_fit_FootCta_bgImg();
          $img_id = attachment_url_to_postid($img_date);
          $imgSp = wp_get_attachment_image_src( $img_id, 'icatch768' );
          $imgPc = wp_get_attachment_image_src( $img_id, 'icatch1280' );
          ?>
          <?php if(is_mobile()):?>
            <img class="commonCtr__bg" <?php echo fit_correct_src(); ?>="<?php echo $imgSp[0]; ?>" alt="><?php echo get_option('fit_conFootCta_title') ?>" width="<?php echo $imgSp[1]; ?>" height="<?php echo $imgSp[2]; ?>" <?php echo fit_dummy_src(); ?>>
          <?php else : ?>
            <img class="commonCtr__bg" <?php echo fit_correct_src(); ?>="<?php echo $imgPc[0]; ?>" alt="><?php echo get_option('fit_conFootCta_title') ?>" width="<?php echo $imgPc[1]; ?>" height="<?php echo $imgPc[2]; ?>" <?php echo fit_dummy_src(); ?>>
          <?php endif; ?>
        <?php elseif ( get_fit_noimg()): ?>
          <img class="commonCtr__bg" <?php echo fit_correct_src(); ?>="<?php echo get_fit_noimg(); ?>" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
        <?php else: ?>
          <img class="commonCtr__bg" <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_1280.gif" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
        <?php endif; ?>
        </div>

        <div class="container">

          <div class="commonCtr__container">
            <div class="commonCtr__contents">
              <?php if(get_option('fit_conFootCta_title')):?><h2 class="heading heading-commonCtr u-white"><?php echo get_option('fit_conFootCta_title') ?></h2><?php endif; ?>
              <?php if(get_option('fit_conFootCta_contents')):?>
              <p class="phrase phrase-bottom u-white">
                <?php echo get_option('fit_conFootCta_contents') ?>
              </p>
              <?php endif; ?>
              <?php if(get_option('fit_conFootCta_btn') && get_option('fit_conFootCta_url')):?>
              <div class="btn btn-center">
                <a class="btn__link btn__link-primary" href="<?php echo get_option('fit_conFootCta_url') ?>"><?php echo get_option('fit_conFootCta_btn') ?></a>
              </div>
              <?php endif; ?>
            </div>
            <?php if(get_fit_FootCta_eyecatch()):?>
              <?php
              $img_date = get_fit_FootCta_eyecatch();
              $img_id = attachment_url_to_postid($img_date);
              $img = wp_get_attachment_image_src( $img_id, 'icatch768' );
              ?>
            <div class="commonCtr__image">
              <img class="" <?php echo fit_correct_src(); ?>="<?php echo $img[0]; ?>" alt="CTR IMG" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>" <?php echo fit_dummy_src(); ?>>
            </div>
            <?php endif; ?>
          </div>

        </div>

      </div>
      <!--commonCtr-->
    </div>
    <?php endif; ?>

  </div>
  <!--/l-footerTop-->


  <!--l-footer-->
  <footer class="l-footer">

    <?php $opt = get_option('fit_snsFollow'); ?>
    <?php if (
		!empty($opt['FBFollowF']) && !empty($opt['FBPage']) ||
		!empty($opt['twitterFollowF']) && !empty($opt['twitterId']) ||
		!empty($opt['instaFollowF']) && !empty($opt['insta']) ||
		!empty($opt['googleFollowF']) && !empty($opt['googleUrl']) ||
		!empty($opt['youtubeFollowF']) && !empty($opt['youtubeUrl']) ||
		!empty($opt['linkedinFollowF']) && !empty($opt['linkedinUrl']) ||
		!empty($opt['pinterestFollowF']) && !empty($opt['pinterestUrl']) ||
		!empty($opt['rssFollowF'])
		):
	?>
    <div class="wider">
      <!--snsFooter-->
      <div class="snsFooter">
        <div class="container">

          <ul class="snsFooter__list">
		  <?php if (!empty($opt['FBFollowF']) && !empty($opt['FBPage']) ):?>
            <li class="snsFooter__item"><a class="snsFooter__link icon-facebook" href="https://www.facebook.com/<?php echo $opt['FBPage']; ?>"></a></li>
		  <?php endif; if (!empty($opt['twitterFollowF']) && !empty($opt['twitterId']) ) :?>
            <li class="snsFooter__item"><a class="snsFooter__link icon-twitter" href="https://twitter.com/<?php echo $opt['twitterId']; ?>"></a></li>
		  <?php endif; if (!empty($opt['instaFollowF']) && !empty($opt['insta']) ) :?>
            <li class="snsFooter__item"><a class="snsFooter__link icon-instagram" href="http://instagram.com/<?php echo $opt['insta']; ?>"></a></li>
		  <?php endif; if (!empty($opt['googleFollowF']) && !empty($opt['googleUrl']) ) :?>
            <li class="snsFooter__item"><a class="snsFooter__link icon-google-plus" href="https://plus.google.com/<?php echo $opt['googleUrl']; ?>"></a></li>
          <?php endif; if (!empty($opt['youtubeFollowF']) && !empty($opt['youtubeUrl']) ) :?>
            <li class="snsFooter__item"><a class="snsFooter__link icon-youtube" href="https://www.youtube.com/channel/<?php echo $opt['youtubeUrl']; ?>"></a></li>
          <?php endif; if (!empty($opt['linkedinFollowF']) && !empty($opt['linkedinUrl']) ) :?>
            <li class="snsFooter__item"><a class="snsFooter__link icon-linkedin" href="http://ca.linkedin.com/in/<?php echo $opt['linkedinUrl']; ?>"></a></li>
          <?php endif; if (!empty($opt['pinterestFollowF']) && !empty($opt['pinterestUrl']) ) :?>
            <li class="snsFooter__item"><a class="snsFooter__link icon-pinterest" href="https://www.pinterest.jp/<?php echo $opt['pinterestUrl']; ?>"></a></li>
          <?php endif; if (!empty($opt['rssFollowF'])):?>
            <?php if (!empty($opt['rssUrl'])): ?>
              <li class="snsFooter__item"><a class="snsFooter__link icon-rss" href="<?php echo $opt['rssUrl']; ?>"></a></li>
            <?php else : ?>
              <li class="snsFooter__item"><a class="snsFooter__link icon-rss" href="<?php bloginfo('rss2_url'); ?>"></a></li>
			<?php endif; ?>
		  <?php endif; ?>
          </ul>
        </div>
      </div>
      <!--/snsFooter-->
    </div>
    <?php endif; ?>



    <?php if ( is_active_sidebar('footer_left') || is_active_sidebar('footer_center') || is_active_sidebar('footer_right') ) : ?>
    <div class="container divider">
      <!--widgetFooter-->
      <div class="widgetFooter">

        <div class="widgetFooter__box">
        <?php if ( is_active_sidebar( 'footer_left' ) ) : ?>
		  <?php dynamic_sidebar( 'footer_left' ); ?>
		<?php endif; ?>
        </div>

        <div class="widgetFooter__box">
        <?php if ( is_active_sidebar( 'footer_center' ) ) : ?>
		  <?php dynamic_sidebar( 'footer_center' ); ?>
		<?php endif; ?>
        </div>

        <div class="widgetFooter__box">
        <?php if ( is_active_sidebar( 'footer_right' ) ) : ?>
		  <?php dynamic_sidebar( 'footer_right' ); ?>
		<?php endif; ?>
        </div>

      </div>
      <!--/widgetFooter-->
    </div>
    <?php endif; ?>


    <div class="wider">
      <!--bottomFooter-->
      <div class="bottomFooter">
        <div class="container">

          <?php if ( has_nav_menu( 'footer_menu' ) ) : //メニューセットあり ?>
            <nav class="bottomFooter__navi">
              <?php wp_nav_menu(array(
                'theme_location' => 'footer_menu',
                'depth' => 1,
      		      'items_wrap' => '<ul class="bottomFooter__list">%3$s</ul>',
      		      'container' => false,
      	      ));?>
            </nav>
          <?php endif; ?>

          <div class="bottomFooter__copyright">
          <?php if (get_option('fit_conFooter_copyright')): ?>
            <?php echo get_option('fit_conFooter_copyright'); ?>
          <?php else : ?>
			© Copyright <?php echo date_i18n( 'Y' ); ?> <a class="bottomFooter__link" href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>.
          <?php endif; ?>
          </div>

          <?php if (get_option('fit_conFooter_link') != 'off' ): ?>
          <div class="bottomFooter__producer">
		    <?php bloginfo( 'name' ); ?> by <a class="bottomFooter__link" href="http://fit-jp.com/" target="_blank">FIT-Web Create</a>. Powered by <a class="bottomFooter__link" href="https://wordpress.org/" target="_blank">WordPress</a>.
          </div>
          <?php endif; ?>

        </div>
        <a href="#top" class="bottomFooter__topBtn" id="bottomFooter__topBtn"></a>
      </div>
      <!--/bottomFooter-->


    </div>


    <?php if (get_option('fit_conFooterSp_menu') == 'on' ): ?>
    <div class="controllerFooter<?php if (get_option('fit_conFooterSp_divide') && get_option('fit_conFooterSp_divide') != 'off' ) : ?> controllerFooter-<?php echo get_option('fit_conFooterSp_divide');	?><?php endif; ?>">
      <ul class="controllerFooter__list">


		<?php if (get_option('fit_conFooterSp_menu_01') != 'free'): ?>
        <li class="controllerFooter__item">
          <a href="<?php echo home_url() ?>"><i class="icon-home"></i>ホーム</a>
        </li>
		<?php elseif (get_option('fit_conFooterSp_menu_01') == 'free' && get_option('fit_conFooterSp_menu_text01') && get_option('fit_conFooterSp_menu_url01')): ?>
        <li class="controllerFooter__item">
          <a href="<?php echo get_option('fit_conFooterSp_menu_url01'); ?>"><i class="<?php echo get_option('fit_conFooterSp_menu_icon01'); ?>"></i><?php echo get_option('fit_conFooterSp_menu_text01'); ?></a>
        </li>
		<?php endif; ?>


        <?php if (get_option('fit_conFooterSp_menu_02') != 'free'): ?>
        <li class="controllerFooter__item">
          <input class="controllerFooter__checkbox" id="controllerFooter-checkbox" type="checkbox">
          <label class="controllerFooter__link" for="controllerFooter-checkbox"><i class="icon-share2"></i>シェア</label>
          <label class="controllerFooter__unshown" for="controllerFooter-checkbox"></label>
          <div class="controllerFooter__content">
            <label class="controllerFooter__close" for="controllerFooter-checkbox"><i class="icon-close"></i></label>
            <div class="controllerFooter__contentInner">
              <?php fit_share_btnFooter(); ?>
            </div>
          </div>
        </li>
		<?php elseif (get_option('fit_conFooterSp_menu_02') == 'free' && get_option('fit_conFooterSp_menu_text02') && get_option('fit_conFooterSp_menu_url02')): ?>
        <li class="controllerFooter__item">
          <a href="<?php echo get_option('fit_conFooterSp_menu_url02'); ?>"><i class="<?php echo get_option('fit_conFooterSp_menu_icon02'); ?>"></i><?php echo get_option('fit_conFooterSp_menu_text02'); ?></a>
        </li>
		<?php endif; ?>


        <?php if (get_option('fit_conFooterSp_menu_03') != 'free'): ?>
        <li class="controllerFooter__item">
          <label class="controllerFooter__menuLabel" for="menuBtn-checkbox"><i class="icon-menu"></i>メニュー</label>
        </li>
		<?php elseif (get_option('fit_conFooterSp_menu_03') == 'free' && get_option('fit_conFooterSp_menu_text03') && get_option('fit_conFooterSp_menu_url03')): ?>
        <li class="controllerFooter__item">
          <a href="<?php echo get_option('fit_conFooterSp_menu_url03'); ?>"><i class="<?php echo get_option('fit_conFooterSp_menu_icon03'); ?>"></i><?php echo get_option('fit_conFooterSp_menu_text03'); ?></a>
        </li>
		<?php endif; ?>

        <?php if (get_option('fit_conFooterSp_menu_04') != 'free'): ?>
        <li class="controllerFooter__item">
          <a href="tel:<?php echo get_option('fit_conFooterSp_menu_tel'); ?>" ><i class="icon-phone"></i>電話</a>
        </li>
		<?php elseif (get_option('fit_conFooterSp_menu_04') == 'free' && get_option('fit_conFooterSp_menu_text04') && get_option('fit_conFooterSp_menu_url04')): ?>
        <li class="controllerFooter__item">
          <a href="<?php echo get_option('fit_conFooterSp_menu_url04'); ?>"><i class="<?php echo get_option('fit_conFooterSp_menu_icon04'); ?>"></i><?php echo get_option('fit_conFooterSp_menu_text04'); ?></a>
        </li>
		<?php endif; ?>




        <li class="controllerFooter__item">
          <a href="#top" class="controllerFooter__topBtn"><i class="icon-arrow-up"></i>TOPへ</a>
        </li>

      </ul>
    </div>
    <?php endif; ?>

  </footer>
  <!-- /l-footer -->

<?php
if (get_option('fit_seoHtml_press')){
  $compress = ob_get_clean();
  $compress = str_replace("\t", '', $compress);
  $compress = str_replace("\r", '', $compress);
  $compress = str_replace("\n", '', $compress);
  $compress = str_replace(array('   ', '    '), '', $compress);
  $compress = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $compress );
  $compress = preg_replace('/<!--[\s\S]*?-->/', '', $compress);
  echo $compress;
}
?>


<?php wp_footer(); ?>

<?php //TOPキービジュアルスライダー
if(get_option('fit_homeMainimg_switch') == 'on' && get_option('fit_homeMainimg_mode ') == 'slider' && is_front_page()): ?>
<script>
// swiper設定
jQuery(function( $ ) {
	<?php
	$effect = 'slide';
	if (get_option('fit_homeMainimg_slideEffect') != 'slide'){
		$effect = get_option('fit_homeMainimg_slideEffect');
	} ?>
	// メインビジュアルスライダー
	var swiper = new Swiper('.swiper-slider', {
		// オプションパラメータ
		loop: true,
		speed: 600, // スライドが切り替わるトランジション時間。
		slidesPerView: 1, // 何枚のスライドを表示するか
		spaceBetween: 0, // スライド間の余白サイズ(ピクセル)
		direction: 'horizontal', // スライド方向。 'horizontal'(水平) か 'vertical'(垂直)。effectオプションが 'slide' 以外は無効。
		effect: '<?php echo $effect ?>', // "slide", "fade"(フェード), "cube"(キューブ回転), "coverflow"(カバーフロー) または "flip"(平面回転)

		<?php if (get_option('fit_homeMainimg_slideLoop') == 'on'): ?>
		// スライダーの自動再生
		autoplay: {
			<?php
			$delay = '3000';
			if (get_option('fit_homeMainimg_slideDelay')){
				$delay = get_option('fit_homeMainimg_slideDelay');
			} ?>
			delay: '<?php echo $delay ?>', // スライドが切り替わるまでの表示時間(ミリ秒)
			stopOnLast: false, // 最後のスライドまで表示されたら自動再生を中止するか
			disableOnInteraction: true // ユーザーのスワイプ操作を検出したら自動再生を中止するか
		},
		<?php endif; ?>

		// ページネーションを表示する場合
		pagination: {
			el: '.swiper-pagination',　 // ページネーションを表示するセレクタ
		},
		// 前後スライドへのナビゲーションを表示する場合
		navigation: {
			nextEl: '.swiper-button-next', // 次のスライドボタンのセレクタ
			prevEl: '.swiper-button-prev', // 前のスライドボタンのセレクタ
		},

	});
});
</script>
<?php endif; ?>

<?php //TOPカルーセル
if(get_option('fit_homeCarousel_switch') == 'on' && is_front_page()): ?>
<script>
jQuery(function( $ ) {
	// カルーセル
	var carousel = new Swiper ('.swiper-carousel', {
		// オプションパラメータ
		loop: true,
		slidesPerView: 5,
		spaceBetween: 10,
		centeredSlides : true,
		autoplay: {
			delay: 3000
		},
		// ページネーションを表示する場合
		pagination: {
			el: '.swiper-pagination',
		},
		// 前後スライドへのナビゲーションを表示する場合
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		// レスポンシブ
		breakpoints: {
			991: {
				slidesPerView: 4,
			},
			767: {
				slidesPerView: 2,
			}
        }
	});

});
</script>
<?php endif; ?>

<?php //レイアウト切替ボタンのcookie処理
if(get_option('fit_archiveCtl_switch') == 'on' && get_option('fit_archiveCtl_layout') == 'on' && !is_singular()): ?>
<script>
jQuery(function($){
	if (Cookies.get('radioValue')) {
		// クッキーからValueを取得してラジオボタンを選択
		$("input[name='controller__viewRadio']").val([Cookies.get('radioValue')]);
	}
	$("input[name='controller__viewRadio']:radio").change( function() {
		// ラジオボタンのvalueを取得
		var val = $("input:radio[name='controller__viewRadio']:checked").val();
		// 選択結果をクッキーに登録する
		Cookies.set('radioValue', val);
	});
});
</script>
<?php endif; ?>

<?php //img非同期読み込み
if(get_option('fit_seoImg_lazy') ){
  global $is_IE;
	if( is_feed() || is_preview() || is_mobile() || is_admin() || $is_IE ) {}
	else{
		echo '<script>var layzr = new Layzr();</script>';
	}
}
?>

<?php //フェイスブックフォローボタン(この記事が気に入ったら)
$opt = get_option('fit_snsFollow');
if(is_singular('post') && get_option('fit_postSns_switch') == 'on' && get_option('fit_snsOgp_FBAppId') && $opt['FBPage']): ?>
<div id="fb-root"></div>
<script>
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v3.0&appId=<?php echo get_option('fit_snsOgp_FBAppId'); ?>&autoLogAppEvents=1';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<?php endif; ?>

<?php //ツイッターフォローボタン(この記事が気に入ったら)
$opt = get_option('fit_snsFollow');
if(is_singular('post') && get_option('fit_postSns_switch') == 'on' && $opt['twitterId']): ?>
<script async src="https://platform.twitter.com/widgets.js"></script>
<?php endif; ?>

<?php //IE用objectFitイメージ処理
$ua = $_SERVER['HTTP_USER_AGENT'];
if (strstr($ua, 'Trident') || strstr($ua, 'MSIE')) {
	echo '<script>objectFitImages();</script>'."\n";
}
?>

<script>
// ページの先頭へボタン
jQuery(function(a) {
    a("#bottomFooter__topBtn").hide();
    a(window).on("scroll", function() {
        if (a(this).scrollTop() > 100) {
            a("#bottomFooter__topBtn").fadeIn("fast")
        } else {
            a("#bottomFooter__topBtn").fadeOut("fast")
        }
        scrollHeight = a(document).height();
        scrollPosition = a(window).height() + a(window).scrollTop();
        footHeight = a(".bottomFooter").innerHeight();
        if (scrollHeight - scrollPosition <= footHeight) {
            a("#bottomFooter__topBtn").css({
                position: "absolute",
                bottom: footHeight - 40
            })
        } else {
            a("#bottomFooter__topBtn").css({
                position: "fixed",
                bottom: 0
            })
        }
    });
    a("#bottomFooter__topBtn").click(function() {
        a("body,html").animate({
            scrollTop: 0
        }, 400);
        return false
    });
    a(".controllerFooter__topBtn").click(function() {
        a("body,html").animate({
            scrollTop: 0
        }, 400);
        return false
    })
});
</script>

<?php if (get_option('fit_bsAdvanced_footer')): ?>
<?php echo get_option('fit_bsAdvanced_footer'); ?>
<?php endif; ?>

</body>
</html>
