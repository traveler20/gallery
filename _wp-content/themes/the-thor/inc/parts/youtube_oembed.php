<?php
////////////////////////////////////////////////////////
// YouTube oEmbed DIVで囲む
////////////////////////////////////////////////////////
function fit_custom_youtube_oembed($code){
  if(strpos($code, 'youtu.be') !== false || strpos($code, 'youtube.com') !== false){
    $html = preg_replace("@src=(['\"])?([^'\">\s]*)@", "src=$1$2", $code);
    $html = preg_replace('/ width="\d+"/', '', $html);
    $html = preg_replace('/ height="\d+"/', '', $html);
    $html = '<div class="youtube">' . $html . '</div>';
    return $html;
  }
  return $code;
}

add_filter('embed_handler_html', 'fit_custom_youtube_oembed');
add_filter('embed_oembed_html', 'fit_custom_youtube_oembed');
