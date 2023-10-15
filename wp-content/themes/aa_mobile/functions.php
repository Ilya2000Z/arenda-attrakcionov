<?php
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
add_filter('xmlrpc_enabled', '__return_false');

// Фильтр для WP-API version 1.x
add_filter('json_enabled', '__return_false');
add_filter('json_jsonp_enabled', '__return_false');

// Фильтр для WP-API version 2.x
add_filter('rest_enabled', '__return_false');
add_filter('rest_jsonp_enabled', '__return_false');

add_filter('xmlrpc_enabled', '__return_false');

register_sidebar(array(
    'name' => __( 'Промо карточка в категории (mobile)', '' ),
    'id' => 'cat-items-promo-mobile',
    'description' => 'Блок в начале списка карточек в категории',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
));

register_sidebar(array(
    'name' => __( 'Баннер в карточке товара (mobile)', '' ),
    'id' => 'banner-on-items',
    'description' => 'Баннер перед основным описанием',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
));

//

register_sidebar(array(
    'name' => 'Соцкнопки в подвале',
    'id' => 'sidebar-socials_bottom',
    'description' => 'Соцкнопки в подвале',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
));

add_shortcode( 'holiday', 'holiday2' );

function holiday2(){

    $year = '2000';

    $start_date = date('Ymd', mktime(0, 0, 0, date('m'), date('d'), $year));
    $end_date = date('Ymd', mktime(0, 0, 0, date('m')+2, date('d'), $year));

    //echo $start_date.'<br>';
    //echo $end_date;

    $terms = get_term_children( 308, 'category' );
    echo '<span class="sidebar-title">Ближайшие праздники</span>  ';
    echo '<ul class="holidays">';
    foreach ($terms as $child) {
        $term = get_term_by( 'id', $child, 'category' );
        $data = $year.substr(get_term_meta($term->term_id, 'data', true), 4);
       // echo $data.'<br>';
        if($data >= $start_date && $data <= $end_date){
            echo '<li><a href="' . get_term_link( $term->term_id, $term->taxonomy ) . '">' . $term->name . '</a></li>';
        }
    }

    echo '</ul>';
}

// Добавил опцию в тему

function js_var(){
    $variables = array (
        'ajax_url' => admin_url('admin-ajax.php'),
        'is_mobile' => wp_is_mobile()
    );
    echo '<script type="text/javascript">window.wp_data = ',json_encode($variables),';</script>';
}
add_action('wp_head','js_var');


function style_popup_off () {
    return 1;
}
add_action('hustle_disable_front_styles', 'style_popup_off');

