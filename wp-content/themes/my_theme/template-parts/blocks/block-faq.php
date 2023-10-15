<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<?php if (have_rows('faq', 'masterclass')) : ?>
    <section class="faq-section">
        <div class="container">
            <h2 class="h1 title-with-margin"><?php _e('Часто задаваемые вопросы'); ?></h2>
            <div class="faq-wrapper">
                <?php while (have_rows('faq', 'masterclass')) : the_row(); ?>

                    <div class="spoiler-block">
                        <div class="spoiler-title"><?php echo get_sub_field('faq_title'); ?></div>
                        <div class="spoiler-content">
                            <p><?php echo get_sub_field('faq_answer'); ?></p>
                        </div>
                    </div>

                <?php endwhile; ?>
            </div>
        </div>
    </section>

<?php endif; ?>