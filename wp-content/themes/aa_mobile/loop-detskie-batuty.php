<?php
    $title = get_the_title();
    $price = get_post_meta($post->ID, 'wpcf-price_stuff', true);
    $price = number_format((int)$price, 0, '', ' ');
    $short_description = get_post_meta($post->ID, 'wpcf-short_description', true);

?>

          <div class="product">
            <figure class="product__slider"><?=get_the_post_thumbnail(null, [500, 400], ['class' =>  'product__image' ])?></figure>
            <div class="product__body">
              <div class="product__heading">
                <p class="product__title"><?=$title?></p>
              </div>
              <p class="product__text">
                 <?=$short_description?></p>
            </div>
            <div class="product__right">
              <p class="product__price">
                От <?=$price?> <span class="product__rubl">₽</span></p><a class="product__link button button-primary" href="<?=get_permalink()?>">Подробнее</a>
            </div>
          </div>