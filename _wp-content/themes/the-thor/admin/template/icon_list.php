<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="wp-toolbar"  lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ICON一覧</title>
<link rel="stylesheet" href="../../css/icon.min.css" type="text/css" media="all" />
</head>
<body>


<style type="text/css">
<!--
body{ background:#191919;}
#wpwrap {
    height: auto;
    min-height: 100%;
    width: 100%;
    position: relative;
    -webkit-font-smoothing: subpixel-antialiased;
}
#layer {
    display: none;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0,0,0,0.7);
    z-index: 9999;
}
#popup {
    position: fixed;
    top: 30px;
    bottom: 30px;
    left: 30px;
    right: 30px;
    background-color: white;
    z-index: 9999;
}

.media-modal-content {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    overflow: auto;
    min-height: 300px;
    box-shadow: 0 5px 15px rgba(0,0,0,.7);
    background: #fcfcfc;
    -webkit-font-smoothing: subpixel-antialiased;
}
.media-frame {
    overflow: hidden;
	position: absolute;
    left: 0;
	right: 0;
    bottom: 0;
    top: 0;
	font-size: 12px;
    -webkit-overflow-scrolling: touch;
}

.media-frame-menu {
	position: absolute;
    left: 0;
    bottom: 0;
    top: 0;
    width: 200px;
    z-index: 150;
}
.media-menu {
    position: absolute;
    left: 0;
	top: 0;
    bottom: 0;
    margin: 0;
    padding: 10px 0;
    border-right-width: 1px;
    border-right-style: solid;
    border-right-color: #ccc;
    user-select: none;
}
.media-frame-title {
    top: 0;
    height: 50px;
	position: absolute;
    left: 200px;
    right: 0;
    z-index: 200;
}

.media-frame-content-icon {
    display: none;
    overflow: hidden;
}
.media-frame-content {
	position: absolute;
    top: 84px;
    bottom: 61px;
	left: 200px;
	right: 0;
    width: auto;
	height: auto;
    margin: 0;
    overflow: auto;
    background: #fff;
    border-top: 1px solid #ddd;
}
.attachments-browser {
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden;
}
.attachments-browser .attachments,
.attachments-browser .uploader-inline {
    position: absolute;
    top: 50px;
    left: 0;
    right: 300px;
    bottom: 0;
    overflow: auto;
    outline: 0;
}
.attachments-browser .attachments {
    padding: 2px 8px 8px;
}
.wp-core-ui .attachment {
    position: relative;
    float: left;
    padding: 8px;
    margin: 0;
    color: #444;
    cursor: pointer;
    list-style: none;
    text-align: center;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    width: 25%;
    box-sizing: border-box;
}
.media-frame input[type=text]{
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
    font-size: 12px;
    border-width: 1px;
    border-style: solid;
    border-color: #ddd;
	box-shadow: inset 0 1px 2px rgba(0,0,0,.07);
	color: #32373c;
	margin: 1px;
	padding: 6px 8px;
}





ul.attachments-icon{right:0 !important;}
li.attachment-icon{display:flex;align-items: center;flex-wrap: wrap; }
li.attachment-icon i{ font-size:26px; margin-right:10px;min-width: 50px;}

input[name="icon-menu"] {
	display: none;
}

.icon-menu-label{
	font-size: 14px;
    text-decoration: none;
	display: block;
    position: relative;
    padding: 8px 20px;
    margin: 0;
    color: #0073aa;
}
.icon-menu-label:hover{
	background: rgba(0,0,0,.04);
}

#icon-basic:checked ~ div label[for="icon-basic"],
#icon-mono:checked ~ div label[for="icon-mono"],
#icon-load:checked ~ div label[for="icon-load"],
#icon-audio:checked ~ div label[for="icon-audio"],
#icon-logo:checked ~ div label[for="icon-logo"],
#icon-face:checked ~ div label[for="icon-face"],
#icon-arrow:checked ~ div label[for="icon-arrow"]{color: #23282d; font-weight: 600;}

.media-frame-content-icon {
	display: none;
	overflow: hidden;
}
#icon-basic:checked ~ #basic-content,
#icon-mono:checked  ~ #mono-content,
#icon-load:checked  ~ #load-content,
#icon-audio:checked ~ #audio-content,
#icon-logo:checked  ~ #logo-content,
#icon-face:checked  ~ #face-content,
#icon-arrow:checked ~ #arrow-content {
  display: block;
}
-->
</style>


