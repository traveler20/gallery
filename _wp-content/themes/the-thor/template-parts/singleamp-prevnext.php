<?php
/**
 * 投稿ページ(AMP)に埋め込むPrev Next記事
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
		<?php if ( $prevpost ) : // 前の記事がある時 ?>
			<li class="prevNext__item prevNext__item-prev">
				<div class="eyecatch">
					<div class="prevNext__pop"><?php echo $prevText; ?></div>
					<a class="eyecatch__link
					<?php
					if ( get_option( 'fit_bsEyecatch_hover' ) && get_option( 'fit_bsEyecatch_hover' ) != 'off' ) :
						?>
						 eyecatch__link-<?php echo get_option( 'fit_bsEyecatch_hover' ); ?><?php endif; ?>" href="<?php echo get_permalink( $prevpost->ID ); ?>">

						<?php
						if ( has_post_thumbnail( $prevpost->ID ) ) :
							$image_id = get_post_thumbnail_id( $prevpost->ID );
							$image    = wp_get_attachment_image_src( $image_id, 'icatch375' );
							$src      = $image[0]; // url
							$width    = $image[1]; // 横幅
							$height   = $image[2]; // 高さ
							?>
							<amp-img layout="responsive" src="<?php echo $src; ?>" alt="<?php echo get_the_title( $prevpost->ID ); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" ></amp-img>
							<?php
						elseif ( get_fit_noimg() ) :
							$image_date = get_fit_noimg();
							$image_id   = attachment_url_to_postid( $image_date );
							$image      = wp_get_attachment_image_src( $image_id, 'icatch375' );
							$src        = $image[0]; // url
							$width      = $image[1]; // 横幅
							$height     = $image[2]; // 高さ
							?>
							<amp-img layout="responsive" src="<?php echo $src; ?>" alt="<?php echo get_the_title( $prevpost->ID ); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" ></amp-img>
						<?php else : ?>
							<amp-img layout="responsive" src="<?php echo get_template_directory_uri(); ?>/img/img_no_375.gif" alt="<?php echo get_the_title( $prevpost->ID ); ?>" width="350" height="350" ></amp-img>
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
		<?php else : // 前の記事がない時 ?>
			<li class="prevNext__item prevNext__item-prev">
				<div class="eyecatch">
					<div class="prevNext__pop"><?php echo $prevText; ?></div>
					<p class="prevNext__text"><?php echo $noText; ?></p>
				</div>
			</li>
		<?php endif; ?>

		<?php if ( $nextpost ) : // 次の記事がある時 ?>
			<li class="prevNext__item prevNext__item-next">
				<div class="eyecatch">
					<div class="prevNext__pop"><?php echo $nextText; ?></div>
					<a class="eyecatch__link
					<?php
					if ( get_option( 'fit_bsEyecatch_hover' ) && get_option( 'fit_bsEyecatch_hover' ) != 'off' ) :
						?>
						 eyecatch__link-<?php echo get_option( 'fit_bsEyecatch_hover' ); ?><?php endif; ?>" href="<?php echo get_permalink( $nextpost->ID ); ?>">

						<?php
						if ( has_post_thumbnail( $nextpost->ID ) ) :
							$image_id = get_post_thumbnail_id( $nextpost->ID );
							$image    = wp_get_attachment_image_src( $image_id, 'icatch375' );
							$src      = $image[0]; // url
							$width    = $image[1]; // 横幅
							$height   = $image[2]; // 高さ
							?>
							<amp-img layout="responsive" src="<?php echo $src; ?>" alt="<?php echo get_the_title( $nextpost->ID ); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" ></amp-img>
							<?php
						elseif ( get_fit_noimg() ) :
							$image_date = get_fit_noimg();
							$image_id   = attachment_url_to_postid( $image_date );
							$image      = wp_get_attachment_image_src( $image_id, 'icatch375' );
							$src        = $image[0]; // url
							$width      = $image[1]; // 横幅
							$height     = $image[2]; // 高さ
							?>
							<amp-img layout="responsive" src="<?php echo $src; ?>" alt="<?php echo get_the_title( $nextpost->ID ); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" ></amp-img>
						<?php else : ?>
							<amp-img layout="responsive" src="<?php echo get_template_directory_uri(); ?>/img/img_no_375.gif" alt="<?php echo get_the_title( $nextpost->ID ); ?>" width="768" height="432" ></amp-img>
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
		<?php else : // 次の記事がない時 ?>
			<li class="prevNext__item prevNext__item-next">
				<div class="eyecatch">
					<div class="prevNext__pop"><?php echo $nextText; ?></div>
					<p class="prevNext__text"><?php echo $noText; ?></p>
				</div>
			</li>
		<?php endif; ?>
	</ul>
	<!-- /Prev Next記事 -->
<?php endif; ?>
