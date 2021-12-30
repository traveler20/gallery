<?php
////////////////////////////////////////////////////////
//TOPページ用キービジュアル
////////////////////////////////////////////////////////
function fit_main_visual() {
?>
  <div class="<?php if(get_option('fit_homeMainimg_width') == 'value3'): ?>keyBig divider<?php elseif(get_option('fit_homeMainimg_width') == 'value2'): ?>container divider<?php else:?>wider<?php endif; ?>">
	  <?php if(get_option('fit_homeMainimg_mode') == '' || get_option('fit_homeMainimg_mode') == 'still'): ?>
      <?php
      if ( get_fit_stillimg()):
        $date = get_option('fit_homeMainimg_still');
        $mask = get_option('fit_homeMainimg_stillMask');
        $img_date = get_fit_stillimg();
        $img_id = attachment_url_to_postid($img_date);
        $img_alt = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
        $imgSp = wp_get_attachment_image_src( $img_id, 'icatch768' );
        $imgPc = wp_get_attachment_image_src( $img_id, 'icatch1280' );
      ?>
      <!--still-->
      <div class="still">
        <div class="still__box">
          <div class="still__bg mask<?php if($mask && $mask != 'off'): ?> mask-<?php echo $mask ?><?php endif; ?>">
            <?php if(is_mobile()):?>
              <img class="still__img" <?php echo fit_correct_src(); ?>="<?php echo $imgSp[0]; ?>" alt="<?php echo $img_alt; ?>" width="<?php echo $imgSp[1]; ?>" height="<?php echo $imgSp[2]; ?>" <?php echo fit_dummy_src(); ?>>
            <?php else : ?>
              <img class="still__img" <?php echo fit_correct_src(); ?>="<?php echo $imgPc[0]; ?>" alt="<?php echo $img_alt; ?>" width="<?php echo $imgPc[1]; ?>" height="<?php echo $imgPc[2]; ?>" <?php echo fit_dummy_src(); ?>>
            <?php endif; ?>
          </div>
          <div class="still__content">
            <?php if ( is_array($date) && array_key_exists( 'title', $date ) ) : ?>
            <h2 class="heading heading-slider"><?php echo $date['title'] ?></h2>
            <?php endif; ?>
            <?php if ( is_array($date) && array_key_exists( 'subtitle', $date ) ) : ?>
            <p class="phrase phrase-slider">
              <?php echo $date['subtitle'] ?>
            </p>
            <?php endif; ?>
            <?php if(!empty($date['btn']) && !empty($date['url'])): ?>
            <div class="btn"><a class="btn__link btn__link-primary" href="<?php echo $date['url'] ?>"><?php echo $date['btn'] ?></a></div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <!--still-->
      <?php endif; ?>
    <?php endif; ?>


    <?php if(get_option('fit_homeMainimg_mode') == 'movie'): ?>
      <?php
      if ( get_fit_movieimg()):
	  	  $date = get_option('fit_homeMainimg_movie');
        $mask = get_option('fit_homeMainimg_movieMask');
        $YouTube = get_option('fit_homeMainimg_movieYouTube');
      ?>
      <!--still-movie-->
      <div class="still still-movie">
        <div class="still__box mask<?php if($mask && $mask != 'off'): ?> mask-<?php echo $mask ?><?php endif; ?>">
          <div class="still__content">
            <?php if ( is_array($date) && array_key_exists( 'title', $date ) ) : ?>
            <h2 class="heading heading-slider"><?php echo $date['title'] ?></h2>
            <?php endif; ?>
            <?php if ( is_array($date) && array_key_exists( 'subtitle', $date ) ) : ?>
            <p class="phrase phrase-slider">
              <?php echo $date['subtitle'] ?>
            </p>
            <?php endif; ?>
            <?php if(!empty($date['btn']) && !empty($date['url'])): ?>
            <div class="btn"><a class="btn__link btn__link-primary" href="<?php echo $date['url'] ?>"><?php echo $date['btn'] ?></a></div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div id="bgVideo" data-property="{videoURL: 'https://www.youtube.com/watch?v=<?php echo $YouTube ?>',mute: true,containment: '.still__box',showControls: false}"></div>
      <!--still-movie-->
      <?php endif; ?>
      <?php endif; ?>


      <?php if(get_option('fit_homeMainimg_mode') == 'slider'): ?>
      <!--slider-->
      <div class="swiper-container swiper-slider">
        <div class="swiper-wrapper">

          <?php
          if ( get_fit_slideimg1()):
	  	      $date = get_option('fit_homeMainimg_slide1');
            $mask = get_option('fit_homeMainimg_slide1Mask');
            $img_date = get_fit_slideimg1();
            $img_id = attachment_url_to_postid($img_date);
            $img_alt = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
            $imgSp = wp_get_attachment_image_src( $img_id, 'icatch768' );
            $imgPc = wp_get_attachment_image_src( $img_id, 'icatch1280' );
          ?>
          <div class="swiper-slide swiper-slide1 mask<?php if($mask && $mask != 'off'): ?> mask-<?php echo $mask ?><?php endif; ?>">
            <?php if(is_mobile()):?>
              <img class="swiper-bg" src="<?php echo $imgSp[0]; ?>" alt="<?php echo $img_alt; ?>" width="<?php echo $imgSp[1]; ?>" height="<?php echo $imgSp[2]; ?>">
            <?php else : ?>
              <img class="swiper-bg" src="<?php echo $imgPc[0]; ?>" alt="<?php echo $img_alt; ?>" width="<?php echo $imgPc[1]; ?>" height="<?php echo $imgPc[2]; ?>">
            <?php endif; ?>
            <div class="swiper-content">
              <?php if ( is_array($date) && array_key_exists( 'title', $date ) ) : ?>
              <h2 class="heading heading-slider"><?php echo $date['title'] ?></h2>
              <?php endif; ?>
              <?php if ( is_array($date) && array_key_exists( 'subtitle', $date ) ) : ?>
              <p class="phrase phrase-slider">
                <?php echo $date['subtitle'] ?>
              </p>
              <?php endif; ?>
              <?php if(!empty($date['btn']) && !empty($date['url'])): ?>
              <div class="btn"><a class="btn__link btn__link-primary" href="<?php echo $date['url'] ?>"><?php echo $date['btn'] ?></a></div>
              <?php endif; ?>
            </div>
          </div>
          <?php endif; ?>

          <?php
          if ( get_fit_slideimg2()):
	  	      $date = get_option('fit_homeMainimg_slide2');
            $mask = get_option('fit_homeMainimg_slide2Mask');
            $img_date = get_fit_slideimg2();
            $img_id = attachment_url_to_postid($img_date);
            $img_alt = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
            $imgSp = wp_get_attachment_image_src( $img_id, 'icatch768' );
            $imgPc = wp_get_attachment_image_src( $img_id, 'icatch1280' );
          ?>
          <div class="swiper-slide swiper-slide2 mask<?php if($mask && $mask != 'off'): ?> mask-<?php echo $mask ?><?php endif; ?>">
            <?php if(is_mobile()):?>
              <img class="swiper-bg" src="<?php echo $imgSp[0]; ?>" alt="<?php echo $img_alt; ?>" width="<?php echo $imgSp[1]; ?>" height="<?php echo $imgSp[2]; ?>">
            <?php else : ?>
              <img class="swiper-bg" src="<?php echo $imgPc[0]; ?>" alt="<?php echo $img_alt; ?>" width="<?php echo $imgPc[1]; ?>" height="<?php echo $imgPc[2]; ?>">
            <?php endif; ?>
            <div class="swiper-content">
              <?php if ( is_array($date) && array_key_exists( 'title', $date ) ) : ?>
              <h2 class="heading heading-slider"><?php echo $date['title'] ?></h2>
              <?php endif; ?>
              <?php if ( is_array($date) && array_key_exists( 'subtitle', $date ) ) : ?>
              <p class="phrase phrase-slider">
                <?php echo $date['subtitle'] ?>
              </p>
              <?php endif; ?>
              <?php if(!empty($date['btn']) && !empty($date['url'])): ?>
              <div class="btn"><a class="btn__link btn__link-primary" href="<?php echo $date['url'] ?>"><?php echo $date['btn'] ?></a></div>
              <?php endif; ?>
            </div>
          </div>
          <?php endif; ?>

          <?php
          if ( get_fit_slideimg3()):
	  	      $date = get_option('fit_homeMainimg_slide3');
            $mask = get_option('fit_homeMainimg_slide3Mask');
            $img_date = get_fit_slideimg3();
            $img_id = attachment_url_to_postid($img_date);
            $img_alt = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
            $imgSp = wp_get_attachment_image_src( $img_id, 'icatch768' );
            $imgPc = wp_get_attachment_image_src( $img_id, 'icatch1280' );
          ?>
          <div class="swiper-slide swiper-slide3 mask<?php if($mask && $mask != 'off'): ?> mask-<?php echo $mask ?><?php endif; ?>">
            <?php if(is_mobile()):?>
              <img class="swiper-bg" src="<?php echo $imgSp[0]; ?>" alt="<?php echo $img_alt; ?>" width="<?php echo $imgSp[1]; ?>" height="<?php echo $imgSp[2]; ?>">
            <?php else : ?>
              <img class="swiper-bg" src="<?php echo $imgPc[0]; ?>" alt="<?php echo $img_alt; ?>" width="<?php echo $imgPc[1]; ?>" height="<?php echo $imgPc[2]; ?>">
            <?php endif; ?>
            <div class="swiper-content">
              <?php if ( is_array($date) && array_key_exists( 'title', $date ) ) : ?>
              <h2 class="heading heading-slider"><?php echo $date['title'] ?></h2>
              <?php endif; ?>
              <?php if ( is_array($date) && array_key_exists( 'subtitle', $date ) ) : ?>
              <p class="phrase phrase-slider">
                <?php echo $date['subtitle'] ?>
              </p>
              <?php endif; ?>
              <?php if(!empty($date['btn']) && !empty($date['url'])): ?>
              <div class="btn"><a class="btn__link btn__link-primary" href="<?php echo $date['url'] ?>"><?php echo $date['btn'] ?></a></div>
              <?php endif; ?>
            </div>
          </div>
          <?php endif; ?>

          <?php
          if ( get_fit_slideimg4()):
	  	      $date = get_option('fit_homeMainimg_slide4');
            $mask = get_option('fit_homeMainimg_slide4Mask');
            $img_date = get_fit_slideimg4();
            $img_id = attachment_url_to_postid($img_date);
            $img_alt = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
            $imgSp = wp_get_attachment_image_src( $img_id, 'icatch768' );
            $imgPc = wp_get_attachment_image_src( $img_id, 'icatch1280' );
          ?>
          <div class="swiper-slide swiper-slide4 mask<?php if($mask && $mask != 'off'): ?> mask-<?php echo $mask ?><?php endif; ?>">
            <?php if(is_mobile()):?>
              <img class="swiper-bg" src="<?php echo $imgSp[0]; ?>" alt="<?php echo $img_alt; ?>" width="<?php echo $imgSp[1]; ?>" height="<?php echo $imgSp[2]; ?>">
            <?php else : ?>
              <img class="swiper-bg" src="<?php echo $imgPc[0]; ?>" alt="<?php echo $img_alt; ?>" width="<?php echo $imgPc[1]; ?>" height="<?php echo $imgPc[2]; ?>">
            <?php endif; ?>
            <div class="swiper-content">
              <?php if ( is_array($date) && array_key_exists( 'title', $date ) ) : ?>
              <h2 class="heading heading-slider"><?php echo $date['title'] ?></h2>
              <?php endif; ?>
              <?php if ( is_array($date) && array_key_exists( 'subtitle', $date ) ) : ?>
              <p class="phrase phrase-slider">
                <?php echo $date['subtitle'] ?>
              </p>
              <?php endif; ?>
              <?php if(!empty($date['btn']) && !empty($date['url'])): ?>
              <div class="btn"><a class="btn__link btn__link-primary" href="<?php echo $date['url'] ?>"><?php echo $date['btn'] ?></a></div>
              <?php endif; ?>
            </div>
          </div>
          <?php endif; ?>

          <?php
          if ( get_fit_slideimg5()):
	  	      $date = get_option('fit_homeMainimg_slide5');
            $mask = get_option('fit_homeMainimg_slide5Mask');
            $img_date = get_fit_slideimg5();
            $img_id = attachment_url_to_postid($img_date);
            $img_alt = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
            $imgSp = wp_get_attachment_image_src( $img_id, 'icatch768' );
            $imgPc = wp_get_attachment_image_src( $img_id, 'icatch1280' );
          ?>
          <div class="swiper-slide swiper-slide5 mask<?php if($mask && $mask != 'off'): ?> mask-<?php echo $mask ?><?php endif; ?>">
            <?php if(is_mobile()):?>
              <img class="swiper-bg" src="<?php echo $imgSp[0]; ?>" alt="<?php echo $img_alt; ?>" width="<?php echo $imgSp[1]; ?>" height="<?php echo $imgSp[2]; ?>">
            <?php else : ?>
              <img class="swiper-bg" src="<?php echo $imgPc[0]; ?>" alt="<?php echo $img_alt; ?>" width="<?php echo $imgPc[1]; ?>" height="<?php echo $imgPc[2]; ?>">
            <?php endif; ?>
            <div class="swiper-content">
              <?php if ( is_array($date) && array_key_exists( 'title', $date ) ) : ?>
              <h2 class="heading heading-slider"><?php echo $date['title'] ?></h2>
              <?php endif; ?>
              <?php if ( is_array($date) && array_key_exists( 'subtitle', $date ) ) : ?>
              <p class="phrase phrase-slider">
                <?php echo $date['subtitle'] ?>
              </p>
              <?php endif; ?>
              <?php if(!empty($date['btn']) && !empty($date['url'])): ?>
              <div class="btn"><a class="btn__link btn__link-primary" href="<?php echo $date['url'] ?>"><?php echo $date['btn'] ?></a></div>
              <?php endif; ?>
            </div>
          </div>
          <?php endif; ?>

        </div>

        <!-- if pagination -->
        <div class="swiper-pagination"></div>

        <!-- if navigation -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

      </div>
      <!--/slider-->
      <?php endif; ?>
      <?php if(get_option('fit_homePickup_switch') == 'on'): ?>
      <!--pickupHead-->
      <div class="pickupHead">
        <div class="container<?php if(get_option('fit_homeMainimg_width') == 'value2' ): ?> pickupHead__inner<?php endif; ?>">
          <p class="pickupHead__text"><?php if(get_option('fit_homePickup_text')) : ?><?php echo get_option('fit_homePickup_text') ?><?php endif; ?></p>
          <?php if(get_option('fit_homePickup_btn') && get_option('fit_homePickup_url')): ?>
            <div class="btn"><a class="btn__link btn__link-pickupHead" href="<?php echo get_option('fit_homePickup_url') ?>"><?php echo get_option('fit_homePickup_btn') ?></a></div>
          <?php endif; ?>
        </div>
      </div>
      <!--/pickupHead-->
      <?php endif; ?>
    </div>

<?php

}
