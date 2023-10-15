<?php
    get_header('9-maya-den-pobedy');
?>
<body>
   <header class="header header_may-ninth">
      <div class="header__video">
        <video class="header__source" autoplay="" muted="" loop="" poster="<?php echo get_template_directory_uri(); ?>/images/partials/backgrounds/background.jpg">
          <source src="<?php echo get_template_directory_uri(); ?>/images/polev_kuhnya/videos/bg_armeyskiye-polevyye-kukhni_1920х700.webm" type="video/webm"/>
          <source src="<?php echo get_template_directory_uri(); ?>/images/polev_kuhnya/videos/bg_armeyskiye-polevyye-kukhni_1920х700.ogv" type="video/ogv"/>
          <source src="<?php echo get_template_directory_uri(); ?>/images/polev_kuhnya/videos/bg_armeyskiye-polevyye-kukhni_1920x700.mp4" type="video/mp4"/>
        </video>
      </div>
      <div class="header__left"></div>
      <div class="header__wrapper header__container">
      <div class="header__top">
          <div class="header__top-container">
            <div class="header__nav">
                <div class="header__logo"><img class="header__icon" src="<?php echo get_template_directory_uri(); ?>/images/partials/logo/logo2.svg" alt=""/><img class="header__logo-title" src="<?php echo get_template_directory_uri(); ?>/images/partials/logo/title.svg" alt=""/><a class="header__link" href="/"></a></div>
                <div class="header__catalog">
                  <div class="header__catalog_title">Виды аттракционов</div>
                  
                  <?php
                    $menu_stuff = array(
                          'theme_location'  => '',
                          'menu'            => 'Мобильное',
                          'container'       => false,
                          'container_class' => '',
                          'container_id'    => '',
                          'menu_class'      => 'header__catalog__list',
                          'menu_id'         => 'left_menu',
                          'echo'            => true,
                          'fallback_cb'     => false,
                          'before'          => '',
                          'after'           => '',
                          'link_before'     => '<span class="header__catalog__item__title">',
                          'link_after'      => '</span>',
                          'items_wrap'      => '<ul class="%2$s" id="%1$s">%3$s</ul>',
                          'depth'           => 1,
                          'walker'          => ''); //new catListWalker());
                    ?>
                    <?php wp_nav_menu( $menu_stuff ); ?>

                </div>
              </div>
              <div class="header__numbers">
                <a class="header__tel" href="tel:84952564047"><img class="header__telephone" src="<?php echo get_template_directory_uri(); ?>/images/partials/logo/phone-call.svg" alt=""/></a>
                <a class="header__phone" href="tel:74952564047">+7 (495) 256-40-47</a>
                <a href="https://wa.me/89264810673" target="_blank"><img class="header__whatsapp" src="<?php echo get_template_directory_uri(); ?>/images/partials/logo/whatsapp.svg" alt=""/></a>
                <div class="header__menu"><img src="<?php echo get_template_directory_uri(); ?>/images/partials/logo/menu.svg" alt=""/></div>
              </div>
          </div>
        </div>
        <div class="header__body">
          <div class="header__center">
            <h1 class="header__title title">Аренда полевой кухни</h1>
            <p class="header__text">
            и оборудования для празднования Дня Победы
            </p><span class="header__button button">Выбрать кухню</span>
          </div>
        </div>
      </div>
    </header>
    <section class="advantages section">
      <div class="container">
        <p class="title">Наши преимущества</p>
        <div class="advantages__wrapper">
          <div class="item">
            <figure class="item__figure"><img class="item__image" src="<?php echo get_template_directory_uri(); ?>/images/partials/advantages/maintenance.svg" alt=""/></figure>
            <p class="item__heading">Собственная материально-техническая база</p>
          </div>
          <div class="item">
            <figure class="item__figure"><img class="item__image" src="<?php echo get_template_directory_uri(); ?>/images/partials/advantages/kitchen.svg" alt=""/></figure>
            <p class="item__heading">Работаем на улице и в помещении</p>
          </div>
          <div class="item">
            <figure class="item__figure"><img class="item__image" src="<?php echo get_template_directory_uri(); ?>/images/partials/advantages/leadership.svg" alt=""/></figure>
            <p class="item__heading">Опыт проведения мероприятий более 10 лет</p>
          </div>
          <div class="item">
            <figure class="item__figure"><img class="item__image" src="<?php echo get_template_directory_uri(); ?>/images/partials/advantages/award.svg" alt=""/></figure>
            <p class="item__heading">Самые свежие и сертифицированные продукты</p>
          </div>
        </div>
      </div>
    </section>
    <section class="installation section">
      <div class="container">
        <h2 class="title">Армейские полевые кухни</h2>
        <div class="installation__wrapper installation__wrapper-active">
    <?php

      $include_ids = ['2011','11758'];
      $args = array (
          'post_type' => 'post',
          'post_status' => 'publish',
          //'posts_per_page' => 150,
          //'paged' => $paged,
          'post__in' => $include_ids,
          'order' => 'ASC'
      );
      $query = new WP_Query( $args ); 
      ?>
      <?php while ( $query->have_posts() ) : $query->the_post(); ?>

          <?php 
            $title = get_the_title();
            $price = get_post_meta($post->ID, 'wpcf-price_stuff', true);
            $price = number_format((int)$price, 0, '', ' ');
            $short_description = get_post_meta($post->ID, 'wpcf-short_description', true); 
          ?>
 
          <div class="product product-main">
            <figure class="product__slider"><?=get_the_post_thumbnail(null, [500, 400], ['class' =>  'product__image product__image-main' ])?></figure>
            <div class="product__body">
              <div class="product__heading"> 
                <p class="product__title"><?=$title?></p>
              </div>
              <p class="product__text"><?=$short_description?></p>
            </div>
            <div class="product__right">
              <p class="product__price product__price-main">От <?=$price?> <span class="product__rubl">₽</span></p><a class="product__link button button-large button-primary" href="<?=get_permalink()?>">Подробнее</a>
            </div>
          </div>

        <?php endwhile; 
        wp_reset_query(); ?>
        
        </div>
      </div>
    </section>
    <section class="installation section">
      <div class="container">
        <h2 class="title">Оборудование для организации Дня Победы</h2>
        <div class="installation__settings"><svg class="installation__module" height="48" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M8 22h10v-12h-10v12zm0 14h10v-12h-10v12zm12 0h10v-12h-10v12zm12 0h10v-12h-10v12zm-12-14h10v-12h-10v12zm12-12v12h10v-12h-10z"/><path d="M0 0h48v48h-48z" fill="none"/></svg>
