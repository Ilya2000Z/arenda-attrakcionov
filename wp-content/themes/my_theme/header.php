<!DOCTYPE html>
<html lang="ru-RU">
    <head>
		<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MXVR8MC');</script>
<!-- End Google Tag Manager -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=1170">
        <title><?php if(is_front_page()) wp_title('', true); ?></title>
        <meta name='yandex-verification' content='53fd104a94673a75' />
        <meta name='yandex-verification' content='7cead0a94bd9dd3b' />
        <meta name="facebook-domain-verification" content="46zqurw6y9fidvla9jlxhyeylvz532" />
        <link rel="icon" href="/wp-content/uploads/2015/01/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="/wp-content/uploads/2015/01/favicon.ico" type="image/x-icon">
        <link rel="preload" href='<?php echo get_template_directory_uri(); ?>/style.css?v3' as="style">
        <link rel="preload" href='//cdn.jsdelivr.net/jquery.slick/1.5.7/slick.css' as="style">
        <link rel="preload" href='<?php echo get_template_directory_uri(); ?>/css/slick-theme.css' as="style">
		<? wp_head(); ?>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css?v3" media="all">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/jquery.slick/1.5.7/slick.css"/>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slick-theme.css">
		<!--<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.9.1.min.js"></script>-->
        <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.5.7/slick.min.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.cookie.js"></script>
        <script>
        var IP_ADDR = '<?=$_SERVER['REMOTE_ADDR']?>';
        </script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/ingevents.4.0.8.min.js"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({
                'event':'ipEvent',
                'ipAddressYa' : '<?=$_SERVER["REMOTE_ADDR"]?>'
            });
        </script>
    <?php 
        if($_SERVER['REMOTE_ADDR'] == '82.112.186.139' && $_COOKIE['debug'] == '1') {
    ?>
    <style>
    </style>
    <script>
    $(document).ready(function () {
        $('#cat_list').slick({
            slidesToShow: 13,
            slidesToScroll: 1,
            infinite: false,
            dots: false,
            initialSlide: 0,
            centerMode: false,
            focusOnSelect: false,
            adaptiveHeight: true,
            variableWidth: true
        });
        let slideIndex = 0;
        $('#r-side').on('click', function() {
            slideIndex++;
            $('#cat_list').slick('slickAdd','<li><a>' + slideIndex + '</a></li>');
        });
    });
    </script>
    <?php 
        }
    ?>
    </head>
    <body <?php body_class( 'body-inside' ); ?>>
        <div id="header" class="alt" style="top: -22px;">
        <?php //get_template_part( 'banners' ); ?>
            <div class="stuff">
                <a href="/" id="logo"></a>
                <div class="search">
                        <?php get_search_form();
                        //wi_autosearch_suggest_form();
                        ?>
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
                    <div class="ps-infos__where"></div>
                    <?php if ( function_exists('dynamic_sidebar') )
		dynamic_sidebar('sidebar-mess_top'); ?>
                </div>
                <div id="contacts_ver2" class="ps_contact_ver">
                    <div class="item phone"><a href="tel:+74952564047" style="text-decoration:none"><b>8<span>&nbsp;</span>(495)<span>&nbsp;</span>256-<span>40</span>-47</b></a><!--<div><button class="feedback_form" title="Перезвоните мне">Перезвоните мне</button></div>-->
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
 add_action( 'init', 'my_deregister_heartbeat', 1 );
function my_deregister_heartbeat() {
 global $pagenow;
if ( 'post.php' != $pagenow && 'post-new.php' != $pagenow )
 wp_deregister_script('heartbeat');
 }