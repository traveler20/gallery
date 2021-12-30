<?php
/**
 * ランキング機能のAjax用ファイル
 */

if ( ! function_exists( 'fit_ajax_update_post_view_data' ) ) {
	/**
	 * 投稿とタグのアクセス情報を登録する
	 */
	function fit_ajax_update_post_view_data() {
		$postID = filter_input( INPUT_POST, 'post_id', FILTER_VALIDATE_INT );
		// アクセス日時をDBに登録
		if ( is_numeric( $postID ) ) {
			$post_accesslog = new Fit_Post_Accesslog();
			// $post_accesslog->insert( $postID );
			$post_accesslog->insert( $postID, date_i18n( 'Y-m-d H:i:s' ) );
		}
		die();
	}
	add_action( 'wp_ajax_nopriv_fit_update_post_view_data', 'fit_ajax_update_post_view_data' );
}

if ( ! function_exists( 'fit_ajax_update_meta_post_views_by_period' ) ) {
	/**
	 * 日週月ランキング用のアクセス数をセットする
	 */
	function fit_ajax_update_meta_post_views_by_period() {
		$rank = new Fit_Rank();

		if ( $rank->is_realtime()
			|| date_i18n( 'Y/m/d' ) === $rank->update_date
		) {
			// リアルタイム集計の場合もしくは本日すでに更新済みの場合は処理終了
			die();
		}

		// 日ランキング
		$rank->update_post_meta_by_period( Fit_Rank::PERIOD_DAY );
		// 週ランキング
		$rank->update_post_meta_by_period( Fit_Rank::PERIOD_WEEK );
		// 月ランキング
		$rank->update_post_meta_by_period( Fit_Rank::PERIOD_MONTH );

		$rank->update_update_date( date_i18n( 'Y-m-d' ) );
		die();
	}
	add_action( 'wp_ajax_fit_update_post_views_by_period', 'fit_ajax_update_meta_post_views_by_period' );
	add_action( 'wp_ajax_nopriv_fit_update_post_views_by_period', 'fit_ajax_update_meta_post_views_by_period' );
}

if ( ! function_exists( 'fit_ajax_clear_post_views' ) ) {
	/**
	 * アクセス数をリセットする
	 */
	function fit_ajax_clear_post_views() {
		$rank = new Fit_Rank();
		$rank->clear_post_views();
		die();
	}
	add_action( 'wp_ajax_fit_clear_post_views', 'fit_ajax_clear_post_views' );
}