// hardcode
function add_inline_style_popup(){
    echo '<style type="text/css" id="hustle-module-3-0-styles" class="hustle-module-styles hustle-module-styles-3">@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-popup-content {max-width: 355px;max-height: none;max-height: unset;overflow-y: initial;}}@media screen and (min-width: 783px) { .hustle-layout {max-height: none;max-height: unset;}} .hustle-ui.module_id_3  {padding-right: 10px;padding-left: 10px;}.hustle-ui.module_id_3  .hustle-popup-content .hustle-info,.hustle-ui.module_id_3  .hustle-popup-content .hustle-optin {padding-top: 10px;padding-bottom: 10px;} .hustle-ui.module_id_3 .hustle-layout {padding: 0px 0px 0px 0px;border-width: 0px 0px 0px 0px;border-style: solid;border-color: #DADADA;border-radius: 0px 0px 0px 0px;background-color: #38454E;-moz-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);-webkit-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);} .hustle-ui.module_id_3 .hustle-layout .hustle-layout-header {padding: 20px 20px 20px 20px;border-width: 0px 0px 1px 0px;border-style: solid;border-color: rgba(0,0,0,0.16);border-radius: 0px 0px 0px 0px;background-color: rgba(0,0,0,0);-moz-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);-webkit-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);} .hustle-ui.module_id_3 .hustle-layout .hustle-layout-content {padding: 0px 0px 0px 0px;border-width: 0px 0px 0px 0px;border-style: solid;border-radius: 0px 0px 0px 0px;border-color: rgba(0,0,0,0);background-color: rgba(0,0,0,0);} .hustle-ui.module_id_3 .hustle-layout .hustle-layout-footer {padding: 1px 20px 20px 20px;border-width: 0px 0px 0px 0px;border-style: solid;border-color: rgba(0,0,0,0);border-radius: 0px 0px 0px 0px;background-color: rgba(0,0,0,0.16);-moz-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);-webkit-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);}  .hustle-ui.module_id_3 .hustle-layout .hustle-content {margin: 0px 0px 0px 0px;padding: 0 20px 0 20px;border-width: 0px 0px 0px 0px;border-style: solid;border-radius: 0px 0px 0px 0px;border-color: rgba(0,0,0,0);background-color: rgba(0,0,0,0);}.hustle-ui.module_id_3 .hustle-layout .hustle-content .hustle-content-wrap {padding: 20px 0 20px 0;} .hustle-ui.module_id_3 .hustle-layout .hustle-group-content {margin: 0px 0px 0px 0px;padding: 0px 0px 0px 0px;border-color: rgba(0,0,0,0);border-width: 0px 0px 0px 0px;border-style: solid;color: #ADB5B7;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content b,.hustle-ui.module_id_3 .hustle-layout .hustle-group-content strong {font-weight: bold;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content a,.hustle-ui.module_id_3 .hustle-layout .hustle-group-content a:visited {color: #38C5B5;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content a:hover {color: #2DA194;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content a:focus,.hustle-ui.module_id_3 .hustle-layout .hustle-group-content a:active {color: #2DA194;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content {color: #ADB5B7;font-size: 14px;line-height: 1.45em;font-family: Open Sans;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content p:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: normal 14px/1.45em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content p:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content p:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content p:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content h1:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 28px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content h1:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content h1:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content h1:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content h2:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font-size: 22px;line-height: 1.4em;font-weight: 700;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content h2:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content h2:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content h2:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content h3:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 18px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content h3:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content h3:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content h3:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content h4:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 16px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content h4:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content h4:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content h4:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content h5:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 14px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content h5:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content h5:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content h5:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content h6:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 12px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: uppercase;text-decoration: none;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content h6:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content h6:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content h6:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]),.hustle-ui.module_id_3 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]):last-child,.hustle-ui.module_id_3 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]):last-child {margin-bottom: 0;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content li:not([class*="forminator-"]) {margin: 0 0 5px;color: #ADB5B7;font: normal 14px/1.45em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content li:not([class*="forminator-"]):last-child {margin-bottom: 0;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]) li:before {color: #ADB5B7}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]) li:before {color: #ADB5B7}@media screen and (min-width: 783px) {.hustle-ui.module_id_3 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]),.hustle-ui.module_id_3 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]) {margin: 0 0 20px;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]):last-child,.hustle-ui.module_id_3 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]):last-child {margin: 0;}}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content li:not([class*="forminator-"]) {margin: 0 0 5px;}.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content li:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content blockquote {margin-right: 0;margin-left: 0;}.hustle-ui.module_id_3 button.hustle-button-close {color: #38C5B5;}.hustle-ui.module_id_3 button.hustle-button-close:hover {color: #49E2D1;}.hustle-ui.module_id_3 button.hustle-button-close:focus,.hustle-ui.module_id_3 button.hustle-button-close:active {color: #FFFFFF;}.hustle-ui.module_id_3 .hustle-popup-mask {background-color: rgba(51,51,51,0.9);} .hustle-ui.module_id_3 .hustle-layout .hustle-group-content blockquote {border-left-color: #38C5B5;}</style><style type="text/css" id="hustle-module-2-0-styles" class="hustle-module-styles hustle-module-styles-2">@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-popup-content {max-width: 355px;max-height: none;max-height: unset;overflow-y: initial;}}@media screen and (min-width: 783px) { .hustle-layout {max-height: none;max-height: unset;}} .hustle-ui.module_id_2  {padding-right: 10px;padding-left: 10px;}.hustle-ui.module_id_2  .hustle-popup-content .hustle-info,.hustle-ui.module_id_2  .hustle-popup-content .hustle-optin {padding-top: 10px;padding-bottom: 10px;} .hustle-ui.module_id_2 .hustle-layout {padding: 0px 0px 0px 0px;border-width: 0px 0px 0px 0px;border-style: solid;border-color: #DADADA;border-radius: 0px 0px 0px 0px;background-color: #38454E;-moz-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);-webkit-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);} .hustle-ui.module_id_2 .hustle-layout .hustle-layout-header {padding: 20px 20px 20px 20px;border-width: 0px 0px 1px 0px;border-style: solid;border-color: rgba(0,0,0,0.16);border-radius: 0px 0px 0px 0px;background-color: rgba(0,0,0,0);-moz-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);-webkit-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);} .hustle-ui.module_id_2 .hustle-layout .hustle-layout-content {padding: 0px 0px 0px 0px;border-width: 0px 0px 0px 0px;border-style: solid;border-radius: 0px 0px 0px 0px;border-color: rgba(0,0,0,0);background-color: rgba(0,0,0,0);} .hustle-ui.module_id_2 .hustle-layout .hustle-layout-footer {padding: 1px 20px 20px 20px;border-width: 0px 0px 0px 0px;border-style: solid;border-color: rgba(0,0,0,0);border-radius: 0px 0px 0px 0px;background-color: rgba(0,0,0,0.16);-moz-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);-webkit-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);}  .hustle-ui.module_id_2 .hustle-layout .hustle-content {margin: 0px 0px 0px 0px;padding: 0 20px 0 20px;border-width: 0px 0px 0px 0px;border-style: solid;border-radius: 0px 0px 0px 0px;border-color: rgba(0,0,0,0);background-color: rgba(0,0,0,0);}.hustle-ui.module_id_2 .hustle-layout .hustle-content .hustle-content-wrap {padding: 20px 0 20px 0;} .hustle-ui.module_id_2 .hustle-layout .hustle-group-content {margin: 0px 0px 0px 0px;padding: 0px 0px 0px 0px;border-color: rgba(0,0,0,0);border-width: 0px 0px 0px 0px;border-style: solid;color: #ADB5B7;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content b,.hustle-ui.module_id_2 .hustle-layout .hustle-group-content strong {font-weight: bold;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content a,.hustle-ui.module_id_2 .hustle-layout .hustle-group-content a:visited {color: #38C5B5;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content a:hover {color: #2DA194;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content a:focus,.hustle-ui.module_id_2 .hustle-layout .hustle-group-content a:active {color: #2DA194;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content {color: #ADB5B7;font-size: 14px;line-height: 1.45em;font-family: Open Sans;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content p:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: normal 14px/1.45em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content p:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content p:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content p:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content h1:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 28px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content h1:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content h1:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content h1:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content h2:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font-size: 22px;line-height: 1.4em;font-weight: 700;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content h2:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content h2:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content h2:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content h3:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 18px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content h3:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content h3:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content h3:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content h4:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 16px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content h4:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content h4:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content h4:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content h5:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 14px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content h5:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content h5:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content h5:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content h6:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 12px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: uppercase;text-decoration: none;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content h6:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content h6:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content h6:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]),.hustle-ui.module_id_2 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]):last-child,.hustle-ui.module_id_2 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]):last-child {margin-bottom: 0;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content li:not([class*="forminator-"]) {margin: 0 0 5px;color: #ADB5B7;font: normal 14px/1.45em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content li:not([class*="forminator-"]):last-child {margin-bottom: 0;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]) li:before {color: #ADB5B7}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]) li:before {color: #ADB5B7}@media screen and (min-width: 783px) {.hustle-ui.module_id_2 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]),.hustle-ui.module_id_2 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]) {margin: 0 0 20px;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]):last-child,.hustle-ui.module_id_2 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]):last-child {margin: 0;}}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content li:not([class*="forminator-"]) {margin: 0 0 5px;}.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content li:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content blockquote {margin-right: 0;margin-left: 0;}.hustle-ui.module_id_2 button.hustle-button-close {color: #38C5B5;}.hustle-ui.module_id_2 button.hustle-button-close:hover {color: #49E2D1;}.hustle-ui.module_id_2 button.hustle-button-close:focus,.hustle-ui.module_id_2 button.hustle-button-close:active {color: #FFFFFF;}.hustle-ui.module_id_2 .hustle-popup-mask {background-color: rgba(51,51,51,0.9);} .hustle-ui.module_id_2 .hustle-layout .hustle-group-content blockquote {border-left-color: #38C5B5;}</style><style type="text/css" id="hustle-module-4-0-styles" class="hustle-module-styles hustle-module-styles-4">@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-popup-content {max-width: 355px;max-height: none;max-height: unset;overflow-y: initial;}}@media screen and (min-width: 783px) { .hustle-layout {max-height: none;max-height: unset;}} .hustle-ui.module_id_4  {padding-right: 10px;padding-left: 10px;}.hustle-ui.module_id_4  .hustle-popup-content .hustle-info,.hustle-ui.module_id_4  .hustle-popup-content .hustle-optin {padding-top: 10px;padding-bottom: 10px;} .hustle-ui.module_id_4 .hustle-layout {padding: 0px 0px 0px 0px;border-width: 0px 0px 0px 0px;border-style: solid;border-color: #DADADA;border-radius: 0px 0px 0px 0px;background-color: #38454E;-moz-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);-webkit-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);} .hustle-ui.module_id_4 .hustle-layout .hustle-layout-header {padding: 20px 20px 20px 20px;border-width: 0px 0px 1px 0px;border-style: solid;border-color: rgba(0,0,0,0.16);border-radius: 0px 0px 0px 0px;background-color: rgba(0,0,0,0);-moz-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);-webkit-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);} .hustle-ui.module_id_4 .hustle-layout .hustle-layout-content {padding: 0px 0px 0px 0px;border-width: 0px 0px 0px 0px;border-style: solid;border-radius: 0px 0px 0px 0px;border-color: rgba(0,0,0,0);background-color: rgba(0,0,0,0);} .hustle-ui.module_id_4 .hustle-layout .hustle-layout-footer {padding: 1px 20px 20px 20px;border-width: 0px 0px 0px 0px;border-style: solid;border-color: rgba(0,0,0,0);border-radius: 0px 0px 0px 0px;background-color: rgba(0,0,0,0.16);-moz-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);-webkit-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);}  .hustle-ui.module_id_4 .hustle-layout .hustle-content {margin: 0px 0px 0px 0px;padding: 0 20px 0 20px;border-width: 0px 0px 0px 0px;border-style: solid;border-radius: 0px 0px 0px 0px;border-color: rgba(0,0,0,0);background-color: rgba(0,0,0,0);}.hustle-ui.module_id_4 .hustle-layout .hustle-content .hustle-content-wrap {padding: 20px 0 20px 0;} .hustle-ui.module_id_4 .hustle-layout .hustle-title {display: block;margin: 0px 0px 0px 0px;padding: 0px 0px 0px 0px;border-width: 0px 0px 0px 0px;border-style: solid;border-color: rgba(0,0,0,0);border-radius: 0px 0px 0px 0px;background-color: rgba(0,0,0,0);box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);-moz-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);-webkit-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);color: #ADB5B7;font: 400 33px/38px Georgia,Times,serif;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;text-align: left;} .hustle-ui.module_id_4 .hustle-layout .hustle-group-content {margin: 0px 0px 0px 0px;padding: 0px 0px 0px 0px;border-color: rgba(0,0,0,0);border-width: 0px 0px 0px 0px;border-style: solid;color: #ADB5B7;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content b,.hustle-ui.module_id_4 .hustle-layout .hustle-group-content strong {font-weight: bold;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content a,.hustle-ui.module_id_4 .hustle-layout .hustle-group-content a:visited {color: #38C5B5;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content a:hover {color: #2DA194;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content a:focus,.hustle-ui.module_id_4 .hustle-layout .hustle-group-content a:active {color: #2DA194;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content {color: #ADB5B7;font-size: 14px;line-height: 1.45em;font-family: Open Sans;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content p:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: normal 14px/1.45em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content p:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content p:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content p:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content h1:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 28px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content h1:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content h1:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content h1:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content h2:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font-size: 22px;line-height: 1.4em;font-weight: 700;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content h2:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content h2:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content h2:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content h3:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 18px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content h3:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content h3:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content h3:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content h4:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 16px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content h4:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content h4:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content h4:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content h5:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 14px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content h5:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content h5:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content h5:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content h6:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 12px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: uppercase;text-decoration: none;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content h6:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content h6:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content h6:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]),.hustle-ui.module_id_4 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]):last-child,.hustle-ui.module_id_4 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]):last-child {margin-bottom: 0;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content li:not([class*="forminator-"]) {margin: 0 0 5px;color: #ADB5B7;font: normal 14px/1.45em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content li:not([class*="forminator-"]):last-child {margin-bottom: 0;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]) li:before {color: #ADB5B7}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]) li:before {color: #ADB5B7}@media screen and (min-width: 783px) {.hustle-ui.module_id_4 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]),.hustle-ui.module_id_4 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]) {margin: 0 0 20px;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]):last-child,.hustle-ui.module_id_4 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]):last-child {margin: 0;}}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content li:not([class*="forminator-"]) {margin: 0 0 5px;}.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content li:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content blockquote {margin-right: 0;margin-left: 0;}.hustle-ui.module_id_4 button.hustle-button-close {color: #38C5B5;}.hustle-ui.module_id_4 button.hustle-button-close:hover {color: #49E2D1;}.hustle-ui.module_id_4 button.hustle-button-close:focus,.hustle-ui.module_id_4 button.hustle-button-close:active {color: #FFFFFF;}.hustle-ui.module_id_4 .hustle-popup-mask {background-color: rgba(51,51,51,0.9);} .hustle-ui.module_id_4 .hustle-layout .hustle-group-content blockquote {border-left-color: #38C5B5;}</style>';
}
add_action('wp_head','add_inline_style_popup');