<svg class="installation__list" height="48" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M8 28h8v-8H8v8zm0 10h8v-8H8v8zm0-20h8v-8H8v8zm10 10h24v-8H18v8zm0 10h24v-8H18v8zm0-28v8h24v-8H18z"/><path d="M0 0h48v48H0z" fill="none"/></svg>
        </div>
        <?php echo '<div class="installation__wrapper installation__wrapper-active">';
            //$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

            //$term = get_queried_object();

            $exclude_ids = ['2011','11758'];

            $args = array (
                'cat' => 26,
                'post_type' => 'post',
                'post_status' => 'publish',
                //'posts_per_page' => 150,
                //'paged' => $paged,
                'post__not_in' => $exclude_ids,
                'nopaging' => TRUE,
                'order' => 'ASC'
            );
            $query = new WP_Query( $args );

            $i = 1;
            global $star;
            //$hidden = '';
            $starHtml5 = "<img class=\"product__star\" src=".get_template_directory_uri()."/images/partials/products/star.svg\" alt=\"\"/><img class=\"product__star\" src=".get_template_directory_uri()."/images/partials/products/star.svg\" alt=\"\"/><img class=\"product__star\" src=".get_template_directory_uri()."/images/partials/products/star.svg\" alt=\"\"/><img class=\"product__star\" src=".get_template_directory_uri()."/images/partials/products/star.svg\" alt=\"\"/><img class=\"product__star\" src=".get_template_directory_uri()."/images/partials/products/star.svg\" alt=\"\"/>";
            $starHtml4 = "<img class=\"product__star\" src=".get_template_directory_uri()."/images/partials/products/star.svg\" alt=\"\"/><img class=\"product__star\" src=".get_template_directory_uri()."/images/partials/products/star.svg\" alt=\"\"/><img class=\"product__star\" src=".get_template_directory_uri()."/images/partials/products/star.svg\" alt=\"\"/><img class=\"product__star\" src=".get_template_directory_uri()."/images/partials/products/star.svg\" alt=\"\"/>";
            while($query->have_posts())
            {

                if($i > 15) {
                    //$hidden = ' product-hidden';
                    $star = $starHtml4;
                } else {
                    $star = $starHtml5;
                }
                $query->the_post();
                get_template_part( 'loop', '9-maya-den-pobedy' );
                $i++;
            }
            wp_reset_postdata();

         echo '</div> '; ?>
         <?php
            if ( function_exists( 'emm_paginate' ) ) {
                //emm_paginate();

            }
         ?>
      </div>
    </section>
    <section class="contacts">
      <div class="contacts__wrapper container">
        <div class="contacts__left">
          <div class="contacts__left-wrapper">
            <p class="subtitle contacts__text">быстро, качественно, легко</p>
            <p class="title contacts__text">Обратная связь</p>
            <div class="contacts__items">
              <div class="contacts__item"><img class="contacts__icon" src="<?php echo get_template_directory_uri(); ?>/images/partials/socials/call.svg" alt=""/><span class="contacts__item-text">8 (495) 256-40-47</span></div>
              <div class="contacts__item"><img class="contacts__icon" src="<?php echo get_template_directory_uri(); ?>/images/partials/socials/mail.svg" alt=""/><span class="contacts__item-text">info@arenda-attrakcionov.ru</span></div>
              <div class="contacts__item"><img class="contacts__icon" src="<?php echo get_template_directory_uri(); ?>/images/partials/socials/location.svg" alt=""/><span class="contacts__item-text">Москва, Егорьевский проезд, дом 2а, стр. 10</span></div>
              <div class="contacts__item"><img class="contacts__icon" src="<?php echo get_template_directory_uri(); ?>/images/partials/socials/clock.svg" alt=""/><span class="contacts__item-text">пн. — пт. с 9:00 до 20:00</span></div>
            </div>
            <div class="contacts__socials">
                <a href="https://www.facebook.com/arendaattrakcionov.ru" target="_blank">
                    <svg class="footer__social" width="20" height="20" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M30 15C30 6.71572 23.2843 0 15 0C6.71572 0 0 6.71572 0 15C0 22.4868 5.48525 28.6925 12.6562 29.8178V19.3359H8.84766V15H12.6562V11.6953C12.6562 7.93594 14.8957 5.85938 18.322 5.85938C19.9626 5.85938 21.6797 6.15234 21.6797 6.15234V9.84375H19.7883C17.925 9.84375 17.3438 11.0001 17.3438 12.1875V15H21.5039L20.8389 19.3359H17.3438V29.8178C24.5147 28.6925 30 22.4868 30 15Z" fill="black"></path>
                    </svg>
                </a>
                <a href="https://www.instagram.com/arenda_attrakcionov.ru/" target="_blank">
                    <svg class="footer__social" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 511 511.9"><path xmlns="http://www.w3.org/2000/svg" d="M510.95 150.5c-1.2-27.2-5.598-45.898-11.9-62.102-6.5-17.199-16.5-32.597-29.6-45.398-12.802-13-28.302-23.102-45.302-29.5-16.296-6.3-34.898-10.7-62.097-11.898C334.648.3 325.949 0 256.449 0s-78.199.3-105.5 1.5c-27.199 1.2-45.898 5.602-62.097 11.898-17.204 6.5-32.602 16.5-45.403 29.602-13 12.8-23.097 28.3-29.5 45.3-6.3 16.302-10.699 34.9-11.898 62.098C.75 177.801.449 186.5.449 256s.301 78.2 1.5 105.5c1.2 27.2 5.602 45.898 11.903 62.102 6.5 17.199 16.597 32.597 29.597 45.398 12.801 13 28.301 23.102 45.301 29.5 16.3 6.3 34.898 10.7 62.102 11.898 27.296 1.204 36 1.5 105.5 1.5s78.199-.296 105.5-1.5c27.199-1.199 45.898-5.597 62.097-11.898a130.934 130.934 0 0074.903-74.898c6.296-16.301 10.699-34.903 11.898-62.102 1.2-27.3 1.5-36 1.5-105.5s-.102-78.2-1.3-105.5zm-46.098 209c-1.102 25-5.301 38.5-8.801 47.5-8.602 22.3-26.301 40-48.602 48.602-9 3.5-22.597 7.699-47.5 8.796-27 1.204-35.097 1.5-103.398 1.5s-76.5-.296-103.403-1.5c-25-1.097-38.5-5.296-47.5-8.796C94.551 451.5 84.45 445 76.25 436.5c-8.5-8.3-15-18.3-19.102-29.398-3.5-9-7.699-22.602-8.796-47.5-1.204-27-1.5-35.102-1.5-103.403s.296-76.5 1.5-103.398c1.097-25 5.296-38.5 8.796-47.5C61.25 94.199 67.75 84.1 76.352 75.898c8.296-8.5 18.296-15 29.398-19.097 9-3.5 22.602-7.7 47.5-8.801 27-1.2 35.102-1.5 103.398-1.5 68.403 0 76.5.3 103.403 1.5 25 1.102 38.5 5.3 47.5 8.8 11.097 4.098 21.199 10.598 29.398 19.098 8.5 8.301 15 18.301 19.102 29.403 3.5 9 7.699 22.597 8.8 47.5 1.2 27 1.5 35.097 1.5 103.398s-.3 76.301-1.5 103.301zm0 0" fill="#000" data-original="#000000"/><path xmlns="http://www.w3.org/2000/svg" d="M256.45 124.5c-72.598 0-131.5 58.898-131.5 131.5s58.902 131.5 131.5 131.5c72.6 0 131.5-58.898 131.5-131.5s-58.9-131.5-131.5-131.5zm0 216.8c-47.098 0-85.302-38.198-85.302-85.3s38.204-85.3 85.301-85.3c47.102 0 85.301 38.198 85.301 85.3s-38.2 85.3-85.3 85.3zm167.402-222c0 16.954-13.747 30.7-30.704 30.7-16.953 0-30.699-13.746-30.699-30.7 0-16.956 13.746-30.698 30.7-30.698 16.956 0 30.703 13.742 30.703 30.699zm0 0" fill="#000" data-original="#000000"/></svg>
                </a>
                <a href="https://www.tiktok.com/@arenda_attrakcionov?lang=ru-RU" target="_blank">
                    <svg class="footer__social" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="20" height="20" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g xmlns="http://www.w3.org/2000/svg"><path d="m480.32 128.39c-29.22 0-56.18-9.68-77.83-26.01-24.83-18.72-42.67-46.18-48.97-77.83-1.56-7.82-2.4-15.89-2.48-24.16h-83.47v228.08l-.1 124.93c0 33.4-21.75 61.72-51.9 71.68-8.75 2.89-18.2 4.26-28.04 3.72-12.56-.69-24.33-4.48-34.56-10.6-21.77-13.02-36.53-36.64-36.93-63.66-.63-42.23 33.51-76.66 75.71-76.66 8.33 0 16.33 1.36 23.82 3.83v-62.34-22.41c-7.9-1.17-15.94-1.78-24.07-1.78-46.19 0-89.39 19.2-120.27 53.79-23.34 26.14-37.34 59.49-39.5 94.46-2.83 45.94 13.98 89.61 46.58 121.83 4.79 4.73 9.82 9.12 15.08 13.17 27.95 21.51 62.12 33.17 98.11 33.17 8.13 0 16.17-.6 24.07-1.77 33.62-4.98 64.64-20.37 89.12-44.57 30.08-29.73 46.7-69.2 46.88-111.21l-.43-186.56c14.35 11.07 30.04 20.23 46.88 27.34 26.19 11.05 53.96 16.65 82.54 16.64v-60.61-22.49c.02.02-.22.02-.24.02z" fill="#000" data-original="#000000" style=""/></g></g></svg>
                </a>
                <a href="https://vk.com/arenda.attrakcion" target="_blank"><img class="contacts__social" src="<?php echo get_template_directory_uri(); ?>/images/partials/socials/vk.svg" alt=""/></a>
            </div>
          </div>
        </div>
        <div class="contacts__right">
          <form class="contact-form">
            <input type="hidden" name="project_name" value="arenda-attrakcionov.ru"/>
            <input type="hidden" name="admin_email" value="Заявка :: Оборудование для выставок"/>
            <input type="hidden" name="form_subject" value="Обратный звонок с сайта"/>
            <input type="hidden" name="admin_data" value="Заявка :: Оборудование для выставок"/>
            <div class="contact-form__group">
              <p class="contact-form__label">Имя</p>
              <input class="contact-form__control" type="text" name="name" placeholder="Тархунов Заур Алексеевич" required="required"/>
            </div>
            <div class="contact-form__group">
              <p class="contact-form__label">Телефон</p>
              <input class="contact-form__control" type="text" name="phone" placeholder="+7(---) --- -- --" required="required"/>
            </div>
            <div class="contact-form__group">
              <p class="contact-form__label">Сообщение</p>
              <textarea class="contact-form__control contact-form__text" name="comment" placeholder="Начните набирать сообщение" required="required"></textarea>
            </div>
            <input class="button contact-form__button" type="submit" value="Отправить"/>
          </form>
        </div>
      </div>
    </section>

<?php
        /*
        echo "<div class=\"items_list\">";

                $args = array (
                    'cat' => 350,
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 999,
                    'paged' => 1,
                    'order' => 'ASC'
                );
                $query2 = new WP_Query( $args );

                while($query2->have_posts())
                {

                    $query2->the_post();
                    get_template_part( 'loop', 'category' );

                }
                wp_reset_postdata();
        echo "</div>";
        */
    get_footer('9-maya-den-pobedy');
?>