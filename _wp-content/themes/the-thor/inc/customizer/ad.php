<?php
////////////////////////////////////////////////////////
//広告設定画面
////////////////////////////////////////////////////////
function fit_ad_cutomizer( $wp_customize ) {


	//パネルの追加
	$wp_customize->add_panel( 'fit_ad_panel', array(
		'title'       => '広告設定[THE]',
		'priority'  => 1,
	));

		// セクション
		$wp_customize->add_section( 'fit_ad_infeed_section', array(
			'title'     => 'アーカイブ用広告設定',
			'priority'  => 1,
			'panel'       => 'fit_ad_panel',
			'description' => 'アーカイブ用の広告画面です。<br>
			(「カスタマイザー」→「アーカイブページ設定」→「コントローラー設定」の『レイアウト切替ボタン』が【表示】になっていると、アーカイブ用インフィード広告は表示されません)',
		));

			// アーカイブインフィード広告 セッティング
			$wp_customize->add_setting( 'fit_adInfeed_tagPc1', array(
				'type' => 'option',
				'sanitize_callback' => '',
			));
			// アーカイブインフィード広告 コントロール
			$wp_customize->add_control( 'fit_adInfeed_tagPc1', array(
				'section'   => 'fit_ad_infeed_section',
				'settings'  => 'fit_adInfeed_tagPc1',
				'label'     => 'アーカイブ用インフィード広告設定',
				'description' => '■ワイドレイアウト用(PC版)広告タグを入力',
				'type'      => 'textarea',
			));

			// アーカイブインフィード広告 セッティング
			$wp_customize->add_setting( 'fit_adInfeed_tagPc2', array(
				'type' => 'option',
				'sanitize_callback' => '',
			));
			// アーカイブインフィード広告 コントロール
			$wp_customize->add_control( 'fit_adInfeed_tagPc2', array(
				'section'   => 'fit_ad_infeed_section',
				'settings'  => 'fit_adInfeed_tagPc2',
				'description' => '■カードレイアウト用(PC版)広告タグを入力',
				'type'      => 'textarea',
			));

			// アーカイブインフィード広告 セッティング
			$wp_customize->add_setting( 'fit_adInfeed_tagPc3', array(
				'type' => 'option',
				'sanitize_callback' => '',
			));
			// アーカイブインフィード広告 コントロール
			$wp_customize->add_control( 'fit_adInfeed_tagPc3', array(
				'section'   => 'fit_ad_infeed_section',
				'settings'  => 'fit_adInfeed_tagPc3',
				'description' => '■ノーマルレイアウト用(PC版)広告タグを入力',
				'type'      => 'textarea',
			));

			// アーカイブインフィード広告 セッティング
			$wp_customize->add_setting( 'fit_adInfeed_tagSp1', array(
				'type' => 'option',
				'sanitize_callback' => '',
			));
			// アーカイブインフィード広告 コントロール
			$wp_customize->add_control( 'fit_adInfeed_tagSp1', array(
				'section'   => 'fit_ad_infeed_section',
				'settings'  => 'fit_adInfeed_tagSp1',
				'description' => '■ワイドレイアウト用(スマホ版)広告タグを入力',
				'type'      => 'textarea',
			));

			// アーカイブインフィード広告 セッティング
			$wp_customize->add_setting( 'fit_adInfeed_tagSp2', array(
				'type' => 'option',
				'sanitize_callback' => '',
			));
			// アーカイブインフィード広告 コントロール
			$wp_customize->add_control( 'fit_adInfeed_tagSp2', array(
				'section'   => 'fit_ad_infeed_section',
				'settings'  => 'fit_adInfeed_tagSp2',
				'description' => '■ノーマルレイアウト用(スマホ版)広告タグを入力',
				'type'      => 'textarea',
			));



			// アーカイブインフィード広告表示順位 セッティング
			$wp_customize->add_setting( 'fit_adInfeed_number', array(
				'default'   => '1',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_number_range',
			));
			// アーカイブインフィード広告表示順位 コントロール
			$wp_customize->add_control( 'fit_adInfeed_number', array(
				'section'   => 'fit_ad_infeed_section',
				'settings'  => 'fit_adInfeed_number',
				'description' => '■1つ目の広告を何番目に表示するか指定',
				'type'      => 'number',
				'input_attrs' => array(
        			'step'     => '1',
        			'min'      => '1',
    			),
			));

			// アーカイブインフィード広告表示順位 セッティング
			$wp_customize->add_setting( 'fit_adInfeed_number2', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_number_range',
			));
			// アーカイブインフィード広告表示順位 コントロール
			$wp_customize->add_control( 'fit_adInfeed_number2', array(
				'section'   => 'fit_ad_infeed_section',
				'settings'  => 'fit_adInfeed_number2',
				'description' => '■2つ目の広告を何番目に表示するか指定',
				'type'      => 'number',
				'input_attrs' => array(
        			'step'     => '1',
        			'min'      => '1',
    			),
			));

			// アーカイブインフィード広告表示制限 セッティング
			$wp_customize->add_setting( 'fit_adInfeed_first', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// アーカイブインフィード広告表示制限 コントロール
			$wp_customize->add_control( 'fit_adInfeed_first', array(
				'section'   => 'fit_ad_infeed_section',
				'settings'  => 'fit_adInfeed_first',
				'label'     => '1ページ目のみに広告を表示する',
				'type'      => 'checkbox',
			));

		// セクション
		$wp_customize->add_section( 'fit_ad_post_section', array(
			'title'     => '個別ページ用広告設定',
			'priority'  => 1,
			'panel'       => 'fit_ad_panel',
			'description' => '個別ページ用広告の画面です。',
		));

			// 記事内広告 セッティング
			$wp_customize->add_setting( 'fit_adPost_tag', array(
				'type' => 'option',
				'sanitize_callback' => '',
			));
			// 記事内広告 コントロール
			$wp_customize->add_control( 'fit_adPost_tag', array(
				'section'   => 'fit_ad_post_section',
				'settings'  => 'fit_adPost_tag',
				'label'     => '記事内広告の設定',
				'description' => '■AdSense等の記事内広告タグを入力<br>
				(記事に[adcode]と記入すると、投稿内にAdSense等の広告を表示できます)',
				'type'      => 'textarea',
			));

			// 記事内広告最初のhタグの手前に表示 セッティング
			$wp_customize->add_setting(
				'fit_adPost_hFirst',
				array(
					'type'              => 'option',
					'sanitize_callback' => 'fit_sanitize_checkbox_ret_one_or_blank',
				)
			);
			// 記事内広告最初のhタグの手前に表示 コントロール
			$wp_customize->add_control(
				'fit_adPost_hFirst',
				array(
					'section'  => 'fit_ad_post_section',
					'settings' => 'fit_adPost_hFirst',
					'label'    => '最初のhタグの手前に表示する',
					'type'     => 'checkbox',
				)
			);

			// 記事内広告2番目のhタグの手前に表示 セッティング
			$wp_customize->add_setting(
				'fit_adPost_hSecond',
				array(
					'type'              => 'option',
					'sanitize_callback' => 'fit_sanitize_checkbox_ret_one_or_blank',
				)
			);
			// 記事内広告2番目のhタグの手前に表示 コントロール
			$wp_customize->add_control(
				'fit_adPost_hSecond',
				array(
					'section'  => 'fit_ad_post_section',
					'settings' => 'fit_adPost_hSecond',
					'label'    => '2番目のhタグの手前に表示する',
					'type'     => 'checkbox',
				)
			);

			// 記事内広告3番目のhタグの手前に表示 セッティング
			$wp_customize->add_setting(
				'fit_adPost_hThird',
				array(
					'type'              => 'option',
					'sanitize_callback' => 'fit_sanitize_checkbox_ret_one_or_blank',
				)
			);
			// 記事内広告3番目のhタグの手前に表示 コントロール
			$wp_customize->add_control(
				'fit_adPost_hThird',
				array(
					'section'  => 'fit_ad_post_section',
					'settings' => 'fit_adPost_hThird',
					'label'    => '3番目のhタグの手前に表示する',
					'type'     => 'checkbox',
				)
			);

			// 記事内広告4番目のhタグの手前に表示 セッティング
			$wp_customize->add_setting(
				'fit_adPost_hFourth',
				array(
					'type'              => 'option',
					'sanitize_callback' => 'fit_sanitize_checkbox_ret_one_or_blank',
				)
			);
			// 記事内広告4番目のhタグの手前に表示 コントロール
			$wp_customize->add_control(
				'fit_adPost_hFourtth',
				array(
					'section'  => 'fit_ad_post_section',
					'settings' => 'fit_adPost_hFourth',
					'label'    => '4番目のhタグの手前に表示する',
					'type'     => 'checkbox',
				)
			);

			// 記事内広告5番目のhタグの手前に表示 セッティング
			$wp_customize->add_setting(
				'fit_adPost_hFifth',
				array(
					'type'              => 'option',
					'sanitize_callback' => 'fit_sanitize_checkbox_ret_one_or_blank',
				)
			);
			// 記事内広告5番目のhタグの手前に表示 コントロール
			$wp_customize->add_control(
				'fit_adPost_hFifth',
				array(
					'section'  => 'fit_ad_post_section',
					'settings' => 'fit_adPost_hFifth',
					'label'    => '5番目のhタグの手前に表示する',
					'type'     => 'checkbox',
				)
			);

			// 背景スタイル無効 セッティング
			$wp_customize->add_setting( 'fit_adPost_style', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 背景スタイル無効 コントロール
			$wp_customize->add_control( 'fit_adPost_style', array(
				'section'   => 'fit_ad_post_section',
				'settings'  => 'fit_adPost_style',
				'label'     => '背景スタイルを無効にする',
				'type'      => 'checkbox',
			));

			// 広告表記設定　セッティング
			$wp_customize->add_setting( 'fit_adPost_text', array(
				'default'   => '広告',
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// 広告表記設定　コントロール
			$wp_customize->add_control( 'fit_adPost_text', array(
				'section'   => 'fit_ad_post_section',
				'settings'  => 'fit_adPost_text',
				'description' => '■広告の表記を変更する場合は入力',
				'type'      => 'text',
			));


			// 記事下用ダブル広告(左) セッティング
			$wp_customize->add_setting( 'fit_adPost_doubleLeft', array(
				'type' => 'option',
				'sanitize_callback' => '',
			));
			// 記事下用ダブル広告(左) コントロール
			$wp_customize->add_control( 'fit_adPost_doubleLeft', array(
				'section'   => 'fit_ad_post_section',
				'settings'  => 'fit_adPost_doubleLeft',
				'label'     => '記事下用ダブルレクタングル広告',
				'description' => '■左に表示する広告タグを入力',
				'type'      => 'textarea',
			));
			// 記事下用ダブル広告(右) セッティング
			$wp_customize->add_setting( 'fit_adPost_doubleRight', array(
				'type' => 'option',
				'sanitize_callback' => '',
			));
			// 記事下用ダブル広告(右) コントロール
			$wp_customize->add_control( 'fit_adPost_doubleRight', array(
				'section'   => 'fit_ad_post_section',
				'settings'  => 'fit_adPost_doubleRight',
				'description' => '■右に表示する広告タグを入力(スマホ非表示)',
				'type'      => 'textarea',
			));

			// 背景スタイル無効 セッティング
			$wp_customize->add_setting( 'fit_adPost_styleR', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 背景スタイル無効 コントロール
			$wp_customize->add_control( 'fit_adPost_styleR', array(
				'section'   => 'fit_ad_post_section',
				'settings'  => 'fit_adPost_styleR',
				'label'     => '背景スタイルを無効にする',
				'type'      => 'checkbox',
			));

			// 広告表記設定　セッティング
			$wp_customize->add_setting( 'fit_adPost_textR', array(
				'default'   => '広告',
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// 広告表記設定　コントロール
			$wp_customize->add_control( 'fit_adPost_textR', array(
				'section'   => 'fit_ad_post_section',
				'settings'  => 'fit_adPost_textR',
				'description' => '■広告の表記を変更する場合は入力',
				'type'      => 'text',
			));


}
add_action( 'customize_register', 'fit_ad_cutomizer' );