if ( ! function_exists( 'fit_ajax_add_ranking_box' ) ) {
	/**
	 * TOPページのアクセスランキングを出力する
	 */
	function fit_ajax_add_ranking_box() {
		$conditions = '';
		$id_list    = '';
		$number     = '5';
		if ( get_option( 'fit_homeRank_conditions' ) ) {
			$conditions = get_option( 'fit_homeRank_conditions' );
		}
		if ( get_option( 'fit_homeRank_id' ) ) {
			$id_list = explode( ',', get_option( 'fit_homeRank_id' ) );
		}
		if ( get_option( 'fit_homeRank_number' ) ) {
			$number = get_option( 'fit_homeRank_number' );
		}
		$rank_meta_key = Fit_Rank::get_meta_key_id_by_period(
			get_option( 'fit_homeRank_period', Fit_Rank::PERIOD_ALL )
		);

		$args     = array(
			'meta_key'            => $rank_meta_key,
			'orderby'             => 'meta_value_num',
			'order'               => 'DESC',
			'ignore_sticky_posts' => '1',
			'posts_per_page'      => $number,
			$conditions           => $id_list,
		);
		$my_query = new WP_Query( $args );

		if ( $my_query->have_posts() ) {
			?>

				<!-- 記事ランキング -->
				<ol class="rankingBox__list">

				<?php
				while ( $my_query->have_posts() ) {
					$my_query->the_post();
					?>
					<li class="rankingBox__item">
						<?php if ( get_option( 'fit_homeRank_aspect' ) != 'none' ) : ?>
							<div class="eyecatch <?php echo ( get_option( 'fit_homeRank_aspect', 'off' ) != 'off' ) ? get_option( 'fit_homeRank_aspect' ) : ''; ?>">
								<?php
								if ( ! get_option( 'fit_homeRank_category' ) ) {
									$cats = get_the_category();
									if ( ! empty( $cats[0] ) ) {
										require_once locate_template('inc/parts/display_category.php');
										$display_category = null;
										$display_category = new FitDisplayTheCategory( $cats, 'category' );

										// 最下層レベルのカテゴリー名リストを取得
										$most_btm_names = array();
										$most_btm_names = $display_category->get_deisplay_the_category();

										// リストの一番最初のカテゴリーを表示
										$term_id = get_cat_ID( $most_btm_names[0] );
										$cat_link = get_category_link( $term_id );
										$cat_name = $most_btm_names[0];

										?>
										<span class="eyecatch__cat cc-bg<?php echo $term_id; ?>"><a
											href="<?php echo $cat_link; ?>"><?php echo $cat_name; ?></a></span>
										<?php
									}
								}
								?>
								<a
									class="eyecatch__link <?php echo ( get_option( 'fit_bsEyecatch_hover', 'off' ) != 'off' ) ? 'eyecatch__link-' . get_option( 'fit_bsEyecatch_hover' ) : ''; ?>"
									href="<?php the_permalink(); ?>">
									<?php
									if ( has_post_thumbnail() ) {
										the_post_thumbnail( 'icatch375' );
									} elseif ( get_fit_noimg() ) {
										echo '<img ' . fit_correct_src() . '="' . get_fit_noimg() . '" alt="NO IMAGE" ' . fit_dummy_src() . '>';
									} else {
										echo '<img ' . fit_correct_src() . '="' . get_template_directory_uri() . '/img/img_no_375.gif" alt="NO IMAGE" ' . fit_dummy_src() . '>';
									}
									?>
								</a>
							</div>
						<?php endif; ?>

						<div class="rankingBox__contents">
							<?php
							if ( get_option( 'fit_homeRank_aspect' ) == 'none' ) {
								$cats = get_the_category();
								if ( ! empty( $cats[0] ) ) {
									require_once locate_template('inc/parts/display_category.php');
									$display_category = null;
									$display_category = new FitDisplayTheCategory( $cats, 'category' );

									// 最下層レベルのカテゴリー名リストを取得
									$most_btm_names = array();
									$most_btm_names = $display_category->get_deisplay_the_category();

									// リストの一番最初のカテゴリーを表示
									$term_id = get_cat_ID( $most_btm_names[0] );
									$cat_link = get_category_link( $term_id );
									$cat_name = $most_btm_names[0];
									?>

									<div class="the__category the__category-rank cc-bg<?php echo $term_id; ?>">
										<a href="<?php echo $cat_link; ?>"><?php echo $cat_name; ?></a>
									</div>
									<?php
								}
							}
							?>

							<?php
							if (
								! empty( get_option( 'fit_homeRank_time' ) )
								|| ! empty( get_option( 'fit_homeRank_update' ) )
								|| ! empty( get_option( 'fit_homeRank_view' ) )
							) :
								?>
								<ul class="dateList <?php echo ( get_option( 'fit_homeRank_aspect' ) == 'none' ) ? 'u-mt-sub' : ''; ?>">
									<?php if ( ! empty( get_option( 'fit_homeRank_time' ) ) ) : ?>
										<li class="dateList__item icon-clock"><?php the_time( get_option( 'date_format' ) ); ?></li>
									<?php endif; ?>
									<?php
									if (
										! empty( get_option( 'fit_homeRank_update' ) )
										&& (
											get_the_time( 'U' ) !== get_the_modified_time( 'U' )
											|| empty( get_option( 'fit_homeRank_time' ) )
										)
									) :
										?>
										<li class="dateList__item icon-update"><?php the_modified_date( get_option( 'date_format' ) ); ?></li>
									<?php endif; ?>

									<?php
									$views = get_post_meta( get_the_ID(), $rank_meta_key, true );
									if ( ! empty( get_option( 'fit_homeRank_view' ) ) ) :
										?>
										<li class="dateList__item icon-eye"><?php echo $views . get_option( 'fit_bsRank_unit', 'view' ); ?></li>
									<?php endif; ?>
								</ul>
							<?php endif; ?>

							<h2 class="heading heading-tertiary">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
						</div>
					</li>
					<?php
				}
				wp_reset_postdata();
				?>
			</ol>
			<?php
		} else {
			?>
			<ul class="rankingBox__list">
				<li class="rankingBox__item rankingBox__item-no">
					<div class="eyecatch">
						<span class="eyecatch__link eyecatch__link-none">
							<?php if ( get_fit_noimg()): ?>
								<img <?php echo fit_correct_src(); ?>="<?php echo get_fit_noimg(); ?>" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
							<?php else: ?>
								<img <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_768.gif" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
							<?php endif; ?>
						</span>
					</div>
					<div class="rankingBox__contents">
						<ul class="dateList">
							<li class="dateList__item">No Data</li>
						</ul>
						<h2 class="heading heading-tertiary">対象期間のランキングデータが1件も見つかりませんでした。</h2>
					</div>
				</li>
			</ul>
			<?php
		}

		die();
	}
	add_action( 'wp_ajax_fit_add_ranking_box', 'fit_ajax_add_ranking_box' );
	add_action( 'wp_ajax_nopriv_fit_add_ranking_box', 'fit_ajax_add_ranking_box' );
}

