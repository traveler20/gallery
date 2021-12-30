<!--l-sidebar-->
<div class="l-sidebar<?php if (get_option('fit_conSide_frame') && get_option('fit_conSide_frame') != 'off' ):?> <?php echo get_option('fit_conSide_frame')?><?php endif; ?>">	
	
<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
  <?php dynamic_sidebar( 'sidebar' ); ?>
<?php endif; ?>

<?php if ( is_active_sidebar( 'sidebar-sticky' ) ) : ?>
  <div class="widgetSticky">
  <?php dynamic_sidebar( 'sidebar-sticky' ); ?>
  </div>
<?php endif; ?>
	
</div>
<!--/l-sidebar-->

