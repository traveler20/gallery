<?php
////////////////////////////////////////////////////////
//AMP専用投稿コンテンツをAMPページ用にコンバート
////////////////////////////////////////////////////////
function convert_content_amp($the_content){
	// 通常ページではコンテンツを置換しない
	if (isset($_GET["type"]) && $_GET['type'] == 'AMP' && is_single() && get_option('fit_ampFunction_switch') == 'on' && get_post_meta(get_the_ID(), 'amp_hide', true) != '1') {
		// Twitterをamp-twitterに置換する
		$pattern = '/<blockquote class="twitter-tweet".*?>.+?<a href="https:\/\/twitter\.com\/.*?\/status\/(.*?)">.+?<\/blockquote>/is';
		$append = '<p><amp-twitter width=486 height=657 layout="responsive" data-tweetid="$1"></amp-twitter></p>';
		$the_content = preg_replace($pattern, $append, $the_content);

		// Instagramをamp-instagramに置換する
		$pattern = '/<blockquote class="instagram-media".+?"https:\/\/www\.instagram\.com\/p\/(.+?)\/".+?<\/blockquote>/is';
		$append = '<amp-instagram layout="responsive" data-shortcode="$1" width="400" height="400" ></amp-instagram>';
		$the_content = preg_replace($pattern, $append, $the_content);

		// YouTubeをamp-youtubeに置換する
		$pattern = '/<iframe[^>]+?src="https:\/\/www\.youtube\.com\/embed\/(.+?)(\?feature=oembed)?".*?><\/iframe>/is';
		$append = '<amp-youtube layout="responsive" data-videoid="$1" width="480" height="270"></amp-youtube>';
		$the_content = preg_replace($pattern, $append, $the_content);

		// iframeをamp-iframeに置換する
		$pattern = '/<iframe/i';
		$append = '<amp-iframe layout="responsive" sandbox="allow-scripts allow-same-origin allow-popups"';
		$the_content = preg_replace($pattern, $append, $the_content);
		$pattern = '/<\/iframe>/i';
		$append = '</amp-iframe>';
		$the_content = preg_replace($pattern, $append, $the_content);

		//C2A0文字コード（半角スペース）を通常の半角スペースに置換
		$the_content = str_replace('\xc2\xa0', ' ', $the_content);

		//style属性を取り除く
		$the_content = preg_replace('/ +style=["][^"]*?["]/i', '', $the_content);
		$the_content = preg_replace('/ +style=[\'][^\']*?[\']/i', '', $the_content);

		//onclick属性を取り除く
		$the_content = preg_replace('/ +onclick=["][^"]*?["]/i', '', $the_content);
		$the_content = preg_replace('/ +onclick=[\'][^\']*?[\']/i', '', $the_content);

		//fontタグを取り除く
		$the_content = preg_replace('/<font[^>]+?>/i', '', $the_content);
		$the_content = preg_replace('/<\/font>/i', '', $the_content);

		//画像タグをAMP用に置換
		$the_content = preg_replace('/<img (.*?)>/i', '<amp-img layout="responsive" $1></amp-img>', $the_content);
        $the_content = preg_replace('/<img (.*?) \/>/i', '<amp-img layout="responsive" $1></amp-img>', $the_content);

		//スクリプトを除去する
		$pattern = '/<script.+?<\/script>/is';
		$append = '';
		$the_content = preg_replace($pattern, $append, $the_content);

		return $the_content;
	}else {
		return $the_content;
	}
}
add_filter('the_content','convert_content_amp', 999999999);