function mytheme_customize_register( $wp_customize ) {

$wp_customize->add_section(
    // ID
    'phone_section',
    // Arguments array
    array(
        'title' => 'Контактные данные',
        'capability' => 'edit_theme_options',
        'description' => "Указываем номер телефона без кода страны +7 или 8. Например: 4952564047"
    )
);

$wp_customize->add_setting(
    'theme_phonetext',
    array(
        'default' => '4952564047',
        'type' => 'option'
    )
);
$wp_customize->add_control(
    'theme_contacttext_control',
    array(
        'type' => 'text',
        'label' => "Телефон",
        'section' => 'phone_section',
        'settings' => 'theme_phonetext'
    )
);

}

add_action( 'customize_register', 'mytheme_customize_register' );

function phone(&$number)
{
    $number = strval($number);
    $str = '('.substr($number, 0, 3).')'.substr($number, 3, 3).'-'.substr($number, 6, 2).'-'.substr($number, 8, 2);
    return $str;
}

/* ПОИСК ПО МЕТАПОЛЮ ЗАПИСИ TODO: */

add_action('pre_get_posts', 'show_keywords_only_posts');

function show_keywords_only_posts($query){
    global $pagenow;

    if ($query->is_main_query() && !empty($query->query_vars['s']) && is_search() && $pagenow !== 'upload.php') :

        $query->set('author', null);

        $query->set('meta_query', array(
            array(
                'key'       => 'keywords',
                'value'     => (!empty($query->query_vars['s'])) ? $query->query_vars['s'] : '',
                'compare'   => 'LIKE'
            )
        ));

        add_filter('posts_where', 'custom_keywors_posts_where');
    endif;
}

