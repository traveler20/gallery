<?php
////////////////////////////////////////////////////////
//PWA用JSONマニフェストの設定
////////////////////////////////////////////////////////

function fit_add_pwa() {
	$text    = get_bloginfo('name');
	$icon72  = get_template_directory_uri().'/img/pwa-72.png';
	$icon192 = get_template_directory_uri().'/img/pwa-192.png';
	$icon512 = get_template_directory_uri().'/img/pwa-512.png';
	if(get_option('fit_pwaFunction_text')){
		$text = get_option('fit_pwaFunction_text');
	}
	if(get_fit_pwa72()){
		$icon72 = get_fit_pwa72();
	}
	if(get_fit_pwa192()){
		$icon192 = get_fit_pwa192();
	}
	if(get_fit_pwa512()){
		$icon512 = get_fit_pwa512();
	}
	
	$date = '
	{
		"name": "'.get_bloginfo('name').'",
		"short_name": "'.$text.'",
		"description": "'.get_bloginfo('description').'",
		"start_url": "/",
		"display": "standalone",
		"theme_color": "#191919",
		"background_color": "#ffffff",
		"icons": [{
			"src": "'.$icon72.'",
			"sizes": "72x72",
			"type": "image/png"
		}, {
			"src": "'.$icon192.'",
			"sizes": "192x192",
			"type": "image/png"
		}, {
			"src": "'.$icon512.'",
			"sizes": "512x512",
			"type": "image/png"
		}]
	}
	';
	chmod(TEMPLATEPATH.'/js/manifest.json', 0755);
	file_put_contents(TEMPLATEPATH.'/js/manifest.json', $date);
}
add_action( 'customize_register', 'fit_add_pwa' );