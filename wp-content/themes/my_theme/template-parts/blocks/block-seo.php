<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
} ?>

<?php if (have_rows('seo', 'masterclass')) : ?>

    <section class="seo-section">
        <div class="container">

            <?php while (have_rows('seo', 'masterclass')) : the_row(); ?>
                <h2 class="h1 title-with-margin"><?php echo get_sub_field('seo_title'); ?></h2>
                <div class="faq-wrapper">
                    <div class="add-padding-border">
                        <div class="text" title="Показать больше текста">
                            <?php echo get_sub_field('seo_text'); ?>
                        </div>
                    </div>

                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>