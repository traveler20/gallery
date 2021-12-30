<?php
$keywordH  = 'キーワード';
$categoryH = 'カテゴリー';
$tagH      = 'タグ';

if(get_option('fit_bsSearch_keywordH')){ $keywordH  = get_option('fit_bsSearch_keywordH');}
if(get_option('fit_bsSearch_categoryH')){$categoryH = get_option('fit_bsSearch_categoryH');}
if(get_option('fit_bsSearch_tagH')){     $tagH      = get_option('fit_bsSearch_tagH');}
?>
<form method="get" action="<?php echo esc_url(home_url()); ?>" target="_top">
  <div class="widgetSearch__contents">
    <h3 class="heading heading-tertiary"><?php echo $keywordH ?></h3>
    <input class="widgetSearch__input widgetSearch__input-max" type="text" name="s" placeholder="キーワードを入力" value="<?php if( get_search_query() ){ echo get_search_query();} ?>">

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

  </div>

  <div class="widgetSearch__contents">
    <h3 class="heading heading-tertiary"><?php echo $categoryH ?></h3>
	<?php
    $args = array(
		'show_option_none' => $categoryH.'を選択',
		'option_none_value' => '',
		'show_count' => 0,
    'id' => uniqid("cat_"),

		'class' => 'widgetSearch__select',
	);
	wp_dropdown_categories($args);
	?>
  </div>

  <?php
  $tags = get_tags();
  if ( $tags ) :
  ?>
	<div class="widgetSearch__tag">
    <h3 class="heading heading-tertiary"><?php echo $tagH ?></h3>
    <?php
	$checkboxes = '';
	foreach($tags as $tag){
		if (isset($_GET["tag"])) {
			if (in_array($tag->slug, $_GET["tag"])) {
				$checkboxes .= '<label><input class="widgetSearch__check" type="checkbox" name="tag[]" value="'.$tag -> slug.'" checked/><span class="widgetSearch__checkLabel">'.$tag->name.'</span></label>';
			}else{
				$checkboxes .='<label><input class="widgetSearch__check" type="checkbox" name="tag[]" value="'.$tag -> slug.'" /><span class="widgetSearch__checkLabel">'.$tag->name.'</span></label>';
			}
		}else{
			$checkboxes .='<label><input class="widgetSearch__check" type="checkbox" name="tag[]" value="'.$tag -> slug.'" /><span class="widgetSearch__checkLabel">'.$tag->name.'</span></label>';
		}
	}
	echo $checkboxes;
	?>
  </div>
  <?php endif; ?>

  <div class="btn btn-search">
    <button class="btn__link btn__link-search" type="submit" value="search">検索</button>
  </div>
</form>
