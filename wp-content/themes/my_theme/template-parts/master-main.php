<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
<?php
$categories = get_categories(
	array(
		'taxonomy' => 'masterclass-cat',
		// 'parent' => $category->term_id
	)
);
?>
<div class="first-screen">
	<div class="bg-image">
		<img src="<?php echo get_category_banner_link('masterclass'); ?>" alt="">
	</div>
	<div class="container">
		<div class="columns-wrapper">
			<div class="left-col">
				<div class="top round-block">
					<h2 class="title"><?php the_title(); ?></h2>
					<div class="text-block">
						<p><?php the_content(); ?></p>
					</div>
					<div class="advantages-wrapper">
						<div class="orange-advantage-block">
							<div class="main-text"><?php _e('200+'); ?></div>
							<div class="small-text"><?php _e('Мастер-классов'); ?></div>
						</div>
						<div class="orange-advantage-block">
							<div class="main-text"><?php _e('5 лет'); ?></div>
							<div class="small-text"><?php _e('На рынке'); ?></div>
						</div>
						<div class="orange-advantage-block">
							<div class="main-text infinity-symbol-wrapper"><span class="infinity-symbol"><?php _e('∞'); ?></span></div>
							<div class="small-text"><?php _e('Всё включено'); ?></div>
						</div>
					</div>
					<div class="orange-advantage-block">
						<div class="main-text"><?php _e('Собственная студия'); ?></div>
						<div class="small-text"><?php _e('В Москве'); ?></div>
					</div>
				</div>
				<div class="bottom round-block">
					<?php get_template_part('template-parts/blocks/block', 'form'); ?>
				</div>
			</div>
			<div class="right-col">
				<img src="<?php echo get_category_thumb_link('masterclass'); ?>" alt="">
			</div>
		</div>
	</div>
</div>
<section class="master-classes-categories">

	<div class="container">
		<h2 class="h1 title-with-margin"><?php _e('Категории мастер-классов'); ?></h2>
		<div class="master-class-cards-wrapper">
			<?php foreach ($categories as $category) : ?>
				<div class="master-class-card">
					<a href="<?php echo esc_url(get_term_link($category, $category->taxonomy)); ?>" class="link"></a>
					<img src="<?php echo get_category_thumb_link($category->term_id); ?>" alt="">
					<p class="text"><?php echo $category->name; ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>