function get_user_ip() {
    return $_SERVER["REMOTE_ADDR"];
}

function custom_keywors_posts_where( $where = '' ){

    global $wpdb, $wp_query, $pagenow;

    if(is_admin() && $pagenow==='edit.php')
    {
        $where.= sprintf(
            ' OR (  %2$s.meta_key = "keywords" AND %2$s.meta_value LIKE %3$s AND %1$s.post_type="post"  ) OR (%1$s.post_title LIKE %3$s AND %1$s.post_type="post" )',
            $wpdb->posts,
            $wpdb->postmeta,
            (!empty($wp_query->query_vars['s'])) ? "'%".$wp_query->query_vars['s']."%'" : "'%Dummy%'"
        );
    }
    else
    {
        $where.= sprintf(
            ' OR ( %1$s.post_status="publish" AND  %2$s.meta_key = "keywords" AND %2$s.meta_value LIKE %3$s AND %1$s.post_type="post" ) OR (%1$s.post_title LIKE %3$s AND %1$s.post_type="post" AND %1$s.post_status="publish" )',
            $wpdb->posts,
            $wpdb->postmeta,
            (!empty($wp_query->query_vars['s'])) ? "'%".$wp_query->query_vars['s']."%'" : "'%Dummy%'"
        );
    }

    remove_filter('posts_where', 'custom_keywors_posts_where');

    return $where;

}
/* ПОИСК ПО ЗАПИСЯМ TODO-END: */

