<?php
////////////////////////////////////////////////////////
//PWA設定画面
////////////////////////////////////////////////////////
function fit_pwa_cutomizer( $wp_customize ) {

	//パネルの追加
	$wp_customize->add_panel( 'fit_pwa_panel', array(
		'title'       => 'PWA設定[THE]',
		'priority'  => 1,
	));

		//セクションの追加
		$wp_customize->add_section( 'fit_pwa_function_section', array(
			'title'       => 'PWA機能設定',
			'panel'       => 'fit_pwa_panel',
			'description' => 'PWA機能の設定画面です。<br>PWA機能を有効にするとスマホ表示時にホーム画面へ追加ボタンが表示されます。また、高速通信を可能とするPWAキャッシュ機能が有効になります。',
			'priority'  => 1,
		));

			// PWA表示 セッティング
			$wp_customize->add_setting( 'fit_pwaFunction_switch', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// PWA表示 コントロール
			$key = 'on';
			$value = '有効';
			if(!is_ssl()){
				$key = 'off';
				$value = 'SSL化されていないため有効化できません';
			}
			$wp_customize->add_control( 'fit_pwaFunction_switch', array(
				'section'   => 'fit_pwa_function_section',
				'settings'  => 'fit_pwaFunction_switch',
				'label'     => 'PWA機能設定',
				'description' => '■PWA機能を有効化するか選択<br>(HTTPS通信サイトでのみ有効にできます)',
				'type'      => 'select',
				'choices'   => array(
					'off' => '無効(default)',
					$key  => $value,
				),
			));

			// ホーム画面のアイコン下に表示される名前 セッティング
			$wp_customize->add_setting( 'fit_pwaFunction_text', array(
				'default'   => get_bloginfo( 'name' ),
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ホーム画面のアイコン下に表示される名前 コントロール
			$wp_customize->add_control( 'fit_pwaFunction_text', array(
				'section'   => 'fit_pwa_function_section',
				'settings'  => 'fit_pwaFunction_text',
				'description' => '■ホーム画面のアイコン下テキストを入力',
				'type'      => 'text',
			));

			// PWAキャッシュクリアボタン
			$wp_customize->add_control(
				'fit_pwaCacheClear_button', array(
					'section'   => 'fit_pwa_function_section',
					'type' => 'button',
					'settings' => array(),
					'description' => "■PWAのキャッシュをクリアする",
					'input_attrs' => array(
						'value' => 'クリア',
						'class' => 'button',
					),
				)
			);
			// PWAキャッシュクリア用 セッティング
			$wp_customize->add_setting( 'fit_pwaCacheClear', array(
				'default'   => '',
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// PWAキャッシュクリア用 コントロール
			$wp_customize->add_control( 'fit_pwaCacheClear', array(
				'section'   => 'fit_pwa_function_section',
				'settings'  => 'fit_pwaCacheClear',
				'type'      => 'hidden',
			));


		//セクションの追加
		$wp_customize->add_section( 'fit_pwa_icon_section', array(
			'title'       => 'アイコンの設定',
			'panel'       => 'fit_pwa_panel',
			'description' => 'ホーム画面などで使用されるアイコンの設定画面です。',
			'priority'  => 1,
		));

			//アイコン72 セッティング
			$wp_customize->add_setting('fit_pwaIcon_img72', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'fit_sanitize_image',
			));
			//アイコン72 コントロール
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'fit_pwaIcon_img72', array(
				'section' => 'fit_pwa_icon_section',
				'settings' => 'fit_pwaIcon_img72',
				'label' => 'アイコンの設定',
				'description' => '■72px × 72px サイズのPNGアイコンを登録',
			)));

			//アイコン192 セッティング
			$wp_customize->add_setting('fit_pwaIcon_img192', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'fit_sanitize_image',
			));
			//アイコン192 コントロール
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'fit_pwaIcon_img192', array(
				'section' => 'fit_pwa_icon_section',
				'settings' => 'fit_pwaIcon_img192',
				'description' => '■192px × 192px サイズのPNGアイコンを登録',
			)));

			//アイコン512 セッティング
			$wp_customize->add_setting('fit_pwaIcon_img512', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'fit_sanitize_image',
			));
			//アイコン512 コントロール
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'fit_pwaIcon_img512', array(
				'section' => 'fit_pwa_icon_section',
				'settings' => 'fit_pwaIcon_img512',
				'description' => '■512px × 512px サイズのPNGアイコンを登録',
			)));

}
add_action( 'customize_register', 'fit_pwa_cutomizer' );
function get_fit_pwa72() { return esc_url(get_theme_mod('fit_pwaIcon_img72'));}
function get_fit_pwa192(){ return esc_url(get_theme_mod('fit_pwaIcon_img192'));}
function get_fit_pwa512(){ return esc_url(get_theme_mod('fit_pwaIcon_img512'));}