if ( ! function_exists( 'fit_ajax_add_ranklist_scode' ) ) {
	/**
	 * ショートコードのアクセスランキングを出力する
	 */
	function fit_ajax_add_ranklist_scode() {
		$num    = filter_input( INPUT_POST, 'num', FILTER_VALIDATE_INT );
		$cat    = filter_input( INPUT_POST, 'cat' );
		$tag    = filter_input( INPUT_POST, 'tag' );
		$writer = filter_input( INPUT_POST, 'writer' );
		$period = filter_input( INPUT_POST, 'period' );
		$args   = array();

		if ( ! is_numeric( $num ) || $num <= 0 ) {
			$num = 5;
		}
		$args['numberposts'] = $num;

		if ( $cat ) {
			$cat_in     = array();
			$cat_not_in = array();
			$categories = explode( ',', strval( $cat ) );
			foreach ( $categories as $category ) {
				if ( is_numeric( $category ) ) {
					if ( $category > 0 ) {
						$cat_in[] = $category;
					} elseif ( $category < 0 ) {
						$cat_not_in[] = abs( $category );
					}
				}
			}
			if ( count( $cat_in ) > 0 ) {
				$args['category__in'] = $cat_in;
			}
			if ( count( $cat_not_in ) > 0 ) {
				$args['category__not_in'] = $cat_not_in;
			}
		}

		if ( $tag ) {
			$tag_in     = array();
			$tag_not_in = array();
			$tags       = explode( ',', strval( $tag ) );
			foreach ( $tags as $tag ) {
				if ( is_numeric( $tag ) ) {
					if ( $tag > 0 ) {
						$tag_in[] = $tag;
					} elseif ( $tag < 0 ) {
						$tag_not_in[] = abs( $tag );
					}
				}
			}
			if ( count( $tag_in ) > 0 ) {
				$args['tag__in'] = $tag_in;
			}
			if ( count( $tag_not_in ) > 0 ) {
				$args['tag__not_in'] = $tag_not_in;
			}
		}

		if ( $writer ) {
			$writer_in     = array();
			$writer_not_in = array();
			$writers       = explode( ',', strval( $writer ) );
			foreach ( $writers as $writer ) {
				if ( is_numeric( $writer ) ) {
					if ( $writer > 0 ) {
						$writer_in[] = $writer;
					} elseif ( $writer < 0 ) {
						$writer_not_in[] = abs( $writer );
					}
				}
			}
			if ( count( $writer_in ) > 0 ) {
				$args['author__in'] = $writer_in;
			}
			if ( count( $writer_not_in ) > 0 ) {
				$args['author__not_in'] = $writer_not_in;
			}
		}

		$meta_key = 'post_views';
		switch ( $period ) {
			case 'm':
				$meta_key = Fit_Rank::get_meta_key_id_by_period( Fit_Rank::PERIOD_MONTH );
				break;
			case 'w':
				$meta_key = Fit_Rank::get_meta_key_id_by_period( Fit_Rank::PERIOD_WEEK );
				break;
			case 'd':
				$meta_key = Fit_Rank::get_meta_key_id_by_period( Fit_Rank::PERIOD_DAY );
				break;
		}
		$args['meta_key'] = $meta_key;

		$args['orderby'] = 'meta_value_num';

		$myposts = get_posts( $args );
		if ( $myposts ) {
			global $post;
			foreach ( $myposts as $post ) :
				setup_postdata( $post );
				?>

				<div class="archiveScode__item">
					<div class="eyecatch eyecatch-11">
						<a class="eyecatch__link <?php echo ( get_option( 'fit_bsEyecatch_hover' ) && get_option( 'fit_bsEyecatch_hover' ) != 'off' ) ? 'eyecatch__link-' . get_option( 'fit_bsEyecatch_hover' ) : ''; ?>"
							href="<?php the_permalink(); ?>">
							<?php
							if ( has_post_thumbnail() ) {
								$size = array( 100, 100 );
								the_post_thumbnail( array( 100, 100 ) );
							} elseif ( get_fit_noimg() ) {
								echo '<img ' . fit_correct_src() . '="' . get_fit_noimg() . '" width="150" height="150" alt="NO IMAGE" ' . fit_dummy_src() . '>';
							} else {
								echo '<img ' . fit_correct_src() . '="' . get_template_directory_uri() . '/img/img_no_thumbnail.gif" width="150" height="150" alt="NO IMAGE" ' . fit_dummy_src() . '>';
							}
							?>
						</a>
					</div>
					<div class="archiveScode__contents">
						<?php
						$cats = get_the_category();
						if ( ! is_category() && ! empty( $cats[0] ) ) {
							require_once locate_template('inc/parts/display_category.php');
							$display_category = null;
							$display_category = new FitDisplayTheCategory( $cats,'category' );

							$most_btm_names = array();
							$most_btm_names = $display_category->get_deisplay_the_category();

							$term_id = get_cat_ID( $most_btm_names[0] );
							$cat_link = get_category_link( $term_id );
							$cat_name = $most_btm_names[0];
							?>
							<div class="the__category cc-bg<?php echo $term_id; ?>">
								<a href="<?php echo $cat_link; ?>"><?php echo $cat_name; ?></a>
							</div>
							<?php
						}
						?>
						<div class="heading heading-secondary"><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></div>
						<p class="phrase phrase-tertiary"><?php echo get_the_excerpt(); ?></p>
					</div>
				</div>

				<?php
			endforeach;
			wp_reset_postdata();
		} else {
			?>

			<div class="archiveScode__item archiveScode__item-no">
				<p class="phrase phrase-primary">対象期間のランキングデータが1件も見つかりませんでした。</p>
			</div>

			<?php
		}

		die();
	}
	add_action( 'wp_ajax_fit_add_ranklist_scode', 'fit_ajax_add_ranklist_scode' );
	add_action( 'wp_ajax_nopriv_fit_add_ranklist_scode', 'fit_ajax_add_ranklist_scode' );
}

