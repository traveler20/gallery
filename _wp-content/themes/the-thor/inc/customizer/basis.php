<?php
////////////////////////////////////////////////////////
//基本設定画面
////////////////////////////////////////////////////////
function fit_basis_cutomizer( $wp_customize ) {

	//パネルの追加
	$wp_customize->add_panel( 'fit_basis_panel', array(
		'title'       => '基本設定[THE]',
		'priority'  => 1,
	));

		//セクションの追加
		$wp_customize->add_section( 'fit_basis_logo_section', array(
			'title'       => 'サイトロゴの設定',
			'panel'       => 'fit_basis_panel',
			'description' => 'サイトロゴの設定画面です。',
			'priority'  => 1,
		));

			//ロゴ画像 セッティング
			$wp_customize->add_setting('fit_bsLogo_img', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'fit_sanitize_image',
			));
			//ロゴ画像 コントロール
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'fit_bsLogo_img', array(
				'section' => 'fit_basis_logo_section',
				'settings' => 'fit_bsLogo_img',
				'label' => 'ロゴ画像の設定',
				'description' => '■サイトのロゴ画像を登録',
			)));

			// ロゴ画像の高さ(スマホ)　セッティング
			$wp_customize->add_setting( 'fit_bsLogo_heightSp', array(
				'default'   => '20',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// ロゴ画像の高さ(スマホ)　コントロール
			$wp_customize->add_control( 'fit_bsLogo_heightSp', array(
				'section'   => 'fit_basis_logo_section',
				'settings'  => 'fit_bsLogo_heightSp',
				'label'     => 'ヘッダー表示時のロゴの高さ設定',
				'description' => '■スマホ表示時のロゴ画像の高さを選択',
				'type'      => 'select',
				'choices'   => array(
					'20' => '20px(default)',
					'25' => '25px',
					'30' => '30px',
					'35' => '35px',
					'40' => '40px',
				),
			));
			// ロゴ画像の高さ(PC)　セッティング
			$wp_customize->add_setting( 'fit_bsLogo_heightPC', array(
				'default'   => '30',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// ロゴ画像の高さ(PC)　コントロール
			$wp_customize->add_control( 'fit_bsLogo_heightPC', array(
				'section'   => 'fit_basis_logo_section',
				'settings'  => 'fit_bsLogo_heightPC',
				'description' => '■PC表示時のロゴ画像の高さを選択',
				'type'      => 'select',
				'choices'   => array(
					'30' => '30px(default)',
					'40' => '40px',
					'50' => '50px',
					'60' => '60px',
					'70' => '70px',
				),
			));


		//セクションの追加
		$wp_customize->add_section( 'fit_basis_eyecatch_section', array(
			'title'       => 'アイキャッチ画像の設定',
			'panel'       => 'fit_basis_panel',
			'description' => 'アイキャッチ画像の設定画面です。',
			'priority'  => 1,
		));

			//ノーイメージ画像 セッティング
			$wp_customize->add_setting('fit_bsEyecatch_noimg', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'fit_sanitize_image',
			));

			//ノーイメージ画像 コントロール
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'fit_bsEyecatch_noimg', array(
				'section' => 'fit_basis_eyecatch_section',
				'settings' => 'fit_bsEyecatch_noimg',
				'label' => 'NO IMAGE画像の設定',
				'description' => '■アイキャッチ画像未設定時に表示されるNO IMAGE画像を登録<br>(推奨サイズ：760×760px)',
			)));

			// アイキャッチホバーエフェクト　セッティング
			$wp_customize->add_setting( 'fit_bsEyecatch_hover', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// アイキャッチホバーエフェクト　コントロール
			$wp_customize->add_control( 'fit_bsEyecatch_hover', array(
				'section'   => 'fit_basis_eyecatch_section',
				'settings'  => 'fit_bsEyecatch_hover',
				'label'     => 'アイキャッチホバーエフェクトの設定',
				'description' => '■アイキャッチホバー時のエフェクトを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => 'ズーム(default)',
					'zoomgray' => 'ズームグレイ',
					'zoomsepia' => 'ズームセピア',
					'zoomrotate' => 'ズーム回転',
					'mask' => 'マスク',
					'maskzoom' => 'マスクズーム',
					'maskzoomrotate' => 'マスクズーム回転',
					'none' => '無し',
				),
			));

			// マスク系エフェクト利用時のマスクカラー セッティング
			$wp_customize->add_setting( 'fit_bsEyecatch_maskColor', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// マスク系エフェクト利用時のマスクカラー コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_bsEyecatch_maskColor', array(
				'section' => 'fit_basis_eyecatch_section',
				'settings' =>'fit_bsEyecatch_maskColor',
				'description' => '■マスク系エフェクト利用時のマスクカラーを指定',
			)));

			// マスク系エフェクト利用時のマスク上テキスト セッティング
			$wp_customize->add_setting( 'fit_bsEyecatch_maskText', array(
				'default'   => '',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// マスク系エフェクト利用時のマスク上テキスト コントロール
			$wp_customize->add_control( 'fit_bsEyecatch_maskText', array(
				'section'   => 'fit_basis_eyecatch_section',
				'settings'  => 'fit_bsEyecatch_maskText',
				'description' => '■マスク系エフェクト利用時のマスク上テキストを入力',
				'type'      => 'text',
			));



			// アーカイブ表示時のサイズ　セッティング
			$wp_customize->add_setting( 'fit_bsEyecatch_archiveSize', array(
				'default'   => 'icatch768',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// アーカイブ表示時のサイズ　コントロール
			$wp_customize->add_control( 'fit_bsEyecatch_archiveSize', array(
				'section'   => 'fit_basis_eyecatch_section',
				'settings'  => 'fit_bsEyecatch_archiveSize',
				'label'     => 'アイキャッチサイズの設定',
				'description' => '■アーカイブ表示時のサイズを選択',
				'type'      => 'select',
				'choices'   => array(
					'icatch768' => 'アイキャッチ(768×432 default)',
					'icatch375' => 'アイキャッチミニ(375×375)',
					'thumbnail' => 'サムネイル('.get_option('thumbnail_size_w').'×'.get_option('thumbnail_size_h').')',
					'medium' => 'ミディアム('.get_option('medium_size_w').'×'.get_option('medium_size_h').')',
					'large' => 'ラージ('.get_option('large_size_w').'×'.get_option('large_size_h').')',
					'full' => 'フル',
				),
			));

			// ウィジェット内表示時のサイズ　セッティング
			$wp_customize->add_setting( 'fit_bsEyecatch_widgetSize', array(
				'default'   => 'icatch768',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// ウィジェット内表示時のサイズ　コントロール
			$wp_customize->add_control( 'fit_bsEyecatch_widgetSize', array(
				'section'   => 'fit_basis_eyecatch_section',
				'settings'  => 'fit_bsEyecatch_widgetSize',
				'description' => '■ウィジェット内表示時のサイズを選択',
				'type'      => 'select',
				'choices'   => array(
					'icatch768' => 'アイキャッチ(768×432 default)',
					'icatch375' => 'アイキャッチミニ(375×375)',
					'thumbnail' => 'サムネイル('.get_option('thumbnail_size_w').'×'.get_option('thumbnail_size_h').')',
					'medium' => 'ミディアム('.get_option('medium_size_w').'×'.get_option('medium_size_h').')',
					'large' => 'ラージ('.get_option('large_size_w').'×'.get_option('large_size_h').')',
					'full' => 'フル',
				),
			));






		//セクションの追加
		$wp_customize->add_section( 'fit_basis_search_section', array(
			'title'       => '検索機能設定',
			'panel'       => 'fit_basis_panel',
			'description' => '検索機能の設定画面です。',
			'priority'  => 1,
		));

			// 検索対象 セッティング
			$wp_customize->add_setting( 'fit_bsSearch_object', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 検索対象 コントロール
			$wp_customize->add_control( 'fit_bsSearch_object', array(
				'section'   => 'fit_basis_search_section',
				'settings'  => 'fit_bsSearch_object',
				'label'     => '検索機能の検索対象設定',
				'description' => '■検索機能利用時の検索対象を選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '投稿と固定ページ(default)',
					'post' => '投稿だけ',
					'page' => '固定ページだけ',
				),
			));

			// タグ検索方法 セッティング
			$wp_customize->add_setting( 'fit_bsSearch_tagMethod', array(
				'default'   => 'tag_slug__in',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// タグ検索方法 コントロール
			$wp_customize->add_control( 'fit_bsSearch_tagMethod', array(
				'section'   => 'fit_basis_search_section',
				'settings'  => 'fit_bsSearch_tagMethod',
				'label'     => '複数タグ検索時の検索方法設定',
				'description' => '■複数タグ検索時の検索方法を選択',
				'type'      => 'select',
				'choices'   => array(
					'tag_slug__in' => 'OR検索(default)',
					'tag_slug__and' => 'AND検索',
				),
			));

			// 検索キーワード見出し セッティング
			$wp_customize->add_setting( 'fit_bsSearch_keywordH', array(
				'default'   => 'キーワード',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// 検索キーワード見出し コントロール
			$wp_customize->add_control( 'fit_bsSearch_keywordH', array(
				'section'   => 'fit_basis_search_section',
				'settings'  => 'fit_bsSearch_keywordH',
				'label'     => '検索項目見出し設定',
				'description' => '■キーワード検索の見出し',
				'type'      => 'text',
			));

			// 検索カテゴリー見出し セッティング
			$wp_customize->add_setting( 'fit_bsSearch_categoryH', array(
				'default'   => 'カテゴリー',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// 検索カテゴリー見出し コントロール
			$wp_customize->add_control( 'fit_bsSearch_categoryH', array(
				'section'   => 'fit_basis_search_section',
				'settings'  => 'fit_bsSearch_categoryH',
				'description' => '■カテゴリー検索の見出し',
				'type'      => 'text',
			));

			// 検索タグ見出し セッティング
			$wp_customize->add_setting( 'fit_bsSearch_tagH', array(
				'default'   => 'タグ',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// 検索タグ見出し コントロール
			$wp_customize->add_control( 'fit_bsSearch_tagH', array(
				'section'   => 'fit_basis_search_section',
				'settings'  => 'fit_bsSearch_tagH',
				'description' => '■タグ検索の見出し',
				'type'      => 'text',
			));

			// 注目キーワード1設定 セッティング
			$wp_customize->add_setting( 'fit_bsSearch_pickup1', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// 注目キーワード1設定
			$wp_customize->add_control( 'fit_bsSearch_pickup1', array(
				'section'   => 'fit_basis_search_section',
				'settings'  => 'fit_bsSearch_pickup1',
				'label'     => '注目キーワードを設定',
				'description' => '■注目キーワード1を入力',
				'type'      => 'text',
			));
			// 注目キーワード2設定 セッティング
			$wp_customize->add_setting( 'fit_bsSearch_pickup2', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// 注目キーワード2設定
			$wp_customize->add_control( 'fit_bsSearch_pickup2', array(
				'section'   => 'fit_basis_search_section',
				'settings'  => 'fit_bsSearch_pickup2',
				'description' => '■注目キーワード2を入力',
				'type'      => 'text',
			));
			// 注目キーワード3設定 セッティング
			$wp_customize->add_setting( 'fit_bsSearch_pickup3', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// 注目キーワード3設定
			$wp_customize->add_control( 'fit_bsSearch_pickup3', array(
				'section'   => 'fit_basis_search_section',
				'settings'  => 'fit_bsSearch_pickup3',
				'description' => '■注目キーワード3を入力',
				'type'      => 'text',
			));
			// 注目キーワード4設定 セッティング
			$wp_customize->add_setting( 'fit_bsSearch_pickup4', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// 注目キーワード4設定
			$wp_customize->add_control( 'fit_bsSearch_pickup4', array(
				'section'   => 'fit_basis_search_section',
				'settings'  => 'fit_bsSearch_pickup4',
				'description' => '■注目キーワード4を入力',
				'type'      => 'text',
			));
			// 注目キーワード5設定 セッティング
			$wp_customize->add_setting( 'fit_bsSearch_pickup5', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// 注目キーワード5設定
			$wp_customize->add_control( 'fit_bsSearch_pickup5', array(
				'section'   => 'fit_basis_search_section',
				'settings'  => 'fit_bsSearch_pickup5',
				'description' => '■注目キーワード5を入力',
				'type'      => 'text',
			));


		//セクションの追加
		$wp_customize->add_section( 'fit_basis_rank_section', array(
			'title'       => 'アクセスランキングの設定',
			'panel'       => 'fit_basis_panel',
			'description' => 'アクセスランキングの設定画面です。',
			'priority'  => 1,
		));

			// ラベル表示用
			$wp_customize->add_control(
				'fit_bsRank_setting',
				array(
					'section'     => 'fit_basis_rank_section',
					'type'        => 'hidden',
					'settings'    => array(),
					'label'       => 'ランキング機能の設定',
				)
			);

			/*
			// リアルタイム集計機能 セッティング
			$wp_customize->add_setting(
				'fit_bsRank_realtime',
				array(
					'type'              => 'option',
					'sanitize_callback' => 'fit_sanitize_checkbox_ret_one_or_blank',
				)
			);
			// リアルタイム集計機能 コントロール
			$wp_customize->add_control(
				'fit_bsRank_realtime',
				array(
					'section'     => 'fit_basis_rank_section',
					'settings'    => 'fit_bsRank_realtime',
					'label'       => 'リアルタイムで集計を行う',
					'description' => '※リアルタイムで集計を行うとページの表示が遅くなる可能性があります。<br>リアルタイムで集計を行わない場合は前日までのアクセス数を使用します。',
					'type'        => 'checkbox',
				)
			);
			*/

			// ランキング数値単位 セッティング
			$wp_customize->add_setting( 'fit_bsRank_unit', array(
				'default'   => 'view',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ランキング数値単位
			$wp_customize->add_control( 'fit_bsRank_unit', array(
				'section'   => 'fit_basis_rank_section',
				'settings'  => 'fit_bsRank_unit',
				'description' => '■閲覧数の最後に表示する単位を入力',
				'type'      => 'text',
			));

			// ランキングリセットボタン
			$wp_customize->add_control(
				'fit_bsRank_resetButton',
				array(
					'section'     => 'fit_basis_rank_section',
					'type'        => 'button',
					'settings'    => array(),
					'label'       => 'アクセス数のリセット',
					'description' => '■これまでのアクセス数をリセットする<br>※リセットしたアクセス数は戻すことができません。<br>※リセットには時間がかかる場合があります。',
					'input_attrs' => array(
						'value' => 'リセット',
						'class' => 'button',
					),
				)
			);

			// アクセス集計期間 セッティング
			$wp_customize->add_setting(
				'fit_bsRank_startDatetime',
				array(
					'type'              => 'option',
					'sanitize_callback' => 'fit_sanitize_readonly',
				)
			);
			// アクセス集計期間 コントロール
			$wp_customize->add_control(
				'fit_bsRank_startDatetime',
				array(
					'section'     => 'fit_basis_rank_section',
					'settings'    => 'fit_bsRank_startDatetime',
					'label'       => '日週月ランキングについて',
					'description' => 'THE THORバージョン1でのアクセス数は日週月ランキングの集計の対象外となります<br><br>日週月ランキング集計開始日',
					'type'        => 'text',
					'input_attrs' => array(
						'readonly' => 'readonly',
					),
				)
			);

		//セクションの追加
		$wp_customize->add_section( 'fit_basis_afTag_section', array(
			'title'       => 'タグ管理設定',
			'panel'       => 'fit_basis_panel',
			'description' => 'タグ管理の設定画面です。',
			'priority'  => 1,
		));

			// サイト内リンクボタンの色 セッティング
			$wp_customize->add_setting( 'fit_bsAfTag_colorIn', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// サイト内リンクボタンの色 コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_bsAfTag_colorIn', array(
				'section' => 'fit_basis_afTag_section',
				'settings' =>'fit_bsAfTag_colorIn',
				'label'     => 'ボタンカラー設定',
				'description' => '■サイト内リンクボタンの色を指定',
			)));

			// サイト外リンクボタンの色 セッティング
			$wp_customize->add_setting( 'fit_bsAfTag_colorOut', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// サイト外リンクボタンの色 コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_bsAfTag_colorOut', array(
				'section' => 'fit_basis_afTag_section',
				'settings' =>'fit_bsAfTag_colorOut',
				'description' => '■サイト外リンクボタンの色を指定',
			)));




			//独自項目1の見出し　 セッティング
			$wp_customize->add_setting( 'fit_bsAfTag_Headline1', array(
				'default'   => '見出し1',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			//独自項目1の見出し コントロール
			$wp_customize->add_control( 'fit_bsAfTag_Headline1', array(
				'section'     => 'fit_basis_afTag_section',
				'settings'    => 'fit_bsAfTag_Headline1',
				'label'       => '独自項目の見出し設定',
				'description' => '■項目1の見出しを入力',
				'type'        => 'text',
			));

			//独自項目2の見出し　 セッティング
			$wp_customize->add_setting( 'fit_bsAfTag_Headline2', array(
				'default'   => '見出し2',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			//独自項目2の見出し コントロール
			$wp_customize->add_control( 'fit_bsAfTag_Headline2', array(
				'section'     => 'fit_basis_afTag_section',
				'settings'    => 'fit_bsAfTag_Headline2',
				'description' => '■項目2の見出しを入力',
				'type'        => 'text',
			));

			//独自項目3の見出し　 セッティング
			$wp_customize->add_setting( 'fit_bsAfTag_Headline3', array(
				'default'   => '見出し3',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			//独自項目3の見出し コントロール
			$wp_customize->add_control( 'fit_bsAfTag_Headline3', array(
				'section'     => 'fit_basis_afTag_section',
				'settings'    => 'fit_bsAfTag_Headline3',
				'description' => '■項目3の見出しを入力',
				'type'        => 'text',
			));

			//独自項目4の見出し　 セッティング
			$wp_customize->add_setting( 'fit_bsAfTag_Headline4', array(
				'default'   => '見出し4',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			//独自項目4の見出し コントロール
			$wp_customize->add_control( 'fit_bsAfTag_Headline4', array(
				'section'     => 'fit_basis_afTag_section',
				'settings'    => 'fit_bsAfTag_Headline4',
				'description' => '■項目4の見出しを入力',
				'type'        => 'text',
			));

			//独自項目5の見出し　 セッティング
			$wp_customize->add_setting( 'fit_bsAfTag_Headline5', array(
				'default'   => '見出し5',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			//独自項目5の見出し コントロール
			$wp_customize->add_control( 'fit_bsAfTag_Headline5', array(
				'section'     => 'fit_basis_afTag_section',
				'settings'    => 'fit_bsAfTag_Headline5',
				'description' => '■項目5の見出しを入力',
				'type'        => 'text',
			));

			//独自項目6の見出し　 セッティング
			$wp_customize->add_setting( 'fit_bsAfTag_Headline6', array(
				'default'   => '見出し6',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			//独自項目6の見出し コントロール
			$wp_customize->add_control( 'fit_bsAfTag_Headline6', array(
				'section'     => 'fit_basis_afTag_section',
				'settings'    => 'fit_bsAfTag_Headline6',
				'description' => '■項目6の見出しを入力',
				'type'        => 'text',
			));




		//セクションの追加
		$wp_customize->add_section( 'fit_basis_sitemap_section', array(
			'title'       => '自動生成サイトマップ設定',
			'panel'       => 'fit_basis_panel',
			'description' => '自動生成サイトマップの設定画面です。',
			'priority'  => 1,
		));

			//固定ページサイトマップ出力 セッティング
			$wp_customize->add_setting( 'fit_bsSitemap_page', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			//固定ページサイトマップ出力 コントロール
			$wp_customize->add_control( 'fit_bsSitemap_page', array(
				'section'   => 'fit_basis_sitemap_section',
				'settings'  => 'fit_bsSitemap_page',
				'label'     => '固定ページ設定',
				'description' => '■サイトマップを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '非表示(default)',
					'on'  => '表示',
				),
			));

			//TOPページの出力 セッティング
			$wp_customize->add_setting('fit_bsSitemap_pageTop', array(
			    'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			//TOPページの出力 コントロール
			$wp_customize->add_control('fit_bsSitemap_pageTop', array(
			    'section' => 'fit_basis_sitemap_section',
				'settings' => 'fit_bsSitemap_pageTop',
				'label'     => 'TOPページを表示する',
				'type'      => 'checkbox',
			));

			//除外ページ　セッティング
			$wp_customize->add_setting( 'fit_bsSitemap_pageExc', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			//除外ページ　コントロール
			$wp_customize->add_control( 'fit_bsSitemap_pageExc', array(
				'section'     => 'fit_basis_sitemap_section',
				'settings'    => 'fit_bsSitemap_pageExc',
				'description' => '■除外ページIDを入力<br><span class="label_blue">複数の場合は[ , ]カンマ区切り</span>',
				'type'        => 'text',
			));

			//出力階層制限 セッティング
			$wp_customize->add_setting( 'fit_bsSitemap_pageRank', array(
				'default'   => '0',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			//出力階層制限 コントロール
			$wp_customize->add_control( 'fit_bsSitemap_pageRank', array(
				'section'   => 'fit_basis_sitemap_section',
				'settings'  => 'fit_bsSitemap_pageRank',
				'description' => '■出力する階層を選択',
				'type'      => 'select',
				'choices'   => array(
					'0' => '制限なし(default)',
					'1' => '第1階層まで',
					'2' => '第2階層まで',
					'3' => '第3階層まで',
					'4' => '第4階層まで',
					'5' => '第5階層まで',
				),
			));

			//固定ページ見出し　セッティング
			$wp_customize->add_setting( 'fit_bsSitemap_pageH', array(
				'default'   => '固定',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			//固定ページ見出し　コントロール
			$wp_customize->add_control( 'fit_bsSitemap_pageH', array(
				'section'     => 'fit_basis_sitemap_section',
				'settings'    => 'fit_bsSitemap_pageH',
				'description' => '■見出しを入力',
				'type'        => 'text',
			));






			//投稿ページサイトマップ出力 セッティング
			$wp_customize->add_setting( 'fit_bsSitemap_post', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			//投稿ページサイトマップ出力 コントロール
			$wp_customize->add_control( 'fit_bsSitemap_post', array(
				'section'   => 'fit_basis_sitemap_section',
				'settings'  => 'fit_bsSitemap_post',
				'label'     => '投稿ページ設定',
				'description' => '■サイトマップを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '非表示(default)',
					'on'  => '表示',
				),
			));

			//カテゴリーと投稿の表示方法 セッティング
			$wp_customize->add_setting( 'fit_bsSitemap_postDisplay', array(
				'default'   => 'value1',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			//カテゴリーと投稿の表示方法 コントロール
			$wp_customize->add_control( 'fit_bsSitemap_postDisplay', array(
				'section'   => 'fit_basis_sitemap_section',
				'settings'  => 'fit_bsSitemap_postDisplay',
				'description' => '■カテゴリーと投稿の表示方法を選択',
				'type'      => 'select',
				'choices'   => array(
					'value1' => '投稿とカテゴリーを統合表示(default)',
					'value2' => '投稿とカテゴリーを分割表示',
				),
			));

			//除外投稿　セッティング
			$wp_customize->add_setting( 'fit_bsSitemap_postExc', array(
				'type' => 'option',
				'sanitize_callback' => '',
			));
			//除外投稿　コントロール
			$wp_customize->add_control( 'fit_bsSitemap_postExc', array(
				'section'     => 'fit_basis_sitemap_section',
				'settings'    => 'fit_bsSitemap_postExc',
				'description' => '■除外投稿IDを入力<br><span class="label_blue">複数の場合は[ , ]カンマ区切り</span>',
				'type'        => 'text',
			));

			//カテゴリー　セッティング
			$wp_customize->add_setting( 'fit_bsSitemap_postCateExc', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			//除外カテゴリー　コントロール
			$wp_customize->add_control( 'fit_bsSitemap_postCateExc', array(
				'section'     => 'fit_basis_sitemap_section',
				'settings'    => 'fit_bsSitemap_postCateExc',
				'description' => '■除外カテゴリーIDを入力<br><span class="label_blue">複数の場合は[ , ]カンマ区切り</span>',
				'type'        => 'text',
			));

			//投稿ページ見出し　セッティング
			$wp_customize->add_setting( 'fit_bsSitemap_postH', array(
				'default'   => '投稿',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			//投稿ページ見出し　コントロール
			$wp_customize->add_control( 'fit_bsSitemap_postH', array(
				'section'     => 'fit_basis_sitemap_section',
				'settings'    => 'fit_bsSitemap_postH',
				'description' => '■見出しを入力',
				'type'        => 'text',
			));




			if ( get_option('fit_custBasis_setting') == 'on' ){
				//カスタム投稿(custom)ページサイトマップ出力 セッティング
				$wp_customize->add_setting( 'fit_bsSitemap_custom', array(
					'default'   => 'off',
					'type' => 'option',
					'sanitize_callback' => 'fit_sanitize_select',
				));
				//カスタム投稿(custom)ページサイトマップ出力 コントロール
				$wp_customize->add_control( 'fit_bsSitemap_custom', array(
					'section'   => 'fit_basis_sitemap_section',
					'settings'  => 'fit_bsSitemap_custom',
					'label'     => 'カスタム投稿'.get_option('fit_custBasis_name').'ページ設定',
					'description' => '■サイトマップを表示するか選択',
					'type'      => 'select',
					'choices'   => array(
						'off' => '非表示(default)',
						'on'  => '表示',
					),
				));

				//カテゴリーと投稿の表示方法 セッティング
				$wp_customize->add_setting( 'fit_bsSitemap_customDisplay', array(
					'default'   => 'value1',
					'type' => 'option',
					'sanitize_callback' => 'fit_sanitize_select',
				));
				//カテゴリーと投稿の表示方法 コントロール
				$wp_customize->add_control( 'fit_bsSitemap_customDisplay', array(
					'section'   => 'fit_basis_sitemap_section',
					'settings'  => 'fit_bsSitemap_customDisplay',
					'description' => '■カテゴリーと投稿の表示方法を選択',
					'type'      => 'select',
					'choices'   => array(
						'value1' => '投稿とカテゴリーを統合表示(default)',
						'value2' => '投稿とカテゴリーを分割表示',
					),
				));

				//除外投稿　セッティング
				$wp_customize->add_setting( 'fit_bsSitemap_customExc', array(
					'type' => 'option',
					'sanitize_callback' => 'wp_filter_nohtml_kses',
				));
				//除外投稿　コントロール
				$wp_customize->add_control( 'fit_bsSitemap_customExc', array(
					'section'     => 'fit_basis_sitemap_section',
					'settings'    => 'fit_bsSitemap_customExc',
					'description' => '■除外投稿IDを入力<br><span class="label_blue">複数の場合は[ , ]カンマ区切り</span>',
					'type'        => 'text',
				));

				//除外カテゴリー　セッティング
				$wp_customize->add_setting( 'fit_bsSitemap_customCateExc', array(
					'type' => 'option',
					'sanitize_callback' => 'wp_filter_nohtml_kses',
				));
				//除外カテゴリー　コントロール
				$wp_customize->add_control( 'fit_bsSitemap_customCateExc', array(
					'section'     => 'fit_basis_sitemap_section',
					'settings'    => 'fit_bsSitemap_customCateExc',
					'description' => '■除外カテゴリーIDを入力<br><span class="label_blue">複数の場合は[ , ]カンマ区切り</span>',
					'type'        => 'text',
				));
			}


		//セクションの追加
		$wp_customize->add_section( 'fit_basis_separator_section', array(
			'title'       => 'タイトルセパレーター設定',
			'panel'       => 'fit_basis_panel',
			'description' => 'タイトルセパレーターの設定画面です。',
			'priority'  => 1,
		));

			//セパレーター　 セッティング
			$wp_customize->add_setting( 'fit_bsSeparator_symbol', array(
				'default'   => '│',
				'transport' => 'postMessage',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			//セパレーター コントロール
			$wp_customize->add_control( 'fit_bsSeparator_symbol', array(
				'section'     => 'fit_basis_separator_section',
				'settings'    => 'fit_bsSeparator_symbol',
				'label'       => 'タイトルセパレーターの設定',
				'description' => '■titleタグに挿入されるセパレーターを入力',
				'type'        => 'text',
			));


		//セクションの追加
		$wp_customize->add_section( 'fit_basis_pass_section', array(
			'title'       => 'パスワード保護ページ設定',
			'panel'       => 'fit_basis_panel',
			'description' => 'パスワード保護ページの設定画面です。',
			'priority'  => 1,
		));

			//パスワード保護タイトル　 セッティング
			$wp_customize->add_setting( 'fit_bsPass_title', array(
				'default'   => '続きを見るにはパスワードを入力してください。',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			//パスワード保護タイトル コントロール
			$wp_customize->add_control( 'fit_bsPass_title', array(
				'section'     => 'fit_basis_pass_section',
				'settings'    => 'fit_bsPass_title',
				'label'       => 'パスワード保護ページ設定',
				'description' => '■タイトルを入力',
				'type'        => 'text',
			));

			//パスワード保護本文　 セッティング
			$wp_customize->add_setting( 'fit_bsPass_contents', array(
				'default'   => '会員登録、もしくはメルマガ登録後に発行されるパスワードをご入力ください。',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			//パスワード保護本文 コントロール
			$wp_customize->add_control( 'fit_bsPass_contents', array(
				'section'     => 'fit_basis_pass_section',
				'settings'    => 'fit_bsPass_contents',
				'description' => '■本文を入力',
				'type'        => 'text',
			));


		//セクションの追加
		$wp_customize->add_section( 'fit_basis_contact_section', array(
			'title'       => 'お問い合わせページ設定',
			'panel'       => 'fit_basis_panel',
			'description' => 'お問い合わせページの設定画面です。',
			'priority'  => 1,
		));

			//自由入力項目のタイトル　 セッティング
			$wp_customize->add_setting( 'fit_bsContact_customTitle', array(
				'default'   => 'URL',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			//自由入力項目のタイトル コントロール
			$wp_customize->add_control( 'fit_bsContact_customTitle', array(
				'section'     => 'fit_basis_contact_section',
				'settings'    => 'fit_bsContact_customTitle',
				'label'       => 'お問い合わせページ設定',
				'description' => '■自由入力項目のタイトルを入力',
				'type'        => 'text',
			));

			//サンクス画面のメッセージ　 セッティング
			$wp_customize->add_setting( 'fit_bsContact_thanks', array(
				'default'   => 'この度はお問い合わせいただきありがとうございます。<br>メールを確認次第、担当者よりご連絡をさせていただきます。',
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			//サンクス画面のメッセージ コントロール
			$wp_customize->add_control( 'fit_bsContact_thanks', array(
				'section'     => 'fit_basis_contact_section',
				'settings'    => 'fit_bsContact_thanks',
				'description' => '■サンクス画面のメッセージを入力<br>
				<span class="label__red">タグ利用可</span>',
				'type'        => 'textarea',
			));

			//自動返信メールの冒頭　 セッティング
			$wp_customize->add_setting( 'fit_bsContact_message', array(
				'default'   => '改めて担当者よりご連絡致しますので、今しばらくお待ちください。',
				'transport' => 'postMessage',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			//自動返信メールの冒頭 コントロール
			$wp_customize->add_control( 'fit_bsContact_message', array(
				'section'     => 'fit_basis_contact_section',
				'settings'    => 'fit_bsContact_message',
				'description' => '■自動返信メールの冒頭を入力',
				'type'        => 'text',
			));


		// セクション
		$wp_customize->add_section( 'fit_basis_access_section', array(
			'title'     => 'アクセス解析設定',
			'panel'       => 'fit_basis_panel',
			'description' => 'アクセス解析の設定画面です。',
			'priority'  => 1,
		));

			// Google AnalyticsのトラッキングID セッティング
			$wp_customize->add_setting( 'fit_bsAccess_gaid', array(
				'type' => 'option',
				'transport' => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// Google AnalyticsのトラッキングID コントロール
			$wp_customize->add_control( 'fit_bsAccess_gaid', array(
				'section'   => 'fit_basis_access_section',
				'settings'  => 'fit_bsAccess_gaid',
				'label'     => 'Google AnalyticsのトラッキングID',
				'description' => '■Google AnalyticsのトラッキングIDを入力<br>入力例：UA-11111111-1',
				'type'      => 'text',
			));

			// Google Search Consoleの認証ID セッティング
			$wp_customize->add_setting( 'fit_bsAccess_gscid', array(
				'type' => 'option',
				'transport' => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// Google Search Consoleの認証ID コントロール
			$wp_customize->add_control( 'fit_bsAccess_gscid', array(
				'section'   => 'fit_basis_access_section',
				'settings'  => 'fit_bsAccess_gscid',
				'label'     => 'Google Search Consoleの認証ID',
				'description' => '■Google Search Consoleの認証IDを入力<br>(&lt;meta name="google-site-verification" content="**********" /&gt;の「**********」を入力)',
				'type'      => 'text',
			));


		// セクション
		$wp_customize->add_section( 'fit_basis_editorCss_section', array(
			'title'     => 'ビジュアルエディタCSS設定',
			'panel'       => 'fit_basis_panel',
			'description' => 'ビジュアルエディタのCSS設定画面です。',
			'priority'  => 1,
		));

			//ビジュアルエディタのCSS セッティング
			$wp_customize->add_setting( 'fit_bsEditorCss_switch', array(
				'default'   => 'on',
				'transport' => 'postMessage',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			//ビジュアルエディタのCSS コントロール
			$wp_customize->add_control( 'fit_bsEditorCss_switch', array(
				'section'   => 'fit_basis_editorCss_section',
				'settings'  => 'fit_bsEditorCss_switch',
				'label'     => 'ビジュアルエディタのCSS設定',
				'description' => '■ビジュアルエディタにテーマスタイルを適用するか選択',
				'type'      => 'select',
				'choices'   => array(
					'on'  => '実際の表示と同じスタイルにする(default)',
					'off' => '実際の表示と同じスタイルにしない',
				),
			));


		// セクション
		$wp_customize->add_section( 'fit_basis_editorBtn_section', array(
			'title'     => 'テキストエディタボタン設定',
			'panel'       => 'fit_basis_panel',
			'description' => 'テキストエディタのボタン設定画面です。',
			'priority'  => 1,
		));

			//テキストエディタのボタン設定 セッティング
			$wp_customize->add_setting( 'fit_bsEditorBtn_switch', array(
				'default'   => 'off',
				'transport' => 'postMessage',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			//テキストエディタのボタン設定 コントロール
			$wp_customize->add_control( 'fit_bsEditorBtn_switch', array(
				'section'   => 'fit_basis_editorBtn_section',
				'settings'  => 'fit_bsEditorBtn_switch',
				'label'     => 'テキストエディタのボタン設定',
				'description' => '■テキストエディタの入力補助ボタンを利用するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off'  => '利用しない(default)',
					'on1'  => '利用する(一部)',
					'on2'  => '利用する(全項目)',
				),
			));


		//セクションの追加
		$wp_customize->add_section( 'fit_basis_security_section', array(
			'title'       => 'セキュリティ関連設定',
			'panel'       => 'fit_basis_panel',
			'description' => 'セキュリティ関連の設定画面です。',
			'priority'  => 1,
		));

			//テキストエディタのボタン設定 セッティング
			$wp_customize->add_setting( 'fit_bsSecurity_login', array(
				'default'   => 'off',
				'transport' => 'postMessage',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			//テキストエディタのボタン設定 コントロール
			$wp_customize->add_control( 'fit_bsSecurity_login', array(
				'section'   => 'fit_basis_security_section',
				'settings'  => 'fit_bsSecurity_login',
				'label'     => 'セキュリティ関連設定',
				'description' => '■ログイン方法を選択',
				'type'      => 'select',
				'choices'   => array(
					'off'  => 'デフォルト(default)',
					'on'  => 'メールアドレスとパスワードでログイン',
				),
			));

		//セクションの追加
		$wp_customize->add_section( 'fit_basis_style_section', array(
			'title'       => '基本スタイル設定',
			'panel'       => 'fit_basis_panel',
			'description' => '基本スタイルの設定画面です。',
			'priority'  => 1,
		));

			// テーマカラー セッティング
			$wp_customize->add_setting( 'fit_bsStyle_themeColor', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// テーマカラー コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_bsStyle_themeColor', array(
				'section' => 'fit_basis_style_section',
				'settings' =>'fit_bsStyle_themeColor',
				'label'     => '基本スタイル設定',
				'description' => '■テーマカラーを指定',
			)));


			// 個別ページのテキストリンクカラー セッティング
			$wp_customize->add_setting( 'fit_bsStyle_linkColor', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// 個別ページのテキストリンクカラー コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_bsStyle_linkColor', array(
				'section' => 'fit_basis_style_section',
				'settings' =>'fit_bsStyle_linkColor',
				'description' => '■投稿内テキストリンク色を指定',
			)));

			// 全体背景カラー セッティング
			$wp_customize->add_setting( 'fit_bsStyle_bgColor', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// 全体背景カラー コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_bsStyle_bgColor', array(
				'section' => 'fit_basis_style_section',
				'settings' =>'fit_bsStyle_bgColor',
				'description' => '■全体の背景色を指定',
			)));

			//全体背景画像 セッティング
			$wp_customize->add_setting('fit_bsStyle_bgImg', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'fit_sanitize_image',
			));
			//全体背景画像 コントロール
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'fit_bsStyle_bgImg', array(
				'section' => 'fit_basis_style_section',
				'settings' => 'fit_bsStyle_bgImg',
				'description' => '■全体の背景画像を登録',
			)));

			// スマホ全体のフォントサイズ セッティング
			$wp_customize->add_setting( 'fit_bsStyle_fontSize', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// スマホ全体のフォントサイズ コントロール
			$wp_customize->add_control( 'fit_bsStyle_fontSize', array(
				'section'   => 'fit_basis_style_section',
				'settings'  => 'fit_bsStyle_fontSize',
				'description' => '■スマホ全体のフォントサイズを選択',
				'type'      => 'select',
				'choices'   => array(
					'off'       => '小(default)',
					't-middle'  => '中',
					't-large'   => '大',
				),
			));

			// PC全体のフォントサイズ セッティング
			$wp_customize->add_setting( 'fit_bsStyle_fontSizePc', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// PC全体のフォントサイズ コントロール
			$wp_customize->add_control( 'fit_bsStyle_fontSizePc', array(
				'section'   => 'fit_basis_style_section',
				'settings'  => 'fit_bsStyle_fontSizePc',
				'description' => '■PC全体のフォントサイズを選択',
				'type'      => 'select',
				'choices'   => array(
					'off'       => '小(default)',
					't-middle-pc'  => '中',
					't-large-pc'   => '大',
				),
			));


			// 全体のフォントファミリー セッティング
			$wp_customize->add_setting( 'fit_bsStyle_fontFamily', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 全体のフォントファミリー コントロール
			$wp_customize->add_control( 'fit_bsStyle_fontFamily', array(
				'section'   => 'fit_basis_style_section',
				'settings'  => 'fit_bsStyle_fontFamily',
				'description' => '■全体のフォントファミリーを選択',
				'type'      => 'select',
				'choices'   => array(
					'off'       => '游ゴシック体(default)',
					't-hiragino'  => 'ヒラギノ角ゴシック',
					't-meiryo'   => 'メイリオ',
					't-noto'   => 'Noto Sans JP(WEBフォント)',
				),
			));


		//セクションの追加
		$wp_customize->add_section( 'fit_basis_analysis_section', array(
			'title'       => '記事分析設定',
			'panel'       => 'fit_basis_panel',
			'description' => '記事分析の設定画面です。<br>
			（表示するにチェックを入れて「公開」をすると、管理画面の記事一覧に分析項目が表示されます。内/発リンク数分析はシステム処理に負担がかかるため、普段は非表示にし、分析が必要な時のみ表示にすることをお勧めします。）',
			'priority'  => 1,
		));


			// 総合閲覧数 セッティング
			$wp_customize->add_setting( 'fit_bsAnalysis_views', array(
				'type' => 'option',
				'transport' => 'postMessage',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 総合閲覧数 コントロール
			$wp_customize->add_control( 'fit_bsAnalysis_views', array(
				'section'   => 'fit_basis_analysis_section',
				'settings'  => 'fit_bsAnalysis_views',
				'label'     => '総合閲覧数を表示にする',
				'type'      => 'checkbox',
			));

			// 平均閲覧数 セッティング
			$wp_customize->add_setting( 'fit_bsAnalysis_averageViews', array(
				'type' => 'option',
				'transport' => 'postMessage',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 平均閲覧数 コントロール
			$wp_customize->add_control( 'fit_bsAnalysis_averageViews', array(
				'section'   => 'fit_basis_analysis_section',
				'settings'  => 'fit_bsAnalysis_averageViews',
				'label'     => '平均閲覧数を表示にする',
				'type'      => 'checkbox',
			));

			// タイトル文字数 セッティング
			$wp_customize->add_setting( 'fit_bsAnalysis_titleNumber', array(
				'type' => 'option',
				'transport' => 'postMessage',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// タイトル文字数 コントロール
			$wp_customize->add_control( 'fit_bsAnalysis_titleNumber', array(
				'section'   => 'fit_basis_analysis_section',
				'settings'  => 'fit_bsAnalysis_titleNumber',
				'label'     => 'タイトル文字数を表示にする',
				'type'      => 'checkbox',
			));

			// 本文文字数 セッティング
			$wp_customize->add_setting( 'fit_bsAnalysis_contentNumber', array(
				'type' => 'option',
				'transport' => 'postMessage',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 本文文字数 コントロール
			$wp_customize->add_control( 'fit_bsAnalysis_contentNumber', array(
				'section'   => 'fit_basis_analysis_section',
				'settings'  => 'fit_bsAnalysis_contentNumber',
				'label'     => '本文文字数を表示にする',
				'type'      => 'checkbox',
			));

			// タイトル内キーワード数 セッティング
			$wp_customize->add_setting( 'fit_bsAnalysis_titleKeyword', array(
				'type' => 'option',
				'transport' => 'postMessage',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// タイトル内キーワード数 コントロール
			$wp_customize->add_control( 'fit_bsAnalysis_titleKeyword', array(
				'section'   => 'fit_basis_analysis_section',
				'settings'  => 'fit_bsAnalysis_titleKeyword',
				'label'     => 'タイトル内キーワード数を表示にする',
				'type'      => 'checkbox',
			));

			// 本文内キーワード数 セッティング
			$wp_customize->add_setting( 'fit_bsAnalysis_contentKeyword', array(
				'type' => 'option',
				'transport' => 'postMessage',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 本文内キーワード数 コントロール
			$wp_customize->add_control( 'fit_bsAnalysis_contentKeyword', array(
				'section'   => 'fit_basis_analysis_section',
				'settings'  => 'fit_bsAnalysis_contentKeyword',
				'label'     => '本文内キーワード数を表示にする',
				'type'      => 'checkbox',
			));

			// 内リンク数 セッティング
			$wp_customize->add_setting( 'fit_bsAnalysis_contentInLink', array(
				'type' => 'option',
				'transport' => 'postMessage',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 内リンク数 コントロール
			$wp_customize->add_control( 'fit_bsAnalysis_contentInLink', array(
				'section'   => 'fit_basis_analysis_section',
				'settings'  => 'fit_bsAnalysis_contentInLink',
				'label'     => '内リンク数を表示にする',
				'type'      => 'checkbox',
			));

			// 発リンク数 セッティング
			$wp_customize->add_setting( 'fit_bsAnalysis_contentOutLink', array(
				'type' => 'option',
				'transport' => 'postMessage',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 発リンク数 コントロール
			$wp_customize->add_control( 'fit_bsAnalysis_contentOutLink', array(
				'section'   => 'fit_basis_analysis_section',
				'settings'  => 'fit_bsAnalysis_contentOutLink',
				'label'     => '発リンク数を表示にする',
				'type'      => 'checkbox',
			));

		// セクション
		$wp_customize->add_section( 'fit_basis_advanced_section', array(
			'title'     => '高度な設定',
			'panel'       => 'fit_basis_panel',
			'description' => 'header/footerを編集する高度な設定画面です。',
			'priority'  => 1,
		));

			// ヘッダー自由入力エリア セッティング
			$wp_customize->add_setting( 'fit_bsAdvanced_header', array(
				'type' => 'option',
				'sanitize_callback' => '',
			));
			// ヘッダー自由入力エリア コントロール
			$wp_customize->add_control( 'fit_bsAdvanced_header', array(
				'section'   => 'fit_basis_advanced_section',
				'settings'  => 'fit_bsAdvanced_header',
				'label'     => '■&lt;/head&gt;直上の自由入力エリア',
				'description' => '&lt;head&gt;～&lt;/head&gt;内用の自由入力エリア(CSSなどの読み込みに最適)',
				'type'      => 'textarea',
			));

			// フッター自由入力エリア セッティング
			$wp_customize->add_setting( 'fit_bsAdvanced_footer', array(
				'type' => 'option',
				'sanitize_callback' => '',
			));
			// フッター自由入力エリア コントロール
			$wp_customize->add_control( 'fit_bsAdvanced_footer', array(
				'section'   => 'fit_basis_advanced_section',
				'settings'  => 'fit_bsAdvanced_footer',
				'label'     => '■&lt;/body&gt;直上の自由入力エリア',
				'description' => '&lt;body&gt;～&lt;/body&gt;内用の自由入力エリア(JavaScriptなどの読み込みに最適)',
				'type'      => 'textarea',
			));

		// セクション
		$wp_customize->add_section( 'fit_basis_userID_section', array(
			'title'     => 'ユーザーID設定',
			'panel'       => 'fit_basis_panel',
			'description' => 'ユーザーIDの設定画面です。',
			'priority'  => 1,
		));

			// ユーザーID セッティング
			$wp_customize->add_setting( 'fit_bsUserID_set', array(
				'type' => 'option',
				'transport' => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザーID コントロール
			$wp_customize->add_control( 'fit_bsUserID_set', array(
				'section'   => 'fit_basis_userID_section',
				'settings'  => 'fit_bsUserID_set',
				'label'     => 'ユーザーID',
				'description' => '■テーマ購入時に発行されるユーザーIDを入力<br>(入力例： Fit-Theme-ThorId********************)',
				'type'      => 'text',
			));



}
add_action( 'customize_register', 'fit_basis_cutomizer' );
function get_fit_logo(){ return esc_url(get_theme_mod('fit_bsLogo_img'));}
function get_fit_noimg(){ return esc_url(get_theme_mod('fit_bsEyecatch_noimg'));}
function get_fit_bgimg(){ return esc_url(get_theme_mod('fit_bsStyle_bgImg'));}

/**
 * theme-customizer.jsで使うAjaxのURL取得用スクリプト
 */
function fit_set_ajax_url_script() {
	$url    = admin_url( 'admin-ajax.php' );

	$script = <<<EOS
<script>
function get_ajax_url() {
	return '$url';
}
</script>
EOS;

	echo $script;
}
add_action( 'customize_controls_print_footer_scripts', 'fit_set_ajax_url_script' );
