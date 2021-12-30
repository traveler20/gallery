<?php
/**
 * @package snow-monkey
 * @author inc2734
 * @license GPL-2.0+
 * @version 12.0.0
 */

if ( ! has_nav_menu( 'follow-box' ) ) {
	return;
}
?>

<nav class="p-follow-box-nav" role="navigation">
	<div class="p-follow-box-nav__inner">
		<?php
		wp_nav_menu(
			[
				'theme_location' => 'follow-box',
				'container'      => false,
				'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'menu_class'     => 'c-navbar',
				'depth'          => 1,
				'link_before'    => '<span class="screen-reader-text">',
				'link_after'     => '</span>',
				'walker'         => new \Inc2734\WP_Basis\App\Walker\Navbar(),
			]
		);
		?>
	</div>
</nav>
