<?php
/**
 * 投稿ページに埋め込むPrev Next記事
 */

$noText   = '記事がありません';
$nextText = 'Next';
$prevText = 'Prev';
if ( get_option( 'fit_postPrevNext_text' ) ) {
	$noText = get_option( 'fit_postPrevNext_text' );
}
if ( get_option( 'fit_postPrevNext_next' ) ) {
	$nextText = get_option( 'fit_postPrevNext_next' );
}
if ( get_option( 'fit_postPrevNext_prev' ) ) {
	$prevText = get_option( 'fit_postPrevNext_prev' );
}

if ( get_option( 'fit_postPrevNext_category' ) ) {
	$prevpost = get_adjacent_post( true, '', true ); // 同一カテゴリの前の記事
	$nextpost = get_adjacent_post( true, '', false ); // 同一カテゴリの次の記事
} else {
	$prevpost = get_adjacent_post( false, '', true ); // 前の記事
	$nextpost = get_adjacent_post( false, '', false ); // 次の記事
}
if ( $prevpost || $nextpost ) :
	?>

	<!-- Prev Next記事 -->
	<ul class="prevNext">
		<?php
		if ( $prevpost ) {// 前の記事がある時
			// prev_thumbnailサイズの画像内容を取得
			$prev_thumbnail_id = get_post_thumbnail_id( $prevpost->ID );
			$prev_thumb_img    = wp_get_attachment_image_src( $prev_thumbnail_id, 'icatch375' );
			// サムネイル画像出力
			$prev_thumb_src    = $prev_thumb_img[0];
			$prev_thumb_width  = $prev_thumb_img[1];
			$prev_thumb_height = $prev_thumb_img[2];
			?>
			<li class="prevNext__item prevNext__item-prev">
				<div class="eyecatch">
					<div class="prevNext__pop"><?php echo $prevText; ?></div>
					<a class="eyecatch__link
					<?php
					if ( get_option( 'fit_bsEyecatch_hover' ) && get_option( 'fit_bsEyecatch_hover' ) != 'off' ) :
						?>
						 eyecatch__link-<?php echo get_option( 'fit_bsEyecatch_hover' ); ?><?php endif; ?>" href="<?php echo get_permalink( $prevpost->ID ); ?>">

						<?php if ( has_post_thumbnail( $prevpost->ID ) ) : ?>
							<img <?php echo fit_correct_src(); ?>="<?php echo $prev_thumb_src; ?>" alt="<?php echo get_the_title( $prevpost->ID ); ?>" width="<?php echo $prev_thumb_width; ?>" height="<?php echo $prev_thumb_height; ?>" <?php echo fit_dummy_src(); ?>>
						<?php elseif ( get_fit_noimg() ) : ?>
							<img <?php echo fit_correct_src(); ?>="<?php echo get_fit_noimg(); ?>" alt="NO IMAGE" width="600" height="600" <?php echo fit_dummy_src(); ?>>
						<?php else : ?>
							<img <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_375.gif" alt="NO IMAGE" width="600" height="600" <?php echo fit_dummy_src(); ?>>
						<?php endif; ?>

						<div class="prevNext__title">
							<?php if ( get_option( 'fit_postPrevNext_time' ) == 'on' ) : ?>
								<span class="icon-clock"><?php echo get_the_time( get_option( 'date_format' ), $prevpost->ID ); ?></span>
							<?php endif; ?>
							<h3 class="heading heading-secondary"><?php echo get_the_title( $prevpost->ID ); ?></h3>
						</div>

					</a>
				</div>
			</li>
		<?php } else { // 前の記事がない時 ?>
			<li class="prevNext__item prevNext__item-prev">
				<div class="eyecatch">
					<div class="prevNext__pop"><?php echo $prevText; ?></div>
					<p class="prevNext__text"><?php echo $noText; ?></p>
				</div>
			</li>
		<?php } ?>

		<?php
		if ( $nextpost ) {// 次の記事がある時
			// next_thumbnailサイズの画像内容を取得
			$next_thumbnail_id = get_post_thumbnail_id( $nextpost->ID );
			$next_thumb_img    = wp_get_attachment_image_src( $next_thumbnail_id, 'icatch375' );
			// サムネイル画像出力
			$next_thumb_src    = $next_thumb_img[0];
			$next_thumb_width  = $next_thumb_img[1];
			$next_thumb_height = $next_thumb_img[2];
			?>
			<li class="prevNext__item prevNext__item-next">
				<div class="eyecatch">
					<div class="prevNext__pop"><?php echo $nextText; ?></div>
					<a class="eyecatch__link
					<?php
					if ( get_option( 'fit_bsEyecatch_hover' ) && get_option( 'fit_bsEyecatch_hover' ) != 'off' ) :
						?>
						 eyecatch__link-<?php echo get_option( 'fit_bsEyecatch_hover' ); ?><?php endif; ?>" href="<?php echo get_permalink( $nextpost->ID ); ?>">

						<?php if ( has_post_thumbnail( $nextpost->ID ) ) : ?>
							<img <?php echo fit_correct_src(); ?>="<?php echo $next_thumb_src; ?>" alt="<?php echo get_the_title( $nextpost->ID ); ?>" width="<?php echo $next_thumb_width; ?>" height="<?php echo $next_thumb_height; ?>" <?php echo fit_dummy_src(); ?>>
						<?php elseif ( get_fit_noimg() ) : ?>
							<img <?php echo fit_correct_src(); ?>="<?php echo get_fit_noimg(); ?>" alt="NO IMAGE" width="600" height="600" <?php echo fit_dummy_src(); ?>>
						<?php else : ?>
							<img <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_375.gif" alt="NO IMAGE" width="600" height="600" <?php echo fit_dummy_src(); ?>>
						<?php endif; ?>
						<div class="prevNext__title">
							<?php if ( get_option( 'fit_postPrevNext_time' ) == 'on' ) : ?>
								<span class="icon-clock"><?php echo get_the_time( get_option( 'date_format' ), $nextpost->ID ); ?></span>
							<?php endif; ?>
							<h3 class="heading heading-secondary"><?php echo get_the_title( $nextpost->ID ); ?></h3>
						</div>

					</a>
				</div>
			</li>
		<?php } else { // 次の記事がない時 ?>
			<li class="prevNext__item prevNext__item-next">
				<div class="eyecatch">
					<div class="prevNext__pop"><?php echo $nextText; ?></div>
					<p class="prevNext__text"><?php echo $noText; ?></p>
				</div>
			</li>
		<?php } ?>
	</ul>
	<!-- /Prev Next記事 -->
<?php endif; ?>
