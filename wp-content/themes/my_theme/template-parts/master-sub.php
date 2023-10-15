<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
<?php
$cat_id = 'masterclass-cat_' . get_queried_object_id();
?>

<div class="first-screen">

    <div class="container">
        <div class="bg-image">
            <img src="<?php echo get_category_banner_link($cat_id); ?>" alt="">
        </div>
        <div class="columns-wrapper">
            <?php the_master_breadcrumbs() ?>
            <div class="wrapper">
                <div class="top round-block">
                    <h2 class="title"><?php the_title(); ?></h2>
                    <div class="text-block">
                        <p><?php echo term_description(); ?></p>
                    </div>
                </div>
                <div class="bottom round-block">
                    <?php get_template_part('template-parts/blocks/block', 'form'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="master-classes-catalogue">
    <div class="container">
        <h2 class="h1 title-with-margin"><?php _e('Каталог'); ?></h2>

        <?php get_template_part('template-parts/blocks/block', 'filter', $args); ?>
        
        <div class="content-wrapper">
            <div class="master-class-catalogue-wrapper">
                <?php while (have_posts()) : the_post(); ?>

                    <div class="master-class-catalogue-card">
                        <a href="<?php the_permalink() ?>" class="link"></a>
                        <?php the_post_thumbnail('medium'); ?>
                        <div class="text-wrapper">
                            <p class="text"><?php the_title(); ?></p>
                            <?php if ($price = get_min_price(get_the_ID())): ?>
                                <div class="price">от <?php echo $price; ?> Р</div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>

            </div>

            <?php $pagination = paginate_links(
                        array(
                            'type'      => 'list',
                            'mid_size'  => 0,
                            'prev_text' => '<',
                            'next_text' => '>'
                        )
                    ); ?>
            <?php if ($pagination): ?>
                <div class="navigation-block">

                    <a href="#" class="show-more-btn">Показать еще</a>
                    <nav class="pagination-block">
                        <?php echo $pagination; ?>
                    </nav>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>