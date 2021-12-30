<?php
////////////////////////////////////////////////////////
//共通エリア設定画面
////////////////////////////////////////////////////////
function fit_common_cutomizer( $wp_customize ) {

	//パネルの追加
	$wp_customize->add_panel( 'fit_common_panel', array(
		'title'       => '共通エリア設定[THE]',
		'priority'  => 1,
	));


		//セクションの追加
		$wp_customize->add_section( 'fit_common_header_section', array(
			'title'       => 'ヘッダーエリア設定',
			'panel'       => 'fit_common_panel',
			'description' => 'ヘッダーエリアの設定画面です。',
			'priority'  => 1,
		));

			// ヘッダーレイアウト セッティング
			$wp_customize->add_setting( 'fit_conHeader_layout', array(
				'default'   => 'value1',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// ヘッダーレイアウト コントロール
			$wp_customize->add_control( 'fit_conHeader_layout', array(
				'section'   => 'fit_common_header_section',
				'settings'  => 'fit_conHeader_layout',
				'label'     => 'ヘッダー設定',
				'description' => '■ヘッダーのレイアウトを選択',
				'type'      => 'select',
				'choices'   => array(
					'value1' => 'シンプル(default)',
					'value2' => 'ダイナミック',
				),
			));
			// ヘッダー固定化 セッティング
			$wp_customize->add_setting( 'fit_conHeader_fixed', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// ヘッダー固定化 コントロール
			$wp_customize->add_control( 'fit_conHeader_fixed', array(
				'section'   => 'fit_common_header_section',
				'settings'  => 'fit_conHeader_fixed',
				'description' => '■ヘッダーを固定表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '固定表示しない(default)',
					'on'  => '固定表示する',
				),
			));

			// ヘッダーテキスト セッティング
			$wp_customize->add_setting( 'fit_conHeader_text', array(
				'default'   => 'black',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// ヘッダーテキスト コントロール
			$wp_customize->add_control( 'fit_conHeader_text', array(
				'section'   => 'fit_common_header_section',
				'settings'  => 'fit_conHeader_text',
				'description' => '■ヘッダーのテキストカラーを選択',
				'type'      => 'select',
				'choices'   => array(
					'black' => '黒文字(default)',
					'white' => '白文字',
				),
			));

			// ヘッダー背景カラー セッティング
			$wp_customize->add_setting( 'fit_conHeader_color', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// ヘッダー背景カラー コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_conHeader_color', array(
				'section' => 'fit_common_header_section',
				'settings' =>'fit_conHeader_color',
				'description' => '■ヘッダーの背景色を指定',
			)));

			// ヘッダーエリアの区切り装飾 セッティング
			$wp_customize->add_setting( 'fit_conHeader_divide', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// ヘッダーエリアの区切り装飾 コントロール
			$wp_customize->add_control( 'fit_conHeader_divide', array(
				'section'   => 'fit_common_header_section',
				'settings'  => 'fit_conHeader_divide',
				'description' => '■ヘッダーエリアの区切り装飾を選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '無し(default)',
					'shadow' => 'シャドウ',
					'border' => 'ボーダー',
				),
			));



			// グローバルメニュー セッティング
			$wp_customize->add_setting( 'fit_conHeader_gnavi', array(
				'default'   => 'on',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// グローバルメニュー コントロール
			$wp_customize->add_control( 'fit_conHeader_gnavi', array(
				'section'   => 'fit_common_header_section',
				'settings'  => 'fit_conHeader_gnavi',
				'label'     => 'グローバルメニュー設定',
				'description' => '■グローバルメニューを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'on'  => 'PC/スマホで表示する(default)',
					'off'  => 'PC/スマホで表示しない',
					'u-none-sp' => 'スマホで表示しない',
					'u-none-pc' => 'PCで表示しない',
				),
			));

			// サブメニュー セッティング
			$wp_customize->add_setting( 'fit_conHeader_subnavi', array(
				'default'   => 'value1',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// サブメニュー コントロール
			$wp_customize->add_control( 'fit_conHeader_subnavi', array(
				'section'   => 'fit_common_header_section',
				'settings'  => 'fit_conHeader_subnavi',
				'label'     => 'サブメニュー設定',
				'description' => '■PC表示時のサブメニュー表示位置を選択',
				'type'      => 'select',
				'choices'   => array(
					'value1' => 'グローバルメニューの右に表示(default)',
					'value2' => 'メニューパネル内で表示(スマホと同じ)',
				),
			));


			// サブメニューボタンテキスト セッティング
			$wp_customize->add_setting( 'fit_conHeader_btnText', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// サブメニューボタンテキスト コントロール
			$wp_customize->add_control( 'fit_conHeader_btnText', array(
				'section'   => 'fit_common_header_section',
				'settings'  => 'fit_conHeader_btnText',
				'description' => '■注目ボタンのテキストを入力',
				'type'      => 'text',
			));

			// サブメニューボタンURL セッティング
			$wp_customize->add_setting( 'fit_conHeader_btnUrl', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// サブメニューボタンURL コントロール
			$wp_customize->add_control( 'fit_conHeader_btnUrl', array(
				'section'   => 'fit_common_header_section',
				'settings'  => 'fit_conHeader_btnUrl',
				'description' => '■ボタンのリンク先URLを入力',
				'type'      => 'text',
			));


			// サーチパネル表示/非表示 セッティング
			$wp_customize->add_setting( 'fit_conHeader_searchPanel_switch', array(
				'default'   => 'on',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// サーチパネル表示/非表示 コントロール
			$wp_customize->add_control( 'fit_conHeader_searchPanel_switch', array(
				'section'   => 'fit_common_header_section',
				'settings'  => 'fit_conHeader_searchPanel_switch',
				'label'     => 'サーチパネルの設定',
				'description' => '■サーチパネルを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'on' => '表示(default)',
					'off' => '非表示',
				),
			));

			// サーチパネル検索機能 セッティング
			$wp_customize->add_setting( 'fit_conHeader_searchPanel', array(
				'default'   => 'value1',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// サーチパネル検索機能 コントロール
			$wp_customize->add_control( 'fit_conHeader_searchPanel', array(
				'section'   => 'fit_common_header_section',
				'settings'  => 'fit_conHeader_searchPanel',
				'description' => '■サーチパネル内の検索機能を選択',
				'type'      => 'select',
				'choices'   => array(
					'value1' => '複数条件検索(default)',
					'value2' => 'キーワード検索',
				),
			));

			// メニューパネル表示/非表示 セッティング
			$wp_customize->add_setting( 'fit_conHeader_menuPanel_switch', array(
				'default'   => 'on',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// メニューパネル表示/非表示 コントロール
			$wp_customize->add_control( 'fit_conHeader_menuPanel_switch', array(
				'section'   => 'fit_common_header_section',
				'settings'  => 'fit_conHeader_menuPanel_switch',
				'label'     => 'メニューパネルの設定',
				'description' => '■メニューパネルを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'on' => '表示(default)',
					'off' => '非表示',
				),
			));

			// ウィジェット見出しデザイン セッティング
			$wp_customize->add_setting( 'fit_conHeader_menuHeading', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// ウィジェット見出しデザイン コントロール
			$wp_customize->add_control( 'fit_conHeader_menuHeading', array(
				'section'   => 'fit_common_header_section',
				'settings'  => 'fit_conHeader_menuHeading',
				'description' => '■ウィジェットの見出しデザインを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '角丸(default)',
					'simple' => 'シンプル',
					'bottom' => 'ボトムボーダー',
					'border' => 'はみ出すボーダー',
					'simplewide' => 'シンプル(ワイド)',
					'wide' => '内側ボーダー(ワイド)',
				),
			));

			// ウィジェット見出しデザイン設定 セッティング
			$wp_customize->add_setting( 'fit_conHeader_menuColor', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// ウィジェット見出しデザイン設定 コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_conHeader_menuColor', array(
				'section' => 'fit_common_header_section',
				'settings' =>'fit_conHeader_menuColor',
				'description' => '■ウィジェット見出しの色を指定',
			)));


		//セクションの追加
		$wp_customize->add_section( 'fit_common_headBottom_section', array(
			'title'       => 'ヘッダーボトムエリア設定[検索窓・お知らせ]',
			'panel'       => 'fit_common_panel',
			'description' => 'ヘッダーボトムエリア設定画面です。',
			'priority'  => 1,
		));


			// ヘッダー検索窓スイッチ セッティング
			$wp_customize->add_setting( 'fit_conHeadBottom_switchSearch', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// ヘッダー検索窓スイッチ コントロール
			$wp_customize->add_control( 'fit_conHeadBottom_switchSearch', array(
				'section'   => 'fit_common_headBottom_section',
				'settings'  => 'fit_conHeadBottom_switchSearch',
				'label'     => 'ヘッダー検索窓の表示設定',
				'description' => '■ヘッダー検索窓を表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '非表示(default)',
					'on'  => '表示',
				),
			));

			// ヘッダー検索窓スイッチ セッティング
			$wp_customize->add_setting( 'fit_conHeadBottom_keyword', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// ヘッダー検索窓スイッチ コントロール
			$wp_customize->add_control( 'fit_conHeadBottom_keyword', array(
				'section'   => 'fit_common_headBottom_section',
				'settings'  => 'fit_conHeadBottom_keyword',
				'description' => '■注目キーワードを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '非表示(default)',
					'on'  => '表示',
				),
			));

			//スマホ注目キーワード表示 セッティング
			$wp_customize->add_setting('fit_conHeadBottom_keywordSp', array(
			    'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			//スマホ注目キーワード表示 コントロール
			$wp_customize->add_control('fit_conHeadBottom_keywordSp', array(
			    'section' => 'fit_common_headBottom_section',
				'settings' => 'fit_conHeadBottom_keywordSp',
				'label'     => 'スマホで注目キーワードを非表示にする',
				'type'      => 'checkbox',
			));

			// ヘッダー注目キーワードのタイトル セッティング
			$wp_customize->add_setting( 'fit_conHeadBottom_keywordTitle', array(
				'default'   => '注目キーワード',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ヘッダー注目キーワードのタイトル コントロール
			$wp_customize->add_control( 'fit_conHeadBottom_keywordTitle', array(
				'section'   => 'fit_common_headBottom_section',
				'settings'  => 'fit_conHeadBottom_keywordTitle',
				'description' => '■注目キーワードのタイトルを入力',
				'type'      => 'text',
			));

			// ヘッダー注目キーワードカラー セッティング
			$wp_customize->add_setting( 'fit_conHeadBottom_colorSearch', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// ヘッダー注目キーワードカラー コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_conHeadBottom_colorSearch', array(
				'section' => 'fit_common_headBottom_section',
				'settings' =>'fit_conHeadBottom_colorSearch',
				'description' => '■背景色を指定',
			)));



			// ヘッダーお知らせスイッチ セッティング
			$wp_customize->add_setting( 'fit_conHeadBottom_switch', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// ヘッダーお知らせスイッチ コントロール
			$wp_customize->add_control( 'fit_conHeadBottom_switch', array(
				'section'   => 'fit_common_headBottom_section',
				'settings'  => 'fit_conHeadBottom_switch',
				'label'     => 'ヘッダーお知らせの表示設定',
				'description' => '■ヘッダーお知らせを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '非表示(default)',
					'on'  => '表示',
				),
			));

			// ヘッダーお知らせ内容 セッティング
			$wp_customize->add_setting( 'fit_conHeadBottom_contents', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ヘッダーお知らせ内容 コントロール
			$wp_customize->add_control( 'fit_conHeadBottom_contents', array(
				'section'   => 'fit_common_headBottom_section',
				'settings'  => 'fit_conHeadBottom_contents',
				'description' => '■お知らせとして表示する文章を入力',
				'type'      => 'text',
			));

			// ヘッダーお知らせURL セッティング
			$wp_customize->add_setting( 'fit_conHeadBottom_url', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ヘッダーお知らせURL コントロール
			$wp_customize->add_control( 'fit_conHeadBottom_url', array(
				'section'   => 'fit_common_headBottom_section',
				'settings'  => 'fit_conHeadBottom_url',
				'description' => '■リンク先URLを入力',
				'type'      => 'text',
			));

			// ヘッダーお知らせカラー セッティング
			$wp_customize->add_setting( 'fit_conHeadBottom_color', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// ヘッダーお知らせカラー コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_conHeadBottom_color', array(
				'section' => 'fit_common_headBottom_section',
				'settings' =>'fit_conHeadBottom_color',
				'description' => '■背景色を指定',
			)));


		//セクションの追加
		$wp_customize->add_section( 'fit_common_main_section', array(
			'title'       => 'メインカラムエリア設定',
			'panel'       => 'fit_common_panel',
			'description' => 'メインカラムエリアの設定画面です。',
			'priority'  => 1,
		));

			// メインカラムフレーム セッティング
			$wp_customize->add_setting( 'fit_conMain_frame', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// メインカラムフレーム コントロール
			$wp_customize->add_control( 'fit_conMain_frame', array(
				'section'   => 'fit_common_main_section',
				'settings'  => 'fit_conMain_frame',
				'label'     => 'メインカラムフレーム設定',
				'description' => '■メインカラムのフレームを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '無し(default)',
					'u-shadow' => 'シャドウフレーム',
					'u-border' => 'ボーダーフレーム',
				),
			));

			// 各ウィジェットフレーム セッティング
			$wp_customize->add_setting( 'fit_conMain_widgetFrame', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 各ウィジェットフレーム コントロール
			$wp_customize->add_control( 'fit_conMain_widgetFrame', array(
				'section'   => 'fit_common_main_section',
				'settings'  => 'fit_conMain_widgetFrame',
				'label'     => 'ウィジェット設定',
				'description' => '■各ウィジェットのフレームを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '無し(default)',
					'u-shadow' => 'シャドウフレーム',
					'u-border' => 'ボーダーフレーム',
				),
			));

			// ウィジェット見出しデザイン セッティング
			$wp_customize->add_setting( 'fit_conMain_heading', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// ウィジェット見出しデザイン コントロール
			$wp_customize->add_control( 'fit_conMain_heading', array(
				'section'   => 'fit_common_main_section',
				'settings'  => 'fit_conMain_heading',
				'description' => '■ウィジェットの見出しデザインを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '角丸(default)',
					'simple' => 'シンプル',
					'bottom' => 'ボトムボーダー',
					'border' => 'はみ出すボーダー',
					'simplewide' => 'シンプル(ワイド)',
					'wide' => '内側ボーダー(ワイド)',
				),
			));
			// ウィジェット見出しデザイン設定 セッティング
			$wp_customize->add_setting( 'fit_conMain_color', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// ウィジェット見出しデザイン設定 コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_conMain_color', array(
				'section' => 'fit_common_main_section',
				'settings' =>'fit_conMain_color',
				'description' => '■ウィジェット見出しの色を指定',
			)));



		//セクションの追加
		$wp_customize->add_section( 'fit_common_side_section', array(
			'title'       => 'サイドカラムエリア設定',
			'panel'       => 'fit_common_panel',
			'description' => 'サイドカラムエリアの設定画面です。',
			'priority'  => 1,
		));

			// サイドカラムフレーム セッティング
			$wp_customize->add_setting( 'fit_conSide_frame', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// サイドカラムフレーム コントロール
			$wp_customize->add_control( 'fit_conSide_frame', array(
				'section'   => 'fit_common_side_section',
				'settings'  => 'fit_conSide_frame',
				'label'     => 'サイドカラムフレーム設定',
				'description' => '■サイドカラムのフレームを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '無し(default)',
					'u-shadowfix' => 'シャドウフレーム',
					'u-borderfix' => 'ボーダーフレーム',
				),
			));

			// 各ウィジェットフレーム セッティング
			$wp_customize->add_setting( 'fit_conWidget_frame', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 各ウィジェットフレーム コントロール
			$wp_customize->add_control( 'fit_conWidget_frame', array(
				'section'   => 'fit_common_side_section',
				'settings'  => 'fit_conWidget_frame',
				'label'     => '各ウィジェットフレーム設定',
				'description' => '■各ウィジェットのフレームを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '無し(default)',
					'u-shadowfix' => 'シャドウフレーム',
					'u-borderfix' => 'ボーダーフレーム',
				),
			));

			// ウィジェット見出しデザイン セッティング
			$wp_customize->add_setting( 'fit_conWidget_heading', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// ウィジェット見出しデザイン コントロール
			$wp_customize->add_control( 'fit_conWidget_heading', array(
				'section'   => 'fit_common_side_section',
				'settings'  => 'fit_conWidget_heading',
				'label'     => 'ウィジェット見出しデザイン設定',
				'description' => '■ウィジェットの見出しデザインを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '角丸(default)',
					'simple' => 'シンプル',
					'bottom' => 'ボトムボーダー',
					'border' => 'はみ出すボーダー',
					'simplewide' => 'シンプル(ワイド)',
					'wide' => '内側ボーダー(ワイド)',
				),
			));

			// ウィジェット見出しカラー セッティング
			$wp_customize->add_setting( 'fit_conWidget_color', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// ウィジェット見出しカラー コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_conWidget_color', array(
				'section' => 'fit_common_side_section',
				'settings' =>'fit_conWidget_color',
				'description' => '■ウィジェット見出しの色を指定',
			)));


		//セクションの追加
		$wp_customize->add_section( 'fit_common_footCta_section', array(
			'title'       => 'フッタートップエリア設定[CTA]',
			'panel'       => 'fit_common_panel',
			'description' => 'フッタートップエリア設定画面です。',
			'priority'  => 1,
		));

			// フッターCTAスイッチ セッティング
			$wp_customize->add_setting( 'fit_conFootCta_switch', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// フッターCTAスイッチ コントロール
			$wp_customize->add_control( 'fit_conFootCta_switch', array(
				'section'   => 'fit_common_footCta_section',
				'settings'  => 'fit_conFootCta_switch',
				'label'     => 'フッターCTAの表示設定',
				'description' => '■フッターCTAを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '非表示(default)',
					'on'  => '表示',
				),
			));

			// フッターCTA見出し設定　セッティング
			$wp_customize->add_setting( 'fit_conFootCta_title', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// フッターCTA見出し設定　コントロール
			$wp_customize->add_control( 'fit_conFootCta_title', array(
				'section'   => 'fit_common_footCta_section',
				'settings'  => 'fit_conFootCta_title',
				'description' => '■見出しを入力',
				'type'      => 'text',
			));

			// フッターCTA本文 セッティング
			$wp_customize->add_setting( 'fit_conFootCta_contents', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// フッターCTA本文 コントロール
			$wp_customize->add_control( 'fit_conFootCta_contents', array(
				'section'   => 'fit_common_footCta_section',
				'settings'  => 'fit_conFootCta_contents',
				'description' => '■本文を入力<br>
				<span class="label__red">タグ利用可</span>',
				'type'      => 'textarea',
			));

			//フッターCTAアイキャッチ画像 セッティング
			$wp_customize->add_setting('fit_conFootCta_eyecatch', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'fit_sanitize_image',
			));
			//フッターCTAアイキャッチ画像 コントロール
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'fit_conFootCta_eyecatch', array(
				'section' => 'fit_common_footCta_section',
				'settings' => 'fit_conFootCta_eyecatch',
				'description' => '■アイキャッチ画像を登録',
			)));
			//フッターCTA背景画像 セッティング
			$wp_customize->add_setting('fit_conFootCta_bgImg', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'fit_sanitize_image',
			));
			//フッターCTA背景画像 コントロール
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'fit_conFootCta_bgImg', array(
				'section' => 'fit_common_footCta_section',
				'settings' => 'fit_conFootCta_bgImg',
				'description' => '■背景画像を登録',
			)));

			// フッターCTA背景画像マスク セッティング
			$wp_customize->add_setting( 'fit_conFootCta_mask', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// フッターCTA背景画像マスク コントロール
			$wp_customize->add_control( 'fit_conFootCta_mask', array(
				'section'   => 'fit_common_footCta_section',
				'settings'  => 'fit_conFootCta_mask',
				'description' => '■画像のマスクを選択',
				'type'      => 'select',
				'choices'   => array(

					'off' => '無し(default)',
					'black' => 'ブラック',
					'blackmesh' => 'ブラックメッシュ',
					'color' => 'カラー',
					'colorgray' => 'カラー + 画像グレー',
				),
			));
			// フッターCTA背景画像マスクカラー セッティング
			$wp_customize->add_setting( 'fit_conFootCta_color', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// フッターCTA背景画像マスクカラー コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_conFootCta_color', array(
				'section' => 'fit_common_footCta_section',
				'settings' =>'fit_conFootCta_color',
				'description' => '■カラー系マスク利用時の色を指定',
			)));

			// フッターCTAボタンテキスト セッティング
			$wp_customize->add_setting( 'fit_conFootCta_btn', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// フッターCTAボタンテキスト コントロール
			$wp_customize->add_control( 'fit_conFootCta_btn', array(
				'section'   => 'fit_common_footCta_section',
				'settings'  => 'fit_conFootCta_btn',
				'description' => '■ボタンテキストを入力',
				'type'      => 'text',
			));

			// フッターCTAボタンリンクURL セッティング
			$wp_customize->add_setting( 'fit_conFootCta_url', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// フッターCTAボタンリンクURL コントロール
			$wp_customize->add_control( 'fit_conFootCta_url', array(
				'section'   => 'fit_common_footCta_section',
				'settings'  => 'fit_conFootCta_url',
				'description' => '■ボタンリンク先URLを入力',
				'type'      => 'text',
			));


		//セクションの追加
		$wp_customize->add_section( 'fit_common_footer_section', array(
			'title'       => 'フッターエリア設定',
			'panel'       => 'fit_common_panel',
			'description' => 'フッターエリアの設定画面です。',
			'priority'  => 1,
		));

			// SNSフォロー背景色 セッティング
			$wp_customize->add_setting( 'fit_conFooter_snsBg', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// SNSフォロー背景色 コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_conFooter_snsBg', array(
				'section' => 'fit_common_footer_section',
				'settings' =>'fit_conFooter_snsBg',
				'label'     => 'SNSフォロー背景色の設定',
				'description' => '■SNSフォローエリアの背景色を指定',
			)));



			// ウィジェット見出しデザイン セッティング
			$wp_customize->add_setting( 'fit_conFooter_heading', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// ウィジェット見出しデザイン コントロール
			$wp_customize->add_control( 'fit_conFooter_heading', array(
				'section'   => 'fit_common_footer_section',
				'settings'  => 'fit_conFooter_heading',
				'label'     => 'ウィジェット見出しデザイン設定',
				'description' => '■ウィジェットの見出しデザインを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '角丸(default)',
					'simple' => 'シンプル',
					'bottom' => 'ボトムボーダー',
					'border' => 'はみ出すボーダー',
					'simplewide' => 'シンプル(ワイド)',
					'wide' => '内側ボーダー(ワイド)',
				),
			));
			// ウィジェット見出しデザイン設定 セッティング
			$wp_customize->add_setting( 'fit_conFooter_color', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// ウィジェット見出しデザイン設定 コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_conFooter_color', array(
				'section' => 'fit_common_footer_section',
				'settings' =>'fit_conFooter_color',
				'description' => '■ウィジェット見出しの色を指定',
			)));

			// コピーライト セッティング
			$wp_customize->add_setting( 'fit_conFooter_copyright', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// コピーライト コントロール
			$wp_customize->add_control( 'fit_conFooter_copyright', array(
				'section'   => 'fit_common_footer_section',
				'settings'  => 'fit_conFooter_copyright',
				'label'     => 'コピーライトの設定',
				'description' => '■フッターエリアのコピーライトを入力<br>
				(未入力の場合は<span class="box__gray">© Copyright '.date_i18n('Y').' '.get_bloginfo('name').'.</span>が表示されます)<br>
				<br>
				<span class="label__red">タグ利用可</span>',
				'type'      => 'textarea',
			));

			// コピーライトの下 セッティング
			$wp_customize->add_setting( 'fit_conFooter_link', array(
				'default'   => 'on',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// コピーライトの下 コントロール
			$wp_customize->add_control( 'fit_conFooter_link', array(
				'section'   => 'fit_common_footer_section',
				'settings'  => 'fit_conFooter_link',
				'description' => '■コピーライト下のリンク(THE THEME及びWordPressなどのリンク)を表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'on'  => '表示(default)',
					'off' => '非表示',
				),
			));


		//セクションの追加
		$wp_customize->add_section( 'fit_common_footerSp_section', array(
			'title'       => '固定フッターエリア設定[スマホ専用]',
			'panel'       => 'fit_common_panel',
			'description' => '固定フッターエリアの設定画面です。',
			'priority'  => 1,
		));

			// スマホ用固定フッター表示 セッティング
			$wp_customize->add_setting( 'fit_conFooterSp_menu', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// スマホ用固定フッター表示 コントロール
			$wp_customize->add_control( 'fit_conFooterSp_menu', array(
				'section'   => 'fit_common_footerSp_section',
				'settings'  => 'fit_conFooterSp_menu',
				'label'     => 'スマホ用固定フッターの設定',
				'description' => '■スマホ用固定フッター表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '非表示(default)',
					'on'  => '表示',
				),
			));
			// スマホ用固定フッターの区切り装飾 セッティング
			$wp_customize->add_setting( 'fit_conFooterSp_divide', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// スマホ用固定フッターの区切り装飾 コントロール
			$wp_customize->add_control( 'fit_conFooterSp_divide', array(
				'section'   => 'fit_common_footerSp_section',
				'settings'  => 'fit_conFooterSp_divide',
				'description' => '■スマホ用固定フッターの区切り装飾を指定',
				'type'      => 'select',
				'choices'   => array(
					'off' => '無し(default)',
					'shadow' => 'シャドウ',
					'border' => 'ボーダー',
				),
			));

			// スマホ用固定フッター項目1の種類 セッティング
			$wp_customize->add_setting( 'fit_conFooterSp_menu_01', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// スマホ用固定フッター項目1の種類 コントロール
			$wp_customize->add_control( 'fit_conFooterSp_menu_01', array(
				'section'   => 'fit_common_footerSp_section',
				'settings'  => 'fit_conFooterSp_menu_01',
				'label'     => '項目1の設定',
				'description' => '■表示する項目を選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => 'ホームボタン',
					'free' => '自由設定リンクボタン',
				),
			));

			// スマホ用固定フッター項目1のテキスト セッティング
			$wp_customize->add_setting( 'fit_conFooterSp_menu_text01', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// スマホ用固定フッター項目1のテキスト コントロール
			$wp_customize->add_control( 'fit_conFooterSp_menu_text01', array(
				'section'   => 'fit_common_footerSp_section',
				'settings'  => 'fit_conFooterSp_menu_text01',
				'description' => '<div class="customize-control-subtitle">自由設定リンクボタン</div>
				■タイトルを入力',
				'type'      => 'text',
			));
			// スマホ用固定フッター項目1のリンク先URL セッティング
			$wp_customize->add_setting( 'fit_conFooterSp_menu_url01', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// スマホ用固定フッター項目1のリンク先URL コントロール
			$wp_customize->add_control( 'fit_conFooterSp_menu_url01', array(
				'section'   => 'fit_common_footerSp_section',
				'settings'  => 'fit_conFooterSp_menu_url01',
				'description' => '■リンク先URLを入力',
				'type'      => 'text',
			));
			// スマホ用固定フッター項目1のアイコン セッティング
			$wp_customize->add_setting( 'fit_conFooterSp_menu_icon01', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// スマホ用固定フッター項目1のアイコン コントロール
			$wp_customize->add_control( 'fit_conFooterSp_menu_icon01', array(
				'section'   => 'fit_common_footerSp_section',
				'settings'  => 'fit_conFooterSp_menu_icon01',
				'description' => '■アイコンを入力　[<a href="'.get_template_directory_uri().'/admin/template/icon_list.php" target="_blank">アイコン一覧</a>]',
				'type'      => 'text',
			));


			// スマホ用固定フッター項目2の種類 セッティング
			$wp_customize->add_setting( 'fit_conFooterSp_menu_02', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// スマホ用固定フッター項目2の種類 コントロール
			$wp_customize->add_control( 'fit_conFooterSp_menu_02', array(
				'section'   => 'fit_common_footerSp_section',
				'settings'  => 'fit_conFooterSp_menu_02',
				'label'     => '項目2の設定',
				'description' => '■表示する項目を選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => 'シェアボタン',
					'free' => '自由設定リンクボタン',
				),
			));


			//Facebookセッティング
			$wp_customize->add_setting('fit_conFooterSp_menu_share[facebook]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			//Facebookコントロール
			$wp_customize->add_control('fit_conFooterSp_menu_share_facebook', array(
   		     'section' => 'fit_common_footerSp_section',
   		     'settings' => 'fit_conFooterSp_menu_share[facebook]',
    		    'label'     => 'Facebookボタンを表示する',
    		    'type'      => 'checkbox',
    		));

			//Twitterセッティング
			$wp_customize->add_setting('fit_conFooterSp_menu_share[twitter]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			//Twitterコントロール
			$wp_customize->add_control('fit_conFooterSp_menu_share_twitter', array(
   		     'section' => 'fit_common_footerSp_section',
   		     'settings' => 'fit_conFooterSp_menu_share[twitter]',
  		      'label'     => 'Twitterボタンを表示する',
  		      'type'      => 'checkbox',
			));

			//Google+セッティング
			$wp_customize->add_setting('fit_conFooterSp_menu_share[google]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			//Google+コントロール
			$wp_customize->add_control('fit_conFooterSp_menu_share_google', array(
   		     'section' => 'fit_common_footerSp_section',
    		    'settings' => 'fit_conFooterSp_menu_share[google]',
    		    'label'     => 'Google+ボタンを表示する',
    		    'type'      => 'checkbox',
			));

			//はてぶセッティング
			$wp_customize->add_setting('fit_conFooterSp_menu_share[hatebu]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			//はてぶコントロール
			$wp_customize->add_control('fit_conFooterSp_menu_share_hatebu', array(
   		     'section' => 'fit_common_footerSp_section',
   		     'settings' => 'fit_conFooterSp_menu_share[hatebu]',
   		     'label'     => 'はてぶボタンを表示する',
   		     'type'      => 'checkbox',
			));

			//Pocketセッティング
			$wp_customize->add_setting('fit_conFooterSp_menu_share[pocket]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			//Pocketコントロール
			$wp_customize->add_control('fit_conFooterSp_menu_share_pocket', array(
   		     'section' => 'fit_common_footerSp_section',
   		     'settings' => 'fit_conFooterSp_menu_share[pocket]',
   		     'label'     => 'Pocketボタンを表示する',
   		     'type'      => 'checkbox',
			));

			//LINEセッティング
			$wp_customize->add_setting('fit_conFooterSp_menu_share[line]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
    		));
			//LINEコントロール
			$wp_customize->add_control('fit_conFooterSp_menu_share_line', array(
       		 'section' => 'fit_common_footerSp_section',
      		  'settings' => 'fit_conFooterSp_menu_share[line]',
      		  'label'     => 'LINEボタンを表示する',
      		  'type'      => 'checkbox',
			));

			//LinkedInセッティング
			$wp_customize->add_setting('fit_conFooterSp_menu_share[linkedin]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
    		));
			//LinkedInコントロール
			$wp_customize->add_control('fit_conFooterSp_menu_share_linkedin', array(
       		 'section' => 'fit_common_footerSp_section',
      		  'settings' => 'fit_conFooterSp_menu_share[linkedin]',
      		  'label'     => 'LinkedInボタンを表示する',
      		  'type'      => 'checkbox',
			));

			//Pinterestセッティング
			$wp_customize->add_setting('fit_conFooterSp_menu_share[pinterest]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
    		));
			//Pinterestコントロール
			$wp_customize->add_control('fit_conFooterSp_menu_share_pinterest', array(
       		 'section' => 'fit_common_footerSp_section',
      		  'settings' => 'fit_conFooterSp_menu_share[pinterest]',
      		  'label'     => 'Pinterestボタンを表示する',
      		  'type'      => 'checkbox',
			));




			// スマホ用固定フッター項目2のテキスト セッティング
			$wp_customize->add_setting( 'fit_conFooterSp_menu_text02', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// スマホ用固定フッター項目2のテキスト コントロール
			$wp_customize->add_control( 'fit_conFooterSp_menu_text02', array(
				'section'   => 'fit_common_footerSp_section',
				'settings'  => 'fit_conFooterSp_menu_text02',
				'description' => '<div class="customize-control-subtitle">自由設定リンクボタン</div>
				■タイトルを入力',
				'type'      => 'text',
			));
			// スマホ用固定フッター項目2のリンク先URL セッティング
			$wp_customize->add_setting( 'fit_conFooterSp_menu_url02', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// スマホ用固定フッター項目2のリンク先URL コントロール
			$wp_customize->add_control( 'fit_conFooterSp_menu_url02', array(
				'section'   => 'fit_common_footerSp_section',
				'settings'  => 'fit_conFooterSp_menu_url02',
				'description' => '■リンク先URLを入力',
				'type'      => 'text',
			));
			// スマホ用固定フッター項目2のアイコン セッティング
			$wp_customize->add_setting( 'fit_conFooterSp_menu_icon02', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// スマホ用固定フッター項目2のアイコン コントロール
			$wp_customize->add_control( 'fit_conFooterSp_menu_icon02', array(
				'section'   => 'fit_common_footerSp_section',
				'settings'  => 'fit_conFooterSp_menu_icon02',
				'description' => '■アイコンを入力　[<a href="'.get_template_directory_uri().'/admin/template/icon_list.php" target="_blank">アイコン一覧</a>]',
				'type'      => 'text',
			));


			// スマホ用固定フッター項目3の種類 セッティング
			$wp_customize->add_setting( 'fit_conFooterSp_menu_03', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// スマホ用固定フッター項目3の種類 コントロール
			$wp_customize->add_control( 'fit_conFooterSp_menu_03', array(
				'section'   => 'fit_common_footerSp_section',
				'settings'  => 'fit_conFooterSp_menu_03',
				'label'     => '項目3の設定',
				'description' => '■表示する項目を選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => 'メニューボタン',
					'free' => '自由設定リンクボタン',
				),
			));

			// スマホ用固定フッター項目3のテキスト セッティング
			$wp_customize->add_setting( 'fit_conFooterSp_menu_text03', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// スマホ用固定フッター項目3のテキスト コントロール
			$wp_customize->add_control( 'fit_conFooterSp_menu_text03', array(
				'section'   => 'fit_common_footerSp_section',
				'settings'  => 'fit_conFooterSp_menu_text03',
				'description' => '<div class="customize-control-subtitle">自由設定リンクボタン</div>
				■タイトルを入力',
				'type'      => 'text',
			));
			// スマホ用固定フッター項目3のリンク先URL セッティング
			$wp_customize->add_setting( 'fit_conFooterSp_menu_url03', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// スマホ用固定フッター項目3のリンク先URL コントロール
			$wp_customize->add_control( 'fit_conFooterSp_menu_url03', array(
				'section'   => 'fit_common_footerSp_section',
				'settings'  => 'fit_conFooterSp_menu_url03',
				'description' => '■リンク先URLを入力',
				'type'      => 'text',
			));
			// スマホ用固定フッター項目3のアイコン セッティング
			$wp_customize->add_setting( 'fit_conFooterSp_menu_icon03', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// スマホ用固定フッター項目3のアイコン コントロール
			$wp_customize->add_control( 'fit_conFooterSp_menu_icon03', array(
				'section'   => 'fit_common_footerSp_section',
				'settings'  => 'fit_conFooterSp_menu_icon03',
				'description' => '■アイコンを入力　[<a href="'.get_template_directory_uri().'/admin/template/icon_list.php" target="_blank">アイコン一覧</a>]',
				'type'      => 'text',
			));


			// スマホ用固定フッター項目4の種類 セッティング
			$wp_customize->add_setting( 'fit_conFooterSp_menu_04', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// スマホ用固定フッター項目4の種類 コントロール
			$wp_customize->add_control( 'fit_conFooterSp_menu_04', array(
				'section'   => 'fit_common_footerSp_section',
				'settings'  => 'fit_conFooterSp_menu_04',
				'label'     => '項目4の設定',
				'description' => '■表示する項目を選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '電話ボタン',
					'free' => '自由設定リンクボタン',
				),
			));
			// スマホ用固定フッター項目4の電話番号 セッティング
			$wp_customize->add_setting( 'fit_conFooterSp_menu_tel', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// スマホ用固定フッター項目4の電話番号 コントロール
			$wp_customize->add_control( 'fit_conFooterSp_menu_tel', array(
				'section'   => 'fit_common_footerSp_section',
				'settings'  => 'fit_conFooterSp_menu_tel',
				'description' => '■電話番号を入力<br>(例：03-0000-0000)',
				'type'      => 'text',
			));

			// スマホ用固定フッター項目4のテキスト セッティング
			$wp_customize->add_setting( 'fit_conFooterSp_menu_text04', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// スマホ用固定フッター項目4のテキスト コントロール
			$wp_customize->add_control( 'fit_conFooterSp_menu_text04', array(
				'section'   => 'fit_common_footerSp_section',
				'settings'  => 'fit_conFooterSp_menu_text04',
				'description' => '<div class="customize-control-subtitle">自由設定リンクボタン</div>
				■タイトルを入力',
				'type'      => 'text',
			));
			// スマホ用固定フッター項目4のリンク先URL セッティング
			$wp_customize->add_setting( 'fit_conFooterSp_menu_url04', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// スマホ用固定フッター項目4のリンク先URL コントロール
			$wp_customize->add_control( 'fit_conFooterSp_menu_url04', array(
				'section'   => 'fit_common_footerSp_section',
				'settings'  => 'fit_conFooterSp_menu_url04',
				'description' => '■リンク先URLを入力',
				'type'      => 'text',
			));
			// スマホ用固定フッター項目4のアイコン セッティング
			$wp_customize->add_setting( 'fit_conFooterSp_menu_icon04', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// スマホ用固定フッター項目4のアイコン コントロール
			$wp_customize->add_control( 'fit_conFooterSp_menu_icon04', array(
				'section'   => 'fit_common_footerSp_section',
				'settings'  => 'fit_conFooterSp_menu_icon04',
				'description' => '■アイコンを入力　[<a href="'.get_template_directory_uri().'/admin/template/icon_list.php" target="_blank">アイコン一覧</a>]',
				'type'      => 'text',
			));


}
add_action( 'customize_register', 'fit_common_cutomizer' );
function get_fit_FootCta_eyecatch(){ return esc_url(get_theme_mod('fit_conFootCta_eyecatch'));}
function get_fit_FootCta_bgImg(){ return esc_url(get_theme_mod('fit_conFootCta_bgImg'));}
