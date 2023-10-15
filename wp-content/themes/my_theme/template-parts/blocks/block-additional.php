<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<?php if (have_rows('additional1') && have_rows('additional2')) : ?>
    <section class="additional-options-section">
        <div class="container">
            <h2 class="h1 title-with-margin"><?php _e('Дополнительно'); ?></h2>
            <?php for ($i = 1; $i <= 2; $i++): ?>
            <div class="additional-option-type<?php echo $i; ?>-wrapper">
                <?php while (have_rows('additional' . $i)): the_row(); ?>
                    <div class="additional-option-card-type<?php echo $i; ?>">
                        <?php if ($i == 2): ?>
                            <a href="#" class="link"></a>
                        <?php endif; ?>
                        <?php echo wp_get_attachment_image(get_sub_field('image')); ?>
                        <div class="title"><?php echo get_sub_field('name'); ?></div>
                        <div class="price"><?php echo get_sub_field('price');?> Р</div>
                        <?php if ($second_price = get_sub_field('second_price')): ?>
                            <div class="additional-price"><?php _e('доп. час');?> <?php echo $second_price;?> Р</div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php endfor; ?>
        </div>
    </section>
<?php endif; ?>