class catListWalker extends Walker_Nav_Menu {
  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    if(isset($_GET['debug'])) {
        echo "<pre>";
        var_dump($item);
        echo "</pre>";
        die();
    }

    $colors = array(
        'icon-0'=>'FF7902',
        'icon-1'=>'00B1F1',
        'icon-2'=>'00D7A2',
        'icon-3'=>'FF6CB7',
        'icon-4'=>'BBA7F9',
        'icon-5'=>'00D3E5',
        'icon-6'=>'FF758D',
        'icon-7'=>'63D100',
        'icon-8'=>'00A3F3',
        'icon-9'=>'D2D927',
        'icon-10'=>'00D550',
        'icon-11'=>'FF7A6E',
        'icon-12'=>'BABABA',
        'icon-13'=>'BABABA',
        'icon-14'=>'BABABA'
    );

    //$current_url = (is_ssl()?'https://':'http://').$_SERVER['HTTP_HOST'].strtok($_SERVER['REQUEST_URI'],'?');
    $current_url = strtok($_SERVER['REQUEST_URI'],'?');
    //if($object->title == 'Подборки') { $object->url = '/custom-attrakciony'; $object->title = 'Все аттракционы'; }
    //if($object->title == 'Тематические подборки') { $object->title = 'Подборки'; }
    $item_url = esc_attr( $item->url );
    if($item_url != $current_url && in_array('current-menu-item', $item->classes)) {
        $delkey = array_search('current-menu-item', $item->classes);
        unset($item->classes[$delkey]);
    }
    if($item_url==$current_url && !in_array('current-menu-item', $item->classes))
    {
        array_push($item->classes, 'current-menu-item');
    }
    /*
    if($object->title == 'Тимбилдинг') {
        var_export(strtok($current_url, '?'));
    }
    */
    $class_names = join( ' ', $item->classes );
    if($item->title == 'Тимбилдинг') {
        //var_export($object->classes[0]);
    }

