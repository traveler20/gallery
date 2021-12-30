<?php
////////////////////////////////////////////////////////
//広告ウィジェットアイテム
////////////////////////////////////////////////////////
class fit_adWidget_item_class extends WP_Widget {
	function __construct() {
		$widget_option = array('description' => '様々な広告に利用できるテキストエリア');
		parent::__construct( false, $name = '[THE]広告', $widget_option );
	}

	// 設定フォームを出力するメソッド
	function form( $instance ) {
		$style = !empty($instance['style']) ? 'checked' : '';
		?>
		<p>
		  <label for="<?php echo $this->get_field_id('title'); ?>">タイトル:</label>
		  <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( @$instance['title'] ); ?>">
		</p>
    <p>
			<label for="<?php echo $this->get_field_id('body'); ?>">広告タグ:</label>
			<textarea class="widefat" rows="8" id="<?php echo $this->get_field_id('body'); ?>" name="<?php echo $this->get_field_name('body'); ?>"><?php echo @$instance['body']; ?></textarea>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php echo $style; ?> id="<?php echo $this->get_field_id('style'); ?>" name="<?php echo $this->get_field_name('style'); ?>" />
			<label for="<?php echo $this->get_field_id('style'); ?>">背景スタイルを無効にしますか ?</label>
		</p>

		<?php
	}

	// 設定を表示するメソッド
	function widget( $args, $instance ) {
		extract( $args );

		$bgStyle = NULL;
		if( !empty( $instance['style'] )) {
			$bgStyle = ' adWidget-no';
		}

		echo $before_widget;
		echo '<div class="adWidget'.$bgStyle.'">';

		// 本文を取得
		$body = $instance[ 'body' ];
		if( $body != '' ) {
			echo $body;
		}

		// タイトルを取得
		$title = NULL;
		if(!empty($instance['title'])) {
			$title = apply_filters('widget_title', $instance['title'] );
		}
		if ($title) {
			echo '<p class="adWidget__title">' . $title . '</p>';
		}
		echo '</div>';
		echo $after_widget;

	}

	// 設定を保存するメソッド
	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

}
add_action( 'widgets_init', function(){register_widget('fit_adWidget_item_class' );});
