<?php
////////////////////////////////////////////////////////
//サーチパネルコンテンツ設定
////////////////////////////////////////////////////////
function fit_search_panel() {
	if ( get_option('fit_conHeader_searchPanel') == 'value2' ) {
?>
<aside class="widget">
  <div class="widgetSearch">
    <h3 class="heading heading-tertiary">キーワード</h3>
    <?php get_search_form(); ?>
  </div>
</aside>
<?php
	}else{
?>
<aside class="widget">
  <div class="widgetSearch">
    <?php get_template_part('searchform', 'refine'); ?>
  </div>
</aside>
<?php
	}
}
