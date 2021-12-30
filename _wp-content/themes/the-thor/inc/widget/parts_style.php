<?php
////////////////////////////////////////////////////////
//スタイルテキストアイテム
////////////////////////////////////////////////////////
class fit_styleWidget_item_class extends WP_Widget {
	function __construct() {
		$widget_option = array('description' => '投稿ページと同じスタイルが利用できるテキスト');
		parent::__construct( false, $name = '[THE]スタイルテキスト', $widget_option );
	}

	// 設定フォームを出力するメソッド
	function form( $instance ) {
		?>
        <p>
          <label for="<?php echo $this->get_field_id('body'); ?>">本文:</label>
          <textarea class="widefat" rows="8" id="<?php echo $this->get_field_id('body'); ?>" name="<?php echo $this->get_field_name('body'); ?>"><?php echo @$instance['body']; ?></textarea>
		</p>

		<?php
	}

	// 設定を表示するメソッド
	function widget( $args, $instance ) {
		extract( $args );
		echo $before_widget;
		echo '<div class="content'; fit_content_class(); echo '">';

		// 本文を取得
		$body = $instance[ 'body' ];
		if( $body != '' ) {
			echo apply_filters('the_content', $body);
		}

		echo '</div>';
		echo $after_widget;

	}

	// 設定を保存するメソッド
	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

}
add_action( 'widgets_init', function(){register_widget('fit_styleWidget_item_class' );});
