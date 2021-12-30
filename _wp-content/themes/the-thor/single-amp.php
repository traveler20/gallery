
<!DOCTYPE html>

<html amp class="t-html
<?php if (get_option('fit_bsStyle_fontSize') && get_option('fit_bsStyle_fontSize') != 'off' ) : ?><?php echo get_option('fit_bsStyle_fontSize');?> <?php endif; ?>
<?php if (get_option('fit_bsStyle_fontSizePc') && get_option('fit_bsStyle_fontSizePc') != 'off' ) : ?><?php echo get_option('fit_bsStyle_fontSizePc');?><?php endif; ?>">

<head>
<meta charset="<?php bloginfo('charset'); ?>">
<title><?php echo fit_title_document(); ?></title>
<link rel="canonical" href="<?php echo get_the_permalink(); ?>" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fjalla+One">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
<?php
//1ページを複数に分けた分割ページでのタグ出力
global $wp_query;
$multipage = check_split_page();
if($multipage[0] > 1) {
  $prev = fit_split_page_url('prev');
  $next = fit_split_page_url('next');
  if($prev) {
    echo '<link rel="prev" href="'.$prev.'" />'."\n";
  }
  if($next) {
    echo '<link rel="next" href="'.$next.'" />'."\n";
  }
}
?>
<?php fit_seo_meta();?>
<?php fit_ogp_date();?>

<style amp-custom>
<?php ob_start();?>

<?php
//テーマのカラー
$Tcolor  = '#a83f3f';
$Tred = '168';
$Tgreen = '63';
$Tblue = '63';
if ( get_theme_mod('fit_bsStyle_themeColor') ){
  $Tcolor  = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
  $Tcolorcode = preg_replace("/#/", "", $Tcolor);
  $Tred = hexdec(substr($Tcolorcode, 0, 2));
  $Tgreen = hexdec(substr($Tcolorcode, 2, 2));
  $Tblue = hexdec(substr($Tcolorcode, 4, 2));
}

//バルーンカラー
$ballooncolorA = '#191919';
$ballooncolorB = '#f2f2f2';
$ballooncolorC = '#191919';
$ballooncolorD = '#fff';
$ballooncolorE = '#d8d8d8';
if(get_theme_mod( 'fit_partsList_balloonBgColorA' )){
  $ballooncolorA = esc_attr( get_theme_mod( 'fit_partsList_balloonBgColorA' ));
}if(get_theme_mod( 'fit_partsList_balloonBgColorB' )){
  $ballooncolorB = esc_attr( get_theme_mod( 'fit_partsList_balloonBgColorB' ));
}if(get_theme_mod( 'fit_partsList_balloonBrColorA' )){
  $ballooncolorC = esc_attr( get_theme_mod( 'fit_partsList_balloonBrColorA' ));
}if(get_theme_mod( 'fit_partsList_balloonBrColorB' )){
  $ballooncolorD = esc_attr( get_theme_mod( 'fit_partsList_balloonBrColorB' ));
}if(get_theme_mod( 'fit_partsList_balloonBrColorC' )){
  $ballooncolorE = esc_attr( get_theme_mod( 'fit_partsList_balloonBrColorC' ));
}

//個別ページテーブルのカラー
$tablecolorA = '#191919';
$tablecolorB = '#E5E5E5';
$tablecolorC = '#7f7f7f';
$tablecolorD = '#fff';
$tablecolorE = '#fff';
$tablecolorF = '#f2f2f2';
if(get_theme_mod( 'fit_partsList_tableColorA' )){
  $tablecolorA = esc_attr( get_theme_mod( 'fit_partsList_tableColorA' ));
}if(get_theme_mod( 'fit_partsList_tableColorB' )){
  $tablecolorB = esc_attr( get_theme_mod( 'fit_partsList_tableColorB' ));
}if(get_theme_mod( 'fit_partsList_tableColorC' )){
  $tablecolorC = esc_attr( get_theme_mod( 'fit_partsList_tableColorC' ));
}if(get_theme_mod( 'fit_partsList_tableColorD' )){
  $tablecolorD = esc_attr( get_theme_mod( 'fit_partsList_tableColorD' ));
}if(get_theme_mod( 'fit_partsList_tableColorE' )){
  $tablecolorE = esc_attr( get_theme_mod( 'fit_partsList_tableColorE' ));
}if(get_theme_mod( 'fit_partsList_tableColorF' )){
  $tablecolorF = esc_attr( get_theme_mod( 'fit_partsList_tableColorF' ));
}
?>


@font-face{
  font-family:icomoon;
  src:url("<?php echo get_template_directory_uri();?>/fonts/icomoon.eot");
  src:url("<?php echo get_template_directory_uri();?>/fonts/icomoon.ttf") format("truetype");
  font-weight:400;
  font-style:normal
}
[class*=" icon-"]::before, [class^="icon-"]::before, [class*=" icon-"]::after, [class^="icon-"]::after {
  font-family:icomoon,Lato,游ゴシック体,Yu Gothic,YuGothic,ヒラギノ角ゴシック Pro,Hiragino Kaku Gothic Pro,メイリオ,Meiryo,ＭＳ Ｐゴシック,MS PGothic,"sans-serif";
  speak:none;
  font-weight:400;
  font-style:normal;
  font-variant:normal;
  text-transform:none;
  -webkit-font-smoothing:antialiased;
  -moz-osx-font-smoothing:grayscale
}
[class*=" icon-"]:before,[class^=icon-]:before{content:"\e9da"}
.icon-search:before{content:"\e907"}
.icon-menu:before{content:"\e910"}
.icon-close:before{content:"\e90f"}
.icon-facebook:before{content:"\ea91"}
.icon-twitter:before{content:"\ea97"}
.icon-google-plus:before{content:"\ea8c"}
.icon-hatenabookmark:before{content:"\e904"}
.icon-pocket:before{content:"\e903"}
.icon-line:before{content:"\e90b"}
.icon-linkedin:before{content:"\eacb"}
.icon-pinterest:before{content:"\ead3"}
.icon-instagram:before{content:"\ea93"}
.icon-youtube:before{content:"\ea9e"}
.icon-rss:before{content:"\ea9c"}
.icon-home:before{content:"\e908"}
.icon-clock:before{content:"\e957"}
.icon-update:before{content:"\e956"}
.icon-folder:before{content:"\e938"}
.icon-tag:before{content:"\e93e"}
.icon-eye:before{content:"\e9cf"}
.icon-bubble2:before{content:"\ea87"}
.icon-sphere:before{content:"\e9ca"}
.icon-star-empty:before{content:"\e9d8"}
.icon-star-half:before{content:"\e9d9"}

