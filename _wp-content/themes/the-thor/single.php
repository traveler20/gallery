<?php get_header();
  require_once locate_template('inc/parts/display_category.php');
  $cats = get_the_category();
  $display_category = null;
  $display_category = new FitDisplayTheCategory( $cats,'category' );

  $most_btm_names = array();
  $most_btm_names = $display_category->get_deisplay_the_category();

  $term_id = get_cat_ID( $most_btm_names[0] );
  $cat_link = get_category_link( $term_id );
  $cat_name = $most_btm_names[0];

?>

  <?php if ( get_option('fit_postStyle_headline') == 'viral' ): ?>
  <div class="viral">
    <div class="viral__bg mask<?php if(get_option('fit_postStyle_mask') && get_option('fit_postStyle_mask') != 'off'): ?> mask-<?php echo get_option('fit_postStyle_mask') ?><?php endif; ?>
    <?php
    if(get_option('fit_postStyle_mask') == 'color' || get_option('fit_postStyle_mask') == 'colorgray'){

		if(!empty($cats[0])){
			echo 'cc-bg'.$term_id;
		}
	}
	?>
    ">
    <?php if ( has_post_thumbnail()): ?>
      <?php if ( is_mobile()): ?>
        <?php the_post_thumbnail('icatch768'); ?>
      <?php else: ?>
        <?php the_post_thumbnail('icatch1280'); ?>
      <?php endif; ?>
    <?php elseif ( get_fit_noimg()): ?>
      <img <?php echo fit_correct_src(); ?>="<?php echo get_fit_noimg(); ?>" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
    <?php else: ?>
      <?php if ( is_mobile()): ?>
        <img <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_768.gif" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
      <?php else: ?>
        <img <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_1280.gif" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
      <?php endif; ?>
    <?php endif; ?>
    </div>

    <div class="container">
      <div class="viral__container">
        <div class="viral__contents">
          <h1 class="heading heading-primary"><?php the_title(); ?></h1>
          <ul class="dateList">
            <?php if( !empty(get_option('fit_postStyle_time')) ): ?>
              <li class="dateList__item icon-clock"><?php the_time(get_option('date_format')); ?></li>
            <?php endif; ?>
            <?php if ( !empty(get_option('fit_postStyle_update')) && get_the_time( 'U' ) !== get_the_modified_time( 'U' ) || !empty(get_option('fit_postStyle_update')) && empty(get_option('fit_postStyle_time'))) : ?>
              <li class="dateList__item icon-update"><?php the_modified_date(get_option('date_format')); ?></li>
            <?php endif; ?>
              <li class="dateList__item icon-folder"><?php the_category(', ');?></li>
            <?php if(has_tag() == true) : ?>
              <li class="dateList__item icon-tag"><?php the_tags(''); ?></li>
            <?php endif; ?>
            <?php
            $views = get_post_meta(get_the_ID(), 'post_views' , true );
            if( !empty(get_option('fit_postStyle_view'))  ): ?>
              <li class="dateList__item icon-eye"><?php echo $views; ?><?php if(get_option('fit_bsRank_unit')) : ?><?php echo get_option('fit_bsRank_unit'); ?><?php else: ?>view<?php endif; ?></li>
            <?php endif; ?>
            <?php if( !empty(get_option('fit_postStyle_comment')) ): ?>
              <li class="dateList__item icon-bubble2" title="コメント数"><?php comments_number( '0件', '1件', '%件' ); ?></li>
            <?php endif; ?>
          </ul>
        </div>


        <div class="eyecatch<?php if (get_option('fit_postStyle_aspect') && get_option('fit_postStyle_aspect') != 'off' ): ?> <?php echo get_option('fit_postStyle_aspect'); ?><?php endif; ?>">
          <?php
          if ( !get_option('fit_postStyle_category') ){
            if(!empty($cats[0])){
        		  echo '<span class="eyecatch__cat cc-bg'.$term_id.'">';
        		  echo '<a href="' . $cat_link . '">' . $cat_name . '</a>';
        		  echo '</span>';
        	  }
          }
          ?>
          <span class="eyecatch__link">
            <?php if ( has_post_thumbnail()): ?>
              <?php the_post_thumbnail('icatch375'); ?>
            <?php elseif ( get_fit_noimg()): ?>
              <img <?php echo fit_correct_src(); ?>="<?php echo get_fit_noimg(); ?>" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
            <?php else: ?>
              <img <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_375.gif" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
            <?php endif; ?>
          </span>

        </div>
      </div>
    </div>

  </div>
  <?php endif; ?>

  <div class="wider">
    <?php fit_breadcrumb(); ?>
  </div>





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
    if ( get_post_meta(get_the_ID(), 'column_layout', true) && get_post_meta(get_the_ID(), 'column_layout', true) != '0' ){
      if ( get_post_meta(get_the_ID(), 'column_layout', true) == '1' ){$layout = ' l-main-wide'.$width_post;}
      if ( get_post_meta(get_the_ID(), 'column_layout', true) == '2' && get_option('fit_postLayout_side') == 'left' ){$layout = ' l-main-right';}
    }
    else{
      if ( get_option('fit_postLayout_column') == '1' ){$layout = ' l-main-wide'.$width_post;}
      if ( get_option('fit_postLayout_column') != '1' && get_option('fit_postLayout_side') == 'left'  ){$layout = ' l-main-right';}
    }
    ?>
    <main class="l-main<?php echo $frame.$layout; ?>">





      <div class="dividerBottom">


      <?php if ( get_option('fit_postStyle_headline') != 'viral' ): ?>
        <h1 class="heading heading-primary"><?php the_title(); ?></h1>

        <ul class="dateList dateList-main">
          <?php if( !empty(get_option('fit_postStyle_time')) ): ?>
            <li class="dateList__item icon-clock"><?php the_time(get_option('date_format')); ?></li>
          <?php endif; ?>
          <?php if ( !empty(get_option('fit_postStyle_update')) && get_the_time( 'U' ) !== get_the_modified_time( 'U' ) || !empty(get_option('fit_postStyle_update')) && empty(get_option('fit_postStyle_time'))) : ?>
            <li class="dateList__item icon-update"><?php the_modified_date(get_option('date_format')); ?></li>
          <?php endif; ?>
            <li class="dateList__item icon-folder"><?php the_category(', ');?></li>
		  <?php if(has_tag() == true) : ?>
            <li class="dateList__item icon-tag"><?php the_tags(''); ?></li>
		  <?php endif; ?>
          <?php
          $views = get_post_meta(get_the_ID(), 'post_views' , true );
          if( !empty(get_option('fit_postStyle_view')) ): ?>
            <li class="dateList__item icon-eye"><?php echo $views; ?><?php if(get_option('fit_bsRank_unit')) : ?><?php echo get_option('fit_bsRank_unit'); ?><?php else: ?>view<?php endif; ?></li>
          <?php endif; ?>
          <?php if( !empty(get_option('fit_postStyle_comment')) ): ?>
            <li class="dateList__item icon-bubble2" title="コメント数"><?php comments_number( '0件', '1件', '%件' ); ?></li>
          <?php endif; ?>
        </ul>

        <?php if ( get_option('fit_postStyle_headline') != 'none' ): ?>
        <div class="eyecatch<?php if (get_option('fit_postStyle_aspect') && get_option('fit_postStyle_aspect') != 'off' ): ?> <?php echo get_option('fit_postStyle_aspect'); ?><?php endif; ?> eyecatch-main">
          <?php
		  /* $cat = get_the_category(); */
      if ( !get_option('fit_postStyle_category') ){

        if(!empty($cats[0])){
  			  echo '<span class="eyecatch__cat eyecatch__cat-big cc-bg'.$term_id.'">';
  			  echo '<a href="' . $cat_link . '">' . $cat_name . '</a>';
  			  echo '</span>';
  		  }
		  }
		  ?>
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




        <?php if ( is_active_sidebar('post_top')  ) : ?>
        <!--post_top_widget-->
        <div class="dividerBottom">
		  <?php dynamic_sidebar('post_top'); ?>
        </div>
        <!--/post_top_widget-->
		<?php endif; ?>


        <!--postContents-->
        <div class="postContents<?php if (get_option('fit_postStyle_frame') && get_option('fit_postStyle_frame') != 'off' ):?> <?php echo get_option('fit_postStyle_frame')?><?php endif; ?>">
          <?php if (get_option('fit_postShare_top') == 'on' && get_post_meta(get_the_ID(), 'share_hide', true) != '1') : ?>
		    <aside class="social-top"><?php fit_share_btn(); ?></aside>
          <?php endif; ?>


		  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <section class="content<?php fit_content_class(); ?>">
			<?php the_content(); ?>
          </section>
          <?php
          // ページングの表示
          fit_link_pages();
          ?>
		  <?php endwhile; endif; ?>


          <?php if (get_option('fit_postShare_bottom') == 'on' && get_post_meta(get_the_ID(), 'share_hide', true) != '1') : ?>
		    <aside class="social-bottom"><?php fit_share_btn(); ?></aside>
          <?php endif; ?>
        </div>
        <!--/postContents-->


        <?php if ( is_active_sidebar('post_bottom')  ) : ?>
        <!--post_bottom_widget-->
        <div class="dividerTop">
		  <?php dynamic_sidebar('post_bottom'); ?>
        </div>
        <!--/post_bottom_widget-->
		<?php endif; ?>




        <?php if( get_option('fit_postCta_switch') == 'on' && get_post_meta(get_the_ID(), 'cta_hide', true) != '1' ):?>
        <!-- 記事下CTA -->
        <?php
		$frame = '';
        if(get_option('fit_postCta_style') && get_option('fit_postCta_style') != 'off' ){
			$frame = get_option('fit_postCta_style');
		}?>
        <div class="content postCta <?php echo $frame ?>">

		<?php
		if(get_post_meta(get_the_ID(), 'cta_id', true) ){
			$id = get_post_meta(get_the_ID(), 'cta_id', true);
		}elseif(get_option('fit_postCta_id') ){
			$id = get_option('fit_postCta_id');
		}else{
			$id = '';
		}
		$args = array(
			'p' => $id,
      'posts_per_page' => '1',
      'order' => 'ASC',
			'post_type' => 'cta'
		);
  		$my_query = new WP_Query( $args );
		while ( $my_query->have_posts() ) : $my_query->the_post();
		?>
  			<?php the_content(); ?>
		<?php endwhile; wp_reset_postdata();  ?>

        </div>
        <!-- /記事下CTA -->
        <?php endif; ?>

	    <?php if (get_option('fit_adPost_doubleLeft') && get_post_meta(get_the_ID(), 'rectangle_hide', true) != '1' ||
		           get_option('fit_adPost_doubleRight') && get_post_meta(get_the_ID(), 'rectangle_hide', true) != '1' ):?>
      <!-- ダブルレクタングル広告 -->
	    <div class="rectangle<?php if(get_option('fit_adPost_styleR')){ echo ' rectangle-no';} ?>">
	      <div class="rectangle__item rectangle__item-left">
            <?php echo get_option('fit_adPost_doubleLeft'); ?>
	      </div>
	      <div class="rectangle__item rectangle__item-right">
            <?php echo get_option('fit_adPost_doubleRight'); ?>
	      </div>
          <span class="rectangle__title"><?php echo get_option('fit_adPost_textR'); ?></span>
	    </div>
      <!-- /ダブルレクタングル広告 -->
      <?php endif; ?>

		<?php
		// フォローボタン、Prev Next記事、プロフィール、関連記事の表示
		if ( get_option( 'fit_postSns_switch' ) == 'on'
			|| get_option( 'fit_postPrevNext_switch' ) == 'on'
			|| get_option( 'fit_postProfile_switch' ) == 'on'
			|| get_option( 'fit_postRelated_switch' ) == 'on'
		) {
			require_once locate_template( 'inc/front/class-fit-post-parts-order.php' );
			$parts_order = Fit_Post_Parts_Order::get_parts_order();
			foreach ( $parts_order as $value ) {
				switch ( $value['name'] ) {
					// フォローボタン
					case Fit_Post_Parts_Order::$follow:
						if ( get_option( 'fit_postSns_switch' ) == 'on' && get_post_meta( get_the_ID(), 'follow_hide', true ) != '1' ) {
							get_template_part( 'template-parts/single', 'snsfollow' );
						}
						break;
					// Prev Next記事
					case Fit_Post_Parts_Order::$prevnext:
						if ( get_option( 'fit_postPrevNext_switch' ) == 'on' && get_post_meta( get_the_ID(), 'prevNext_hide', true ) != '1' ) {
							get_template_part( 'template-parts/single', 'prevnext' );
						}
						break;
					// プロフィール
					case Fit_Post_Parts_Order::$profile:
						if ( get_option( 'fit_postProfile_switch' ) == 'on' && get_post_meta( get_the_ID(), 'profile_hide', true ) != '1' ) {
							get_template_part( 'template-parts/single', 'profile' );
						}
						break;
					// 関連記事
					case Fit_Post_Parts_Order::$related:
						if ( get_option( 'fit_postRelated_switch' ) == 'on' && get_post_meta( get_the_ID(), 'related_hide', true ) != '1' ) {
							get_template_part( 'template-parts/single', 'related' );
						}
						break;
				}
			}
		}
		?>

        <!-- コメント -->
          <?php comments_template(); ?>
        <!-- /コメント -->





		<?php if( !is_user_logged_in() && !is_bot() ): ?>
			<!-- PVカウンター -->
			<?php
			$id = get_the_ID();
			$post_view_action = new Fit_Post_View_Action( $id );
			$post_view_action->add_wp_footer();
			?>
			<!-- /PVカウンター -->
		<?php endif; ?>



      </div>

    </main>
    <!--/l-main-->

    <?php if ( get_post_meta(get_the_ID(), 'column_layout', true) && get_post_meta(get_the_ID(), 'column_layout', true) != '0' ):?>
      <?php if ( get_post_meta(get_the_ID(), 'column_layout', true) == '2' ):?>
        <?php get_sidebar(); ?>
      <?php endif; ?>
    <?php else:?>
      <?php if ( get_option('fit_postLayout_column') != '1' ):?>
        <?php get_sidebar(); ?>
      <?php endif; ?>
	<?php endif; ?>


  </div>
  <!--/l-wrapper-->









  <?php
  if ( get_option('fit_postCategory_switch') == 'on' && get_post_meta(get_the_ID(), 'category_hide', true) != '1') :
    $cats = get_the_category();
    $display_category = null;
    $display_category = new FitDisplayTheCategory( $cats,'category' );
  
    $most_btm_names = array();
    $most_btm_names = $display_category->get_deisplay_the_category();
  
    $term_id = get_cat_ID( $most_btm_names[0] );
  ?>
  <!--l-footerTop-->
  <div class="l-footerTop">
    <div class="wider">

      <div class="categoryBox">
        <div class="container">
          <h2 class="heading heading-main u-bold <?php echo 'cc-ft'.$term_id; ?>"><i class="icon-folder"></i><?php echo $cat_name ?><span><?php if(get_option('fit_postCategory_sub')){echo get_option('fit_postCategory_sub');}else{echo 'の最新記事8件';} ?></span></h2>

          <ul class="categoryBox__list">
		  <?php
		  $number = '8';
		  if(get_option('fit_postCategory_number')){
			  $number = get_option('fit_postCategory_number');
		  }

		  $args = array(
			  'cat'=> $term_id,
			  'ignore_sticky_posts' => '1',
			  'posts_per_page' => $number,
		  );
		  $my_query = new WP_Query( $args );

		  ?>
		  <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
            <li class="categoryBox__item">

			  <?php if ( get_option('fit_postCategory_aspect') != 'none' ): ?>
              <div class="eyecatch<?php if(get_option('fit_postCategory_aspect') && get_option('fit_postCategory_aspect') != 'off'): ?> <?php echo get_option('fit_postCategory_aspect');?><?php endif; ?>">
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
              <?php if( !empty( get_option('fit_postCategory_time') ) || !empty(get_option('fit_postCategory_update'))): ?>
                <ul class="dateList">
                <?php if( !empty(get_option('fit_postCategory_time') )): ?>
                  <li class="dateList__item icon-clock"><?php the_time(get_option('date_format')); ?></li>
                <?php endif; ?>
                <?php if ( !empty(get_option('fit_postCategory_update')) && get_the_time( 'U' ) !== get_the_modified_time( 'U' ) || !empty(get_option('fit_postCategory_update')) && empty(get_option('fit_postCategory_time'))) : ?>
                  <li class="dateList__item icon-update"><?php the_modified_date(get_option('date_format')); ?></li>
                <?php endif; ?>
                </ul>
			  <?php endif; ?>

                <h2 class="heading heading-tertiary">
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
              </div>
            </li>
		  <?php endwhile; wp_reset_postdata(); ?>
          </ul>
        </div>
      </div>

    </div>
  </div>
  <?php endif; ?>



  <!-- schema -->
  <script type="application/ld+json">
  <?php
  // ユーザー投稿サムネイルの画像サイズを取得
  if (has_post_thumbnail()){
	  $thumbnail_id = get_post_thumbnail_id();
	  $eyeimg = wp_get_attachment_image_src( $thumbnail_id , 'icatch768' );
  }
  // ユーザー投稿NO IMAGEサイズを取得
  if (get_fit_noimg()){
	  $noimg_date = get_fit_noimg();
	  $noimg_id = attachment_url_to_postid($noimg_date);
	  $noimg = wp_get_attachment_image_src( $noimg_id, 'icatch768' );
  }
  // ユーザー投稿LOGOサイズを取得
  if (get_fit_logo()){
	  $logo_date = get_fit_logo();
	  $logo_id = attachment_url_to_postid($logo_date);
	  $logo = wp_get_attachment_image_src( $logo_id, 'full' );
  }
  // ユーザー投稿AMP LOGOサイズを取得
  if (get_fit_amplogo()){
	  $amplogo_date = get_fit_amplogo();
	  $amplogo_id = attachment_url_to_postid($amplogo_date);
	  $amplogo = wp_get_attachment_image_src( $amplogo_id, 'full' );
  }
  ?>
  {
    "@context": "http://schema.org",
    "@type": "Article ",
    "mainEntityOfPage":{
      "@type": "WebPage",
      "@id": "<?php the_permalink(); ?>"
    },
    "headline": "<?php echo get_the_title(); ?>",
    "description": "<?php echo get_the_excerpt(); ?>",
    "image": {
      "@type": "ImageObject",
      <?php if(has_post_thumbnail()) : ?>"url": "<?php echo $eyeimg[0]; ?>",
      "width": "<?php echo $eyeimg[1]; ?>px",
      "height": "<?php echo $eyeimg[2]; ?>px"
      <?php elseif ( get_fit_noimg()): ?>"url": "<?php echo $noimg[0]; ?>",
      "width": "<?php echo $noimg[1]; ?>px",
      "height": "<?php echo $noimg[2]; ?>px"
      <?php else: ?>"url": "<?php echo get_template_directory_uri(); ?>/img/img_no_768.gif",
      "height": "768px",
      "width": "432px"
      <?php endif; ?>
    },
    "datePublished": "<?php echo get_the_date(DATE_ISO8601); ?>",
    "dateModified": "<?php if ( get_the_date() != get_the_modified_time() ){ the_modified_date(DATE_ISO8601); } else { echo get_the_date(DATE_ISO8601); } ?>",
    "author": {
      "@type": "Person",
      "name": "<?php the_author_meta('display_name'); ?>"
    },
    "publisher": {
      "@type": "Organization",
      "name": "<?php bloginfo('name'); ?>",
      "logo": {
        "@type": "ImageObject",
        <?php if(get_fit_logo()) : ?>"url": "<?php echo $logo[0]; ?>",
        "width": "<?php echo $logo[1]; ?>px",
        "height": "<?php echo $logo[2]; ?>px"
        <?php elseif ( get_fit_amplogo()): ?>"url": "<?php echo $amplogo[0]; ?>",
        "width": "<?php echo $amplogo[1]; ?>px",
        "height": "<?php echo $amplogo[2]; ?>px"
        <?php else: ?>"url": "<?php echo get_template_directory_uri(); ?>/img/amp_default_logo.png",
        "height": "600px",
        "width": "60px"
        <?php endif; ?>
      }
    }
  }
  </script>
  <!-- /schema -->



<?php get_footer(); ?>