if ( ! function_exists( 'fit_ajax_add_rank_widget' ) ) {
	/**
	 * 人気記事ウィジェットを出力する
	 */
	function fit_ajax_add_rank_widget() {
		/*
		fit_ranking_archive_class::widgetに渡される引数の$instance
		ダブルクォーテーションをエスケープしてからJSONデコードする
		*/
		$instance = json_decode( preg_replace( '/([^{:,])"([^:,}])/', '$1\\"$2', filter_input( INPUT_POST, 'instance' ) ) );

		$number = ( property_exists( $instance, 'number' ) && $instance->number ) ? $instance->number : 5;
		$index  = ( property_exists( $instance, 'period' ) && $instance->period ) ? Fit_Rank::get_meta_key_id_by_period( $instance->period ) : 'post_views';

		$args = array(
			'meta_key'            => $index,
			'orderby'             => 'meta_value_num',
			'order'               => 'DESC',
			'ignore_sticky_posts' => '1',
			'posts_per_page'      => $number,
		);

		$my_query = new WP_Query( $args );
		if ( $my_query->have_posts() ) {
			?>
			<ol class="widgetArchive widgetArchive-rank">
				<?php
				while ( $my_query->have_posts() ) {
					$my_query->the_post();
					?>
					<li class="widgetArchive__item widgetArchive__item-rank <?php echo ( property_exists( $instance, 'layout' ) && $instance->layout ) ? 'widgetArchive__item-normal' : ''; ?>">

						<?php if ( ! property_exists( $instance, 'aspect' ) || $instance->aspect != 'none' ) : ?>
							<div class="eyecatch <?php echo ( property_exists( $instance, 'aspect' ) ) ? esc_attr( $instance->aspect ) : ''; ?>">
								<?php
								if ( ! property_exists( $instance, 'category' ) || ! $instance->category ) {
									$cats = get_the_category();
									if ( ! empty( $cats[0] ) ) {
										require_once locate_template('inc/parts/display_category.php');
										$display_category = null;
										$display_category = new FitDisplayTheCategory( $cats,'category' );

										$most_btm_names = array();
										$most_btm_names = $display_category->get_deisplay_the_category();

										$term_id = get_cat_ID( $most_btm_names[0] );
										$cat_link = get_category_link( $term_id );
										$cat_name = $most_btm_names[0];
										?>
										<span class="eyecatch__cat cc-bg<?php echo $term_id; ?>"><a
											href="<? echo $cat_link; ?>"><?php echo $cat_name; ?></a></span>
										<?php
									}
								}
								?>
								<a class="eyecatch__link <?php echo ( get_option( 'fit_bsEyecatch_hover', 'off' ) != 'off' ) ? 'eyecatch__link-' . get_option( 'fit_bsEyecatch_hover' ) : ''; ?>"
									href="<?php the_permalink(); ?>">
									<?php
									if ( has_post_thumbnail() ) {
										$size = get_option( 'fit_bsEyecatch_widgetSize', 'icatch768' );
										the_post_thumbnail( $size );
									} elseif ( get_fit_noimg() ) {
										echo '<img ' . fit_correct_src() . '="' . get_fit_noimg() . '" alt="NO IMAGE" ' . fit_dummy_src() . '>';
									} else {
										echo '<img ' . fit_correct_src() . '="' . get_template_directory_uri() . '/img/img_no_768.gif" alt="NO IMAGE" ' . fit_dummy_src() . '>';
									}
									?>
								</a>
							</div>
						<?php endif; ?>

						<div class="widgetArchive__contents <?php echo ( property_exists( $instance, 'aspect' ) && $instance->aspect == 'none' ) ? 'widgetArchive__contents-none' : ''; ?>">

							<?php
							if ( property_exists( $instance, 'aspect' ) && $instance->aspect == 'none' ) {
								$cat = get_the_category();
								if ( ! empty( $cat[0] ) ) {
									?>
									<div class="the__category cc-bg<?php echo $cat[0]->term_id; ?>">
										<a href="<?php echo get_category_link( $cat[0]->term_id ); ?>"><?php echo $cat[0]->cat_name; ?></a>
									</div>
									<?php
								}
							}
							?>

							<?php
							if (
								( property_exists( $instance, 'time' ) && $instance->time )
								|| ( property_exists( $instance, 'update' ) && $instance->update )
								|| ( property_exists( $instance, 'view' ) && $instance->view )
							) :
								?>
								<ul class="dateList">

									<?php if ( property_exists( $instance, 'time' ) && $instance->time ) : ?>
										<li class="dateList__item icon-clock"><?php the_time( get_option( 'date_format' ) ); ?></li>
									<?php endif; ?>

									<?php
									if (
										( property_exists( $instance, 'update' ) && $instance->update ) // 更新日を表示する
										&&
										(
											( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) // 投稿日と更新日が違う
											||
											( ! property_exists( $instance, 'time' ) || ! $instance->time ) // 投稿日を表示しない
										)
									) :
										?>
										<li class="dateList__item icon-update"><?php the_modified_date( get_option( 'date_format' ) ); ?></li>
									<?php endif; ?>

									<?php if ( property_exists( $instance, 'view' ) && $instance->view ) : ?>
										<li class="dateList__item icon-eye"><?php echo get_post_meta( get_the_ID(), $index, true ) . get_option( 'fit_bsRank_unit', 'view' ); ?></li>
									<?php endif; ?>
								</ul>
							<?php endif; ?>

							<h3 class="heading heading-tertiary">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>

							<?php if ( property_exists( $instance, 'word' ) && $instance->word ) : ?>
								<p class="phrase phrase-tertiary"><?php echo mb_substr( get_the_excerpt(), 0, $instance->word ) . '[…]'; ?></p>
							<?php endif; ?>

						</div>

					</li>
					<?php
				}
				wp_reset_postdata();
				?>
			</ol>
			<?php
		} else {
			?>

			<p>対象期間のランキングデータが1件も見つかりませんでした。</p>

			<?php
		}

		die();
	}
	add_action( 'wp_ajax_fit_add_rank_widget', 'fit_ajax_add_rank_widget' );
	add_action( 'wp_ajax_nopriv_fit_add_rank_widget', 'fit_ajax_add_rank_widget' );
}

