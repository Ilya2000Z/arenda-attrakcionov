<?php

ini_set('memory_limit', '3.5G');
//$sapi_type = php_sapi_name();


if ( ! defined( 'WPINC' ) && PHP_SAPI != 'cli' ) {
    die("Fuck u Hacker!");
}

if( current_user_can('eff_pricelist_manage_options') || PHP_SAPI == 'cli' ) {

    /*
    echo "<pre>";
    print_r( _get_cron_array() );
    echo "</pre>";
    */

    //error_reporting(E_ALL);
    //ini_set('display_errors', TRUE);
    //ini_set('display_startup_errors', TRUE);

    define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
    date_default_timezone_set('Europe/Moscow');

    $rootP = get_home_path();
    array_map( 'unlink', glob( "$rootP*.xlsx") );

    require_once( plugin_dir_path(__FILE__).'/classes/PHPExcel.php' );

    $objXls = new PHPExcel();

    $objXls->getProperties()->setCreator("Arenda-Attrakcionov.ru")
    							 ->setLastModifiedBy("Arenda-Attrakcionov.ru")
    							 ->setTitle("Прайс лист Аренда-Аттракционов")
    							 ->setSubject("Прайс лист")
    							 ->setDescription("Полный прайс лист по аттракционам");
    							 //->setKeywords("")
    							 //->setCategory("");

    $objXls->setActiveSheetIndex(0);
    //$objXls->getActiveSheet()->getProtection()->setSheet(true);
    //$objXls->getSecurity()->setLockWindows(true);
    //$objXls->getSecurity()->setLockStructure(true);
    $objXls->getActiveSheet()->setShowSummaryBelow(false);
    $objXls->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
    //$objXls->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
    $objXls->getActiveSheet()->getStyle('A')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objXls->getActiveSheet()->getColumnDimension('B')->setWidth(60);
    //$objXls->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
    $objXls->getActiveSheet()->getColumnDimension('C')->setWidth(30);
    $objXls->getActiveSheet()->getStyle('C')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objXls->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
    $objXls->getActiveSheet()->getStyle('D')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objXls->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

    $options = get_option( 'price-options' );

    $objXls->getActiveSheet()->mergeCells('A2:A3');
    $objXls->getActiveSheet()->mergeCells('B1:D1');
    $objXls->getActiveSheet()->mergeCells('B1:D1');
    $objXls->getActiveSheet()->mergeCells('B2:B4');
    $objXls->getActiveSheet()->mergeCells('C2:D4');
    $objXls->getActiveSheet()->mergeCells('C5:D5');
    $objXls->getActiveSheet()->mergeCells('A6:D6');

    $objXls->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
    $objXls->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objXls->getActiveSheet()->setCellValue('A1', 'Дата создания прайс-листа: '.date('[ d-m-Y ] [ H:i:s ]'));

    $objXls->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objXls->getActiveSheet()->getStyle('A2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objXls->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
    $objXls->getActiveSheet()->getStyle('A2')->getFont()->setSize(22);
    $objXls->getActiveSheet()->setCellValue('A2', $options['company']);

    $objXls->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objXls->getActiveSheet()->getStyle('B1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objXls->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
    $objXls->getActiveSheet()->getStyle('B1')->getFont()->setSize(14);
    $objXls->getActiveSheet()->setCellValue('B1', "Контакты");

    $objXls->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objXls->getActiveSheet()->getStyle('B2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objXls->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);
    $objXls->getActiveSheet()->getStyle('B2')->getFont()->setSize(14);
    $objXls->getActiveSheet()->setCellValue('B2', "Телефон:");
    $objXls->getActiveSheet()->getStyle('C2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objXls->getActiveSheet()->getStyle('C2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objXls->getActiveSheet()->getStyle('C2')->getFont()->setSize(14);
    $objXls->getActiveSheet()->getStyle('C2')->getAlignment()->setWrapText(true);
    $objXls->getActiveSheet()->setCellValue('C2', $options['phone']);


    $objXls->getActiveSheet()->getStyle('B5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objXls->getActiveSheet()->getStyle('B5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objXls->getActiveSheet()->getStyle('B5')->getFont()->setBold(true);
    $objXls->getActiveSheet()->getStyle('B5')->getFont()->setSize(14);
    $objXls->getActiveSheet()->setCellValue('B5', "E-Mail:");

    $objXls->getActiveSheet()->getStyle('C5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objXls->getActiveSheet()->getStyle('C5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objXls->getActiveSheet()->getStyle('C5')->getFont()->setSize(14);
    $objXls->getActiveSheet()->getStyle('C5')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);
    $objXls->getActiveSheet()->getCell('C5')->getHyperlink()->setUrl('mailto:'.$options['email']);
    $objXls->getActiveSheet()->setCellValue('C5', $options['email']);

    $objXls->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
    $objXls->getActiveSheet()->getStyle('A4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objXls->getActiveSheet()->getStyle('A4')->getFont()->setSize(14);
    $objXls->getActiveSheet()->getStyle('A4')->getAlignment()->setWrapText(true);
    $objXls->getActiveSheet()->setCellValue('A4', 'Наш адрес: '.$options['adress']);

    $objXls->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
    $objXls->getActiveSheet()->getStyle('A5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objXls->getActiveSheet()->getStyle('A5')->getFont()->setSize(14);
    $objXls->getActiveSheet()->getStyle('A5')->getAlignment()->setWrapText(true);
    $objXls->getActiveSheet()->setCellValue('A5', 'Режим работы: '.$options['time']);

    $objXls->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
    $objXls->getActiveSheet()->getStyle('A6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objXls->getActiveSheet()->getStyle('A6')->getFont()->setSize(14);
    $objXls->getActiveSheet()->getStyle('A6')->getAlignment()->setWrapText(true);
    $objXls->getActiveSheet()->setCellValue('A6', 'Доп. информация: '.$options['desc']);

    $objXls->getActiveSheet()->setCellValue('A7', "Название")
                                  ->setCellValue('B7', "Размеры")
                                  ->setCellValue('C7', "Электропитание")
                                  ->setCellValue('D7', "Цена (руб)");

    $objXls->getActiveSheet()->getStyle('A7:D7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objXls->getActiveSheet()->getStyle('A7:D7')->getFont()->setBold(true);
    $objXls->getActiveSheet()->getStyle('A7:D7')->getFont()->setSize(14);

    static $i = 8;

    $cat = get_category('0', false);

    $args = array(
        'type' => 'post',
        'child_of' => $cat->cat_ID,
        'parent' => '',
        'orderby' => 'title',
        'order' => 'ASC',
        'hide_empty' => 1,
        'hierarchical' => 0,
        'exclude' => '1,6,23,24,47',
        'include' => '',
        'number' => 0,
        'taxonomy' => 'category',
        'pad_counts' => false
        );

    $objXls->getActiveSheet()->mergeCells('A' . $i. ':' . 'D' . $i);
    $objXls->getActiveSheet()->getStyle('A' . $i. ':' . 'D' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objXls->getActiveSheet()->getStyle('A' . $i. ':' . 'D' . $i)->getFont()->setSize(16);
    $objXls->getActiveSheet()->setCellValue('A' . $i, "{$cat->name}");

    $i++;

    //$categories = get_categories( $args );

    $categories = get_categories( [
        'taxonomy'     => 'category',
        'type'         => 'post',
        'child_of'     => 0,
        'parent'       => '',
        'orderby'      => 'name',
        'order'        => 'ASC',
        'hide_empty'   => 1,
        'hierarchical' => 1,
        'exclude'      => '',
        'include'      => '',
        'number'       => 0,
        'pad_counts'   => false,
    ] );

    $post_tags = get_categories( [
        'taxonomy'     => 'post_tag',
        'type'         => 'post',
        'child_of'     => 0,
        'parent'       => '',
        'orderby'      => 'name',
        'order'        => 'ASC',
        'hide_empty'   => 0,
        'hierarchical' => 1,
        'exclude'      => '',
        'include'      => '',
        'number'       => 0,
        'pad_counts'   => false,
    ] );

   // echo "<pre>";
   // var_dump($categories);
   // echo "</pre>";
   // die();

    // FOR YML

    $yml = new domDocument("1.0", "utf-8");
    $root_yml = $yml->createElement("yml_catalog");
    $root_yml->setAttribute("date", date( 'Y-m-d H:i' , strtotime('now')));
    $yml->appendChild($root_yml);

    $root_shop = $yml->createElement("shop");

    $name = $yml->createElement("name", "Arenda-Attrakcionov.ru");
    $company = $yml->createElement("company", "Arenda-Attrakcionov.ru");
    $url = $yml->createElement("url", "https://arenda-attrakcionov.ru");

    //<currencies>
    //    <currency id="RUR" rate="1"/>

    $root_yml->appendChild($root_shop);

    $root_shop->appendChild($name);
    $root_shop->appendChild($company);
    $root_shop->appendChild($url);

    $root_currencies = $yml->createElement("currencies");
    $root_shop->appendChild($root_currencies);
    $currency = $yml->createElement("currency");
    $currency->setAttribute("id", "RUR");
    $currency->setAttribute("rate", "1");
    $root_currencies->appendChild($currency);

    if($categories)
    {


        $root_categories = $yml->createElement("categories");
        $root_shop->appendChild($root_categories);

        foreach($categories as $cat)
        {

            $category = $yml->createElement("category", $cat->name);
            $category->setAttribute("id", $cat->cat_ID);
            $category->setAttribute("url", get_category_link( $cat->cat_ID ) );
            $root_categories->appendChild($category);
            //get_category_link( $cat->cat_ID );
            //var_dump(, $cat );
        }

        if( $post_tags ) {
            foreach($post_tags as $cat)
            {
                $category = $yml->createElement("category", $cat->name);
                $category->setAttribute("id", $cat->cat_ID);
                $category->setAttribute("url", get_category_link( $cat->cat_ID ) );
                $root_categories->appendChild($category);
            }
        }

    }

    $array_offers = [];

    $root_offers = $yml->createElement("offers");
    $root_shop->appendChild($root_offers);


    if($categories)
    {

        //if($idpost == 34042) {
            //var_dump($categories);
        //}

        foreach($categories as $cat)
        {

            $objXls->getActiveSheet()->setCellValue('A' . $i, "{$cat->name}");
            $objXls->getActiveSheet()->mergeCells('A' . $i . ':' . 'D' . $i);
            $objXls->getActiveSheet()->getStyle('A' . $i)->getFont()->setBold(true);
            $objXls->getActiveSheet()->getStyle('A' . $i)->getFont()->setSize(14);
            $i++;
            //6

            query_posts("cat={$cat->cat_ID}&orderby=post_title&post_type=post&post_status=publish&order=ASC&posts_per_page=1000");

            while(have_posts())
    		{
    		    the_post();

                    $idpost = get_the_ID();

                   // if($cat->cat_ID == 117) {
                        //echo "<pre>";
                        //var_dump(get_the_title());
                        //echo "</pre>";
                        //die();
                   // }

                    if(!isset($array_offers[$idpost])) {

                        $array_offers[$idpost] = true;

                        $root_offer = $yml->createElement("offer");

                        if(get_field('multisearch_-_keywords')) {

                            $keywords = $yml->createElement("keywords", get_field('multisearch_-_keywords'));
                            $root_offer->appendChild($keywords);

                        }
                        if(get_field('multisearch_-_ordering')) {

                            $ordering = $yml->createElement("ordering", get_field('multisearch_-_ordering'));
                            $root_offer->appendChild($ordering);

                        }

                        $root_offer->setAttribute("id", $idpost);
                        //$root_offer->setAttribute("type", "vendor.model");
                        $root_offer->setAttribute("available", "true");
                        $root_offers->appendChild($root_offer);

                        $offer_name = $yml->createElement("name", get_the_title());
                        $offer_url = $yml->createElement("url", get_permalink());
                        $offer_price = (int)get_post_meta($idpost,'wpcf-price_stuff', true);
                        $offer_price = $yml->createElement("price",  $offer_price ? $offer_price : 'цена по запросу');

                        if((int)get_post_meta($idpost,'wpcf-is_myot', true)>0)
                        {
                            $offer_price->setAttribute("from", "true");
                        }
                        $offer_currencyId = $yml->createElement("currencyId", "RUR");

                         if( get_field('multisearch_-_parent_category') || get_field('multisearch_-_product_categories') ) {
                            if(get_field('multisearch_-_parent_category')) {
                                //$yml .= '        <categoryId>' . get_field('multisearch_-_parent_category') . '</categoryId>' . PHP_EOL;
                                $offer_categoryId = $yml->createElement("categoryId", get_field('multisearch_-_parent_category'));
                            }
                            if(get_field('multisearch_-_product_categories')) {
                                //$yml .= '        <categoryId>' . get_field('multisearch_-_product_categories') . '</categoryId>' . PHP_EOL;
                                $offer_categoryId = $yml->createElement("categoryId", get_field('multisearch_-_product_categories'));
                            }

                        } else {
                            $offer_categoryId = $yml->createElement("categoryId", $cat->cat_ID);
                        }
                        //$offer_category = $yml->createElement("category", $cat->name);

                        if(has_post_thumbnail())
               	        {
                            $offer_picture = $yml->createElement("picture", get_the_post_thumbnail_url($idpost));
                        } else {
                            echo "<b>В записи <a style=\"color: red;\" href=\"https://arenda-attrakcionov.ru/wp-admin/post.php?post={$idpost}&action=edit\">{$idpost}</a> наблюдается проблема с отсутствием основной картинки</b>" . EOL;
                        }

                        $root_offer->appendChild($offer_name);
                        $root_offer->appendChild($offer_url);
                        $root_offer->appendChild($offer_price);
                        $root_offer->appendChild($offer_currencyId);
                        $root_offer->appendChild($offer_categoryId);
                        //$root_offer->appendChild($offer_category);
                        $root_offer->appendChild($offer_picture);
                        unset($offer_name, $offer_url, $offer_price, $offer_currencyId, $offer_categoryId, $offer_picture);

                    }


                	$objXls->getActiveSheet()->setCellValue('A' . $i, html_entity_decode( get_the_title(), ENT_COMPAT, 'UTF-8' ));
                    $objXls->getActiveSheet()->getCell('A' . $i)->getHyperlink()->setUrl(get_permalink());
                    $objXls->getActiveSheet()->getStyle('A' . $i)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);
                    $objXls->getActiveSheet()->getStyle('B' . $i)->getAlignment()->setWrapText(true);
                    $objXls->getActiveSheet()->setCellValue('B' . $i, get_post_meta(get_the_id(),'wpcf-size_stuff', true));
                    $objXls->getActiveSheet()->setCellValue('C' . $i, get_post_meta(get_the_id(),'wpcf-energy_stuff', true));
                    if((int)get_post_meta(get_the_id(),'wpcf-is_myot', true)>0) $ot = 'От '; else $ot = '';
                    $objXls->getActiveSheet()->setCellValue('D' . $i, $ot.number_format((int)get_post_meta(get_the_id(),'wpcf-price_stuff', true), 0, '', ' '));
                    $objXls->getActiveSheet()->getRowDimension($i)->setOutlineLevel(1);
    	            $objXls->getActiveSheet()->getRowDimension($i)->setVisible(true);
                    $i++;


            }
            $objXls->getActiveSheet()->getRowDimension($i)->setCollapsed(true);


        }

    }

    wp_reset_query();
    /*
    $wpdbm = new wpdb('u390355', 'p.Ia.O64inDAF', 'u390355_master', 'u390355.mysql.masterhost.ru');
    $wpdbm->set_prefix('wp_');
    $urlM = $wpdbm->get_var(
    	"SELECT option_value as url
    	FROM $wpdbm->options
    	WHERE option_id=1;"
    );
    $categories = $wpdbm->get_results("SELECT $wpdbm->terms.term_id AS id, name, description from $wpdbm->terms INNER JOIN $wpdbm->term_taxonomy ON $wpdbm->terms.term_id = $wpdbm->term_taxonomy.term_id WHERE parent = '117' ORDER BY name ASC");

    $objXls->getActiveSheet()->mergeCells('A' . $i. ':' . 'D' . $i);
    $objXls->getActiveSheet()->getStyle('A' . $i. ':' . 'D' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objXls->getActiveSheet()->getStyle('A' . $i. ':' . 'D' . $i)->getFont()->setSize(16);
    $objXls->getActiveSheet()->setCellValue('A' . $i, "Мастер-классы");

    $i++;

    if($categories)
    {
        foreach($categories as $cat)
        {

            $objXls->getActiveSheet()->setCellValue('A' . $i, "{$cat->name}");
            $objXls->getActiveSheet()->mergeCells('A' . $i . ':' . 'D' . $i);
            $objXls->getActiveSheet()->getStyle('A' . $i)->getFont()->setBold(true);
            $objXls->getActiveSheet()->getStyle('A' . $i)->getFont()->setSize(14);
            $i++;

            $ids = $wpdbm->get_results("SELECT pc.object_id id FROM $wpdbm->term_relationships pc WHERE pc.term_taxonomy_id = $cat->id ORDER BY pc.object_id",  ARRAY_A);
            if(!empty($ids)) {
                $sortP = array();
                foreach($ids as $id)
                {
                    $getpm ="
                            SELECT p.ID,
                                p.post_name as name,
                                p.post_title AS title,
                                pm1.meta_value AS price,
                                pm2.meta_value AS size,
                                pm3.meta_value AS energy,
                                pm4.meta_value AS is_myot,
                                pm5.meta_value AS thumb
                            FROM  $wpdbm->posts p
                                LEFT JOIN $wpdbm->postmeta pm1 ON (
                                    pm1.post_id = p.ID  AND
                                    pm1.meta_key    = 'wpcf-price_stuff'
                                ) LEFT JOIN $wpdbm->postmeta pm2 ON (
                                    pm2.post_id = p.ID  AND
                                    pm2.meta_key    = 'wpcf-size_stuff'
                                ) LEFT JOIN $wpdbm->postmeta pm3 ON (
                                    pm3.post_id = p.ID  AND
                                    pm3.meta_key = 'wpcf-energy_stuff'
                                ) LEFT JOIN $wpdbm->postmeta pm4 ON (
                                    pm4.post_id = p.ID  AND
                                    pm4.meta_key = 'wpcf-is_myot'
                                ) LEFT JOIN $wpdbm->postmeta pm5 ON (
                                    pm5.post_id = p.ID  AND
                                    pm5.meta_key = '_thumbnail_id'
                                )

                            WHERE post_status = 'publish' AND post_type = 'post' AND p.ID={$id['id']}
                        ;";

                   $post = $wpdbm->get_results($getpm);
                   if(!empty($post))
                   {
                        $post[0]->price = (int)$post[0]->price;
                        $post[0]->urlm=$urlM;
                        $sortP[] = $post[0];
                    }
                }

                uasort($sortP, 'sort_func');

                foreach( $sortP as $post)
                {

                    $objXls->getActiveSheet()->setCellValue('A' . $i, html_entity_decode( $post->title, ENT_COMPAT, 'UTF-8' ));
                    $objXls->getActiveSheet()->getCell('A' . $i)->getHyperlink()->setUrl( $post->urlm.$post->name );
                    $objXls->getActiveSheet()->getStyle('A' . $i)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);
                    $objXls->getActiveSheet()->getStyle('B' . $i)->getAlignment()->setWrapText(true);
                    $objXls->getActiveSheet()->setCellValue('B' . $i, $post->size);
                    $objXls->getActiveSheet()->setCellValue('C' . $i, $post->energy);
                    if((int)$post->is_myot>0) $ot = 'От '; else $ot = '';
                    $objXls->getActiveSheet()->setCellValue('D' . $i, $ot.number_format((int)$post->price, 0, '', ' '));
                    $objXls->getActiveSheet()->getRowDimension($i)->setOutlineLevel(1);
    	            $objXls->getActiveSheet()->getRowDimension($i)->setVisible(true);
                    $i++;

                }
                $objXls->getActiveSheet()->getRowDimension($i)->setCollapsed(true);
            }
        }
    }
    wp_reset_query();
    */
    $objXls->setActiveSheetIndex(0);
    $objXls->getActiveSheet()->setTitle('Прайс лист Аренда-Аттракционов');
    $objXls->getActiveSheet()
        ->getHeaderFooter()->setOddHeader('&C&24&K0000FF&B&U&A');
    $objXls->getActiveSheet()
        ->getHeaderFooter()->setEvenHeader('&C&24&K0000FF&B&U&A');
    $objXls->getActiveSheet()
        ->getHeaderFooter()->setOddFooter('&R&D &T&C&F&LPage &P / &N');
    $objXls->getActiveSheet()
        ->getHeaderFooter()->setEvenFooter('&L&D &T&C&F&RPage &P / &N');
    $objWriter = PHPExcel_IOFactory::createWriter($objXls, 'Excel2007');

    $linkPrL = 'price-list-'.date('H-i-s-d-m-Y').'.xlsx';
    $objWriter->save(get_home_path().$linkPrL);

    $yml->save($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."eff_yml.xml");

}
//$objWriter = PHPExcel_IOFactory::createWriter($objXls, 'Excel5');
//$objWriter->save(str_replace('.php', '.xls', __FILE__));

echo date('H:i:s') , " Прайс лист сформирован." , EOL;