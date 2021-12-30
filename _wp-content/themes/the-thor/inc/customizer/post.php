<?php
////////////////////////////////////////////////////////
//投稿ページ設定画面
////////////////////////////////////////////////////////
function fit_post_cutomizer( $wp_customize ) {

	//パネルの追加
	$wp_customize->add_panel( 'fit_post_panel', array(
		'title'       => '投稿ページ設定[THE]',
		'priority'  => 1,
	));

		//セクションの追加
		$wp_customize->add_section( 'fit_post_layout_section', array(
			'title'       => 'レイアウト設定',
			'panel'       => 'fit_post_panel',
			'description' => 'レイアウト設定の画面です。',
			'priority'  => 1,
		));


			// ページレイアウト セッティング
			$wp_customize->add_setting( 'fit_postLayout_column', array(
				'default'   => '2',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// ページレイアウト コントロール
			$wp_customize->add_control( 'fit_postLayout_column', array(
				'section'   => 'fit_post_layout_section',
				'settings'  => 'fit_postLayout_column',
				'label'     => 'レイアウト設定',
				'description' => '■カラムを選択',
				'type'      => 'select',
				'choices'   => array(
					'2' => '2カラム(default)',
					'1' => '1カラム',
				),
			));
			//2カラム時のサイドバー位置 セッティング
			$wp_customize->add_setting( 'fit_postLayout_side', array(
				'default'   => 'right',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 2カラム時のサイドバー位置 コントロール
			$wp_customize->add_control( 'fit_postLayout_side', array(
				'section'   => 'fit_post_layout_section',
				'settings'  => 'fit_postLayout_side',
				'description' => '■2カラム時のサイドバーの位置を選択',
				'type'      => 'select',
				'choices'   => array(
					'right' => '右(default)',
					'left' => '左',
				),
			));
			//1カラム時の横幅 セッティング
			$wp_customize->add_setting( 'fit_postLayout_width', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 1カラム時の横幅 コントロール
			$wp_customize->add_control( 'fit_postLayout_width', array(
				'section'   => 'fit_post_layout_section',
				'settings'  => 'fit_postLayout_width',
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
		$wp_customize->add_section( 'fit_post_style_section', array(
			'title'       => 'スタイル設定',
			'panel'       => 'fit_post_panel',
			'description' => 'スタイル設定画面です。',
			'priority'  => 1,
		));

			// コンテンツフレーム セッティング
			$wp_customize->add_setting( 'fit_postStyle_frame', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// コンテンツフレーム コントロール
			$wp_customize->add_control( 'fit_postStyle_frame', array(
				'section'   => 'fit_post_style_section',
				'settings'  => 'fit_postStyle_frame',
				'label'     => 'フレーム設定',
				'description' => '■コンテンツフレームを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '無し(default)',
					'u-shadow' => 'シャドウフレーム',
					'u-border' => 'ボーダーフレーム',
				),
			));

			// ページタイトルデザイン セッティング
			$wp_customize->add_setting( 'fit_postStyle_headline', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// ページタイトルデザイン コントロール
			$wp_customize->add_control( 'fit_postStyle_headline', array(
				'section'   => 'fit_post_style_section',
				'settings'  => 'fit_postStyle_headline',
				'label'     => 'ページタイトルデザイン設定',
				'description' => '■ページタイトルデザインを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => 'ノーマル(default)',
					'none' => 'ノーマル(アイキャッチ無し)',
					'viral' => 'バイラル風',

				),
			));

			// ページタイトルデザイン背景画像マスク セッティング
			$wp_customize->add_setting( 'fit_postStyle_mask', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// ページタイトルデザイン背景画像マスク コントロール
			$wp_customize->add_control( 'fit_postStyle_mask', array(
				'section'   => 'fit_post_style_section',
				'settings'  => 'fit_postStyle_mask',
				'description' => '■画像のマスクを選択(バイラル風選択時のみ有効)',
				'type'      => 'select',
				'choices'   => array(
					'off' => '無し(default)',
					'black' => 'ブラック',
					'blackmesh' => 'ブラックメッシュ',
					'color' => 'カラー',
					'colorgray' => 'カラー + 画像グレー',
				),
			));



			// ページタイトル画像アスペクト比設定 セッティング
			$wp_customize->add_setting( 'fit_postStyle_aspect', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// ページタイトル画像アスペクト比設定 コントロール
			$wp_customize->add_control( 'fit_postStyle_aspect', array(
				'section'   => 'fit_post_style_section',
				'settings'  => 'fit_postStyle_aspect',
				'description' => '■画像アスペクト比を選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '16：9(default)',
					'eyecatch-43'  => '4：3',
					'eyecatch-11'  => '1：1',
				),
			));

			//ページタイトル画像上のカテゴリラベル セッティング
			$wp_customize->add_setting('fit_postStyle_category', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
    		));
			//ページタイトル画像上のカテゴリラベル コントロール
			$wp_customize->add_control('fit_postStyle_category', array(
				'section' => 'fit_post_style_section',
				'settings' => 'fit_postStyle_category',
				'label'     => 'アイキャッチ上のカテゴリを非表示にする',
				'type'      => 'checkbox',
			));

			// 投稿日表示 セッティング
			$wp_customize->add_setting('fit_postStyle_time', array(
			    'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 投稿日表示 コントロール
			$wp_customize->add_control('fit_postStyle_time', array(
			    'section' => 'fit_post_style_section',
				'settings' => 'fit_postStyle_time',
				'label'     => '投稿日を表示する',
				'type'      => 'checkbox',
			));

			// 更新日表示 セッティング
			$wp_customize->add_setting('fit_postStyle_update', array(
			    'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 更新日表示 コントロール
			$wp_customize->add_control('fit_postStyle_update', array(
			    'section' => 'fit_post_style_section',
				'settings' => 'fit_postStyle_update',
				'label'     => '更新日を表示する',
				'type'      => 'checkbox',
			));

			// 閲覧数表示 セッティング
			$wp_customize->add_setting('fit_postStyle_view', array(
			    'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 閲覧数表示 コントロール
			$wp_customize->add_control('fit_postStyle_view', array(
			    'section' => 'fit_post_style_section',
				'settings' => 'fit_postStyle_view',
				'label'     => '閲覧数を表示する',
				'type'      => 'checkbox',
			));

			// コメント数表示 セッティング
			$wp_customize->add_setting('fit_postStyle_comment', array(
			    'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// コメント数表示 コントロール
			$wp_customize->add_control('fit_postStyle_comment', array(
			    'section' => 'fit_post_style_section',
				'settings' => 'fit_postStyle_comment',
				'label'     => 'コメント数を表示する',
				'type'      => 'checkbox',
			));



		//セクションの追加
		$wp_customize->add_section( 'fit_post_outline_section', array(
			'title'       => '目次設定',
			'panel'       => 'fit_post_panel',
			'description' => '目次の設定画面です。<br>(目次は記事内の最初のhタグの手前に自動で挿入されます。※ショートコード[outline]で好きな位置に表示が可能)',
			'priority'  => 1,
		));

			// 目次の表示/非表示 セッティング
			$wp_customize->add_setting( 'fit_postOutline_switch', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 目次の表示/非表示 コントロール
			$wp_customize->add_control( 'fit_postOutline_switch', array(
				'section'   => 'fit_post_outline_section',
				'settings'  => 'fit_postOutline_switch',
				'label'     => '目次の設定',
				'description' => '■目次を表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '表示しない(default)',
					'on'  => '表示する',
				),
			));

			// 目次を表示するための最小見出し数 セッティング
			$wp_customize->add_setting( 'fit_postOutline_number', array(
				'default'   => '1',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_number_range',
			));
			// 目次を表示するための最小見出し数 コントロール
			$wp_customize->add_control( 'fit_postOutline_number', array(
				'section'   => 'fit_post_outline_section',
				'settings'  => 'fit_postOutline_number',
				'description' => '■目次を表示するための最小見出し数を指定',
				'type'      => 'number',
				'input_attrs' => array(
       		 	'step'     => '1',
        			'min'      => '1',
        			'max'      => '10',
    			),
			));

			// 目次に表示する見出しレベル セッティング
			$wp_customize->add_setting( 'fit_postOutline_hNumber', array(
				'default'   => '5',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_number_range',
			));
			// 目次に表示する見出しレベル コントロール
			$wp_customize->add_control( 'fit_postOutline_hNumber', array(
				'section'   => 'fit_post_outline_section',
				'settings'  => 'fit_postOutline_hNumber',
				'description' => '■目次に表示する見出しのレベルを指定',
				'type'      => 'number',
				'input_attrs' => array(
       		 	'step'     => '1',
        			'min'      => '2',
        			'max'      => '5',
    			),
			));

			// 目次パネルデフォルト設定 セッティング
			$wp_customize->add_setting('fit_postOutline_close', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 目次パネルデフォルト設定 コントロール
			$wp_customize->add_control('fit_postOutline_close', array(
				'section' => 'fit_post_outline_section',
				'settings' => 'fit_postOutline_close',
				'label'     => '目次パネルをデフォルトで閉じておく',
				'type'      => 'checkbox',
			));


		//セクションの追加
		$wp_customize->add_section( 'fit_post_share_section', array(
			'title'       => 'シェアボタン設定',
			'panel'       => 'fit_post_panel',
			'description' => 'シェアボタンの設定画面です。',
			'priority'  => 1,
		));

			// 上部シェアボタンの表示/非表示 セッティング
			$wp_customize->add_setting( 'fit_postShare_top', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 上部シェアボタンの表示/非表示 コントロール
			$wp_customize->add_control( 'fit_postShare_top', array(
				'section'   => 'fit_post_share_section',
				'settings'  => 'fit_postShare_top',
				'label'     => 'シェアボタンの表示/非表示設定',
				'description' => '■上部にシェアボタンを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '表示しない(default)',
					'on'  => '表示する',
				),
			));

			// 下部シェアボタンの表示/非表示 セッティング
			$wp_customize->add_setting( 'fit_postShare_bottom', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 下部シェアボタンの表示/非表示 コントロール
			$wp_customize->add_control( 'fit_postShare_bottom', array(
				'section'   => 'fit_post_share_section',
				'settings'  => 'fit_postShare_bottom',
				'description' => '■下部にシェアボタンを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '表示しない(default)',
					'on'  => '表示する',
				),
			));

			//Facebookセッティング
			$wp_customize->add_setting('fit_postShare[facebook]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			//Facebookコントロール
			$wp_customize->add_control('fit_postShare_facebook', array(
   		     'section' => 'fit_post_share_section',
   		     'settings' => 'fit_postShare[facebook]',
    		    'label'     => 'Facebookボタンを表示する',
    		    'type'      => 'checkbox',
    		));

			//Twitterセッティング
			$wp_customize->add_setting('fit_postShare[twitter]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			//Twitterコントロール
			$wp_customize->add_control('fit_postShare_twitter', array(
   		     'section' => 'fit_post_share_section',
   		     'settings' => 'fit_postShare[twitter]',
  		      'label'     => 'Twitterボタンを表示する',
  		      'type'      => 'checkbox',
			));

			//Google+セッティング
			$wp_customize->add_setting('fit_postShare[google]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			//Google+コントロール
			$wp_customize->add_control('fit_postShare_google', array(
   		     'section' => 'fit_post_share_section',
    		    'settings' => 'fit_postShare[google]',
    		    'label'     => 'Google+ボタンを表示する',
    		    'type'      => 'checkbox',
			));

			//はてぶセッティング
			$wp_customize->add_setting('fit_postShare[hatebu]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			//はてぶコントロール
			$wp_customize->add_control('fit_postShare_hatebu', array(
   		     'section' => 'fit_post_share_section',
   		     'settings' => 'fit_postShare[hatebu]',
   		     'label'     => 'はてぶボタンを表示する',
   		     'type'      => 'checkbox',
			));

			//Pocketセッティング
			$wp_customize->add_setting('fit_postShare[pocket]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			//Pocketコントロール
			$wp_customize->add_control('fit_postShare_pocket', array(
   		     'section' => 'fit_post_share_section',
   		     'settings' => 'fit_postShare[pocket]',
   		     'label'     => 'Pocketボタンを表示する',
   		     'type'      => 'checkbox',
			));

			//LINEセッティング
			$wp_customize->add_setting('fit_postShare[line]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
    		));
			//LINEコントロール
			$wp_customize->add_control('fit_postShare_line', array(
       		 'section' => 'fit_post_share_section',
      		  'settings' => 'fit_postShare[line]',
      		  'label'     => 'LINEボタンを表示する',
      		  'type'      => 'checkbox',
			));

			//LinkedInセッティング
			$wp_customize->add_setting('fit_postShare[linkedin]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
    		));
			//LinkedInコントロール
			$wp_customize->add_control('fit_postShare_linkedin', array(
       		 'section' => 'fit_post_share_section',
      		  'settings' => 'fit_postShare[linkedin]',
      		  'label'     => 'LinkedInボタンを表示する',
      		  'type'      => 'checkbox',
			));

			//Pinterestセッティング
			$wp_customize->add_setting('fit_postShare[pinterest]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
    		));
			//Pinterestコントロール
			$wp_customize->add_control('fit_postShare_pinterest', array(
       		 'section' => 'fit_post_share_section',
      		  'settings' => 'fit_postShare[pinterest]',
      		  'label'     => 'Pinterestボタンを表示する',
      		  'type'      => 'checkbox',
			));

		//セクションの追加
		$wp_customize->add_section( 'fit_post_sns_section', array(
			'title'       => 'フォローボタン設定',
			'panel'       => 'fit_post_panel',
			'description' => 'フォローボタンの設定画面です。',
			'priority'  => 1,
		));

			// フォローボタンの表示/非表示 セッティング
			$wp_customize->add_setting( 'fit_postSns_switch', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// フォローボタンの表示/非表示 コントロール
			$wp_customize->add_control( 'fit_postSns_switch', array(
				'section'   => 'fit_post_sns_section',
				'settings'  => 'fit_postSns_switch',
				'label'     => 'フォローボタンの表示/非表示設定',
				'description' => '■フォローボタンを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '表示しない(default)',
					'on'  => '表示する',
				),
			));

			// タイトル セッティング
			$wp_customize->add_setting( 'fit_postSns_title', array(
			    'default'   => '最新情報をチェックしよう！',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// タイトル コントロール
			$wp_customize->add_control( 'fit_postSns_title', array(
				'section'   => 'fit_post_sns_section',
				'settings'  => 'fit_postSns_title',
				'description' => '■タイトルを入力',
				'type'      => 'text',
			));

			// 表示順 セッティング
			$wp_customize->add_setting( 'fit_postSns_order', array(
				'default'   => '1',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_number',
			));
			// 表示順 コントロール
			$wp_customize->add_control( 'fit_postSns_order', array(
				'section'   => 'fit_post_sns_section',
				'settings'  => 'fit_postSns_order',
				'description' => '■表示順の指定',
				'type'      => 'number',
			));


		//セクションの追加
		$wp_customize->add_section( 'fit_post_cta_section', array(
			'title'       => '記事下CTA設定',
			'panel'       => 'fit_post_panel',
			'description' => '記事下CTAの設定画面です。',
			'priority'  => 1,
		));

			// 記事下CTAの表示/非表示 セッティング
			$wp_customize->add_setting( 'fit_postCta_switch', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 記事下CTAの表示/非表示 コントロール
			$wp_customize->add_control( 'fit_postCta_switch', array(
				'section'   => 'fit_post_cta_section',
				'settings'  => 'fit_postCta_switch',
				'label'     => '記事下CTA設定',
				'description' => '■記事下CTAを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '表示しない(default)',
					'on'  => '表示する',
				),
			));

			// 記事下CTAのスタイル セッティング
			$wp_customize->add_setting( 'fit_postCta_style', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 記事下CTAのスタイル コントロール
			$wp_customize->add_control( 'fit_postCta_style', array(
				'section'   => 'fit_post_cta_section',
				'settings'  => 'fit_postCta_style',
				'label'     => 'デザイン設定',
				'description' => '■デザインを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => 'フレーム無し[カラー:無](default)',
					'u-shadow' => 'シャドウフレーム[カラー:無]',
					'u-border'  => 'ボーダーフレーム[カラー:線]',
					'postcta-bg'  => 'べた塗背景(文字白)[カラー:背景]',
				),
			));

			// 記事下CTAのカラー セッティング
			$wp_customize->add_setting( 'fit_postCta_color', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// 記事下CTAのカラー コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_postCta_color', array(
				'section' => 'fit_post_cta_section',
				'settings' =>'fit_postCta_color',
				'description' => '■カラー',
			)));


			// 記事下CTAボックスのタイトル セッティング
			$wp_customize->add_setting( 'fit_postCta_id', array(
				'type' => 'option',
				'transport' => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// 記事下CTAボックスのタイトル コントロール
			$wp_customize->add_control( 'fit_postCta_id', array(
				'section'   => 'fit_post_cta_section',
				'settings'  => 'fit_postCta_id',
				'label'     => 'デフォルトCTAコンテンツ設定',
				'description' => '■デフォルトで表示するCTAのIDを入力',
				'type'      => 'text',
			));



		//セクションの追加
		$wp_customize->add_section( 'fit_post_prevNext_section', array(
			'title'       => 'Prev Next記事設定',
			'panel'       => 'fit_post_panel',
			'description' => 'Prev Next記事の設定画面です。',
			'priority'  => 1,
		));

			// 前次記事の表示/非表示 セッティング
			$wp_customize->add_setting( 'fit_postPrevNext_switch', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 前次記事の表示/非表示 コントロール
			$wp_customize->add_control( 'fit_postPrevNext_switch', array(
				'section'   => 'fit_post_prevNext_section',
				'settings'  => 'fit_postPrevNext_switch',
				'label'     => 'Prev Next記事の設定',
				'description' => '■Prev Next記事を表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '表示しない(default)',
					'on' => '表示する',
				),
			));

			// 前次記事の投稿日 セッティング
			$wp_customize->add_setting( 'fit_postPrevNext_time', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 前次記事の投稿日 コントロール
			$wp_customize->add_control( 'fit_postPrevNext_time', array(
				'section'   => 'fit_post_prevNext_section',
				'settings'  => 'fit_postPrevNext_time',
				'description' => '■投稿日を表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '表示しない(default)',
					'on' => '表示する',
				),
			));

			// ネクスト設定 セッティング
			$wp_customize->add_setting( 'fit_postPrevNext_next', array(
				'default'   => 'Next',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ネクスト設定 コントロール
			$wp_customize->add_control( 'fit_postPrevNext_next', array(
				'section'   => 'fit_post_prevNext_section',
				'settings'  => 'fit_postPrevNext_next',
				'description' => '■次の記事へのタイトルを入力',
				'type'      => 'text',
			));

			// プレビュー設定 セッティング
			$wp_customize->add_setting( 'fit_postPrevNext_prev', array(
				'default'   => 'Prev',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ネクスト設定 コントロール
			$wp_customize->add_control( 'fit_postPrevNext_prev', array(
				'section'   => 'fit_post_prevNext_section',
				'settings'  => 'fit_postPrevNext_prev',
				'description' => '■前の記事へのタイトルを入力',
				'type'      => 'text',
			));

			// 記事がありません設定 セッティング
			$wp_customize->add_setting( 'fit_postPrevNext_text', array(
				'default'   => '記事がありません',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// 記事がありません設定 コントロール
			$wp_customize->add_control( 'fit_postPrevNext_text', array(
				'section'   => 'fit_post_prevNext_section',
				'settings'  => 'fit_postPrevNext_text',
				'description' => '■記事がない時のテキストを入力',
				'type'      => 'text',
			));

			// 前次記事のカテゴリ限定機能 セッティング
			$wp_customize->add_setting( 'fit_postPrevNext_category', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 前次記事のカテゴリ限定機能 コントロール
			$wp_customize->add_control( 'fit_postPrevNext_category', array(
				'section'   => 'fit_post_prevNext_section',
				'settings'  => 'fit_postPrevNext_category',
				'label'     => '同一カテゴリのPrev Next記事のみを表示する',
				'type'      => 'checkbox',
			));

			// 表示順 セッティング
			$wp_customize->add_setting( 'fit_postPrevNext_order', array(
				'default'   => '2',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_number',
			));
			// 表示順 コントロール
			$wp_customize->add_control( 'fit_postPrevNext_order', array(
				'section'   => 'fit_post_prevNext_section',
				'settings'  => 'fit_postPrevNext_order',
				'description' => '■表示順の指定',
				'type'      => 'number',
			));


		//セクションの追加
		$wp_customize->add_section( 'fit_post_profile_section', array(
			'title'       => 'プロフィール設定',
			'panel'       => 'fit_post_panel',
			'description' => 'プロフィールの設定画面です。',
			'priority'  => 1,
		));

			// プロフィールの表示/非表示 セッティング
			$wp_customize->add_setting( 'fit_postProfile_switch', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// プロフィールの表示/非表示 コントロール
			$wp_customize->add_control( 'fit_postProfile_switch', array(
				'section'   => 'fit_post_profile_section',
				'settings'  => 'fit_postProfile_switch',
				'label'     => 'プロフィールの設定',
				'description' => '■プロフィールを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '表示しない(default)',
					'on' => '表示する',
				),
			));

			// この記事を書いた人設定 セッティング
			$wp_customize->add_setting( 'fit_postProfile_text', array(
				'default'   => 'この記事を書いた人',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// この記事を書いた人設定 コントロール
			$wp_customize->add_control( 'fit_postProfile_text', array(
				'section'   => 'fit_post_profile_section',
				'settings'  => 'fit_postProfile_text',
				'description' => '■セクションタイトルを入力',
				'type'      => 'text',
			));

			// 投稿一覧へボタン セッティング
			$wp_customize->add_setting( 'fit_postProfile_btn', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 投稿一覧へボタン コントロール
			$wp_customize->add_control( 'fit_postProfile_btn', array(
				'section'   => 'fit_post_profile_section',
				'settings'  => 'fit_postProfile_btn',
				'description' => '■投稿一覧へボタンを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '表示しない(default)',
					'on' => '表示する',
				),
			));

			// ボタン上のテキスト設定 セッティング
			$wp_customize->add_setting( 'fit_postProfile_btnText', array(
				'default'   => '投稿一覧へ',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ボタン上のテキスト設定 コントロール
			$wp_customize->add_control( 'fit_postProfile_btnText', array(
				'section'   => 'fit_post_profile_section',
				'settings'  => 'fit_postProfile_btnText',
				'description' => '■ボタン上のテキストを入力',
				'type'      => 'text',
			));

			// 表示順 セッティング
			$wp_customize->add_setting( 'fit_postProfile_order', array(
				'default'   => '3',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_number',
			));
			// 表示順 コントロール
			$wp_customize->add_control( 'fit_postProfile_order', array(
				'section'   => 'fit_post_profile_section',
				'settings'  => 'fit_postProfile_order',
				'description' => '■表示順の指定',
				'type'      => 'number',
			));

		//セクションの追加
		$wp_customize->add_section( 'fit_post_related_section', array(
			'title'       => '関連記事設定',
			'panel'       => 'fit_post_panel',
			'description' => '関連記事の設定画面です。',
			'priority'  => 1,
		));

			// プロフィールの表示/非表示 セッティング
			$wp_customize->add_setting( 'fit_postRelated_switch', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// プロフィールの表示/非表示 コントロール
			$wp_customize->add_control( 'fit_postRelated_switch', array(
				'section'   => 'fit_post_related_section',
				'settings'  => 'fit_postRelated_switch',
				'label'     => '関連記事の設定',
				'description' => '■関連記事を表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '表示しない(default)',
					'on' => '表示する',
				),
			));

			// タイトル設定 セッティング
			$wp_customize->add_setting( 'fit_postRelated_title', array(
				'default'   => '関連する記事',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// タイトル設定 コントロール
			$wp_customize->add_control( 'fit_postRelated_title', array(
				'section'   => 'fit_post_related_section',
				'settings'  => 'fit_postRelated_title',
				'description' => '■タイトルを入力',
				'type'      => 'text',
			));

			// 表示する件数 セッティング
			$wp_customize->add_setting( 'fit_postRelated_number', array(
				'default'   => '3',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_number_range',
			));
			// 表示する件数 コントロール
			$wp_customize->add_control( 'fit_postRelated_number', array(
				'section'   => 'fit_post_related_section',
				'settings'  => 'fit_postRelated_number',
				'description' => '■表示する件数を指定',
				'type'      => 'number',
				'input_attrs' => array(
       		 	'step'     => '1',
        			'min'      => '1',
        			'max'      => '50',
    			),
			));

			// 関連記事画像アスペクト比設定 セッティング
			$wp_customize->add_setting( 'fit_postRelated_aspect', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 関連記事画像アスペクト比設定 コントロール
			$wp_customize->add_control( 'fit_postRelated_aspect', array(
				'section'   => 'fit_post_related_section',
				'settings'  => 'fit_postRelated_aspect',
				'description' => '■画像アスペクト比を選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '16：9(default)',
					'eyecatch-43'  => '4：3',
					'eyecatch-11'  => '1：1',
					'none'  => '0：0(非表示)',
				),
			));

			//関連記事画像上のカテゴリラベル セッティング
			$wp_customize->add_setting('fit_postRelated_category', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
    		));
			//関連記事画像上のカテゴリラベル コントロール
			$wp_customize->add_control('fit_postRelated_category', array(
				'section' => 'fit_post_related_section',
				'settings' => 'fit_postRelated_category',
				'label'     => 'アイキャッチ上のカテゴリを非表示にする',
				'type'      => 'checkbox',
			));

			// 投稿日表示 セッティング
			$wp_customize->add_setting('fit_postRelated_time', array(
			    'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 投稿日表示 コントロール
			$wp_customize->add_control('fit_postRelated_time', array(
			    'section' => 'fit_post_related_section',
				'settings' => 'fit_postRelated_time',
				'label'     => '投稿日を表示する',
				'type'      => 'checkbox',
			));

			// 更新日表示 セッティング
			$wp_customize->add_setting('fit_postRelated_update', array(
			    'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 更新日表示 コントロール
			$wp_customize->add_control('fit_postRelated_update', array(
			    'section' => 'fit_post_related_section',
				'settings' => 'fit_postRelated_update',
				'label'     => '更新日を表示する',
				'type'      => 'checkbox',
			));

			// 表示順 セッティング
			$wp_customize->add_setting( 'fit_postRelated_order', array(
				'default'   => '4',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_number',
			));
			// 表示順 コントロール
			$wp_customize->add_control( 'fit_postRelated_order', array(
				'section'   => 'fit_post_related_section',
				'settings'  => 'fit_postRelated_order',
				'description' => '■表示順の指定',
				'type'      => 'number',
			));

		//セクションの追加
		$wp_customize->add_section( 'fit_post_category_section', array(
			'title'       => '所属カテゴリ最新記事設定',
			'panel'       => 'fit_post_panel',
			'description' => '所属カテゴリ最新記事の設定画面です。',
			'priority'  => 1,
		));

			// 所属カテゴリ最新記事表示設定 セッティング
			$wp_customize->add_setting( 'fit_postCategory_switch', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 所属カテゴリ最新記事表示設定 コントロール
			$wp_customize->add_control( 'fit_postCategory_switch', array(
				'section'   => 'fit_post_category_section',
				'settings'  => 'fit_postCategory_switch',
				'label'     => '所属カテゴリ最新記事設定',
				'description' => '■所属カテゴリの最新記事を表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '非表示(default)',
					'on'  => '表示',
				),
			));

			// 所属カテゴリ最新記事表示設定 セッティング
			$wp_customize->add_setting( 'fit_postCategory_number', array(
				'default'   => '8',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 所属カテゴリ最新記事表示設定 コントロール
			$wp_customize->add_control( 'fit_postCategory_number', array(
				'section'   => 'fit_post_category_section',
				'settings'  => 'fit_postCategory_number',
				'description' => '■表示する件数を選択',
				'type'      => 'select',
				'choices'   => array(
					'8' => '8件(default)',
					'4' => '4件',
				),
			));

			// 所属カテゴリ最新記事見出しサブ設定　セッティング
			$wp_customize->add_setting( 'fit_postCategory_sub', array(
				'default'   => 'の最新記事8件',
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));
			// 所属カテゴリ最新記事見出しサブ設定　コントロール
			$wp_customize->add_control( 'fit_postCategory_sub', array(
				'section'   => 'fit_post_category_section',
				'settings'  => 'fit_postCategory_sub',
				'description' => '■見出しの右に表示する補足情報を入力',
				'type'      => 'text',
			));

			// 所属カテゴリ最新記事画像アスペクト比設定 セッティング
			$wp_customize->add_setting( 'fit_postCategory_aspect', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 所属カテゴリ最新記事画像アスペクト比設定 コントロール
			$wp_customize->add_control( 'fit_postCategory_aspect', array(
				'section'   => 'fit_post_category_section',
				'settings'  => 'fit_postCategory_aspect',
				'description' => '<hr>■画像アスペクト比を選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '16：9(default)',
					'eyecatch-43'  => '4：3',
					'eyecatch-11'  => '1：1',
					'none'  => '0：0(非表示)',
				),
			));

			// 所属カテゴリ最新記事投稿日表示 セッティング
			$wp_customize->add_setting('fit_postCategory_time', array(
			    'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 所属カテゴリ最新記事投稿日表示 コントロール
			$wp_customize->add_control('fit_postCategory_time', array(
			    'section' => 'fit_post_category_section',
				'settings' => 'fit_postCategory_time',
				'label'     => '投稿日を表示する',
				'type'      => 'checkbox',
			));

			// 所属カテゴリ最新記事更新日表示 セッティング
			$wp_customize->add_setting('fit_postCategory_update', array(
			    'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 所属カテゴリ最新記事更新日表示 コントロール
			$wp_customize->add_control('fit_postCategory_update', array(
			    'section' => 'fit_post_category_section',
				'settings' => 'fit_postCategory_update',
				'label'     => '更新日を表示する',
				'type'      => 'checkbox',
			));



}
add_action( 'customize_register', 'fit_post_cutomizer' );
