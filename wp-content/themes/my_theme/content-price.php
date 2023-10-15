<script>
$(document).ready(function() {
    $('table.price').filterTable({containerTag:'div',placeholder:'Введите слово или часть слова для поиска',ignoreColumns: [0,2,3], label:'Отфильтровать: ',
        callback: function(term, table) {
            var fItem = table.find('thead:eq(1)');
            var heightTop = $('#header').height();
            var hFixFilter = $('.filter-table').height();
            if ($(fItem).length != 0 && term.length > 0) { // существование элемента
                $('html, body').animate({ scrollTop: $(fItem).offset().top-(heightTop+hFixFilter) }, 500);
            }
            var elTbody = table.find('tbody');
            $(elTbody).each(function(indx, element){
            if(!$(element).find('tr').hasClass('visible'))
            {
                    $(element).prev().find('tr').css({visibility: "hidden", display:"none"});
            }
            else {
                    $(element).prev().find('tr').css({visibility: "visible", display:"table-row"});
            }
            });
        }
    });
    <?php
        $options = get_option( 'price-options' );
        if(!empty($options['pricelink']))
        {
        }
    ?>
});
</script>
<div id="content" class="wrap-price">
<style>
            table.price th, table.price td {
                text-align: center;
            }
            h1 {
                font-size: 20px !important;
            }
            h2 {
                font-family: "Bookman Old Style";
                font-size: 22px;
                font-weight: bold;
                font-style: italic;
            }
            table.price td {
                padding: 10px;
            }
            table.price td.left-tt, table.price th.left-tt {
                text-align: left;
                width: 25%;
            }
            table.price th.width54, table.price td.width54
            {
                width: 54px;
                height: 54px;
            }
            table.price td.right-tt, table.price th.right-tt {
                text-align: right;
                white-space: nowrap;
            }
            .filter-table input {
                width: 25%;
                border: 1px solid rgba(160, 160, 160, .3);
                position: relative;
                background-color: #ffffff;
                padding: 5px 8px;
                display: inline;
               // z-index: 99;
                outline: none;
                margin-right: 5px;
            }
            .filter-table {
                text-align: center;
                z-index: 2;
                padding: 3px 0px;
            }
            .filter-table input:focus::-webkit-input-placeholder {
                color: transparent;
            }
            .filter-table input:focus:-moz-placeholder {
                color: transparent;
            }
            .filter-table input:focus::-moz-placeholder {
                color: transparent;
            }
            .filter-table input:focus:-ms-input-placeholder {
                color: transparent;
            }
            .filter-table {
                font-size: 1.0em;
                width: 100%;
            }
            table.price tbody tr:nth-child(even) {
                background-color: #FFF;
            }
            table.price tbody tr:nth-child(odd) {
                background-color: #EBEBEB;
            }
            table.price tbody tr:hover {
                background-color: #C1D5F1;
            }
            table.price thead {
                background-color: transparent;
                color: #000 !important;
            }
            table.price thead h2 {
                color: #000 !important;
            }
            .size1em {
                font-size: 1.1em;
            }
            table.price {
                width: 90%;
                margin-bottom: 1rem;
                border-collapse: collapse;
            }
            table.price a {
                font-size: 1.0em !important;
                font-family: Arial !important;
            }
            /*.filter-table.fixed { position: fixed; bottom: 0.3em; right: 1em; border: 2px solid #3e3e3e; background-color: #fff; padding: 0.5em; border-radius: 4px; z-index: 12 !important; width: 50%; }
            .filter-table.fixed input {
                width: 60%;
            }
            */
            #attrakcions #sorting {
                text-align: right;
            }
            #getprice {
                display: inline-block;
                width: 152px;
                height: 26px;
                background: transparent url(<?php echo plugins_url(); ?>/createpricelistaa/images/getprice1.png) no-repeat center top;
                position: relative;
            }
            #getprice:hover {
                background: transparent url(<?php echo plugins_url(); ?>/createpricelistaa/images/getprice2.png) no-repeat center top;
            }
            .go-up, .go-down {
                 display: none;
                 position: fixed;
                 z-index: 9999;
                 right: 5%;
                 background: #4F4F4F;
                 border: 1px solid #ccc;
                 border-radius: 5px;
                 cursor: pointer;
                 color: #fff;
                 text-align: center;
                 font: normal normal 42px/42px sans-serif;
                 text-shadow: 0 1px 2px #000;
                 opacity: .5;
                 padding: 3px;
                 margin-bottom: 5px;
                 width: 42px;
                 height: 42px;
            }
            .go-up { bottom: 60px; }
            .go-down { bottom: 10px; }
            .go-down:hover,
            .go-up:hover {
                 opacity: 1;
                 box-shadow: 0 5px 0.5em -1px #666;
            }
            .is-sticky .filter-table {
                background-color: #D3D3D3;
            }
        </style>
    <div id="filter-block">
        <div class="caption"><h1 class="caption"><?php echo get_the_title(); ?></h1></div>
    </div>
    <div class="stuff" style="text-align: center; margin-bottom: 60px;">
        <div class="go-up" title="Вверх" id='ToTop'>⇧</div>
        <!--<div class="go-down" title="Вниз" id='OnBottom'>⇩</div>-->
    <table class="price">
    <?php
	//$cat = get_category('6', false);
    $current_page = max(1, get_query_var('paged'));
        if(empty($cats)){
            $terms = get_terms( 'category', array('hide_empty' => true, 'fields' => 'ids'));
            $categories = implode(',', $terms);
        }
		if($categories)
		{
		    ?>
            <thead id="attrakcions">
                <tr>
                    <td class="theader" colspan="5">
                        <div class="caption">
                            <h1 class="caption">Цены на аттракционы</h1>
                        </div>
                        <div id="sorting">
                        <span>
                            <form method="get" action="">
                                <label for="sort">Отсортировать: </label>
                                <select name="sort" size="1" onchange="this.form.submit()">
                                        <option value="name"
                                        <?php
                                            if(isset($_GET['sort'])&&$_GET['sort']=='name')
                                            {
                                                echo 'selected="selected"';
                                            }
                                            if(!isset($_GET['sort'])) {
                                                echo 'selected="selected"';
                                            }
                                        ?>
                                         >По названию</option>
                                        <option value="asc"
                                         <?php
                                            if(isset($_GET['sort'])&&$_GET['sort']=='asc')
                                            {
                                                echo 'selected="selected"';
                                            }
                                         ?>
                                        >(Цена) По возрастанию</option>
                                        <option value="desc"
                                         <?php
                                            if(isset($_GET['sort'])&&$_GET['sort']=='desc')
                                            {
                                                echo 'selected="selected"';
                                            }
                                         ?>
                                        >(Цена) По убыванию</option>
                                </select>
                            </form>
                        </span>
                        </div>
                    </td>
                </tr>
            </thead>
            <?php
                $args = array(
                    'cats' => $categories,
                    'post_type'	=> 'post',
                    'post_status' => 'publish',
                    'ignore_sticky_posts'	=> 1,
                    'posts_per_page' => 100,
                    'paged' => $current_page,
                    'page' => $current_page
                );
                $args = urldecode(http_build_query($args));
                ob_start();
                echo "<tbody>";
                    go_filter($args, $catID = -1); // запускаем функцию сортировки
					while(have_posts())
					{
						the_post();
						get_template_part( 'loop', 'priceattr' );
					}
                    //wp_reset_query();
                echo "</tbody>";
                ob_flush();
			//}
            ?>
        <?php
		}
       ?>
        </table>
        <?php
            emm_paginate();
            wp_reset_postdata();
        ?>
    </div>
</div>