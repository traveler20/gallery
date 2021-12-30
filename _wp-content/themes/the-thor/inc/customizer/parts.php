<?php
////////////////////////////////////////////////////////
//各種パーツ設定画面
////////////////////////////////////////////////////////
function fit_parts_cutomizer( $wp_customize ) {

	//パネルの追加
	$wp_customize->add_panel( 'fit_parts_panel', array(
		'title'       => 'パーツスタイル設定[THE]',
		'priority'  => 1,
	));


	  //セクションの追加
	  $wp_customize->add_section( 'fit_parts_userMarker_section', array(
		  'title'       => 'マーカー設定',
		  'panel'       => 'fit_parts_panel',
		  'description' => 'エディタのスタイルマーカーの設定画面です。',
		  'priority'  => 1,
	  ));

	  	// よく使うマーカー セッティング
			$wp_customize->add_setting( 'fit_partsUser_marker', array(
				'default'   => '1',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// よく使うマーカー コントロール
			$wp_customize->add_control( 'fit_partsUser_marker', array(
				'section'   => 'fit_parts_userMarker_section',
				'settings'  => 'fit_partsUser_marker',
				'label'     => 'よく使うマーカー設定',
				'description' => '■デザインを選択',
				'type'      => 'select',
				'choices'   => array(
					'1' => '太レッド',
					'2' => '太ブルー',
					'3' => '太イエロー',
					'4' => '太ピンク',
					'5' => '太グリーン',
					'6' => '太グレー',
					'7' => '中レッド',
					'8' => '中ブルー',
					'9' => '中イエロー',
					'10'=> '中ピンク',
					'11'=> '中グリーン',
					'12'=> '中グレー',
					'13'=> '細レッド',
					'14'=> '細ブルー',
					'15'=> '細イエロー',
					'16'=> '細ピンク',
					'17'=> '細グリーン',
					'18'=> '細グレー',
				),
			));



		//セクションの追加
		$wp_customize->add_section( 'fit_parts_userLabel_section', array(
			'title'       => 'ラベル設定',
			'panel'       => 'fit_parts_panel',
			'description' => 'エディタのスタイルラベルの設定画面です。',
			'priority'  => 1,
		));

			// ユーザー定義ラベル1のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_label1title', array(
				'default'   => '角丸レッドラベル',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ラベル1のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_label1title', array(
				'section'   => 'fit_parts_userLabel_section',
				'settings'  => 'fit_partsUser_label1title',
				'label'     => 'ラベル設定',
				'description' => '<hr><div class="customize-control-subtitle">ラベル1の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ラベル1のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_label1class', array(
				'default'   => 'ep-label bgc-DPred brc-white ftc-white es-radius es-RpaddingSS es-LpaddingSS',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ラベル1のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_label1class', array(
				'section'   => 'fit_parts_userLabel_section',
				'settings'  => 'fit_partsUser_label1class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ラベル2のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_label2title', array(
				'default'   => 'シンプルボーダーラベル',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ラベル2のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_label2title', array(
				'section'   => 'fit_parts_userLabel_section',
				'settings'  => 'fit_partsUser_label2title',
				'description' => '<hr><div class="customize-control-subtitle">ラベル2の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ラベル2のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_label2class', array(
				'default'   => 'ep-label es-borderSolidS bgc-white brc-VLgray es-RpaddingSS es-LpaddingSS',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ラベル2のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_label2class', array(
				'section'   => 'fit_parts_userLabel_section',
				'settings'  => 'fit_partsUser_label2class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ラベル3のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_label3title', array(
				'default'   => 'ライム左ラウンドラベル',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ラベル3のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_label3title', array(
				'section'   => 'fit_parts_userLabel_section',
				'settings'  => 'fit_partsUser_label3title',
				'description' => '<hr><div class="customize-control-subtitle">ラベル3の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ラベル3のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_label3class', array(
				'default'   => 'ep-label es-LroundL bgc-Blime ftc-white es-RpaddingSS es-LpaddingSS',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ラベル3のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_label3class', array(
				'section'   => 'fit_parts_userLabel_section',
				'settings'  => 'fit_partsUser_label3class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ラベル4のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_label4title', array(
				'default'   => 'ブルーボーダーラウンドラベル',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ラベル4のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_label4title', array(
				'section'   => 'fit_parts_userLabel_section',
				'settings'  => 'fit_partsUser_label4title',
				'description' => '<hr><div class="customize-control-subtitle">ラベル4の設定</div>
				■タイトル',

				'type'      => 'text',
			));

			// ユーザー定義ラベル4のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_label4class', array(
				'default'   => 'ep-label es-round es-borderDashedS brc-Lblue bgc-VPblue es-RpaddingSS es-LpaddingSS',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ラベル4のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_label4class', array(
				'section'   => 'fit_parts_userLabel_section',
				'settings'  => 'fit_partsUser_label4class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ラベル5のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_label5title', array(
				'default'   => '丸アイコンオレンジラベル',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ラベル5のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_label5title', array(
				'section'   => 'fit_parts_userLabel_section',
				'settings'  => 'fit_partsUser_label5title',
				'description' => '<hr><div class="customize-control-subtitle">ラベル5の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ラベル5のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_label5class', array(
				'default'   => 'ep-label icon-pencil2 es-LiconCircle es-LroundL bgc-VPorange ftc-Borange es-RpaddingSS',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ラベル5のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_label5class', array(
				'section'   => 'fit_parts_userLabel_section',
				'settings'  => 'fit_partsUser_label5class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ラベル6のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_label6title', array(
				'default'   => 'ピンクアイコンラベル',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ラベル6のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_label6title', array(
				'section'   => 'fit_parts_userLabel_section',
				'settings'  => 'fit_partsUser_label6title',
				'description' => '<hr><div class="customize-control-subtitle">ラベル6の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ラベル6のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_label6class', array(
				'default'   => 'ep-label es-LiconBorder icon-notification es-RpaddingSS bgc-VPpink ftc-Bpink',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ラベル6のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_label6class', array(
				'section'   => 'fit_parts_userLabel_section',
				'settings'  => 'fit_partsUser_label6class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ラベル7のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_label7title', array(
				'default'   => '四角アイコンラベル',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ラベル7のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_label7title', array(
				'section'   => 'fit_parts_userLabel_section',
				'settings'  => 'fit_partsUser_label7title',
				'description' => '<hr><div class="customize-control-subtitle">ラベル7の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ラベル7のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_label7class', array(
				'default'   => 'ep-label es-LiconBox icon-location es-borderSolidS brc-VLgray ftc-Dgray',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ラベル7のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_label7class', array(
				'section'   => 'fit_parts_userLabel_section',
				'settings'  => 'fit_partsUser_label7class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ラベル8のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_label8title', array(
				'default'   => '破線ボーダーアイコンラベル',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ラベル8のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_label8title', array(
				'section'   => 'fit_parts_userLabel_section',
				'settings'  => 'fit_partsUser_label8title',
				'description' => '<hr><div class="customize-control-subtitle">ラベル8の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ラベル8のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_label8class', array(
				'default'   => 'ep-label es-BborderDashedM bgc-white es-Licon icon-pushpin es-RpaddingSS es-bold',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ラベル8のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_label8class', array(
				'section'   => 'fit_parts_userLabel_section',
				'settings'  => 'fit_partsUser_label8class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ラベル9のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_label9title', array(
				'default'   => 'ビッグ右ラウンドブルーラベル',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ラベル9のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_label9title', array(
				'section'   => 'fit_parts_userLabel_section',
				'settings'  => 'fit_partsUser_label9title',
				'description' => '<hr><div class="customize-control-subtitle">ラベル9の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ラベル9のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_label9class', array(
				'default'   => 'ep-label es-LroundR es-TmarginS es-TpaddingS es-BpaddingS es-RpaddingM es-LpaddingM es-Fbig es-bold es-LborderSolidM brc-DLsky bgc-VPblue ftc-DGblue',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ラベル9のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_label9class', array(
				'section'   => 'fit_parts_userLabel_section',
				'settings'  => 'fit_partsUser_label9class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ラベル10のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_label10title', array(
				'default'   => 'ターコイズグラデ右寄せラベル',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ラベル10のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_label10title', array(
				'section'   => 'fit_parts_userLabel_section',
				'settings'  => 'fit_partsUser_label10title',
				'description' => '<hr><div class="customize-control-subtitle">ラベル10の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ラベル10のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_label10class', array(
				'default'   => 'ep-label es-grada2 bgc-DLturquoise ftc-white es-size25 es-right es-RpaddingS es-LborderSolidM brc-DGturquoise',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ラベル10のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_label10class', array(
				'section'   => 'fit_parts_userLabel_section',
				'settings'  => 'fit_partsUser_label10class',
				'description' => '■スタイル',
				'type'      => 'text',
			));


		//セクションの追加
		$wp_customize->add_section( 'fit_parts_userBtn_section', array(
			'title'       => 'ボタン設定',
			'panel'       => 'fit_parts_panel',
			'description' => 'エディタのスタイルボタンの設定画面です。',
			'priority'  => 1,
		));

			// ユーザー定義ボタン1のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_btn1title', array(
				'default'   => 'オレンジ100％ボタン',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボタン1のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_btn1title', array(
				'section'   => 'fit_parts_userBtn_section',
				'settings'  => 'fit_partsUser_btn1title',
				'label'     => 'ボタン設定',
				'description' => '<hr><div class="customize-control-subtitle">ボタン1の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボタン1のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_btn1class', array(
				'default'   => 'ep-btn bgc-Vorange es-size100 ftc-white es-TpaddingS es-BpaddingS es-BTarrow es-bold',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボタン1のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_btn1class', array(
				'section'   => 'fit_parts_userBtn_section',
				'settings'  => 'fit_partsUser_btn1class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ボタン2のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_btn2title', array(
				'default'   => 'グリーンシャドウ100％ボタン',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボタン2のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_btn2title', array(
				'section'   => 'fit_parts_userBtn_section',
				'settings'  => 'fit_partsUser_btn2title',
				'description' => '<hr><div class="customize-control-subtitle">ボタン2の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボタン2のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_btn2class', array(
				'default'   => 'ep-btn bgc-Bgreen ftc-white es-size100 es-TpaddingS es-BpaddingS es-shadowIn es-BTarrow es-bold es-radius',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボタン2のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_btn2class', array(
				'section'   => 'fit_parts_userBtn_section',
				'settings'  => 'fit_partsUser_btn2class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ボタン3のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_btn3title', array(
				'default'   => 'ブルーボーダーボタン',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボタン3のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_btn3title', array(
				'section'   => 'fit_parts_userBtn_section',
				'settings'  => 'fit_partsUser_btn3title',
				'description' => '<hr><div class="customize-control-subtitle">ボタン3の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボタン3のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_btn3class', array(
				'default'   => 'ep-btn es-TpaddingS es-BpaddingS es-RpaddingM es-LpaddingM es-Fbig es-bold es-borderSolidS bgc-white brc-DLblue ftc-DLblue es-BTarrow',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボタン3のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_btn3class', array(
				'section'   => 'fit_parts_userBtn_section',
				'settings'  => 'fit_partsUser_btn3class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ボタン4のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_btn4title', array(
				'default'   => 'ブルーグラデボタン',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボタン4のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_btn4title', array(
				'section'   => 'fit_parts_userBtn_section',
				'settings'  => 'fit_partsUser_btn4title',
				'description' => '<hr><div class="customize-control-subtitle">ボタン4の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボタン4のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_btn4class', array(
				'default'   => 'ep-btn es-BTrich bgc-DPsky ftc-white es-BTarrow es-TpaddingS es-BpaddingS es-RpaddingM es-LpaddingM es-grada1',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボタン4のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_btn4class', array(
				'section'   => 'fit_parts_userBtn_section',
				'settings'  => 'fit_partsUser_btn4class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ボタン5のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_btn5title', array(
				'default'   => 'ピンクアイコンボタン',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボタン5のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_btn5title', array(
				'section'   => 'fit_parts_userBtn_section',
				'settings'  => 'fit_partsUser_btn5title',
				'description' => '<hr><div class="customize-control-subtitle">ボタン5の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボタン5のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_btn5class', array(
				'default'   => 'ep-btn icon-circle-right es-BTicon bgc-VPmagenta ftc-Lmagenta es-bold es-borderSolidS brc-Lmagenta es-TpaddingS es-BpaddingS es-RpaddingM es-LpaddingM',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボタン5のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_btn5class', array(
				'section'   => 'fit_parts_userBtn_section',
				'settings'  => 'fit_partsUser_btn5class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ボタン6のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_btn6title', array(
				'default'   => 'ピンクグラデアイコンボタン',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボタン6のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_btn6title', array(
				'section'   => 'fit_parts_userBtn_section',
				'settings'  => 'fit_partsUser_btn6title',
				'description' => '<hr><div class="customize-control-subtitle">ボタン6の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボタン6のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_btn6class', array(
				'default'   => 'ep-btn es-grada2 ftc-white es-radius icon-home es-BTicon es-TpaddingS es-BpaddingS es-RpaddingM es-LpaddingM bgc-Bmagenta',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボタン6のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_btn6class', array(
				'section'   => 'fit_parts_userBtn_section',
				'settings'  => 'fit_partsUser_btn6class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ボタン7のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_btn7title', array(
				'default'   => 'グリーン立体アイコンボタン',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボタン7のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_btn7title', array(
				'section'   => 'fit_parts_userBtn_section',
				'settings'  => 'fit_partsUser_btn7title',
				'description' => '<hr><div class="customize-control-subtitle">ボタン7の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボタン7のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_btn7class', array(
				'default'   => 'ep-btn icon-amazon es-BTiconBorder es-BT3d es-radius bgc-DLlime ftc-white es-TpaddingS es-BpaddingS es-shadow',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボタン7のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_btn7class', array(
				'section'   => 'fit_parts_userBtn_section',
				'settings'  => 'fit_partsUser_btn7class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ボタン8のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_btn8title', array(
				'default'   => 'グレーラウンドアイコンボタン',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボタン8のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_btn8title', array(
				'section'   => 'fit_parts_userBtn_section',
				'settings'  => 'fit_partsUser_btn8title',
				'description' => '<hr><div class="customize-control-subtitle">ボタン8の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボタン8のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_btn8class', array(
				'default'   => 'ep-btn es-grada2 es-TpaddingS es-BpaddingS es-BTiconBorder icon-folder-open es-Fsmall es-round es-RpaddingM es-LpaddingM ftc-gray',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボタン8のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_btn8class', array(
				'section'   => 'fit_parts_userBtn_section',
				'settings'  => 'fit_partsUser_btn8class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ボタン9のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_btn9title', array(
				'default'   => 'サークルアイコンボタン',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボタン9のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_btn9title', array(
				'section'   => 'fit_parts_userBtn_section',
				'settings'  => 'fit_partsUser_btn9title',
				'description' => '<hr><div class="customize-control-subtitle">ボタン9の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボタン9のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_btn9class', array(
				'default'   => 'ep-btn icon-pencil2 es-BTiconCircle es-round es-BT3d es-RmarginM bgc-VPorange ftc-DLorange es-bold',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボタン9のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_btn9class', array(
				'section'   => 'fit_parts_userBtn_section',
				'settings'  => 'fit_partsUser_btn9class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ボタン10のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_btn10title', array(
				'default'   => 'ボックスアイコンボタン',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボタン10のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_btn10title', array(
				'section'   => 'fit_parts_userBtn_section',
				'settings'  => 'fit_partsUser_btn10title',
				'description' => '<hr><div class="customize-control-subtitle">ボタン10の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボタン10のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_btn10class', array(
				'default'   => 'ep-btn es-BTiconBox icon-quill bgc-DGorange ftc-white es-radius',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボタン10のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_btn10class', array(
				'section'   => 'fit_parts_userBtn_section',
				'settings'  => 'fit_partsUser_btn10class',
				'description' => '■スタイル',
				'type'      => 'text',
			));



		//セクションの追加
		$wp_customize->add_section( 'fit_parts_userBox_section', array(
			'title'       => 'ボックス設定',
			'panel'       => 'fit_parts_panel',
			'description' => 'エディタのスタイルボックスの設定画面です。',
			'priority'  => 1,
		));

			// ユーザー定義ボックス1のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_box1title', array(
				'default'   => 'サブタイトルボーダーボックス',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス1のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_box1title', array(
				'section'   => 'fit_parts_userBox_section',
				'settings'  => 'fit_partsUser_box1title',
				'label'     => 'ボックス設定',
				'description' => '<hr><div class="customize-control-subtitle">ボックス1の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス1のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_box1class', array(
				'default'   => 'ep-box es-BsubTradi bgc-white es-borderSolidM es-radius brc-DPred',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス1のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_box1class', array(
				'section'   => 'fit_parts_userBox_section',
				'settings'  => 'fit_partsUser_box1class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス2のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_box2title', array(
				'default'   => 'BIG括弧ボックス',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス2のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_box2title', array(
				'section'   => 'fit_parts_userBox_section',
				'settings'  => 'fit_partsUser_box2title',
				'description' => '<hr><div class="customize-control-subtitle">ボックス2の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス2のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_box2class', array(
				'default'   => 'ep-box es-Bbrackets bgc-white es-center es-bold es-FbigL',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス2のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_box2class', array(
				'section'   => 'fit_parts_userBox_section',
				'settings'  => 'fit_partsUser_box2class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス3のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_box3title', array(
				'default'   => '方眼ペーパーボックス',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス3のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_box3title', array(
				'section'   => 'fit_parts_userBox_section',
				'settings'  => 'fit_partsUser_box3title',
				'description' => '<hr><div class="customize-control-subtitle">ボックス3の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス3のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_box3class', array(
				'default'   => 'ep-box es-BpaperRight es-grid bgc-VPsky',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス3のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_box3class', array(
				'section'   => 'fit_parts_userBox_section',
				'settings'  => 'fit_partsUser_box3class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス4のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_box4title', array(
				'default'   => 'はてなボックス',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス4のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_box4title', array(
				'section'   => 'fit_parts_userBox_section',
				'settings'  => 'fit_partsUser_box4title',
				'description' => '<hr><div class="customize-control-subtitle">ボックス4の設定</div>
				■タイトル',

				'type'      => 'text',
			));

			// ユーザー定義ボックス4のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_box4class', array(
				'default'   => 'ep-box es-BmarkHatena es-borderSolidS bgc-white brc-DPblue es-radius',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス4のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_box4class', array(
				'section'   => 'fit_parts_userBox_section',
				'settings'  => 'fit_partsUser_box4class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス5のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_box5title', array(
				'default'   => 'ビックリボックス',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス5のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_box5title', array(
				'section'   => 'fit_parts_userBox_section',
				'settings'  => 'fit_partsUser_box5title',
				'description' => '<hr><div class="customize-control-subtitle">ボックス5の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス5のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_box5class', array(
				'default'   => 'ep-box es-BmarkExcl es-borderSolidS brc-DPred bgc-white es-radius',

				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス5のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_box5class', array(
				'section'   => 'fit_parts_userBox_section',
				'settings'  => 'fit_partsUser_box5class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス6のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_box6title', array(
				'default'   => 'Qボックス',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス6のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_box6title', array(
				'section'   => 'fit_parts_userBox_section',
				'settings'  => 'fit_partsUser_box6title',
				'description' => '<hr><div class="customize-control-subtitle">ボックス6の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス6のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_box6class', array(
				'default'   => 'ep-box es-BmarkQ bgc-white',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス6のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_box6class', array(
				'section'   => 'fit_parts_userBox_section',
				'settings'  => 'fit_partsUser_box6class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス7のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_box7title', array(
				'default'   => 'Aボックス',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス7のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_box7title', array(
				'section'   => 'fit_parts_userBox_section',
				'settings'  => 'fit_partsUser_box7title',
				'description' => '<hr><div class="customize-control-subtitle">ボックス7の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス7のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_box7class', array(
				'default'   => 'ep-box es-BmarkA bgc-white',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス7のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_box7class', array(
				'section'   => 'fit_parts_userBox_section',
				'settings'  => 'fit_partsUser_box7class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス8のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_box8title', array(
				'default'   => 'シンプルアイコンボックス',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス8のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_box8title', array(
				'section'   => 'fit_parts_userBox_section',
				'settings'  => 'fit_partsUser_box8title',
				'description' => '<hr><div class="customize-control-subtitle">ボックス8の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス8のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_box8class', array(
				'default'   => 'ep-box es-Bicon icon-tag bgc-VPorange',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス8のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_box8class', array(
				'section'   => 'fit_parts_userBox_section',
				'settings'  => 'fit_partsUser_box8class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス9のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_box9title', array(
				'default'   => '背景アイコンボックス',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス9のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_box9title', array(
				'section'   => 'fit_parts_userBox_section',
				'settings'  => 'fit_partsUser_box9title',
				'description' => '<hr><div class="customize-control-subtitle">ボックス9の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス9のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_box9class', array(
				'default'   => 'ep-box es-BiconBg icon-pushpin bgc-VPlime',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス9のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_box9class', array(
				'section'   => 'fit_parts_userBox_section',
				'settings'  => 'fit_partsUser_box9class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス10のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_box10title', array(
				'default'   => '帯アイコンボックス',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス10のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_box10title', array(
				'section'   => 'fit_parts_userBox_section',
				'settings'  => 'fit_partsUser_box10title',
				'description' => '<hr><div class="customize-control-subtitle">ボックス10の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス10のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_box10class', array(
				'default'   => 'ep-box icon-heart es-BiconObi es-borderSolidS',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス10のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_box10class', array(
				'section'   => 'fit_parts_userBox_section',
				'settings'  => 'fit_partsUser_box10class',
				'description' => '■スタイル',
				'type'      => 'text',
			));



		//セクションの追加
		$wp_customize->add_section( 'fit_parts_userInbox_section', array(
			'title'       => 'ボックス内ボックス設定',
			'panel'       => 'fit_parts_panel',
			'description' => 'エディタのスタイルボックス内ボックスの設定画面です。',
			'priority'  => 1,
		));

			// ユーザー定義ボックス内ボックス1のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_inbox1title', array(
				'default'   => 'ターコイズグラデタイトル',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス内ボックス1のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_inbox1title', array(
				'section'   => 'fit_parts_userInbox_section',
				'settings'  => 'fit_partsUser_inbox1title',
				'label'     => 'ボックス内ボックス設定',
				'description' => '<hr><div class="customize-control-subtitle">ボックス内ボックス1の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス内ボックス1のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_inbox1class', array(
				'default'   => 'ep-inbox es-Bwhole es-grada1 es-bold bgc-DLturquoise ftc-white es-center es-FbigL',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス内ボックス1のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_inbox1class', array(
				'section'   => 'fit_parts_userInbox_section',
				'settings'  => 'fit_partsUser_inbox1class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス内ボックス2のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_inbox2title', array(
				'default'   => 'アイコンボーダータイトル',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス内ボックス2のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_inbox2title', array(
				'section'   => 'fit_parts_userInbox_section',
				'settings'  => 'fit_partsUser_inbox2title',
				'description' => '<hr><div class="customize-control-subtitle">ボックス内ボックス2の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス内ボックス2のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_inbox2class', array(
				'default'   => 'ep-inbox es-Bwhole bgc-white es-borderSolidS brc-VLgray es-bold es-Bicon icon-pencil2 es-FbigL',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス内ボックス2のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_inbox2class', array(
				'section'   => 'fit_parts_userInbox_section',
				'settings'  => 'fit_partsUser_inbox2class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス内ボックス3のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_inbox3title', array(
				'default'   => 'ブルーシャドウタイトル',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス内ボックス3のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_inbox3title', array(
				'section'   => 'fit_parts_userInbox_section',
				'settings'  => 'fit_partsUser_inbox3title',
				'description' => '<hr><div class="customize-control-subtitle">ボックス内ボックス3の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス内ボックス3のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_inbox3class', array(
				'default'   => 'ep-inbox es-Bwhole bgc-DPsky ftc-white es-FbigL es-center es-bold es-TshadowD es-shadow es-BborderSolidM brc-white',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス内ボックス3のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_inbox3class', array(
				'section'   => 'fit_parts_userInbox_section',
				'settings'  => 'fit_partsUser_inbox3class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス内ボックス4のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_inbox4title', array(
				'default'   => 'サブタイトルボーダーボックス',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス内ボックス4のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_inbox4title', array(
				'section'   => 'fit_parts_userInbox_section',
				'settings'  => 'fit_partsUser_inbox4title',
				'description' => '<hr><div class="customize-control-subtitle">ボックス内ボックス4の設定</div>
				■タイトル',

				'type'      => 'text',
			));

			// ユーザー定義ボックス内ボックス4のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_inbox4class', array(
				'default'   => 'ep-inbox es-BsubTradi bgc-white es-borderSolidM es-radius brc-DPred',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス内ボックス4のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_inbox4class', array(
				'section'   => 'fit_parts_userInbox_section',
				'settings'  => 'fit_partsUser_inbox4class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス内ボックス5のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_inbox5title', array(
				'default'   => 'BIG括弧ボックス',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス内ボックス5のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_inbox5title', array(
				'section'   => 'fit_parts_userInbox_section',
				'settings'  => 'fit_partsUser_inbox5title',
				'description' => '<hr><div class="customize-control-subtitle">ボックス内ボックス5の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス内ボックス5のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_inbox5class', array(
				'default'   => 'ep-inbox es-Bbrackets bgc-white es-center es-bold es-FbigL',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス内ボックス5のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_inbox5class', array(
				'section'   => 'fit_parts_userInbox_section',
				'settings'  => 'fit_partsUser_inbox5class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス内ボックス6のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_inbox6title', array(
				'default'   => '方眼ペーパーボックス',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス内ボックス6のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_inbox6title', array(
				'section'   => 'fit_parts_userInbox_section',
				'settings'  => 'fit_partsUser_inbox6title',
				'description' => '<hr><div class="customize-control-subtitle">ボックス内ボックス6の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス内ボックス6のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_inbox6class', array(
				'default'   => 'ep-inbox es-BpaperRight es-grid bgc-VPsky',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス内ボックス6のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_inbox6class', array(
				'section'   => 'fit_parts_userInbox_section',
				'settings'  => 'fit_partsUser_inbox6class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス内ボックス7のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_inbox7title', array(
				'default'   => 'はてなボックス',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス内ボックス7のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_inbox7title', array(
				'section'   => 'fit_parts_userInbox_section',
				'settings'  => 'fit_partsUser_inbox7title',
				'description' => '<hr><div class="customize-control-subtitle">ボックス内ボックス7の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス内ボックス7のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_inbox7class', array(
				'default'   => 'ep-inbox es-BmarkHatena es-borderSolidS bgc-white brc-DPblue es-radius',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス内ボックス7のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_inbox7class', array(
				'section'   => 'fit_parts_userInbox_section',
				'settings'  => 'fit_partsUser_inbox7class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス内ボックス8のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_inbox8title', array(
				'default'   => 'ビックリボックス',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス内ボックス8のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_inbox8title', array(
				'section'   => 'fit_parts_userInbox_section',
				'settings'  => 'fit_partsUser_inbox8title',
				'description' => '<hr><div class="customize-control-subtitle">ボックス内ボックス8の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス内ボックス8のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_inbox8class', array(
				'default'   => 'ep-inbox es-BmarkExcl es-borderSolidS brc-DPred bgc-white es-radius',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス内ボックス8のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_inbox8class', array(
				'section'   => 'fit_parts_userInbox_section',
				'settings'  => 'fit_partsUser_inbox8class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス内ボックス9のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_inbox9title', array(
				'default'   => 'Qボックス',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス内ボックス9のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_inbox9title', array(
				'section'   => 'fit_parts_userInbox_section',
				'settings'  => 'fit_partsUser_inbox9title',
				'description' => '<hr><div class="customize-control-subtitle">ボックス内ボックス9の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス内ボックス9のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_inbox9class', array(
				'default'   => 'ep-inbox es-BmarkQ bgc-white',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス内ボックス9のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_inbox9class', array(
				'section'   => 'fit_parts_userInbox_section',
				'settings'  => 'fit_partsUser_inbox9class',
				'description' => '■スタイル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス内ボックス10のタイトル セッティング
			$wp_customize->add_setting( 'fit_partsUser_inbox10title', array(
				'default'   => 'Aボックス',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス内ボックス10のタイトル コントロール
			$wp_customize->add_control( 'fit_partsUser_inbox10title', array(
				'section'   => 'fit_parts_userInbox_section',
				'settings'  => 'fit_partsUser_inbox10title',
				'description' => '<hr><div class="customize-control-subtitle">ボックス内ボックス10の設定</div>
				■タイトル',
				'type'      => 'text',
			));

			// ユーザー定義ボックス内ボックス10のclass セッティング
			$wp_customize->add_setting( 'fit_partsUser_inbox10class', array(
				'default'   => 'ep-inbox es-BmarkA bgc-white',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// ユーザー定義ボックス内ボックス10のclass コントロール
			$wp_customize->add_control( 'fit_partsUser_inbox10class', array(
				'section'   => 'fit_parts_userInbox_section',
				'settings'  => 'fit_partsUser_inbox10class',
				'description' => '■スタイル',
				'type'      => 'text',
			));



		//セクションの追加
		$wp_customize->add_section( 'fit_parts_etc_section', array(
			'title'       => 'その他エディタ用パーツ設定',
			'panel'       => 'fit_parts_panel',
			'description' => 'エディタのその他デザインパーツ用の設定画面です。',
			'priority'  => 1,
		));

			// アイコンカラー セッティング
			$wp_customize->add_setting( 'fit_partsEtc_icon', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// アイコンカラーA コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsEtc_icon', array(
				'section' => 'fit_parts_etc_section',
				'settings' =>'fit_partsEtc_icon',
				'label'     => 'アイコン系パーツのアイコンカラー',
				'description' => '■アイコンの色を指定',
			)));

			// はてなボックスカラー セッティング
			$wp_customize->add_setting( 'fit_partsEtc_hatena', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// はてなボックスカラー コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsEtc_hatena', array(
				'section' => 'fit_parts_etc_section',
				'settings' =>'fit_partsEtc_hatena',
				'label'     => 'はてなボックスのはてなカラー',
				'description' => '■はてなの背景色を指定',
			)));

			// ビックリボックスカラー セッティング
			$wp_customize->add_setting( 'fit_partsEtc_excl', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// ビックリボックスカラー コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsEtc_excl', array(
				'section' => 'fit_parts_etc_section',
				'settings' =>'fit_partsEtc_excl',
				'label'     => 'ビックリボックスのビックリカラー',
				'description' => '■ビックリの背景色を指定',
			)));

			// Qボックスカラー セッティング
			$wp_customize->add_setting( 'fit_partsEtc_q', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// Qボックスカラー コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsEtc_q', array(
				'section' => 'fit_parts_etc_section',
				'settings' =>'fit_partsEtc_q',
				'label'     => 'QボックスのQカラー',
				'description' => '■Qの背景色を指定',
			)));

			// Aボックスカラー セッティング
			$wp_customize->add_setting( 'fit_partsEtc_a', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// Aボックスカラー コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsEtc_a', array(
				'section' => 'fit_parts_etc_section',
				'settings' =>'fit_partsEtc_a',
				'label'     => 'AボックスのAカラー',
				'description' => '■Aの文字色を指定',
			)));

			// サブタイトルボックスカラーA セッティング
			$wp_customize->add_setting( 'fit_partsEtc_subtitleA', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// サブタイトルボックスカラーA コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsEtc_subtitleA', array(
				'section' => 'fit_parts_etc_section',
				'settings' =>'fit_partsEtc_subtitleA',
				'label'     => 'サブタイトルボックスのカラー',
				'description' => '■文字色を指定',
			)));

			// サブタイトルボックスカラーB セッティング
			$wp_customize->add_setting( 'fit_partsEtc_subtitleB', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// サブタイトルボックスカラーB コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsEtc_subtitleB', array(
				'section' => 'fit_parts_etc_section',
				'settings' =>'fit_partsEtc_subtitleB',
				'description' => '■背景色を指定',
			)));

			// サブタイトルボックスカラーC セッティング
			$wp_customize->add_setting( 'fit_partsEtc_subtitleC', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// サブタイトルボックスカラーC コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsEtc_subtitleC', array(
				'section' => 'fit_parts_etc_section',
				'settings' =>'fit_partsEtc_subtitleC',
				'description' => '■線色を指定',
			)));






		//セクションの追加
		$wp_customize->add_section( 'fit_parts_btn_section', array(
			'title'       => '共通ボタン設定(全ページ用)',
			'panel'       => 'fit_parts_panel',
			'description' => '全ページ用の共通ボタン設定画面です。',
			'priority'  => 1,
		));

			// プライマリーボタンカラーA セッティング
			$wp_customize->add_setting( 'fit_partsBtn_primaryColorA', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// プライマリーボタンカラーA コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsBtn_primaryColorA', array(
				'section' => 'fit_parts_btn_section',
				'settings' =>'fit_partsBtn_primaryColorA',
				'label'     => '共通ボタン設定',
				'description' => '<hr><div class="customize-control-subtitle">プライマリーボタンの設定</div>
				■文字色を指定',
			)));

			// カラーB セッティング
			$wp_customize->add_setting( 'fit_partsBtn_primaryColorB', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// カラーB コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsBtn_primaryColorB', array(
				'section' => 'fit_parts_btn_section',
				'settings' =>'fit_partsBtn_primaryColorB',
				'description' => '■背景色を指定',
			)));


			// セカンダリーボタンカラーA セッティング
			$wp_customize->add_setting( 'fit_partsBtn_secondaryColorA', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// セカンダリーボタンカラーA コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsBtn_secondaryColorA', array(
				'section' => 'fit_parts_btn_section',
				'settings' =>'fit_partsBtn_secondaryColorA',
				'description' => '<hr><div class="customize-control-subtitle">セカンダリーボタンの設定</div>
				■文字色を指定',
			)));

			// カラーB セッティング
			$wp_customize->add_setting( 'fit_partsBtn_secondaryColorB', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// カラーB コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsBtn_secondaryColorB', array(
				'section' => 'fit_parts_btn_section',
				'settings' =>'fit_partsBtn_secondaryColorB',
				'description' => '■背景色を指定',
			)));


			// ノーマルボタンカラーA セッティング
			$wp_customize->add_setting( 'fit_partsBtn_normalColorA', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// ノーマルボタンカラーA コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsBtn_normalColorA', array(
				'section' => 'fit_parts_btn_section',
				'settings' =>'fit_partsBtn_normalColorA',
				'description' => '<hr><div class="customize-control-subtitle">ノーマルボタンの設定</div>
				■色を指定',
			)));




		//セクションの追加
		$wp_customize->add_section( 'fit_parts_head_section', array(
			'title'       => '見出し設定(個別ページ用)',
			'panel'       => 'fit_parts_panel',
			'description' => '個別ページ用の見出し設定画面です。',
			'priority'  => 1,
		));

			// H2見出しデザイン セッティング
			$wp_customize->add_setting( 'fit_partsHead_2', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// H2見出しデザイン コントロール
			$wp_customize->add_control( 'fit_partsHead_2', array(
				'section'   => 'fit_parts_head_section',
				'settings'  => 'fit_partsHead_2',
				'label'     => '見出しデザイン設定',
				'description' => '<hr><div class="customize-control-subtitle">H2見出しの設定</div>
				■デザインを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' =>'基本[カラーA:文字](default)',
					'1'  => '下線-基本[カラーA:文字　B:下線]',
					'2'  => '下線-2本[カラーA:文字　B:下線]',
					'3'  => '下線-1本点線[カラーA:文字　B:下線]',
					'4'  => '下線-1本2色[カラーA:文字　B:下線左　C:下線右]',
					'5'  => '下線-マーカー[カラーA:文字　B:下線]',
					'6'  => '下線-1本矢印[カラーA:文字　B:下線]',
					'7'  => '下線-ストライプ[カラーA:文字　B:下線　C:下線]',
					'8'  => '下線-グラデ[カラーA:文字　B:下線左　C:下線右]',
					'9'  => '下線-センター[カラーA:文字　B:下線]',
					'10' => '下線-センター矢印[カラーA:文字　B:下線]',
					'11' => '左線-基本[カラーA:文字　B:左線]',
					'12' => '左下線-基本[カラーA:文字　B:左線　C:下線]',
					'13' => '左下線-下点線[カラーA:文字　B:左線　C:下線]',
					'14' => '左下線-左2色[カラーA:文字　B:左線上　C:左線下 & 下線]',
					'21' => '背景-基本[カラーA:文字　B:背景]',
					'22' => '背景-下線[カラーA:文字　B:背景　C:下線]',
					'23' => '背景-左線[カラーA:文字　B:背景　C:左線]',
					'24' => '背景-左下線[カラーA:文字　B:背景　C:左線]',
					'25' => '背景-吹き出し[カラーA:文字　B:背景]',
					'26' => '背景-吹き出し線付[カラーA:文字　B:背景　C:線]',
					'27' => '背景-リボン[カラーA:文字　B:背景　C:影]',
					'28' => '背景-ボックス[カラーA:文字　B:背景　C:影]',
					'29' => '背景-ステッチ[カラーA:文字　B:背景　C:線]',
					'30' => '背景-ストライプ[カラーA:文字　B:背景　C:背景]',
					'31' => '背景-線[カラーA:文字　B:背景　C:線]',
					'32' => '背景-点線角丸[カラーA:文字　B:背景　C:線]',
					'33' => '背景-括弧[カラーA:文字　B:線]',
					'34' => '背景-はみ出す線[カラーA:文字　B:線]',
					'41' => 'グラデ-基本[カラーA:文字　B:背景　C:背景 & 線]',
					'42' => 'グラデ-角丸[カラーA:文字　B:背景　C:背景 & 線]',
					'43' => 'グラデ-ラウンド[カラーA:文字　B:背景　C:背景 & 線]',
					'44' => 'グラデ-シンプル[カラーA:文字　B:背景　C:背景 & 線]',
					'45' => 'グラデ-シンプル角丸[カラーA:文字　B:背景　C:背景 & 線]',
					'46' => 'グラデ-シンプルラウンド[カラーA:文字　B:背景　C:背景 & 線]',
					'47' => 'グラデ-上線(文字黒)[カラーA:上線　B:背景　C:背景 & 線]',
					'48' => 'グラデ-上線角丸(文字黒)[カラーA:上線　B:背景　C:背景 & 線]',
					'49' => 'グラデ-上線(文字白)[カラーA:上線　B:背景　C:背景 & 線]',
					'50' => 'グラデ-上線角丸(文字白)[カラーA:上線　B:背景　C:背景 & 線]',
					'61' => 'ラインマーク-基本[カラーA:文字　B:マーク]',
					'62' => 'ラインマーク-背景角丸[カラーA:文字 & マーク　B:背景]',
					'63' => 'ラインマーク-背景線角丸[カラーA:文字 & マーク　B:背景　C:線]',
					'64' => 'ラインマーク-グラデ上線(文字黒)[カラーA:上線 & マーク　B:背景　C:背景 & 線]',
					'65' => 'ラインマーク-グラデ上線(文字白)[カラーA:上線 & マーク　B:背景　C:背景 & 線]',
					'71' => '丸マーク-基本[カラーA:文字　B:マーク]',
					'72' => '丸マーク-背景角丸[カラーA:文字 & マーク　B:背景]',
					'73' => '丸マーク-背景線角丸[カラーA:文字 & マーク　B:背景　C:線]',
					'74' => '丸マーク-グラデ上線(文字黒)[カラーA:上線 & マーク　B:背景　C:背景 & 線]',
					'75' => '丸マーク-グラデ上線(文字白)[カラーA:上線 & マーク　B:背景　C:背景 & 線]',
					'81' => '先頭大-基本[カラーA:文字　B:先頭文字]',
					'82' => '先頭大-先頭下線[カラーA:文字　B:先頭文字 & 先頭下線]',
					'83' => '先頭大-下線[カラーA:文字　B:先頭文字　C:下線]',
					'84' => '先頭大-線角丸[カラーA:文字　B:先頭文字　C:線]',
				),
			));

			// カラーA セッティング
			$wp_customize->add_setting( 'fit_partsHead_2colorA', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// カラーA コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsHead_2colorA', array(
				'section' => 'fit_parts_head_section',
				'settings' =>'fit_partsHead_2colorA',
				'description' => '■カラーAを指定',
			)));

			// カラーB セッティング
			$wp_customize->add_setting( 'fit_partsHead_2colorB', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// カラーB コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsHead_2colorB', array(
				'section' => 'fit_parts_head_section',
				'settings' =>'fit_partsHead_2colorB',
				'description' => '■カラーBを指定',
			)));

			// カラーC セッティング
			$wp_customize->add_setting( 'fit_partsHead_2colorC', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// カラーC コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsHead_2colorC', array(
				'section' => 'fit_parts_head_section',
				'settings' =>'fit_partsHead_2colorC',
				'description' => '■カラーCを指定',
			)));


			// H3見出しデザイン セッティング
			$wp_customize->add_setting( 'fit_partsHead_3', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// H3見出しデザイン コントロール
			$wp_customize->add_control( 'fit_partsHead_3', array(
				'section'   => 'fit_parts_head_section',
				'settings'  => 'fit_partsHead_3',
				'description' => '<hr><div class="customize-control-subtitle">H3見出しの設定</div>
				■デザインを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' =>'基本[カラーA:文字](default)',
					'1'  => '下線-基本[カラーA:文字　B:下線]',
					'2'  => '下線-2本[カラーA:文字　B:下線]',
					'3'  => '下線-1本点線[カラーA:文字　B:下線]',
					'4'  => '下線-1本2色[カラーA:文字　B:下線左　C:下線右]',
					'5'  => '下線-マーカー[カラーA:文字　B:下線]',
					'6'  => '下線-1本矢印[カラーA:文字　B:下線]',
					'7'  => '下線-ストライプ[カラーA:文字　B:下線　C:下線]',
					'8'  => '下線-グラデ[カラーA:文字　B:下線左　C:下線右]',
					'9'  => '下線-センター[カラーA:文字　B:下線]',
					'10' => '下線-センター矢印[カラーA:文字　B:下線]',
					'11' => '左線-基本[カラーA:文字　B:左線]',
					'12' => '左下線-基本[カラーA:文字　B:左線　C:下線]',
					'13' => '左下線-下点線[カラーA:文字　B:左線　C:下線]',
					'14' => '左下線-左2色[カラーA:文字　B:左線上　C:左線下 & 下線]',
					'21' => '背景-基本[カラーA:文字　B:背景]',
					'22' => '背景-下線[カラーA:文字　B:背景　C:下線]',
					'23' => '背景-左線[カラーA:文字　B:背景　C:左線]',
					'24' => '背景-左下線[カラーA:文字　B:背景　C:左線]',
					'25' => '背景-吹き出し[カラーA:文字　B:背景]',
					'26' => '背景-吹き出し線付[カラーA:文字　B:背景　C:線]',
					'27' => '背景-リボン[カラーA:文字　B:背景　C:影]',
					'28' => '背景-ボックス[カラーA:文字　B:背景　C:影]',
					'29' => '背景-ステッチ[カラーA:文字　B:背景　C:線]',
					'30' => '背景-ストライプ[カラーA:文字　B:背景　C:背景]',
					'31' => '背景-線[カラーA:文字　B:背景　C:線]',
					'32' => '背景-点線角丸[カラーA:文字　B:背景　C:線]',
					'33' => '背景-括弧[カラーA:文字　B:線]',
					'34' => '背景-はみ出す線[カラーA:文字　B:線]',
					'41' => 'グラデ-基本[カラーA:文字　B:背景　C:背景 & 線]',
					'42' => 'グラデ-角丸[カラーA:文字　B:背景　C:背景 & 線]',
					'43' => 'グラデ-ラウンド[カラーA:文字　B:背景　C:背景 & 線]',
					'44' => 'グラデ-シンプル[カラーA:文字　B:背景　C:背景 & 線]',
					'45' => 'グラデ-シンプル角丸[カラーA:文字　B:背景　C:背景 & 線]',
					'46' => 'グラデ-シンプルラウンド[カラーA:文字　B:背景　C:背景 & 線]',
					'47' => 'グラデ-上線(文字黒)[カラーA:上線　B:背景　C:背景 & 線]',
					'48' => 'グラデ-上線角丸(文字黒)[カラーA:上線　B:背景　C:背景 & 線]',
					'49' => 'グラデ-上線(文字白)[カラーA:上線　B:背景　C:背景 & 線]',
					'50' => 'グラデ-上線角丸(文字白)[カラーA:上線　B:背景　C:背景 & 線]',
					'61' => 'ラインマーク-基本[カラーA:文字　B:マーク]',
					'62' => 'ラインマーク-背景角丸[カラーA:文字 & マーク　B:背景]',
					'63' => 'ラインマーク-背景線角丸[カラーA:文字 & マーク　B:背景　C:線]',
					'64' => 'ラインマーク-グラデ上線(文字黒)[カラーA:上線 & マーク　B:背景　C:背景 & 線]',
					'65' => 'ラインマーク-グラデ上線(文字白)[カラーA:上線 & マーク　B:背景　C:背景 & 線]',
					'71' => '丸マーク-基本[カラーA:文字　B:マーク]',
					'72' => '丸マーク-背景角丸[カラーA:文字 & マーク　B:背景]',
					'73' => '丸マーク-背景線角丸[カラーA:文字 & マーク　B:背景　C:線]',
					'74' => '丸マーク-グラデ上線(文字黒)[カラーA:上線 & マーク　B:背景　C:背景 & 線]',
					'75' => '丸マーク-グラデ上線(文字白)[カラーA:上線 & マーク　B:背景　C:背景 & 線]',
					'81' => '先頭大-基本[カラーA:文字　B:先頭文字]',
					'82' => '先頭大-先頭下線[カラーA:文字　B:先頭文字 & 先頭下線]',
					'83' => '先頭大-下線[カラーA:文字　B:先頭文字　C:下線]',
					'84' => '先頭大-線角丸[カラーA:文字　B:先頭文字　C:線]',
				),
			));

			// カラーA セッティング
			$wp_customize->add_setting( 'fit_partsHead_3colorA', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// カラーA コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsHead_3colorA', array(
				'section' => 'fit_parts_head_section',
				'settings' =>'fit_partsHead_3colorA',
				'description' => '■カラーAを指定',
			)));

			// カラーB セッティング
			$wp_customize->add_setting( 'fit_partsHead_3colorB', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// カラーB コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsHead_3colorB', array(
				'section' => 'fit_parts_head_section',
				'settings' =>'fit_partsHead_3colorB',
				'description' => '■カラーBを指定',
			)));

			// カラーC セッティング
			$wp_customize->add_setting( 'fit_partsHead_3colorC', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// カラーC コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsHead_3colorC', array(
				'section' => 'fit_parts_head_section',
				'settings' =>'fit_partsHead_3colorC',
				'description' => '■カラーCを指定',
			)));


			// H4見出しデザイン セッティング
			$wp_customize->add_setting( 'fit_partsHead_4', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// H4見出しデザイン コントロール
			$wp_customize->add_control( 'fit_partsHead_4', array(
				'section'   => 'fit_parts_head_section',
				'settings'  => 'fit_partsHead_4',
				'description' => '<hr><div class="customize-control-subtitle">H4見出しの設定</div>
				■デザインを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' =>'基本[カラーA:文字](default)',
					'1'  => '下線-基本[カラーA:文字　B:下線]',
					'2'  => '下線-2本[カラーA:文字　B:下線]',
					'3'  => '下線-1本点線[カラーA:文字　B:下線]',
					'4'  => '下線-1本2色[カラーA:文字　B:下線左　C:下線右]',
					'5'  => '下線-マーカー[カラーA:文字　B:下線]',
					'6'  => '下線-1本矢印[カラーA:文字　B:下線]',
					'7'  => '下線-ストライプ[カラーA:文字　B:下線　C:下線]',
					'8'  => '下線-グラデ[カラーA:文字　B:下線左　C:下線右]',
					'9'  => '下線-センター[カラーA:文字　B:下線]',
					'10' => '下線-センター矢印[カラーA:文字　B:下線]',
					'11' => '左線-基本[カラーA:文字　B:左線]',
					'12' => '左下線-基本[カラーA:文字　B:左線　C:下線]',
					'13' => '左下線-下点線[カラーA:文字　B:左線　C:下線]',
					'14' => '左下線-左2色[カラーA:文字　B:左線上　C:左線下 & 下線]',
					'21' => '背景-基本[カラーA:文字　B:背景]',
					'22' => '背景-下線[カラーA:文字　B:背景　C:下線]',
					'23' => '背景-左線[カラーA:文字　B:背景　C:左線]',
					'24' => '背景-左下線[カラーA:文字　B:背景　C:左線]',
					'25' => '背景-吹き出し[カラーA:文字　B:背景]',
					'26' => '背景-吹き出し線付[カラーA:文字　B:背景　C:線]',
					'27' => '背景-リボン[カラーA:文字　B:背景　C:影]',
					'28' => '背景-ボックス[カラーA:文字　B:背景　C:影]',
					'29' => '背景-ステッチ[カラーA:文字　B:背景　C:線]',
					'30' => '背景-ストライプ[カラーA:文字　B:背景　C:背景]',
					'31' => '背景-線[カラーA:文字　B:背景　C:線]',
					'32' => '背景-点線角丸[カラーA:文字　B:背景　C:線]',
					'33' => '背景-括弧[カラーA:文字　B:線]',
					'34' => '背景-はみ出す線[カラーA:文字　B:線]',
					'41' => 'グラデ-基本[カラーA:文字　B:背景　C:背景 & 線]',
					'42' => 'グラデ-角丸[カラーA:文字　B:背景　C:背景 & 線]',
					'43' => 'グラデ-ラウンド[カラーA:文字　B:背景　C:背景 & 線]',
					'44' => 'グラデ-シンプル[カラーA:文字　B:背景　C:背景 & 線]',
					'45' => 'グラデ-シンプル角丸[カラーA:文字　B:背景　C:背景 & 線]',
					'46' => 'グラデ-シンプルラウンド[カラーA:文字　B:背景　C:背景 & 線]',
					'47' => 'グラデ-上線(文字黒)[カラーA:上線　B:背景　C:背景 & 線]',
					'48' => 'グラデ-上線角丸(文字黒)[カラーA:上線　B:背景　C:背景 & 線]',
					'49' => 'グラデ-上線(文字白)[カラーA:上線　B:背景　C:背景 & 線]',
					'50' => 'グラデ-上線角丸(文字白)[カラーA:上線　B:背景　C:背景 & 線]',
					'61' => 'ラインマーク-基本[カラーA:文字　B:マーク]',
					'62' => 'ラインマーク-背景角丸[カラーA:文字 & マーク　B:背景]',
					'63' => 'ラインマーク-背景線角丸[カラーA:文字 & マーク　B:背景　C:線]',
					'64' => 'ラインマーク-グラデ上線(文字黒)[カラーA:上線 & マーク　B:背景　C:背景 & 線]',
					'65' => 'ラインマーク-グラデ上線(文字白)[カラーA:上線 & マーク　B:背景　C:背景 & 線]',
					'71' => '丸マーク-基本[カラーA:文字　B:マーク]',
					'72' => '丸マーク-背景角丸[カラーA:文字 & マーク　B:背景]',
					'73' => '丸マーク-背景線角丸[カラーA:文字 & マーク　B:背景　C:線]',
					'74' => '丸マーク-グラデ上線(文字黒)[カラーA:上線 & マーク　B:背景　C:背景 & 線]',
					'75' => '丸マーク-グラデ上線(文字白)[カラーA:上線 & マーク　B:背景　C:背景 & 線]',
					'81' => '先頭大-基本[カラーA:文字　B:先頭文字]',
					'82' => '先頭大-先頭下線[カラーA:文字　B:先頭文字 & 先頭下線]',
					'83' => '先頭大-下線[カラーA:文字　B:先頭文字　C:下線]',
					'84' => '先頭大-線角丸[カラーA:文字　B:先頭文字　C:線]',
				),
			));

			// カラーA セッティング
			$wp_customize->add_setting( 'fit_partsHead_4colorA', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// カラーA コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsHead_4colorA', array(
				'section' => 'fit_parts_head_section',
				'settings' =>'fit_partsHead_4colorA',
				'description' => '■カラーAを指定',
			)));

			// カラーB セッティング
			$wp_customize->add_setting( 'fit_partsHead_4colorB', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// カラーB コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsHead_4colorB', array(
				'section' => 'fit_parts_head_section',
				'settings' =>'fit_partsHead_4colorB',
				'description' => '■カラーBを指定',
			)));

			// カラーC セッティング
			$wp_customize->add_setting( 'fit_partsHead_4colorC', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// カラーC コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsHead_4colorC', array(
				'section' => 'fit_parts_head_section',
				'settings' =>'fit_partsHead_4colorC',
				'description' => '■カラーCを指定',
			)));



			// H5見出しデザイン セッティング
			$wp_customize->add_setting( 'fit_partsHead_5', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// H5見出しデザイン コントロール
			$wp_customize->add_control( 'fit_partsHead_5', array(
				'section'   => 'fit_parts_head_section',
				'settings'  => 'fit_partsHead_5',
				'description' => '<hr><div class="customize-control-subtitle">H5見出しの設定</div>
				■デザインを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' =>'基本[カラーA:文字](default)',
					'1'  => '下線-基本[カラーA:文字　B:下線]',
					'2'  => '下線-2本[カラーA:文字　B:下線]',
					'3'  => '下線-1本点線[カラーA:文字　B:下線]',
					'4'  => '下線-1本2色[カラーA:文字　B:下線左　C:下線右]',
					'5'  => '下線-マーカー[カラーA:文字　B:下線]',
					'6'  => '下線-1本矢印[カラーA:文字　B:下線]',
					'7'  => '下線-ストライプ[カラーA:文字　B:下線　C:下線]',
					'8'  => '下線-グラデ[カラーA:文字　B:下線左　C:下線右]',
					'9'  => '下線-センター[カラーA:文字　B:下線]',
					'10' => '下線-センター矢印[カラーA:文字　B:下線]',
					'11' => '左線-基本[カラーA:文字　B:左線]',
					'12' => '左下線-基本[カラーA:文字　B:左線　C:下線]',
					'13' => '左下線-下点線[カラーA:文字　B:左線　C:下線]',
					'14' => '左下線-左2色[カラーA:文字　B:左線上　C:左線下 & 下線]',
					'21' => '背景-基本[カラーA:文字　B:背景]',
					'22' => '背景-下線[カラーA:文字　B:背景　C:下線]',
					'23' => '背景-左線[カラーA:文字　B:背景　C:左線]',
					'24' => '背景-左下線[カラーA:文字　B:背景　C:左線]',
					'25' => '背景-吹き出し[カラーA:文字　B:背景]',
					'26' => '背景-吹き出し線付[カラーA:文字　B:背景　C:線]',
					'27' => '背景-リボン[カラーA:文字　B:背景　C:影]',
					'28' => '背景-ボックス[カラーA:文字　B:背景　C:影]',
					'29' => '背景-ステッチ[カラーA:文字　B:背景　C:線]',
					'30' => '背景-ストライプ[カラーA:文字　B:背景　C:背景]',
					'31' => '背景-線[カラーA:文字　B:背景　C:線]',
					'32' => '背景-点線角丸[カラーA:文字　B:背景　C:線]',
					'33' => '背景-括弧[カラーA:文字　B:線]',
					'34' => '背景-はみ出す線[カラーA:文字　B:線]',
					'41' => 'グラデ-基本[カラーA:文字　B:背景　C:背景 & 線]',
					'42' => 'グラデ-角丸[カラーA:文字　B:背景　C:背景 & 線]',
					'43' => 'グラデ-ラウンド[カラーA:文字　B:背景　C:背景 & 線]',
					'44' => 'グラデ-シンプル[カラーA:文字　B:背景　C:背景 & 線]',
					'45' => 'グラデ-シンプル角丸[カラーA:文字　B:背景　C:背景 & 線]',
					'46' => 'グラデ-シンプルラウンド[カラーA:文字　B:背景　C:背景 & 線]',
					'47' => 'グラデ-上線(文字黒)[カラーA:上線　B:背景　C:背景 & 線]',
					'48' => 'グラデ-上線角丸(文字黒)[カラーA:上線　B:背景　C:背景 & 線]',
					'49' => 'グラデ-上線(文字白)[カラーA:上線　B:背景　C:背景 & 線]',
					'50' => 'グラデ-上線角丸(文字白)[カラーA:上線　B:背景　C:背景 & 線]',
					'61' => 'ラインマーク-基本[カラーA:文字　B:マーク]',
					'62' => 'ラインマーク-背景角丸[カラーA:文字 & マーク　B:背景]',
					'63' => 'ラインマーク-背景線角丸[カラーA:文字 & マーク　B:背景　C:線]',
					'64' => 'ラインマーク-グラデ上線(文字黒)[カラーA:上線 & マーク　B:背景　C:背景 & 線]',
					'65' => 'ラインマーク-グラデ上線(文字白)[カラーA:上線 & マーク　B:背景　C:背景 & 線]',
					'71' => '丸マーク-基本[カラーA:文字　B:マーク]',
					'72' => '丸マーク-背景角丸[カラーA:文字 & マーク　B:背景]',
					'73' => '丸マーク-背景線角丸[カラーA:文字 & マーク　B:背景　C:線]',
					'74' => '丸マーク-グラデ上線(文字黒)[カラーA:上線 & マーク　B:背景　C:背景 & 線]',
					'75' => '丸マーク-グラデ上線(文字白)[カラーA:上線 & マーク　B:背景　C:背景 & 線]',
					'81' => '先頭大-基本[カラーA:文字　B:先頭文字]',
					'82' => '先頭大-先頭下線[カラーA:文字　B:先頭文字 & 先頭下線]',
					'83' => '先頭大-下線[カラーA:文字　B:先頭文字　C:下線]',
					'84' => '先頭大-線角丸[カラーA:文字　B:先頭文字　C:線]',
				),
			));

			// カラーA セッティング
			$wp_customize->add_setting( 'fit_partsHead_5colorA', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// カラーA コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsHead_5colorA', array(
				'section' => 'fit_parts_head_section',
				'settings' =>'fit_partsHead_5colorA',
				'description' => '■カラーAを指定',
			)));

			// カラーB セッティング
			$wp_customize->add_setting( 'fit_partsHead_5colorB', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// カラーB コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsHead_5colorB', array(
				'section' => 'fit_parts_head_section',
				'settings' =>'fit_partsHead_5colorB',
				'description' => '■カラーBを指定',
			)));

			// カラーC セッティング
			$wp_customize->add_setting( 'fit_partsHead_5colorC', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// カラーC コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsHead_5colorC', array(
				'section' => 'fit_parts_head_section',
				'settings' =>'fit_partsHead_5colorC',
				'description' => '■カラーCを指定',
			)));


		//セクションの追加
		$wp_customize->add_section( 'fit_parts_list_section', array(
			'title'       => 'リスト設定(個別ページ用)',
			'panel'       => 'fit_parts_panel',
			'description' => '個別ページ用のリスト設定画面です。',
			'priority'  => 1,
		));

			// ulリストデザイン セッティング
			$wp_customize->add_setting( 'fit_partsList_ul', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// ulリストデザイン コントロール
			$wp_customize->add_control( 'fit_partsList_ul', array(
				'section'   => 'fit_parts_list_section',
				'settings'  => 'fit_partsList_ul',
				'label'     => 'リストデザイン設定',
				'description' => '<hr><div class="customize-control-subtitle">番号無しリストの設定</div>
				■デザインを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '基本[カラーA:マーク　B:文字](default)',
					'1'   => '背景[カラーA:マーク　B:文字　C:背景]',
					'2'   => 'ステッチ[カラーA:マーク　B:線　C:背景]',
					'3'   => 'ペーパー[カラーA:マーク　B:文字　C:背景]',
					'4'   => '方眼用紙[カラーA:マーク　B:文字　C:背景]',
					'5'   => '線[カラーA:マーク　B:線　C:背景]',
					'6'   => '点線[カラーA:マーク　B:線　C:背景]',
					'7'   => 'はみ出す線[カラーA:マーク　B:文字　C:線]',
				),
			));

			// カラーA セッティング
			$wp_customize->add_setting( 'fit_partsList_ulColorA', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// カラーA コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsList_ulColorA', array(
				'section' => 'fit_parts_list_section',
				'settings' =>'fit_partsList_ulColorA',
				'description' => '■カラーAを指定',
			)));

			// カラーB セッティング
			$wp_customize->add_setting( 'fit_partsList_ulColorB', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// カラーB コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsList_ulColorB', array(
				'section' => 'fit_parts_list_section',
				'settings' =>'fit_partsList_ulColorB',
				'description' => '■カラーBを指定',
			)));

			// カラーC セッティング
			$wp_customize->add_setting( 'fit_partsList_ulColorC', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// カラーC コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsList_ulColorC', array(
				'section' => 'fit_parts_list_section',
				'settings' =>'fit_partsList_ulColorC',
				'description' => '■カラーCを指定',
			)));


			// olリストデザイン セッティング
			$wp_customize->add_setting( 'fit_partsList_ol', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// olリストデザイン コントロール
			$wp_customize->add_control( 'fit_partsList_ol', array(
				'section'   => 'fit_parts_list_section',
				'settings'  => 'fit_partsList_ol',
				'description' => '<hr><div class="customize-control-subtitle">番号付きリストの設定</div>
				■デザインを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '基本[カラーA:マーク　B:文字](default)',
					'1'   => '背景[カラーA:マーク　B:文字　C:背景]',
					'2'   => 'ステッチ[カラーA:マーク　B:線　C:背景]',
					'3'   => 'ペーパー[カラーA:マーク　B:文字　C:背景]',
					'4'   => '方眼用紙[カラーA:マーク　B:文字　C:背景]',
					'5'   => '線[カラーA:マーク　B:線　C:背景]',
					'6'   => '点線[カラーA:マーク　B:線　C:背景]',
					'7'   => 'はみ出す線[カラーA:マーク　B:文字　C:線]',
				),
			));

			// カラーA セッティング
			$wp_customize->add_setting( 'fit_partsList_olColorA', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// カラーA コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsList_olColorA', array(
				'section' => 'fit_parts_list_section',
				'settings' =>'fit_partsList_olColorA',
				'description' => '■カラーAを指定',
			)));

			// カラーB セッティング
			$wp_customize->add_setting( 'fit_partsList_olColorB', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// カラーB コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsList_olColorB', array(
				'section' => 'fit_parts_list_section',
				'settings' =>'fit_partsList_olColorB',
				'description' => '■カラーBを指定',
			)));

			// カラーC セッティング
			$wp_customize->add_setting( 'fit_partsList_olColorC', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// カラーC コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsList_olColorC', array(
				'section' => 'fit_parts_list_section',
				'settings' =>'fit_partsList_olColorC',
				'description' => '■カラーCを指定',
			)));


		//セクションの追加
		$wp_customize->add_section( 'fit_parts_balloon_section', array(
			'title'       => '吹き出し設定(個別ページ用)',
			'panel'       => 'fit_parts_panel',
			'description' => '個別ページ用の吹き出し設定画面です。',
			'priority'  => 1,
		));

			// 吹き出し画像サイズ セッティング
			$wp_customize->add_setting( 'fit_partsList_balloonSize', array(
				'default'   => 'normal',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 吹き出し画像サイズ コントロール
			$wp_customize->add_control( 'fit_partsList_balloonSize', array(
				'section'   => 'fit_parts_balloon_section',
				'settings'  => 'fit_partsList_balloonSize',
				'label'     => '吹き出しデザイン設定',
				'description' => '<hr><div class="customize-control-subtitle">吹き出し画像の設定</div>
				■画像サイズを選択',
				'type'      => 'select',
				'choices'   => array(
					'normal' => 'ノーマル(default)',
					'big'  => 'ビッグ',
				),
			));

			//吹き出し画像(左) セッティング
			$wp_customize->add_setting('fit_partsList_balloonImgLeft', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'fit_sanitize_image',
			));
			//吹き出し画像(左) コントロール
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'fit_partsList_balloonImgLeft', array(
				'section' => 'fit_parts_balloon_section',
				'settings' => 'fit_partsList_balloonImgLeft',
				'description' => '■左画像を指定',
			)));

			// 吹き出し名前(左) セッティング
			$wp_customize->add_setting( 'fit_partsList_balloonNameLeft', array(
				'default'   => 'Name',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// 吹き出し名前(左) コントロール
			$wp_customize->add_control( 'fit_partsList_balloonNameLeft', array(
				'section'   => 'fit_parts_balloon_section',
				'settings'  => 'fit_partsList_balloonNameLeft',
				'description' => '■左名前を入力',
				'type'      => 'text',
			));

			//吹き出し画像(右) セッティング
			$wp_customize->add_setting('fit_partsList_balloonImgRight', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'fit_sanitize_image',
			));
			//吹き出し画像(右) コントロール
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'fit_partsList_balloonImgRight', array(
				'section' => 'fit_parts_balloon_section',
				'settings' => 'fit_partsList_balloonImgRight',
				'description' => '■右画像を指定',
			)));

			// 吹き出し名前(右) セッティング
			$wp_customize->add_setting( 'fit_partsList_balloonNameRight', array(
				'default'   => 'Name',
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// 吹き出し名前(右) コントロール
			$wp_customize->add_control( 'fit_partsList_balloonNameRight', array(
				'section'   => 'fit_parts_balloon_section',
				'settings'  => 'fit_partsList_balloonNameRight',
				'description' => '■右名前を入力',
				'type'      => 'text',
			));


			// 背景吹き出しカラーA セッティング
			$wp_customize->add_setting( 'fit_partsList_balloonBgColorA', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// 背景吹き出しカラーA コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsList_balloonBgColorA', array(
				'section' => 'fit_parts_balloon_section',
				'settings' =>'fit_partsList_balloonBgColorA',
				'description' => '<hr><div class="customize-control-subtitle">背景吹き出しの設定</div>
				■文字色を指定',
			)));

			// カラーB セッティング
			$wp_customize->add_setting( 'fit_partsList_balloonBgColorB', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// カラーB コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsList_balloonBgColorB', array(
				'section' => 'fit_parts_balloon_section',
				'settings' =>'fit_partsList_balloonBgColorB',
				'description' => '■背景色を指定',
			)));


			// ボーダー吹き出しカラーA セッティング
			$wp_customize->add_setting( 'fit_partsList_balloonBrColorA', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// ボーダー吹き出しカラーA コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsList_balloonBrColorA', array(
				'section' => 'fit_parts_balloon_section',
				'settings' =>'fit_partsList_balloonBrColorA',
				'description' => '<hr><div class="customize-control-subtitle">ボーダー吹き出しの設定</div>
				■文字色を指定',
			)));

			// カラーB セッティング
			$wp_customize->add_setting( 'fit_partsList_balloonBrColorB', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// カラーB コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsList_balloonBrColorB', array(
				'section' => 'fit_parts_balloon_section',
				'settings' =>'fit_partsList_balloonBrColorB',
				'description' => '■背景色を指定',
			)));

			// カラーC セッティング
			$wp_customize->add_setting( 'fit_partsList_balloonBrColorC', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// カラーC コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsList_balloonBrColorC', array(
				'section' => 'fit_parts_balloon_section',
				'settings' =>'fit_partsList_balloonBrColorC',
				'description' => '■線色を指定',
			)));



		//セクションの追加
		$wp_customize->add_section( 'fit_parts_quote_section', array(
			'title'       => '引用設定(個別ページ用)',
			'panel'       => 'fit_parts_panel',
			'description' => '個別ページ用の引用設定画面です。',
			'priority'  => 1,
		));

			// 引用デザイン セッティング
			$wp_customize->add_setting( 'fit_partsList_quote', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// 引用デザイン コントロール
			$wp_customize->add_control( 'fit_partsList_quote', array(
				'section'   => 'fit_parts_quote_section',
				'settings'  => 'fit_partsList_quote',
				'label'     => '引用デザイン設定',
				'description' => '■デザインを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '基本[カラーA:文字　B:背景　C:マーク](default)',
					'1'   => '左線[カラーA:文字　B:背景　C:マーク　D:線]',
					'2'   => '線[カラーA:文字　B:背景　C:マーク　D:線]',
					'3'   => '丸角[カラーA:文字　B:背景　C:マーク]',
					'4'   => '丸角線[カラーA:文字　B:背景　C:マーク　D:線]',
					'5'   => '左背景[カラーA:文字　B:背景　C:マーク　D:線]',
					'6'   => 'ラベル[カラーA:文字　B:背景　C:マーク背景　D:マーク影]',
				),
			));

			// カラーA セッティング
			$wp_customize->add_setting( 'fit_partsList_quoteColorA', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// カラーA コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsList_quoteColorA', array(
				'section' => 'fit_parts_quote_section',
				'settings' =>'fit_partsList_quoteColorA',
				'description' => '■カラーAを指定',
			)));

			// カラーB セッティング
			$wp_customize->add_setting( 'fit_partsList_quoteColorB', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// カラーB コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsList_quoteColorB', array(
				'section' => 'fit_parts_quote_section',
				'settings' =>'fit_partsList_quoteColorB',
				'description' => '■カラーBを指定',
			)));

			// カラーC セッティング
			$wp_customize->add_setting( 'fit_partsList_quoteColorC', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// カラーC コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsList_quoteColorC', array(
				'section' => 'fit_parts_quote_section',
				'settings' =>'fit_partsList_quoteColorC',
				'description' => '■カラーCを指定',
			)));
			// カラーD セッティング
			$wp_customize->add_setting( 'fit_partsList_quoteColorD', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// カラーD コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsList_quoteColorD', array(
				'section' => 'fit_parts_quote_section',
				'settings' =>'fit_partsList_quoteColorD',
				'description' => '■カラーDを指定',
			)));


		//セクションの追加
		$wp_customize->add_section( 'fit_parts_table_section', array(
			'title'       => 'テーブル設定(個別ページ用)',
			'panel'       => 'fit_parts_panel',
			'description' => '個別ページ用のテーブル設定画面です。',
			'priority'  => 1,
		));

			// テーブルデザイン セッティング
			$wp_customize->add_setting( 'fit_partsList_table', array(
				'default'   => 'off',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// テーブルデザイン コントロール
			$wp_customize->add_control( 'fit_partsList_table', array(
				'section'   => 'fit_parts_table_section',
				'settings'  => 'fit_partsList_table',
				'label'     => 'テーブルデザイン設定',
				'description' => '■デザインを選択',
				'type'      => 'select',
				'choices'   => array(
					'off' => '基本(default)',
					'1'   => '点線',
				),
			));

			// 文字色 セッティング
			$wp_customize->add_setting( 'fit_partsList_tableColorA', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// 文字色 コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsList_tableColorA', array(
				'section' => 'fit_parts_table_section',
				'settings' =>'fit_partsList_tableColorA',
				'description' => '■文字色を指定',
			)));

			// 線色 セッティング
			$wp_customize->add_setting( 'fit_partsList_tableColorB', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// 線色 コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsList_tableColorB', array(
				'section' => 'fit_parts_table_section',
				'settings' =>'fit_partsList_tableColorB',
				'description' => '■線色を指定',
			)));

			// TH背景色 セッティング
			$wp_customize->add_setting( 'fit_partsList_tableColorC', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// TH背景色 コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsList_tableColorC', array(
				'section' => 'fit_parts_table_section',
				'settings' =>'fit_partsList_tableColorC',
				'description' => '■TH背景色を指定',
			)));

			// TH文字色 セッティング
			$wp_customize->add_setting( 'fit_partsList_tableColorD', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// TH文字色 コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsList_tableColorD', array(
				'section' => 'fit_parts_table_section',
				'settings' =>'fit_partsList_tableColorD',
				'description' => '■TH文字色を指定',
			)));

			// TD背景色 セッティング
			$wp_customize->add_setting( 'fit_partsList_tableColorE', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// TD背景色 コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsList_tableColorE', array(
				'section' => 'fit_parts_table_section',
				'settings' =>'fit_partsList_tableColorE',
				'description' => '■TD背景色を指定',
			)));

			// TD背景色(偶数列) セッティング
			$wp_customize->add_setting( 'fit_partsList_tableColorF', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color',
			));
			// TD背景色(偶数列) コントロール
			$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'fit_partsList_tableColorF', array(
				'section' => 'fit_parts_table_section',
				'settings' =>'fit_partsList_tableColorF',
				'description' => '■TD背景色(偶数列)を指定',
			)));


		//セクションの追加
		$wp_customize->add_section( 'fit_parts_share_section', array(
			'title'       => 'シェアボタン設定(個別ページ用)',
			'panel'       => 'fit_parts_panel',
			'description' => '個別ページ用のシェアボタン設定画面です。',
			'priority'  => 1,
		));

			// H2見出しデザイン セッティング
			$wp_customize->add_setting( 'fit_partsShare_style', array(
				'default'   => '01',
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// H2見出しデザイン コントロール
			$wp_customize->add_control( 'fit_partsShare_style', array(
				'section'   => 'fit_parts_share_section',
				'settings'  => 'fit_partsShare_style',
				'label'     => 'シェアボタンデザイン設定',
				'description' => '■デザインを選択',
				'type'      => 'select',
				'choices'   => array(
					'01'  => 'パターン1(default)',
					'02'  => 'パターン2',
					'03'  => 'パターン3',
					'04'  => 'パターン4',
					'05'  => 'パターン5',
					'06'  => 'パターン6',
					'07'  => 'パターン7',
					'08'  => 'パターン8',
					'09'  => 'パターン9',
					'10'  => 'パターン10',
					'11'  => 'パターン11',

				),
			));



}
add_action( 'customize_register', 'fit_parts_cutomizer' );
