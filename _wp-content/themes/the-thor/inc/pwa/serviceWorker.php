<?php
////////////////////////////////////////////////////////
//PWA用serviceWorkerの設定
////////////////////////////////////////////////////////

function fit_add_serviceWorker() {

	$version = date_i18n("ymdHis");
	$date = '
	const CACHE_NAME = "cache-v'.$version.'";
	const urlsToCache = [
	  "/",
	];
	const neverCacheUrls = [
	   "/wp-admin/",
	   "/wp-login/",
	   "preview=true",
	 ];

	 // 現在のURLがneverCacheUrlsリストにあるかどうかを確認する
	 function checkNeverCacheList(url) {
	   if ( this.match(url) ) {
	     return false;
	   }
	   return true;
	 }

	self.addEventListener("install", (event) => {
	  event.waitUntil(
	    caches.open(CACHE_NAME)
	    .then((cache) => {
	      console.log("Opened cache");

	      // 指定されたリソースをキャッシュに追加する
	      return cache.addAll(urlsToCache);
	    })
	  );
	});

	self.addEventListener("activate", (event) => {
	  var cacheWhitelist = [CACHE_NAME];

	  event.waitUntil(
	    caches.keys().then((cacheNames) => {
	      return Promise.all(
	        cacheNames.map((cacheName) => {
	          // ホワイトリストにないキャッシュ(古いキャッシュ)は削除する
	          if (cacheWhitelist.indexOf(cacheName) === -1) {
	            return caches.delete(cacheName);
	          }
	        })
	      );
	    })
	  );
	});

	self.addEventListener("fetch", (event) => {
	  if ( !neverCacheUrls.every(checkNeverCacheList, event.request.url) ) {
		  console.log( "non cache page" );
		  return;
		}
	  event.respondWith(
	    caches.match(event.request)
	    .then((response) => {
	      if (response) {
	        return response;
	      }

	      // 重要：リクエストを clone する。リクエストは Stream なので
	      // 一度しか処理できない。ここではキャッシュ用、fetch 用と2回
	      // 必要なので、リクエストは clone しないといけない
	      let fetchRequest = event.request.clone();

	      return fetch(fetchRequest)
	      .then((response) => {
	        if (!response || response.status !== 200 || response.type !== "basic") {
	          return response;
	        }

	        // 重要：レスポンスを clone する。レスポンスは Stream で
	        // ブラウザ用とキャッシュ用の2回必要。なので clone して
	        // 2つの Stream があるようにする
	        let responseToCache = response.clone();

	        caches.open(CACHE_NAME)
	        .then((cache) => {
	          cache.put(event.request, responseToCache);
	        });
	        return response;
	      });
	    })
	  );
	});
	';

	$filename = $_SERVER['DOCUMENT_ROOT'] . '/serviceWorker.js';
	if ( get_option( 'fit_pwaFunction_switch' ) == 'on' ) {
		file_put_contents( $filename, $date );
		// chmod($filename, 0755);
	} else {
		if ( file_exists( $filename ) ) {
			unlink( $filename );
		} 
	}
}
add_action( 'customize_register', 'fit_add_serviceWorker' );
add_action( 'transition_post_status', 'fit_add_serviceWorker' );
add_action( 'wp_login', 'fit_add_serviceWorker' );
add_action( 'wp_logout', 'fit_add_serviceWorker' );
