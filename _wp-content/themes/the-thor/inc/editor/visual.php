<?php
////////////////////////////////////////////////////////
//ビジュアルエディタ項目カスタマイズ
////////////////////////////////////////////////////////
// ビジュアルエディタで独自のscriptを読み込む
function fit_mce_external_plugins( $plugin ) {
	$plugin['table']                = '//cdn.tinymce.com/4/plugins/table/plugin.min.js';
	$plugin['custom_button_script'] = get_template_directory_uri() . "/admin/js/tinymce.js"; // ビジュアルエディタ追加機能用
	return $plugin;
}
add_filter( 'mce_external_plugins', 'fit_mce_external_plugins' );

define('AFTAG_FILE_NAME', '/admin/js/tinymce-aftag-' . date('YmdHis') . '.js');
/**
 * タグ挿入ボタン追加
 */
function fit_mce_external_plugins_aftag( $plugin ) {
	fit_tiny_mce_add_tag_button();
	if ( file_exists( get_template_directory() . AFTAG_FILE_NAME ) ) {
		$plugin['custom_button_script_aftag'] = get_template_directory_uri() . AFTAG_FILE_NAME;
	}
	return $plugin;
}
add_filter( 'mce_external_plugins', 'fit_mce_external_plugins_aftag' );

// フォントフォーマットをカスタマイズ
function fit_mce_font_formats( $settings ) {
	$settings[ 'font_formats' ] =
		"Lato='Lato';".
		"Century Gothic='Century Gothic';".
		"Franklin Gothic Medium='Franklin Gothic Medium';".
		"Gulim='Gulim';".
		"Impact='Impact';".
		"Verdana='Verdana';".
		"Georgia='Georgia';".
		"Times New Roman='Times New Roman';".
		"Courier New='Courier New';".
		"Comic Sans MS='Comic Sans MS';".
		"メイリオ='メイリオ','Meiryo';".
		"游ゴシック='游ゴシック','Yu Gothic','YuGothic';".
		"ヒラギノ角ゴ='ヒラギノ角ゴ Pro W3','Hiragino Kaku Gothic Pro','ヒラギノ角ゴ ProN W3','Hiragino Kaku Gothic ProN';".
		"ヒラギノ丸ゴ='ヒラギノ丸ゴ Pro W4','Hiragino Maru Gothic Pro','ヒラギノ丸ゴ ProN W4','Hiragino Maru Gothic ProN';".
		"ＭＳ Ｐゴシック='ＭＳ Ｐゴシック','MS PGothic';".
		"ＭＳ ゴシック='ＭＳ ゴシック','MS Gothic';".
		"ＭＳ Ｐ明朝='ＭＳ Ｐ明朝','MS PMincho';".
		"ＭＳ 明朝='ＭＳ 明朝','MS Mincho';".
		"游明朝='游明朝','Yu Mincho';".
		"ヒラギノ明朝='ヒラギノ明朝 Pro W3','Hiragino Mincho Pro',ヒラギノ明朝 ProN W3','Hiragino Mincho ProN';".
		"游明朝体='游明朝体','YuMincho';"
        ;
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'fit_mce_font_formats' );


// ブロックフォーマットをカスタマイズ
function fit_editor_settings( $initArray ){
	$initArray['block_formats']           = "段落=p; 見出し2=h2; 見出し3=h3; 見出し4=h4; 見出し5=h5; 整形済みテキスト=pre;";
	return $initArray;
}
add_filter( 'tiny_mce_before_init', 'fit_editor_settings' );


