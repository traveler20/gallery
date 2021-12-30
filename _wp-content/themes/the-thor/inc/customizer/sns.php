<?php 
////////////////////////////////////////////////////////
//SNS・OGP設定画面
////////////////////////////////////////////////////////
function fit_sns_cutomizer( $wp_customize ) {

	//パネルの追加
	$wp_customize->add_panel( 'fit_sns_panel', array(
		'title'       => 'SNS設定[THE]',
		'priority'  => 1,
	));
		
		//セクションの追加
		$wp_customize->add_section( 'fit_sns_ogp_section', array(
			'title'       => 'OGP設定',
			'panel'       => 'fit_sns_panel',
			'description' => 'OGP設定画面です。',  
			'priority'  => 1,
		));


			//OGP画像 セッティング
			$wp_customize->add_setting('fit_snsOgp_image', array(
				'type' => 'theme_mod',
				'transport' => 'postMessage',
				'sanitize_callback' => 'fit_sanitize_image',
			));
 
			//OGP画像 コントロール
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'fit_snsOgp_image', array(
				'section' => 'fit_sns_ogp_section',
				'settings' => 'fit_snsOgp_image',
				'label' => '画像の設定',
				'description' => '■OGP用画像を登録<br>
				（縦600 × 横1200px以上の画像推薦）',
			)));
    
			// FacebookAPPID セッティング
			$wp_customize->add_setting( 'fit_snsOgp_FBAppId', array(
				'type' => 'option',
				'transport' => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// FacebookAPPID コントロール
			$wp_customize->add_control( 'fit_snsOgp_FBAppId', array(
				'section'   => 'fit_sns_ogp_section',
				'settings'  => 'fit_snsOgp_FBAppId',
				'label'     => 'FacebookのAPPID',
				'description' => '■FacebookのApp IDを入力',
				'type'      => 'text',
			));

			// FacebookAdmins セッティング
			$wp_customize->add_setting( 'fit_snsOgp_FBAdmins', array(

				'type' => 'option',
				'transport' => 'postMessage',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// FacebookAdmins コントロール
			$wp_customize->add_control( 'fit_snsOgp_FBAdmins', array(
				'section'   => 'fit_sns_ogp_section',
				'settings'  => 'fit_snsOgp_FBAdmins',
				'label'     => 'FacebookのユーザーID',
				'description' => '■FacebookのユーザーIDを入力<br>
				(AppIDを入力している場合は入力不要)',
				'type'      => 'text',
			));

			// TwitterCard セッティング
			$wp_customize->add_setting( 'fit_snsOgp_TwitterCard', array(
				'default'   => 'summary',
				'type' => 'option',
				'transport' => 'postMessage',
				'sanitize_callback' => 'fit_sanitize_select',
			));
			// TwitterCard コントロール
			$wp_customize->add_control( 'fit_snsOgp_TwitterCard', array(
				'section'   => 'fit_sns_ogp_section',
				'settings'  => 'fit_snsOgp_TwitterCard',
				'label'     => 'Twitter Cardの種類を選択',
				'description' => '■Twitterで記事がシェアされた時のカードデザインを選択',
				'type'      => 'select',
				'choices'   => array(
					'summary' => 'Summaryカード(default)',
					'summary_large_image' => 'Summary with Large Imageカード',
				),
			));





		//セクションの追加
		$wp_customize->add_section( 'fit_sns_follow_section', array(
			'title'       => 'Follow設定',
			'panel'       => 'fit_sns_panel',
			'description' => 'Follow関連の設定画面です。',  
			'priority'  => 1,
		));


			// Facebookページユーザー名 セッティング
			$wp_customize->add_setting( 'fit_snsFollow[FBPage]', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// Facebookページユーザー名 コントロール
			$wp_customize->add_control( 'fit_snsFollow_FBPage', array(
				'section'   => 'fit_sns_follow_section',
				'settings'  => 'fit_snsFollow[FBPage]',
				'label'     => 'FacebookページのURL',
				'description' => '■FacebookページのURLが「https://www.facebook.com/examples/」の場合「examples」を入力',
				'type'      => 'text',
			));
			// Facebookフォローアイコンの表示H セッティング
			$wp_customize->add_setting( 'fit_snsFollow[FBFollowH]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// Facebookフォローアイコンの表示H コントロール
			$wp_customize->add_control( 'fit_snsFollow_FBFollowH', array(
				'section'   => 'fit_sns_follow_section',
				'settings'  => 'fit_snsFollow[FBFollowH]',
				'label' => 'Headerでフォローアイコンを表示する',
				'type'      => 'checkbox',
			));
			// Facebookフォローアイコンの表示F セッティング
			$wp_customize->add_setting( 'fit_snsFollow[FBFollowF]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// Facebookフォローアイコンの表示F コントロール
			$wp_customize->add_control( 'fit_snsFollow_FBFollowF', array(
				'section'   => 'fit_sns_follow_section',
				'settings'  => 'fit_snsFollow[FBFollowF]',
				'label' => 'Footerでフォローアイコンを表示する',
				'type'      => 'checkbox',
			));
				

			// Instagramページユーザー名 セッティング
			$wp_customize->add_setting( 'fit_snsFollow[insta]', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// Instagramページユーザー名 コントロール
			$wp_customize->add_control( 'fit_snsFollow_insta', array(
				'section'   => 'fit_sns_follow_section',
				'settings'  => 'fit_snsFollow[insta]',
				'label'     => 'InstagramページのURL',
				'description' => '■InstagramページのURLが「http://instagram.com/examples」の場合「examples」を入力',
				'type'      => 'text',
			));
			// Instagramフォローアイコンの表示H セッティング
			$wp_customize->add_setting( 'fit_snsFollow[instaFollowH]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// Instagramフォローアイコンの表示H コントロール
			$wp_customize->add_control( 'fit_snsFollow_instaFollowH', array(
				'section'   => 'fit_sns_follow_section',
				'settings'  => 'fit_snsFollow[instaFollowH]',
				'label' => 'Headerでフォローアイコンを表示する',
				'type'      => 'checkbox',
			));
			// Instagramフォローアイコンの表示F セッティング
			$wp_customize->add_setting( 'fit_snsFollow[instaFollowF]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// Instagramフォローアイコンの表示F コントロール
			$wp_customize->add_control( 'fit_snsFollow_instaFollowF', array(
				'section'   => 'fit_sns_follow_section',
				'settings'  => 'fit_snsFollow[instaFollowF]',
				'label' => 'Footerでフォローアイコンを表示する',
				'type'      => 'checkbox',
			));
			
			
			// TwitterID セッティング
			$wp_customize->add_setting( 'fit_snsFollow[twitterId]', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// TwitterID コントロール
			$wp_customize->add_control( 'fit_snsFollow_twitterId', array(
				'section'   => 'fit_sns_follow_section',
				'settings'  => 'fit_snsFollow[twitterId]',
				'label'     => 'TwitterのURL',
				'description' => '■TwitterページのURLが「https://twitter.com/examples」の場合「examples」を入力',
				'type'      => 'text',
			));
			// Twitterフォローアイコンの表示H セッティング
			$wp_customize->add_setting( 'fit_snsFollow[twitterFollowH]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// Twitterフォローアイコンの表示H コントロール
			$wp_customize->add_control( 'fit_snsFollow_twitterFollowH', array(
				'section'   => 'fit_sns_follow_section',
				'settings'  => 'fit_snsFollow[twitterFollowH]',
				'label' => 'Headerでフォローアイコンを表示する',
				'type'      => 'checkbox',
			));
			// Twitterフォローアイコンの表示F セッティング
			$wp_customize->add_setting( 'fit_snsFollow[twitterFollowF]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// Twitterフォローアイコンの表示F コントロール
			$wp_customize->add_control( 'fit_snsFollow_twitterFollowF', array(
				'section'   => 'fit_sns_follow_section',
				'settings'  => 'fit_snsFollow[twitterFollowF]',
				'label' => 'Footerでフォローアイコンを表示する',
				'type'      => 'checkbox',
			));
			
			
			// Google+ページカスタムURL セッティング
			$wp_customize->add_setting( 'fit_snsFollow[googleUrl]', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// Google+ページカスタムURL コントロール
			$wp_customize->add_control( 'fit_snsFollow_googleUrl', array(
				'section'   => 'fit_sns_follow_section',
				'settings'  => 'fit_snsFollow[googleUrl]',
				'label'     => 'Google+ページのURL',
				'description' => '■Google+ページのURLが「https://plus.google.com/+Examples」の場合「+Examples」を入力',
				'type'      => 'text',
			));
			// Google+フォローアイコンの表示H セッティング
			$wp_customize->add_setting( 'fit_snsFollow[googleFollowH]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// Google+フォローアイコンの表示H コントロール
			$wp_customize->add_control( 'fit_snsFollow_googleFollowH', array(
				'section'   => 'fit_sns_follow_section',
				'settings'  => 'fit_snsFollow[googleFollowH]',
				'label' => 'Headerでフォローアイコンを表示する',
				'type'      => 'checkbox',
			));
			// Google+フォローアイコンの表示F セッティング
			$wp_customize->add_setting( 'fit_snsFollow[googleFollowF]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// Google+フォローアイコンの表示F コントロール
			$wp_customize->add_control( 'fit_snsFollow_googleFollowF', array(
				'section'   => 'fit_sns_follow_section',
				'settings'  => 'fit_snsFollow[googleFollowF]',
				'label' => 'Footerでフォローアイコンを表示する',
				'type'      => 'checkbox',
			));
			
			
			// YouTubeチャンネルURL セッティング
			$wp_customize->add_setting( 'fit_snsFollow[youtubeUrl]', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// YouTubeチャンネルURL コントロール
			$wp_customize->add_control( 'fit_snsFollow_youtubeUrl', array(
				'section'   => 'fit_sns_follow_section',
				'settings'  => 'fit_snsFollow[youtubeUrl]',
				'label'     => 'YouTubeチャンネルのURL',
				'description' => '■YouTubeチャンネルのURLが「https://www.youtube.com/channel/Examples」の場合「Examples」を入力',
				'type'      => 'text',
			));
			// YouTubeフォローアイコンの表示H セッティング
			$wp_customize->add_setting( 'fit_snsFollow[youtubeFollowH]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// YouTubeフォローアイコンの表示H コントロール
			$wp_customize->add_control( 'fit_snsFollow_youtubeFollowH', array(
				'section'   => 'fit_sns_follow_section',
				'settings'  => 'fit_snsFollow[youtubeFollowH]',
				'label' => 'Headerでフォローアイコンを表示する',
				'type'      => 'checkbox',
			));
			// YouTubeフォローアイコンの表示F セッティング
			$wp_customize->add_setting( 'fit_snsFollow[youtubeFollowF]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// YouTubeフォローアイコンの表示F コントロール
			$wp_customize->add_control( 'fit_snsFollow_youtubeFollowF', array(
				'section'   => 'fit_sns_follow_section',
				'settings'  => 'fit_snsFollow[youtubeFollowF]',
				'label' => 'Footerでフォローアイコンを表示する',
				'type'      => 'checkbox',
			));
			
			
			// LinkedInページURL セッティング
			$wp_customize->add_setting( 'fit_snsFollow[linkedinUrl]', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// LinkedInページURL コントロール
			$wp_customize->add_control( 'fit_snsFollow_linkedinUrl', array(
				'section'   => 'fit_sns_follow_section',
				'settings'  => 'fit_snsFollow[linkedinUrl]',
				'label'     => 'LinkedInページのURL',
				'description' => '■LinkedInページのURLが「http://ca.linkedin.com/in/Examples」の場合「Examples」を入力',
				'type'      => 'text',
			));
			// LinkedInフォローアイコンの表示H セッティング
			$wp_customize->add_setting( 'fit_snsFollow[linkedinFollowH]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// LinkedInフォローアイコンの表示H コントロール
			$wp_customize->add_control( 'fit_snsFollow_linkedinFollowH', array(
				'section'   => 'fit_sns_follow_section',
				'settings'  => 'fit_snsFollow[linkedinFollowH]',
				'label' => 'Headerでフォローアイコンを表示する',
				'type'      => 'checkbox',
			));
			// LinkedInフォローアイコンの表示F セッティング
			$wp_customize->add_setting( 'fit_snsFollow[linkedinFollowF]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// LinkedInフォローアイコンの表示F コントロール
			$wp_customize->add_control( 'fit_snsFollow_linkedinFollowF', array(
				'section'   => 'fit_sns_follow_section',
				'settings'  => 'fit_snsFollow[linkedinFollowF]',
				'label' => 'Footerでフォローアイコンを表示する',
				'type'      => 'checkbox',
			));
			
			
			// PinterestページURL セッティング
			$wp_customize->add_setting( 'fit_snsFollow[pinterestUrl]', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// PinterestページURL コントロール
			$wp_customize->add_control( 'fit_snsFollow_pinterestUrl', array(
				'section'   => 'fit_sns_follow_section',
				'settings'  => 'fit_snsFollow[pinterestUrl]',
				'label'     => 'PinterestページのURL',
				'description' => '■PinterestページのURLが「https://www.pinterest.jp/Examples」の場合「Examples」を入力',
				'type'      => 'text',
			));
			// Pinterestフォローアイコンの表示H セッティング
			$wp_customize->add_setting( 'fit_snsFollow[pinterestFollowH]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// Pinterestフォローアイコンの表示H コントロール
			$wp_customize->add_control( 'fit_snsFollow_pinterestFollowH', array(
				'section'   => 'fit_sns_follow_section',
				'settings'  => 'fit_snsFollow[pinterestFollowH]',
				'label' => 'Headerでフォローアイコンを表示する',
				'type'      => 'checkbox',
			));
			// Pinterestフォローアイコンの表示F セッティング
			$wp_customize->add_setting( 'fit_snsFollow[pinterestFollowF]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// Pinterestフォローアイコンの表示F コントロール
			$wp_customize->add_control( 'fit_snsFollow_pinterestFollowF', array(
				'section'   => 'fit_sns_follow_section',
				'settings'  => 'fit_snsFollow[pinterestFollowF]',
				'label' => 'Footerでフォローアイコンを表示する',
				'type'      => 'checkbox',
			));
			
	
			// RSSページURL セッティング
			$wp_customize->add_setting( 'fit_snsFollow[rssUrl]', array(
				'type' => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			));
			// RSSページURL コントロール
			$wp_customize->add_control( 'fit_snsFollow_rssUrl', array(
				'section'   => 'fit_sns_follow_section',
				'settings'  => 'fit_snsFollow[rssUrl]',
				'label'     => 'RSSページのURL',
				'description' => '■未入力の場合は[bloginfo(rss2_url)]を適用',
				'type'      => 'text',
			));
			// RSSフォローアイコンの表示H セッティング
			$wp_customize->add_setting( 'fit_snsFollow[rssFollowH]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// RSSフォローアイコンの表示H コントロール
			$wp_customize->add_control( 'fit_snsFollow_rssFollowH', array(
				'section'   => 'fit_sns_follow_section',
				'settings'  => 'fit_snsFollow[rssFollowH]',
				'label' => 'Headerでフォローアイコンを表示する',
				'type'      => 'checkbox',
			));
			// RSSフォローアイコンの表示F セッティング
			$wp_customize->add_setting( 'fit_snsFollow[rssFollowF]', array(
				'type' => 'option',
				'sanitize_callback' => 'fit_sanitize_checkbox',
			));
			// RSSフォローアイコンの表示F コントロール
			$wp_customize->add_control( 'fit_snsFollow_rssFollowF', array(
				'section'   => 'fit_sns_follow_section',
				'settings'  => 'fit_snsFollow[rssFollowF]',
				'label' => 'Footerでフォローアイコンを表示する',
				'type'      => 'checkbox',
			));
  
}
add_action( 'customize_register', 'fit_sns_cutomizer' );
function get_fit_image_ogp(){ return esc_url(get_theme_mod('fit_snsOgp_image'));}