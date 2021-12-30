
<!DOCTYPE html>

<html <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#" class="t-html 
<?php if (get_option('fit_bsStyle_fontSize') && get_option('fit_bsStyle_fontSize') != 'off' ) : ?><?php echo get_option('fit_bsStyle_fontSize');?> <?php endif; ?>
<?php if (get_option('fit_bsStyle_fontSizePc') && get_option('fit_bsStyle_fontSizePc') != 'off' ) : ?><?php echo get_option('fit_bsStyle_fontSizePc');?><?php endif; ?>">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
<meta charset="<?php bloginfo('charset'); ?>">
<?php wp_head(); ?>
<?php fit_seo_meta();?>
<?php fit_ogp_date();?>

<?php if (get_option('fit_bsAdvanced_header')): ?>
<?php echo get_option('fit_bsAdvanced_header'); ?>
<?php endif; ?>

</head>
<body <?php body_class(); ?> id="top">
<?php
if (get_option('fit_seoHtml_press')){
  ob_start();
}
?>


  <!--l-header-->
  <header class="l-header<?php if (get_option('fit_conHeader_divide') && get_option('fit_conHeader_divide') != 'off' ) : ?> l-header-<?php echo get_option('fit_conHeader_divide');	?><?php endif; ?>">
    <div class="container container-header">

      <!--logo-->
			<?php if (is_front_page()) : ?><h1<?php else : ?><p<?php endif; ?> class="siteTitle">
				<a class="siteTitle__link" href="<?php echo home_url() ?>">
					<?php
	        if (get_fit_logo()):
	            $logo = get_fit_logo();
	            $image_id = attachment_url_to_postid($logo);
	            $image = wp_get_attachment_image_src( $image_id, 'full' );
	            $src = $image[0]; //url
	            $width = $image[1]; //横幅
	            $height = $image[2]; //高さ
	        ?>
						<img class="siteTitle__logo" src="<?php echo $src ?>" alt="<?php bloginfo('name') ?>" width="<?php echo $width ?>" height="<?php echo $height ?>" >
					<?php else : ?>
						<?php bloginfo('name') ?>
					<?php endif; ?>
        </a>
      <?php if (is_front_page()) : ?></h1><?php else : ?></p><?php endif; ?>
      <!--/logo-->


      <?php if(get_option('fit_conHeader_gnavi') && get_option('fit_conHeader_gnavi') != 'off' && has_nav_menu('header_menu')): ?>
				<!--globalNavi-->
				<nav class="globalNavi<?php if(get_option('fit_conHeader_gnavi') != 'on'): ?> <?php echo get_option('fit_conHeader_gnavi'); ?><?php endif ?>">
					<div class="globalNavi__inner">
            <?php wp_nav_menu(array(
              'theme_location' => 'header_menu',
              'items_wrap' => '<ul class="globalNavi__list">%3$s</ul>',
              'container' => false,
              'depth' => 2,
            ));?>
					</div>
				</nav>
				<!--/globalNavi-->
			<?php endif; ?>


			<?php if(get_option('fit_conHeader_subnavi') != 'value2'): ?>
				<!--subNavi-->
				<nav class="subNavi">
	        <?php $opt = get_option('fit_snsFollow'); ?>
	        <?php if (
						!empty(get_option('fit_conHeader_btnText')) && !empty(get_option('fit_conHeader_btnUrl')) ||
						!empty($opt['FBFollowH']) && !empty($opt['FBPage']) ||
						!empty($opt['twitterFollowH']) && !empty($opt['twitterId']) ||
						!empty($opt['instaFollowH']) && !empty($opt['insta']) ||
						!empty($opt['googleFollowH']) && !empty($opt['googleUrl']) ||
						!empty($opt['youtubeFollowH']) && !empty($opt['youtubeUrl']) ||
						!empty($opt['linkedinFollowH']) && !empty($opt['linkedinUrl']) ||
						!empty($opt['pinterestFollowH']) && !empty($opt['pinterestUrl']) ||
						!empty($opt['rssFollowH'])
					):?>
						<ul class="subNavi__list">
							<?php if (!empty(get_option('fit_conHeader_btnText')) && !empty(get_option('fit_conHeader_btnUrl'))):?>
								<li class="subNavi__item"><a class="subNavi__link subNavi__link-pickup" href="<?php echo get_option('fit_conHeader_btnUrl'); ?>"><?php echo get_option('fit_conHeader_btnText'); ?></a></li>
							<?php endif; if (!empty($opt['FBFollowH']) && !empty($opt['FBPage']) ):?>
								<li class="subNavi__item"><a class="subNavi__link icon-facebook2" href="https://www.facebook.com/<?php echo $opt['FBPage']; ?>"></a></li>
							<?php endif; if (!empty($opt['twitterFollowH']) && !empty($opt['twitterId']) ) :?>
								<li class="subNavi__item"><a class="subNavi__link icon-twitter" href="https://twitter.com/<?php echo $opt['twitterId']; ?>"></a></li>
							<?php endif; if (!empty($opt['instaFollowH']) && !empty($opt['insta']) ) :?>
								<li class="subNavi__item"><a class="subNavi__link icon-instagram" href="http://instagram.com/<?php echo $opt['insta']; ?>"></a></li>
							<?php endif; if (!empty($opt['googleFollowH']) && !empty($opt['googleUrl']) ) :?>
								<li class="subNavi__item"><a class="subNavi__link icon-google-plus2" href="https://plus.google.com/<?php echo $opt['googleUrl']; ?>"></a></li>
							<?php endif; if (!empty($opt['youtubeFollowH']) && !empty($opt['youtubeUrl']) ) :?>
								<li class="subNavi__item"><a class="subNavi__link icon-youtube" href="https://www.youtube.com/channel/<?php echo $opt['youtubeUrl']; ?>"></a></li>
							<?php endif; if (!empty($opt['linkedinFollowH']) && !empty($opt['linkedinUrl']) ) :?>
								<li class="subNavi__item"><a class="subNavi__link icon-linkedin" href="http://ca.linkedin.com/in/<?php echo $opt['linkedinUrl']; ?>"></a></li>
							<?php endif; if (!empty($opt['pinterestFollowH']) && !empty($opt['pinterestUrl']) ) :?>
								<li class="subNavi__item"><a class="subNavi__link icon-pinterest" href="https://www.pinterest.jp/<?php echo $opt['pinterestUrl']; ?>"></a></li>
							<?php endif; if (!empty($opt['rssFollowH'])):?>
								<?php if (!empty($opt['rssUrl'])): ?>
									<li class="subNavi__item"><a class="subNavi__link icon-rss" href="<?php echo $opt['rssUrl']; ?>"></a></li>
								<?php else : ?>
									<li class="subNavi__item"><a class="subNavi__link icon-rss" href="<?php bloginfo('rss2_url'); ?>"></a></li>
								<?php endif; ?>
							<?php endif; ?>
						</ul>
					<?php endif; ?>
				</nav>
				<!--/subNavi-->
			<?php endif; ?>


      <?php if(get_option('fit_conHeader_searchPanel_switch') != 'off'): ?>
      <!--searchBtn-->
			<div class="searchBtn<?php if(get_option('fit_conHeader_subnavi') == 'value2'): ?> searchBtn-right<?php endif; ?><?php if(get_option('fit_conHeader_menuPanel_switch') == 'off'): ?> searchBtn-zero<?php endif; ?>">
        <input class="searchBtn__checkbox" id="searchBtn-checkbox" type="checkbox">
        <label class="searchBtn__link searchBtn__link-text icon-search" for="searchBtn-checkbox"></label>
        <label class="searchBtn__unshown" for="searchBtn-checkbox"></label>

        <div class="searchBtn__content">
          <div class="searchBtn__scroll">
            <label class="searchBtn__close" for="searchBtn-checkbox"><i class="icon-close"></i>CLOSE</label>
            <div class="searchBtn__contentInner">
              <?php fit_search_panel();?>
            </div>
          </div>
        </div>
      </div>
			<!--/searchBtn-->
      <?php endif; ?>


      <?php if(get_option('fit_conHeader_menuPanel_switch') != 'off'): ?>
      <!--menuBtn-->
			<div class="menuBtn<?php if(get_option('fit_conHeader_subnavi') == 'value2' && get_option('fit_conHeader_searchPanel_switch') == 'off') : ?> menuBtn-right<?php endif; ?>">
        <input class="menuBtn__checkbox" id="menuBtn-checkbox" type="checkbox">
        <label class="menuBtn__link menuBtn__link-text icon-menu" for="menuBtn-checkbox"></label>
        <label class="menuBtn__unshown" for="menuBtn-checkbox"></label>
        <div class="menuBtn__content">
          <div class="menuBtn__scroll">
            <label class="menuBtn__close" for="menuBtn-checkbox"><i class="icon-close"></i>CLOSE</label>
            <div class="menuBtn__contentInner">
							<?php $opt = get_option('fit_snsFollow');
							if (
								!empty(get_option('fit_conHeader_btnText')) && !empty(get_option('fit_conHeader_btnUrl')) ||
								!empty($opt['FBFollowH']) && !empty($opt['FBPage']) ||
								!empty($opt['twitterFollowH']) && !empty($opt['twitterId']) ||
								!empty($opt['instaFollowH']) && !empty($opt['insta']) ||
								!empty($opt['googleFollowH']) && !empty($opt['googleUrl']) ||
								!empty($opt['youtubeFollowH']) && !empty($opt['youtubeUrl']) ||
								!empty($opt['linkedinFollowH']) && !empty($opt['linkedinUrl']) ||
								!empty($opt['pinterestFollowH']) && !empty($opt['pinterestUrl']) ||
								!empty($opt['rssFollowH'])
	            ):?>
								<nav class="menuBtn__navi<?php if(get_option('fit_conHeader_subnavi') != 'value2'): ?> u-none-pc<?php endif; ?>">
	              	<?php if (!empty(get_option('fit_conHeader_btnText')) && !empty(get_option('fit_conHeader_btnUrl'))):?>
	                	<div class="btn btn-center"><a class="btn__link btn__link-normal" href="<?php echo get_option('fit_conHeader_btnUrl'); ?>"><?php echo get_option('fit_conHeader_btnText'); ?></a></div>
									<?php endif; ?>
	                <ul class="menuBtn__naviList">
										<?php if (!empty($opt['FBFollowH']) && !empty($opt['FBPage']) ):?>
											<li class="menuBtn__naviItem"><a class="menuBtn__naviLink icon-facebook" href="https://www.facebook.com/<?php echo $opt['FBPage']; ?>"></a></li>
										<?php endif; if (!empty($opt['twitterFollowH']) && !empty($opt['twitterId']) ) :?>
											<li class="menuBtn__naviItem"><a class="menuBtn__naviLink icon-twitter" href="https://twitter.com/<?php echo $opt['twitterId']; ?>"></a></li>
										<?php endif; if (!empty($opt['instaFollowH']) && !empty($opt['insta']) ) :?>
											<li class="menuBtn__naviItem"><a class="menuBtn__naviLink icon-instagram" href="http://instagram.com/<?php echo $opt['insta']; ?>"></a></li>
										<?php endif; if (!empty($opt['googleFollowH']) && !empty($opt['googleUrl']) ) :?>
											<li class="menuBtn__naviItem"><a class="menuBtn__naviLink icon-google-plus" href="https://plus.google.com/<?php echo $opt['googleUrl']; ?>"></a></li>
										<?php endif; if (!empty($opt['youtubeFollowH']) && !empty($opt['youtubeUrl']) ) :?>
											<li class="menuBtn__naviItem"><a class="menuBtn__naviLink icon-youtube" href="https://www.youtube.com/channel/<?php echo $opt['youtubeUrl']; ?>"></a></li>
										<?php endif; if (!empty($opt['linkedinFollowH']) && !empty($opt['linkedinUrl']) ) :?>
											<li class="menuBtn__naviItem"><a class="menuBtn__naviLink icon-linkedin" href="http://ca.linkedin.com/in/<?php echo $opt['linkedinUrl']; ?>"></a></li>
										<?php endif; if (!empty($opt['pinterestFollowH']) && !empty($opt['pinterestUrl']) ) :?>
											<li class="menuBtn__naviItem"><a class="menuBtn__naviLink icon-pinterest" href="https://www.pinterest.jp/<?php echo $opt['pinterestUrl']; ?>"></a></li>
										<?php endif; if (!empty($opt['rssFollowH'])):?>
											<?php if (!empty($opt['rssUrl'])): ?>
												<li class="menuBtn__naviItem"><a class="menuBtn__naviLink icon-rss" href="<?php echo $opt['rssUrl']; ?>"></a></li>
											<?php else : ?>
												<li class="menuBtn__naviItem"><a class="menuBtn__naviLink icon-rss" href="<?php bloginfo('rss2_url'); ?>"></a></li>
											<?php endif; ?>
										<?php endif; ?>
	                </ul>
								</nav>
	              <?php endif; ?>
								<?php if ( has_nav_menu('menuPanel_menu') && is_mobile() ) ://メニューセット有
									wp_nav_menu(array(
										'theme_location' => 'menuPanel_menu',
										'items_wrap' => '<aside class="widget widget_nav_menu u-none-pc"><ul class="menu">%3$s</ul></aside>',
										'container' => false,
										'depth' => 3,
									));
								?>
							<?php endif; ?>
							<?php if ( is_active_sidebar( 'menu_panel' ) ) : ?>
								<?php dynamic_sidebar( 'menu_panel' ); ?>
							<?php endif; ?>
            </div>
          </div>
        </div>
			</div>
			<!--/menuBtn-->
      <?php endif; ?>

    </div>
  </header>
  <!--/l-header-->


  <!--l-headerBottom-->
  <div class="l-headerBottom">

    <?php if(get_option('fit_conHeadBottom_switchSearch') == 'on'): ?>
			<!--searchHead-->
			<div class="searchHead">

				<div class="container container-searchHead">
					<?php if(get_option('fit_conHeadBottom_keyword') == 'on'): ?>
						<div class="searchHead__keyword<?php if(get_option('fit_conHeadBottom_keywordSp')): ?> u-none-sp<?php endif; ?>">
							<span class="searchHead__title">
								<?php if(get_option('fit_conHeadBottom_keywordTitle')): ?>
									<?php echo get_option('fit_conHeadBottom_keywordTitle') ?>
								<?php else : ?>
									注目キーワード
								<?php endif; ?>
							</span>
							<?php if(get_option('fit_bsSearch_pickup1') || get_option('fit_bsSearch_pickup2') || get_option('fit_bsSearch_pickup3') || get_option('fit_bsSearch_pickup4') || get_option('fit_bsSearch_pickup5')): ?>
								<ol class="searchHead__keywordList">
									<?php if(get_option('fit_bsSearch_pickup1')): ?>
										<li class="searchHead__keywordItem"><a href="<?php echo esc_url(home_url()); ?>?s=<?php echo get_option('fit_bsSearch_pickup1'); ?>"><?php echo get_option('fit_bsSearch_pickup1'); ?></a></li>
									<?php endif; ?>
									<?php if(get_option('fit_bsSearch_pickup2')): ?>
										<li class="searchHead__keywordItem"><a href="<?php echo esc_url(home_url()); ?>?s=<?php echo get_option('fit_bsSearch_pickup2'); ?>"><?php echo get_option('fit_bsSearch_pickup2'); ?></a></li>
									<?php endif; ?>
									<?php if(get_option('fit_bsSearch_pickup3')): ?>
										<li class="searchHead__keywordItem"><a href="<?php echo esc_url(home_url()); ?>?s=<?php echo get_option('fit_bsSearch_pickup3'); ?>"><?php echo get_option('fit_bsSearch_pickup3'); ?></a></li>
									<?php endif; ?>
									<?php if(get_option('fit_bsSearch_pickup4')): ?>
										<li class="searchHead__keywordItem"><a href="<?php echo esc_url(home_url()); ?>?s=<?php echo get_option('fit_bsSearch_pickup4'); ?>"><?php echo get_option('fit_bsSearch_pickup4'); ?></a></li>
									<?php endif; ?>
									<?php if(get_option('fit_bsSearch_pickup5')): ?>
										<li class="searchHead__keywordItem"><a href="<?php echo esc_url(home_url()); ?>?s=<?php echo get_option('fit_bsSearch_pickup5'); ?>"><?php echo get_option('fit_bsSearch_pickup5'); ?></a></li>
									<?php endif; ?>
								</ol>
							<?php endif; ?>
						</div>
					<?php endif; ?>
					<div class="searchHead__search <?php if(get_option('fit_conHeadBottom_keyword') != 'on'): ?>searchHead__search-100<?php endif; ?>">
						<form class="searchHead__form" method="get" target="_top" action="<?php echo home_url( '/' ); ?>">
	            <input class="searchHead__input" type="text" maxlength="50" name="s" placeholder="キーワードを入力" value="<?php if( get_search_query() ){ echo get_search_query();} ?>">
	            <button class="searchHead__submit icon-search" type="submit" value="search"></button>
	          </form>
					</div>
				</div>
			</div>
			<!--/searchHead-->
    <?php endif; ?>

		<?php if(get_option('fit_conHeadBottom_switch') == 'on'): ?>
	    <div class="wider">
	      <!--infoHead-->
	      <div class="infoHead">
	        <?php if(get_option('fit_conHeadBottom_url')): ?><a class="infoHead__text" href="<?php echo get_option('fit_conHeadBottom_url') ?>"><?php else:?><span class="infoHead__text"><?php endif; ?>
	          <?php if(get_option('fit_conHeadBottom_contents')): ?><?php echo get_option('fit_conHeadBottom_contents') ?><?php endif; ?>
	        <?php if(get_option('fit_conHeadBottom_url')): ?></a><?php else:?></span><?php endif; ?>
	      </div>
	      <!--/infoHead-->
	    </div>
	  <?php endif; ?>

	  <?php if(!is_front_page() && !is_singular('post')): ?>
	    <div class="wider">
				<!--breadcrum-->
	      <?php fit_breadcrumb(); ?>
				<!--/breadcrum-->
	    </div>
	  <?php endif; ?>

  </div>
  <!--l-headerBottom-->
