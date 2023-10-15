                </div>
			</div>
		</div>
		<div id="item_block">
			<div class="stuff">
				<table border="0" cellspacing="0" cellpadding="0">
					<tr>
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
							<div class="item phone"><a href="tel:+74952564047" style="text-decoration:none"><b>8<span>&nbsp;</span>(495)<span>&nbsp;</span>256-<span>40</span>-47</b></a>
                    </div><div><div style="color: white;">E-mail: <a href="mailto:info@arenda-attrakcionov.ru" >info@arenda-attrakcionov.ru</a></div></div>
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
							<div class="clear"></div>
						</td>
						<td align="left" valign="top" width="41%">
							<div class="block"><?php if ( function_exists('dynamic_sidebar') )
		dynamic_sidebar('sidebar-socials_bottom'); ?></div>
							<div class="clear"></div>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<? wp_footer(); ?>
        </body>
</html>