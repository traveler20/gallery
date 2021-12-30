<?php
//////////////////////////////////////////////////
//オリジナルダッシュボード用ファイル設定
//////////////////////////////////////////////////
function rss_dashboard_widget() {
  echo '
  <div class="rss-widget">
  <p>THE THORをご利用の皆様へのFITからのお知らせです。</p>
  ';
  wp_widget_rss_output(array(
    'url' => 'https://thor-manual.fit-theme.com/feed/?post_type=custom',
    'title' => 'THE THOR利用者へのお知らせ',
    'items' => 10,
    'show_summary' => 1,
    'show_author' => 0,
    'show_date' => 1
  ));
  echo '</div>';
}

function pass_dashboard_widget() {
  $stamp = date('U');
  echo '
  <div class="rss-widget">
  ';
  wp_widget_rss_output(array(
    'url' => 'https://fit-theme.com/wp-content/themes/fit-theme/rss/thor.xml?stamp='.$stamp.'',
    'title' => 'THE THOR会員フォーラムPASS',
    'items' => 3,
    'show_summary' => 1,
    'show_author' => 0,
    'show_date' => 1
  ));
  echo '</div>';
}

function btn_dashboard_widget() {
  echo '
  <div class="rss-widget">

    <h3>マニュアル・会員フォーラムへのリンク</h3>
    <p class="about-description">基本的な操作方法はマニュアルサイト。マニュアルサイトで解決できなければ会員フォーラムサイトへ。</p>


    <div style="display:flex;width:100%; text-align:center;">
      <div style="width:50%;">
        <a style="width: 90%;" class="button button-primary" href="https://thor-manual.fit-theme.com/">マニュアルサイト</a>
		  </div>
      <div style="width:50%;">
        <a style="width: 90%;" class="button button-primary" href="https://thor-forum.fit-theme.com/">会員フォーラム</a>
		  </div>
    </div>
  </div>';
}


function add_rss_dashboard_widget() {
	wp_add_dashboard_widget( 'rss_dashboard', 'THE THORからのお知らせ', 'rss_dashboard_widget' );
  wp_add_dashboard_widget( 'pass_dashboard', 'THE THOR会員フォーラムPASSのご案内', 'pass_dashboard_widget' );
  wp_add_dashboard_widget( 'btn_dashboard', 'THE THORマニュアル・会員フォーラムサイト', 'btn_dashboard_widget' );
}
add_action( 'wp_dashboard_setup', 'add_rss_dashboard_widget' );
