<?php
get_header();

$text_photo_data = types_render_field("text_photo", array(
                                "raw" => "true",
                                "output" => "",
                                "show_name" => "true",
                                "url" => "false",
                                "separator" => "|"
                            ));
$text_photo_array = explode("|",$text_photo_data);

$photos = explode("|", types_render_field("photo", array("raw" => "true", "output" => "", "show_name" => "false", "url" => "false", "separator" => "|")));
                for ($i = 0; $i < count($photos); $i++) {
                    if ($photos[$i] != "") {
                        $images .= "<div><div class=\"image\"><img src=\"{$photos[$i]}\" alt=\"";
                        $images .= (!is_null($text_photo_array[$i])) ? $text_photo_array[$i] : '';
                        $images .= "\"/></div></div>";
                    }
                }

        $specifications_data = types_render_field("specifications", array(
            "raw" => "true",
            "output" => "",
            "show_name" => "true",
            "url" => "false",
            "separator" => "|"
        ));
        
        if (!empty($specifications_data)) {
                $specifications = explode("|", $specifications_data);
                $specification .= "<ul>";
                foreach ($specifications as $key => $value) {
                    $specification .= "<li>$value</li>";
                }
                $specification .= "</ul>";
        } else {
            $specification .= "<span>Скоро здесь появится информация :)</span>";
        }
        $el = types_render_field("video", array("raw" => "true", "output" => "", "show_name" => "false"));
//var_dump($images);
echo "<div id='content-single'>
        <h1>".get_the_title()."</h1>
            <div class=\"block\">
                <div class=\"nav flex-column nav-pills\" id=\"v-pills-tab\" role=\"tablist\">";
                if (!empty($el)) {
                    echo "<a class=\"col nav-link x3 active\" id=\"v-pills-video-tab\" data-toggle=\"pill\" href=\"#v-pills-video\" role=\"tab\" aria-controls=\"v-pills-video\" aria-expanded=\"true\"><i class=\"fa fa-2x fa-youtube-play\" aria-hidden=\"true\"></i>
</a>";              $column = ' x3';
                } else {
                    $act = ' active';
                    $column = ' x2';
                }
                echo "<a class=\"col nav-link$act$column\" id=\"v-pills-photos-tab\" data-toggle=\"pill\" href=\"#v-pills-photos\" role=\"tab\" aria-controls=\"v-pills-photos\" aria-expanded=\"true\"><i class=\"fa fa-2x fa-picture-o\" aria-hidden=\"true\"></i>
</a>
                    <a class=\"col nav-link$column\" id=\"v-pills-desc-tab\" data-toggle=\"pill\" href=\"#v-pills-desc\" role=\"tab\" aria-controls=\"v-pills-desc\" aria-expanded=\"true\"><i class=\"fa fa-2x fa-list-alt\" aria-hidden=\"true\"></i>
</a>
                </div>
                <div class=\"tab-content\" id=\"v-pills-tabContent\">";
                $act = '';
                if (!empty($el)) {
                echo "<div class=\"tab-pane fade show active\" id=\"v-pills-video\" role=\"tabpanel\" aria-labelledby=\"v-pills-video-tab\">
                        <div class=\"video\" style=\"width:100%;\">
                            $el
                        </div>
                    </div>";
                } else {
                    $act = ' active';
                }
                echo "<div class=\"tab-pane fade show$act\" id=\"v-pills-photos\" role=\"tabpanel\" aria-labelledby=\"v-pills-photos-tab\">
                        <div class=\"photos\">
                            $images
                        </div>
                    </div>";
                echo "<div class=\"tab-pane fade show\" id=\"v-pills-desc\" role=\"tabpanel\" aria-labelledby=\"v-pills-desc-tab\">
                        <div class=\"specifications\">
                            <h4>Техническая информация:</h4>
                            $specification
                        </div>
                    </div>";
        echo "</div>";


echo "</div>
        <div class=\"clearfix\">
    </div>";
    echo "<div class=\"container-fluid\">";
    //echo "";  // Виджет сквозного баннера
    if ( function_exists('dynamic_sidebar') )
        dynamic_sidebar('banner-on-items');
    //echo "<div class='my-2 text-center feedback_form'><img src='".get_template_directory_uri()."/images/product/btn-warranty.png'></div>";
    echo "<h4>Время и стоимость:</h4>";
    
    echo types_render_field("time", array(
        "raw" => "true",
        "output" => "",
        "show_name" => "true",
        "url" => "false"
    ));
    echo "<br>";
    echo types_render_field("price", array(
        "raw" => "true",
        "output" => "",
        "show_name" => "true",
        "url" => "false"
    ));
    /*
    echo "<div class=\"order container-fluid\">

            <div class=\"row\">
                <div class=\"d-flex flex-column\">
					<a class=\"mb-3\" href=\"#\" data-toggle=\"modal\" data-target=\"#OrderformM\">
                    Заказать <i class=\"fa fa-2x fa-form\" aria-hidden=\"true\"></i>
                    </a>
                    <a style=\"background: #FD9F4B; color: #000;\" href=\"#\" data-toggle=\"modal\" data-target=\"#sendUrPrice\">
                    Хочу скидку! <i class=\"fa fa-2x fa-form\" aria-hidden=\"true\"></i>
                    </a>
                </div>
            </div>

          </div>
    </div>
</div>";
*/
wp_reset_query();
echo "<div style=\"padding: 0.5rem;\">";
    get_template_part('loop', 'single');
echo "</div>";

?>

<?php
get_footer();