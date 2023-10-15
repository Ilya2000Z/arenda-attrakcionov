						</td>
					</tr>
				</table>
			</div>
		</div>
		<div id="item_block">
			<div class="stuff">
				<table border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td align="left" class="left" valign="top" width="510">
							<?
								wp_reset_query();
								echo types_render_field("video", array("raw" => "true", "output" => "", "show_name" => "false"));
							?>
						</td>
						<td align="left" class="right" valign="top">
							<?
								wp_reset_query();
								//while(have_posts())
								//{
									the_post();
									get_template_part('loop', 'single');
								//}
							?>
						</td>
					</tr>
				</table>
				<?
					wp_reset_query();
					$pid = $post->ID;
					$wp_session = WP_Session::get_instance();
					if($wp_session['viewed_posts'] == '') $wp_session['viewed_posts'] = '|';
					if(!preg_match("/\|".$pid."\|/is", $wp_session['viewed_posts']))
					{
						$wp_session['viewed_posts'] .= $pid.'|';
					}
					if($wp_session['viewed_posts'] != '')
					{
						$items = explode("|", $wp_session['viewed_posts']);
						foreach($items as $key=>$value)
						{
							$include_ids[] = $value;
						}
						echo "<div class=\"viewed\">";
							echo "<div class=\"cpt\">Вы смотрели ранее:</div>";
							echo "<a href=\"#\" class=\"prev\"></a>";
							echo "<div class=\"viewport\">";
								echo "<div class=\"container\">";
									query_posts( array('showposts' => '99', 'post__in' => $include_ids) );
									while(have_posts())
									{
										the_post();
										get_template_part('loop', 'viewed');
									}
								echo "</div>";
							echo "</div>";
							echo "<a href=\"#\" class=\"next\"></a>";
						echo "</div>";
					}
				?>
				<div class="clear"></div>
			</div>
		</div>
		<div id="footer">
			<div class="stuff">
				<table border="0" cellspacing="0" cellpadding="20" width="100%">
					<tr>
						<td align="left" valign="top" width="41%">
							<div class="block">Аренда Аттракционов © 2013<br>Все права защищены.</div>
							<div id="phone" class="item"><a href="tel:+74952564047" style="text-decoration:none"><b>8<span>&nbsp;</span>(495)<span>&nbsp;</span>256-<span>40</span>-47</b></a>
                    </div><div><font color="white">E-mail: <a href="mailto:info@arenda-attrakcionov.ru" >info@arenda-attrakcionov.ru</a></font></div>
							<div class="clear"></div>
						</td>
						<td align="center" valign="top" width="18%">
							<div class="block" style="clear: both; float: none; width: 140px;">
								<a href="#" class="icon"><img src="/images/tw.png" alt=""></a>
								<a href="#" class="icon"><img src="/images/fb.png" alt=""></a>
								<a href="#" class="icon"><img src="/images/vk.png" alt=""></a>
								<a href="#" class="icon"><img src="/images/od.png" alt=""></a>
								<div class="clear"></div>
								<br>
								<center>﻿<!-- получаем ip адрес одним из указанных вариантов -->
<script type="text/javascript" src="https://www.l2.io/ip.js?var=userip"></script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter24366505 = new Ya.Metrika({
                    id:24366505,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true,
                    params:{'ip': '<?=get_user_ip()?>'}
                });
            } catch(e) { }
        });
       var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";
    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/24366505" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
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
</center>
							</div>
							<div class="clear"></div>
						</td>
						<td align="left" valign="top" width="41%">
							<div class="block"></div>
							<div class="clear"></div>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<? wp_footer(); ?>
<script type="text/javascript">
var __cs = __cs || [];
__cs.push(["setCsAccount", "cKlgWb7A9OrzrXWfOI3BlGbqRgNiT3a5"]);
</script>
<script type="text/javascript" async src="//app.comagic.ru/static/cs.min.js"></script>
        </body>
</html>