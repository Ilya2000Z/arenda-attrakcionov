<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php if(is_front_page()) wp_title("", true); elseif(is_single()) echo get_post_meta($post->ID, 'title', true); else wp_title("", true);?></title>
    <?php
    if(is_single() && !is_front_page())
    {
    ?>
    <meta name="description" content="<? echo get_post_meta($post->ID, 'description', true); ?>">
    <?php } ?>
	<meta http-equiv="Cache-Control" content="no-cache">
    <meta name="viewport" content="width=device-width,shrink-to-fit=no,initial-scale=1,user-scalable=no"/>
    <meta name='yandex-verification' content='53fd104a94673a75' />
    <meta name='yandex-verification' content='7cead0a94bd9dd3b' />
    <?php wp_head() ?>
    <link rel="preload" href='<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css' as="style">
    <link rel="preload" href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css' as="style">
    <link rel="preload" href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css' as="style">
    <link rel="preload" href='//cdn.jsdelivr.net/gh/kenwheeler/slick@1.7.1/slick/slick.css' as="style">
    <link rel="preload" href='//cdn.jsdelivr.net/gh/kenwheeler/slick@1.7.1/slick/slick-theme.css' as="style">
    <link rel="preload" href='<?php echo plugins_url('/contact-form-7/includes/css/styles.css?ver=4.7') ?>' as="style">
    <link rel="preload" href='<?php echo get_template_directory_uri(); ?>/css/main.min.css?<?php //echo wp_rand( 100, 555 );?>' as="style">
    <link rel="preload" href='<?php echo get_template_directory_uri(); ?>/style.css?v7<?php //echo wp_rand( 100, 555 );?>' as="style">

    <link rel="icon" href="http://arenda-attrakcionov.ru/wp-content/uploads/2015/01/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="http://arenda-attrakcionov.ru/wp-content/uploads/2015/01/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href='<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.7.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.7.1/slick/slick-theme.css"/>
    <link rel="stylesheet" id="contact-form-7-css" href='<?php echo plugins_url('/contact-form-7/includes/css/styles.css?ver=4.7') ?>' type="text/css" media="all">
    <link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/css/main.min.css?<?php //echo wp_rand( 100, 555 );?>'>
    <link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/style.css?v7<?php //echo wp_rand( 100, 555 );?>'>
    <meta name="facebook-domain-verification" content="46zqurw6y9fidvla9jlxhyeylvz532" />
   <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-49487746-1', 'auto');
    ga('send', 'pageview');
    setTimeout(function(){ga('send', 'event', 'New Visitor', location.pathname);}, 15000);

    </script>

    <!-- <script>
        (function(d) {
            var s = d.createElement('script');
            s.defer = true;
            s.src = 'https://multisearch.io/plugin/10742';
            if (d.head) d.head.appendChild(s);
        })(document);
    </script> -->

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MXVR8MC');</script>
    <!-- End Google Tag Manager -->

  </head>
  <body>

        <div class="sidebar">
            <!-- Поиск аттракционов -->
            <!--
            <form action="/" method="get">
                <div class="sidebar-search">
                    <input type="search" name="s" placeholder="Поиск" value="<?php the_search_query(); ?>" />
                </div>
            </form>
            -->
			<!-- Мессенджеры -->
			<span class="sidebar-title">Задайте вопрос в мессенджер</span>
			<div class="text-center">
				<a href="https://wa.me/79264810673" target="_blank"><img src="data:image/png;base64,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" /></a>
				<?php /* ?>
                <a target="_blank" href="https://www.instagram.com/arenda_attrakcionov.ru/" class="icon" rel="noopener noreferrer"><svg version="1.1" baseProfile="tiny" id="_x3188_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 308.2 313.3" xml:space="preserve" width="48px" height="48px"> <ellipse fill-rule="evenodd" fill="#642282" cx="154.1" cy="156.6" rx="149.8" ry="152.4"></ellipse> <g> <path fill="none" d="M154.1,4.3C71.4,4.3,4.3,72.5,4.3,156.6C4.3,240.8,71.4,309,154.1,309c82.7,0,149.8-68.2,149.8-152.4 C303.9,72.5,236.8,4.3,154.1,4.3z M247.7,195.5c-0.4,9.1-1.8,16.2-4.4,23c-2.6,6.6-5.9,11.8-10.9,16.8c-5,5-10.1,8.4-16.7,10.9 c-6.7,2.6-13.8,4-22.9,4.4c-10,0.5-13.3,0.6-38.7,0.6c-25.2,0-28.6-0.1-38.7-0.6c-9.1-0.4-16.1-1.8-22.9-4.4 c-6.6-2.6-11.8-6-16.7-10.9c-5-5-8.3-10.2-10.9-16.8c-2.6-6.8-4-13.8-4.4-23c-0.5-10-0.6-13.3-0.6-38.9c0-25.5,0.1-28.9,0.6-38.9 c0.4-9.1,1.8-16.2,4.4-23C67.5,88.1,70.8,83,75.8,78c5-5,10.1-8.4,16.7-10.9c6.7-2.6,13.8-4,22.9-4.4c10-0.5,13.3-0.6,38.7-0.6 c25.2,0,28.6,0.1,38.7,0.6c9.1,0.4,16.1,1.8,22.9,4.4c6.6,2.6,11.7,5.9,16.7,10.9c5,5,8.3,10.2,10.9,16.8c2.6,6.8,4,13.8,4.4,23 c0.5,10,0.6,13.4,0.6,38.9C248.3,182.1,248.2,185.5,247.7,195.5z"></path> <path fill="none" d="M88.2,90.4c-3.3,3.3-5.3,6.4-7,10.7c-1.3,3.3-2.8,8.3-3.2,17.4c-0.4,10-0.5,13-0.5,38.1 c0,25.3,0.1,28.3,0.5,38.1c0.4,9.2,1.9,14.1,3.2,17.4c1.7,4.4,3.7,7.5,7,10.7c3.3,3.3,6.4,5.3,10.7,7c3.3,1.3,8.2,2.8,17.3,3.2 c9.8,0.5,12.7,0.5,37.9,0.5c25.2,0,28.1-0.1,37.9-0.5c9.1-0.4,14.1-1.9,17.3-3.2c4.4-1.7,7.5-3.7,10.7-7c3.3-3.3,5.3-6.4,7-10.7 c1.3-3.3,2.8-8.3,3.2-17.4c0.5-9.9,0.5-12.8,0.5-38.1c0-25.3-0.1-28.2-0.5-38.1c-0.4-9.2-1.9-14.1-3.2-17.4 c-1.7-4.4-3.7-7.5-7-10.7c-3.3-3.3-6.4-5.3-10.7-7c-3.3-1.3-8.3-2.8-17.3-3.2c-10-0.5-12.9-0.5-37.9-0.5c-25.2,0-28.1,0.1-37.9,0.5 c-9.1,0.4-14.1,1.9-17.3,3.2C94.5,85.1,91.4,87.1,88.2,90.4z M204.2,94.7c6.4,0,11.6,5.2,11.6,11.6c0,6.4-5.2,11.6-11.6,11.6 s-11.6-5.2-11.6-11.6C192.7,99.9,197.9,94.7,204.2,94.7z M154.1,107.9c26.7,0,48.5,21.8,48.5,48.7c0,26.9-21.7,48.7-48.5,48.7 c-26.7,0-48.5-21.8-48.5-48.7C105.6,129.8,127.4,107.9,154.1,107.9z"></path> <path fill="none" d="M154.1,187.8c17.1,0,31-14,31-31.2c0-17.2-13.9-31.2-31-31.2c-17.1,0-31,14-31,31.2 C123.1,173.8,137,187.8,154.1,187.8z"></path> <path fill="#FFFFFF" d="M204.2,117.3c6.1,0,11-5,11-11c0-6.1-4.9-11-11-11c-6.1,0-11,4.9-11,11 C193.3,112.4,198.2,117.3,204.2,117.3z"></path> <path fill="#FFFFFF" d="M242.8,95c-2.5-6.5-5.9-11.7-10.8-16.6c-4.9-4.9-10-8.3-16.5-10.8c-6.7-2.6-13.7-4-22.7-4.4 c-10.1-0.5-13.5-0.6-38.7-0.6c-25.4,0-28.7,0.1-38.7,0.6c-9,0.4-16,1.8-22.7,4.4c-6.5,2.5-11.6,5.9-16.5,10.8 C71.3,83.3,68,88.4,65.4,95c-2.6,6.7-3.9,13.7-4.3,22.8c-0.5,10-0.6,13.3-0.6,38.9c0,25.5,0.1,28.9,0.6,38.9 c0.4,9.1,1.7,16.1,4.3,22.8c2.5,6.6,5.9,11.7,10.8,16.6c4.9,4.9,10,8.3,16.5,10.8c6.7,2.6,13.7,3.9,22.7,4.4 c10.1,0.5,13.5,0.6,38.7,0.6c25.4,0,28.7-0.1,38.7-0.6c9-0.4,16-1.8,22.7-4.4c6.5-2.6,11.6-5.9,16.5-10.8c4.9-4.9,8.2-10,10.8-16.6 c2.6-6.7,3.9-13.7,4.3-22.8c0.5-10,0.6-13.4,0.6-38.9c0-25.5-0.1-28.8-0.6-38.9C246.7,108.7,245.4,101.7,242.8,95z M230.8,194.8 c-0.4,9.2-2,14.2-3.2,17.6c-1.7,4.4-3.8,7.6-7.1,10.9c-3.3,3.3-6.5,5.4-10.9,7.1c-3.3,1.3-8.3,2.8-17.5,3.3 c-9.8,0.5-12.7,0.5-37.9,0.5c-25.2,0-28.1-0.1-37.9-0.5c-9.2-0.4-14.2-2-17.5-3.3c-4.4-1.7-7.6-3.8-10.9-7.1 c-3.3-3.3-5.4-6.5-7.1-10.9c-1.3-3.3-2.8-8.3-3.2-17.6c-0.5-9.8-0.5-12.8-0.5-38.1c0-25.1,0.1-28.1,0.5-38.1 c0.4-9.2,2-14.2,3.2-17.6c1.7-4.4,3.8-7.6,7.1-10.9c3.3-3.3,6.5-5.4,10.9-7.1c3.3-1.3,8.3-2.8,17.5-3.3C126,79.1,129,79,154.1,79 c25,0,28,0.1,37.9,0.5c9.2,0.4,14.2,2,17.5,3.3c4.4,1.7,7.6,3.8,10.9,7.1c3.3,3.3,5.4,6.5,7.1,10.9c1.3,3.3,2.8,8.3,3.2,17.6 c0.5,9.9,0.5,12.8,0.5,38.1C231.4,181.9,231.3,184.9,230.8,194.8z"></path> <path fill="#FFFFFF" d="M154.1,204.8c26.4,0,47.9-21.6,47.9-48.1c0-26.5-21.5-48.1-47.9-48.1c-26.4,0-47.9,21.6-47.9,48.1 C106.2,183.2,127.7,204.8,154.1,204.8z M154.1,124.9c17.4,0,31.6,14.2,31.6,31.7c0,17.5-14.2,31.7-31.6,31.7 c-17.4,0-31.6-14.2-31.6-31.7C122.6,139.1,136.7,124.9,154.1,124.9z"></path> <path fill="#FFFFFF" d="M154.1,205.3c26.7,0,48.5-21.8,48.5-48.7c0-26.9-21.7-48.7-48.5-48.7c-26.7,0-48.5,21.8-48.5,48.7 C105.6,183.5,127.4,205.3,154.1,205.3z M154.1,108.5c26.4,0,47.9,21.6,47.9,48.1c0,26.5-21.5,48.1-47.9,48.1 c-26.4,0-47.9-21.6-47.9-48.1C106.2,130.1,127.7,108.5,154.1,108.5z"></path> <path fill="#FFFFFF" d="M204.2,117.9c6.4,0,11.6-5.2,11.6-11.6c0-6.4-5.2-11.6-11.6-11.6s-11.6,5.2-11.6,11.6 C192.7,112.7,197.9,117.9,204.2,117.9z M204.2,95.3c6.1,0,11,4.9,11,11c0,6.1-4.9,11-11,11c-6.1,0-11-5-11-11 C193.3,100.2,198.2,95.3,204.2,95.3z"></path> <path fill="#FFFFFF" d="M243.3,94.8c-2.6-6.6-5.9-11.8-10.9-16.8c-5-5-10.1-8.4-16.7-10.9c-6.8-2.6-13.8-4-22.9-4.4 c-10.1-0.5-13.5-0.6-38.7-0.6c-25.4,0-28.7,0.1-38.7,0.6c-9.1,0.4-16.2,1.8-22.9,4.4C86,69.6,80.8,73,75.8,78 c-5,5-8.3,10.2-10.9,16.8c-2.6,6.8-4,13.8-4.4,23c-0.5,10-0.6,13.3-0.6,38.9c0,25.5,0.1,28.9,0.6,38.9c0.4,9.1,1.8,16.2,4.4,23 c2.6,6.6,5.9,11.8,10.9,16.8c5,5,10.1,8.4,16.7,10.9c6.7,2.6,13.8,4,22.9,4.4c10.1,0.5,13.5,0.6,38.7,0.6c25.4,0,28.7-0.1,38.7-0.6 c9.1-0.4,16.2-1.8,22.9-4.4c6.6-2.6,11.8-6,16.7-10.9c5-5,8.3-10.2,10.9-16.8c2.6-6.8,4-13.9,4.4-23c0.5-10,0.6-13.4,0.6-38.9 c0-25.5-0.1-28.9-0.6-38.9C247.3,108.6,245.9,101.5,243.3,94.8z M247.7,156.6c0,25.5-0.1,28.8-0.6,38.9c-0.4,9.1-1.7,16.1-4.3,22.8 c-2.5,6.6-5.9,11.7-10.8,16.6c-4.9,4.9-10,8.3-16.5,10.8c-6.7,2.6-13.7,3.9-22.7,4.4c-10,0.5-13.3,0.6-38.7,0.6 c-25.2,0-28.6-0.1-38.7-0.6c-9-0.4-16-1.8-22.7-4.4c-6.5-2.6-11.6-5.9-16.5-10.8c-4.9-4.9-8.2-10-10.8-16.6 c-2.6-6.7-3.9-13.7-4.3-22.8c-0.5-10-0.6-13.3-0.6-38.9c0-25.5,0.1-28.9,0.6-38.9c0.4-9.1,1.7-16.1,4.3-22.8 c2.5-6.5,5.8-11.7,10.8-16.6c4.9-4.9,10-8.3,16.5-10.8c6.7-2.6,13.7-3.9,22.7-4.4c10-0.5,13.3-0.6,38.7-0.6 c25.2,0,28.6,0.1,38.7,0.6c9,0.4,16,1.8,22.7,4.4c6.5,2.5,11.6,5.9,16.5,10.8c4.9,4.9,8.2,10.1,10.8,16.6 c2.6,6.7,3.9,13.7,4.3,22.8C247.6,127.8,247.7,131.1,247.7,156.6z"></path> <path fill="#FFFFFF" d="M227.6,100.9c-1.7-4.5-3.8-7.6-7.1-10.9c-3.3-3.3-6.5-5.4-10.9-7.1c-3.3-1.3-8.4-2.8-17.5-3.3 c-10-0.5-13-0.5-37.9-0.5c-25.2,0-28.1,0.1-37.9,0.5c-9.2,0.4-14.2,2-17.5,3.3c-4.4,1.7-7.6,3.8-10.9,7.1 c-3.3,3.3-5.4,6.5-7.1,10.9c-1.3,3.4-2.8,8.4-3.2,17.6c-0.5,10-0.5,13-0.5,38.1c0,25.3,0.1,28.3,0.5,38.1c0.4,9.3,2,14.3,3.2,17.6 c1.7,4.4,3.8,7.6,7.1,10.9c3.3,3.3,6.5,5.4,10.9,7.1c3.3,1.3,8.3,2.8,17.5,3.3c9.8,0.5,12.7,0.5,37.9,0.5c25.2,0,28.2-0.1,37.9-0.5 c9.2-0.4,14.2-2,17.5-3.3c4.4-1.7,7.6-3.8,10.9-7.1c3.3-3.3,5.4-6.5,7.1-10.9c1.3-3.4,2.8-8.4,3.2-17.6c0.5-9.9,0.5-12.8,0.5-38.1 c0-25.3-0.1-28.3-0.5-38.1C230.4,109.3,228.9,104.2,227.6,100.9z M154.1,79.6c25,0,28,0.1,37.9,0.5c9.1,0.4,14,1.9,17.3,3.2 c4.3,1.7,7.4,3.7,10.7,7c3.2,3.3,5.3,6.4,7,10.7c1.3,3.3,2.8,8.2,3.2,17.4c0.5,9.9,0.5,12.8,0.5,38.1c0,25.3-0.1,28.2-0.5,38.1 c-0.4,9.1-1.9,14.1-3.2,17.4c-1.7,4.4-3.7,7.5-7,10.7c-3.2,3.3-6.3,5.3-10.7,7c-3.3,1.3-8.2,2.8-17.3,3.2 c-9.8,0.5-12.7,0.5-37.9,0.5c-25.2,0-28.1-0.1-37.9-0.5c-9.1-0.4-14.1-1.9-17.3-3.2c-4.3-1.7-7.4-3.7-10.7-7 c-3.3-3.3-5.3-6.4-7-10.7c-1.3-3.3-2.8-8.2-3.2-17.4c-0.4-9.8-0.5-12.8-0.5-38.1c0-25.1,0.1-28.1,0.5-38.1 c0.4-9.1,1.9-14.1,3.2-17.4c1.7-4.4,3.7-7.5,7-10.7c3.3-3.3,6.4-5.3,10.7-7c3.3-1.3,8.2-2.8,17.3-3.2C126,79.7,129,79.6,154.1,79.6 z"></path> <path fill="#FFFFFF" d="M154.1,188.4c17.4,0,31.6-14.2,31.6-31.7c0-17.5-14.2-31.7-31.6-31.7c-17.4,0-31.6,14.2-31.6,31.7 C122.6,174.1,136.7,188.4,154.1,188.4z M154.1,125.5c17.1,0,31,14,31,31.2c0,17.2-13.9,31.2-31,31.2c-17.1,0-31-14-31-31.2 C123.1,139.5,137,125.5,154.1,125.5z"></path> </g> <ellipse fill-rule="evenodd" fill="none" stroke="#642282" stroke-width="8.5039" stroke-miterlimit="22.9256" cx="154.1" cy="156.6" rx="149.8" ry="152.4"></ellipse> </svg> </a>
                <a target="_blank" href="https://www.facebook.com/arendaattrakcionov.ru/" rel="noopener noreferrer"> <svg version="1.1" baseProfile="tiny" id="_x31_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="48px" height="48px" viewBox="0 0 357.8 363.8" xml:space="preserve"> <g>  <ellipse fill-rule="evenodd" fill="#0071B9" stroke="#0071B9" stroke-width="8.5039" stroke-miterlimit="22.9256" cx="178.9" cy="181.9" rx="174.5" ry="177.5"></ellipse> <path fill-rule="evenodd" fill="#FFFFFF" d="M147.2,137.7c-4.8,2.3-19.6-0.9-24.5,1.4c-0.9,3.8-0.4,33.7-0.4,40.1 c0,1,0.2,1,0.4,1.8l23,0.4c1.7,0.3,1.5,1.1,1.5,3.2c-0.4,27.9,0,58.2,0,86.4c0,4.5-0.4,29,0.4,32.9c0.3,1.5,1.4,1.8,3.1,1.8h0.1 h42.8h0.1c1.4,0,2.6-0.3,3.5-0.7c1.6-3.3,0.7-24.5,0.7-30.4v-85.3c0-3,0.2-5.1,0.4-7.6l8.8-0.6c2.7-0.4,19.4-0.2,22.8-0.6 c1.9-0.2,2.1-0.2,2.4-2.3c0.9-5.6,1.2-11.2,1.6-17.1c0.5-7.1,1.4-10.7,1.4-19.2c0-1.2-0.3-1.4-0.4-2.5c-1.2-0.1-2.9-0.6-4-0.7 c-1.6-0.2-3.1-0.1-4.4-0.3c-5.7-0.8-22.3,0.9-28.3-0.5c-0.9-3.9-0.4-22,0-27.1c0.6-8.2,5.3-8.5,11.1-8.7c1.8,0,1.8-0.3,3.6-0.4 l19.8,0c1.5,0,2.9,0.4,2.9-1.1V59.6c0-1.3-1.6-1.4-2.9-1.4c-16.4,0-43.4-1.2-57.3,3.9c-7,2.6-11,5.2-15.9,10.1 c-4.7,4.8-7.5,9.5-9.4,16.6c-0.7,2.4-1.3,4.6-1.6,7.1c-1.1,10.2-0.8,11-1.1,20.6c-0.1,1.8-0.4,2-0.4,3.9 C147.1,126.1,147.2,131.9,147.2,137.7z"></path> </g> </svg>  </a>
                <?php */ ?>
			</div>
            <!-- Категории аттракционов -->
            <span class="sidebar-title">каталог аттракционов</span>
            <?php
            $menu_stuff = array(
                  'theme_location'  => '',
                  'menu'            => 'Мобильное',
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
                  'walker'          => ''); //new catListWalker());
            ?>
            <?php wp_nav_menu( $menu_stuff ); ?>
              
            <? echo do_shortcode('[holiday]'); ?>

        </div>

    <div class="custom-container">

        <div class="main-content">
            <nav class="custom-navbar">
                <div class="items" id="categories">
                    <button type="button" class="custom-navbar-toggle">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <i class="fa fa-2x fa-times" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="items search-click" id="search"></div>
                <div class="items" id="logo"><a href="/"><div><span>Аренда Аттракционов</span></div></a></div>
                <div id="call"><a href="tel:+74952564047" target="_blank"></a></div>
                <div class="items" id="deliveryandpayment"><a href="<?=get_permalink( 6928, false );?>"></a></div>
            </nav>

                    <?php
                    $term = get_queried_object();
                    if ( $term->term_id == 305 ) {

                    ?>
					<style>
						/*** PROMO ***/
						.d-promo *, .d-promo *:before, .d-promo *:after {
							-webkit-box-sizing: border-box;
							-moz-box-sizing: border-box;
							box-sizing: border-box;
							color: #676767;
						}

						.d-promo {
							margin-bottom: 30px;
						}

						.d-promo__header {
							font-size: 22px;
							font-weight: 700;
							margin-bottom: 30px;
							text-align: center;
						}

						.d-promo__block {
							padding: 0 20px;
						}

						.d-promo__item {
							-webkit-border-radius	: 24px;
							-moz-border-radius		: 24px;
							border-radius			: 24px;
							background-color: #fff;
							padding: 20px 15px 20px 15px;
							position: relative;
							background-repeat: no-repeat;
							padding-left: 110px;
							background-position: left 15px top 20px;
							cursor: pointer;
						}

						.d-promo__item + .d-promo__item {
							margin-top: 20px;
						}

						.d-promo_1 { background-image: url('wp-content/themes/my_theme/images/d_promo_1.png'); }
						.d-promo_2 { background-image: url('wp-content/themes/my_theme/images/d_promo_2.png'); }
						.d-promo_3 { background-image: url('wp-content/themes/my_theme/images/d_promo_3.png'); }
						.d-promo_4 { background-image: url('wp-content/themes/my_theme/images/d_promo_4.png'); }

						.d-promo_1:hover { background-image: url('wp-content/themes/my_theme/images/d_promo_1_h.png'); }
						.d-promo_2:hover { background-image: url('wp-content/themes/my_theme/images/d_promo_2_h.png'); }
						.d-promo_3:hover { background-image: url('wp-content/themes/my_theme/images/d_promo_3_h.png'); }
						.d-promo_4:hover { background-image: url('wp-content/themes/my_theme/images/d_promo_4_h.png'); }

						.d-promo__title {
							font-weight: 700;
							text-transform: uppercase;
							font-size: 18px;
						}

						.d-promo__item:hover .d-promo__title {
							color: #fe9f4b;
						}

						.d-promo__text {
							margin-top: 20px;
							font-size: 16px;
						}

                        .d-promo__inside {
                            height: 360px;
                        }

  						.d-promo__video {
							background: #fff url('wp-content/themes/my_theme/images/d_promo_center_0.jpg') center center no-repeat;
							background-size: cover;
							width: 100%;
                            height: 360px;
						}

						.d-promo__clip {
							width: 100%;
							height: 100%;
							background-color: #fff;
							padding: 6px;
                            margin-bottom: 20px;
						}

					</style>

					<div class="d-promo">
						<div class="d-promo__header">Антибактериальная обработка для мероприятий</div>
                        <div class="d-promo__clip d-promo__block">
                            <div class="d-promo__video">
                                <iframe class="d-promo__inside" src="https://www.youtube.com/embed/nt-gW5bKRow" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
						<div class="d-promo__block">
            				<div class="d-promo__item d-promo_1" data-promo="1">
            					<div class="d-promo__title">Безопасность</div>
            					<div class="d-promo__text">Используем компоненты, относящиеся к высшему классу защиты. Разрешенные к применению в любых помещениях, включая, детские учреждения и предприятия общественного питания!</div>
            				</div>
            				<div class="d-promo__item d-promo_2" data-promo="2">
            					<div class="d-promo__title">Мы ценим ваше время</div>
            					<div class="d-promo__text">Все необходимое для проведения мероприятия, теперь можно заказать в одном месте. Это удобно и экономит ваше время.</div>
            				</div>
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
				<?php } ?>