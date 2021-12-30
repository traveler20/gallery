<?php
////////////////////////////////////////////////////////
//タブコンテンツアイテム
////////////////////////////////////////////////////////
class fit_tabContentsWidget_item_class extends WP_Widget {
	function __construct() {
		$widget_option = array('description' => '投稿ページと同じスタイルが利用できるタブコンテンツテキスト');
		parent::__construct( false, $name = '[THE]タブコンテンツ', $widget_option );
	}

	// 設定フォームを出力するメソッド
	function form( $instance ) {
		?>
		<p style="margin-bottom: 20px;">
		  <label for="<?php echo $this->get_field_id('title'); ?>">タイトル:</label>
		  <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( @$instance['title'] ); ?>">
		</p>

		<p>
		  <label for="<?php echo $this->get_field_id('title01'); ?>">タブタイトル01:</label>
		  <input type="text" class="widefat" id="<?php echo $this->get_field_id('title01'); ?>" name="<?php echo $this->get_field_name('title01'); ?>" value="<?php echo esc_attr( @$instance['title01'] ); ?>">
		</p>
        <p>
          <label for="<?php echo $this->get_field_id('body01'); ?>">タブ本文01:</label>
          <textarea class="widefat" rows="6" id="<?php echo $this->get_field_id('body01'); ?>" name="<?php echo $this->get_field_name('body01'); ?>"><?php echo @$instance['body01']; ?></textarea>
		</p>


		<p>
		  <label for="<?php echo $this->get_field_id('title02'); ?>">タブタイトル02:</label>
		  <input type="text" class="widefat" id="<?php echo $this->get_field_id('title02'); ?>" name="<?php echo $this->get_field_name('title02'); ?>" value="<?php echo esc_attr( @$instance['title02'] ); ?>">
		</p>
        <p>
          <label for="<?php echo $this->get_field_id('body02'); ?>">タブ本文02:</label>
          <textarea class="widefat" rows="6" id="<?php echo $this->get_field_id('body02'); ?>" name="<?php echo $this->get_field_name('body02'); ?>"><?php echo @$instance['body02']; ?></textarea>
		</p>


		<p>
		  <label for="<?php echo $this->get_field_id('title03'); ?>">タブタイトル03:</label>
		  <input type="text" class="widefat" id="<?php echo $this->get_field_id('title03'); ?>" name="<?php echo $this->get_field_name('title03'); ?>" value="<?php echo esc_attr( @$instance['title03'] ); ?>">
		</p>
        <p>
          <label for="<?php echo $this->get_field_id('body03'); ?>">タブ本文03:</label>
          <textarea class="widefat" rows="6" id="<?php echo $this->get_field_id('body03'); ?>" name="<?php echo $this->get_field_name('body03'); ?>"><?php echo @$instance['body03']; ?></textarea>
		</p>


		<p>
		  <label for="<?php echo $this->get_field_id('title04'); ?>">タブタイトル04:</label>
		  <input type="text" class="widefat" id="<?php echo $this->get_field_id('title04'); ?>" name="<?php echo $this->get_field_name('title04'); ?>" value="<?php echo esc_attr( @$instance['title04'] ); ?>">
		</p>
        <p>
          <label for="<?php echo $this->get_field_id('body04'); ?>">タブ本文04:</label>
          <textarea class="widefat" rows="6" id="<?php echo $this->get_field_id('body04'); ?>" name="<?php echo $this->get_field_name('body04'); ?>"><?php echo @$instance['body04']; ?></textarea>
		</p>


		<p>
		  <label for="<?php echo $this->get_field_id('title05'); ?>">タブタイトル05:</label>
		  <input type="text" class="widefat" id="<?php echo $this->get_field_id('title05'); ?>" name="<?php echo $this->get_field_name('title05'); ?>" value="<?php echo esc_attr( @$instance['title05'] ); ?>">
		</p>
        <p>
          <label for="<?php echo $this->get_field_id('body05'); ?>">タブ本文05:</label>
          <textarea class="widefat" rows="6" id="<?php echo $this->get_field_id('body05'); ?>" name="<?php echo $this->get_field_name('body05'); ?>"><?php echo @$instance['body05']; ?></textarea>
		</p>

		<?php
	}

	// 設定を表示するメソッド
	function widget( $args, $instance ) {
		extract( $args );
		echo $before_widget;

		// タイトルを取得
		$title = NULL;
		if(!empty($instance['title'])) {
			$title = apply_filters('widget_title', $instance['title'] );
		}
		if ($title) {
			echo $before_title . $title . $after_title;
		}

		echo '<div class="widgetTab content'; fit_content_class(); echo '">';
		echo '<div class="widgetTab__menu">';
		// タブタイトル01を取得
		$title01 = NULL;
		if(!empty($instance['title01'])) {
			$title01 = $instance['title01'];
		}
		if ($title01) {
			echo '<span class="widgetTab__item current">'.$title01.'</span>';
		}
		// タブタイトル02を取得
		$title02 = NULL;
		if(!empty($instance['title02'])) {
			$title02 = $instance['title02'];
		}
		if ($title02) {
			echo '<span class="widgetTab__item">'.$title02.'</span>';
		}
		// タブタイトル03を取得
		$title03 = NULL;
		if(!empty($instance['title03'])) {
			$title03 = $instance['title03'];
		}
		if ($title03) {
			echo '<span class="widgetTab__item">'.$title03.'</span>';
		}
		// タブタイトル04を取得
		$title04 = NULL;
		if(!empty($instance['title04'])) {
			$title04 = $instance['title04'];
		}
		if ($title04) {
			echo '<span class="widgetTab__item">'.$title04.'</span>';
		}
		// タブタイトル05を取得
		$title05 = NULL;
		if(!empty($instance['title05'])) {
			$title05 = $instance['title05'];
		}
		if ($title05) {
			echo '<span class="widgetTab__item">'.$title05.'</span>';
		}
		echo '</div>';

		// タブ本文01を取得
		$body01 = NULL;
		if(!empty($instance['body01'])) {
			$body01 = apply_filters('the_content', $instance['body01']);
		}
		if ($body01) {
			echo '<div class="widgetTab__content current">'.$body01.'</div>';
		}
		// タブ本文02を取得
		$body02 = NULL;
		if(!empty($instance['body02'])) {
			$body02 = apply_filters('the_content', $instance['body02']);
		}
		if ($body02) {
			echo '<div class="widgetTab__content">'.$body02.'</div>';
		}
		// タブ本文03を取得
		$body03 = NULL;
		if(!empty($instance['body03'])) {
			$body03 = apply_filters('the_content', $instance['body03']);
		}
		if ($body03) {
			echo '<div class="widgetTab__content">'.$body03.'</div>';
		}
		// タブ本文04を取得
		$body04 = NULL;
		if(!empty($instance['body04'])) {
			$body04 = apply_filters('the_content', $instance['body04']);
		}
		if ($body04) {
			echo '<div class="widgetTab__content">'.$body04.'</div>';
		}
		// タブ本文05を取得
		$body05 = NULL;
		if(!empty($instance['body05'])) {
			$body05 = apply_filters('the_content', $instance['body05']);
		}
		if ($body05) {
			echo '<div class="widgetTab__content">'.$body05.'</div>';
		}


		echo '</div>';
		echo $after_widget;

	}

	// 設定を保存するメソッド
	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

}
add_action( 'widgets_init', function(){register_widget('fit_tabContentsWidget_item_class' );});