    $class_names = ' class="' .esc_attr( $class_names ). '"';
    $output.= '<li id="menu-item-' . $item->ID . '"' .$class_names. '>';

    $attributes.= !empty( $item->url ) ? ' title="' .esc_attr($item->title). '" href="' .esc_attr($item->url). '"' : '';
    $item_output = $args->before;

    if ( $item_url != $current_url ) $item_output.= '<a'. $attributes .'><i class='.$item->classes[0].'></i>'.$item->title.'</a>';
    else $item_output.= '<a'. $attributes .'><i data-color="'.$colors[$item->classes[0]].'" class="'.$item->classes[0].'">&nbsp;</i>'.$item->title.'</a>';

    $item_output.= $args->after;
    $output.= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
}

//add_action( 'wp_enqueue_scripts', 'replain' );
//add_action( 'wp_enqueue_scripts', 'bitrix24' );
function replain() {
    wp_enqueue_script( 'prointeractiv', get_stylesheet_directory_uri() . '/js/replain.js', array('jquery'), null, true );
}

function bitrix24() {
    wp_enqueue_script( 'prointeractiv', get_stylesheet_directory_uri() . '/js/bitrix24.js', array('jquery'), null, true );
}

function my_dashicons() {
    wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'my_dashicons', 999 );

function emm_paginate($args = null) {
    $defaults = array(
        'page' => null,
        'pages' => null,
        'range' => 3, 'gap' => 3, 'anchor' => 1,
        'before' => '<div style="margin-bottom: 2rem;" class="emm-paginate">', 'after' => '</div>',

        'title' => __(''),
        'nextpage' => __('&raquo;'), 'previouspage' => __('&laquo'),
        'echo' => 1
    );

    $r = wp_parse_args($args, $defaults);

    extract($r, EXTR_SKIP);

    if (!$page && !$pages) {
        global $wp_query;

        $page = get_query_var('paged');
        $page = !empty($page) ? intval($page) : 1;

        $posts_per_page = intval(get_query_var('posts_per_page'));
        $pages = intval(ceil($wp_query->found_posts / $posts_per_page));

        //var_dump($pages);

    }

    $output = "";
    if ($pages > 1) {
        $output .= "$before<span class='emm-title'>$title</span>";
        $ellipsis = "<span class='emm-gap'>...</span>";

        if ($page > 1 && !empty($previouspage)) {
            $output .= "<a href='" . get_pagenum_link($page - 1) . "' class='emm-prev'>$previouspage</a>";
        }

        $min_links = $range * 2 + 1;
        $block_min = min($page - $range, $pages - $min_links);
        $block_high = max($page + $range, $min_links);
        $left_gap = (($block_min - $anchor - $gap) > 0) ? true : false;
        $right_gap = (($block_high + $anchor + $gap) < $pages) ? true : false;

        if ($left_gap && !$right_gap) {
            $output .= sprintf('%s%s%s',
                emm_paginate_loop(1, $anchor),
                $ellipsis,
                emm_paginate_loop($block_min, $pages, $page)
            );
        }
        else if ($left_gap && $right_gap) {
            $output .= sprintf('%s%s%s%s%s',
                emm_paginate_loop(1, $anchor),
                $ellipsis,
                emm_paginate_loop($block_min, $block_high, $page),
                $ellipsis,
                emm_paginate_loop(($pages - $anchor + 1), $pages)
            );
        }



        else if ($right_gap && !$left_gap) {
            $output .= sprintf('%s%s%s',
                emm_paginate_loop(1, $block_high, $page),
                $ellipsis,
                emm_paginate_loop(($pages - $anchor + 1), $pages)
            );
        }
        else {
            $output .= emm_paginate_loop(1, $pages, $page);
        }

        if ($page < $pages && !empty($nextpage)) {
            $output .= "<a href='" . get_pagenum_link($page + 1) . "' class='emm-next'>$nextpage</a>";
        }

        $output .= $after;
    }

    if ($echo) {
        echo $output;
    }

    return $output;
}


