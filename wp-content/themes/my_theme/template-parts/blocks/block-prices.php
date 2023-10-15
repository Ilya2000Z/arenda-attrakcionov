<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<?php
$fields = array(
    'players',
    'master',
    'hours',
    'age'
);
?>

<section class="sets-prices-section">
    <div class="container">
        <h2 class="h1 title-with-margin"><?php _e('Стоимость и комплекты'); ?></h2>
        <!-- пришлось дублировать этот блок для мобилки, слишком разный вид карточек там и там -->
        <div class="sets-wrapper-desktop">
            <?php while (have_rows('prices')) : the_row(); ?>
                <?php $background_uri = wp_get_attachment_url(get_sub_field('background')); ?>
                <div class="set-card" style="background-image: url('<?php echo $background_uri; ?>');">
                    <div class="description">
                        <h3 class="title"><?php echo get_sub_field('title'); ?></h3>
                        <?php foreach ($fields as $field) : ?>
                            <div class="icon-with-text">
                                <?php echo get_exists_image_or_default($field . '_icon', $field); ?>
                                <div class="text"><?php echo get_sub_field($field); ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="price-wrapper">
                        <div class="icon-with-text price">
                            <?php echo get_exists_image_or_default('price_icon', 'price'); ?>
                            <div class="text"><?php echo get_sub_field('price'); ?> Р</div>
                        </div>
                        <?php if ($second_price = get_sub_field('second_price')) : ?>
                            <div class="icon-with-text">
                                <?php echo get_exists_image_or_default('second_price_icon', 'plus'); ?>
                                <div class="text"><?php echo $second_price; ?> Р/доп.участник</div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <a class="button popup-btn" href="#feedback-popup"><?php _e('Оставить заявку'); ?></a>

                    <a href="<?php echo $background_uri; ?>" class="popup-img">
                        <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M27.125 27.125L19.375 19.375M3.875 12.9167C3.875 14.104 4.10887 15.2798 4.56326 16.3768C5.01764 17.4737 5.68365 18.4705 6.52324 19.3101C7.36284 20.1497 8.35959 20.8157 9.45657 21.2701C10.5536 21.7245 11.7293 21.9583 12.9167 21.9583C14.104 21.9583 15.2798 21.7245 16.3768 21.2701C17.4737 20.8157 18.4705 20.1497 19.3101 19.3101C20.1497 18.4705 20.8157 17.4737 21.2701 16.3768C21.7245 15.2798 21.9583 14.104 21.9583 12.9167C21.9583 11.7293 21.7245 10.5536 21.2701 9.45657C20.8157 8.35959 20.1497 7.36284 19.3101 6.52324C18.4705 5.68365 17.4737 5.01764 16.3768 4.56326C15.2798 4.10887 14.104 3.875 12.9167 3.875C11.7293 3.875 10.5536 4.10887 9.45657 4.56326C8.35959 5.01764 7.36284 5.68365 6.52324 6.52324C5.68365 7.36284 5.01764 8.35959 4.56326 9.45657C4.10887 10.5536 3.875 11.7293 3.875 12.9167Z" stroke="#C2C1C1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12.32 13.36H9.2V12.02H12.32V8.7H13.66V12.02H16.8V13.36H13.66V16.7H12.32V13.36Z" fill="#C2C1C1" />
                        </svg>
                    </a>
                </div>
            <?php endwhile; ?>

        </div>
        <div class="sets-wrapper-mobile">
            <?php while (have_rows('prices')) : the_row(); ?>
                <?php $background_uri = wp_get_attachment_url(get_sub_field('background')); ?>
                <div class="set-card-mobile">
                    <div class="image">
                        <a href="<?php echo $background_uri; ?>" class="popup-img">
                            <img src="<?php echo $background_uri; ?>" alt="">
                            <div class="zoom-icon">
                                <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M27.125 27.125L19.375 19.375M3.875 12.9167C3.875 14.104 4.10887 15.2798 4.56326 16.3768C5.01764 17.4737 5.68365 18.4705 6.52324 19.3101C7.36284 20.1497 8.35959 20.8157 9.45657 21.2701C10.5536 21.7245 11.7293 21.9583 12.9167 21.9583C14.104 21.9583 15.2798 21.7245 16.3768 21.2701C17.4737 20.8157 18.4705 20.1497 19.3101 19.3101C20.1497 18.4705 20.8157 17.4737 21.2701 16.3768C21.7245 15.2798 21.9583 14.104 21.9583 12.9167C21.9583 11.7293 21.7245 10.5536 21.2701 9.45657C20.8157 8.35959 20.1497 7.36284 19.3101 6.52324C18.4705 5.68365 17.4737 5.01764 16.3768 4.56326C15.2798 4.10887 14.104 3.875 12.9167 3.875C11.7293 3.875 10.5536 4.10887 9.45657 4.56326C8.35959 5.01764 7.36284 5.68365 6.52324 6.52324C5.68365 7.36284 5.01764 8.35959 4.56326 9.45657C4.10887 10.5536 3.875 11.7293 3.875 12.9167Z" stroke="#C2C1C1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12.32 13.36H9.2V12.02H12.32V8.7H13.66V12.02H16.8V13.36H13.66V16.7H12.32V13.36Z" fill="#C2C1C1" />
                                </svg>
                            </div>
                        </a>

                    </div>
                    <div class="text-wrapper">
                        <div class="left">
                            <div class="title"><?php echo get_sub_field('title'); ?></div>
                            <div class="list">
                                <?php foreach ($fields as $field) : ?>
                                    <span><?php echo get_sub_field($field); ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="right">
                            <div class="price-wrapper">
                                <div class="price"><?php echo get_sub_field('price'); ?> Р</div>
                                <div class="text"><?php echo get_sub_field('second_price'); ?> Р/доп.участник</div>
                            </div>
                            <a href="#" class="button"><?php _e('Оставить заявку');?></a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>