<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<?php 
$args_default = array( 
    'class' => array(),
); 
    
$args = wp_parse_args($args, $args_default );

?>

<form class="masterclass-feedback<?php echo empty($args['class']) ? '': ' ' . implode(' ', $args['class']);?>">
    <div class="left">
        <input type="text" placeholder="Имя" name="name" required>
        <input type="tel" placeholder="Телефон" name="phone" required>
        <label class="custom-checkbox-wrapper agreement-checkbox">
            <?php _e('Я согласен на обработку персональных данных'); ?>
            <input type="checkbox" checked="checked">
            <span class="checkmark"></span>
        </label>
    </div>
    <div class="right">
        <div class="feedback-type-choose-wrapper">
            <div class="option">
                <input type="radio" name="feedback-type" checked value="<?php _e('Консультация по телефону'); ?>">
                <svg id="_Слой_1" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg" width="23.1" height="22.92" viewBox="0 0 65.74 64.96">
                    <path d="m36.93,45.98c-1.12.08-1.97-.51-2.79-1.16-4.03-3.19-7.72-6.75-11.17-10.56-1.13-1.25-2.24-2.53-3.25-3.89-1.3-1.75-1.07-3.86.53-5.03.36-.27.8-.38,1.24-.47.98-.21,1.91-.57,2.71-1.17,1.09-.83,1.51-2.59,1.01-4.1-.27-.81-.59-1.61-1.07-2.34-2.13-3.24-3.88-6.69-5.61-10.15-.61-1.21-1.22-2.46-2.23-3.42-1.81-1.74-3.83-1.96-5.88-.52-2.27,1.59-4.45,3.32-6.3,5.41-1.69,1.9-2.42,4.16-2.24,6.67.14,1.87.86,3.59,1.62,5.28,2.62,5.85,5.75,11.41,9.63,16.53,3.01,3.97,6.34,7.65,10.09,10.94,6.05,5.31,12.74,9.62,20.09,12.89,1.72.77,3.41,1.6,5.27,2.04,3.23.76,5.95-.18,8.3-2.35,1.8-1.66,3.27-3.62,4.74-5.58,1.88-2.5.7-5.73-1.55-7.22-1.75-1.16-3.61-2.15-5.44-3.18-2.42-1.37-4.85-2.72-7.3-4.03-.96-.51-1.96-.92-3.1-.96-1.78-.06-2.85.83-3.58,2.34-.29.6-.4,1.25-.61,1.87-.49,1.46-1.49,2.17-3.03,2.17" style="fill:none;stroke:#383838;stroke-linecap:round;stroke-linejoin:round;stroke-width:4px" />
                </svg>
            </div>
            <div class="option">
                <input type="radio" name="feedback-type" value="<?php _e('Whatsapp'); ?>">
                <svg id="_Слой_1" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg" width="23.19" height="22.92" viewBox="0 0 65.74 64.96">
                    <defs>
                        <style>
                            .cls-1 {
                                fill: none;
                                stroke: #383838;
                                stroke-linecap: round;
                                stroke-linejoin: round;
                                stroke-width: 4px
                            }
                        </style>
                    </defs>
                    <path class="cls-1" d="m29.47,24.46c-.29.69-.78,1.23-1.3,1.75-1.97,1.98-2.11,5.46-.19,7.58,1.11,1.22,2.26,2.4,3.5,3.5,1.65,1.47,3.56,1.75,5.63,1.1,1.1-.34,1.91-1.11,2.73-1.87,1.28-1.18,3.64-1.19,4.91,0,1.51,1.42,3,2.88,4.4,4.41,1.25,1.36,1.3,3.16.33,4.58-.56.83-1.33,1.47-2.06,2.15-1.34,1.24-2.91,1.9-4.73,2.02-1.02.06-2.03,0-3.05,0-1.76-.01-3.49-.3-5.18-.74-4.01-1.04-7.57-2.95-10.63-5.76-3.21-2.95-5.54-6.48-6.94-10.62-1.04-3.07-1.36-6.24-1.29-9.46.03-1.41.39-2.74,1.11-3.95.7-1.17,1.71-2.08,2.71-2.98,1.35-1.22,3.6-1.24,4.92,0,1.28,1.2,2.5,2.47,3.77,3.68.92.88,1.61,1.85,1.61,3.18,0,0-.15,1.14-.26,1.42Z" />
                    <path class="cls-1" d="m1.48,63.58c1.42-.04,2.73-.29,3.76-.5,3.54-.71,7.08-1.43,10.63-2.14.17-.04.35-.07.52-.13,1.5-.55,2.85-.16,4.22.51,2.39,1.16,4.96,1.79,7.58,2.2,2.31.37,4.66.46,6.99.26,6.44-.55,12.24-2.77,17.3-6.85,3.87-3.11,6.83-6.92,8.93-11.41,1.2-2.56,2.02-5.25,2.45-8.04.37-2.4.5-4.81.31-7.26-.26-3.27-.95-6.42-2.17-9.45-1.29-3.21-3.1-6.12-5.36-8.76-2.91-3.39-6.38-6.02-10.38-7.94-2.5-1.2-5.14-2.03-7.89-2.49-2-.33-4.01-.55-6.03-.5-4.61.12-9,1.14-13.16,3.16-3.88,1.89-7.21,4.48-10.03,7.72-3.61,4.14-5.93,8.95-7.05,14.32-.47,2.25-.65,4.56-.6,6.86.08,3.19.61,6.3,1.62,9.33.4,1.19.8,2.41,1.44,3.49.51.87.26,1.71.09,2.54-.87,4.31-1.81,8.6-2.69,12.9-.12.58-.48,2.18-.48,2.18Z" />
                </svg>
            </div>
            <div class="option">
                <input type="radio" name="feedback-type" value="<?php _e('Telegram'); ?>">
                <svg width="25" height="22" viewBox="0 0 25 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23.7548 0.921519C23.653 0.83363 23.5292 0.775196 23.3967 0.75252C23.2641 0.729844 23.1279 0.743787 23.0028 0.792846L1.62846 9.15757C1.36848 9.2593 1.14853 9.44263 1.00162 9.68002C0.854718 9.91742 0.788798 10.1961 0.813763 10.4741C0.838727 10.7522 0.953227 11.0146 1.14007 11.2221C1.32691 11.4295 1.57601 11.5707 1.84995 11.6245L7.55792 12.7456V19.0938C7.55803 19.3881 7.64609 19.6756 7.8108 19.9195C7.9755 20.1634 8.20933 20.3525 8.48227 20.4626C8.75522 20.5727 9.05483 20.5987 9.34265 20.5372C9.63047 20.4758 9.89337 20.3298 10.0976 20.1179L12.9073 17.2038L17.2927 21.0481C17.5604 21.285 17.9055 21.4159 18.263 21.4162C18.4191 21.4158 18.5742 21.3913 18.7228 21.3434C18.9665 21.2663 19.1856 21.1267 19.3585 20.9385C19.5313 20.7503 19.6518 20.5201 19.7079 20.2708L23.9921 1.64609C24.0222 1.51515 24.016 1.37848 23.9742 1.2508C23.9324 1.12312 23.8565 1.00927 23.7548 0.921519ZM2.07881 10.3789C2.07477 10.368 2.07477 10.356 2.07881 10.3452C2.08358 10.3415 2.08893 10.3386 2.09463 10.3367L18.939 3.74281L8.04413 11.5475L2.09463 10.3831L2.07881 10.3789ZM9.18635 19.2383C9.15728 19.2684 9.11989 19.2893 9.07894 19.2981C9.03799 19.3069 8.99534 19.3034 8.95642 19.2879C8.91751 19.2724 8.88408 19.2456 8.86042 19.2111C8.83675 19.1765 8.82391 19.1357 8.82354 19.0938V13.621L11.9549 16.3632L9.18635 19.2383ZM18.475 19.985C18.4672 20.0207 18.45 20.0536 18.4251 20.0803C18.4003 20.107 18.3687 20.1266 18.3337 20.1369C18.2979 20.1494 18.2595 20.1521 18.2224 20.1447C18.1853 20.1373 18.1509 20.12 18.1227 20.0947L9.20745 12.2742L22.429 2.79886L18.475 19.985Z" fill="#383838" />
                </svg>
            </div>
        </div>
        <button type="submit"><?php _e('Оставить заявку'); ?></button>
    </div>
</form>