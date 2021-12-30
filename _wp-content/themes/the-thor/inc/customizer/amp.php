<?php
////////////////////////////////////////////////////////
//SEO設定画面
////////////////////////////////////////////////////////
function fit_amp_cutomizer( $wp_customize ) {


	//パネルの追加
	$wp_customize->add_panel( 'fit_amp_panel', array(
		'title'       => 'AMP設定[THE]',
		'priority'  => 1,
	));

		//セクションの追加
		$wp_customize->add_section( 'fit_amp_function_section', array(
			'title'       => 'AMP機能設定',
			'panel'       => 'fit_amp_panel',
			'description' => 'AMP機能の設定画面です。',
			'priority'  => 1,
		));

			// AMP表示 セッティング
			$wp_customize->add_setting( 'fit_ampFunction_switch', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// AMP表示 コントロール
			$wp_customize->add_control( 'fit_ampFunction_switch', array(
				'section'   => 'fit_amp_function_section',
				'settings'  => 'fit_ampFunction_switch',
				'label'     => 'AMP機能設定',
				'description' => '■AMPページを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '非表示(default)',
					'on'  => '表示',
				),
			));

			// AMPサーチボックス表示 セッティング
			$wp_customize->add_setting( 'fit_ampFunction_search', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// AMPサーチボックス表示 コントロール
			$key = 'on';
			$value = '表示';
			if(!is_ssl()){
				$key = 'off';
				$value = 'SSL化されていないため表示できません';
			}
			$wp_customize->add_control( 'fit_ampFunction_search', array(
				'section'   => 'fit_amp_function_section',
				'settings'  => 'fit_ampFunction_search',
				'description' => '■AMPページで検索ボックスを表示するか選択<br>(HTTPS通信サイトでのみ表示できます)',
				'type'      => 'select',
				'choices'   => array(
					'off' => '非表示(default)',
					$key  => $value,
				),
			));

			// AMP通常ページへボタン表示 セッティング
			$wp_customize->add_setting( 'fit_ampFunction_btn', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// AMP通常ページへボタン表示 コントロール
			$wp_customize->add_control( 'fit_ampFunction_btn', array(
				'section'   => 'fit_amp_function_section',
				'settings'  => 'fit_ampFunction_btn',
				'description' => '■AMPページで通常ページへのボタンを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '非表示(default)',
					'on'  => '表示',
				),
			));

		//セクションの追加
		$wp_customize->add_section( 'fit_amp_logo_section', array(
			'title'       => 'AMPロゴの設定',
			'panel'       => 'fit_amp_panel',
			'description' => 'AMPロゴの設定画面です。',
			'priority'  => 1,
		));

			//ロゴ画像 セッティング
			$wp_customize->add_setting('fit_ampLogo_img', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'fit_sanitize_image',
			));
			//ロゴ画像 コントロール
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'fit_ampLogo_img', array(
				'section' => 'fit_amp_logo_section',
				'settings' => 'fit_ampLogo_img',
				'label' => 'ロゴ画像の設定',
				'description' => '■AMPのロゴ画像を登録<br>(サイズ：縦：60 × 横：600px 以下)',
			)));


		// セクション
		$wp_customize->add_section( 'fit_amp_ad_section', array(
			'title'     => 'AMPページ用広告設定',
			'priority'  => 1,
			'panel'       => 'fit_amp_panel',
			'description' => 'AMPページ用広告の画面です。',
		));

			// AMP広告 セッティング
			$wp_customize->add_setting( 'fit_ampAd_tag', array(
				'type' => 'option',
				'sanitize_callback' => '',
			));
			// AMP広告 コントロール
			$wp_customize->add_control( 'fit_ampAd_tag', array(
				'section'   => 'fit_amp_ad_section',
				'settings'  => 'fit_ampAd_tag',
				'label'     => 'AMP広告の設定',
				'description' => '■AdSense等の広告タグを入力<br>
				(通常投稿ページ内の広告を、ここで設定したAMP広告タグに切り替えます)',
				'type'      => 'textarea',
			));

}
add_action( 'customize_register', 'fit_amp_cutomizer' );
function get_fit_amplogo(){ return esc_url(get_theme_mod('fit_ampLogo_img'));}
