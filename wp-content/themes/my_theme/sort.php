<?php
/**
 * Template Name: Расширенный поиск
 */

get_header('inside');
$get_array = array();

$cat_array = array();
if (isset($_POST['place_id'])) {
    foreach ($_POST['place_id'] as $value) {
        $cat_array[] = htmlspecialchars($value);
    }
    //$cat_array[0]
    SetCookie("place_id", $cat_array[0], time()+3600);
}
if(isset($_COOKIE['place_id']))
{
    $cat_array[0] = $_COOKIE['place_id'];
    SetCookie("place_id","");
}


$cat_id = '23';
$cat_group_id = '24';

$header_names_form = 'Праздники';
$header_groups_form = 'Группы';
$header_found_elements = 'Найдено элементов: ';
$header_not_found = 'По заданным критериям ничего не найдено :(';
$header_found_categories = 'Результаты поиска по: ';
$header_found_categories_groups = 'Включенные в поиск группы: ';

$button_search_sign = 'Найти';
$button_reset_sign = 'Очистить';

$query_args = array(
    'category__and' => $cat_array
);


class Category
{
    function __construct($id)
    {
        $this->name_id = $id;
    }

    public $name_array = '';
    public $name_id = '';

    public function get_form_elements()
    {
        global $cat_array;

        $get_categories_args = array(
            'child_of' => $this->name_id,
            'hide_empty' => 0
        );

        $categories = get_categories($get_categories_args);
        foreach ($categories as $category) {

            ?>
            <div class="filter-checkbox">
                <span id="checkbox_span">
                    <input type="checkbox"
                           name="place_id[]"
                           value="<?php echo $category->term_id ?>"
                        <?php if (in_array($category->term_id, $cat_array)) {
                            echo 'checked="checked"';
                            $this->name_array[$category->term_id] = $category->cat_name;
                        }
                        ?>
                         onclick=" /*
                            $('.filter-checkbox input').prop('checked', false);
                            $(this).prop('checked', true);					 */
                         " />
                </span>

                <span>
                    <?php
                    $term_label = get_term_meta( $category->term_id, 'wpcf-poisk_list_cat_label', true );
                    if(!empty($term_label)) {
                        echo $term_label;
                    }
                    else {
                        echo $category->cat_name;
                    }
                    ?>
                </span>
            </div>
        <?
        }
    }

    public function get_found_names($header = '')
    {
        if (!empty($this->name_array)) {
            $out = '<p class="found">';
            $out .= ' ' . $header . ' ';
            foreach ($this->name_array as $name => $value) {
                $out .= '<span><a href="'.get_tag_link($name).'">' . $value . '</a></span>';
            }
            $out .= '</p>';
            echo $out;

            return;
        } else {
            return;
        }
    }
}

$cats = new Category($cat_id);
$cats_groups = new Category($cat_group_id);
$query = new WP_Query($query_args);

?>
    <h1 class="page-title">Расширенный поиск по тематическим праздникам и группам аттракционов</h1>
    <form method="post" action="" id="filter-search">
        <div class="categories">
            <p><?php echo $header_names_form; ?></p>
            <?php
            $cats->get_form_elements();
            ?>
        </div>
        <div class="categories-group">
            <p><?php echo $header_groups_form ?></p>
            <?php
            $cats_groups->get_form_elements();
            ?>
        </div>
        <div class="submit">
            <input id="search_button" type="submit" value="<?php echo $button_search_sign ?>" style="display:none">

            <!-- <input type="reset" value="<?php echo $button_reset_sign ?>"/> -->
        </div>

        <a href="#" id="search_button" class="button1" onclick="$('.submit input#search_button').click();"><?php echo $button_search_sign ?></a>
    </form>
    <br><br>
    <span id="description_search">* поставьте галочку на интересующем Празднике или Группе и нажмите Найти</span>
    <br>
<style>
.right p, .right p span a{
    font-size: 1.0em;
}

</style>
<?php
if (!empty($cat_array)) {
    if ($query->post_count > 0) {
        ?>
        <p><?php echo $header_found_elements . $query->post_count ?> </p>
        <?php
        $cats->get_found_names($header_found_categories);
        $cats_groups->get_found_names($header_found_categories_groups);
    } else {
        ?>
        <h2 class="not-found"><?php echo $header_not_found ?></h2>
    <?php
    }
    ?>
    <div class="items_list">
    <?php

    while ($query->have_posts()) : $query->the_post();
        echo "<div class=\"item\">";
        if (has_post_thumbnail()) {
            echo "<div class=\"pic\">";
            echo "<a href=\"" . get_permalink() . "\">
            <img style=\"position:absolute; opacity: 0;\" onmouseover=\"$(this).css('opacity','1').css('box-shadow','0 0 0 3px white, 0 0 0 8px #C2C4C3');\" onmouseout=\"$(this).css('opacity','0').css('box-shadow','none');\" width=\"3734\" height=\"3734\" src=\"http://arenda-attrakcionov.ru/wp-content/themes/my_theme/images/layer_ring_category.png\" class=\"attachment-full wp-post-image\" alt=\"pod_myxoi04\">
            " . get_the_post_thumbnail(null, 'full') . "</a>";
            echo "</div>";
        }
        echo "<div class=\"cpt\">";
        echo "<a href=\"" . get_permalink() . "\">" . get_the_title() . "</a><div class=\"clear\"></div>";
        echo "</div>";
        echo "</div>";
    endwhile;

    wp_reset_query();
}
?>
</div>
    <script>
        $('#filter-search input[type=reset]').click(function () {
            $('#filter-search input[type=checkbox').attr('checked', false);
        });

        /* Изменения №1 (стилизация чекбоксов) */
            // проверяем, какие чекбоксы активны и меняем сласс для родительского дива
            $('.filter-checkbox').each(function(){
                var checkbox = $(this).find('input[type=checkbox]');
                if(checkbox.prop("checked")) $(this).addClass("check_active");
            });

            // при клике по диву, делаем проверку
            $('.filter-checkbox').click(function(){
                var checkbox = $(this).find('input[type=checkbox]');
                // если чекбокс был активен
                if(checkbox.prop("checked")){
                    // снимаем класс с родительского дива
                    $(this).removeClass("check_active");
                    // и снимаем галочку с чекбокса
                    checkbox.prop("checked", false);
                // если чекбокс не был активен
                }else{
                    // добавляем класс родительскому диву 9999
                    $('.filter-checkbox').removeClass("check_active");
                    $('.filter-checkbox input').prop("checked", false);
                    // добавляем класс родительскому диву
                    $(this).addClass("check_active");
                    // ставим галочку в чекбоксе
                    checkbox.prop("checked", true);
                }
            });
        /* Конец изменения №1 (стилизация чекбоксов) */

        $('html, body').animate({ scrollTop: ($('p.found').offset()).top-202 }, 'slow'); /* Изменения №1 (добавил, не было) */

    </script>
<?php

get_footer('inside_category');
?>