<?php
get_header();

$post_meta = get_post_meta($post->ID);

$slide_names = array_merge_recursive($post_meta['wpcf-name-l'], $post_meta['wpcf-name-r']);
$slide_descs = array_merge_recursive($post_meta['wpcf-desc-l'], $post_meta['wpcf-desc-r']);
$slide_imgs = array_merge_recursive($post_meta['wpcf-img-l'], $post_meta['wpcf-img-r']);
$slide_links = array_merge_recursive($post_meta['wpcf-link-l'], $post_meta['wpcf-link-r']);

    for($i=0;$i<count($slide_names);$i++)
    {
        $slides .= "<div class=\"slide\">
                        <a target=\"_blank\" alt=\"{$slide_names[$i]}\" title=\"{$slide_names[$i]} &mdash; {$slide_descs[$i]}\" href=\"{$slide_links[$i]}\">
    		                <div class=\"head-img\"><img src=\"{$slide_imgs[$i]}\"/></div>
                            <div class=\"head-slide-desc\">
                                <div class=\"head-name\"><span>{$slide_names[$i]}</span></div>
        	                    <!--<div class=\"head-desc\"><span>{$slide_descs[$i]}</span></div>-->
                            </div>
                        </a>
		                <div class=\"head-slide-link\">
		                    <a class=\"head-link\" href=\"{$slide_links[$i]}\">Подробнее</a>
                        </div>
                    </div>";
    }


echo "<div id=\"slides\">$slides</div>";
echo "
<nav id=\"menu\">
    <ul>
        <li><a class=\"categories\" href=\"#\" title=\"Список Аттракционов\">Перейти к аттракционам</a></li>
        <li><a href=\"/agentstvam\" title=\"Агентствам\">Агентствам</a></li>
        <li><a href=\"/oplata-i-dostavka\" title=\"Оплата и доставка\">Оплата и доставка</a></li>
        <li><a href=\"/kontakty\" title=\"Контакты\">Контакты</a></li>
        <li><a href=\"#\" data-toggle=\"modal\" data-target=\"#getpriceM\" title=\"Прайс лист\">Прайс лист</a></li>
    </ul>

</nav>
";
?>
<h1><?php is_front_page() ? bloginfo('description') : wp_title(''); ?></h1>
<div class="gray_block">
    <div class="stuff">
        <div class="caption"><span>О компании:</span></div>
        <?php

        if (have_posts()) {
            while (have_posts()) {
                    the_post();
                    the_content();
                }
            }
        ?>
    </div>
</div>
<?php
get_footer();
