<?php get_header();
require_once locate_template('inc/parts/display_category.php');   
?>

  <!--l-headerBottom-->
  <div class="l-headerBottom">

    <?php if (!is_paged() && get_query_var('sort') == '') : ?>

      <?php if(is_mobile()): ?>
    	  <?php if(get_option('fit_homeMainimg_switch') == 'on' && !get_option('fit_homeMainimg_switchSp')): ?>
    	    <?php fit_main_visual(); ?>
    	  <?php endif; ?>
    	<?php else: ?>
    	  <?php if(get_option('fit_homeMainimg_switch') == 'on'): ?>
    	    <?php fit_main_visual(); ?>
    	  <?php endif; ?>
    	<?php endif; ?>

      <?php if(get_option('fit_homeCarousel_switch') == 'on'): ?>
        <div class="container divider">
          <!--carousel-->
          <div class="swiper-container swiper-carousel">
            <?php
            $conditions = '';
            $id_list = '';
        		$page = '5';
        		if (get_option('fit_homeCarousel_conditions')){
        			$conditions = get_option('fit_homeCarousel_conditions');
        		}
        		if (get_option('fit_homeCarousel_id')){
        			$id_list = explode(',', get_option('fit_homeCarousel_id') );
        		}
        		if (get_option('fit_homeCarousel_page')){
        			$page = get_option('fit_homeCarousel_page');
        		}

            $args = array(
              'orderby' => 'rand',
              'ignore_sticky_posts' => '1',
              'posts_per_page' => $page,
              $conditions  => $id_list,
            );
            $my_query = new WP_Query( $args );?>

            <!-- 記事上カルーセル -->
            <div class="swiper-wrapper">
              <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                <div class="swiper-slide">
                  <div class="eyecatch<?php if(get_option('fit_homeCarousel_aspect') && get_option('fit_homeCarousel_aspect') != 'off'): ?> <?php echo get_option('fit_homeCarousel_aspect');?><?php endif; ?>">
                    <?php
                    $cats = get_the_category();

                    if(!get_option('fit_homeCarousel_category')){
                      if(!empty($cats[0])){

                        $display_category = null;
                        $display_category = new FitDisplayTheCategory( $cats,'category' );

                        // 最下層レベルのカテゴリー名リストを取得
                        $most_btm_names = array();
                        $most_btm_names = $display_category->get_deisplay_the_category();

                        // リストの一番最初のカテゴリーを表示
                        $term_id = get_cat_ID( $most_btm_names[0] );
                        $cat_link = get_category_link( $term_id );
                        $cat_name = $most_btm_names[0];

                        echo '<span class="eyecatch__cat cc-bg'.$term_id.'">';
                        echo '<a href="' . $cat_link . '">' . $cat_name . '</a>';
                        echo '</span>';
                      }
                    }
                    ?>
                    <a class="eyecatch__link<?php if (get_option('fit_bsEyecatch_hover') && get_option('fit_bsEyecatch_hover') != 'off' ) : ?> eyecatch__link-<?php echo get_option('fit_bsEyecatch_hover');	?><?php endif; ?>" href="<?php the_permalink(); ?>">
                      <?php if ( has_post_thumbnail()):
                        $id = get_post_thumbnail_id();
                        $img = wp_get_attachment_image_src( $id , 'icatch375' );
                      ?>
                        <img src="<?php echo $img[0]; ?>" alt="<?php echo get_the_title(); ?>">
                      <?php elseif ( get_fit_noimg()): ?>
                        <img src="<?php echo get_fit_noimg(); ?>" alt="NO IMAGE">
                      <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/img_no_375.gif" alt="NO IMAGE">
                      <?php endif; ?>
                    </a>
                  </div>
                  <h2 class="heading heading-carousel">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </h2>
                </div>
              <?php endwhile; wp_reset_postdata(); ?>
            </div>

            <!-- if pagination -->
            <div class="swiper-pagination swiper-paginationBottom0"></div>

            <!-- if navigation -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
          <!--/carousel-->
        </div>
      <?php endif; ?>



      <?php if(get_option('fit_homePickup3_switch') == 'on' && get_option('fit_homePickup3_title')): ?>

        <?php
        $post_count = wp_count_posts()->publish;  //公開している記事数をカウント
        if ( $post_count >= 3 ) ://記事数が3以上の時のみ表示
          $args = array(
            'numberposts' => '3',
            'post_type'   => 'post',
            'post_status' => 'publish'
          );
          $new_meta = wp_get_recent_posts($args);
          $post_id01 = $new_meta[0]['ID'];
          $post_id02 = $new_meta[1]['ID'];
          $post_id03 = $new_meta[2]['ID'];
          if ( get_option('fit_homePickup3_id1') ) {
            $post_id01 = get_option('fit_homePickup3_id1');
          }
          if ( get_option('fit_homePickup3_id2') ) {
            $post_id02 = get_option('fit_homePickup3_id2');
          }
          if ( get_option('fit_homePickup3_id3') ) {
            $post_id03 = get_option('fit_homePickup3_id3');
          }
          $cat_01 = get_the_category($post_id01);
          $cat_02 = get_the_category($post_id02);
          $cat_03 = get_the_category($post_id03);
        ?>
          <div class="wider dividerBottom">
            <!--pickup3-->
            <div class="pickup3">

              <div class="pickup3__bg mask<?php if(get_option('fit_homePickup3_mask') && get_option('fit_homePickup3_mask') != 'off' ): ?> mask-<?php echo get_option('fit_homePickup3_mask') ?><?php endif; ?>">
                <?php if ( has_post_thumbnail($post_id01)): ?>
                  <?php if ( is_mobile()): ?>
                    <?php echo get_the_post_thumbnail( $post_id01, 'icatch768' ); ?>
                  <?php else: ?>
                    <?php echo get_the_post_thumbnail( $post_id01, 'icatch1280' ); ?>
                  <?php endif; ?>
                <?php elseif ( get_fit_noimg()): ?>
                  <img <?php echo fit_correct_src(); ?>="<?php echo get_fit_noimg(); ?>" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
                <?php else: ?>
                  <img <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_768.gif" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
                <?php endif; ?>
              </div>
              <div class="container">
                <h2 class="heading heading-main u-white <?php if(get_option('fit_homePickup3_bold') ): ?>u-bold<?php endif; ?>">
                  <?php if(get_option('fit_homePickup3_icon') ): ?><i class="<?php echo get_option('fit_homePickup3_icon') ?>"></i><?php endif; ?>
                  <?php echo get_option('fit_homePickup3_title') ?>
                  <?php if(get_option('fit_homePickup3_sub') ): ?><span><?php echo get_option('fit_homePickup3_sub') ?></span><?php endif; ?>
                </h2>

                <div class="pickup3__container">
                  <div class="pickup3__item pickup3__item-first cc-bg<?php echo $cat_01[0]->term_id; ?>">
                    <div class="eyecatch<?php if(get_option('fit_homePickup3_aspect') && get_option('fit_homePickup3_aspect') != 'off'): ?> <?php echo get_option('fit_homePickup3_aspect');?><?php endif; ?>">
                      <?php
                      if(!get_option('fit_homePickup3_category')){

                        $display_category = null;
                        $display_category = new FitDisplayTheCategory( $cat_01 ,'category' );

                        // 最下層レベルのカテゴリー名リストを取得
                        $most_btm_names = array();
                        $most_btm_names = $display_category->get_deisplay_the_category();

                        // リストの一番最初のカテゴリーを表示
                        $term_id = get_cat_ID( $most_btm_names[0] );
                        $cat_link = get_category_link( $term_id );
                        $cat_name = $most_btm_names[0];

                        echo '<span class="eyecatch__cat cc-bg'.$term_id.'">';
                        echo '<a href="' . $cat_link . '">' . $cat_name . '</a>';
                        echo '</span>';
                      }
                      ?>
                      <a class="eyecatch__link<?php if (get_option('fit_bsEyecatch_hover') && get_option('fit_bsEyecatch_hover') != 'off' ) : ?> eyecatch__link-<?php echo get_option('fit_bsEyecatch_hover'); ?><?php endif; ?>" href="<?php echo get_permalink($post_id01); ?>">
                      <?php if ( has_post_thumbnail($post_id01)): ?>
                        <?php echo get_the_post_thumbnail( $post_id01, 'icatch768' ); ?>
                      <?php elseif ( get_fit_noimg()): ?>
                        <img <?php echo fit_correct_src(); ?>="<?php echo get_fit_noimg(); ?>" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
                      <?php else: ?>
                        <img <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_768.gif" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
                      <?php endif; ?>
                      </a>
                    </div>
                    <h3 class="heading heading-pickup3">
                      <a href="<?php echo get_permalink($post_id01); ?>"><?php echo get_post($post_id01)->post_title; ?></a>
                    </h3>
                  </div>

                  <div class="pickup3__box">
                    <div class="pickup3__item pickup3__item-second cc-bg<?php echo $cat_02[0]->term_id; ?>">
                      <div class="eyecatch<?php if(get_option('fit_homePickup3_aspect') && get_option('fit_homePickup3_aspect') != 'off'): ?> <?php echo get_option('fit_homePickup3_aspect');?><?php endif; ?>">
                        <?php
                        if(!get_option('fit_homePickup3_category')){

                          $display_category = null;
                          $display_category = new FitDisplayTheCategory( $cat_02, 'category' );
  
                          // 最下層レベルのカテゴリー名リストを取得
                          $most_btm_names = array();
                          $most_btm_names = $display_category->get_deisplay_the_category();
  
                          // リストの一番最初のカテゴリーを表示
                          $term_id = get_cat_ID( $most_btm_names[0] );
                          $cat_link = get_category_link( $term_id );
                          $cat_name = $most_btm_names[0];

                          echo '<span class="eyecatch__cat cc-bg'.$term_id.'">';
                          echo '<a href="' . $cat_link . '">' . $cat_name . '</a>';
                          echo '</span>';
                        }
                        ?>
                        <a class="eyecatch__link<?php if (get_option('fit_bsEyecatch_hover') && get_option('fit_bsEyecatch_hover') != 'off' ) : ?> eyecatch__link-<?php echo get_option('fit_bsEyecatch_hover'); ?><?php endif; ?>" href="<?php echo get_permalink($post_id02); ?>">
                        <?php if ( has_post_thumbnail($post_id02)): ?>
                          <?php echo get_the_post_thumbnail( $post_id02, 'icatch375' ); ?>
                        <?php elseif ( get_fit_noimg()): ?>
                          <img <?php echo fit_correct_src(); ?>="<?php echo get_fit_noimg(); ?>" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
                        <?php else: ?>
                          <img <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_375.gif" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
                        <?php endif; ?>
                        </a>
                      </div>
                      <h3 class="heading heading-pickup3">
                        <a href="<?php echo get_permalink($post_id02); ?>"><?php echo get_post($post_id02)->post_title; ?></a>
                      </h3>
                    </div>
                    <div class="pickup3__item pickup3__item-third cc-bg<?php echo $cat_03[0]->term_id; ?>">
                      <div class="eyecatch<?php if(get_option('fit_homePickup3_aspect') && get_option('fit_homePickup3_aspect') != 'off'): ?> <?php echo get_option('fit_homePickup3_aspect');?><?php endif; ?>">
                        <?php
                        if(!get_option('fit_homePickup3_category')){

                          $display_category = null;
                          $display_category = new FitDisplayTheCategory( $cat_03, 'category' );
  
                          // 最下層レベルのカテゴリー名リストを取得
                          $most_btm_names = array();
                          $most_btm_names = $display_category->get_deisplay_the_category();
  
                          // リストの一番最初のカテゴリーを表示
                          $term_id = get_cat_ID( $most_btm_names[0] );
                          $cat_link = get_category_link( $term_id );
                          $cat_name = $most_btm_names[0];
                      
                          echo '<span class="eyecatch__cat cc-bg'.$term_id.'">';
                          echo '<a href="' . $cat_link . '">' . $cat_name . '</a>';
                          echo '</span>';
                        }
                        ?>
                        <a class="eyecatch__link<?php if (get_option('fit_bsEyecatch_hover') && get_option('fit_bsEyecatch_hover') != 'off' ) : ?> eyecatch__link-<?php echo get_option('fit_bsEyecatch_hover'); ?><?php endif; ?>" href="<?php echo get_permalink($post_id03); ?>">
                        <?php if ( has_post_thumbnail($post_id03)): ?>
                          <?php echo get_the_post_thumbnail( $post_id03, 'icatch375' ); ?>
                        <?php elseif ( get_fit_noimg()): ?>
                          <img <?php echo fit_correct_src(); ?>="<?php echo get_fit_noimg(); ?>" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
                        <?php else: ?>
                          <img <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_375.gif" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
                        <?php endif; ?>
                        </a>
                      </div>
                      <h3 class="heading heading-pickup3">
                        <a href="<?php echo get_permalink($post_id03); ?>"><?php echo get_post($post_id03)->post_title; ?></a>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <!--/pickup3-->
          </div>
        <?php endif; ?>
      <?php endif; ?>
    <?php endif; ?>

  </div>
  <!--l-headerBottom-->



  <!--l-wrapper-->
  <div class="l-wrapper">

    <!--l-main-->
    <?php
    //フレーム設定
    $frame = '';
    if (get_option('fit_conMain_frame') && get_option('fit_conMain_frame') != 'off' ){
      $frame = ' '.get_option('fit_conMain_frame');
    }

    //ページ横幅のオプション設定
    $width_page = '';
    if (get_option('fit_pageLayout_width') && get_option('fit_pageLayout_width') != 'off'){$width_page = get_option('fit_pageLayout_width');}

    //アーカイブ横幅のオプション設定
    $width_archive = '';
    if (get_option('fit_archiveLayout_width') && get_option('fit_archiveLayout_width') != 'off'){$width_archive = get_option('fit_archiveLayout_width'); }

    //レイアウト設定
    $layout = '';
    if (get_option('page_on_front')){//フロント固定ページ時
      if ( get_post_meta(get_the_ID(), 'column_layout', true) && get_post_meta(get_the_ID(), 'column_layout', true) != '0' ){
        if ( get_post_meta(get_the_ID(), 'column_layout', true) == '1' ){$layout = ' l-main-wide'.$width_page;}
        if ( get_post_meta(get_the_ID(), 'column_layout', true) == '2' && get_option('fit_pageLayout_side') == 'left' ){$layout = ' l-main-right';}
      }
      else{
        if ( get_option('fit_pageLayout_column') == '1' ){$layout = ' l-main-wide'.$width_page;}
        if ( get_option('fit_pageLayout_column') != '1' && get_option('fit_pageLayout_side') == 'left'  ){$layout = ' l-main-right';}
      }
    }else{//フロントアーカイブ時
      if ( get_option('fit_archiveLayout_column') == '1' ){$layout = ' l-main-wide'.$width_archive;}
      if ( get_option('fit_archiveLayout_column') != '1' && get_option('fit_archiveLayout_side') == 'left' ){$layout = ' l-main-right';}
    }
    ?>
    <main class="l-main<?php echo $frame.$layout; ?>">

      <?php if ( is_active_sidebar('home_top') && !is_paged() && get_query_var('sort') == '' ) : ?>
        <!--home_top_widget-->
        <div class="dividerBottom">
          <?php dynamic_sidebar('home_top'); ?>
        </div>
        <!--/home_top_widget-->
  	  <?php endif; ?>


      <div class="dividerBottom">
        <?php if (get_option('page_on_front')) : //フロント固定 ?>

          <!--page-->
          <div class="page<?php if (get_option('fit_pageStyle_frame') && get_option('fit_pageStyle_frame') != 'off' ):?> <?php echo get_option('fit_pageStyle_frame')?><?php endif; ?>">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <section class="content<?php fit_content_class(); ?>">
                <?php the_content(); ?>
              </section>
            <?php endwhile; endif; ?>
          </div>
          <!--/page-->

        <?php else: //フロントアーカイブ ?>

          <!--controller-->
          <?php fit_archive_controller() ?>
          <!--/controller-->


          <?php if (have_posts()) : $count = 1; ?>
            <!--archive-->
            <div class="archive">
              <?php while (have_posts()) : the_post();  ?>
                <?php get_template_part('loop');?>

                <?php
                if(get_option('fit_adInfeed_first')){
                  if(!is_paged()){
                    $number1 = '1';
          					if(get_option('fit_adInfeed_number')){$number1 = get_option('fit_adInfeed_number');}
          					if($count == $number1){ echo fit_infeed(); }

          					$number2 = '';
          					if(get_option('fit_adInfeed_number2')){$number2 = get_option('fit_adInfeed_number2');}
          					if($count == $number2){ echo fit_infeed();}
          				}
          			}
          			else{
          				$number1 = '1';
          				if(get_option('fit_adInfeed_number')){$number1 = get_option('fit_adInfeed_number');}
          				if($count == $number1){ echo fit_infeed(); }

          				$number2 = '';
          				if(get_option('fit_adInfeed_number2')){$number2 = get_option('fit_adInfeed_number2');}
          				if($count == $number2){ echo fit_infeed();}
          			}
          			$count = $count + 1;
                ?>
              <?php endwhile; ?>
            </div>
            <!--/archive-->
          <?php else : ?>
            <!--archive-->
            <div class="archive">
              <div class="archive__item archive__item-none<?php if (get_option('fit_archiveList_frame') && get_option('fit_archiveList_frame') != 'off' ):?> <?php echo get_option('fit_archiveList_frame')?><?php endif; ?>">
                <p class="phrase phrase-primary">投稿が1件も見つかりませんでした。</p>
              </div>
            </div>
            <!--/archive-->
          <?php endif; ?>
        <?php endif; //フロント分岐end ?>

        <!--pager-->
        <?php if ( function_exists( 'fit_pagination' ) ) {fit_pagination( $wp_query->max_num_pages );} ?>
        <!--/pager-->

      </div>


      <?php if (!is_paged() && get_query_var('sort') == '' && get_option('fit_custBasis_setting') == 'on' && get_option('fit_custTop_switch') == 'on' ) : ?>
      <div class="dividerBottom">

        <div class="archiveHead">
          <div class="archiveHead__contents">
            <h2 class="heading heading-main <?php if(get_option('fit_custTop_bold') ): ?>u-bold<?php endif; ?>">
              <?php if(get_option('fit_custTop_icon') ): ?><i class="<?php echo get_option('fit_custTop_icon') ?>"></i><?php endif; ?>
              <?php if(get_option('fit_custTop_title') ): ?><?php echo get_option('fit_custTop_title') ?><?php else: ?><?php echo get_post_type_object('custom')->labels->singular_name; ?><?php endif; ?>
              <?php if(get_option('fit_custTop_sub') ): ?><span><?php echo get_option('fit_custTop_sub') ?></span><?php endif; ?>
            </h2>
          </div>
        </div>

        <!--custom-->
        <div class="custom<?php if (get_option('fit_custList_frame') && get_option('fit_custList_frame') != 'off' ):?> <?php echo get_option('fit_custList_frame')?><?php endif; ?>">
          <?php
          $number = '5';
    		  if(get_option('fit_custTop_number') ){
    			  $number = get_option('fit_custTop_number');
    		  }
    		  $args = array(
    			  'posts_per_page' => $number,
    			  'post_type' => 'custom',
    		  );
    		  $my_query = new WP_Query( $args );
          ?>
          <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
            <div class="custom__item<?php if(get_option('fit_custList_style') && get_option('fit_custList_style') != 'off' ): ?> custom__item-<?php echo get_option('fit_custList_style') ?><?php endif; ?>">
              <div class="custom__data">
                <span class="custom__day"><?php the_time(get_option('date_format')); ?></span>
                <?php
                if(get_option('fit_custBasis_category') == 'on' ){
                  $cats = get_the_terms( $post->ID, 'custom_category' );
                  if ( $cats[0] ) {
                    $display_category = null;
                    $display_category = new FitDisplayTheCategory( $cats, 'custom_category' );

                    // 最下層レベルのカテゴリー名リストを取得
                    $most_btm_names = array();
                    $most_btm_names = $display_category->get_deisplay_the_category();

                    // リストの一番最初のカテゴリーを表示
                    $term_id = get_cat_ID( $most_btm_names[0] );
                    $cat_link = get_category_link( $term_id );
                    $cat_name = $most_btm_names[0];

                    echo '<span class="custom__cat">';
                    echo '<a href="' . $cat_link . '">' . $cat_name . '</a>';
                    echo '</span>';
                  }
        			  }
                ?>
              </div>
              <h2 class="heading heading-custom">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>
            </div>
          <?php endwhile; wp_reset_postdata(); ?>
          <div class="btn btn-right">
            <a class="btn__link btn__link-normal" href="<?php echo get_post_type_archive_link( 'custom' ); ?>">
              <?php if(get_option('fit_custTop_btn') ): ?>
                <?php echo get_option('fit_custTop_btn') ?>
              <?php else: ?>
                一覧へ
              <?php endif; ?>
            </a>
          </div>
        </div>
        <!--/custom-->
      </div>
      <?php endif; ?>


      <?php if ( is_active_sidebar('home_bottom') && !is_paged() && get_query_var('sort') == '' ) : ?>
        <!--home_bottom_widget-->
        <div class="dividerBottom">
          <?php dynamic_sidebar('home_bottom'); ?>
        </div>
        <!--/home_bottom_widget-->
  	  <?php endif; ?>


    </main>
    <!--/l-main-->

    <?php if (get_option('page_on_front')) : //フロント固定 ?>
      <?php if ( get_post_meta(get_the_ID(), 'column_layout', true) && get_post_meta(get_the_ID(), 'column_layout', true) != '0' ):?>
        <?php if ( get_post_meta(get_the_ID(), 'column_layout', true) == '2' ):?>
          <?php get_sidebar(); ?>
        <?php endif; ?>
      <?php else:?>
        <?php if ( get_option('fit_pageLayout_column') != '1' ):?>
          <?php get_sidebar(); ?>
        <?php endif; ?>
      <?php endif; ?>
    <?php elseif (!get_option('page_on_front')) : //フロントアーカイブ ?>
      <?php if ( get_option('fit_archiveLayout_column') != '1' ):?>
        <?php get_sidebar(); ?>
      <?php endif; ?>
    <?php endif; //フロント分岐end ?>

  </div>
  <!--/l-wrapper-->




  <!--l-footerTop-->
  <div class="l-footerTop">
    <?php if (!is_paged() && get_query_var('sort') == '') : ?>
      <?php if(get_option('fit_homeRank_switch') == 'on' && get_option('fit_homeRank_title')):?>
        <div class="wider dividerBottom">

			<!--rankingBox-->
			<div class="rankingBox">
				<div class="rankingBox__bg"></div>

				<div class="container">
					<h2 class="heading heading-main u-white <?php echo ( get_option( 'fit_homeRank_bold' ) ) ? 'u-bold' : ''; ?>">
						<?php if ( get_option( 'fit_homeRank_icon' ) ) : ?>
							<i class="<?php echo get_option( 'fit_homeRank_icon' ); ?>"></i>
						<?php endif; ?>
						<?php echo get_option( 'fit_homeRank_title' ); ?>
						<?php if ( get_option( 'fit_homeRank_sub' ) ) : ?>
							<span><?php echo get_option( 'fit_homeRank_sub' ); ?></span>
						<?php endif; ?>
					</h2>

					<div class="rankingBox__inner"></div>
				</div>
			</div>
			<?php add_action( 'wp_footer', 'fit_add_ranking_box_script' ); // フッターにランキング取得用のスクリプト追加 ?>
			<!--rankingBox-->

        </div>
      <?php endif; ?>



      <?php if(get_option('fit_homeCategory_switch') == 'on' && get_option('fit_homeCategory_title')):?>
        <div class="wider">
          <!--categoryBox-->
          <div class="categoryBox">
            <div class="container">
              <h2 class="heading heading-main <?php if(get_option('fit_homeCategory_bold') ): ?>u-bold<?php endif; ?>">
                <?php if(get_option('fit_homeCategory_icon') ): ?><i class="<?php echo get_option('fit_homeCategory_icon') ?>"></i><?php endif; ?>
                <?php echo get_option('fit_homeCategory_title') ?>
                <?php if(get_option('fit_homeCategory_sub') ): ?><span><?php echo get_option('fit_homeCategory_sub') ?></span><?php endif; ?>
              </h2>

              <ul class="categoryBox__list">
                <?php
                $conditions = '';
          		  $id_list = '';
          		  if (get_option('fit_homeCategory_conditions')){
          			  $conditions = get_option('fit_homeCategory_conditions');
          		  }
          		  if (get_option('fit_homeCategory_id')){
          			  $id_list = get_option('fit_homeCategory_id');
          		  }
          		  $args = array(
          			  'orderby' => 'count',
          			  'order' => 'DESC',
          			  $conditions  => $id_list,
          		  );
          		  $get_cat = get_categories($args);
          		  foreach($get_cat as $val) {
          			  $category_list_id[$val->name]= $val->cat_ID;
          		  }
                ?>
                <?php if( !empty( $category_list_id ) ): ?>
                  <?php foreach($category_list_id as $key => $val): ?>
                    <li class="categoryBox__item">
                      <h3 class="categoryBox__title cc-ft<?php echo $val ?>"><a class="categoryBox__titleLink" href="<?php echo esc_url(get_category_link($val)); ?>"><?php echo $key; ?></a></h3>
                      <?php
              			  $cat_post = get_posts('category='.$val.'&numberposts=1');
              			  foreach($cat_post as $post):
                        if ( get_option('fit_homeCategory_aspect') != 'none' ): ?>
                          <div class="eyecatch<?php if(get_option('fit_homeCategory_aspect') && get_option('fit_homeCategory_aspect') != 'off'): ?> <?php echo get_option('fit_homeCategory_aspect');?><?php endif; ?>">
                            <a class="eyecatch__link<?php if (get_option('fit_bsEyecatch_hover') && get_option('fit_bsEyecatch_hover') != 'off' ) : ?> eyecatch__link-<?php echo get_option('fit_bsEyecatch_hover');	?><?php endif; ?>" href="<?php the_permalink(); ?>">
                              <?php if ( has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('icatch375'); ?>
                              <?php elseif ( get_fit_noimg()): ?>
                                <img <?php echo fit_correct_src(); ?>="<?php echo get_fit_noimg(); ?>" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
                              <?php else: ?>
                                <img <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_375.gif" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
                              <?php endif; ?>
                            </a>
                          </div>
                        <?php endif; ?>

                        <div class="categoryBox__contents">
                          <?php if( !empty( get_option('fit_homeCategory_time') ) || !empty(get_option('fit_homeCategory_update'))): ?>
                            <ul class="dateList">
                              <?php if( !empty(get_option('fit_homeCategory_time') )): ?>
                                <li class="dateList__item icon-clock"><?php the_time(get_option('date_format')); ?></li>
                              <?php endif; ?>
                              <?php if ( !empty(get_option('fit_homeCategory_update')) && get_the_time( 'U' ) !== get_the_modified_time( 'U' ) || !empty(get_option('fit_homeCategory_update')) && empty(get_option('fit_homeCategory_time'))) : ?>
                                <li class="dateList__item icon-update"><?php the_modified_date(get_option('date_format')) ?></li>
                              <?php endif; ?>
                            </ul>
                          <?php endif; ?>

                          <h2 class="heading heading-archive ">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                          </h2>
                        </div>

                      <?php endforeach; ?>
                    </li>
                  <?php endforeach;?>
                <?php endif; ?>

              </ul>
            </div>
          </div>
          <!--categoryBox-->
        </div>
      <?php endif; ?>
    <?php endif; ?>


  </div>
  <!--/l-footerTop-->




<?php get_footer(); ?>
