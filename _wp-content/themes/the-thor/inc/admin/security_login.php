<?php
////////////////////////////////////////////////////////
//ログインセキュリティ設定(メールアドレスでログイン)
////////////////////////////////////////////////////////
if(get_option('fit_bsSecurity_login') == 'on' ){

	function fit_email_login( $user, $username, $password ) {
		// ユーザ情報を'email'を対象に検索
		$user = get_user_by('email',$username);

		// ユーザ情報が存在する場合
		if(!empty($user->user_login)) {
			// ユーザ名を取得しセットする
			$username = $user->user_login;
		} else {
			// メールアドレスに該当するユーザが存在しない場合は強制的に空文字
			$username = '';  // 認証失敗にする
		}

		// ログイン認証の判定結果を返す
		return wp_authenticate_username_password( null, $username, $password );
	}
	add_filter('authenticate', 'fit_email_login', 20, 3);

	function fit_custom_login() {
		echo '
		<style>
		.login label[for=user_login]{font-size: 0;}
		.login label[for=user_login]:before{font-size: 14px; content: "メールアドレス";}
		</style>
		';
	}
	add_action( 'login_enqueue_scripts', 'fit_custom_login' );

}
