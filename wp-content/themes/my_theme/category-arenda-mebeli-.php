<!DOCTYPE html>
<html lang="en">
<?
$sub_cetegories = get_field('под_категории', $cat);
if($sub_cetegories && count($sub_cetegories)) { ?>
	<div class="subcategories-list-wrp">
		<div class="container">
			<? if(wp_is_mobile()) { ?>
					<div class="subcategories-list">
							<span class="subcategories-list__item subcategories-list__item-mob">
								<? $icon = $sub_cetegories[0]['иконка']; ?>
								<img width="42" height="42" class="subcategories-list__item-img"  src="<?= $icon ? $icon : '/wp-content/uploads/water_icon_36x36-3.png' ?>" alt="<?= $sub_categories[0]['текст'] ?>" title="<?= $sub_categories[0]['текст'] ?>">
								<a href="<?= $sub_categories[0]['ссылка'] ?>" class="subcategories-list__item-txt"><?= $sub_categories[0]['текст'] ?></a>
							</span>
							<div class="subcategories-list__dropdown">
								<? $i = 1; foreach(get_field('под_категории', $cat) as $category) { ?>
									<? if($i == 1) {$i++; continue;} ?>
									<div class="subcategories-list__item-wrp">
										<?
										if ($category['метка']) {
											$link = get_term_link($category['метка']);
										} elseif ($category['категория']) {
											$link = get_term_link($category['категория']);
										} elseif ($category['запись']) {
											$link = get_the_permalink($category['запись'][0]->ID);
										}	
										?>
										<a href="<?= $link ?>" class="subcategories-list__item">
											<? 
												$icon = $category['иконка']; 
												$icon_ttl = $category['текст'];
											?>
											<img width="42" height="42" class="subcategories-list__item-img"  src="<?= $icon ? $icon : '/wp-content/uploads/water_icon_36x36-3.png' ?>" alt="<?= $icon_ttl ?>" title="<?= $icon_ttl ?>">
											<span class="subcategories-list__item-txt"><?= $icon_ttl ?></span>
										</a>
									</div>
								<? } ?>
							</div>
					</div>
			<? } else { ?>
			<div class="categories-cards-list row subcategories-list">
				<? $i = 1; foreach(get_field('под_категории', $cat) as $category) { ?>
					<? if($i > 10) { break; }?>
					<div class="col-lg-2 col-sm-3 subcategories-list__item-wrp">
						<?
						if ($category['метка']) {
							$link = get_term_link($category['метка']);
						} elseif ($category['категория']) {
							$link = get_term_link($category['категория']);
						} elseif ($category['запись']) {
							$link = get_the_permalink($category['запись'][0]->ID);
						}	
						?>
						<a href="<?= $link ?>" class="subcategories-list__item">
							<? 
								$icon = $category['иконка']; 
								$icon_ttl = $category['текст'];
							?>
							<img width="42" height="42" class="subcategories-list__item-img"  src="<?= $icon ? $icon : '/wp-content/uploads/water_icon_36x36-3.png' ?>" alt="<?= $icon_ttl ?>" title="<?= $icon_ttl ?>">
							<span class="subcategories-list__item-txt"><?= $icon_ttl ?></span>
						</a>
					</div>
				<? $i++; } ?>
			</div>
			<div class="categories-cards-list row categories-cards-list--loadmore subcategories-list" style="display:none">
				<? $i = 1; $ii = 0; foreach(get_field('под_категории', $cat) as $category) { ?>
					<? if($i <= 10) { $i++; continue; } ?>
						<div class="col-lg-2 col-sm-3 subcategories-list__item-wrp">
							<?
							if ($category['метка']) {
								$link = get_term_link($category['метка']);
							} elseif ($category['категория']) {
								$link = get_term_link($category['категория']);
							} elseif ($category['запись']) {
								$link = get_the_permalink($category['запись'][0]->ID);
							}	
							?>
							<a href="<?= $link ?>" class="subcategories-list__item">
								<? 
									$icon = $category['иконка']; 
									$icon_ttl = $category['текст'];
								?>
								<img width="42" height="42" class="subcategories-list__item-img"  src="<?= $icon ? $icon : '/wp-content/uploads/water_icon_36x36-3.png' ?>" alt="<?= $icon_ttl ?>" title="<?= $icon_ttl ?>">
								<span class="subcategories-list__item-txt"><?= $icon_ttl ?></span>
							</a>
						</div>
				<? $ii++; } ?>
			</div>
			<? if($ii > 0) { ?>
				<span class="categories-cards-list__loadmore categories-cards-list__loadmore--dark categories-cards-list__loadmore--show orange-btn orange-btn--transparent"><span>Загрузить еще <?= $ii ?></span><span style="display:none;">Скрыть</span></span>
			<? } ?>
			<? } ?>
		</div>
	</div>
<? 
} else {
	$sub_categories = get_terms('category', $args );
	if(count($sub_categories)) { ?>
	<div class="subcategories-list-wrp">
		<div class="container">
			<? if(wp_is_mobile()) { ?>
					<div class="subcategories-list">
							<span class="subcategories-list__item subcategories-list__item-mob">
								<? $icon = get_field('icon_subcat', $sub_categories[0]); ?>
								<img width="42" height="42" class="subcategories-list__item-img"  src="<?= $icon ? $icon : '/wp-content/uploads/water_icon_36x36-3.png' ?>" alt="<?= $sub_categories[0]->name ?>" title="<?= $sub_categories[0]->name ?>">
								<a href="<?= get_term_link($sub_categories[0]) ?>" class="subcategories-list__item-txt"><?= $sub_categories[0]->name ?></a>
							</span>
							<div class="subcategories-list__dropdown">
								<? $i = 1; foreach($sub_categories as $category) { ?>
									<? if($i == 1) {$i++; continue;} ?>
									<div class="subcategories-list__item-wrp">
										<a href="<?= get_term_link($category) ?>" class="subcategories-list__item">
											<?
												$icon = get_field('icon_subcat', $category); 
												$icon_ttl = get_field('icon_ttl', $category);
											?>
											<img width="42" height="42" class="subcategories-list__item-img"  src="<?= $icon ? $icon : '/wp-content/uploads/water_icon_36x36-3.png' ?>" alt="<?= $category->name ?>" title="<?= $category->name ?>">
											<span class="subcategories-list__item-txt"><?= $icon_ttl ? $icon_ttl : $category->name; ?></span>
										</a>
									</div>
								<? } ?>
							</div>
					</div>
			<? } else { ?>
			<div class="categories-cards-list row subcategories-list">
				<? $i = 1; foreach($sub_categories as $category) { ?>
					<? if($i > 10) { break; }?>
					<div class="col-lg-2 col-sm-3 subcategories-list__item-wrp">
						<a href="<?= get_term_link($category) ?>" class="subcategories-list__item">
							<? 
								$icon = get_field('icon_subcat', $category); 
								$icon_ttl = get_field('icon_ttl', $category);
							?>
							<img width="42" height="42" class="subcategories-list__item-img"  src="<?= $icon ? $icon : '/wp-content/uploads/water_icon_36x36-3.png' ?>" alt="<?= $category->name ?>" title="<?= $category->name ?>">
							<span class="subcategories-list__item-txt"><?= $icon_ttl ? $icon_ttl : $category->name; ?></span>
						</a>
					</div>
				<? $i++; } ?>
			</div>
			<div class="categories-cards-list row categories-cards-list--loadmore subcategories-list" style="display:none">
				<? $i = 1; $ii = 0; foreach($sub_categories as $category) { ?>
					<? if($i <= 10) { $i++; continue; } ?>
						<div class="col-lg-2 col-sm-3 subcategories-list__item-wrp">
							<a href="<?= get_term_link($category) ?>" class="subcategories-list__item">
								<? 
									$icon = get_field('icon_accordion', $category); 
									$icon_ttl = get_field('icon_ttl', $category);
								?>
								<img width="42" height="42" class="subcategories-list__item-img"  src="<?= $icon ? $icon : '/wp-content/uploads/water_icon_36x36-3.png' ?>" alt="<?= $category->name ?>" title="<?= $category->name ?>">
								<span class="subcategories-list__item-txt"><?= $icon_ttl ? $icon_ttl : $category->name; ?></span>
							</a>
						</div>
				<? $ii++; } ?>
			</div>
			<? if($ii > 0) { ?>
				<span class="categories-cards-list__loadmore categories-cards-list__loadmore--dark categories-cards-list__loadmore--show orange-btn orange-btn--transparent"><span>Загрузить еще <?= $ii ?></span><span style="display:none;">Скрыть</span></span>
			<? } ?>
			<? } ?>
		</div>
	</div>
	<? } ?>
<? //старый код вывода подкатегорий над листингом мероприятий }
}?>
<?php
	if($_COOKIE['debug'] != '1') {
		get_header('new');
        $cat = get_category(get_query_var('cat'), false);
        $quer_object = get_queried_object();
        $taxonomy = $quer_object->taxonomy;
        $term_id = $quer_object->term_id;
        $categories = get_categories( [
            'taxonomy'     => 'category',
            'type'         => 'post',
            'child_of'     => $quer_object->term_id,
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
        echo "<div class=\"row row-cols-2 row-cols-md-2 row-cols-lg-3 g-2\">";
            //$tags = get_tags(array('hide_empty'=>false)); //'orderby' => 'term_order'
            foreach ($categories as $category) {
                //$quer_object = get_queried_object();
                //$taxonomy = $tag->taxonomy;
                //$term_id = $tag->term_id;
                $category_img = get_term_meta( $category->term_id, 'wpcf-thumbsforcats', true );
            	//$tag_link = get_tag_link($tag->term_id);
                $category_link = get_category_link($category->term_id);
                //$tag_link = str_replace('tag/', '', $tag_link);
               $html .= "<div class=\"col\">
                            <div class=\"product card h-100\">
                                <img class=\"img-fluid\" alt=\"{$category->name}\" src=\"{$category_img}\" />
                                <div class=\"card-body text-center\">
                                    <span>{$category->name}</span>
                                    <a class=\"stretched-link\" href=\"{$category_link}\" data-src=\"{$category_link}\"></a>
                                </div>
                            </div>
                        </div>";
            }
            echo $html;
            echo "<div class=\"clearfix\"></div>";
        echo "</div>";
        get_footer('new');
    } else {
        get_header('inside');
        $cat = get_category(get_query_var('cat'), false);
        $quer_object = get_queried_object();
        $taxonomy = $quer_object->taxonomy;
        $term_id = $quer_object->term_id;
        $crosslinkIsOn = get_field('field_56b87dfb2b5dd', $taxonomy . '_' . $term_id);
        $crosslinkSwitch = get_field('field_56b887c59c835', $taxonomy . '_' . $term_id);
        $crosslinkIsOn = $crosslinkIsOn?'class="crosslink"':'';
        if($crosslinkIsOn&&$crosslinkSwitch=='link')
        {
            $crosslinkText = get_field('field_56b8b57f5714d', $taxonomy . '_' . $term_id);
            $crosslinkUrl = get_field('field_56b8b7d330478', $taxonomy . '_' . $term_id);
            $crossLinkSimp = "<div class=\"cross-link\">
                <span style=\"color:#ff7902;\">$crosslinkText</span>
                <div class=\"cover-bg\"><a class=\"shadowtext\" target=\"_blank\" href=\"$crosslinkUrl\">перейти на страницу</a></div>
            </div>";
        }
        else { $crossLinkSimp = ''; }
        if($crosslinkIsOn&&$crosslinkSwitch=='link_pres')
        {
            $crosslinkTextPres = get_field('field_56b8bb485a48b', $taxonomy . '_' . $term_id);
            $crossLinkPres =  "<div class=\"cross-link2\">
                <a class=\"fancybox\" title=\"Заявка на получение презентации\" href=\"#getpres_form_pop\">$crosslinkTextPres</a>
                <!--<div class=\"cover-bg\">создать запрос</div>-->
            </div>";
        }
        else { $crossLinkPres = ''; }
        $putHtml = "<div class=\"caption\" style=\"height: 30px;\"><h1 $crosslinkIsOn>$cat->name</h1>
               $crossLinkSimp"."$crossLinkPres
        </div>";
        echo $putHtml;
        echo "<div class=\"items_list\">";
            $tags = get_tags(array('hide_empty'=>false)); //'orderby' => 'term_order'
            foreach ($tags as $tag){
                $quer_object = get_queried_object();
                $taxonomy = $tag->taxonomy;
                $term_id = $tag->term_id;
                $tag_img = get_term_meta( $term_id, 'wpcf-thumbsfortags', true );
            	$tag_link = get_tag_link($tag->term_id);
                $tag_link = str_replace('tag/', '', $tag_link);
               $html .= "<div class=\"item\">
                         <a href=\"{$tag_link}\" data-src=\"{$tag_link}\">
            			    <div class=\"pic\">
            				    <img alt=\"{$tag->name}\" src=\"{$tag_img}\" />
                                <div class=\"block-item-title\"><div class=\"block-item-title__hover\">Подробнее</div></div>
                            </div>
            		    <div class=\"cpt\">
            			    <i>{$tag->name}</i><div class=\"clear\"></div>
                    	</div>
                        </a>
                    </div>";
            }
            echo $html;
            echo "<div class=\"clear\"></div>";
        echo "</div>";
    get_footer('inside_category');
}