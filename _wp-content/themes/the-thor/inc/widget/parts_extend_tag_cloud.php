<?php

function fit_extend_tag_cloud() {

	class FIT_WP_Widget_Tag_Cloud extends WP_Widget_tag_cloud {

		private $text_domain = 'parts_extend_tag_cloud';
		private $instance    = array();

		//ウィジェットを表示
		public function widget ( $args, $instance ) {

			$this->instance = $instance;
			add_filter( 'widget_tag_cloud_args', array( $this, 'widget_tag_cloud_args' ) );
			parent::widget( $args, $instance );

		}

		public function widget_tag_cloud_args ( $args ) {
			if ( isset( $this->instance['orderby'] ) ) {
				$args['orderby'] = $this->instance['orderby'];
			}
			if ( isset( $this->instance['order'] ) ) {
				$args['order'] = $this->instance['order'];
			}
			if ( isset( $this->instance['exclude'] ) ) {
				$args['exclude'] = $this->instance['exclude'];
			}
			if ( isset( $this->instance['number'] ) ) {
				$args['number'] = $this->instance['number'];
			}

			return (array) $args;
		}

		//更新
		public function update ( $new_instance, $old_instance ) {
			$instance = parent::update( $new_instance, $old_instance );

			$instance['orderby'] = sanitize_text_field( $new_instance['orderby'] );
			$instance['order']   = sanitize_text_field( $new_instance['order'] );
			$instance['exclude'] = sanitize_text_field( $new_instance['exclude'] );
			$instance['number']  = sanitize_text_field( $new_instance['number'] );

			return (array) $instance;
		}

		//設定フォーム（管理画面）
		public function form ( $instance ) {
			parent::form( $instance );

			//ソート順
			$field_name = 'orderby';
			if ( !isset( $instance[ $field_name ] )) { $instance[ $field_name ] = "name"; }

			$sort_array = array (
				"name"       => "タイトル",
				"term_id" 	 => "ID",
                "term_order" => "順序",
                "count"      => "投稿件数",
			);
			$this->select(
				$this->get_field_id( $field_name ),
				$this->get_field_name( $field_name ),
				$instance[ $field_name ], 'ソート順:',
				$sort_array
			);

			//並び順
			$field_name = 'order';
			if ( !isset( $instance[ $field_name ] ) ) { $instance[ $field_name ] = "ASC"; }
			$order_array  = array(
				"ASC"  => "昇順",
				"DESC" => "降順"
			);
			$this->select(
				$this->get_field_id( $field_name ),
				$this->get_field_name( $field_name ),
				$instance[ $field_name ], '並び順:' ,
				$order_array
			);

			//除外ID
			$field_name = 'exclude';
			if ( !isset( $instance[ $field_name ] ) ) { $instance[ $field_name ] = ""; }
			$this->text(
				$this->get_field_id( $field_name ),
				$this->get_field_name( $field_name ),
				$instance[ $field_name ],
				'除外タグ:',
				'例) 1,2,3',
				'タグIDを入力 *複数時カンマ区切り'
			);

			//表示件数
			$field_name = 'number';
			if ( !isset( $instance[ $field_name ] ) ) { $instance[ $field_name ] = ""; }
			$this->number(
				$this->get_field_id( $field_name ),
				$this->get_field_name( $field_name ),
				$instance[ $field_name ], '表示件数:',
                '＊全件 =「0」'
			);
		}

		/**
		 * フォーム表示用
		*/
		public function select ( $id, $name, $value, $text, array $option_array ) {
			echo '<p>';
			printf( '<label for="%s">%s</label><br>', $id, $text );
			printf( '<select id="%s" name="%s">', $id, $name );

			foreach ( $option_array as $key => $row ) {
				if ( $key == $value ) {
					printf( '<option value="%s" selected="selected">%s</option>', $key, esc_html( $row ) );
				} else {
					printf( '<option value="%s">%s</option>', $key, esc_html( $row ) );
				}
			}
			echo '</select></p>';
		}

		public function text ( $id, $name, $value, $text, $placeholder = "", $notes = "" ) {
			echo '<p>';
			printf( '<label for="%s">%s</label><br>', $id, $text );
			printf( '<input type="text" id="%s" name="%s" value="%s" placeholder="%s"><br>', $id, $name, esc_attr( $value ), esc_attr( $placeholder ) );

			if ( !empty( $notes ) ) {
				printf( '<small>%s</small>', esc_attr( $notes ) );
			}
			echo '</p>';
		}

		public function number ( $id, $name, $value, $text, $notes ="" ) {
			echo '<p>';
			printf( '<label for="%s">%s</label><br>', $id, $text );
			printf( '<input type="number" id="%s" name="%s" value="%s" min="0"><br>', $id, $name, esc_attr( $value ) );
			if ( !empty( $notes ) ) {
				printf( '<small>%s</small>', esc_attr( $notes ) );
			}
			echo '</p>';
		}



	}

	unregister_widget( 'WP_Widget_Tag_Cloud' );
	register_widget( 'FIT_WP_Widget_Tag_Cloud' );

	// タグソート機能を拡張
	function fit_tag_cloud_sort( $tags, $args ) {
		$the_q =  new WP_Term_Query( $args );
		$terms = $the_q->get_terms();
		$count = 0;
		$terms_data = array();
		
		foreach ( $terms as $q ) {
			$terms_obj = new stdClass();
			$terms_obj->term_id = $q->term_id;
			$terms_obj->link = get_term_link( $q->term_id );
			$terms_obj->name = $q->name;
			$terms_obj->slug = $q->slug;
			$terms_obj->count = $q->count;
			$terms_obj->term_group = $q->term_group;
			$terms_obj->term_taxonomy_id = $q->term_taxonomy_id;
			$terms_obj->taxonomy = $q->taxonomy;
			$terms_obj->description = $q->description;
			$terms_obj->parent = $q->parent;
			$terms_obj->filter = $q->filter;
			$terms_obj->term_order = $q->term_order;

			$terms_data[$count] = $terms_obj;
			$count = $count + 1;

		}
		return $terms_data;

	}
	add_filter( 'tag_cloud_sort', 'fit_tag_cloud_sort', 10, 2 );

}


add_action( 'widgets_init', 'fit_extend_tag_cloud' );
