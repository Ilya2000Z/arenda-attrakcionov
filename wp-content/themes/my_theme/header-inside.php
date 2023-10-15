<!DOCTYPE html>
<html lang="ru-RU">
    <head>
		<!-- Google Tag Manager 
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MXVR8MC');</script>
-- End Google Tag Manager -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=1170">
    	<meta name="facebook-domain-verification" content="46zqurw6y9fidvla9jlxhyeylvz532" />
        <title><?php wp_title("", true);?></title>
        <?php
        if(is_single() || is_page())
        {
        ?>
        <?/*<meta name="description" content="<? echo get_post_meta($post->ID, 'description', true); ?>">*/ ?>
        <?php } ?>
        <? wp_head(); ?>
        <link rel="shortcut icon" href="/wp-content/uploads/2015/01/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css?v6" media="all">
        <script>var IP_ADDR = '<?=$_SERVER['REMOTE_ADDR']?>';</script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scripts.js?v7"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.sticky.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.fancybox.css" media="all">
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.fancybox.js"></script>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
          ga('create', 'UA-49487746-1', 'auto');
          ga('send', 'pageview');
          setTimeout(function(){ga('send', 'event', 'New Visitor', location.pathname);}, 15000);
        </script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.cookie.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/ingevents.4.0.8.min.js"></script>
        <script>
        //alert('test');
        jQuery(document).ready(function(){
           // var heightFoo = $('#gray_block').height()+$('#footer').height();
            //$("#left_menu").sticky({topSpacing:180,bottomSpacing:heightFoo+35});
            /* Изменения №3 (добавил, считываем из куки состояние шапки (свернута или развернута)) */
            top_down=0;
            if ($.cookie('state_head')) {
                state_head=$.cookie('state_head');
            } else {
                state_head='down'	/* Изменения №4 (добавил, шапка по умолчанию не видна) */
            }
            if (state_head=='up') {
                //$('#header_button_down').click(); /* Изменения №4 (закомментировал, шапка должна быть развернута без анимации  */
                // $('.tng').css({'marginLeft':'205px','marginTop':'auto'});
                $('#header_button_up').attr('id','header_button_down'); /* теперь кнопка для снижения шапки */
                $('#header .stuff').css({'height':'63px'}); /* уменьшаем высоту шапки */
                $('#content').css({'margin-top':'63px'});   /* поднимаем контент */
                $('#top_menu').css('top','0px');
                $('#top_menu li a span').css('opacity','0');/*.css('padding','30px 7px 8px 10px');*/ /* Изменения №3 (добавил, при свернутой шапки области ссылок перекликались) */
                /*$('#top_menu li a').css('padding','2px 7px 8px 10px');*/ /* Изменения №3 (добавил, при свернутой шапки области ссылок перекликались) */
                $('#logo').css('top','3px');
                $('#email').css('display','none');
                // $('#contacts_ver2').css('top','0px').css('left','380px');
                $('.search').css('bottom','7px').css('left','618px').css('width','180px');
                $('#top_menu li').css('height','56px'); /* Изменения №3 (добавил, при свернутой шапки области ссылок перекликались) */
                /* Изменения №3. Необходимый костыль для подвижного меню слева, если мы шапку развернули,
                   то увеличиваем значение top сверху на top_down, эти данные нужны скрипту
                   wp-content\themes\my_theme\js\scripts.js
                */
                top_down=0;
                $(window).scroll(); //один раз запустим функцию скрола меню, иначе меню встанет на 'свое место', только после движения
                $('.body-inside #header').css('display','block');
            }
            if (state_head=='down') {
                //$('#header_button_up').click();   /* Изменения №4 (закомментировал, шапка должна быть свернута без анимации  */
                // $('.tng').css({'marginLeft':'250px','marginTop':'-33px'});
                $('#header_button_down').attr('id','header_button_up'); /* теперь кнопка для поднятия шапки */
                $('#header .stuff').css({'height':'130px'}); /* уменьшаем высоту шапки */
                $('#content').css({'margin-top':'160px'});   /* поднимаем контент */
                $('#top_menu').css('top','23px');
                $('#top_menu li a span').css('opacity','1');/*.css('padding','67px 0px 0px 0px');*/ /* Изменения №3 (добавил, при свернутой шапки области ссылок перекликались) */
                $('#logo').css('top','22px');
                $('#email').css('display','block');
                // $('#contacts_ver2').css('top','33px').css('left','380px');
                $('.search').css('bottom','7px').css('left','66px').css('width','300px');
                $('#top_menu li').css('height','85px'); /* Изменения №3 (добавил, при свернутой шапки области ссылок перекликались) */
                /* Изменения №3. Необходимый костыль для подвижного меню слева, если мы шапку развернули,
                   то увеличиваем значение top сверху на top_down, эти данные нужны скрипту
                   wp-content\themes\my_theme\js\scripts.js
                */
                top_down=67;
                $(window).scroll(); //один раз запустим функцию скрола меню, иначе меню встанет на 'свое место', только после движения
                $('.body-inside #header').css('display','block');
            }
        });
        </script>
        <!--
        <script>
          (function(d) {
            var s = d.createElement('script');
            s.defer = true;
            s.src = 'https://multisearch.io/plugin/10742';
            if (d.head) d.head.appendChild(s);
          })(document);
        </script>
        -->
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({
                'event':'ipEvent',
                'ipAddressYa' : '<?=$_SERVER["REMOTE_ADDR"]?>'
            });
        </script>
    </head>
    <body <?php body_class( 'body-inside' ); ?>>
        <div id="header" class="alt" style="top: -22px;">
        <?php //get_template_part( 'banners' ); ?>
            <div class="stuff">
                <a href="/" id="logo"></a>
                <div class="search">
                    <?php get_search_form(); ?>
                </div>
                <?php $menu_stuff = array(
                      'theme_location'  => '',
                      'menu'            => 'Верхнее меню',
                      'container'       => false,
                      'container_class' => '',
                      'container_id'    => '',
                      'menu_class'      => '',
                      'menu_id'         => 'top_menu',
                      'echo'            => true,
                      'fallback_cb'     => false,
                      'before'          => '',
                      'after'           => '',
                      'link_before'     => '',
                      'link_after'      => '',
                      'items_wrap'      => '<ul id="%1$s">%3$s</ul>',
                      'depth'           => 1,
                      'walker'          => '');
                ?>
                <?php // wp_nav_menu( $menu_stuff ); ?>
                <!--<span class="tng ps-tng"></span>-->
                <div class="ps-infos">
                    <div class="ps-infos__where" hidden>Работаем по всей России и странам СНГ</div>
                    <?php if ( function_exists('dynamic_sidebar') )
		dynamic_sidebar('sidebar-mess_top'); ?>
                </div>
                <div id="contacts_ver2" class="ps_contact_ver">
                    <div class="item phone"><a href="tel:+74952564047" style="text-decoration:none"><b>8<span>&nbsp;</span>(495)<span>&nbsp;</span>256-<span>40</span>-47</b></a><!--<div><button class="feedback_form" title="Обратная связь">Обратная связь</button></div>-->
                    </div>
                    <div id="email" class="item"><a href="mailto:info@arenda-attrakcionov.ru" style="text-decoration:none"><b>info@arenda-attrakcionov.ru</b></a></div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="ps-navigation">
                <div class="ps-nav">
                    <?php $ps_above_menu_args = array(
                          'theme_location'  => 'ps_above_menu',
                          'container'       => false,
                          'menu_class'      => 'ps-menu',
                          'menu_id'         => '',
                          'echo'            => true,
                          'items_wrap'      => '<ul id="%1$s">%3$s</ul>',
                          'depth'           => 1
                      );
                    ?>
                    <?php wp_nav_menu( $ps_above_menu_args ); ?>
                </div>
            </div>
        </div>
        <div id="content">
            <div class="stuff">
				<?php
                $term = get_queried_object();
                if ( $term->term_id == 305 ) {
                ?>
					<div class="d-promo">
						<div class="d-promo__header">Антибактериальная обработка для мероприятий</div>
						<div class="d-promo__block">
							<div class="d-promo__left">
								<div class="d-promo__item d-promo_1" data-promo="1">
									<div class="d-promo__title">Безопасность</div>
									<div class="d-promo__text">Используем компоненты, относящиеся к высшему классу защиты. Разрешенные к применению в любых помещениях, включая, детские учреждения и предприятия общественного питания!</div>
								</div>
								<div class="d-promo__item d-promo_2" data-promo="2">
									<div class="d-promo__title">Мы ценим ваше время</div>
									<div class="d-promo__text">Все необходимое для проведения мероприятия, теперь можно заказать в одном месте. Это удобно и экономит ваше время.</div>
								</div>
							</div>
							<div class="d-promo__center">
								<div class="d-promo__clip">
									<div class="d-promo__clip-2">
										<div class="d-promo__video">
											<iframe id="player6" class="d-promo__inside" src="https://www.youtube.com/embed/nt-gW5bKRow?enablejsapi=1&origin=https://arenda-attrakcionov.ru" allowfullscreen></iframe> <!-- allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" -->
										</div>
										<div class="d-promo__img d-promo__img_1"></div>
										<div class="d-promo__img d-promo__img_2"></div>
										<div class="d-promo__img d-promo__img_3"></div>
										<div class="d-promo__img d-promo__img_4"></div>
									</div>
								</div>
							</div>
							<div class="d-promo__right">
								<div class="d-promo__item d-promo_3" data-promo="3">
									<div class="d-promo__title">Современное оборудование</div>
									<div class="d-promo__text">Специалисты нашей компании оснащены самым современным и надёжным оборудованием для санитарной защиты и обработки!</div>
								</div>
								<div class="d-promo__item d-promo_4" data-promo="4">
									<div class="d-promo__title">Гарантия качества 100%</div>
									<div class="d-promo__text">Работаем с учетом всех рекомендаций по дезинфекции и санитарной обработке утвержденные правительством Москвы и МО</div>
								</div>
							</div>
						</div>
					</div>
					<script>
						$(document).ready(function () {
							$('.d-promo__item').mouseenter(function(e) {
								$('.d-promo__img_' + $(this).data('promo')).addClass('active');
							});
							$('.d-promo__item').mouseleave(function(e) {
								$('.d-promo__img').removeClass('active');
							});
                        });
                          var tag = document.createElement('script');
                          tag.src = "https://www.youtube.com/iframe_api";
                          var firstScriptTag = document.getElementsByTagName('script')[0];
                          firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
                          var player;
                          function onYouTubeIframeAPIReady() {
                            player = new YT.Player('player6', {
                              height: '100%',
                              width: '100%',
                              videoId: 'nt-gW5bKRow',
                              playerVars: {'muted': 0, 'autoplay': 1, 'disablekb': 1 , 'controls': 0, 'iv_load_policy': 0, 'loop': 1, 'showinfo': 0, 'modestbranding': 1},
                              events: {
                                'onReady': onPlayerReady,
                                'onStateChange': onPlayerStateChange,
                              }
                            });
                          }
                          function onPlayerReady(event) {
                            player.mute();
                            event.target.playVideo();
                          }
                          function onPlayerStateChange(event) {
                            if (event.data === YT.PlayerState.ENDED) {
                                player.playVideo();
                            }
                          }
					</script>
				<?php } ?>
                <table class="content_table">
                    <tr>
                        <td class="left">
                            <div class="wrap-cat-menu">
                                <div class="sidebar_h">Виды аттракционов</div>
                                <?php
                                $menu_stuff = array(
                                      'theme_location'  => '',
                                      'menu'            => 'Меню в категории',
                                      'container'       => false,
                                      'container_class' => '',
                                      'container_id'    => '',
                                      'menu_class'      => '',
                                      'menu_id'         => 'cat_menu',
                                      'echo'            => true,
                                      'fallback_cb'     => false,
                                      'before'          => '',
                                      'after'           => '',
                                      'link_before'     => '',
                                      'link_after'      => '',
                                      'items_wrap'      => '<ul id="%1$s">%3$s</ul>',
                                      'depth'           => 1,
                                      /*'walker'          => new catListWalker()*/);
                                ?>
                                <?php wp_nav_menu( $menu_stuff ); ?>
                                <? echo do_shortcode('[holiday]'); ?>
                            </div>
                        </td>
                        <td class="right">