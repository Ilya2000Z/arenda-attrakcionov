<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<?php if (have_posts('instruments') || have_posts('requires') ): ?>
    <section class="what-we-do-what-you-can-section">
        <div class="container">
            <div class="left">
                <h2 class="h1"><?php _e('Что мы предоставляем'); ?></h2>
                <div class="wrapper">
                    <?php while (have_rows('instruments')) : the_row(); ?>
                        <div class="done-icon-with-text">
                            <div class="icon">✔</div>
                            <div class="text"><?php echo get_sub_field('name'); ?></div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="right">
                <h2 class="h1"><?php _e('Что потребуется от вас');?><span class="color-gray">*</span></h2>
                <div class="wrapper">
                    <?php while (have_rows('requires')) : the_row(); ?>
                        <div class="done-icon-with-text">
                            <div class="icon">✔</div>
                            <div class="text"><?php echo get_sub_field('name'); ?></div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <span class="color-gray gray-text"><?php _e('*мы можем предоставить все необходимое оборудование «под ключ»');?></span>
            </div>
        </div>
    </section>
<?php endif; ?>