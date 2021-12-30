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
            <h1 class="heading heading-primary"><?php echo fit_get_headline_title(); ?><span><?php echo $wp_query->found_posts; ?>件</span></h1>

            <div class="archiveHead__search">

              <?php if(get_search_query()):?><span class="archiveHead__searchItem icon-pencil2"><?php echo get_search_query()?></span><?php endif; ?>

			  <?php
              if(!empty($_GET["cat"])){
				  $cat_id = $_GET['cat'];
				  $category = get_category($cat_id);
				  echo '<span class="archiveHead__searchItem icon-folder">'.$category->cat_name.'</span>' ;
			  }
			  ?>

			  <?php
              if(!empty($_GET["tag"])){
				  $term_slag = $_GET['tag'];//GETで渡されたタグスラッグ名を格納
				  echo '<span class="archiveHead__searchItem icon-tag">';
				  foreach ($term_slag as $slag) {
					  $term = get_term_by('slug', $slag, 'post_tag');
					  echo $term->name;
					  if(next($term_slag)){
              if ( get_option('fit_bsSearch_tagMethod') == 'tag_slug__and'){
                $method = '&';
              }else{
                $method = 'or';
              }
						  echo '<span class="archiveHead__searchSeparator">'.$method.'</span>'; // 最後の要素ではない場合「or」を追加
					  }
				  }
				  echo '</span>';
			  }
			  ?>

            </div>

          </div>
        </div>
      </div>




      <div class="dividerBottom">
        <!--controller-->
        <?php fit_archive_controller() ?>
        <!--/controller-->

        <!--archive-->
        <?php if (have_posts()) : ?>
        <div class="archive">
	      <?php while (have_posts()) : the_post(); ?>
	        <?php get_template_part('loop');?>
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