<div id="wpwrap">
  <div id="layer"></div>
  <div id="popup">


  <div class="media-modal-content">
    <div class="media-frame mode-select wp-core-ui" id="__wp-uploader-id-0">

      <input id="icon-basic" type="radio" name="icon-menu" checked>
      <input id="icon-mono" type="radio" name="icon-menu">
      <input id="icon-load" type="radio" name="icon-menu">
      <input id="icon-audio" type="radio" name="icon-menu">
      <input id="icon-face" type="radio" name="icon-menu">
      <input id="icon-arrow" type="radio" name="icon-menu">
      <input id="icon-logo" type="radio" name="icon-menu">
      <div class="media-frame-menu">
        <div class="media-menu">
          <label class="icon-menu-label" for="icon-basic">基本アイコン</label>
          <label class="icon-menu-label" for="icon-mono">建物・乗り物アイコン</label>
          <label class="icon-menu-label" for="icon-load">読込・AV機器アイコン</label>
          <label class="icon-menu-label" for="icon-audio">オーディオ系アイコン</label>
          <label class="icon-menu-label" for="icon-face">人・顔アイコン</label>
          <label class="icon-menu-label" for="icon-arrow">矢印・コメントアイコン</label>
          <label class="icon-menu-label" for="icon-logo">ロゴアイコン</label>
        </div>
      </div>

      <div class="media-frame-title">
        <h1>アイコン一覧<span class="dashicons dashicons-arrow-down"></span></h1>
      </div>



      <div class="media-frame-content media-frame-content-icon" id="basic-content">
        <div class="attachments-browser">

          <ul class="attachments ui-sortable ui-sortable-disabled attachments-icon" >
                <li class="attachment attachment-icon"><i class="icon-quotation"></i><input type="text" value="icon-quotation"></li>
                <li class="attachment attachment-icon"><i class="icon-quotation2"></i><input type="text" value="icon-quotation2"></li>
                <li class="attachment attachment-icon"><i class="icon-newspaper"></i><input type="text" value="icon-newspaper"></li>
                <li class="attachment attachment-icon"><i class="icon-pencil"></i><input type="text" value="icon-pencil"></li>
                <li class="attachment attachment-icon"><i class="icon-pencil2"></i><input type="text" value="icon-pencil2"></li>
                <li class="attachment attachment-icon"><i class="icon-quill"></i><input type="text" value="icon-quill"></li>
                <li class="attachment attachment-icon"><i class="icon-pen"></i><input type="text" value="icon-pen"></li>
                <li class="attachment attachment-icon"><i class="icon-blog"></i><input type="text" value="icon-blog"></li>
                <li class="attachment attachment-icon"><i class="icon-eyedropper"></i><input type="text" value="icon-eyedropper"></li>
                <li class="attachment attachment-icon"><i class="icon-droplet"></i><input type="text" value="icon-droplet"></li>
                <li class="attachment attachment-icon"><i class="icon-paint-format"></i><input type="text" value="icon-paint-format"></li>
                <li class="attachment attachment-icon"><i class="icon-image"></i><input type="text" value="icon-image"></li>
                <li class="attachment attachment-icon"><i class="icon-images"></i><input type="text" value="icon-images"></li>
                <li class="attachment attachment-icon"><i class="icon-film"></i><input type="text" value="icon-film"></li>
                <li class="attachment attachment-icon"><i class="icon-dice"></i><input type="text" value="icon-dice"></li>
                <li class="attachment attachment-icon"><i class="icon-bullhorn"></i><input type="text" value="icon-bullhorn"></li>
                <li class="attachment attachment-icon"><i class="icon-book"></i><input type="text" value="icon-book"></li>
                <li class="attachment attachment-icon"><i class="icon-books"></i><input type="text" value="icon-books"></li>
                <li class="attachment attachment-icon"><i class="icon-cart"></i><input type="text" value="icon-cart"></li>
                <li class="attachment attachment-icon"><i class="icon-credit-card"></i><input type="text" value="icon-credit-card"></li>
                <li class="attachment attachment-icon"><i class="icon-lifebuoy"></i><input type="text" value="icon-lifebuoy"></li>
                <li class="attachment attachment-icon"><i class="icon-phone"></i><input type="text" value="icon-phone"></li>
                <li class="attachment attachment-icon"><i class="icon-phone-hang-up"></i><input type="text" value="icon-phone-hang-up"></li>
                <li class="attachment attachment-icon"><i class="icon-address-book"></i><input type="text" value="icon-address-book"></li>
                <li class="attachment attachment-icon"><i class="icon-music"></i><input type="text" value="icon-music"></li>
                <li class="attachment attachment-icon"><i class="icon-play"></i><input type="text" value="icon-play"></li>
                <li class="attachment attachment-icon"><i class="icon-pacman"></i><input type="text" value="icon-pacman"></li>
                <li class="attachment attachment-icon"><i class="icon-spades"></i><input type="text" value="icon-spades"></li>
                <li class="attachment attachment-icon"><i class="icon-clubs"></i><input type="text" value="icon-clubs"></li>
                <li class="attachment attachment-icon"><i class="icon-diamonds"></i><input type="text" value="icon-diamonds"></li>
                <li class="attachment attachment-icon"><i class="icon-heart"></i><input type="text" value="icon-heart"></li>
                <li class="attachment attachment-icon"><i class="icon-heart-broken"></i><input type="text" value="icon-heart-broken"></li>
                <li class="attachment attachment-icon"><i class="icon-star-empty"></i><input type="text" value="icon-star-empty"></li>
                <li class="attachment attachment-icon"><i class="icon-star-half"></i><input type="text" value="icon-star-half"></li>
                <li class="attachment attachment-icon"><i class="icon-star-full"></i><input type="text" value="icon-star-full"></li>
                <li class="attachment attachment-icon"><i class="icon-connection"></i><input type="text" value="icon-connection"></li>
                <li class="attachment attachment-icon"><i class="icon-podcast"></i><input type="text" value="icon-podcast"></li>
                <li class="attachment attachment-icon"><i class="icon-feed"></i><input type="text" value="icon-feed"></li>
                <li class="attachment attachment-icon"><i class="icon-file-text"></i><input type="text" value="icon-file-text"></li>
                <li class="attachment attachment-icon"><i class="icon-file-text2"></i><input type="text" value="icon-file-text2"></li>
                <li class="attachment attachment-icon"><i class="icon-profile"></i><input type="text" value="icon-profile"></li>
                <li class="attachment attachment-icon"><i class="icon-file-empty"></i><input type="text" value="icon-file-empty"></li>
                <li class="attachment attachment-icon"><i class="icon-files-empty"></i><input type="text" value="icon-files-empty"></li>
                <li class="attachment attachment-icon"><i class="icon-file-picture"></i><input type="text" value="icon-file-picture"></li>
                <li class="attachment attachment-icon"><i class="icon-file-music"></i><input type="text" value="icon-file-music"></li>
                <li class="attachment attachment-icon"><i class="icon-file-play"></i><input type="text" value="icon-file-play"></li>
                <li class="attachment attachment-icon"><i class="icon-file-video"></i><input type="text" value="icon-file-video"></li>
                <li class="attachment attachment-icon"><i class="icon-file-zip"></i><input type="text" value="icon-file-zip"></li>
                <li class="attachment attachment-icon"><i class="icon-copy"></i><input type="text" value="icon-copy"></li>
                <li class="attachment attachment-icon"><i class="icon-paste"></i><input type="text" value="icon-paste"></li>
                <li class="attachment attachment-icon"><i class="icon-stack"></i><input type="text" value="icon-stack"></li>
                <li class="attachment attachment-icon"><i class="icon-folder"></i><input type="text" value="icon-folder"></li>
                <li class="attachment attachment-icon"><i class="icon-folder-open"></i><input type="text" value="icon-folder-open"></li>
                <li class="attachment attachment-icon"><i class="icon-folder-plus"></i><input type="text" value="icon-folder-plus"></li>
                <li class="attachment attachment-icon"><i class="icon-folder-minus"></i><input type="text" value="icon-folder-minus"></li>
                <li class="attachment attachment-icon"><i class="icon-folder-download"></i><input type="text" value="icon-folder-download"></li>
                <li class="attachment attachment-icon"><i class="icon-folder-upload"></i><input type="text" value="icon-folder-upload"></li>
                <li class="attachment attachment-icon"><i class="icon-tag"></i><input type="text" value="icon-tag"></li>
                <li class="attachment attachment-icon"><i class="icon-price-tags"></i><input type="text" value="icon-price-tags"></li>
                <li class="attachment attachment-icon"><i class="icon-barcode"></i><input type="text" value="icon-barcode"></li>
                <li class="attachment attachment-icon"><i class="icon-qrcode"></i><input type="text" value="icon-qrcode"></li>
                <li class="attachment attachment-icon"><i class="icon-ticket"></i><input type="text" value="icon-ticket"></li>
                <li class="attachment attachment-icon"><i class="icon-coin-dollar"></i><input type="text" value="icon-coin-dollar"></li>
                <li class="attachment attachment-icon"><i class="icon-coin-euro"></i><input type="text" value="icon-coin-euro"></li>
                <li class="attachment attachment-icon"><i class="icon-coin-pound"></i><input type="text" value="icon-coin-pound"></li>
                <li class="attachment attachment-icon"><i class="icon-coin-yen"></i><input type="text" value="icon-coin-yen"></li>
                <li class="attachment attachment-icon"><i class="icon-calculator"></i><input type="text" value="icon-calculator"></li>
                <li class="attachment attachment-icon"><i class="icon-pushpin"></i><input type="text" value="icon-pushpin"></li>
                <li class="attachment attachment-icon"><i class="icon-location"></i><input type="text" value="icon-location"></li>
                <li class="attachment attachment-icon"><i class="icon-location2"></i><input type="text" value="icon-location2"></li>
                <li class="attachment attachment-icon"><i class="icon-map"></i><input type="text" value="icon-map"></li>
                <li class="attachment attachment-icon"><i class="icon-map2"></i><input type="text" value="icon-map2"></li>
                <li class="attachment attachment-icon"><i class="icon-update"></i><input type="text" value="icon-update"></li>
                <li class="attachment attachment-icon"><i class="icon-clock"></i><input type="text" value="icon-clock"></li>
                <li class="attachment attachment-icon"><i class="icon-clock2"></i><input type="text" value="icon-clock2"></li>
                <li class="attachment attachment-icon"><i class="icon-alarm"></i><input type="text" value="icon-alarm"></li>
                <li class="attachment attachment-icon"><i class="icon-bell"></i><input type="text" value="icon-bell"></li>
                <li class="attachment attachment-icon"><i class="icon-stopwatch"></i><input type="text" value="icon-stopwatch"></li>
                <li class="attachment attachment-icon"><i class="icon-calendar"></i><input type="text" value="icon-calendar"></li>
                <li class="attachment attachment-icon"><i class="icon-drawer"></i><input type="text" value="icon-drawer"></li>
                <li class="attachment attachment-icon"><i class="icon-drawer2"></i><input type="text" value="icon-drawer2"></li>
                <li class="attachment attachment-icon"><i class="icon-box-add"></i><input type="text" value="icon-box-add"></li>
                <li class="attachment attachment-icon"><i class="icon-box-remove"></i><input type="text" value="icon-box-remove"></li>
                <li class="attachment attachment-icon"><i class="icon-floppy-disk"></i><input type="text" value="icon-floppy-disk"></li>
                <li class="attachment attachment-icon"><i class="icon-drive"></i><input type="text" value="icon-drive"></li>
                <li class="attachment attachment-icon"><i class="icon-database"></i><input type="text" value="icon-database"></li>
                <li class="attachment attachment-icon"><i class="icon-hour-glass"></i><input type="text" value="icon-hour-glass"></li>
                <li class="attachment attachment-icon"><i class="icon-zoom-in"></i><input type="text" value="icon-zoom-in"></li>
                <li class="attachment attachment-icon"><i class="icon-zoom-out"></i><input type="text" value="icon-zoom-out"></li>
                <li class="attachment attachment-icon"><i class="icon-enlarge"></i><input type="text" value="icon-enlarge"></li>
                <li class="attachment attachment-icon"><i class="icon-enlarge2"></i><input type="text" value="icon-enlarge2"></li>
                <li class="attachment attachment-icon"><i class="icon-shrink"></i><input type="text" value="icon-shrink"></li>
                <li class="attachment attachment-icon"><i class="icon-shrink2"></i><input type="text" value="icon-shrink2"></li>
                <li class="attachment attachment-icon"><i class="icon-key"></i><input type="text" value="icon-key"></li>
                <li class="attachment attachment-icon"><i class="icon-key2"></i><input type="text" value="icon-key2"></li>
                <li class="attachment attachment-icon"><i class="icon-lock"></i><input type="text" value="icon-lock"></li>
                <li class="attachment attachment-icon"><i class="icon-unlocked"></i><input type="text" value="icon-unlocked"></li>
                <li class="attachment attachment-icon"><i class="icon-wrench"></i><input type="text" value="icon-wrench"></li>
                <li class="attachment attachment-icon"><i class="icon-equalizer"></i><input type="text" value="icon-equalizer"></li>
                <li class="attachment attachment-icon"><i class="icon-equalizer2"></i><input type="text" value="icon-equalizer2"></li>
                <li class="attachment attachment-icon"><i class="icon-hammer"></i><input type="text" value="icon-hammer"></li>
                <li class="attachment attachment-icon"><i class="icon-hammer2"></i><input type="text" value="icon-hammer2"></li>
                <li class="attachment attachment-icon"><i class="icon-magic-wand"></i><input type="text" value="icon-magic-wand"></li>
                <li class="attachment attachment-icon"><i class="icon-aid-kit"></i><input type="text" value="icon-aid-kit"></li>
                <li class="attachment attachment-icon"><i class="icon-bug"></i><input type="text" value="icon-bug"></li>
                <li class="attachment attachment-icon"><i class="icon-pie-chart"></i><input type="text" value="icon-pie-chart"></li>
                <li class="attachment attachment-icon"><i class="icon-stats-dots"></i><input type="text" value="icon-stats-dots"></li>
                <li class="attachment attachment-icon"><i class="icon-stats-bars"></i><input type="text" value="icon-stats-bars"></li>
                <li class="attachment attachment-icon"><i class="icon-stats-bars2"></i><input type="text" value="icon-stats-bars2"></li>
                <li class="attachment attachment-icon"><i class="icon-trophy"></i><input type="text" value="icon-trophy"></li>
                <li class="attachment attachment-icon"><i class="icon-gift"></i><input type="text" value="icon-gift"></li>
                <li class="attachment attachment-icon"><i class="icon-glass"></i><input type="text" value="icon-glass"></li>
                <li class="attachment attachment-icon"><i class="icon-glass2"></i><input type="text" value="icon-glass2"></li>
                <li class="attachment attachment-icon"><i class="icon-meter"></i><input type="text" value="icon-meter"></li>
                <li class="attachment attachment-icon"><i class="icon-meter2"></i><input type="text" value="icon-meter2"></li>
                <li class="attachment attachment-icon"><i class="icon-fire"></i><input type="text" value="icon-fire"></li>
                <li class="attachment attachment-icon"><i class="icon-lab"></i><input type="text" value="icon-lab"></li>
                <li class="attachment attachment-icon"><i class="icon-magnet"></i><input type="text" value="icon-magnet"></li>
                <li class="attachment attachment-icon"><i class="icon-bin"></i><input type="text" value="icon-bin"></li>
                <li class="attachment attachment-icon"><i class="icon-bin2"></i><input type="text" value="icon-bin2"></li>
                <li class="attachment attachment-icon"><i class="icon-briefcase"></i><input type="text" value="icon-briefcase"></li>
                <li class="attachment attachment-icon"><i class="icon-shield"></i><input type="text" value="icon-shield"></li>
                <li class="attachment attachment-icon"><i class="icon-road"></i><input type="text" value="icon-road"></li>
                <li class="attachment attachment-icon"><i class="icon-power"></i><input type="text" value="icon-power"></li>
                <li class="attachment attachment-icon"><i class="icon-power-cord"></i><input type="text" value="icon-power-cord"></li>
                <li class="attachment attachment-icon"><i class="icon-switch"></i><input type="text" value="icon-switch"></li>
                <li class="attachment attachment-icon"><i class="icon-list-numbered"></i><input type="text" value="icon-list-numbered"></li>
                <li class="attachment attachment-icon"><i class="icon-list"></i><input type="text" value="icon-list"></li>
                <li class="attachment attachment-icon"><i class="icon-list2"></i><input type="text" value="icon-list2"></li>
                <li class="attachment attachment-icon"><i class="icon-menu"></i><input type="text" value="icon-menu"></li>
                <li class="attachment attachment-icon"><i class="icon-menu2"></i><input type="text" value="icon-menu2"></li>
                <li class="attachment attachment-icon"><i class="icon-menu3"></i><input type="text" value="icon-menu3"></li>
                <li class="attachment attachment-icon"><i class="icon-menu4"></i><input type="text" value="icon-menu4"></li>
                <li class="attachment attachment-icon"><i class="icon-menu5"></i><input type="text" value="icon-menu5"></li>
                <li class="attachment attachment-icon"><i class="icon-new"></i><input type="text" value="icon-new"></li>
                <li class="attachment attachment-icon"><i class="icon-close"></i><input type="text" value="icon-close"></li>
                <li class="attachment attachment-icon"><i class="icon-compass"></i><input type="text" value="icon-compass"></li>
                <li class="attachment attachment-icon"><i class="icon-compass2"></i><input type="text" value="icon-compass2"></li>
                <li class="attachment attachment-icon"><i class="icon-view_card"></i><input type="text" value="icon-view_card"></li>
                <li class="attachment attachment-icon"><i class="icon-view_wide"></i><input type="text" value="icon-view_wide"></li>
                <li class="attachment attachment-icon"><i class="icon-view_normal"></i><input type="text" value="icon-view_normal"></li>
                <li class="attachment attachment-icon"><i class="icon-binoculars"></i><input type="text" value="icon-binoculars"></li>
                <li class="attachment attachment-icon"><i class="icon-search"></i><input type="text" value="icon-search"></li>
                <li class="attachment attachment-icon"><i class="icon-search2"></i><input type="text" value="icon-search2"></li>
                <li class="attachment attachment-icon"><i class="icon-cog"></i><input type="text" value="icon-cog"></li>
                <li class="attachment attachment-icon"><i class="icon-cup"></i><input type="text" value="icon-cup"></li>
                <li class="attachment attachment-icon"><i class="icon-spoon-knife"></i><input type="text" value="icon-spoon-knife"></li>
                <li class="attachment attachment-icon"><i class="icon-leaf"></i><input type="text" value="icon-leaf"></li>
                <li class="attachment attachment-icon"><i class="icon-accessibility"></i><input type="text" value="icon-accessibility"></li>
                <li class="attachment attachment-icon"><i class="icon-target"></i><input type="text" value="icon-target"></li>
                <li class="attachment attachment-icon"><i class="icon-clipboard"></i><input type="text" value="icon-clipboard"></li>
                <li class="attachment attachment-icon"><i class="icon-tree"></i><input type="text" value="icon-tree"></li>
                <li class="attachment attachment-icon"><i class="icon-cloud"></i><input type="text" value="icon-cloud"></li>
                <li class="attachment attachment-icon"><i class="icon-cloud-download"></i><input type="text" value="icon-cloud-download"></li>
                <li class="attachment attachment-icon"><i class="icon-cloud-upload"></i><input type="text" value="icon-cloud-upload"></li>
                <li class="attachment attachment-icon"><i class="icon-cloud-check"></i><input type="text" value="icon-cloud-check"></li>
                <li class="attachment attachment-icon"><i class="icon-download"></i><input type="text" value="icon-download"></li>
                <li class="attachment attachment-icon"><i class="icon-download2"></i><input type="text" value="icon-download2"></li>
                <li class="attachment attachment-icon"><i class="icon-download3"></i><input type="text" value="icon-download3"></li>
                <li class="attachment attachment-icon"><i class="icon-upload"></i><input type="text" value="icon-upload"></li>
                <li class="attachment attachment-icon"><i class="icon-upload2"></i><input type="text" value="icon-upload2"></li>
                <li class="attachment attachment-icon"><i class="icon-upload3"></i><input type="text" value="icon-upload3"></li>
                <li class="attachment attachment-icon"><i class="icon-sphere"></i><input type="text" value="icon-sphere"></li>
                <li class="attachment attachment-icon"><i class="icon-earth"></i><input type="text" value="icon-earth"></li>
                <li class="attachment attachment-icon"><i class="icon-link"></i><input type="text" value="icon-link"></li>
                <li class="attachment attachment-icon"><i class="icon-flag"></i><input type="text" value="icon-flag"></li>
                <li class="attachment attachment-icon"><i class="icon-attachment"></i><input type="text" value="icon-attachment"></li>
                <li class="attachment attachment-icon"><i class="icon-eye"></i><input type="text" value="icon-eye"></li>
                <li class="attachment attachment-icon"><i class="icon-eye-plus"></i><input type="text" value="icon-eye-plus"></li>
                <li class="attachment attachment-icon"><i class="icon-eye-minus"></i><input type="text" value="icon-eye-minus"></li>
                <li class="attachment attachment-icon"><i class="icon-eye-blocked"></i><input type="text" value="icon-eye-blocked"></li>
                <li class="attachment attachment-icon"><i class="icon-bookmark"></i><input type="text" value="icon-bookmark"></li>
                <li class="attachment attachment-icon"><i class="icon-bookmarks"></i><input type="text" value="icon-bookmarks"></li>
                <li class="attachment attachment-icon"><i class="icon-sun"></i><input type="text" value="icon-sun"></li>
                <li class="attachment attachment-icon"><i class="icon-contrast"></i><input type="text" value="icon-contrast"></li>
                <li class="attachment attachment-icon"><i class="icon-brightness-contrast"></i><input type="text" value="icon-brightness-contrast"></li>
                <li class="attachment attachment-icon"><i class="icon-warning"></i><input type="text" value="icon-warning"></li>
                <li class="attachment attachment-icon"><i class="icon-notification"></i><input type="text" value="icon-notification"></li>
                <li class="attachment attachment-icon"><i class="icon-question"></i><input type="text" value="icon-question"></li>
                <li class="attachment attachment-icon"><i class="icon-plus"></i><input type="text" value="icon-plus"></li>
                <li class="attachment attachment-icon"><i class="icon-minus"></i><input type="text" value="icon-minus"></li>
                <li class="attachment attachment-icon"><i class="icon-info"></i><input type="text" value="icon-info"></li>
                <li class="attachment attachment-icon"><i class="icon-cancel-circle"></i><input type="text" value="icon-cancel-circle"></li>
                <li class="attachment attachment-icon"><i class="icon-blocked"></i><input type="text" value="icon-blocked"></li>
                <li class="attachment attachment-icon"><i class="icon-cross"></i><input type="text" value="icon-cross"></li>
                <li class="attachment attachment-icon"><i class="icon-checkmark"></i><input type="text" value="icon-checkmark"></li>
                <li class="attachment attachment-icon"><i class="icon-checkmark2"></i><input type="text" value="icon-checkmark2"></li>
                <li class="attachment attachment-icon"><i class="icon-spell-check"></i><input type="text" value="icon-spell-check"></li>
                <li class="attachment attachment-icon"><i class="icon-enter"></i><input type="text" value="icon-enter"></li>
                <li class="attachment attachment-icon"><i class="icon-exit"></i><input type="text" value="icon-exit"></li>
                <li class="attachment attachment-icon"><i class="icon-tab"></i><input type="text" value="icon-tab"></li>
                <li class="attachment attachment-icon"><i class="icon-move-up"></i><input type="text" value="icon-move-up"></li>
                <li class="attachment attachment-icon"><i class="icon-move-down"></i><input type="text" value="icon-move-down"></li>
                <li class="attachment attachment-icon"><i class="icon-sort-alpha-asc"></i><input type="text" value="icon-sort-alpha-asc"></li>
                <li class="attachment attachment-icon"><i class="icon-sort-alpha-desc"></i><input type="text" value="icon-sort-alpha-desc"></li>
                <li class="attachment attachment-icon"><i class="icon-sort-numeric-asc"></i><input type="text" value="icon-sort-numeric-asc"></li>
                <li class="attachment attachment-icon"><i class="icon-sort-numberic-desc"></i><input type="text" value="icon-sort-numberic-desc"></li>
                <li class="attachment attachment-icon"><i class="icon-sort-amount-asc"></i><input type="text" value="icon-sort-amount-asc"></li>
                <li class="attachment attachment-icon"><i class="icon-sort-amount-desc"></i><input type="text" value="icon-sort-amount-desc"></li>
                <li class="attachment attachment-icon"><i class="icon-command"></i><input type="text" value="icon-command"></li>
                <li class="attachment attachment-icon"><i class="icon-shift"></i><input type="text" value="icon-shift"></li>
                <li class="attachment attachment-icon"><i class="icon-ctrl"></i><input type="text" value="icon-ctrl"></li>
                <li class="attachment attachment-icon"><i class="icon-opt"></i><input type="text" value="icon-opt"></li>
                <li class="attachment attachment-icon"><i class="icon-checkbox-checked"></i><input type="text" value="icon-checkbox-checked"></li>
                <li class="attachment attachment-icon"><i class="icon-checkbox-unchecked"></i><input type="text" value="icon-checkbox-unchecked"></li>
                <li class="attachment attachment-icon"><i class="icon-radio-checked"></i><input type="text" value="icon-radio-checked"></li>
                <li class="attachment attachment-icon"><i class="icon-radio-checked2"></i><input type="text" value="icon-radio-checked2"></li>
                <li class="attachment attachment-icon"><i class="icon-radio-unchecked"></i><input type="text" value="icon-radio-unchecked"></li>
                <li class="attachment attachment-icon"><i class="icon-crop"></i><input type="text" value="icon-crop"></li>
                <li class="attachment attachment-icon"><i class="icon-make-group"></i><input type="text" value="icon-make-group"></li>
                <li class="attachment attachment-icon"><i class="icon-ungroup"></i><input type="text" value="icon-ungroup"></li>
                <li class="attachment attachment-icon"><i class="icon-scissors"></i><input type="text" value="icon-scissors"></li>
                <li class="attachment attachment-icon"><i class="icon-filter"></i><input type="text" value="icon-filter"></li>
                <li class="attachment attachment-icon"><i class="icon-font"></i><input type="text" value="icon-font"></li>
                <li class="attachment attachment-icon"><i class="icon-ligature"></i><input type="text" value="icon-ligature"></li>
                <li class="attachment attachment-icon"><i class="icon-ligature2"></i><input type="text" value="icon-ligature2"></li>
                <li class="attachment attachment-icon"><i class="icon-text-height"></i><input type="text" value="icon-text-height"></li>
                <li class="attachment attachment-icon"><i class="icon-text-width"></i><input type="text" value="icon-text-width"></li>
                <li class="attachment attachment-icon"><i class="icon-font-size"></i><input type="text" value="icon-font-size"></li>
                <li class="attachment attachment-icon"><i class="icon-bold"></i><input type="text" value="icon-bold"></li>
                <li class="attachment attachment-icon"><i class="icon-underline"></i><input type="text" value="icon-underline"></li>
                <li class="attachment attachment-icon"><i class="icon-italic"></i><input type="text" value="icon-italic"></li>
                <li class="attachment attachment-icon"><i class="icon-strikethrough"></i><input type="text" value="icon-strikethrough"></li>
                <li class="attachment attachment-icon"><i class="icon-omega"></i><input type="text" value="icon-omega"></li>
                <li class="attachment attachment-icon"><i class="icon-sigma"></i><input type="text" value="icon-sigma"></li>
                <li class="attachment attachment-icon"><i class="icon-page-break"></i><input type="text" value="icon-page-break"></li>
                <li class="attachment attachment-icon"><i class="icon-superscript"></i><input type="text" value="icon-superscript"></li>
                <li class="attachment attachment-icon"><i class="icon-superscript2"></i><input type="text" value="icon-superscript2"></li>
                <li class="attachment attachment-icon"><i class="icon-subscript"></i><input type="text" value="icon-subscript"></li>
                <li class="attachment attachment-icon"><i class="icon-subscript2"></i><input type="text" value="icon-subscript2"></li>
                <li class="attachment attachment-icon"><i class="icon-text-color"></i><input type="text" value="icon-text-color"></li>
                <li class="attachment attachment-icon"><i class="icon-pagebreak"></i><input type="text" value="icon-pagebreak"></li>
                <li class="attachment attachment-icon"><i class="icon-clear-formatting"></i><input type="text" value="icon-clear-formatting"></li>
                <li class="attachment attachment-icon"><i class="icon-table"></i><input type="text" value="icon-table"></li>
                <li class="attachment attachment-icon"><i class="icon-table2"></i><input type="text" value="icon-table2"></li>
                <li class="attachment attachment-icon"><i class="icon-insert-template"></i><input type="text" value="icon-insert-template"></li>
                <li class="attachment attachment-icon"><i class="icon-pilcrow"></i><input type="text" value="icon-pilcrow"></li>
                <li class="attachment attachment-icon"><i class="icon-ltr"></i><input type="text" value="icon-ltr"></li>
                <li class="attachment attachment-icon"><i class="icon-rtl"></i><input type="text" value="icon-rtl"></li>
                <li class="attachment attachment-icon"><i class="icon-section"></i><input type="text" value="icon-section"></li>
                <li class="attachment attachment-icon"><i class="icon-paragraph-left"></i><input type="text" value="icon-paragraph-left"></li>
                <li class="attachment attachment-icon"><i class="icon-paragraph-center"></i><input type="text" value="icon-paragraph-center"></li>
                <li class="attachment attachment-icon"><i class="icon-paragraph-right"></i><input type="text" value="icon-paragraph-right"></li>
                <li class="attachment attachment-icon"><i class="icon-paragraph-justify"></i><input type="text" value="icon-paragraph-justify"></li>
                <li class="attachment attachment-icon"><i class="icon-indent-increase"></i><input type="text" value="icon-indent-increase"></li>
                <li class="attachment attachment-icon"><i class="icon-indent-decrease"></i><input type="text" value="icon-indent-decrease"></li>
                <li class="attachment attachment-icon"><i class="icon-share"></i><input type="text" value="icon-share"></li>
                <li class="attachment attachment-icon"><i class="icon-share2"></i><input type="text" value="icon-share2"></li>
                <li class="attachment attachment-icon"><i class="icon-new-tab"></i><input type="text" value="icon-new-tab"></li>
                <li class="attachment attachment-icon"><i class="icon-embed"></i><input type="text" value="icon-embed"></li>
                <li class="attachment attachment-icon"><i class="icon-embed2"></i><input type="text" value="icon-embed2"></li>
                <li class="attachment attachment-icon"><i class="icon-terminal"></i><input type="text" value="icon-terminal"></li>
                <li class="attachment attachment-icon"><i class="icon-cogs"></i><input type="text" value="icon-cogs"></li>
                <li class="attachment attachment-icon"><i class="icon-mail"></i><input type="text" value="icon-mail"></li>
                <li class="attachment attachment-icon"><i class="icon-mail2"></i><input type="text" value="icon-mail2"></li>
                <li class="attachment attachment-icon"><i class="icon-mail3"></i><input type="text" value="icon-mail3"></li>
                <li class="attachment attachment-icon"><i class="icon-mail4"></i><input type="text" value="icon-mail4"></li>
                <li class="attachment attachment-icon"><i class="icon-mail5"></i><input type="text" value="icon-mail5"></li>

          </ul>



        </div>
      </div>


      <div class="media-frame-content media-frame-content-icon" id="mono-content">
        <div class="attachments-browser">
          <ul class="attachments ui-sortable ui-sortable-disabled attachments-icon" >
                <li class="attachment attachment-icon"><i class="icon-home"></i><input type="text" value="icon-home"></li>
                <li class="attachment attachment-icon"><i class="icon-home2"></i><input type="text" value="icon-home2"></li>
                <li class="attachment attachment-icon"><i class="icon-home3"></i><input type="text" value="icon-home3"></li>
                <li class="attachment attachment-icon"><i class="icon-office"></i><input type="text" value="icon-office"></li>
                <li class="attachment attachment-icon"><i class="icon-library"></i><input type="text" value="icon-library"></li>
                <li class="attachment attachment-icon"><i class="icon-rocket"></i><input type="text" value="icon-rocket"></li>
                <li class="attachment attachment-icon"><i class="icon-airplane"></i><input type="text" value="icon-airplane"></li>
                <li class="attachment attachment-icon"><i class="icon-truck"></i><input type="text" value="icon-truck"></li>

          </ul>
        </div>
      </div>

      <div class="media-frame-content media-frame-content-icon" id="load-content">
        <div class="attachments-browser">
          <ul class="attachments ui-sortable ui-sortable-disabled attachments-icon" >
                <li class="attachment attachment-icon"><i class="icon-loop2"></i><input type="text" value="icon-loop2"></li>
                <li class="attachment attachment-icon"><i class="icon-spinner"></i><input type="text" value="icon-spinner"></li>
                <li class="attachment attachment-icon"><i class="icon-spinner2"></i><input type="text" value="icon-spinner2"></li>
                <li class="attachment attachment-icon"><i class="icon-spinner3"></i><input type="text" value="icon-spinner3"></li>
                <li class="attachment attachment-icon"><i class="icon-spinner4"></i><input type="text" value="icon-spinner4"></li>
                <li class="attachment attachment-icon"><i class="icon-spinner5"></i><input type="text" value="icon-spinner5"></li>
                <li class="attachment attachment-icon"><i class="icon-spinner6"></i><input type="text" value="icon-spinner6"></li>
                <li class="attachment attachment-icon"><i class="icon-spinner7"></i><input type="text" value="icon-spinner7"></li>
                <li class="attachment attachment-icon"><i class="icon-spinner8"></i><input type="text" value="icon-spinner8"></li>
                <li class="attachment attachment-icon"><i class="icon-spinner9"></i><input type="text" value="icon-spinner9"></li>
                <li class="attachment attachment-icon"><i class="icon-spinner10"></i><input type="text" value="icon-spinner10"></li>
                <li class="attachment attachment-icon"><i class="icon-spinner11"></i><input type="text" value="icon-spinner11"></li>
                <li class="attachment attachment-icon"><i class="icon-display"></i><input type="text" value="icon-display"></li>
                <li class="attachment attachment-icon"><i class="icon-laptop"></i><input type="text" value="icon-laptop"></li>
                <li class="attachment attachment-icon"><i class="icon-mobile"></i><input type="text" value="icon-mobile"></li>
                <li class="attachment attachment-icon"><i class="icon-mobile2"></i><input type="text" value="icon-mobile2"></li>
                <li class="attachment attachment-icon"><i class="icon-tablet"></i><input type="text" value="icon-tablet"></li>
                <li class="attachment attachment-icon"><i class="icon-tv"></i><input type="text" value="icon-tv"></li>
                <li class="attachment attachment-icon"><i class="icon-camera"></i><input type="text" value="icon-camera"></li>
                <li class="attachment attachment-icon"><i class="icon-headphones"></i><input type="text" value="icon-headphones"></li>
                <li class="attachment attachment-icon"><i class="icon-video-camera"></i><input type="text" value="icon-video-camera"></li>
                <li class="attachment attachment-icon"><i class="icon-mic"></i><input type="text" value="icon-mic"></li>
                <li class="attachment attachment-icon"><i class="icon-printer"></i><input type="text" value="icon-printer"></li>
                <li class="attachment attachment-icon"><i class="icon-keyboard"></i><input type="text" value="icon-keyboard"></li>

          </ul>
        </div>
      </div>



      <div class="media-frame-content media-frame-content-icon" id="audio-content">
        <div class="attachments-browser">
          <ul class="attachments ui-sortable ui-sortable-disabled attachments-icon" >
                <li class="attachment attachment-icon"><i class="icon-play2"></i><input type="text" value="icon-play2"></li>
                <li class="attachment attachment-icon"><i class="icon-play3"></i><input type="text" value="icon-play3"></li>
                <li class="attachment attachment-icon"><i class="icon-pause"></i><input type="text" value="icon-pause"></li>
                <li class="attachment attachment-icon"><i class="icon-pause2"></i><input type="text" value="icon-pause2"></li>
                <li class="attachment attachment-icon"><i class="icon-stop"></i><input type="text" value="icon-stop"></li>
                <li class="attachment attachment-icon"><i class="icon-stop2"></i><input type="text" value="icon-stop2"></li>
                <li class="attachment attachment-icon"><i class="icon-previous"></i><input type="text" value="icon-previous"></li>
                <li class="attachment attachment-icon"><i class="icon-previous2"></i><input type="text" value="icon-previous2"></li>
                <li class="attachment attachment-icon"><i class="icon-next"></i><input type="text" value="icon-next"></li>
                <li class="attachment attachment-icon"><i class="icon-next2"></i><input type="text" value="icon-next2"></li>
                <li class="attachment attachment-icon"><i class="icon-backward"></i><input type="text" value="icon-backward"></li>
                <li class="attachment attachment-icon"><i class="icon-backward2"></i><input type="text" value="icon-backward2"></li>
                <li class="attachment attachment-icon"><i class="icon-first"></i><input type="text" value="icon-first"></li>
                <li class="attachment attachment-icon"><i class="icon-forward2"></i><input type="text" value="icon-forward2"></li>
                <li class="attachment attachment-icon"><i class="icon-forward3"></i><input type="text" value="icon-forward3"></li>
                <li class="attachment attachment-icon"><i class="icon-last"></i><input type="text" value="icon-last"></li>
                <li class="attachment attachment-icon"><i class="icon-eject"></i><input type="text" value="icon-eject"></li>
                <li class="attachment attachment-icon"><i class="icon-volume-high"></i><input type="text" value="icon-volume-high"></li>
                <li class="attachment attachment-icon"><i class="icon-volume-medium"></i><input type="text" value="icon-volume-medium"></li>
                <li class="attachment attachment-icon"><i class="icon-volume-low"></i><input type="text" value="icon-volume-low"></li>
                <li class="attachment attachment-icon"><i class="icon-volume-mute"></i><input type="text" value="icon-volume-mute"></li>
                <li class="attachment attachment-icon"><i class="icon-volume-mute2"></i><input type="text" value="icon-volume-mute2"></li>
                <li class="attachment attachment-icon"><i class="icon-volume-increase"></i><input type="text" value="icon-volume-increase"></li>
                <li class="attachment attachment-icon"><i class="icon-volume-decrease"></i><input type="text" value="icon-volume-decrease"></li>
                <li class="attachment attachment-icon"><i class="icon-loop"></i><input type="text" value="icon-loop"></li>
                <li class="attachment attachment-icon"><i class="icon-infinite"></i><input type="text" value="icon-infinite"></li>
                <li class="attachment attachment-icon"><i class="icon-shuffle"></i><input type="text" value="icon-shuffle"></li>

          </ul>
        </div>
      </div>





      <div class="media-frame-content media-frame-content-icon" id="face-content">
        <div class="attachments-browser">
          <ul class="attachments ui-sortable ui-sortable-disabled attachments-icon" >
                <li class="attachment attachment-icon"><i class="icon-user"></i><input type="text" value="icon-user"></li>
                <li class="attachment attachment-icon"><i class="icon-users"></i><input type="text" value="icon-users"></li>
                <li class="attachment attachment-icon"><i class="icon-user-plus"></i><input type="text" value="icon-user-plus"></li>
                <li class="attachment attachment-icon"><i class="icon-user-minus"></i><input type="text" value="icon-user-minus"></li>
                <li class="attachment attachment-icon"><i class="icon-user-check"></i><input type="text" value="icon-user-check"></li>
                <li class="attachment attachment-icon"><i class="icon-user-tie"></i><input type="text" value="icon-user-tie"></li>
                <li class="attachment attachment-icon"><i class="icon-man"></i><input type="text" value="icon-man"></li>
                <li class="attachment attachment-icon"><i class="icon-woman"></i><input type="text" value="icon-woman"></li>
                <li class="attachment attachment-icon"><i class="icon-man-woman"></i><input type="text" value="icon-man-woman"></li>
                <li class="attachment attachment-icon"><i class="icon-happy"></i><input type="text" value="icon-happy"></li>
                <li class="attachment attachment-icon"><i class="icon-happy2"></i><input type="text" value="icon-happy2"></li>
                <li class="attachment attachment-icon"><i class="icon-smile"></i><input type="text" value="icon-smile"></li>
                <li class="attachment attachment-icon"><i class="icon-smile2"></i><input type="text" value="icon-smile2"></li>
                <li class="attachment attachment-icon"><i class="icon-tongue"></i><input type="text" value="icon-tongue"></li>
                <li class="attachment attachment-icon"><i class="icon-tongue2"></i><input type="text" value="icon-tongue2"></li>
                <li class="attachment attachment-icon"><i class="icon-sad"></i><input type="text" value="icon-sad"></li>
                <li class="attachment attachment-icon"><i class="icon-sad2"></i><input type="text" value="icon-sad2"></li>
                <li class="attachment attachment-icon"><i class="icon-wink"></i><input type="text" value="icon-wink"></li>
                <li class="attachment attachment-icon"><i class="icon-wink2"></i><input type="text" value="icon-wink2"></li>
                <li class="attachment attachment-icon"><i class="icon-grin"></i><input type="text" value="icon-grin"></li>
                <li class="attachment attachment-icon"><i class="icon-grin2"></i><input type="text" value="icon-grin2"></li>
                <li class="attachment attachment-icon"><i class="icon-cool"></i><input type="text" value="icon-cool"></li>
                <li class="attachment attachment-icon"><i class="icon-cool2"></i><input type="text" value="icon-cool2"></li>
                <li class="attachment attachment-icon"><i class="icon-angry"></i><input type="text" value="icon-angry"></li>
                <li class="attachment attachment-icon"><i class="icon-angry2"></i><input type="text" value="icon-angry2"></li>
                <li class="attachment attachment-icon"><i class="icon-evil"></i><input type="text" value="icon-evil"></li>
                <li class="attachment attachment-icon"><i class="icon-evil2"></i><input type="text" value="icon-evil2"></li>
                <li class="attachment attachment-icon"><i class="icon-shocked"></i><input type="text" value="icon-shocked"></li>
                <li class="attachment attachment-icon"><i class="icon-shocked2"></i><input type="text" value="icon-shocked2"></li>
                <li class="attachment attachment-icon"><i class="icon-baffled"></i><input type="text" value="icon-baffled"></li>
                <li class="attachment attachment-icon"><i class="icon-baffled2"></i><input type="text" value="icon-baffled2"></li>
                <li class="attachment attachment-icon"><i class="icon-confused"></i><input type="text" value="icon-confused"></li>
                <li class="attachment attachment-icon"><i class="icon-confused2"></i><input type="text" value="icon-confused2"></li>
                <li class="attachment attachment-icon"><i class="icon-neutral"></i><input type="text" value="icon-neutral"></li>
                <li class="attachment attachment-icon"><i class="icon-neutral2"></i><input type="text" value="icon-neutral2"></li>
                <li class="attachment attachment-icon"><i class="icon-hipster"></i><input type="text" value="icon-hipster"></li>
                <li class="attachment attachment-icon"><i class="icon-hipster2"></i><input type="text" value="icon-hipster2"></li>
                <li class="attachment attachment-icon"><i class="icon-wondering"></i><input type="text" value="icon-wondering"></li>
                <li class="attachment attachment-icon"><i class="icon-wondering2"></i><input type="text" value="icon-wondering2"></li>
                <li class="attachment attachment-icon"><i class="icon-sleepy"></i><input type="text" value="icon-sleepy"></li>
                <li class="attachment attachment-icon"><i class="icon-sleepy2"></i><input type="text" value="icon-sleepy2"></li>
                <li class="attachment attachment-icon"><i class="icon-frustrated"></i><input type="text" value="icon-frustrated"></li>
                <li class="attachment attachment-icon"><i class="icon-frustrated2"></i><input type="text" value="icon-frustrated2"></li>
                <li class="attachment attachment-icon"><i class="icon-crying"></i><input type="text" value="icon-crying"></li>
                <li class="attachment attachment-icon"><i class="icon-crying2"></i><input type="text" value="icon-crying2"></li>
          </ul>

        </div>
      </div>

      <div class="media-frame-content media-frame-content-icon" id="arrow-content">
        <div class="attachments-browser">
          <ul class="attachments ui-sortable ui-sortable-disabled attachments-icon" >
                <li class="attachment attachment-icon"><i class="icon-point-up"></i><input type="text" value="icon-point-up"></li>
                <li class="attachment attachment-icon"><i class="icon-point-right"></i><input type="text" value="icon-point-right"></li>
                <li class="attachment attachment-icon"><i class="icon-point-down"></i><input type="text" value="icon-point-down"></li>
                <li class="attachment attachment-icon"><i class="icon-point-left"></i><input type="text" value="icon-point-left"></li>
                <li class="attachment attachment-icon"><i class="icon-arrow-up-left"></i><input type="text" value="icon-arrow-up-left"></li>
                <li class="attachment attachment-icon"><i class="icon-arrow-up-left2"></i><input type="text" value="icon-arrow-up-left2"></li>
                <li class="attachment attachment-icon"><i class="icon-arrow-up"></i><input type="text" value="icon-arrow-up"></li>
                <li class="attachment attachment-icon"><i class="icon-arrow-up2"></i><input type="text" value="icon-arrow-up2"></li>
                <li class="attachment attachment-icon"><i class="icon-arrow-up-right"></i><input type="text" value="icon-arrow-up-right"></li>
                <li class="attachment attachment-icon"><i class="icon-arrow-up-right2"></i><input type="text" value="icon-arrow-up-right2"></li>
                <li class="attachment attachment-icon"><i class="icon-arrow-right"></i><input type="text" value="icon-arrow-right"></li>
                <li class="attachment attachment-icon"><i class="icon-arrow-right2"></i><input type="text" value="icon-arrow-right2"></li>
                <li class="attachment attachment-icon"><i class="icon-arrow-down-right"></i><input type="text" value="icon-arrow-down-right"></li>
                <li class="attachment attachment-icon"><i class="icon-arrow-down-right2"></i><input type="text" value="icon-arrow-down-right2"></li>
                <li class="attachment attachment-icon"><i class="icon-arrow-down"></i><input type="text" value="icon-arrow-down"></li>
                <li class="attachment attachment-icon"><i class="icon-arrow-down2"></i><input type="text" value="icon-arrow-down2"></li>
                <li class="attachment attachment-icon"><i class="icon-arrow-down-left"></i><input type="text" value="icon-arrow-down-left"></li>
                <li class="attachment attachment-icon"><i class="icon-arrow-down-left2"></i><input type="text" value="icon-arrow-down-left2"></li>
                <li class="attachment attachment-icon"><i class="icon-arrow-left"></i><input type="text" value="icon-arrow-left"></li>
                <li class="attachment attachment-icon"><i class="icon-arrow-left2"></i><input type="text" value="icon-arrow-left2"></li>
                <li class="attachment attachment-icon"><i class="icon-circle-up"></i><input type="text" value="icon-circle-up"></li>
                <li class="attachment attachment-icon"><i class="icon-circle-right"></i><input type="text" value="icon-circle-right"></li>
                <li class="attachment attachment-icon"><i class="icon-circle-down"></i><input type="text" value="icon-circle-down"></li>
                <li class="attachment attachment-icon"><i class="icon-circle-left"></i><input type="text" value="icon-circle-left"></li>
                <li class="attachment attachment-icon"><i class="icon-undo"></i><input type="text" value="icon-undo"></li>
                <li class="attachment attachment-icon"><i class="icon-undo2"></i><input type="text" value="icon-undo2"></li>
                <li class="attachment attachment-icon"><i class="icon-forward"></i><input type="text" value="icon-forward"></li>
                <li class="attachment attachment-icon"><i class="icon-reply"></i><input type="text" value="icon-reply"></li>
                <li class="attachment attachment-icon"><i class="icon-redo"></i><input type="text" value="icon-redo"></li>
                <li class="attachment attachment-icon"><i class="icon-redo2"></i><input type="text" value="icon-redo2"></li>
                <li class="attachment attachment-icon"><i class="icon-bubble"></i><input type="text" value="icon-bubble"></li>
                <li class="attachment attachment-icon"><i class="icon-bubble2"></i><input type="text" value="icon-bubble2"></li>
                <li class="attachment attachment-icon"><i class="icon-bubbles"></i><input type="text" value="icon-bubbles"></li>
                <li class="attachment attachment-icon"><i class="icon-bubbles2"></i><input type="text" value="icon-bubbles2"></li>
                <li class="attachment attachment-icon"><i class="icon-bubbles3"></i><input type="text" value="icon-bubbles3"></li>
                <li class="attachment attachment-icon"><i class="icon-bubbles4"></i><input type="text" value="icon-bubbles4"></li>
          </ul>
        </div>
      </div>

      <div class="media-frame-content media-frame-content-icon" id="logo-content">
        <div class="attachments-browser">
          <ul class="attachments ui-sortable ui-sortable-disabled attachments-icon" >


                <li class="attachment attachment-icon"><i class="icon-amazon"></i><input type="text" value="icon-amazon"></li>
                <li class="attachment attachment-icon"><i class="icon-google"></i><input type="text" value="icon-google"></li>
                <li class="attachment attachment-icon"><i class="icon-google2"></i><input type="text" value="icon-google2"></li>
                <li class="attachment attachment-icon"><i class="icon-google-plus"></i><input type="text" value="icon-google-plus"></li>
                <li class="attachment attachment-icon"><i class="icon-google-plus2"></i><input type="text" value="icon-google-plus2"></li>
                <li class="attachment attachment-icon"><i class="icon-hangouts"></i><input type="text" value="icon-hangouts"></li>
                <li class="attachment attachment-icon"><i class="icon-google-drive"></i><input type="text" value="icon-google-drive"></li>
                <li class="attachment attachment-icon"><i class="icon-facebook"></i><input type="text" value="icon-facebook"></li>
                <li class="attachment attachment-icon"><i class="icon-facebook2"></i><input type="text" value="icon-facebook2"></li>
                <li class="attachment attachment-icon"><i class="icon-instagram"></i><input type="text" value="icon-instagram"></li>
                <li class="attachment attachment-icon"><i class="icon-whatsapp"></i><input type="text" value="icon-whatsapp"></li>
                <li class="attachment attachment-icon"><i class="icon-spotify"></i><input type="text" value="icon-spotify"></li>
                <li class="attachment attachment-icon"><i class="icon-telegram"></i><input type="text" value="icon-telegram"></li>
                <li class="attachment attachment-icon"><i class="icon-twitter"></i><input type="text" value="icon-twitter"></li>
                <li class="attachment attachment-icon"><i class="icon-feedly"></i><input type="text" value="icon-feedly"></li>
                <li class="attachment attachment-icon"><i class="icon-pocket"></i><input type="text" value="icon-pocket"></li>
                <li class="attachment attachment-icon"><i class="icon-hatenabookmark"></i><input type="text" value="icon-hatenabookmark"></li>
                <li class="attachment attachment-icon"><i class="icon-hatenabookmark2"></i><input type="text" value="icon-hatenabookmark2"></li>
                <li class="attachment attachment-icon"><i class="icon-line"></i><input type="text" value="icon-line"></li>
                <li class="attachment attachment-icon"><i class="icon-vine"></i><input type="text" value="icon-vine"></li>
                <li class="attachment attachment-icon"><i class="icon-vk"></i><input type="text" value="icon-vk"></li>
                <li class="attachment attachment-icon"><i class="icon-renren"></i><input type="text" value="icon-renren"></li>
                <li class="attachment attachment-icon"><i class="icon-sina-weibo"></i><input type="text" value="icon-sina-weibo"></li>
                <li class="attachment attachment-icon"><i class="icon-rss"></i><input type="text" value="icon-rss"></li>
                <li class="attachment attachment-icon"><i class="icon-rss2"></i><input type="text" value="icon-rss2"></li>
                <li class="attachment attachment-icon"><i class="icon-youtube"></i><input type="text" value="icon-youtube"></li>
                <li class="attachment attachment-icon"><i class="icon-twitch"></i><input type="text" value="icon-twitch"></li>
                <li class="attachment attachment-icon"><i class="icon-vimeo"></i><input type="text" value="icon-vimeo"></li>
                <li class="attachment attachment-icon"><i class="icon-vimeo2"></i><input type="text" value="icon-vimeo2"></li>
                <li class="attachment attachment-icon"><i class="icon-lanyrd"></i><input type="text" value="icon-lanyrd"></li>
                <li class="attachment attachment-icon"><i class="icon-flickr"></i><input type="text" value="icon-flickr"></li>
                <li class="attachment attachment-icon"><i class="icon-flickr2"></i><input type="text" value="icon-flickr2"></li>
                <li class="attachment attachment-icon"><i class="icon-flickr3"></i><input type="text" value="icon-flickr3"></li>
                <li class="attachment attachment-icon"><i class="icon-flickr4"></i><input type="text" value="icon-flickr4"></li>
                <li class="attachment attachment-icon"><i class="icon-dribbble"></i><input type="text" value="icon-dribbble"></li>
                <li class="attachment attachment-icon"><i class="icon-behance"></i><input type="text" value="icon-behance"></li>
                <li class="attachment attachment-icon"><i class="icon-behance2"></i><input type="text" value="icon-behance2"></li>
                <li class="attachment attachment-icon"><i class="icon-deviantart"></i><input type="text" value="icon-deviantart"></li>
                <li class="attachment attachment-icon"><i class="icon-500px"></i><input type="text" value="icon-500px"></li>
                <li class="attachment attachment-icon"><i class="icon-steam"></i><input type="text" value="icon-steam"></li>
                <li class="attachment attachment-icon"><i class="icon-steam2"></i><input type="text" value="icon-steam2"></li>
                <li class="attachment attachment-icon"><i class="icon-dropbox"></i><input type="text" value="icon-dropbox"></li>
                <li class="attachment attachment-icon"><i class="icon-onedrive"></i><input type="text" value="icon-onedrive"></li>
                <li class="attachment attachment-icon"><i class="icon-github"></i><input type="text" value="icon-github"></li>
                <li class="attachment attachment-icon"><i class="icon-npm"></i><input type="text" value="icon-npm"></li>
                <li class="attachment attachment-icon"><i class="icon-basecamp"></i><input type="text" value="icon-basecamp"></li>
                <li class="attachment attachment-icon"><i class="icon-trello"></i><input type="text" value="icon-trello"></li>
                <li class="attachment attachment-icon"><i class="icon-wordpress"></i><input type="text" value="icon-wordpress"></li>
                <li class="attachment attachment-icon"><i class="icon-joomla"></i><input type="text" value="icon-joomla"></li>
                <li class="attachment attachment-icon"><i class="icon-ello"></i><input type="text" value="icon-ello"></li>
                <li class="attachment attachment-icon"><i class="icon-blogger"></i><input type="text" value="icon-blogger"></li>
                <li class="attachment attachment-icon"><i class="icon-blogger2"></i><input type="text" value="icon-blogger2"></li>
                <li class="attachment attachment-icon"><i class="icon-tumblr"></i><input type="text" value="icon-tumblr"></li>
                <li class="attachment attachment-icon"><i class="icon-tumblr2"></i><input type="text" value="icon-tumblr2"></li>
                <li class="attachment attachment-icon"><i class="icon-yahoo"></i><input type="text" value="icon-yahoo"></li>
                <li class="attachment attachment-icon"><i class="icon-yahoo2"></i><input type="text" value="icon-yahoo2"></li>
                <li class="attachment attachment-icon"><i class="icon-tux"></i><input type="text" value="icon-tux"></li>
                <li class="attachment attachment-icon"><i class="icon-appleinc"></i><input type="text" value="icon-appleinc"></li>
                <li class="attachment attachment-icon"><i class="icon-finder"></i><input type="text" value="icon-finder"></li>
                <li class="attachment attachment-icon"><i class="icon-android"></i><input type="text" value="icon-android"></li>
                <li class="attachment attachment-icon"><i class="icon-windows"></i><input type="text" value="icon-windows"></li>
                <li class="attachment attachment-icon"><i class="icon-windows8"></i><input type="text" value="icon-windows8"></li>
                <li class="attachment attachment-icon"><i class="icon-soundcloud"></i><input type="text" value="icon-soundcloud"></li>
                <li class="attachment attachment-icon"><i class="icon-soundcloud2"></i><input type="text" value="icon-soundcloud2"></li>
                <li class="attachment attachment-icon"><i class="icon-skype"></i><input type="text" value="icon-skype"></li>
                <li class="attachment attachment-icon"><i class="icon-reddit"></i><input type="text" value="icon-reddit"></li>
                <li class="attachment attachment-icon"><i class="icon-hackernews"></i><input type="text" value="icon-hackernews"></li>
                <li class="attachment attachment-icon"><i class="icon-wikipedia"></i><input type="text" value="icon-wikipedia"></li>
                <li class="attachment attachment-icon"><i class="icon-linkedin"></i><input type="text" value="icon-linkedin"></li>
                <li class="attachment attachment-icon"><i class="icon-linkedin2"></i><input type="text" value="icon-linkedin2"></li>
                <li class="attachment attachment-icon"><i class="icon-lastfm"></i><input type="text" value="icon-lastfm"></li>
                <li class="attachment attachment-icon"><i class="icon-lastfm2"></i><input type="text" value="icon-lastfm2"></li>
                <li class="attachment attachment-icon"><i class="icon-delicious"></i><input type="text" value="icon-delicious"></li>
                <li class="attachment attachment-icon"><i class="icon-stumbleupon"></i><input type="text" value="icon-stumbleupon"></li>
                <li class="attachment attachment-icon"><i class="icon-stumbleupon2"></i><input type="text" value="icon-stumbleupon2"></li>
                <li class="attachment attachment-icon"><i class="icon-stackoverflow"></i><input type="text" value="icon-stackoverflow"></li>
                <li class="attachment attachment-icon"><i class="icon-pinterest"></i><input type="text" value="icon-pinterest"></li>
                <li class="attachment attachment-icon"><i class="icon-pinterest2"></i><input type="text" value="icon-pinterest2"></li>
                <li class="attachment attachment-icon"><i class="icon-xing"></i><input type="text" value="icon-xing"></li>
                <li class="attachment attachment-icon"><i class="icon-xing2"></i><input type="text" value="icon-xing2"></li>
                <li class="attachment attachment-icon"><i class="icon-flattr"></i><input type="text" value="icon-flattr"></li>
                <li class="attachment attachment-icon"><i class="icon-foursquare"></i><input type="text" value="icon-foursquare"></li>
                <li class="attachment attachment-icon"><i class="icon-yelp"></i><input type="text" value="icon-yelp"></li>
                <li class="attachment attachment-icon"><i class="icon-paypal"></i><input type="text" value="icon-paypal"></li>
                <li class="attachment attachment-icon"><i class="icon-chrome"></i><input type="text" value="icon-chrome"></li>
                <li class="attachment attachment-icon"><i class="icon-firefox"></i><input type="text" value="icon-firefox"></li>
                <li class="attachment attachment-icon"><i class="icon-IE"></i><input type="text" value="icon-IE"></li>
                <li class="attachment attachment-icon"><i class="icon-edge"></i><input type="text" value="icon-edge"></li>
                <li class="attachment attachment-icon"><i class="icon-safari"></i><input type="text" value="icon-safari"></li>
                <li class="attachment attachment-icon"><i class="icon-opera"></i><input type="text" value="icon-opera"></li>
                <li class="attachment attachment-icon"><i class="icon-file-pdf"></i><input type="text" value="icon-file-pdf"></li>
                <li class="attachment attachment-icon"><i class="icon-file-openoffice"></i><input type="text" value="icon-file-openoffice"></li>
                <li class="attachment attachment-icon"><i class="icon-file-word"></i><input type="text" value="icon-file-word"></li>
                <li class="attachment attachment-icon"><i class="icon-file-excel"></i><input type="text" value="icon-file-excel"></li>
                <li class="attachment attachment-icon"><i class="icon-libreoffice"></i><input type="text" value="icon-libreoffice"></li>
                <li class="attachment attachment-icon"><i class="icon-html-five"></i><input type="text" value="icon-html-five"></li>
                <li class="attachment attachment-icon"><i class="icon-html-five2"></i><input type="text" value="icon--html-five2"></li>
                <li class="attachment attachment-icon"><i class="icon-css3"></i><input type="text" value="icon-css3"></li>
                <li class="attachment attachment-icon"><i class="icon-git"></i><input type="text" value="icon-git"></li>
                <li class="attachment attachment-icon"><i class="icon-codepen"></i><input type="text" value="icon-codepen"></li>

          </ul>
        </div>
      </div>




    </div>
  </div>




</div>
</div>


</body>
</html>
