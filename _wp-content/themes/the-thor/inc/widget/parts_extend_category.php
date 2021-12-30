<?php

function fit_extend_category() {
	class FIT_WP_Widget_Categories extends WP_Widget_Categories {

		private $text_domain = 'parts-extend-category';
		private $instance    = array();

		//ウィジェットを表示
		public function widget ( $args, $instance ) {
	
			$this->instance = $instance;
	
			$drop = ! empty( $instance['dropdown'] ) ? '1' : '0';
			if ( $drop ) {
				add_filter( 'widget_categories_dropdown_args', array( $this, 'widget_categories_args' ) );
			} else {
				add_filter( 'widget_categories_args', array( $this, 'widget_categories_args' ) );
			}
			parent::widget( $args, $instance );
		}

		public function widget_categories_args ( $args ) {
			if ( isset( $this->instance['orderby'] ) ) {
				$args['orderby'] = $this->instance['orderby'];
			}
			if ( isset( $this->instance['order'] ) ) {
				$args['order'] = $this->instance['order'];
			}
			if ( isset( $this->instance['exclude'] ) ) {
				$args['exclude'] = $this->instance['exclude'];
			}
			if ( isset( $this->instance['depth'] ) ) {
				$args['depth'] = $this->instance['depth'];
			}
	
			return (array) $args;
		}

		//更新
		public function update ( $new_instance, $old_instance ) {
			$instance = parent::update( $new_instance, $old_instance );
	
			$instance['orderby'] = sanitize_text_field( $new_instance['orderby'] );
			$instance['order']   = sanitize_text_field( $new_instance['order'] );
			$instance['exclude'] = sanitize_text_field( $new_instance['exclude'] );
			$instance['depth']  = sanitize_text_field( $new_instance['depth'] );
	
			return (array) $instance;
		}

		//設定フォーム（管理画面）
		public function form ( $instance ) {
			parent::form( $instance );
		
			//ソート順
			$field_name = 'orderby';
			if ( !isset( $instance[ $field_name ] )) { $instance[ $field_name ] = "title"; }

			$sort_array = array(
				"name" => __( "タイトル",  $this->text_domain ),
				"ID" 	=> __( "ID",  $this->text_domain ),
				"term_order" => __( "順序",  $this->text_domain )
			);
			$this->select(
				$this->get_field_id( $field_name ),
				$this->get_field_name( $field_name ),
				$instance[ $field_name ],
				__( 'ソート順:', $this->text_domain ),
				$sort_array
			);

			//並び順
			$field_name = 'order';
			if ( !isset( $instance[ $field_name ] ) ) { $instance[ $field_name ] = "ASC"; }
			$order_array  = array(
				"ASC"  => __( "昇順",  $this->text_domain ),
				"DESC" => __( "降順", $this->text_domain )
			);
			$this->select(
				$this->get_field_id( $field_name ),
				$this->get_field_name( $field_name ),
				$instance[ $field_name ],
				__( '並び順:', $this->text_domain ),
				$order_array
			);

			//除外ID
			$field_name = 'exclude';
			if ( !isset( $instance[ $field_name ] ) ) { $instance[ $field_name ] = ""; }
			$this->text(
				$this->get_field_id( $field_name ),
				$this->get_field_name( $field_name ),
				$instance[ $field_name ],
				__( '除外カテゴリー:'                          , $this->text_domain ),
				__( '例) 1,2,3'                        , $this->text_domain ),
				__( 'カテゴリーIDを入力 *複数時カンマ区切り', $this->text_domain )
			);

			//表示階層数
			$field_name = 'depth';
			if ( !isset( $instance[ $field_name ] ) ) { $instance[ $field_name ] = ""; }
			$this->number(
				$this->get_field_id( $field_name ),
				$this->get_field_name( $field_name ),
				$instance[ $field_name ],
				__( '階層数:'                          , $this->text_domain ),
				__( '＊全階層 =「0」', $this->text_domain )
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
	unregister_widget( 'WP_Widget_Categories' );
	register_widget( 'FIT_WP_Widget_Categories' );

	function fit_category_list( $output, $args ) {

		// 順序順以外は通常処理
		if ( is_array( $args ) && array_key_exists( 'orderby', $args ) ) {
			if( $args['orderby'] == 'name' || $args['orderby'] == 'ID' ) {
				return $output;
			}
		}
		
		$taxonomy = 'category';
		$taxonomy_terms = get_terms( $taxonomy, $args );
		
		$output = '';
		if ( count($taxonomy_terms) > 0 ) {
			$depth = ( is_array( $args ) && array_key_exists( 'depth', $args ) ) ? $args['depth'] : 0;
			$output = fit_cat_walk_tree( $taxonomy_terms, $depth, $args );
		}

		return $output;
	}
	add_filter( 'wp_list_categories', 'fit_category_list', 10, 2 );
	
	function fit_cat_walk_tree( $taxonomy_terms, $depth, $args ) {

		$walker = new Fit_Category_List_Walker;

		// 入れ子で表示しない場合
		if( is_array( $args ) && array_key_exists( 'hierarchical', $args ) && $args['hierarchical'] == 0 ) {
			$depth = -1;
		}

		if( is_array( $args ) && array_key_exists( 'order', $args ) && $args['order'] == 'DESC' ) {
			usort( $taxonomy_terms, 'descback' );
		}

		$args = array( $taxonomy_terms, $depth, $args );

		return call_user_func_array( array( &$walker, 'walk' ), $args );
	}

	function descback( $a, $b ) {
		if ( $a->term_order ==  $b->term_order ) return 0;
		return ( $a->term_order > $b->term_order ) ? -1 : 1;
	}
	
	class Fit_Category_List_Walker extends Walker {

		var $db_fields = array ( 'parent' => 'parent', 'id' => 'term_id' );
	
		function start_lvl( &$output, $depth = 0, $args = array() ) {
			if ( is_array( $args ) ) {
				extract($args, EXTR_SKIP);// 連想配列を変数に
			}

			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<ul class='children'>\n";
		}
	
		function end_lvl( &$output, $depth = 0, $args = array() ) {
			if ( is_array( $args ) ) {
				extract($args, EXTR_SKIP);
			}

			$indent = str_repeat("\t", $depth);
			$output .= "$indent</ul>\n";
		}
	
		function start_el( &$output, $term, $depth = 0, $args = array(), $current_object_id = 0 ) {

			$t_name = $term->name;

			if ( is_array( $args ) && array_key_exists( 'show_count', $args ) && $args['show_count'] ) {
				$t_name .= '<span class="widgetCount">'. $term->count . '</span>';
			}

			if ( $depth )
				$indent = str_repeat("\t", $depth);
			else
				$indent = '';
			$taxonomy = get_taxonomy( $term->term_taxonomy_id );
			$output .= $indent . '<li class="cat-item cat-item'.$term->term_id.'"><a href=' . get_term_link($term). '>' .$t_name. '</a>';
		}
	
		function end_el( &$output, $object, $depth = 0, $args = array() ) {
			$output .= "</li>\n";
		}
	}

}

add_action( 'widgets_init', 'fit_extend_category' );