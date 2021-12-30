(function($) {
	tinymce.create('tinymce.plugins.MyButtons', {
		init : function(ed, url) {


			//アイコンセットの設定
			ed.addButton( 'icon_set', {
				title : 'アイコンをclassに挿入',
				text: 'アイコン挿入',
				cmd: 'icon_set_cmd'
			});
			// アイコンセットの動作
			ed.addCommand( 'icon_set_cmd', function() {
				var node = ed.selection.getNode();
				var raw_html = window.prompt('アイコンを入力','');
				$(node).removeClass(function(index, className) {
					return (className.match(/\bicon-\S+/g) || []).join(' ');
				});
				ed.dom.addClass(node, raw_html);
			});

			//サブタイトル編集の設定
			ed.addButton( 'subtitle_set', {
				title : 'サブタイトルを編集',
				text: 'サブタイトル編集',
				cmd: 'subtitle_set_cmd'
			});
			// サブタイトル編集の動作
			ed.addCommand( 'subtitle_set_cmd', function() {
				var node = ed.selection.getNode();
				var raw_html = window.prompt('サブタイトルを入力','');
				$(node).attr("title", raw_html);
			});

			// HTMLボタンの設定
			ed.addButton( 'button_html', {
				title : 'HTMLを挿入',
				icon: 'mce-ico mce-i-wp_code',
				cmd: 'button_html_cmd'
			});
			// HTMLボタンの動作
			ed.addCommand( 'button_html_cmd', function() {
				var raw_html = window.prompt('HTMLタグを直接入力','');
				ed.execCommand('mceInsertContent', 0, raw_html);
			});


			// テーブルボタンの設定
			ed.addButton( 'table_respo', {
				title : 'スマホテーブル横スクロール',
				icon: 'mce-ico mce-i-tableinsertcolafter',
				cmd: 'table_respo_cmd'
			});
			// テーブルボタンの動作
			ed.addCommand( 'table_respo_cmd', function() {
				var selected_text = ed.selection.getContent();
				var return_text = '';
				return_text = '<div class="tableScroll">' + selected_text + '</div>';
				ed.execCommand('mceInsertContent', 0, return_text);
			});




			// プリセットスタイル設定
			ed.addButton( 'style_css', {
				text: 'プリセットパーツ',
				type: 'menubutton',
				menu:
				[

				{
					text: '区切り線',
					menu:
					[{
						text: '実線',
						onclick: function() {
							return_text = '<hr class="hr-solid">'
							ed.execCommand('mceInsertContent', 0, return_text);
						}
					},{
						text: '破線',
						onclick: function() {
							return_text = '<hr class="hr-dashed">'
							ed.execCommand('mceInsertContent', 0, return_text);
						}
					},{
						text: '点線',
						onclick: function() {
							return_text = '<hr class="hr-dotted">'
							ed.execCommand('mceInsertContent', 0, return_text);
						}
					}
					]

				},{
					text: '吹き出し',
					menu:
					[{
						text: '左画像(背景スタイル)',
						onclick: function() {
							var selected_text = 'コメント';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							var name = $('#hid-leftname', parent.document).val();
							return_text = '<div class="balloon"><figure class="balloon__img balloon__img-left"><div></div><figcaption class="balloon__name">' + name + '</figcaption></figure><div class="balloon__text balloon__text-right">' + selected_text + '</div></div>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}
					},{
						text: '左画像(ボーダースタイル)',
						onclick: function() {
							var selected_text = 'コメント';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							var name = $('#hid-leftname', parent.document).val();
							return_text = '<div class="balloon balloon-boder"><figure class="balloon__img balloon__img-left"><div></div><figcaption class="balloon__name">' + name + '</figcaption></figure><div class="balloon__text balloon__text-right">' + selected_text + '</div></div>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}
					},{
						text: '右画像(背景スタイル)',
						onclick: function() {
							var selected_text = 'コメント';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							var name = $('#hid-rightname', parent.document).val();
							return_text = '<div class="balloon"><figure class="balloon__img balloon__img-right"><div></div><figcaption class="balloon__name">' + name + '</figcaption></figure><div class="balloon__text balloon__text-left">' + selected_text + '</div></div>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}
					},{
						text: '右画像(ボーダースタイル)',
						onclick: function() {
							var selected_text = 'コメント';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							var name = $('#hid-rightname', parent.document).val();
							return_text = '<div class="balloon balloon-boder"><figure class="balloon__img balloon__img-right"><div></div><figcaption class="balloon__name">' + name + '</figcaption></figure><div class="balloon__text balloon__text-left">' + selected_text + '</div></div>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}
					}]

				},{
					text: 'スコアボックス',
					menu:
					[{
						text: '最終行(レッド)',
						onclick: function() {
							var selected_text = '項目名';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<table class="scoreTable scoreTable-red"><tr><td>' + selected_text + '</td><td>[star-list number=3.5] 3.5</td></tr><tr><td>' + selected_text + '</td><td>[star-list number=3.5] 3.5</td></tr><tr><td>' + selected_text + '</td><td>[star-list number=3.5] 3.5</td></tr><tr><td>' + selected_text + '</td><td>[star-list number=3.5] 3.5</td></tr><tr><td>総合</td><td>[star-list number=3.5] 3.5</td></tr></table>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}
					},{
						text: '最終行(ブルー)',
						onclick: function() {
							var selected_text = '項目名';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<table class="scoreTable scoreTable-blue"><tr><td>' + selected_text + '</td><td>[star-list number=3.5] 3.5</td></tr><tr><td>' + selected_text + '</td><td>[star-list number=3.5] 3.5</td></tr><tr><td>' + selected_text + '</td><td>[star-list number=3.5] 3.5</td></tr><tr><td>' + selected_text + '</td><td>[star-list number=3.5] 3.5</td></tr><tr><td>総合</td><td>[star-list number=3.5] 3.5</td></tr></table>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}
					},{
						text: '最終行(イエロー)',
						onclick: function() {
							var selected_text = '項目名';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<table class="scoreTable scoreTable-yellow"><tr><td>' + selected_text + '</td><td>[star-list number=3.5] 3.5</td></tr><tr><td>' + selected_text + '</td><td>[star-list number=3.5] 3.5</td></tr><tr><td>' + selected_text + '</td><td>[star-list number=3.5] 3.5</td></tr><tr><td>' + selected_text + '</td><td>[star-list number=3.5] 3.5</td></tr><tr><td>総合</td><td>[star-list number=3.5] 3.5</td></tr></table>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}
					},{
						text: '最終行(ピンク)',
						onclick: function() {
							var selected_text = '項目名';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<table class="scoreTable scoreTable-pink"><tr><td>' + selected_text + '</td><td>[star-list number=3.5] 3.5</td></tr><tr><td>' + selected_text + '</td><td>[star-list number=3.5] 3.5</td></tr><tr><td>' + selected_text + '</td><td>[star-list number=3.5] 3.5</td></tr><tr><td>' + selected_text + '</td><td>[star-list number=3.5] 3.5</td></tr><tr><td>総合</td><td>[star-list number=3.5] 3.5</td></tr></table>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}
					},{
						text: '最終行(グリーン)',
						onclick: function() {
							var selected_text = '項目名';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<table class="scoreTable scoreTable-green"><tr><td>' + selected_text + '</td><td>[star-list number=3.5] 3.5</td></tr><tr><td>' + selected_text + '</td><td>[star-list number=3.5] 3.5</td></tr><tr><td>' + selected_text + '</td><td>[star-list number=3.5] 3.5</td></tr><tr><td>' + selected_text + '</td><td>[star-list number=3.5] 3.5</td></tr><tr><td>総合</td><td>[star-list number=3.5] 3.5</td></tr></table>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}
					},{
						text: '最終行(グレー)',
						onclick: function() {
							var selected_text = '項目名';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<table class="scoreTable scoreTable-gray"><tr><td>' + selected_text + '</td><td>[star-list number=3.5] 3.5</td></tr><tr><td>' + selected_text + '</td><td>[star-list number=3.5] 3.5</td></tr><tr><td>' + selected_text + '</td><td>[star-list number=3.5] 3.5</td></tr><tr><td>' + selected_text + '</td><td>[star-list number=3.5] 3.5</td></tr><tr><td>総合</td><td>[star-list number=3.5] 3.5</td></tr></table>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}
					}
					]

				},{
					text: '口コミボックス',
					menu:
					[{
						text: '背景(レッド)',
						onclick: function() {
							var selected_text = 'このエリアに口コミ本文を記入します。';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<div class="ep-box bgc-VPmagenta"><div class="ep-inbox es-Bwhole bgc-Lmagenta ftc-white es-FbigL es-bold es-Bicon icon-bubbles2">口コミ</div><p><span class="ep-label es-bold es-TpaddingSS es-BpaddingSS es-BmarginSS es-RpaddingS es-LpaddingS bgc-white">東京都：山田 花子(20歳・女性)</span><br>' + selected_text + '</p><hr class="hr-dotted" /><p><span class="ep-label es-bold es-TpaddingSS es-BpaddingSS es-BmarginSS es-RpaddingS es-LpaddingS bgc-white">東京都：山田 花子(20歳・女性)</span><br>' + selected_text + '</p></div>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}
					},{
						text: '背景(ブルー)',
						onclick: function() {
							var selected_text = 'このエリアに口コミ本文を記入します。';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<div class="ep-box bgc-VPsky"><div class="ep-inbox es-Bwhole bgc-Lsky ftc-white es-FbigL es-bold es-Bicon icon-bubbles2">口コミ</div><p><span class="ep-label es-bold es-TpaddingSS es-BpaddingSS es-BmarginSS es-RpaddingS es-LpaddingS bgc-white">東京都：山田 花子(20歳・女性)</span><br>' + selected_text + '</p><hr class="hr-dotted" /><p><span class="ep-label es-bold es-TpaddingSS es-BpaddingSS es-BmarginSS es-RpaddingS es-LpaddingS bgc-white">東京都：山田 花子(20歳・女性)</span><br>' + selected_text + '</p></div>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}
					},{
						text: '背景(イエロー)',
						onclick: function() {
							var selected_text = 'このエリアに口コミ本文を記入します。';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<div class="ep-box bgc-VPyellow"><div class="ep-inbox es-Bwhole bgc-Lyellow es-FbigL es-bold es-Bicon icon-bubbles2">口コミ</div><p><span class="ep-label es-bold es-TpaddingSS es-BpaddingSS es-BmarginSS es-RpaddingS es-LpaddingS bgc-white">東京都：山田 花子(20歳・女性)</span><br>' + selected_text + '</p><hr class="hr-dotted" /><p><span class="ep-label es-bold es-TpaddingSS es-BpaddingSS es-BmarginSS es-RpaddingS es-LpaddingS bgc-white">東京都：山田 花子(20歳・女性)</span><br>' + selected_text + '</p></div>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}
					},{
						text: '背景(ピンク)',
						onclick: function() {
							var selected_text = 'このエリアに口コミ本文を記入します。';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<div class="ep-box bgc-VPpink"><div class="ep-inbox es-Bwhole bgc-Lpink ftc-white es-FbigL es-bold es-Bicon icon-bubbles2">口コミ</div><p><span class="ep-label es-bold es-TpaddingSS es-BpaddingSS es-BmarginSS es-RpaddingS es-LpaddingS bgc-white">東京都：山田 花子(20歳・女性)</span><br>' + selected_text + '</p><hr class="hr-dotted" /><p><span class="ep-label es-bold es-TpaddingSS es-BpaddingSS es-BmarginSS es-RpaddingS es-LpaddingS bgc-white">東京都：山田 花子(20歳・女性)</span><br>' + selected_text + '</p></div>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}
					},{
						text: '背景(グリーン)',
						onclick: function() {
							var selected_text = 'このエリアに口コミ本文を記入します。';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<div class="ep-box bgc-VPlime"><div class="ep-inbox es-Bwhole bgc-Llime ftc-white es-FbigL es-bold es-Bicon icon-bubbles2">口コミ</div><p><span class="ep-label es-bold es-TpaddingSS es-BpaddingSS es-BmarginSS es-RpaddingS es-LpaddingS bgc-white">東京都：山田 花子(20歳・女性)</span><br>' + selected_text + '</p><hr class="hr-dotted" /><p><span class="ep-label es-bold es-TpaddingSS es-BpaddingSS es-BmarginSS es-RpaddingS es-LpaddingS bgc-white">東京都：山田 花子(20歳・女性)</span><br>' + selected_text + '</p></div>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}
					},{
						text: '背景(グレー)',
						onclick: function() {
							var selected_text = 'このエリアに口コミ本文を記入します。';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<div class="ep-box"><div class="ep-inbox es-Bwhole bgc-gray ftc-white es-FbigL es-bold es-Bicon icon-bubbles2">口コミ</div><p><span class="ep-label es-bold es-TpaddingSS es-BpaddingSS es-BmarginSS es-RpaddingS es-LpaddingS bgc-white">東京都：山田 花子(20歳・女性)</span><br>' + selected_text + '</p><hr class="hr-dotted" /><p><span class="ep-label es-bold es-TpaddingSS es-BpaddingSS es-BmarginSS es-RpaddingS es-LpaddingS bgc-white">東京都：山田 花子(20歳・女性)</span><br>' + selected_text + '</p></div>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}
					},{
						text: 'ボーダー(レッド)',
						onclick: function() {
							var selected_text = 'このエリアに口コミ本文を記入します。';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<div class="ep-box es-borderSolidS brc-Lmagenta bgc-white"><div class="ep-inbox es-Bwhole bgc-Lmagenta ftc-white es-FbigL es-bold es-Bicon icon-bubbles2">口コミ</div><p><span class="ep-label es-bold es-TpaddingSS es-BpaddingSS es-BmarginSS es-RpaddingS es-LpaddingS">東京都：山田 花子(20歳・女性)</span><br>' + selected_text + '</p><hr class="hr-dotted" /><p><span class="ep-label es-bold es-TpaddingSS es-BpaddingSS es-BmarginSS es-RpaddingS es-LpaddingS">東京都：山田 花子(20歳・女性)</span><br>' + selected_text + '</p></div>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}
					},{
						text: 'ボーダー(ブルー)',
						onclick: function() {
							var selected_text = 'このエリアに口コミ本文を記入します。';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<div class="ep-box es-borderSolidS brc-Lsky bgc-white"><div class="ep-inbox es-Bwhole bgc-Lsky ftc-white es-FbigL es-bold es-Bicon icon-bubbles2">口コミ</div><p><span class="ep-label es-bold es-TpaddingSS es-BpaddingSS es-BmarginSS es-RpaddingS es-LpaddingS">東京都：山田 花子(20歳・女性)</span><br>' + selected_text + '</p><hr class="hr-dotted" /><p><span class="ep-label es-bold es-TpaddingSS es-BpaddingSS es-BmarginSS es-RpaddingS es-LpaddingS">東京都：山田 花子(20歳・女性)</span><br>' + selected_text + '</p></div>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}
					},{
						text: 'ボーダー(イエロー)',
						onclick: function() {
							var selected_text = 'このエリアに口コミ本文を記入します。';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<div class="ep-box es-borderSolidS brc-Lyellow bgc-white"><div class="ep-inbox es-Bwhole bgc-Lyellow es-FbigL es-bold es-Bicon icon-bubbles2">口コミ</div><p><span class="ep-label es-bold es-TpaddingSS es-BpaddingSS es-BmarginSS es-RpaddingS es-LpaddingS">東京都：山田 花子(20歳・女性)</span><br>' + selected_text + '</p><hr class="hr-dotted" /><p><span class="ep-label es-bold es-TpaddingSS es-BpaddingSS es-BmarginSS es-RpaddingS es-LpaddingS">東京都：山田 花子(20歳・女性)</span><br>' + selected_text + '</p></div>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}
					},{
						text: 'ボーダー(ピンク)',
						onclick: function() {
							var selected_text = 'このエリアに口コミ本文を記入します。';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<div class="ep-box es-borderSolidS brc-Lpink bgc-white"><div class="ep-inbox es-Bwhole bgc-Lpink ftc-white es-FbigL es-bold es-Bicon icon-bubbles2">口コミ</div><p><span class="ep-label es-bold es-TpaddingSS es-BpaddingSS es-BmarginSS es-RpaddingS es-LpaddingS">東京都：山田 花子(20歳・女性)</span><br>' + selected_text + '</p><hr class="hr-dotted" /><p><span class="ep-label es-bold es-TpaddingSS es-BpaddingSS es-BmarginSS es-RpaddingS es-LpaddingS">東京都：山田 花子(20歳・女性)</span><br>' + selected_text + '</p></div>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}
					},{
						text: 'ボーダー(グリーン)',
						onclick: function() {
							var selected_text = 'このエリアに口コミ本文を記入します。';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<div class="ep-box es-borderSolidS brc-Llime bgc-white"><div class="ep-inbox es-Bwhole bgc-Llime ftc-white es-FbigL es-bold es-Bicon icon-bubbles2">口コミ</div><p><span class="ep-label es-bold es-TpaddingSS es-BpaddingSS es-BmarginSS es-RpaddingS es-LpaddingS">東京都：山田 花子(20歳・女性)</span><br>' + selected_text + '</p><hr class="hr-dotted" /><p><span class="ep-label es-bold es-TpaddingSS es-BpaddingSS es-BmarginSS es-RpaddingS es-LpaddingS">東京都：山田 花子(20歳・女性)</span><br>' + selected_text + '</p></div>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}
					},{
						text: 'ボーダー(グレー)',
						onclick: function() {
							var selected_text = 'このエリアに口コミ本文を記入します。';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<div class="ep-box es-borderSolidS brc-Lgray bgc-white"><div class="ep-inbox es-Bwhole bgc-Lgray ftc-white es-FbigL es-bold es-Bicon icon-bubbles2">口コミ</div><p><span class="ep-label es-bold es-TpaddingSS es-BpaddingSS es-BmarginSS es-RpaddingS es-LpaddingS">東京都：山田 花子(20歳・女性)</span><br>' + selected_text + '</p><hr class="hr-dotted" /><p><span class="ep-label es-bold es-TpaddingSS es-BpaddingSS es-BmarginSS es-RpaddingS es-LpaddingS">東京都：山田 花子(20歳・女性)</span><br>' + selected_text + '</p></div>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}
					}
					]

				},{
					text: 'レビューボックス',
					menu:
					[{
						text: '背景スタイル',
						onclick: function() {
							var selected_text = 'このエリアにレビュー本文を記入します。';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<div class="reviewBox"><div class="reviewBox__title">このエリアにレビュータイトルを記入します。</div><div class="reviewBox__contents"><div class="reviewBox__imgBox"><div class="reviewBox__img"> </div><div class="reviewBox__name">N.Sさん</div></div><span class="reviewBox__star">評価：[star-list number=3.5] 3.5</span>' + selected_text + '</div></div>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}

					},{
						text: 'ボーダースタイル',
						onclick: function() {
							var selected_text = 'このエリアにレビュー本文を記入します。';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<div class="reviewBox reviewBox-border"><div class="reviewBox__title">このエリアにレビュータイトルを記入します。</div><div class="reviewBox__contents"><div class="reviewBox__imgBox"><div class="reviewBox__img"> </div><div class="reviewBox__name">N.Sさん</div></div><span class="reviewBox__star">評価：[star-list number=3.5] 3.5</span>' + selected_text + '</div></div>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}

					}]

				},{
					text: 'アコーディオンボックス',
					menu:
					[{
						text: '背景スタイル',
						onclick: function() {
							var selected_text = 'このエリアにレビュー本文を記入します。';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<dl class="accordionBox"><dt>タイトル</dt><dd>H' + selected_text + '</dd></dl>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}

					},{
						text: 'ボーダースタイル',
						onclick: function() {
							var selected_text = 'このエリアにレビュー本文を記入します。';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<dl class="accordionBox accordionBox-border"><dt>タイトル</dt><dd>H' + selected_text + '</dd></dl>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}

					}]

				}

				]
			});


			// 共通ボタンスタイル設定
			ed.addButton( 'common_btn', {
				text: '共通ボタン',
				type: 'menubutton',
				menu:
				[

				{
					text: 'プライマリボタン',
					menu:
					[{
						text: '右',
						onclick: function() {
							var selected_text = 'リンクテキスト';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<div class="btn btn-right"><a class="btn__link btn__link-primary" href="/">' + selected_text + '</a></div>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}

					},{
						text: '中央',
						onclick: function() {
							var selected_text = 'リンクテキスト';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<div class="btn btn-center"><a class="btn__link btn__link-primary" href="/">' + selected_text + '</a></div>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}

					},{
						text: '左',
						onclick: function() {
							var selected_text = 'リンクテキスト';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<div class="btn btn-left"><a class="btn__link btn__link-primary" href="/">' + selected_text + '</a></div>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}

					}]

				},{
					text: 'セカンダリボタン',
					menu:
					[{
						text: '右',
						onclick: function() {
							var selected_text = 'リンクテキスト';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<div class="btn btn-right"><a class="btn__link btn__link-secondary" href="/">' + selected_text + '</a></div>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}

					},{
						text: '中央',
						onclick: function() {
							var selected_text = 'リンクテキスト';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<div class="btn btn-center"><a class="btn__link btn__link-secondary" href="/">' + selected_text + '</a></div>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}

					},{
						text: '左',
						onclick: function() {
							var selected_text = 'リンクテキスト';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<div class="btn btn-left"><a class="btn__link btn__link-secondary" href="/">' + selected_text + '</a></div>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}

					}]

				},{
					text: 'ノーマルボタン',
					menu:
					[{
						text: '右',
						onclick: function() {
							var selected_text = 'リンクテキスト';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<div class="btn btn-right"><a class="btn__link btn__link-normal" href="/">' + selected_text + '</a></div>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}

					},{
						text: '中央',
						onclick: function() {
							var selected_text = 'リンクテキスト';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<div class="btn btn-center"><a class="btn__link btn__link-normal" href="/">' + selected_text + '</a></div>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}

					},{
						text: '左',
						onclick: function() {
							var selected_text = 'リンクテキスト';
							if(ed.selection.getContent() != "") {
								selected_text = ed.selection.getContent();
							}
							return_text = '<div class="btn btn-left"><a class="btn__link btn__link-normal" href="/">' + selected_text + '</a></div>'
							ed.execCommand('mceInsertContent', 0, return_text);
						}

					}]

				}

				]
			});



			// カラム設定
			ed.addButton( 'column_layout', {
				text: 'カラム',
				type: 'menubutton',
				menu:
				[{
					text: '2カラム1:1(PC+スマホ)',
					onclick: function() {
						var selected_text = 'テキスト';
						if(ed.selection.getContent() != "") {
							selected_text = ed.selection.getContent();
						}
						return_text = '<div class="column column-2"><div class="column__item">' + selected_text + '</div><div class="column__item">' + selected_text + '</div></div>'
						ed.execCommand('mceInsertContent', 0, return_text);
					}
				}, {
					text: '2カラム3:7(PC+スマホ)',
					onclick: function() {
						var selected_text = 'テキスト';
						if(ed.selection.getContent() != "") {
							selected_text = ed.selection.getContent();
						}
						return_text = '<div class="column column-237"><div class="column__item">' + selected_text + '</div><div class="column__item">' + selected_text + '</div></div>'
						ed.execCommand('mceInsertContent', 0, return_text);
					}
				}, {
					text: '2カラム7:3(PC+スマホ)',
					onclick: function() {
						var selected_text = 'テキスト';
						if(ed.selection.getContent() != "") {
							selected_text = ed.selection.getContent();
						}
						return_text = '<div class="column column-273"><div class="column__item">' + selected_text + '</div><div class="column__item">' + selected_text + '</div></div>'
						ed.execCommand('mceInsertContent', 0, return_text);
					}
				}, {
					text: '2カラム1:1(PC)',
					onclick: function() {
						var selected_text = 'テキスト';
						if(ed.selection.getContent() != "") {
							selected_text = ed.selection.getContent();
						}
						return_text = '<div class="column column-2pc"><div class="column__item">' + selected_text + '</div><div class="column__item">' + selected_text + '</div></div>'
						ed.execCommand('mceInsertContent', 0, return_text);
					}
				}, {
					text: '2カラム3:7(PC)',
					onclick: function() {
						var selected_text = 'テキスト';
						if(ed.selection.getContent() != "") {
							selected_text = ed.selection.getContent();
						}
						return_text = '<div class="column column-2pc37"><div class="column__item">' + selected_text + '</div><div class="column__item">' + selected_text + '</div></div>'
						ed.execCommand('mceInsertContent', 0, return_text);
					}
				}, {
					text: '2カラム7:3(PC)',
					onclick: function() {
						var selected_text = 'テキスト';
						if(ed.selection.getContent() != "") {
							selected_text = ed.selection.getContent();
						}
						return_text = '<div class="column column-2pc73"><div class="column__item">' + selected_text + '</div><div class="column__item">' + selected_text + '</div></div>'
						ed.execCommand('mceInsertContent', 0, return_text);
					}
				}, {
					text: '3カラム(PC)',
					onclick: function() {
						var selected_text = 'テキスト';
						if(ed.selection.getContent() != "") {
							selected_text = ed.selection.getContent();
						}
						return_text = '<div class="column column-3pc"><div class="column__item">' + selected_text + '</div><div class="column__item">' + selected_text + '</div><div class="column__item">' + selected_text + '</div></div>'
						ed.execCommand('mceInsertContent', 0, return_text);
					}
				}, {
					text: '4カラム(PC)',
					onclick: function() {
						var selected_text = 'テキスト';
						if(ed.selection.getContent() != "") {
							selected_text = ed.selection.getContent();
						}
						return_text = '<div class="column column-4pc"><div class="column__item">' + selected_text + '</div><div class="column__item">' + selected_text + '</div><div class="column__item">' + selected_text + '</div><div class="column__item">' + selected_text + '</div></div>'
						ed.execCommand('mceInsertContent', 0, return_text);
					}
				}]
			});



			// ショートコードリスト設定
			ed.addButton( 'scode', {
				text: 'ショートコード',
				type: 'menubutton',
				menu:
				[{
					text: '目次',
					onclick: function() {
						ed.execCommand('mceInsertContent', 0, '[outline]');
					}
				}, {
					text: '記事内広告',
					onclick: function() {
						ed.execCommand('mceInsertContent', 0, '[adcode]');
					}
				}, {
					text: 'カテゴリ指定記事一覧(新着順)',
					onclick: function() {
						var return_text = '';
						return_text = '[archivelist cat=1 num=5]'
						ed.execCommand('mceInsertContent', 0, return_text);
					}
				}, {
					text: 'カテゴリ指定記事一覧(ランダム順)',
					onclick: function() {
						var return_text = '';
						return_text = '[randlist cat=1 num=5]'
						ed.execCommand('mceInsertContent', 0, return_text);
					}
				}, {
					text: 'カテゴリ指定記事一覧(ランク順)',
					onclick: function() {
						var return_text = '';
						return_text = '[ranklist cat=1 num=5]'
						ed.execCommand('mceInsertContent', 0, return_text);
					}
				}, {
					text: 'ブログカード(外部サイトリンク)',
					onclick: function() {
						var selected_text = ed.selection.getContent();
						var return_text = '';
						return_text = '[blogcard url='+ selected_text +']'
						ed.execCommand('mceInsertContent', 0, return_text);
					}

				}, {
					text: 'サイトカード(内部記事リンク)',
					onclick: function() {
						var selected_text = ed.selection.getContent();
						var return_text = '';
						return_text = '[sitecard subtitle=関連記事 url='+ selected_text +' target=]'
						ed.execCommand('mceInsertContent', 0, return_text);
					}

				}, {
					text: 'カスタムメニュー',
					onclick: function() {
						var return_text = '';
						return_text = '[customenu menu="メニュー名"]'
						ed.execCommand('mceInsertContent', 0, return_text);
					}

				}, {
					text: '年指定',
					onclick: function() {
						var return_text = '';
						return_text = '[date-year number=0]'
						ed.execCommand('mceInsertContent', 0, return_text);
					}
				}, {
					text: '月指定',
					onclick: function() {
						var return_text = '';
						return_text = '[date-month number=0]'
						ed.execCommand('mceInsertContent', 0, return_text);
					}
				}, {
					text: '日指定',
					onclick: function() {
						var return_text = '';
						return_text = '[date-day number=0]'
						ed.execCommand('mceInsertContent', 0, return_text);
					}
				}, {
					text: 'スターリスト',
					onclick: function() {
						var return_text = '';
						return_text = '[star-list number=3.5]'
						ed.execCommand('mceInsertContent', 0, return_text);
					}
				}]
			});



		},
		createControl : function(n, cm) {
			return null;
		},
	});


	tinymce.PluginManager.add( 'custom_button_script', tinymce.plugins.MyButtons );
})(jQuery);
