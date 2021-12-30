<?php /* Template Name: お問い合わせTPL */?>
<?php
//カスタマイザーの設定を反映
$custom_title = 'URL';
if (get_option('fit_bsContact_customTitle')){
	$custom_title = get_option('fit_bsContact_customTitle');
}
$thanks = 'この度はお問い合わせいただきありがとうございます。<br>メールを確認次第、担当者よりご連絡をさせていただきます。';
if (get_option('fit_bsContact_thanks')){
	$thanks = get_option('fit_bsContact_thanks');
}
$message = '改めて担当者よりご連絡致しますので、今しばらくお待ちください。';
if (get_option('fit_bsContact_message')){
	$message = get_option('fit_bsContact_message');
}

if(isset($_POST['submitted'])) {

	//項目チェック
	if(isset($_POST['checking'])) {
		$captchaError = true;
	} else {

		//名前の入力なし
		if(trim($_POST['contactName']) === '') {
			$nameError = '名前が入力されていません';
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}

		//メールアドレスの間違い
		if(trim($_POST['email']) === '') {
			$emailError = 'メールアドレスが入力されていません';
			$hasError = true;
		} else if (!preg_match('|^[0-9a-z_./?-]+@([0-9a-z-]+.)+[0-9a-z-]+$|', trim($_POST['email']))) {
			$emailError = 'メールアドレスが正しくありません';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}

		//お問い合わせ内容の入力なし
		if(trim($_POST['comments']) === '') {
			$commentError = 'お問い合わせ内容が入力されていません';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}

		//カスタム情報
		if(trim($_POST['custom_input']) === '') {
			$custom_input = '未入力';
		} else {
			$custom_input = trim($_POST['custom_input']);
		}

		//お問い合わせフォーム以外からの入力を弾く
		if(strpos($_SERVER['HTTP_REFERER'], home_url()) === false){
			// リファラチェック
			$referrerError = 'お問い合わせフォームから入力されなかったため、メールを送信できませんでした。';
			$hasError = true;
		}

		//エラーなしの場合、メール送信
		if(!isset($hasError)) {
			mb_language("japanese");
			mb_internal_encoding("UTF-8");
			$emailTo = get_option('admin_email');
			$subject = 'WEBからのお問い合わせ';
			$body = "
下記の通りお問い合わせを受け付けました。 \r\n
\r\n
-------------------------------------------------\r\n
■お名前:
$name \r\n

■メールアドレス:
$email \r\n

■$custom_title:
$custom_input \r\n

■お問い合わせ内容:
$comments \r\n
-------------------------------------------------
";
			$title = get_bloginfo('name');
			$from = mb_encode_mimeheader("$title"."のお問い合わせ","UTF-8");
			$headers = 'From: '.$from.' <'.$email.'>';
			mb_send_mail($emailTo, $subject, $body, $headers);


			//自動返信用(入力者へのメール)
			$subject = 'お問い合わせ受付のお知らせ';
			$from = mb_encode_mimeheader("$title","UTF-8");
			$headers2 = 'From: '.$from.' <'.$emailTo.'>';
			$body = "
$name 様 \r\n
$title へお問い合わせいただき、誠にありがとうございます。\r\n
$message \r\n
\r\n
-------------------------------------------------\r\n
■お名前:
$name \r\n

■メールアドレス:
$email \r\n

■$custom_title:
$custom_input \r\n

■お問い合わせ内容:
$comments \r\n
-------------------------------------------------
";
			mb_send_mail($email, $subject, $body, $headers2);
			$emailSent = true;
		}
	}
} ?>
<?php get_header(); ?>


  <!--l-wrapper-->
  <div class="l-wrapper">

		<!--l-main-->
    <?php
    //フレーム設定
    $frame = '';
    if (get_option('fit_conMain_frame') && get_option('fit_conMain_frame') != 'off' ){$frame = ' '.get_option('fit_conMain_frame');}

    //ページ横幅のオプション設定
    $width_page = '';
    if (get_option('fit_pageLayout_width') && get_option('fit_pageLayout_width') != 'off'){$width_page = get_option('fit_pageLayout_width');}

    //レイアウト設定
    $layout = '';
    if ( get_post_meta(get_the_ID(), 'column_layout', true) && get_post_meta(get_the_ID(), 'column_layout', true) != '0' ){
      if ( get_post_meta(get_the_ID(), 'column_layout', true) == '1' ){$layout = ' l-main-wide'.$width_page;}
      if ( get_post_meta(get_the_ID(), 'column_layout', true) == '2' && get_option('fit_pageLayout_side') == 'left' ){$layout = ' l-main-right';}
    }
    else{
      if ( get_option('fit_pageLayout_column') == '1' ){$layout = ' l-main-wide'.$width_page;}
      if ( get_option('fit_pageLayout_column') != '1' && get_option('fit_pageLayout_side') == 'left'  ){$layout = ' l-main-right';}
    }
    ?>
    <main class="l-main<?php echo $frame.$layout; ?>">


      <div class="dividerBottom">

	  <?php if ( get_option('fit_pageStyle_headline') != 'viral' ): ?>
        <h1 class="heading heading-primary"><?php the_title(); ?></h1>

        <?php if ( get_option('fit_pageStyle_headline') != 'none' ): ?>
        <div class="eyecatch<?php if (get_option('fit_pageStyle_aspect') && get_option('fit_pageStyle_aspect') != 'off' ): ?> <?php echo get_option('fit_pageStyle_aspect'); ?><?php endif; ?> eyecatch-main">
          <span class="eyecatch__link">
          <?php if ( has_post_thumbnail()): ?>
            <?php the_post_thumbnail('icatch768'); ?>
          <?php elseif ( get_fit_noimg()): ?>
            <img <?php echo fit_correct_src(); ?>="<?php echo get_fit_noimg(); ?>" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
		  <?php else: ?>
            <img <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_768.gif" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
          <?php endif; ?>
          </span>
        </div>
        <?php endif; ?>

      <?php endif; ?>

        <!--pageContents-->
        <div class="pageContents<?php if (get_option('fit_pageStyle_frame') && get_option('fit_pageStyle_frame') != 'off' ):?> <?php echo get_option('fit_pageStyle_frame')?><?php endif; ?>">

		  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <section class="content<?php fit_content_class(); ?>">

			<?php if(isset($emailSent) && $emailSent == true) { ?>
              <?php echo $thanks; ?>
			<?php } else { ?>
			  <?php the_content(); ?>
              <form class="dividerTop" action="<?php the_permalink(); ?>" method="post">
                <table class="contactTable">
                  <tr>
                    <th class="contactTable__header">お名前<span class="required">必須</span></th>
                    <td class="contactTable__data">
                      <input type="text" name="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" />
					  <?php if(isset($nameError)) : ?><span class="error"><?php echo $nameError;?></span><?php endif; ?>
                    </td>
                  </tr>
                  <tr>
                    <th class="contactTable__header">メールアドレス<span class="required">必須</span></th>
                    <td class="contactTable__data">
                      <input type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" />
			          <?php if(isset($emailError)) : ?><span class="error"><?php echo $emailError;?></span><?php endif; ?>
                    </td>
                  </tr>
                  <tr>
                    <th class="contactTable__header"><?php echo $custom_title; ?></th>
                    <td class="contactTable__data">
                      <input type="text" name="custom_input" value="<?php if(isset($_POST['custom_input'])) echo $_POST['custom_input'];?>" />
                    </td>
                  </tr>
                  <tr>
                    <th class="contactTable__header">お問い合わせ内容<span class="required">必須</span></th>
                    <td class="contactTable__data">
                      <textarea name="comments" rows="10"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
        	          <?php if(isset($commentError)) : ?><span class="error"><?php echo $commentError;?></span><?php endif; ?>
                    </td>
                  </tr>
                </table>
                <div class="btn btn-center ">
                  <?php if(isset($referrerError)) : ?><span class="contactForm__error"><?php echo $referrerError; ?></span><?php endif; ?>
                  <input type="hidden" name="submitted" value="true" /><button class="btn__link btn__link-primary" type="submit">送信する</button>
                </div>
              </form>
			<?php } ?>

          </section>
		  <?php endwhile; endif; ?>
        </div>
		<!--/pageContents-->

	  </div>

    </main>
    <!--/l-main-->


    <?php if ( get_post_meta(get_the_ID(), 'column_layout', true) && get_post_meta(get_the_ID(), 'column_layout', true) != '0' ):?>
      <?php if ( get_post_meta(get_the_ID(), 'column_layout', true) == '2' ):?>
        <?php get_sidebar(); ?>
      <?php endif; ?>
    <?php else:?>
      <?php if ( get_option('fit_pageLayout_column') != '1' ):?>
        <?php get_sidebar(); ?>
      <?php endif; ?>
	<?php endif; ?>


  </div>
  <!--/l-wrapper-->



<?php get_footer(); ?>
