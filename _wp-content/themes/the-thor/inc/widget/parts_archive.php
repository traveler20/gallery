<?php
////////////////////////////////////////////////////////
//サムネイル付き新着記事ウィジェットアイテム
////////////////////////////////////////////////////////
class fit_thumbnail_archive_class extends WP_Widget {
	function __construct() {
		$widget_option = array('description' => '画像付き新着記事を表示');
		parent::__construct( false, $name = '[THE]画像付き新着記事', $widget_option );
		require_once locate_template('inc/parts/display_category.php');
	}

	// 設定フォームを出力するメソッド
	function form($instance) {
		$time     = !empty($instance['time']) ? 'checked' : '';
		$update   = !empty($instance['update']) ? 'checked' : '';
		$layout   = !empty($instance['layout']) ? 'checked' : '';
		$category = !empty($instance['category']) ? 'checked' : '';
		?>

		<p>
		  <p>
				<label for="<?php echo $this->get_field_id('title'); ?>">タイトル:</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( @$instance['title'] ); ?>">
		  </p>

		  <p>
				<label for="<?php echo $this->get_field_id('number'); ?>">表示する投稿数:</label>
				<input class="tiny-text" type="number" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo esc_attr( @$instance['number'] ); ?>" step="1" min="1" max="10" size="3">
			</p>

			<p>
				<input class="checkbox" type="checkbox" <?php echo $time; ?> id="<?php echo $this->get_field_id('time'); ?>" name="<?php echo $this->get_field_name('time'); ?>" />
				<label for="<?php echo $this->get_field_id('time'); ?>">投稿日を表示しますか ?</label>
			</p>

			<p>
				<input class="checkbox" type="checkbox" <?php echo $update; ?> id="<?php echo $this->get_field_id('update'); ?>" name="<?php echo $this->get_field_name('update'); ?>" />
				<label for="<?php echo $this->get_field_id('update'); ?>">更新日を表示しますか ?</label>
			</p>

			<p>
				<input class="checkbox" type="checkbox" <?php echo $layout; ?> id="<?php echo $this->get_field_id('layout'); ?>" name="<?php echo $this->get_field_name('layout'); ?>" />
				<label for="<?php echo $this->get_field_id('layout'); ?>">ノーマルレイアウト(左画像)に変更しますか ?</label>
			</p>

			<p>
				<input class="checkbox" type="checkbox" <?php echo $category; ?> id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" />
				<label for="<?php echo $this->get_field_id('category'); ?>">アイキャッチ上のカテゴリを非表示にしますか ?</label>
			</p>

			<p>
				<label for="<?php echo $this->get_field_name("aspect"); ?>">画像アスペクト比:</label>
				<select class="widefat" id="<?php echo $this->get_field_name("aspect"); ?>" name="<?php echo $this->get_field_name("aspect"); ?>">
					<option<?php if( @$instance['aspect'] == '' ){ echo ' selected';} ?> value="">16：9(default)</option>
					<option<?php if( @$instance['aspect'] == 'eyecatch-43' ){ echo ' selected';} ?> value="eyecatch-43">4：3</option>
					<option<?php if( @$instance['aspect'] == 'eyecatch-11' ){ echo ' selected';} ?> value="eyecatch-11">1：1</option>
				</select>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('word'); ?>">本文抜粋文字数(本文を表示する場合)：</label>
				<input type="number" max="150" class="widefat" id="<?php echo $this->get_field_id('word'); ?>" name="<?php echo $this->get_field_name('word'); ?>" value="<?php echo esc_attr( @$instance['word'] ); ?>">
			</p>
		</p>
		<?php
	}

	// 設定を表示するメソッド
	function widget($args, $instance) {
		extract($args);
		echo $before_widget;
		$title = NULL;
		if(!empty($instance['title'])) {
			$title = apply_filters('widget_title', $instance['title'] );
		}

		if ($title) {
			echo $before_title . $title . $after_title;
		}

		$number = !empty($instance['number']) ? $instance['number'] : 5;

		get_the_ID();
		$args = array(
			'orderby' => 'date',
			'order' => 'DESC',
			'ignore_sticky_posts' => '1',
			'posts_per_page' => $number
		);
		$my_query = new WP_Query( $args );?>
		<ol class="widgetArchive">
			<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
				<li class="widgetArchive__item<?php if( !empty( $instance['layout'] )): ?> widgetArchive__item-normal<?php endif; ?>">
					<div class="eyecatch <?php echo esc_attr( @$instance['aspect'] ); ?>">
						<?php
					  	$cats = get_the_category();
						if(empty($instance['category']) ){

							$display_category = null;
							$display_category = new FitDisplayTheCategory( $cats,'category' );
	
							// 最下層レベルのカテゴリー名リストを取得
							$most_btm_names = array();
							$most_btm_names = $display_category->get_deisplay_the_category();
	
							// リストの一番最初のカテゴリーを表示
							$term_id = get_cat_ID( $most_btm_names[0] );
							$cat_link = get_category_link( $term_id );
							$cat_name = $most_btm_names[0];

							echo '<span class="eyecatch__cat cc-bg'.$term_id.'">';
						  	echo '<a href="' . $cat_link . '">' . $cat_name . '</a>';
						  	echo '</span>';
						}
					  ?>
						<a class="eyecatch__link<?php if (get_option('fit_bsEyecatch_hover') != 'off' ) : ?> eyecatch__link-<?php echo get_option('fit_bsEyecatch_hover');	?><?php endif; ?>" href="<?php the_permalink(); ?>">
							<?php if ( has_post_thumbnail()): ?>
								<?php
								$size = 'icatch768';
								if(get_option('fit_bsEyecatch_widgetSize')){
									$size = get_option('fit_bsEyecatch_widgetSize');
								}
								the_post_thumbnail($size);
								?>
              <?php elseif ( get_fit_noimg()): ?>
                <img <?php echo fit_correct_src(); ?>="<?php echo get_fit_noimg(); ?>" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
							<?php else: ?>
                <img <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_768.gif" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
              <?php endif; ?>
            </a>
          </div>
          <div class="widgetArchive__contents">
            <?php if( !empty( $instance['time'] ) || !empty($instance['update'])): ?>
              <ul class="dateList">
                <?php if( !empty($instance['time']) ): ?>
                  <li class="dateList__item icon-clock"><?php the_time(get_option('date_format')); ?></li>
                <?php endif; ?>
                <?php if ( !empty($instance['update']) && get_the_time( 'U' ) !== get_the_modified_time( 'U' ) || !empty($instance['update']) && empty($instance['time'])) : ?>
                  <li class="dateList__item icon-update"><?php the_modified_date(get_option('date_format')) ?></li>
                <?php endif; ?>
              </ul>
						<?php endif; ?>
              <h3 class="heading heading-tertiary">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h3>
						<?php if( !empty( $instance['word'] )): ?>
							<p class="phrase phrase-tertiary">
								<?php echo mb_substr(get_the_excerpt(), 0, $instance['word']) . '[…]'; ?>
							</p>
						<?php endif; ?>
          </div>

        </li>
			<?php endwhile; wp_reset_postdata(); ?>
		</ol>
		<?php
		echo $after_widget;
	}

	// 設定を保存するメソッド
	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

}
add_action( 'widgets_init', function(){register_widget('fit_thumbnail_archive_class' );});
