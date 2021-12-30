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


      <div class="dividerBottom">
        <div class="archiveHead">
          <div class="archiveHead__contents">
            <span class="archiveHead__subtitle"><?php echo fit_get_headline_subtitle(); ?></span>
            <h1 class="heading heading-primary"><?php echo fit_get_headline_title(); ?></h1>
          </div>
        </div>
      </div>



      <div class="dividerBottom">


      <?php if( is_post_type_archive('custom') || is_tax('custom_category') || is_tax('custom_tag')) : ?>


        <!--custom-->
        <div class="custom<?php if (get_option('fit_custList_frame') && get_option('fit_custList_frame') != 'off' ):?> <?php echo get_option('fit_custList_frame')?><?php endif; ?>">
        <?php if (have_posts()): ?>
	      <?php while (have_posts()) : the_post(); ?>
          <div class="custom__item<?php if(get_option('fit_custList_style') && get_option('fit_custList_style') != 'off' ): ?> custom__item-<?php echo get_option('fit_custList_style') ?><?php endif; ?>">
            <div class="custom__data">
              <span class="custom__day"><?php the_time(get_option('date_format')); ?></span>
              <?php
			  if(get_option('fit_custBasis_category') == 'on' ){
				   $cat = get_the_terms( $post->ID, 'custom_category' );
			  	   if ( $cat[0] ) {
				  	   echo '<span class="custom__cat">';
				  	   echo '<a href="' . get_term_link( $cat[0]->term_id ) . '">' . $cat[0]->name . '</a>';
				  	   echo '</span>';
			  	   }
			  }
			  ?>
            </div>
            <h2 class="heading heading-custom">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
          </div>
		  <?php endwhile; ?>
	    <?php else : ?>
          <div class="custom__item">
            <p class="phrase phrase-primary">投稿が1件も見つかりませんでした。</p>
          </div>
	    <?php endif; ?>
        </div>
        <!--/custom-->


      <?php else : ?>


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


	  <?php endif; ?>



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
