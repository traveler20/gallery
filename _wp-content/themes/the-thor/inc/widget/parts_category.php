<?php
////////////////////////////////////////////////////////
//カテゴリ指定ランキングウィジェットアイテム
////////////////////////////////////////////////////////
class fit_ranking_categorie_class extends WP_Widget {
	function __construct() {
		$widget_option = array('description' => '指定したカテゴリでPV数の多い順に記事を表示');
		parent::__construct( false, $name = '[THE]カテゴリ人気記事', $widget_option );
	}

	// 設定フォームを出力するメソッド
	function form($instance) {
		$time   = !empty($instance['time']) ? 'checked' : '';
		$update = !empty($instance['update']) ? 'checked' : '';
		$layout = !empty($instance['layout']) ? 'checked' : '';
		$view   = !empty($instance['view']) ? 'checked' : '';
		?>
        <p>
		  <p>
		  <label for="<?php echo $this->get_field_id('title'); ?>">タイトル:</label>
		  <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( @$instance['title'] ); ?>">
		  </p>

          <p>
          <?php
          $categories = get_categories( array('orderby'=>'ID','order'=>'ASC') );

          echo '<label for="'.$this->get_field_name("categorie").'">カテゴリ:</label>';
          echo '<select class="widefat" id="'.$this->get_field_name("categorie").'" name="'.$this->get_field_name("categorie").'">';
          foreach($categories as $val):
			  $catId = $val -> cat_ID;
			  $selected = '';
			  if( @$instance['categorie'] == $catId ){
				  $selected = 'selected';
			  }
			  echo '<option '.$selected.' value="'.$catId.'">'.$val->name .'</option>';
		  endforeach;
		  echo '</select>';
		  ?>
          </p>

		  <?php
			$selected_period = ( array_key_exists( 'period', $instance ) ) ? $instance['period'] : '';
		  ?>
		  <p>
		  <label for="<?php echo $this->get_field_id('period'); ?>">ランキング対象期間:</label>
		  <select class="widefat" id="<?php echo $this->get_field_id('period'); ?>" name="<?php echo $this->get_field_name( 'period' ); ?>">
		    <option <?php echo ( Fit_Rank::PERIOD_ALL === $selected_period ) ? 'selected' : ''; ?> value="<?php echo Fit_Rank::PERIOD_ALL; ?>">全期間(default)</option>
		    <option <?php echo ( Fit_Rank::PERIOD_MONTH === $selected_period ) ? 'selected' : ''; ?> value="<?php echo Fit_Rank::PERIOD_MONTH; ?>">月</option>
		    <option <?php echo ( Fit_Rank::PERIOD_WEEK === $selected_period ) ? 'selected' : ''; ?> value="<?php echo Fit_Rank::PERIOD_WEEK; ?>">週</option>
		    <option <?php echo ( Fit_Rank::PERIOD_DAY === $selected_period ) ? 'selected' : ''; ?> value="<?php echo Fit_Rank::PERIOD_DAY; ?>">日</option>
		  </select>
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
          <input class="checkbox" type="checkbox" <?php echo $view; ?> id="<?php echo $this->get_field_id('view'); ?>" name="<?php echo $this->get_field_name('view'); ?>" />
          <label for="<?php echo $this->get_field_id('view'); ?>">閲覧数を表示しますか ?</label>
          </p>

          <p>
          <input class="checkbox" type="checkbox" <?php echo $layout; ?> id="<?php echo $this->get_field_id('layout'); ?>" name="<?php echo $this->get_field_name('layout'); ?>" />
          <label for="<?php echo $this->get_field_id('layout'); ?>">ノーマルレイアウト(左画像)に変更しますか ?</label>
          </p>

          <p>
          <label for="<?php echo $this->get_field_name("aspect"); ?>">画像アスペクト比:</label>
          <select class="widefat" id="<?php echo $this->get_field_name("aspect"); ?>" name="<?php echo $this->get_field_name("aspect"); ?>">
            <option<?php if( @$instance['aspect'] == '' ){ echo ' selected';} ?> value="">16：9(default)</option>
            <option<?php if( @$instance['aspect'] == 'eyecatch-43' ){ echo ' selected';} ?> value="eyecatch-43">4：3</option>
            <option<?php if( @$instance['aspect'] == 'eyecatch-11' ){ echo ' selected';} ?> value="eyecatch-11">1：1</option>
            <option<?php if( @$instance['aspect'] == 'none' ){ echo ' selected';} ?> value="none">0：0(非表示)</option>
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

		// フッターにランキング取得用のスクリプト追加
		$id = fit_ranklist_id_hash();
		$get_rank_action = new Fit_Get_Rank_Action( $id, Fit_Get_Rank_Action::TYPE_CAT_RANK, array( 'instance' => $instance ) );
		$get_rank_action->add_wp_footer();

		$categorie = 1;
		if(!empty($instance['categorie'])) {
			$categorie = $instance['categorie'] ;
		}
		$cat = get_category($categorie);
		echo '<div class="widgetCatTitle cc-bg'.$categorie.'">';
		echo '<span class="widgetCatTitle__inner cc-bg'.$categorie.'">'.$cat->cat_name.'カテゴリ</span>';
		echo '</div>';
		echo "<div id=\"categoryrankwidget-$id\"></div>";

        echo $after_widget;
	}

	// 設定を保存するメソッド
	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

}
add_action( 'widgets_init', function(){register_widget('fit_ranking_categorie_class' );});
