<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<?php
$gallery = get_field('gallery');
?>
<div class="main-content">
    <section class="first-section">
        <div class="container">
            <?php echo the_master_breadcrumbs(); ?>
            <div class="two-cols-wrapper">
                <div class="gallery-block">
                    <div class="thumbs-gallery">
                        <div class="swiper preview-block">
                            <div class="swiper-wrapper">
                                <?php foreach ($gallery as $slide) : ?>
                                    <div class="swiper-slide video-slide" data-link="<?php echo $slide['youtube']; ?>">
                                        <?php echo wp_get_attachment_image($slide['photo'], 'full') ?>
                                        <div class="play-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="48" viewBox="0 0 42 48" fill="none">
                                                <path d="M40.5 21.4019C42.5 22.5566 42.5 25.4434 40.5 26.5981L4.5 47.3827C2.5 48.5374 1.49388e-06 47.094 1.59483e-06 44.7846L3.41188e-06 3.21539C3.51283e-06 0.905985 2.5 -0.537388 4.5 0.617313L40.5 21.4019Z" fill="white" />
                                            </svg>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="thumbs-block">
                            <div thumbsSlider="" class="swiper">

                                <div class="swiper-wrapper">
                                    <?php foreach ($gallery as $slide) : ?>
                                        <div class="swiper-slide">
                                            <?php echo wp_get_attachment_image($slide['photo'], 'medium') ?>
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
                </div>
                <div class="description-block">
                    <div class="description">
                        <h1 class="title"><?php the_title(); ?></h1>
                        <div class="text-wrapper">
                            <?php the_content(); ?>
                        </div>
                        <div class="icons-wrapper">
                            <?php
                            $g_fields = array('players', 'hours', 'age');
                            ?>
                            <?php foreach ($g_fields as $field) : ?>
                                <div class="icon-block">
                                    <?php echo get_exists_image_or_default($field . '_icon', $field); ?>
                                    <div class="text"><?php echo get_field($field); ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php get_template_part('template-parts/blocks/block', 'form', array('class' => array('feedback-global-form'))); ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/blocks/block', 'prices'); ?>

    <section class="event-formats-section">
        <?php get_template_part('template-parts/blocks/block', 'formats'); ?>
    </section>


    <section class="about-moscow-studio-section">
        <?php get_template_part('template-parts/blocks/block', 'studio'); ?>
    </section>
</div>