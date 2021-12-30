<?php
////////////////////////////////////////////////////////
//オリジナルパンくずリストを作成
////////////////////////////////////////////////////////
function fit_breadcrumb($args = array()){
	$defaults = array(
		'echo'              => true,

		'container'         => 'div',
		'container_class'   => 'breadcrumb',
		'crumb_tag'         => 'ul',
		'crumb_class'       => 'breadcrumb__list container',
		'home_class'        => 'breadcrumb__item icon-home',
		'home_text'         => 'HOME',
		'li_class'          => 'breadcrumb__item',
	);

	$args = wp_parse_args( $args, $defaults );
	$args = (object) $args;
	$breadcrumb_html      = '';

	function current_crumb_tag( $current_permalink, $current_text = '', $args = array(), $current_class = 'breadcrumb__item breadcrumb__item-current' ) {
		$args = wp_parse_args( $args );
		$args = (object) $args;
		$current_class      = $current_class ? ' class="' . esc_attr( $current_class ) . '"' : '';
		$start_anchor_tag   = $current_permalink ? '<a href="' . $current_permalink . '">' : '';
		$end_anchor_tag     = $current_permalink ? '</a>' : '';
		$current_before     = '<li' . $current_class . '>' . $start_anchor_tag . '';
		$current_crumb_tag  = $current_text;
		$current_after      = '' . $end_anchor_tag . '</li>';
		if ( get_query_var( 'paged' ) ) {
			if ( is_paged() || is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
				$current_after = ' (ページ' . get_query_var( 'paged' ) . ')' . $current_after;
			}

		} elseif ( ( is_page() || is_single() ) && get_query_var( 'page' ) ) {
			$current_after = ' (ページ' . get_query_var( 'page' ) . ')' . $current_after;
		}

		return $current_before . $current_crumb_tag . $current_after;
	}

	if ( !is_home() && !is_front_page()) {
		// コンテナスタート
		if ( $args->container ) {
			$class = $args->container_class ? ' class="' . esc_attr( $args->container_class ) . '"' : ' class="' . $defaults['container_class'] . '"';
			$breadcrumb_html .= '<'. $args->container . $class . '>';
		}

		// パンくずスタート
		if ( $args->crumb_tag ) {
			$crumb_tag_allowed_tags = apply_filters( 'crumb_tag_allowed_tags', array( 'ul', 'ol' ) );
			if ( in_array( $args->crumb_tag, $crumb_tag_allowed_tags ) ) {
				$class = $args->crumb_class ? ' class="' . esc_attr( $args->crumb_class ) . '"' : '';
				$breadcrumb_html .= '<' . $args->crumb_tag . $class . '>';
			}

		} else {
			$breadcrumb_html .= '<' . $defaults['crumb_tag'] . '>';
		}

		global $post;

		// ホームスタート
		$home_class = $args->home_class ? ' class="'. esc_attr( $args->home_class ) . '"' : '';
		$li_class = $args->li_class ? ' class="'. esc_attr( $args->li_class ) . '"' : '';
		$breadcrumb_html .= '<li'. $home_class . '><a href="' . home_url() . '">' . $args->home_text . '</a></li>';
		if ( is_home() && ! is_front_page() ) {
			$home_ID = get_option('page_for_posts');
			$breadcrumb_html .= current_crumb_tag( get_the_permalink( $home_ID ), get_the_title( $home_ID ) );

		} elseif ( is_search() ) {
			$breadcrumb_html .= current_crumb_tag( get_search_link(), '"'.get_search_query() . '" の検索結果' );

		} elseif ( is_category() ) {
			$cat = get_queried_object();

			if ( $cat->parent != 0 ) {
				$ancestors = array_reverse( get_ancestors( $cat->cat_ID, 'category' ) );
				foreach ( $ancestors as $ancestor ) {
					$breadcrumb_html .= '<li'. $li_class . '><a href="' . get_category_link( $ancestor ) . '">' . get_cat_name( $ancestor ) . '</a></li>';
				}
			}

			$breadcrumb_html .= current_crumb_tag( get_category_link( $cat->term_id ), single_cat_title( '', false ) );

		} elseif ( is_day() ) {
			$breadcrumb_html .= '<li'. $li_class . '><a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '年</a></li>';
			$breadcrumb_html .= '<li'. $li_class . '><a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time( 'F' ) . '</a></li>';
			$breadcrumb_html .= current_crumb_tag( get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) ), get_the_time( 'd' ) . '日' );

		} elseif ( is_month() ) {
			$breadcrumb_html .= '<li'. $li_class . '><a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '年</a></li>';
			$breadcrumb_html .= current_crumb_tag( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ), get_the_time( 'F' ) );

		} elseif ( is_year() ) {
			$breadcrumb_html .= current_crumb_tag( get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) . '年' );

		} elseif ( is_single() && !is_attachment() ) {
			$single = get_queried_object();

			if ( get_post_type() == 'post' ) {
				if ( get_option( 'page_for_posts' ) ) {
					$breadcrumb_html .= '<li'. $li_class . '><a href="' . get_page_link( get_option( 'page_for_posts' ) ) . '">' . get_the_title( get_option( 'page_for_posts' ) ) . '</a></li>';
				}

				$categories = get_the_category( $post->ID );
				$cat        = $categories[0];

				if ( $cat->parent != 0 ) {
					$ancestors = array_reverse( get_ancestors( $cat->cat_ID, 'category' ) );
					foreach ( $ancestors as $ancestor ) {
						$breadcrumb_html .= '<li'. $li_class . '><a href="' . get_category_link( $ancestor ) . '">' . get_cat_name( $ancestor ) . '</a></li>';
					}
				}

				$breadcrumb_html .= '<li'. $li_class . '><a href="' . get_category_link( $cat->cat_ID ) . '">' . get_cat_name( $cat->cat_ID ) . '</a></li>';
				$breadcrumb_html .= current_crumb_tag( get_the_permalink( $single->ID ), get_the_title( $single->ID ) );

			} else {
				$post_type_object = get_post_type_object( get_post_type() );
				$breadcrumb_html .= '<li'. $li_class . '><a href="' . get_post_type_archive_link( get_post_type() ) . '">' . $post_type_object->label . '</a></li>';
				$taxonomies =  get_object_taxonomies( get_post_type() );
				$category_term = '';

				foreach ( $taxonomies as $taxonomy ) {
					$taxonomy_obj = get_taxonomy( $taxonomy );
					if ( true == $taxonomy_obj->hierarchical ) {
						$category_term = $taxonomy_obj;
						break;
					}
				}

				if ( $category_term ) {
					$terms = get_the_terms( $post->ID, $category_term->name );

					if ( $terms ) {
						if ( ! $terms || is_wp_error( $terms ) )
							$terms = array();

						$terms = array_values( $terms );
						$term = $terms[0];

						if ( $term->parent != 0 ) {
							$ancestors = array_reverse( get_ancestors( $term->term_id, $term->taxonomy ) );
							foreach ( $ancestors as $ancestor ) {
								$breadcrumb_html .= '<li'. $li_class . '><a href="' . get_term_link( $ancestor, $term->taxonomy ) . '">' . get_term( $ancestor, $term->taxonomy )->name . '</a></li>';
							}
						}

						$breadcrumb_html .= '<li'. $li_class . '><a href="' . get_term_link( $term, $term->taxonomy ) . '">' . $term->name . '</a></li>';
					}
				}

				$breadcrumb_html .= current_crumb_tag( get_the_permalink( $single->ID ), get_the_title( $single->ID ) );
			}

		} elseif ( is_attachment() ) {
			$attachment = get_queried_object();			
			$breadcrumb_html .= current_crumb_tag( get_the_permalink( $attachment->ID ), get_the_title( $attachment->ID ) );

		} elseif ( is_page() ) {
			$page = get_queried_object();

			if ( $post->post_parent ) {
				$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
				foreach ( $ancestors as $ancestor ) {
					$breadcrumb_html .= '<li'. $li_class . '><a href="' . get_permalink( $ancestor ) . '">' . get_the_title( $ancestor ) . '</a></li>';
				}
			}

			$breadcrumb_html .= current_crumb_tag( get_the_permalink( $page->ID ), get_the_title( $page->ID ) );

		} elseif ( is_tag() ) {
			$tag = get_queried_object();
			$breadcrumb_html .= current_crumb_tag( get_term_link( $tag->term_id, $tag->taxonomy ), single_tag_title( '', false ) );

		} elseif ( is_tax() ) {
			$taxonomy_name  = get_query_var( 'taxonomy' );
			$post_types = get_taxonomy( $taxonomy_name )->object_type;
			$breadcrumb_html .= '<li'. $li_class . '><a href="' . get_post_type_archive_link( $post_types[0] ) . '">' . get_post_type_object( $post_types[0] )->label . '</a></li>';
			$tax = get_queried_object();

			if ( $tax->parent != 0 ) {
				$ancestors = array_reverse( get_ancestors( $tax->term_id, $tax->taxonomy ) );
				foreach ( $ancestors as $ancestor ) {
					$breadcrumb_html .= '<li'. $li_class . '><a href="' . get_term_link( $ancestor, $tax->taxonomy ) . '">' . get_term( $ancestor, $tax->taxonomy )->name . '</a></li>';
				}
			}

			$breadcrumb_html .= current_crumb_tag( get_term_link( $tax->term_id, $tax->taxonomy ), single_tag_title( '', false ) );

		} elseif ( is_author() ) {
			$author = get_queried_object();
			$breadcrumb_html .= current_crumb_tag( get_author_posts_url( $author->ID ), get_the_author_meta( 'display_name' ) );

		} elseif ( is_404() ) {
			$breadcrumb_html .= current_crumb_tag( null, 'Hello! My Name Is 404' );

		} elseif ( is_post_type_archive( get_post_type() ) ) {
			if ( false == get_post_type() ) {
				$post_type_obj = get_queried_object();
				$breadcrumb_html .= current_crumb_tag( $post_type_obj->name, $post_type_obj->label );

			} else {
				$post_type_obj = get_post_type_object( get_post_type() );
				$breadcrumb_html .= current_crumb_tag( get_post_type_archive_link( get_post_type() ), $post_type_obj->label );
			}

		} else {
			$breadcrumb_html .= current_crumb_tag( site_url(), wp_get_document_title() );
		}
		// パンくずエンド
		if ( $args->crumb_tag ) {
			$crumb_tag_allowed_tags = apply_filters( 'crumb_tag_allowed_tags', array( 'ul', 'ol' ) );

			if ( in_array( $args->crumb_tag, $crumb_tag_allowed_tags ) ) {
				$breadcrumb_html .= '</' . $args->crumb_tag . '>';
			}

		} else {
			$breadcrumb_html .= '</' . $defaults['crumb_tag'] . '>';
		}

		// コンテナエンド
		if ( $args->container ) {
			$breadcrumb_html .= '</' . $args->container . '>';
		}

		if ( $args->echo ) {
			echo $breadcrumb_html;

		} else {
			return $breadcrumb_html;
		}
	}
}