/*アイコンの背景色*/
.profile__link.icon-facebook,
.socialList .icon-facebook,
.menuBtn .icon-facebook{background:#3B5998}
.profile__link.icon-twitter,
.socialList .icon-twitter,
.menuBtn .icon-twitter{background:#00B0ED}
.profile__link.icon-instagram,
.menuBtn .icon-instagram{background:radial-gradient(circle farthest-corner at 32% 106%,#ffe17d 0,#ffcd69 10%,#fa9137 28%,#eb4141 42%,transparent 82%),linear-gradient(135deg,#234bd7 12%,#c33cbe 58%)}
.profile__link.icon-google-plus,
.socialList .icon-google-plus,
.menuBtn .icon-google-plus{background:#DF4A32}
.profile__link.icon-youtube,
.menuBtn .icon-youtube{background:#cd201f}
.profile__link.icon-linkedin,
.socialList .icon-linkedin,
.menuBtn .icon-linkedin{background:#0079ba}
.profile__link.icon-pinterest,
.socialList .icon-pinterest,
.menuBtn .icon-pinterest{background:#ce0f19}
.profile__link.icon-rss,
.menuBtn .icon-rss{background:#f90}
.socialList .icon-hatenabookmark{background:#008FDE}
.socialList .icon-pocket{background:#EB4654}
.socialList .icon-line{background:#00C300}

/************************************************************/
/************************************************************/
/*リセット
/************************************************************/
/************************************************************/
html,body,p,ol,ul,li,dl,dt,dd,blockquote,figure,fieldset,legend,textarea,pre,iframe,hr,h1,h2,h3,h4,h5,h6{
	margin:0;
	padding:0
}
h1,h2,h3,h4,h5,h6{font-size:100%}
ol,ul,li,dl{list-style-position:inside}
button,input,select,textarea{margin:0}
html{
	box-sizing:border-box;
	line-height:1;
	font-size:62.5%
}
*,*:before,*:after{box-sizing:inherit}
iframe{border:0}
table{
	border-collapse:collapse;
	border-spacing:0
}
td,th{
	padding:0;
	text-align:left
}
hr{
	height:0;
	border:0
}



/************************************************************/
/************************************************************/
/*ベース
/************************************************************/
/************************************************************/

/*全体設定
------------------------------------------------------------*/
body {
	width:100%;
  font-family:Lato,游ゴシック体,Yu Gothic,YuGothic,ヒラギノ角ゴシック Pro,Hiragino Kaku Gothic Pro,メイリオ,Meiryo,ＭＳ Ｐゴシック,MS PGothic,"sans-serif";
	font-size:1.2rem;
	font-weight:400;
	color:#191919;
	-webkit-text-size-adjust:100%;
	word-wrap :break-word;
	overflow-wrap :break-word;
  <?php
  if ( get_theme_mod('fit_bsStyle_bgColor') || get_fit_bgimg()) {
    $color  = esc_attr( get_theme_mod( 'fit_bsStyle_bgColor' ));
    $bgImg  = ' url('.get_fit_bgimg().') repeat center center';
    echo 'background:'.$color.$bgImg.';';
  }
  ?>
}




/*フォームパーツ設定
------------------------------------------------------------*/

/*フォント設定*/
button, input, select, textarea {
	font-family:inherit;
	font-weight:inherit;
	font-size:inherit
}


/*リンク設定
------------------------------------------------------------*/
a{
	color:inherit;
	text-decoration:none
}



/************************************************************/
/************************************************************/
/*レイアウト
/************************************************************/
/************************************************************/

/*ヘッダー
------------------------------------------------------------*/
.l-header{
	padding:20px 0 10px 0;
	z-index:4;
  box-shadow:0px 1px 2px 0px rgba(0,0,0,.15);
  <?php
  $color = '#fff';
  //ヘッダーのカラー(文字黒)
  if ( get_theme_mod('fit_conHeader_color') && get_option('fit_conHeader_text') != 'white') {
    $color = esc_attr( get_theme_mod( 'fit_conHeader_color' ));
  }
  //ヘッダーのカラー(文字白)
  if ( get_theme_mod('fit_conHeader_color') && get_option('fit_conHeader_text') == 'white') {
    $color = esc_attr( get_theme_mod( 'fit_conHeader_color' ));
  }elseif ( get_theme_mod( 'fit_bsStyle_themeColor' ) && !get_theme_mod('fit_conHeader_color') && get_option('fit_conHeader_text') == 'white' ) {
    $color = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
  }elseif ( !get_theme_mod( 'fit_bsStyle_themeColor' ) && !get_theme_mod('fit_conHeader_color') && get_option('fit_conHeader_text') == 'white' ) {
    $color = '#a83f3f';
  }
  echo 'background:'.$color.';';
  ?>
}


/*ラッパー(メイン・サイドバー用ラッパー)
------------------------------------------------------------*/
.l-wrapper {
	margin:40px 15px
}


/************************************************************/
/************************************************************/
/*共通モジュール(様々な箇所で複数使用するパーツ)
/************************************************************/
/************************************************************/


/*枠組み系パーツ
------------------------------------------------------------*/

/*コンテナー（左右余白）*/
.container{
  position:relative;
  margin-left:15px;
	margin-right:15px
}

/*デバイダー（上下区切り）*/

/*デバイダートップ（上区切り）*/
.divider,
.dividerTop{margin-top:40px}

/*デバイダーボトム（下区切り）*/
.divider,
.dividerBottom{margin-bottom:40px}


/*アイキャッチ
------------------------------------------------------------*/
.eyecatch{
	position:relative;
	width:100%;
	height:auto;
	overflow:hidden;
	margin-bottom:10px
}
.eyecatch:before {
    content:"";
    display:block;
    padding-top:56.25%
}
.eyecatch-43:before {padding-top:75%}
.eyecatch-11:before {padding-top:100%}

.eyecatch-main{
	margin:0 -15px 40px -15px;
	width:auto
}

/*ノーマルエフェクト*/
.eyecatch__link{display:block}
.eyecatch__link amp-img {
  position:absolute;
  top:0;
  left:0;
  bottom:0;
  right:0;
  width:100%;
  height:100%;
  vertical-align:bottom
}
.eyecatch__link img{object-fit:cover}


/*アイキャッチ画像内カテゴリ(複数個所で使用)*/
.eyecatch__cat{
	position:absolute;
	top:0;
	right:0;
	z-index:3;
	background:<?php echo $Tcolor ?>;
	max-width:calc(100% - 3rem)
}
.the__category{
	position:relative;
	display:inline-block;
	background:<?php echo $Tcolor ?>;
	margin-bottom:10px
}
.eyecatch__cat a,
.the__category a{
	display:block;
	padding:7.5px 10px;
	color:#fff;
	font-size:1rem;
	line-height:1.35
}
.eyecatch__cat a:before,
.the__category a:before {
  font-family:icomoon;
	content:"\e938";
	margin-right:5px
}





/*見出し
------------------------------------------------------------*/
/*見出し基本設定*/
.heading{
	display:block;
	margin-bottom:10px;
	line-height:1.5;
	font-weight:700
}

/*見出し：ページタイトル等用*/
.heading-primary{font-size:1.8rem}

/*見出し：primaryより小さい*/
.heading-sub{font-size:1.6rem}

/*見出し：アーカイブ内の記事タイトル等用*/
.heading-secondary{font-size:1.5rem}


/*文節
------------------------------------------------------------*/
.phrase{
	display:block;
	line-height:1.85;
	color:rgba(0,0,0,.75);
	font-size:1.2rem;
  margin-top:0
}


/*データリスト(複数個所で使用)
------------------------------------------------------------*/
.dateList{
	list-style:none;
	margin-bottom:5px
}
.dateList-main{margin-bottom:10px}
.dateList__item{
	display:inline-block;
	color:rgba(0,0,0,.5);
	margin-right:5px;
	line-height:1.5
}
.dateList__item:before{
	margin-right:2.5px;
	line-height:1
}


/*ボタン
------------------------------------------------------------*/
.btn{width:100%}
.btn-left{text-align:left}
.btn-center{text-align:center}
.btn-right{text-align:right}

/*ボタン本体*/
.btn__link{
	position:relative;
	display:inline-block;
	line-height:normal
}
.btn__link-max{width:100%}
.btn__link:before{
	content:"";
	position:absolute;
	top:0;
	bottom:0;
	right:10px;
	width:5px;
	height:5px;
	margin:auto;
	border-top:1px solid;
	border-right:1px solid;
	transform:rotate(45deg)
}

/*ボタン：基本デザイン*/
.btn__link-normal{
	font-size:1.2rem;
	padding:10px 20px;
	border-radius:5px;
	border:1px solid;
  <?php
  $colorA = '#3f3f3f';
  if(get_theme_mod( 'fit_partsBtn_normalColorA' )){
    $colorA = esc_attr( get_theme_mod( 'fit_partsBtn_normalColorA' ));
  }
  echo 'color:'.$colorA.';';
  ?>
}

/*ボタン：ビッグデザイン用*/
/*ボタン：ミニデザイン用*/
.btn__link-primary,
.btn__link-secondary {
  border-radius:5px;
  border:0;
  border-bottom:solid 3px rgba(0,0,0,.25);
  font-weight:700
}

.btn__link-primary {
  padding:15px 40px;
  font-size:1.4rem;
  <?php
  $colorA = '#fff';
  $colorB = '#3f3f3f';
  if(get_theme_mod( 'fit_partsBtn_primaryColorA' )){
    $colorA = esc_attr( get_theme_mod( 'fit_partsBtn_primaryColorA' ));
  }
  if(get_theme_mod( 'fit_partsBtn_primaryColorB' )){
    $colorB = esc_attr( get_theme_mod( 'fit_partsBtn_primaryColorB' ));
  }
  echo 'color:'.$colorA.'; background:'.$colorB.';';
  ?>
}

.btn__link-secondary {
  padding:5px 25px 5px 15px;
  font-size:1.2rem;
  <?php
  $colorA = '#fff';
  $colorB = '#3f3f3f';
  if(get_theme_mod( 'fit_partsBtn_secondaryColorA' )){
    $colorA = esc_attr( get_theme_mod( 'fit_partsBtn_secondaryColorA' ));
  }
  if(get_theme_mod( 'fit_partsBtn_secondaryColorB' )){
    $colorB = esc_attr( get_theme_mod( 'fit_partsBtn_secondaryColorB' ));
  }
  echo 'color:'.$colorA.'; background:'.$colorB.';';
  ?>
}










/************************************************************/
/************************************************************/
/*限定モジュール(複数個所で利用されることが無いパーツ)
/************************************************************/
/************************************************************/


/*ヘッダーエリア用パーツ（共通）
------------------------------------------------------------*/

/*サイトタイトル(ヘッダーで使用)*/
.siteTitle{
  font-family:Fjalla One,Lato,游ゴシック体,Yu Gothic,YuGothic,ヒラギノ角ゴシック Pro,Hiragino Kaku Gothic Pro,メイリオ,Meiryo,ＭＳ Ｐゴシック,MS PGothic,"sans-serif";
	max-width:calc(100% - 66px);
	font-size:20px;
	margin-bottom:10px;
	font-weight:700
}
.siteTitle__link{display:block}
.siteTitle__logo{
	width:auto;
	height:20px;
	vertical-align:bottom
}
.siteTitle .siteTitle__logo img{
  width: auto;
  height: auto;
  min-width: auto;
  min-height: auto;
  right: unset;
}




/*検索・メニューボタン*/
.menuBtn{
	position:absolute;
	top:0;
	line-height:20px;
	font-size:18px;
  right:0
}
.menuBtn__link{display:block}

/*チェックボックス非表示*/
.menuBtn__checkbox {display:none}

/*閉じる用の薄黒カバー*/
.menuBtn__unshown {
	display:none;
	background:rgba(0,0,0,.5);
	width:100%;
	height:100%;
	position:fixed;
	right:0;
	top:0;
	z-index:4
}

/*チェックで閉じる用の薄黒カバー表示*/
.menuBtn__checkbox:checked~.menuBtn__unshown {display:block}

/*検索メニューコンテンツエリア*/
.menuBtn__content {
	position:fixed;
	top:0;
	right:0;
	background:#fff;
	width:90%;
	z-index:5;
	text-align:center;
	height:100%;
  transform:translateX(110%)
}

.menuBtn__scroll {
	overflow:auto;
	-webkit-overflow-scrolling:touch;
	height:100%;
	padding:0 15px 15px 15px
}

.menuBtn__contentInner{
	text-align:left;
	font-size:1.2rem
}

/*チェックでパネル表示*/
.menuBtn__checkbox:checked~.menuBtn__content {transform:translateX(0)}

/*パネル内閉じるボタン*/
.menuBtn__close{
	font-family:Fjalla One;
	display:inline-block;
	height:2rem;
	font-size:2rem;
	margin:40px auto
}

.menuBtn__close i{
	margin-right:10px;
	font-size:1.5rem;
	vertical-align:middle
}


.menuBtn__navi{
	margin:0 -15px 40px -15px;
	padding:20px 15px;
	background:rgba(0,0,0,.05)
}
.menuBtn__naviList{
	margin-top:10px;
	list-style:none;
	display:flex;
	justify-content:center;
	overflow:auto
}
.menuBtn__naviItem{margin:0 2.5px}


.menuBtn__naviLink{
	display:block;
	width:30px;
	height:30px;
	margin:0 auto;
	line-height:30px;
	border-radius:50%;
	font-size:14px;
	text-align:center;
	color:#fff
}






/*ヘッダー下エリア用パーツ（共通も選択可能）
------------------------------------------------------------*/
<?php if(get_option('fit_ampFunction_search') == 'on'): ?>
/*検索エリア*/
.searchHead {
	padding:10px 0;
  <?php
  $color = '#191919';
  if (get_theme_mod( 'fit_conHeadBottom_colorSearch' )) {
		$color = esc_attr( get_theme_mod( 'fit_conHeadBottom_colorSearch' ));
	}
  echo 'background:'.$color.';';
  ?>
}
.searchHead__search {
	display:block;
	width:100%
}
.searchHead__form{display:flex}
.searchHead__input{
  width:calc(100% - 4rem);
	border:0;
  padding:0 10px;
  -webkit-appearance:none;
	border-radius:5px 0 0 5px
}
.searchHead__submit {
	width:4rem;
	border:0;
  text-align:center;
	background:#fff;
	padding:10px;
	border-radius:0 5px 5px 0
}
<?php endif; ?>

<?php if(get_option('fit_conHeadBottom_switch') == 'on'): ?>
/*お知らせエリア*/
.infoHead {
  overflow:hidden;
  <?php
  if ( get_theme_mod('fit_conHeadBottom_color') && get_option('fit_conHeadBottom_switch') == 'on' ) {
    $color = esc_attr( get_theme_mod( 'fit_conHeadBottom_color' ));
    echo 'background:'.$color.';';
  }else{
    echo 'background:#ffc107;';
  }
  ?>
}
.infoHead__text {
	padding-left:100%;
	white-space:nowrap;
	display:inline-block;
	animation:marquee 10s linear 0s infinite;
	font-weight:700;
	color:#fff;
	line-height:3rem
}
<?php endif; ?>




/*投稿(single)ページ限定パーツ
------------------------------------------------------------*/

<?php if( get_option('fit_postCta_switch') == 'on' && get_post_meta(get_the_ID(), 'cta_hide', true) != '1' ):?>
/*-----記事下CTAエリア-----*/
.postCta {
	margin-top:40px
}

.postcta-bg{
	padding:15px;
  <?php
  if ( get_theme_mod('fit_postCta_color') ){
    $color = esc_attr( get_theme_mod( 'fit_postCta_color' ));
    if(get_option('fit_postCta_style') == 'postcta-bg' ){
      echo 'background:'.$color.';';
    }
  }elseif ( get_theme_mod('fit_bsStyle_themeColor') ){
    $color = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
    if(get_option('fit_postCta_style') == 'postcta-bg' ){
      echo 'background:'.$color.';';
    }
  }else{
    echo 'background:#a83f3f;';
  }
  ?>
}
<?php endif; ?>



<?php if( fit_link_pages() ):?>
/*-----ページ内ページネーション-----*/
.pagePager{
	text-align:center;
	list-style:none;
	font-size:0;
	margin-top:60px
}
.pagePager__item{
	font-family:Fjalla One;
	display:inline-block;
	color:<?php echo $Tcolor ?>;
	background:#fff;
	border:rgba(0,0,0,.1) 1px solid;
	font-size:1.2rem;
	margin-left:-1px
}

.pagePager__item-current,
.pagePager__item a{
	display:inline-block;
	padding:10px;
	min-width:calc(1.2rem + 20px)
}
.pagePager__item-current{
	color:#fff;
	background:<?php echo $Tcolor ?>
}
<?php endif; ?>


<?php if (get_option('fit_postShare_top') == 'on' && get_post_meta(get_the_ID(), 'share_hide', true) != '1' ||
          get_option('fit_postShare_bottom') == 'on' && get_post_meta(get_the_ID(), 'share_hide', true) != '1') : ?>
/*-----ソーシャルリスト-----*/
.social-top{margin-bottom:40px}
.social-bottom{margin-top:40px}

.socialList{
	list-style:none;
	display:flex;
	flex-wrap:wrap;
  justify-content:flex-end
}
.socialList__item {
  text-align:center;
  flex-grow:1;
  line-height:40px;
  min-width:70px
}
.socialList__link {
	display:block;
  color:#fff;
	padding:0
}
.socialList__link:before{
	display:block;
  font-size:2rem
}
<?php endif; ?>




<?php if( get_option('fit_postSns_switch') == 'on' && get_post_meta(get_the_ID(), 'follow_hide', true) != '1' ):?>
/*-----SNSフォローエリア-----*/
.snsFollow{
	display:flex;
	height:200px;
	margin-top:40px
}
.snsFollow__bg{
	flex:2;
	position:relative;
	overflow:hidden
}
.snsFollow__bg:after{
	content:"";
  position:absolute;
  top:0;
  right:0;
  bottom:0;
  left:0;
	background-color:rgba(0,0,0,.5)
}
.snsFollow__bg amp-img {
  width:100%;
  height:100%
}
.snsFollow__bg img{object-fit:cover}
.snsFollow__contents{
	flex:3;
	position:relative;
	background:#191919;
	text-align:center;
	padding:20px;
	border-left:1px solid rgba(255,255,255,.1)
}

.snsFollow__text{
	width:100%;
	color:#fff;
	margin:40px auto 10px auto;
	font-weight:700;
	line-height:1.5
}

.snsFollow__list{
	list-style:none;
	margin:0 auto
}
.snsFollow__item{
	margin:0 5px 5px 5px;
	vertical-align:top
}
<?php endif; ?>


<?php if( get_option('fit_postPrevNext_switch') == 'on' && get_post_meta(get_the_ID(), 'prevNext_hide', true) != '1' ):?>
/*-----前次の記事-----*/
.prevNext {
  margin-top:40px;
	list-style-type:none;
  display:flex;
  flex-wrap:wrap;
	border-top:1px solid rgba(0,0,0,.1);
	border-bottom:1px solid rgba(0,0,0,.1)
}


.prevNext__item {position:relative}
.prevNext__item-prev{
	width:100%;
	border-bottom:1px solid rgba(0,0,0,.1);
	padding-bottom:20px
}
.prevNext__item-next{width:100%}


.prevNext .eyecatch{
	margin-bottom:0;
	background:#f2f2f2
}
.prevNext .eyecatch__link:before{
	content:"";
	position:absolute;
  top:0;
  left:0;
  width:100%;
  height:100%;
	background:rgba(0,0,0,.5);
	z-index:1
}

.prevNext__pop{
	display:inline-block;
	position:absolute;
	top:0;
	height:30px;
	line-height:30px;
	background:<?php echo $Tcolor ?>;
	padding:0 10px;
	color:#fff;
	z-index:4
}
.prevNext__item-prev .prevNext__pop{left:0}
.prevNext__item-next .prevNext__pop{right:0}

.prevNext__title{
	position:absolute;
	left:20px;
	right:20px;
	bottom:10px;
	color:#fff;
	z-index:4
}
.prevNext__item-prev .prevNext__title{float:right}
.prevNext__item-next .prevNext__title{float:left}
.prevNext__title span{
	display:block;
  font-size:1.2rem;
  color:rgba(255,255,255,.5);
  line-height:1.5
}
.prevNext__title span:before {
  margin-right:2.5px;
  line-height:1
}

.prevNext__text{
    position:absolute;
    top:50%;
    left:50%;
    transform:translateY(-50%) translateX(-50%);
    color:#BFBFBF
}
.prevNext__item-prev .prevNext__text{padding-left:20px}
.prevNext__item-next .prevNext__text{padding-right:20px}
<?php endif; ?>


<?php if (get_option('fit_adPost_doubleLeft') && get_post_meta(get_the_ID(), 'rectangle_hide', true) != '1' || get_option('fit_adPost_doubleRight') && get_post_meta(get_the_ID(), 'rectangle_hide', true) != '1' ):?>
/*-----ダブルレクタングル広告リスト-----*/
.rectangle {
	width:100%;
	overflow:hidden;
	margin-top:40px;
	padding:0 10px;
	background-color:#F2F2F2;
  background-image:linear-gradient(to top right,#fff 0,#fff 25%,transparent 25%,transparent 50%,#fff 50%,#fff 75%,transparent 75%,transparent 100%);
  background-size:6px 6px
}
.rectangle__item {
	width:100%;
	text-align:center
}

.rectangle__title{
  padding:10px 0;
  display:block;
  text-align:center
}

.rectangle .adsbygoogle {
	width:336px;
	height:280px;
	max-width:100%;
	margin:auto
}
<?php endif; ?>


<?php if ( get_option('fit_postProfile_switch') == 'on' && get_post_meta(get_the_ID(), 'profile_hide', true) != '1' ) :	?>
/*-----プロフィールボックス-----*/
.profile{
	border:5px solid rgba(0,0,0,.05);
  margin-top:40px;
	padding:20px;
	background:#fff
}
.profile__author{
	width:100%;
	text-align:center;
	margin-bottom:20px
}
.profile__text{
	background:#EFEFEF;
	font-size:1.6rem;
	padding:15px;
	margin-bottom:20px
}
.profile__author amp-img {
  border-radius:50%;
	margin-bottom:10px
}
.profile__name{
	font-size:1.6rem;
	margin-bottom:5px
}
.profile__group{font-weight:400}


.profile__description{
	line-height:1.75;
	margin-bottom:20px
}
.profile__list{
	list-style:none;
	display:flex;
	justify-content:center;
	overflow:auto;
	margin-bottom:20px
}
.profile__item{margin:0 2.5px}


.profile__link{
	display:block;
	width:30px;
	height:30px;
	margin:0 auto;
	line-height:30px;
	border-radius:50%;
	font-size:14px;
	text-align:center;
	color:#fff
}
<?php endif; ?>


<?php if ( get_option('fit_postRelated_switch') == 'on' && get_post_meta(get_the_ID(), 'related_hide', true) != '1' ) : ?>
/*-----関連記事-----*/
.related {
	border-top:1px solid rgba(0,0,0,.1);
	margin-top:40px;
	padding-top:20px
}
.related__list {list-style-type:none}
.related__item {
	padding-bottom:20px;
  display:flex;
  align-items:flex-start
}
.related__item .eyecatch{max-width:200px}
.related__item .archive__contents{
	width:100%;
	margin-left:15px
}
.related__item .archive__contents-noImg {margin-left: 0;}
.related__item:last-child{padding-bottom:0}
<?php endif; ?>




/*個別ページパーツ
------------------------------------------------------------*/

/*-----個別ページ本文フレーム-----*/
.content{
	position:relative;
	font-size:1.4rem;
	line-height:1.85;
}


/*-----IMG-----*/
.content amp-img{
	max-width:100%;
	height:auto
}

/*-----IMG A8広告などの1px × 1px の画像処理-----*/
.content amp-img[width="1"],.content amp-img[height="1"]{position: absolute}

/*-----IMGサイズリセット-----*/
.content .eyecatch__link amp-img{height:100%}





/*-----段落-----*/
.content p{margin-top:2rem}
.content p:after {
	content:"";
	display:block;
	clear:both
}


/*-----ボックス-----*/
.content div{margin-top:2rem}
.content div:after {
  content:"";
  display:block;
  clear:both
}


/*-----カラム-----*/
.column{
	display:flex;
	position:relative
}
.column .column__item{
  flex:1;
	margin-left:20px;
	margin-top:0
}
.column .column__item:first-child{margin-left:0}

.column-237 .column__item:last-child,
.column-273 .column__item:first-child{flex:7}

.column-273 .column__item:last-child,
.column-237 .column__item:first-child{flex:3}






/*-----すべての見出し-----*/
.content h2,
.content h3,
.content h4,
.content h5{
	line-height:1.5;
	margin-top:4rem
}
.content h2{font-size:2.2rem}
.content h3{font-size:1.8rem}
.content h4{font-size:1.6rem}
.content h5{font-size:1.4rem}
.content h2+h2, .content h2+h3, .content h2+h4, .content h2+h5,
.content h3+h2, .content h3+h3, .content h3+h4, .content h3+h5,
.content h4+h2, .content h4+h3, .content h4+h4, .content h4+h5,
.content h5+h2, .content h5+h3, .content h5+h4, .content h5+h5{margin-top:2rem}


/*-----見出しのデザイン-----*/

<?php
//H2見出しデザイン
$colorA = '#191919';
$colorB = '#f2f2f2';
$colorC = '#d8d8d8';
$class  = 'partsH2-'.get_option('fit_partsHead_2');
if(get_theme_mod( 'fit_partsHead_2colorA' )){
  $colorA = esc_attr( get_theme_mod( 'fit_partsHead_2colorA' ));
}if(get_theme_mod( 'fit_partsHead_2colorB' )){
  $colorB = esc_attr( get_theme_mod( 'fit_partsHead_2colorB' ));
}if(get_theme_mod( 'fit_partsHead_2colorC' )){
  $colorC = esc_attr( get_theme_mod( 'fit_partsHead_2colorC' ));
}

if ($class == 'partsH2-' || $class == 'partsH2-off'){echo '.content h2{color:'.$colorA.'}';}
if ($class == 'partsH2-1' ){echo '.'.$class.' h2{padding-bottom:10px;border-bottom:solid 4px '.$colorB.';color:'.$colorA.';}';}
if ($class == 'partsH2-2' ){echo '.'.$class.' h2{position:relative;padding-bottom:16px;color:'.$colorA.';}';}
if ($class == 'partsH2-2' ){echo '.'.$class.' h2:after{content:"";display:block;position:absolute;bottom:0;width:100%;height:6px;border-top:2px solid '.$colorB.';border-bottom:1px solid '.$colorB.';}';}
if ($class == 'partsH2-3' ){echo '.'.$class.' h2{padding-bottom:10px;border-bottom:dotted 1px '.$colorB.';color:'.$colorA.';}';}
if ($class == 'partsH2-4' ){echo '.'.$class.' h2{position:relative;padding-bottom:14px;overflow:hidden;color:'.$colorA.';}';}
if ($class == 'partsH2-4' ){echo '.'.$class.' h2:before{content:"";position:absolute;bottom:0;width:100%;border-bottom:4px solid '.$colorB.';}';}
if ($class == 'partsH2-4' ){echo '.'.$class.' h2:after{content:"";position:absolute;bottom:0;width:100%;border-bottom:4px solid '.$colorC.';}';}
if ($class == 'partsH2-5' ){echo '.'.$class.' h2{color:'.$colorA.'; background:linear-gradient(transparent 60%, '.$colorB.' 60%);}';}
if ($class == 'partsH2-6' ){echo '.'.$class.' h2{position:relative;padding-bottom:14px;padding-right:30px;color:'.$colorA.';}';}
if ($class == 'partsH2-6' ){echo '.'.$class.' h2:before{content:"";position:absolute;bottom:-0;right:0;width:0;height:0;border:none;border-right:solid 15px transparent;border-bottom:solid 15px '.$colorB.';}';}
if ($class == 'partsH2-6' ){echo '.'.$class.' h2:after{content:"";position:absolute;bottom:0;right:10px;width:100%;border-bottom:solid 4px '.$colorB.';}';}
if ($class == 'partsH2-7' ){echo '.'.$class.' h2{position:relative;padding-bottom:16px;color:'.$colorA.';}';}
if ($class == 'partsH2-7' ){echo '.'.$class.' h2:after{content:"";position:absolute;left:0;bottom:0;width:100%;height:6px;background:repeating-linear-gradient(-45deg, '.$colorB.', '.$colorB.' 2px, '.$colorC.' 2px, '.$colorC.' 4px);}';}
if ($class == 'partsH2-8' ){echo '.'.$class.' h2{position:relative;padding-bottom:14px;color:'.$colorA.';}';}
if ($class == 'partsH2-8' ){echo '.'.$class.' h2:after{content:"";position:absolute;left:0;bottom:0;width:100%;height:4px;background:linear-gradient(to right, '.$colorB.', '.$colorC.');}';}
if ($class == 'partsH2-9' ){echo '.'.$class.' h2{position:relative;padding-bottom:14px;text-align:center;color:'.$colorA.';}';}
if ($class == 'partsH2-9' ){echo '.'.$class.' h2:after{content:"";position:absolute;bottom:0;display:inline-block;width:60px;height:4px;left:50%;transform:translateX(-50%);border-radius:2px;background-color:'.$colorB.';}';}
if ($class == 'partsH2-10'){echo '.'.$class.' h2{position:relative;padding-bottom:10px;text-align:center;border-bottom:1px solid '.$colorB.';color:'.$colorA.';}';}
if ($class == 'partsH2-10'){echo '.'.$class.' h2:before{content:"";position:absolute;top:100%;left:50%;transform:translateX(-50%);border:10px solid transparent;border-top:10px solid '.$colorB.';}';}
if ($class == 'partsH2-10'){echo '.'.$class.' h2:after{content:"";position:absolute;top:100%;left:50%;transform:translateX(-50%);border:10px solid transparent;border-top:10px solid #fff;	margin-top:-1px;}';}
if ($class == 'partsH2-11'){echo '.'.$class.' h2{padding:10px 0 10px 20px;border-left:solid 4px '.$colorB.';color:'.$colorA.';}';}
if ($class == 'partsH2-12'){echo '.'.$class.' h2{padding:10px 0 10px 20px;border-left:solid 4px '.$colorB.';border-bottom:solid 1px '.$colorC.';color:'.$colorA.';}';}
if ($class == 'partsH2-13'){echo '.'.$class.' h2{padding:10px 0 10px 20px;border-left:solid 4px '.$colorB.';border-bottom:dotted 1px '.$colorC.';color:'.$colorA.'; }';}
if ($class == 'partsH2-14'){echo '.'.$class.' h2{position:relative;padding:10px 0 10px 20px;border-left:solid 4px '.$colorB.';color:'.$colorA.';}';}
if ($class == 'partsH2-14'){echo '.'.$class.' h2:before{content:"";position:absolute;left:-4px;bottom:0;width:4px;height:50%;background-color:'.$colorC.';}';}
if ($class == 'partsH2-14'){echo '.'.$class.' h2:after{content:"";position:absolute;left:0;bottom:0;width:100%;height:0;border-bottom:1px solid '.$colorC.';}';}

if ($class == 'partsH2-21'){echo '.'.$class.' h2{padding:20px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH2-22'){echo '.'.$class.' h2{padding:20px;border-bottom:4px solid '.$colorC.';color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH2-23'){echo '.'.$class.' h2{padding:20px;border-left:4px solid '.$colorC.';color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH2-24'){echo '.'.$class.' h2{padding:20px;border-left:4px solid '.$colorC.';border-bottom:4px solid rgba(0,0,0,.10);color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH2-25'){echo '.'.$class.' h2{position:relative;padding:20px;border-radius:5px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH2-25'){echo '.'.$class.' h2:after{position:absolute;top:100%;left:30px;content:"";height:0;width:0;border:10px solid transparent;margin-top:-2px;border-top:15px solid '.$colorB.';}';}
if ($class == 'partsH2-26'){echo '.'.$class.' h2{position:relative;padding:20px;border:1px solid '.$colorC.';border-radius:5px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH2-26'){echo '.'.$class.' h2:before{position:absolute;top:100%;left:30px;content:"";height:0;width:0;border:10px solid transparent;border-top:15px solid '.$colorC.';}';}
if ($class == 'partsH2-26'){echo '.'.$class.' h2:after{position:absolute;top:100%;left:30px;content:"";height:0;width:0;border:10px solid transparent;margin-top:-2px;border-top:15px solid '.$colorB.';}';}
if ($class == 'partsH2-27'){echo '.'.$class.' h2{position:relative;padding:20px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH2-27'){echo '.'.$class.' h2:before{content:"";position:absolute;top:100%;right:0;height:0;width:0;border:5px solid transparent;border-top:5px solid '.$colorC.';border-left:5px solid '.$colorC.';}';}
if ($class == 'partsH2-27'){echo '.'.$class.' h2:after{content:"";position:absolute;top:100%;left:0;height:0;width:0;border:5px solid transparent;border-top:5px solid '.$colorC.';border-right:5px solid '.$colorC.';}';}
if ($class == 'partsH2-28'){echo '.'.$class.' h2{position:relative;padding:20px;color:'.$colorA.'; background-color:'.$colorB.'}';}
if ($class == 'partsH2-28'){echo '.'.$class.' h2:before{content:"";position:absolute;top:-20px;left:0;width:100%;height:0;border:solid 10px transparent;border-bottom-color:'.$colorC.';}';}
if ($class == 'partsH2-29'){echo '.'.$class.' h2{position:relative;padding:20px;border:dashed 1px '.$colorC.';color:'.$colorA.'; background-color:'.$colorB.'; box-shadow:0px 0px 0px 5px '.$colorB.';}';}
if ($class == 'partsH2-30'){echo '.'.$class.' h2{position:relative;padding:20px;color:'.$colorA.'; background:repeating-linear-gradient(-45deg, '.$colorB.', '.$colorB.' 3px, '.$colorC.' 3px, '.$colorC.' 7px);}';}
if ($class == 'partsH2-31'){echo '.'.$class.' h2{position:relative;padding:20px;text-align:center;border:solid 1px '.$colorC.';color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH2-32'){echo '.'.$class.' h2{position:relative;padding:20px;text-align:center;border:dashed 1px '.$colorC.';border-radius:5px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH2-33'){echo '.'.$class.' h2{position:relative;padding:20px;text-align:center;color:'.$colorA.';}';}
if ($class == 'partsH2-33'){echo '.'.$class.' h2:before{display:inline-block;content:"";position:absolute;top:0;left:0;width:20px;height:30px;border-left:solid 1px '.$colorB.';border-top:solid 1px '.$colorB.';}';}
if ($class == 'partsH2-33'){echo '.'.$class.' h2:after{display:inline-block;content:"";position:absolute;bottom:0;right:0;width:20px;height:30px;border-right:solid 1px '.$colorB.';border-bottom:solid 1px '.$colorB.';}';}
if ($class == 'partsH2-34'){echo '.'.$class.' h2{position:relative;padding:20px;text-align:center;border-top:solid 1px '.$colorB.';border-bottom:solid 1px '.$colorB.';color:'.$colorA.';}';}
if ($class == 'partsH2-34'){echo '.'.$class.' h2:before{content:"";position:absolute;top:-10px;left:10px;width:1px;height:calc(100% + 20px);background-color:'.$colorB.';}';}
if ($class == 'partsH2-34'){echo '.'.$class.' h2:after{content:"";position:absolute;top:-10px;right:10px;width:1px;height:calc(100% + 20px);background-color:'.$colorB.';}';}

if ($class == 'partsH2-41'){echo '.'.$class.' h2{position:relative;padding:20px;border:1px solid '.$colorC.';box-shadow:inset 1px 1px 0 rgba(255,255,255,.5);color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%);}';}
if ($class == 'partsH2-42'){echo '.'.$class.' h2{position:relative;padding:20px;border-radius:5px;border:1px solid '.$colorC.';box-shadow:inset 1px 1px 0 rgba(255,255,255,.5);color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%);}';}
if ($class == 'partsH2-43'){echo '.'.$class.' h2{position:relative;padding:20px;border-radius:100px;border:1px solid '.$colorC.';box-shadow:inset 1px 1px 0 rgba(255,255,255,.5);color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%);}';}
if ($class == 'partsH2-44'){echo '.'.$class.' h2{position:relative;padding:20px;border:1px solid '.$colorC.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5);color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH2-45'){echo '.'.$class.' h2{position:relative;padding:20px;border-radius:5px;border:1px solid '.$colorC.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5);color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH2-46'){echo '.'.$class.' h2{position:relative;padding:20px;border-radius:50px;border:1px solid '.$colorC.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5);color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH2-47'){echo '.'.$class.' h2{position:relative;padding:20px;border:1px solid '.$colorC.';border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5); background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH2-48'){echo '.'.$class.' h2{position:relative;padding:20px;border-radius:5px;border:1px solid '.$colorC.';border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5); background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH2-49'){echo '.'.$class.' h2{position:relative;padding:20px;border:1px solid '.$colorC.';color:#fff;border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5); background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH2-50'){echo '.'.$class.' h2{position:relative;padding:20px;border-radius:5px;border:1px solid '.$colorC.';color:#fff;border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5); background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}

if ($class == 'partsH2-61'){echo '.'.$class.' h2{position:relative;padding:10px 0 10px 30px;color:'.$colorA.';}';}
if ($class == 'partsH2-61'){echo '.'.$class.' h2:after{content:"";position:absolute;top:50%;left:0;width:20px;height:4px;transform:translateY(-50%);background-color:'.$colorB.';}';}
if ($class == 'partsH2-62'){echo '.'.$class.' h2{position:relative;padding:20px 0 20px 30px;border-radius:5px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH2-62'){echo '.'.$class.' h2:after{content:"";position:absolute;top:50%;left:0;width:20px;height:4px;transform:translateY(-50%);background-color:'.$colorA.';}';}
if ($class == 'partsH2-63'){echo '.'.$class.' h2{position:relative;padding:20px 0 20px 30px;border:1px solid '.$colorC.';border-radius:5px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH2-63'){echo '.'.$class.' h2:after{content:"";position:absolute;top:50%;left:0;width:20px;height:4px;transform:translateY(-50%);background-color:'.$colorA.';}';}
if ($class == 'partsH2-64'){echo '.'.$class.' h2{position:relative;padding:20px 0 20px 30px;border:1px solid '.$colorC.';border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5); background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH2-64'){echo '.'.$class.' h2:after{content:"";position:absolute;top:50%;left:0;width:20px;height:4px;transform:translateY(-50%);background-color:'.$colorA.';}';}
if ($class == 'partsH2-65'){echo '.'.$class.' h2{position:relative;padding:20px 0 20px 30px;border:1px solid '.$colorC.';color:#fff;border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5); background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH2-65'){echo '.'.$class.' h2:after{content:"";position:absolute;top:50%;left:0;width:20px;height:4px;transform:translateY(-50%);background-color:'.$colorA.';}';}

if ($class == 'partsH2-71'){echo '.'.$class.' h2{position:relative;padding:10px 0 10px 25px;color:'.$colorA.';}';}
if ($class == 'partsH2-71'){echo '.'.$class.' h2:after{content:"";position:absolute;top:50%;left:0;width:15px;height:15px;border:solid 4px '.$colorB.';border-radius:100%;transform:translateY(-50%);}';}
if ($class == 'partsH2-72'){echo '.'.$class.' h2{position:relative;padding:20px 0 20px 35px;color:'.$colorA.'; background-color:'.$colorB.';border-radius:5px;}';}
if ($class == 'partsH2-72'){echo '.'.$class.' h2:after{content:"";position:absolute;top:50%;left:10px;width:15px;height:15px;border:solid 4px '.$colorA.';border-radius:100%;transform:translateY(-50%);}';}
if ($class == 'partsH2-73'){echo '.'.$class.' h2{position:relative;padding:20px 0 20px 35px;border:1px solid '.$colorC.';border-radius:5px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH2-73'){echo '.'.$class.' h2:after{content:"";position:absolute;top:50%;left:10px;width:15px;height:15px;border:solid 4px '.$colorA.';border-radius:100%;transform:translateY(-50%);}';}
if ($class == 'partsH2-74'){echo '.'.$class.' h2{position:relative;padding:20px 0 20px 35px;border:1px solid '.$colorC.';border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5);background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH2-74'){echo '.'.$class.' h2:after{content:"";position:absolute;top:50%;left:10px;width:15px;height:15px;border:solid 4px '.$colorA.';border-radius:100%;transform:translateY(-50%);}';}
if ($class == 'partsH2-75'){echo '.'.$class.' h2{position:relative;padding:20px 0 20px 35px;border:1px solid '.$colorC.';color:#fff;border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5);background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH2-75'){echo '.'.$class.' h2:after{content:"";position:absolute;top:50%;left:10px;width:15px;height:15px;border:solid 4px '.$colorA.';border-radius:100%;transform:translateY(-50%);}';}

if ($class == 'partsH2-81'){echo '.'.$class.' h2{color:'.$colorA.';}';}
if ($class == 'partsH2-81'){echo '.'.$class.' h2:first-letter{font-size:3.2rem;color:'.$colorB.';}';}
if ($class == 'partsH2-82'){echo '.'.$class.' h2{color:'.$colorA.';}';}
if ($class == 'partsH2-82'){echo '.'.$class.' h2:first-letter{font-size:3.2rem;padding-bottom:5px;	color:'.$colorA.';border-bottom:3px solid;color:'.$colorB.';}';}
if ($class == 'partsH2-83'){echo '.'.$class.' h2{padding:10px 0; border-bottom:dotted 1px '.$colorC.';color:'.$colorA.';}';}
if ($class == 'partsH2-83'){echo '.'.$class.' h2:first-letter{font-size:3.2rem;color:'.$colorB.';}';}
if ($class == 'partsH2-84'){echo '.'.$class.' h2{padding:20px;border:solid 1px '.$colorC.';border-radius:5px;color:'.$colorA.'; }';}
if ($class == 'partsH2-84'){echo '.'.$class.' h2:first-letter{font-size:3.2rem;color:'.$colorB.';}';}


//H3見出しデザイン
$colorA = '#191919';
$colorB = '#f2f2f2';
$colorC = '#d8d8d8';
$class  = 'partsH3-'.get_option('fit_partsHead_3');
if(get_theme_mod( 'fit_partsHead_3colorA' )){
  $colorA = esc_attr( get_theme_mod( 'fit_partsHead_3colorA' ));
}if(get_theme_mod( 'fit_partsHead_3colorB' )){
  $colorB = esc_attr( get_theme_mod( 'fit_partsHead_3colorB' ));
}if(get_theme_mod( 'fit_partsHead_3colorC' )){
  $colorC = esc_attr( get_theme_mod( 'fit_partsHead_3colorC' ));
}

if ($class == 'partsH3-' || $class == 'partsH3-off'){echo '.content h3{color:'.$colorA.'}';}
if ($class == 'partsH3-1' ){echo '.'.$class.' h3{padding-bottom:10px;border-bottom:solid 4px '.$colorB.';color:'.$colorA.';}';}
if ($class == 'partsH3-2' ){echo '.'.$class.' h3{position:relative;padding-bottom:16px;color:'.$colorA.';}';}
if ($class == 'partsH3-2' ){echo '.'.$class.' h3:after{content:"";display:block;position:absolute;bottom:0;width:100%;height:6px;border-top:2px solid '.$colorB.';border-bottom:1px solid '.$colorB.';}';}
if ($class == 'partsH3-3' ){echo '.'.$class.' h3{padding-bottom:10px;border-bottom:dotted 1px '.$colorB.';color:'.$colorA.';}';}
if ($class == 'partsH3-4' ){echo '.'.$class.' h3{position:relative;padding-bottom:14px;overflow:hidden;color:'.$colorA.';}';}
if ($class == 'partsH3-4' ){echo '.'.$class.' h3:before{content:"";position:absolute;bottom:0;width:100%;border-bottom:4px solid '.$colorB.';}';}
if ($class == 'partsH3-4' ){echo '.'.$class.' h3:after{content:"";position:absolute;bottom:0;width:100%;border-bottom:4px solid '.$colorC.';}';}
if ($class == 'partsH3-5' ){echo '.'.$class.' h3{color:'.$colorA.'; background:linear-gradient(transparent 60%, '.$colorB.' 60%);}';}
if ($class == 'partsH3-6' ){echo '.'.$class.' h3{position:relative;padding-bottom:14px;padding-right:30px;color:'.$colorA.';}';}
if ($class == 'partsH3-6' ){echo '.'.$class.' h3:before{content:"";position:absolute;bottom:-0;right:0;width:0;height:0;border:none;border-right:solid 15px transparent;border-bottom:solid 15px '.$colorB.';}';}
if ($class == 'partsH3-6' ){echo '.'.$class.' h3:after{content:"";position:absolute;bottom:0;right:10px;width:100%;border-bottom:solid 4px '.$colorB.';}';}
if ($class == 'partsH3-7' ){echo '.'.$class.' h3{position:relative;padding-bottom:16px;color:'.$colorA.';}';}
if ($class == 'partsH3-7' ){echo '.'.$class.' h3:after{content:"";position:absolute;left:0;bottom:0;width:100%;height:6px;background:repeating-linear-gradient(-45deg, '.$colorB.', '.$colorB.' 2px, '.$colorC.' 2px, '.$colorC.' 4px);}';}
if ($class == 'partsH3-8' ){echo '.'.$class.' h3{position:relative;padding-bottom:14px;color:'.$colorA.';}';}
if ($class == 'partsH3-8' ){echo '.'.$class.' h3:after{content:"";position:absolute;left:0;bottom:0;width:100%;height:4px;background:linear-gradient(to right, '.$colorB.', '.$colorC.');}';}
if ($class == 'partsH3-9' ){echo '.'.$class.' h3{position:relative;padding-bottom:14px;text-align:center;color:'.$colorA.';}';}
if ($class == 'partsH3-9' ){echo '.'.$class.' h3:after{content:"";position:absolute;bottom:0;display:inline-block;width:60px;height:4px;left:50%;transform:translateX(-50%);border-radius:2px;background-color:'.$colorB.';}';}
if ($class == 'partsH3-10'){echo '.'.$class.' h3{position:relative;padding-bottom:10px;text-align:center;border-bottom:1px solid '.$colorB.';color:'.$colorA.';}';}
if ($class == 'partsH3-10'){echo '.'.$class.' h3:before{content:"";position:absolute;top:100%;left:50%;transform:translateX(-50%);border:10px solid transparent;border-top:10px solid '.$colorB.';}';}
if ($class == 'partsH3-10'){echo '.'.$class.' h3:after{content:"";position:absolute;top:100%;left:50%;transform:translateX(-50%);border:10px solid transparent;border-top:10px solid #fff;	margin-top:-1px;}';}
if ($class == 'partsH3-11'){echo '.'.$class.' h3{padding:10px 0 10px 20px;border-left:solid 4px '.$colorB.';color:'.$colorA.';}';}
if ($class == 'partsH3-12'){echo '.'.$class.' h3{padding:10px 0 10px 20px;border-left:solid 4px '.$colorB.';border-bottom:solid 1px '.$colorC.';color:'.$colorA.';}';}
if ($class == 'partsH3-13'){echo '.'.$class.' h3{padding:10px 0 10px 20px;border-left:solid 4px '.$colorB.';border-bottom:dotted 1px '.$colorC.';color:'.$colorA.'; }';}
if ($class == 'partsH3-14'){echo '.'.$class.' h3{position:relative;padding:10px 0 10px 20px;border-left:solid 4px '.$colorB.';color:'.$colorA.';}';}
if ($class == 'partsH3-14'){echo '.'.$class.' h3:before{content:"";position:absolute;left:-4px;bottom:0;width:4px;height:50%;background-color:'.$colorC.';}';}
if ($class == 'partsH3-14'){echo '.'.$class.' h3:after{content:"";position:absolute;left:0;bottom:0;width:100%;height:0;border-bottom:1px solid '.$colorC.';}';}

if ($class == 'partsH3-21'){echo '.'.$class.' h3{padding:20px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH3-22'){echo '.'.$class.' h3{padding:20px;border-bottom:4px solid '.$colorC.';color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH3-23'){echo '.'.$class.' h3{padding:20px;border-left:4px solid '.$colorC.';color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH3-24'){echo '.'.$class.' h3{padding:20px;border-left:4px solid '.$colorC.';border-bottom:4px solid rgba(0,0,0,.10);color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH3-25'){echo '.'.$class.' h3{position:relative;padding:20px;border-radius:5px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH3-25'){echo '.'.$class.' h3:after{position:absolute;top:100%;left:30px;content:"";height:0;width:0;border:10px solid transparent;margin-top:-2px;border-top:15px solid '.$colorB.';}';}
if ($class == 'partsH3-26'){echo '.'.$class.' h3{position:relative;padding:20px;border:1px solid '.$colorC.';border-radius:5px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH3-26'){echo '.'.$class.' h3:before{position:absolute;top:100%;left:30px;content:"";height:0;width:0;border:10px solid transparent;border-top:15px solid '.$colorC.';}';}
if ($class == 'partsH3-26'){echo '.'.$class.' h3:after{position:absolute;top:100%;left:30px;content:"";height:0;width:0;border:10px solid transparent;margin-top:-2px;border-top:15px solid '.$colorB.';}';}
if ($class == 'partsH3-27'){echo '.'.$class.' h3{position:relative;padding:20px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH3-27'){echo '.'.$class.' h3:before{content:"";position:absolute;top:100%;right:0;height:0;width:0;border:5px solid transparent;border-top:5px solid '.$colorC.';border-left:5px solid '.$colorC.';}';}
if ($class == 'partsH3-27'){echo '.'.$class.' h3:after{content:"";position:absolute;top:100%;left:0;height:0;width:0;border:5px solid transparent;border-top:5px solid '.$colorC.';border-right:5px solid '.$colorC.';}';}
if ($class == 'partsH3-28'){echo '.'.$class.' h3{position:relative;padding:20px;color:'.$colorA.'; background-color:'.$colorB.'}';}
if ($class == 'partsH3-28'){echo '.'.$class.' h3:before{content:"";position:absolute;top:-20px;left:0;width:100%;height:0;border:solid 10px transparent;border-bottom-color:'.$colorC.';}';}
if ($class == 'partsH3-29'){echo '.'.$class.' h3{position:relative;padding:20px;border:dashed 1px '.$colorC.';color:'.$colorA.'; background-color:'.$colorB.'; box-shadow:0px 0px 0px 5px '.$colorB.';}';}
if ($class == 'partsH3-30'){echo '.'.$class.' h3{position:relative;padding:20px;color:'.$colorA.'; background:repeating-linear-gradient(-45deg, '.$colorB.', '.$colorB.' 3px, '.$colorC.' 3px, '.$colorC.' 7px);}';}
if ($class == 'partsH3-31'){echo '.'.$class.' h3{position:relative;padding:20px;text-align:center;border:solid 1px '.$colorC.';color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH3-32'){echo '.'.$class.' h3{position:relative;padding:20px;text-align:center;border:dashed 1px '.$colorC.';border-radius:5px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH3-33'){echo '.'.$class.' h3{position:relative;padding:20px;text-align:center;color:'.$colorA.';}';}
if ($class == 'partsH3-33'){echo '.'.$class.' h3:before{display:inline-block;content:"";position:absolute;top:0;left:0;width:20px;height:30px;border-left:solid 1px '.$colorB.';border-top:solid 1px '.$colorB.';}';}
if ($class == 'partsH3-33'){echo '.'.$class.' h3:after{display:inline-block;content:"";position:absolute;bottom:0;right:0;width:20px;height:30px;border-right:solid 1px '.$colorB.';border-bottom:solid 1px '.$colorB.';}';}
if ($class == 'partsH3-34'){echo '.'.$class.' h3{position:relative;padding:20px;text-align:center;border-top:solid 1px '.$colorB.';border-bottom:solid 1px '.$colorB.';color:'.$colorA.';}';}
if ($class == 'partsH3-34'){echo '.'.$class.' h3:before{content:"";position:absolute;top:-10px;left:10px;width:1px;height:calc(100% + 20px);background-color:'.$colorB.';}';}
if ($class == 'partsH3-34'){echo '.'.$class.' h3:after{content:"";position:absolute;top:-10px;right:10px;width:1px;height:calc(100% + 20px);background-color:'.$colorB.';}';}

if ($class == 'partsH3-41'){echo '.'.$class.' h3{position:relative;padding:20px;border:1px solid '.$colorC.';box-shadow:inset 1px 1px 0 rgba(255,255,255,.5);color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%);}';}
if ($class == 'partsH3-42'){echo '.'.$class.' h3{position:relative;padding:20px;border-radius:5px;border:1px solid '.$colorC.';box-shadow:inset 1px 1px 0 rgba(255,255,255,.5);color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%);}';}
if ($class == 'partsH3-43'){echo '.'.$class.' h3{position:relative;padding:20px;border-radius:100px;border:1px solid '.$colorC.';box-shadow:inset 1px 1px 0 rgba(255,255,255,.5);color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%);}';}
if ($class == 'partsH3-44'){echo '.'.$class.' h3{position:relative;padding:20px;border:1px solid '.$colorC.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5);color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH3-45'){echo '.'.$class.' h3{position:relative;padding:20px;border-radius:5px;border:1px solid '.$colorC.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5);color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH3-46'){echo '.'.$class.' h3{position:relative;padding:20px;border-radius:50px;border:1px solid '.$colorC.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5);color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH3-47'){echo '.'.$class.' h3{position:relative;padding:20px;border:1px solid '.$colorC.';border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5); background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH3-48'){echo '.'.$class.' h3{position:relative;padding:20px;border-radius:5px;border:1px solid '.$colorC.';border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5); background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH3-49'){echo '.'.$class.' h3{position:relative;padding:20px;border:1px solid '.$colorC.';color:#fff;border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5); background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH3-50'){echo '.'.$class.' h3{position:relative;padding:20px;border-radius:5px;border:1px solid '.$colorC.';color:#fff;border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5); background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}

if ($class == 'partsH3-61'){echo '.'.$class.' h3{position:relative;padding:10px 0 10px 30px;color:'.$colorA.';}';}
if ($class == 'partsH3-61'){echo '.'.$class.' h3:after{content:"";position:absolute;top:50%;left:0;width:20px;height:4px;transform:translateY(-50%);background-color:'.$colorB.';}';}
if ($class == 'partsH3-62'){echo '.'.$class.' h3{position:relative;padding:20px 0 20px 30px;border-radius:5px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH3-62'){echo '.'.$class.' h3:after{content:"";position:absolute;top:50%;left:0;width:20px;height:4px;transform:translateY(-50%);background-color:'.$colorA.';}';}
if ($class == 'partsH3-63'){echo '.'.$class.' h3{position:relative;padding:20px 0 20px 30px;border:1px solid '.$colorC.';border-radius:5px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH3-63'){echo '.'.$class.' h3:after{content:"";position:absolute;top:50%;left:0;width:20px;height:4px;transform:translateY(-50%);background-color:'.$colorA.';}';}
if ($class == 'partsH3-64'){echo '.'.$class.' h3{position:relative;padding:20px 0 20px 30px;border:1px solid '.$colorC.';border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5); background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH3-64'){echo '.'.$class.' h3:after{content:"";position:absolute;top:50%;left:0;width:20px;height:4px;transform:translateY(-50%);background-color:'.$colorA.';}';}
if ($class == 'partsH3-65'){echo '.'.$class.' h3{position:relative;padding:20px 0 20px 30px;border:1px solid '.$colorC.';color:#fff;border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5); background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH3-65'){echo '.'.$class.' h3:after{content:"";position:absolute;top:50%;left:0;width:20px;height:4px;transform:translateY(-50%);background-color:'.$colorA.';}';}

if ($class == 'partsH3-71'){echo '.'.$class.' h3{position:relative;padding:10px 0 10px 25px;color:'.$colorA.';}';}
if ($class == 'partsH3-71'){echo '.'.$class.' h3:after{content:"";position:absolute;top:50%;left:0;width:15px;height:15px;border:solid 4px '.$colorB.';border-radius:100%;transform:translateY(-50%);}';}
if ($class == 'partsH3-72'){echo '.'.$class.' h3{position:relative;padding:20px 0 20px 35px;color:'.$colorA.'; background-color:'.$colorB.';border-radius:5px;}';}
if ($class == 'partsH3-72'){echo '.'.$class.' h3:after{content:"";position:absolute;top:50%;left:10px;width:15px;height:15px;border:solid 4px '.$colorA.';border-radius:100%;transform:translateY(-50%);}';}
if ($class == 'partsH3-73'){echo '.'.$class.' h3{position:relative;padding:20px 0 20px 35px;border:1px solid '.$colorC.';border-radius:5px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH3-73'){echo '.'.$class.' h3:after{content:"";position:absolute;top:50%;left:10px;width:15px;height:15px;border:solid 4px '.$colorA.';border-radius:100%;transform:translateY(-50%);}';}
if ($class == 'partsH3-74'){echo '.'.$class.' h3{position:relative;padding:20px 0 20px 35px;border:1px solid '.$colorC.';border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5);background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH3-74'){echo '.'.$class.' h3:after{content:"";position:absolute;top:50%;left:10px;width:15px;height:15px;border:solid 4px '.$colorA.';border-radius:100%;transform:translateY(-50%);}';}
if ($class == 'partsH3-75'){echo '.'.$class.' h3{position:relative;padding:20px 0 20px 35px;border:1px solid '.$colorC.';color:#fff;border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5);background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH3-75'){echo '.'.$class.' h3:after{content:"";position:absolute;top:50%;left:10px;width:15px;height:15px;border:solid 4px '.$colorA.';border-radius:100%;transform:translateY(-50%);}';}

if ($class == 'partsH3-81'){echo '.'.$class.' h3{color:'.$colorA.';}';}
if ($class == 'partsH3-81'){echo '.'.$class.' h3:first-letter{font-size:2.8rem;color:'.$colorB.';}';}
if ($class == 'partsH3-82'){echo '.'.$class.' h3{color:'.$colorA.';}';}
if ($class == 'partsH3-82'){echo '.'.$class.' h3:first-letter{font-size:2.8em;padding-bottom:5px;	color:'.$colorA.';border-bottom:3px solid;color:'.$colorB.';}';}
if ($class == 'partsH3-83'){echo '.'.$class.' h3{padding:10px 0; border-bottom:dotted 1px '.$colorC.';color:'.$colorA.';}';}
if ($class == 'partsH3-83'){echo '.'.$class.' h3:first-letter{font-size:2.8rem;color:'.$colorB.';}';}
if ($class == 'partsH3-84'){echo '.'.$class.' h3{padding:20px;border:solid 1px '.$colorC.';border-radius:5px;color:'.$colorA.'; }';}
if ($class == 'partsH3-84'){echo '.'.$class.' h3:first-letter{font-size:2.8rem;color:'.$colorB.';}';}


//H4見出しデザイン
$colorA = '#191919';
$colorB = '#f2f2f2';
$colorC = '#d8d8d8';
$class  = 'partsH4-'.get_option('fit_partsHead_4');
if(get_theme_mod( 'fit_partsHead_4colorA' )){
  $colorA = esc_attr( get_theme_mod( 'fit_partsHead_4colorA' ));
}if(get_theme_mod( 'fit_partsHead_4colorB' )){
  $colorB = esc_attr( get_theme_mod( 'fit_partsHead_4colorB' ));
}if(get_theme_mod( 'fit_partsHead_4colorC' )){
  $colorC = esc_attr( get_theme_mod( 'fit_partsHead_4colorC' ));
}

if ($class == 'partsH4-' || $class == 'partsH4-off'){echo '.content h4{color:'.$colorA.'}';}
if ($class == 'partsH4-1' ){echo '.'.$class.' h4{padding-bottom:10px;border-bottom:solid 4px '.$colorB.';color:'.$colorA.';}';}
if ($class == 'partsH4-2' ){echo '.'.$class.' h4{position:relative;padding-bottom:16px;color:'.$colorA.';}';}
if ($class == 'partsH4-2' ){echo '.'.$class.' h4:after{content:"";display:block;position:absolute;bottom:0;width:100%;height:6px;border-top:2px solid '.$colorB.';border-bottom:1px solid '.$colorB.';}';}
if ($class == 'partsH4-3' ){echo '.'.$class.' h4{padding-bottom:10px;border-bottom:dotted 1px '.$colorB.';color:'.$colorA.';}';}
if ($class == 'partsH4-4' ){echo '.'.$class.' h4{position:relative;padding-bottom:14px;overflow:hidden;color:'.$colorA.';}';}
if ($class == 'partsH4-4' ){echo '.'.$class.' h4:before{content:"";position:absolute;bottom:0;width:100%;border-bottom:4px solid '.$colorB.';}';}
if ($class == 'partsH4-4' ){echo '.'.$class.' h4:after{content:"";position:absolute;bottom:0;width:100%;border-bottom:4px solid '.$colorC.';}';}
if ($class == 'partsH4-5' ){echo '.'.$class.' h4{color:'.$colorA.'; background:linear-gradient(transparent 60%, '.$colorB.' 60%);}';}
if ($class == 'partsH4-6' ){echo '.'.$class.' h4{position:relative;padding-bottom:14px;padding-right:30px;color:'.$colorA.';}';}
if ($class == 'partsH4-6' ){echo '.'.$class.' h4:before{content:"";position:absolute;bottom:-0;right:0;width:0;height:0;border:none;border-right:solid 15px transparent;border-bottom:solid 15px '.$colorB.';}';}
if ($class == 'partsH4-6' ){echo '.'.$class.' h4:after{content:"";position:absolute;bottom:0;right:10px;width:100%;border-bottom:solid 4px '.$colorB.';}';}
if ($class == 'partsH4-7' ){echo '.'.$class.' h4{position:relative;padding-bottom:16px;color:'.$colorA.';}';}
if ($class == 'partsH4-7' ){echo '.'.$class.' h4:after{content:"";position:absolute;left:0;bottom:0;width:100%;height:6px;background:repeating-linear-gradient(-45deg, '.$colorB.', '.$colorB.' 2px, '.$colorC.' 2px, '.$colorC.' 4px);}';}
if ($class == 'partsH4-8' ){echo '.'.$class.' h4{position:relative;padding-bottom:14px;color:'.$colorA.';}';}
if ($class == 'partsH4-8' ){echo '.'.$class.' h4:after{content:"";position:absolute;left:0;bottom:0;width:100%;height:4px;background:linear-gradient(to right, '.$colorB.', '.$colorC.');}';}
if ($class == 'partsH4-9' ){echo '.'.$class.' h4{position:relative;padding-bottom:14px;text-align:center;color:'.$colorA.';}';}
if ($class == 'partsH4-9' ){echo '.'.$class.' h4:after{content:"";position:absolute;bottom:0;display:inline-block;width:60px;height:4px;left:50%;transform:translateX(-50%);border-radius:2px;background-color:'.$colorB.';}';}
if ($class == 'partsH4-10'){echo '.'.$class.' h4{position:relative;padding-bottom:10px;text-align:center;border-bottom:1px solid '.$colorB.';color:'.$colorA.';}';}
if ($class == 'partsH4-10'){echo '.'.$class.' h4:before{content:"";position:absolute;top:100%;left:50%;transform:translateX(-50%);border:10px solid transparent;border-top:10px solid '.$colorB.';}';}
if ($class == 'partsH4-10'){echo '.'.$class.' h4:after{content:"";position:absolute;top:100%;left:50%;transform:translateX(-50%);border:10px solid transparent;border-top:10px solid #fff;	margin-top:-1px;}';}
if ($class == 'partsH4-11'){echo '.'.$class.' h4{padding:10px 0 10px 20px;border-left:solid 4px '.$colorB.';color:'.$colorA.';}';}
if ($class == 'partsH4-12'){echo '.'.$class.' h4{padding:10px 0 10px 20px;border-left:solid 4px '.$colorB.';border-bottom:solid 1px '.$colorC.';color:'.$colorA.';}';}
if ($class == 'partsH4-13'){echo '.'.$class.' h4{padding:10px 0 10px 20px;border-left:solid 4px '.$colorB.';border-bottom:dotted 1px '.$colorC.';color:'.$colorA.'; }';}
if ($class == 'partsH4-14'){echo '.'.$class.' h4{position:relative;padding:10px 0 10px 20px;border-left:solid 4px '.$colorB.';color:'.$colorA.';}';}
if ($class == 'partsH4-14'){echo '.'.$class.' h4:before{content:"";position:absolute;left:-4px;bottom:0;width:4px;height:50%;background-color:'.$colorC.';}';}
if ($class == 'partsH4-14'){echo '.'.$class.' h4:after{content:"";position:absolute;left:0;bottom:0;width:100%;height:0;border-bottom:1px solid '.$colorC.';}';}

if ($class == 'partsH4-21'){echo '.'.$class.' h4{padding:20px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH4-22'){echo '.'.$class.' h4{padding:20px;border-bottom:4px solid '.$colorC.';color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH4-23'){echo '.'.$class.' h4{padding:20px;border-left:4px solid '.$colorC.';color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH4-24'){echo '.'.$class.' h4{padding:20px;border-left:4px solid '.$colorC.';border-bottom:4px solid rgba(0,0,0,.10);color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH4-25'){echo '.'.$class.' h4{position:relative;padding:20px;border-radius:5px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH4-25'){echo '.'.$class.' h4:after{position:absolute;top:100%;left:30px;content:"";height:0;width:0;border:10px solid transparent;margin-top:-2px;border-top:15px solid '.$colorB.';}';}
if ($class == 'partsH4-26'){echo '.'.$class.' h4{position:relative;padding:20px;border:1px solid '.$colorC.';border-radius:5px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH4-26'){echo '.'.$class.' h4:before{position:absolute;top:100%;left:30px;content:"";height:0;width:0;border:10px solid transparent;border-top:15px solid '.$colorC.';}';}
if ($class == 'partsH4-26'){echo '.'.$class.' h4:after{position:absolute;top:100%;left:30px;content:"";height:0;width:0;border:10px solid transparent;margin-top:-2px;border-top:15px solid '.$colorB.';}';}
if ($class == 'partsH4-27'){echo '.'.$class.' h4{position:relative;padding:20px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH4-27'){echo '.'.$class.' h4:before{content:"";position:absolute;top:100%;right:0;height:0;width:0;border:5px solid transparent;border-top:5px solid '.$colorC.';border-left:5px solid '.$colorC.';}';}
if ($class == 'partsH4-27'){echo '.'.$class.' h4:after{content:"";position:absolute;top:100%;left:0;height:0;width:0;border:5px solid transparent;border-top:5px solid '.$colorC.';border-right:5px solid '.$colorC.';}';}
if ($class == 'partsH4-28'){echo '.'.$class.' h4{position:relative;padding:20px;color:'.$colorA.'; background-color:'.$colorB.'}';}
if ($class == 'partsH4-28'){echo '.'.$class.' h4:before{content:"";position:absolute;top:-20px;left:0;width:100%;height:0;border:solid 10px transparent;border-bottom-color:'.$colorC.';}';}
if ($class == 'partsH4-29'){echo '.'.$class.' h4{position:relative;padding:20px;border:dashed 1px '.$colorC.';color:'.$colorA.'; background-color:'.$colorB.'; box-shadow:0px 0px 0px 5px '.$colorB.';}';}
if ($class == 'partsH4-30'){echo '.'.$class.' h4{position:relative;padding:20px;color:'.$colorA.'; background:repeating-linear-gradient(-45deg, '.$colorB.', '.$colorB.' 3px, '.$colorC.' 3px, '.$colorC.' 7px);}';}
if ($class == 'partsH4-31'){echo '.'.$class.' h4{position:relative;padding:20px;text-align:center;border:solid 1px '.$colorC.';color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH4-32'){echo '.'.$class.' h4{position:relative;padding:20px;text-align:center;border:dashed 1px '.$colorC.';border-radius:5px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH4-33'){echo '.'.$class.' h4{position:relative;padding:20px;text-align:center;color:'.$colorA.';}';}
if ($class == 'partsH4-33'){echo '.'.$class.' h4:before{display:inline-block;content:"";position:absolute;top:0;left:0;width:20px;height:30px;border-left:solid 1px '.$colorB.';border-top:solid 1px '.$colorB.';}';}
if ($class == 'partsH4-33'){echo '.'.$class.' h4:after{display:inline-block;content:"";position:absolute;bottom:0;right:0;width:20px;height:30px;border-right:solid 1px '.$colorB.';border-bottom:solid 1px '.$colorB.';}';}
if ($class == 'partsH4-34'){echo '.'.$class.' h4{position:relative;padding:20px;text-align:center;border-top:solid 1px '.$colorB.';border-bottom:solid 1px '.$colorB.';color:'.$colorA.';}';}
if ($class == 'partsH4-34'){echo '.'.$class.' h4:before{content:"";position:absolute;top:-10px;left:10px;width:1px;height:calc(100% + 20px);background-color:'.$colorB.';}';}
if ($class == 'partsH4-34'){echo '.'.$class.' h4:after{content:"";position:absolute;top:-10px;right:10px;width:1px;height:calc(100% + 20px);background-color:'.$colorB.';}';}

if ($class == 'partsH4-41'){echo '.'.$class.' h4{position:relative;padding:20px;border:1px solid '.$colorC.';box-shadow:inset 1px 1px 0 rgba(255,255,255,.5);color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%);}';}
if ($class == 'partsH4-42'){echo '.'.$class.' h4{position:relative;padding:20px;border-radius:5px;border:1px solid '.$colorC.';box-shadow:inset 1px 1px 0 rgba(255,255,255,.5);color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%);}';}
if ($class == 'partsH4-43'){echo '.'.$class.' h4{position:relative;padding:20px;border-radius:100px;border:1px solid '.$colorC.';box-shadow:inset 1px 1px 0 rgba(255,255,255,.5);color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%);}';}
if ($class == 'partsH4-44'){echo '.'.$class.' h4{position:relative;padding:20px;border:1px solid '.$colorC.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5);color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH4-45'){echo '.'.$class.' h4{position:relative;padding:20px;border-radius:5px;border:1px solid '.$colorC.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5);color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH4-46'){echo '.'.$class.' h4{position:relative;padding:20px;border-radius:50px;border:1px solid '.$colorC.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5);color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH4-47'){echo '.'.$class.' h4{position:relative;padding:20px;border:1px solid '.$colorC.';border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5); background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH4-48'){echo '.'.$class.' h4{position:relative;padding:20px;border-radius:5px;border:1px solid '.$colorC.';border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5); background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH4-49'){echo '.'.$class.' h4{position:relative;padding:20px;border:1px solid '.$colorC.';color:#fff;border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5); background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH4-50'){echo '.'.$class.' h4{position:relative;padding:20px;border-radius:5px;border:1px solid '.$colorC.';color:#fff;border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5); background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}

if ($class == 'partsH4-61'){echo '.'.$class.' h4{position:relative;padding:10px 0 10px 30px;color:'.$colorA.';}';}
if ($class == 'partsH4-61'){echo '.'.$class.' h4:after{content:"";position:absolute;top:50%;left:0;width:20px;height:4px;transform:translateY(-50%);background-color:'.$colorB.';}';}
if ($class == 'partsH4-62'){echo '.'.$class.' h4{position:relative;padding:20px 0 20px 30px;border-radius:5px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH4-62'){echo '.'.$class.' h4:after{content:"";position:absolute;top:50%;left:0;width:20px;height:4px;transform:translateY(-50%);background-color:'.$colorA.';}';}
if ($class == 'partsH4-63'){echo '.'.$class.' h4{position:relative;padding:20px 0 20px 30px;border:1px solid '.$colorC.';border-radius:5px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH4-63'){echo '.'.$class.' h4:after{content:"";position:absolute;top:50%;left:0;width:20px;height:4px;transform:translateY(-50%);background-color:'.$colorA.';}';}
if ($class == 'partsH4-64'){echo '.'.$class.' h4{position:relative;padding:20px 0 20px 30px;border:1px solid '.$colorC.';border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5); background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH4-64'){echo '.'.$class.' h4:after{content:"";position:absolute;top:50%;left:0;width:20px;height:4px;transform:translateY(-50%);background-color:'.$colorA.';}';}
if ($class == 'partsH4-65'){echo '.'.$class.' h4{position:relative;padding:20px 0 20px 30px;border:1px solid '.$colorC.';color:#fff;border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5); background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH4-65'){echo '.'.$class.' h4:after{content:"";position:absolute;top:50%;left:0;width:20px;height:4px;transform:translateY(-50%);background-color:'.$colorA.';}';}

if ($class == 'partsH4-71'){echo '.'.$class.' h4{position:relative;padding:10px 0 10px 25px;color:'.$colorA.';}';}
if ($class == 'partsH4-71'){echo '.'.$class.' h4:after{content:"";position:absolute;top:50%;left:0;width:15px;height:15px;border:solid 4px '.$colorB.';border-radius:100%;transform:translateY(-50%);}';}
if ($class == 'partsH4-72'){echo '.'.$class.' h4{position:relative;padding:20px 0 20px 35px;color:'.$colorA.'; background-color:'.$colorB.';border-radius:5px;}';}
if ($class == 'partsH4-72'){echo '.'.$class.' h4:after{content:"";position:absolute;top:50%;left:10px;width:15px;height:15px;border:solid 4px '.$colorA.';border-radius:100%;transform:translateY(-50%);}';}
if ($class == 'partsH4-73'){echo '.'.$class.' h4{position:relative;padding:20px 0 20px 35px;border:1px solid '.$colorC.';border-radius:5px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH4-73'){echo '.'.$class.' h4:after{content:"";position:absolute;top:50%;left:10px;width:15px;height:15px;border:solid 4px '.$colorA.';border-radius:100%;transform:translateY(-50%);}';}
if ($class == 'partsH4-74'){echo '.'.$class.' h4{position:relative;padding:20px 0 20px 35px;border:1px solid '.$colorC.';border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5);background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH4-74'){echo '.'.$class.' h4:after{content:"";position:absolute;top:50%;left:10px;width:15px;height:15px;border:solid 4px '.$colorA.';border-radius:100%;transform:translateY(-50%);}';}
if ($class == 'partsH4-75'){echo '.'.$class.' h4{position:relative;padding:20px 0 20px 35px;border:1px solid '.$colorC.';color:#fff;border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5);background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH4-75'){echo '.'.$class.' h4:after{content:"";position:absolute;top:50%;left:10px;width:15px;height:15px;border:solid 4px '.$colorA.';border-radius:100%;transform:translateY(-50%);}';}

if ($class == 'partsH4-81'){echo '.'.$class.' h4{color:'.$colorA.';}';}
if ($class == 'partsH4-81'){echo '.'.$class.' h4:first-letter{font-size:2.6rem;color:'.$colorB.';}';}
if ($class == 'partsH4-82'){echo '.'.$class.' h4{color:'.$colorA.';}';}
if ($class == 'partsH4-82'){echo '.'.$class.' h4:first-letter{font-size:2.6em;padding-bottom:5px;	color:'.$colorA.';border-bottom:3px solid;color:'.$colorB.';}';}
if ($class == 'partsH4-83'){echo '.'.$class.' h4{padding:10px 0; border-bottom:dotted 1px '.$colorC.';color:'.$colorA.';}';}
if ($class == 'partsH4-83'){echo '.'.$class.' h4:first-letter{font-size:2.6rem;color:'.$colorB.';}';}
if ($class == 'partsH4-84'){echo '.'.$class.' h4{padding:20px;border:solid 1px '.$colorC.';border-radius:5px;color:'.$colorA.'; }';}
if ($class == 'partsH4-84'){echo '.'.$class.' h4:first-letter{font-size:2.6rem;color:'.$colorB.';}';}



//H5見出しデザイン
$colorA = '#191919';
$colorB = '#f2f2f2';
$colorC = '#d8d8d8';
$class  = 'partsH5-'.get_option('fit_partsHead_5');
if(get_theme_mod( 'fit_partsHead_5colorA' )){
  $colorA = esc_attr( get_theme_mod( 'fit_partsHead_5colorA' ));
}if(get_theme_mod( 'fit_partsHead_5colorB' )){
  $colorB = esc_attr( get_theme_mod( 'fit_partsHead_5colorB' ));
}if(get_theme_mod( 'fit_partsHead_5colorC' )){
  $colorC = esc_attr( get_theme_mod( 'fit_partsHead_5colorC' ));
}

if ($class == 'partsH5-' || $class == 'partsH5-off'){echo '.content h4{color:'.$colorA.'}';}
if ($class == 'partsH5-1' ){echo '.'.$class.' h4{padding-bottom:10px;border-bottom:solid 4px '.$colorB.';color:'.$colorA.';}';}
if ($class == 'partsH5-2' ){echo '.'.$class.' h4{position:relative;padding-bottom:16px;color:'.$colorA.';}';}
if ($class == 'partsH5-2' ){echo '.'.$class.' h4:after{content:"";display:block;position:absolute;bottom:0;width:100%;height:6px;border-top:2px solid '.$colorB.';border-bottom:1px solid '.$colorB.';}';}
if ($class == 'partsH5-3' ){echo '.'.$class.' h4{padding-bottom:10px;border-bottom:dotted 1px '.$colorB.';color:'.$colorA.';}';}
if ($class == 'partsH5-4' ){echo '.'.$class.' h4{position:relative;padding-bottom:14px;overflow:hidden;color:'.$colorA.';}';}
if ($class == 'partsH5-4' ){echo '.'.$class.' h4:before{content:"";position:absolute;bottom:0;width:100%;border-bottom:4px solid '.$colorB.';}';}
if ($class == 'partsH5-4' ){echo '.'.$class.' h4:after{content:"";position:absolute;bottom:0;width:100%;border-bottom:4px solid '.$colorC.';}';}
if ($class == 'partsH5-5' ){echo '.'.$class.' h4{color:'.$colorA.'; background:linear-gradient(transparent 60%, '.$colorB.' 60%);}';}
if ($class == 'partsH5-6' ){echo '.'.$class.' h4{position:relative;padding-bottom:14px;padding-right:30px;color:'.$colorA.';}';}
if ($class == 'partsH5-6' ){echo '.'.$class.' h4:before{content:"";position:absolute;bottom:-0;right:0;width:0;height:0;border:none;border-right:solid 15px transparent;border-bottom:solid 15px '.$colorB.';}';}
if ($class == 'partsH5-6' ){echo '.'.$class.' h4:after{content:"";position:absolute;bottom:0;right:10px;width:100%;border-bottom:solid 4px '.$colorB.';}';}
if ($class == 'partsH5-7' ){echo '.'.$class.' h4{position:relative;padding-bottom:16px;color:'.$colorA.';}';}
if ($class == 'partsH5-7' ){echo '.'.$class.' h4:after{content:"";position:absolute;left:0;bottom:0;width:100%;height:6px;background:repeating-linear-gradient(-45deg, '.$colorB.', '.$colorB.' 2px, '.$colorC.' 2px, '.$colorC.' 4px);}';}
if ($class == 'partsH5-8' ){echo '.'.$class.' h4{position:relative;padding-bottom:14px;color:'.$colorA.';}';}
if ($class == 'partsH5-8' ){echo '.'.$class.' h4:after{content:"";position:absolute;left:0;bottom:0;width:100%;height:4px;background:linear-gradient(to right, '.$colorB.', '.$colorC.');}';}
if ($class == 'partsH5-9' ){echo '.'.$class.' h4{position:relative;padding-bottom:14px;text-align:center;color:'.$colorA.';}';}
if ($class == 'partsH5-9' ){echo '.'.$class.' h4:after{content:"";position:absolute;bottom:0;display:inline-block;width:60px;height:4px;left:50%;transform:translateX(-50%);border-radius:2px;background-color:'.$colorB.';}';}
if ($class == 'partsH5-10'){echo '.'.$class.' h4{position:relative;padding-bottom:10px;text-align:center;border-bottom:1px solid '.$colorB.';color:'.$colorA.';}';}
if ($class == 'partsH5-10'){echo '.'.$class.' h4:before{content:"";position:absolute;top:100%;left:50%;transform:translateX(-50%);border:10px solid transparent;border-top:10px solid '.$colorB.';}';}
if ($class == 'partsH5-10'){echo '.'.$class.' h4:after{content:"";position:absolute;top:100%;left:50%;transform:translateX(-50%);border:10px solid transparent;border-top:10px solid #fff;	margin-top:-1px;}';}
if ($class == 'partsH5-11'){echo '.'.$class.' h4{padding:10px 0 10px 20px;border-left:solid 4px '.$colorB.';color:'.$colorA.';}';}
if ($class == 'partsH5-12'){echo '.'.$class.' h4{padding:10px 0 10px 20px;border-left:solid 4px '.$colorB.';border-bottom:solid 1px '.$colorC.';color:'.$colorA.';}';}
if ($class == 'partsH5-13'){echo '.'.$class.' h4{padding:10px 0 10px 20px;border-left:solid 4px '.$colorB.';border-bottom:dotted 1px '.$colorC.';color:'.$colorA.'; }';}
if ($class == 'partsH5-14'){echo '.'.$class.' h4{position:relative;padding:10px 0 10px 20px;border-left:solid 4px '.$colorB.';color:'.$colorA.';}';}
if ($class == 'partsH5-14'){echo '.'.$class.' h4:before{content:"";position:absolute;left:-4px;bottom:0;width:4px;height:50%;background-color:'.$colorC.';}';}
if ($class == 'partsH5-14'){echo '.'.$class.' h4:after{content:"";position:absolute;left:0;bottom:0;width:100%;height:0;border-bottom:1px solid '.$colorC.';}';}

if ($class == 'partsH5-21'){echo '.'.$class.' h4{padding:20px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH5-22'){echo '.'.$class.' h4{padding:20px;border-bottom:4px solid '.$colorC.';color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH5-23'){echo '.'.$class.' h4{padding:20px;border-left:4px solid '.$colorC.';color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH5-24'){echo '.'.$class.' h4{padding:20px;border-left:4px solid '.$colorC.';border-bottom:4px solid rgba(0,0,0,.10);color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH5-25'){echo '.'.$class.' h4{position:relative;padding:20px;border-radius:5px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH5-25'){echo '.'.$class.' h4:after{position:absolute;top:100%;left:30px;content:"";height:0;width:0;border:10px solid transparent;margin-top:-2px;border-top:15px solid '.$colorB.';}';}
if ($class == 'partsH5-26'){echo '.'.$class.' h4{position:relative;padding:20px;border:1px solid '.$colorC.';border-radius:5px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH5-26'){echo '.'.$class.' h4:before{position:absolute;top:100%;left:30px;content:"";height:0;width:0;border:10px solid transparent;border-top:15px solid '.$colorC.';}';}
if ($class == 'partsH5-26'){echo '.'.$class.' h4:after{position:absolute;top:100%;left:30px;content:"";height:0;width:0;border:10px solid transparent;margin-top:-2px;border-top:15px solid '.$colorB.';}';}
if ($class == 'partsH5-27'){echo '.'.$class.' h4{position:relative;padding:20px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH5-27'){echo '.'.$class.' h4:before{content:"";position:absolute;top:100%;right:0;height:0;width:0;border:5px solid transparent;border-top:5px solid '.$colorC.';border-left:5px solid '.$colorC.';}';}
if ($class == 'partsH5-27'){echo '.'.$class.' h4:after{content:"";position:absolute;top:100%;left:0;height:0;width:0;border:5px solid transparent;border-top:5px solid '.$colorC.';border-right:5px solid '.$colorC.';}';}
if ($class == 'partsH5-28'){echo '.'.$class.' h4{position:relative;padding:20px;color:'.$colorA.'; background-color:'.$colorB.'}';}
if ($class == 'partsH5-28'){echo '.'.$class.' h4:before{content:"";position:absolute;top:-20px;left:0;width:100%;height:0;border:solid 10px transparent;border-bottom-color:'.$colorC.';}';}
if ($class == 'partsH5-29'){echo '.'.$class.' h4{position:relative;padding:20px;border:dashed 1px '.$colorC.';color:'.$colorA.'; background-color:'.$colorB.'; box-shadow:0px 0px 0px 5px '.$colorB.';}';}
if ($class == 'partsH5-30'){echo '.'.$class.' h4{position:relative;padding:20px;color:'.$colorA.'; background:repeating-linear-gradient(-45deg, '.$colorB.', '.$colorB.' 3px, '.$colorC.' 3px, '.$colorC.' 7px);}';}
if ($class == 'partsH5-31'){echo '.'.$class.' h4{position:relative;padding:20px;text-align:center;border:solid 1px '.$colorC.';color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH5-32'){echo '.'.$class.' h4{position:relative;padding:20px;text-align:center;border:dashed 1px '.$colorC.';border-radius:5px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH5-33'){echo '.'.$class.' h4{position:relative;padding:20px;text-align:center;color:'.$colorA.';}';}
if ($class == 'partsH5-33'){echo '.'.$class.' h4:before{display:inline-block;content:"";position:absolute;top:0;left:0;width:20px;height:30px;border-left:solid 1px '.$colorB.';border-top:solid 1px '.$colorB.';}';}
if ($class == 'partsH5-33'){echo '.'.$class.' h4:after{display:inline-block;content:"";position:absolute;bottom:0;right:0;width:20px;height:30px;border-right:solid 1px '.$colorB.';border-bottom:solid 1px '.$colorB.';}';}
if ($class == 'partsH5-34'){echo '.'.$class.' h4{position:relative;padding:20px;text-align:center;border-top:solid 1px '.$colorB.';border-bottom:solid 1px '.$colorB.';color:'.$colorA.';}';}
if ($class == 'partsH5-34'){echo '.'.$class.' h4:before{content:"";position:absolute;top:-10px;left:10px;width:1px;height:calc(100% + 20px);background-color:'.$colorB.';}';}
if ($class == 'partsH5-34'){echo '.'.$class.' h4:after{content:"";position:absolute;top:-10px;right:10px;width:1px;height:calc(100% + 20px);background-color:'.$colorB.';}';}

if ($class == 'partsH5-41'){echo '.'.$class.' h4{position:relative;padding:20px;border:1px solid '.$colorC.';box-shadow:inset 1px 1px 0 rgba(255,255,255,.5);color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%);}';}
if ($class == 'partsH5-42'){echo '.'.$class.' h4{position:relative;padding:20px;border-radius:5px;border:1px solid '.$colorC.';box-shadow:inset 1px 1px 0 rgba(255,255,255,.5);color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%);}';}
if ($class == 'partsH5-43'){echo '.'.$class.' h4{position:relative;padding:20px;border-radius:100px;border:1px solid '.$colorC.';box-shadow:inset 1px 1px 0 rgba(255,255,255,.5);color:'.$colorA.'; background:linear-gradient('.$colorC.' 0%, '.$colorB.' 50%, '.$colorC.' 50%, '.$colorB.' 100%);}';}
if ($class == 'partsH5-44'){echo '.'.$class.' h4{position:relative;padding:20px;border:1px solid '.$colorC.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5);color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH5-45'){echo '.'.$class.' h4{position:relative;padding:20px;border-radius:5px;border:1px solid '.$colorC.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5);color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH5-46'){echo '.'.$class.' h4{position:relative;padding:20px;border-radius:50px;border:1px solid '.$colorC.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5);color:'.$colorA.'; background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH5-47'){echo '.'.$class.' h4{position:relative;padding:20px;border:1px solid '.$colorC.';border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5); background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH5-48'){echo '.'.$class.' h4{position:relative;padding:20px;border-radius:5px;border:1px solid '.$colorC.';border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5); background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH5-49'){echo '.'.$class.' h4{position:relative;padding:20px;border:1px solid '.$colorC.';color:#fff;border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5); background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH5-50'){echo '.'.$class.' h4{position:relative;padding:20px;border-radius:5px;border:1px solid '.$colorC.';color:#fff;border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5); background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}

if ($class == 'partsH5-61'){echo '.'.$class.' h4{position:relative;padding:10px 0 10px 30px;color:'.$colorA.';}';}
if ($class == 'partsH5-61'){echo '.'.$class.' h4:after{content:"";position:absolute;top:50%;left:0;width:20px;height:4px;transform:translateY(-50%);background-color:'.$colorB.';}';}
if ($class == 'partsH5-62'){echo '.'.$class.' h4{position:relative;padding:20px 0 20px 30px;border-radius:5px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH5-62'){echo '.'.$class.' h4:after{content:"";position:absolute;top:50%;left:0;width:20px;height:4px;transform:translateY(-50%);background-color:'.$colorA.';}';}
if ($class == 'partsH5-63'){echo '.'.$class.' h4{position:relative;padding:20px 0 20px 30px;border:1px solid '.$colorC.';border-radius:5px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH5-63'){echo '.'.$class.' h4:after{content:"";position:absolute;top:50%;left:0;width:20px;height:4px;transform:translateY(-50%);background-color:'.$colorA.';}';}
if ($class == 'partsH5-64'){echo '.'.$class.' h4{position:relative;padding:20px 0 20px 30px;border:1px solid '.$colorC.';border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5); background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH5-64'){echo '.'.$class.' h4:after{content:"";position:absolute;top:50%;left:0;width:20px;height:4px;transform:translateY(-50%);background-color:'.$colorA.';}';}
if ($class == 'partsH5-65'){echo '.'.$class.' h4{position:relative;padding:20px 0 20px 30px;border:1px solid '.$colorC.';color:#fff;border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5); background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH5-65'){echo '.'.$class.' h4:after{content:"";position:absolute;top:50%;left:0;width:20px;height:4px;transform:translateY(-50%);background-color:'.$colorA.';}';}

if ($class == 'partsH5-71'){echo '.'.$class.' h4{position:relative;padding:10px 0 10px 25px;color:'.$colorA.';}';}
if ($class == 'partsH5-71'){echo '.'.$class.' h4:after{content:"";position:absolute;top:50%;left:0;width:15px;height:15px;border:solid 4px '.$colorB.';border-radius:100%;transform:translateY(-50%);}';}
if ($class == 'partsH5-72'){echo '.'.$class.' h4{position:relative;padding:20px 0 20px 35px;color:'.$colorA.'; background-color:'.$colorB.';border-radius:5px;}';}
if ($class == 'partsH5-72'){echo '.'.$class.' h4:after{content:"";position:absolute;top:50%;left:10px;width:15px;height:15px;border:solid 4px '.$colorA.';border-radius:100%;transform:translateY(-50%);}';}
if ($class == 'partsH5-73'){echo '.'.$class.' h4{position:relative;padding:20px 0 20px 35px;border:1px solid '.$colorC.';border-radius:5px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsH5-73'){echo '.'.$class.' h4:after{content:"";position:absolute;top:50%;left:10px;width:15px;height:15px;border:solid 4px '.$colorA.';border-radius:100%;transform:translateY(-50%);}';}
if ($class == 'partsH5-74'){echo '.'.$class.' h4{position:relative;padding:20px 0 20px 35px;border:1px solid '.$colorC.';border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5);background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH5-74'){echo '.'.$class.' h4:after{content:"";position:absolute;top:50%;left:10px;width:15px;height:15px;border:solid 4px '.$colorA.';border-radius:100%;transform:translateY(-50%);}';}
if ($class == 'partsH5-75'){echo '.'.$class.' h4{position:relative;padding:20px 0 20px 35px;border:1px solid '.$colorC.';color:#fff;border-top:4px solid '.$colorA.';box-shadow:inset 1px -1px 0 rgba(255,255,255,.5);background:linear-gradient('.$colorB.' 0%, '.$colorC.' 100%);}';}
if ($class == 'partsH5-75'){echo '.'.$class.' h4:after{content:"";position:absolute;top:50%;left:10px;width:15px;height:15px;border:solid 4px '.$colorA.';border-radius:100%;transform:translateY(-50%);}';}

if ($class == 'partsH5-81'){echo '.'.$class.' h4{color:'.$colorA.';}';}
if ($class == 'partsH5-81'){echo '.'.$class.' h4:first-letter{font-size:2.4rem;color:'.$colorB.';}';}
if ($class == 'partsH5-82'){echo '.'.$class.' h4{color:'.$colorA.';}';}
if ($class == 'partsH5-82'){echo '.'.$class.' h4:first-letter{font-size:2.4em;padding-bottom:5px;	color:'.$colorA.';border-bottom:3px solid;color:'.$colorB.';}';}
if ($class == 'partsH5-83'){echo '.'.$class.' h4{padding:10px 0; border-bottom:dotted 1px '.$colorC.';color:'.$colorA.';}';}
if ($class == 'partsH5-83'){echo '.'.$class.' h4:first-letter{font-size:2.4rem;color:'.$colorB.';}';}
if ($class == 'partsH5-84'){echo '.'.$class.' h4{padding:20px;border:solid 1px '.$colorC.';border-radius:5px;color:'.$colorA.'; }';}
if ($class == 'partsH5-84'){echo '.'.$class.' h4:first-letter{font-size:2.4rem;color:'.$colorB.';}';}
?>




/*-----画像設定-----*/
.content .size-full,
.content .size-large,
.content .size-medium,
.content .size-thumbnail{max-width:100%; height:auto}

.content .alignleft {
  float:left;
  margin:0 1rem 1rem 0;
	text-align:left
}
.content .aligncenter {
  display:block;
  margin:0 auto 1rem auto;
	text-align:center
}
.content .alignright {
  float:right;
  margin:0 0 1rem 1rem;
	text-align:right
}
.content .wp-caption{margin-top:2rem}
.content .wp-caption a{display:block}
.content .wp-caption amp-img{vertical-align:bottom}
.content .wp-caption-text{
	margin-top:1rem;
	font-size:1.2rem
}


/*-----リスト基本設定-----*/
.content ul,
.content ol {
	margin-top:2rem;
	list-style-type:none
}
.content ul ul,
.content ul ol,
.content ol ol,
.content ol ul{
	padding:0;
	margin:0;
	background:0;
  box-shadow:none;
  border:0
}
.content ul ul:before,
.content ul ol:before,
.content ol ol:before,
.content ol ul:before,
.content ul ul:after,
.content ul ol:after,
.content ol ol:after,
.content ol ul:after{content:normal}

.content ul li,
.content ol li{
	position:relative;
	list-style:none;
	margin-top:1rem;
	padding-left:1.7rem;
	line-height:1.5
}
/*「*:first-child 0」を解除*/
.content ul li ul li:first-child,
.content ol li ol li:first-child,
.content ul li ol li:first-child,
.content ol li ul li:first-child{margin-top:1rem}


/*-----ULリスト設定-----*/
.content ul > li:before{
	font-family:icomoon;
  content:"\ea57";
	display:block;
	position:absolute;
	left:0;
	transform:scale(.6);
	color:<?php echo $Tcolor ?>
}


/*-----OLリスト設定-----*/
.content ol{counter-reset:a}
.content ol li{padding-left:2.7rem}

.content ol > li:before{
	display:block;
	position:absolute;
	left:0;
	counter-increment:a;
	content:counter(a);
	background:#fff;
	border:1px solid <?php echo $Tcolor ?>;
	color:<?php echo $Tcolor ?>;
	width:2.2rem;
	height:2.2rem;
	line-height:2rem;
	font-size:1rem;
	font-weight:700;
	text-align:center;
	border-radius:50%
}


<?php
//ULリスト
$colorA = '#a83f3f';
$colorB = '#191919';
$colorC = '#f2f2f2';
$class  = 'partsUl-'.get_option('fit_partsList_ul');
if(get_theme_mod( 'fit_partsList_ulColorA' )){
  $colorA = esc_attr( get_theme_mod( 'fit_partsList_ulColorA' ));
}if(get_theme_mod( 'fit_partsList_ulColorB' )){
  $colorB = esc_attr( get_theme_mod( 'fit_partsList_ulColorB' ));
}if(get_theme_mod( 'fit_partsList_ulColorC' )){
  $colorC = esc_attr( get_theme_mod( 'fit_partsList_ulColorC' ));
}

echo '.content ul > li:before{color:'.$colorA.';}';
if ($class == 'partsUl-' || $class == 'partsUl-off' ){echo '.content ul{color:'.$colorB.';}';}
if ($class == 'partsUl-1' ){echo '.'.$class.' ul{padding:20px;color:'.$colorB.'; background-color:'.$colorC.';}';}
if ($class == 'partsUl-2' ){echo '.'.$class.' ul{padding:20px;border:dashed 1px '.$colorB.'; background-color:'.$colorC.'; box-shadow:0px 0px 0px 5px '.$colorC.';}';}
if ($class == 'partsUl-3' ){echo '.'.$class.' ul{padding:20px;position:relative;color:'.$colorB.'; background-color:'.$colorC.';}';}
if ($class == 'partsUl-3' ){echo '.'.$class.' ul:after{content:"";position:absolute;bottom:0; right:0; border-color:rgba(0,0,0,.10) #fff #fff rgba(0,0,0,.10); border-style:solid; border-width:10px;}';}
if ($class == 'partsUl-4' ){echo '.'.$class.' ul{padding:20px; background-image:-webkit-linear-gradient( transparent 95%, rgba(0, 144, 255, .1) 50%, rgba(0, 144, 255, .1)),-webkit-linear-gradient( 0deg, transparent 95%, rgba(0, 144, 255, .1) 50%, rgba(0, 144, 255, .1));background-size:12px 12px;color:'.$colorB.'; background-color:'.$colorC.';}';}
if ($class == 'partsUl-5' ){echo '.'.$class.' ul{padding:20px;position:relative;border:solid 1px '.$colorB.';background-color:'.$colorC.';}';}
if ($class == 'partsUl-6' ){echo '.'.$class.' ul{padding:20px;position:relative;border:dashed 1px '.$colorB.';background-color:'.$colorC.';}';}
if ($class == 'partsUl-7' ){echo '.'.$class.' ul{padding:20px 30px;position:relative;border-top:solid 1px '.$colorC.';border-bottom:solid 1px '.$colorC.';color:'.$colorB.';}';}
if ($class == 'partsUl-7' ){echo '.'.$class.' ul:before{content:"";position:absolute;top:-10px;left:10px;width:1px;height:calc(100% + 20px);background-color:'.$colorC.';}';}
if ($class == 'partsUl-7' ){echo '.'.$class.' ul:after{content:"";position:absolute;top:-10px;right:10px;width:1px;height:calc(100% + 20px);background-color:'.$colorC.';}';}


//OLリスト
$colorA = '#a83f3f';
$colorB = '#191919';
$colorC = '#f2f2f2';
$class  = 'partsOl-'.get_option('fit_partsList_ol');
if(get_theme_mod( 'fit_partsList_olColorA' )){
  $colorA = esc_attr( get_theme_mod( 'fit_partsList_olColorA' ));
}if(get_theme_mod( 'fit_partsList_olColorB' )){
  $colorB = esc_attr( get_theme_mod( 'fit_partsList_olColorB' ));
}if(get_theme_mod( 'fit_partsList_olColorC' )){
  $colorC = esc_attr( get_theme_mod( 'fit_partsList_olColorC' ));
}

echo '.content ol > li:before{color:'.$colorA.'; border-color:'.$colorA.';}';
echo '.content ol > li > ol > li:before{color-color:'.$colorA.'; border-color:'.$colorA.';}';
echo '.content ol > li > ol > li > ol > li:before{color:'.$colorA.'; border-color:'.$colorA.';}';
if ($class == 'partsOl-' || $class == 'partsOl-off' ){echo '.content ul{color:'.$colorB.';}';}
if ($class == 'partsOl-1' ){echo '.'.$class.' ol{padding:20px;color:'.$colorB.'; background-color:'.$colorC.';}';}
if ($class == 'partsOl-2' ){echo '.'.$class.' ol{padding:20px;border:dashed 1px '.$colorB.'; background-color:'.$colorC.'; box-shadow:0px 0px 0px 5px '.$colorC.';}';}
if ($class == 'partsOl-3' ){echo '.'.$class.' ol{padding:20px;position:relative;color:'.$colorB.'; background-color:'.$colorC.';}';}
if ($class == 'partsOl-3' ){echo '.'.$class.' ol:after{content:"";position:absolute;bottom:0; right:0; border-color:rgba(0,0,0,.1) #fff #fff rgba(0,0,0,.1); border-style:solid; border-width:10px;}';}
if ($class == 'partsOl-4' ){echo '.'.$class.' ol{padding:20px; background-image:-webkit-linear-gradient( transparent 95%, rgba(0, 144, 255, .1) 50%, rgba(0, 144, 255, .1)),-webkit-linear-gradient( 0deg, transparent 95%, rgba(0, 144, 255, .1) 50%, rgba(0, 144, 255, .1));background-size:12px 12px;color:'.$colorB.'; background-color:'.$colorC.';}';}
if ($class == 'partsOl-5' ){echo '.'.$class.' ol{padding:20px;position:relative;border:solid 1px '.$colorB.';background-color:'.$colorC.';}';}
if ($class == 'partsOl-6' ){echo '.'.$class.' ol{padding:20px;position:relative;border:dashed 1px '.$colorB.';background-color:'.$colorC.';}';}
if ($class == 'partsOl-7' ){echo '.'.$class.' ol{padding:20px 30px;position:relative;border-top:solid 1px '.$colorC.';border-bottom:solid 1px '.$colorC.';color:'.$colorB.';}';}
if ($class == 'partsOl-7' ){echo '.'.$class.' ol:before{content:"";position:absolute;top:-10px;left:10px;width:1px;height:calc(100% + 20px);background-color:'.$colorC.';}';}
if ($class == 'partsOl-7' ){echo '.'.$class.' ol:after{content:"";position:absolute;top:-10px;right:10px;width:1px;height:calc(100% + 20px);background-color:'.$colorC.';}';}

?>





/*-----レビューボックス-----*/
.reviewBox{
  position:relative;
	background:#f2f2f2;
	padding:20px;
	border-radius:5px
}
.reviewBox:after {
  content:"";
  position:absolute;
  bottom:-1px;
  right:-1px;
  border-color:rgba(0,0,0,.1) #fff #fff rgba(0,0,0,.1);
  border-style:solid;
  border-width:10px
}
.reviewBox__title{
	font-weight:700;
	font-size:2rem;
	margin-bottom:20px;
	padding-bottom:10px;
  border-bottom:1px solid #e5e5e5;
	line-height:1.5
}
.reviewBox__contents{position:relative}
.reviewBox__imgBox{
	float:right;
	width:100px;
	height:auto;
	margin:0 0 20px 20px;

}
.reviewBox__img {
	width:100px;
	height:100px;
	border-radius:50%;
	border:1px solid #e5e5e5;
	overflow:hidden;
	background:url("<?php echo get_template_directory_uri();?>/img/img_mysteryman.gif");
	background-size:contain
}
.reviewBox__img amp-img{
	width:100px;
	height:100px;
	border-radius:50%;
	vertical-align:bottom
}
.reviewBox__name{
	display:inline-block;
	width:100%;
	text-align:center;
	margin-top:.5rem;
	font-size:1.2rem;
	color:rgba(0,0,0,.5)
}
.reviewBox__star{
	display:block;
	font-weight:700;
	margin-bottom:10px
}

/*-----会話風バルーン-----*/

.balloon {
	margin-top:2rem;
	position:relative
}
.balloon:before,
.balloon:after {
	clear:both;
	content:"";
	display:block
}



.balloon__img{
  <?php
  if(get_option( 'fit_partsList_balloonSize' ) == "big" ){
    echo 'width:90px;	height:90px; margin-bottom:20px';
  }else {
    echo 'width:60px;	height:60px; margin-bottom:20px';
  }
  ?>
}
.balloon__img-left {float:left;margin-right:15px}
.balloon__img-right{float:right;margin-left:15px}
.balloon__img-left div {
  border-radius:50%;
  <?php
  if(get_option( 'fit_partsList_balloonSize' ) == "big" ){
    echo 'width:90px;	height:90px;';
  }else {
    echo 'width:60px;	height:60px;';
  }
  ?>
  background:url("<?php echo get_template_directory_uri();?>/img/img_cat.gif");
  background-size:contain;
  margin-bottom:10px
}
.balloon__img-right div{
  border-radius:50%;
  <?php
  if(get_option( 'fit_partsList_balloonSize' ) == "big" ){
    echo 'width:90px;	height:90px;';
  }else {
    echo 'width:60px;	height:60px;';
  }
  ?>
  background:url("<?php echo get_template_directory_uri();?>/img/img_dog.gif");
  background-size:contain;
  margin-bottom:10px
}

.balloon__img amp-img {
	width:100%;
	height:100%;
	border-radius:50%;
	margin:0
}
.balloon__name {
	font-size:1rem;
	text-align:center;
	line-height:1
}
.balloon__text {
	position:relative;
	padding:1rem;
	margin:0;
	border-radius:5px;
  <?php
  if(get_option( 'fit_partsList_balloonSize' ) == "big" ){
    echo 'max-width:calc(100% - 105px);';
  }else {
    echo 'max-width:calc(100% - 75px);';
  }
  ?>
	display:inline-block;
	background-color:<?php echo $ballooncolorB; ?>;
  color:<?php echo $ballooncolorA; ?>
}
.balloon__text-left  {float:right}
.balloon__text-right {float:left}

.balloon__text:before{
	content:"";
	position:absolute;
	top:15px;
	border:10px solid transparent
}
.balloon__text-left:before {right:-20px;border-left:10px solid <?php echo $ballooncolorB; ?>}
.balloon__text-right:before{left:-20px;border-right:10px solid <?php echo $ballooncolorB; ?>}





/*-----整形済みテキスト-----*/
.content pre{
  font-family:Lato,游ゴシック体,Yu Gothic,YuGothic,ヒラギノ角ゴシック Pro,Hiragino Kaku Gothic Pro,メイリオ,Meiryo,ＭＳ Ｐゴシック,MS PGothic,"sans-serif";
	font-weight:400;
	margin-top:2rem;
	padding:20px;
	background-color:#F2F2F2;
	border-left:solid 5px #191919;
	color:#7F7F7F;
	overflow:auto
}


/*-----DLリスト-----*/
.content dl {margin-top:2rem}
.content dt {
  margin-top:2rem;
  padding:10px;
  background-color:rgba(0,0,0,.05)
}
.content dd {
	padding:10px;
	border:solid 1px rgba(0,0,0,.05)
}



/*-----テーブル-----*/
.content table {
  margin-top:2rem;
  width:100%;
	font-size:1.2rem;
	border-top:1px solid ;
	border-left:1px solid;
	border-right:0;
	border-bottom:0;
  color:<?php echo $tablecolorA; ?>;
  border-top-color:<?php echo $tablecolorB; ?>;
  border-left-color:<?php echo $tablecolorB; ?>
}

.content table th,
.content table td{
	padding:10px;
	border-right:1px solid <?php echo $tablecolorB; ?>;
	border-bottom:1px solid <?php echo $tablecolorB; ?>
}
.content table th{
  background:<?php echo $tablecolorC; ?>;
  color:<?php echo $tablecolorD; ?>
}
.content table td{background:<?php echo $tablecolorE; ?>}
.content table tr:nth-child(odd) td {background-color:<?php echo $tablecolorF; ?>}


/*テーブルスクロール*/
.tableScroll{overflow:auto}
.tableScroll table th,
.tableScroll table td{min-width:160px}


/*-----スコアテーブル設定-----*/
.content .scoreTable {border:1px solid #E5E5E5}
.content .scoreTable tr:nth-child(odd) td {background-color:#f2f2f2}
.content .scoreTable td{border:0}
.content .scoreTable td:first-child{font-weight:700}
.content .scoreTable td:last-child{width:140px}
.content .scoreTable tr:last-child td {background-color:#D8D8D8}



/*-----目次-----*/
.outline{
	border:1px dotted #D8D8D8;
	background:#FFF;
	padding:20px;
	display:inline-block
}


.outline__toggle{display:none}
.outline__switch:before{
	content:"開く";
	border:solid 1px #D8D8D8;
	padding:5px;
	font-size:1.2rem;
	margin-left:5px;
	border-radius:5px
}
.outline__toggle:checked+.outline__switch:before{content:"閉じる"}
.outline__switch+.outline__list{
	overflow:hidden;
	width:0;
	height:0;
	margin-top:0;
	margin-left:-20px
}
.content .outline__switch+.outline__list:before,
.content .outline__switch+.outline__list:after{content:normal}
.content .outline__toggle:checked+.outline__switch+.outline__list{
	width:auto;
	height:auto;
	margin-top:2rem
}
.content .outline__item {font-size:1.2rem}
.content .outline__item:before {content:normal}
.content .outline__link{
	display:inline-block;
	color:#191919
}
.outline__number{
	display:inline-block;
	color:#7F7F7F;
	background:#F2F2F2;
	padding:3px 6px;
	font-weight:400;
	margin-right:5px
}


/*-----引用-----*/
.content blockquote{
	position:relative;
	color:#3F3F3F;
	margin-top:2rem;
	padding:20px 20px 20px 70px;
	background-color:#F2F2F2
}
.content blockquote:before{
	position:absolute;
	top:5px;
	left:15px;
	font-family:icomoon;
	content:"\e9f8";
	font-size:3rem;
	color:#d8d8d8
}


<?php
//引用デザイン
$colorA = '#191919';
$colorB = '#f2f2f2';
$colorC = '#d8d8d8';
$colorD = '#ccc';
$class  = 'partsQuote-'.get_option('fit_partsList_quote');
if(get_theme_mod( 'fit_partsList_quoteColorA' )){
  $colorA = esc_attr( get_theme_mod( 'fit_partsList_quoteColorA' ));
}if(get_theme_mod( 'fit_partsList_quoteColorB' )){
  $colorB = esc_attr( get_theme_mod( 'fit_partsList_quoteColorB' ));
}if(get_theme_mod( 'fit_partsList_quoteColorC' )){
  $colorC = esc_attr( get_theme_mod( 'fit_partsList_quoteColorC' ));
}if(get_theme_mod( 'fit_partsList_quoteColorD' )){
  $colorD = esc_attr( get_theme_mod( 'fit_partsList_quoteColorD' ));
}

if ($class == 'partsQuote-' || $class == 'partsQuote-off'){echo '.content blockquote{color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsQuote-' || $class == 'partsQuote-off'){echo '.content blockquote:before{color:'.$colorC.';}';}

if ($class == 'partsQuote-1' ){echo '.content blockquote{border-left:solid 4px '.$colorD.';color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsQuote-1' ){echo '.content blockquote:before{color:'.$colorC.';}';}

if ($class == 'partsQuote-2' ){echo '.content blockquote{border:solid 1px '.$colorD.';color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsQuote-2' ){echo '.content blockquote:before{color:'.$colorC.';}';}

if ($class == 'partsQuote-3' ){echo '.content blockquote{padding:20px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsQuote-3' ){echo '.content blockquote:before{top:0;left:0;font-size:2rem;line-height:1;z-index:2;color:'.$colorC.';}';}
if ($class == 'partsQuote-3' ){echo '.content blockquote:after{position:absolute;content:"";left:0;top:0;border-radius:0 0 30px;width:30px;height:30px;background:#fff;}';}

if ($class == 'partsQuote-4' ){echo '.content blockquote{padding:20px;border:solid 4px '.$colorD.';color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsQuote-4' ){echo '.content blockquote:before{top:0;left:0;font-size:2rem;line-height:1;z-index:2;color:'.$colorC.';}';}
if ($class == 'partsQuote-4' ){echo '.content blockquote:after{position:absolute;content:"";left:0;top:0;border-radius:0 0 30px;width:30px;height:30px;background-color:'.$colorD.';}';}

if ($class == 'partsQuote-5' ){echo '.content blockquote{border:solid 3px '.$colorD.';border-left-width:50px;padding:20px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsQuote-5' ){echo '.content blockquote:before{top:50%;left:-35px;transform:translateY(-50%);vertical-align:middle;font-size:2rem;line-height:1;color:'.$colorC.';}';}

if ($class == 'partsQuote-6' ){echo '.content blockquote{padding:35px 20px 20px 20px;color:'.$colorA.'; background-color:'.$colorB.';}';}
if ($class == 'partsQuote-6' ){echo '.content blockquote:before{top:-10px;left:10px;width:40px;height:35px;line-height:35px;text-align:center;color:#FFF;font-size:2rem;background-color:'.$colorC.';}';}
if ($class == 'partsQuote-6' ){echo '.content blockquote:after{position:absolute;content:"";top:-10px;left:50px;border:none;border-bottom:solid 10px '.$colorD.'; border-right:solid 10px transparent;}';}
?>










/*-----スタイルフォーマット-----*/

/*区切り線*/
.content hr{
	clear:both;
	margin:20px 0;
  padding:0px;
	height:0;
	border:0;
	border-top:1px solid rgba(0,0,0,.1)
}


/*太マーカー*/
.marker-thickRed{background:linear-gradient(transparent 35%,#FFC6C6 35%)}
.marker-thickBlue{background:linear-gradient(transparent 35%,#cce5ff 35%)}
.marker-thickYellow{background:linear-gradient(transparent 60%,#ffffbc 35%)}
.marker-thickPink{background:linear-gradient(transparent 35%,#FFDFEF 35%)}
.marker-thickGreen{background:linear-gradient(transparent 35%,#D2FFD2 35%)}
.marker-thickGray{background:linear-gradient(transparent 35%,#d8d8d8 35%)}


/*中マーカー*/
.marker-halfRed{background:linear-gradient(transparent 60%,#FFC6C6 60%)}
.marker-halfBlue{background:linear-gradient(transparent 60%,#cce5ff 60%)}
.marker-halfYellow{background:linear-gradient(transparent 60%,#ffffbc 60%)}
.marker-halfPink{background:linear-gradient(transparent 60%,#FFDFEF 60%)}
.marker-halfGreen{background:linear-gradient(transparent 60%,#D2FFD2 60%)}
.marker-halfGray{background:linear-gradient(transparent 35%,#d8d8d8 35%)}


/*細マーカー*/
.marker-thinRed{background:linear-gradient(transparent 85%,#FFC6C6 85%)}
.marker-thinBlue{background:linear-gradient(transparent 85%,#cce5ff 85%)}
.marker-thinYellow{background:linear-gradient(transparent 85%,#ffffbc 85%)}
.marker-thinPink{background:linear-gradient(transparent 85%,#FFDFEF 85%)}
.marker-thinGreen{background:linear-gradient(transparent 85%,#D2FFD2 85%)}
.marker-thinGray{background:linear-gradient(transparent 35%,#d8d8d8 35%)}

/*ラベル*/
.ep-label{
	position:relative;
	display:inline-block;
	background-color:rgba(0,0,0,.05);
	padding:0 5px
}


/*ボタン*/
.ep-btn{
	position:relative;
	display:inline-block;
	line-height:1;
	background-color:rgba(0,0,0,.05);
	text-align:center;
	overflow:hidden;
	padding:10px 15px 10px 15px
}

/*ボックス*/
.ep-box,
.ep-inbox{
	position:relative;
	background-color:rgba(0,0,0,.05);
	padding:20px
}



/*-----指定スタイル-----*/


/*サイズ系*/
.es-size10        {width:10%}
.es-size25        {width:25%}
.es-size40        {width:40%}
.es-size50        {width:50%}
.es-size60        {width:60%}
.es-size75        {width:75%}
.es-size90        {width:90%}
.es-size100       {width:100%}

/*内側余白系*/
.es-padding0     {padding:0}
.es-TpaddingSS   {padding-top:1rem}
.es-TpaddingS    {padding-top:1.5rem}
.es-TpaddingM    {padding-top:3rem}
.es-TpaddingL    {padding-top:4.5rem}
.es-RpaddingSS   {padding-right:1rem}
.es-RpaddingS    {padding-right:1.5rem}
.es-RpaddingM    {padding-right:3rem}
.es-RpaddingL    {padding-right:4.5rem}
.es-BpaddingSS   {padding-bottom:1rem}
.es-BpaddingS    {padding-bottom:1.5rem}
.es-BpaddingM    {padding-bottom:3rem}
.es-BpaddingL    {padding-bottom:4.5rem}
.es-LpaddingSS   {padding-left:1rem}
.es-LpaddingS    {padding-left:1.5rem}
.es-LpaddingM    {padding-left:3rem}
.es-LpaddingL    {padding-left:4.5rem}

/*外側余白系*/
.es-margin0     {margin:0}
.es-TmarginSS   {margin-top:1rem}
.es-TmarginS    {margin-top:1.5rem}
.es-TmarginM    {margin-top:3rem}
.es-TmarginL    {margin-top:4.5rem}
.es-RmarginSS   {margin-right:1rem}
.es-RmarginS    {margin-right:1.5rem}
.es-RmarginM    {margin-right:3rem}
.es-RmarginL    {margin-right:4.5rem}
.es-BmarginSS   {margin-bottom:1rem}
.es-BmarginS    {margin-bottom:1.5rem}
.es-BmarginM    {margin-bottom:3rem}
.es-BmarginL    {margin-bottom:4.5rem}
.es-LmarginSS   {margin-left:1rem}
.es-LmarginS    {margin-left:1.5rem}
.es-LmarginM    {margin-left:3rem}
.es-LmarginL    {margin-left:4.5rem}

/*ボーダー系*/
.es-borderSolidS   {border:1px solid #191919}
.es-borderSolidM   {border:3px solid #191919}
.es-borderDashedS  {border:1px dashed #191919}
.es-borderDashedM  {border:3px dashed #191919}
.es-borderDottedS  {border:1px dotted #191919}
.es-borderDottedM  {border:3px dotted #191919}
.es-BborderSolidS  {border-bottom:1px solid #191919}
.es-BborderSolidM  {border-bottom:3px solid #191919}
.es-BborderDashedS {border-bottom:1px dashed #191919}
.es-BborderDashedM {border-bottom:3px dashed #191919}
.es-BborderDottedS {border-bottom:1px dotted #191919}
.es-BborderDottedM {border-bottom:3px dotted #191919}
.es-LborderSolidS  {border-left:1px solid #191919}
.es-LborderSolidM  {border-left:3px solid #191919}
.es-LborderDashedS {border-left:1px dashed #191919}
.es-LborderDashedM {border-left:3px dashed #191919}
.es-LborderDottedS {border-left:1px dotted #191919}
.es-LborderDottedM {border-left:3px dotted #191919}



/*文字系*/
.es-Fsmall{font-size:1.2rem}
.es-Fbig  {font-size:1.6rem}
.es-FbigL {font-size:2rem}
.es-bold  {font-weight:700}
.es-italic{font-style:italic}
.es-strike{text-decoration:line-through}
.es-under {text-decoration:underline}
.es-left  {text-align:left}
.es-center{text-align:center}
.es-right {text-align:right}


/*シャドウ系*/
.es-shadowL   {box-shadow:0px 1px 3px 0px rgba(0,0,0,.1)}
.es-shadow    {box-shadow:0px 1px 3px 0px rgba(0,0,0,.25)}
.es-shadowD   {box-shadow:0px 1px 3px 0px rgba(0,0,0,.5)}
.es-shadowInL {box-shadow:inset 0px 0px 15px 1px rgba(0,0,0,.1)}
.es-shadowIn  {box-shadow:inset 0px 0px 15px 1px rgba(0,0,0,.25)}
.es-shadowInD {box-shadow:inset 0px 0px 15px 1px rgba(0,0,0,.5)}
.es-TshadowL  {text-shadow:0px 1px 3px rgba(0,0,0,.1)}
.es-Tshadow   {text-shadow:0px 1px 3px rgba(0,0,0,.25)}
.es-TshadowD  {text-shadow:0px 1px 3px rgba(0,0,0,.5)}


/*角丸系*/
.es-radius  {border-radius:5px}
.es-radiusL {border-radius:10px}
.es-round   {border-radius:50px}


/*背景系*/
.es-grada1:after,
.es-grada2:after{
  position:absolute;
  top:0;
  left:0;
  right:0;
  bottom:0;
  content:""
}
.es-grada1:after{background:linear-gradient(0,hsla(0,0%,100%,0),hsla(0,0%,100%,0) 50%,hsla(0,0%,100%,.15) 50%,hsla(0,0%,100%,.05))}
.es-grada2:after{background:linear-gradient(0,hsla(0,0%,100%,0),hsla(0,0%,100%,.25))}
.es-grid {
  background-color:#fff;
  background-image:-webkit-linear-gradient(transparent 95%,rgba(0,144,255,.1) 50%,rgba(0,144,255,.1)),-webkit-linear-gradient(0,transparent 95%,rgba(0,144,255,.1) 50%,rgba(0,144,255,.1));
  background-size:12px 12px
}




/*-----ラベル系専用-----*/

/*コーナータイトル*/
.es-Lcorner{
  top:-20px;
  left:-20px
}

/*左ラウンド*/
.es-LroundL{border-radius:50px 0 0 50px}
/*右ラウンド*/
.es-LroundR{border-radius:0 50px 50px 0}

/*アイコン(余白)*/
.es-Licon:before{margin:0 5px}

/*アイコン(ボーダー)*/
.es-LiconBorder:before{
	margin:0 5px;
	padding-right:5px;
	border-right:1px solid rgba(255,255,255,.25);
	box-shadow:1px 0px 0px 0px rgba(0,0,0,.25)
}

/*アイコンボックス*/
/*アイコンサークル*/
.es-LiconBox,
.es-LiconCircle{
	height:28px;
	padding-left:35px
}
.es-LiconBox:before,
.es-LiconCircle:before{
  color:#fff;
  position:absolute;
  top:0;
  left:0;
  height:100%;
  width:28px;
  text-align:center
}
.es-LiconBox:before{
  <?php
  if(get_theme_mod( 'fit_partsEtc_icon' )){
    $color = esc_attr( get_theme_mod( 'fit_partsEtc_icon' ));
    echo 'background:'.$color.';';
  }else {
    echo 'background:#a83f3f;';
  }
  ?>
}
.es-LiconCircle:before{
	border-radius:50%;
  <?php
  if(get_theme_mod( 'fit_partsEtc_icon' )){
    $color = esc_attr( get_theme_mod( 'fit_partsEtc_icon' ));
    echo 'background:'.$color.';';
  }else {
    echo 'background:#a83f3f;';
  }
  ?>
}



/*-----ボタン系専用-----*/
/*3Dボタン*/
.es-BT3d            {border-bottom:solid 3px rgba(0,0,0,.25)}

/*影ボタン*/
.es-BTshadow  {
  border-left:1px solid rgba(0,0,0,.05);
	border-bottom:1px solid rgba(0,0,0,.05)
}

/*リッチボタン*/
.es-BTrich  {
	box-shadow:-1px 1px 0px 0px rgba(255,255,255,.25) inset;
  border:1px solid rgba(0,0,0,.05)
}

/*右矢印*/
.es-BTarrow:before{
    content:"";
    position:absolute;
    top:0;
    bottom:0;
    right:10px;
    width:5px;
    height:5px;
    margin:auto;
    border-top:1px solid;
    border-right:1px solid;
    transform:rotate(45deg)
}

/*アイコン(余白)*/
.es-BTicon:before{margin-right:5px}

/*アイコン(ボーダー)*/
.es-BTiconBorder:before{
	margin-right:10px;
	padding-right:10px;
	border-right:1px solid rgba(255,255,255,.25);
	box-shadow:1px 0px 0px 0px rgba(0,0,0,.25)
}
/*アイコンボックス*/
/*アイコンサークル*/
.es-BTiconBox{padding:0 15px 0 0}
.es-BTiconBox:before,
.es-BTiconCircle:before{
	display:inline-block;
  color:#fff;
  height:40px;
  width:40px;
	line-height:40px;
  text-align:center;
  margin-right:10px;
}
.es-BTiconBox:before{
  <?php
  if(get_theme_mod( 'fit_partsEtc_icon' )){
    $color = esc_attr( get_theme_mod( 'fit_partsEtc_icon' ));
    echo 'background:'.$color.';';
  }else {
    echo 'background:#a83f3f;';
  }
  ?>
}

.es-BTiconCircle:before{
  border-radius:50%;
  <?php
  if(get_theme_mod( 'fit_partsEtc_icon' )){
    $color = esc_attr( get_theme_mod( 'fit_partsEtc_icon' ));
    echo 'background:'.$color.';';
  }else {
    echo 'background:#a83f3f;';
  }
  ?>
}




/*-----ボックス系専用-----*/


/*全域タイトル*/
.es-Bwhole  {margin:-20px -20px 0 -20px}

/*括弧ボックス*/
.es-Bbrackets:before,
.es-Bbrackets:after {
  display:inline-block;
  position:absolute;
  width:30px;
  height:30px;
  content:""
}
.es-Bbrackets:before {
  top:0;
  left:0;
  border-top:solid 1px #191919;
  border-left:solid 1px #191919
}
.es-Bbrackets:after {
  right:0;
  bottom:0;
  border-right:solid 1px #191919;
  border-bottom:solid 1px #191919
}

/*ペーパーボックス[左]*/
/*ペーパーボックス[右]*/
.es-BpaperLeft:after,
.es-BpaperRight:after{
  content:"";
  position:absolute;
  bottom:0;
  border-style:solid;
  border-width:10px;
  border-style:solid;
  border-width:10px
}
.es-BpaperLeft:after{
  left:0;
  border-color:rgba(0,0,0,.1) rgba(0,0,0,.1) #fff #fff
}
.es-BpaperRight:after {
  right:0;
  border-color:rgba(0,0,0,.1) #fff #fff rgba(0,0,0,.1)
}

/*はてなボックス*/
/*ビックリボックス*/
.es-BmarkHatena,
.es-BmarkExcl{padding-left:70px}
.es-BmarkHatena:before,
.es-BmarkExcl:before{
	position:absolute;
	top:20px;
	left:20px;
	font-size:1.5rem;
	font-weight:700;
	color:#fff;
  text-align:center;
  vertical-align:middle;
  width:30px;
  height:30px;
	line-height:30px;
  border-radius:50%;
  <?php
  if(get_theme_mod( 'fit_partsEtc_hatena' )){
    $color = esc_attr( get_theme_mod( 'fit_partsEtc_hatena' ));
    echo 'background:'.$color.';';
  }else {
    echo 'background:#005293;';
  }
  ?>
}
.es-BmarkHatena:before{
	content:"?";
  <?php
  if(get_theme_mod( 'fit_partsEtc_hatena' )){
    $color = esc_attr( get_theme_mod( 'fit_partsEtc_hatena' ));
    echo 'background:'.$color.';';
  }else {
    echo 'background:#005293;';
  }
  ?>
}
.es-BmarkExcl:before{
	content:"!";
  <?php
  if(get_theme_mod( 'fit_partsEtc_excl' )){
    $color = esc_attr( get_theme_mod( 'fit_partsEtc_excl' ));
    echo 'background:'.$color.';';
  }else {
    echo 'background:#b60105;';
  }
  ?>
}





/*Qボックス*/
.es-BmarkQ{
	position:relative;
  padding:0 0 10px 40px;
  line-height:3rem;
  font-size:1.8rem;
	border-bottom:1px solid rgba(0,0,0,.1)
}
.es-BmarkQ:before{
	content:"Q";
	position:absolute;
	top:0;
	left:0;
	font-size:1.5rem;
	font-weight:700;
	color:#fff;
  text-align:center;
  vertical-align:middle;
  width:30px;
  height:30px;
	line-height:30px;
  border-radius:5px;
  <?php
  if(get_theme_mod( 'fit_partsEtc_q' )){
    $color = esc_attr( get_theme_mod( 'fit_partsEtc_q' ));
    echo 'background:'.$color.';';
  }else {
    echo 'background:#005293;';
  }
  ?>
}
.es-BmarkQ:after{
	content:"";
	position:absolute;
	top:30px;
	left:10px;
	border:5px solid transparent;
	border-top:5px solid #0081ba;
  <?php
  if(get_theme_mod( 'fit_partsEtc_q' )){
    $color = esc_attr( get_theme_mod( 'fit_partsEtc_q' ));
    echo 'border-top-color:'.$color.';';
  }else {
    echo 'border-top-color:#005293;';
  }
  ?>
}

/*Aボックス*/
.es-BmarkA{
	position:relative;
  padding:0 0 0 40px;
	margin-top:1rem
}
.es-BmarkA:before{
	content:"A";
	position:absolute;
	top:0;
	left:0;
	font-size:1.5rem;
	font-weight:700;
  text-align:center;
  vertical-align:middle;
  width:30px;
  height:30px;
	line-height:30px;
  border-radius:5px;
  <?php
  if(get_theme_mod( 'fit_partsEtc_a' )){
    $color = esc_attr( get_theme_mod( 'fit_partsEtc_a' ));
    echo 'color:'.$color.';';
  }else {
    echo 'color:#b60105;';
  }
  ?>

}

/*サブタイトルボックス(シンプル)*/
/*サブタイトルボックス(角丸)*/
/*サブタイトルボックス(ラウンド)*/
.es-BsubT,
.es-BsubTradi,
.es-BsubTround{
	margin-top:3.5rem;
	padding-top:3.5rem
}
.es-BsubT:before,
.es-BsubTradi:before,
.es-BsubTround:before{
	position:absolute;
	top:-15px;
	left:20px;
	height:30px;
	line-height:30px;
	padding:0 20px;
	content:attr(title);
	border:1px solid transparent;
	font-size:1.5rem;
	font-weight:700;
  text-align:center;
  vertical-align:middle;
  <?php
  $color_subtitleA = '#fff';
  $color_subtitleB = '#b60105';
  $color_subtitleC = '#b60105';
  if(get_theme_mod( 'fit_partsEtc_subtitleA' )){
    $color_subtitleA = esc_attr( get_theme_mod( 'fit_partsEtc_subtitleA' ));
  }if(get_theme_mod( 'fit_partsEtc_subtitleB' )){
    $color_subtitleB = esc_attr( get_theme_mod( 'fit_partsEtc_subtitleB' ));
  }if(get_theme_mod( 'fit_partsEtc_subtitleC' )){
    $color_subtitleC = esc_attr( get_theme_mod( 'fit_partsEtc_subtitleC' ));
  }
  echo 'color:'.$color_subtitleA.';background-color:'.$color_subtitleB.';border-color:'.$color_subtitleC.';';
  ?>
}
.es-BsubTradi:before{border-radius:5px}
.es-BsubTround:before{border-radius:30px}

/*アイコン(シンプル)*/
.es-Bicon{padding-left:70px}
.es-Bicon:before{
	position:absolute;
	top:20px;
	left:20px;
	font-size:3rem;
	line-height:3rem
}
/*アイコン(背景)*/
.es-BiconBg:before{
	position:absolute;
	top:20px;
	left:20px;
	font-size:5rem;
	line-height:5rem;
	color:rgba(0,0,0,.10)
}
/*アイコン(帯)*/
.es-BiconObi{
  border-left:solid 50px;
  <?php
  if(get_theme_mod( 'fit_partsEtc_icon' )){
    $color = esc_attr( get_theme_mod( 'fit_partsEtc_icon' ));
    echo 'border-color:'.$color.';';
  }else {
    echo 'border-color:#a83f3f;';
  }
  ?>
}
.es-BiconObi:before{
	position:absolute;
	top:50%;
  left:-35px;
  transform:translateY(-50%);
  vertical-align:middle;
	font-size:2rem;
	color:#fff;
	line-height:1
}
/*アイコン(コーナー)*/
.es-BiconCorner:before{
  position:absolute;
  top:-10px;
  left:-10px;
  width:30px;
  height:30px;
  line-height:30px;
  border-radius:50%;
  text-align:center;
  color:#fff;
  font-size:1.5rem;
  <?php
  if(get_theme_mod( 'fit_partsEtc_icon' )){
    $color = esc_attr( get_theme_mod( 'fit_partsEtc_icon' ));
    echo 'background:'.$color.';';
  }else {
    echo 'background:#a83f3f;';
  }
  ?>
}
/*アイコン(サークル)*/
.es-BiconCircle{padding-left:70px}
.es-BiconCircle:before{
	position:absolute;
	top:20px;
	left:20px;
	font-size:1.5rem;
	color:#fff;
  text-align:center;
  vertical-align:middle;
  width:30px;
  height:30px;
	line-height:30px;
  border-radius:50%;
  <?php
  if(get_theme_mod( 'fit_partsEtc_icon' )){
    $color = esc_attr( get_theme_mod( 'fit_partsEtc_icon' ));
    echo 'background:'.$color.';';
  }else {
    echo 'background:#a83f3f;';
  }
  ?>
}


/*文字色*/
.ftc-Vyellow   {color:#fff100}
.ftc-Vorange   {color:#f49801}
.ftc-Vred      {color:#e60112}
.ftc-Vmagenta  {color:#e5004f}
.ftc-Vpink     {color:#e4017f}
.ftc-Vpurple   {color:#920883}
.ftc-Vnavy     {color:#1c1e84}
.ftc-Vblue     {color:#0068b7}
.ftc-Vsky      {color:#00a0e9}
.ftc-Vturquoise{color:#009e96}
.ftc-Vgreen    {color:#094}
.ftc-Vlime     {color:#8ec31f}

.ftc-Byellow   {color:#fff338}
.ftc-Borange   {color:#f6ad3a}
.ftc-Bred      {color:#ea5532}
.ftc-Bmagenta  {color:#e9536b}
.ftc-Bpink     {color:#e95098}
.ftc-Bpurple   {color:#a54a98}
.ftc-Bnavy     {color:#4c4398}
.ftc-Bblue     {color:#2b71b8}
.ftc-Bsky      {color:#00b0ec}
.ftc-Bturquoise{color:#00ada9}
.ftc-Bgreen    {color:#0ba95f}
.ftc-Blime     {color:#a9cf52}

.ftc-DPyellow   {color:#cbbd00}
.ftc-DPorange   {color:#bf7601}
.ftc-DPred      {color:#b60105}
.ftc-DPmagenta  {color:#b5003c}
.ftc-DPpink     {color:#b50165}
.ftc-DPpurple   {color:#740169}
.ftc-DPnavy     {color:#14116e}
.ftc-DPblue     {color:#005293}
.ftc-DPsky      {color:#0081ba}
.ftc-DPturquoise{color:#007f78}
.ftc-DPgreen    {color:#007c36}
.ftc-DPlime     {color:#6f9b12}

.ftc-Lyellow   {color:#fff89a}
.ftc-Lorange   {color:#fbce8a}
.ftc-Lred      {color:#f39c76}
.ftc-Lmagenta  {color:#f29c9f}
.ftc-Lpink     {color:#f29fc3}
.ftc-Lpurple   {color:#c490bf}
.ftc-Lnavy     {color:#8f82bc}
.ftc-Lblue     {color:#87abda}
.ftc-Lsky      {color:#7ecff5}
.ftc-Lturquoise{color:#83ccc9}
.ftc-Lgreen    {color:#88c997}
.ftc-Llime     {color:#cce199}

.ftc-DLyellow   {color:#cac04e}
.ftc-DLorange   {color:#c39043}
.ftc-DLred      {color:#ba5536}
.ftc-DLmagenta  {color:#ba5460}
.ftc-DLpink     {color:#ba5584}
.ftc-DLpurple   {color:#8c4b82}
.ftc-DLnavy     {color:#4e4282}
.ftc-DLblue     {color:#3970a2}
.ftc-DLsky      {color:#1894be}
.ftc-DLturquoise{color:#1d928f}
.ftc-DLgreen    {color:#218f59}
.ftc-DLlime     {color:#8ea953}

.ftc-VPyellow   {color:#fffded}
.ftc-VPorange   {color:#fef5e8}
.ftc-VPred      {color:#feede3}
.ftc-VPmagenta  {color:#fdedec}
.ftc-VPpink     {color:#fdeff5}
.ftc-VPpurple   {color:#f3eaf4}
.ftc-VPnavy     {color:#e8e6f3}
.ftc-VPblue     {color:#e9eef9}
.ftc-VPsky      {color:#eaf6fe}
.ftc-VPturquoise{color:#eaf5f4}
.ftc-VPgreen    {color:#ebf5eb}
.ftc-VPlime     {color:#ebf5eb}

.ftc-DGyellow   {color:#675f00}
.ftc-DGorange   {color:#633c00}
.ftc-DGred      {color:#5f0100}
.ftc-DGmagenta  {color:#5f0017}
.ftc-DGpink     {color:#600033}
.ftc-DGpurple   {color:#3e0036}
.ftc-DGnavy     {color:#08003a}
.ftc-DGblue     {color:#00274f}
.ftc-DGsky      {color:#004462}
.ftc-DGturquoise{color:#004340}
.ftc-DGgreen    {color:#004215}
.ftc-DGlime     {color:#395104}

.ftc-white {color:#fff}
.ftc-VLgray{color:#d8d8d8}
.ftc-Lgray {color:#b2b2b2}
.ftc-gray  {color:#8c8c8c}
.ftc-Dgray {color:#656565}
.ftc-VDgray{color:#3f3f3f}
.ftc-black {color:#191919}


/*背景色*/
.bgc-Vyellow   {background-color:#fff100}
.bgc-Vorange   {background-color:#f49801}
.bgc-Vred      {background-color:#e60112}
.bgc-Vmagenta  {background-color:#e5004f}
.bgc-Vpink     {background-color:#e4017f}
.bgc-Vpurple   {background-color:#920883}
.bgc-Vnavy     {background-color:#1c1e84}
.bgc-Vblue     {background-color:#0068b7}
.bgc-Vsky      {background-color:#00a0e9}
.bgc-Vturquoise{background-color:#009e96}
.bgc-Vgreen    {background-color:#094}
.bgc-Vlime     {background-color:#8ec31f}

.bgc-Byellow   {background-color:#fff338}
.bgc-Borange   {background-color:#f6ad3a}
.bgc-Bred      {background-color:#ea5532}
.bgc-Bmagenta  {background-color:#e9536b}
.bgc-Bpink     {background-color:#e95098}
.bgc-Bpurple   {background-color:#a54a98}
.bgc-Bnavy     {background-color:#4c4398}
.bgc-Bblue     {background-color:#2b71b8}
.bgc-Bsky      {background-color:#00b0ec}
.bgc-Bturquoise{background-color:#00ada9}
.bgc-Bgreen    {background-color:#0ba95f}
.bgc-Blime     {background-color:#a9cf52}

.bgc-DPyellow   {background-color:#cbbd00}
.bgc-DPorange   {background-color:#bf7601}
.bgc-DPred      {background-color:#b60105}
.bgc-DPmagenta  {background-color:#b5003c}
.bgc-DPpink     {background-color:#b50165}
.bgc-DPpurple   {background-color:#740169}
.bgc-DPnavy     {background-color:#14116e}
.bgc-DPblue     {background-color:#005293}
.bgc-DPsky      {background-color:#0081ba}
.bgc-DPturquoise{background-color:#007f78}
.bgc-DPgreen    {background-color:#007c36}
.bgc-DPlime     {background-color:#6f9b12}

.bgc-Lyellow   {background-color:#fff89a}
.bgc-Lorange   {background-color:#fbce8a}
.bgc-Lred      {background-color:#f39c76}
.bgc-Lmagenta  {background-color:#f29c9f}
.bgc-Lpink     {background-color:#f29fc3}
.bgc-Lpurple   {background-color:#c490bf}
.bgc-Lnavy     {background-color:#8f82bc}
.bgc-Lblue     {background-color:#87abda}
.bgc-Lsky      {background-color:#7ecff5}
.bgc-Lturquoise{background-color:#83ccc9}
.bgc-Lgreen    {background-color:#88c997}
.bgc-Llime     {background-color:#cce199}

.bgc-DLyellow   {background-color:#cac04e}
.bgc-DLorange   {background-color:#c39043}
.bgc-DLred      {background-color:#ba5536}
.bgc-DLmagenta  {background-color:#ba5460}
.bgc-DLpink     {background-color:#ba5584}
.bgc-DLpurple   {background-color:#8c4b82}
.bgc-DLnavy     {background-color:#4e4282}
.bgc-DLblue     {background-color:#3970a2}
.bgc-DLsky      {background-color:#1894be}
.bgc-DLturquoise{background-color:#1d928f}
.bgc-DLgreen    {background-color:#218f59}
.bgc-DLlime     {background-color:#8ea953}

.bgc-VPyellow   {background-color:#fffded}
.bgc-VPorange   {background-color:#fef5e8}
.bgc-VPred      {background-color:#feede3}
.bgc-VPmagenta  {background-color:#fdedec}
.bgc-VPpink     {background-color:#fdeff5}
.bgc-VPpurple   {background-color:#f3eaf4}
.bgc-VPnavy     {background-color:#e8e6f3}
.bgc-VPblue     {background-color:#e9eef9}
.bgc-VPsky      {background-color:#eaf6fe}
.bgc-VPturquoise{background-color:#eaf5f4}
.bgc-VPgreen    {background-color:#ebf5eb}
.bgc-VPlime     {background-color:#ebf5eb}

.bgc-DGyellow   {background-color:#675f00}
.bgc-DGorange   {background-color:#633c00}
.bgc-DGred      {background-color:#5f0100}
.bgc-DGmagenta  {background-color:#5f0017}
.bgc-DGpink     {background-color:#600033}
.bgc-DGpurple   {background-color:#3e0036}
.bgc-DGnavy     {background-color:#08003a}
.bgc-DGblue     {background-color:#00274f}
.bgc-DGsky      {background-color:#004462}
.bgc-DGturquoise{background-color:#004340}
.bgc-DGgreen    {background-color:#004215}
.bgc-DGlime     {background-color:#395104}

.bgc-white {background-color:#fff}
.bgc-VLgray{background-color:#d8d8d8}
.bgc-Lgray {background-color:#b2b2b2}
.bgc-gray  {background-color:#8c8c8c}
.bgc-Dgray {background-color:#656565}
.bgc-VDgray{background-color:#3f3f3f}
.bgc-black {background-color:#191919}


/*ボーダー色*/
.brc-Vyellow   {border-color:#fff100}
.brc-Vorange   {border-color:#f49801}
.brc-Vred      {border-color:#e60112}
.brc-Vmagenta  {border-color:#e5004f}
.brc-Vpink     {border-color:#e4017f}
.brc-Vpurple   {border-color:#920883}
.brc-Vnavy     {border-color:#1c1e84}
.brc-Vblue     {border-color:#0068b7}
.brc-Vsky      {border-color:#00a0e9}
.brc-Vturquoise{border-color:#009e96}
.brc-Vgreen    {border-color:#094}
.brc-Vlime     {border-color:#8ec31f}

.brc-Byellow   {border-color:#fff338}
.brc-Borange   {border-color:#f6ad3a}
.brc-Bred      {border-color:#ea5532}
.brc-Bmagenta  {border-color:#e9536b}
.brc-Bpink     {border-color:#e95098}
.brc-Bpurple   {border-color:#a54a98}
.brc-Bnavy     {border-color:#4c4398}
.brc-Bblue     {border-color:#2b71b8}
.brc-Bsky      {border-color:#00b0ec}
.brc-Bturquoise{border-color:#00ada9}
.brc-Bgreen    {border-color:#0ba95f}
.brc-Blime     {border-color:#a9cf52}

.brc-DPyellow   {border-color:#cbbd00}
.brc-DPorange   {border-color:#bf7601}
.brc-DPred      {border-color:#b60105}
.brc-DPmagenta  {border-color:#b5003c}
.brc-DPpink     {border-color:#b50165}
.brc-DPpurple   {border-color:#740169}
.brc-DPnavy     {border-color:#14116e}
.brc-DPblue     {border-color:#005293}
.brc-DPsky      {border-color:#0081ba}
.brc-DPturquoise{border-color:#007f78}
.brc-DPgreen    {border-color:#007c36}
.brc-DPlime     {border-color:#6f9b12}

.brc-Lyellow   {border-color:#fff89a}
.brc-Lorange   {border-color:#fbce8a}
.brc-Lred      {border-color:#f39c76}
.brc-Lmagenta  {border-color:#f29c9f}
.brc-Lpink     {border-color:#f29fc3}
.brc-Lpurple   {border-color:#c490bf}
.brc-Lnavy     {border-color:#8f82bc}
.brc-Lblue     {border-color:#87abda}
.brc-Lsky      {border-color:#7ecff5}
.brc-Lturquoise{border-color:#83ccc9}
.brc-Lgreen    {border-color:#88c997}
.brc-Llime     {border-color:#cce199}

.brc-DLyellow   {border-color:#cac04e}
.brc-DLorange   {border-color:#c39043}
.brc-DLred      {border-color:#ba5536}
.brc-DLmagenta  {border-color:#ba5460}
.brc-DLpink     {border-color:#ba5584}
.brc-DLpurple   {border-color:#8c4b82}
.brc-DLnavy     {border-color:#4e4282}
.brc-DLblue     {border-color:#3970a2}
.brc-DLsky      {border-color:#1894be}
.brc-DLturquoise{border-color:#1d928f}
.brc-DLgreen    {border-color:#218f59}
.brc-DLlime     {border-color:#8ea953}

.brc-VPyellow   {border-color:#fffded}
.brc-VPorange   {border-color:#fef5e8}
.brc-VPred      {border-color:#feede3}
.brc-VPmagenta  {border-color:#fdedec}
.brc-VPpink     {border-color:#fdeff5}
.brc-VPpurple   {border-color:#f3eaf4}
.brc-VPnavy     {border-color:#e8e6f3}
.brc-VPblue     {border-color:#e9eef9}
.brc-VPsky      {border-color:#eaf6fe}
.brc-VPturquoise{border-color:#eaf5f4}
.brc-VPgreen    {border-color:#ebf5eb}
.brc-VPlime     {border-color:#ebf5eb}

.brc-DGyellow   {border-color:#675f00}
.brc-DGorange   {border-color:#633c00}
.brc-DGred      {border-color:#5f0100}
.brc-DGmagenta  {border-color:#5f0017}
.brc-DGpink     {border-color:#600033}
.brc-DGpurple   {border-color:#3e0036}
.brc-DGnavy     {border-color:#08003a}
.brc-DGblue     {border-color:#00274f}
.brc-DGsky      {border-color:#004462}
.brc-DGturquoise{border-color:#004340}
.brc-DGgreen    {border-color:#004215}
.brc-DGlime     {border-color:#395104}

.brc-white {border-color:#fff}
.brc-VLgray{border-color:#d8d8d8}
.brc-Lgray {border-color:#b2b2b2}
.brc-gray  {border-color:#8c8c8c}
.brc-Dgray {border-color:#656565}
.brc-VDgray{border-color:#3f3f3f}
.brc-black {border-color:#191919}



/*-----記事内広告-----*/
.adPost {
	overflow:hidden;
	padding:0 10px;
	background-color:#F2F2F2;
  background-image:linear-gradient(to top right,#fff 0,#fff 25%,transparent 25%,transparent 50%,#fff 50%,#fff 75%,transparent 75%,transparent 100%);
  background-size:6px 6px
}
.adPost__title{
	font-size:1.2rem;
	padding:10px 0;
	display:block;
	font-weight:400;
	text-align:center
}


/*-----YouTube-----*/
.youtube {
	position:relative;
	padding-bottom:56.25%;
	height:0;
	overflow:hidden;
	max-width:100%;
	margin:2rem auto 0 auto
}
.youtube iframe {
	position:absolute;
	top:0;
	left:0;
	width:100%;
	height:100%
}


/*-----twitter & instagram-----*/
.twitter-tweet,
.instagram-media {
	width:500px;
  max-width:100%;
  margin:2rem auto 0 auto
}

.twitter-follow-button {
  width: 119px;
  height: 28px;
  margin: 0 auto;
  border-radius: 4px;
  padding: 1px 10px 1px 9px;
  background-color: rgb(27,149,224);
  color: #fff;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 13px;
}
.twitter-follow-button .label {
  padding-left: 4px;
  line-height: 1.3;
  font-weight: 600;
}
.twitter-follow-button:active,
.twitter-follow-button:hover {
  background-color: rgba(27,149,224,0.8);
}
.icon-twitter{
  font-size: 16px;
}
.snsFollow__item {
  display: inline-block;
}

/*-----メディアファイル-----*/
.mejs-controls div{margin: 0;}
.mejs-controls .mejs-button>button{margin:10px 6px;}
.mejs-controls .mejs-time-rail{margin:0 10px;}
.mejs-controls .mejs-time-total{margin:5px 0 0;}


/*-----すべての最初の要素のmargin-top:0-----*/
.content *:first-child{margin-top:0}

/*-----すべての最初の要素のmargin-top:0の除外要素-----*/
.content .es-Bwhole {margin-top:-20px}


/*-----パスワード保護-----*/
.passForm {display:flex}
.passForm__input{
	border:2px solid #d8d8d8;
  width:calc(100% - 8rem);
  padding:10px;
  -webkit-appearance:none;
  border-radius:0
}
.passForm__btn{
	width:8rem;
  text-align:center;
  background:#f2f2f2;
  border-left:0;
  border-right:2px solid #d8d8d8;
  border-top:2px solid #d8d8d8;
  border-bottom:2px solid #d8d8d8;
  padding:10px
}

/*-----[ショートコード]スターリスト-----*/
.starList{
	color:#fc3;
	display:inline-block
}

/*-----[ショートコード]新着記事リスト-----*/
.archiveScode{border-top:1px dotted rgba(0,0,0,.1)}
.archiveScode-rank{counter-reset:number}

.content .archiveScode__item{
	border-bottom:1px dotted rgba(0,0,0,.1);
	padding:20px 0 ;
	margin:0
}
.content .archiveScode-rank .archiveScode__item:before {
  position:absolute;
  counter-increment:number;
  content:counter(number);
  display:block;
  width:3rem;
  height:3rem;
  line-height:3rem;
  text-align:center;
  background:#bfbfbf;
  color:#FFF;
	font-size:1.2rem;
  z-index:5
}
.content .archiveScode-rank .archiveScode__item:nth-child(1):before{background:#ecd357}
.content .archiveScode-rank .archiveScode__item:nth-child(2):before{background:#a9c6d5}
.content .archiveScode-rank .archiveScode__item:nth-child(3):before{background:#c58459}

.content .archiveScode__item .eyecatch{
	width:100px;
	float:left;
	margin:0
}
.content .archiveScode__contents{
	width:calc(100% - 120px);
	float:right;
	margin:0
}
.archiveScode__contents .heading{margin-top:0; margin-bottom:5px}

/*-----[ショートコード]embedブログカード-----*/
.wp-embedded-content {width:100%}

/*-----[ショートコード]OGPブログカード-----*/
/*-----[ショートコード]サイトカード-----*/
.blogcard,
.sitecard {
	position:relative;
	border:1px solid rgba(0,0,0,.1);
	padding:20px;
	overflow:hidden;
	border-radius:5px
}
.blogcard__subtitle,
.sitecard__subtitle{
	position:absolute;
	top:0;
	left:0;
	background:rgba(0,0,0,.05);
	padding:5px 10px;
	font-size:1.2rem;
	border-radius:0 0 5px 0
}
.blogcard__subtitle{
	max-width:95%;
	white-space:nowrap;
	overflow:hidden;
	text-overflow:ellipsis
}
.blogcard__subtitle:before{margin-right:5px}

.blogcard__contents,
.sitecard__contents {
	float:left;
	width:70%;
	max-width:calc(100% - 115px);
	margin-top:2.5rem
}
.blogcard__contents .heading,
.sitecard__contents .heading{margin-bottom:0}
.blogcard__contents .phrase,
.sitecard__contents .phrase{display:none}

.blogcard .eyecatch,
.sitecard .eyecatch {
	float:right;
	width:calc(30% - 15px);
	min-width:100px;
	margin-left:15px;
	margin-top:2.5rem;
	margin-bottom:0
}
.blogcard .eyecatch amp-img,
.sitecard .eyecatch amp-img {max-width:100%}


/*-----[ショートコード]AF管理タグ-----*/
.afTagBox{
	position:relative;
	border:5px solid rgba(0,0,0,.05);
	background:#fff;
	padding:20px;
	overflow:hidden
}
.afTagBox-noFormat{padding-top:65px}
.afTagBox__header{
	border-bottom:1px solid rgba(0,0,0,.1);
	padding-bottom:10px
}
.afTagBox__title{
	font-size:1.6rem;
	font-weight:700
}
.content .afTagBox__star{
	margin-top:0;
	font-size:1.4rem;
	color:#FC0;
  font-family:icomoon
}
.afTagBox__star-number__1:before{content:"\e9da \e9d8 \e9d8 \e9d8 \e9d8"}
.afTagBox__star-number__2:before{content:"\e9da \e9da \e9d8 \e9d8 \e9d8"}
.afTagBox__star-number__3:before{content:"\e9da \e9da \e9da \e9d8 \e9d8"}
.afTagBox__star-number__4:before{content:"\e9da \e9da \e9da \e9da \e9d8"}
.afTagBox__star-number__5:before{content:"\e9da \e9da \e9da \e9da \e9da"}

.afTagBox__number{
	color:#7F7F7F;
	font-size:1.2rem
}

.afTagBox__contentBox{text-align:center}
.afTagBox__banner{margin:auto}
.afTagBox__banner amp-img{max-width:100%; height:auto;vertical-align:bottom}
.afTagBox__text{text-align:left; margin-top:10px}
.afTagBox__btnList a:nth-child(2){margin-top:10px}

.afTagBox__btnDetail{
  <?php
  if ( get_theme_mod('fit_bsAfTag_colorIn')) {
    $color  = esc_attr( get_theme_mod( 'fit_bsAfTag_colorIn' ));
    echo 'background:'.$color.';';
  }elseif ( get_theme_mod('fit_bsStyle_themeColor')) {
    $color  = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
    echo 'background:'.$color.';';
  }else{
    echo 'background:#076DA5;';
  }
  ?>
}
.afTagBox__btnAf{
  <?php
  if ( get_theme_mod('fit_bsAfTag_colorOut')) {
    $color  = esc_attr( get_theme_mod( 'fit_bsAfTag_colorOut' ));
    echo 'background:'.$color.';';
  }elseif ( get_theme_mod('fit_bsStyle_themeColor')) {
    $color  = esc_attr( get_theme_mod( 'fit_bsStyle_themeColor' ));
    echo 'background:'.$color.';';
  }else{
    echo 'background:#a83f3f;';
  }
  ?>
}
.afTagBox__btnDetail,
.afTagBox__btnAf{
	display:block;
	position:relative;
	padding:15px 40px;
	text-align:center;
  border-radius:5px;
  border:0;
  border-bottom:solid 3px rgba(0,0,0,.25);
  font-size:1.4rem;
  font-weight:700;
  overflow:hidden;
  color:#fff;
  line-height:normal
}
.afTagBox__btnDetail:before,
.afTagBox__btnAf:before {
  content:"";
  position:absolute;
  top:0;
  bottom:0;
  right:10px;
  width:5px;
  height:5px;
  margin:auto;
  border-top:2px solid;
  border-right:2px solid;
  transform:rotate(45deg)
}

/*-----[ショートコード]AF管理ランキング-----*/
.afRank{
	background:0;
	border:0;
	padding:0;
	box-shadow:none;
	counter-reset:number
}
.afRank:before,
.afRank:after{content:normal}


.content .afRank > li{
	background:none;
	border:none;
	padding:0;
	margin-top:2rem
}
.content .afRank > li:before{
  font-family:Lato,游ゴシック体,Yu Gothic,YuGothic,ヒラギノ角ゴシック Pro,Hiragino Kaku Gothic Pro,メイリオ,Meiryo,ＭＳ Ｐゴシック,MS PGothic,"sans-serif";
  counter-increment:number;
  content:counter(number);
  display:block;
  width:4.5rem;
  height:4.5rem;
  line-height:4.5rem;
  text-align:center;
  background-color:#bfbfbf;
	background-size:contain;
	background-repeat:no-repeat;
	background-position:center center;
	border-radius:2.25rem;
  color:#FFF;
	font-weight:700;
  z-index:5;
  transform:scale(1);
  top:20px;
  font-size:2rem;
  left:20px
}
.content .afRank > li::after{content: normal}
.content .afRank > li:first-child{ margin-top:0}

.content .afRank > li:nth-child(1)::before {border-radius:0; background-color: transparent;}
.content .afRank > li:nth-child(2)::before {border-radius:0; background-color: transparent;}
.content .afRank > li:nth-child(3)::before {border-radius:0; background-color: transparent;}
.content .afRank__crown_1 > li:nth-child(1)::before {background-image: url(<?php echo get_template_directory_uri() ?>/img/rank1-01.png);line-height: 5.5rem;}
.content .afRank__crown_1 > li:nth-child(2)::before {background-image: url(<?php echo get_template_directory_uri() ?>/img/rank1-02.png);line-height: 5.5rem;}
.content .afRank__crown_1 > li:nth-child(3)::before {background-image: url(<?php echo get_template_directory_uri() ?>/img/rank1-03.png);line-height: 5.5rem;}

.content .afRank__crown_2 > li:nth-child(1)::before {background-image: url(<?php echo get_template_directory_uri() ?>/img/rank2-01.png);}
.content .afRank__crown_2 > li:nth-child(2)::before {background-image: url(<?php echo get_template_directory_uri() ?>/img/rank2-02.png);}
.content .afRank__crown_2 > li:nth-child(3)::before {background-image: url(<?php echo get_template_directory_uri() ?>/img/rank2-03.png);}

.content .afRank__crown_3 > li:nth-child(1)::before {background-image: url(<?php echo get_template_directory_uri() ?>/img/rank3-01.png);line-height: 3.7rem;}
.content .afRank__crown_3 > li:nth-child(2)::before {background-image: url(<?php echo get_template_directory_uri() ?>/img/rank3-02.png);line-height: 3.7rem;}
.content .afRank__crown_3 > li:nth-child(3)::before {background-image: url(<?php echo get_template_directory_uri() ?>/img/rank3-03.png);line-height: 3.7rem;}

.content .afRank__crown_4 > li:nth-child(1)::before {background-image: url(<?php echo get_template_directory_uri() ?>/img/rank4-01.png);color: #edc729;}
.content .afRank__crown_4 > li:nth-child(2)::before {background-image: url(<?php echo get_template_directory_uri() ?>/img/rank4-02.png);color: #a6c2d0;}
.content .afRank__crown_4 > li:nth-child(3)::before {background-image: url(<?php echo get_template_directory_uri() ?>/img/rank4-03.png);color: #be8057;}

.content .afRank__crown_5 > li:nth-child(1)::before {background-image: url(<?php echo get_template_directory_uri() ?>/img/rank5-01.png);line-height: 4.8rem;}
.content .afRank__crown_5 > li:nth-child(2)::before {background-image: url(<?php echo get_template_directory_uri() ?>/img/rank5-02.png);line-height: 4.8rem;}
.content .afRank__crown_5 > li:nth-child(3)::before {background-image: url(<?php echo get_template_directory_uri() ?>/img/rank5-03.png);line-height: 4.8rem;}

.afRank .afTagBox__header{padding-left:55px}






/*フッターエリア用パーツ（共通）
------------------------------------------------------------*/

/*フッターボトム*/
.bottomFooter{
	position:relative;
	background:#191919;
	padding:40px 0
}

.bottomFooter__navi {margin-bottom:20px}
.bottomFooter__list {
	list-style:none;
	text-align:center
}
.bottomFooter__list li {
  display:inline-block;
  color:#fff;
  font-size:1.4rem;
  font-weight:700
}
.bottomFooter__list li a {
  display:block;
  margin:0 10px;
  line-height:1.5;
	border-bottom:2px solid transparent ;
	transition:.15s
}

.bottomFooter__copyright,
.bottomFooter__producer{
	text-align:center;
	color:#BFBFBF;
	letter-spacing:.5px;
	line-height:1.75
}

.bottomFooter__link{
	font-weight:700;
	color:#fff
}



/************************************************************/
/************************************************************/
/*ウィジェットモジュール(※主にWPの標準マークアップに従う)
/************************************************************/
/************************************************************/

/*ウィジェットボックス*/
.widget{margin:0 auto}
.widget .menu{list-style:none;border-top:1px solid rgba(0,0,0,.1)}
.widget .menu ul{list-style:none}
.widget .menu li a{display:block; padding:15px 10px ; border:1px solid rgba(0,0,0,.1);border-top:0}


/************************************************************/
/************************************************************/
/*テーマ
/************************************************************/
/************************************************************/

/*背景色ありバージョン*/
.t-headerColor .siteTitle{ color:#ffffff}
.t-headerColor .menuBtn__link{color:#ffffff;}

/*ロゴ高さバージョン
------------------------------------------------------------*/
<?php if (get_option('fit_bsLogo_heightSp') == '25' ) :?>
.t-logoSp25 .siteTitle__logo{height:25px}
<?php endif; ?>
<?php if (get_option('fit_bsLogo_heightSp') == '30' ) :?>
.t-logoSp30 .siteTitle__logo{height:30px}
<?php endif; ?>








/************************************************************/
/************************************************************/
/*ユーティリティ
/************************************************************/
/************************************************************/
.u-shadow   {background:#fff;padding:15px;border-bottom:none;box-shadow:0px 1px 3px 0px rgba(0,0,0,.15)}
.u-border   {background:#fff;padding:15px;border:1px solid rgba(0,0,0,.10)}


/************************************************************/
/************************************************************/
/*keyframes設定
/************************************************************/
/************************************************************/

/*マーキー効果*/
@keyframes marquee {
	from{transform:translate(0%)}
	to  {transform:translate(-100%)}
}
<?php
    $compress = ob_get_clean();
    $compress = str_replace("\t", '', $compress);
    $compress = str_replace("\r", '', $compress);
    $compress = str_replace("\n", '', $compress);
    $compress = str_replace(array('  ', '　'), '', $compress);
    $compress = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $compress );
    $compress = preg_replace('/<!--[\s\S]*?-->/', '', $compress);
    echo $compress;
?>
</style>

<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style>
<noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
<script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>
<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
<script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
<script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
<script async custom-element="amp-twitter" src="https://cdn.ampproject.org/v0/amp-twitter-0.1.js"></script>
<script async custom-element="amp-instagram" src="https://cdn.ampproject.org/v0/amp-instagram-0.1.js"></script>
<script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
<?php $opt = get_option('fit_snsFollow'); if(get_option('fit_snsOgp_FBAppId') && $opt['FBPage']): ?>
  <script async custom-element="amp-facebook-like" src="https://cdn.ampproject.org/v0/amp-facebook-like-0.1.js"></script>
<?php endif; ?>

<script async src="https://cdn.ampproject.org/v0.js"></script>
</head>
<body <?php body_class(); ?>>

  <?php if(get_option('fit_bsAccess_gaid')): // AMPページanalytics ?>
  <amp-analytics type="googleanalytics" id="amp-analytics">
  <script type="application/json">
  {
    "vars": {
      "account": "<?php echo get_option('fit_bsAccess_gaid');	?>"
    },
    "triggers": {
      "trackPageview": {
        "on": "visible",
        "request": "pageview"
      }
    }
  }
  </script>
  </amp-analytics>
  <?php endif; ?>

  <!--l-header-->
  <header class="l-header">
    <div class="container">

      <!--logo-->
      <p class="siteTitle">
        <a class="siteTitle__link" href="<?php echo home_url() ?>">
        <?php
        if (get_fit_logo()):
            $logo_date = get_fit_logo();
            $logo_id = attachment_url_to_postid($logo_date);
            $logo = wp_get_attachment_image_src( $logo_id, 'full' );
            $src = $logo[0]; //url
            $width = $logo[1]; //横幅
            $height = $logo[2]; //高さ
        ?>
          <amp-img layout="responsive" class="siteTitle__logo" src="<?php echo $src;?>" alt="<?php bloginfo('name') ?>" width="<?php echo $width;?>" height="<?php echo $height;?>" ></amp-img>
        <?php else : ?>
          <?php bloginfo('name') ?>
        <?php endif; ?>
        </a>
      </p>
      <!--/logo-->

      <!--menuBtn-->
      <div class="menuBtn">
        <input class="menuBtn__checkbox" id="menuBtn-checkbox" type="checkbox">
        <label class="menuBtn__link menuBtn__link-text icon-menu" for="menuBtn-checkbox"></label>
        <label class="menuBtn__unshown" for="menuBtn-checkbox"></label>
        <div class="menuBtn__content">

          <div class="menuBtn__scroll">
            <label class="menuBtn__close" for="menuBtn-checkbox"><i class="icon-close"></i>CLOSE</label>
            <div class="menuBtn__contentInner">
              <?php $opt = get_option('fit_snsFollow');
              if (
                !empty(get_option('fit_conHeader_btnText')) && !empty(get_option('fit_conHeader_btnUrl')) ||
                !empty($opt['FBFollowH']) && !empty($opt['FBPage']) ||
                !empty($opt['twitterFollowH']) && !empty($opt['twitterId']) ||
                !empty($opt['instaFollowH']) && !empty($opt['insta']) ||
                !empty($opt['googleFollowH']) && !empty($opt['googleUrl']) ||
                !empty($opt['youtubeFollowH']) && !empty($opt['youtubeUrl']) ||
                !empty($opt['linkedinFollowH']) && !empty($opt['linkedinUrl']) ||
                !empty($opt['pinterestFollowH']) && !empty($opt['pinterestUrl']) ||
                !empty($opt['rssFollowH'])
              ):?>
                <nav class="menuBtn__navi">
                  <?php if (!empty(get_option('fit_conHeader_btnText')) && !empty(get_option('fit_conHeader_btnUrl'))):?>
                    <div class="btn btn-center"><a class="btn__link btn__link-normal" href="<?php echo get_option('fit_conHeader_btnUrl'); ?>"><?php echo get_option('fit_conHeader_btnText'); ?></a></div>
                  <?php endif; ?>

                  <ul class="menuBtn__naviList">
                    <?php if (!empty($opt['FBFollowH']) && !empty($opt['FBPage']) ):?>
                      <li class="menuBtn__naviItem"><a class="menuBtn__naviLink icon-facebook" href="https://www.facebook.com/<?php echo $opt['FBPage']; ?>"></a></li>
                    <?php endif; if (!empty($opt['twitterFollowH']) && !empty($opt['twitterId']) ) :?>
                      <li class="menuBtn__naviItem"><a class="menuBtn__naviLink icon-twitter" href="https://twitter.com/<?php echo $opt['twitterId']; ?>"></a></li>
                    <?php endif; if (!empty($opt['instaFollowH']) && !empty($opt['insta']) ) :?>
                      <li class="menuBtn__naviItem"><a class="menuBtn__naviLink icon-instagram" href="http://instagram.com/<?php echo $opt['insta']; ?>"></a></li>
                    <?php endif; if (!empty($opt['googleFollowH']) && !empty($opt['googleUrl']) ) :?>
                      <li class="menuBtn__naviItem"><a class="menuBtn__naviLink icon-google-plus" href="https://plus.google.com/<?php echo $opt['googleUrl']; ?>"></a></li>
                    <?php endif; if (!empty($opt['youtubeFollowH']) && !empty($opt['youtubeUrl']) ) :?>
                      <li class="menuBtn__naviItem"><a class="menuBtn__naviLink icon-youtube" href="https://www.youtube.com/channel/<?php echo $opt['youtubeUrl']; ?>"></a></li>
                    <?php endif; if (!empty($opt['linkedinFollowH']) && !empty($opt['linkedinUrl']) ) :?>
                      <li class="menuBtn__naviItem"><a class="menuBtn__naviLink icon-linkedin" href="http://ca.linkedin.com/in/<?php echo $opt['linkedinUrl']; ?>"></a></li>
                    <?php endif; if (!empty($opt['pinterestFollowH']) && !empty($opt['pinterestUrl']) ) :?>
                      <li class="menuBtn__naviItem"><a class="menuBtn__naviLink icon-pinterest" href="https://www.pinterest.jp/<?php echo $opt['pinterestUrl']; ?>"></a></li>
                    <?php endif; if (!empty($opt['rssFollowH'])):?>
                      <?php if (!empty($opt['rssUrl'])): ?>
                        <li class="menuBtn__naviItem"><a class="menuBtn__naviLink icon-rss" href="<?php echo $opt['rssUrl']; ?>"></a></li>
                      <?php else : ?>
                        <li class="menuBtn__naviItem"><a class="menuBtn__naviLink icon-rss" href="<?php bloginfo('rss2_url'); ?>"></a></li>
                      <?php endif; ?>
                    <?php endif; ?>
                  </ul>
                </nav>
              <?php endif; ?>


              <?php if ( has_nav_menu( 'header_menu' ) ) ://メニューセット有
                wp_nav_menu(array(
                  'theme_location' => 'header_menu',
                  'items_wrap' => '<aside class="widget widget_nav_menu"><ul class="menu">%3$s</ul></aside>',
                  'container' => false,
                  'depth' => 2,
                ));
              ?>
              <?php else : //メニューセット無 ?>
                <aside class="widget widget_nav_menu">
                  <ul class="menu">
                    <?php
                    wp_list_pages(array(
                      'title_li' => '',
                      'depth' => 2,
                    ));
                    ?>
                  </ul>
                </aside>
              <?php endif; ?>

            </div>
          </div>
        </div>
	  </div>
	  <!--/menuBtn-->

    </div>
  </header>
  <!--/l-header-->


  <!--l-headerBottom-->
  <div class="l-headerBottom">

    <?php if(get_option('fit_ampFunction_search') == 'on'): ?>
    <!--searchHead-->
    <div class="searchHead">

      <div class="container container-searchHead">
        <div class="searchHead__search <?php if(get_option('fit_conHeadBottom_keyword') != 'on'): ?>searchHead__search-100<?php endif; ?>">
          <form class="searchHead__form" method="get" target="_top" action="<?php echo home_url( '/' ); ?>">
            <input class="searchHead__input" type="text" maxlength="50" name="s" placeholder="キーワードを入力" value="<?php if( get_search_query() ){ echo get_search_query();} ?>">
            <button class="searchHead__submit icon-search" type="submit" value="search"></button>
          </form>
        </div>
      </div>
    </div>
    <!--/searchHead-->
    <?php endif; ?>

    <?php if(get_option('fit_conHeadBottom_switch') == 'on'): ?>
    <div class="wider">
      <!--infoHead-->
      <div class="infoHead">
        <?php if(get_option('fit_conHeadBottom_url')): ?><a class="infoHead__text" href="<?php echo get_option('fit_conHeadBottom_url') ?>"><?php else:?><span class="infoHead__text"><?php endif; ?>
          <?php if(get_option('fit_conHeadBottom_contents')): ?><?php echo get_option('fit_conHeadBottom_contents') ?><?php endif; ?>
        <?php if(get_option('fit_conHeadBottom_url')): ?></a><?php else:?></span><?php endif; ?>
      </div>
      <!--/infoHead-->
    </div>
    <?php endif; ?>

    <?php if(get_option('fit_ampFunction_btn') == 'on'): ?>
    <div class="dividerTop container">
      <div class="btn btn-center"><a class="btn__link btn__link-normal btn__link-max" href="<?php echo get_the_permalink(); ?>">通常ページへ</a></div>
	</div>
    <?php endif; ?>

  </div>
  <!--l-headerBottom-->


  <!--l-wrapper-->
  <div class="l-wrapper">

    <!--l-main-->
    <?php
    //フレーム設定
    $frame = '';
    if (get_option('fit_conMain_frame') && get_option('fit_conMain_frame') != 'off' ){$frame = ' '.get_option('fit_conMain_frame');}
    ?>
    <main class="l-main<?php echo $frame; ?>">

      <div class="dividerBottom">
        <h1 class="heading heading-primary"><?php the_title(); ?></h1>

        <!--dateList-->
        <ul class="dateList dateList-main">
          <?php if( !empty(get_option('fit_postStyle_time')) ): ?>
            <li class="dateList__item icon-clock"><?php the_time(get_option('date_format')); ?></li>
          <?php endif; ?>
          <?php if ( !empty(get_option('fit_postStyle_update')) && get_the_time( 'U' ) !== get_the_modified_time( 'U' ) || !empty(get_option('fit_postStyle_update')) && empty(get_option('fit_postStyle_time'))) : ?>
            <li class="dateList__item icon-update"><?php the_modified_date(get_option('date_format')); ?></li>
          <?php endif; ?>
            <li class="dateList__item icon-folder"><?php the_category(', ');?></li>
          <?php if(has_tag() == true) : ?>
            <li class="dateList__item icon-tag"><?php the_tags(''); ?></li>
          <?php endif; ?>
          <?php
          $views = get_post_meta(get_the_ID(), 'post_views' , true );
          if( !empty(get_option('fit_postStyle_view')) ): ?>
            <li class="dateList__item icon-eye"><?php echo $views; ?><?php if(get_option('fit_bsRank_unit')) : ?><?php echo get_option('fit_bsRank_unit'); ?><?php else: ?>view<?php endif; ?></li>
          <?php endif; ?>
          <?php if( !empty(get_option('fit_postStyle_comment')) ): ?>
            <li class="dateList__item icon-bubble2" title="コメント数"><?php comments_number( '0件', '1件', '%件' ); ?></li>
          <?php endif; ?>
        </ul>
        <!--/dateList-->

        <?php if ( get_option('fit_postStyle_headline') != 'none' ): ?>
          <div class="eyecatch<?php if (get_option('fit_postStyle_aspect') && get_option('fit_postStyle_aspect') != 'off' ): ?> <?php echo get_option('fit_postStyle_aspect'); ?><?php endif; ?> eyecatch-main">
            <?php
            $cat = get_the_category();
            if ( !get_option('fit_postStyle_category') ){
              if(!empty($cat[0])){
                echo '<span class="eyecatch__cat eyecatch__cat-big cc-bg'.$cat[0]->term_id.'">';
                echo '<a href="' . get_category_link( $cat[0]->term_id ) . '">' . $cat[0]->cat_name . '</a>';
                echo '</span>';
              }
            }
            ?>
            <span class="eyecatch__link">
              <?php
              if (has_post_thumbnail()):
                $image_id = get_post_thumbnail_id ();
                $image = wp_get_attachment_image_src( $image_id , 'icatch768' );
                $src = $image[0]; //url
                $width = $image[1]; //横幅
                $height = $image[2]; //高さ
              ?>
                <amp-img layout="responsive" src="<?php echo $src;?>" alt="<?php echo get_the_title(); ?>" width="<?php echo $width;?>" height="<?php echo $height;?>" ></amp-img>
              <?php
              elseif ( get_fit_noimg()):
                $image_date = get_fit_noimg();
            	  $image_id = attachment_url_to_postid($image_date);
            	  $image = wp_get_attachment_image_src( $image_id, 'icatch768' );
                $src = $image[0]; //url
                $width = $image[1]; //横幅
                $height = $image[2]; //高さ
              ?>
                <amp-img layout="responsive" src="<?php echo $src;?>" alt="<?php echo get_the_title(); ?>" width="<?php echo $width;?>" height="<?php echo $height;?>" ></amp-img>
              <?php else: ?>
                <amp-img layout="responsive" src="<?php echo get_template_directory_uri(); ?>/img/img_no_768.gif" alt="<?php echo get_the_title(); ?>" width="768" height="432"></amp-img>
              <?php endif; ?>
            </span>
          </div>
        <?php endif; ?>

        <!--postContents-->
        <div class="postContents<?php if (get_option('fit_postStyle_frame') && get_option('fit_postStyle_frame') != 'off' ):?> <?php echo get_option('fit_postStyle_frame')?><?php endif; ?>">
          <?php if (get_option('fit_postShare_top') == 'on' && get_post_meta(get_the_ID(), 'share_hide', true) != '1') : ?>
            <aside class="social-top"><?php fit_share_btn(); ?></aside>
          <?php endif; ?>

          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <section class="content<?php fit_content_class(); ?>">
              <?php the_content(); ?>
            </section>
            <?php fit_link_pages(); // ページングの表示 ?>
          <?php endwhile; endif; ?>

          <?php if (get_option('fit_postShare_bottom') == 'on' && get_post_meta(get_the_ID(), 'share_hide', true) != '1') : ?>
            <aside class="social-bottom"><?php fit_share_btn(); ?></aside>
          <?php endif; ?>
        </div>
        <!--/postContents-->

        <?php if( get_option('fit_postCta_switch') == 'on' && get_post_meta(get_the_ID(), 'cta_hide', true) != '1' ):?>
          <!-- 記事下CTA -->
          <?php
          $frame = '';
          if(get_option('fit_postCta_style') && get_option('fit_postCta_style') != 'off' ){
            $frame = get_option('fit_postCta_style');
          } ?>
          <div class="content postCta <?php echo $frame ?>">
            <?php
            if(get_post_meta(get_the_ID(), 'cta_id', true) ){
              $id = get_post_meta(get_the_ID(), 'cta_id', true);
            }elseif(get_option('fit_postCta_id') ){
              $id = get_option('fit_postCta_id');
            }else{
              $id = '';
            }
            $args = array(
              'p' => $id,
              'posts_per_page' => '1',
              'order' => 'ASC',
              'post_type' => 'cta'
            );
            $my_query = new WP_Query( $args );
            while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
              <?php the_content(); ?>
            <?php endwhile; wp_reset_postdata();  ?>
          </div>
          <!-- /記事下CTA -->
        <?php endif; ?>

      <?php if (get_option('fit_adPost_doubleLeft') && get_post_meta(get_the_ID(), 'rectangle_hide', true) != '1' || get_option('fit_adPost_doubleRight') && get_post_meta(get_the_ID(), 'rectangle_hide', true) != '1' ):?>
        <!-- ダブルレクタングル広告(AMP時は1つ) -->
        <div class="rectangle">
          <div class="rectangle__item">
            <?php echo get_option('fit_ampAd_tag'); ?>
          </div>
          <span class="rectangle__title">広告</span>
        </div>
        <!-- /ダブルレクタングル広告 -->
      <?php endif; ?>

		<?php
		// フォローボタン、Prev Next記事、プロフィール、関連記事の表示
		if ( get_option( 'fit_postSns_switch' ) == 'on'
			|| get_option( 'fit_postPrevNext_switch' ) == 'on'
			|| get_option( 'fit_postProfile_switch' ) == 'on'
			|| get_option( 'fit_postRelated_switch' ) == 'on'
		) {
			require_once locate_template( 'inc/front/class-fit-post-parts-order.php' );
			$parts_order = Fit_Post_Parts_Order::get_parts_order();
			foreach ( $parts_order as $value ) {
				switch ( $value['name'] ) {
					// フォローボタン
					case Fit_Post_Parts_Order::$follow:
						if ( get_option( 'fit_postSns_switch' ) == 'on' && get_post_meta( get_the_ID(), 'follow_hide', true ) != '1' ) {
							get_template_part( 'template-parts/singleamp', 'snsfollow' );
						}
						break;
					// Prev Next記事
					case Fit_Post_Parts_Order::$prevnext:
						if ( get_option( 'fit_postPrevNext_switch' ) == 'on' && get_post_meta( get_the_ID(), 'prevNext_hide', true ) != '1' ) {
							get_template_part( 'template-parts/singleamp', 'prevnext' );
						}
						break;
					// プロフィール
					case Fit_Post_Parts_Order::$profile:
						if ( get_option( 'fit_postProfile_switch' ) == 'on' && get_post_meta( get_the_ID(), 'profile_hide', true ) != '1' ) {
							get_template_part( 'template-parts/singleamp', 'profile' );
						}
						break;
					// 関連記事の表示
					case Fit_Post_Parts_Order::$related:
						if ( get_option( 'fit_postRelated_switch' ) == 'on' && get_post_meta( get_the_ID(), 'related_hide', true ) != '1' ) {
							get_template_part( 'template-parts/singleamp', 'related' );
						}
						break;
				}
			}
		}
		?>

    </div>

    </main>
    <!--/l-main-->

  </div>
  <!--/l-wrapper-->


  <!--l-footer-->
  <footer class="l-footer">


    <div class="wider">
      <!--bottomFooter-->
      <div class="bottomFooter">
        <div class="container">

          <nav class="bottomFooter__navi">
            <?php if ( has_nav_menu( 'footer_menu' ) ) : //メニューセットあり ?>
              <?php wp_nav_menu(array(
                'theme_location' => 'footer_menu',
                'depth' => 1,
                'items_wrap' => '<ul class="bottomFooter__list">%3$s</ul>',
                'container' => false,
              ));?>
            <?php else : //メニューセットなし ?>
              <ul class="bottomFooter__list"><?php wp_list_pages ('title_li=&depth=1'); ?></ul>
            <?php endif; ?>
          </nav>

          <div class="bottomFooter__copyright">
            <?php if (get_option('fit_conFooter_copyright')): ?>
              <?php echo get_option('fit_conFooter_copyright'); ?>
            <?php else : ?>
              © Copyright <?php echo date_i18n( 'Y' ); ?> <a class="bottomFooter__link" href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>.
            <?php endif; ?>
          </div>

          <?php if (get_option('fit_conFooter_link') != 'off' ): ?>
            <div class="bottomFooter__producer">
              <?php bloginfo( 'name' ); ?> by <a class="bottomFooter__link" href="http://fit-jp.com/" target="_blank">FIT-Web Create</a>. Powered by <a class="bottomFooter__link" href="https://wordpress.org/" target="_blank">WordPress</a>.
            </div>
          <?php endif; ?>

        </div>
      </div>
      <!--/bottomFooter-->

    </div>
  </footer>
  <!-- /l-footer -->

  <!-- schema -->
  <!-- 投稿用構造化マークアップ -->
  <script type="application/ld+json">
  <?php
  // ユーザー投稿サムネイルの画像サイズを取得
  if (has_post_thumbnail()){
	  $thumbnail_id = get_post_thumbnail_id();
	  $eyeimg = wp_get_attachment_image_src( $thumbnail_id , 'icatch768' );
  }
  // ユーザー投稿NO IMAGEサイズを取得
  if (get_fit_noimg()){
	  $noimg_date = get_fit_noimg();
	  $noimg_id = attachment_url_to_postid($noimg_date);
	  $noimg = wp_get_attachment_image_src( $noimg_id, 'icatch768' );
  }
  // ユーザー投稿LOGOサイズを取得
  if (get_fit_logo()){
	  $logo_date = get_fit_logo();
	  $logo_id = attachment_url_to_postid($logo_date);
	  $logo = wp_get_attachment_image_src( $logo_id, 'full' );
  }
  // ユーザー投稿AMP LOGOサイズを取得
  if (get_fit_amplogo()){
	  $amplogo_date = get_fit_amplogo();
	  $amplogo_id = attachment_url_to_postid($amplogo_date);
	  $amplogo = wp_get_attachment_image_src( $amplogo_id, 'full' );
  }
  ?>
  {
    "@context": "http://schema.org",
    "@type": "Article ",
    "mainEntityOfPage":{
      "@type": "WebPage",
      "@id": "<?php the_permalink(); ?>"
    },
    "headline": "<?php echo get_the_title(); ?>",
    "description": "<?php echo get_the_excerpt(); ?>",
    "image": {
      "@type": "ImageObject",
      <?php if(has_post_thumbnail()) : ?>"url": "<?php echo $eyeimg[0]; ?>",
      "width": "<?php echo $eyeimg[1]; ?>px",
      "height": "<?php echo $eyeimg[2]; ?>px"
      <?php elseif ( get_fit_noimg()): ?>"url": "<?php echo $noimg[0]; ?>",
      "width": "<?php echo $noimg[1]; ?>px",
      "height": "<?php echo $noimg[2]; ?>px"
      <?php else: ?>"url": "<?php echo get_template_directory_uri(); ?>/img/img_no_768.gif",
      "height": "768px",
      "width": "432px"
      <?php endif; ?>
    },
    "datePublished": "<?php echo get_the_date(DATE_ISO8601); ?>",
    "dateModified": "<?php if ( get_the_date() != get_the_modified_time() ){ the_modified_date(DATE_ISO8601); } else { echo get_the_date(DATE_ISO8601); } ?>",
    "author": {
      "@type": "Person",
      "name": "<?php the_author_meta('display_name'); ?>"
    },
    "publisher": {
      "@type": "Organization",
      "name": "<?php bloginfo('name'); ?>",
      "logo": {
        "@type": "ImageObject",
        <?php if ( get_fit_amplogo()): ?>"url": "<?php echo $amplogo[0]; ?>",
        "width": "<?php echo $amplogo[1]; ?>px",
        "height": "<?php echo $amplogo[2]; ?>px"
        <?php elseif(get_fit_logo()) : ?>"url": "<?php echo $logo[0]; ?>",
        "width": "<?php echo $logo[1]; ?>px",
        "height": "<?php echo $logo[2]; ?>px"
        <?php else: ?>"url": "<?php echo get_template_directory_uri(); ?>/img/amp_default_logo.png",
        "height": "600px",
        "width": "60px"
        <?php endif; ?>
      }
    }
  }
  </script>

  <!-- パンくず用構造化マークアップ -->
  <script type="application/ld+json">
	{ "@context":"http://schema.org",
	  "@type": "BreadcrumbList",
	  "itemListElement":
	  [
	    {"@type": "ListItem","position": 1,"item":{"@id": "<?php echo home_url(); ?>","name": "ホーム"}},
	<?php
	//パンくずの階層用
	$i=1;
	//カテゴリーに関する情報を取得
	$categories = get_the_category(get_the_id());
	$cat = $categories[0];
	//先祖のカテゴリーがあれば(0でなければ)分岐
	if($cat -> parent != 0){
	    //先祖のカテゴリーを配列で取得
	    $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
	    //$ancestorsの配列から一つ一つ$ancestorに取り出してなくなるまでくりかえす
	    foreach($ancestors as $ancestor){
	        $i++;
	        echo '    {"@type": "ListItem","position": '.$i.',"item":{"@id": "'. get_category_link($ancestor).'","name": "'. get_cat_name($ancestor). '"}},'.PHP_EOL;
	    }
	}
	//属していてる直接のカテゴリーの情報を出力
	$i++;
	echo '    {"@type": "ListItem","position": '.$i.',"item":{"@id": "'. get_category_link($cat -> term_id). '","name": "'. $cat-> cat_name . '"}},'.PHP_EOL;
	//表示されている投稿ページの情報を出力
	$i++;
	echo '    {"@type": "ListItem","position": '.$i.',"item":{"@id": "'. esc_url(get_permalink()). '","name": "'. esc_html(get_the_title()) . '"}}'.PHP_EOL;
	?>
	  ]
	}
  </script>
  <!-- /schema -->

</body>
</html>
