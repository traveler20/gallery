<?php
////////////////////////////////////////////////////////
// htaccess設定用ファイル
////////////////////////////////////////////////////////

function fit_htaccess_contents($rules){
  $cache = '';
  $gzip  = '';

  if ( get_option('fit_seoHta_cache')) {
    $cache =<<<EOD

# BEGIN ブラウザキャッシュ
<IfModule mod_headers.c>
  <ifModule mod_expires.c>
    ExpiresActive On

    # キャッシュ初期化
    ExpiresDefault "access plus 1 month"

    # CSS
    ExpiresByType text/css                              "access plus 1 year"

    # RSS
    ExpiresByType application/atom+xml                  "access plus 1 hour"
    ExpiresByType application/rdf+xml                   "access plus 1 hour"
    ExpiresByType application/rss+xml                   "access plus 1 hour"

    # データはキャッシュさせない
    ExpiresByType application/json                      "access plus 0 seconds"
    ExpiresByType application/ld+json                   "access plus 0 seconds"
    ExpiresByType application/schema+json               "access plus 0 seconds"
    ExpiresByType application/vnd.geo+json              "access plus 0 seconds"
    ExpiresByType application/xml                       "access plus 0 seconds"
    ExpiresByType text/xml                              "access plus 0 seconds"

    # Favicon
    ExpiresByType image/vnd.microsoft.icon              "access plus 1 week"
    ExpiresByType image/x-icon                          "access plus 1 week"

    # HTML
    ExpiresByType text/html                             "access plus 0 seconds"

    # JavaScript
    ExpiresByType application/javascript                "access plus 1 month"
    ExpiresByType application/x-javascript              "access plus 1 month"
    ExpiresByType text/javascript                       "access plus 1 month"
    ExpiresByType text/js                               "access plus 1 month"

    # マニフェスト
    ExpiresByType application/manifest+json             "access plus 1 week"
    ExpiresByType application/x-web-app-manifest+json   "access plus 0 seconds"
    ExpiresByType text/cache-manifest                   "access plus 0 seconds"

    # 画像や動画
    ExpiresByType audio/ogg                             "access plus 1 month"
    ExpiresByType image/bmp                             "access plus 1 month"
    ExpiresByType image/gif                             "access plus 1 month"
    ExpiresByType image/jpg                             "access plus 1 month"
    ExpiresByType image/jpeg                            "access plus 1 month"
    ExpiresByType image/png                             "access plus 1 month"
    ExpiresByType image/svg+xml                         "access plus 1 month"
    ExpiresByType image/webp                            "access plus 1 month"
    ExpiresByType video/mp4                             "access plus 1 month"
    ExpiresByType video/ogg                             "access plus 1 month"
    ExpiresByType video/webm                            "access plus 1 month"

    # Webフォント
    # Embedded OpenType (EOT)
    ExpiresByType application/vnd.ms-fontobject         "access plus 1 month"
    ExpiresByType font/eot                              "access plus 1 month"

    # OpenType
    ExpiresByType font/opentype                         "access plus 1 month"

    # TrueType
    ExpiresByType application/x-font-ttf                "access plus 1 month"

    # Web Open Font Format (WOFF) 1.0
    ExpiresByType application/font-woff                 "access plus 1 month"
    ExpiresByType application/x-font-woff               "access plus 1 month"
    ExpiresByType font/woff                             "access plus 1 month"

    # Web Open Font Format (WOFF) 2.0
    ExpiresByType application/font-woff2                "access plus 1 month"

    # Other
    ExpiresByType text/x-cross-domain-policy            "access plus 1 week"

  </IfModule>
</IfModule>
# END ブラウザキャッシュ

EOD;
  }
  if ( get_option('fit_seoHta_gzip')) {
    $gzip =<<<EOD

# BEGIN Gzip圧縮
<IfModule mod_deflate.c>
  SetOutputFilter DEFLATE

  # Mozilla4系などの古いブラウザで無効、しかしMSIEは除外
  BrowserMatch ^Mozilla/4 gzip-only-text/html
  BrowserMatch ^Mozilla/4\.0[678] no-gzip
  BrowserMatch \bMSI[E] !no-gzip !gzip-only-text/html

  # gifやjpg、pngなど圧縮済みのコンテンツは再圧縮しない
  SetEnvIfNoCase Request_URI \.(?:gif|jpe?g|png|ico)$ no-gzip dont-vary
  SetEnvIfNoCase Request_URI _\.utxt$ no-gzip
  #DeflateCompressionLevel 4

  # 有効な圧縮
  AddOutputFilterByType DEFLATE text/plain
  AddOutputFilterByType DEFLATE text/html
  AddOutputFilterByType DEFLATE text/xml
  AddOutputFilterByType DEFLATE text/css
  AddOutputFilterByType DEFLATE text/javascript
  AddOutputFilterByType DEFLATE application/xhtml+xml
  AddOutputFilterByType DEFLATE application/xml
  AddOutputFilterByType DEFLATE application/rss+xml
  AddOutputFilterByType DEFLATE application/atom_xml
  AddOutputFilterByType DEFLATE application/javascript
  AddOutputFilterByType DEFLATE application/x-javascript
  AddOutputFilterByType DEFLATE application/x-httpd-php
  AddOutputFilterByType DEFLATE application/x-font
  AddOutputFilterByType DEFLATE application/x-font-opentype
  AddOutputFilterByType DEFLATE application/x-font-otf
  AddOutputFilterByType DEFLATE application/x-font-truetype
  AddOutputFilterByType DEFLATE application/x-font-ttf
</IfModule>
# END Gzip圧縮

EOD;
  }
  return $rules.$cache.$gzip;
}
add_filter('mod_rewrite_rules', 'fit_htaccess_contents');
