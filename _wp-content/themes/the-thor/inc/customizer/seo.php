<?php
////////////////////////////////////////////////////////
//SEO設定画面
////////////////////////////////////////////////////////
function fit_seo_cutomizer( $wp_customize ) {


	//パネルの追加
	$wp_customize->add_panel( 'fit_seo_panel', array(
		'title'       => 'SEO設定[THE]',
		'priority'  => 1,
	));

		//セクションの追加
		$wp_customize->add_section( 'fit_seo_top_section', array(
			'title'       => 'TOPページSEO設定',
			'panel'       => 'fit_seo_panel',
			'description' => 'SEO設定画面です。<br>(「設定」→「表示設定」の「ホームページの表示」が固定ページとなっている場合は、該当の固定ページから編集を行ってください)',
			'priority'  => 1,
		));

			if ( get_option( 'show_on_front' ) != 'page' ) {
				// TOPページの<title> セッティング
				$wp_customize->add_setting( 'fit_seoTop_title', array(
					'default'   => get_bloginfo( 'description' ) .fit_title_separator() .get_bloginfo( 'name' ),
					'type' => 'option',
					'transport' => 'postMessage',
					'sanitize_callback' => 'sanitize_text_field',
				));
				// TOPページの<title> コントロール
				$wp_customize->add_control( 'fit_seoTop_title', array(
					'section'   => 'fit_seo_top_section',
					'settings'  => 'fit_seoTop_title',
					'label' => 'TOPページの&lt;title&gt;',
					'description' => '■TOPページの&lt;title&gt;を入力<br>(未入力の場合は「設定」→「一般」の【キャッチフレーズ '.fit_title_separator().' サイトのタイトル】が表示されます)',
					'type'      => 'text',
				));
				// TOPページの<title>に｜サイト名 セッティング
				$wp_customize->add_setting( 'fit_seoTop_name', array(
					'type' => 'option',
					'transport' => 'postMessage',
					'sanitize_callback' => 'fit_sanitize_checkbox',
				));
				// TOPページの<title>に｜サイト名 コントロール
				$wp_customize->add_control( 'fit_seoTop_name', array(
					'section'   => 'fit_seo_top_section',
					'settings'  => 'fit_seoTop_name',
					'label'     => '「'.fit_title_separator().' '.get_bloginfo( 'name' ).'」を表示する',
					'type'      => 'checkbox',
				));

				// TOPページの<meta description> セッティング
				$wp_customize->add_setting( 'fit_seoTop_description', array(
					'type' => 'option',
					'transport' => 'postMessage',
					'sanitize_callback' => 'sanitize_text_field',
				));
				// TOPページの<meta description> コントロール
				$wp_customize->add_control( 'fit_seoTop_description', array(
					'section'   => 'fit_seo_top_section',
					'settings'  => 'fit_seoTop_description',
					'label' => 'TOPページの&lt;meta description&gt;',
					'description' => '■TOPページの&lt;meta  description&gt;を入力',
					'type'      => 'textarea',
				));
			}


		//セクションの追加
		$wp_customize->add_section( 'fit_seo_css_section', array(
			'title'       => 'CSS非同期読み込み設定',
			'panel'       => 'fit_seo_panel',
			'description' => 'CSSの非同期読み込み設定画面です。<br>
			（CSS非同期読み込み機能を有効にするとページの読み込み速度が向上する代わりに、一瞬デザインが崩れて見えることがあります）',
			'priority'  => 1,
		));


			// メインCSS セッティング
			$wp_customize->add_setting( 'fit_seoCss_main', array(
				'type' => 'option',
				'transport' => 'postMessage',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// メインCSS コントロール
			$wp_customize->add_control( 'fit_seoCss_main', array(
				'section'   => 'fit_seo_css_section',
				'settings'  => 'fit_seoCss_main',
				'label'     => 'メインCSS(style.css)を非同期読み込みにする',
				'type'      => 'checkbox',
			));

			// 子テーマCSS セッティング
			if (is_child_theme()) {
				$wp_customize->add_setting( 'fit_seoCss_child', array(
					'type' => 'option',
					'transport' => 'postMessage',
					'sanitize_callback' => 'fit_sanitize_checkbox',
				));
				// 子テーマCSS コントロール
				$wp_customize->add_control( 'fit_seoCss_child', array(
					'section'   => 'fit_seo_css_section',
					'settings'  => 'fit_seoCss_child',
					'label'     => '子テーマCSS(style-user.css)を非同期読み込みにする',
					'type'      => 'checkbox',
				));
			}

			// アイコンフォントCSS セッティング
			$wp_customize->add_setting( 'fit_seoCss_icon', array(
				'type' => 'option',
				'transport' => 'postMessage',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));

			// アイコンフォントCSS コントロール
			$wp_customize->add_control( 'fit_seoCss_icon', array(
				'section'   => 'fit_seo_css_section',
				'settings'  => 'fit_seoCss_icon',
				'label'     => 'アイコンフォントCSS(icon.min.css)を非同期読み込みにする',
				'type'      => 'checkbox',
			));

			// GoogleフォントCSS-lato セッティング
			$wp_customize->add_setting( 'fit_seoCss_lato', array(
				'type' => 'option',
				'transport' => 'postMessage',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// GoogleフォントCSS-lato コントロール
			$wp_customize->add_control( 'fit_seoCss_lato', array(
				'section'   => 'fit_seo_css_section',
				'settings'  => 'fit_seoCss_lato',
				'label'     => 'GoogleフォントCSS(Lato)を非同期読み込みにする',
				'type'      => 'checkbox',
			));

			// GoogleフォントCSS-fjalla セッティング
			$wp_customize->add_setting( 'fit_seoCss_fjalla', array(
				'type' => 'option',
				'transport' => 'postMessage',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// GoogleフォントCSS-fjalla コントロール
			$wp_customize->add_control( 'fit_seoCss_fjalla', array(
				'section'   => 'fit_seo_css_section',
				'settings'  => 'fit_seoCss_fjalla',
				'label'     => 'GoogleフォントCSS(Fjalla)を非同期読み込みにする',
				'type'      => 'checkbox',
			));

			// GoogleフォントCSS-noto セッティング
			$wp_customize->add_setting( 'fit_seoCss_noto', array(
				'type' => 'option',
				'transport' => 'postMessage',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// GoogleフォントCSS-fjalla コントロール
			$wp_customize->add_control( 'fit_seoCss_noto', array(
				'section'   => 'fit_seo_css_section',
				'settings'  => 'fit_seoCss_noto',
				'label'     => 'GoogleフォントCSS(Noto Sans JP)を非同期読み込みにする',
				'type'      => 'checkbox',
			));

			// SwiperCSS セッティング
			$wp_customize->add_setting( 'fit_seoCss_swiper', array(
				'type' => 'option',
				'transport' => 'postMessage',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));

			// SwiperCSS コントロール
			$wp_customize->add_control( 'fit_seoCss_swiper', array(
				'section'   => 'fit_seo_css_section',
				'settings'  => 'fit_seoCss_swiper',
				'label'     => 'SwiperCSS(swiper.min.css)を非同期読み込みにする',
				'description' => '(swiper.min.cssは、メインビジュアルスライダー機能や、記事カルーセル機能を有効化している場合のみ出力)',
				'type'      => 'checkbox',
			));

			// YTPlayerCSS セッティング
			$wp_customize->add_setting( 'fit_seoCss_YTPlayer', array(
				'type' => 'option',
				'transport' => 'postMessage',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));

			// YTPlayerCSS コントロール
			$wp_customize->add_control( 'fit_seoCss_YTPlayer', array(
				'section'   => 'fit_seo_css_section',
				'settings'  => 'fit_seoCss_YTPlayer',
				'label'     => 'YTPlayerCSS(jquery.mb.YTPlayer.min.css)を非同期読み込みにする',
				'description' => '(jquery.mb.YTPlayer.min.cssは、メインビジュアル背景動画機能を有効化している場合のみ出力)',
				'type'      => 'checkbox',
			));

		//セクションの追加
		$wp_customize->add_section( 'fit_seo_img_section', array(
			'title'       => 'img非同期読み込み設定',
			'panel'       => 'fit_seo_panel',
			'description' => 'imgの非同期読み込み設定画面です。',
			'priority'  => 1,
		));

			// img セッティング
			$wp_customize->add_setting( 'fit_seoImg_lazy', array(
				'type' => 'option',
				'transport' => 'postMessage',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// img コントロール
			$wp_customize->add_control( 'fit_seoImg_lazy', array(
				'section'   => 'fit_seo_img_section',
				'settings'  => 'fit_seoImg_lazy',
				'label'     => 'imgファイルを非同期読み込みにする',
				'type'      => 'checkbox',
			));


			//セクションの追加
			$wp_customize->add_section( 'fit_seo_htaccess_section', array(
				'title'       => 'htaccess設定',
				'panel'       => 'fit_seo_panel',
				'description' => 'htaccessの設定画面です。<br>
				（有効化するにチェックを入れて「公開」をしたら、「設定」→「パーマリンク設定」へ移動し、「変更を保存」ボタンをクリックすることで、初めて設定が有効化されます。）',
				'priority'  => 1,
			));

				// ブラウザキャッシュ セッティング
				$wp_customize->add_setting( 'fit_seoHta_cache', array(
					'type' => 'option',
					'transport' => 'postMessage',
					'sanitize_callback' => 'fit_sanitize_checkbox',
				));
				// ブラウザキャッシュ コントロール
				$wp_customize->add_control( 'fit_seoHta_cache', array(
					'section'   => 'fit_seo_htaccess_section',
					'settings'  => 'fit_seoHta_cache',
					'label'     => 'ブラウザキャッシュを有効にする',
					'type'      => 'checkbox',
				));

				// Gzip圧縮 セッティング
				$wp_customize->add_setting( 'fit_seoHta_gzip', array(
					'type' => 'option',
					'transport' => 'postMessage',
					'sanitize_callback' => 'fit_sanitize_checkbox',
				));
				// Gzip圧縮 コントロール
				$wp_customize->add_control( 'fit_seoHta_gzip', array(
					'section'   => 'fit_seo_htaccess_section',
					'settings'  => 'fit_seoHta_gzip',
					'label'     => 'Gzip圧縮を有効にする',
					'type'      => 'checkbox',
				));


			//セクションの追加
			$wp_customize->add_section( 'fit_seo_html_section', array(
				'title'       => 'HTML圧縮設定',
				'panel'       => 'fit_seo_panel',
				'description' => 'HTMLの圧縮設定画面です。',
				'priority'  => 1,
			));

				// HTML セッティング
				$wp_customize->add_setting( 'fit_seoHtml_press', array(
					'type' => 'option',
					'transport' => 'postMessage',
					'sanitize_callback' => 'fit_sanitize_checkbox',
				));
				// HTML コントロール
				$wp_customize->add_control( 'fit_seoHtml_press', array(
					'section'   => 'fit_seo_html_section',
					'settings'  => 'fit_seoHtml_press',
					'label'     => 'HTMLを圧縮する',
					'type'      => 'checkbox',
				));

}
add_action( 'customize_register', 'fit_seo_cutomizer' );
