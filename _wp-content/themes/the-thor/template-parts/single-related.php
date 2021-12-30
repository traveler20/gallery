<?php
/**
 * 投稿ページに埋め込む関連記事
 */

// 総件数
$max_post_num = 3;
if ( get_option( 'fit_postRelated_number' ) ) {
	$max_post_num = get_option( 'fit_postRelated_number' );
}

// 現在の記事にタグが設定されている場合
if ( has_tag() ) {
	// 1.タグ関連の投稿を取得
	$tags    = wp_get_post_tags( $post->ID );
	$tag_ids = array();
	foreach ( $tags as $tag ) {
		array_push( $tag_ids, $tag->term_id );
	}
	$tag_args  = array(
		'post__not_in'   => array( $post->ID ),
		'tag__not_in'    => $tag_ids,
		'posts_per_page' => $max_post_num,
		'tag__in'        => $tag_ids,
		'orderby'        => 'rand',
	);
	$rel_posts = get_posts( $tag_args );
	// 総件数よりタグ関連の投稿が少ない場合は、カテゴリ関連の投稿からも取得する
	$rel_count = count( $rel_posts );
	if ( $max_post_num > $rel_count ) {
		$categories  = get_the_category( $post->ID );
		$category_ID = array();
		foreach ( $categories as $category ) {
			array_push( $category_ID, $category->cat_ID );
		}
		// 取得件数は必要な数のみリクエスト
		$cat_args  = array(
			'post__not_in'   => array( $post->ID ),
			'posts_per_page' => ( $max_post_num - $rel_count ),
			'category__in'   => $category_ID,
			'orderby'        => 'rand',
		);
		$cat_posts = get_posts( $cat_args );
		$rel_posts = array_merge( $rel_posts, $cat_posts );
	}
} else { // 現在の記事にタグが設定されていない場合
	$categories  = get_the_category( $post->ID );
	$category_ID = array();
	foreach ( $categories as $category ) {
		array_push( $category_ID, $category->cat_ID );
	}
	// 取得件数は必要な数のみリクエスト
	$cat_args  = array(
		'post__not_in'   => array( $post->ID ),
		'posts_per_page' => ( $max_post_num ),
		'category__in'   => $category_ID,
		'orderby'        => 'rand',
	);
	$cat_posts = get_posts( $cat_args );
	$rel_posts = $cat_posts;
}

$title = '関連する記事';
if ( get_option( 'fit_postRelated_title' ) ) {
	$title = get_option( 'fit_postRelated_title' );
}

echo '<aside class="related">';
echo '<h2 class="heading heading-sub">' . $title . '</h2>';

// 関連記事が1件以上あれば
if ( count( $rel_posts ) > 0 ) {
	echo '<ul class="related__list">';

	foreach ( $rel_posts as $post ) {
		setup_postdata( $post );

		// thumbnailサイズの画像内容を取得
		$thumbnail_id = get_post_thumbnail_id();
		$thumb_img    = wp_get_attachment_image_src( $thumbnail_id, 'icatch375' );
		// サムネイル画像出力
		$thumb_src    = $thumb_img[0];
		$thumb_width  = $thumb_img[1];
		$thumb_height = $thumb_img[2];
		?>

		<!-- 関連記事 -->
		<li class="related__item">
			<?php if ( get_option( 'fit_postRelated_aspect' ) != 'none' ) : ?>
				<div class="eyecatch
				<?php
				if ( get_option( 'fit_postRelated_aspect' ) && get_option( 'fit_postRelated_aspect' ) != 'off' ) :
					?>
					 <?php echo get_option( 'fit_postRelated_aspect' ); ?><?php endif; ?>">

					<?php
					$cat = get_the_category();
					if ( ! get_option( 'fit_postRelated_category' ) ) {
						if ( ! empty( $cat[0] ) ) {
							echo '<span class="eyecatch__cat cc-bg' . $cat[0]->term_id . '">';
							echo '<a href="' . get_category_link( $cat[0]->term_id ) . '">' . $cat[0]->cat_name . '</a>';
							echo '</span>';
						}
					}
					?>
					<a class="eyecatch__link
					<?php
					if ( get_option( 'fit_bsEyecatch_hover' ) && get_option( 'fit_bsEyecatch_hover' ) != 'off' ) :
						?>
						 eyecatch__link-<?php echo get_option( 'fit_bsEyecatch_hover' ); ?><?php endif; ?>" href="<?php the_permalink(); ?>">

						<?php if ( has_post_thumbnail() ) : ?>
							<img <?php echo fit_correct_src(); ?>="<?php echo $thumb_src; ?>" alt="<?php the_title(); ?>" width="<?php echo $thumb_width; ?>" height="<?php echo $thumb_height; ?>" <?php echo fit_dummy_src(); ?>>
						<?php elseif ( get_fit_noimg() ) : ?>
							<img <?php echo fit_correct_src(); ?>="<?php echo get_fit_noimg(); ?>" alt="NO IMAGE" width="375" height="375" <?php echo fit_dummy_src(); ?>>
						<?php else : ?>
							<img <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_375.gif" alt="NO IMAGE" width="375" height="375" <?php echo fit_dummy_src(); ?>>
						<?php endif; ?>
					</a>

				</div>
			<?php endif; ?>

			<div class="archive__contents
			<?php
			if ( get_option( 'fit_postRelated_aspect' ) == 'none' ) :
				?>
				 archive__contents-noImg<?php endif; ?>">

				<?php if ( get_option( 'fit_postRelated_aspect' ) == 'none' ) : ?>
					<?php
					$cat = get_the_category();
					if ( ! empty( $cat[0] ) ) {
						echo '<div class="the__category cc-bg' . $cat[0]->term_id . '">';
						echo '<a href="' . get_category_link( $cat[0]->term_id ) . '">' . $cat[0]->cat_name . '</a>';
						echo '</div>';
					}
					?>
				<?php endif; ?>
				<?php if ( ! empty( get_option( 'fit_postRelated_time' ) ) || ! empty( get_option( 'fit_postRelated_update' ) ) ) : ?>
					<ul class="dateList">
						<?php if ( ! empty( get_option( 'fit_postRelated_time' ) ) ) : ?>
							<li class="dateList__item icon-clock"><?php the_time( get_option( 'date_format' ) ); ?></li>
						<?php endif; ?>
						<?php
						if ( ! empty( get_option( 'fit_postRelated_update' ) )
							&& get_the_time( 'U' ) !== get_the_modified_time( 'U' )
							|| ! empty( get_option( 'fit_postRelated_update' ) )
							&& empty( get_option( 'fit_postRelated_time' ) ) ) :
							?>
							<li class="dateList__item icon-update"><?php the_modified_date( get_option( 'date_format' ) ); ?></li>
						<?php endif; ?>
					</ul>
				<?php endif; ?>
				<h3 class="heading heading-secondary">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h3>

			</div>
		</li>
		<!-- /関連記事 -->
		<?php
	}
	echo '</ul>';
}
// 関連記事がない場合
else {
	echo '<p class="related__contents related__contents-max">' . $title . 'はありませんでした。</p>';
}

echo '</aside>';
wp_reset_postdata();
