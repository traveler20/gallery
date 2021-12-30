<?php
/**
 * 投稿ページ(AMP)に埋め込むフォローボタン
 */

$opt = get_option( 'fit_snsFollow' );
?>

<!-- フォローボタン -->
<div class="snsFollow">
	<div class="snsFollow__bg">
		<?php
		if ( has_post_thumbnail() ) :
			$image_id = get_post_thumbnail_id();
			$image    = wp_get_attachment_image_src( $image_id, 'icatch768' );
			$src      = $image[0]; // url
			$width    = $image[1]; // 横幅
			$height   = $image[2]; // 高さ
			?>
			<amp-img layout="responsive" src="<?php echo $src; ?>" alt="<?php echo get_the_title(); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>"></amp-img>
			<?php
		elseif ( get_fit_noimg() ) :
			$image_date = get_fit_noimg();
			$image_id   = attachment_url_to_postid( $image_date );
			$image      = wp_get_attachment_image_src( $image_id, 'icatch768' );
			$src        = $image[0]; // url
			$width      = $image[1]; // 横幅
			$height     = $image[2]; // 高さ
			?>
			<amp-img layout="responsive" src="<?php echo $src; ?>" alt="<?php echo get_the_title(); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>"></amp-img>
		<?php else : ?>
			<amp-img layout="responsive" src="<?php echo get_template_directory_uri(); ?>/img/img_no_768.gif" alt="<?php echo get_the_title(); ?>" width="768" height="432"></amp-img>
		<?php endif; ?>
	</div>

	<div class="snsFollow__contents">
		<div class="snsFollow__text">
			<?php if ( get_option( 'fit_postSns_title' ) ) : ?>
				<?php echo get_option( 'fit_postSns_title' ); ?>
			<?php else : ?>
				最新情報をチェックしよう！
			<?php endif; ?>
		</div>

		<ul class="snsFollow__list">
			<?php if ( get_option( 'fit_snsOgp_FBAppId' ) && $opt['FBPage'] ) : ?>
				<li class="snsFollow__item">
					<amp-facebook-like width=92 height=28 layout="fixed" data-layout="button" data-size="large" data-href="https://www.facebook.com/<?php echo $opt['FBPage']; ?>"></amp-facebook-like>
				</li>
			<?php endif; ?>
			<?php if ( $opt['twitterId'] ) : ?>
				<li class="snsFollow__item">
					<a class="twitter-follow-button" href="https://twitter.com/intent/follow?screen_name=<?php echo $opt['twitterId']; ?>" target="_blank"><i class="icon-twitter"></i><span class="label">フォローする</span></a>
				</li>
			<?php endif; ?>
		</ul>
	</div>
</div>
<!-- /フォローボタン -->
