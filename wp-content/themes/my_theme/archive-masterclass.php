<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<?php get_header('mk'); ?>

<?php get_template_part('template-parts/master', 'main', $args ); ?>

<?php get_template_part('template-parts/master', 'info', $args ); ?>

<?php get_template_part('template-parts/blocks/block', 'popups'); ?>

<?php get_footer('new'); ?>