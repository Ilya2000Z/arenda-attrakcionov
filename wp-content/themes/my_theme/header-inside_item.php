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
    <meta name="facebook-domain-verification" content="46zqurw6y9fidvla9jlxhyeylvz532" />
    <title><? $t = get_post_meta($post->ID, 'title', true);
        echo $t; ?></title>
    <link rel="shortcut icon" href="/wp-content/uploads/2015/01/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.min.css" media="all">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.7/slick.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tipso/1.0.8/tipso.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css?v3" media="all">
    <? wp_head(); ?>
    <script>var IP_ADDR = '<?=$_SERVER['REMOTE_ADDR']?>';</script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.5.7/slick.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.fancybox.css" media="all">
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.fancybox.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tipso/1.0.8/tipso.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/ingevents.4.0.8.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            top_down=0;
            if ($.cookie('state_head')) {
                state_head=$.cookie('state_head');
            } else {
                state_head='down';
            }
            if (state_head=='up') {
                $('#header_button_up').attr('id','header_button_down');
                $('#header .stuff').css({'height':'63px'});
                $('#content').css({'margin-top':'63px'});
                $('#top_menu').css('top','0px');
                $('#top_menu li a span').css('opacity','0');
                $('#logo').css('top','3px');
                $('#email').css('display','none');
                $('#top_menu li').css('height','56px');
                $(window).scroll();
                $('.body-inside #header').css('display','block');
            }
            if (state_head=='down') {
                top_down=67;
                $('#header_button_down').attr('id','header_button_up');
                $('#header .stuff').css({'height':'130px'});
                $('#content').css({'margin-top':'160px'});
                $('#top_menu').css('top','23px');
                $('#top_menu li a span').css('opacity','1');
                $('#logo').css('top','22px');
                $('#email').css('display','block');
                $('#top_menu li').css('height','85px');
                $(window).scroll();
                $('.body-inside #header').css('display','block');
            }
            $(".fancybox").fancybox({
                openEffect: 'none',
                closeEffect: 'none',
                afterLoad: function () {
                    this.content = this.content.html();
                }
            });
            $("#video_galery").click(function(event){
                $('#popup').fadeOut(200, function () {
                    $('#overlay').fadeOut(200);
                });
                $('.gallery').css('opacity','0').css('z-index','-1');
                $(".fancybox").click();
            });
            $('.tooltip').tipso({useTitle: true, offsetY:0});
        });
    </script>
    <?php
    $vido = types_render_field("video", array("raw" => "true", "output" => "", "show_name" => "false"));
    function show_video_lightbox($el)
    {
        if(!empty($el)) {
            ?>
            <div id="video-popup" style="display: none; width: 600px">
                <?php
                echo $el;
                ?>
            </div>
            <a href="#video-popup" class="fancybox"><img
                    src="<?php echo get_template_directory_uri(); ?>/images/video_icon.png" alt="Посмотреть видео"
                    title="Посмотреть видео"/></a>
        <?php
        }
    }
    ?>
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
    <!-- <script>
        (function(d) {
            var s = d.createElement('script');
            s.defer = true;
            s.src = 'https://multisearch.io/plugin/10742';
            if (d.head) d.head.appendChild(s);
        })(document);
    </script> -->
    <script>
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
            'event':'ipEvent',
            'ipAddressYa' : '<?=$_SERVER["REMOTE_ADDR"]?>'
        });
    </script>
    <?php
        $inlineStyle = get_post_meta($post->ID, 'wpcf-inline-style', true);
        if(!empty($inlineStyle)) {
            echo $inlineStyle;
        }
    ?>
</head>
<body <?php body_class( 'body-inside' ); ?>>
<div id="overlay">&nbsp;</div>
<?php
if (!empty($vido)) {
?>
<table id="popup" style="border:none;padding:0;margin:0;">
    <tr>
        <td align="center" style="vertical-align:middle;"><img src="" alt=""></td>
    </tr>
</table>
<?php } ?>
<?php
$text_photo_data = types_render_field("text_photo", array(
                                "raw" => "true",
                                "output" => "",
                                "show_name" => "true",
                                "url" => "false",
                                "separator" => "|"
                            ));
