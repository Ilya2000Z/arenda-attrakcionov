<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
<div class="container">
    <h2 class="h1 title-with-margin"><?php _e('Форматы проведения'); ?></h2>
    <div class="event-formats-wrapper">
        <div class="event-format-card">
            <h3 class="title"><?php _e('Групповой'); ?></h3>
            <img class="image" src="<?php echo get_stylesheet_directory_uri() . '/assets/img/group-icon.svg'; ?>" alt="">
            <div class="text-wrapper">
                <p class="top-text"><?php _e('Подходит для групп до 25 участников:'); ?></p>
                <div class="two-cols">
                    <ul>
                        <li><?php _e('корпоратив'); ?></li>
                        <li><?php _e('День Рождения'); ?></li>
                    </ul>
                    <ul>
                        <li><?php _e('тимбилдинг'); ?></li>
                        <li><?php _e('семейный праздник'); ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="event-format-card">
            <h3 class="title"><?php _e('Потоковый'); ?></h3>
            <img class="image" src="<?php echo get_stylesheet_directory_uri() . '/assets/img/potok-icon.svg'; ?>" alt="">
            <div class="text-wrapper">
                <p class="top-text"><?php _e('Подходит для групп от 25 участников:'); ?></p>
                <div class="two-cols">
                    <ul>
                        <li><?php _e('выставка'); ?></li>
                        <li><?php _e('конференция'); ?></li>
                    </ul>
                    <ul>
                        <li><?php _e('масштабное мероприятие'); ?></li>
                        <li><?php _e('рекламные акции'); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>