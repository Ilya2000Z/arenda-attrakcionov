<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<?php $labels = get_field('метки', 'masterclass-cat_' . get_queried_object_id()); ?>
<?php if ($labels) : ?>

    <nav class="subcategories-wrapper">
        <div class="mobile-title"><?php _e('Фильтры'); ?></div>
        <div class="wrapper">
            <?php foreach ($labels as $label) : ?>
                <div class="subcategory-link">
                    <?php if ($label['рубрика']): ?>
                        <a href="<?php echo get_term_link((int) $label['рубрика']); ?>"><?php echo $label['текст']; ?></a>
                        <?php else: ?>
                            <?php echo $label['текст']; ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </nav>
<?php endif; ?>