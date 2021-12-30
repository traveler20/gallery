<?php 
////////////////////////////////////////////////////////
//カスタム投稿タイプ設定画面
////////////////////////////////////////////////////////
function fit_custom_cutomizer( $wp_customize ) {

	//パネルの追加
	$wp_customize->add_panel( 'fit_custom_panel', array(
		'title'       => 'カスタム投稿タイプ設定[THE]',
		'priority'  => 1,
	));

		//セクションの追加
		$wp_customize->add_section( 'fit_custom_basis_section', array(
			'title'       => '基本設定',
			'panel'       => 'fit_custom_panel',
			'description' => '基本の設定画面です。',
			'priority'  => 1,
		));
		
			//カスタム投稿タイプの利用 セッティング
			$wp_customize->add_setting( 'fit_custBasis_setting', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			//カスタム投稿タイプの利用 コントロール
			$wp_customize->add_control( 'fit_custBasis_setting', array(
				'section'   => 'fit_custom_basis_section',
				'settings'  => 'fit_custBasis_setting',
				'label'     => '基本設定',
				'description' => '■カスタム投稿タイプを利用するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '利用しない(default)',
					'on' => '利用する',
				),
			));
			
			//カスタム投稿タイプ名　セッティング
			$wp_customize->add_setting( 'fit_custBasis_name', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				'default'   => 'お知らせ',
			));
			//カスタム投稿タイプ名 コントロール
			$wp_customize->add_control( 'fit_custBasis_name', array(
				'section'   => 'fit_custom_basis_section',
				'settings'  => 'fit_custBasis_name',
				'description' => '■カスタム投稿タイプ名を入力',
				'type'      => 'text',
			));
			
			//カテゴリー利用 セッティング
			$wp_customize->add_setting( 'fit_custBasis_category', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			//カテゴリー利用 コントロール
			$wp_customize->add_control( 'fit_custBasis_category', array(
				'section'   => 'fit_custom_basis_section',
				'settings'  => 'fit_custBasis_category',
				'description' => '■カテゴリー機能の利用するか選択',
				'type'      => 'select',

				'choices'   => array(
					'off' => '利用しない(default)',
					'on' => '利用する',
				),
			));

			//タグ利用 セッティング
			$wp_customize->add_setting( 'fit_custBasis_tag', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			//タグ利用 コントロール
			$wp_customize->add_control( 'fit_custBasis_tag', array(
				'section'   => 'fit_custom_basis_section',
				'settings'  => 'fit_custBasis_tag',
				'description' => '■タグ機能の利用するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '利用しない(default)',
					'on' => '利用する',
				),
			));

		//セクションの追加
		$wp_customize->add_section( 'fit_custom_list_section', array(
			'title'       => '一覧表示設定',
			'panel'       => 'fit_custom_panel',
			'description' => '一覧表示の設定画面です。',
			'priority'  => 1,
		));
			

			//フレーム設定 セッティング
			$wp_customize->add_setting( 'fit_custList_frame', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			//フレーム設定 コントロール
			$wp_customize->add_control( 'fit_custList_frame', array(
				'section'   => 'fit_custom_list_section',
				'settings'  => 'fit_custList_frame',
				'label'     => 'カスタム投稿一覧デザイン設定',
				'description' => '■フレームを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '無し(default)',
					'u-shadow' => 'シャドウフレーム',
					'u-border' => 'ボーダーフレーム',
				),
			));
						
			// カスタム投稿一覧デザイン セッティング
			$wp_customize->add_setting( 'fit_custList_style', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// カスタム投稿一覧デザイン コントロール
			$wp_customize->add_control( 'fit_custList_style', array(
				'section'   => 'fit_custom_list_section',
				'settings'  => 'fit_custList_style',
				'description' => '■リストデザインを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '背景スタイル(default)',
					'border' => 'ボーダースタイル',
				),
			));
		
		
		//セクションの追加
		$wp_customize->add_section( 'fit_custom_top_section', array(
			'title'       => 'TOPページ一覧表示設定',
			'panel'       => 'fit_custom_panel',
			'description' => 'TOPページの一覧表示設定画面です。',
			'priority'  => 1,
		));
			
			//カスタム投稿TOPページ一覧表示設定 セッティング
			$wp_customize->add_setting( 'fit_custTop_switch', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			//カスタム投稿TOPページ一覧表示設定 コントロール
			$wp_customize->add_control( 'fit_custTop_switch', array(
				'section'   => 'fit_custom_top_section',
				'settings'  => 'fit_custTop_switch',
				'label'     => 'TOPページ一覧表示設定',
				'description' => '■TOPページで一覧を表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '非表示(default)',
					'on' => '表示',
				),
			));
					
			// カスタム投稿TOP一覧表示件数 セッティング
			$wp_customize->add_setting( 'fit_custTop_number', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_number_range',
			));
			// カスタム投稿TOP一覧表示件数 コントロール
			$wp_customize->add_control( 'fit_custTop_number', array(
				'section'   => 'fit_custom_top_section',
				'settings'  => 'fit_custTop_number',
				'description' => '■一覧に表示する件数を指定',
				'type'      => 'number',
				'input_attrs' => array(
					'step'     => '1',
					'min'      => '1',
					'max'      => '20',
				),
			));
			
			// カスタム投稿見出し設定　セッティング
			$wp_customize->add_setting( 'fit_custTop_title', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// カスタム投稿見出し設定　コントロール
			$wp_customize->add_control( 'fit_custTop_title', array(
				'section'   => 'fit_custom_top_section',
				'settings'  => 'fit_custTop_title',
				'description' => '■セクションの見出しを入力',
				'type'      => 'text',
			));
			
			// 太文字設定 セッティング
			$wp_customize->add_setting('fit_custTop_bold', array( 
			    'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 太文字設定 コントロール
			$wp_customize->add_control('fit_custTop_bold', array( 
			    'section' => 'fit_custom_top_section', 
				'settings' => 'fit_custTop_bold', 
				'label'     => '見出しを太文字にする',
				'type'      => 'checkbox',
			));
			
			// カスタム投稿見出しアイコン設定　セッティング
			$wp_customize->add_setting( 'fit_custTop_icon', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// カスタム投稿見出しアイコン設定　コントロール
			$wp_customize->add_control( 'fit_custTop_icon', array(
				'section'   => 'fit_custom_top_section',
				'settings'  => 'fit_custTop_icon',
				'description' => '■見出しの左に表示するアイコンを入力　[<a href="'.get_template_directory_uri().'/admin/template/icon_list.php" target="_blank">アイコン一覧</a>]',
				'type'      => 'text',
			));
			// カスタム投稿見出しサブ設定　セッティング
			$wp_customize->add_setting( 'fit_custTop_sub', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// カスタム投稿見出しサブ設定　コントロール
			$wp_customize->add_control( 'fit_custTop_sub', array(
				'section'   => 'fit_custom_top_section',
				'settings'  => 'fit_custTop_sub',
				'description' => '■見出しの右に表示する補足情報を入力',
				'type'      => 'text',
			));
			
			// カスタム投稿アーカイブページへのボタンテキスト　セッティング
			$wp_customize->add_setting( 'fit_custTop_btn', array(
				'default'   => '一覧へ',
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// カスタム投稿アーカイブページへのボタンテキスト　コントロール
			$wp_customize->add_control( 'fit_custTop_btn', array(
				'section'   => 'fit_custom_top_section',
				'settings'  => 'fit_custTop_btn',
				'description' => '■アーカイブへのボタンテキストを入力',
				'type'      => 'text',
			));

}
add_action( 'customize_register', 'fit_custom_cutomizer' );