<?php
////////////////////////////////////////////////////////
// img非同期読み込み
////////////////////////////////////////////////////////

//画像タグに遅延読み込み用の属性などを追加
function add_image_placeholders( $content ) {
  //フィード・プレビュー・モバイル・ボットで遅延させない
  global $is_IE;
  if( is_feed() || is_preview() || is_mobile() || is_admin() || $is_IE ) {
    return $content;
	}
  //既に適用させているところは処理しない
  if ( strpos( $content, 'data-layzr' ) !== false ){
    return $content;
	}

  //画像正規表現で置換
	if(get_option('fit_seoImg_lazy')){
		$content =
    preg_replace('#<img([^>]+?)src=[\'"]?([^\'"\s>]+)[\'"]?([^>]*)>#',//IMGタグの正規表現（置換する項目）
    sprintf( '<img${1}src="%s" data-layzr="${2}"${3}>', get_template_directory_uri().'/img/dummy.gif' ),//置換するIMGタグ（置換する内容）
    $content);//投稿本文（置換する場所）
	}
  return $content;
}
add_filter( 'the_content', 'add_image_placeholders', 9 );
add_filter( 'post_thumbnail_html', 'add_image_placeholders', 9 );



//「src」の表記分岐　実際に表示させる画像
function fit_correct_src() {
	//img遅延読み込みがONのとき
	if(get_option('fit_seoImg_lazy')){
    global $is_IE;
    if( is_feed() || is_preview() || is_mobile() || is_admin() || $is_IE ) {
        	return 'src';
		}else{
			return 'data-layzr';
		}
	}
	return 'src';
}


//mg遅延読み込みがONのときにダミー画像を表示
function fit_dummy_src() {
	//img遅延読み込みがONのとき
	if(get_option('fit_seoImg_lazy')){
    	if( is_feed() || is_preview() || is_mobile() ) {
        	return '';
		}else{
			return 'src="'.get_template_directory_uri().'/img/dummy.gif"';
		}
	}
	return '';
}
