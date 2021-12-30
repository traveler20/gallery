<?php
/**
 * 投稿ページ(AMP)に埋め込むプロフィール
 */
?>

<!-- プロフィール -->
<aside class="profile">
	<div class="profile__author">
		<?php
		$pText    = 'この記事を書いた人';
		$pBtnText = '投稿一覧へ';
		if ( get_option( 'fit_postProfile_text' ) ) {
			$pText = get_option( 'fit_postProfile_text' );
		}
		if ( get_option( 'fit_postProfile_btnText' ) ) {
			$pBtnText = get_option( 'fit_postProfile_btnText' );
		}
		?>
		<div class="profile__text"><?php echo $pText; ?></div>
		<?php
		$author = get_the_author_meta( 'ID' );
		$avatar = get_avatar( $author );
		$imgtag = '/<img.*?src=(["\'])(.+?)\1.*?>/i';
		if ( preg_match( $imgtag, $avatar, $imgurl ) ) {
			$avatar = $imgurl[2];
		}
		?>
		<amp-img src="<?php echo $avatar; ?>" alt="<?php echo the_author_meta( 'display_name' ); ?>" width="80" height="80" ></amp-img>
		<h2 class="profile__name"><?php the_author_meta( 'display_name' ); ?></h2>
		<?php if ( get_the_author_meta( 'user_group', $author ) ) : ?>
			<h3 class="profile__group"><?php the_author_meta( 'user_group', $author ); ?></h3>
		<?php endif; ?>
	</div>

	<div class="profile__contents">
		<div class="profile__description">
		<?php
		if ( get_the_author_meta( 'description' ) ) :
			the_author_meta( 'description' );
		endif;
		?>
		</div>
		<ul class="profile__list">
			<?php if ( get_the_author_meta( 'facebook', $author ) ) : ?>
				<li class="profile__item">
					<a class="profile__link icon-facebook" href="<?php the_author_meta( 'facebook', $author ); ?>"></a>
				</li>
			<?php endif; ?>
			<?php if ( get_the_author_meta( 'twitter', $author ) ) : ?>
				<li class="profile__item">
					<a class="profile__link icon-twitter" href="<?php the_author_meta( 'twitter', $author ); ?>"></a>
				</li>
			<?php endif; ?>
			<?php if ( get_the_author_meta( 'instagram', $author ) ) : ?>
				<li class="profile__item">
					<a class="profile__link icon-instagram" href="<?php the_author_meta( 'instagram', $author ); ?>"></a>
				</li>
			<?php endif; ?>
			<?php if ( get_the_author_meta( 'gplus', $author ) ) : ?>
				<li class="profile__item">
					<a class="profile__link icon-google-plus" href="<?php the_author_meta( 'gplus', $author ); ?>"></a>
				</li>
			<?php endif; ?>
			<?php if ( get_the_author_meta( 'youtube', $author ) ) : ?>
				<li class="profile__item">
					<a class="profile__link icon-youtube" href="<?php the_author_meta( 'youtube', $author ); ?>"></a>
				</li>
			<?php endif; ?>
			<?php if ( get_the_author_meta( 'linkedin', $author ) ) : ?>
				<li class="profile__item">
					<a class="profile__link icon-linkedin" href="<?php the_author_meta( 'linkedin', $author ); ?>"></a>
				</li>
			<?php endif; ?>
			<?php if ( get_the_author_meta( 'pinterest', $author ) ) : ?>
				<li class="profile__item">
					<a class="profile__link icon-pinterest" href="<?php the_author_meta( 'pinterest', $author ); ?>"></a>
				</li>
			<?php endif; ?>
		</ul>

		<?php if ( get_option( 'fit_postProfile_btn' ) == 'on' ) : ?>
			<div class="btn btn-center">
				<a class="btn__link btn__link-secondary" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo $pBtnText; ?></a>
			</div>
		<?php endif; ?>
	</div>
</aside>
<!-- /プロフィール -->
