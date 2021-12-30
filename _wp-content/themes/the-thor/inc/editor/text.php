<?php
////////////////////////////////////////////////////////
//テキストエディタにクイックタグボタン追加
////////////////////////////////////////////////////////
if (get_option( 'fit_bsEditorBtn_switch' ) == 'on1' || get_option( 'fit_bsEditorBtn_switch' ) == 'on2' ) {
	function add_quicktags_to_text_editor() {


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


		//スクリプトキューにquicktagsが保存されているかチェック
		if (wp_script_is('quicktags')){?>
		<script>
			QTags.addButton('qt-p','p','<p>','</p>');
			QTags.addButton('qt-h2','h2','<h2>','</h2>');
			QTags.addButton('qt-h3','h3','<h3>','</h3>');
			QTags.addButton('qt-h4','h4','<h4>','</h4>');
			QTags.addButton('qt-h5','h5','<h5>','</h5>');
			QTags.addButton('qt-pre','pre','<pre>','</pre>');
			QTags.addButton('qt-span','span','<span>','</span>');
			QTags.addButton('qt-hr','hr','<hr>');
			QTags.addButton('qt-br','br','<br>');


			<?php if (get_option( 'fit_bsEditorBtn_switch' ) == 'on2' ) :?>
			QTags.addButton('qt-label1','<?php echo $label1_title ?>','<div class="<?php echo $label1_class ?>">','</div>');
			QTags.addButton('qt-label2','<?php echo $label2_title ?>','<div class="<?php echo $label2_class ?>">','</div>');
			QTags.addButton('qt-label3','<?php echo $label3_title ?>','<div class="<?php echo $label3_class ?>">','</div>');
			QTags.addButton('qt-label4','<?php echo $label4_title ?>','<div class="<?php echo $label4_class ?>">','</div>');
			QTags.addButton('qt-label5','<?php echo $label5_title ?>','<div class="<?php echo $label5_class ?>">','</div>');
			QTags.addButton('qt-label6','<?php echo $label6_title ?>','<div class="<?php echo $label6_class ?>">','</div>');
			QTags.addButton('qt-label7','<?php echo $label7_title ?>','<div class="<?php echo $label7_class ?>">','</div>');
			QTags.addButton('qt-label8','<?php echo $label8_title ?>','<div class="<?php echo $label8_class ?>">','</div>');
			QTags.addButton('qt-label9','<?php echo $label9_title ?>','<div class="<?php echo $label9_class ?>">','</div>');
			QTags.addButton('qt-label10','<?php echo $label10_title ?>','<div class="<?php echo $label10_class ?>">','</div>');

			QTags.addButton('qt-btn1','<?php echo $btn1_title ?>','<div class="<?php echo $btn1_class ?>">','</div>');
			QTags.addButton('qt-btn2','<?php echo $btn2_title ?>','<div class="<?php echo $btn2_class ?>">','</div>');
			QTags.addButton('qt-btn3','<?php echo $btn3_title ?>','<div class="<?php echo $btn3_class ?>">','</div>');
			QTags.addButton('qt-btn4','<?php echo $btn4_title ?>','<div class="<?php echo $btn4_class ?>">','</div>');
			QTags.addButton('qt-btn5','<?php echo $btn5_title ?>','<div class="<?php echo $btn5_class ?>">','</div>');
			QTags.addButton('qt-btn6','<?php echo $btn6_title ?>','<div class="<?php echo $btn6_class ?>">','</div>');
			QTags.addButton('qt-btn7','<?php echo $btn7_title ?>','<div class="<?php echo $btn7_class ?>">','</div>');
			QTags.addButton('qt-btn8','<?php echo $btn8_title ?>','<div class="<?php echo $btn8_class ?>">','</div>');
			QTags.addButton('qt-btn9','<?php echo $btn9_title ?>','<div class="<?php echo $btn9_class ?>">','</div>');
			QTags.addButton('qt-btn10','<?php echo $btn10_title ?>','<div class="<?php echo $btn10_class ?>">','</div>');

			QTags.addButton('qt-box1','<?php echo $box1_title ?>','<div class="<?php echo $box1_class ?>">','</div>');
			QTags.addButton('qt-box2','<?php echo $box2_title ?>','<div class="<?php echo $box2_class ?>">','</div>');
			QTags.addButton('qt-box3','<?php echo $box3_title ?>','<div class="<?php echo $box3_class ?>">','</div>');
			QTags.addButton('qt-box4','<?php echo $box4_title ?>','<div class="<?php echo $box4_class ?>">','</div>');
			QTags.addButton('qt-box5','<?php echo $box5_title ?>','<div class="<?php echo $box5_class ?>">','</div>');
			QTags.addButton('qt-box6','<?php echo $box6_title ?>','<div class="<?php echo $box6_class ?>">','</div>');
			QTags.addButton('qt-box7','<?php echo $box7_title ?>','<div class="<?php echo $box7_class ?>">','</div>');
			QTags.addButton('qt-box8','<?php echo $box8_title ?>','<div class="<?php echo $box8_class ?>">','</div>');
			QTags.addButton('qt-box9','<?php echo $box9_title ?>','<div class="<?php echo $box9_class ?>">','</div>');
			QTags.addButton('qt-box10','<?php echo $box10_title ?>','<div class="<?php echo $box10_class ?>">','</div>');

			QTags.addButton('qt-inbox1','<?php echo $inbox1_title ?>','<div class="<?php echo $inbox1_class ?>">','</div>');
			QTags.addButton('qt-inbox2','<?php echo $inbox2_title ?>','<div class="<?php echo $inbox2_class ?>">','</div>');
			QTags.addButton('qt-inbox3','<?php echo $inbox3_title ?>','<div class="<?php echo $inbox3_class ?>">','</div>');
			QTags.addButton('qt-inbox4','<?php echo $inbox4_title ?>','<div class="<?php echo $inbox4_class ?>">','</div>');
			QTags.addButton('qt-inbox5','<?php echo $inbox5_title ?>','<div class="<?php echo $inbox5_class ?>">','</div>');
			QTags.addButton('qt-inbox6','<?php echo $inbox6_title ?>','<div class="<?php echo $inbox6_class ?>">','</div>');
			QTags.addButton('qt-inbox7','<?php echo $inbox7_title ?>','<div class="<?php echo $inbox7_class ?>">','</div>');
			QTags.addButton('qt-inbox8','<?php echo $inbox8_title ?>','<div class="<?php echo $inbox8_class ?>">','</div>');
			QTags.addButton('qt-inbox9','<?php echo $inbox9_title ?>','<div class="<?php echo $inbox9_class ?>">','</div>');
			QTags.addButton('qt-inbox10','<?php echo $inbox10_title ?>','<div class="<?php echo $inbox10_class ?>">','</div>');

			QTags.addButton('qt-outline','目次','[outline]');
			QTags.addButton('qt-adcode','記事内広告','[adcode]');
			QTags.addButton('qt-sitecard','カテゴリ指定記事一覧(新着順)','[archivelist cat=1 num=5]');
			QTags.addButton('qt-sitecard','カテゴリ指定記事一覧(ランダム順)','[randlist cat=1 num=5]');
			QTags.addButton('qt-sitecard','カテゴリ指定記事一覧(ランク順)','[ranklist cat=1 num=5]');
			QTags.addButton('qt-blogcard','ブログカード','[blogcard url=]');
			QTags.addButton('qt-sitecard','サイトカード','[sitecard subtitle=関連記事 url=]');
			QTags.addButton('qt-year','年指定','[date-year number=0]');
			QTags.addButton('qt-month','月指定','[date-month number=0]');
			QTags.addButton('qt-day','日指定','[date-day number=0]');
			QTags.addButton('qt-day','スターリスト','[star-list number=3.5]');


			<?php endif; ?>



		</script>
		<?php
		}
	}
	add_action( 'admin_print_footer_scripts', 'add_quicktags_to_text_editor' );
}
