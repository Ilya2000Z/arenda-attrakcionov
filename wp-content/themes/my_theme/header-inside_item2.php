<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
		<?/*<meta name="Description" content="<? echo get_post_meta($post->ID, 'description', true); ?>"> */ ?>
		<meta name="KeyWords" content="<? echo get_post_meta($post->ID, 'keywords', true); ?>">
		<link rel="icon" href="http://arenda-attrakcionov.ru/wp-content/uploads/2015/01/favicon.ico" type="image/x-icon">
		<link rel="shortcut icon" href="http://arenda-attrakcionov.ru/wp-content/uploads/2015/01/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css" media="all">
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
		jQuery(document).ready(function(){		
			/* Изменения №3 (добавил, считываем из куки состояние шапки (свернута или развернута)) */
			top_down=0;				
			if ($.cookie('state_head')) {
				state_head=$.cookie('state_head');
			} else {
				state_head='down'	/* Изменения №4 (добавил, шапка по умолчанию не видна) */			
			}			
			console.log('='+state_head);			
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
		});									
		</script>
	</head>
	<body>
		<div id="overlay"></div>
		<table id="popup" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td align="center" valign="middle"><img src="" alt=""></td>
			</tr>
		</table>
		<div id="header" class="alt">
			<div class="stuff">
				<a href="/" id="logo"></a>
				<form action="/" method="post" id="search">
					<input type="text" name="s" value="Поиск" onfocus="if($(this).val()=='Поиск') $(this).val('');" onblur="if($(this).val()=='') $(this).val('Поиск');">
				</form>
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
        <div class="ps-infos">
            <div class="ps-infos__where">Работаем по всей России и странам СНГ</div>
            <div class="ps-infos__schedule">Пн.-Пт. С 9.00 до 20.00 (МСК)</div>
        </div>
        <div id="contacts_ver2" class="ps_contact_ver">
				<!-- Изменения №1 (закоментировал и добавил свой вариант) -->
<!--					<div class="item"><a href="tel:+74952265210" style="text-decoration:none">+7<span>&nbsp;</span>(495)<span>&nbsp;</span><b>226-<span>52</span>-10</b></a></div> -->
<!--					<div class="item"><a href="mailto:info@arenda-attrakcionov.ru" style="text-decoration:none">info@arenda-attrakcionov.ru</a></div> -->
					<div class="item phone"><a href="tel:+74952265210" style="text-decoration:none"><b>8<span>&nbsp;</span>(495)<span>&nbsp;</span>256-<span>40</span>-47</b></a><br><a href="tel:+78007754167" style="text-decoration:none"><b>8<span>&nbsp;</span>(800)<span>&nbsp;</span>775-<span>41</span>-67</b></a><br><span style="font-size: 12px; font-family:arial;">по России звонок бесплатный</span></div>
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
				<?php $menu_stuff = array(
					  'theme_location'  => '', 
					  'menu'            => 'Меню слева', 
					  'container'       => false, 
					  'container_class' => '', 
					  'container_id'    => '',
					  'menu_class'      => '', 
					  'menu_id'         => 'top_menu2',
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
				<?php wp_nav_menu( $menu_stuff ); ?>
				<div class="clear"></div>
				<table border="0" cellspacing="0" cellpadding="0" class="item_table">
					<tr>
						<td class="left2" align="left" valign="top">
							<div id="pics">
								<div class="big_one">
									<?
										echo get_the_post_thumbnail(null, 'full');
									?>
								</div>
								<ul class="previews">
								<?
									$previews = explode("|", types_render_field("photo", array("raw" => "true", "output" => "", "show_name" => "false", "url" => "false", "separator" => "|")));
									for($i = 0; $i < 5; $i++)
									{
										if($previews[$i] != "") echo "<li><img src=\"".$previews[$i]."\" alt=\"\"></li>";
									}
								?>
								</ul>
							</div>
						</td>
						<td class="right2" align="left" valign="top">
							<? //if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
							<?
								$cat = get_the_category($post->ID);
								//print_r($cat);
								//echo "<div class=\"go_back\"><a href=\"/attrakciony/".$cat[0]->category_nicename."/\">Все аттракционы</a></div>";
								echo "<div class=\"go_back\"><a href=\"/programs/\">Все программы</a></div>";
							?>
							<? echo "<h1 class=\"alt\">".get_the_title()."</h1>"; ?>
							<table class="item_stuff" border="0" cellspacing="0" cellpadding="0" width="100%">
								<tr>
									<td align="center" valign="middle" colspan="2" class="banner_block">
										<?
											$d = explode("###", category_description($cat[0]->cat_ID));
											if($d[1]=='') echo ""; else echo $d[0];
										?>
									</td>
								</tr>
								<tr>
									<td align="left" valign="top" width="50%">
										<div class="l">
											<div class="time">
												<?
													echo types_render_field("time", array("raw" => "true", "output" => "", "show_name" => "true", "url" => "false"));
												?>
											</div>
											<div class="price" style="text-align: center; margin-right: 0px;">
												<?
													echo types_render_field("price", array("raw" => "true", "output" => "", "show_name" => "true", "url" => "false"));
												?>
											</div>
											<div>&nbsp;</div>
											<div>&nbsp;</div>
											<div class="number">+7&nbsp;(495)&nbsp;<b><span>226-5</span>2<span>-10</span></b></div>
											<div class="call"><strong>Звоните!</strong></div>
											<div class="bg"></div>
										</div>
									</td>
									<td align="left" valign="top" width="50%">
										<div class="r">
											<?
												$s = types_render_field("services", array("raw" => "true", "output" => "", "show_name" => "true", "url" => "false", "separator" => "|"));
												if($s != "")
												{
													echo "<div>Дополнительные услуги:</div>";
													echo "<ul class=\"services\">";
													$services = explode("|", $s);
													foreach($services as $key=>$value)
													{
														echo "<li>".$value."</li>";
													}
													echo "</ul>";
												}
												echo "<div>Похожие аттракционы:</div>";
												echo "<ul>";
													$cat = get_the_category($post->ID);
													$exclude_ids = array($post->ID);
													query_posts( array('cat' => $cat[0]->cat_ID, 'showposts' => '3', 'post__not_in' => $exclude_ids, 'orderby' => 'rand') );
													while(have_posts())
													{
														the_post();
														get_template_part('loop', 'single_just_captions');
													}
												echo "</ul>";
											?>
										</div>
									</td>
								</tr>
							</table>