function emm_paginate_loop($start, $max, $page = 0) {
    $output = "";
    for ($i = $start; $i <= $max; $i++) {
        $output .= ($page === intval($i))
            ? "<span class='emm-page emm-current'>$i</span>"
            : "<a href='" . get_pagenum_link($i) . "' class='emm-page'>$i</a>";
    }
    return $output;
}

function page_tagfix_redirect(){

    $terms = get_terms( 'post_tag', [
    	'hide_empty' => false,
        'slug' => get_queried_object()->slug
    ] );

    $url_query = parse_url($_SERVER["REQUEST_URI"]);
    $url_query = explode('/', $url_query['path']);

    if( is_category() && ! is_user_logged_in() && is_array($terms) && $url_query[1] == 'tag'){
        //wp_redirect( home_url( '/tag/'.get_queried_object()->slug ), 301 );
        wp_redirect( home_url( '/'.get_queried_object()->slug ), 301 );
        exit();
    } else if($url_query[1] == 'rasshirennyj_poisk_gruppy') {
        wp_redirect( home_url( '/'.get_queried_object()->slug ), 301 );
        exit();
    }
}

add_action( 'wp_head', 'search_engine_head' );

function search_engine_head() {

    ?>

    <link rel="stylesheet" href="https://engine-search.ru/static/css/style.css">

    <?php

}

