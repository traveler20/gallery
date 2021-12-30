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
        <h1 class="heading heading-primary"><?php the_title(); ?></h1>

        <!--page-->
        <div class="page<?php if (get_option('fit_pageStyle_frame') && get_option('fit_pageStyle_frame') != 'off' ):?> <?php echo get_option('fit_pageStyle_frame')?><?php endif; ?>">
		  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <section class="content">
			<?php the_content(); ?>
          </section>
		  <?php endwhile; endif; ?>
        </div>
		<!--/page-->
      </div>


    </main>
    <!--/l-main-->


    <?php if ( get_option('fit_pageLayout_column') != '1' ):?>
      <?php get_sidebar(); ?>
	<?php endif; ?>


  </div>
  <!--/l-wrapper-->



<?php get_footer(); ?>