$text_photo_array = explode("|",$text_photo_data);
?>
<div class="gallery" style="opacity: 0;">
    <div id="wrapper">
        <?php
        $el = types_render_field("video", array("raw" => "true", "output" => "", "show_name" => "false"));
        if (!empty($el)) { ?>
        <a id="video_galery"></a>
        <?php } ?>
        <a id="close_galery"></a>
        <div id="images">
            <?
            $previews = explode("|", types_render_field("photo", array("raw" => "true", "output" => "", "show_name" => "false", "url" => "false", "separator" => "|")));
            for ($i = 0; $i < count($previews); $i++) {
                if ($previews[$i] != "") { $previews[$i] = str_replace('http://', 'https://', $previews[$i]); ?>
                    <img class="grunge" src="<? echo $previews[$i]; ?>" alt="<?php echo (!is_null($text_photo_array[$i])) ? $text_photo_array[$i] : ''; ?>" width="400" height="400" />
                <?php
                }
            }
            ?>
        </div>
        <?php
        $i=0;
        foreach ($text_photo_array as $text_photo) {
            $i++;
            echo
            "<div style=\"display:none; font-size:18px; color:#746868;\" data-number_text_photo=".$i.">"
            .$text_photo.
            "</div>";
        };?>
        <div style="font-size:18px; color:#746868;">Фото <span id="text_number" onclick="$('#thumbs .selected').attr('data-number')">3</span> из <?php echo count($previews); ?></div>
     	<div class="gal_container">
            <div id="thumbs">
                <?php
                $previews = explode("|", types_render_field("photo", array("raw" => "true", "output" => "", "show_name" => "false", "url" => "false", "separator" => "|")));
                for ($i = 0; $i < count($previews); $i++) {
                    if ($previews[$i] != "") { $previews[$i] = str_replace('http://', 'https://', $previews[$i]); ?>
                        <img data-number="<? echo $i+1 ?>" src="<? echo $previews[$i]; ?>" alt="<?php echo (!is_null($text_photo_array[$i])) ? $text_photo_array[$i] : ''; ?>" width="70" height="70" />
                <?php
                    }
                }
                ?>
            </div>
        </div>
    <a id="prev2" href="#"></a>
    <a id="next2" href="#"></a>
    </div>
</div>
        <?php
        $previews = explode("|", types_render_field("photo", array("raw" => "true", "output" => "", "show_name" => "false", "url" => "false", "separator" => "|")));
        ?>
        <script src="/wp-content/themes/my_theme/js/jquery.carouFredSel-6.0.4-packed.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function() {
                $('#thumbs').carouFredSel({
                    circular: true,
                    infinite: true,
                    synchronise: ['#images', false, true],
                    auto: false,
                    width: 600,
                    items: {
                        visible: 5,
                        start: 0
                    },
                    scroll: {
                        onBefore: function( data ) {
                            data.items.old.eq(2).removeClass('selected');
                            data.items.visible.eq(2).addClass('selected');
                        }
                    },
                    prev: '#prev2',
                    next: '#next2'
                });
                $('#images').carouFredSel({
                    auto: false,
                    items: {
                        visible: 1,
                        <?php if(count($previews)>=3) { ?>
                            start: 2
                        <?php } ?>
                        <?php if(count($previews)==2) { ?>
                            start: 1
                        <?php } ?>
                        <?php if(count($previews)==1) { ?>
                            start: 0
                        <?php } ?>
                    },
                    scroll: {
                        fx: 'fade',
                         duration: 300
                    }
                });
                $('#next2, #prev2').click(function(event){
                     $('#wrapper span#text_number').text($('#thumbs .selected').attr('data-number'));
                     number_text_photo='center[data-number_text_photo='+$('#thumbs .selected').attr('data-number')+']';
                     $('center[data-number_text_photo]').css('display','none');
                     $(number_text_photo).fadeIn();
                });
                $('#thumbs img').click(function() {
                    if (<?php echo count($previews) ?>>5) {
                        $('#thumbs').trigger( 'slideTo', [this, -2] );
                    } else {
                        $('#images img:nth-child(1)').attr('src',$(this).attr('src'));
                        $('#thumbs img').removeClass('selected');
                        $(this).addClass('selected');
                    }
                    $('#wrapper span').text($('#thumbs .selected').attr('data-number'));
                    number_text_photo='center[data-number_text_photo='+$('#thumbs .selected').attr('data-number')+']';
                    $('center[data-number_text_photo]').css('display','none');
                    $(number_text_photo).fadeIn();
                });
                <?php if(count($previews)>=3) { ?>
                    $('#thumbs img:eq(2)').addClass('selected');
                    $('center[data-number_text_photo]').css('display','none');
                    $('center[data-number_text_photo=3]').fadeIn();
                <?php } ?>
                <?php if(count($previews)==2) { ?>
                    $('#thumbs img:eq(1)').addClass('selected');
                    $('center[data-number_text_photo]').css('display','none');
                    $('center[data-number_text_photo=2]').fadeIn();
                <?php } ?>
                <?php if(count($previews)==1) { ?>
                    $('#thumbs img:eq(0)').addClass('selected');
                    $('center[data-number_text_photo]').css('display','none');
                    $('center[data-number_text_photo=1]').fadeIn();
                <?php } ?>
                $('#text_number').text($('#thumbs .selected').attr('data-number'));
            });
        </script>
