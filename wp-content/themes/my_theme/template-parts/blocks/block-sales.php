<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<?php
    $sale_slider = get_field('sales', 'masterclass');
    $size = 'full';
?>

<?php if ($sale_slider) : ?>
    <section class="profitable-offers-section">
        <div class="container">
            <h2 class="h1 title-with-margin"><?php _e('Выгодные предложения'); ?></h2>
            <div class="three-items-slider">
                <div class="swiper">
                    <div class="swiper-wrapper popup-gallery">
                        <?php foreach ($sale_slider as $image_id) : ?>
                            <div class="swiper-slide">
                                <a href="<?php echo wp_get_attachment_image_url($image_id, $size); ?>" class="img-link">
                                <?php echo wp_get_attachment_image($image_id, $size); ?>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="swiper-button-next"><span>></span></div>
                <div class="swiper-button-prev"><span>< </span></div>
            </div>
        </div>
    </section>
<?php endif; ?>