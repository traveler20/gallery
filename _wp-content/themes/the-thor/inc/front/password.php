<?php
////////////////////////////////////////////////////////
//パスワード制限系フロント表示設定
////////////////////////////////////////////////////////

//保護中テキスト削除
function fit_protected_title_format( $title ) {
       return '%s';
}
add_filter( 'protected_title_format', 'fit_protected_title_format' );


//パスワードエリア表示カスタマイズ
function fit_password_form() {
	$title = '続きを見るにはパスワードを入力してください。';
	$contents = '会員登録、もしくはメルマガ登録後に発行されるパスワードをご入力ください。';
	if(get_option('fit_bsPass_title')){
		$title = get_option('fit_bsPass_title');
	}
	if(get_option('fit_bsPass_contents')){
		$contents = get_option('fit_bsPass_contents');
	}
	return
	get_post_meta(get_the_ID(),'pass_contents',true).'
	<div class="box-basic">
	  <span class="style-bold">'.$title.'</span>
	  '.$contents.'
	  <form class="passForm" action="' . home_url() . '/wp-login.php?action=postpass" method="post">
	    <input class="passForm__input" type="password" name="post_password" size="24">
	    <input class="passForm__btn" type="submit" name="Submit" value="送信">
	  </form>
	</div>';
}
add_filter('the_password_form', 'fit_password_form');
