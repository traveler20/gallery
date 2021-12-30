<?php get_header();?>

  <!--l-wrapper-->
  <div class="l-wrapper">

    <!--l-main-->
    <?php
    //フレーム設定
    $frame = '';
    if (get_option('fit_conMain_frame') && get_option('fit_conMain_frame') != 'off' ){$frame = ' '.get_option('fit_conMain_frame');}

    //ページ横幅のオプション設定
    $width_post = '';
    if (get_option('fit_postLayout_width') && get_option('fit_postLayout_width') != 'off'){$width_post = get_option('fit_postLayout_width');}

    //レイアウト設定
    $layout = '';
    if ( get_option('fit_postLayout_column') == '1' ){$layout = ' l-main-wide'.$width_post;}
    if ( get_option('fit_postLayout_column') != '1' && get_option('fit_postLayout_side') == 'left'  ){$layout = ' l-main-right';}
    ?>
    <main class="l-main<?php echo $frame.$layout; ?>">

      <div class="dividerBottom">
        <h1 class="heading heading-primary"><?php the_title(); ?></h1>


        <!--postContents-->
        <div class="postContents<?php if (get_option('fit_postStyle_frame') && get_option('fit_postStyle_frame') != 'off' ):?> <?php echo get_option('fit_postStyle_frame')?><?php endif; ?>">


		  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <section class="content<?php fit_content_class(); ?>">
			<?php the_content(); ?>
          </section>
          <?php
          // ページングの表示
          fit_link_pages();
          ?>
		  <?php endwhile; endif; ?>


        </div>
		<!--/postContents-->

        <div class="btn btn-center u-mt-main">
          <a class="btn__link btn__link-primary" href="javascript: history.back()">前のページへ戻る</a>
        </div>


      </div>

    </main>
    <!--/l-main-->


    <?php if ( get_option('fit_postLayout_column') != '1' ):?>
      <?php get_sidebar(); ?>
	<?php endif; ?>


  </div>
  <!--/l-wrapper-->



<?php get_footer(); ?>
