        <footer id="footer">
            <div class="row justify-content-center">
                <!--<div class="feedback"><a href="#" data-toggle="modal" data-target="#feedbackM"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span class="feedback-title">Напишите нам</span></a></div>-->
                <div id="phone"><a href="tel:+74952564047" target="_blank"><i class="fa fa-phone" aria-hidden="true"></i><span class="phone-title" id="phone-call">+7(495)256-40-47</span></a></div>
                <div class="social-pages">
                    <?php if ( function_exists('dynamic_sidebar') )
        dynamic_sidebar('sidebar-socials_bottom'); ?>
                </div>
            </div>
            <!--
            <div class="row">
                <div class="col"><a class="full-site" href="?pc-switcher=1">Полная версия сайта</a></div>
            </div>
            -->
            <div class="row">
                <?php $current_year = date ( 'Y' ); ?>
                <div class="col copyright"><div>Аренда Аттракционов &copy; 2013-<?=$current_year?></div><div>Все права защищены.</div></div>
            </div>
        </footer>


        </div>
    </div>

    <!-- Форма поиска аттракционов -->
    <div id="searchfix">
    <?php get_search_form(); /* ?>
    </div>
    <!-- Форма обратной связи -->
    <div class="modal fade" id="feedbackM" tabindex="-1" role="dialog" aria-labelledby="FeedbackLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="FeedbackLabel">Обратная связь</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <?php echo do_shortcode('[contact-form-7 id="22132" title="Обратная связь (Mobile)"]'); ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
          </div>
        </div>
      </div>
    </div>

    <?php
    */
        if(is_front_page())
        {
          /*
    ?>

    <!-- Форма запроса прайс листа -->
    <div class="modal fade" id="getpriceM" tabindex="-1" role="dialog" aria-labelledby="GetpriceLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="GetpriceLabel">Запрос прайс листа</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <?php echo do_shortcode('[contact-form-7 id="22131" title="Запрос прайс листа"]'); ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
          </div>
        </div>
      </div>
    </div>

    <?php
    */
        }

		if(is_single())
		{
      /*
	?>

    <!-- Форма заказа -->
    <div class="modal fade" id="OrderformM" tabindex="-1" role="dialog" aria-labelledby="OrderformLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="OrderformLabel">Заказ товара</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <?php echo do_shortcode('[contact-form-7 id="22133" title="Заказ товара"]'); ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
          </div>
        </div>
      </div>
    </div>

   
    <div class="modal fade" id="sendUrPrice" tabindex="-1" role="dialog" aria-labelledby="sendUrPriceLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="sendUrPriceLabel">Назначь свою цену</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    
          <div class="modal-body">
                <?php echo do_shortcode('[contact-form-7 id="34359" title="Назначь свою цену"]'); ?>
          </div>
    
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
          </div>
        </div>
      </div>
    </div>
   

	<?php
  */
	    }
	 ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.7.1/slick/slick.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/main.min.js"></script>

<!-- Facebook Pixel Code -->
<?php /* ?>
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1480858478785320');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1480858478785320&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<?php */ ?>

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

  <?php wp_footer(); ?>

  </body>
</html>