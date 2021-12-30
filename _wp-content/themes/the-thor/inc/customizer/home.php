<?php
////////////////////////////////////////////////////////
//TOPページ設定画面
////////////////////////////////////////////////////////
function fit_home_cutomizer( $wp_customize ) {

	//パネルの追加
	$wp_customize->add_panel( 'fit_home_panel', array(
		'title'       => 'TOPページ設定[THE]',
		'priority'  => 1,
	));


		//セクションの追加
		$wp_customize->add_section( 'fit_home_mainimg_section', array(
			'title'       => 'メインビジュアル設定',
			'panel'       => 'fit_home_panel',
			'description' => 'メインビジュアルの設定画面です。',
			'priority'  => 1,
		));

			// メインビジュアル表示設定 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_switch', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// メインビジュアル表示設定 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_switch', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_switch',
				'label'     => 'メインビジュアル設定',
				'description' => '■メインビジュアルを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '非表示(default)',
					'on'  => '表示',
				),
			));

			//スマホ非表示設定 セッティング
			$wp_customize->add_setting('fit_homeMainimg_switchSp', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
    		));
			//スマホ非表示設定 コントロール
			$wp_customize->add_control('fit_homeMainimg_switchSp', array(
       		 'section' => 'fit_home_mainimg_section',
      		  'settings' => 'fit_homeMainimg_switchSp',
      		  'label'     => 'スマホは非表示にする',
      		  'type'      => 'checkbox',
			));

			// メインビジュアル表示サイズ[横] セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_width', array(
				'default'   => 'value1',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// メインビジュアル表示サイズ[横] コントロール
			$wp_customize->add_control( 'fit_homeMainimg_width', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_width',
				'description' => '■表示サイズ[横]を選択',
				'type'      => 'select',
				'choices'   => array(
					'value1' => 'ワイドサイズ(default)',
					'value2' => 'ノーマルサイズ',
					'value3' => 'ビッグサイズ',
				),
			));

			// メインビジュアル表示サイズ[スマホ：縦] セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_heightSp', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_number_range',
			));
			// メインビジュアル表示サイズ[スマホ：縦] コントロール
			$wp_customize->add_control( 'fit_homeMainimg_heightSp', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_heightSp',
				'description' => '■スマホ表示時の表示サイズ[縦]を指定',
				'type'      => 'number',
				'input_attrs' => array(
					'step'     => '1',
					'min'      => '1',
					'max'      => '1000',
				),
			));

			// メインビジュアル表示サイズ[PC：縦] セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_heightPc', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_number_range',
			));
			// メインビジュアル表示サイズ[PC：縦] コントロール
			$wp_customize->add_control( 'fit_homeMainimg_heightPc', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_heightPc',
				'description' => '■PC表示時の表示サイズ[縦]を指定',
				'type'      => 'number',
				'input_attrs' => array(
					'step'     => '1',
					'min'      => '1',
					'max'      => '1000',
				),
			));


			// 表示モード設定 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_mode', array(
				'default'   => 'still',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 表示モード設定 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_mode', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_mode',
				'label'     => 'メインビジュアルの表示モード設定',
				'description' => '■メインビジュアルの表示モードを選択',
				'type'      => 'radio',
				'choices'   => array(
					'still' => '静止画(default)',
					'movie' => 'YouTube背景動画',
					'slider' => 'スライドショー',
				),
			));

			//静止画設定　画像 セッティング
			$wp_customize->add_setting('fit_homeMainimg_stillImg', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'fit_sanitize_image',
			));

			//静止画設定　画像 コントロール
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'fit_homeMainimg_stillImg', array(
				'section' => 'fit_home_mainimg_section',
				'settings' => 'fit_homeMainimg_stillImg',
				'label' => '静止画時の設定',
				'description' => '■画像を登録',
			)));

			// 静止画設定　マスク セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_stillMask', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 静止画設定　マスク コントロール
			$wp_customize->add_control( 'fit_homeMainimg_stillMask', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_stillMask',
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
			// 静止画設定　カラーマスク セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_stillColor', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// 静止画設定　カラーマスク コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_homeMainimg_stillColor', array(
				'section' => 'fit_home_mainimg_section',
				'settings' =>'fit_homeMainimg_stillColor',
				'description' => '■カラー系マスク利用時の色を指定',
			)));


			// 静止画設定　タイトル セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_still[title]', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// 静止画設定　タイトル コントロール
			$wp_customize->add_control( 'fit_homeMainimg_stillTitle', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_still[title]',
				'description' => '■タイトルを入力<br>
				<span class="label__red">タグ利用可</span>',
				'type'      => 'text',
			));
			// 静止画設定　サブタイトル セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_still[subtitle]', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// 静止画設定　サブタイトル コントロール
			$wp_customize->add_control( 'fit_homeMainimg_stillSubtitle', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_still[subtitle]',
				'description' => '■サブタイトルを入力<br>
				<span class="label__red">タグ利用可</span>',
				'type'      => 'textarea',
			));
			// 静止画設定　ボタンリンク セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_still[btn]', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// 静止画設定　ボタンリンク コントロール
			$wp_customize->add_control( 'fit_homeMainimg_stillBtn', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_still[btn]',
				'description' => '■ボタンのテキストを入力',
				'type'      => 'text',
			));
			// 静止画設定　ボタンリンクURL セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_still[url]', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// 静止画設定　ボタンリンクURL コントロール
			$wp_customize->add_control( 'fit_homeMainimg_stillUrl', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_still[url]',
				'description' => '■ボタンのリンク先URLを入力',
				'type'      => 'text',
			));



			//動画設定　画像 セッティング
			$wp_customize->add_setting('fit_homeMainimg_movieImg', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'fit_sanitize_image',
			));

			//動画設定　画像 コントロール
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'fit_homeMainimg_movieImg', array(
				'section' => 'fit_home_mainimg_section',
				'settings' => 'fit_homeMainimg_movieImg',
				'label' => 'YouTube背景動画時の設定',
				'description' => '■動画再生前に表示する画像を登録<br>(スマホ時にも表示)',
			)));

			// 動画設定　YouTube動画ID セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_movieYouTube', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// 動画設定　YouTube動画ID コントロール
			$wp_customize->add_control( 'fit_homeMainimg_movieYouTube', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_movieYouTube',
				'description' => '■YouTube動画IDを入力<br>
				(YouTubeページのURLが「https://www.youtube.com/watch?v=***********」の場合「***********」を入力)',
				'type'      => 'text',
			));

			// 動画設定　マスク セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_movieMask', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 動画設定　マスク コントロール
			$wp_customize->add_control( 'fit_homeMainimg_movieMask', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_movieMask',
				'description' => '■動画のマスクを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '無し(default)',
					'black' => 'ブラック',
					'blackmesh' => 'ブラックメッシュ',
					'color' => 'カラー(IE・Edge未対応)',
					'colorgray' => 'カラー + 画像グレー(IE・Edge未対応)',
				),
			));
			// 動画設定　カラーマスク セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_movieColor', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// 動画設定　カラーマスク コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_homeMainimg_movieColor', array(
				'section' => 'fit_home_mainimg_section',
				'settings' =>'fit_homeMainimg_movieColor',
				'description' => '■カラー系マスク利用時の色を指定',
			)));

			// 動画設定　タイトル セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_movie[title]', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// 動画設定　タイトル コントロール
			$wp_customize->add_control( 'fit_homeMainimg_movieTitle', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_movie[title]',
				'description' => '■タイトルを入力<br>
				<span class="label__red">タグ利用可</span>',
				'type'      => 'text',
			));
			// 動画設定　サブタイトル セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_movie[subtitle]', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// 動画設定　サブタイトル コントロール
			$wp_customize->add_control( 'fit_homeMainimg_movieSubtitle', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_movie[subtitle]',
				'description' => '■サブタイトルを入力<br>
				<span class="label__red">タグ利用可</span>',
				'type'      => 'textarea',
			));
			// 動画設定　ボタンリンク セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_movie[btn]', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// 動画設定　ボタンリンク コントロール
			$wp_customize->add_control( 'fit_homeMainimg_movieBtn', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_movie[btn]',
				'description' => '■ボタンのテキストを入力',
				'type'      => 'text',
			));
			// 動画設定　ボタンリンクURL セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_movie[url]', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// 動画設定　ボタンリンクURL コントロール
			$wp_customize->add_control( 'fit_homeMainimg_movieUrl', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_movie[url]',
				'description' => '■ボタンのリンク先URLを入力',
				'type'      => 'text',
			));




			// スライドショー設定　自動再生 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slideLoop', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// スライドショー設定　自動再生 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slideLoop', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slideLoop',
				'label' => 'スライドショー時の設定',
				'description' => '■自動再生機能の選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '自動再生OFF(default)',
					'on' => '自動再生ON',
				),
			));


			// スライドショー設定　自動再生速度 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slideDelay', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_number_range',
			));
			// スライドショー設定　自動再生速度 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slideDelay', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slideDelay',
				'description' => '■自動再生ON時の再生速度をミリ秒で入力<br>(入力例：3秒 = 3000)',
				'type'      => 'number',
				'input_attrs' => array(
					'step'     => '1000',
					'min'      => '1000',
					'max'      => '10000',
				),
			));

			// スライドショー設定　エフェクト セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slideEffect', array(
				'default'   => 'slide',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// スライドショー設定　エフェクト コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slideEffect', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slideEffect',
				'description' => '■スライドエフェクトの選択',
				'type'      => 'select',
				'choices'   => array(
					'slide' => '横スライド(default)',
					'flip' => '平面回転',
					'cube' => 'キューブ回転',
					'coverflow' => 'カバーフロー',
				),
			));


			//スライドショー設定　画像1 セッティング
			$wp_customize->add_setting('fit_homeMainimg_slide1Img', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'fit_sanitize_image',
			));

			//スライドショー設定　画像1 コントロール
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'fit_homeMainimg_slide1Img', array(
				'section' => 'fit_home_mainimg_section',
				'settings' => 'fit_homeMainimg_slide1Img',
				'description' => '<div class="customize-control-subtitle">スライドショー1の設定</div>
				■画像を登録',
			)));
			// スライドショー設定　マスク1 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide1Mask', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// スライドショー設定　マスク1 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slide1Mask', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slide1Mask',
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
			// スライドショー設定　カラーマスク1 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide1Color', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// スライドショー設定　カラーマスク1 コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_homeMainimg_slide1Color', array(
				'section' => 'fit_home_mainimg_section',
				'settings' =>'fit_homeMainimg_slide1Color',
				'description' => '■カラー系マスク利用時の色を指定',
			)));


			// スライドショー設定　タイトル1 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide1[title]', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// スライドショー設定　タイトル1 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slide1[title]', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slide1[title]',
				'description' => '■タイトルを入力<br>
				<span class="label__red">タグ利用可</span>',
				'type'      => 'text',
			));
			// スライドショー設定　サブタイトル1 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide1[subtitle]', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// スライドショー設定　サブタイトル1 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slide1[subtitle]', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slide1[subtitle]',
				'description' => '■サブタイトルを入力<br>
				<span class="label__red">タグ利用可</span>',
				'type'      => 'textarea',
			));
			// スライドショー設定　ボタンリンク1 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide1[btn]', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// スライドショー設定　ボタンリンク1 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slide1[btn]', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slide1[btn]',
				'description' => '■ボタンのテキストを入力',
				'type'      => 'text',
			));
			// スライドショー設定　ボタンリンクURL1 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide1[url]', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// スライドショー設定　ボタンリンクURL1 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slide1[url]', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slide1[url]',
				'description' => '■ボタンのリンク先URLを入力',
				'type'      => 'text',
			));


			//スライドショー設定　画像2 セッティング
			$wp_customize->add_setting('fit_homeMainimg_slide2Img', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'fit_sanitize_image',
			));

			//スライドショー設定　画像2 コントロール
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'fit_homeMainimg_slide2Img', array(
				'section' => 'fit_home_mainimg_section',
				'settings' => 'fit_homeMainimg_slide2Img',
				'description' => '<div class="customize-control-subtitle">スライドショー2の設定</div>
				■画像を登録',
			)));
			// スライドショー設定　マスク2 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide2Mask', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// スライドショー設定　マスク2 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slide2Mask', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slide2Mask',
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
			// スライドショー設定　カラーマスク2 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide2Color', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// スライドショー設定　カラーマスク2 コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_homeMainimg_slide2Color', array(
				'section' => 'fit_home_mainimg_section',
				'settings' =>'fit_homeMainimg_slide2Color',
				'description' => '■カラー系マスク利用時の色を指定',
			)));


			// スライドショー設定　タイトル2 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide2[title]', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// スライドショー設定　タイトル2 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slide2[title]', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slide2[title]',
				'description' => '■タイトルを入力<br>
				<span class="label__red">タグ利用可</span>',
				'type'      => 'text',
			));
			// スライドショー設定　サブタイトル2 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide2[subtitle]', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// スライドショー設定　サブタイトル2 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slide2[subtitle]', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slide2[subtitle]',
				'description' => '■サブタイトルを入力<br>
				<span class="label__red">タグ利用可</span>',
				'type'      => 'textarea',
			));
			// スライドショー設定　ボタンリンク2 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide2[btn]', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// スライドショー設定　ボタンリンク2 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slide2[btn]', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slide2[btn]',
				'description' => '■ボタンのテキストを入力',
				'type'      => 'text',
			));
			// スライドショー設定　ボタンリンクURL2 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide2[url]', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// スライドショー設定　ボタンリンクURL2 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slide2[url]', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slide2[url]',
				'description' => '■ボタンのリンク先URLを入力',
				'type'      => 'text',
			));


			//スライドショー設定　画像3 セッティング
			$wp_customize->add_setting('fit_homeMainimg_slide3Img', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'fit_sanitize_image',
			));

			//スライドショー設定　画像3 コントロール
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'fit_homeMainimg_slide3Img', array(
				'section' => 'fit_home_mainimg_section',
				'settings' => 'fit_homeMainimg_slide3Img',
				'description' => '<div class="customize-control-subtitle">スライドショー3の設定</div>
				■画像を登録',
			)));
			// スライドショー設定　マスク3 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide3Mask', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// スライドショー設定　マスク3 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slide3Mask', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slide3Mask',
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
			// スライドショー設定　カラーマスク3 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide3Color', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// スライドショー設定　カラーマスク3 コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_homeMainimg_slide3Color', array(
				'section' => 'fit_home_mainimg_section',
				'settings' =>'fit_homeMainimg_slide3Color',
				'description' => '■カラー系マスク利用時の色を指定',
			)));


			// スライドショー設定　タイトル3 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide3[title]', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// スライドショー設定　タイトル3 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slide3[title]', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slide3[title]',
				'description' => '■タイトルを入力<br>
				<span class="label__red">タグ利用可</span>',
				'type'      => 'text',
			));
			// スライドショー設定　サブタイトル3 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide3[subtitle]', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// スライドショー設定　サブタイトル3 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slide3[subtitle]', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slide3[subtitle]',
				'description' => '■サブタイトルを入力<br>
				<span class="label__red">タグ利用可</span>',
				'type'      => 'textarea',
			));
			// スライドショー設定　ボタンリンク3 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide3[btn]', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// スライドショー設定　ボタンリンク3 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slide3[btn]', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slide3[btn]',
				'description' => '■ボタンのテキストを入力',
				'type'      => 'text',
			));
			// スライドショー設定　ボタンリンクURL3 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide3[url]', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// スライドショー設定　ボタンリンクURL3 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slide3[url]', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slide3[url]',
				'description' => '■ボタンのリンク先URLを入力',
				'type'      => 'text',
			));


			//スライドショー設定　画像4 セッティング
			$wp_customize->add_setting('fit_homeMainimg_slide4Img', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'fit_sanitize_image',
			));

			//スライドショー設定　画像4 コントロール
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'fit_homeMainimg_slide4Img', array(
				'section' => 'fit_home_mainimg_section',
				'settings' => 'fit_homeMainimg_slide4Img',
				'description' => '<div class="customize-control-subtitle">スライドショー4の設定</div>
				■画像を登録',
			)));
			// スライドショー設定　マスク4 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide4Mask', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// スライドショー設定　マスク4 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slide4Mask', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slide4Mask',
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
			// スライドショー設定　カラーマスク4 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide4Color', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// スライドショー設定　カラーマスク4 コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_homeMainimg_slide4Color', array(
				'section' => 'fit_home_mainimg_section',
				'settings' =>'fit_homeMainimg_slide4Color',
				'description' => '■カラー系マスク利用時の色を指定',
			)));


			// スライドショー設定　タイトル4 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide4[title]', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// スライドショー設定　タイトル4 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slide4[title]', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slide4[title]',
				'description' => '■タイトルを入力<br>
				<span class="label__red">タグ利用可</span>',
				'type'      => 'text',
			));
			// スライドショー設定　サブタイトル4 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide4[subtitle]', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// スライドショー設定　サブタイトル4 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slide4[subtitle]', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slide4[subtitle]',
				'description' => '■サブタイトルを入力<br>
				<span class="label__red">タグ利用可</span>',
				'type'      => 'textarea',
			));
			// スライドショー設定　ボタンリンク4 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide4[btn]', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// スライドショー設定　ボタンリンク4 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slide4[btn]', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slide4[btn]',
				'description' => '■ボタンのテキストを入力',
				'type'      => 'text',
			));
			// スライドショー設定　ボタンリンクURL4 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide4[url]', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// スライドショー設定　ボタンリンクURL4 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slide4[url]', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slide4[url]',
				'description' => '■ボタンのリンク先URLを入力',
				'type'      => 'text',
			));


			//スライドショー設定　画像5 セッティング
			$wp_customize->add_setting('fit_homeMainimg_slide5Img', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'fit_sanitize_image',
			));

			//スライドショー設定　画像5 コントロール
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'fit_homeMainimg_slide5Img', array(
				'section' => 'fit_home_mainimg_section',
				'settings' => 'fit_homeMainimg_slide5Img',
				'description' => '<div class="customize-control-subtitle">スライドショー5の設定</div>
				■画像を登録',
			)));
			// スライドショー設定　マスク5 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide5Mask', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// スライドショー設定　マスク5 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slide5Mask', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slide5Mask',
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

			// スライドショー設定　カラーマスク5 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide5Color', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// スライドショー設定　カラーマスク5 コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_homeMainimg_slide5Color', array(
				'section' => 'fit_home_mainimg_section',
				'settings' =>'fit_homeMainimg_slide5Color',
				'description' => '■カラー系マスク利用時の色を指定',
			)));


			// スライドショー設定　タイトル5 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide5[title]', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// スライドショー設定　タイトル5 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slide5[title]', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slide5[title]',
				'description' => '■タイトルを入力<br>
				<span class="label__red">タグ利用可</span>',
				'type'      => 'text',
			));
			// スライドショー設定　サブタイトル5 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide5[subtitle]', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// スライドショー設定　サブタイトル5 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slide5[subtitle]', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slide5[subtitle]',
				'description' => '■サブタイトルを入力<br>
				<span class="label__red">タグ利用可</span>',
				'type'      => 'textarea',
			));
			// スライドショー設定　ボタンリンク5 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide5[btn]', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// スライドショー設定　ボタンリンク5 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slide5[btn]', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slide5[btn]',
				'description' => '■ボタンのテキストを入力',
				'type'      => 'text',
			));
			// スライドショー設定　ボタンリンクURL5 セッティング
			$wp_customize->add_setting( 'fit_homeMainimg_slide5[url]', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// スライドショー設定　ボタンリンクURL5 コントロール
			$wp_customize->add_control( 'fit_homeMainimg_slide5[url]', array(
				'section'   => 'fit_home_mainimg_section',
				'settings'  => 'fit_homeMainimg_slide5[url]',
				'description' => '■ボタンのリンク先URLを入力',
				'type'      => 'text',
			));


		//セクションの追加
		$wp_customize->add_section( 'fit_home_pickup_section', array(
			'title'       => 'メインビジュアル下お知らせ設定',
			'panel'       => 'fit_home_panel',
			'description' => 'メインビジュアル下お知らせ設定画面です。
			<span class="asterisk">※メインビジュアルの表示設定が「非表示」の場合、この機能を利用することができません。</span>',
			'priority'  => 1,
		));

			// メインビジュアル下の注目エリア表示設定 セッティング
			$wp_customize->add_setting( 'fit_homePickup_switch', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// メインビジュアル下の注目エリア表示設定 コントロール
			$wp_customize->add_control( 'fit_homePickup_switch', array(
				'section'   => 'fit_home_pickup_section',
				'settings'  => 'fit_homePickup_switch',
				'label'     => 'メインビジュアル下の注目エリア設定',
				'description' => '■メインビジュアル下の注目エリアを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '非表示(default)',
					'on'  => '表示',
				),
			));
			// 注目エリアテキスト設定　セッティング
			$wp_customize->add_setting( 'fit_homePickup_text', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// 注目エリアテキスト設定　コントロール
			$wp_customize->add_control( 'fit_homePickup_text', array(
				'section'   => 'fit_home_pickup_section',
				'settings'  => 'fit_homePickup_text',
				'description' => '■キャッチコピーを入力<br>
				<span class="label__red">タグ利用可</span>',
				'type'      => 'textarea',
			));
			// 注目エリアボタンテキスト設定　セッティング
			$wp_customize->add_setting( 'fit_homePickup_btn', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// 注目エリアボタンテキスト設定　コントロール
			$wp_customize->add_control( 'fit_homePickup_btn', array(
				'section'   => 'fit_home_pickup_section',
				'settings'  => 'fit_homePickup_btn',
				'description' => '■ボタンのテキストを入力',
				'type'      => 'text',
			));
			// 注目エリアボタンURL設定　セッティング
			$wp_customize->add_setting( 'fit_homePickup_url', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// 注目エリアボタンURL設定　コントロール
			$wp_customize->add_control( 'fit_homePickup_url', array(
				'section'   => 'fit_home_pickup_section',
				'settings'  => 'fit_homePickup_url',
				'description' => '■ボタンのリンク先URLを入力',
				'type'      => 'text',
			));
			// 注目エリア背景色設定 セッティング
			$wp_customize->add_setting( 'fit_homePickup_color', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// 注目エリア背景色設定 コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_homePickup_color', array(
				'section' => 'fit_home_pickup_section',
				'settings' =>'fit_homePickup_color',
				'description' => '■背景色を指定',
			)));


		//セクションの追加
		$wp_customize->add_section( 'fit_home_carousel_section', array(
			'title'       => 'カルーセルスライダー設定',
			'panel'       => 'fit_home_panel',
			'description' => 'カルーセルスライダーの設定画面です。',
			'priority'  => 1,
		));

			// カルーセル表示設定 セッティング
			$wp_customize->add_setting( 'fit_homeCarousel_switch', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// カルーセル表示設定 コントロール
			$wp_customize->add_control( 'fit_homeCarousel_switch', array(
				'section'   => 'fit_home_carousel_section',
				'settings'  => 'fit_homeCarousel_switch',
				'label'     => 'カルーセルスライダー設定',
				'description' => '■カルーセルスライダーを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '非表示(default)',
					'on'  => '表示',
				),
			));
			// カルーセル表示条件設定 セッティング
			$wp_customize->add_setting( 'fit_homeCarousel_conditions', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// カルーセル表示条件設定 コントロール
			$wp_customize->add_control( 'fit_homeCarousel_conditions', array(
				'section'   => 'fit_home_carousel_section',
				'settings'  => 'fit_homeCarousel_conditions',
				'description' => '■表示条件を選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '無し(default)',
					'post__in'  => '指定した投稿を表示',
					'post__not_in'  => '指定した投稿以外を表示',
					'category__in'  => '指定したカテゴリの投稿を表示',
					'category__not_in'  => '指定したカテゴリ以外の投稿を表示',
				),
			));
			// カルーセルID設定　セッティング
			$wp_customize->add_setting( 'fit_homeCarousel_id', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// カルーセルID設定　コントロール
			$wp_customize->add_control( 'fit_homeCarousel_id', array(
				'section'   => 'fit_home_carousel_section',
				'settings'  => 'fit_homeCarousel_id',
				'description' => '■指定するIDを入力<br><span class="label_blue">複数の場合は[ , ]カンマ区切り</span>',
				'type'      => 'text',
			));

			// カルーセル表示件数 セッティング
			$wp_customize->add_setting( 'fit_homeCarousel_page', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_number_range',
			));
			// カルーセル表示件数 コントロール
			$wp_customize->add_control( 'fit_homeCarousel_page', array(
				'section'   => 'fit_home_carousel_section',
				'settings'  => 'fit_homeCarousel_page',
				'description' => '■表示件数を指定',
				'type'      => 'number',
				'input_attrs' => array(
					'step'     => '1',
					'min'      => '5',
					'max'      => '10',
				),
			));

			// カルーセル画像アスペクト比設定 セッティング
			$wp_customize->add_setting( 'fit_homeCarousel_aspect', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// カルーセル画像アスペクト比設定 コントロール
			$wp_customize->add_control( 'fit_homeCarousel_aspect', array(
				'section'   => 'fit_home_carousel_section',
				'settings'  => 'fit_homeCarousel_aspect',
				'description' => '■画像アスペクト比を選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '16：9(default)',
					'eyecatch-43'  => '4：3',
					'eyecatch-11'  => '1：1',
				),
			));

			//カルーセル画像上のカテゴリラベル セッティング
			$wp_customize->add_setting('fit_homeCarousel_category', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
    		));
			//カルーセル画像上のカテゴリラベル コントロール
			$wp_customize->add_control('fit_homeCarousel_category', array(
       		 'section' => 'fit_home_carousel_section',
      		  'settings' => 'fit_homeCarousel_category',
      		  'label'     => 'アイキャッチ上のカテゴリを非表示にする',
      		  'type'      => 'checkbox',
			));


		//セクションの追加
		$wp_customize->add_section( 'fit_home_pickup3_section', array(
			'title'       => 'ピックアップ3記事設定',
			'panel'       => 'fit_home_panel',
			'description' => 'ピックアップ3記事の設定画面です。<span class="asterisk">※投稿記事件数が3件以下の場合、この機能を利用することができません。</span>',
			'priority'  => 1,
		));

			// ピックアップ3記事表示設定 セッティング
			$wp_customize->add_setting( 'fit_homePickup3_switch', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// ピックアップ3記事表示設定 コントロール
			$wp_customize->add_control( 'fit_homePickup3_switch', array(
				'section'   => 'fit_home_pickup3_section',
				'settings'  => 'fit_homePickup3_switch',
				'label'     => 'ピックアップ3記事設定',
				'description' => '■ピックアップ3記事を表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '非表示(default)',
					'on'  => '表示',
				),
			));

			// ピックアップ3見出し設定　セッティング
			$wp_customize->add_setting( 'fit_homePickup3_title', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// ピックアップ3見出し設定　コントロール
			$wp_customize->add_control( 'fit_homePickup3_title', array(
				'section'   => 'fit_home_pickup3_section',
				'settings'  => 'fit_homePickup3_title',
				'description' => '■セクションの見出しを入力<span class="required">必須</span>',
				'type'      => 'text',
			));
			// 太文字設定 セッティング
			$wp_customize->add_setting('fit_homePickup3_bold', array(
			    'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 太文字設定 コントロール
			$wp_customize->add_control('fit_homePickup3_bold', array(
			    'section' => 'fit_home_pickup3_section',
				'settings' => 'fit_homePickup3_bold',
				'label'     => '見出しを太文字にする',
				'type'      => 'checkbox',
			));

			// ピックアップ3見出しアイコン設定　セッティング
			$wp_customize->add_setting( 'fit_homePickup3_icon', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// ピックアップ3見出しアイコン設定　コントロール
			$wp_customize->add_control( 'fit_homePickup3_icon', array(
				'section'   => 'fit_home_pickup3_section',
				'settings'  => 'fit_homePickup3_icon',
				'description' => '■見出しの左に表示するアイコンを入力　[<a href="'.get_template_directory_uri().'/admin/template/icon_list.php" target="_blank">アイコン一覧</a>]',
				'type'      => 'text',
			));
			// ピックアップ3見出しサブ設定　セッティング
			$wp_customize->add_setting( 'fit_homePickup3_sub', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// ピックアップ3見出しサブ設定　コントロール
			$wp_customize->add_control( 'fit_homePickup3_sub', array(
				'section'   => 'fit_home_pickup3_section',
				'settings'  => 'fit_homePickup3_sub',
				'description' => '■見出しの右に表示する補足情報を入力',
				'type'      => 'text',
			));

			// ピックアップ3画像アスペクト比設定 セッティング
			$wp_customize->add_setting( 'fit_homePickup3_aspect', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// ピックアップ3画像アスペクト比設定 コントロール
			$wp_customize->add_control( 'fit_homePickup3_aspect', array(
				'section'   => 'fit_home_pickup3_section',
				'settings'  => 'fit_homePickup3_aspect',
				'description' => '<hr>■画像アスペクト比を選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '16：9(default)',
					'eyecatch-43'  => '4：3',
					'eyecatch-11'  => '1：1',
				),
			));

			// ピックアップ3マスク設定 セッティング
			$wp_customize->add_setting( 'fit_homePickup3_mask', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// ピックアップ3マスク設定　マスク5 コントロール
			$wp_customize->add_control( 'fit_homePickup3_mask', array(
				'section'   => 'fit_home_pickup3_section',
				'settings'  => 'fit_homePickup3_mask',
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
			// ピックアップ3マスクカラー セッティング
			$wp_customize->add_setting( 'fit_homePickup3_color', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// ピックアップ3マスクカラー コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_homePickup3_color', array(
				'section' => 'fit_home_pickup3_section',
				'settings' =>'fit_homePickup3_color',
				'description' => '■カラー系マスク利用時の色を指定',
			)));

			//ピックアップ3画像上のカテゴリラベル セッティング
			$wp_customize->add_setting('fit_homePickup3_category', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
    		));
			//ピックアップ3画像上のカテゴリラベル コントロール
			$wp_customize->add_control('fit_homePickup3_category', array(
				'section' => 'fit_home_pickup3_section',
				'settings' => 'fit_homePickup3_category',
				'label'     => 'アイキャッチ上のカテゴリを非表示にする',
				'type'      => 'checkbox',
			));


			// ピックアップ3記事ナンバー1設定　セッティング
			$wp_customize->add_setting( 'fit_homePickup3_id1', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_number_range',
			));
			// ピックアップ3記事ナンバー1設定　コントロール
			$wp_customize->add_control( 'fit_homePickup3_id1', array(
				'section'   => 'fit_home_pickup3_section',
				'settings'  => 'fit_homePickup3_id1',
				'description' => '<hr>■1番目の記事IDを入力',
				'type'      => 'number',
				'input_attrs' => array(
					'step'     => '1',
					'min'      => '1',
				),
			));
			// ピックアップ3記事ナンバー2設定　セッティング
			$wp_customize->add_setting( 'fit_homePickup3_id2', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_number_range',
			));
			// ピックアップ3記事ナンバー2設定　コントロール
			$wp_customize->add_control( 'fit_homePickup3_id2', array(
				'section'   => 'fit_home_pickup3_section',
				'settings'  => 'fit_homePickup3_id2',
				'description' => '■2番目の記事IDを入力',
				'type'      => 'number',
				'input_attrs' => array(
					'step'     => '1',
					'min'      => '1',
				),
			));
			// ピックアップ3記事ナンバー3設定　セッティング
			$wp_customize->add_setting( 'fit_homePickup3_id3', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_number_range',
			));
			// ピックアップ3記事ナンバー3設定　コントロール
			$wp_customize->add_control( 'fit_homePickup3_id3', array(
				'section'   => 'fit_home_pickup3_section',
				'settings'  => 'fit_homePickup3_id3',
				'description' => '■3番目の記事IDを入力',
				'type'      => 'number',
				'input_attrs' => array(
					'step'     => '1',
					'min'      => '1',
				),
			));




		//セクションの追加
		$wp_customize->add_section( 'fit_home_rank_section', array(
			'title'       => '記事ランキング設定',
			'panel'       => 'fit_home_panel',
			'description' => '記事ランキングの設定画面です。',
			'priority'  => 1,
		));

			// 記事ランキング表示設定 セッティング
			$wp_customize->add_setting( 'fit_homeRank_switch', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 記事ランキング表示設定 コントロール
			$wp_customize->add_control( 'fit_homeRank_switch', array(
				'section'   => 'fit_home_rank_section',
				'settings'  => 'fit_homeRank_switch',
				'label'     => '記事ランキング設定',
				'description' => '■記事ランキングを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '非表示(default)',
					'on'  => '表示',
				),
			));

			// ランキング対象期間 セッティング
			$wp_customize->add_setting(
				'fit_homeRank_period',
				array(
					'default'           => Fit_Rank::PERIOD_ALL,
					'type'              => 'option',
					'sanitize_callback' => 'fit_sanitize_select',
				)
			);
			// ランキング対象期間 コントロール
			$wp_customize->add_control(
				'fit_homeRank_period',
				array(
					'section'     => 'fit_home_rank_section',
					'settings'    => 'fit_homeRank_period',
					'description' => '■ランキングの対象期間を選択',
					'type'        => 'select',
					'choices'     => array(
						Fit_Rank::PERIOD_ALL   => '全期間ランキング(default)',
						Fit_Rank::PERIOD_MONTH => '月ランキング',
						Fit_Rank::PERIOD_WEEK  => '週ランキング',
						Fit_Rank::PERIOD_DAY   => '日ランキング',
					),
				)
			);

			// 記事ランキング表示件数設定　セッティング
			$wp_customize->add_setting( 'fit_homeRank_number', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_number_range',
			));
			// 記事ランキング表示件数設定　コントロール
			$wp_customize->add_control( 'fit_homeRank_number', array(
				'section'   => 'fit_home_rank_section',
				'settings'  => 'fit_homeRank_number',
				'description' => '■表示件数を指定<small>（5～10件）</small>',
				'type'      => 'number',
				'input_attrs' => array(
					'step'     => '1',
					'min'      => '5',
					'max'      => '10',
				),
			));

			// 記事ランキング表示条件設定 セッティング
			$wp_customize->add_setting( 'fit_homeRank_conditions', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 記事ランキング表示条件設定 コントロール
			$wp_customize->add_control( 'fit_homeRank_conditions', array(
				'section'   => 'fit_home_rank_section',
				'settings'  => 'fit_homeRank_conditions',
				'description' => '■表示条件を選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '無し(default)',
					'post__in'  => '指定した投稿を表示',
					'post__not_in'  => '指定した投稿以外を表示',
					'category__in'  => '指定したカテゴリの投稿を表示',
					'category__not_in'  => '指定したカテゴリ以外の投稿を表示',
				),
			));
			// 記事ランキングID設定　セッティング
			$wp_customize->add_setting( 'fit_homeRank_id', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// 記事ランキングID設定　コントロール
			$wp_customize->add_control( 'fit_homeRank_id', array(
				'section'   => 'fit_home_rank_section',
				'settings'  => 'fit_homeRank_id',
				'description' => '■指定するIDを入力<br><span class="label_blue">複数の場合は[ , ]カンマ区切り</span>',
				'type'      => 'text',
			));

			// 記事ランキング見出し設定　セッティング
			$wp_customize->add_setting( 'fit_homeRank_title', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// 記事ランキング見出し設定　コントロール
			$wp_customize->add_control( 'fit_homeRank_title', array(
				'section'   => 'fit_home_rank_section',
				'settings'  => 'fit_homeRank_title',
				'description' => '<hr>■セクションの見出しを入力<span class="required">必須</span>',
				'type'      => 'text',
			));

			// 太文字設定 セッティング
			$wp_customize->add_setting('fit_homeRank_bold', array(
			    'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 太文字設定 コントロール
			$wp_customize->add_control('fit_homeRank_bold', array(
			    'section' => 'fit_home_rank_section',
				'settings' => 'fit_homeRank_bold',
				'label'     => '見出しを太文字にする',
				'type'      => 'checkbox',
			));

			// 記事ランキング見出しアイコン設定　セッティング
			$wp_customize->add_setting( 'fit_homeRank_icon', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// 記事ランキング見出しアイコン設定　コントロール
			$wp_customize->add_control( 'fit_homeRank_icon', array(
				'section'   => 'fit_home_rank_section',
				'settings'  => 'fit_homeRank_icon',
				'description' => '■見出しの左に表示するアイコンを入力　[<a href="'.get_template_directory_uri().'/admin/template/icon_list.php" target="_blank">アイコン一覧</a>]',
				'type'      => 'text',
			));
			// 記事ランキング見出しサブ設定　セッティング
			$wp_customize->add_setting( 'fit_homeRank_sub', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// 記事ランキング見出しサブ設定　コントロール
			$wp_customize->add_control( 'fit_homeRank_sub', array(
				'section'   => 'fit_home_rank_section',
				'settings'  => 'fit_homeRank_sub',
				'description' => '■見出しの右に表示する補足情報を入力',
				'type'      => 'text',
			));


			// 記事ランキング画像アスペクト比設定 セッティング
			$wp_customize->add_setting( 'fit_homeRank_aspect', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 記事ランキング画像アスペクト比設定 コントロール
			$wp_customize->add_control( 'fit_homeRank_aspect', array(
				'section'   => 'fit_home_rank_section',
				'settings'  => 'fit_homeRank_aspect',
				'description' => '<hr>■画像アスペクト比を選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '16：9(default)',
					'eyecatch-43'  => '4：3',
					'eyecatch-11'  => '1：1',
					'none'  => '0：0(非表示)',
				),
			));

			// 記事ランキング背景カラー セッティング
			$wp_customize->add_setting( 'fit_homeRank_color', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// 記事ランキング背景カラー コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_homeRank_color', array(
				'section' => 'fit_home_rank_section',
				'settings' =>'fit_homeRank_color',
				'description' => '■カラー系マスク利用時の色を指定',
			)));

			//記事ランキング画像上のカテゴリラベル セッティング
			$wp_customize->add_setting('fit_homeRank_category', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
    		));
			//記事ランキング画像上のカテゴリラベル コントロール
			$wp_customize->add_control('fit_homeRank_category', array(
				'section' => 'fit_home_rank_section',
				'settings' => 'fit_homeRank_category',
				'label'     => 'アイキャッチ上のカテゴリを非表示にする',
				'type'      => 'checkbox',
			));

			// 記事ランキング投稿日表示 セッティング
			$wp_customize->add_setting('fit_homeRank_time', array(
			    'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 記事ランキング投稿日表示 コントロール
			$wp_customize->add_control('fit_homeRank_time', array(
			    'section' => 'fit_home_rank_section',
				'settings' => 'fit_homeRank_time',
				'label'     => '投稿日を表示する',
				'type'      => 'checkbox',
			));

			// 記事ランキング更新日表示 セッティング
			$wp_customize->add_setting('fit_homeRank_update', array(
			    'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 記事ランキング更新日表示 コントロール
			$wp_customize->add_control('fit_homeRank_update', array(
			    'section' => 'fit_home_rank_section',
				'settings' => 'fit_homeRank_update',
				'label'     => '更新日を表示する',
				'type'      => 'checkbox',
			));

			// 記事ランキング閲覧数表示 セッティング
			$wp_customize->add_setting('fit_homeRank_view', array(
			    'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 記事ランキング閲覧数表示 コントロール
			$wp_customize->add_control('fit_homeRank_view', array(
			    'section' => 'fit_home_rank_section',
				'settings' => 'fit_homeRank_view',
				'label'     => '閲覧数を表示する',
				'type'      => 'checkbox',
			));




		//セクションの追加
		$wp_customize->add_section( 'fit_home_category_section', array(
			'title'       => 'カテゴリ最新記事設定',
			'panel'       => 'fit_home_panel',
			'description' => 'カテゴリ最新記事の設定画面です。',
			'priority'  => 1,
		));

			// カテゴリ最新記事表示設定 セッティング
			$wp_customize->add_setting( 'fit_homeCategory_switch', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// カテゴリ最新記事表示設定 コントロール
			$wp_customize->add_control( 'fit_homeCategory_switch', array(
				'section'   => 'fit_home_category_section',
				'settings'  => 'fit_homeCategory_switch',
				'label'     => 'カテゴリ最新記事設定',
				'description' => '■カテゴリ最新記事を表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '非表示(default)',
					'on'  => '表示',
				),
			));

			// カテゴリ最新記事表示条件設定 セッティング
			$wp_customize->add_setting( 'fit_homeCategory_conditions', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// カテゴリ最新記事表示条件設定 コントロール
			$wp_customize->add_control( 'fit_homeCategory_conditions', array(
				'section'   => 'fit_home_category_section',
				'settings'  => 'fit_homeCategory_conditions',
				'description' => '■表示条件を選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '無し(default)',
					'include'  => '指定したカテゴリを表示',
					'exclude'  => '指定したカテゴリ以外を表示',
				),
			));
			// カテゴリ最新記事ID設定　セッティング
			$wp_customize->add_setting( 'fit_homeCategory_id', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// カテゴリ最新記事ID設定　コントロール
			$wp_customize->add_control( 'fit_homeCategory_id', array(
				'section'   => 'fit_home_category_section',
				'settings'  => 'fit_homeCategory_id',
				'description' => '■指定するIDを入力<br><span class="label_blue">複数の場合は[ , ]カンマ区切り</span>',
				'type'      => 'text',
			));


			// カテゴリ最新記事見出し設定　セッティング
			$wp_customize->add_setting( 'fit_homeCategory_title', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// カテゴリ最新記事見出し設定　コントロール
			$wp_customize->add_control( 'fit_homeCategory_title', array(
				'section'   => 'fit_home_category_section',
				'settings'  => 'fit_homeCategory_title',
				'description' => '<hr>■セクションの見出しを入力<span class="required">必須</span>',
				'type'      => 'text',
			));

			// 太文字設定 セッティング
			$wp_customize->add_setting('fit_homeCategory_bold', array(
			    'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 太文字設定 コントロール
			$wp_customize->add_control('fit_homeCategory_bold', array(
			    'section' => 'fit_home_category_section',
				'settings' => 'fit_homeCategory_bold',
				'label'     => '見出しを太文字にする',
				'type'      => 'checkbox',
			));

			// カテゴリ最新記事見出しアイコン設定　セッティング
			$wp_customize->add_setting( 'fit_homeCategory_icon', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// カテゴリ最新記事見出しアイコン設定　コントロール
			$wp_customize->add_control( 'fit_homeCategory_icon', array(
				'section'   => 'fit_home_category_section',
				'settings'  => 'fit_homeCategory_icon',
				'description' => '■見出しの左に表示するアイコンを入力　[<a href="'.get_template_directory_uri().'/admin/template/icon_list.php" target="_blank">アイコン一覧</a>]',
				'type'      => 'text',
			));
			// カテゴリ最新記事見出しサブ設定　セッティング
			$wp_customize->add_setting( 'fit_homeCategory_sub', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// カテゴリ最新記事見出しサブ設定　コントロール
			$wp_customize->add_control( 'fit_homeCategory_sub', array(
				'section'   => 'fit_home_category_section',
				'settings'  => 'fit_homeCategory_sub',
				'description' => '■見出しの右に表示する補足情報を入力',
				'type'      => 'text',
			));

			// カテゴリ最新記事画像アスペクト比設定 セッティング
			$wp_customize->add_setting( 'fit_homeCategory_aspect', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// カテゴリ最新記事画像アスペクト比設定 コントロール
			$wp_customize->add_control( 'fit_homeCategory_aspect', array(
				'section'   => 'fit_home_category_section',
				'settings'  => 'fit_homeCategory_aspect',
				'description' => '<hr>■画像アスペクト比を選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '16：9(default)',
					'eyecatch-43'  => '4：3',
					'eyecatch-11'  => '1：1',
					'none'  => '0：0(非表示)',
				),
			));

			// カテゴリ最新記事投稿日表示 セッティング
			$wp_customize->add_setting('fit_homeCategory_time', array(
			    'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// カテゴリ最新記事投稿日表示 コントロール
			$wp_customize->add_control('fit_homeCategory_time', array(
			    'section' => 'fit_home_category_section',
				'settings' => 'fit_homeCategory_time',
				'label'     => '投稿日を表示する',
				'type'      => 'checkbox',
			));

			// カテゴリ最新記事更新日表示 セッティング
			$wp_customize->add_setting('fit_homeCategory_update', array(
			    'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// カテゴリ最新記事更新日表示 コントロール
			$wp_customize->add_control('fit_homeCategory_update', array(
			    'section' => 'fit_home_category_section',
				'settings' => 'fit_homeCategory_update',
				'label'     => '更新日を表示する',
				'type'      => 'checkbox',
			));


}
add_action( 'customize_register', 'fit_home_cutomizer' );
function get_fit_stillimg(){ return esc_url(get_theme_mod('fit_homeMainimg_stillImg'));}
function get_fit_movieimg(){ return esc_url(get_theme_mod('fit_homeMainimg_movieImg'));}
function get_fit_slideimg1(){ return esc_url(get_theme_mod('fit_homeMainimg_slide1Img'));}
function get_fit_slideimg2(){ return esc_url(get_theme_mod('fit_homeMainimg_slide2Img'));}
function get_fit_slideimg3(){ return esc_url(get_theme_mod('fit_homeMainimg_slide3Img'));}
function get_fit_slideimg4(){ return esc_url(get_theme_mod('fit_homeMainimg_slide4Img'));}
function get_fit_slideimg5(){ return esc_url(get_theme_mod('fit_homeMainimg_slide5Img'));}
