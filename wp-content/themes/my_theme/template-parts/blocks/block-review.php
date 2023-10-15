<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

?>
<?php
$reviews = get_field('reviews', 'masterclass');
$size = 'full';
?>
<?php if ($reviews) : ?>

    <section class="reviews-section">
        <div class="container">
            <h2 class="h1 title-with-margin"><?php _e('Отзывы'); ?></h2>
            <div class="any-items-slider reviews-slider">
                <div class="swiper">
                    <div class="swiper-wrapper popup-gallery">
                        <?php foreach ($reviews as $image_id) : ?>
                            <div class="swiper-slide review-slide">
                                <a class="img-link" href="<?php echo wp_get_attachment_image_url($image_id, $size); ?>">
                                    <?php echo wp_get_attachment_image($image_id, $size); ?>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="swiper-button-next"><span>></span></div>
                <div class="swiper-button-prev"><span>
                        < </span>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>