<div id="header" class="alt" style="top: -22px;">
    <?php //get_template_part( 'banners' ); ?>
    <div class="stuff">
        <a href="/" id="logo"></a>
        <div class="search">
            <?php get_search_form(); ?>
        </div>
        <?php $menu_stuff = array(
            'theme_location' => '',
            'menu' => 'Верхнее меню',
            'container' => false,
            'container_class' => '',
            'container_id' => '',
            'menu_class' => '',
            'menu_id' => 'top_menu',
            'echo' => true,
            'fallback_cb' => false,
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'items_wrap' => '<ul id="%1$s">%3$s</ul>',
            'depth' => 1,
            'walker' => '');
        ?>
        <?php // wp_nav_menu( $menu_stuff ); ?>
        <!--<span class="tng ps-tng"></span>-->
        <div class="ps-infos">
            <div class="ps-infos__where" hidden>Работаем по всей России и странам СНГ</div>
            <?php if ( function_exists('dynamic_sidebar') )
        dynamic_sidebar('sidebar-mess_top'); ?>
        </div>
        <div id="contacts_ver2" class="ps_contact_ver">
        <!-- Изменения №1 (закоментировал и добавил свой вариант) -->
<!--			<div class="item"><a href="tel:+74952265210" style="text-decoration:none">+7<span>&nbsp;</span>(495)<span>&nbsp;</span><b>226-<span>52</span>-10</b></a></div> -->
<!--			<div class="item"><a href="mailto:info@arenda-attrakcionov.ru" style="text-decoration:none">info@arenda-attrakcionov.ru</a></div> -->
            <div class="item phone"><a href="tel:+74952564047" style="text-decoration:none"><b>8<span>&nbsp;</span>(495)<span>&nbsp;</span>256-<span>40</span>-47</b></a><!--<div><button class="feedback_form" alt="Обратная связь" title="Обратная связь">Обратная связь</button></div>-->
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
<div itemscope itemtype="http://schema.org/Product">
<div id="content">
    <div class="stuff">
        <div class="caption"></div>
            <div>
                                <?php $menu_stuff = array(
    								  'theme_location'  => '',
    								  'menu'            => 'Меню на главной',
    								  'container'       => false,
    								  'container_class' => '',
    								  'container_id'    => '',
    								  'menu_class'      => '',
    								  'menu_id'         => 'cat_list',
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
            </div>
        <div class="clear"></div>
        <div class="item_table" style="border:none;">
            <div style="display:flex;flex-wrap:nowrap;">
                <div class="left2" style="width:50%;">
                    <div id="pics">
                        <?php
                            show_video_lightbox($el);
                        ?>
                        <div class="big_one">
                            <?php
                            echo get_the_post_thumbnail(null, 'full', array(
                                'itemprop'   => 'image',
                            ));
                            ?>
                        </div>
                        <ul class="previews">
                            <?php
                            //global $post, $wpdb;
                                $images = get_post_meta($post->ID, 'wpcf-photo', false);
                                /*
                                if($_SERVER["REMOTE_ADDR"] == '95.25.98.12'){
                                    var_dump($images);
                                }
                                */
                                foreach ($images as $image) {
                                  static $i = 1;
                                    $attachment_id = $wpdb->get_var($wpdb->prepare(
                                    "SELECT ID FROM $wpdb->posts WHERE guid = %s",
                                    $image
                                ));
                                $image = str_replace('http://', 'https://', $image);
                                $alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
                                if($i < 5) {
                                    echo("<li><img data-number_li='$i' src='$image' alt='$alt' /></li>");
                                    $i+=1;
                                }
           						else {
                                    break;
                                }
                            }
                            if (count($previews)>1) {
                                echo "<li onclick=\"\$('#overlay').fadeIn(200, function () {\$('.gallery').css('opacity','1.0').css('z-index','9999');});$('#pics ul li:first').click();\" id=\"ring_button_gallery\"></li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="right2" style="width:50%;">
                    <? //if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
                    <?
                    $cat = get_the_category($post->ID);
                    //print_r($cat);
                    //window.location.href=$.cookie('category_source');
                    ?>
                    <div style="display:flex;flex-wrap:nowrap;justify-content:space-around;">
                        <div onclick="history.back();" class="go_back_category"><a>Назад в раздел</a></div>
                        <div class="go_description"><a>Об аттракционе</a></div>
                        <div onclick="$.cookie('item_source',null);" class="go_back"><a href="https://arenda-attrakcionov.ru/attrakciony">Все аттракционы</a></div>
                    </div>
                    <?php echo "<div style=\"height: 38px;\" class=\"alt\">";
                        echo "<div style=\"float:right;margin-top: -5px;\">";
                        $trating = rand(4,5);
                        wp_star_rating( array( 'rating'=>$trating, 'type'=>'rating' ) );
                        echo "</div>";
                        echo "<div style=\"float:left;\">
                                <h1 itemprop='name' class=\"alt\">" . get_the_title() . "</h1>";
                        echo "</div>";
                    ?>
                    <?php
                        /*
                            echo "<div style=\"float:right;\" class=\"tematic\">";
                                get_attr();
                        */
                        echo "</div><div class=\"clear\"></div>";
                    ?>
                    <div class="item_stuff descr-data" style="width:100%;border:none;padding:0;margin:0;">
                        <div style="display:flex;width:100%;flex-wrap:nowrap">
                            <div style="vertical-align: top;">
                                <?php /* <div class="tooltip feedback_form" title="Узнай подробно про страхование от опозданий у менеджера по телефону"><?="<img style='height:54px;' src='".get_template_directory_uri()."/images/product/btn-warranty.png'>"?></div> */ ?>
                                <p class="head">Время и стоимость:</p>
                                <?php
                                    $price = get_post_meta($post->ID, 'wpcf-price_stuff', true);
                                    $price = number_format((int)$price, 0, '', '');
                                ?>
                                  <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                                        <span itemprop="ratingValue"><?=$trating?></span>
                                  </div>
                                <div itemprop="offers" itemscope itemtype="http://schema.org/AggregateOffer">
                                    <meta itemprop="lowPrice" content="<?php echo esc_attr( $price ) ?>">
                                    <meta itemprop="priceCurrency" content="RUB">
                                </div>
                                <div class="time">
                                    <?
                                    echo types_render_field("time", array(
                                        "raw" => "true",
                                        "output" => "",
                                        "show_name" => "true",
                                        "url" => "false"
                                    ));
                                    ?>
                                </div>
                                <div class="price">
                                    <?
                                    echo types_render_field("price", array(
                                        "raw" => "true",
                                        "output" => "",
                                        "show_name" => "true",
                                        "url" => "false"
                                    ));
                                    $linkPartner = types_render_field("partner_link", array("output"=>"raw"));
                                        if(!empty($linkPartner))
                                            echo "<font color=\"blue\">Так же вы можете <a class=\"buy\" title=\"купить аттракцион ".get_the_title()."\" href=\"$linkPartner\"></a> данный аттракцион от производителя.</font>";
                                    ?>
                                </div>
                            </div>
                            <div style="vertical-align:top;">
                                <div class="specifications">
                                    <?php /* <div class="tooltip dezinfaction" style="margin-left: 3px;" title="Подробная информация про дезинфекцию на мероприятии"><a href="/kerling-po-russki/" target="_blank"></a></div> */ ?>
                                    <p class="head">Техническая информация:</p>
                                    <?php
                                    $specifications_data = types_render_field("specifications", array(
                                        "raw" => "true",
                                        "output" => "",
                                        "show_name" => "true",
                                        "url" => "false",
                                        "separator" => "|"
                                    ));
                                    if (!empty($specifications_data)) {
                                        ?>
                                        <ul>
                                            <?php
                                            $specifications = explode("|", $specifications_data);
                                            foreach ($specifications as $key => $value) {
                                                echo "<li>" . $value . "</li>";
                                            }
                                            ?>
                                        </ul>
                                    <?php
                                    } else {
                                        ?>
                                        <span class="nothing">
                                    Скоро здесь появится информация :)
                                </span>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div style="height:20px;"></div>
                    </div>
						<!--<div style="text-align: center;"><button class="order-form" title="Заказ товара">Заказать</button> <button class="saidprice_form" title="Хочу скидку!">Хочу скидку!</button></div>-->
                        <div style="width: 600px;">
                        <?php
                                $dop_oborud = rwmb_meta( 'meta_select_post_posts' );
                                if(is_array($dop_oborud)&&count($dop_oborud)>0&&!in_array("",$dop_oborud))
                                {
                                    $dop_oborud = implode(',',$dop_oborud);
                                    echo "<div class=\"alt2\">Дополнительное оборудование:</div>";
            						echo "<div class=\"vie\">";
            							echo "<div class=\"wrap-dop\">";
                                            echo "<div class=\"container scrollbar-rail dopobor\">";
                                            $dop_posts = get_posts( array('include'=> $dop_oborud,'orderby'=>'post__in' ));
                                            foreach($dop_posts as $post){ setup_postdata($post);
                                                echo "<div class=\"item\">";
                                                    echo "<a class=\"title\" title=\"".get_the_title()."\" target=\"_blank\" href=\"".get_permalink()."\">".get_the_title()."";
                                            		echo "<div class=\"pic\">";
                                            			echo get_the_post_thumbnail(null, array(150, 150));
                                                        echo "<div class=\"block-item-title\"><div class=\"block-item-title__hover\">Подробнее</div></div>";
                                                    echo "</div>";
                                                    if((int)get_post_meta($post->ID,'wpcf-is_myot', true)>0) $ot = 'От '; else $ot = '';
                                                    $pr = get_post_meta($post->ID,'wpcf-price_stuff',true);
                                                    if(!$pr)
                                                    {
                                                        $pr = 0;
                                                    }
                                                    echo "<span class=\"price2\">$ot".number_format($pr, 0, '', ' ')." </span><span class=\"rur\">p<span>уб.</span></span>";
                                                echo "</a>";
                                            	echo "</div>";
                                            }
                                        	echo "</div>";
            							echo "</div>";
            						echo "
                                    <div id=\"minimaze\" style=\"text-align: right;\"><a id=\"moredesc1\" href=\"javascript:void(0)\"><span class=\"upstr\">показать все</span></a></div>
                                    </div><br><br>";
                                    wp_reset_postdata();
                                    ?>
                                    <script>
                                        jQuery(document).ready(function(){
                                          $('.dopobor').slick({
                                            infinite: false,
                                            autoplay: false,
                                            dots: false,
                                            arrows: true,
                                            fade: false,
                                            slidesToShow: 4,
                                            slidesToScroll: 4
                                          });
                                      });
                                  </script>
                                    <?php
                                }
                            ?>
                        <?php
                                $dop_oborud = rwmb_meta( 'meta_select_post_dopattrakcion' );
                                if(is_array($dop_oborud)&&count($dop_oborud)>0&&!in_array("",$dop_oborud))
                                {
                                    $dop_oborud = implode(',',$dop_oborud);
                                    echo "<div class=\"alt2\">Похожие аттракционы:</div>";
            						echo "<div class=\"vie\">";
            							echo "<div class=\"wrap-dop\">";
                                            echo "<div class=\"container scrollbar-rail dopattr\">";
                                            $dop_posts = get_posts( array('include'=> $dop_oborud ));
                                            foreach($dop_posts as $post){ setup_postdata($post);
                                                echo "<div class=\"item\">";
                                                    echo "<a class=\"title\" title=\"".get_the_title()."\" target=\"_blank\" href=\"".get_permalink()."\">".get_the_title()."";
                                            		echo "<div class=\"pic\">";
                                            			echo get_the_post_thumbnail(null, array(150, 150));
                                                        echo "<div class=\"block-item-title\"><div class=\"block-item-title__hover\">Подробнее</div></div>";
                                                    echo "</div>";
                                                    if((int)get_post_meta($post->ID,'wpcf-is_myot', true)>0) $ot = 'От '; else $ot = '';
                                                    $pr = get_post_meta($post->ID,'wpcf-price_stuff',true);
                                                    if(!$pr)
                                                    {
                                                        $pr = 0;
                                                    }
                                                    echo "<span class=\"price2\">$ot".number_format($pr, 0, '', ' ')."</span>&nbsp;<span class=\"rur\">p<span>уб.</span></span>";
                                                echo "</a>";
                                            	echo "</div>";
                                            }
                                        	echo "</div>";
            							echo "</div>";
            						echo "
                                    <div id=\"minimaze\" style=\"text-align: right;\"><a id=\"moredesc2\" href=\"javascript:void(0)\"><span class=\"upstr\">показать все</span></a></div>
                                    </div><br><br>";
                                    wp_reset_postdata();
                                    ?>
                                    <script>
                                        jQuery(document).ready(function(){
                                          $('.dopattr').slick({
                                            infinite: false,
                                            autoplay: false,
                                            dots: false,
                                            arrows: true,
                                            fade: false,
                                            slidesToShow: 4,
                                            slidesToScroll: 4
                                          });
                                      });
                                  </script>
                                    <?php
                                }
                            ?>
                        </div>