<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<?php get_header('new'); ?>

<?php get_template_part('template-parts/master', 'single', $args ); ?>

<?php get_template_part('template-parts/master', 'info', $args ); ?>

<?php get_template_part('template-parts/blocks/block', 'popups'); ?>

<?php get_footer('new'); ?>