if ( ! function_exists( 'fit_ajax_add_category_rank_widget' ) ) {
	/**
	 * カテゴリ人気記事ウィジェットを出力する
	 */
	function fit_ajax_add_category_rank_widget() {
		/*
		fit_ranking_categorie_class::widgetに渡される引数の$instance
		ダブルクォーテーションをエスケープしてからJSONデコードする
		*/
		$instance = json_decode( preg_replace( '/([^{:,])"([^:,}])/', '$1\\"$2', filter_input( INPUT_POST, 'instance' ) ) );

		$number    = ( property_exists( $instance, 'number' ) && $instance->number ) ? $instance->number : 5;
		$categorie = ( property_exists( $instance, 'categorie' ) && $instance->categorie ) ? $instance->categorie : 1;
		$index     = ( property_exists( $instance, 'period' ) && $instance->period ) ? Fit_Rank::get_meta_key_id_by_period( $instance->period ) : 'post_views';

		$args = array(
			'meta_key'            => $index,
			'orderby'             => 'meta_value_num',
			'order'               => 'DESC',
			'ignore_sticky_posts' => '1',
			'cat'                 => $categorie,
			'posts_per_page'      => $number,
		);

		$my_query = new WP_Query( $args );
		if ( $my_query->have_posts() ) {
			?>
			<ol class="widgetArchive widgetArchive-rank test">
				<?php
				while ( $my_query->have_posts() ) {
					$my_query->the_post();
					?>
					<li class="widgetArchive__item widgetArchive__item-rank <?php echo ( property_exists( $instance, 'layout' ) && $instance->layout ) ? 'widgetArchive__item-normal' : ''; ?>">

						<?php if ( ! property_exists( $instance, 'aspect' ) || $instance->aspect != 'none' ) : ?>
							<div class="eyecatch <?php echo ( property_exists( $instance, 'aspect' ) ) ? esc_attr( $instance->aspect ) : ''; ?>">
								<a class="eyecatch__link <?php echo ( get_option( 'fit_bsEyecatch_hover', 'off' ) != 'off' ) ? 'eyecatch__link-' . get_option( 'fit_bsEyecatch_hover' ) : ''; ?>"
									href="<?php the_permalink(); ?>">
									<?php
									if ( has_post_thumbnail() ) {
										$size = get_option( 'fit_bsEyecatch_widgetSize', 'icatch768' );
										the_post_thumbnail( $size );
									} elseif ( get_fit_noimg() ) {
										echo '<img ' . fit_correct_src() . '="' . get_fit_noimg() . '" alt="NO IMAGE" ' . fit_dummy_src() . '>';
									} else {
										echo '<img ' . fit_correct_src() . '="' . get_template_directory_uri() . '/img/img_no_768.gif" alt="NO IMAGE" ' . fit_dummy_src() . '>';
									}
									?>
								</a>
							</div>
						<?php endif; ?>

						<div class="widgetArchive__contents <?php echo ( property_exists( $instance, 'aspect' ) && $instance->aspect == 'none' ) ? 'widgetArchive__contents-none' : ''; ?>">

							<?php
							if (
								( property_exists( $instance, 'time' ) && $instance->time )
								|| ( property_exists( $instance, 'update' ) && $instance->update )
								|| ( property_exists( $instance, 'view' ) && $instance->view )
							) :
								?>
								<ul class="dateList">

									<?php if ( property_exists( $instance, 'time' ) && $instance->time ) : ?>
										<li class="dateList__item icon-clock"><?php the_time( get_option( 'date_format' ) ); ?></li>
									<?php endif; ?>

									<?php
									if (
										( property_exists( $instance, 'update' ) && $instance->update ) // 更新日を表示する
										&&
										(
											( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) // 投稿日と更新日が違う
											||
											( ! property_exists( $instance, 'time' ) || ! $instance->time ) // 投稿日を表示しない
										)
									) :
										?>
										<li class="dateList__item icon-update"><?php the_modified_date( get_option( 'date_format' ) ); ?></li>
									<?php endif; ?>

									<?php if ( property_exists( $instance, 'view' ) && $instance->view ) : ?>
										<li class="dateList__item icon-eye"><?php echo get_post_meta( get_the_ID(), $index, true ) . get_option( 'fit_bsRank_unit', 'view' ); ?></li>
									<?php endif; ?>
								</ul>
							<?php endif; ?>

							<h3 class="heading heading-tertiary">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>

							<?php if ( property_exists( $instance, 'word' ) && $instance->word ) : ?>
								<p class="phrase phrase-tertiary"><?php echo mb_substr( get_the_excerpt(), 0, $instance->word ) . '[…]'; ?></p>
							<?php endif; ?>

						</div>

					</li>
					<?php
				}
				wp_reset_postdata();
				?>
			</ol>

			<?php
		} else {
			?>

			<p>対象期間のランキングデータが1件も見つかりませんでした。</p>

			<?php
		}

		die();
	}
	add_action( 'wp_ajax_fit_add_category_rank_widget', 'fit_ajax_add_category_rank_widget' );
	add_action( 'wp_ajax_nopriv_fit_add_category_rank_widget', 'fit_ajax_add_category_rank_widget' );
}
