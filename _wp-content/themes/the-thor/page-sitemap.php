<?php /* Template Name: サイトマップTPL */?>
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


			<div class="sitemap">


			  <?php if ( get_option('fit_bsSitemap_page') == 'on' ): ?>
              <!--固定ページ-->
              <h2><?php
                if ( get_option('fit_bsSitemap_pageH')){
                  echo get_option('fit_bsSitemap_pageH');
                }else {
                  echo '固定';
                }
              ?>ページ</h2>
                <ul>
                  <?php if ( get_option('fit_bsSitemap_pageTop')): ?>
                  <li><a href="<?php echo home_url() ?>"><?php bloginfo('name') ?></a></li>
                  <?php endif; ?>
                  <?php

				  $depth   = '0';
				  $exclude = '';
				  if(get_option('fit_bsSitemap_pageRank')){
					  $depth = get_option('fit_bsSitemap_pageRank');
				  }
				  if(get_option('fit_bsSitemap_pageExc')){
					  $exclude = get_option('fit_bsSitemap_pageExc');
				  }

                  wp_list_pages( array(
		              'sort_column' => 'menu_order',
			          'sort_order' => 'asc',
			          'depth' => $depth,//表示階層
		              'exclude' => $exclude,//除外ページ(,区切り)
			          'title_li' => '',
		          )); ?>
                </ul>
              <!--/固定ページ-->
              <?php endif; ?>





		      <?php if ( get_option('fit_bsSitemap_post') == 'on' ): ?>
              <!--投稿ページ-->

          	  <?php if ( get_option('fit_bsSitemap_postDisplay') != 'value2' ): ?>
          	  <!--同一-->
              <h2><?php
                if ( get_option('fit_bsSitemap_postH')){
                  echo get_option('fit_bsSitemap_postH');
                }else {
                  echo '投稿';
                }
              ?>ページ</h2>
          	  <?php
          	  $args = array(
		      	  'orderby' => 'count',
			  	  'order' => 'desc',
			  	  'exclude' => get_option('fit_bsSitemap_postCateExc'),//除外カテゴリ(,区切り)
		  	  );
		  	  $categories = get_categories($args);
		 	  foreach ($categories as $category) : ?>
          	  <h3><a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a></h3>
          	  <ul>
		   	  <?php
		   	  $post_id  = get_option('fit_bsSitemap_postExc');
			  $not_post = explode(',', $post_id);

           	  $args = array(
		       	  'orderby' => 'date',
			   	  'order' => 'desc',
			      'posts_per_page' => '-1',//全権取得
			      'post__not_in' => $not_post,//除外投稿(,区切り)
			      'cat' => $category->term_id,
		      );
		   	  $the_query = new WP_Query( $args );
			  if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
              <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		      <?php endwhile; ?>
		      <?php wp_reset_postdata(); ?>
		      <?php else : ?>
              <li>投稿がありません</li>
		      <?php endif; ?>
              </ul>
		  	  <?php endforeach; ?>
          	  <!--/同一-->
          	  <?php endif; ?>





          	  <?php if ( get_option('fit_bsSitemap_postDisplay') == 'value2' ): ?>
          	  <!--分割-->
          	  <h2>投稿ページ</h2>
          	  <h3>カテゴリー</h3>
          	  <ul>
            	  <?php
            	  wp_list_categories( array(
		        	  'orderby' => 'count',
			    	  'order' => 'desc',
			    	  'exclude' => get_option('fit_bsSitemap_postCateExc'),//除外カテゴリ(,区切り)
		        	  'title_li' => '',
			    	  'show_count' => 0,
		    	  )); ?>
          	  </ul>

          	  <h3>ページ</h3>
          	  <ul>

              <?php
		      $post_id  = get_option('fit_bsSitemap_postExc');
			  $not_post = explode(',', $post_id);
			  $cate_id  = get_option('fit_bsSitemap_postCateExc');
			  $not_cate = explode(',', $cate_id);

              $args = array(
		          'orderby' => 'date',
			      'order' => 'desc',
			      'posts_per_page' => '-1',//全権取得
			      'post__not_in' => $not_post,//除外投稿(,区切り)
			      'category__not_in ' => $not_cate,//除外カテゴリー(,区切り)
		      );
		      $the_query = new WP_Query( $args );
			  if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		      <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		      <?php endwhile; ?>
		      <?php wp_reset_postdata(); ?>
		      <?php else : ?>
              <li>投稿がありません</li>
		      <?php endif; ?>

              </ul>
          	  <!--/分割-->
		  	  <?php endif; ?>

        	  <!--/投稿ページ-->
        	  <?php endif; ?>





        	  <?php if ( get_option('fit_bsSitemap_custom') == 'on' ): ?>
        	  <!--カスタム投稿(custom)-->

          	  <?php if ( get_option('fit_bsSitemap_customDisplay') != 'value2' ): ?>
          	  <!--同一-->
		  	  <?php
          	  $post_type = get_post_type_object('custom');
		  	  $label = $post_type->label;
		  	  ?>
          	  <h2><?php echo $label; ?>ページ</h2>

          	  <?php
          	  $args = array(
			  	  'orderby' => 'count',
			  	  'order' => 'desc',
			  	  'taxonomy' => 'custom_category',
			  	  'exclude' => get_option('fit_bsSitemap_customCateExc'),
		  	  );
		  	  $categories = get_categories($args);
		  	  foreach ($categories as $category) : ?>
          	  <h3><a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a></h3>
          	  <ul>

              <?php
			  $post_id  = get_option('fit_bsSitemap_customExc');
			  $not_post = explode(',', $post_id);

              $args = array(
		          'post_type' => 'custom',
			      'orderby' => 'date',
			      'order' => 'desc',
			      'posts_per_page' => '-1',//全権取得
			      'post__not_in' => $not_post,//除外投稿(,区切り)
			      'tax_query' => array(
			       	  array(
				          'taxonomy' => 'custom_category',
					   	  'field'    => 'term_id',
					      'terms'    => $category->term_id
				      ),
			      ),
		      );
		      $the_query = new WP_Query( $args );
			  if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
              <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		      <?php endwhile; ?>
		      <?php wp_reset_postdata(); ?>
		      <?php else : ?>
              <li>投稿がありません</li>
		      <?php endif; ?>

          	  </ul>
		  	  <?php endforeach; ?>
          	  <!--/同一-->
          	  <?php endif; ?>





              <?php if ( get_option('fit_bsSitemap_customDisplay') == 'value2' ): ?>
          	  <!--分割-->
		  	  <?php
          	  $post_type = get_post_type_object('custom');
		  	  $label = $post_type->label;
		  	  ?>
          	  <h2><?php echo $label; ?>ページ</h2>

          	  <h3>カテゴリー</h3>
          	  <ul>
		      <?php
              wp_list_categories( array(
			      'orderby' => 'count',
			      'order' => 'desc',
			      'taxonomy' => 'custom_category',
		          'exclude' => get_option('fit_bsSitemap_customCateExc'),//除外カテゴリ(,区切り)
		          'title_li' => '',
			      'show_count' => 0,
		      )); ?>
          	  </ul>

              <h3>ページ</h3>
          	  <ul>

              <?php
			  $post_id  = get_option('fit_bsSitemap_customExc');
			  $not_post = explode(',', $post_id);
			  $cate_id  = get_option('fit_bsSitemap_customCateExc');
			  $not_cate = explode(',', $cate_id);

              $args = array(
		          'orderby' => 'date',
			      'order' => 'desc',
			      'post_type' => 'custom',
			      'posts_per_page' => '-1',//全権取得
			      'post__not_in' => $not_post,//除外投稿(,区切り)
				  'tax_query' => array(
					  array(
						  'taxonomy' => 'custom_category',
						  'field'    => 'term_id',
						  'terms'    => $not_cate,
						  'operator' => 'NOT IN'
					  ),
				  ),
		      );
		      $the_query = new WP_Query( $args );
			  if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		      <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		      <?php endwhile; ?>
		      <?php wp_reset_postdata(); ?>
		      <?php else : ?>
              <li>投稿がありません</li>
		      <?php endif; ?>

          	  </ul>
          	  <!--/分割-->
          	  <?php endif; ?>

        	  <!--/カスタム投稿(custom)-->
			  <?php endif; ?>

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