add_action( 'wp_footer', 'search_engine_footer' );

function search_engine_footer() {

 
?>
    <div class="modal-search">
        <div class="modal-search-content">
            <span class="close-search-modal"></span>
            <form action="https://engine-search.ru/api/arenda/" class="search-form">
                <input class="input" type="text" name="q" autocomplete="off">
            </form>
            <ul class="modal-search-result">
            </ul>
        </div>
    </div>
    <script src="https://engine-search.ru/static/js/scripts_arenda.js"></script>


    <?php 
}

add_action( 'wp_footer', 'promo_floatbanner' );

function promo_floatbanner() {

    if(!is_front_page()&&!is_home()) {

?>

<style>
#float_sidebar_bottom_right {
    position: fixed;
    display: none;
    bottom: 0;
    left: 120px;
    z-index: 666;
}
a#promo-floatbanner-right_bottom {
    text-align: center;
}
#float_sidebar_bottom_right-close-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    bottom: auto;
    top: -20px;
    right: -18px;
    left: auto;
    border-radius: 50%;
    border: #000 1px solid;
    padding: 1rem;
    width: 10px;
    height: 10px;
    background: #fff;
    z-index: 667;
    cursor: pointer;
}
#float_sidebar_bottom_right-close-btn:hover {
    background: #EB078E;
    color: #fff;
}
#float_sidebar_bottom_right-close-btn i {
    font-size: 26px;
}
</style>

<div id="float_sidebar_bottom_right">
    <a target="_blank" href="https://pro-platforma.ru/promo/?utm_source=arenda&utm_medium=referral&utm_campaign=promo-pro-platforma&utm_content={ad_id}&utm_term={keyword}" id="promo-floatbanner-right_bottom"><img src="<?=get_template_directory_uri().'/images/home/ivent-klaster.png'?>" alt="" /></a>
    <div id="float_sidebar_bottom_right-close-btn"><i class="fa fa-close"></i></div>
</div>

<script>
$('#float_sidebar_bottom_right-close-btn').on('click', function(){
    $(this).parent().remove();
    localStorage.prplatf = 2;
});

setTimeout(function()
{
    if(localStorage.prplatf!=2)
    {
	    $('#float_sidebar_bottom_right').css('display', 'block');
    }
}, 25000 );
</script>

<?php
    }
}

// свой класс построения меню:
class magomra_walker_nav_menu extends Walker_Nav_Menu {

	// add classes to ul sub-menus
	function start_lvl( &$output, $depth ) {
		// depth dependent classes
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
		$classes = array(
			'sub-menu',
			( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
			( $display_depth >=2 ? 'sub-sub-menu' : '' ),
			'menu-depth-' . $display_depth
			);
		$class_names = implode( ' ', $classes );

		// build html
		$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
	}

	// add main/sub classes to li's and links
	 function start_el( &$output, $item, $depth, $args ) {
		global $wp_query;
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

		// depth dependent classes
		$depth_classes = array(
			( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
			( $depth >=2 ? 'sub-sub-menu-item' : '' ),
			( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
			'menu-item-depth-' . $depth
		);
		$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

		// passed classes
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

		// build html
		$output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

		// link attributes
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ' class="header__catalog__item__title menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

		$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
			$args->before,
			$attributes,
			$args->link_before,
			apply_filters( 'the_title', $item->title, $item->ID ),
			$args->link_after,
			$args->after
		);

		// build html
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
