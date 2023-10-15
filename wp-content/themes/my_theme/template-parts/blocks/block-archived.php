<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

?>
<?php
$archived = get_field('archived_events', 'masterclass');
?>
<?php if ($archived) : ?>
    <section class="held-masterclasses-section">
        <div class="container">
            <h2 class="h1 title-with-margin"><?php _e('Проведенные мастер-классы'); ?></h2>
            <div class="four-items-slider mb30">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($archived as $post) : ?>
                            <?php setup_postdata($post); ?>
                            <div class="swiper-slide held-mc-card">
                                <a href="<?php the_permalink(); ?>" class="img-link">
                                    <?php the_post_thumbnail('medium'); ?>
                                    <span class="text"><?php the_title(); ?></span>
                                </a>
                            </div>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
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