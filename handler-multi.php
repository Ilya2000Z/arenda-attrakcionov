<?php

 header('Content-Type: application/json');

 if(isset($_GET['page'])) {
    $page = "&page={$_GET['page']}";
 }

 //$url = "https://catalogapi.site.yandex.net/v1.0?apikey=4690f41d-9fd7-41f5-a2c3-7d4827bd621b&text={$_GET['s']}&searchid=2357257".$page;
 $url = "https://api.multisearch.io/?id=10742&query={$_GET['s']}&uid=cc441f080&categories=0&limit=18";

 echo customize_search($url);

function customize_search( $url = '' ) {

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL,$url);
    $result=curl_exec($ch);
    curl_close($ch);

    //$array = json_decode($result, true);

    /*

    $count_categories = count($array['categoryList']);
    $count_products = $array['docsTotal'];
    $str = '
    <div class="customize-search-ya">
        <div class="heading-ya">В категориях (' . $count_categories . ')</div>
        <div class="categories-ya">
    ';
        foreach ($array['categoryList'] as $val) {
            $str .= '<div class="category-ya">' . $val['value'] . '(' . $val['found'] . ')</div>';
        }
    $str .= '
        </div>
    ';
    $str .= '
        <div class="products-ya">
        <div class="heading-ya">Товары (' . $count_products . ')</div>
    ';
        foreach ($array['documents'] as $val) {
            $str .= '
            <div class="product-ya">
                <a href="' . $val['url'] . '" title="' . $val['name'] . '">
                    <div class="product-image-ya"><img src="' . $val['origSnippet'] . '" alt="' . $val['name'] . '"></div>
                    <div class="product-info-ya">
                        <div class="product-name-ya">' . $val['name'] . '</div>
                        <div class="product-price-ya">' . $val['price'] . '</div>
                    </div>
                </a>
            </div>
            ';
        }
    $str .= '
        </div>
    ';
    $str .= '
    </div>
    ';
    */
    return $result;
}

?>
