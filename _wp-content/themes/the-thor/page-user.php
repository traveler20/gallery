<?php /* Template Name: ユーザー一覧 */?>
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
    if ( get_post_meta(get_the_ID(), 'column_layout', true) && get_post_meta(get_the_ID(), 'column_layout', true) != '0' ){
      if ( get_post_meta(get_the_ID(), 'column_layout', true) == '1' ){$layout = ' l-main-wide'.$width_page;}
      if ( get_post_meta(get_the_ID(), 'column_layout', true) == '2' && get_option('fit_pageLayout_side') == 'left' ){$layout = ' l-main-right';}
    }
    else{
      if ( get_option('fit_pageLayout_column') == '1' ){$layout = ' l-main-wide'.$width_page;}
      if ( get_option('fit_pageLayout_column') != '1' && get_option('fit_pageLayout_side') == 'left'  ){$layout = ' l-main-right';}
    }
    ?>
    <main class="l-main<?php echo $frame.$layout; ?>">


      <div class="dividerBottom">

	  <?php if ( get_option('fit_pageStyle_headline') != 'viral' ): ?>
        <h1 class="heading heading-primary"><?php the_title(); ?></h1>

        <?php if ( get_option('fit_pageStyle_headline') != 'none' ): ?>
        <div class="eyecatch<?php if (get_option('fit_pageStyle_aspect') && get_option('fit_pageStyle_aspect') != 'off' ): ?> <?php echo get_option('fit_pageStyle_aspect'); ?><?php endif; ?> eyecatch-main">
          <span class="eyecatch__link">
          <?php if ( has_post_thumbnail()): ?>
            <?php the_post_thumbnail('icatch768'); ?>
          <?php elseif ( get_fit_noimg()): ?>
            <img <?php echo fit_correct_src(); ?>="<?php echo get_fit_noimg(); ?>" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
		  <?php else: ?>
            <img <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_768.gif" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
          <?php endif; ?>
          </span>
        </div>
        <?php endif; ?>

      <?php endif; ?>

        <!--pageContents-->
        <div class="pageContents<?php if (get_option('fit_pageStyle_frame') && get_option('fit_pageStyle_frame') != 'off' ):?> <?php echo get_option('fit_pageStyle_frame')?><?php endif; ?>">

		  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <section class="content<?php fit_content_class(); ?>">
			<?php the_content(); ?>


			<div class="writers">
            <!--投稿者一覧を表示-->
			<?php
			$users = get_users( array('orderby'=>'ID','order'=>'ASC') );
			foreach($users as $user):
				$uid = $user->ID;
				$userData = get_userdata($uid);
			?>
              <div class="writers__box">
                <div class="writers__title">
				  <div class="writers__img"><a href="<?php echo home_url() ?>/?author=<?php echo $uid ?>"><?php echo get_avatar( $uid ,300 ) ?></a></div>
                  <div class="writers__name">
				    <a href="<?php echo home_url() ?>/?author=<?php echo $uid ?>"><?php echo $user->display_name ?></a>
                    <span class="writers__group"><?php echo $user->user_group ?></span>
                  </div>
                </div>
                <div class="writers__description">
                  <?php echo $user->user_description ?>
                </div>
              </div>
			<?php endforeach; ?>


            </div>


          </section>
		  <?php endwhile; endif; ?>
        </div>
		<!--/pageContents-->

	  </div>

    </main>
    <!--/l-main-->


    <?php if ( get_post_meta(get_the_ID(), 'column_layout', true) && get_post_meta(get_the_ID(), 'column_layout', true) != '0' ):?>
      <?php if ( get_post_meta(get_the_ID(), 'column_layout', true) == '2' ):?>
        <?php get_sidebar(); ?>
      <?php endif; ?>
    <?php else:?>
      <?php if ( get_option('fit_pageLayout_column') != '1' ):?>
        <?php get_sidebar(); ?>
      <?php endif; ?>
	<?php endif; ?>


  </div>
  <!--/l-wrapper-->



<?php get_footer(); ?>
