<?php get_header(); ?>


  <!--l-wrapper-->
  <div class="l-wrapper">

    <!--l-main-->
    <?php
    //フレーム設定
    $frame = '';
    if (get_option('fit_conMain_frame') && get_option('fit_conMain_frame') != 'off' ){$frame = ' '.get_option('fit_conMain_frame');}

    //ページ横幅のオプション設定
    $width_page = '';
    if (get_option('fit_pageLayout_width') && get_option('fit_pageLayout_width') != 'off'){$width_page = get_option('fit_pageLayout_width');}

    //レイアウト設定
    $layout = '';
    if ( get_option('fit_pageLayout_column') == '1' ){$layout = ' l-main-wide'.$width_page;}
    if ( get_option('fit_pageLayout_column') != '1' && get_option('fit_pageLayout_side') == 'left'  ){$layout = ' l-main-right';}
    ?>
    <main class="l-main<?php echo $frame.$layout; ?>">


      <div class="dividerBottom">
        <h1 class="heading heading-primary"><?php echo fit_get_headline_title(); ?></h1>

        <!--pageContents-->
        <div class="pageContents<?php if (get_option('fit_pageStyle_frame') && get_option('fit_pageStyle_frame') != 'off' ):?> <?php echo get_option('fit_pageStyle_frame')?><?php endif; ?>">

          <section class="content">
            <p class="phrase">お探しのページはありませんでした。</p>
            <div class="btn btn-center"><a class="btn__link btn__link-normal" href="<?php echo home_url() ?>"><?php bloginfo('name') ?>のTOPへ戻る</a></div>
          </section>
        </div>
		<!--/pageContents-->
      </div>


    </main>
    <!--/l-main-->


    <?php if ( get_option('fit_pageLayout_column') != '1' ):?>
      <?php get_sidebar(); ?>
	<?php endif; ?>


  </div>
  <!--/l-wrapper-->



<?php get_footer(); ?>
