<?php 
////////////////////////////////////////////////////////
//固定ページ設定画面
////////////////////////////////////////////////////////
function fit_page_cutomizer( $wp_customize ) {
	
	//パネルの追加
	$wp_customize->add_panel( 'fit_page_panel', array(
		'title'       => '固定ページ設定[THE]',
		'priority'  => 1,
	));
	
		//セクションの追加
		$wp_customize->add_section( 'fit_page_layout_section', array(
			'title'       => 'レイアウト設定',
			'panel'       => 'fit_page_panel',
			'description' => 'レイアウト設定の画面です。',
			'priority'  => 1,
		));


			// ページレイアウト セッティング
			$wp_customize->add_setting( 'fit_pageLayout_column', array(
				'default'   => '2',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// ページレイアウト コントロール
			$wp_customize->add_control( 'fit_pageLayout_column', array(
				'section'   => 'fit_page_layout_section',
				'settings'  => 'fit_pageLayout_column',
				'label'     => 'レイアウト設定',
				'description' => '■カラムを選択',
				'type'      => 'select',
				'choices'   => array(
					'2' => '2カラム(default)',
					'1' => '1カラム',
				),
			));
			//2カラム時のサイドバー位置 セッティング
			$wp_customize->add_setting( 'fit_pageLayout_side', array(
				'default'   => 'right',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 2カラム時のサイドバー位置 コントロール
			$wp_customize->add_control( 'fit_pageLayout_side', array(
				'section'   => 'fit_page_layout_section',
				'settings'  => 'fit_pageLayout_side',
				'description' => '■2カラム時のサイドバーの位置を選択',
				'type'      => 'select',
				'choices'   => array(
					'right' => '右(default)',
					'left' => '左',
				),
			));
			//1カラム時の横幅 セッティング
			$wp_customize->add_setting( 'fit_pageLayout_width', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 1カラム時の横幅 コントロール
			$wp_customize->add_control( 'fit_pageLayout_width', array(
				'section'   => 'fit_page_layout_section',
				'settings'  => 'fit_pageLayout_width',
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
		$wp_customize->add_section( 'fit_page_style_section', array(
			'title'       => 'スタイル設定',
			'panel'       => 'fit_page_panel',
			'description' => 'スタイル設定画面です。',
			'priority'  => 1,
		));
			
			// コンテンツフレーム セッティング
			$wp_customize->add_setting( 'fit_pageStyle_frame', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// コンテンツフレーム コントロール
			$wp_customize->add_control( 'fit_pageStyle_frame', array(
				'section'   => 'fit_page_style_section',
				'settings'  => 'fit_pageStyle_frame',
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
			$wp_customize->add_setting( 'fit_pageStyle_headline', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// ページタイトルデザイン コントロール
			$wp_customize->add_control( 'fit_pageStyle_headline', array(
				'section'   => 'fit_page_style_section',
				'settings'  => 'fit_pageStyle_headline',
				'label'     => 'ページタイトルデザイン設定',
				'description' => '■ページタイトルデザインを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => 'ノーマル(default)',
					'none' => 'ノーマル(アイキャッチ無し)',					
				),
			));			
			
			
			// ページタイトル画像アスペクト比設定 セッティング
			$wp_customize->add_setting( 'fit_pageStyle_aspect', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// ページタイトル画像アスペクト比設定 コントロール
			$wp_customize->add_control( 'fit_pageStyle_aspect', array(
				'section'   => 'fit_page_style_section',
				'settings'  => 'fit_pageStyle_aspect',
				'description' => '■画像アスペクト比を選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '16：9(default)',
					'eyecatch-43'  => '4：3',
					'eyecatch-11'  => '1：1',
				),
			));


		//セクションの追加
		$wp_customize->add_section( 'fit_page_outline_section', array(
			'title'       => '目次設定',
			'panel'       => 'fit_page_panel',
			'description' => '目次の設定画面です。<br>(目次は記事内の最初のhタグの手前に自動で挿入されます。※ショートコード[outline]で好きな位置に表示が可能)',
			'priority'  => 1,
		));
		
			// 目次の表示/非表示 セッティング
			$wp_customize->add_setting( 'fit_pageOutline_switch', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 目次の表示/非表示 コントロール
			$wp_customize->add_control( 'fit_pageOutline_switch', array(
				'section'   => 'fit_page_outline_section',
				'settings'  => 'fit_pageOutline_switch',
				'label'     => '目次の設定',
				'description' => '■目次を表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '表示しない(default)',
					'on'  => '表示する',
				),
			));
	
			// 目次を表示するための最小見出し数 セッティング
			$wp_customize->add_setting( 'fit_pageOutline_number', array(
				'default'   => '1',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_number_range',
			));
			// 目次を表示するための最小見出し数 コントロール
			$wp_customize->add_control( 'fit_pageOutline_number', array(
				'section'   => 'fit_page_outline_section',
				'settings'  => 'fit_pageOutline_number',
				'description' => '■目次を表示するための最小見出し数を指定',
				'type'      => 'number',
				'input_attrs' => array(
       		 	'step'     => '1',
        			'min'      => '1',
        			'max'      => '10',
    			),
			));
			
			// 目次に表示する見出しレベル セッティング
			$wp_customize->add_setting( 'fit_pageOutline_hNumber', array(
				'default'   => '5',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_number_range',
			));
			// 目次に表示する見出しレベル コントロール
			$wp_customize->add_control( 'fit_pageOutline_hNumber', array(
				'section'   => 'fit_page_outline_section',
				'settings'  => 'fit_pageOutline_hNumber',
				'description' => '■目次に表示する見出しのレベルを指定',
				'type'      => 'number',
				'input_attrs' => array(
       		 	'step'     => '1',
        			'min'      => '2',
        			'max'      => '5',
    			),
			));

			// 目次パネルデフォルト設定 セッティング
			$wp_customize->add_setting('fit_pageOutline_close', array( 
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// 目次パネルデフォルト設定 コントロール
			$wp_customize->add_control('fit_pageOutline_close', array( 
				'section' => 'fit_page_outline_section', 
				'settings' => 'fit_pageOutline_close', 
				'label'     => '目次パネルをデフォルトで閉じておく',
				'type'      => 'checkbox',
			));


		//セクションの追加
		$wp_customize->add_section( 'fit_page_share_section', array(
			'title'       => 'シェアボタン設定',
			'panel'       => 'fit_page_panel',
			'description' => 'シェアボタンの設定画面です。',
			'priority'  => 1,
		));

			// 上部シェアボタンの表示/非表示 セッティング
			$wp_customize->add_setting( 'fit_pageShare_top', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 上部シェアボタンの表示/非表示 コントロール
			$wp_customize->add_control( 'fit_pageShare_top', array(
				'section'   => 'fit_page_share_section',
				'settings'  => 'fit_pageShare_top',
				'label'     => 'シェアボタンの表示/非表示設定',
				'description' => '■上部にシェアボタンを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '表示しない(default)',
					'on'  => '表示する',
				),
			));

			// 下部シェアボタンの表示/非表示 セッティング
			$wp_customize->add_setting( 'fit_pageShare_bottom', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 下部シェアボタンの表示/非表示 コントロール
			$wp_customize->add_control( 'fit_pageShare_bottom', array(
				'section'   => 'fit_page_share_section',
				'settings'  => 'fit_pageShare_bottom',
				'description' => '■下部にシェアボタンを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '表示しない(default)',
					'on'  => '表示する',
				),
			));

			//Facebookセッティング
			$wp_customize->add_setting('fit_pageShare[facebook]', array( 
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			//Facebookコントロール
			$wp_customize->add_control('fit_pageShare_facebook', array( 
   		     'section' => 'fit_page_share_section', 
   		     'settings' => 'fit_pageShare[facebook]', 
    		    'label'     => 'Facebookボタンを表示する',
    		    'type'      => 'checkbox',
    		));
	
			//Twitterセッティング
			$wp_customize->add_setting('fit_pageShare[twitter]', array( 
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			//Twitterコントロール
			$wp_customize->add_control('fit_pageShare_twitter', array( 
   		     'section' => 'fit_page_share_section', 
   		     'settings' => 'fit_pageShare[twitter]', 
  		      'label'     => 'Twitterボタンを表示する',
  		      'type'      => 'checkbox',
			));

			//Google+セッティング
			$wp_customize->add_setting('fit_pageShare[google]', array( 
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			//Google+コントロール
			$wp_customize->add_control('fit_pageShare_google', array( 
   		     'section' => 'fit_page_share_section', 
    		    'settings' => 'fit_pageShare[google]', 
    		    'label'     => 'Google+ボタンを表示する',
    		    'type'      => 'checkbox',
			));

			//はてぶセッティング
			$wp_customize->add_setting('fit_pageShare[hatebu]', array( 
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			//はてぶコントロール
			$wp_customize->add_control('fit_pageShare_hatebu', array( 
   		     'section' => 'fit_page_share_section', 
   		     'settings' => 'fit_pageShare[hatebu]', 
   		     'label'     => 'はてぶボタンを表示する',
   		     'type'      => 'checkbox',
			));

			//Pocketセッティング
			$wp_customize->add_setting('fit_pageShare[pocket]', array( 
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			//Pocketコントロール
			$wp_customize->add_control('fit_pageShare_pocket', array( 
   		     'section' => 'fit_page_share_section', 
   		     'settings' => 'fit_pageShare[pocket]', 
   		     'label'     => 'Pocketボタンを表示する',
   		     'type'      => 'checkbox',
			));
	
			//LINEセッティング
			$wp_customize->add_setting('fit_pageShare[line]', array( 
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
    		));
			//LINEコントロール
			$wp_customize->add_control('fit_pageShare_line', array( 
       		 'section' => 'fit_page_share_section', 
      		  'settings' => 'fit_pageShare[line]', 
      		  'label'     => 'LINEボタンを表示する',
      		  'type'      => 'checkbox',
			));
			
			//LinkedInセッティング
			$wp_customize->add_setting('fit_pageShare[linkedin]', array( 
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
    		));
			//LinkedInコントロール
			$wp_customize->add_control('fit_pageShare_linkedin', array( 
       		 'section' => 'fit_page_share_section', 
      		  'settings' => 'fit_pageShare[linkedin]', 
      		  'label'     => 'LinkedInボタンを表示する',
      		  'type'      => 'checkbox',
			));
			
			//Pinterestセッティング
			$wp_customize->add_setting('fit_pageShare[pinterest]', array( 
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
    		));
			//Pinterestコントロール
			$wp_customize->add_control('fit_pageShare_pinterest', array( 
       		 'section' => 'fit_page_share_section', 
      		  'settings' => 'fit_pageShare[pinterest]', 
      		  'label'     => 'Pinterestボタンを表示する',
      		  'type'      => 'checkbox',
			));
			
			

		//セクションの追加
		$wp_customize->add_section( 'fit_page_cta_section', array(
			'title'       => '記事下CTA設定',
			'panel'       => 'fit_page_panel',
			'description' => '記事下CTAの設定画面です。',
			'priority'  => 1,
		));

			// 記事下CTAの表示/非表示 セッティング
			$wp_customize->add_setting( 'fit_pageCta_switch', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 記事下CTAの表示/非表示 コントロール
			$wp_customize->add_control( 'fit_pageCta_switch', array(
				'section'   => 'fit_page_cta_section',
				'settings'  => 'fit_pageCta_switch',
				'label'     => '記事下CTA設定',
				'description' => '■記事下CTAを表示するか選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '表示しない(default)',
					'on'  => '表示する',
				),
			));
			
			// 記事下CTAのスタイル セッティング
			$wp_customize->add_setting( 'fit_pageCta_style', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 記事下CTAのスタイル コントロール
			$wp_customize->add_control( 'fit_pageCta_style', array(
				'section'   => 'fit_page_cta_section',
				'settings'  => 'fit_pageCta_style',
				'label'     => 'デザイン設定',
				'description' => '■デザインを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => 'フレーム無し[カラー:無](default)',
					'u-shadow' => 'シャドウフレーム[カラー:無]',
					'u-border'  => 'ボーダーフレーム[カラー:線]',
					'pagecta-bg'  => 'べた塗背景(文字白)[カラー:背景]',
				),
			));
			
			// 記事下CTAのカラー セッティング
			$wp_customize->add_setting( 'fit_pageCta_color', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// 記事下CTAのカラー コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_pageCta_color', array(
				'section' => 'fit_page_cta_section',
				'settings' =>'fit_pageCta_color',
				'description' => '■カラー',		
			)));

	
			// 記事下CTAボックスのID セッティング
			$wp_customize->add_setting( 'fit_pageCta_id', array(
				'type' => 'option',
				'transport' => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// 記事下CTAボックスのID  コントロール
			$wp_customize->add_control( 'fit_pageCta_id', array(
				'section'   => 'fit_page_cta_section',
				'settings'  => 'fit_pageCta_id',
				'label'     => 'デフォルトCTAコンテンツ設定',
				'description' => '■デフォルトで表示するCTAのIDを入力',
				'type'      => 'text',
			));

}
add_action( 'customize_register', 'fit_page_cutomizer' );