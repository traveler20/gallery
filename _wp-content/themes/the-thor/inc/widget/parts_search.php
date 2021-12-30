<?php
////////////////////////////////////////////////////////
//絞込検索ウィジェットアイテム
////////////////////////////////////////////////////////
class fit_search_refine_class extends WP_Widget {
	function __construct() {
		$widget_option = array('description' => '絞込検索フォームを表示');
		parent::__construct( false, $name = '[THE]絞込検索', $widget_option );
	}

	// 設定フォームを出力するメソッド
	function form( $instance ) {
		?>
        <p>
		  <label for="<?php echo $this->get_field_id('title'); ?>">タイトル:</label>
		  <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( @$instance['title'] ); ?>">
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
		echo get_template_part('searchform', 'refine');
		echo $after_widget;

	}

	// 設定を保存するメソッド
	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}


}
add_action( 'widgets_init', function(){register_widget('fit_search_refine_class' );});
