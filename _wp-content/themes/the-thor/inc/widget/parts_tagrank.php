<?php
////////////////////////////////////////////////////////
//タグランキングウィジェットアイテム
////////////////////////////////////////////////////////
class fit_tagrank_class extends WP_Widget {
	function __construct() {
		$widget_option = array('description' => 'タグランキングを表示');
		parent::__construct( false, $name = '[THE]タグランキング', $widget_option );
	}

	// 設定フォームを出力するメソッド
	function form( $instance ) {
		?>
        <p>
		  <label for="<?php echo $this->get_field_id('title'); ?>">タイトル:</label>
		  <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( @$instance['title'] ); ?>">
		</p>
        <p>
        <?php
		$args = array( 'post_type' => 'afRanking', 'posts_per_page' => -1 );
		$ranklist = get_posts( $args );

		echo '<label for="'.$this->get_field_name("tagrank").'">タグランキングID:</label>';
        echo '<select class="widefat" id="'.$this->get_field_name("tagrank").'" name="'.$this->get_field_name("tagrank").'">';
        foreach($ranklist as $rank):
			$rankId = $rank->ID;
			$rankData = get_userdata($rankId);
			$selected = '';
			if( @$instance['tagrank'] == $rankId ){
				$selected = 'selected';
			}
			echo '<option '.$selected.' value="'.$rankId.'">'.$rank->post_title.'</option>';
		endforeach;
		echo '</select>';
		?>
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
		// タイトルを表示
		if ($title) {
			echo $before_title . $title . $after_title;
		}

		// タグランキングIDを取得
		$id = NULL;
		if(!empty($instance['tagrank'])) {
			$id = $instance['tagrank'];
		}

		// タグランキング情報を取得
		$tag_id = get_post_meta($id , 'afRanking_post' ,true);
		$crown  = get_post_meta($id , 'afRanking_crown', true);

		echo '<ul class="widgetAfRank widgetAfRank__crown'.$crown.'">';

		if( isset($tag_id)) {
			foreach($tag_id as $tid){

				$post = get_post($tid);
				$title = get_the_title($tid);
				$content = $post->post_content;
				$banner = apply_filters('the_content', get_post_meta($tid, 'afTagFormat_banner', true));
				$text = apply_filters('the_content', get_post_meta($tid, 'afTagFormat_text', true));
				$d_id = get_post_meta($tid, 'afTagFormat_d_id', true);
				$d_title = get_post_meta($tid, 'afTagFormat_d_title', true);
				$a_url = get_post_meta($tid, 'afTagFormat_a_url', true);
				$a_title = get_post_meta($tid, 'afTagFormat_a_title', true);


				$jquery  = '';
				if(!is_user_logged_in() && !is_bot()){
					$post_view_action = new Fit_Post_View_Action( $tid );
					$post_view_action->add_wp_footer();
					$jquery = post_ajax_send($tid);
				}



		?>
<li>
  <div class="widgetAfTag afTag-<?php echo $tid ?>">
    <div class="widgetAfTag__header">
      <div class="widgetAfTag__title"><?php echo $title ?></div>
    </div>
    <div class="widgetAfTag__contentBox">
      <div class="widgetAfTag__banner"><?php echo $banner ?></div>
	  <div class="widgetAfTag__text"><?php echo $text ?></div>
    </div>
    <div class="widgetAfTag__btnList">
      <?php if(!empty($d_id)  && !empty($d_title)){echo '<a class="widgetAfTag__btnDetail" href="'.get_permalink($d_id).'">'.$d_title.'</a>';} ?>
	  <?php if(!empty($a_url) && !empty($a_title)){echo '<a class="widgetAfTag__btnAf" href="'.$a_url.'" target="_blank">'.$a_title.'</a>';} ?>
    </div>
    <?php echo $jquery ?>
  </div>
</li>
		<?php
			}
		}
		echo '</ul>';
		echo $after_widget;

	}

	// 設定を保存するメソッド
	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

}
add_action( 'widgets_init', function(){register_widget('fit_tagrank_class' );});
