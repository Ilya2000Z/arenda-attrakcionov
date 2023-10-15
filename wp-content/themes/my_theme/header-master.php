<!DOCTYPE html>
<html>
	<head>
		<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MXVR8MC');</script>
<!-- End Google Tag Manager -->
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<title>Аренда аттракционов: <? $t = get_post_meta($post->ID, 'title', true); echo $t;?></title>
		<meta name="Description" content="<? echo get_post_meta($post->ID, 'description', true); ?>">
		<meta name="KeyWords" content="<? echo get_post_meta($post->ID, 'keywords', true); ?>">
		<meta name="facebook-domain-verification" content="46zqurw6y9fidvla9jlxhyeylvz532" />
		<link rel="icon" href="http://arenda-attrakcionov.ru/wp-content/uploads/2015/01/favicon.ico" type="image/x-icon">
		<link rel="shortcut icon" href="http://arenda-attrakcionov.ru/wp-content/uploads/2015/01/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style-master.css" media="all">
		<? wp_head(); ?>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
		<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-49487746-1', 'auto');
  ga('send', 'pageview');
</script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.cookie.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/ingevents.4.0.8.min.js"></script>
		<script>
		//alert('test');
		jQuery(document).ready(function(){
			/* Изменения №3 (добавил, считываем из куки состояние шапки (свернута или развернута)) */
			top_down=0;				
			if ($.cookie('state_head')) {
				state_head=$.cookie('state_head');
			} else {
				state_head='down'	/* Изменения №4 (добавил, шапка по умолчанию не видна) */			
			}
			//console.log('='+state_head);			
			if (state_head=='up') {
				//$('#header_button_down').click(); /* Изменения №4 (закомментировал, шапка должна быть развернута без анимации  */
				$('#header_button_up').attr('id','header_button_down'); /* теперь кнопка для снижения шапки */
				$('#header .stuff').css({'height':'63px'}); /* уменьшаем высоту шапки */
				$('#content').css({'margin-top':'63px'});   /* поднимаем контент */						
				$('#top_menu').css('top','0px');
				$('#top_menu li a').css('opacity','0').css('padding','30px 7px 8px 10px'); /* Изменения №3 (добавил, при свернутой шапки области ссылок перекликались) */
				$('#logo').css('top','3px');
				$('#email').css('display','none');
				// $('#contacts_ver2').css('top','13px').css('left','380px');
				$('.search').css('bottom','7px').css('left','618px').css('width','241px');
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
				$('#header_button_down').attr('id','header_button_up'); /* теперь кнопка для поднятия шапки */
				$('#header .stuff').css({'height':'130px'}); /* уменьшаем высоту шапки */
				$('#content').css({'margin-top':'160px'});   /* поднимаем контент */				
				$('#top_menu').css('top','23px');
				$('#top_menu li a').css('opacity','1').css('padding','67px 7px 8px 10px'); /* Изменения №3 (добавил, при свернутой шапки области ссылок перекликались) */
				$('#logo').css('top','22px');
				$('#email').css('display','block');
				// $('#contacts_ver2').css('top','33px').css('left','478px');
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
			/* Конец изменения №3 (добавил, считываем из куки состояние шапки (свернута или развернута)) */			
			/* Изменения №1 (добавил, подключаем куки jquery, для кнопки "назад в раздел" */
			$.cookie('category_source', window.location.href, {
				expires: 5,
				path: '/',
			});
			/* Конец изменения №1 (добавил, подключаем куки jquery, для кнопки "назад в раздел" */
			/* Изменения №2 (добавил для пролистывания при нажатие на "назад в раздел" */
			item_source=$.cookie('item_source');
			item_source='a[href="'+item_source+'"]';
			console.log(item_source);
			$('html, body').animate({ scrollTop: ($(item_source).offset()).top-150}, 'slow'); 
			$.cookie('item_source', null);	
			/* Конец изменения №2 (добавил для пролистывания при нажатие на "назад в раздел" */
		});
		</script>
        <!-- <script>
          (function(d) {
            var s = d.createElement('script');
            s.defer = true;
            s.src = 'https://multisearch.io/plugin/10742';
            if (d.head) d.head.appendChild(s);
          })(document);
        </script> -->
	</head>
	<body class="body-inside">
		<div id="header" class="alt">
			<div class="stuff">
				<a href="<?php bloginfo('url'); ?>" id="logo">&nbsp;</a>
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
        <!-- <span class="tng ps-tng"></span> -->
        <div class="ps-infos">
            <div class="ps-infos__where">Работаем по всей России и странам СНГ</div>
        </div>
        <div id="contacts_ver2" class="ps_contact_ver">
				<!-- Изменения №1 (закоментировал и добавил свой вариант) -->
<!--					<div class="item"><a href="tel:+74952265210" style="text-decoration:none">+7<span>&nbsp;</span>(495)<span>&nbsp;</span><b>226-<span>52</span>-10</b></a></div> -->
<!--					<div class="item"><a href="mailto:info@arenda-attrakcionov.ru" style="text-decoration:none">info@arenda-attrakcionov.ru</a></div> -->
					<div class="item phone"><a href="tel:+74952265210" style="text-decoration:none"><b>+7<span>&nbsp;</span>(495)<span>&nbsp;</span>256-<span>40</span>-47</b></a></div> 
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
				<table border="0" cellspacing="0" cellpadding="0" class="content_table">
					<tr>
						<td class="left" align="left" valign="top">
							<?php 
								$menu_stuff = array(
								  'theme_location'  => '', 
								  'menu'            => 'Меню слева', 
								  'container'       => false, 
								  'container_class' => '', 
								  'container_id'    => '',
								  'menu_class'      => '', 
								  'menu_id'         => 'left_menu',
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
							<?php 
								if ( !is_category( 'master' ) )
								{
									wp_nav_menu( $menu_stuff ); 
								}
							?>
						</td>
						<td class="right" align="left" valign="top">