<?php
////////////////////////////////////////////////////////
//クローラーのアクセス判別
////////////////////////////////////////////////////////
function is_bot() {
	$ua = $_SERVER['HTTP_USER_AGENT'];
	$bot = array(
	'Googlebot',
    'Yahoo! Slurp',
    'Mediapartners-Google',
    'msnbot',
    'bingbot',
    'MJ12bot',
    'Ezooms',
    'pirst; MSIE 8.0;',
    'Google Web Preview',
    'ia_archiver',
    'Sogou web spider',
    'Googlebot-Mobile',
    'AhrefsBot',
    'YandexBot',
    'Purebot',
    'Baiduspider',
    'UnwindFetchor',
    'TweetmemeBot',
    'MetaURI',
    'PaperLiBot',
    'Showyoubot',
    'JS-Kit',
    'PostRank',
    'Crowsnest',
    'PycURL',
    'bitlybot',
    'Hatena',
    'facebookexternalhit'
	);

	foreach( $bot as $bot ) {
		if (stripos( $ua, $bot ) !== false){
			return true;
		}
	}
	return false;
}
