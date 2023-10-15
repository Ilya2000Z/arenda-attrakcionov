<?php
/**
* Template Name: Баннеры
*/
$bannerTitle = explode ("|", do_shortcode('[types field="title_banner" id="11305" separator="|" output="raw"]'));
$bannerImg = explode("|", do_shortcode('[types field="img_banner" id="11305" separator="|" output="normal" show_name="false" url="false" style="width:234px;height:136px;"]'));
$bannerLink = explode("|", do_shortcode('[types field="banner_link" id="11305" separator="|" output="raw"]'));
//var_dump($bannerLink);
for($i = 0; $i < count($bannerTitle); $i++)
{
$banners[$i][] = $bannerTitle[$i];
$banners[$i][] = $bannerImg[$i];
$banners[$i][] = $bannerLink[$i];
}
unset($bannerTitle,$bannerImg,$bannerLink);
if(is_array($banners)&&!empty($banners[0][0]))
{
echo '<div class="drpdwn">';
foreach($banners as $items => $item)
{
echo "<div class=\"inner\">
<a target=\"_blank\" title=\"{$item[0]}\" href=\"{$item[2]}\">
{$item[1]}
</a>
</div>";
}
echo '</div>';
}
?>