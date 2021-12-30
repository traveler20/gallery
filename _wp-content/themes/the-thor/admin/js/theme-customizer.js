( function( $ ) {

	var FIT_CUSTOMIZER = FIT_CUSTOMIZER || {};
	FIT_CUSTOMIZER.inputPrefix = '_customize-input-';
	FIT_CUSTOMIZER.inputRadioPrefix = '_customize-radio-';
	FIT_CUSTOMIZER.controlPrefix = 'customize-control-';

	// 基本設定
	// > アクセスランキングの設定
	FIT_CUSTOMIZER.bsRank = {
		// > リアルタイムで集計
		realtime: {
			id: 'fit_bsRank_realtime',
		},
		// > アクセス数リセットボタン
		resetButton: {
			id: 'fit_bsRank_resetButton',
			/**
			 * アクセス数リセットボタン押下時処理
			 */
			resetAccessCount: function () {
				if ( confirm( 'アクセス数をリセットしてもよろしいですか？' ) ) {
					$.ajax( {
						type: "POST",
						url:  get_ajax_url(),
						data: {
							"action" : "fit_clear_post_views",
						},
					})
					.always( function () {
						alert('アクセス数のリセットが完了しました');
						$('#customize-preview > iframe')[0].contentDocument.location.reload( true );
					});
				}
			},
		},
		// > 日週月ランキング集計開始日
		startDatetime: {
			id: 'fit_bsRank_startDatetime',
			value: '',
			setValue: function () {
				this.value = $( '#' + FIT_CUSTOMIZER.inputPrefix + this.id ).val();
			},
			getValue: function () {
				return this.value;
			}
		},
	}

	// TOPページ設定
	// > メインビジュアル設定
	FIT_CUSTOMIZER.homeMainimg = {
		// > メインビジュアルの表示モード
		mode: {
			id: 'fit_homeMainimg_mode',
			type: {
				still: 'still',
				movie: 'movie',
				slider: 'slider',
			},
			// 静止画で表示するコントロール
			stillControls: [
				'fit_homeMainimg_stillImg',
				'fit_homeMainimg_stillMask',
				'fit_homeMainimg_stillColor',
				'fit_homeMainimg_stillTitle',
				'fit_homeMainimg_stillSubtitle',
				'fit_homeMainimg_stillBtn',
				'fit_homeMainimg_stillUrl',
			],
			// YouTube背景動画で表示するコントロール
			movieControls: [
				'fit_homeMainimg_movieImg',
				'fit_homeMainimg_movieYouTube',
				'fit_homeMainimg_movieMask',
				'fit_homeMainimg_movieColor',
				'fit_homeMainimg_movieTitle',
				'fit_homeMainimg_movieSubtitle',
				'fit_homeMainimg_movieBtn',
				'fit_homeMainimg_movieUrl',
			],
			// スライドショーで表示するコントロール
			sliderControls: [
				'fit_homeMainimg_slideLoop',
				'fit_homeMainimg_slideDelay',
				'fit_homeMainimg_slideEffect',
				'fit_homeMainimg_slide1Img',
				'fit_homeMainimg_slide1Mask',
				'fit_homeMainimg_slide1Color',
				'fit_homeMainimg_slide1-title',
				'fit_homeMainimg_slide1-subtitle',
				'fit_homeMainimg_slide1-btn',
				'fit_homeMainimg_slide1-url',
				'fit_homeMainimg_slide2Img',
				'fit_homeMainimg_slide2Mask',
				'fit_homeMainimg_slide2Color',
				'fit_homeMainimg_slide2-title',
				'fit_homeMainimg_slide2-subtitle',
				'fit_homeMainimg_slide2-btn',
				'fit_homeMainimg_slide2-url',
				'fit_homeMainimg_slide3Img',
				'fit_homeMainimg_slide3Mask',
				'fit_homeMainimg_slide3Color',
				'fit_homeMainimg_slide3-title',
				'fit_homeMainimg_slide3-subtitle',
				'fit_homeMainimg_slide3-btn',
				'fit_homeMainimg_slide3-url',
				'fit_homeMainimg_slide4Img',
				'fit_homeMainimg_slide4Mask',
				'fit_homeMainimg_slide4Color',
				'fit_homeMainimg_slide4-title',
				'fit_homeMainimg_slide4-subtitle',
				'fit_homeMainimg_slide4-btn',
				'fit_homeMainimg_slide4-url',
				'fit_homeMainimg_slide5Img',
				'fit_homeMainimg_slide5Mask',
				'fit_homeMainimg_slide5Color',
				'fit_homeMainimg_slide5-title',
				'fit_homeMainimg_slide5-subtitle',
				'fit_homeMainimg_slide5-btn',
				'fit_homeMainimg_slide5-url',
			],
			getInputName: function () {
				return FIT_CUSTOMIZER.inputRadioPrefix + this.id;
			},
			showControls: function ( controls ) {
				controls.forEach( function ( control ) {
					$( '#' + FIT_CUSTOMIZER.controlPrefix + control ).show();
				});
			},
			hideControls: function ( controls ) {
				controls.forEach( function ( control ) {
					$( '#' + FIT_CUSTOMIZER.controlPrefix + control ).hide();
				});
			},
			/**
			 * 表示を切り替える処理
			 * @param {*} mode 選択された表示モードのvalue
			 */
			switchDisplay: function ( mode ) {
				switch ( mode ) {
					case this.type.still:
						this.hideControls( this.movieControls );
						this.hideControls( this.sliderControls );
						this.showControls( this.stillControls );
						break;
					case this.type.movie:
						this.hideControls( this.stillControls );
						this.hideControls( this.sliderControls );
						this.showControls( this.movieControls );
						break;
					case this.type.slider:
						this.hideControls( this.stillControls );
						this.hideControls( this.movieControls );
						this.showControls( this.sliderControls );
						break;
				}
			},
		},
	}

	// PWA機能設定
	FIT_CUSTOMIZER.pwa = {
		buttonId: FIT_CUSTOMIZER.inputPrefix + 'fit_pwaCacheClear_button',
		/**
		 * キャッシュクリアボタン押下時処理
		 */
		clearCache: function () {
			$( '#' + FIT_CUSTOMIZER.inputPrefix + 'fit_pwaCacheClear' ).val( new Date() );
			$( '#' + FIT_CUSTOMIZER.inputPrefix + 'fit_pwaCacheClear' ).change();

			// PWAキャッシュ削除(カスタマイザーを操作したブラウザ)
			caches.keys().then( function( keys ) {
				var promises = [];
				keys.forEach( function( cacheName ) {
					if ( cacheName ) {
						promises.push( caches.delete( cacheName ) );
					}
				});
			});

			alert('PWAのキャッシュをクリアしました');
		}
	};

	// 公開ボタンを押すとリロード【有効無効】
    wp.customize( 'fit_pwaFunction_switch', function( value ) {
        value.bind( function( newval ) {
            $('input#save').click(function(){
				$('iframe')[0].contentDocument.location.reload(true);
			});
        } );
    } );


  // 公開ボタンを押すとリロード【バージョン】
    wp.customize( 'fit_pwaFunction_version', function( value ) {
        value.bind( function( newval ) {
            $('input#save').click(function(){
              $('iframe')[0].contentDocument.location.reload(true);
            });
        });
    } );


	// 公開ボタンを押すとリロード【ホーム画面のアイコン下に表示される名前】
    wp.customize( 'fit_pwaFunction_text', function( value ) {
        value.bind( function( newval ) {
            $('input#save').click(function(){
				$('iframe')[0].contentDocument.location.reload(true);
			});
        } );
    } );

	// 公開ボタンを押すとリロード【アイコン72】
    wp.customize( 'fit_pwaIcon_img72', function( value ) {
        value.bind( function( newval ) {
            $('input#save').click(function(){
				$('iframe')[0].contentDocument.location.reload(true);
			});
        } );
    } );

	// 公開ボタンを押すとリロード【アイコン192】
    wp.customize( 'fit_pwaIcon_img192', function( value ) {
        value.bind( function( newval ) {
            $('input#save').click(function(){
				$('iframe')[0].contentDocument.location.reload(true);
			});
        } );
    } );

	// 公開ボタンを押すとリロード【アイコン512】
    wp.customize( 'fit_pwaIcon_img512', function( value ) {
        value.bind( function( newval ) {
            $('input#save').click(function(){
				$('iframe')[0].contentDocument.location.reload(true);
			});
        } );
    } );

	// 公開ボタンを押すとリロード TOPページ > 記事ランキング > 対象期間
	wp.customize( 'fit_homeRank_period', function( value ) {
		value.bind( function( newval ) {
			$( 'input#save' ).click( function() {
				$( 'iframe' )[0].contentDocument.location.reload( true );
			} );
		} );
	} );

	/**
	 * 日週月ランキング集計開始日の値が変更された場合
	 */
	wp.customize( FIT_CUSTOMIZER.bsRank.startDatetime.id, function( value ) {
		value.bind( function() {
			// 戻す
			$( '#' + FIT_CUSTOMIZER.inputPrefix + FIT_CUSTOMIZER.bsRank.startDatetime.id ).val(
				FIT_CUSTOMIZER.bsRank.startDatetime.value
			);
		} );
	} );

	/**
	 * メインビジュアルの表示モード設定の選択
	 */
	wp.customize( FIT_CUSTOMIZER.homeMainimg.mode.id, function( value ) {
		value.bind( function( newval ) {
			// 選択されたモードに対応する項目のみを表示する
			FIT_CUSTOMIZER.homeMainimg.mode.switchDisplay( newval );
		} );
	} );

	$( function () {
		// アクセスランキングアクセス数リセットボタンクリック
		$( '#' + FIT_CUSTOMIZER.inputPrefix + FIT_CUSTOMIZER.bsRank.resetButton.id ).click( function () {
			FIT_CUSTOMIZER.bsRank.resetButton.resetAccessCount();
		} );
		// 日週月ランキング集計開始日いったんセット
		FIT_CUSTOMIZER.bsRank.startDatetime.setValue();
		// メインビジュアルの表示モード初期表示での表示変更
		FIT_CUSTOMIZER.homeMainimg.mode.switchDisplay(
			$( 'input[name="' + FIT_CUSTOMIZER.homeMainimg.mode.getInputName() + '"]:checked' ).val()
		);
		// PWAキャッシュクリアボタンクリック
		$( '#' + FIT_CUSTOMIZER.pwa.buttonId ).click( function () {
			FIT_CUSTOMIZER.pwa.clearCache();
		} );
	} );
} )( jQuery );
