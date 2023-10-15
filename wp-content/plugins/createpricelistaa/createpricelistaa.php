<?php
/*
Plugin Name: Формирует прайс-лист
Plugin URI: http://effectik.com
Description: Формирует прайс-лист
Version: 0.1
Author: Anton Kaledin
Author URI: http://effectik.com
License: GPL2
*/

ini_set('memory_limit', '3.5G');

if ( ! defined( 'WPINC' ) ) {
	die("Fuck u Hacker!");
}


add_action( 'admin_init', 'pricelistaa_register_settings' );
add_action( 'admin_menu', 'pricelistaa_menu' );


function pricelistaa_menu() {
    //add an item to the menu
    add_menu_page (
        'Настройки прайс листа',
        'Прайс лист',
        'eff_pricelist_manage_options',
        plugin_dir_path(__FILE__).'/options.php',
        '',
        plugin_dir_url( __FILE__ ).'images/accept.png',
        '23.6'
    );

}

function pricelistaa_register_settings() {
     register_setting(
          'price-settings',
          'price-options'
     );
}

function run_synch($options){

    require_once(plugin_dir_path(__FILE__).'/synch.php');
    return $linkPrL;
}

function sort_func($a, $b){
    $la = mb_substr($a->title,0,1,'utf-8');
    $lb = mb_substr($b->title,0,1,'utf-8');
    if(ord($la) > 122 && ord($lb) > 122){
        return $a->title > $b->title ? 1 : -1;
    }
    if(ord($la) > 122 || ord($lb) > 122) {
        return $a->title < $b->title ? 1 : -1;
    }
}