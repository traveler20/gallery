<?php
////////////////////////////////////////////////////////
//アーカイブページ設定画面
////////////////////////////////////////////////////////
function fit_archive_cutomizer( $wp_customize ) {

	//パネルの追加
	$wp_customize->add_panel( 'fit_archive_panel', array(
		'title'       => 'アーカイブページ設定[THE]',
		'priority'  => 1,
	));


		//セクションの追加
		$wp_customize->add_section( 'fit_archive_layout_section', array(
			'title'       => 'レイアウト設定',
			'panel'       => 'fit_archive_panel',
			'description' => 'レイアウト設定の画面です。',
			'priority'  => 1,
		));


			// ページレイアウト セッティング
			$wp_customize->add_setting( 'fit_archiveLayout_column', array(
				'default'   => '2',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// ページレイアウト コントロール
			$wp_customize->add_control( 'fit_archiveLayout_column', array(
				'section'   => 'fit_archive_layout_section',
				'settings'  => 'fit_archiveLayout_column',
				'label'     => 'レイアウト設定',
				'description' => '■カラムを選択',
				'type'      => 'select',
				'choices'   => array(
					'2' => '2カラム(default)',
					'1' => '1カラム',
				),
			));
			//2カラム時のサイドバー位置 セッティング
			$wp_customize->add_setting( 'fit_archiveLayout_side', array(
				'default'   => 'right',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 2カラム時のサイドバー位置 コントロール
			$wp_customize->add_control( 'fit_archiveLayout_side', array(
				'section'   => 'fit_archive_layout_section',
				'settings'  => 'fit_archiveLayout_side',
				'description' => '■2カラム時のサイドバーの位置を選択',
				'type'      => 'select',
				'choices'   => array(
					'right' => '右(default)',
					'left' => '左',
				),
			));
			//1カラム時の横幅 セッティング
			$wp_customize->add_setting( 'fit_archiveLayout_width', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 1カラム時の横幅 コントロール
			$wp_customize->add_control( 'fit_archiveLayout_width', array(
				'section'   => 'fit_archive_layout_section',
				'settings'  => 'fit_archiveLayout_width',
				'description' => '■1カラム時のメインカラムの横幅を選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '100%(default)',
					'1000' => '1000px',
					'900' => '900px',
					'800' => '800px',
					'700' => '700px',
				),
			));



		//セクションの追加
		$wp_customize->add_section( 'fit_archive_ctl_section', array(
			'title'       => 'コントローラー設定',
			'panel'       => 'fit_archive_panel',
			'description' => 'コントローラーの設定画面です。',
			'priority'  => 1,
		));

			// コントローラー表示設定 セッティング
			$wp_customize->add_setting( 'fit_archiveCtl_switch', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// コントローラー表示設定 コントロール
			$wp_customize->add_control( 'fit_archiveCtl_switch', array(
				'section'   => 'fit_archive_ctl_section',
				'settings'  => 'fit_archiveCtl_switch',
				'label'     => 'コントローラー設定',
				'description' => '■コントローラーを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '非表示(default)',
					'on'  => '表示',
				),
			));
			// コントローラーフレーム セッティング
			$wp_customize->add_setting( 'fit_archiveCtl_frame', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// コントローラーフレーム コントロール
			$wp_customize->add_control( 'fit_archiveCtl_frame', array(
				'section'   => 'fit_archive_ctl_section',
				'settings'  => 'fit_archiveCtl_frame',
				'description' => '■コントローラーのフレームを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '無し(default)',
					'controller-shadow' => 'シャドウフレーム',
					'controller-border' => 'ボーダーフレーム',
				),


			));

			// 新着・人気順ソートリンク表示設定 セッティング
			$wp_customize->add_setting( 'fit_archiveCtl_sort', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 新着・人気順ソートリンク表示設定 コントロール
			$wp_customize->add_control( 'fit_archiveCtl_sort', array(
				'section'   => 'fit_archive_ctl_section',
				'settings'  => 'fit_archiveCtl_sort',
				'label'     => '新着・人気順ソートリンクの設定',
				'description' => '■新着・人気順ソートリンクを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '非表示(default)',
					'on'  => '表示',
				),
			));
			// 新着順表記設定　セッティング
			$wp_customize->add_setting( 'fit_archiveCtl_newer', array(
				'default'   => '新着順',
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// 新着順表記設定　コントロール
			$wp_customize->add_control( 'fit_archiveCtl_newer', array(
				'section'   => 'fit_archive_ctl_section',
				'settings'  => 'fit_archiveCtl_newer',
				'description' => '■新着順の表記を変更する場合は入力',
				'type'      => 'text',
			));
			// 人気順表記設定　セッティング
			$wp_customize->add_setting( 'fit_archiveCtl_popular', array(
				'default'   => '人気順',
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// 人気順表記設定　コントロール
			$wp_customize->add_control( 'fit_archiveCtl_popular', array(
				'section'   => 'fit_archive_ctl_section',
				'settings'  => 'fit_archiveCtl_popular',
				'description' => '■人気順の表記を変更する場合は入力',
				'type'      => 'text',
			));

			// お勧めカテゴリ表示設定 セッティング
			$wp_customize->add_setting( 'fit_archiveCtl_cat', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// お勧めカテゴリ表示設定 コントロール
			$wp_customize->add_control( 'fit_archiveCtl_cat', array(
				'section'   => 'fit_archive_ctl_section',
				'settings'  => 'fit_archiveCtl_cat',
				'label'     => 'お勧めカテゴリの設定',
				'description' => '■お勧めカテゴリを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '非表示(default)',
					'on'  => '表示',
				),
			));
			// お勧めカテゴリID設定　セッティング
			$wp_customize->add_setting( 'fit_archiveCtl_catId', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// お勧めカテゴリID設定　コントロール
			$wp_customize->add_control( 'fit_archiveCtl_catId', array(
				'section'   => 'fit_archive_ctl_section',
				'settings'  => 'fit_archiveCtl_catId',
				'description' => '■表示するカテゴリIDを入力<span class="label_blue">複数の場合は[ , ]カンマ区切り</span>',
				'type'      => 'text',
			));
			// お勧めカテゴリ表記設定　セッティング
			$wp_customize->add_setting( 'fit_archiveCtl_catTitle', array(
				'default'   => 'お勧めカテゴリ',
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// お勧めカテゴリ表記設定　コントロール
			$wp_customize->add_control( 'fit_archiveCtl_catTitle', array(
				'section'   => 'fit_archive_ctl_section',
				'settings'  => 'fit_archiveCtl_catTitle',
				'description' => '■お勧めカテゴリの表記を変更する場合は入力',
				'type'      => 'text',
			));

			// レイアウト切替ボタン表示設定 セッティング
			$wp_customize->add_setting( 'fit_archiveCtl_layout', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// レイアウト切替ボタン表示設定 コントロール
			$wp_customize->add_control( 'fit_archiveCtl_layout', array(
				'section'   => 'fit_archive_ctl_section',
				'settings'  => 'fit_archiveCtl_layout',
				'label'     => 'レイアウト切替ボタンの設定',
				'description' => '■レイアウト切替ボタンを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '非表示(default)',
					'on'  => '表示',
				),
			));

			// レイアウト切替ボタンデフォルト設定 セッティング
			$wp_customize->add_setting( 'fit_archiveCtl_checked', array(
				'default'   => 'wide',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// レイアウト切替ボタンデフォルト設定 コントロール
			$wp_customize->add_control( 'fit_archiveCtl_checked', array(
				'section'   => 'fit_archive_ctl_section',
				'settings'  => 'fit_archiveCtl_checked',
				'description' => '■レイアウト切替ボタンの初期checkedを選択',
				'type'      => 'select',
				'choices'   => array(
					'wide' => 'ワイドレイアウト(default)',
					'card' => 'カードレイアウト',
					'normal' => 'ノーマルレイアウト',
				),
			));


		//セクションの追加
		$wp_customize->add_section( 'fit_archive_list_section', array(
			'title'       => '記事一覧リスト設定',
			'panel'       => 'fit_archive_panel',
			'description' => '記事一覧リストの設定画面です。',
			'priority'  => 1,
		));


			// 記事一覧リストフレーム セッティング
			$wp_customize->add_setting( 'fit_archiveList_frame', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 記事一覧リストフレーム コントロール
			$wp_customize->add_control( 'fit_archiveList_frame', array(
				'section'   => 'fit_archive_list_section',
				'settings'  => 'fit_archiveList_frame',
				'label'     => '記事一覧リスト設定',
				'description' => '■記事一覧リストのフレームを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '無し(default)',
					'archive__item-shadow' => 'シャドウフレーム',
					'archive__item-border' => 'ボーダーフレーム',
				),
			));

			// 記事一覧リスト画像アスペクト比設定 セッティング
			$wp_customize->add_setting( 'fit_archiveList_aspect', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 記事一覧リスト画像アスペクト比設定 コントロール
			$wp_customize->add_control( 'fit_archiveList_aspect', array(
				'section'   => 'fit_archive_list_section',
				'settings'  => 'fit_archiveList_aspect',
				'description' => '■画像アスペクト比を選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '16：9(default)',
					'eyecatch-43'  => '4：3',
					'eyecatch-11'  => '1：1',
					'none'  => '0：0(非表示)',
				),
			));

			//記事一覧リスト画像上のカテゴリラベル セッティング
			$wp_customize->add_setting('fit_archiveList_category', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
				));
			//記事一覧リスト画像上のカテゴリラベル コントロール
			$wp_customize->add_control('fit_archiveList_category', array(
				'section' => 'fit_archive_list_section',
				'settings' => 'fit_archiveList_category',
				'label'     => 'アイキャッチ上のカテゴリを非表示にする',
				'type'      => 'checkbox',
			));

			// 投稿日表示 セッティング
			$wp_customize->add_setting('fit_archiveList_time', array(
			    'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 投稿日表示 コントロール
			$wp_customize->add_control('fit_archiveList_time', array(
			    'section' => 'fit_archive_list_section',
				'settings' => 'fit_archiveList_time',
				'label'     => '投稿日を表示する',
				'type'      => 'checkbox',
			));

			// 更新日表示 セッティング
			$wp_customize->add_setting('fit_archiveList_update', array(
			    'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 更新日表示 コントロール
			$wp_customize->add_control('fit_archiveList_update', array(
			    'section' => 'fit_archive_list_section',
				'settings' => 'fit_archiveList_update',
				'label'     => '更新日を表示する',
				'type'      => 'checkbox',
			));

			// 閲覧数表示 セッティング
			$wp_customize->add_setting('fit_archiveList_view', array(
			    'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 閲覧数表示 コントロール
			$wp_customize->add_control('fit_archiveList_view', array(
			    'section' => 'fit_archive_list_section',
				'settings' => 'fit_archiveList_view',
				'label'     => '閲覧数を表示する(人気順表示時のみ出力)',
				'type'      => 'checkbox',
			));

			// コメント数表示 セッティング
			$wp_customize->add_setting('fit_archiveList_comment', array(
			    'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// コメント数表示 コントロール
			$wp_customize->add_control('fit_archiveList_comment', array(
			    'section' => 'fit_archive_list_section',
				'settings' => 'fit_archiveList_comment',
				'label'     => 'コメント数を表示する',
				'type'      => 'checkbox',
			));

			// 抜粋文字数 セッティング
			$wp_customize->add_setting( 'fit_archiveList_excerpt', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_number_range',
			));
			// 抜粋文字数 コントロール
			$wp_customize->add_control( 'fit_archiveList_excerpt', array(
				'section'   => 'fit_archive_list_section',
				'settings'  => 'fit_archiveList_excerpt',
				'description' => '<hr>■本文の抜粋文字数を指定<br>(20～500文字以内)',
				'type'      => 'number',
				'input_attrs' => array(
					'step'     => '1',
					'min'      => '20',
					'max'      => '500',
				),
			));

			// ボタン表示設定 セッティング
			$wp_customize->add_setting( 'fit_archiveList_btn', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// ボタン表示設定 コントロール
			$wp_customize->add_control( 'fit_archiveList_btn', array(
				'section'   => 'fit_archive_list_section',
				'settings'  => 'fit_archiveList_btn',
				'description' => '■ボタンを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '非表示(default)',
					'on'  => '表示',
				),
			));
			// ボタンテキスト セッティング
			$wp_customize->add_setting( 'fit_archiveList_btnText', array(
				'default'   => '続きを読む',
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// ボタンテキスト コントロール
			$wp_customize->add_control( 'fit_archiveList_btnText', array(
				'section'   => 'fit_archive_list_section',
				'settings'  => 'fit_archiveList_btnText',
				'description' => '■続きを読むのボタン表記を変更する場合は入力',
				'type'      => 'text',
			));

			// NEW&ピックアップリボン設定 セッティング
			$wp_customize->add_setting( 'fit_archiveList_ribbonNew', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// NEW&ピックアップリボン設定 コントロール
			$wp_customize->add_control( 'fit_archiveList_ribbonNew', array(
				'section'   => 'fit_archive_list_section',
				'settings'  => 'fit_archiveList_ribbonNew',
				'label'     => 'NEW&ピックアップリボン設定',
				'description' => '■NEWマークリボン表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '非表示(default)',
					'on' => '表示',
				),
			));

			// NEW&ピックアップリボン設定 セッティング
			$wp_customize->add_setting( 'fit_archiveList_ribbonPickup', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// NEW&ピックアップリボン設定 コントロール
			$wp_customize->add_control( 'fit_archiveList_ribbonPickup', array(
				'section'   => 'fit_archive_list_section',
				'settings'  => 'fit_archiveList_ribbonPickup',
				'description' => '■Pickupマークリボン表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '非表示(default)',
					'on' => '表示',
				),
			));

			// リボンカラー セッティング
			$wp_customize->add_setting( 'fit_archiveList_ribbonColor', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// リボンカラー コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_archiveList_ribbonColor', array(
				'section' => 'fit_archive_list_section',
				'settings' =>'fit_archiveList_ribbonColor',
				'description' => '■リボンの色を指定',
			)));

			// NEWマークアイコン セッティング
			$wp_customize->add_setting( 'fit_archiveList_newIcon', array(
				'default'   => 'icon-new',
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// NEWマークアイコン コントロール
			$wp_customize->add_control( 'fit_archiveList_newIcon', array(
				'section'   => 'fit_archive_list_section',
				'settings'  => 'fit_archiveList_newIcon',
				'description' => '■NEWマークアイコンを入力　[<a href="'.get_template_directory_uri().'/admin/template/icon_list.php" target="_blank">アイコン一覧</a>]',
				'type'      => 'text',
			));

			// Pickupマークアイコン セッティング
			$wp_customize->add_setting( 'fit_archiveList_pickupIcon', array(
				'default'   => 'icon-star-full',
				'type' => 'option',
				'sanitize_callback' => 'wp_kses_post',
			));
			// Pickupマークアイコン コントロール
			$wp_customize->add_control( 'fit_archiveList_pickupIcon', array(
				'section'   => 'fit_archive_list_section',
				'settings'  => 'fit_archiveList_pickupIcon',
				'description' => '■Pickupマークアイコンを入力　[<a href="'.get_template_directory_uri().'/admin/template/icon_list.php" target="_blank">アイコン一覧</a>]',
				'type'      => 'text',
			));


			// NEWマークを表示する日数 セッティング
			$wp_customize->add_setting( 'fit_archiveList_newNumber', array(
				'default'   => '7',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_number_range',
			));
			// NEWマークを表示する日数 コントロール
			$wp_customize->add_control( 'fit_archiveList_newNumber', array(
				'section'   => 'fit_archive_list_section',
				'settings'  => 'fit_archiveList_newNumber',
				'description' => '■NEWマークを表示する日数を指定',
				'type'      => 'number',
				'input_attrs' => array(
       		 	'step'     => '1',
        			'min'      => '1',
        			'max'      => '31',
    			),
			));


		//セクションの追加
		$wp_customize->add_section( 'fit_archive_cat_section', array(
			'title'       => 'カテゴリアーカイブ設定',
			'panel'       => 'fit_archive_panel',
			'description' => 'カテゴリアーカイブの設定画面です。',
			'priority'  => 1,
		));


			// カテゴリ見出しデザイン セッティング
			$wp_customize->add_setting( 'fit_archiveCat_headline', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// カテゴリ見出しデザイン コントロール
			$wp_customize->add_control( 'fit_archiveCat_headline', array(
				'section'   => 'fit_archive_cat_section',
				'settings'  => 'fit_archiveCat_headline',
				'label'     => '見出しエリアデザイン設定',
				'description' => '■見出しエリアのデザインを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => 'ノーマル(default：イメージ背景不可)',
					'black' => 'ブラック',
					'blackmesh' => 'ブラックメッシュ',
					'color' => 'カラー',
					'colorgray' => 'カラー + 画像グレー',

				),

			));

			// カテゴリイメージ背景表示 セッティング
			$wp_customize->add_setting('fit_archiveCat_img', array(
			    'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// カテゴリイメージ背景表示 コントロール
			$wp_customize->add_control('fit_archiveCat_img', array(
			    'section' => 'fit_archive_cat_section',
				'settings' => 'fit_archiveCat_img',
				'label'     => 'カテゴリイメージ背景を表示する',
				'type'      => 'checkbox',
			));

			// 子カテゴリリスト セッティング
			$wp_customize->add_setting( 'fit_archiveCat_child', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 子カテゴリリスト コントロール
			$wp_customize->add_control( 'fit_archiveCat_child', array(
				'section'   => 'fit_archive_cat_section',
				'settings'  => 'fit_archiveCat_child',
				'description' => '■子カテゴリリストを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '非表示(default)',
					'on' => '表示',
				),

			));

			// 自由コンテンツ表示エリアフレーム セッティング
			$wp_customize->add_setting( 'fit_archiveCat_frame', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 自由コンテンツ表示エリアフレーム コントロール
			$wp_customize->add_control( 'fit_archiveCat_frame', array(
				'section'   => 'fit_archive_cat_section',
				'settings'  => 'fit_archiveCat_frame',
				'label'     => '自由コンテンツ表示エリア設定',
				'description' => '■自由コンテンツ表示エリアのフレームを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '無し(default)',
					'u-shadow' => 'シャドウフレーム',
					'u-border' => 'ボーダーフレーム',
				),

			));



		//セクションの追加
		$wp_customize->add_section( 'fit_archive_tag_section', array(
			'title'       => 'タグアーカイブ設定',
			'panel'       => 'fit_archive_panel',
			'description' => 'タグアーカイブの設定画面です。',
			'priority'  => 1,
		));


			// タグ見出しデザイン セッティング
			$wp_customize->add_setting( 'fit_archiveTag_headline', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// タグ見出しデザイン コントロール
			$wp_customize->add_control( 'fit_archiveTag_headline', array(
				'section'   => 'fit_archive_tag_section',
				'settings'  => 'fit_archiveTag_headline',
				'label'     => '見出しエリアデザイン設定',
				'description' => '■見出しエリアのデザインを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => 'ノーマル(default：イメージ背景不可)',
					'black' => 'ブラック',
					'blackmesh' => 'ブラックメッシュ',
					'color' => 'カラー',
					'colorgray' => 'カラー + 画像グレー',
				),

			));

			// タグイメージ背景表示 セッティング
			$wp_customize->add_setting('fit_archiveTag_img', array(
			    'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// タグイメージ背景表示 コントロール
			$wp_customize->add_control('fit_archiveTag_img', array(
			    'section' => 'fit_archive_tag_section',
				'settings' => 'fit_archiveTag_img',
				'label'     => 'カテゴリイメージ背景を表示する',
				'type'      => 'checkbox',
			));

			// 自由コンテンツ表示エリアフレーム セッティング
			$wp_customize->add_setting( 'fit_archiveTag_frame', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 自由コンテンツ表示エリアフレーム コントロール
			$wp_customize->add_control( 'fit_archiveTag_frame', array(
				'section'   => 'fit_archive_tag_section',
				'settings'  => 'fit_archiveTag_frame',
				'label'     => '自由コンテンツ表示エリア設定',
				'description' => '■自由コンテンツ表示エリアのフレームを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '無し(default)',
					'u-shadow' => 'シャドウフレーム',
					'u-border' => 'ボーダーフレーム',
				),

			));

}
add_action( 'customize_register', 'fit_archive_cutomizer' );
