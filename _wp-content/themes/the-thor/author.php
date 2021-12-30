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
      <div class="dividerBottom">
        <div class="archiveHead">
          <div class="archiveHead__contents u-clearfix">
            <?php
            $avatar = get_avatar($author,300);
			$imgtag= '/<img.*?src=(["\'])(.+?)\1.*?>/i';
			if(preg_match($imgtag, $avatar, $imgurl)){
				$avatar = $imgurl[2];
			}
			?>
            <div class="archiveHead__authorImg"><img width="120" height="120" <?php echo fit_correct_src(); ?>="<?php echo $avatar; ?>" alt="<?php echo fit_get_headline_title(); ?>" <?php echo fit_dummy_src(); ?>></div>
            <div class="archiveHead__authorText">
              <span class="archiveHead__subtitle"><?php echo fit_get_headline_subtitle(); ?></span>
              <h1 class="heading heading-primary"><?php echo fit_get_headline_title(); ?><?php if(get_the_author_meta('user_group',$author)): ?><span><?php the_author_meta('user_group',$author); ?></span><?php endif; ?></h1>
              <ul class="archiveHead__slist">
		        <?php if(get_the_author_meta('facebook',$author)): ?><li class="archiveHead__sitem"><a class="archiveHead__slink icon-facebook" href="<?php the_author_meta('facebook',$author); ?>"></a></li><?php endif; ?>
		        <?php if(get_the_author_meta('twitter',$author)): ?><li class="archiveHead__sitem"><a class="archiveHead__slink icon-twitter" href="<?php the_author_meta('twitter',$author); ?>"></a></li><?php endif; ?>
		        <?php if(get_the_author_meta('instagram',$author)): ?><li class="archiveHead__sitem"><a class="archiveHead__slink icon-instagram" href="<?php the_author_meta('instagram',$author); ?>"></a></li><?php endif; ?>
		        <?php if(get_the_author_meta('gplus',$author)): ?><li class="archiveHead__sitem"><a class="archiveHead__slink icon-google-plus" href="<?php the_author_meta('gplus',$author); ?>"></a></li><?php endif; ?>
            <?php if(get_the_author_meta('youtube',$author)): ?><li class="archiveHead__sitem"><a class="archiveHead__slink icon-youtube" href="<?php the_author_meta('youtube',$author); ?>"></a></li><?php endif; ?>
            <?php if(get_the_author_meta('linkedin',$author)): ?><li class="archiveHead__sitem"><a class="archiveHead__slink icon-linkedin" href="<?php the_author_meta('linkedin',$author); ?>"></a></li><?php endif; ?>
            <?php if(get_the_author_meta('pinterest',$author)): ?><li class="archiveHead__sitem"><a class="archiveHead__slink icon-pinterest" href="<?php the_author_meta('pinterest',$author); ?>"></a></li><?php endif; ?>
              </ul>
            </div>
          </div>
		  <?php if(get_the_author_meta('description',$author)): ?><p class="phrase phrase-secondary archiveHead__authorDescription"><?php the_author_meta('description',$author); ?></p><?php endif; ?>
        </div>
      </div>
      <?php else : ?>
      <div class="dividerBottom">
        <div class="archiveHead">
          <div class="archiveHead__contents">
            <span class="archiveHead__subtitle"><?php echo fit_get_headline_subtitle(); ?></span>
            <h1 class="heading heading-primary"><?php echo fit_get_headline_title(); ?></h1>
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
