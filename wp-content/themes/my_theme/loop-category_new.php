<?php

		$title = get_the_title();
		$isot = get_post_meta($post->ID, 'wpcf-is_myot', true);
		$price = $priceCheck = get_post_meta($post->ID, 'wpcf-price_stuff', true);
		$short_description = get_post_meta($post->ID, 'wpcf-short_description', true);
		if(function_exists('types_render_field')) {
			$images_thumb = explode("|", types_render_field("photo", array("raw" => "true", "output" => "", "show_name" => "false", "url" => "false", "separator" => "|")));
			$images_thumb = array_slice($images_thumb, 0, 3);
		}
		$price = number_format((int)$price, 0, '', ' ').' Р';
		if ($isot) $price = "от $price";
		if (has_post_thumbnail()) {
			$thumbSrc = get_the_post_thumbnail_url(null, 'medium');
		}
		if(empty($priceCheck)) $price = 'по запросу'; ?>
					<div <?=isset($offset) ? "id=\"page-$offset\"" : ""?> class="col">
						<div id="product-<?= get_the_ID(); ?>" class="product card text-center h-100" data-href="<?= get_permalink() ?>">
							<? 
							$label = get_field('текст_метки_товара');
							if($label) { ?>
								<div class="prod-label" style="background-color:<?= get_field('цвет_метки_товара') ? get_field('цвет_метки_товара') : '#fe5d26' ?>;"><?= $label ?></div>
							<? } ?>
							<div class="btn-favorites position-absolute top-0 end-0"><?= do_shortcode('[ccc_my_favorite_select_button post_id="" style="1"]') ?>
									<!-- <i class="bi bi-suit-heart fs-4"></i>-->
								</div>
							<div style="width: 230px;height: auto;overflow:hidden;" class="img-items brazz">
								<img width="230" height="230" src="<?= $thumbSrc ?>" alt="">
								<?php foreach ($images_thumb as $img_src) { ?>
									<img width="230" height="230" src="<?= $img_src ?>" alt="">
								<?php } ?>
							</div>
							<div class="card-body py-0">
								<h5 class="card-title"><?= $title ?></h5>
								<p class="card-text text-center d-none d-sm-block"><?= $short_description ? $short_description : '' ?></p>
		
							</div>
							<div class="card-footer bg-white border-top-0">
								<div class="d-flex flex-column flex-sm-column flex-lg-row justify-content-between align-items-center">
									<div class="price-new"><?= $price ?></div>
									<a href="<?= get_permalink() ?>" class="btn btn-light stretched-link">Подробнее</a>
								</div>
							</div>
						</div>
					</div>



