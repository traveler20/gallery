<form class="widgetSearch__flex" method="get" action="<?php echo esc_url(home_url()); ?>" target="_top">
  <input class="widgetSearch__input" type="text" maxlength="50" name="s" placeholder="キーワードを入力" value="<?php if( get_search_query() ){ echo get_search_query();} ?>">
  <button class="widgetSearch__submit icon-search" type="submit" value="search"></button>
</form>
<?php if(get_option('fit_bsSearch_pickup1') || get_option('fit_bsSearch_pickup2') || get_option('fit_bsSearch_pickup3') || get_option('fit_bsSearch_pickup4') || get_option('fit_bsSearch_pickup5')): ?>
<ol class="widgetSearch__word">
  <?php if(get_option('fit_bsSearch_pickup1')): ?>
  <li class="widgetSearch__wordItem"><a href="<?php echo esc_url(home_url()); ?>?s=<?php echo get_option('fit_bsSearch_pickup1'); ?>"><?php echo get_option('fit_bsSearch_pickup1'); ?></a></li>
  <?php endif; ?>
  <?php if(get_option('fit_bsSearch_pickup2')): ?>
  <li class="widgetSearch__wordItem"><a href="<?php echo esc_url(home_url()); ?>?s=<?php echo get_option('fit_bsSearch_pickup2'); ?>"><?php echo get_option('fit_bsSearch_pickup2'); ?></a></li>
  <?php endif; ?>
  <?php if(get_option('fit_bsSearch_pickup3')): ?>
  <li class="widgetSearch__wordItem"><a href="<?php echo esc_url(home_url()); ?>?s=<?php echo get_option('fit_bsSearch_pickup3'); ?>"><?php echo get_option('fit_bsSearch_pickup3'); ?></a></li>
  <?php endif; ?>
  <?php if(get_option('fit_bsSearch_pickup4')): ?>
  <li class="widgetSearch__wordItem"><a href="<?php echo esc_url(home_url()); ?>?s=<?php echo get_option('fit_bsSearch_pickup4'); ?>"><?php echo get_option('fit_bsSearch_pickup4'); ?></a></li>
  <?php endif; ?>
  <?php if(get_option('fit_bsSearch_pickup5')): ?>
  <li class="widgetSearch__wordItem"><a href="<?php echo esc_url(home_url()); ?>?s=<?php echo get_option('fit_bsSearch_pickup5'); ?>"><?php echo get_option('fit_bsSearch_pickup5'); ?></a></li>
  <?php endif; ?>
</ol>
<?php endif; ?>