// スタイルフォーマットをカスタマイズ
function fit_tiny_mce_style_formats( $settings ) {

	//ユーザーズスタイル(よく使うマーカー)
	$marker_title = 'よく使うマーカー(太レッド)';
	if(get_option('fit_partsUser_marker') == '1'){$marker_title = 'よく使うマーカー(太レッド)';}
	if(get_option('fit_partsUser_marker') == '2'){$marker_title = 'よく使うマーカー(太ブルー)';}
	if(get_option('fit_partsUser_marker') == '3'){$marker_title = 'よく使うマーカー(太イエロー)';}
	if(get_option('fit_partsUser_marker') == '4'){$marker_title = 'よく使うマーカー(太ピンク)';}
	if(get_option('fit_partsUser_marker') == '5'){$marker_title = 'よく使うマーカー(太グリーン)';}
	if(get_option('fit_partsUser_marker') == '6'){$marker_title = 'よく使うマーカー(太グレー)';}
	if(get_option('fit_partsUser_marker') == '7'){$marker_title = 'よく使うマーカー(中レッド)';}
	if(get_option('fit_partsUser_marker') == '8'){$marker_title = 'よく使うマーカー(中ブルー)';}
	if(get_option('fit_partsUser_marker') == '9'){$marker_title = 'よく使うマーカー(中イエロー)';}
	if(get_option('fit_partsUser_marker') == '10'){$marker_title = 'よく使うマーカー(中ピンク)';}
	if(get_option('fit_partsUser_marker') == '11'){$marker_title = 'よく使うマーカー(中グリーン)';}
	if(get_option('fit_partsUser_marker') == '12'){$marker_title = 'よく使うマーカー(中グレー)';}
	if(get_option('fit_partsUser_marker') == '13'){$marker_title = 'よく使うマーカー(細レッド)';}
	if(get_option('fit_partsUser_marker') == '14'){$marker_title = 'よく使うマーカー(細ブルー)';}
	if(get_option('fit_partsUser_marker') == '15'){$marker_title = 'よく使うマーカー(細イエロー)';}
	if(get_option('fit_partsUser_marker') == '16'){$marker_title = 'よく使うマーカー(細ピンク)';}
	if(get_option('fit_partsUser_marker') == '17'){$marker_title = 'よく使うマーカー(細グリーン)';}
	if(get_option('fit_partsUser_marker') == '18'){$marker_title = 'よく使うマーカー(細グレー)';}

	$marker_class = 'marker-thickRed';
	if(get_option('fit_partsUser_marker') == '1'){$marker_class = 'marker-thickRed';}
	if(get_option('fit_partsUser_marker') == '2'){$marker_class = 'marker-thickBlue';}
	if(get_option('fit_partsUser_marker') == '3'){$marker_class = 'marker-thickYellow';}
	if(get_option('fit_partsUser_marker') == '4'){$marker_class = 'marker-thickPink';}
	if(get_option('fit_partsUser_marker') == '5'){$marker_class = 'marker-thickGreen';}
	if(get_option('fit_partsUser_marker') == '6'){$marker_class = 'marker-thickGray';}
	if(get_option('fit_partsUser_marker') == '7'){$marker_class = 'marker-halfRed';}
	if(get_option('fit_partsUser_marker') == '8'){$marker_class = 'marker-halfBlue';}
	if(get_option('fit_partsUser_marker') == '9'){$marker_class = 'marker-halfYellow';}
	if(get_option('fit_partsUser_marker') == '10'){$marker_class = 'marker-halfPink';}
	if(get_option('fit_partsUser_marker') == '11'){$marker_class = 'marker-halfGreen';}
	if(get_option('fit_partsUser_marker') == '12'){$marker_class = 'marker-halfGray';}
	if(get_option('fit_partsUser_marker') == '13'){$marker_class = 'marker-thinRed';}
	if(get_option('fit_partsUser_marker') == '14'){$marker_class = 'marker-thinBlue';}
	if(get_option('fit_partsUser_marker') == '15'){$marker_class = 'marker-thinYellow';}
	if(get_option('fit_partsUser_marker') == '16'){$marker_class = 'marker-thinPink';}
	if(get_option('fit_partsUser_marker') == '17'){$marker_class = 'marker-thinGreen';}
	if(get_option('fit_partsUser_marker') == '18'){$marker_class = 'marker-thinGray';}




	//ユーザーズスタイル(ラベル)
	$label1_title  = get_option( 'fit_partsUser_label1title', '角丸レッドラベル' );
	$label2_title  = get_option( 'fit_partsUser_label2title', 'シンプルボーダーラベル' );
	$label3_title  = get_option( 'fit_partsUser_label3title', 'ライム左ラウンドラベル' );
	$label4_title  = get_option( 'fit_partsUser_label4title', 'ブルーボーダーラウンドラベル' );
	$label5_title  = get_option( 'fit_partsUser_label5title', '丸アイコンオレンジラベル' );
	$label6_title  = get_option( 'fit_partsUser_label6title', 'ピンクアイコンラベル' );
	$label7_title  = get_option( 'fit_partsUser_label7title', '四角アイコンラベル' );
	$label8_title  = get_option( 'fit_partsUser_label8title', '破線ボーダーアイコンラベル' );
	$label9_title  = get_option( 'fit_partsUser_label9title', 'ビッグ右ラウンドブルーラベル' );
	$label10_title = get_option( 'fit_partsUser_label10title', 'ターコイズグラデ右寄せラベル' );

	$label1_class  = get_option( 'fit_partsUser_label1class', 'ep-label bgc-DPred brc-white ftc-white es-radius es-RpaddingSS es-LpaddingSS' );
	$label2_class  = get_option( 'fit_partsUser_label2class', 'ep-label es-borderSolidS bgc-white brc-VLgray es-RpaddingSS es-LpaddingSS' );
	$label3_class  = get_option( 'fit_partsUser_label3class', 'ep-label es-LroundL bgc-Blime ftc-white es-RpaddingSS es-LpaddingSS' );
	$label4_class  = get_option( 'fit_partsUser_label4class', 'ep-label es-round es-borderDashedS brc-Lblue bgc-VPblue es-RpaddingSS es-LpaddingSS' );
	$label5_class  = get_option( 'fit_partsUser_label5class', 'ep-label icon-pencil2 es-LiconCircle es-LroundL bgc-VPorange ftc-Borange es-RpaddingSS' );
	$label6_class  = get_option( 'fit_partsUser_label6class', 'ep-label es-LiconBorder icon-notification es-RpaddingSS bgc-VPpink ftc-Bpink' );
	$label7_class  = get_option( 'fit_partsUser_label7class', 'ep-label es-LiconBox icon-location es-borderSolidS brc-VLgray ftc-Dgray' );
	$label8_class  = get_option( 'fit_partsUser_label8class', 'ep-label es-BborderDashedM bgc-white es-Licon icon-pushpin es-RpaddingSS es-bold' );
	$label9_class  = get_option( 'fit_partsUser_label9class', 'ep-label es-LroundR es-TmarginS es-TpaddingS es-BpaddingS es-RpaddingM es-LpaddingM es-Fbig es-bold es-LborderSolidM brc-DLsky' );
	$label10_class = get_option( 'fit_partsUser_label10class', 'ep-label es-grada2 bgc-DLturquoise ftc-white es-size25 es-right es-RpaddingS es-LborderSolidM brc-DGturquoise' );


	//ユーザーズスタイル(ボタン)
	$btn1_title  = get_option( 'fit_partsUser_btn1title', 'オレンジ100％ボタン' );
	$btn2_title  = get_option( 'fit_partsUser_btn2title', 'グリーンシャドウ100％ボタン' );
	$btn3_title  = get_option( 'fit_partsUser_btn3title', 'ブルーボーダーボタン' );
	$btn4_title  = get_option( 'fit_partsUser_btn4title', 'ブルーグラデボタン' );
	$btn5_title  = get_option( 'fit_partsUser_btn5title', 'ピンクアイコンボタン' );
	$btn6_title  = get_option( 'fit_partsUser_btn6title', 'ピンクグラデアイコンボタン' );
	$btn7_title  = get_option( 'fit_partsUser_btn7title', 'グリーン立体アイコンボタン' );
	$btn8_title  = get_option( 'fit_partsUser_btn8title', 'グレーラウンドアイコンボタン' );
	$btn9_title  = get_option( 'fit_partsUser_btn9title', 'サークルアイコンボタン' );
	$btn10_title = get_option( 'fit_partsUser_btn10title', 'ボックスアイコンボタン' );

	$btn1_class  = get_option( 'fit_partsUser_btn1class', 'ep-btn bgc-Vorange es-size100 ftc-white es-TpaddingS es-BpaddingS es-BTarrow es-bold' );
	$btn2_class  = get_option( 'fit_partsUser_btn2class', 'ep-btn bgc-Bgreen ftc-white es-size100 es-TpaddingS es-BpaddingS es-shadowIn es-BTarrow es-bold es-radius' );
	$btn3_class  = get_option( 'fit_partsUser_btn3class', 'ep-btn es-TpaddingS es-BpaddingS es-RpaddingM es-LpaddingM es-Fbig es-bold es-borderSolidS bgc-white brc-DLblue ftc-DLblue es-BTarrow' );
	$btn4_class  = get_option( 'fit_partsUser_btn4class', 'ep-btn es-BTrich bgc-DPsky ftc-white es-BTarrow es-TpaddingS es-BpaddingS es-RpaddingM es-LpaddingM es-grada1' );
	$btn5_class  = get_option( 'fit_partsUser_btn5class', 'ep-btn icon-circle-right es-BTicon bgc-VPmagenta ftc-Lmagenta es-bold es-borderSolidS brc-Lmagenta es-TpaddingS es-BpaddingS es-RpaddingM es-LpaddingM' );
	$btn6_class  = get_option( 'fit_partsUser_btn6class', 'ep-btn es-grada2 ftc-white es-radius icon-home es-BTicon es-TpaddingS es-BpaddingS es-RpaddingM es-LpaddingM bgc-Bmagenta' );
	$btn7_class  = get_option( 'fit_partsUser_btn7class', 'ep-btn icon-amazon es-BTiconBorder es-BT3d es-radius bgc-DLlime ftc-white es-TpaddingS es-BpaddingS es-shadow' );
	$btn8_class  = get_option( 'fit_partsUser_btn8class', 'ep-btn es-grada2 es-TpaddingS es-BpaddingS es-BTiconBorder icon-folder-open es-Fsmall es-round es-RpaddingM es-LpaddingM ftc-gray' );
	$btn9_class  = get_option( 'fit_partsUser_btn9class', 'ep-btn icon-pencil2 es-BTiconCircle es-round es-BT3d es-RmarginM bgc-VPorange ftc-DLorange es-bold' );
	$btn10_class = get_option( 'fit_partsUser_btn10class', 'ep-btn es-BTiconBox icon-quill bgc-DGorange ftc-white es-radius' );


	//ユーザーズスタイル(ボックス)
	$box1_title  = get_option( 'fit_partsUser_box1title', 'サブタイトルボーダーボックス' );
	$box2_title  = get_option( 'fit_partsUser_box2title', 'BIG括弧ボックス' );
	$box3_title  = get_option( 'fit_partsUser_box3title', '方眼ペーパーボックス' );
	$box4_title  = get_option( 'fit_partsUser_box4title', 'はてなボックス' );
	$box5_title  = get_option( 'fit_partsUser_box5title', 'ビックリボックス' );
	$box6_title  = get_option( 'fit_partsUser_box6title', 'Qボックス' );
	$box7_title  = get_option( 'fit_partsUser_box7title', 'Aボックス' );
	$box8_title  = get_option( 'fit_partsUser_box8title', 'シンプルアイコンボックス' );
	$box9_title  = get_option( 'fit_partsUser_box9title', '背景アイコンボックス' );
	$box10_title = get_option( 'fit_partsUser_box10title', '帯アイコンボックス' );

	$box1_class  = get_option( 'fit_partsUser_box1class', 'ep-box es-BsubTradi bgc-white es-borderSolidM es-radius brc-DPred' );
	$box2_class  = get_option( 'fit_partsUser_box2class', 'ep-box es-Bbrackets bgc-white es-center es-bold es-FbigL' );
	$box3_class  = get_option( 'fit_partsUser_box3class', 'ep-box es-BpaperRight es-grid bgc-VPsky' );
	$box4_class  = get_option( 'fit_partsUser_box4class', 'ep-box es-BmarkHatena es-borderSolidS bgc-white brc-DPblue es-radius' );
	$box5_class  = get_option( 'fit_partsUser_box5class', 'ep-box es-BmarkExcl es-borderSolidS brc-DPred bgc-white es-radius' );
	$box6_class  = get_option( 'fit_partsUser_box6class', 'ep-box es-BmarkQ bgc-white' );
	$box7_class  = get_option( 'fit_partsUser_box7class', 'ep-box es-BmarkA bgc-white' );
	$box8_class  = get_option( 'fit_partsUser_box8class', 'ep-box es-Bicon icon-tag bgc-VPorange' );
	$box9_class  = get_option( 'fit_partsUser_box9class', 'ep-box es-BiconBg icon-pushpin bgc-VPlime' );
	$box10_class = get_option( 'fit_partsUser_box10class', 'ep-box icon-heart es-BiconObi es-borderSolidS' );


	//ユーザーズスタイル(ボックス内ボックス)
	$inbox1_title  = get_option( 'fit_partsUser_inbox1title', 'ターコイズグラデタイトル' );
	$inbox2_title  = get_option( 'fit_partsUser_inbox2title', 'アイコンボーダータイトル' );
	$inbox3_title  = get_option( 'fit_partsUser_inbox3title', 'ブルーシャドウタイトル' );
	$inbox4_title  = get_option( 'fit_partsUser_inbox4title', 'サブタイトルボーダーボックス' );
	$inbox5_title  = get_option( 'fit_partsUser_inbox5title', 'BIG括弧ボックス' );
	$inbox6_title  = get_option( 'fit_partsUser_inbox6title', '方眼ペーパーボックス' );
	$inbox7_title  = get_option( 'fit_partsUser_inbox7title', 'はてなボックス' );
	$inbox8_title  = get_option( 'fit_partsUser_inbox8title', 'ビックリボックス' );
	$inbox9_title  = get_option( 'fit_partsUser_inbox9title', 'Qボックス' );
	$inbox10_title = get_option( 'fit_partsUser_inbox10title', 'Aボックス' );

	$inbox1_class  = get_option( 'fit_partsUser_inbox1class', 'ep-inbox es-Bwhole es-grada1 es-bold bgc-DLturquoise ftc-white es-center es-FbigL' );
	$inbox2_class  = get_option( 'fit_partsUser_inbox2class', 'ep-inbox es-Bwhole bgc-white es-borderSolidS brc-VLgray es-bold es-Bicon icon-pencil2 es-FbigL' );
	$inbox3_class  = get_option( 'fit_partsUser_inbox3class', 'ep-inbox es-Bwhole bgc-DPsky ftc-white es-FbigL es-center es-bold es-TshadowD es-shadow es-BborderSolidM brc-white' );
	$inbox4_class  = get_option( 'fit_partsUser_inbox4class', 'ep-inbox es-BsubTradi bgc-white es-borderSolidM es-radius brc-DPred' );
	$inbox5_class  = get_option( 'fit_partsUser_inbox5class', 'ep-inbox es-Bbrackets bgc-white es-center es-bold es-FbigL' );
	$inbox6_class  = get_option( 'fit_partsUser_inbox6class', 'ep-inbox es-BpaperRight es-grid bgc-VPsky' );
	$inbox7_class  = get_option( 'fit_partsUser_inbox7class', 'ep-inbox es-BmarkHatena es-borderSolidS bgc-white brc-DPblue es-radius' );
	$inbox8_class  = get_option( 'fit_partsUser_inbox8class', 'ep-inbox es-BmarkExcl es-borderSolidS brc-DPred bgc-white es-radius' );
	$inbox9_class  = get_option( 'fit_partsUser_inbox9class', 'ep-inbox es-BmarkQ bgc-white' );
	$inbox10_class = get_option( 'fit_partsUser_inbox10class', 'ep-inbox es-BmarkA bgc-white' );



	$style_formats = array(

		array(
			'title' => 'マーカー',
			'items' => array(
				array(
					'title' => $marker_title,
					'inline' => 'span',
					'classes' => $marker_class,
				),
				array(
					'title' => 'マーカー(太)',
					'items' => array(
						array(
							'title' => 'レッド',
							'inline' => 'span',
							'classes' => 'marker-thickRed'
						),
						array(
							'title' => 'ブルー',
							'inline' => 'span',
							'classes' => 'marker-thickBlue'
						),
						array(
							'title' => 'イエロー',
							'inline' => 'span',
							'classes' => 'marker-thickYellow'
						),
						array(
							'title' => 'ピンク',
							'inline' => 'span',
							'classes' => 'marker-thickPink'
						),
						array(
							'title' => 'グリーン',
							'inline' => 'span',
							'classes' => 'marker-thickGreen'
						),
						array(
							'title' => 'グレー',
							'inline' => 'span',
							'classes' => 'marker-thickGray'
						),
					),
				),

				array(
					'title' => 'マーカー(中)',
					'items' => array(
						array(
							'title' => 'レッド',
							'inline' => 'span',
							'classes' => 'marker-halfRed'
						),
						array(
							'title' => 'ブルー',
							'inline' => 'span',
							'classes' => 'marker-halfBlue'
						),
						array(
							'title' => 'イエロー',
							'inline' => 'span',
							'classes' => 'marker-halfYellow'
						),
						array(
							'title' => 'ピンク',
							'inline' => 'span',
							'classes' => 'marker-halfPink'
						),
						array(
							'title' => 'グリーン',
							'inline' => 'span',
							'classes' => 'marker-halfGreen'
						),
						array(
							'title' => 'グレー',
							'inline' => 'span',
							'classes' => 'marker-halfGray'
						),
					),
				),

				array(
					'title' => 'マーカー(細)',
					'items' => array(
						array(
							'title' => 'レッド',
							'inline' => 'span',
							'classes' => 'marker-thinRed'
						),
						array(
							'title' => 'ブルー',
							'inline' => 'span',
							'classes' => 'marker-thinBlue'
						),
						array(
							'title' => 'イエロー',
							'inline' => 'span',
							'classes' => 'marker-thinYellow'
						),
						array(
							'title' => 'ピンク',
							'inline' => 'span',
							'classes' => 'marker-thinPink'
						),
						array(
							'title' => 'グリーン',
							'inline' => 'span',
							'classes' => 'marker-thinGreen'
						),
						array(
							'title' => 'グレー',
							'inline' => 'span',
							'classes' => 'marker-thinGray'
						),
					),
				),

			),
		),


		array(
			'title' => 'ラベル',
			'items' => array(
				array(
					'title' => $label1_title,
					'inline' => 'span',
					'classes' => $label1_class,
				),
				array(
					'title' => $label2_title,
					'inline' => 'span',
					'classes' => $label2_class,
				),
				array(
					'title' => $label3_title,
					'inline' => 'span',
					'classes' => $label3_class,
				),
				array(
					'title' => $label4_title,
					'inline' => 'span',
					'classes' => $label4_class,
				),
				array(
					'title' => $label5_title,
					'inline' => 'span',
					'classes' => $label5_class,
				),
				array(
					'title' => $label6_title,
					'inline' => 'span',
					'classes' => $label6_class,
				),
				array(
					'title' => $label7_title,
					'inline' => 'span',
					'classes' => $label7_class,
				),
				array(
					'title' => $label8_title,
					'inline' => 'span',
					'classes' => $label8_class,
				),
				array(
					'title' => $label9_title,
					'inline' => 'span',
					'classes' => $label9_class,
				),
				array(
					'title' => $label10_title,
					'inline' => 'span',
					'classes' => $label10_class,
				),
			),
		),

		array(
			'title' => 'ボタン',
			'items' => array(
				array(
					'title' => $btn1_title,
					'inline' => 'a',
					'classes' => $btn1_class,
				),
				array(
					'title' => $btn2_title,
					'inline' => 'a',
					'classes' => $btn2_class,
				),
				array(
					'title' => $btn3_title,
					'inline' => 'a',
					'classes' => $btn3_class,
				),
				array(
					'title' => $btn4_title,
					'inline' => 'a',
					'classes' => $btn4_class,
				),
				array(
					'title' => $btn5_title,
					'inline' => 'a',
					'classes' => $btn5_class,
				),
				array(
					'title' => $btn6_title,
					'inline' => 'a',
					'classes' => $btn6_class,
				),
				array(
					'title' => $btn7_title,
					'inline' => 'a',
					'classes' => $btn7_class,
				),
				array(
					'title' => $btn8_title,
					'inline' => 'a',
					'classes' => $btn8_class,
				),
				array(
					'title' => $btn9_title,
					'inline' => 'a',
					'classes' => $btn9_class,
				),
				array(
					'title' => $btn10_title,
					'inline' => 'a',
					'classes' => $btn10_class,
				),
			),
		),

		array(
			'title' => 'ボックス',
			'items' => array(
				array(
					'title' => $box1_title,
					'block' => 'div',
					'classes' => $box1_class,
				),
				array(
					'title' => $box2_title,
					'block' => 'div',
					'classes' => $box2_class,
				),
				array(
					'title' => $box3_title,
					'block' => 'div',
					'classes' => $box3_class,
				),
				array(
					'title' => $box4_title,
					'block' => 'div',
					'classes' => $box4_class,
				),
				array(
					'title' => $box5_title,
					'block' => 'div',
					'classes' => $box5_class,
				),
				array(
					'title' => $box6_title,
					'block' => 'div',
					'classes' => $box6_class,
				),
				array(
					'title' => $box7_title,
					'block' => 'div',
					'classes' => $box7_class,
				),
				array(
					'title' => $box8_title,
					'block' => 'div',
					'classes' => $box8_class,
				),
				array(
					'title' => $box9_title,
					'block' => 'div',
					'classes' => $box9_class,
				),
				array(
					'title' => $box10_title,
					'block' => 'div',
					'classes' => $box10_class,
				),
			),
		),

		array(
			'title' => '└ボックス内ボックス',
			'items' => array(
				array(
					'title' => $inbox1_title,
					'inline' => 'div',
					'classes' => $inbox1_class,
				),
				array(
					'title' => $inbox2_title,
					'inline' => 'div',
					'classes' => $inbox2_class,
				),
				array(
					'title' => $inbox3_title,
					'inline' => 'div',
					'classes' => $inbox3_class,
				),
				array(
					'title' => $inbox4_title,
					'inline' => 'div',
					'classes' => $inbox4_class,
				),
				array(
					'title' => $inbox5_title,
					'inline' => 'div',
					'classes' => $inbox5_class,
				),
				array(
					'title' => $inbox6_title,
					'inline' => 'div',
					'classes' => $inbox6_class,
				),
				array(
					'title' => $inbox7_title,
					'inline' => 'div',
					'classes' => $inbox7_class,
				),
				array(
					'title' => $inbox8_title,
					'inline' => 'div',
					'classes' => $inbox8_class,
				),
				array(
					'title' => $inbox9_title,
					'inline' => 'div',
					'classes' => $inbox9_class,
				),
				array(
					'title' => $inbox10_title,
					'inline' => 'div',
					'classes' => $inbox10_class,
				),
			),
		),


		array(
			'title' => '■ スタイルセット',
			'items' => array(
				array(
					'title' => 'サイズ系',
					'items' => array(
						array(
							'title' => 'サイズ(10%)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span',
							'classes' => 'es-size10'
						),
						array(
							'title' => 'サイズ(25%)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span',
							'classes' => 'es-size25'
						),
						array(
							'title' => 'サイズ(40%)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span',
							'classes' => 'es-size40'
						),
						array(
							'title' => 'サイズ(50%)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span',
							'classes' => 'es-size50'
						),
						array(
							'title' => 'サイズ(60%)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span',
							'classes' => 'es-size60'
						),
						array(
							'title' => 'サイズ(75%)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span',
							'classes' => 'es-size75'
						),
						array(
							'title' => 'サイズ(90%)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span',
							'classes' => 'es-size90'
						),
						array(
							'title' => 'サイズ(100%)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span',
							'classes' => 'es-size100'
						),

					),
				),

				array(
					'title' => '内側余白系',
					'items' => array(

						array(
							'title' => '余白0',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-padding0'
						),
						array(
							'title' => 'トップ(極小)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-TpaddingSS'
						),
						array(
							'title' => 'トップ(小)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-TpaddingS'
						),
						array(
							'title' => 'トップ(中)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-TpaddingM'
						),
						array(
							'title' => 'トップ(大)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-TpaddingL'
						),
						array(
							'title' => 'ライト(極小)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-RpaddingSS'
						),
						array(
							'title' => 'ライト(小)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-RpaddingS'
						),
						array(
							'title' => 'ライト(中)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-RpaddingM'
						),
						array(
							'title' => 'ライト(大)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-RpaddingL'
						),
						array(
							'title' => 'ボトム(極小)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-BpaddingSS'
						),
						array(
							'title' => 'ボトム(小)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-BpaddingS'
						),
						array(
							'title' => 'ボトム(中)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-BpaddingM'
						),
						array(
							'title' => 'ボトム(大)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-BpaddingL'
						),
						array(
							'title' => 'レフト(極小)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-LpaddingSS'
						),
						array(
							'title' => 'レフト(小)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-LpaddingS'
						),
						array(
							'title' => 'レフト(中)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-LpaddingM'
						),
						array(
							'title' => 'レフト(大)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-LpaddingL'
						),
					),
				),

				array(
					'title' => '外側余白系',
					'items' => array(

						array(
							'title' => '余白0',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-margin0'
						),
						array(
							'title' => 'トップ(極小)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-TmarginSS'
						),
						array(
							'title' => 'トップ(小)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-TmarginS'
						),
						array(
							'title' => 'トップ(中)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-TmarginM'
						),
						array(
							'title' => 'トップ(大)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-TmarginL'
						),
						array(
							'title' => 'ライト(極小)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-RmarginSS'
						),
						array(
							'title' => 'ライト(小)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-RmarginS'
						),
						array(
							'title' => 'ライト(中)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-RmarginM'
						),
						array(
							'title' => 'ライト(大)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-RmarginL'
						),
						array(
							'title' => 'ボトム(極小)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-BmarginSS'
						),
						array(
							'title' => 'ボトム(小)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-BmarginS'
						),
						array(
							'title' => 'ボトム(中)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-BmarginM'
						),
						array(
							'title' => 'ボトム(大)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-BmarginL'
						),
						array(
							'title' => 'レフト(極小)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-LmarginSS'
						),
						array(
							'title' => 'レフト(小)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-LmarginS'
						),
						array(
							'title' => 'レフト(中)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-LmarginM'
						),
						array(
							'title' => 'レフト(大)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-LmarginL'
						),
					),
				),

				array(
					'title' => 'ボーダー系',
					'items' => array(
						array(
							'title' => 'オール実線(細)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-borderSolidS'
						),
						array(
							'title' => 'オール実線(中)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-borderSolidM'
						),
						array(
							'title' => 'オール破線(細)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-borderDashedS'
						),
						array(
							'title' => 'オール破線(中)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-borderDashedM'
						),
						array(
							'title' => 'オール点線(細)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-borderDottedS'
						),
						array(
							'title' => 'オール点線(中)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-borderDottedM',
						),

						array(
							'title' => 'ボトム実線(細)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-BborderSolidS'
						),
						array(
							'title' => 'ボトム実線(中)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-BborderSolidM'
						),
						array(
							'title' => 'ボトム破線(細)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-BborderDashedS'
						),
						array(
							'title' => 'ボトム破線(中)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-BborderDashedM'
						),
						array(
							'title' => 'ボトム点線(細)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-BborderDottedS'
						),
						array(
							'title' => 'ボトム点線(中)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-BborderDottedM',
						),

						array(
							'title' => 'レフト実線(細)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-LborderSolidS'
						),
						array(
							'title' => 'レフト実線(中)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-LborderSolidM'
						),
						array(
							'title' => 'レフト破線(細)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-LborderDashedS'
						),
						array(
							'title' => 'レフト破線(中)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-LborderDashedM'
						),
						array(
							'title' => 'レフト点線(細)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-LborderDottedS'
						),
						array(
							'title' => 'レフト点線(中)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-LborderDottedM',
						),

					),
				),


				array(
					'title' => '文字系',
					'items' => array(
						array(
							'title' => '位置(左)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span',
							'classes' => 'es-left'
						),
						array(
							'title' => '位置(中央)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span',
							'classes' => 'es-center'
						),
						array(
							'title' => '位置(右)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span',
							'classes' => 'es-right'
						),
						array(
							'title' => 'サイズ(小)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-Fsmall'
						),
						array(
							'title' => 'サイズ(大)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-Fbig'
						),
						array(
							'title' => 'サイズ(極大)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-FbigL'
						),
						array(
							'title' => '太字',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-bold'
						),
						array(
							'title' => '斜体',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-italic'
						),
						array(
							'title' => '打ち消し',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-strike'
						),
						array(
							'title' => 'アンダーライン',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-under'
						),

					),
				),

				array(
					'title' => 'シャドウ系',
					'items' => array(
						array(
							'title' => 'ボックス外(ライト)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span',
							'classes' => 'es-shadowL'
						),
						array(
							'title' => 'ボックス外(ノーマル)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span',
							'classes' => 'es-shadow'
						),
						array(
							'title' => 'ボックス外(ダーク)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span',
							'classes' => 'es-shadowD'
						),
						array(
							'title' => 'ボックス内(ライト)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span',
							'classes' => 'es-shadowInL'
						),
						array(
							'title' => 'ボックス内(ノーマル)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span',
							'classes' => 'es-shadowIn'
						),
						array(
							'title' => 'ボックス内(ダーク)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span',
							'classes' => 'es-shadowInD'
						),
						array(
							'title' => 'テキストシャドウ(ライト)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-TshadowL'
						),
						array(
							'title' => 'テキストシャドウ(ノーマル)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-Tshadow'
						),
						array(
							'title' => 'テキストシャドウ(ダーク)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-TshadowD'
						),

					),
				),

				array(
					'title' => '角丸系',
					'items' => array(
						array(
							'title' => '角丸(5px)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-radius'
						),
						array(
							'title' => '角丸(10px)',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-radiusL'
						),
						array(
							'title' => 'ラウンド',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
							'classes' => 'es-round'
						),
					),
				),

				array(
					'title' => '背景系',
					'items' => array(
						array(
							'title' => 'グラデーション1',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span',
							'classes' => 'es-grada1'
						),
						array(
							'title' => 'グラデーション2',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span',
							'classes' => 'es-grada2'
						),
						array(
							'title' => '方眼用紙',
							'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span',
							'classes' => 'es-grid'
						),
					),
				),

				array(
					'title' => 'ラベルパーツ専用',
					'items' => array(
						array(
							'title' => 'コーナータイトル(ボックス内)',
							'selector' => 'span',
							'classes' => 'es-Lcorner'
						),
						array(
							'title' => 'ラウンド(左)',
							'selector' => 'span',
							'classes' => 'es-LroundL'
						),
						array(
							'title' => 'ラウンド(右)',
							'selector' => 'span',
							'classes' => 'es-LroundR'
						),
						array(
							'title' => 'アイコン(余白)',
							'selector' => 'span',
							'classes' => 'es-Licon'
						),
						array(
							'title' => 'アイコン(ボーダー)',
							'selector' => 'span',
							'classes' => 'es-LiconBorder'
						),
						array(
							'title' => 'アイコン(ボックス)',
							'selector' => 'span',
							'classes' => 'es-LiconBox'
						),
						array(
							'title' => 'アイコン(サークル)',
							'selector' => 'span',
							'classes' => 'es-LiconCircle'
						),
					),
				),

				array(
					'title' => 'ボタンパーツ専用',
					'items' => array(
						array(
							'title' => '立体',
							'selector' => 'a',
							'classes' => 'es-BT3d'
						),
						array(
							'title' => '薄影',
							'selector' => 'a',
							'classes' => 'es-BTshadow'
						),
						array(
							'title' => '薄影+光',
							'selector' => 'a',
							'classes' => 'es-BTrich'
						),
						array(
							'title' => '右矢印',
							'selector' => 'a',
							'classes' => 'es-BTarrow'
						),
						array(
							'title' => 'アイコン(余白)',
							'selector' => 'a',
							'classes' => 'es-BTicon'
						),
						array(
							'title' => 'アイコン(ボーダー)',
							'selector' => 'a',
							'classes' => 'es-BTiconBorder'
						),
						array(
							'title' => 'アイコン(ボックス)',
							'selector' => 'a',
							'classes' => 'es-BTiconBox'
						),
						array(
							'title' => 'アイコン(サークル)',
							'selector' => 'a',
							'classes' => 'es-BTiconCircle'
						),
					),
				),

				array(
					'title' => 'ボックスパーツ専用',
					'items' => array(
						array(
							'title' => '全域タイトル(ボックス内)',
							'selector' => 'div',
							'classes' => 'es-Bwhole'
						),
						array(
							'title' => 'カギ括弧',
							'selector' => 'div',
							'classes' => 'es-Bbrackets'
						),
						array(
							'title' => 'めくり(左)',
							'selector' => 'div',
							'classes' => 'es-BpaperLeft'
						),
						array(
							'title' => 'めくり(右)',
							'selector' => 'div',
							'classes' => 'es-BpaperRight'
						),
						array(
							'title' => 'はてなマーク',
							'selector' => 'div',
							'classes' => 'es-BmarkHatena'
						),
						array(
							'title' => 'ビックリマーク',
							'selector' => 'div',
							'classes' => 'es-BmarkExcl'
						),
						array(
							'title' => 'Qマーク',
							'selector' => 'div',
							'classes' => 'es-BmarkQ'
						),
						array(
							'title' => 'Aマーク',
							'selector' => 'div',
							'classes' => 'es-BmarkA'
						),
						array(
							'title' => 'サブタイトル(シンプル)',
							'selector' => 'div',
							'classes' => 'es-BsubT'
						),
						array(
							'title' => 'サブタイトル(角丸)',
							'selector' => 'div',
							'classes' => 'es-BsubTradi'
						),
						array(
							'title' => 'サブタイトル(ラウンド)',
							'selector' => 'div',
							'classes' => 'es-BsubTround'
						),
						array(
							'title' => 'アイコン(シンプル)',
							'selector' => 'div',
							'classes' => 'es-Bicon'
						),
						array(
							'title' => 'アイコン(背景)',
							'selector' => 'div',
							'classes' => 'es-BiconBg'
						),
						array(
							'title' => 'アイコン(帯)',
							'selector' => 'div',
							'classes' => 'es-BiconObi'
						),
						array(
							'title' => 'アイコン(コーナー)',
							'selector' => 'div',
							'classes' => 'es-BiconCorner'
						),
						array(
							'title' => 'アイコン(サークル)',
							'selector' => 'div',
							'classes' => 'es-BiconCircle'
						),
					),
				),




			),
		),


		array(
			'title' => '■ カラーセット',
			'items' => array(

				array(
					'title' => '文字色',
					'items' => array(
						array(
							'title' => 'ヴィヴィッドトーン',
							'items' => array(
								array(
									'title' => 'イエロー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Vyellow'
								),
								array(
									'title' => 'オレンジ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Vorange'
								),
								array(
									'title' => 'レッド',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Vred'
								),
								array(
									'title' => 'マゼンタ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Vmagenta'
								),
								array(
									'title' => 'ピンク',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Vpink'
								),
								array(
									'title' => 'パープル',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Vpurple'
								),
								array(
									'title' => 'ネイビー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Vnavy'
								),
								array(
									'title' => 'ブルー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Vblue'
								),
								array(
									'title' => 'スカイ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Vsky'
								),
								array(
									'title' => 'ターコイズ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Vturquoise'
								),
								array(
									'title' => 'グリーン',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Vgreen'
								),
								array(
									'title' => 'ライム',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Vlime'
								),
							),
						),

						array(
							'title' => 'ブライトトーン',
							'items' => array(
								array(
									'title' => 'イエロー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Byellow'
								),
								array(
									'title' => 'オレンジ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Borange'
								),
								array(
									'title' => 'レッド',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Bred'
								),
								array(
									'title' => 'マゼンタ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Bmagenta'
								),
								array(
									'title' => 'ピンク',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Bpink'
								),
								array(
									'title' => 'パープル',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Bpurple'
								),
								array(
									'title' => 'ネイビー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Bnavy'
								),
								array(
									'title' => 'ブルー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Bblue'
								),
								array(
									'title' => 'スカイ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Bsky'
								),
								array(
									'title' => 'ターコイズ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Bturquoise'
								),
								array(
									'title' => 'グリーン',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Bgreen'
								),
								array(
									'title' => 'ライム',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Blime'
								),
							),
						),
						array(
							'title' => 'ディープトーン',
							'items' => array(
								array(
									'title' => 'イエロー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DPyellow'
								),
								array(
									'title' => 'オレンジ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DPorange'
								),
								array(
									'title' => 'レッド',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DPred'
								),
								array(
									'title' => 'マゼンタ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DPmagenta'
								),
								array(
									'title' => 'ピンク',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DPpink'
								),
								array(
									'title' => 'パープル',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DPpurple'
								),
								array(
									'title' => 'ネイビー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DPnavy'
								),
								array(
									'title' => 'ブルー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DPblue'
								),
								array(
									'title' => 'スカイ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DPsky'
								),
								array(
									'title' => 'ターコイズ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DPturquoise'
								),
								array(
									'title' => 'グリーン',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DPgreen'
								),
								array(
									'title' => 'ライム',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DPlime'
								),
							),
						),
						array(
							'title' => 'ライトトーン',
							'items' => array(
								array(
									'title' => 'イエロー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Lyellow'
								),
								array(
									'title' => 'オレンジ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Lorange'
								),
								array(
									'title' => 'レッド',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Lred'
								),
								array(
									'title' => 'マゼンタ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Lmagenta'
								),
								array(
									'title' => 'ピンク',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Lpink'
								),
								array(
									'title' => 'パープル',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Lpurple'
								),
								array(
									'title' => 'ネイビー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Lnavy'
								),
								array(
									'title' => 'ブルー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Lblue'
								),
								array(
									'title' => 'スカイ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Lsky'
								),
								array(
									'title' => 'ターコイズ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Lturquoise'
								),
								array(
									'title' => 'グリーン',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Lgreen'
								),
								array(
									'title' => 'ライム',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Llime'
								),
							),
						),
						array(
							'title' => 'ダルトーン',
							'items' => array(
								array(
									'title' => 'イエロー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DLyellow'
								),
								array(
									'title' => 'オレンジ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DLorange'
								),
								array(
									'title' => 'レッド',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DLred'
								),
								array(
									'title' => 'マゼンタ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DLmagenta'
								),
								array(
									'title' => 'ピンク',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DLpink'
								),
								array(
									'title' => 'パープル',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DLpurple'
								),
								array(
									'title' => 'ネイビー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DLnavy'
								),
								array(
									'title' => 'ブルー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DLblue'
								),
								array(
									'title' => 'スカイ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DLsky'
								),
								array(
									'title' => 'ターコイズ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DLturquoise'
										),
						array(
									'title' => 'グリーン',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DLgreen'
								),
								array(
									'title' => 'ライム',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DLlime'
								),
							),
						),
						array(
							'title' => 'ベリーペールトーン',
							'items' => array(
								array(
									'title' => 'イエロー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-VPyellow'
								),
								array(
									'title' => 'オレンジ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-VPorange'
								),
								array(
									'title' => 'レッド',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-VPred'
								),
								array(
									'title' => 'マゼンタ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-VPmagenta'
								),
								array(
									'title' => 'ピンク',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-VPpink'
								),
								array(
									'title' => 'パープル',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-VPpurple'
								),
								array(
									'title' => 'ネイビー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-VPnavy'
								),
								array(
									'title' => 'ブルー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-VPblue'
								),
								array(
									'title' => 'スカイ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-VPsky'
								),
								array(
									'title' => 'ターコイズ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-VPturquoise'
								),
								array(
									'title' => 'グリーン',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-VPgreen'
								),
								array(
									'title' => 'ライム',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-VPlime'
								),
							),
						),
						array(
							'title' => 'ダークグレイッシュトーン',
							'items' => array(
								array(
									'title' => 'イエロー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DGyellow'
								),
								array(
									'title' => 'オレンジ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DGorange'
								),
								array(
									'title' => 'レッド',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DGred'
								),
								array(
									'title' => 'マゼンタ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DGmagenta'
								),
								array(
									'title' => 'ピンク',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DGpink'
								),
								array(
									'title' => 'パープル',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DGpurple'
								),
								array(
									'title' => 'ネイビー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DGnavy'
								),
								array(
									'title' => 'ブルー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DGblue'
								),
								array(
									'title' => 'スカイ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DGsky'
								),
								array(
									'title' => 'ターコイズ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DGturquoise'
								),
								array(
									'title' => 'グリーン',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DGgreen'
								),
								array(
									'title' => 'ライム',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-DGlime'
								),
							),
						),
						array(
							'title' => 'モノトーン',
							'items' => array(
								array(
									'title' => 'ホワイト',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-white'
								),
								array(
									'title' => 'ベリーライトグレー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-VLgray'
								),
								array(
									'title' => 'ライトグレー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Lgray'
								),
								array(
									'title' => 'グレー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-gray'
								),
								array(
									'title' => 'ダークグレー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-Dgray'
								),
								array(
									'title' => 'ベリーダークグレー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-VDgray'
								),
								array(
									'title' => 'ブラック',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'ftc-black'
								),
							),
						),

					),
				),


				array(
					'title' => '背景色',
					'items' => array(
						array(
							'title' => 'ヴィヴィッドトーン',
							'items' => array(
								array(
									'title' => 'イエロー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Vyellow'
								),
								array(
									'title' => 'オレンジ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Vorange'
								),
								array(
									'title' => 'レッド',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Vred'
								),
								array(
									'title' => 'マゼンタ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Vmagenta'
								),
								array(
									'title' => 'ピンク',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Vpink'
								),
								array(
									'title' => 'パープル',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Vpurple'
								),
								array(
									'title' => 'ネイビー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Vnavy'
								),
								array(
									'title' => 'ブルー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Vblue'
								),
								array(
									'title' => 'スカイ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Vsky'
								),
								array(
									'title' => 'ターコイズ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Vturquoise'
								),
								array(
									'title' => 'グリーン',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Vgreen'
								),
								array(
									'title' => 'ライム',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Vlime'
								),
							),
						),

						array(
							'title' => 'ブライトトーン',
							'items' => array(
								array(
									'title' => 'イエロー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Byellow'
								),
								array(
									'title' => 'オレンジ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Borange'
								),
								array(
									'title' => 'レッド',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Bred'
								),
								array(
									'title' => 'マゼンタ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Bmagenta'
								),
								array(
									'title' => 'ピンク',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Bpink'
								),
								array(
									'title' => 'パープル',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Bpurple'
								),
								array(
									'title' => 'ネイビー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Bnavy'
								),
								array(
									'title' => 'ブルー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Bblue'
								),
								array(
									'title' => 'スカイ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Bsky'
								),
								array(
									'title' => 'ターコイズ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Bturquoise'
								),
								array(
									'title' => 'グリーン',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Bgreen'
								),
								array(
									'title' => 'ライム',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Blime'
								),
							),
						),
						array(
							'title' => 'ディープトーン',
							'items' => array(
								array(
									'title' => 'イエロー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DPyellow'
								),
								array(
									'title' => 'オレンジ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DPorange'
								),
								array(
									'title' => 'レッド',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DPred'
								),
								array(
									'title' => 'マゼンタ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DPmagenta'
								),
								array(
									'title' => 'ピンク',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DPpink'
								),
								array(
									'title' => 'パープル',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DPpurple'
								),
								array(
									'title' => 'ネイビー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DPnavy'
								),
								array(
									'title' => 'ブルー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DPblue'
								),
								array(
									'title' => 'スカイ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DPsky'
								),
								array(
									'title' => 'ターコイズ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DPturquoise'
								),
								array(
									'title' => 'グリーン',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DPgreen'
								),
								array(
									'title' => 'ライム',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DPlime'
								),
							),
						),
						array(
							'title' => 'ライトトーン',
							'items' => array(
								array(
									'title' => 'イエロー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Lyellow'
								),
								array(
									'title' => 'オレンジ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Lorange'
								),
								array(
									'title' => 'レッド',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Lred'
								),
								array(
									'title' => 'マゼンタ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Lmagenta'
								),
								array(
									'title' => 'ピンク',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Lpink'
								),
								array(
									'title' => 'パープル',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Lpurple'
								),
								array(
									'title' => 'ネイビー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Lnavy'
								),
								array(
									'title' => 'ブルー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Lblue'
								),
								array(
									'title' => 'スカイ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Lsky'
								),
								array(
									'title' => 'ターコイズ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Lturquoise'
								),
								array(
									'title' => 'グリーン',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Lgreen'
								),
								array(
									'title' => 'ライム',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Llime'
								),
							),
						),
						array(
							'title' => 'ダルトーン',
							'items' => array(
								array(
									'title' => 'イエロー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DLyellow'
								),
								array(
									'title' => 'オレンジ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DLorange'
								),
								array(
									'title' => 'レッド',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DLred'
								),
								array(
									'title' => 'マゼンタ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DLmagenta'
								),
								array(
									'title' => 'ピンク',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DLpink'
								),
								array(
									'title' => 'パープル',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DLpurple'
								),
								array(
									'title' => 'ネイビー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DLnavy'
								),
								array(
									'title' => 'ブルー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DLblue'
								),
								array(
									'title' => 'スカイ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DLsky'
								),
								array(
									'title' => 'ターコイズ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DLturquoise'
										),
						array(
									'title' => 'グリーン',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DLgreen'
								),
								array(
									'title' => 'ライム',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DLlime'
								),
							),
						),
						array(
							'title' => 'ベリーペールトーン',
							'items' => array(
								array(
									'title' => 'イエロー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-VPyellow'
								),
								array(
									'title' => 'オレンジ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-VPorange'
								),
								array(
									'title' => 'レッド',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-VPred'
								),
								array(
									'title' => 'マゼンタ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-VPmagenta'
								),
								array(
									'title' => 'ピンク',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-VPpink'
								),
								array(
									'title' => 'パープル',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-VPpurple'
								),
								array(
									'title' => 'ネイビー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-VPnavy'
								),
								array(
									'title' => 'ブルー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-VPblue'
								),
								array(
									'title' => 'スカイ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-VPsky'
								),
								array(
									'title' => 'ターコイズ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-VPturquoise'
								),
								array(
									'title' => 'グリーン',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-VPgreen'
								),
								array(
									'title' => 'ライム',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-VPlime'
								),
							),
						),
						array(
							'title' => 'ダークグレイッシュトーン',
							'items' => array(
								array(
									'title' => 'イエロー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DGyellow'
								),
								array(
									'title' => 'オレンジ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DGorange'
								),
								array(
									'title' => 'レッド',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DGred'
								),
								array(
									'title' => 'マゼンタ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DGmagenta'
								),
								array(
									'title' => 'ピンク',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DGpink'
								),
								array(
									'title' => 'パープル',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DGpurple'
								),
								array(
									'title' => 'ネイビー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DGnavy'
								),
								array(
									'title' => 'ブルー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DGblue'
								),
								array(
									'title' => 'スカイ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DGsky'
								),
								array(
									'title' => 'ターコイズ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DGturquoise'
								),
								array(
									'title' => 'グリーン',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DGgreen'
								),
								array(
									'title' => 'ライム',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-DGlime'
								),
							),
						),
						array(
							'title' => 'モノトーン',
							'items' => array(
								array(
									'title' => 'ホワイト',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-white'
								),
								array(
									'title' => 'ベリーライトグレー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-VLgray'
								),
								array(
									'title' => 'ライトグレー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Lgray'
								),
								array(
									'title' => 'グレー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-gray'
								),
								array(
									'title' => 'ダークグレー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-Dgray'
								),
								array(
									'title' => 'ベリーダークグレー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-VDgray'
								),
								array(
									'title' => 'ブラック',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'bgc-black'
								),
							),
						),

					),
				),


				array(
					'title' => 'ボーダー色',
					'items' => array(
						array(
							'title' => 'ヴィヴィッドトーン',
							'items' => array(
								array(
									'title' => 'イエロー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Vyellow'
								),
								array(
									'title' => 'オレンジ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Vorange'
								),
								array(
									'title' => 'レッド',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Vred'
								),
								array(
									'title' => 'マゼンタ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Vmagenta'
								),
								array(
									'title' => 'ピンク',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Vpink'
								),
								array(
									'title' => 'パープル',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Vpurple'
								),
								array(
									'title' => 'ネイビー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Vnavy'
								),
								array(
									'title' => 'ブルー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Vblue'
								),
								array(
									'title' => 'スカイ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Vsky'
								),
								array(
									'title' => 'ターコイズ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Vturquoise'
								),
								array(
									'title' => 'グリーン',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Vgreen'
								),
								array(
									'title' => 'ライム',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Vlime'
								),
							),
						),

						array(
							'title' => 'ブライトトーン',
							'items' => array(
								array(
									'title' => 'イエロー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Byellow'
								),
								array(
									'title' => 'オレンジ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Borange'
								),
								array(
									'title' => 'レッド',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Bred'
								),
								array(
									'title' => 'マゼンタ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Bmagenta'
								),
								array(
									'title' => 'ピンク',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Bpink'
								),
								array(
									'title' => 'パープル',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Bpurple'
								),
								array(
									'title' => 'ネイビー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Bnavy'
								),
								array(
									'title' => 'ブルー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Bblue'
								),
								array(
									'title' => 'スカイ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Bsky'
								),
								array(
									'title' => 'ターコイズ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Bturquoise'
								),
								array(
									'title' => 'グリーン',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Bgreen'
								),
								array(
									'title' => 'ライム',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Blime'
								),
							),
						),
						array(
							'title' => 'ディープトーン',
							'items' => array(
								array(
									'title' => 'イエロー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DPyellow'
								),
								array(
									'title' => 'オレンジ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DPorange'
								),
								array(
									'title' => 'レッド',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DPred'
								),
								array(
									'title' => 'マゼンタ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DPmagenta'
								),
								array(
									'title' => 'ピンク',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DPpink'
								),
								array(
									'title' => 'パープル',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DPpurple'
								),
								array(
									'title' => 'ネイビー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DPnavy'
								),
								array(
									'title' => 'ブルー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DPblue'
								),
								array(
									'title' => 'スカイ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DPsky'
								),
								array(
									'title' => 'ターコイズ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DPturquoise'
								),
								array(
									'title' => 'グリーン',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DPgreen'
								),
								array(
									'title' => 'ライム',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DPlime'
								),
							),
						),
						array(
							'title' => 'ライトトーン',
							'items' => array(
								array(
									'title' => 'イエロー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Lyellow'
								),
								array(
									'title' => 'オレンジ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Lorange'
								),
								array(
									'title' => 'レッド',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Lred'
								),
								array(
									'title' => 'マゼンタ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Lmagenta'
								),
								array(
									'title' => 'ピンク',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Lpink'
								),
								array(
									'title' => 'パープル',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Lpurple'
								),
								array(
									'title' => 'ネイビー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Lnavy'
								),
								array(
									'title' => 'ブルー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Lblue'
								),
								array(
									'title' => 'スカイ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Lsky'
								),
								array(
									'title' => 'ターコイズ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Lturquoise'
								),
								array(
									'title' => 'グリーン',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Lgreen'
								),
								array(
									'title' => 'ライム',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Llime'
								),
							),
						),
						array(
							'title' => 'ダルトーン',
							'items' => array(
								array(
									'title' => 'イエロー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DLyellow'
								),
								array(
									'title' => 'オレンジ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DLorange'
								),
								array(
									'title' => 'レッド',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DLred'
								),
								array(
									'title' => 'マゼンタ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DLmagenta'
								),
								array(
									'title' => 'ピンク',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DLpink'
								),
								array(
									'title' => 'パープル',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DLpurple'
								),
								array(
									'title' => 'ネイビー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DLnavy'
								),
								array(
									'title' => 'ブルー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DLblue'
								),
								array(
									'title' => 'スカイ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DLsky'
								),
								array(
									'title' => 'ターコイズ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DLturquoise'
										),
						array(
									'title' => 'グリーン',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DLgreen'
								),
								array(
									'title' => 'ライム',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DLlime'
								),
							),
						),
						array(
							'title' => 'ベリーペールトーン',
							'items' => array(
								array(
									'title' => 'イエロー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-VPyellow'
								),
								array(
									'title' => 'オレンジ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-VPorange'
								),
								array(
									'title' => 'レッド',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-VPred'
								),
								array(
									'title' => 'マゼンタ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-VPmagenta'
								),
								array(
									'title' => 'ピンク',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-VPpink'
								),
								array(
									'title' => 'パープル',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-VPpurple'
								),
								array(
									'title' => 'ネイビー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-VPnavy'
								),
								array(
									'title' => 'ブルー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-VPblue'
								),
								array(
									'title' => 'スカイ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-VPsky'
								),
								array(
									'title' => 'ターコイズ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-VPturquoise'
								),
								array(
									'title' => 'グリーン',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-VPgreen'
								),
								array(
									'title' => 'ライム',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-VPlime'
								),
							),
						),
						array(
							'title' => 'ダークグレイッシュトーン',
							'items' => array(
								array(
									'title' => 'イエロー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DGyellow'
								),
								array(
									'title' => 'オレンジ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DGorange'
								),
								array(
									'title' => 'レッド',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DGred'
								),
								array(
									'title' => 'マゼンタ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DGmagenta'
								),
								array(
									'title' => 'ピンク',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DGpink'
								),
								array(
									'title' => 'パープル',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DGpurple'
								),
								array(
									'title' => 'ネイビー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DGnavy'
								),
								array(
									'title' => 'ブルー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DGblue'
								),
								array(
									'title' => 'スカイ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DGsky'
								),
								array(
									'title' => 'ターコイズ',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DGturquoise'
								),
								array(
									'title' => 'グリーン',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DGgreen'
								),
								array(
									'title' => 'ライム',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-DGlime'
								),
							),
						),
						array(
							'title' => 'モノトーン',
							'items' => array(
								array(
									'title' => 'ホワイト',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-white'
								),
								array(
									'title' => 'ベリーライトグレー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-VLgray'
								),
								array(
									'title' => 'ライトグレー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Lgray'
								),
								array(
									'title' => 'グレー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-gray'
								),
								array(
									'title' => 'ダークグレー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-Dgray'
								),
								array(
									'title' => 'ベリーダークグレー',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-VDgray'
								),
								array(
									'title' => 'ブラック',
									'selector' => 'table,td,th,div,ul,ol,li,dl,dt,dd,address,pre,blockquote,a,span,code,abbr,cite,code,em,ins,kbd,q,strong,sub,sup,var',
									'classes' => 'brc-black'
								),
							),
						),
					),
				),
			),
		),


		array(
			'title' => '■ デフォルトパーツ',
			'items' => array(
				array(
					'title' => 'ラベル',
					'inline' => 'span',
					'classes' => 'ep-label'
				),
				array(
					'title' => 'ボタン',
					'inline' => 'a',
					'classes' => 'ep-btn'
				),
				array(
					'title' => 'ボックス',
					'block' => 'div',
					'classes' => 'ep-box',
				),
				array(
					'title' => '└ボックス内ボックス',
					'inline' => 'div',
					'classes' => 'ep-inbox',
				),
			),
		),


	);
	$settings[ 'style_formats' ] = json_encode( $style_formats );
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'fit_tiny_mce_style_formats' );

