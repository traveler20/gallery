<?php
////////////////////////////////////////////////////////
//著作者情報ウィジェットアイテム
////////////////////////////////////////////////////////
class fit_user_class extends WP_Widget {
	function __construct() {
		$widget_option = array('description' => '著作者情報を表示');
		parent::__construct( false, $name = '[THE]著作者情報', $widget_option );
	}

	// 設定フォームを出力するメソッド
	function form( $instance ) {
		$btn    = !empty($instance['btn']) ? 'checked' : '';
		$follow = !empty($instance['follow']) ? 'checked' : '';
		?>
        <p>
		  <label for="<?php echo $this->get_field_id('title'); ?>">タイトル:</label>
		  <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( @$instance['title'] ); ?>">
		</p>
        <p>
        <?php
        $users =get_users( array('orderby'=>'ID','order'=>'ASC') );

        echo '<label for="'.$this->get_field_name("user").'">ユーザー:</label>';
        echo '<select class="widefat" id="'.$this->get_field_name("user").'" name="'.$this->get_field_name("user").'">';
        foreach($users as $user):
			$userId = $user->ID;
			$userData = get_userdata($userId);
			$selected = '';
			if( @$instance['user'] == $userId ){
				$selected = 'selected';
			}
			echo '<option '.$selected.' value="'.$userId.'">'.$user->display_name.'</option>';
		endforeach;
		echo '</select>';
		?>
        </p>

        <p>
          <input class="checkbox" type="checkbox" <?php echo $btn; ?> id="<?php echo $this->get_field_id('btn'); ?>" name="<?php echo $this->get_field_name('btn'); ?>" />
          <label for="<?php echo $this->get_field_id('btn'); ?>">記事一覧へボタンを表示しますか ?</label>
          </p>

        <p>
		  <label for="<?php echo $this->get_field_id('btn_title'); ?>">記事一覧へボタンのタイトル:</label>
		  <input type="text" class="widefat" id="<?php echo $this->get_field_id('btn_title'); ?>" name="<?php echo $this->get_field_name('btn_title'); ?>" value="<?php echo esc_attr( @$instance['btn_title'] ); ?>">
		</p>

        <p>
          <input class="checkbox" type="checkbox" <?php echo $follow; ?> id="<?php echo $this->get_field_id('follow'); ?>" name="<?php echo $this->get_field_name('follow'); ?>" />
          <label for="<?php echo $this->get_field_id('follow'); ?>">フォローアイコンを表示しますか ?</label>
          </p>

        <p>
		  <label for="<?php echo $this->get_field_id('follow_title'); ?>">フォローアイコンのタイトル:</label>
		  <input type="text" class="widefat" id="<?php echo $this->get_field_id('follow_title'); ?>" name="<?php echo $this->get_field_name('follow_title'); ?>" value="<?php echo esc_attr( @$instance['follow_title'] ); ?>">
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

		// ボタンタイトルを取得
		$btn_title = NULL;
		if(!empty($instance['btn_title'])) {
			$btn_title = apply_filters('widget_title', $instance['btn_title'] );
		}else {
			$btn_title = '投稿記事一覧へ';
		}

		// フォローアイコンタイトルを取得
		$follow_title = NULL;
		if(!empty($instance['follow_title'])) {
			$follow_title = apply_filters('widget_title', $instance['follow_title'] );
		}else {
			$follow_title = 'フォーローしてね！';
		}

		$user_id = $instance['user'] ;
 	    $author = get_avatar($user_id, '120');
 	    $imgtag= '/<img.*?src=(["\'])(.+?)\1.*?>/i';
 	    if(preg_match($imgtag, $author, $imgurl)){
			$author = $imgurl[2];
		}

		?>

        <div class="widgetProfile">
          <div class="widgetProfile__img"><img width="120" height="120" <?php echo fit_correct_src(); ?>="<?php echo $author; ?>" alt="<?php the_author_meta('display_name', $user_id); ?>" <?php echo fit_dummy_src(); ?>></div>
          <h3 class="widgetProfile__name"><?php the_author_meta('display_name', $user_id); ?></h3>
          <?php if (get_the_author_meta('user_group', $user_id)): ?><div class="widgetProfile__group"><?php the_author_meta('user_group', $user_id); ?></div><?php endif; ?>
          <?php if (get_the_author_meta('description', $user_id)): ?><p class="widgetProfile__text"><?php the_author_meta('description', $user_id); ?></p><?php endif; ?>
          <?php if( !empty( $instance['btn'] )): ?>
          <div class="btn btn-center"><a class="btn__link btn__link-secondary" href="<?php echo get_author_posts_url($user_id); ?>"><?php echo $btn_title ?></a></div>
          <?php endif; ?>
          <?php if( !empty( $instance['follow'] )): ?>
          <div class="widgetProfile__sns">
            <h4 class="widgetProfile__snsTitle"><?php echo $follow_title ?></h4>
            <ul class="widgetProfile__snsList">
              <?php if (get_the_author_meta('facebook', $user_id)): ?><li class="widgetProfile__snsItem"><a class="widgetProfile__snsLink icon-facebook" href="<?php the_author_meta('facebook', $user_id); ?>"></a></li><?php endif; ?>
              <?php if (get_the_author_meta('twitter', $user_id)): ?><li class="widgetProfile__snsItem"><a class="widgetProfile__snsLink icon-twitter" href="<?php the_author_meta('twitter', $user_id); ?>"></a></li><?php endif; ?>
              <?php if (get_the_author_meta('instagram', $user_id)): ?><li class="widgetProfile__snsItem"><a class="widgetProfile__snsLink icon-instagram" href="<?php the_author_meta('instagram', $user_id); ?>"></a></li><?php endif; ?>
              <?php if (get_the_author_meta('gplus', $user_id)): ?><li class="widgetProfile__snsItem"><a class="widgetProfile__snsLink icon-google-plus" href="<?php the_author_meta('gplus', $user_id); ?>"></a></li><?php endif; ?>
              <?php if (get_the_author_meta('youtube', $user_id)): ?><li class="widgetProfile__snsItem"><a class="widgetProfile__snsLink icon-youtube" href="<?php the_author_meta('youtube', $user_id); ?>"></a></li><?php endif; ?>
              <?php if (get_the_author_meta('linkedin', $user_id)): ?><li class="widgetProfile__snsItem"><a class="widgetProfile__snsLink icon-linkedin" href="<?php the_author_meta('linkedin', $user_id); ?>"></a></li><?php endif; ?>
              <?php if (get_the_author_meta('pinterest', $user_id)): ?><li class="widgetProfile__snsItem"><a class="widgetProfile__snsLink icon-pinterest" href="<?php the_author_meta('pinterest', $user_id); ?>"></a></li><?php endif; ?>
            </ul>
          </div>
          <?php endif; ?>
        </div>
		<?php
		echo $after_widget;

	}

	// 設定を保存するメソッド
	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}


}
add_action( 'widgets_init', function(){register_widget('fit_user_class' );});
