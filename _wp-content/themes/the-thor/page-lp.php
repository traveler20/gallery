<?php /* Template Name: LP用TPL */?>
<!DOCTYPE html>

<html <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#" class="t-html
<?php if (get_option('fit_bsStyle_fontSize') && get_option('fit_bsStyle_fontSize') != 'off' ) : ?><?php echo get_option('fit_bsStyle_fontSize');?> <?php endif; ?>
<?php if (get_option('fit_bsStyle_fontSizePc') && get_option('fit_bsStyle_fontSizePc') != 'off' ) : ?><?php echo get_option('fit_bsStyle_fontSizePc');?><?php endif; ?>">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
<meta charset="<?php bloginfo('charset'); ?>">
<?php wp_head(); ?>
<?php fit_seo_meta();?>
<?php fit_ogp_date();?>
</head>
<body <?php body_class(); ?> id="top">
<?php ob_start();?>

  <!--l-wrapper-->
  <div class="l-wrapper l-wrapper-lp">

    <!--l-main-->
    <main class="l-main l-main-wide u-border">

      <div class="dividerBottom">

        <!--pageContents-->
        <div class="pageContents<?php if (get_option('fit_pageStyle_frame') && get_option('fit_pageStyle_frame') != 'off' ):?> <?php echo get_option('fit_pageStyle_frame')?><?php endif; ?>">

          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <section class="content<?php fit_content_class(); ?>">
              <?php the_content(); ?>
            </section>
          <?php endwhile; endif; ?>
        </div>
        <!--/pageContents-->

      </div>

    </main>
    <!--/l-main-->

  </div>
  <!--/l-wrapper-->


<?php
  $compress = ob_get_clean();
  $compress = str_replace("\t", '', $compress);
  $compress = str_replace("\r", '', $compress);
  $compress = str_replace("\n", '', $compress);
  $compress = str_replace(array('   ', '    '), '', $compress);
  $compress = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $compress );
  $compress = preg_replace('/<!--[\s\S]*?-->/', '', $compress);
  echo $compress;
?>

<?php wp_footer(); ?>

<?php //img非同期読み込み
if(get_option('fit_seoImg_lazy') ){
  global $is_IE;
  if( is_feed() || is_preview() || is_mobile() || is_admin() || $is_IE ) {

  }else{
    echo '<script>var layzr = new Layzr();</script>';
  }
}
?>

</body>
</html>
