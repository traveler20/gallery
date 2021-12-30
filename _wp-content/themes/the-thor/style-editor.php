<?php
  include_once(dirname( __FILE__ ) . '../../../../wp-load.php');
  //include_once(ABSPATH.'wp-load.php');
  header('Content-Type: text/css; charset=utf-8');
?>
@charset "UTF-8";

/*リセット
/************************************************************/
html,body,p,ol,ul,li,dl,dt,dd,blockquote,figure,fieldset,legend,textarea,pre,iframe,hr,h1,h2,h3,h4,h5,h6{
	margin:0;
	padding:0;
}
h1,h2,h3,h4,h5,h6{font-size:100%;}
ol,ul,li,dl{list-style-position: inside;}
button,input,select,textarea{margin:0;}
html{
	box-sizing:border-box;
	line-height:1;
	font-size: 62.5%;
}
*,*:before,*:after{box-sizing:inherit;}
img,embed,iframe,object,audio,video{max-width:100%;}
iframe{border:0;}
table{
	border-collapse:collapse;
	border-spacing:0;
}
td,th{
	padding:0;
	text-align:left;
}
hr{
	height: 0;
	border: 0;
}


/*ベース
/************************************************************/
body {
	width:100%;
	font-family: "Lato", "游ゴシック体", "Yu Gothic", "YuGothic", "ヒラギノ角ゴシック Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", "ＭＳ Ｐゴシック", "MS PGothic", "sans-serif";
	font-size: 1.4rem;
	font-weight:500;
	background:#F2F2F2;
	color:#191919;
}

/*-----管理画面投稿エディタ専用-----*/
body.mce-content-body{
	background:#FFF;
	padding:25px!important;
	margin:0!important;
}

button, input, select, textarea{
	font-family:inherit;
	font-weight:inherit;
	font-size:  inherit;
}
a{
	color:inherit;
	text-decoration:none;
}



/*アイコン
/************************************************************/

@font-face {
	font-family: "icomoon";
	src:url("fonts/icomoon.eot?cyzug3");
	src:url("fonts/icomoon.eot?cyzug3#iefix") format("embedded-opentype"),
		url("fonts/icomoon.ttf?cyzug3") format("truetype"),
		url("fonts/icomoon.woff?cyzug3") format("woff"),
		url("fonts/icomoon.svg?cyzug3#icomoon") format("svg");
	font-weight: normal;
	font-style: normal;
}

[class^="icon-"]:before, [class*=" icon-"]:before,
[class^="icon-"]:after, [class*=" icon-"]:after {
	font-family: "icomoon",
				 "Lato",
				 "游ゴシック体",
				 "Yu Gothic",
				 "YuGothic",
				 "ヒラギノ角ゴシック Pro",
				 "Hiragino Kaku Gothic Pro",
				 "メイリオ",
				 "Meiryo",
				 "ＭＳ Ｐゴシック",
				 "MS PGothic",
				 "sans-serif";
	speak: none;
	font-style: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}

.icon-new:before{content: "\e900";}
.icon-feedly:before{content: "\e901";}
.icon-hatenabookmark2:before{content: "\e902";}
.icon-pocket:before{content: "\e903";}
.icon-hatenabookmark:before{content: "\e904";}
.icon-home3:before{content: "\e905";}
.icon-home2:before{content: "\e906";}
.icon-search:before{content: "\e907";}
.icon-home:before{content: "\e908";}
.icon-office:before{content: "\e909";}
.icon-newspaper:before{content: "\e90a";}
.icon-line:before{content: "\e90b";}
.icon-pencil:before{content: "\e90c";}
.icon-pencil2:before{content: "\e90d";}
.icon-quill:before{content: "\e90e";}
.icon-close:before{content: "\e90f";}
.icon-menu:before{content: "\e910";}
.icon-pen:before{content: "\e911";}
.icon-blog:before{content: "\e912";}
.icon-eyedropper:before{content: "\e913";}
.icon-droplet:before{content: "\e914";}
.icon-paint-format:before{content: "\e915";}
.icon-image:before{content: "\e916";}
.icon-images:before{content: "\e917";}
.icon-camera:before{content: "\e918";}
.icon-headphones:before{content: "\e919";}
.icon-music:before{content: "\e91a";}
.icon-play:before{content: "\e91b";}
.icon-film:before{content: "\e91c";}
.icon-video-camera:before{content: "\e91d";}
.icon-dice:before{content: "\e91e";}
.icon-pacman:before{content: "\e91f";}
.icon-spades:before{content: "\e920";}
.icon-clubs:before{content: "\e921";}
.icon-diamonds:before{content: "\e922";}
.icon-bullhorn:before{content: "\e923";}
.icon-connection:before{content: "\e924";}
.icon-podcast:before{content: "\e925";}
.icon-feed:before{content: "\e926";}
.icon-mic:before{content: "\e927";}
.icon-book:before{content: "\e928";}
.icon-books:before{content: "\e929";}
.icon-library:before{content: "\e92a";}
.icon-file-text:before{content: "\e92b";}
.icon-profile:before{content: "\e92c";}
.icon-file-empty:before{content: "\e92d";}
.icon-files-empty:before{content: "\e92e";}
.icon-file-text2:before{content: "\e92f";}
.icon-file-picture:before{content: "\e930";}
.icon-file-music:before{content: "\e931";}
.icon-file-play:before{content: "\e932";}
.icon-file-video:before{content: "\e933";}
.icon-file-zip:before{content: "\e934";}
.icon-copy:before{content: "\e935";}
.icon-paste:before{content: "\e936";}
.icon-stack:before{content: "\e937";}
.icon-folder:before{content: "\e938";}
.icon-folder-open:before{content: "\e939";}
.icon-folder-plus:before{content: "\e93a";}
.icon-folder-minus:before{content: "\e93b";}
.icon-folder-download:before{content: "\e93c";}
.icon-folder-upload:before{content: "\e93d";}
.icon-tag:before{content: "\e93e";}
.icon-price-tags:before{content: "\e93f";}
.icon-barcode:before{content: "\e940";}
.icon-qrcode:before{content: "\e941";}
.icon-ticket:before{content: "\e942";}
.icon-cart:before{content: "\e943";}
.icon-coin-dollar:before{content: "\e944";}
.icon-coin-euro:before{content: "\e945";}
.icon-coin-pound:before{content: "\e946";}
.icon-coin-yen:before{content: "\e947";}
.icon-credit-card:before{content: "\e948";}
.icon-calculator:before{content: "\e949";}
.icon-lifebuoy:before{content: "\e94a";}
.icon-phone:before{content: "\e94b";}
.icon-phone-hang-up:before{content: "\e94c";}
.icon-address-book:before{content: "\e94d";}
.icon-mail5:before{content: "\e94e";}
.icon-pushpin:before{content: "\e94f";}
.icon-location:before{content: "\e950";}
.icon-location2:before{content: "\e951";}
.icon-compass:before{content: "\e952";}
.icon-compass2:before{content: "\e953";}
.icon-map:before{content: "\e954";}
.icon-map2:before{content: "\e955";}
.icon-update:before{content: "\e956";}
.icon-clock:before{content: "\e957";}
.icon-clock2:before{content: "\e958";}
.icon-alarm:before{content: "\e959";}
.icon-bell:before{content: "\e95a";}
.icon-stopwatch:before{content: "\e95b";}
.icon-calendar:before{content: "\e95c";}
.icon-printer:before{content: "\e95d";}
.icon-keyboard:before{content: "\e95e";}
.icon-display:before{content: "\e95f";}
.icon-laptop:before{content: "\e960";}
.icon-mobile:before{content: "\e961";}
.icon-mobile2:before{content: "\e962";}
.icon-tablet:before{content: "\e963";}
.icon-tv:before{content: "\e964";}
.icon-drawer:before{content: "\e965";}
.icon-drawer2:before{content: "\e966";}
.icon-box-add:before{content: "\e967";}
.icon-box-remove:before{content: "\e968";}
.icon-download:before{content: "\e969";}
.icon-upload:before{content: "\e96a";}
.icon-floppy-disk:before{content: "\e96b";}
.icon-drive:before{content: "\e96c";}
.icon-database:before{content: "\e96d";}
.icon-undo:before{content: "\e96e";}
.icon-redo:before{content: "\e96f";}
.icon-undo2:before{content: "\e970";}
.icon-redo2:before{content: "\e971";}
.icon-forward:before{content: "\e972";}
.icon-reply:before{content: "\e973";}
.icon-bubble:before{content: "\e974";}
.icon-bubbles:before{content: "\e975";}
.icon-bubbles2:before{content: "\e976";}
.icon-view_card:before{content: "\e977";}
.icon-bubbles3:before{content: "\e978";}
.icon-bubbles4:before{content: "\e979";}
.icon-user:before{content: "\e97a";}
.icon-users:before{content: "\e97b";}
.icon-user-plus:before{content: "\e97c";}
.icon-user-minus:before{content: "\e97d";}
.icon-user-check:before{content: "\e97e";}
.icon-user-tie:before{content: "\e97f";}
.icon-hour-glass:before{content: "\e980";}
.icon-spinner:before{content: "\e981";}
.icon-spinner2:before{content: "\e982";}
.icon-spinner3:before{content: "\e983";}
.icon-spinner4:before{content: "\e984";}
.icon-spinner5:before{content: "\e985";}
.icon-spinner6:before{content: "\e986";}
.icon-spinner7:before{content: "\e987";}
.icon-spinner8:before{content: "\e988";}
.icon-spinner9:before{content: "\e989";}
.icon-spinner10:before{content: "\e98a";}
.icon-spinner11:before{content: "\e98b";}
.icon-binoculars:before{content: "\e98c";}
.icon-search2:before{content: "\e98d";}
.icon-zoom-in:before{content: "\e98e";}
.icon-zoom-out:before{content: "\e98f";}
.icon-enlarge:before{content: "\e990";}
.icon-shrink:before{content: "\e991";}
.icon-enlarge2:before{content: "\e992";}
.icon-shrink2:before{content: "\e993";}
.icon-key:before{content: "\e994";}
.icon-key2:before{content: "\e995";}
.icon-lock:before{content: "\e996";}
.icon-unlocked:before{content: "\e997";}
.icon-wrench:before{content: "\e998";}
.icon-equalizer:before{content: "\e999";}
.icon-equalizer2:before{content: "\e99a";}
.icon-cog:before{content: "\e99b";}
.icon-hammer:before{content: "\e99c";}
.icon-magic-wand:before{content: "\e99d";}
.icon-aid-kit:before{content: "\e99e";}
.icon-bug:before{content: "\e99f";}
.icon-pie-chart:before{content: "\e9a0";}
.icon-stats-dots:before{content: "\e9a1";}
.icon-stats-bars:before{content: "\e9a2";}
.icon-stats-bars2:before{content: "\e9a3";}
.icon-trophy:before{content: "\e9a4";}
.icon-gift:before{content: "\e9a5";}
.icon-glass:before{content: "\e9a6";}
.icon-glass2:before{content: "\e9a7";}
.icon-cup:before{content: "\e9a8";}
.icon-spoon-knife:before{content: "\e9a9";}
.icon-leaf:before{content: "\e9aa";}
.icon-rocket:before{content: "\e9ab";}
.icon-meter:before{content: "\e9ac";}
.icon-meter2:before{content: "\e9ad";}
.icon-hammer2:before{content: "\e9ae";}
.icon-fire:before{content: "\e9af";}
.icon-lab:before{content: "\e9b0";}
.icon-magnet:before{content: "\e9b1";}
.icon-bin:before{content: "\e9b2";}
.icon-bin2:before{content: "\e9b3";}
.icon-briefcase:before{content: "\e9b4";}
.icon-airplane:before{content: "\e9b5";}
.icon-truck:before{content: "\e9b6";}
.icon-road:before{content: "\e9b7";}
.icon-accessibility:before{content: "\e9b8";}
.icon-target:before{content: "\e9b9";}
.icon-shield:before{content: "\e9ba";}
.icon-power:before{content: "\e9bb";}
.icon-switch:before{content: "\e9bc";}
.icon-power-cord:before{content: "\e9bd";}
.icon-clipboard:before{content: "\e9be";}
.icon-tree:before{content: "\e9bf";}
.icon-list-numbered:before{content: "\e9c0";}
.icon-list:before{content: "\e9c1";}
.icon-cloud:before{content: "\e9c2";}
.icon-cloud-download:before{content: "\e9c3";}
.icon-cloud-upload:before{content: "\e9c4";}
.icon-cloud-check:before{content: "\e9c5";}
.icon-download2:before{content: "\e9c6";}
.icon-upload2:before{content: "\e9c7";}
.icon-download3:before{content: "\e9c8";}
.icon-upload3:before{content: "\e9c9";}
.icon-sphere:before{content: "\e9ca";}
.icon-earth:before{content: "\e9cb";}
.icon-link:before{content: "\e9cc";}
.icon-flag:before{content: "\e9cd";}
.icon-attachment:before{content: "\e9ce";}
.icon-eye:before{content: "\e9cf";}
.icon-eye-plus:before{content: "\e9d0";}
.icon-eye-minus:before{content: "\e9d1";}
.icon-eye-blocked:before{content: "\e9d2";}
.icon-bookmark:before{content: "\e9d3";}
.icon-bookmarks:before{content: "\e9d4";}
.icon-sun:before{content: "\e9d5";}
.icon-contrast:before{content: "\e9d6";}
.icon-brightness-contrast:before{content: "\e9d7";}
.icon-star-empty:before{content: "\e9d8";}
.icon-star-half:before{content: "\e9d9";}
.icon-star-full:before{content: "\e9da";}
.icon-heart:before{content: "\e9db";}
.icon-heart-broken:before{content: "\e9dc";}
.icon-man:before{content: "\e9dd";}
.icon-woman:before{content: "\e9de";}
.icon-man-woman:before{content: "\e9df";}
.icon-happy:before{content: "\e9e0";}
.icon-happy2:before{content: "\e9e1";}
.icon-smile:before{content: "\e9e2";}
.icon-smile2:before{content: "\e9e3";}
.icon-tongue:before{content: "\e9e4";}
.icon-tongue2:before{content: "\e9e5";}
.icon-sad:before{content: "\e9e6";}
.icon-sad2:before{content: "\e9e7";}
.icon-wink:before{content: "\e9e8";}
.icon-wink2:before{content: "\e9e9";}
.icon-grin:before{content: "\e9ea";}
.icon-grin2:before{content: "\e9eb";}
.icon-cool:before{content: "\e9ec";}
.icon-cool2:before{content: "\e9ed";}
.icon-angry:before{content: "\e9ee";}
.icon-angry2:before{content: "\e9ef";}
.icon-evil:before{content: "\e9f0";}
.icon-evil2:before{content: "\e9f1";}
.icon-shocked:before{content: "\e9f2";}
.icon-shocked2:before{content: "\e9f3";}
.icon-baffled:before{content: "\e9f4";}
.icon-baffled2:before{content: "\e9f5";}
.icon-confused:before{content: "\e9f6";}
.icon-confused2:before{content: "\e9f7";}
.icon-quotation:before{content: "\e9f8";}
.icon-neutral:before{content: "\e9f9";}
.icon-neutral2:before{content: "\e9fa";}
.icon-hipster:before{content: "\e9fb";}
.icon-hipster2:before{content: "\e9fc";}
.icon-wondering:before{content: "\e9fd";}
.icon-wondering2:before{content: "\e9fe";}
.icon-sleepy:before{content: "\e9ff";}
.icon-sleepy2:before{content: "\ea00";}
.icon-frustrated:before{content: "\ea01";}
.icon-frustrated2:before{content: "\ea02";}
.icon-crying:before{content: "\ea03";}
.icon-crying2:before{content: "\ea04";}
.icon-point-up:before{content: "\ea05";}
.icon-point-right:before{content: "\ea06";}
.icon-point-down:before{content: "\ea07";}
.icon-point-left:before{content: "\ea08";}
.icon-warning:before{content: "\ea09";}
.icon-notification:before{content: "\ea0a";}
.icon-question:before{content: "\ea0b";}
.icon-plus:before{content: "\ea0c";}
.icon-minus:before{content: "\ea0d";}
.icon-info:before{content: "\ea0e";}
.icon-cancel-circle:before{content: "\ea0f";}
.icon-blocked:before{content: "\ea10";}
.icon-cross:before{content: "\ea11";}
.icon-checkmark:before{content: "\ea12";}
.icon-checkmark2:before{content: "\ea13";}
.icon-spell-check:before{content: "\ea14";}
.icon-enter:before{content: "\ea15";}
.icon-exit:before{content: "\ea16";}
.icon-play2:before{content: "\ea17";}
.icon-pause:before{content: "\ea18";}
.icon-stop:before{content: "\ea19";}
.icon-previous:before{content: "\ea1a";}
.icon-next:before{content: "\ea1b";}
.icon-backward:before{content: "\ea1c";}
.icon-forward2:before{content: "\ea1d";}
.icon-play3:before{content: "\ea1e";}
.icon-pause2:before{content: "\ea1f";}
.icon-stop2:before{content: "\ea20";}
.icon-backward2:before{content: "\ea21";}
.icon-forward3:before{content: "\ea22";}
.icon-first:before{content: "\ea23";}
.icon-last:before{content: "\ea24";}
.icon-previous2:before{content: "\ea25";}
.icon-next2:before{content: "\ea26";}
.icon-eject:before{content: "\ea27";}
.icon-volume-high:before{content: "\ea28";}
.icon-volume-medium:before{content: "\ea29";}
.icon-volume-low:before{content: "\ea2a";}
.icon-volume-mute:before{content: "\ea2b";}
.icon-volume-mute2:before{content: "\ea2c";}
.icon-volume-increase:before{content: "\ea2d";}
.icon-volume-decrease:before{content: "\ea2e";}
.icon-loop:before{content: "\ea2f";}
.icon-loop2:before{content: "\ea30";}
.icon-infinite:before{content: "\ea31";}
.icon-shuffle:before{content: "\ea32";}
.icon-arrow-up-left:before{content: "\ea33";}
.icon-arrow-up:before{content: "\ea34";}
.icon-arrow-up-right:before{content: "\ea35";}
.icon-arrow-right:before{content: "\ea36";}
.icon-arrow-down-right:before{content: "\ea37";}
.icon-arrow-down:before{content: "\ea38";}
.icon-arrow-down-left:before{content: "\ea39";}
.icon-arrow-left:before{content: "\ea3a";}
.icon-arrow-up-left2:before{content: "\ea3b";}
.icon-arrow-up2:before{content: "\ea3c";}
.icon-arrow-up-right2:before{content: "\ea3d";}
.icon-arrow-right2:before{content: "\ea3e";}
.icon-arrow-down-right2:before{content: "\ea3f";}
.icon-arrow-down2:before{content: "\ea40";}
.icon-arrow-down-left2:before{content: "\ea41";}
.icon-arrow-left2:before{content: "\ea42";}
.icon-circle-up:before{content: "\ea43";}
.icon-circle-right:before{content: "\ea44";}
.icon-circle-down:before{content: "\ea45";}
.icon-circle-left:before{content: "\ea46";}
.icon-tab:before{content: "\ea47";}
.icon-move-up:before{content: "\ea48";}
.icon-move-down:before{content: "\ea49";}
.icon-sort-alpha-asc:before{content: "\ea4a";}
.icon-sort-alpha-desc:before{content: "\ea4b";}
.icon-sort-numeric-asc:before{content: "\ea4c";}
.icon-sort-numberic-desc:before{content: "\ea4d";}
.icon-sort-amount-asc:before{content: "\ea4e";}
.icon-sort-amount-desc:before{content: "\ea4f";}
.icon-command:before{content: "\ea50";}
.icon-list2:before{content: "\ea51";}
.icon-view_normal:before{content: "\ea52";}
.icon-checkbox-checked:before{content: "\ea53";}
.icon-checkbox-unchecked:before{content: "\ea54";}
.icon-radio-checked:before{content: "\ea55";}
.icon-radio-checked2:before{content: "\ea56";}
.icon-radio-unchecked:before{content: "\ea57";}
.icon-crop:before{content: "\ea58";}
.icon-make-group:before{content: "\ea59";}
.icon-ungroup:before{content: "\ea5a";}
.icon-scissors:before{content: "\ea5b";}
.icon-filter:before{content: "\ea5c";}
.icon-font:before{content: "\ea5d";}
.icon-ligature:before{content: "\ea5e";}
.icon-ligature2:before{content: "\ea5f";}
.icon-text-height:before{content: "\ea60";}
.icon-text-width:before{content: "\ea61";}
.icon-font-size:before{content: "\ea62";}
.icon-bold:before{content: "\ea63";}
.icon-underline:before{content: "\ea64";}
.icon-italic:before{content: "\ea65";}
.icon-strikethrough:before{content: "\ea66";}
.icon-omega:before{content: "\ea67";}
.icon-sigma:before{content: "\ea68";}
.icon-page-break:before{content: "\ea69";}
.icon-superscript:before{content: "\ea6a";}
.icon-subscript:before{content: "\ea6b";}
.icon-superscript2:before{content: "\ea6c";}
.icon-subscript2:before{content: "\ea6d";}
.icon-text-color:before{content: "\ea6e";}
.icon-pagebreak:before{content: "\ea6f";}
.icon-clear-formatting:before{content: "\ea70";}
.icon-table:before{content: "\ea71";}
.icon-table2:before{content: "\ea72";}
.icon-insert-template:before{content: "\ea73";}
.icon-pilcrow:before{content: "\ea74";}
.icon-ltr:before{content: "\ea75";}
.icon-rtl:before{content: "\ea76";}
.icon-section:before{content: "\ea77";}
.icon-paragraph-left:before{content: "\ea78";}
.icon-paragraph-center:before{content: "\ea79";}
.icon-paragraph-right:before{content: "\ea7a";}
.icon-paragraph-justify:before{content: "\ea7b";}
.icon-indent-increase:before{content: "\ea7c";}
.icon-indent-decrease:before{content: "\ea7d";}
.icon-share:before{content: "\ea7e";}
.icon-new-tab:before{content: "\ea7f";}
.icon-embed:before{content: "\ea80";}
.icon-embed2:before{content: "\ea81";}
.icon-terminal:before{content: "\ea82";}
.icon-share2:before{content: "\ea83";}
.icon-view_wide:before{content: "\ea84";}
.icon-mail2:before{content: "\ea85";}
.icon-mail3:before{content: "\ea86";}
.icon-bubble2:before{content: "\ea87";}
.icon-amazon:before{content: "\ea88";}
.icon-google:before{content: "\ea89";}
.icon-google2:before{content: "\ea8a";}
.icon-cogs:before{content: "\ea8b";}
.icon-google-plus:before{content: "\ea8c";}
.icon-google-plus2:before{content: "\ea8d";}
.icon-menu2:before{content: "\ea8e";}
.icon-hangouts:before{content: "\ea8f";}
.icon-google-drive:before{content: "\ea90";}
.icon-facebook:before{content: "\ea91";}
.icon-facebook2:before{content: "\ea92";}
.icon-instagram:before{content: "\ea93";}
.icon-whatsapp:before{content: "\ea94";}
.icon-spotify:before{content: "\ea95";}
.icon-telegram:before{content: "\ea96";}
.icon-twitter:before{content: "\ea97";}
.icon-vine:before{content: "\ea98";}
.icon-vk:before{content: "\ea99";}
.icon-renren:before{content: "\ea9a";}
.icon-sina-weibo:before{content: "\ea9b";}
.icon-rss:before{content: "\ea9c";}
.icon-rss2:before{content: "\ea9d";}
.icon-youtube:before{content: "\ea9e";}
.icon-menu5:before{content: "\ea9f";}
.icon-twitch:before{content: "\eaa0";}
.icon-vimeo:before{content: "\eaa1";}
.icon-vimeo2:before{content: "\eaa2";}
.icon-lanyrd:before{content: "\eaa3";}
.icon-flickr:before{content: "\eaa4";}
.icon-flickr2:before{content: "\eaa5";}
.icon-flickr3:before{content: "\eaa6";}
.icon-flickr4:before{content: "\eaa7";}
.icon-dribbble:before{content: "\eaa8";}
.icon-behance:before{content: "\eaa9";}
.icon-behance2:before{content: "\eaaa";}
.icon-deviantart:before{content: "\eaab";}
.icon-500px:before{content: "\eaac";}
.icon-steam:before{content: "\eaad";}
.icon-steam2:before{content: "\eaae";}
.icon-dropbox:before{content: "\eaaf";}
.icon-onedrive:before{content: "\eab0";}
.icon-github:before{content: "\eab1";}
.icon-npm:before{content: "\eab2";}
.icon-basecamp:before{content: "\eab3";}
.icon-trello:before{content: "\eab4";}
.icon-wordpress:before{content: "\eab5";}
.icon-joomla:before{content: "\eab6";}
.icon-ello:before{content: "\eab7";}
.icon-blogger:before{content: "\eab8";}
.icon-blogger2:before{content: "\eab9";}
.icon-tumblr:before{content: "\eaba";}
.icon-tumblr2:before{content: "\eabb";}
.icon-yahoo:before{content: "\eabc";}
.icon-yahoo2:before{content: "\eabd";}
.icon-tux:before{content: "\eabe";}
.icon-appleinc:before{content: "\eabf";}
.icon-finder:before{content: "\eac0";}
.icon-android:before{content: "\eac1";}
.icon-windows:before{content: "\eac2";}
.icon-windows8:before{content: "\eac3";}
.icon-soundcloud:before{content: "\eac4";}
.icon-soundcloud2:before{content: "\eac5";}
.icon-skype:before{content: "\eac6";}
.icon-reddit:before{content: "\eac7";}
.icon-hackernews:before{content: "\eac8";}
.icon-wikipedia:before{content: "\eac9";}
.icon-linkedin2:before{content: "\eaca";}
.icon-linkedin:before{content: "\eacb";}
.icon-lastfm:before{content: "\eacc";}
.icon-lastfm2:before{content: "\eacd";}
.icon-delicious:before{content: "\eace";}
.icon-stumbleupon:before{content: "\eacf";}
.icon-stumbleupon2:before{content: "\ead0";}
.icon-stackoverflow:before{content: "\ead1";}
.icon-pinterest2:before{content: "\ead2";}
.icon-pinterest:before{content: "\ead3";}
.icon-xing:before{content: "\ead4";}
.icon-xing2:before{content: "\ead5";}
.icon-flattr:before{content: "\ead6";}
.icon-foursquare:before{content: "\ead7";}
.icon-yelp:before{content: "\ead8";}
.icon-paypal:before{content: "\ead9";}
.icon-chrome:before{content: "\eada";}
.icon-firefox:before{content: "\eadb";}
.icon-IE:before{content: "\eadc";}
.icon-edge:before{content: "\eadd";}
.icon-safari:before{content: "\eade";}
.icon-opera:before{content: "\eadf";}
.icon-file-pdf:before{content: "\eae0";}
.icon-file-openoffice:before{content: "\eae1";}
.icon-file-word:before{content: "\eae2";}
.icon-file-excel:before{content: "\eae3";}
.icon-libreoffice:before{content: "\eae4";}
.icon-html-five:before{content: "\eae5";}
.icon-html-five2:before{content: "\eae6";}
.icon-css3:before{content: "\eae7";}
.icon-git:before{content: "\eae8";}
.icon-codepen:before{content: "\eae9";}
.icon-menu3:before{content: "\eaea";}
.icon-menu4:before{content: "\eaeb";}
.icon-shift:before{content: "\eaec";}
.icon-ctrl:before{content: "\eaed";}
.icon-opt:before{content: "\eaee";}
.icon-mail:before{content: "\eaef";}
.icon-mail4:before{content: "\eaf0";}
.icon-quotation2:before{content: "\eaf1";}





