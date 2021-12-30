<?php get_header(); ?>




  <!--l-wrapper-->
  <div class="l-wrapper">

    <!--l-main-->
    <?php
    //フレーム設定
    $frame = '';
    if (get_option('fit_conMain_frame') && get_option('fit_conMain_frame') != 'off' ){$frame = ' '.get_option('fit_conMain_frame');}

    //ページ横幅のオプション設定
    $width_archive = '';
    if (get_option('fit_archiveLayout_width') && get_option('fit_archiveLayout_width') != 'off'){$width_archive = get_option('fit_archiveLayout_width'); }

    //レイアウト設定
    $layout = '';
    if ( get_option('fit_archiveLayout_column') == '1' ){$layout = ' l-main-wide'.$width_archive;}
    if ( get_option('fit_archiveLayout_column') != '1' && get_option('fit_archiveLayout_side') == 'left'  ){$layout = ' l-main-right';}
    ?>
    <main class="l-main<?php echo $frame.$layout; ?>">


      <?php if (!is_paged()) : ?>
      <?php $tag = get_query_var('tag_id'); ?>
      <div class="dividerBottom">
        <?php $term_meta = get_option('post_tag_'.$tag); ?>
        <div class="archiveHead<?php if ( get_option('fit_archiveTag_headline') == 'color' || get_option('fit_archiveTag_headline') == 'colorgray' ):?> cc-bg<?php echo $tag ?><?php endif; ?>
		<?php if (get_option('fit_archiveTag_headline') && get_option('fit_archiveTag_headline') != 'off' ):?> mask mask-<?php echo get_option('fit_archiveTag_headline')?><?php endif; ?>">
        <?php if (get_option('fit_archiveTag_headline') && get_option('fit_archiveTag_headline') != 'off' && get_option('fit_archiveTag_img') && !empty($term_meta['img'])):?><img class="archiveHead__img" <?php echo fit_correct_src(); ?>="<?php echo $term_meta['img'];?>" alt="<?php echo fit_get_headline_title(); ?>" <?php echo fit_dummy_src(); ?>><?php endif; ?>
          <div class="archiveHead__contents">
            <span class="archiveHead__subtitle"><?php echo fit_get_headline_subtitle(); ?></span>
            <h1 class="heading heading-primary cc-ft<?php echo $tag; ?>"><?php echo fit_get_headline_title(); ?></h1>
            <?php if(tag_description()): ?><p class="phrase phrase-secondary"><?php echo tag_description(); ?></p><?php endif; ?>

          </div>
        </div>

		<?php if($term_meta['free_input']): ?>
        <!--archiveContents-->
        <article class="archiveContents<?php if (get_option('fit_archiveTag_frame') && get_option('fit_archiveTag_frame') != 'off' ):?> <?php echo get_option('fit_archiveTag_frame')?><?php endif; ?>">

          <section class="content<?php fit_content_class(); ?>">
			<?php echo apply_filters('the_content', $term_meta['free_input']);?>
          </section>

        </article>
        <!--/archiveContents-->
        <?php endif; ?>
      </div>
      <?php else : ?>
      <div class="dividerBottom">
        <div class="archiveHead">
          <div class="archiveHead__contents">
            <span class="archiveHead__subtitle"><?php echo fit_get_headline_subtitle(); ?></span>
            <h1 class="heading heading-primary cc-ft<?php echo $tag; ?>"><?php echo fit_get_headline_title(); ?></h1>
          </div>
        </div>
      </div>
      <?php endif; ?>




      <div class="dividerBottom">
        <!--controller-->
        <?php fit_archive_controller() ?>
        <!--/controller-->

        <!--archive-->
        <?php if (have_posts()) : $count = 1; ?>
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
	    <?php else : ?>
        <div class="archive">
          <div class="archive__item archive__item-none<?php if (get_option('fit_archiveList_frame') && get_option('fit_archiveList_frame') != 'off' ):?> <?php echo get_option('fit_archiveList_frame')?><?php endif; ?>">
            <p class="phrase phrase-primary">投稿が1件も見つかりませんでした。</p>
          </div>
        </div>
	    <?php endif; ?>
        <!--/archive-->

        <!--pager-->
		<?php if ( function_exists( 'fit_pagination' ) ) {fit_pagination( $wp_query->max_num_pages );} ?>
        <!--/pager-->
      </div>

    </main>
    <!--/l-main-->


    <?php if ( get_option('fit_archiveLayout_column') != '1' ):?>
      <?php get_sidebar(); ?>
	<?php endif; ?>


  </div>
  <!--/l-wrapper-->



<?php get_footer(); ?>
