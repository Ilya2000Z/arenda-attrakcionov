</td>
</tr>
</table>
</div>
</div>
<div class="clear"></div>
<?php if (!is_paged()): ?>
<div class="gray_block">
    <div class="stuff">
        <?
        if (is_page(5627)) {
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    the_content();
                } // end while
            } // end if
        }
        $d = explode("###", category_description());
        foreach ($d as &$item) {
            $item = mb_ereg_replace("\s"," ",$item);
        }
        if ($d[1] == '') echo $d[0]; else echo $d[1];
        ?>
    </div>
</div>
<?php endif ?>
        <div id="footer">
            <div class="stuff" style="display:flex;flex-wrap:nowrap;align-items:center;">
        		<div style="width:100%;text-align:left;width:41%;display:flex;align-items:center;padding:0.5rem;">
                    <div style="display:flex;flex-wrap:nowrap;flex-direction:column;padding:1rem;">
                        <div>
            		        <iframe src="https://yandex.ru/sprav/widget/rating-badge/156026706348" width="150" height="50" frameborder="0"></iframe>
            		    </div>
            		    <!--<div class="block"><a class="full-site" href="/?pc-switcher=0">Мобильная версия сайта</a></div>-->
                        <?php $current_year = date ( 'Y' ); ?>
            			<div class="block">Аренда Аттракционов © 2013-<?=$current_year?><br>Все права защищены.</div>
                    </div>
                    <div style="display:flex;flex-wrap:nowrap;flex-direction:column;">
                        <div class="item phone">
                            <a href="tel:+74952564047" style="text-decoration:none;font-size:15px;"><b>8<span>&nbsp;</span>(495)<span>&nbsp;</span>256-<span>40</span>-47</b></a>
                        </div>
                        <div>
                            <div style="color: white;">
                                E-mail: <a href="mailto:info@arenda-attrakcionov.ru" >info@arenda-attrakcionov.ru</a>
                            </div>
                        </div>
                    </div>
                </div>
        		<div style="text-align:center;width:18%;padding:0.5rem;">
        			<div class="block" style="clear: both; float: none; width: 140px;">
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1013732075832110');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1013732075832110&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
        <script type="text/javascript">
        /* <![CDATA[ */
        var google_conversion_id = 981676943;
        var google_custom_params = window.google_tag_params;
        var google_remarketing_only = true;
        /* ]]> */
        </script>
        <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
        </script>
        <noscript>
        <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/981676943/?guid=ON&amp;script=0"/>
        </div>
        </noscript>
        			</div>
        		</div>
        		<div style="text-align:left;width:41%;padding:0.5rem;">
        			<div class="block"><?php if ( function_exists('dynamic_sidebar') )
        dynamic_sidebar('sidebar-socials_bottom'); ?></div>
        			<div class="clear"></div>
        		</div>
            </div>
        </div>
<div id="messengers__fixblock">
    <?php
    if ( function_exists('dynamic_sidebar') )
		dynamic_sidebar('sidebar-messengers_left'); 
    ?>
</div>
<? wp_footer(); ?>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
            ( function () {
                'use strict';
                var loadedMetrica = false,
                    metricaId     = 24366505,
                    timerId;
                if ( navigator.userAgent.indexOf( 'YandexMetrika' ) > -1 ) {
                    loadMetrica();
                } else {
                    window.addEventListener( 'scroll', loadMetrica, {passive: true} );
                    window.addEventListener( 'touchstart', loadMetrica );
                    document.addEventListener( 'mouseenter', loadMetrica );
                    document.addEventListener( 'click', loadMetrica );
                    document.addEventListener( 'DOMContentLoaded', loadFallback );
                }
                function loadFallback() {
                    timerId = setTimeout( loadMetrica, 1000 );
                }
                function loadMetrica( e ) {
                    if ( e && e.type ) {
                        console.log( e.type );
                    } else {
                        console.log( 'DOMContentLoaded' );
                    }
                    if ( loadedMetrica ) {
                        return;
                    }
                    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://cdn.jsdelivr.net/npm/yandex-metrica-watch/tag.js", "ym");
                    ym( metricaId, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true });
                    loadedMetrica = true;
                    clearTimeout( timerId );
                    window.removeEventListener( 'scroll', loadMetrica );
                    window.removeEventListener( 'touchstart', loadMetrica );
                    document.removeEventListener( 'mouseenter', loadMetrica );
                    document.removeEventListener( 'click', loadMetrica );
                    document.removeEventListener( 'DOMContentLoaded', loadFallback );
                }
            } )()
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/24366505" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
       </body>
</html>