<?php
//////////////////////////////////////////////////
//フィードにカスタム投稿を追加
//////////////////////////////////////////////////
function fit_feed_request($vars) {
  if ( isset( $vars['feed'] ) && !isset( $vars['post_type'] ) ) {
    $vars['post_type'] = array(
      'post',
      'custom',
    );
  }
  return $vars;
}
add_filter( 'request', 'fit_feed_request' );