/**
 * タグ挿入ボタン追加用スクリプトを作成する
 */
function fit_tiny_mce_add_tag_button() {
	// 古いスクリプトファイルを削除
	foreach ( glob( get_template_directory() . "/admin/js/tinymce-aftag-*.js" ) as $scriptFile ) {
		unlink( $scriptFile );
	}

	// タグ情報を取得する
	$args = array(
		'posts_per_page' => -1,
		'offset'         => 0,
		'orderby'        => 'date',
		'order'          => 'DESC',
		'post_type'      => 'aftag',
		'post_status'    => 'publish',
	);
	$aftags = get_posts( $args );

	if ( count( ( array ) $aftags ) == 0 ) {
		// タグがなければ処理終了
		return;
	}

	// タグ挿入用スクリプト
	$script = <<<EOT
(function( $ ) {
	tinymce.create( 'tinymce.plugins.AftagButton', {
		init: function( ed, url ) {
			ed.addButton( 'aftag', {
				text: 'タグ挿入',
				type: 'menubutton',
				menu: [
EOT;
	foreach ($aftags as $aftag) {
		$script .= "{";
		$script .= "  text: '" . $aftag->post_title . "',";
		$script .= "  onclick: function() {";
		$script .= "    ed.execCommand( 'mceInsertContent', false, '[afTag id=" . $aftag->ID . "]' );";
		$script .= "  },";
		$script .= "},";
	}
	$script .= <<<EOT
				]
			});
		},
		createControl: function( n, cm ) {
			return null;
		},
	});
	tinymce.PluginManager.add( 'custom_button_script_aftag', tinymce.plugins.AftagButton );
})( jQuery );
EOT;

	// スクリプトファイルを作成
	file_put_contents( get_template_directory() . AFTAG_FILE_NAME, $script );
}
