<?php
/**
 * 投稿ページに埋め込むフォローボタン
 */

$opt = get_option( 'fit_snsFollow' );
?>

<!-- フォローボタン -->
<div class="snsFollow">
	<div class="snsFollow__bg">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'icatch375' ); ?>
		<?php elseif ( get_fit_noimg() ) : ?>
			<img <?php echo fit_correct_src(); ?>="<?php echo get_fit_noimg(); ?>" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
		<?php else : ?>
			<img <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_375.gif" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
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
					<div class="fb-like" data-href="https://www.facebook.com/<?php echo $opt['FBPage']; ?>" data-layout="button" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div>
				</li>
			<?php endif; ?>
			<?php if ( $opt['twitterId'] ) : ?>
				<li class="snsFollow__item">
					<a href="https://twitter.com/<?php echo $opt['twitterId']; ?>" class="twitter-follow-button" data-size="large" data-show-screen-name="false" data-lang="ja" data-show-count="false">フォローする</a>
				</li>
			<?php endif; ?>
		</ul>
	</div>
</div>
<!-- /フォローボタン -->
