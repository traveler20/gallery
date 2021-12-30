<?php
/**
 * @package inc2734/wp-plugin-view-controller
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Plugin_View_Controller;

use Inc2734\WP_Plugin_View_Controller\App\Model\Variable;

class Bootstrap {

	/**
	 * Prefix of hooks
	 *
	 * @var string
	 */
	protected $prefix = '';

	/**
	 * Default template root path
	 *
	 * @var string
	 */
	protected $path = '';

	/**
	 * @param array $args Argments.
	 *  - string $prefix Prefix of hooks.
	 *  - string $path   Default template root path.
	 */
	public function __construct( array $args = [] ) {
		$args = shortcode_atts(
			[
				'prefix' => 'inc2734_wp_plugin_view_controller_',
				'path'   => untrailingslashit( __DIR__ ) . '/templates',
			],
			$args
		);

		$this->prefix = $args['prefix'];
		$this->path   = $args['path'];
	}

	/**
	 * Render template.
	 *
	 * @param string $slug The slug name for the generic template.
	 * @param string $name The name of the specialised template.
	 * @param array  $vars Additional arguments passed to the template.
	 */
	public function render( $slug, $name = null, $vars = [] ) {
		$args = apply_filters(
			$this->prefix . 'view_args',
			[
				'slug' => $slug,
				'name' => $name,
				'vars' => $vars,
			]
		);

		do_action( $this->prefix . 'view_pre_render', $args );

		$html = apply_filters(
			$this->prefix . 'view_render_definition',
			null,
			$args['slug'],
			$args['name'],
			$args['vars']
		);

		if ( is_null( $html ) ) {
			$action_with_name = $this->prefix . 'view_' . $args['slug'] . '-' . $args['name'];
			$action           = $this->prefix . 'view_' . $args['slug'];

			if ( $args['name'] && has_action( $action_with_name ) ) {
				ob_start();
				// @deprecated
				do_action( $action_with_name, $args['vars'] );
				$html = ob_get_clean();
			} elseif ( has_action( $action ) ) {
				ob_start();
				// @deprecated
				do_action( $action, $args['name'], $args['vars'] );
				$html = ob_get_clean();
			}
		}

		if ( is_null( $html ) ) {
			$this->_init_template_args( $args['vars'] );

			$templates = $this->_get_template_part_slugs( $args['slug'], $args['name'] );
			ob_start();
			$this->_locate_template( $templates, $args['vars'] );
			$html = ob_get_clean();

			$this->_reset_template_args();
		}

		if ( $this->_enable_debug_mode() ) {
			$this->_debug_comment( $args, 'Start : ' );
		}

		$html = apply_filters(
			$this->prefix . 'view_render',
			$html,
			$args['slug'],
			$args['name'],
			$args['vars']
		);

		echo $html; // xss ok.

		if ( $this->_enable_debug_mode() ) {
			$this->_debug_comment( $args, 'End : ' );
		}

		do_action( $this->prefix . 'view_post_render', $args );
	}

	/**
	 * Initialize template args.
	 *
	 * @param array $vars Additional arguments passed to the template.
	 */
	protected function _init_template_args( $vars ) {
		global $wp_version, $wp_query;

		set_query_var( '_wp_plugin_view_controller_backup_query_vars', $wp_query->query_vars );

		if ( version_compare( $wp_version, '5.5' ) < 0 ) {
			$vars['args'] = $vars;
		}

		foreach ( $vars as $var => $value ) {
			if ( null === get_query_var( $var, null ) ) {
				set_query_var( $var, $value );
			}
		}
	}

	/**
	 * Reset template args.
	 */
	protected function _reset_template_args() {
		global $wp_query;

		$backup_query_vars    = get_query_var( '_wp_plugin_view_controller_backup_query_vars' );
		$backup_query_vars    = is_array( $backup_query_vars ) ? $backup_query_vars : [];
		$wp_query->query_vars = $backup_query_vars;
	}

	/**
	 * Return candidate file names of the root template part.
	 *
	 * @param string $slug The slug name for the generic template.
	 * @param string $name The name of the specialised template.
	 * @param array  $vars Additional arguments passed to the template.
	 * @return array
	 */
	protected function _get_template_part_slugs( $slug, $name = null, $vars = [] ) {
		$hierarchy = apply_filters(
			$this->prefix . 'view_hierarchy',
			[ $this->path ],
			$slug,
			$name,
			$vars
		);
		$hierarchy = array_unique( $hierarchy );

		$templates = [];
		foreach ( $hierarchy as $root ) {
			if ( $name ) {
				$templates[] = trailingslashit( $root ) . $slug . '-' . $name . '.php';
			}
			$templates[] = trailingslashit( $root ) . $slug . '.php';
		}

		return $templates;
	}

	/**
	 * Add template_part_root_hierarchy check to locate_template().
	 *
	 * @see https://developer.wordpress.org/reference/functions/locate_template/
	 *
	 * @param string|array $templates Template file(s) to search for, in order.
	 * @param array        $vars Additional arguments passed to the template.
	 * @return string
	 */
	protected function _locate_template( $templates, $vars = [] ) {
		$located = '';

		foreach ( (array) $templates as $template ) {
			if ( ! $template ) {
				continue;
			} elseif ( file_exists( $template ) ) {
				$located = $template;
				break;
			}
		}

		if ( $located ) {
			load_template( $located, false, $vars );
		}

		return $located;
	}

	/**
	 * Return true when enable debug mode.
	 *
	 * @return boolean
	 */
	protected function _enable_debug_mode() {
		if ( ! defined( 'WP_DEBUG' ) || ! WP_DEBUG ) {
			return;
		}

		if ( is_customize_preview() || is_admin() ) {
			return;
		}

		if ( function_exists( 'tests_add_filter' ) ) {
			return;
		}

		return true;
	}

	/**
	 * Print debug comment.
	 *
	 * @param array  $args   Argments.
	 * @param string $prefix Prefix of the message.
	 */
	public function _debug_comment( $args, $prefix = null ) {
		if ( ! $args['slug'] ) {
			return;
		}

		$slug  = $args['slug'];
		$slug .= $args['name'] ? '-' . $args['name'] : '';
		$slug  = str_replace(
			[ WP_PLUGIN_DIR, get_template_directory(), get_stylesheet_directory() ],
			'',
			$this->path
		) . $slug;
		printf( "\n" . '<!-- %1$s%2$s -->' . "\n", esc_html( $prefix ), esc_html( $slug ) );
	}
}
