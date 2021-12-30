<?php
////////////////////////////////////////////////////////
// ウィジェットが出力設定カスタマイズ
////////////////////////////////////////////////////////

// カテゴリ・アーカイブの投稿数をaタグの中に
function fit_list_categories_archives( $output ) {
    $output = str_replace("&nbsp;", " ", $output);
    $output = preg_replace('/<\/a> \(([0-9]*)\)/', ' <span class="widgetCount">${1}</span></a>', $output);
    return $output;
}
add_filter( 'wp_list_categories', 'fit_list_categories_archives', 10, 2 );
add_filter( 'get_archives_link', 'fit_list_categories_archives', 10, 2 );
