<?php
////////////////////////////////////////////////////////
//QRコードウィジェットアイテム
////////////////////////////////////////////////////////
class fit_qrcode_class extends WP_Widget {
	function __construct() {
		$widget_option = array('description' => 'QRコードを表示');
		parent::__construct( false, $name = '[THE]QRコード', $widget_option );
	}

	// 設定フォームを出力するメソッド
	function form( $instance ) {
		?>
        <p>
		  <label for="<?php echo $this->get_field_id('title'); ?>">タイトル:</label>
		  <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( @$instance['title'] ); ?>">
		</p>

        <p>
		  <label for="<?php echo $this->get_field_id('url'); ?>">URL:</label>
		  <input type="text" class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" value="<?php echo esc_attr( @$instance['url'] ); ?>">
		</p>

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

		// タイトルを取得
		$title = NULL;
		if(!empty($instance['title'])) {
			$title = apply_filters('widget_title', $instance['title'] );
		}
		if ($title) {
			echo $before_title . $title . $after_title;
		}

		// URLを取得
		$url = NULL;
		if(!empty($instance['url'])) {
			$url = apply_filters('widget_title', $instance['url'] );
		}else{
			$url = home_url( '/' );
		}

		// 本文を取得

		$body = NULL;
		if(!empty($instance['body'])) {
			$body = $instance[ 'body' ];
		}

		echo '<div class="qrWidget">';
		echo '<img class="qrWidget_img" alt="QRコード" '.fit_correct_src().'="//chart.apis.google.com/chart?cht=qr&chs=140x140&chl='.$url.'" '.fit_dummy_src().'>';
		echo '<div class="qrWidget__text">'.$body.'</div>';
		echo '</div>';

		echo $after_widget;

	}

	// 設定を保存するメソッド
	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

}
add_action( 'widgets_init', function(){register_widget('fit_qrcode_class' );});