/*個別ページパーツ
------------------------------------------------------------*/

/*-----個別ページ本文フレーム-----*/
.mce-content-body{
	position: relative;
	font-size:1.4rem;
	line-height:1.85;
}
.mce-content-body::after {
	content: "";
	display: block;
	clear: both;
}

/*-----リンク-----*/
.mce-content-body a{color:#63acb7;}
.mce-content-body a:hover{font-weight:bold;}

/*-----リンクカラーリセット-----*/
.mce-content-body .the__category a{color:#FFF;}
.mce-content-body .eyecatch__cat a{color:#FFF;}
.mce-content-body .heading a{color:#191919;}


/*-----IMG-----*/
.mce-content-body img{
	max-width:100%;
	height:auto;
	vertical-align: bottom;
}

/*-----IMG A8広告などの1px × 1px の画像処理-----*/
.mce-content-body img[width="1"],
.mce-content-body img[height="1"]{position: absolute;}

/*-----IMGサイズリセット-----*/
.mce-content-body .eyecatch__link img{height: 100%;}


/*-----サイトマップページリンクカラー-----*/
.mce-content-body .sitemap li a{ color:#191919}

/*-----共通ボタン-----*/
.btn{
	width:100%;
	line-height:1
}
.btn-left{text-align: left;}
.btn-center{text-align: center;}
.btn-right{text-align: right;}

/*ボタン本体*/
.mce-content-body .btn__link{
	position: relative;
	display: inline-block;
	cursor: pointer;
	transition: .15s;
}
.mce-content-body .btn__link::before{
	content: "";
	position: absolute;
	top: 0;
	bottom:0;
	right: 10px;
	width: 5px;
	height: 5px;
	margin: auto;
	border-top: 1px solid;
	border-right: 1px solid;
	transform: rotate(45deg);
}

/*ボタン：基本デザイン*/
.mce-content-body .btn__link-normal{
	font-size:1.2rem;
	padding: 10px 20px;
	border-radius: 5px;
	color: #a83f3f;
	border: 1px solid;
}
.mce-content-body .btn__link-normal:hover {
	color: #ffffff;
	background: #a83f3f;
	border: 1px solid;
	border-color:transparent;
	font-weight:normal;
}

/*ボタン：ビッグデザイン用*/
.mce-content-body .btn__link-primary{
	padding: 15px 40px;
	border-radius: 5px;
	background: #a83f3f;
	border:none;
	border-bottom: solid 3px rgba(0,0,0,0.25);
	font-size:1.4rem;
	font-weight:bold;
	color:#ffffff;
	overflow: hidden;
	line-height:normal;
}
.mce-content-body .btn__link-primary::before{
	border-top: 2px solid;
	border-right: 2px solid;
}
.mce-content-body .btn__link-primary::after {
	content: "";
	position: absolute;
	top: -50px;
	left: -100px;
	background: #fff;
	width: 50px;
	height: calc(100% + 100px);
	opacity: 0.1;
	transform: rotate(45deg);
	transition: .3s;
}
.mce-content-body .btn__link-primary:hover::after {left: calc(100% + 50px);}
.mce-content-body .btn__link-primary:hover {border-bottom: solid 3px rgba(0,0,0,0.25);}
.mce-content-body .btn__link-primary:active {
	transform: translateY(3px);
	border-bottom: solid 3px transparent;
}

/*ボタン：ミニデザイン用*/
.mce-content-body .btn__link-secondary{
	padding: 5px 25px  5px 15px;
	border-radius: 5px;
	background: #a83f3f;
	border:none;
	border-bottom: solid 3px rgba(0,0,0,0.25);
	font-size:1.2rem;
	font-weight:bold;
	color:#ffffff;
	overflow: hidden;
	line-height:normal;
}
.mce-content-body .btn__link-secondary:hover {border-bottom: solid 3px rgba(0,0,0,0.25);}
.mce-content-body .btn__link-secondary:active {
	transform: translateY(3px);
	border-bottom: solid 3px transparent;
}



/*-----段落-----*/
.mce-content-body p{margin-top:2rem;}
.mce-content-body p::after {
	content: "";
	display: block;
	clear: both;
}


/*-----ボックス-----*/
.mce-content-body div{margin-top:2rem;}
.mce-content-body div::after {
	content: "";
	display: block;
	clear: both;
}



/*-----カラム-----*/
.mce-content-body .column{
	display: flex;
	position: relative;
}
.mce-content-body .column__item{
	position:relative;
    flex: 1;
	padding:10px;
	margin-left:20px;
	margin-top:0;
	border:dashed 1px #d8d8d8;
}
.mce-content-body .column__item:first-child{margin-left:0}
.mce-content-body .column__item::before{
	position:absolute;
	content:"プレビュー時のみ点線表示";
	color:#d8d8d8;
	font-size:10px;
}
.mce-content-body .column-237 .column__item:first-child{flex: 3;}
.mce-content-body .column-237 .column__item:last-child {flex: 7;}
.mce-content-body .column-273 .column__item:first-child{flex: 7;}
.mce-content-body .column-273 .column__item:last-child {flex: 3;}

.mce-content-body .column-2pc37 .column__item:first-child{flex: 3;}
.mce-content-body .column-2pc37 .column__item:last-child {flex: 7;}
.mce-content-body .column-2pc73 .column__item:first-child{flex: 7;}
.mce-content-body .column-2pc73 .column__item:last-child {flex: 3;}




/*-----すべての見出し-----*/
.mce-content-body h2,
.mce-content-body h3,
.mce-content-body h4,
.mce-content-body h5{
	line-height:1.5;
	margin-top:4rem;
}
.mce-content-body h2{font-size:2.2rem;}
.mce-content-body h3{font-size:1.8rem;}
.mce-content-body h4{font-size:1.6rem;}
.mce-content-body h5{font-size:1.4rem;}
.mce-content-body h2 + h2, .mce-content-body h2 + h3, .mce-content-body h2 + h4, .mce-content-body h2 + h5,
.mce-content-body h3 + h2, .mce-content-body h3 + h3, .mce-content-body h3 + h4, .mce-content-body h3 + h5,
.mce-content-body h4 + h2, .mce-content-body h4 + h3, .mce-content-body h4 + h4, .mce-content-body h4 + h5,
.mce-content-body h5 + h2, .mce-content-body h5 + h3, .mce-content-body h5 + h4, .mce-content-body h5 + h5{margin-top:2rem;}

.mce-content-body h2 a,
.mce-content-body h3 a,
.mce-content-body h4 a,
.mce-content-body h5 a{ color:#191919;}


/*-----見出しのデザイン-----*/
/*下線/左線シリーズ1～*/
.partsH2-1 h2,
.partsH3-1 h3,
.partsH4-1 h4,
.partsH5-1 h5{
	padding-bottom: 10px;
	border-bottom: solid 4px #a83f3f;
}

.partsH2-2 h2,
.partsH3-2 h3,
.partsH4-2 h4,
.partsH5-2 h5{
	position: relative;
	padding-bottom: 16px;
}
.partsH2-2 h2::after,
.partsH3-2 h3::after,
.partsH4-2 h4::after,
.partsH5-2 h5::after{
	content: "";
	display:block;
	position: absolute;
	bottom: 0;
	width:100%;
	height: 6px;
	border-top: 2px solid #a83f3f;
	border-bottom: 1px solid #a83f3f;
}

.partsH2-3 h2,
.partsH3-3 h3,
.partsH4-3 h4,
.partsH5-3 h5{
	padding-bottom: 10px;
	border-bottom: dotted 1px #a83f3f;
}

.partsH2-4 h2,
.partsH3-4 h3,
.partsH4-4 h4,
.partsH5-4 h5{
	position: relative;
	padding-bottom: 14px;
	overflow: hidden;
}
.partsH2-4 h2::before,
.partsH3-4 h3::before,
.partsH4-4 h4::before,
.partsH5-4 h5::before{
	content: "";
	position: absolute;
	bottom: 0;
	width: 100%;
	border-bottom: 4px solid #a83f3f;
}
.partsH2-4 h2::after,
.partsH3-4 h3::after,
.partsH4-4 h4::after,
.partsH5-4 h5::after{
	content: "";
	position: absolute;
	bottom: 0;
	width: 100%;
	border-bottom: 4px solid #D8D8D8;
}

.partsH2-5 h2,
.partsH3-5 h3,
.partsH4-5 h4,
.partsH5-5 h5{
	background: linear-gradient(transparent 60%, #D8D8D8 60%);
}




.partsH2-6 h2,
.partsH3-6 h3,
.partsH4-6 h4,
.partsH5-6 h5{
	position: relative;
	padding-bottom: 14px;
	padding-right: 30px;
}
.partsH2-6 h2::before,
.partsH3-6 h3::before,
.partsH4-6 h4::before,
.partsH5-6 h5::before{
	content: "";
	position: absolute;
	bottom: -0;
	right: 0;
	width: 0;
	height: 0;
	border: none;
	border-right: solid 15px transparent;
	border-bottom: solid 15px #a83f3f;
}
.partsH2-6 h2::after,
.partsH3-6 h3::after,
.partsH4-6 h4::after,
.partsH5-6 h5::after{
	content: "";
	position: absolute;
	bottom: 0;
	right: 10px;
	width: 100%;
	border-bottom: solid 4px #a83f3f;
}




.partsH2-7 h2,
.partsH3-7 h3,
.partsH4-7 h4,
.partsH5-7 h5{
	position: relative;
	padding-bottom: 16px;
}
.partsH2-7 h2::after,
.partsH3-7 h3::after,
.partsH4-7 h4::after,
.partsH5-7 h5::after{
	content: "";
	position: absolute;
	left: 0;
	bottom: 0;
	width: 100%;
	height: 6px;
	background: repeating-linear-gradient(-45deg, #a83f3f, #a83f3f 2px, #fff 2px, #fff 4px);
}



.partsH2-8 h2,
.partsH3-8 h3,
.partsH4-8 h4,
.partsH5-8 h5{
	position: relative;
	padding-bottom: 14px;
}
.partsH2-8 h2::after,
.partsH3-8 h3::after,
.partsH4-8 h4::after,
.partsH5-8 h5::after{
	content: "";
	position: absolute;
	left: 0;
	bottom: 0;
	width: 100%;
	height: 4px;
	background: linear-gradient(to right, #a83f3f, #D8D8D8);
}



.partsH2-9 h2,
.partsH3-9 h3,
.partsH4-9 h4,
.partsH5-9 h5{
	position: relative;
	padding-bottom: 14px;
	text-align:center;
}
.partsH2-9 h2::after,
.partsH3-9 h3::after,
.partsH4-9 h4::after,
.partsH5-9 h5::after{
	content: "";
	position: absolute;
	bottom: 0;
	display: inline-block;
	width: 60px;
	height: 4px;
	left: 50%;
	transform: translateX(-50%);
	background-color: #a83f3f;
	border-radius: 2px;
}


.partsH2-10 h2,
.partsH3-10 h3,
.partsH4-10 h4,
.partsH5-10 h5{
	position: relative;
	padding-bottom:10px;
	text-align:center;
	border-bottom: 1px solid #a83f3f;
}
.partsH2-10 h2::before,
.partsH3-10 h3::before,
.partsH4-10 h4::before,
.partsH5-10 h5::before{
	content: "";
	position: absolute;
	top: 100%;
	left:50%;
	transform:translateX(-50%);
	border: 10px solid transparent;
	border-top: 10px solid #a83f3f;
}
.partsH2-10 h2::after,
.partsH3-10 h3::after,
.partsH4-10 h4::after,
.partsH5-10 h5::after{
	content: "";
	position: absolute;
	top: 100%;
	left:50%;
	transform:translateX(-50%);
	border: 10px solid transparent;
	border-top: 10px solid #ffffff;
	margin-top: -1px;
}

.partsH2-11 h2,
.partsH3-11 h3,
.partsH4-11 h4,
.partsH5-11 h5{
	padding: 10px 0 10px 20px;
	border-left: solid 4px #a83f3f;
}

.partsH2-12 h2,
.partsH3-12 h3,
.partsH4-12 h4,
.partsH5-12 h5{
	padding: 10px 0 10px 20px;
	border-left: solid 4px #a83f3f;
	border-bottom: solid 1px #D8D8D8;
}

.partsH2-13 h2,
.partsH3-13 h3,
.partsH4-13 h4,
.partsH5-13 h5{
	padding: 10px 0 10px 20px;
	border-left: solid 4px #a83f3f;
	border-bottom: dotted 1px #D8D8D8;
}

.partsH2-14 h2,
.partsH3-14 h3,
.partsH4-14 h4,
.partsH5-14 h5{
	position: relative;
	padding: 10px 0 10px 20px;
	border-left: solid 4px #a83f3f;
}

.partsH2-14 h2::before,
.partsH3-14 h3::before,
.partsH4-14 h4::before,
.partsH5-14 h5::before {
	content: "";
	position: absolute;
	left: -4px;
	bottom: 0;
	width: 4px;
	height: 50%;
	background-color: #D8D8D8;
}
.partsH2-14 h2::after,
.partsH3-14 h3::after,
.partsH4-14 h4::after,
.partsH5-14 h5::after{
	content: "";
	position: absolute;
	left: 0;
	bottom: 0;
	width: 100%;
	height: 0;
	border-bottom: 1px solid #D8D8D8;
}



/*枠/背景シリーズ21～*/
.partsH2-21 h2,
.partsH3-21 h3,
.partsH4-21 h4,
.partsH5-21 h5{
	padding: 20px;
	background-color:#f2f2f2;
}

.partsH2-22 h2,
.partsH3-22 h3,
.partsH4-22 h4,
.partsH5-22 h5{
	padding: 20px;
	background-color:#f2f2f2;
	border-bottom: 4px solid #a83f3f;
}
.partsH2-23 h2,
.partsH3-23 h3,
.partsH4-23 h4,
.partsH5-23 h5{
	padding: 20px;
	background-color:#f2f2f2;
	border-left: 4px solid #a83f3f;
}

.partsH2-24 h2,
.partsH3-24 h3,
.partsH4-24 h4,
.partsH5-24 h5{
	padding: 20px;
	background-color:#f2f2f2;
	border-left: 4px solid #a83f3f;
	border-bottom: 4px solid rgba(0,0,0,0.10);
}




.partsH2-25 h2,
.partsH3-25 h3,
.partsH4-25 h4,
.partsH5-25 h5{
	position: relative;
    padding: 20px;
    background-color:#f2f2f2;
    border-radius: 5px;
}
.partsH2-25 h2::after,
.partsH3-25 h3::after,
.partsH4-25 h4::after,
.partsH5-25 h5::after{
	position: absolute;
	top: 100%;
	left: 30px;
	content: "";
	height: 0;
	width: 0;
	border: 10px solid transparent;
	margin-top: -2px;
	border-top: 15px solid #f2f2f2;
}

.partsH2-26 h2,
.partsH3-26 h3,
.partsH4-26 h4,
.partsH5-26 h5{
	position: relative;
    padding: 20px;
    border: 1px solid #D8D8D8;
    border-radius: 5px;
}
.partsH2-26 h2::before,
.partsH3-26 h3::before,
.partsH4-26 h4::before,
.partsH5-26 h5::before{
	position: absolute;
	top: 100%;
	left: 30px;
	content: "";
	height: 0;
	width: 0;
	border: 10px solid transparent;
	border-top: 15px solid #D8D8D8;
}
.partsH2-26 h2::after,
.partsH3-26 h3::after,
.partsH4-26 h4::after,
.partsH5-26 h5::after{
	position: absolute;
	top: 100%;
	left: 30px;
	content: "";
	height: 0;
	width: 0;
	border: 10px solid transparent;
	margin-top: -2px;
	border-top: 15px solid #ffffff;
}

.partsH2-27 h2,
.partsH3-27 h3,
.partsH4-27 h4,
.partsH5-27 h5{
	position: relative;
	padding:20px;
	color:#FFF;
	background: #a83f3f;
}
.partsH2-27 h2::before,
.partsH3-27 h3::before,
.partsH4-27 h4::before,
.partsH5-27 h5::before{
	content: "";
	position: absolute;
	top: 100%;
	right: 0;
	height: 0;
	width: 0;
	border: 5px solid transparent;
	border-top: 5px solid #752f2f;
	border-left: 5px solid #752f2f;
}
.partsH2-27 h2::after,
.partsH3-27 h3::after,
.partsH4-27 h4::after,
.partsH5-27 h5::after{
	content: "";
	position: absolute;
	top: 100%;
	left: 0;
	height: 0;
	width: 0;
	border: 5px solid transparent;
	border-top: 5px solid #752f2f;
	border-right: 5px solid #752f2f;
}

.partsH2-28 h2,
.partsH3-28 h3,
.partsH4-28 h4,
.partsH5-28 h5{
	position: relative;
	padding:20px;
	color:#FFF;
	background: #a83f3f;
}
.partsH2-28 h2::before,
.partsH3-28 h3::before,
.partsH4-28 h4::before,
.partsH5-28 h5::before{
	content: "";
	position: absolute;
	top: -20px;
	left: 0;
	width:100%;
	height: 0;
	border: solid 10px transparent;
	border-bottom-color: #752f2f;
}

.partsH2-29 h2,
.partsH3-29 h3,
.partsH4-29 h4,
.partsH5-29 h5{
	position: relative;
	padding:20px;
	color:#FFF;
	background: #a83f3f;
	box-shadow: 0px 0px 0px 5px #a83f3f;
	border: dashed 1px #ffffff;
}

.partsH2-30 h2,
.partsH3-30 h3,
.partsH4-30 h4,
.partsH5-30 h5{
	position: relative;
	padding:20px;
	color:#FFF;
	background: repeating-linear-gradient(-45deg, #a83f3f, #a83f3f 3px,#752f2f 3px, #752f2f 7px);
}



.partsH2-31 h2,
.partsH3-31 h3,

.partsH4-31 h4,
.partsH5-31 h5{
	position: relative;
	padding: 20px;
	text-align:center;
	border: solid 1px #a83f3f;
}

.partsH2-32 h2,
.partsH3-32 h3,
.partsH4-32 h4,
.partsH5-32 h5{
	position: relative;
	padding: 20px;
	text-align:center;
	border: dashed 1px #a83f3f;
	border-radius:5px;
}

.partsH2-33 h2,
.partsH3-33 h3,
.partsH4-33 h4,
.partsH5-33 h5{
	position: relative;
	padding: 20px;
	text-align:center;
}
.partsH2-33 h2::before,
.partsH3-33 h3::before,
.partsH4-33 h4::before,
.partsH5-33 h5::before{
	display: inline-block;
	content: "";
	position: absolute;
	top:0;
	left: 0;
	width: 20px;
	height: 30px;
	border-left: solid 1px #a83f3f;
	border-top: solid 1px #a83f3f;
}
.partsH2-33 h2::after,
.partsH3-33 h3::after,
.partsH4-33 h4::after,
.partsH5-33 h5::after{
	display: inline-block;
	content: "";
	position: absolute;
	bottom:0;
	right: 0;
	width: 20px;
	height: 30px;
	border-right: solid 1px #a83f3f;
	border-bottom: solid 1px #a83f3f;
}



.partsH2-34 h2,
.partsH3-34 h3,
.partsH4-34 h4,
.partsH5-34 h5{
	position: relative;
	padding: 20px;
	text-align:center;
	border-top: solid 1px #a83f3f;
	border-bottom: solid 1px #a83f3f;
}
.partsH2-34 h2::before,
.partsH3-34 h3::before,
.partsH4-34 h4::before,
.partsH5-34 h5::before{
	content: "";
	position: absolute;
	top: -10px;
	left:10px;
	width: 1px;
	height: calc(100% + 20px);
	background-color: #a83f3f;
}
.partsH2-34 h2::after,
.partsH3-34 h3::after,
.partsH4-34 h4::after,
.partsH5-34 h5::after{
	content: "";
	position: absolute;
	top: -10px;
	right:10px;
	width: 1px;
	height: calc(100% + 20px);
	background-color: #a83f3f;
}





/*グラデシリーズ41～*/
.partsH2-41 h2,
.partsH3-41 h3,
.partsH4-41 h4,
.partsH5-41 h5{
	position: relative;
	padding: 20px;
	border: 1px solid #f2f2f2;
	box-shadow:inset 1px 1px 0 rgba(255,255,255,.5);
    background:linear-gradient(#f2f2f2 0%, #FFF 50%, #f2f2f2 50%, #FFF 100%);
}

.partsH2-42 h2,
.partsH3-42 h3,
.partsH4-42 h4,
.partsH5-42 h5{
	position: relative;
	padding: 20px;
	border-radius:5px;
	border: 1px solid #f2f2f2;
	box-shadow:inset 1px 1px 0 rgba(255,255,255,.5);
    background:linear-gradient(#f2f2f2 0%, #FFF 50%, #f2f2f2 50%, #FFF 100%);
}

.partsH2-43 h2,
.partsH3-43 h3,
.partsH4-43 h4,
.partsH5-43 h5{
	position: relative;
	padding: 20px;
	border-radius:100px;
	border: 1px solid #f2f2f2;
	box-shadow:inset 1px 1px 0 rgba(255,255,255,.5);
    background:linear-gradient(#f2f2f2 0%, #FFF 50%, #f2f2f2 50%, #FFF 100%);
}


.partsH2-44 h2,
.partsH3-44 h3,
.partsH4-44 h4,
.partsH5-44 h5{
	position: relative;
	padding: 20px;
	border: 1px solid #f2f2f2;
	box-shadow:inset 1px -1px 0 rgba(255,255,255,.5);
    background:linear-gradient(#ffffff 0%, #f2f2f2 100%);
}

.partsH2-45 h2,
.partsH3-45 h3,
.partsH4-45 h4,
.partsH5-45 h5{
	position: relative;
	padding: 20px;
	border-radius:5px;
	border: 1px solid #f2f2f2;
	box-shadow:inset 1px -1px 0 rgba(255,255,255,.5);
    background:linear-gradient(#ffffff 0%, #f2f2f2 100%);
}


.partsH2-46 h2,
.partsH3-46 h3,
.partsH4-46 h4,
.partsH5-46 h5{
	position: relative;
	padding: 20px;
	border-radius:50px;
	border: 1px solid #f2f2f2;
	box-shadow:inset 1px -1px 0 rgba(255,255,255,.5);
    background:linear-gradient(#ffffff 0%, #f2f2f2 100%);
}


.partsH2-47 h2,
.partsH3-47 h3,
.partsH4-47 h4,
.partsH5-47 h5{
	position: relative;
	padding: 20px;
	border: 1px solid #f2f2f2;
	border-top: 4px solid #a83f3f;
	box-shadow:inset 1px -1px 0 rgba(255,255,255,.5);
    background:linear-gradient(#ffffff 0%, #f2f2f2 100%);
}

.partsH2-48 h2,
.partsH3-48 h3,
.partsH4-48 h4,
.partsH5-48 h5{
	position: relative;
	padding: 20px;
	border-radius:5px;
	border: 1px solid #f2f2f2;
	border-top: 4px solid #a83f3f;
	box-shadow:inset 1px -1px 0 rgba(255,255,255,.5);
    background:linear-gradient(#ffffff 0%, #f2f2f2 100%);
}

.partsH2-49 h2,
.partsH3-49 h3,
.partsH4-49 h4,
.partsH5-49 h5{
	position: relative;
	padding: 20px;
	border: 1px solid #323232;
	color:#ffffff;
	border-top: 4px solid #a83f3f;
	box-shadow:inset 1px -1px 0 rgba(255,255,255,0.5);
    background:linear-gradient(#191919 0%, #323232 100%);
}

.partsH2-50 h2,
.partsH3-50 h3,
.partsH4-50 h4,
.partsH5-50 h5{
	position: relative;
	padding: 20px;
	border-radius:5px;
	border: 1px solid #323232;
	color:#ffffff;
	border-top: 4px solid #a83f3f;
	box-shadow:inset 1px -1px 0 rgba(255,255,255,0.5);
    background:linear-gradient(#191919 0%, #323232 100%);
}



/*マークシリーズ61～*/
.partsH2-61 h2,
.partsH3-61 h3,
.partsH4-61 h4,
.partsH5-61 h5{
	position: relative;
	padding: 10px 0 10px 30px;
}
.partsH2-61 h2::after,
.partsH3-61 h3::after,
.partsH4-61 h4::after,
.partsH5-61 h5::after{
	content: "";
	position: absolute;
	top: 50%;
	left:0;
	width: 20px;
	height: 4px;
	transform:translateY(-50%);
	background-color: #a83f3f;
}

.partsH2-62 h2,
.partsH3-62 h3,
.partsH4-62 h4,
.partsH5-62 h5{
	position: relative;
	padding: 20px 0 20px 30px;
	background-color: #a83f3f;
	color:#ffffff;
	border-radius:5px;
}
.partsH2-62 h2::after,
.partsH3-62 h3::after,
.partsH4-62 h4::after,
.partsH5-62 h5::after{
	content: "";
	position: absolute;
	top: 50%;
	left:0;
	width: 20px;
	height: 4px;
	transform:translateY(-50%);
	background-color: #ffffff;
}

.partsH2-63 h2,
.partsH3-63 h3,
.partsH4-63 h4,
.partsH5-63 h5{
	position: relative;
	padding: 20px 0 20px 30px;
	border:1px solid #d8d8d8;
	border-radius:5px;
}
.partsH2-63 h2::after,
.partsH3-63 h3::after,
.partsH4-63 h4::after,
.partsH5-63 h5::after{
	content: "";
	position: absolute;
	top: 50%;
	left:0;
	width: 20px;
	height: 4px;
	transform:translateY(-50%);
	background-color: #a83f3f;
}

.partsH2-64 h2,
.partsH3-64 h3,
.partsH4-64 h4,
.partsH5-64 h5{
	position: relative;
	padding: 20px 0 20px 30px;
	border: 1px solid #f2f2f2;
	border-top: 4px solid #a83f3f;
	box-shadow:inset 1px -1px 0 rgba(255,255,255,.5);
    background:linear-gradient(#ffffff 0%, #f2f2f2 100%);
}
.partsH2-64 h2::after,
.partsH3-64 h3::after,
.partsH4-64 h4::after,
.partsH5-64 h5::after{
	content: "";
	position: absolute;
	top: 50%;
	left:0;
	width: 20px;
	height: 4px;
	transform:translateY(-50%);
	background-color: #a83f3f;
}

.partsH2-65 h2,
.partsH3-65 h3,
.partsH4-65 h4,
.partsH5-65 h5{
	position: relative;
	padding: 20px 0 20px 30px;
	border: 1px solid #323232;
	color:#ffffff;
	border-top: 4px solid #a83f3f;
	box-shadow:inset 1px -1px 0 rgba(255,255,255,0.5);
    background:linear-gradient(#191919 0%, #323232 100%);
}
.partsH2-65 h2::after,
.partsH3-65 h3::after,
.partsH4-65 h4::after,
.partsH5-65 h5::after{
	content: "";
	position: absolute;
	top: 50%;
	left:0;
	width: 20px;
	height: 4px;
	transform:translateY(-50%);
	background-color: #a83f3f;
}


.partsH2-71 h2,
.partsH3-71 h3,
.partsH4-71 h4,
.partsH5-71 h5{
	position: relative;
	padding: 10px 0 10px 25px;
}
.partsH2-71 h2::after,
.partsH3-71 h3::after,
.partsH4-71 h4::after,
.partsH5-71 h5::after{
	content: "";
	position: absolute;
	top: 50%;
	left:0;
	width: 15px;
	height:15px;
	border: solid 4px #a83f3f;
	border-radius:100%;
	transform:translateY(-50%);
}

.partsH2-72 h2,
.partsH3-72 h3,
.partsH4-72 h4,
.partsH5-72 h5{
	position: relative;
	padding: 20px 0 20px 35px;
	background-color: #a83f3f;
	color:#ffffff;
	border-radius:5px;
}
.partsH2-72 h2::after,
.partsH3-72 h3::after,
.partsH4-72 h4::after,
.partsH5-72 h5::after{
	content: "";
	position: absolute;
	top: 50%;
	left:10px;
	width: 15px;
	height:15px;
	border: solid 4px #ffffff;
	border-radius:100%;
	transform:translateY(-50%);
}


.partsH2-73 h2,
.partsH3-73 h3,
.partsH4-73 h4,
.partsH5-73 h5{
	position: relative;
	padding: 20px 0 20px 35px;
	border:1px solid #d8d8d8;
	border-radius:5px;
}
.partsH2-73 h2::after,
.partsH3-73 h3::after,
.partsH4-73 h4::after,
.partsH5-73 h5::after{
	content: "";
	position: absolute;
	top: 50%;
	left:10px;
	width: 15px;
	height:15px;
	border: solid 4px #a83f3f;
	border-radius:100%;
	transform:translateY(-50%);
}

.partsH2-74 h2,
.partsH3-74 h3,
.partsH4-74 h4,
.partsH5-74 h5{
	position: relative;
	padding: 20px 0 20px 35px;
	border: 1px solid #f2f2f2;
	border-top: 4px solid #a83f3f;
	box-shadow:inset 1px -1px 0 rgba(255,255,255,.5);
    background:linear-gradient(#ffffff 0%, #f2f2f2 100%);
}
.partsH2-74 h2::after,
.partsH3-74 h3::after,
.partsH4-74 h4::after,
.partsH5-74 h5::after{
	content: "";
	position: absolute;
	top: 50%;
	left:10px;
	width: 15px;
	height:15px;
	border: solid 4px #a83f3f;
	border-radius:100%;
	transform:translateY(-50%);
}

.partsH2-75 h2,
.partsH3-75 h3,
.partsH4-75 h4,
.partsH5-75 h5{
	position: relative;
	padding: 20px 0 20px 35px;
	border: 1px solid #323232;
	color:#ffffff;
	border-top: 4px solid #a83f3f;
	box-shadow:inset 1px -1px 0 rgba(255,255,255,0.5);
    background:linear-gradient(#191919 0%, #323232 100%);
}
.partsH2-75 h2::after,
.partsH3-75 h3::after,
.partsH4-75 h4::after,
.partsH5-75 h5::after{
	content: "";
	position: absolute;
	top: 50%;
	left:10px;
	width: 15px;
	height:15px;
	border: solid 4px #a83f3f;
	border-radius:100%;
	transform:translateY(-50%);
}


/*先頭文字大シリーズ81～*/
.partsH2-81 h2:first-letter{font-size:3.2rem;}
.partsH3-81 h3:first-letter{font-size:2.8rem;}
.partsH4-81 h4:first-letter{font-size:2.6rem;}
.partsH5-81 h5:first-letter{font-size:2.4rem;}
.partsH2-81 h2:first-letter,
.partsH3-81 h3:first-letter,
.partsH4-81 h4:first-letter,
.partsH5-81 h5:first-letter{
	color:#a83f3f;
}

.partsH2-82 h2:first-letter{font-size:3.2rem;}
.partsH3-82 h3:first-letter{font-size:2.8rem;}
.partsH4-82 h4:first-letter{font-size:2.6rem;}
.partsH5-82 h5:first-letter{font-size:2.4rem;}
.partsH2-82 h2:first-letter,
.partsH3-82 h3:first-letter,
.partsH4-82 h4:first-letter,
.partsH5-82 h5:first-letter{
	padding-bottom:5px;
	color:#a83f3f;
	border-bottom:3px solid;
}

.partsH2-83 h2,
.partsH3-83 h3,
.partsH4-83 h4,
.partsH5-83 h5{
	padding: 10px 0;
    border-bottom: dotted 1px #D8D8D8;
}
.partsH2-83 h2:first-letter{font-size:3.2rem;}
.partsH3-83 h3:first-letter{font-size:2.8rem;}
.partsH4-83 h4:first-letter{font-size:2.6rem;}
.partsH5-83 h5:first-letter{font-size:2.4rem;}
.partsH2-83 h2:first-letter,
.partsH3-83 h3:first-letter,
.partsH4-83 h4:first-letter,
.partsH5-83 h5:first-letter{
	color:#a83f3f;
}

.partsH2-84 h2,
.partsH3-84 h3,
.partsH4-84 h4,
.partsH5-84 h5{
	padding: 20px;
    border: solid 1px #D8D8D8;
	border-radius: 5px;
}
.partsH2-84 h2:first-letter{font-size:3.2rem;}
.partsH3-84 h3:first-letter{font-size:2.8rem;}
.partsH4-84 h4:first-letter{font-size:2.6rem;}
.partsH5-84 h5:first-letter{font-size:2.4rem;}
.partsH2-84 h2:first-letter,
.partsH3-84 h3:first-letter,
.partsH4-84 h4:first-letter,
.partsH5-84 h5:first-letter{
	color:#a83f3f;
}



/*-----画像設定-----*/
.mce-content-body .size-full,
.mce-content-body .size-large,
.mce-content-body .size-medium,
.mce-content-body .size-thumbnail{max-width:100%; height:auto}

.mce-content-body .alignleft {
    float: left;
    margin: 0 1rem 1rem 0;
	text-align:left;
}
.mce-content-body .aligncenter {
    display: block;
    margin:0 auto 1rem auto;
	text-align:center;
}
.mce-content-body .alignright {
    float: right;
    margin: 0 0 1rem 1rem;
	text-align:right;
}
.mce-content-body .wp-caption{margin-top:2rem;}
.mce-content-body .wp-caption a{display:block;}
.mce-content-body .wp-caption a:hover{border-bottom: none;}
.mce-content-body .wp-caption img{vertical-align: bottom;}
.mce-content-body .wp-caption-text{
	margin-top: 1rem;
	font-size:1.4rem;
}


/*-----リスト基本設定-----*/
.mce-content-body ul,
.mce-content-body ol {
	margin-top:2rem;
	list-style-type: none;
}
.mce-content-body ul ul,
.mce-content-body ul ol,
.mce-content-body ol ol,
.mce-content-body ol ul{
	padding:0;
	background: none;
    box-shadow: none;
    border: none;
}
.mce-content-body ul ul::before,
.mce-content-body ul ol::before,
.mce-content-body ol ol::before,
.mce-content-body ol ul::before{content: normal;}
.mce-content-body ul ul::after,
.mce-content-body ul ol::after,
.mce-content-body ol ol::after,
.mce-content-body ol ul::after{content: normal;}

.mce-content-body ul li,
.mce-content-body ol li{
	position:relative;
	list-style:none;
	margin-top:1rem;
	padding-left:1.7rem;
	line-height:1.5;
}
/*「*:first-child 0」を解除*/
.mce-content-body ul li ul li:first-child{margin-top:1rem;}
.mce-content-body ol li ol li:first-child{margin-top:1rem;}
.mce-content-body ul li ol li:first-child{margin-top:1rem;}
.mce-content-body ol li ul li:first-child{margin-top:1rem;}


/*-----ULリスト設定-----*/
.mce-content-body ul > li:before{
	font-family: "icomoon";
    content: "\ea57";
	display:block;
	position:absolute;
	left: 0;
	transform: scale(0.6);
	color: #a83f3f;
}
.mce-content-body ul > li > ul > li:before{content:"\ea56";}
.mce-content-body ul > li > ul > li > ul > li:before{content:"\ea55";}


/*-----OLリスト設定-----*/
.mce-content-body ol{counter-reset: number;}
.mce-content-body ol li{padding-left: 2.7rem;}

.mce-content-body ol > li:before{
	display:block;
	position:absolute;
	left:0;
	counter-increment: number;
	content: counter(number);
	background: #ffffff;
	border: 1px solid #a83f3f;
	color:#a83f3f;
	width:2.2rem;
	height:2.2rem;
	line-height:2rem;
	font-size:1rem;
	font-weight: bold;
	text-align:center;
	border-radius:50%;
}
.mce-content-body ol > li > ol > li:before{
	background: #a83f3f;
	border: 1px solid #a83f3f;
	color:#fff;
}
.mce-content-body ol > li > ol > li > ol > li:before{
	background: #ffffff;
	border: 1px dashed #a83f3f;
	color:#a83f3f;
}

/*リストデザイン*/
.partsUl-1 ul,
.partsOl-1 ol{
	padding:20px;
	background-color: #f2f2f2;
}


.partsUl-2 ul,
.partsOl-2 ol{
	padding: 20px;
    background-color: #f2f2f2;
    box-shadow: 0px 0px 0px 5px #f2f2f2;
    border: dashed 1px #a83f3f;
}



.partsUl-3 ul,
.partsOl-3 ol {
	padding:20px;
	position: relative;
	background-color: #F2F2F2;
}
.partsUl-3 ul::after,
.partsOl-3 ol::after {
    content: "";
	position: absolute;
	bottom: 0;
    right: 0;
    border-color: rgba(0,0,0,0.10) #ffffff #ffffff rgba(0,0,0,0.10);
    border-style: solid;
    border-width: 10px;
}

.partsUl-4 ul,
.partsOl-4 ol{
	padding:20px;
	background-color: #fff;
    background-image:
	-webkit-linear-gradient( transparent 95%, rgba(0, 144, 255, .1) 50%, rgba(0, 144, 255, .1)),
	-webkit-linear-gradient( 0deg, transparent 95%, rgba(0, 144, 255, .1) 50%, rgba(0, 144, 255, .1));
    background-size: 12px 12px;
}

.partsUl-5 ul,
.partsOl-5 ol{
	padding: 20px;
	position: relative;
    border: solid 1px #D8D8D8;
}

.partsUl-6 ul,
.partsOl-6 ol{
	padding: 20px;
	position: relative;
    border: dashed 1px #D8D8D8;
}


.partsUl-7 ul,
.partsOl-7 ol{
	padding: 20px 30px;
	position: relative;
	border-top: solid 1px #D8D8D8;
	border-bottom: solid 1px #D8D8D8;
}
.partsUl-7 ul::before,
.partsOl-7 ol::before{
	content: "";
	position: absolute;
	top: -10px;
	left:10px;
	width: 1px;
	height: calc(100% + 20px);
	background-color: #D8D8D8;
}
.partsUl-7 ul::after,
.partsOl-7 ol::after{
	content: "";
	position: absolute;
	top: -10px;
	right:10px;
	width: 1px;
	height: calc(100% + 20px);
	background-color: #D8D8D8;
}

/*-----レビューボックス-----*/
.mce-content-body .reviewBox{
    position: relative;
	background: #f2f2f2;
	padding: 20px;
	border-radius: 5px;
}
.mce-content-body .reviewBox-border{
	background: #ffffff;
	border: 1px solid rgba(0,0,0,0.10);
}
.mce-content-body .reviewBox::after {
    content: "";
    position: absolute;
    bottom: -1px;
    right: -1px;
    border-color: rgba(0,0,0,0.10) #ffffff #ffffff rgba(0,0,0,0.10);
    border-style: solid;
    border-width: 10px;
}
.mce-content-body .reviewBox__title{
	font-weight: bold;
	font-size: 2rem;
	margin-bottom: 20px;
	padding-bottom: 10px;
    border-bottom: 1px solid #e5e5e5;
	line-height: 1.5;
}
.mce-content-body .reviewBox__contents{
	position: relative
}
.mce-content-body .reviewBox__imgBox{
	float: right;
	width: 100px;
	height:auto;
	margin: 0 0 20px 20px;

}
.mce-content-body .reviewBox__img {
	width: 100px;
	height: 100px;
	border-radius: 50%;
	border: 1px solid #e5e5e5;
	overflow: hidden;
	background:url(img/img_mysteryman.gif);
	background-size:contain;
}
.mce-content-body .reviewBox__img img{
	width: 100px;
	height: 100px;
	border-radius: 50%;
	vertical-align: bottom;


}
.mce-content-body .reviewBox__name{
	display: inline-block;
	width: 100%;
	text-align: center;
	margin-top: 0.5rem;
	font-size: 1.2rem;
	color: rgba(0,0,0,0.5)
}
.mce-content-body .reviewBox__star{
	display: block;
	font-weight: bold;
	margin-bottom: 10px;
}

/*-----会話風バルーン-----*/
.mce-content-body .balloon {
	margin-top:2rem;
	position: relative;
}
.mce-content-body .balloon:before,
.mce-content-body .balloon:after {
	clear: both;
	content: "";
	display: block;
}
.mce-content-body .balloon .balloon__img{
	width: 80px;
	height: 80px;
	margin-bottom:20px;
}
.mce-content-body .balloon .balloon__img-left {float: left;margin-right: 20px;}
.mce-content-body .balloon .balloon__img-right{float: right;margin-left: 20px;}
.mce-content-body .balloon .balloon__img-left div {border-radius: 50%; width: 80px; height:80px; background:url(img/img_cat.gif);background-size:contain; margin-bottom:10px;}
.mce-content-body .balloon .balloon__img-right div{border-radius: 50%; width: 80px; height:80px; background:url(img/img_dog.gif);background-size:contain; margin-bottom:10px;}

.mce-content-body .balloon .balloon__img img {
	width: 100%;
	height: 100%;
	border-radius: 50%;
	margin: 0;
}
.mce-content-body .balloon .balloon__name {
	font-size: 1rem;
	text-align: center;
	line-height:1;
}
.mce-content-body .balloon .balloon__text {
	position: relative;
	padding: 1rem;
	margin:0;
	border-radius: 5px;
	max-width: calc(100% - 200px);
	display: inline-block;
	background-color:#F2F2F2;
}
.mce-content-body .balloon .balloon__text-left  {float: right;}
.mce-content-body .balloon .balloon__text-right {float: left;}

.mce-content-body .balloon .balloon__text::before{
	content: "";
	position: absolute;
	top: 15px;
	border: 10px solid transparent;
}
.mce-content-body .balloon .balloon__text-left::before {right:-20px;border-left: 10px solid #F2F2F2;}
.mce-content-body .balloon .balloon__text-right::before{left: -20px;border-right:10px solid #F2F2F2;}



/*ボーダースタイル*/
.mce-content-body .balloon-boder .balloon__text {
	border: 1px solid #E5E5E5;
	background-color:#ffffff;
}
.mce-content-body .balloon-boder .balloon__text:after {
	content: "";
	position: absolute;
	top: 15px;
	border: 10px solid transparent;
}
.mce-content-body .balloon-boder .balloon__text-left:after {right:-18px;border-left: 10px solid #fff;}
.mce-content-body .balloon-boder .balloon__text-right:after{left: -18px;border-right:10px solid #fff;}




/*-----整形済みテキスト-----*/
.mce-content-body pre{
	font-family: "游ゴシック体", "Yu Gothic", "YuGothic", "ヒラギノ角ゴシック Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo, Osaka", "ＭＳ Ｐゴシック", "MS PGothic", "sans-serif";
	font-weight:400;
	margin-top:2rem;
	padding:20px;
	background-color: #F2F2F2;
	border-left: solid 5px #191919;
	color:#7F7F7F;
	overflow:auto;
}


/*-----HRライン-----*/
.mce-content-body hr{
	margin-top:4rem;
	border-top: 1px solid #F2F2F2;
	border-bottom: 1px solid #E5E5E5;
}



/*-----DLリスト-----*/
.mce-content-body dl {margin-top: 2rem;}
.mce-content-body dt {
  margin-top: 2rem;
  padding: 10px;
  background-color: rgba(0,0,0,0.05);
}
.mce-content-body dd {
	padding: 10px;
	border: solid 1px rgba(0,0,0,0.05);
}


/*-----アコーディオンボックス-----*/
.mce-content-body .accordionBox dt{position: relative;}
.mce-content-body .accordionBox dt::after{
	font-family: "icomoon";
	content: "\ea0c";
	position: absolute;
    top: 50%;
    right: 10px;
    margin-top: -0.5rem;
    font-size: 1rem;
    line-height: 1;
}
.mce-content-body .accordionBox dt.current::after{content: "\ea0d";}
.mce-content-body .accordionBox-border dt{
	background: #fff;
	border: solid 1px rgba(0,0,0,0.05);
}
.mce-content-body .accordionBox-border dd{border-top:0;}




/*-----テーブル-----*/
.mce-content-body table {
    margin-top:2rem;
    width: 100%;
	font-size:1.2rem;
	border-top: 1px solid ;
	border-left: 1px solid;
	border-right:0;
	border-bottom:0;
	border-top-color:#E5E5E5;
	border-left-color:#E5E5E5;
}

.mce-content-body table th{
	padding: 10px;
	background: #d8d8d8;
	border-right: 1px solid;
	border-bottom: 1px solid;
	border-right-color:#E5E5E5;
	border-bottom-color:#E5E5E5;
}
.mce-content-body table td{
	padding: 10px;
	border-right: 1px solid;
	border-bottom: 1px solid;
	border-right-color:#E5E5E5;
	border-bottom-color:#E5E5E5;
}
.mce-content-body table tr:nth-child(odd) td {background-color: #f2f2f2;}

/*テーブルデザイン*/
.partsTable-1 table{border-top: 1px dotted #E5E5E5;border-left: 1px dotted #E5E5E5;}
.partsTable-1 table th{border-right: 1px dotted #E5E5E5;border-bottom: 1px dotted #E5E5E5;}
.partsTable-1 table td{border-right: 1px dotted #E5E5E5;border-bottom: 1px dotted #E5E5E5;}

/*テーブルスクロール*/
.mce-content-body .tableScroll{
  overflow: auto;
	position:relative;
	padding:10px;
	border:dashed 1px #d8d8d8;
}
.mce-content-body .tableScroll::before{
	position:absolute;
	content:"点線内でテーブル作成(プレビュー時のみ点線表示)";
	color:#d8d8d8;
	font-size:10px;
}
.mce-content-body .tableScroll table th{ min-width:160px}
.mce-content-body .tableScroll table td{ min-width:160px}


/*-----スコアテーブル設定-----*/
.mce-content-body .scoreTable {border: 1px solid #E5E5E5;}
.mce-content-body .scoreTable tr:nth-child(odd) td {background-color: #f2f2f2;}
.mce-content-body .scoreTable td{border: 0;}
.mce-content-body .scoreTable td:first-child{font-weight: bold}
.mce-content-body .scoreTable td:last-child{width:140px}

.mce-content-body .scoreTable-red tr:last-child td {background-color: #FDEDEC;}
.mce-content-body .scoreTable-blue tr:last-child td {background-color: #EAF6FE;}
.mce-content-body .scoreTable-yellow tr:last-child td {background-color: #FFFDED;}
.mce-content-body .scoreTable-pink tr:last-child td {background-color: #FDEFF5;}
.mce-content-body .scoreTable-green tr:last-child td {background-color: #EBF5EB;}
.mce-content-body .scoreTable-gray tr:last-child td {background-color: #D8D8D8;}



/*-----目次-----*/
.mce-content-body .outline{
	border:1px dotted #D8D8D8;
	background:#FFF;
	padding:20px;
	display:inline-block;
}


.mce-content-body .outline__toggle{display: none;}
.mce-content-body .outline__switch::before{
	content:"開く";
	cursor:pointer;
	border: solid 1px #D8D8D8;
	padding:5px;
	font-size:1.2rem;
	margin-left:5px;
	border-radius: 5px;
}
.mce-content-body .outline__toggle:checked + .outline__switch::before{content:"閉じる"}
.mce-content-body .outline__switch + .outline__list{
	overflow:hidden;
	width:0;
	height:0;
	margin-top:0;
	margin-left:-20px;
	padding:0;
	transition: 0.2s;
	background:#FFF;
	border:0;
	box-shadow: none;
}
.mce-content-body .outline__switch + .outline__list::before{content: normal;}
.mce-content-body .outline__switch + .outline__list::after{content: normal;}
.mce-content-body .outline__toggle:checked + .outline__switch + .outline__list{
	width:auto;
	height: auto;
	margin-top:2rem;
}

.mce-content-body .outline__item {font-size:1.4rem;}
.mce-content-body .outline__item:before {content: normal;}
.mce-content-body .outline__link{
	display:inline-block;
	color:#191919;
}
.mce-content-body .outline__link:hover{border:none;}
.mce-content-body .outline__number{
	display: inline-block;
	color:#7F7F7F;
	background:#F2F2F2;
	padding:3px 6px;
	font-weight:400;
	margin-right: 5px;
}


/*-----ギャラリー-----*/
.mce-content-body .gallery {
	width: 100%;
    overflow: hidden;
}

.mce-content-body .gallery br {display: none;}
.mce-content-body .gallery-item {float: left;}
.mce-content-body .gallery-icon {text-align: center;line-height: 1;}

.mce-content-body .gallery-icon img {
	max-width: 100%;
	height: auto;
	margin-bottom: 10px;
}

.mce-content-body .gallery-caption {
    font-size: 1.4rem;
    margin: 0 0 10px 0;
    text-align: center;
}

.mce-content-body .gallery-columns-1 .gallery-item { /** カラムなし **/
    width: 100%;
	margin: 0;
}
.mce-content-body .gallery-columns-2 .gallery-item { /** 2カラム **/
	width: calc(50% - 20px);
	margin: 0 10px;
}
.mce-content-body .gallery-columns-3 .gallery-item { /** 3カラム **/
    width: calc(33.333% - 20px);
	margin: 0 10px;
}
.mce-content-body .gallery-columns-4 .gallery-item { /** 4カラム **/
    width: calc(25% - 20px);
	margin: 0 10px;
}
.mce-content-body .gallery-columns-5 .gallery-item { /** 5カラム **/
    width: calc(20% - 20px);
	margin: 0 10px;
}


/*-----引用-----*/
.mce-content-body blockquote{
	position:relative;
	color:#3F3F3F;
	margin-top:2rem;
	padding:20px 20px 20px 70px;
	background-color: #F2F2F2;
}
.mce-content-body blockquote::before{
	position:absolute;
	top: 5px;
	left: 15px;
	font-family: "icomoon";
	content: "\e9f8";
	font-size:3rem;
	color:#d8d8d8;
}

/*引用デザイン*/
.partsQuote-1 blockquote{border-left: solid 4px #d8d8d8;}

.partsQuote-2 blockquote{background-color: #ffffff;border: solid 1px #d8d8d8;}

.partsQuote-3 blockquote{padding:20px;}
.partsQuote-3 blockquote::before{
    top: 0;
    left: 0;
	font-size:2rem;
    line-height: 1;
    z-index: 2;
}
.partsQuote-3 blockquote::after{
    position: absolute;
    content: "";
    left: 0;
    top: 0;
    border-radius: 0 0 30px;
    width: 30px;
    height: 30px;
    background: #fff;
}

.partsQuote-4 blockquote{
	padding:20px;
	border: solid 4px #d8d8d8;
	background-color: #ffffff;
}
.partsQuote-4 blockquote::before{
    top: 0;
    left: 0;
	font-size:2rem;
	color:#ffffff;
    line-height: 1;
    z-index: 2;
}
.partsQuote-4 blockquote::after{
    position: absolute;
    content: "";
    left: 0;
    top: 0;
    border-radius: 0 0 30px;
    width: 30px;
    height: 30px;

    background: #d8d8d8;
}

.partsQuote-5 blockquote{
	border: solid 3px #d8d8d8;
    border-left-width: 50px;
	padding:20px;
	background-color: #ffffff;
}
.partsQuote-5 blockquote:before{
    top: 50%;
    left: -35px;
    transform: translateY(-50%);
    vertical-align: middle;
    color: #FFF;
    font-size: 2rem;
    line-height: 1;
}

.partsQuote-6 blockquote {
    padding:35px 20px 20px 20px;
}
.partsQuote-6 blockquote:before{
    top: -10px;
    left: 10px;
    width: 40px;
    height: 35px;
	line-height: 35px;
    text-align: center;
    color: #FFF;
    font-size: 2rem;
    background: #d8d8d8;
}
.partsQuote-6 blockquote:after{
	position: absolute;
    content: "";
    top: -10px;
    left: 50px;
    border: none;
    border-bottom: solid 10px #cccccc;
    border-right: solid 10px transparent;
}








/*-----スタイルフォーマット-----*/

/*区切り線*/
.mce-content-body hr{
	clear: both;
	margin: 20px 0;
    padding: 0px;
	height: 0;
	border: 0;
	border-top: 1px solid rgba(0,0,0,0.10);
}
.mce-content-body .hr-solid{border-top: 1px solid rgba(0,0,0,0.10);}
.mce-content-body .hr-dashed{border-top: 1px dashed rgba(0,0,0,0.10);}
.mce-content-body .hr-dotted{border-top: 1px dotted rgba(0,0,0,0.10);}


/*太マーカー*/
.mce-content-body .marker-thickRed{background: linear-gradient(transparent 35%, #FFC6C6 35%);}
.mce-content-body .marker-thickBlue{background: linear-gradient(transparent 35%, #cce5ff 35%);}
.mce-content-body .marker-thickYellow{background: linear-gradient(transparent 60%, #ffffbc 35%);}
.mce-content-body .marker-thickPink{background: linear-gradient(transparent 35%, #FFDFEF 35%);}
.mce-content-body .marker-thickGreen{background: linear-gradient(transparent 35%, #D2FFD2 35%);}
.mce-content-body .marker-thickGray{background: linear-gradient(transparent 35%, #d8d8d8 35%);}


/*中マーカー*/
.mce-content-body .marker-halfRed{background: linear-gradient(transparent 60%, #FFC6C6 60%);}
.mce-content-body .marker-halfBlue{background: linear-gradient(transparent 60%, #cce5ff 60%);}
.mce-content-body .marker-halfYellow{background: linear-gradient(transparent 60%, #ffffbc 60%);}
.mce-content-body .marker-halfPink{background: linear-gradient(transparent 60%, #FFDFEF 60%);}
.mce-content-body .marker-halfGreen{background: linear-gradient(transparent 60%, #D2FFD2 60%);}
.mce-content-body .marker-halfGray{background: linear-gradient(transparent 35%, #d8d8d8 35%);}


/*細マーカー*/
.mce-content-body .marker-thinRed{background: linear-gradient(transparent 85%, #FFC6C6 85%);}
.mce-content-body .marker-thinBlue{background: linear-gradient(transparent 85%, #cce5ff 85%);}
.mce-content-body .marker-thinYellow{background: linear-gradient(transparent 85%, #ffffbc 85%);}
.mce-content-body .marker-thinPink{background: linear-gradient(transparent 85%, #FFDFEF 85%);}
.mce-content-body .marker-thinGreen{background: linear-gradient(transparent 85%, #D2FFD2 85%);}
.mce-content-body .marker-thinGray{background: linear-gradient(transparent 35%, #d8d8d8 35%);}

/*ラベル*/
.mce-content-body .ep-label{
	position: relative;
	display:inline-block;
	background-color:rgba(0,0,0,0.05);
	padding:0 5px;
}


/*ボタン*/
.mce-content-body .ep-btn{
	position:relative;
	display:inline-block;
	line-height: 1;
	background-color:rgba(0,0,0,0.05);
	text-align:center;
	overflow:hidden;
	transition:.3s;
	padding:10px 15px 10px 15px;
}
.mce-content-body .ep-btn:hover::after{
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    content: "";
    background-color: rgba(255,255,255,0.25);
	transition:.3s;
}
.mce-content-body .ep-btn:hover{ font-weight: normal}
.mce-content-body .ep-btn.es-bold:hover{ font-weight: bold}

/*ボックス*/
.mce-content-body .ep-box{
	position: relative;
	background-color:rgba(0,0,0,0.05);
	padding:20px;
}
.mce-content-body .ep-inbox{
	position: relative;
	background-color:rgba(0,0,0,0.05);
	padding:20px;
}



/*-----指定スタイル-----*/

/*サイズ系*/
.mce-content-body .es-size10        { width:10%;}
.mce-content-body .es-size25        { width:25%;}
.mce-content-body .es-size40        { width:40%;}
.mce-content-body .es-size50        { width:50%;}
.mce-content-body .es-size60        { width:60%;}
.mce-content-body .es-size75        { width:75%;}
.mce-content-body .es-size90        { width:90%;}
.mce-content-body .es-size100       { width:100%;}

/*内側余白系*/
.mce-content-body .es-padding0     { padding:0;}
.mce-content-body .es-TpaddingSS   { padding-top:1rem;}
.mce-content-body .es-TpaddingS    { padding-top:1.5rem;}
.mce-content-body .es-TpaddingM    { padding-top:3rem;}
.mce-content-body .es-TpaddingL    { padding-top:4.5rem;}
.mce-content-body .es-RpaddingSS   { padding-right:1rem;}
.mce-content-body .es-RpaddingS    { padding-right:1.5rem;}
.mce-content-body .es-RpaddingM    { padding-right:3rem;}
.mce-content-body .es-RpaddingL    { padding-right:4.5rem;}
.mce-content-body .es-BpaddingSS   { padding-bottom:1rem;}
.mce-content-body .es-BpaddingS    { padding-bottom:1.5rem;}
.mce-content-body .es-BpaddingM    { padding-bottom:3rem;}
.mce-content-body .es-BpaddingL    { padding-bottom:4.5rem;}
.mce-content-body .es-LpaddingSS   { padding-left:1rem;}
.mce-content-body .es-LpaddingS    { padding-left:1.5rem;}
.mce-content-body .es-LpaddingM    { padding-left:3rem;}
.mce-content-body .es-LpaddingL    { padding-left:4.5rem;}

/*外側余白系*/
.mce-content-body .es-margin0     { margin:0;}
.mce-content-body .es-TmarginSS   { margin-top:1rem;}
.mce-content-body .es-TmarginS    { margin-top:1.5rem;}
.mce-content-body .es-TmarginM    { margin-top:3rem;}
.mce-content-body .es-TmarginL    { margin-top:4.5rem;}
.mce-content-body .es-RmarginSS   { margin-right:1rem;}
.mce-content-body .es-RmarginS    { margin-right:1.5rem;}
.mce-content-body .es-RmarginM    { margin-right:3rem;}
.mce-content-body .es-RmarginL    { margin-right:4.5rem;}
.mce-content-body .es-BmarginSS   { margin-bottom:1rem;}
.mce-content-body .es-BmarginS    { margin-bottom:1.5rem;}
.mce-content-body .es-BmarginM    { margin-bottom:3rem;}
.mce-content-body .es-BmarginL    { margin-bottom:4.5rem;}
.mce-content-body .es-LmarginSS   { margin-left:1rem;}
.mce-content-body .es-LmarginS    { margin-left:1.5rem;}
.mce-content-body .es-LmarginM    { margin-left:3rem;}
.mce-content-body .es-LmarginL    { margin-left:4.5rem;}

/*ボーダー系*/
.mce-content-body .es-borderSolidS   { border:1px solid #191919;}
.mce-content-body .es-borderSolidM   { border:3px solid #191919;}
.mce-content-body .es-borderDashedS  { border:1px dashed #191919;}
.mce-content-body .es-borderDashedM  { border:3px dashed #191919;}
.mce-content-body .es-borderDottedS  { border:1px dotted #191919;}
.mce-content-body .es-borderDottedM  { border:3px dotted #191919;}
.mce-content-body .es-BborderSolidS  { border-bottom:1px solid #191919;}
.mce-content-body .es-BborderSolidM  { border-bottom:3px solid #191919;}
.mce-content-body .es-BborderDashedS { border-bottom:1px dashed #191919;}
.mce-content-body .es-BborderDashedM { border-bottom:3px dashed #191919;}
.mce-content-body .es-BborderDottedS { border-bottom:1px dotted #191919;}
.mce-content-body .es-BborderDottedM { border-bottom:3px dotted #191919;}
.mce-content-body .es-LborderSolidS  { border-left:1px solid #191919;}
.mce-content-body .es-LborderSolidM  { border-left:3px solid #191919;}
.mce-content-body .es-LborderDashedS { border-left:1px dashed #191919;}
.mce-content-body .es-LborderDashedM { border-left:3px dashed #191919;}
.mce-content-body .es-LborderDottedS { border-left:1px dotted #191919;}
.mce-content-body .es-LborderDottedM { border-left:3px dotted #191919;}



/*文字系*/
.mce-content-body .es-Fsmall{ font-size: 1.4rem;}
.mce-content-body .es-Fbig  { font-size: 1.8rem;}
.mce-content-body .es-FbigL { font-size: 2.2rem;}
.mce-content-body .es-bold  { font-weight:bold;}
.mce-content-body .es-italic{ font-style:italic;}
.mce-content-body .es-strike{ text-decoration: line-through;}
.mce-content-body .es-under { text-decoration: underline;}
.mce-content-body .es-left  { text-align:left;}
.mce-content-body .es-center{ text-align:center;}
.mce-content-body .es-right { text-align:right;}


/*シャドウ系*/
.mce-content-body .es-shadowL   { box-shadow: 0px 1px 3px 0px rgba(0,0,0,0.10);}
.mce-content-body .es-shadow    { box-shadow: 0px 1px 3px 0px rgba(0,0,0,0.25);}
.mce-content-body .es-shadowD   { box-shadow: 0px 1px 3px 0px rgba(0,0,0,0.50);}
.mce-content-body .es-shadowInL { box-shadow: inset 0px 0px 15px 1px rgba(0,0,0,0.10)}
.mce-content-body .es-shadowIn  { box-shadow: inset 0px 0px 15px 1px rgba(0,0,0,0.25)}
.mce-content-body .es-shadowInD { box-shadow: inset 0px 0px 15px 1px rgba(0,0,0,0.50)}
.mce-content-body .es-TshadowL  { text-shadow: 0px 1px 3px rgba(0,0,0,0.10);}
.mce-content-body .es-Tshadow   { text-shadow: 0px 1px 3px rgba(0,0,0,0.25);}
.mce-content-body .es-TshadowD  { text-shadow: 0px 1px 3px rgba(0,0,0,0.50);}


/*角丸系*/
.mce-content-body .es-radius  { border-radius: 5px;}
.mce-content-body .es-radiusL { border-radius: 10px;}
.mce-content-body .es-round   { border-radius: 50px;}


/*背景系*/
.mce-content-body .es-grada1::after{
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    content: "";
    background: linear-gradient(0deg, rgba(255,255,255,0), rgba(255,255,255,0) 50%, rgba(255,255,255,0.15) 50%, rgba(255,255,255,0.05));
}
.mce-content-body .es-grada2::after{
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    content: "";
    background: linear-gradient(0deg, rgba(255,255,255,0), rgba(255,255,255,0.25));
}
.mce-content-body .es-grid {
    background-color: #fff;
    background-image:
	-webkit-linear-gradient( transparent 95%, rgba(0, 144, 255, .1) 50%, rgba(0, 144, 255, .1)),
	-webkit-linear-gradient( 0deg, transparent 95%, rgba(0, 144, 255, .1) 50%, rgba(0, 144, 255, .1));
    background-size: 12px 12px;
}



/*-----ラベル系専用-----*/

/*コーナータイトル*/
.mce-content-body .es-Lcorner{
    top: -20px;
    left: -20px;
}

/*左ラウンド*/
.mce-content-body .es-LroundL{border-radius: 50px 0 0 50px;}
/*右ラウンド*/
.mce-content-body .es-LroundR{border-radius: 0 50px 50px 0;}

/*アイコン(余白)*/
.mce-content-body .es-Licon:before{ margin:0 5px;}

/*アイコン(ボーダー)*/
.mce-content-body .es-LiconBorder:before{
	margin:0 5px;
	padding-right: 5px;
	border-right: 1px solid rgba(255,255,255,.25);
	box-shadow: 1px 0px 0px 0px rgba(0,0,0,.25);
}

/*アイコンボックス*/
.mce-content-body .es-LiconBox{
	height: 28px;
	padding-left: 35px;
}
.mce-content-body .es-LiconBox:before{
	background: #a83f3f;
    color: #ffffff;
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 28px;
    text-align: center;
}

/*アイコンサークル*/
.mce-content-body .es-LiconCircle{
	height: 28px;
	padding-left: 35px;
}
.mce-content-body .es-LiconCircle:before{
	background: #a83f3f;
    color: #ffffff;
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 28px;
    text-align: center;
	border-radius:50%;
}



/*-----ボタン系専用-----*/
/*3Dボタン*/
.mce-content-body .es-BT3d            { border-bottom: solid 3px rgba(0,0,0,0.25);}
.mce-content-body .es-BT3d:active{
	transform: translateY(3px);
    border-bottom: solid 3px transparent;
}

/*影ボタン*/
.mce-content-body .es-BTshadow  {
    border-left: 1px solid rgba(0,0,0,0.05);
	border-bottom: 1px solid rgba(0,0,0,0.05);
}

/*リッチボタン*/
.mce-content-body .es-BTrich  {
	box-shadow:-1px 1px 0px 0px rgba(255,255,255,0.25) inset;
    border: 1px solid rgba(0,0,0,0.05);
}

/*右矢印*/
.mce-content-body .es-BTarrow::before{
    content: "";
    position: absolute;
    top: 0;
    bottom: 0;
    right: 10px;
    width: 5px;
    height: 5px;
    margin: auto;
    border-top: 1px solid;
    border-right: 1px solid;
    transform: rotate(45deg);
}

/*アイコン(余白)*/
.mce-content-body .es-BTicon:before{margin-right:5px;}

/*アイコン(ボーダー)*/
.mce-content-body .es-BTiconBorder:before{
	margin-right:10px;
	padding-right: 10px;
	border-right: 1px solid rgba(255,255,255,.25);
	box-shadow: 1px 0px 0px 0px rgba(0,0,0,.25);
}
/*アイコンボックス*/
.mce-content-body .es-BTiconBox{padding:0 15px 0 0;}
.mce-content-body .es-BTiconBox:before{
	display: inline-block;
	background: #a83f3f;
    color: #ffffff;
    height: 40px;
    width: 40px;
	line-height: 40px;
    text-align: center;
    margin-right: 10px;

}

/*アイコンサークル*/
.mce-content-body .es-BTiconCircle:before{
	display: inline-block;
	background: #a83f3f;
    color: #ffffff;
    height: 40px;
    width: 40px;
	line-height: 40px;
    text-align: center;
    margin-right: 10px;
    border-radius: 50%;
}




/*-----ボックス系専用-----*/

/*全域タイトル*/
.mce-content-body .es-Bwhole  {margin: -20px -20px 0 -20px;}

/*括弧ボックス*/
.mce-content-body .es-Bbrackets:before,
.mce-content-body .es-Bbrackets:after {
    display: inline-block;
    position: absolute;
    width: 30px;
    height: 30px;
    content: "";
}
.mce-content-body .es-Bbrackets:before {
    top: 0;
    left: 0;
    border-top: solid 1px #191919;
    border-left: solid 1px #191919;
}
.mce-content-body .es-Bbrackets:after {
    right: 0;
    bottom: 0;
    border-right: solid 1px #191919;
    border-bottom: solid 1px #191919;
}

/*ペーパーボックス[左]*/
.mce-content-body .es-BpaperLeft::after {
    content: "";
	position: absolute;
	bottom: 0;
    left: 0;
    border-color: rgba(0,0,0,0.10) rgba(0,0,0,0.10) #ffffff #ffffff;
    border-style: solid;
    border-width: 10px;
}
/*ペーパーボックス[右]*/
.mce-content-body .es-BpaperRight::after {
	content: "";
	position: absolute;
	bottom: 0;
    right: 0;
    border-color: rgba(0,0,0,0.10) #ffffff #ffffff rgba(0,0,0,0.10);
    border-style: solid;
    border-width: 10px;
}

/*はてなボックス*/
.mce-content-body .es-BmarkHatena{padding-left:70px;}
.mce-content-body .es-BmarkHatena::before{
	position:absolute;
	top:20px;
	left:20px;
	content: "?";
	background: #0081ba;
	font-size:1.5rem;
	font-weight:700;
	color: #ffffff;
    text-align: center;
    vertical-align: middle;
    width: 30px;
    height: 30px;
	line-height: 30px;
    border-radius: 50%;
}

/*ビックリボックス*/
.mce-content-body .es-BmarkExcl{padding-left:70px;}
.mce-content-body .es-BmarkExcl::before{
	position:absolute;
	top:20px;
	left:20px;
	content: "!";
	background: #b60105;
	font-size:1.5rem;
	font-weight:700;
	color: #ffffff;
    text-align: center;
    vertical-align: middle;
    width: 30px;
    height: 30px;
	line-height: 30px;
    border-radius: 50%;
}


/*Qボックス*/
.mce-content-body .es-BmarkQ{
	position: relative;
    padding: 0 0 10px 40px;
    line-height: 3rem;
    font-size: 1.8rem;
	border-bottom: 1px solid rgba(0,0,0,0.10);
}
.mce-content-body .es-BmarkQ::before{
	content: "Q";
	background: #0081ba;
	position:absolute;
	top:0;
	left:0;
	font-size:1.5rem;
	font-weight:700;
	color: #ffffff;
    text-align: center;
    vertical-align: middle;
    width: 30px;
    height: 30px;
	line-height: 30px;
    border-radius: 5px;
}
.mce-content-body .es-BmarkQ::after{
	content: "";
	position: absolute;
	top: 30px;
	left: 10px;
	border: 5px solid transparent;
	border-top: 5px solid #0081ba;
}

/*Aボックス*/
.mce-content-body .es-BmarkA{
	position: relative;
    padding: 0 0 0 40px;
	margin-top:1rem;
}
.mce-content-body .es-BmarkA::before{
	content: "A";
	position:absolute;
	top:0;
	left:0;
	font-size:1.5rem;
	font-weight:700;
	color: #b60105;
    text-align: center;
    vertical-align: middle;
    width: 30px;
    height: 30px;
	line-height: 30px;
    border-radius: 5px;
}

/*サブタイトルボックス(シンプル)*/
.mce-content-body .es-BsubT{
	margin-top: 3.5rem;
	padding-top: 3.5rem;
}
.mce-content-body .es-BsubT::before{
	position:absolute;
	top:-15px;
	left:20px;
	height: 30px;
	line-height: 30px;
	padding: 0 20px;
	content: attr(title);
	background: #b60105;
	color: #ffffff;
	border: 1px solid transparent;
	font-size:1.5rem;
	font-weight: bold;
    text-align: center;
    vertical-align: middle;
}
/*サブタイトルボックス(角丸)*/
.mce-content-body .es-BsubTradi{
	margin-top: 3.5rem;
	padding-top: 3.5rem;
}
.mce-content-body .es-BsubTradi::before{
	position:absolute;
	top:-15px;
	left:20px;
	height: 30px;
	line-height: 30px;
	padding: 0 20px;
	content: attr(title);
	background: #b60105;
	color: #ffffff;
	border: 1px solid transparent;
	border-radius: 5px;
	font-size:1.5rem;
	font-weight: bold;
    text-align: center;
    vertical-align: middle;
}
/*サブタイトルボックス(ラウンド)*/
.mce-content-body .es-BsubTround{
	margin-top: 3.5rem;
	padding-top: 3.5rem;
}
.mce-content-body .es-BsubTround::before{
	position:absolute;
	top:-15px;
	left:20px;
	height: 30px;
	line-height: 30px;
	padding: 0 20px;
	content: attr(title);
	background: #b60105;
	color: #ffffff;
	border: 1px solid transparent;
	border-radius: 30px;
	font-size:1.5rem;
	font-weight: bold;
    text-align: center;
    vertical-align: middle;
}

/*アイコン(シンプル)*/
.mce-content-body .es-Bicon{padding-left:70px;}
.mce-content-body .es-Bicon:before{
	position:absolute;
	top:20px;
	left:20px;
	font-size:3rem;
	line-height: 3rem;
}
/*アイコン(背景)*/
.mce-content-body .es-BiconBg:before{
	position:absolute;
	top:20px;
	left:20px;
	font-size:5rem;
	line-height: 5rem;
	color: rgba(0,0,0,0.10);
}
/*アイコン(帯)*/
.mce-content-body .es-BiconObi{border-left: solid 50px #a83f3f;}
.mce-content-body .es-BiconObi:before{
	position:absolute;
	top: 50%;
    left: -35px;
    transform: translateY(-50%);
    vertical-align: middle;
	font-size:2rem;
	color: #ffffff;
	line-height: 1;
}
/*アイコン(コーナー)*/
.mce-content-body .es-BiconCorner:before{
    position: absolute;
    top: -10px;
    left: -10px;
    width: 30px;
    height: 30px;
    line-height: 30px;
    border-radius: 50%;
    text-align: center;
    background: #a83f3f;
    color: #ffffff;
    font-size: 1.5rem;
}
/*アイコン(サークル)*/
.mce-content-body .es-BiconCircle{padding-left:70px;}
.mce-content-body .es-BiconCircle:before{
	position:absolute;
	top:20px;
	left:20px;
	background: #a83f3f;
	font-size:1.5rem;
	color: #ffffff;
    text-align: center;
    vertical-align: middle;
    width: 30px;
    height: 30px;
	line-height: 30px;
    border-radius: 50%;
}


/*文字色*/
.mce-content-body .ftc-Vyellow   { color:#fff100}
.mce-content-body .ftc-Vorange   { color:#f49801}
.mce-content-body .ftc-Vred      { color:#e60112}
.mce-content-body .ftc-Vmagenta  { color:#e5004f}
.mce-content-body .ftc-Vpink     { color:#e4017f}
.mce-content-body .ftc-Vpurple   { color:#920883}
.mce-content-body .ftc-Vnavy     { color:#1c1e84}
.mce-content-body .ftc-Vblue     { color:#0068b7}
.mce-content-body .ftc-Vsky      { color:#00a0e9}
.mce-content-body .ftc-Vturquoise{ color:#009e96}
.mce-content-body .ftc-Vgreen    { color:#009944}
.mce-content-body .ftc-Vlime     { color:#8ec31f}

.mce-content-body .ftc-Byellow   { color:#fff338}
.mce-content-body .ftc-Borange   { color:#f6ad3a}
.mce-content-body .ftc-Bred      { color:#ea5532}
.mce-content-body .ftc-Bmagenta  { color:#e9536b}
.mce-content-body .ftc-Bpink     { color:#e95098}
.mce-content-body .ftc-Bpurple   { color:#a54a98}
.mce-content-body .ftc-Bnavy     { color:#4c4398}
.mce-content-body .ftc-Bblue     { color:#2b71b8}
.mce-content-body .ftc-Bsky      { color:#00b0ec}
.mce-content-body .ftc-Bturquoise{ color:#00ada9}
.mce-content-body .ftc-Bgreen    { color:#0ba95f}
.mce-content-body .ftc-Blime     { color:#a9cf52}

.mce-content-body .ftc-DPyellow   { color:#cbbd00}
.mce-content-body .ftc-DPorange   { color:#bf7601}
.mce-content-body .ftc-DPred      { color:#b60105}
.mce-content-body .ftc-DPmagenta  { color:#b5003c}
.mce-content-body .ftc-DPpink     { color:#b50165}
.mce-content-body .ftc-DPpurple   { color:#740169}
.mce-content-body .ftc-DPnavy     { color:#14116e}
.mce-content-body .ftc-DPblue     { color:#005293}
.mce-content-body .ftc-DPsky      { color:#0081ba}
.mce-content-body .ftc-DPturquoise{ color:#007f78}
.mce-content-body .ftc-DPgreen    { color:#007c36}
.mce-content-body .ftc-DPlime     { color:#6f9b12}

.mce-content-body .ftc-Lyellow   { color:#fff89a}
.mce-content-body .ftc-Lorange   { color:#fbce8a}
.mce-content-body .ftc-Lred      { color:#f39c76}
.mce-content-body .ftc-Lmagenta  { color:#f29c9f}
.mce-content-body .ftc-Lpink     { color:#f29fc3}
.mce-content-body .ftc-Lpurple   { color:#c490bf}
.mce-content-body .ftc-Lnavy     { color:#8f82bc}
.mce-content-body .ftc-Lblue     { color:#87abda}
.mce-content-body .ftc-Lsky      { color:#7ecff5}
.mce-content-body .ftc-Lturquoise{ color:#83ccc9}
.mce-content-body .ftc-Lgreen    { color:#88c997}
.mce-content-body .ftc-Llime     { color:#cce199}

.mce-content-body .ftc-DLyellow   { color:#cac04e}
.mce-content-body .ftc-DLorange   { color:#c39043}
.mce-content-body .ftc-DLred      { color:#ba5536}
.mce-content-body .ftc-DLmagenta  { color:#ba5460}
.mce-content-body .ftc-DLpink     { color:#ba5584}
.mce-content-body .ftc-DLpurple   { color:#8c4b82}
.mce-content-body .ftc-DLnavy     { color:#4e4282}
.mce-content-body .ftc-DLblue     { color:#3970a2}
.mce-content-body .ftc-DLsky      { color:#1894be}
.mce-content-body .ftc-DLturquoise{ color:#1d928f}
.mce-content-body .ftc-DLgreen    { color:#218f59}
.mce-content-body .ftc-DLlime     { color:#8ea953}

.mce-content-body .ftc-VPyellow   { color:#fffded}
.mce-content-body .ftc-VPorange   { color:#fef5e8}
.mce-content-body .ftc-VPred      { color:#feede3}
.mce-content-body .ftc-VPmagenta  { color:#fdedec}
.mce-content-body .ftc-VPpink     { color:#fdeff5}
.mce-content-body .ftc-VPpurple   { color:#f3eaf4}
.mce-content-body .ftc-VPnavy     { color:#e8e6f3}
.mce-content-body .ftc-VPblue     { color:#e9eef9}
.mce-content-body .ftc-VPsky      { color:#eaf6fe}
.mce-content-body .ftc-VPturquoise{ color:#eaf5f4}
.mce-content-body .ftc-VPgreen    { color:#ebf5eb}
.mce-content-body .ftc-VPlime     { color:#ebf5eb}

.mce-content-body .ftc-DGyellow   { color:#675f00}
.mce-content-body .ftc-DGorange   { color:#633c00}
.mce-content-body .ftc-DGred      { color:#5f0100}
.mce-content-body .ftc-DGmagenta  { color:#5f0017}
.mce-content-body .ftc-DGpink     { color:#600033}
.mce-content-body .ftc-DGpurple   { color:#3e0036}
.mce-content-body .ftc-DGnavy     { color:#08003a}
.mce-content-body .ftc-DGblue     { color:#00274f}
.mce-content-body .ftc-DGsky      { color:#004462}
.mce-content-body .ftc-DGturquoise{ color:#004340}
.mce-content-body .ftc-DGgreen    { color:#004215}
.mce-content-body .ftc-DGlime     { color:#395104}

.mce-content-body .ftc-white { color:#ffffff}
.mce-content-body .ftc-VLgray{ color:#d8d8d8}
.mce-content-body .ftc-Lgray { color:#b2b2b2}
.mce-content-body .ftc-gray  { color:#8c8c8c}
.mce-content-body .ftc-Dgray { color:#656565}
.mce-content-body .ftc-VDgray{ color:#3f3f3f}
.mce-content-body .ftc-black { color:#191919}


/*背景色*/
.mce-content-body .bgc-Vyellow   { background-color:#fff100}
.mce-content-body .bgc-Vorange   { background-color:#f49801}
.mce-content-body .bgc-Vred      { background-color:#e60112}
.mce-content-body .bgc-Vmagenta  { background-color:#e5004f}
.mce-content-body .bgc-Vpink     { background-color:#e4017f}
.mce-content-body .bgc-Vpurple   { background-color:#920883}
.mce-content-body .bgc-Vnavy     { background-color:#1c1e84}
.mce-content-body .bgc-Vblue     { background-color:#0068b7}
.mce-content-body .bgc-Vsky      { background-color:#00a0e9}
.mce-content-body .bgc-Vturquoise{ background-color:#009e96}
.mce-content-body .bgc-Vgreen    { background-color:#009944}
.mce-content-body .bgc-Vlime     { background-color:#8ec31f}

.mce-content-body .bgc-Byellow   { background-color:#fff338}
.mce-content-body .bgc-Borange   { background-color:#f6ad3a}
.mce-content-body .bgc-Bred      { background-color:#ea5532}
.mce-content-body .bgc-Bmagenta  { background-color:#e9536b}
.mce-content-body .bgc-Bpink     { background-color:#e95098}
.mce-content-body .bgc-Bpurple   { background-color:#a54a98}
.mce-content-body .bgc-Bnavy     { background-color:#4c4398}
.mce-content-body .bgc-Bblue     { background-color:#2b71b8}
.mce-content-body .bgc-Bsky      { background-color:#00b0ec}
.mce-content-body .bgc-Bturquoise{ background-color:#00ada9}
.mce-content-body .bgc-Bgreen    { background-color:#0ba95f}
.mce-content-body .bgc-Blime     { background-color:#a9cf52}

.mce-content-body .bgc-DPyellow   { background-color:#cbbd00}
.mce-content-body .bgc-DPorange   { background-color:#bf7601}
.mce-content-body .bgc-DPred      { background-color:#b60105}
.mce-content-body .bgc-DPmagenta  { background-color:#b5003c}
.mce-content-body .bgc-DPpink     { background-color:#b50165}
.mce-content-body .bgc-DPpurple   { background-color:#740169}
.mce-content-body .bgc-DPnavy     { background-color:#14116e}
.mce-content-body .bgc-DPblue     { background-color:#005293}
.mce-content-body .bgc-DPsky      { background-color:#0081ba}
.mce-content-body .bgc-DPturquoise{ background-color:#007f78}
.mce-content-body .bgc-DPgreen    { background-color:#007c36}
.mce-content-body .bgc-DPlime     { background-color:#6f9b12}

.mce-content-body .bgc-Lyellow   { background-color:#fff89a}
.mce-content-body .bgc-Lorange   { background-color:#fbce8a}
.mce-content-body .bgc-Lred      { background-color:#f39c76}
.mce-content-body .bgc-Lmagenta  { background-color:#f29c9f}
.mce-content-body .bgc-Lpink     { background-color:#f29fc3}
.mce-content-body .bgc-Lpurple   { background-color:#c490bf}
.mce-content-body .bgc-Lnavy     { background-color:#8f82bc}
.mce-content-body .bgc-Lblue     { background-color:#87abda}
.mce-content-body .bgc-Lsky      { background-color:#7ecff5}
.mce-content-body .bgc-Lturquoise{ background-color:#83ccc9}
.mce-content-body .bgc-Lgreen    { background-color:#88c997}
.mce-content-body .bgc-Llime     { background-color:#cce199}

.mce-content-body .bgc-DLyellow   { background-color:#cac04e}
.mce-content-body .bgc-DLorange   { background-color:#c39043}
.mce-content-body .bgc-DLred      { background-color:#ba5536}
.mce-content-body .bgc-DLmagenta  { background-color:#ba5460}
.mce-content-body .bgc-DLpink     { background-color:#ba5584}
.mce-content-body .bgc-DLpurple   { background-color:#8c4b82}
.mce-content-body .bgc-DLnavy     { background-color:#4e4282}
.mce-content-body .bgc-DLblue     { background-color:#3970a2}
.mce-content-body .bgc-DLsky      { background-color:#1894be}
.mce-content-body .bgc-DLturquoise{ background-color:#1d928f}
.mce-content-body .bgc-DLgreen    { background-color:#218f59}
.mce-content-body .bgc-DLlime     { background-color:#8ea953}

.mce-content-body .bgc-VPyellow   { background-color:#fffded}
.mce-content-body .bgc-VPorange   { background-color:#fef5e8}
.mce-content-body .bgc-VPred      { background-color:#feede3}
.mce-content-body .bgc-VPmagenta  { background-color:#fdedec}
.mce-content-body .bgc-VPpink     { background-color:#fdeff5}
.mce-content-body .bgc-VPpurple   { background-color:#f3eaf4}
.mce-content-body .bgc-VPnavy     { background-color:#e8e6f3}
.mce-content-body .bgc-VPblue     { background-color:#e9eef9}
.mce-content-body .bgc-VPsky      { background-color:#eaf6fe}
.mce-content-body .bgc-VPturquoise{ background-color:#eaf5f4}
.mce-content-body .bgc-VPgreen    { background-color:#ebf5eb}
.mce-content-body .bgc-VPlime     { background-color:#ebf5eb}

.mce-content-body .bgc-DGyellow   { background-color:#675f00}
.mce-content-body .bgc-DGorange   { background-color:#633c00}
.mce-content-body .bgc-DGred      { background-color:#5f0100}
.mce-content-body .bgc-DGmagenta  { background-color:#5f0017}
.mce-content-body .bgc-DGpink     { background-color:#600033}
.mce-content-body .bgc-DGpurple   { background-color:#3e0036}
.mce-content-body .bgc-DGnavy     { background-color:#08003a}
.mce-content-body .bgc-DGblue     { background-color:#00274f}
.mce-content-body .bgc-DGsky      { background-color:#004462}
.mce-content-body .bgc-DGturquoise{ background-color:#004340}
.mce-content-body .bgc-DGgreen    { background-color:#004215}
.mce-content-body .bgc-DGlime     { background-color:#395104}

.mce-content-body .bgc-white { background-color:#ffffff}
.mce-content-body .bgc-VLgray{ background-color:#d8d8d8}
.mce-content-body .bgc-Lgray { background-color:#b2b2b2}
.mce-content-body .bgc-gray  { background-color:#8c8c8c}
.mce-content-body .bgc-Dgray { background-color:#656565}
.mce-content-body .bgc-VDgray{ background-color:#3f3f3f}
.mce-content-body .bgc-black { background-color:#191919}


/*ボーダー色*/
.mce-content-body .brc-Vyellow   { border-color:#fff100}
.mce-content-body .brc-Vorange   { border-color:#f49801}
.mce-content-body .brc-Vred      { border-color:#e60112}
.mce-content-body .brc-Vmagenta  { border-color:#e5004f}
.mce-content-body .brc-Vpink     { border-color:#e4017f}
.mce-content-body .brc-Vpurple   { border-color:#920883}
.mce-content-body .brc-Vnavy     { border-color:#1c1e84}
.mce-content-body .brc-Vblue     { border-color:#0068b7}
.mce-content-body .brc-Vsky      { border-color:#00a0e9}
.mce-content-body .brc-Vturquoise{ border-color:#009e96}
.mce-content-body .brc-Vgreen    { border-color:#009944}
.mce-content-body .brc-Vlime     { border-color:#8ec31f}

.mce-content-body .brc-Byellow   { border-color:#fff338}
.mce-content-body .brc-Borange   { border-color:#f6ad3a}
.mce-content-body .brc-Bred      { border-color:#ea5532}
.mce-content-body .brc-Bmagenta  { border-color:#e9536b}
.mce-content-body .brc-Bpink     { border-color:#e95098}
.mce-content-body .brc-Bpurple   { border-color:#a54a98}
.mce-content-body .brc-Bnavy     { border-color:#4c4398}
.mce-content-body .brc-Bblue     { border-color:#2b71b8}
.mce-content-body .brc-Bsky      { border-color:#00b0ec}
.mce-content-body .brc-Bturquoise{ border-color:#00ada9}
.mce-content-body .brc-Bgreen    { border-color:#0ba95f}
.mce-content-body .brc-Blime     { border-color:#a9cf52}

.mce-content-body .brc-DPyellow   { border-color:#cbbd00}
.mce-content-body .brc-DPorange   { border-color:#bf7601}
.mce-content-body .brc-DPred      { border-color:#b60105}
.mce-content-body .brc-DPmagenta  { border-color:#b5003c}
.mce-content-body .brc-DPpink     { border-color:#b50165}
.mce-content-body .brc-DPpurple   { border-color:#740169}
.mce-content-body .brc-DPnavy     { border-color:#14116e}
.mce-content-body .brc-DPblue     { border-color:#005293}
.mce-content-body .brc-DPsky      { border-color:#0081ba}
.mce-content-body .brc-DPturquoise{ border-color:#007f78}
.mce-content-body .brc-DPgreen    { border-color:#007c36}
.mce-content-body .brc-DPlime     { border-color:#6f9b12}

.mce-content-body .brc-Lyellow   { border-color:#fff89a}
.mce-content-body .brc-Lorange   { border-color:#fbce8a}
.mce-content-body .brc-Lred      { border-color:#f39c76}
.mce-content-body .brc-Lmagenta  { border-color:#f29c9f}
.mce-content-body .brc-Lpink     { border-color:#f29fc3}
.mce-content-body .brc-Lpurple   { border-color:#c490bf}
.mce-content-body .brc-Lnavy     { border-color:#8f82bc}
.mce-content-body .brc-Lblue     { border-color:#87abda}
.mce-content-body .brc-Lsky      { border-color:#7ecff5}
.mce-content-body .brc-Lturquoise{ border-color:#83ccc9}
.mce-content-body .brc-Lgreen    { border-color:#88c997}
.mce-content-body .brc-Llime     { border-color:#cce199}

.mce-content-body .brc-DLyellow   { border-color:#cac04e}
.mce-content-body .brc-DLorange   { border-color:#c39043}
.mce-content-body .brc-DLred      { border-color:#ba5536}
.mce-content-body .brc-DLmagenta  { border-color:#ba5460}
.mce-content-body .brc-DLpink     { border-color:#ba5584}
.mce-content-body .brc-DLpurple   { border-color:#8c4b82}
.mce-content-body .brc-DLnavy     { border-color:#4e4282}
.mce-content-body .brc-DLblue     { border-color:#3970a2}
.mce-content-body .brc-DLsky      { border-color:#1894be}
.mce-content-body .brc-DLturquoise{ border-color:#1d928f}
.mce-content-body .brc-DLgreen    { border-color:#218f59}
.mce-content-body .brc-DLlime     { border-color:#8ea953}

.mce-content-body .brc-VPyellow   { border-color:#fffded}
.mce-content-body .brc-VPorange   { border-color:#fef5e8}
.mce-content-body .brc-VPred      { border-color:#feede3}
.mce-content-body .brc-VPmagenta  { border-color:#fdedec}
.mce-content-body .brc-VPpink     { border-color:#fdeff5}
.mce-content-body .brc-VPpurple   { border-color:#f3eaf4}
.mce-content-body .brc-VPnavy     { border-color:#e8e6f3}
.mce-content-body .brc-VPblue     { border-color:#e9eef9}
.mce-content-body .brc-VPsky      { border-color:#eaf6fe}
.mce-content-body .brc-VPturquoise{ border-color:#eaf5f4}
.mce-content-body .brc-VPgreen    { border-color:#ebf5eb}
.mce-content-body .brc-VPlime     { border-color:#ebf5eb}

.mce-content-body .brc-DGyellow   { border-color:#675f00}
.mce-content-body .brc-DGorange   { border-color:#633c00}
.mce-content-body .brc-DGred      { border-color:#5f0100}
.mce-content-body .brc-DGmagenta  { border-color:#5f0017}
.mce-content-body .brc-DGpink     { border-color:#600033}
.mce-content-body .brc-DGpurple   { border-color:#3e0036}
.mce-content-body .brc-DGnavy     { border-color:#08003a}
.mce-content-body .brc-DGblue     { border-color:#00274f}
.mce-content-body .brc-DGsky      { border-color:#004462}
.mce-content-body .brc-DGturquoise{ border-color:#004340}
.mce-content-body .brc-DGgreen    { border-color:#004215}
.mce-content-body .brc-DGlime     { border-color:#395104}

.mce-content-body .brc-white { border-color:#ffffff}
.mce-content-body .brc-VLgray{ border-color:#d8d8d8}
.mce-content-body .brc-Lgray { border-color:#b2b2b2}
.mce-content-body .brc-gray  { border-color:#8c8c8c}
.mce-content-body .brc-Dgray { border-color:#656565}
.mce-content-body .brc-VDgray{ border-color:#3f3f3f}
.mce-content-body .brc-black { border-color:#191919}



/*-----記事内広告-----*/
.mce-content-body .adPost {
	width:100%;
	overflow:hidden;
	padding:0 10px;
	background-color:#F2F2F2;
    background-image: linear-gradient(to top right, #fff 0%, #fff 25%, transparent 25%, transparent 50%, #fff 50%, #fff 75%, transparent 75%, transparent 100%);
    background-size: 6px 6px;
}
.mce-content-body .adPost__title{
	font-size:1.2rem;
	padding:10px 0;
	display:block;
	font-weight:normal;
	text-align:center;
}


/*-----YouTube-----*/
.mce-content-body .youtube {
	position: relative;
	padding-bottom: 56.25%;
	height: 0;
	overflow: hidden;
	max-width: 100%;
	margin:2rem auto 0 auto;
}
.mce-content-body .youtube iframe {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}


/*-----twitter & instagram-----*/
.mce-content-body .twitter-tweet,
.mce-content-body .instagram-media {
	width: 500px!important;
    max-width: 100%!important;
    margin:2rem auto 0 auto!important;
}

/*-----メディアファイル-----*/
.mce-content-body .mejs-controls div{margin: 0;}
.mce-content-body .mejs-controls .mejs-button>button{margin:10px 6px;}
.mce-content-body .mejs-controls .mejs-time-rail{margin:0 10px;}
.mce-content-body .mejs-controls .mejs-time-total{margin:5px 0 0;}


/*-----すべての最初の要素のmargin-top:0-----*/
.mce-content-body *:first-child{margin-top:0;}

/*-----すべての最初の要素のmargin-top:0の除外要素-----*/
.mce-content-body .es-Bwhole {margin-top: -20px;}



<?php

	//テーマのカラー
	if ( get_theme_mod('fit_bsStyle_themeColor') ){
		$color  = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
		echo '.heading a:hover{color:'.$color.';}';
		echo '.mce-content-body .es-LiconBox:before{background-color:'.$color.';}';
		echo '.mce-content-body .es-LiconCircle:before{background-color:'.$color.';}';
		echo '.mce-content-body .es-BTiconBox:before{background-color:'.$color.';}';
		echo '.mce-content-body .es-BTiconCircle:before{background-color:'.$color.';}';
		echo '.mce-content-body .es-BiconObi{border-color:'.$color.';}';
		echo '.mce-content-body .es-BiconCorner:before{background-color:'.$color.';}';
		echo '.mce-content-body .es-BiconCircle:before{background-color:'.$color.';}';
	}


  //吹き出しの画像サイズ
  if ( get_option('fit_partsList_balloonSize') == "big" ){
    echo '.content .balloon .balloon__img{width: 120px; height: 120px;}';
    echo '.content .balloon .balloon__img-left div {width: 120px;height: 120px;}';
    echo '.content .balloon .balloon__img-right div{width: 120px;height: 120px;}';
    echo '.content .balloon .balloon__text {max-width: calc(100% - 280px);}';
  }

  //吹き出しの画像(左)
	if ( get_theme_mod('fit_partsList_balloonImgLeft') ){
		$img = get_theme_mod( 'fit_partsList_balloonImgLeft');
		echo '.content .balloon .balloon__img-left div {background-image:url("'.$img.'");}';
	}
	//吹き出しの画像(右)
	if ( get_theme_mod('fit_partsList_balloonImgRight') ){
		$img = get_theme_mod( 'fit_partsList_balloonImgRight');
		echo '.content .balloon .balloon__img-right div {background-image:url("'.$img.'");}';
	}

	//個別ページテキストリンクのカラー
	if ( get_theme_mod('fit_bsStyle_linkColor')) {
		$color  = esc_attr( get_theme_mod( 'fit_bsStyle_linkColor' ));
		echo '.mce-content-body a{color:'.$color.';}';
		echo '.phrase a{color:'.$color.';}';
		echo '.mce-content-body .sitemap li a:hover{color:'.$color.';}';
		echo '.mce-content-body h2 a:hover,.mce-content-body h3 a:hover,.mce-content-body h4 a:hover,.mce-content-body h5 a:hover{color:'.$color.';}';
		echo '.breadcrumb__item a:hover{color:'.$color.';}';
	}elseif ( get_theme_mod('fit_bsStyle_themeColor')) {
		$color  = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
		echo '.mce-content-body a{color:'.$color.';}';
		echo '.phrase a{color:'.$color.';}';
		echo '.mce-content-body .sitemap li a:hover{color:'.$color.';}';
		echo '.mce-content-body h2 a:hover,.mce-content-body h3 a:hover,.mce-content-body h4 a:hover,.mce-content-body h5 a:hover{color:'.$color.';}';
		echo '.breadcrumb__item a:hover{color:'.$color.';}';
	}


	//個別ページその他エディタ用パーツ
		$color_icon      = '#a83f3f';
		$color_hatena    = '#005293';
		$color_excl      = '#b60105';
		$color_q         = '#005293';
		$color_a         = '#b60105';
		$color_subtitleA = '#ffffff';
		$color_subtitleB = '#b60105';
		$color_subtitleC = '#b60105';

		if(get_theme_mod( 'fit_partsEtc_icon' )){
			$color_icon = esc_attr( get_theme_mod( 'fit_partsEtc_icon' ));
		}
		if(get_theme_mod( 'fit_partsEtc_hatena' )){
			$color_hatena = esc_attr( get_theme_mod( 'fit_partsEtc_hatena' ));
		}
		if(get_theme_mod( 'fit_partsEtc_excl' )){
			$color_excl = esc_attr( get_theme_mod( 'fit_partsEtc_excl' ));
		}
		if(get_theme_mod( 'fit_partsEtc_q' )){
			$color_q = esc_attr( get_theme_mod( 'fit_partsEtc_q' ));
		}
		if(get_theme_mod( 'fit_partsEtc_a' )){
			$color_a = esc_attr( get_theme_mod( 'fit_partsEtc_a' ));
		}
		if(get_theme_mod( 'fit_partsEtc_subtitleA' )){
			$color_subtitleA = esc_attr( get_theme_mod( 'fit_partsEtc_subtitleA' ));
		}
		if(get_theme_mod( 'fit_partsEtc_subtitleB' )){
			$color_subtitleB = esc_attr( get_theme_mod( 'fit_partsEtc_subtitleB' ));
		}
		if(get_theme_mod( 'fit_partsEtc_subtitleC' )){
			$color_subtitleC = esc_attr( get_theme_mod( 'fit_partsEtc_subtitleC' ));
		}
		echo '.mce-content-body .es-LiconBox:before{background-color:'.$color_icon.';}';
		echo '.mce-content-body .es-LiconCircle:before{background-color:'.$color_icon.';}';
		echo '.mce-content-body .es-BTiconBox:before{background-color:'.$color_icon.';}';
		echo '.mce-content-body .es-BTiconCircle:before{background-color:'.$color_icon.';}';
		echo '.mce-content-body .es-BiconObi{border-color:'.$color_icon.';}';
		echo '.mce-content-body .es-BiconCorner:before{background-color:'.$color_icon.';}';
		echo '.mce-content-body .es-BiconCircle:before{background-color:'.$color_icon.';}';

		echo '.mce-content-body .es-BmarkHatena::before{background-color:'.$color_hatena.';}';
		echo '.mce-content-body .es-BmarkExcl::before{background-color:'.$color_excl.';}';
		echo '.mce-content-body .es-BmarkQ::before{background-color:'.$color_q.';}';
		echo '.mce-content-body .es-BmarkQ::after{border-top-color:'.$color_q.';}';
		echo '.mce-content-body .es-BmarkA::before{color:'.$color_a.';}';
		echo '.mce-content-body .es-BsubTradi::before{color:'.$color_subtitleA.';background-color:'.$color_subtitleB.';border-color:'.$color_subtitleC.';}';


	//共通ページプライマリーボタンのカラー
		$colorA = '#ffffff';
		$colorB = '#3f3f3f';
		if(get_theme_mod( 'fit_partsBtn_primaryColorA' )){
			$colorA = esc_attr( get_theme_mod( 'fit_partsBtn_primaryColorA' ));
		}
		if(get_theme_mod( 'fit_partsBtn_primaryColorB' )){
			$colorB = esc_attr( get_theme_mod( 'fit_partsBtn_primaryColorB' ));
		}
		echo '.btn__link-primary{color:'.$colorA.'; background-color:'.$colorB.';}';
		echo '.mce-content-body .btn__link-primary{color:'.$colorA.'; background-color:'.$colorB.';}';
		echo '.searchBtn__contentInner .btn__link-search{color:'.$colorA.'; background-color:'.$colorB.';}';


	//共通ページセカンダリーボタンのカラー
		$colorA = '#ffffff';
		$colorB = '#3f3f3f';
		if(get_theme_mod( 'fit_partsBtn_secondaryColorA' )){
			$colorA = esc_attr( get_theme_mod( 'fit_partsBtn_secondaryColorA' ));
		}
		if(get_theme_mod( 'fit_partsBtn_secondaryColorB' )){
			$colorB = esc_attr( get_theme_mod( 'fit_partsBtn_secondaryColorB' ));
		}
		echo '.btn__link-secondary{color:'.$colorA.'; background-color:'.$colorB.';}';
		echo '.mce-content-body .btn__link-secondary{color:'.$colorA.'; background-color:'.$colorB.';}';
		echo '.btn__link-search{color:'.$colorA.'; background-color:'.$colorB.';}';

	//共通ページノーマルボタンのカラー
		$colorA = '#3f3f3f';
		if(get_theme_mod( 'fit_partsBtn_normalColorA' )){
			$colorA = esc_attr( get_theme_mod( 'fit_partsBtn_normalColorA' ));
		}
		echo '.btn__link-normal{color:'.$colorA.';}';
		echo '.mce-content-body .btn__link-normal{color:'.$colorA.';}';
		echo '.btn__link-normal:hover{background-color:'.$colorA.';}';
		echo '.mce-content-body .btn__link-normal:hover{background-color:'.$colorA.';}';
		echo '.comments__list .comment-reply-link{color:'.$colorA.';}';
		echo '.comments__list .comment-reply-link:hover{background-color:'.$colorA.';}';


	//個別ページ見出し2のカラー
		$colorA = '#191919';
		$colorB = '#f2f2f2';
		$colorC = '#d8d8d8';
		$class  = 'partsH2-'.get_option('fit_partsHead_2');

		if(get_theme_mod( 'fit_partsHead_2colorA' )){
			$colorA = esc_attr( get_theme_mod( 'fit_partsHead_2colorA' ));
		}
		if(get_theme_mod( 'fit_partsHead_2colorB' )){
			$colorB = esc_attr( get_theme_mod( 'fit_partsHead_2colorB' ));
		}
		if(get_theme_mod( 'fit_partsHead_2colorC' )){
			$colorC = esc_attr( get_theme_mod( 'fit_partsHead_2colorC' ));
		}

		if ($class == 'partsH2-' || $class == 'partsH2-off'){echo '.mce-content-body h2{color:'.$colorA.'}';}
		if ($class == 'partsH2-1' ){echo '.'.$class.' h2{color:'.$colorA.'; border-color:'.$colorB.';}';}
		if ($class == 'partsH2-2' ){echo '.'.$class.' h2{color:'.$colorA.';}';}
		if ($class == 'partsH2-2' ){echo '.'.$class.' h2::after{border-color:'.$colorB.';}';}
		if ($class == 'partsH2-3' ){echo '.'.$class.' h2{color:'.$colorA.'; border-color:'.$colorB.';}';}
		if ($class == 'partsH2-4' ){echo '.'.$class.' h2{color:'.$colorA.';}';}
		if ($class == 'partsH2-4' ){echo '.'.$class.' h2::before{border-color:'.$colorB.';}';}
		if ($class == 'partsH2-4' ){echo '.'.$class.' h2::after{border-color:'.$colorC.';}';}
		if ($class == 'partsH2-5' ){echo '.'.$class.' h2{color:'.$colorA.'; background: linear-gradient(transparent 60%, '.$colorB.' 60%);}';}
		if ($class == 'partsH2-6' ){echo '.'.$class.' h2{color:'.$colorA.';}';}
		if ($class == 'partsH2-6' ){echo '.'.$class.' h2::before{border-bottom-color:'.$colorB.';}';}
		if ($class == 'partsH2-6' ){echo '.'.$class.' h2::after{border-color:'.$colorB.';}';}
		if ($class == 'partsH2-7' ){echo '.'.$class.' h2{color:'.$colorA.';}';}
		if ($class == 'partsH2-7' ){echo '.'.$class.' h2::after{background: repeating-linear-gradient(-45deg, '.$colorB.', '.$colorB.' 2px, '.$colorC.' 2px, '.$colorC.' 4px);}';}
		if ($class == 'partsH2-8' ){echo '.'.$class.' h2{color:'.$colorA.';}';}
		if ($class == 'partsH2-8' ){echo '.'.$class.' h2::after{background: linear-gradient(to right, '.$colorB.', '.$colorC.');}';}
		if ($class == 'partsH2-9' ){echo '.'.$class.' h2{color:'.$colorA.';}';}
		if ($class == 'partsH2-9' ){echo '.'.$class.' h2::after{background-color:'.$colorB.';}';}
		if ($class == 'partsH2-10'){echo '.'.$class.' h2{color:'.$colorA.'; border-color:'.$colorB.';}';}
		if ($class == 'partsH2-10'){echo '.'.$class.' h2::before{border-top-color:'.$colorB.';}';}
		if ($class == 'partsH2-11'){echo '.'.$class.' h2{color:'.$colorA.'; border-color:'.$colorB.';}';}
		if ($class == 'partsH2-12'){echo '.'.$class.' h2{color:'.$colorA.'; border-left-color:'.$colorB.'; border-bottom-color:'.$colorC.';}';}
		if ($class == 'partsH2-13'){echo '.'.$class.' h2{color:'.$colorA.'; border-left-color:'.$colorB.'; border-bottom-color:'.$colorC.';}';}
		if ($class == 'partsH2-14'){echo '.'.$class.' h2{color:'.$colorA.'; border-color:'.$colorB.';}';}
		if ($class == 'partsH2-14'){echo '.'.$class.' h2::before{background-color:'.$colorC.';}';}
		if ($class == 'partsH2-14'){echo '.'.$class.' h2::after{border-color:'.$colorC.';}';}

		if ($class == 'partsH2-21'){echo '.'.$class.' h2{color:'.$colorA.'; background-color:'.$colorB.';}';}
		if ($class == 'partsH2-22'){echo '.'.$class.' h2{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH2-23'){echo '.'.$class.' h2{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH2-24'){echo '.'.$class.' h2{color:'.$colorA.'; background-color:'.$colorB.'; border-left-color:'.$colorC.';}';}
		if ($class == 'partsH2-25'){echo '.'.$class.' h2{color:'.$colorA.'; background-color:'.$colorB.';}';}
		if ($class == 'partsH2-25'){echo '.'.$class.' h2::after{border-top-color:'.$colorB.';}';}
		if ($class == 'partsH2-26'){echo '.'.$class.' h2{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH2-26'){echo '.'.$class.' h2::before{border-top-color:'.$colorC.';}';}
		if ($class == 'partsH2-26'){echo '.'.$class.' h2::after{border-top-color:'.$colorB.';}';}
		if ($class == 'partsH2-27'){echo '.'.$class.' h2{color:'.$colorA.'; background-color:'.$colorB.';}';}
		if ($class == 'partsH2-27'){echo '.'.$class.' h2::before{border-top-color:'.$colorC.'; border-left-color:'.$colorC.';}';}
		if ($class == 'partsH2-27'){echo '.'.$class.' h2::after{border-top-color:'.$colorC.'; border-right-color:'.$colorC.';}';}
		if ($class == 'partsH2-28'){echo '.'.$class.' h2{color:'.$colorA.'; background-color:'.$colorB.'}';}
		if ($class == 'partsH2-28'){echo '.'.$class.' h2::before{border-bottom-color:'.$colorC.';}';}
		if ($class == 'partsH2-29'){echo '.'.$class.' h2{color:'.$colorA.'; background-color:'.$colorB.'; box-shadow: 0px 0px 0px 5px '.$colorB.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH2-30'){echo '.'.$class.' h2{color:'.$colorA.'; background: repeating-linear-gradient(-45deg, '.$colorB.', '.$colorB.' 3px, '.$colorC.' 3px, '.$colorC.' 7px);}';}
		if ($class == 'partsH2-31'){echo '.'.$class.' h2{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH2-32'){echo '.'.$class.' h2{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH2-33'){echo '.'.$class.' h2{color:'.$colorA.';}';}
		if ($class == 'partsH2-33'){echo '.'.$class.' h2::before{border-color:'.$colorB.';}';}
		if ($class == 'partsH2-33'){echo '.'.$class.' h2::after{border-color:'.$colorB.';}';}
		if ($class == 'partsH2-34'){echo '.'.$class.' h2{color:'.$colorA.'; border-color:'.$colorB.';}';}
		if ($class == 'partsH2-34'){echo '.'.$class.' h2::before{background-color:'.$colorB.';}';}
		if ($class == 'partsH2-34'){echo '.'.$class.' h2::after{background-color:'.$colorB.';}';}

		if ($class == 'partsH2-41'){echo '.'.$class.' h2{color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%); border-color:'.$colorC.';}';}
		if ($class == 'partsH2-42'){echo '.'.$class.' h2{color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%); border-color:'.$colorC.';}';}
		if ($class == 'partsH2-43'){echo '.'.$class.' h2{color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%); border-color:'.$colorC.';}';}
		if ($class == 'partsH2-44'){echo '.'.$class.' h2{color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%); border-color:'.$colorC.';}';}
		if ($class == 'partsH2-45'){echo '.'.$class.' h2{color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%); border-color:'.$colorC.';}';}
		if ($class == 'partsH2-46'){echo '.'.$class.' h2{color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%); border-color:'.$colorC.';}';}
		if ($class == 'partsH2-47'){echo '.'.$class.' h2{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH2-48'){echo '.'.$class.' h2{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH2-49'){echo '.'.$class.' h2{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH2-50'){echo '.'.$class.' h2{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}

		if ($class == 'partsH2-61'){echo '.'.$class.' h2{color:'.$colorA.';}';}
		if ($class == 'partsH2-61'){echo '.'.$class.' h2::after{background-color:'.$colorB.';}';}
		if ($class == 'partsH2-62'){echo '.'.$class.' h2{color:'.$colorA.'; background-color: '.$colorB.';}';}
		if ($class == 'partsH2-62'){echo '.'.$class.' h2::after{background-color:'.$colorA.';}';}
		if ($class == 'partsH2-63'){echo '.'.$class.' h2{color:'.$colorA.'; background-color: '.$colorB.'; border-color: '.$colorC.';}';}
		if ($class == 'partsH2-63'){echo '.'.$class.' h2::after{background-color:'.$colorA.';}';}
		if ($class == 'partsH2-64'){echo '.'.$class.' h2{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH2-64'){echo '.'.$class.' h2::after{background-color:'.$colorA.';}';}
		if ($class == 'partsH2-65'){echo '.'.$class.' h2{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH2-65'){echo '.'.$class.' h2::after{background-color:'.$colorA.';}';}

		if ($class == 'partsH2-71'){echo '.'.$class.' h2{color:'.$colorA.';}';}
		if ($class == 'partsH2-71'){echo '.'.$class.' h2::after{border-color:'.$colorB.';}';}
		if ($class == 'partsH2-72'){echo '.'.$class.' h2{color:'.$colorA.'; background-color: '.$colorB.';}';}
		if ($class == 'partsH2-72'){echo '.'.$class.' h2::after{border-color:'.$colorA.';}';}
		if ($class == 'partsH2-73'){echo '.'.$class.' h2{color:'.$colorA.'; background-color: '.$colorB.'; border-color: '.$colorC.';}';}
		if ($class == 'partsH2-73'){echo '.'.$class.' h2::after{border-color:'.$colorA.';}';}
		if ($class == 'partsH2-74'){echo '.'.$class.' h2{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH2-74'){echo '.'.$class.' h2::after{border-color:'.$colorA.';}';}
		if ($class == 'partsH2-75'){echo '.'.$class.' h2{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH2-75'){echo '.'.$class.' h2::after{border-color:'.$colorA.';}';}

		if ($class == 'partsH2-81'){echo '.'.$class.' h2{color:'.$colorA.';}';}
		if ($class == 'partsH2-82'){echo '.'.$class.' h2{color:'.$colorA.';}';}
		if ($class == 'partsH2-83'){echo '.'.$class.' h2{color:'.$colorA.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH2-84'){echo '.'.$class.' h2{color:'.$colorA.'; border-color:'.$colorC.';}';}

	//個別ページ見出し3のカラー
		$colorA = '#191919';
		$colorB = '#f2f2f2';
		$colorC = '#d8d8d8';
		$class  = 'partsH3-'.get_option('fit_partsHead_3');

		if(get_theme_mod( 'fit_partsHead_3colorA' )){
			$colorA = esc_attr( get_theme_mod( 'fit_partsHead_3colorA' ));
		}
		if(get_theme_mod( 'fit_partsHead_3colorB' )){
			$colorB = esc_attr( get_theme_mod( 'fit_partsHead_3colorB' ));
		}
		if(get_theme_mod( 'fit_partsHead_3colorC' )){
			$colorC = esc_attr( get_theme_mod( 'fit_partsHead_3colorC' ));
		}

		if ($class == 'partsH3-' || $class == 'partsH3-off'){echo '.mce-content-body h3{color:'.$colorA.'}';}
		if ($class == 'partsH3-1' ){echo '.'.$class.' h3{color:'.$colorA.'; border-color:'.$colorB.';}';}
		if ($class == 'partsH3-2' ){echo '.'.$class.' h3{color:'.$colorA.';}';}
		if ($class == 'partsH3-2' ){echo '.'.$class.' h3::after{border-color:'.$colorB.';}';}
		if ($class == 'partsH3-3' ){echo '.'.$class.' h3{color:'.$colorA.'; border-color:'.$colorB.';}';}
		if ($class == 'partsH3-4' ){echo '.'.$class.' h3{color:'.$colorA.';}';}
		if ($class == 'partsH3-4' ){echo '.'.$class.' h3::before{border-color:'.$colorB.';}';}
		if ($class == 'partsH3-4' ){echo '.'.$class.' h3::after{border-color:'.$colorC.';}';}
		if ($class == 'partsH3-5' ){echo '.'.$class.' h3{color:'.$colorA.'; background: linear-gradient(transparent 60%, '.$colorB.' 60%);}';}
		if ($class == 'partsH3-6' ){echo '.'.$class.' h3{color:'.$colorA.';}';}
		if ($class == 'partsH3-6' ){echo '.'.$class.' h3::before{border-bottom-color:'.$colorB.';}';}
		if ($class == 'partsH3-6' ){echo '.'.$class.' h3::after{border-color:'.$colorB.';}';}
		if ($class == 'partsH3-7' ){echo '.'.$class.' h3{color:'.$colorA.';}';}
		if ($class == 'partsH3-7' ){echo '.'.$class.' h3::after{background: repeating-linear-gradient(-45deg, '.$colorB.', '.$colorB.' 2px, '.$colorC.' 2px, '.$colorC.' 4px);}';}
		if ($class == 'partsH3-8' ){echo '.'.$class.' h3{color:'.$colorA.';}';}
		if ($class == 'partsH3-8' ){echo '.'.$class.' h3::after{background: linear-gradient(to right, '.$colorB.', '.$colorC.');}';}
		if ($class == 'partsH3-9' ){echo '.'.$class.' h3{color:'.$colorA.';}';}
		if ($class == 'partsH3-9' ){echo '.'.$class.' h3::after{background-color:'.$colorB.';}';}
		if ($class == 'partsH3-10'){echo '.'.$class.' h3{color:'.$colorA.'; border-color:'.$colorB.';}';}
		if ($class == 'partsH3-10'){echo '.'.$class.' h3::before{border-top-color:'.$colorB.';}';}
		if ($class == 'partsH3-11'){echo '.'.$class.' h3{color:'.$colorA.'; border-color:'.$colorB.';}';}
		if ($class == 'partsH3-12'){echo '.'.$class.' h3{color:'.$colorA.'; border-left-color:'.$colorB.'; border-bottom-color:'.$colorC.';}';}
		if ($class == 'partsH3-13'){echo '.'.$class.' h3{color:'.$colorA.'; border-left-color:'.$colorB.'; border-bottom-color:'.$colorC.';}';}
		if ($class == 'partsH3-14'){echo '.'.$class.' h3{color:'.$colorA.'; border-color:'.$colorB.';}';}
		if ($class == 'partsH3-14'){echo '.'.$class.' h3::before{background-color:'.$colorC.';}';}
		if ($class == 'partsH3-14'){echo '.'.$class.' h3::after{border-color:'.$colorC.';}';}

		if ($class == 'partsH3-21'){echo '.'.$class.' h3{color:'.$colorA.'; background-color:'.$colorB.';}';}
		if ($class == 'partsH3-22'){echo '.'.$class.' h3{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH3-23'){echo '.'.$class.' h3{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH3-24'){echo '.'.$class.' h3{color:'.$colorA.'; background-color:'.$colorB.'; border-left-color:'.$colorC.';}';}
		if ($class == 'partsH3-25'){echo '.'.$class.' h3{color:'.$colorA.'; background-color:'.$colorB.';}';}
		if ($class == 'partsH3-25'){echo '.'.$class.' h3::after{border-top-color:'.$colorB.';}';}
		if ($class == 'partsH3-26'){echo '.'.$class.' h3{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH3-26'){echo '.'.$class.' h3::before{border-top-color:'.$colorC.';}';}
		if ($class == 'partsH3-26'){echo '.'.$class.' h3::after{border-top-color:'.$colorB.';}';}
		if ($class == 'partsH3-27'){echo '.'.$class.' h3{color:'.$colorA.'; background-color:'.$colorB.';}';}
		if ($class == 'partsH3-27'){echo '.'.$class.' h3::before{border-top-color:'.$colorC.'; border-left-color:'.$colorC.';}';}
		if ($class == 'partsH3-27'){echo '.'.$class.' h3::after{border-top-color:'.$colorC.'; border-right-color:'.$colorC.';}';}
		if ($class == 'partsH3-28'){echo '.'.$class.' h3{color:'.$colorA.'; background-color:'.$colorB.'}';}
		if ($class == 'partsH3-28'){echo '.'.$class.' h3::before{border-bottom-color:'.$colorC.';}';}
		if ($class == 'partsH3-29'){echo '.'.$class.' h3{color:'.$colorA.'; background-color:'.$colorB.'; box-shadow: 0px 0px 0px 5px '.$colorB.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH3-30'){echo '.'.$class.' h3{color:'.$colorA.'; background: repeating-linear-gradient(-45deg, '.$colorB.', '.$colorB.' 3px, '.$colorC.' 3px, '.$colorC.' 7px);}';}
		if ($class == 'partsH3-31'){echo '.'.$class.' h3{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH3-32'){echo '.'.$class.' h3{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH3-33'){echo '.'.$class.' h3{color:'.$colorA.';}';}
		if ($class == 'partsH3-33'){echo '.'.$class.' h3::before{border-color:'.$colorB.';}';}
		if ($class == 'partsH3-33'){echo '.'.$class.' h3::after{border-color:'.$colorB.';}';}
		if ($class == 'partsH3-34'){echo '.'.$class.' h3{color:'.$colorA.'; border-color:'.$colorB.';}';}
		if ($class == 'partsH3-34'){echo '.'.$class.' h3::before{background-color:'.$colorB.';}';}
		if ($class == 'partsH3-34'){echo '.'.$class.' h3::after{background-color:'.$colorB.';}';}

		if ($class == 'partsH3-41'){echo '.'.$class.' h3{color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%); border-color:'.$colorC.';}';}
		if ($class == 'partsH3-42'){echo '.'.$class.' h3{color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%); border-color:'.$colorC.';}';}
		if ($class == 'partsH3-43'){echo '.'.$class.' h3{color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%); border-color:'.$colorC.';}';}
		if ($class == 'partsH3-44'){echo '.'.$class.' h3{color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%); border-color:'.$colorC.';}';}
		if ($class == 'partsH3-45'){echo '.'.$class.' h3{color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%); border-color:'.$colorC.';}';}
		if ($class == 'partsH3-46'){echo '.'.$class.' h3{color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%); border-color:'.$colorC.';}';}
		if ($class == 'partsH3-47'){echo '.'.$class.' h3{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH3-48'){echo '.'.$class.' h3{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH3-49'){echo '.'.$class.' h3{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH3-50'){echo '.'.$class.' h3{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}

		if ($class == 'partsH3-61'){echo '.'.$class.' h3{color:'.$colorA.';}';}
		if ($class == 'partsH3-61'){echo '.'.$class.' h3::after{background-color:'.$colorB.';}';}
		if ($class == 'partsH3-62'){echo '.'.$class.' h3{color:'.$colorA.'; background-color: '.$colorB.';}';}
		if ($class == 'partsH3-62'){echo '.'.$class.' h3::after{background-color:'.$colorA.';}';}
		if ($class == 'partsH3-63'){echo '.'.$class.' h3{color:'.$colorA.'; background-color: '.$colorB.'; border-color: '.$colorC.';}';}
		if ($class == 'partsH3-63'){echo '.'.$class.' h3::after{background-color:'.$colorA.';}';}
		if ($class == 'partsH3-64'){echo '.'.$class.' h3{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH3-64'){echo '.'.$class.' h3::after{background-color:'.$colorA.';}';}
		if ($class == 'partsH3-65'){echo '.'.$class.' h3{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH3-65'){echo '.'.$class.' h3::after{background-color:'.$colorA.';}';}

		if ($class == 'partsH3-71'){echo '.'.$class.' h3{color:'.$colorA.';}';}
		if ($class == 'partsH3-71'){echo '.'.$class.' h3::after{border-color:'.$colorB.';}';}
		if ($class == 'partsH3-72'){echo '.'.$class.' h3{color:'.$colorA.'; background-color: '.$colorB.';}';}
		if ($class == 'partsH3-72'){echo '.'.$class.' h3::after{border-color:'.$colorA.';}';}
		if ($class == 'partsH3-73'){echo '.'.$class.' h3{color:'.$colorA.'; background-color: '.$colorB.'; border-color: '.$colorC.';}';}
		if ($class == 'partsH3-73'){echo '.'.$class.' h3::after{border-color:'.$colorA.';}';}
		if ($class == 'partsH3-74'){echo '.'.$class.' h3{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH3-74'){echo '.'.$class.' h3::after{border-color:'.$colorA.';}';}
		if ($class == 'partsH3-75'){echo '.'.$class.' h3{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH3-75'){echo '.'.$class.' h3::after{border-color:'.$colorA.';}';}

		if ($class == 'partsH3-81'){echo '.'.$class.' h3{color:'.$colorA.';}';}
		if ($class == 'partsH3-82'){echo '.'.$class.' h3{color:'.$colorA.';}';}
		if ($class == 'partsH3-83'){echo '.'.$class.' h3{color:'.$colorA.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH3-84'){echo '.'.$class.' h3{color:'.$colorA.'; border-color:'.$colorC.';}';}

	//個別ページ見出し4のカラー
		$colorA = '#191919';
		$colorB = '#f2f2f2';
		$colorC = '#d8d8d8';
		$class  = 'partsH4-'.get_option('fit_partsHead_4');

		if(get_theme_mod( 'fit_partsHead_4colorA' )){
			$colorA = esc_attr( get_theme_mod( 'fit_partsHead_4colorA' ));
		}
		if(get_theme_mod( 'fit_partsHead_4colorB' )){
			$colorB = esc_attr( get_theme_mod( 'fit_partsHead_4colorB' ));
		}
		if(get_theme_mod( 'fit_partsHead_4colorC' )){
			$colorC = esc_attr( get_theme_mod( 'fit_partsHead_4colorC' ));
		}

		if ($class == 'partsH4-' || $class == 'partsH4-off'){echo '.mce-content-body h4{color:'.$colorA.'}';}
		if ($class == 'partsH4-1' ){echo '.'.$class.' h4{color:'.$colorA.'; border-color:'.$colorB.';}';}
		if ($class == 'partsH4-2' ){echo '.'.$class.' h4{color:'.$colorA.';}';}
		if ($class == 'partsH4-2' ){echo '.'.$class.' h4::after{border-color:'.$colorB.';}';}
		if ($class == 'partsH4-3' ){echo '.'.$class.' h4{color:'.$colorA.'; border-color:'.$colorB.';}';}
		if ($class == 'partsH4-4' ){echo '.'.$class.' h4{color:'.$colorA.';}';}
		if ($class == 'partsH4-4' ){echo '.'.$class.' h4::before{border-color:'.$colorB.';}';}
		if ($class == 'partsH4-4' ){echo '.'.$class.' h4::after{border-color:'.$colorC.';}';}
		if ($class == 'partsH4-5' ){echo '.'.$class.' h4{color:'.$colorA.'; background: linear-gradient(transparent 60%, '.$colorB.' 60%);}';}
		if ($class == 'partsH4-6' ){echo '.'.$class.' h4{color:'.$colorA.';}';}
		if ($class == 'partsH4-6' ){echo '.'.$class.' h4::before{border-bottom-color:'.$colorB.';}';}
		if ($class == 'partsH4-6' ){echo '.'.$class.' h4::after{border-color:'.$colorB.';}';}
		if ($class == 'partsH4-7' ){echo '.'.$class.' h4{color:'.$colorA.';}';}
		if ($class == 'partsH4-7' ){echo '.'.$class.' h4::after{background: repeating-linear-gradient(-45deg, '.$colorB.', '.$colorB.' 2px, '.$colorC.' 2px, '.$colorC.' 4px);}';}
		if ($class == 'partsH4-8' ){echo '.'.$class.' h4{color:'.$colorA.';}';}
		if ($class == 'partsH4-8' ){echo '.'.$class.' h4::after{background: linear-gradient(to right, '.$colorB.', '.$colorC.');}';}
		if ($class == 'partsH4-9' ){echo '.'.$class.' h4{color:'.$colorA.';}';}
		if ($class == 'partsH4-9' ){echo '.'.$class.' h4::after{background-color:'.$colorB.';}';}
		if ($class == 'partsH4-10'){echo '.'.$class.' h4{color:'.$colorA.'; border-color:'.$colorB.';}';}
		if ($class == 'partsH4-10'){echo '.'.$class.' h4::before{border-top-color:'.$colorB.';}';}
		if ($class == 'partsH4-11'){echo '.'.$class.' h4{color:'.$colorA.'; border-color:'.$colorB.';}';}
		if ($class == 'partsH4-12'){echo '.'.$class.' h4{color:'.$colorA.'; border-left-color:'.$colorB.'; border-bottom-color:'.$colorC.';}';}
		if ($class == 'partsH4-13'){echo '.'.$class.' h4{color:'.$colorA.'; border-left-color:'.$colorB.'; border-bottom-color:'.$colorC.';}';}
		if ($class == 'partsH4-14'){echo '.'.$class.' h4{color:'.$colorA.'; border-color:'.$colorB.';}';}
		if ($class == 'partsH4-14'){echo '.'.$class.' h4::before{background-color:'.$colorC.';}';}
		if ($class == 'partsH4-14'){echo '.'.$class.' h4::after{border-color:'.$colorC.';}';}

		if ($class == 'partsH4-21'){echo '.'.$class.' h4{color:'.$colorA.'; background-color:'.$colorB.';}';}
		if ($class == 'partsH4-22'){echo '.'.$class.' h4{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH4-23'){echo '.'.$class.' h4{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH4-24'){echo '.'.$class.' h4{color:'.$colorA.'; background-color:'.$colorB.'; border-left-color:'.$colorC.';}';}
		if ($class == 'partsH4-25'){echo '.'.$class.' h4{color:'.$colorA.'; background-color:'.$colorB.';}';}
		if ($class == 'partsH4-25'){echo '.'.$class.' h4::after{border-top-color:'.$colorB.';}';}
		if ($class == 'partsH4-26'){echo '.'.$class.' h4{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH4-26'){echo '.'.$class.' h4::before{border-top-color:'.$colorC.';}';}
		if ($class == 'partsH4-26'){echo '.'.$class.' h4::after{border-top-color:'.$colorB.';}';}
		if ($class == 'partsH4-27'){echo '.'.$class.' h4{color:'.$colorA.'; background-color:'.$colorB.';}';}
		if ($class == 'partsH4-27'){echo '.'.$class.' h4::before{border-top-color:'.$colorC.'; border-left-color:'.$colorC.';}';}
		if ($class == 'partsH4-27'){echo '.'.$class.' h4::after{border-top-color:'.$colorC.'; border-right-color:'.$colorC.';}';}
		if ($class == 'partsH4-28'){echo '.'.$class.' h4{color:'.$colorA.'; background-color:'.$colorB.'}';}
		if ($class == 'partsH4-28'){echo '.'.$class.' h4::before{border-bottom-color:'.$colorC.';}';}
		if ($class == 'partsH4-29'){echo '.'.$class.' h4{color:'.$colorA.'; background-color:'.$colorB.'; box-shadow: 0px 0px 0px 5px '.$colorB.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH4-30'){echo '.'.$class.' h4{color:'.$colorA.'; background: repeating-linear-gradient(-45deg, '.$colorB.', '.$colorB.' 3px, '.$colorC.' 3px, '.$colorC.' 7px);}';}
		if ($class == 'partsH4-31'){echo '.'.$class.' h4{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH4-32'){echo '.'.$class.' h4{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH4-33'){echo '.'.$class.' h4{color:'.$colorA.';}';}
		if ($class == 'partsH4-33'){echo '.'.$class.' h4::before{border-color:'.$colorB.';}';}
		if ($class == 'partsH4-33'){echo '.'.$class.' h4::after{border-color:'.$colorB.';}';}
		if ($class == 'partsH4-34'){echo '.'.$class.' h4{color:'.$colorA.'; border-color:'.$colorB.';}';}
		if ($class == 'partsH4-34'){echo '.'.$class.' h4::before{background-color:'.$colorB.';}';}
		if ($class == 'partsH4-34'){echo '.'.$class.' h4::after{background-color:'.$colorB.';}';}

		if ($class == 'partsH4-41'){echo '.'.$class.' h4{color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%); border-color:'.$colorC.';}';}
		if ($class == 'partsH4-42'){echo '.'.$class.' h4{color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%); border-color:'.$colorC.';}';}
		if ($class == 'partsH4-43'){echo '.'.$class.' h4{color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%); border-color:'.$colorC.';}';}
		if ($class == 'partsH4-44'){echo '.'.$class.' h4{color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%); border-color:'.$colorC.';}';}
		if ($class == 'partsH4-45'){echo '.'.$class.' h4{color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%); border-color:'.$colorC.';}';}
		if ($class == 'partsH4-46'){echo '.'.$class.' h4{color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%); border-color:'.$colorC.';}';}
		if ($class == 'partsH4-47'){echo '.'.$class.' h4{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH4-48'){echo '.'.$class.' h4{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH4-49'){echo '.'.$class.' h4{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH4-50'){echo '.'.$class.' h4{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}

		if ($class == 'partsH4-61'){echo '.'.$class.' h4{color:'.$colorA.';}';}
		if ($class == 'partsH4-61'){echo '.'.$class.' h4::after{background-color:'.$colorB.';}';}
		if ($class == 'partsH4-62'){echo '.'.$class.' h4{color:'.$colorA.'; background-color: '.$colorB.';}';}
		if ($class == 'partsH4-62'){echo '.'.$class.' h4::after{background-color:'.$colorA.';}';}
		if ($class == 'partsH4-63'){echo '.'.$class.' h4{color:'.$colorA.'; background-color: '.$colorB.'; border-color: '.$colorC.';}';}
		if ($class == 'partsH4-63'){echo '.'.$class.' h4::after{background-color:'.$colorA.';}';}
		if ($class == 'partsH4-64'){echo '.'.$class.' h4{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH4-64'){echo '.'.$class.' h4::after{background-color:'.$colorA.';}';}
		if ($class == 'partsH4-65'){echo '.'.$class.' h4{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH4-65'){echo '.'.$class.' h4::after{background-color:'.$colorA.';}';}

		if ($class == 'partsH4-71'){echo '.'.$class.' h4{color:'.$colorA.';}';}
		if ($class == 'partsH4-71'){echo '.'.$class.' h4::after{border-color:'.$colorB.';}';}
		if ($class == 'partsH4-72'){echo '.'.$class.' h4{color:'.$colorA.'; background-color: '.$colorB.';}';}
		if ($class == 'partsH4-72'){echo '.'.$class.' h4::after{border-color:'.$colorA.';}';}
		if ($class == 'partsH4-73'){echo '.'.$class.' h4{color:'.$colorA.'; background-color: '.$colorB.'; border-color: '.$colorC.';}';}
		if ($class == 'partsH4-73'){echo '.'.$class.' h4::after{border-color:'.$colorA.';}';}
		if ($class == 'partsH4-74'){echo '.'.$class.' h4{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH4-74'){echo '.'.$class.' h4::after{border-color:'.$colorA.';}';}
		if ($class == 'partsH4-75'){echo '.'.$class.' h4{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH4-75'){echo '.'.$class.' h4::after{border-color:'.$colorA.';}';}

		if ($class == 'partsH4-81'){echo '.'.$class.' h4{color:'.$colorA.';}';}
		if ($class == 'partsH4-82'){echo '.'.$class.' h4{color:'.$colorA.';}';}
		if ($class == 'partsH4-83'){echo '.'.$class.' h4{color:'.$colorA.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH4-84'){echo '.'.$class.' h4{color:'.$colorA.'; border-color:'.$colorC.';}';}

	//個別ページ見出し5のカラー
		$colorA = '#191919';
		$colorB = '#f2f2f2';
		$colorC = '#d8d8d8';
		$class  = 'partsH5-'.get_option('fit_partsHead_5');

		if(get_theme_mod( 'fit_partsHead_5colorA' )){
			$colorA = esc_attr( get_theme_mod( 'fit_partsHead_5colorA' ));
		}
		if(get_theme_mod( 'fit_partsHead_5colorB' )){
			$colorB = esc_attr( get_theme_mod( 'fit_partsHead_5colorB' ));
		}
		if(get_theme_mod( 'fit_partsHead_5colorC' )){
			$colorC = esc_attr( get_theme_mod( 'fit_partsHead_5colorC' ));
		}

		if ($class == 'partsH5-' || $class == 'partsH5-off'){echo '.mce-content-body h5{color:'.$colorA.'}';}
		if ($class == 'partsH5-1' ){echo '.'.$class.' h5{color:'.$colorA.'; border-color:'.$colorB.';}';}
		if ($class == 'partsH5-2' ){echo '.'.$class.' h5{color:'.$colorA.';}';}
		if ($class == 'partsH5-2' ){echo '.'.$class.' h5::after{border-color:'.$colorB.';}';}
		if ($class == 'partsH5-3' ){echo '.'.$class.' h5{color:'.$colorA.'; border-color:'.$colorB.';}';}
		if ($class == 'partsH5-4' ){echo '.'.$class.' h5{color:'.$colorA.';}';}
		if ($class == 'partsH5-4' ){echo '.'.$class.' h5::before{border-color:'.$colorB.';}';}
		if ($class == 'partsH5-4' ){echo '.'.$class.' h5::after{border-color:'.$colorC.';}';}
		if ($class == 'partsH5-5' ){echo '.'.$class.' h5{color:'.$colorA.'; background: linear-gradient(transparent 60%, '.$colorB.' 60%);}';}
		if ($class == 'partsH5-6' ){echo '.'.$class.' h5{color:'.$colorA.';}';}
		if ($class == 'partsH5-6' ){echo '.'.$class.' h5::before{border-bottom-color:'.$colorB.';}';}
		if ($class == 'partsH5-6' ){echo '.'.$class.' h5::after{border-color:'.$colorB.';}';}
		if ($class == 'partsH5-7' ){echo '.'.$class.' h5{color:'.$colorA.';}';}
		if ($class == 'partsH5-7' ){echo '.'.$class.' h5::after{background: repeating-linear-gradient(-45deg, '.$colorB.', '.$colorB.' 2px, '.$colorC.' 2px, '.$colorC.' 4px);}';}
		if ($class == 'partsH5-8' ){echo '.'.$class.' h5{color:'.$colorA.';}';}
		if ($class == 'partsH5-8' ){echo '.'.$class.' h5::after{background: linear-gradient(to right, '.$colorB.', '.$colorC.');}';}
		if ($class == 'partsH5-9' ){echo '.'.$class.' h5{color:'.$colorA.';}';}
		if ($class == 'partsH5-9' ){echo '.'.$class.' h5::after{background-color:'.$colorB.';}';}
		if ($class == 'partsH5-10'){echo '.'.$class.' h5{color:'.$colorA.'; border-color:'.$colorB.';}';}
		if ($class == 'partsH5-10'){echo '.'.$class.' h5::before{border-top-color:'.$colorB.';}';}
		if ($class == 'partsH5-11'){echo '.'.$class.' h5{color:'.$colorA.'; border-color:'.$colorB.';}';}
		if ($class == 'partsH5-12'){echo '.'.$class.' h5{color:'.$colorA.'; border-left-color:'.$colorB.'; border-bottom-color:'.$colorC.';}';}
		if ($class == 'partsH5-13'){echo '.'.$class.' h5{color:'.$colorA.'; border-left-color:'.$colorB.'; border-bottom-color:'.$colorC.';}';}
		if ($class == 'partsH5-14'){echo '.'.$class.' h5{color:'.$colorA.'; border-color:'.$colorB.';}';}
		if ($class == 'partsH5-14'){echo '.'.$class.' h5::before{background-color:'.$colorC.';}';}
		if ($class == 'partsH5-14'){echo '.'.$class.' h5::after{border-color:'.$colorC.';}';}

		if ($class == 'partsH5-21'){echo '.'.$class.' h5{color:'.$colorA.'; background-color:'.$colorB.';}';}
		if ($class == 'partsH5-22'){echo '.'.$class.' h5{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH5-23'){echo '.'.$class.' h5{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH5-24'){echo '.'.$class.' h5{color:'.$colorA.'; background-color:'.$colorB.'; border-left-color:'.$colorC.';}';}
		if ($class == 'partsH5-25'){echo '.'.$class.' h5{color:'.$colorA.'; background-color:'.$colorB.';}';}
		if ($class == 'partsH5-25'){echo '.'.$class.' h5::after{border-top-color:'.$colorB.';}';}
		if ($class == 'partsH5-26'){echo '.'.$class.' h5{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH5-26'){echo '.'.$class.' h5::before{border-top-color:'.$colorC.';}';}
		if ($class == 'partsH5-26'){echo '.'.$class.' h5::after{border-top-color:'.$colorB.';}';}
		if ($class == 'partsH5-27'){echo '.'.$class.' h5{color:'.$colorA.'; background-color:'.$colorB.';}';}
		if ($class == 'partsH5-27'){echo '.'.$class.' h5::before{border-top-color:'.$colorC.'; border-left-color:'.$colorC.';}';}
		if ($class == 'partsH5-27'){echo '.'.$class.' h5::after{border-top-color:'.$colorC.'; border-right-color:'.$colorC.';}';}
		if ($class == 'partsH5-28'){echo '.'.$class.' h5{color:'.$colorA.'; background-color:'.$colorB.'}';}
		if ($class == 'partsH5-28'){echo '.'.$class.' h5::before{border-bottom-color:'.$colorC.';}';}
		if ($class == 'partsH5-29'){echo '.'.$class.' h5{color:'.$colorA.'; background-color:'.$colorB.'; box-shadow: 0px 0px 0px 5px '.$colorB.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH5-30'){echo '.'.$class.' h5{color:'.$colorA.'; background: repeating-linear-gradient(-45deg, '.$colorB.', '.$colorB.' 3px, '.$colorC.' 3px, '.$colorC.' 7px);}';}
		if ($class == 'partsH5-31'){echo '.'.$class.' h5{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH5-32'){echo '.'.$class.' h5{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH5-33'){echo '.'.$class.' h5{color:'.$colorA.';}';}
		if ($class == 'partsH5-33'){echo '.'.$class.' h5::before{border-color:'.$colorB.';}';}
		if ($class == 'partsH5-33'){echo '.'.$class.' h5::after{border-color:'.$colorB.';}';}
		if ($class == 'partsH5-34'){echo '.'.$class.' h5{color:'.$colorA.'; border-color:'.$colorB.';}';}
		if ($class == 'partsH5-34'){echo '.'.$class.' h5::before{background-color:'.$colorB.';}';}
		if ($class == 'partsH5-34'){echo '.'.$class.' h5::after{background-color:'.$colorB.';}';}

		if ($class == 'partsH5-41'){echo '.'.$class.' h5{color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%); border-color:'.$colorC.';}';}
		if ($class == 'partsH5-42'){echo '.'.$class.' h5{color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%); border-color:'.$colorC.';}';}
		if ($class == 'partsH5-43'){echo '.'.$class.' h5{color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%); border-color:'.$colorC.';}';}
		if ($class == 'partsH5-44'){echo '.'.$class.' h5{color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%); border-color:'.$colorC.';}';}
		if ($class == 'partsH5-45'){echo '.'.$class.' h5{color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%); border-color:'.$colorC.';}';}
		if ($class == 'partsH5-46'){echo '.'.$class.' h5{color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%); border-color:'.$colorC.';}';}
		if ($class == 'partsH5-47'){echo '.'.$class.' h5{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH5-48'){echo '.'.$class.' h5{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH5-49'){echo '.'.$class.' h5{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH5-50'){echo '.'.$class.' h5{border-color:'.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}

		if ($class == 'partsH5-61'){echo '.'.$class.' h5{color:'.$colorA.';}';}
		if ($class == 'partsH5-61'){echo '.'.$class.' h5::after{background-color:'.$colorB.';}';}
		if ($class == 'partsH5-62'){echo '.'.$class.' h5{color:'.$colorA.'; background-color: '.$colorB.';}';}
		if ($class == 'partsH5-62'){echo '.'.$class.' h5::after{background-color:'.$colorA.';}';}
		if ($class == 'partsH5-63'){echo '.'.$class.' h5{color:'.$colorA.'; background-color: '.$colorB.'; border-color: '.$colorC.';}';}
		if ($class == 'partsH5-63'){echo '.'.$class.' h5::after{background-color:'.$colorA.';}';}
		if ($class == 'partsH5-64'){echo '.'.$class.' h5{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH5-64'){echo '.'.$class.' h5::after{background-color:'.$colorA.';}';}
		if ($class == 'partsH5-65'){echo '.'.$class.' h5{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH5-65'){echo '.'.$class.' h5::after{background-color:'.$colorA.';}';}

		if ($class == 'partsH5-71'){echo '.'.$class.' h5{color:'.$colorA.';}';}
		if ($class == 'partsH5-71'){echo '.'.$class.' h5::after{border-color:'.$colorB.';}';}
		if ($class == 'partsH5-72'){echo '.'.$class.' h5{color:'.$colorA.'; background-color: '.$colorB.';}';}
		if ($class == 'partsH5-72'){echo '.'.$class.' h5::after{border-color:'.$colorA.';}';}
		if ($class == 'partsH5-73'){echo '.'.$class.' h5{color:'.$colorA.'; background-color: '.$colorB.'; border-color: '.$colorC.';}';}
		if ($class == 'partsH5-73'){echo '.'.$class.' h5::after{border-color:'.$colorA.';}';}
		if ($class == 'partsH5-74'){echo '.'.$class.' h5{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH5-74'){echo '.'.$class.' h5::after{border-color:'.$colorA.';}';}
		if ($class == 'partsH5-75'){echo '.'.$class.' h5{border-color: '.$colorC.'; border-top-color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
		if ($class == 'partsH5-75'){echo '.'.$class.' h5::after{border-color:'.$colorA.';}';}

		if ($class == 'partsH5-81'){echo '.'.$class.' h5{color:'.$colorA.';}';}
		if ($class == 'partsH5-82'){echo '.'.$class.' h5{color:'.$colorA.';}';}
		if ($class == 'partsH5-83'){echo '.'.$class.' h5{color:'.$colorA.'; border-color:'.$colorC.';}';}
		if ($class == 'partsH5-84'){echo '.'.$class.' h5{color:'.$colorA.'; border-color:'.$colorC.';}';}

	//個別ページulリストのカラー
		$colorA = '#a83f3f';
		$colorB = '#191919';
		$colorC = '#f2f2f2';
		$class  = 'partsUl-'.get_option('fit_partsList_ul');

		if(get_theme_mod( 'fit_partsList_ulColorA' )){
			$colorA = esc_attr( get_theme_mod( 'fit_partsList_ulColorA' ));
		}
		if(get_theme_mod( 'fit_partsList_ulColorB' )){
			$colorB = esc_attr( get_theme_mod( 'fit_partsList_ulColorB' ));
		}
		if(get_theme_mod( 'fit_partsList_ulColorC' )){
			$colorC = esc_attr( get_theme_mod( 'fit_partsList_ulColorC' ));
		}

		echo '.mce-content-body ul > li::before{color:'.$colorA.';}';

		if ($class == 'partsUl-' || $class == 'partsUl-off' ){echo '.mce-content-body ul{color:'.$colorB.';}';}
		if ($class == 'partsUl-1' ){echo '.'.$class.' ul{color:'.$colorB.'; background-color:'.$colorC.';}';}
		if ($class == 'partsUl-2' ){echo '.'.$class.' ul{border-color:'.$colorB.'; background-color:'.$colorC.'; box-shadow: 0px 0px 0px 5px '.$colorC.';}';}
		if ($class == 'partsUl-3' ){echo '.'.$class.' ul{color:'.$colorB.'; background-color:'.$colorC.';}';}
		if ($class == 'partsUl-4' ){echo '.'.$class.' ul{color:'.$colorB.'; background-color:'.$colorC.';}';}
		if ($class == 'partsUl-5' ){echo '.'.$class.' ul{border-color:'.$colorB.'; background-color:'.$colorC.';}';}
		if ($class == 'partsUl-6' ){echo '.'.$class.' ul{border-color:'.$colorB.'; background-color:'.$colorC.';}';}
		if ($class == 'partsUl-7' ){echo '.'.$class.' ul{color:'.$colorB.'; border-color:'.$colorC.';}';}
		if ($class == 'partsUl-7' ){echo '.'.$class.' ul::before{background-color:'.$colorC.';}';}
		if ($class == 'partsUl-7' ){echo '.'.$class.' ul::after{background-color:'.$colorC.';}';}

	//個別ページolリストのカラー
		$colorA = '#a83f3f';
		$colorB = '#191919';
		$colorC = '#f2f2f2';
		$class  = 'partsOl-'.get_option('fit_partsList_ol');

		if(get_theme_mod( 'fit_partsList_olColorA' )){
			$colorA = esc_attr( get_theme_mod( 'fit_partsList_olColorA' ));
		}
		if(get_theme_mod( 'fit_partsList_olColorB' )){
			$colorB = esc_attr( get_theme_mod( 'fit_partsList_olColorB' ));
		}
		if(get_theme_mod( 'fit_partsList_olColorC' )){
			$colorC = esc_attr( get_theme_mod( 'fit_partsList_olColorC' ));
		}

		echo '.mce-content-body ol > li::before{color:'.$colorA.'; border-color:'.$colorA.';}';
		echo '.mce-content-body ol > li > ol > li::before{background-color:'.$colorA.'; border-color:'.$colorA.';}';
		echo '.mce-content-body ol > li > ol > li > ol > li::before{color:'.$colorA.'; border-color:'.$colorA.';}';

		if ($class == 'partsOl-' || $class == 'partsOl-off' ){echo '.mce-content-body ol{color:'.$colorB.';}';}
		if ($class == 'partsOl-1' ){echo '.'.$class.' ol{color:'.$colorB.'; background-color:'.$colorC.';}';}
		if ($class == 'partsOl-2' ){echo '.'.$class.' ol{border-color:'.$colorB.'; background-color:'.$colorC.'; box-shadow: 0px 0px 0px 5px '.$colorC.';}';}
		if ($class == 'partsOl-3' ){echo '.'.$class.' ol{color:'.$colorB.'; background-color:'.$colorC.';}';}
		if ($class == 'partsOl-4' ){echo '.'.$class.' ol{color:'.$colorB.'; background-color:'.$colorC.';}';}
		if ($class == 'partsOl-5' ){echo '.'.$class.' ol{border-color:'.$colorB.'; background-color:'.$colorC.';}';}
		if ($class == 'partsOl-6' ){echo '.'.$class.' ol{border-color:'.$colorB.'; background-color:'.$colorC.';}';}
		if ($class == 'partsOl-7' ){echo '.'.$class.' ol{color:'.$colorB.'; border-color:'.$colorC.';}';}
		if ($class == 'partsOl-7' ){echo '.'.$class.' ol::before{background-color:'.$colorC.';}';}
		if ($class == 'partsOl-7' ){echo '.'.$class.' ol::after{background-color:'.$colorC.';}';}

	//個別ページ吹き出しのカラー
		$colorA = '#191919';
		$colorB = '#f2f2f2';
		$colorC = '#191919';
		$colorD = '#ffffff';
		$colorE = '#d8d8d8';

		if(get_theme_mod( 'fit_partsList_balloonBgColorA' )){
			$colorA = esc_attr( get_theme_mod( 'fit_partsList_balloonBgColorA' ));
		}
		if(get_theme_mod( 'fit_partsList_balloonBgColorB' )){
			$colorB = esc_attr( get_theme_mod( 'fit_partsList_balloonBgColorB' ));
		}
		if(get_theme_mod( 'fit_partsList_balloonBrColorA' )){
			$colorC = esc_attr( get_theme_mod( 'fit_partsList_balloonBrColorA' ));
		}
		if(get_theme_mod( 'fit_partsList_balloonBrColorB' )){
			$colorD = esc_attr( get_theme_mod( 'fit_partsList_balloonBrColorB' ));
		}
		if(get_theme_mod( 'fit_partsList_balloonBrColorC' )){
			$colorE = esc_attr( get_theme_mod( 'fit_partsList_balloonBrColorC' ));
		}
		echo '.mce-content-body .balloon .balloon__text{color:'.$colorA.'; background-color:'.$colorB.';}';
		echo '.mce-content-body .balloon .balloon__text-left:before{border-left-color:'.$colorB.';}';
		echo '.mce-content-body .balloon .balloon__text-right:before{border-right-color:'.$colorB.';}';

		echo '.mce-content-body .balloon-boder .balloon__text{color:'.$colorC.'; background-color:'.$colorD.';  border-color:'.$colorE.';}';
		echo '.mce-content-body .balloon-boder .balloon__text-left:before{border-left-color:'.$colorE.';}';
		echo '.mce-content-body .balloon-boder .balloon__text-left:after{border-left-color:'.$colorD.';}';
		echo '.mce-content-body .balloon-boder .balloon__text-right:before{border-right-color:'.$colorE.';}';
		echo '.mce-content-body .balloon-boder .balloon__text-right:after{border-right-color:'.$colorD.';}';

	//個別ページ引用のカラー
		$colorA = '#191919';
		$colorB = '#f2f2f2';
		$colorC = '#d8d8d8';
		$colorD = '#cccccc';
		$class  = 'partsQuote-'.get_option('fit_partsList_quote');

		if(get_theme_mod( 'fit_partsList_quoteColorA' )){
			$colorA = esc_attr( get_theme_mod( 'fit_partsList_quoteColorA' ));
		}
		if(get_theme_mod( 'fit_partsList_quoteColorB' )){
			$colorB = esc_attr( get_theme_mod( 'fit_partsList_quoteColorB' ));
		}
		if(get_theme_mod( 'fit_partsList_quoteColorC' )){
			$colorC = esc_attr( get_theme_mod( 'fit_partsList_quoteColorC' ));
		}
		if(get_theme_mod( 'fit_partsList_quoteColorD' )){
			$colorD = esc_attr( get_theme_mod( 'fit_partsList_quoteColorD' ));
		}

		if ($class == 'partsQuote-' || $class == 'partsQuote-off'){echo '.mce-content-body blockquote{color:'.$colorA.'; background-color:'.$colorB.';}';}
		if ($class == 'partsQuote-' || $class == 'partsQuote-off'){echo '.mce-content-body blockquote::before{color:'.$colorC.';}';}

		if ($class == 'partsQuote-1' ){echo '.mce-content-body blockquote{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorD.';}';}
		if ($class == 'partsQuote-1' ){echo '.mce-content-body blockquote::before{color:'.$colorC.';}';}

		if ($class == 'partsQuote-2' ){echo '.mce-content-body blockquote{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorD.';}';}
		if ($class == 'partsQuote-2' ){echo '.mce-content-body blockquote::before{color:'.$colorC.';}';}

		if ($class == 'partsQuote-3' ){echo '.mce-content-body blockquote{color:'.$colorA.'; background-color:'.$colorB.';}';}
		if ($class == 'partsQuote-3' ){echo '.mce-content-body blockquote::before{color:'.$colorC.';}';}

		if ($class == 'partsQuote-4' ){echo '.mce-content-body blockquote{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorD.';}';}
		if ($class == 'partsQuote-4' ){echo '.mce-content-body blockquote::before{color:'.$colorC.';}';}
		if ($class == 'partsQuote-4' ){echo '.mce-content-body blockquote::after{background-color:'.$colorD.';}';}

		if ($class == 'partsQuote-5' ){echo '.mce-content-body blockquote{color:'.$colorA.'; background-color:'.$colorB.'; border-color:'.$colorD.';}';}
		if ($class == 'partsQuote-5' ){echo '.mce-content-body blockquote::before{color:'.$colorC.';}';}

		if ($class == 'partsQuote-6' ){echo '.mce-content-body blockquote{color:'.$colorA.'; background-color:'.$colorB.';}';}
		if ($class == 'partsQuote-6' ){echo '.mce-content-body blockquote::before{background-color:'.$colorC.';}';}
		if ($class == 'partsQuote-6' ){echo '.mce-content-body blockquote::after{border-bottom-color:'.$colorD.';}';}

	//個別ページテーブルのカラー
		$colorA = '#191919';
		$colorB = '#E5E5E5';
		$colorC = '#7f7f7f';
		$colorD = '#ffffff';
		$colorE = '#ffffff';
		$colorF = '#f2f2f2';

		if(get_theme_mod( 'fit_partsList_tableColorA' )){
			$colorA = esc_attr( get_theme_mod( 'fit_partsList_tableColorA' ));
		}
		if(get_theme_mod( 'fit_partsList_tableColorB' )){
			$colorB = esc_attr( get_theme_mod( 'fit_partsList_tableColorB' ));
		}
		if(get_theme_mod( 'fit_partsList_tableColorC' )){
			$colorC = esc_attr( get_theme_mod( 'fit_partsList_tableColorC' ));
		}
		if(get_theme_mod( 'fit_partsList_tableColorD' )){
			$colorD = esc_attr( get_theme_mod( 'fit_partsList_tableColorD' ));
		}
		if(get_theme_mod( 'fit_partsList_tableColorE' )){
			$colorE = esc_attr( get_theme_mod( 'fit_partsList_tableColorE' ));
		}
		if(get_theme_mod( 'fit_partsList_tableColorF' )){
			$colorF = esc_attr( get_theme_mod( 'fit_partsList_tableColorF' ));
		}

		echo '.mce-content-body table{color:'.$colorA.'; border-top-color:'.$colorB.'; border-left-color:'.$colorB.';}';
		echo '.mce-content-body table th{background:'.$colorC.'; color:'.$colorD.'; ;border-right-color:'.$colorB.'; border-bottom-color:'.$colorB.';}';
		echo '.mce-content-body table td{background:'.$colorE.'; ;border-right-color:'.$colorB.'; border-bottom-color:'.$colorB.';}';
		echo '.mce-content-body table tr:nth-child(odd) td{background-color:'.$colorF.';}';

?>
