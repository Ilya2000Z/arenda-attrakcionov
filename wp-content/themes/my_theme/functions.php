<?php
// add_filter( 'media_library_infinite_scrolling', '__return_true' );
add_theme_support( 'custom-logo' );
function get_nopaging_url() {
    global $wp;
    $current_url =  home_url( $wp->request );
    $position = strpos( $current_url , '/page' );
    $nopaging_url = ( $position ) ? substr( $current_url, 0, $position ) : $current_url;
    return trailingslashit( $nopaging_url );
}
if( function_exists('acf_add_local_field_group') ) {
	acf_add_local_field_group(array(
		'key' => 'group_6436b0efc631b',
		'title' => 'Метки фильтрации',
		'fields' => array(
			array(
				'key' => 'field_6436b120f8414',
				'label' => 'Метки',
				'name' => 'метки',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '100',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'table',
				'button_label' => '',
				'sub_fields' => array(
					array(
						'key' => 'field_6436b131f8415',
						'label' => 'Текст',
						'name' => 'текст',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_6436b156f8416',
						'label' => 'Название метки',
						'name' => 'название_метки',
						'type' => 'text',
						'instructions' => 'Название метки указанное в товарах',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_6436b180f8417',
						'label' => 'Иконка',
						'name' => 'иконка',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'preview_size' => 'full',
						'library' => 'all',
						'min_width' => 60,
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'uploader' => '',
						'acfe_thumbnail' => 0,
					),
					array(
						'key' => 'field_6447a0a05f86e',
						'label' => 'Категория',
						'name' => 'рубрика',
						'type' => 'taxonomy',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'taxonomy' => 'category',
						'field_type' => 'select',
						'allow_null' => 1,
						'add_term' => 0,
						'save_terms' => 0,
						'load_terms' => 0,
						'return_format' => 'id',
						'multiple' => 0,
					),
				),
				'acfe_repeater_stylised_button' => 0,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => 'category',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	));
	acf_add_local_field_group(array(
		'key' => 'group_6436853901b41',
		'title' => 'Метки фильтрации',
		'fields' => array(
			array(
				'key' => 'field_643685499d0af',
				'label' => 'Фильтрация',
				'name' => 'filter_labels',
				'type' => 'text',
				'instructions' => 'Напишите через , все метки к которым нужно привязать товар. Например Офисные, Банкетные, Барные, 
	Даже если метка одна в конце ставьте разделитель запятую - ,',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
		'acfe_display_title' => '',
		'acfe_autosync' => '',
		'acfe_form' => 0,
		'acfe_meta' => '',
		'acfe_note' => '',
	));
	acf_add_local_field_group(array(
		'key' => 'group_62d25905edcef',
		'title' => 'Для меню аккордиона',
		'fields' => array(
			array(
				'key' => 'field_62d259303caeb',
				'label' => 'Иконка',
				'name' => 'иконка',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'url',
				'preview_size' => 'full',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
				'uploader' => '',
				'acfe_thumbnail' => 0,
			),
			array(
				'key' => 'field_630e0626e031a',
				'label' => 'Скрыть в блоке над аккордионом',
				'name' => 'скрыть_в_блоке_над_аккордионом',
				'type' => 'text',
				'instructions' => 'Напишите hide если скрыть',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_630e064ee031b',
				'label' => 'Название для блока над аккордионом',
				'name' => 'название_для_блока_над_аккордионом',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_63872fbf069aa',
				'label' => 'Показать в материнской категории',
				'name' => 'показать_в_материнской_категории',
				'type' => 'text',
				'instructions' => '1 да 0 нет',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'nav_menu_item',
					'operator' => '==',
					'value' => 'location/custom_accordion_menu',
				),
			),
			array(
				array(
					'param' => 'nav_menu_item',
					'operator' => '==',
					'value' => '18',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	));
	acf_add_local_field_group(array(
		'key' => 'group_62876f04c1c93',
		'title' => 'Допы - Карусель',
		'fields' => array(
			array(
				'key' => 'field_62ac99d1c7c69',
				'label' => 'Заголовок к Карточкам',
				'name' => 'title_options_carousel',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_628772a2191df',
				'label' => 'Карточка 1',
				'name' => 'dop_options_carousel_1',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_628773b3191e0',
						'label' => 'Изображение',
						'name' => 'dop_options_carousel_img',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => 'dop_options_carousel_img',
							'id' => '',
						),
						'return_format' => 'id',
						'preview_size' => 'thumbnail',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'uploader' => '',
						'acfe_thumbnail' => 0,
					),
					array(
						'key' => 'field_6287797a373cf',
						'label' => 'Название',
						'name' => 'dop_options_carousel_name',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_628779a8373d0',
						'label' => 'Цена',
						'name' => 'dop_options_carousel_price',
						'type' => 'number',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 0,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => '',
						'max' => '',
						'step' => '',
					),
					array(
						'key' => 'field_628c7e69881c5',
						'label' => 'Префикс к полю цена',
						'name' => 'dop_options_carousel_price_prefix',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_628779a8373d0',
									'operator' => '!=empty',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
				),
				'acfe_seamless_style' => 0,
				'acfe_group_modal' => 0,
				'acfe_group_modal_close' => 0,
				'acfe_group_modal_button' => '',
				'acfe_group_modal_size' => 'large',
			),
			array(
				'key' => 'field_62877a4937b44',
				'label' => 'Карточка 2',
				'name' => 'dop_options_carousel_2',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_62877a4937b45',
						'label' => 'Изображение',
						'name' => 'dop_options_carousel_img',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => 'dop_options_carousel_img',
							'id' => '',
						),
						'return_format' => 'id',
						'preview_size' => 'thumbnail',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'uploader' => '',
						'acfe_thumbnail' => 0,
					),
					array(
						'key' => 'field_62877a4937b46',
						'label' => 'Название',
						'name' => 'dop_options_carousel_name',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_62877a4937b47',
						'label' => 'Цена',
						'name' => 'dop_options_carousel_price',
						'type' => 'number',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 0,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => '',
						'max' => '',
						'step' => '',
					),
					array(
						'key' => 'field_628c7f3e881c7',
						'label' => 'Префикс к полю цена',
						'name' => 'dop_options_carousel_price_prefix',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_62877a4937b47',
									'operator' => '!=empty',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
				),
				'acfe_seamless_style' => 0,
				'acfe_group_modal' => 0,
				'acfe_group_modal_close' => 0,
				'acfe_group_modal_button' => '',
				'acfe_group_modal_size' => 'large',
			),
			array(
				'key' => 'field_62877a583f052',
				'label' => 'Карточка 3',
				'name' => 'dop_options_carousel_3',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_62877a583f053',
						'label' => 'Изображение',
						'name' => 'dop_options_carousel_img',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => 'dop_options_carousel_img',
							'id' => '',
						),
						'return_format' => 'id',
						'preview_size' => 'thumbnail',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'uploader' => '',
						'acfe_thumbnail' => 0,
					),
					array(
						'key' => 'field_62877a583f054',
						'label' => 'Название',
						'name' => 'dop_options_carousel_name',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_62877a583f055',
						'label' => 'Цена',
						'name' => 'dop_options_carousel_price',
						'type' => 'number',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 0,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => '',
						'max' => '',
						'step' => '',
					),
					array(
						'key' => 'field_628c7f91881c8',
						'label' => 'Префикс к полю цена',
						'name' => 'dop_options_carousel_price_prefix',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_62877a583f055',
									'operator' => '!=empty',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
				),
				'acfe_seamless_style' => 0,
				'acfe_group_modal' => 0,
				'acfe_group_modal_close' => 0,
				'acfe_group_modal_button' => '',
				'acfe_group_modal_size' => 'large',
			),
			array(
				'key' => 'field_62877a641b90c',
				'label' => 'Карточка 4',
				'name' => 'dop_options_carousel_4',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_62877a641b90d',
						'label' => 'Изображение',
						'name' => 'dop_options_carousel_img',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => 'dop_options_carousel_img',
							'id' => '',
						),
						'return_format' => 'id',
						'preview_size' => 'thumbnail',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'uploader' => '',
						'acfe_thumbnail' => 0,
					),
					array(
						'key' => 'field_62877a641b90e',
						'label' => 'Название',
						'name' => 'dop_options_carousel_name',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_62877a641b90f',
						'label' => 'Цена',
						'name' => 'dop_options_carousel_price',
						'type' => 'number',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 0,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => '',
						'max' => '',
						'step' => '',
					),
					array(
						'key' => 'field_628c7fbc881c9',
						'label' => 'Префикс к полю цена',
						'name' => 'dop_options_carousel_price_prefix',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_62877a641b90f',
									'operator' => '!=empty',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
				),
				'acfe_seamless_style' => 0,
				'acfe_group_modal' => 0,
				'acfe_group_modal_close' => 0,
				'acfe_group_modal_button' => '',
				'acfe_group_modal_size' => 'large',
			),
			array(
				'key' => 'field_6423a773d75c0',
				'label' => 'Текст метки товара',
				'name' => 'текст_метки_товара',
				'type' => 'text',
				'instructions' => 'Если не заполнить не отобразится',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_6423a7b9d75c1',
				'label' => 'Цвет метки товара',
				'name' => 'цвет_метки_товара',
				'type' => 'color_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'enable_opacity' => 0,
				'return_format' => 'string',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	));
}
function clear_cache_category( $term_id, $tt_id, $update ) {
	if ( ! is_admin_bar_showing() )
	return;
	if ( ! $tt_id )
	return;
	$term = get_term( $term_id );
	if(is_term($term_id)) {
		$term_link = get_category_link($term_id);
		$term_path = parse_url($term_link)['path'];
	}
	// } else {
	// 	$term_link = get_term_link($term_id);
	// }
    $tax_slug = $term->slug;
	// if( isset($term->parent) && $term->parent ) {
	// 	$term_parent = get_term( $term->parent );
	// 	$tax_slug = $term_parent->slug . DIRECTORY_SEPARATOR . $tax_slug;
	// }
	$dir = WP_CONTENT_DIR . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'page_enhanced' . DIRECTORY_SEPARATOR . $_SERVER['SERVER_NAME'] . $term_path;
	if(is_dir($dir)) {
		if($dh=opendir($dir)) {
			while(($file=readdir($dh)) !== false) {
				if ( $file == '.' || $file == '..' ) {
					continue;
				}
				@unlink($dir. DIRECTORY_SEPARATOR .$file);
			}
			closedir($dh);
		}
	}
	wp_remote_get(
		$term_link,
		[
			'timeout' => 60,
			'httpversion' => '1.1',
			'user-agent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.0 Mobile/15E148 Safari/604.1'
		]
	);
	wp_remote_get(
		$term_link,
		[
			'timeout' => 60,
			'httpversion' => '1.1',
			'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36'
		]
	);
	clean_post_cache($tt_id);
}
function save_post_action( $post_ID, $post, $update ) {
		if ( ! is_admin_bar_showing() || get_post($post_ID)->post_status != 'publish' )
		return;
		if ( ! $post || ! isset($post->post_type) || ( $post->post_type !== 'post' && $post->post_type !== 'page' ) )
			return;
		$slug = $post->post_name;
		$post_url = get_permalink( $post_ID );
		$dir = WP_CONTENT_DIR . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'page_enhanced' . DIRECTORY_SEPARATOR . $_SERVER['SERVER_NAME'] . DIRECTORY_SEPARATOR . $slug;
		$dirRoot = WP_CONTENT_DIR . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'page_enhanced' . DIRECTORY_SEPARATOR . $_SERVER['SERVER_NAME'] . DIRECTORY_SEPARATOR;
		if(is_dir($dir)) {
			if($dh=opendir($dir)) {
				while(($file=readdir($dh)) !== false) {
					if ( $file == '.' || $file == '..' ) {
						continue;
					}
					@unlink($dir. DIRECTORY_SEPARATOR .$file);
				}
				closedir($dh);
			}
		}
		if($post_url === 'https://arenda-attrakcionov.ru/') {
			array_map("unlink", glob($dirRoot . "*.html*"));
		}
		wp_remote_get(
			$post_url,
			[
				'timeout' => 60,
				'httpversion' => '1.1',
				'user-agent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.0 Mobile/15E148 Safari/604.1'
			]
		);
		wp_remote_get(
			$post_url,
			[
				'timeout' => 60,
				'httpversion' => '1.1',
				'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36'
			]
		);
	clean_post_cache( $post_ID );
}
function get_nav_menu_item_children( $parent_id, $nav_menu_items, $depth = true ) {
	$nav_menu_item_list = array();
	foreach ( $nav_menu_items as $nav_menu_item ) {
		if ( $nav_menu_item->menu_item_parent == $parent_id ) {
			$nav_menu_item_list[] = $nav_menu_item;
			if ( $depth ) {
				if ( $children = get_nav_menu_item_children( $nav_menu_item->ID, $nav_menu_items ) ) {
					$nav_menu_item_list = array_merge( $nav_menu_item_list, $children );
				}
			}
		}
	}
	return $nav_menu_item_list;
}
foreach ( array( 'pre_term_description' ) as $filter ) {
    remove_filter( $filter, 'wp_filter_kses' );
}
foreach ( array( 'term_description' ) as $filter ) {
    remove_filter( $filter, 'wp_kses_data' );
}
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Глобальные опции',
		'menu_title'	=> 'Глоб. Опции',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}
remove_filter('the_excerpt', 'wpautop');
remove_filter('the_content', 'wpautop');
if (strpos($_SERVER['REQUEST_URI'], "eval(") ||	strpos($_SERVER['REQUEST_URI'], "CONCAT") || strpos($_SERVER['REQUEST_URI'], "UNION+SELECT") ||	strpos($_SERVER['REQUEST_URI'], "base64")) {
	@header("HTTP/1.1 400 Bad Request");
	@header("Status: 400 Bad Request");
	@header("Connection: Close");
	@exit;
}
$CONTACTS = <<<'EOD'
						<span class="ftr-cnt h5"><a class="h5" target="_blank" href="tel:+74952564047"></i> 8 (495) 256-40-47</a></span>
						<span class="ftr-cnt h6">пн—пт <span class="color-orange">с 9:00 до 20:00</span></span>
						<span class="ftr-cnt h6">cб—вс <span class="color-orange">дежурный менеджер</span></span>
					<a class="ftr-cnt h6" target="_blank" href="mailto:info@arenda-attrakcionov.ru"></i> info@arenda-attrakcionov.ru</a>
EOD;
global $CONTACTS;
add_shortcode('holiday', 'holiday2');
function holiday2()
{
	return '';
	$year = '2000';
	$start_date = date('Ymd', mktime(0, 0, 0, date('m'), date('d'), $year));
	$end_date = date('Ymd', mktime(0, 0, 0, date('m') + 2, date('d'), $year));
	$terms = get_term_children(308, 'category');
	echo '<div class="sidebar_h">Ближайшие даты</div>';
	echo '<ul class="holidays">';
	$cats_sorted = [];
	$cats_sort = [];
	foreach ($terms as $child) {
		$term = get_term_by('id', $child, 'category');
		//$data = $year.substr(get_term_meta($term->term_id, 'data', true), 4);
		$data = $year . substr(get_term_meta($term->term_id, 'data', true), 4);
		$mayday = substr(get_term_meta($term->term_id, 'data', true), 4);
		//echo $data.'<br>';
		if ($data >= $start_date && $data <= $end_date) {
			$cats_sort[$mayday]['name'] = $term->name;
			$cats_sort[$mayday]['link'] = get_term_link($term->term_id, $term->taxonomy);
			//echo '<li><a href="' . get_term_link( $term->term_id, $term->taxonomy ) . '">' . $term->name . '</a></li>';
		}
	}
	ksort($cats_sort, SORT_NUMERIC);
	$cats_sorted = array_slice($cats_sort, 0, 3);
	foreach ($cats_sorted as $child) {
		echo '<li><a href="' . $child['link'] . '">' . $child['name'] . '</a></li>';
	}
	//}
	echo '</ul>';
}
if (isset($_GET['debug'])) {
	global $wpdb;
	$wpdb2 = new wpdb('admin_aanew', 'K7alOBcTex', 'admin_aanew', 'localhost');
	$wpdb2->set_prefix('wp_');
	//$qry = "SELECT * FROM `wp_posts` WHERE `post_content` REGEXP '<p>(\n.*)<style>'";
	$qry = "SELECT * FROM `wp_posts` WHERE `post_status` = 'publish' AND `post_type`= 'post' AND `post_content` REGEXP '<style>(.*)'";
	$rows = $wpdb2->get_results($qry);
	$iddd = 1;
	foreach ($rows as $row) {
		//if($row->ID == 255) {
		//echo "<pre>";
		//print_r($row->post_content);
		//echo "</pre>";
		//$step1 = preg_match('/<p>[\s]*<style>(.*?)<\/style>[\s]*<\/p>/si', $row->post_content, $found);
		$step1 = preg_match('/<style>(.*?)<\/style>/si', $row->post_content, $found);
		if ((int) $step1 > 0) {
			if (!empty($found[1])) {
				$xclear = strip_tags($found[1], '<br/>');
				if (!empty($xclear)) {
					$result = preg_replace('/<style>(.*?)<\/style>(.*?)/si', '$2', $row->post_content, 1);
					$update = "$result";
					update_post_meta($row->ID, 'wpcf-inline-style', "<style>$found[1]</style>");
					$wpdb->query("UPDATE $wpdb->posts SET post_content = '$update' WHERE ID = $row->ID");
					$iddd++;
					unset($xclear, $update, $found);
				}
			}
		}
	}
	die();
}
function true_disable_self_ping(&$links)
{
	foreach ($links as $l => $link)
		if (0 === strpos($link, get_option('home')))
			unset($links[$l]);
}
add_action('pre_ping', 'true_disable_self_ping');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
add_filter('xmlrpc_enabled', '__return_false');
add_filter('json_enabled', '__return_false');
add_filter('json_jsonp_enabled', '__return_false');
add_filter('rest_enabled', '__return_false');
add_filter('rest_jsonp_enabled', '__return_false');
add_filter('xmlrpc_enabled', '__return_false');
add_theme_support('widgets');
add_filter('menu_image_default_sizes', function ($sizes) {
	$sizes['menu-80x80'] = array(80, 80);
	return $sizes;
});
function style_popup_off()
{
	return 1;
}
add_action('hustle_disable_front_styles', 'style_popup_off');
function add_inline_style_popup()
{
	echo '<style type="text/css" id="hustle-module-3-0-styles" class="hustle-module-styles hustle-module-styles-3">@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-popup-content {max-width: 355px;max-height: none;max-height: unset;overflow-y: initial;}}@media screen and (min-width: 783px) { .hustle-layout {max-height: none;max-height: unset;}} .hustle-ui.module_id_3  {padding-right: 10px;padding-left: 10px;}.hustle-ui.module_id_3  .hustle-popup-content .hustle-info,.hustle-ui.module_id_3  .hustle-popup-content .hustle-optin {padding-top: 10px;padding-bottom: 10px;} .hustle-ui.module_id_3 .hustle-layout {padding: 0px 0px 0px 0px;border-width: 0px 0px 0px 0px;border-style: solid;border-color: #DADADA;border-radius: 0px 0px 0px 0px;background-color: #38454E;-moz-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);-webkit-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);} .hustle-ui.module_id_3 .hustle-layout .hustle-layout-header {padding: 20px 20px 20px 20px;border-width: 0px 0px 1px 0px;border-style: solid;border-color: rgba(0,0,0,0.16);border-radius: 0px 0px 0px 0px;background-color: rgba(0,0,0,0);-moz-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);-webkit-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);} .hustle-ui.module_id_3 .hustle-layout .hustle-layout-content {padding: 0px 0px 0px 0px;border-width: 0px 0px 0px 0px;border-style: solid;border-radius: 0px 0px 0px 0px;border-color: rgba(0,0,0,0);background-color: rgba(0,0,0,0);} .hustle-ui.module_id_3 .hustle-layout .hustle-layout-footer {padding: 1px 20px 20px 20px;border-width: 0px 0px 0px 0px;border-style: solid;border-color: rgba(0,0,0,0);border-radius: 0px 0px 0px 0px;background-color: rgba(0,0,0,0.16);-moz-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);-webkit-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);}  .hustle-ui.module_id_3 .hustle-layout .hustle-content {margin: 0px 0px 0px 0px;padding: 0 20px 0 20px;border-width: 0px 0px 0px 0px;border-style: solid;border-radius: 0px 0px 0px 0px;border-color: rgba(0,0,0,0);background-color: rgba(0,0,0,0);}.hustle-ui.module_id_3 .hustle-layout .hustle-content .hustle-content-wrap {padding: 20px 0 20px 0;} .hustle-ui.module_id_3 .hustle-layout .hustle-group-content {margin: 0px 0px 0px 0px;padding: 0px 0px 0px 0px;border-color: rgba(0,0,0,0);border-width: 0px 0px 0px 0px;border-style: solid;color: #ADB5B7;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content b,.hustle-ui.module_id_3 .hustle-layout .hustle-group-content strong {font-weight: bold;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content a,.hustle-ui.module_id_3 .hustle-layout .hustle-group-content a:visited {color: #38C5B5;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content a:hover {color: #2DA194;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content a:focus,.hustle-ui.module_id_3 .hustle-layout .hustle-group-content a:active {color: #2DA194;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content {color: #ADB5B7;font-size: 14px;line-height: 1.45em;font-family: Open Sans;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content p:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: normal 14px/1.45em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content p:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content p:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content p:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content h1:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 28px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content h1:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content h1:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content h1:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content h2:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font-size: 22px;line-height: 1.4em;font-weight: 700;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content h2:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content h2:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content h2:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content h3:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 18px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content h3:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content h3:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content h3:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content h4:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 16px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content h4:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content h4:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content h4:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content h5:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 14px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content h5:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content h5:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content h5:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content h6:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 12px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: uppercase;text-decoration: none;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content h6:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content h6:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content h6:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]),.hustle-ui.module_id_3 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]):last-child,.hustle-ui.module_id_3 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]):last-child {margin-bottom: 0;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content li:not([class*="forminator-"]) {margin: 0 0 5px;color: #ADB5B7;font: normal 14px/1.45em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content li:not([class*="forminator-"]):last-child {margin-bottom: 0;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]) li:before {color: #ADB5B7}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]) li:before {color: #ADB5B7}@media screen and (min-width: 783px) {.hustle-ui.module_id_3 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]),.hustle-ui.module_id_3 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]) {margin: 0 0 20px;}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]):last-child,.hustle-ui.module_id_3 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]):last-child {margin: 0;}}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content li:not([class*="forminator-"]) {margin: 0 0 5px;}.hustle-ui:not(.hustle-size--small).module_id_3 .hustle-layout .hustle-group-content li:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_3 .hustle-layout .hustle-group-content blockquote {margin-right: 0;margin-left: 0;}.hustle-ui.module_id_3 button.hustle-button-close {color: #38C5B5;}.hustle-ui.module_id_3 button.hustle-button-close:hover {color: #49E2D1;}.hustle-ui.module_id_3 button.hustle-button-close:focus,.hustle-ui.module_id_3 button.hustle-button-close:active {color: #FFFFFF;}.hustle-ui.module_id_3 .hustle-popup-mask {background-color: rgba(51,51,51,0.9);} .hustle-ui.module_id_3 .hustle-layout .hustle-group-content blockquote {border-left-color: #38C5B5;}</style><style type="text/css" id="hustle-module-2-0-styles" class="hustle-module-styles hustle-module-styles-2">@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-popup-content {max-width: 355px;max-height: none;max-height: unset;overflow-y: initial;}}@media screen and (min-width: 783px) { .hustle-layout {max-height: none;max-height: unset;}} .hustle-ui.module_id_2  {padding-right: 10px;padding-left: 10px;}.hustle-ui.module_id_2  .hustle-popup-content .hustle-info,.hustle-ui.module_id_2  .hustle-popup-content .hustle-optin {padding-top: 10px;padding-bottom: 10px;} .hustle-ui.module_id_2 .hustle-layout {padding: 0px 0px 0px 0px;border-width: 0px 0px 0px 0px;border-style: solid;border-color: #DADADA;border-radius: 0px 0px 0px 0px;background-color: #38454E;-moz-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);-webkit-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);} .hustle-ui.module_id_2 .hustle-layout .hustle-layout-header {padding: 20px 20px 20px 20px;border-width: 0px 0px 1px 0px;border-style: solid;border-color: rgba(0,0,0,0.16);border-radius: 0px 0px 0px 0px;background-color: rgba(0,0,0,0);-moz-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);-webkit-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);} .hustle-ui.module_id_2 .hustle-layout .hustle-layout-content {padding: 0px 0px 0px 0px;border-width: 0px 0px 0px 0px;border-style: solid;border-radius: 0px 0px 0px 0px;border-color: rgba(0,0,0,0);background-color: rgba(0,0,0,0);} .hustle-ui.module_id_2 .hustle-layout .hustle-layout-footer {padding: 1px 20px 20px 20px;border-width: 0px 0px 0px 0px;border-style: solid;border-color: rgba(0,0,0,0);border-radius: 0px 0px 0px 0px;background-color: rgba(0,0,0,0.16);-moz-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);-webkit-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);}  .hustle-ui.module_id_2 .hustle-layout .hustle-content {margin: 0px 0px 0px 0px;padding: 0 20px 0 20px;border-width: 0px 0px 0px 0px;border-style: solid;border-radius: 0px 0px 0px 0px;border-color: rgba(0,0,0,0);background-color: rgba(0,0,0,0);}.hustle-ui.module_id_2 .hustle-layout .hustle-content .hustle-content-wrap {padding: 20px 0 20px 0;} .hustle-ui.module_id_2 .hustle-layout .hustle-group-content {margin: 0px 0px 0px 0px;padding: 0px 0px 0px 0px;border-color: rgba(0,0,0,0);border-width: 0px 0px 0px 0px;border-style: solid;color: #ADB5B7;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content b,.hustle-ui.module_id_2 .hustle-layout .hustle-group-content strong {font-weight: bold;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content a,.hustle-ui.module_id_2 .hustle-layout .hustle-group-content a:visited {color: #38C5B5;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content a:hover {color: #2DA194;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content a:focus,.hustle-ui.module_id_2 .hustle-layout .hustle-group-content a:active {color: #2DA194;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content {color: #ADB5B7;font-size: 14px;line-height: 1.45em;font-family: Open Sans;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content p:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: normal 14px/1.45em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content p:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content p:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content p:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content h1:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 28px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content h1:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content h1:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content h1:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content h2:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font-size: 22px;line-height: 1.4em;font-weight: 700;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content h2:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content h2:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content h2:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content h3:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 18px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content h3:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content h3:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content h3:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content h4:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 16px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content h4:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content h4:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content h4:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content h5:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 14px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content h5:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content h5:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content h5:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content h6:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 12px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: uppercase;text-decoration: none;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content h6:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content h6:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content h6:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]),.hustle-ui.module_id_2 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]):last-child,.hustle-ui.module_id_2 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]):last-child {margin-bottom: 0;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content li:not([class*="forminator-"]) {margin: 0 0 5px;color: #ADB5B7;font: normal 14px/1.45em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content li:not([class*="forminator-"]):last-child {margin-bottom: 0;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]) li:before {color: #ADB5B7}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]) li:before {color: #ADB5B7}@media screen and (min-width: 783px) {.hustle-ui.module_id_2 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]),.hustle-ui.module_id_2 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]) {margin: 0 0 20px;}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]):last-child,.hustle-ui.module_id_2 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]):last-child {margin: 0;}}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content li:not([class*="forminator-"]) {margin: 0 0 5px;}.hustle-ui:not(.hustle-size--small).module_id_2 .hustle-layout .hustle-group-content li:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_2 .hustle-layout .hustle-group-content blockquote {margin-right: 0;margin-left: 0;}.hustle-ui.module_id_2 button.hustle-button-close {color: #38C5B5;}.hustle-ui.module_id_2 button.hustle-button-close:hover {color: #49E2D1;}.hustle-ui.module_id_2 button.hustle-button-close:focus,.hustle-ui.module_id_2 button.hustle-button-close:active {color: #FFFFFF;}.hustle-ui.module_id_2 .hustle-popup-mask {background-color: rgba(51,51,51,0.9);} .hustle-ui.module_id_2 .hustle-layout .hustle-group-content blockquote {border-left-color: #38C5B5;}</style><style type="text/css" id="hustle-module-4-0-styles" class="hustle-module-styles hustle-module-styles-4">@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-popup-content {max-width: 355px;max-height: none;max-height: unset;overflow-y: initial;}}@media screen and (min-width: 783px) { .hustle-layout {max-height: none;max-height: unset;}} .hustle-ui.module_id_4  {padding-right: 10px;padding-left: 10px;}.hustle-ui.module_id_4  .hustle-popup-content .hustle-info,.hustle-ui.module_id_4  .hustle-popup-content .hustle-optin {padding-top: 10px;padding-bottom: 10px;} .hustle-ui.module_id_4 .hustle-layout {padding: 0px 0px 0px 0px;border-width: 0px 0px 0px 0px;border-style: solid;border-color: #DADADA;border-radius: 0px 0px 0px 0px;background-color: #38454E;-moz-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);-webkit-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);} .hustle-ui.module_id_4 .hustle-layout .hustle-layout-header {padding: 20px 20px 20px 20px;border-width: 0px 0px 1px 0px;border-style: solid;border-color: rgba(0,0,0,0.16);border-radius: 0px 0px 0px 0px;background-color: rgba(0,0,0,0);-moz-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);-webkit-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);} .hustle-ui.module_id_4 .hustle-layout .hustle-layout-content {padding: 0px 0px 0px 0px;border-width: 0px 0px 0px 0px;border-style: solid;border-radius: 0px 0px 0px 0px;border-color: rgba(0,0,0,0);background-color: rgba(0,0,0,0);} .hustle-ui.module_id_4 .hustle-layout .hustle-layout-footer {padding: 1px 20px 20px 20px;border-width: 0px 0px 0px 0px;border-style: solid;border-color: rgba(0,0,0,0);border-radius: 0px 0px 0px 0px;background-color: rgba(0,0,0,0.16);-moz-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);-webkit-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);}  .hustle-ui.module_id_4 .hustle-layout .hustle-content {margin: 0px 0px 0px 0px;padding: 0 20px 0 20px;border-width: 0px 0px 0px 0px;border-style: solid;border-radius: 0px 0px 0px 0px;border-color: rgba(0,0,0,0);background-color: rgba(0,0,0,0);}.hustle-ui.module_id_4 .hustle-layout .hustle-content .hustle-content-wrap {padding: 20px 0 20px 0;} .hustle-ui.module_id_4 .hustle-layout .hustle-title {display: block;margin: 0px 0px 0px 0px;padding: 0px 0px 0px 0px;border-width: 0px 0px 0px 0px;border-style: solid;border-color: rgba(0,0,0,0);border-radius: 0px 0px 0px 0px;background-color: rgba(0,0,0,0);box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);-moz-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);-webkit-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);color: #ADB5B7;font: 400 33px/38px Georgia,Times,serif;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;text-align: left;} .hustle-ui.module_id_4 .hustle-layout .hustle-group-content {margin: 0px 0px 0px 0px;padding: 0px 0px 0px 0px;border-color: rgba(0,0,0,0);border-width: 0px 0px 0px 0px;border-style: solid;color: #ADB5B7;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content b,.hustle-ui.module_id_4 .hustle-layout .hustle-group-content strong {font-weight: bold;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content a,.hustle-ui.module_id_4 .hustle-layout .hustle-group-content a:visited {color: #38C5B5;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content a:hover {color: #2DA194;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content a:focus,.hustle-ui.module_id_4 .hustle-layout .hustle-group-content a:active {color: #2DA194;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content {color: #ADB5B7;font-size: 14px;line-height: 1.45em;font-family: Open Sans;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content p:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: normal 14px/1.45em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content p:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content p:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content p:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content h1:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 28px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content h1:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content h1:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content h1:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content h2:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font-size: 22px;line-height: 1.4em;font-weight: 700;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content h2:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content h2:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content h2:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content h3:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 18px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content h3:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content h3:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content h3:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content h4:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 16px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content h4:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content h4:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content h4:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content h5:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 14px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content h5:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content h5:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content h5:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content h6:not([class*="forminator-"]) {margin: 0 0 10px;color: #ADB5B7;font: 700 12px/1.4em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: uppercase;text-decoration: none;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content h6:not([class*="forminator-"]):last-child {margin-bottom: 0;}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content h6:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content h6:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]),.hustle-ui.module_id_4 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]) {margin: 0 0 10px;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]):last-child,.hustle-ui.module_id_4 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]):last-child {margin-bottom: 0;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content li:not([class*="forminator-"]) {margin: 0 0 5px;color: #ADB5B7;font: normal 14px/1.45em Open Sans;font-style: normal;letter-spacing: 0px;text-transform: none;text-decoration: none;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content li:not([class*="forminator-"]):last-child {margin-bottom: 0;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]) li:before {color: #ADB5B7}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]) li:before {color: #ADB5B7}@media screen and (min-width: 783px) {.hustle-ui.module_id_4 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]),.hustle-ui.module_id_4 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]) {margin: 0 0 20px;}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content ol:not([class*="forminator-"]):last-child,.hustle-ui.module_id_4 .hustle-layout .hustle-group-content ul:not([class*="forminator-"]):last-child {margin: 0;}}@media screen and (min-width: 783px) {.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content li:not([class*="forminator-"]) {margin: 0 0 5px;}.hustle-ui:not(.hustle-size--small).module_id_4 .hustle-layout .hustle-group-content li:not([class*="forminator-"]):last-child {margin-bottom: 0;}}.hustle-ui.module_id_4 .hustle-layout .hustle-group-content blockquote {margin-right: 0;margin-left: 0;}.hustle-ui.module_id_4 button.hustle-button-close {color: #38C5B5;}.hustle-ui.module_id_4 button.hustle-button-close:hover {color: #49E2D1;}.hustle-ui.module_id_4 button.hustle-button-close:focus,.hustle-ui.module_id_4 button.hustle-button-close:active {color: #FFFFFF;}.hustle-ui.module_id_4 .hustle-popup-mask {background-color: rgba(51,51,51,0.9);} .hustle-ui.module_id_4 .hustle-layout .hustle-group-content blockquote {border-left-color: #38C5B5;}</style>';
}
add_action('wp_head', 'add_inline_style_popup');
add_action('yml_update', 'yml_update_func');
function yml_update_func()
{
	$categories = get_categories([
		'taxonomy'     => 'category',
		'type'         => 'post',
		'child_of'     => 0,
		'parent'       => '',
		'orderby'      => 'name',
		'order'        => 'ASC',
		'hide_empty'   => 1,
		'hierarchical' => 1,
		'exclude'      => '',
		'include'      => '',
		'number'       => 0,
		'pad_counts'   => false,
	]);
	$post_tags = get_categories([
		'taxonomy'     => 'post_tag',
		'type'         => 'post',
		'child_of'     => 0,
		'parent'       => '',
		'orderby'      => 'name',
		'order'        => 'ASC',
		'hide_empty'   => 1,
		'hierarchical' => 1,
		'exclude'      => '',
		'include'      => '',
		'number'       => 0,
		'pad_counts'   => false,
	]);
	$yml = new domDocument("1.0", "utf-8");
	$root_yml = $yml->createElement("yml_catalog");
	$root_yml->setAttribute("date", date('Y-m-d H:i', strtotime('now')));
	$yml->appendChild($root_yml);
	$root_shop = $yml->createElement("shop");
	$name = $yml->createElement("name", "Arenda-Attrakcionov.ru");
	$company = $yml->createElement("company", "Arenda-Attrakcionov.ru");
	$url = $yml->createElement("url", "https://arenda-attrakcionov.ru");
	$root_yml->appendChild($root_shop);
	$root_shop->appendChild($name);
	$root_shop->appendChild($company);
	$root_shop->appendChild($url);
	$root_currencies = $yml->createElement("currencies");
	$root_shop->appendChild($root_currencies);
	$currency = $yml->createElement("currency");
	$currency->setAttribute("id", "RUR");
	$currency->setAttribute("rate", "1");
	$root_currencies->appendChild($currency);
	if ($categories) {
		$root_categories = $yml->createElement("categories");
		$root_shop->appendChild($root_categories);
		foreach ($categories as $cat) {
			$category = $yml->createElement("category", $cat->name);
			$category->setAttribute("id", $cat->cat_ID);
			$category->setAttribute("url", get_category_link($cat->cat_ID));
			$root_categories->appendChild($category);
		}
		if ($post_tags) {
			foreach ($post_tags as $cat) {
				$category = $yml->createElement("category", $cat->name);
				$category->setAttribute("id", $cat->cat_ID);
				$category->setAttribute("url", get_category_link($cat->cat_ID));
				$root_categories->appendChild($category);
			}
		}
	}
	$array_offers = [];
	$root_offers = $yml->createElement("offers");
	$root_shop->appendChild($root_offers);
	if ($categories) {
		foreach ($categories as $cat) {
			query_posts("cat={$cat->cat_ID}&orderby=post_title&post_type=post&post_status=publish&order=ASC&posts_per_page=1000");
			while (have_posts()) {
				the_post();
				$idpost = get_the_id();
				if (!isset($array_offers[$idpost])) {
					$array_offers[$idpost] = true;
					$root_offer = $yml->createElement("offer");
					if (get_field('multisearch_-_keywords')) {
						$keywords = $yml->createElement("keywords", get_field('multisearch_-_keywords'));
						$root_offer->appendChild($keywords);
					}
					if (get_field('multisearch_-_ordering')) {
						$ordering = $yml->createElement("ordering", get_field('multisearch_-_ordering'));
						$root_offer->appendChild($ordering);
					}
					$root_offer->setAttribute("id", $idpost);
					$root_offer->setAttribute("available", "true");
					$root_offers->appendChild($root_offer);
					$offer_name = $yml->createElement("name", get_the_title());
					$offer_url = $yml->createElement("url", get_permalink());
					$offer_price = $yml->createElement("price", (int)get_post_meta($idpost, 'wpcf-price_stuff', true));
					if ((int)get_post_meta($idpost, 'wpcf-is_myot', true) > 0) {
						$offer_price->setAttribute("from", "true");
					}
					$offer_currencyId = $yml->createElement("currencyId", "RUR");
					if (get_field('multisearch_-_parent_category') || get_field('multisearch_-_product_categories')) {
						if (get_field('multisearch_-_parent_category')) {
							$offer_categoryId = $yml->createElement("categoryId", get_field('multisearch_-_parent_category'));
						}
						if (get_field('multisearch_-_product_categories')) {
							$offer_categoryId = $yml->createElement("categoryId", get_field('multisearch_-_product_categories'));
						}
					} else {
						$offer_categoryId = $yml->createElement("categoryId", $cat->cat_ID);
					}
					if (has_post_thumbnail()) {
						$offer_picture = $yml->createElement("picture", get_the_post_thumbnail_url($idpost));
					}
					$root_offer->appendChild($offer_name);
					$root_offer->appendChild($offer_url);
					$root_offer->appendChild($offer_price);
					$root_offer->appendChild($offer_currencyId);
					$root_offer->appendChild($offer_categoryId);
					$root_offer->appendChild($offer_picture);
				}
			}
		}
	}
	wp_reset_query();
	unlink($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'eff_yml.xml');
	$yml->save($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'eff_yml.xml');
}
function allow_users_to_flush($capability)
{
	return "publish_posts";
}
add_filter("w3tc_capability_row_action_w3tc_flush_post", "allow_users_to_flush", 10, 10);
add_filter("w3tc_capability_w3tc_flush", "allow_users_to_flush", 10, 10);
add_filter("w3tc_capability_w3tc_flush_all", "allow_users_to_flush", 10, 10);
add_filter("w3tc_capability_admin_bar", "allow_users_to_flush", 10, 10);
add_filter("w3tc_capability_admin_bar_flush_all", "allow_users_to_flush", 10, 10);
add_filter("w3tc_capability_admin_bar_w3tc", "allow_users_to_flush", 10, 10);
add_filter("w3tc_capability_admin_bar_flush", "allow_users_to_flush", 10, 10);
add_filter("w3tc_capability_w3tc", "allow_users_to_flush", 10, 10);
function w3tc_cap_filter($allcaps, $cap, $args)
{
	if (preg_match("/w3tc_dashboard/", $_SERVER["REQUEST_URI"])) {
		$allcaps[$cap[0]] = true;
	}
	return $allcaps;
}
add_filter('user_has_cap', 'w3tc_cap_filter', 10, 3);
// Добавил опцию в тему
function mytheme_customize_register($wp_customize)
{
	$wp_customize->add_section(
		'phone_section',
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
			'label' => 'Телефон',
			'section' => 'phone_section',
			'settings' => 'theme_phonetext'
		)
	);
}
add_action('customize_register', 'mytheme_customize_register');
add_action('wp_footer', 'analy_forms_wp_footer');
function analy_forms_wp_footer()
{
?>
	<script type="text/javascript">
		document.addEventListener('wpcf7mailsent', function(event) {
			if ('22099' == event.detail.contactFormId) {
				ga('send', {
					'hitType': 'pageview',
					'page': '/contact-us-success'
				});
				yaCounter24366505.reachGoal('form_feedback');
			}
			if ('22133' == event.detail.contactFormId) {
				ga('send', {
					'hitType': 'pageview',
					'page': '/contact-us-success2'
				});
				yaCounter24366505.reachGoal('zakaz');
			}
		}, false);
	</script>
<?php
}
function get_user_ip()
{
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return apply_filters('edd_get_ip', $ip);
}
/* ПОИСК ПО МЕТАПОЛЮ ЗАПИСИ TODO: */
function show_keywords_only_posts($query)
{
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
function custom_keywors_posts_where($where = '')
{
	global $wpdb, $wp_query, $pagenow;
	if (is_admin() && $pagenow === 'edit.php') {
		$where .= sprintf(
			' OR (  %2$s.meta_key = "keywords" AND %2$s.meta_value LIKE %3$s AND %1$s.post_type="post"  ) OR (%1$s.post_title LIKE %3$s AND %1$s.post_type="post" )',
			$wpdb->posts,
			$wpdb->postmeta,
			(!empty($wp_query->query_vars['s'])) ? "'%" . $wp_query->query_vars['s'] . "%'" : "'%Dummy%'"
		);
	} else {
		$where .= sprintf(
			' OR ( %1$s.post_status="publish" AND  %2$s.meta_key = "keywords" AND %2$s.meta_value LIKE %3$s AND %1$s.post_type="post" ) OR (%1$s.post_title LIKE %3$s AND %1$s.post_type="post" AND %1$s.post_status="publish" )',
			$wpdb->posts,
			$wpdb->postmeta,
			(!empty($wp_query->query_vars['s'])) ? "'%" . $wp_query->query_vars['s'] . "%'" : "'%Dummy%'"
		);
	}
	remove_filter('posts_where', 'custom_keywors_posts_where');
	return $where;
}
/* ПОИСК ПО ЗАПИСЯМ TODO-END: */
add_filter('manage_post_posts_columns', 'my_manage_post_posts_columns', 9);
function my_manage_post_posts_columns($columns)
{
	$columns['wpcf-size_stuff'] = esc_html__('Размер');
	$columns['wpcf-energy_stuff'] = esc_html__('Электропитание');
	$columns['wpcf-is_myot'] = esc_html__('Флаг "От"');
	$columns['wpcf-price_stuff'] = esc_html__('Цена');
	return $columns;
}
add_filter( 'manage_edit-category_columns', function ( $columns ) {
    if ( !isset($_GET['taxonomy']) || $_GET['taxonomy'] != 'category' )
    return $columns;
    if ( $posts = $columns['description'] ){ unset($columns['description']); }
    if ( $posts = $columns['wpcf_field_my_bannercat'] ){ unset($columns['wpcf_field_my_bannercat']); }
    if ( $posts = $columns['wpcf_field_videoforcats3'] ){ unset($columns['wpcf_field_videoforcats3']); }
    if ( $posts = $columns['wpcf_field_videoforcats2'] ){ unset($columns['wpcf_field_videoforcats2']); }
    if ( $posts = $columns['wpcf_field_videoforcats'] ){ unset($columns['wpcf_field_videoforcats']); }
    return $columns;
}, 99,10);
if (!function_exists('post_is_in_descendant_category')) {
	function post_is_in_descendant_category($cats, $_post = null)
	{
		foreach ((array) $cats as $cat) {
			$descendants = get_term_children((int) $cat, 'category');
			if ($descendants && in_category($descendants, $_post))
				return true;
		}
		return false;
	}
}
if (function_exists('register_nav_menu')) {
	register_nav_menu('top_menu', 'Верхнее меню');
}
if (function_exists('register_nav_menu')) {
	register_nav_menu('home_menu', 'Меню на главной');
}
if (function_exists('register_nav_menu')) {
	register_nav_menu('cat_menu', 'Меню в категориях');
}
if (function_exists('register_nav_menu')) {
	register_nav_menu('ps_above_menu', 'Под шапкой');
}
if (function_exists('register_nav_menu')) {
	register_nav_menu('left_menu', 'Мобильное');
}
register_sidebar(array(
	'name' => 'Аренда Аттракционов',
	'id' => 'sidebar-block_bottom_left',
	'description' => 'Текстовый блок на главной (левый)',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '',
	'after_title' => '',
));
register_sidebar(array(
	'name' => 'Программы отдыха',
	'id' => 'sidebar-block_bottom_center',
	'description' => 'Текстовый блок на главной (центральный)',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '',
	'after_title' => '',
));
register_sidebar(array(
	'name' => 'Мастер классы',
	'id' => 'sidebar-block_bottom_right',
	'description' => 'Текстовый блок на главной (правый)',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '',
	'after_title' => '',
));
register_sidebar(array(
	'name' => 'Мессенджеры в шапке',
	'id' => 'sidebar-mess_top',
	'description' => 'Мессенджеры в шапке',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '',
	'after_title' => '',
));
register_sidebar(array(
	'name' => 'Соцкнопки в подвале',
	'id' => 'sidebar-socials_bottom',
	'description' => 'Соцкнопки в подвале',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '',
	'after_title' => '',
));
register_sidebar(array(
	'name' => 'Мессенджеры - плавающий слева',
	'id' => 'sidebar-messengers_left',
	'description' => 'Мессенджеры - плавающий слева',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '',
	'after_title' => '',
));
register_sidebar(array(
	'name' => __('Промо карточка в категории', ''),
	'id' => 'cat-items-promo',
	'description' => 'Блок в начале списка карточек в категории',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '',
	'after_title' => '',
));
register_sidebar(array(
	'name' => __('Промо карточка в категории (mobile)', ''),
	'id' => 'cat-items-promo-mobile',
	'description' => 'Блок в начале списка карточек в категории',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '',
	'after_title' => '',
));
register_sidebar(array(
	'name' => __('Баннер в карточке товара (mobile)', ''),
	'id' => 'banner-on-items',
	'description' => 'Баннер перед основным описанием',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '',
	'after_title' => '',
));
register_sidebar(array(
	'name' => __('Промо банер на главной', ''),
	'id' => 'home-promo-banner',
	'description' => 'Промо банер на главной',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '',
	'after_title' => '',
));
register_sidebar(array(
	'name' => __('Сквозной блок в левом сайдбаре', ''),
	'id' => 'sidebar-navcat_bottom',
	'description' => 'Под блоком навигации',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '',
	'after_title' => '',
));
add_filter( 'upload_mimes', 'upload_allow_types' );
function upload_allow_types( $mimes ) {
	$mimes['webm'] = 'video/webm';
	return $mimes;
}
add_filter('toolset_valid_video_extentions', 'my_toolset_valid_video_extentions');
function my_toolset_valid_video_extentions($exts)
{
    $exts[] = 'webm';
    return $exts;
}
//add_action('admin_menu', 'remove_admin_menu', 999);
//function remove_admin_menu() {
//    remove_menu_page('edit.php?post_type=acf');
//}
if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
}
function dimox_breadcrumbs()
{
	/* === ОПЦИИ === */
	$text['home']     = 'Главная'; // текст ссылки "Главная"
	$text['category'] = '%s'; // текст для страницы рубрики
	$text['search']   = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
	$text['tag']      = 'Записи с тегом "%s"'; // текст для страницы тега
	$text['author']   = 'Статьи автора %s'; // текст для страницы автора
	$text['404']      = 'Ошибка 404'; // текст для страницы 404
	$show_current   = 1; // 1 - показывать название текущей статьи/страницы/рубрики, 0 - не показывать
	$show_on_home   = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
	$show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
	$show_title     = 1; // 1 - показывать подсказку (title) для ссылок, 0 - не показывать
	$delimiter      = '<b> > </b>'; // разделить между "крошками"
	$before         = '<span class="current">'; // тег перед текущей "крошкой"
	$after          = '</span>'; // тег после текущей "крошки"
	/* === КОНЕЦ ОПЦИЙ === */
	global $post;
	$home_link    = home_url('/');
	$link_before  = '<span>';
	$link_after   = '</span>';
	$link_attr    = '';
	$link         = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
	$parent_id    = $parent_id_2 = $post->post_parent;
	$frontpage_id = get_option('page_on_front');
	if (is_home() || is_front_page()) {
		if ($show_on_home == 1) echo '<div id="breadcrumbs"><a href="' . $home_link . '">' . $text['home'] . '</a></div>';
	} else {
		echo '<div id="breadcrumbs">';
		if ($show_home_link == 1) {
			echo sprintf($link, $home_link, $text['home']);
			if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;
		}
		if (is_category()) {
			$this_cat = get_category(get_query_var('cat'), false);
			if ($this_cat->parent != 0) {
				$cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo $cats;
			}
			if ($show_current == 1) echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;
		} elseif (is_search()) {
			echo $before . sprintf($text['search'], get_search_query()) . $after;
		} elseif (is_day()) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F')) . $delimiter;
			echo $before . get_the_time('d') . $after;
		} elseif (is_month()) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo $before . get_the_time('F') . $after;
		} elseif (is_year()) {
			echo $before . get_the_time('Y') . $after;
		} elseif (is_single() && !is_attachment()) {
			if (get_post_type() != 'post') {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
				if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
			} else {
				$cat = get_the_category();
				$cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $delimiter);
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo $cats;
				if ($show_current == 1) echo $before . get_the_title() . $after;
			}
		} elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;
		} elseif (is_attachment()) {
			$parent = get_post($parent_id);
			$cat = get_the_category($parent->ID);
			$cat = $cat[0];
			$cats = get_category_parents($cat, TRUE, $delimiter);
			$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
			$cats = str_replace('</a>', '</a>' . $link_after, $cats);
			if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
			echo $cats;
			printf($link, get_permalink($parent), $parent->post_title);
			if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
		} elseif (is_page() && !$parent_id) {
			if ($show_current == 1) echo $before . get_the_title() . $after;
		} elseif (is_page() && $parent_id) {
			if ($parent_id != $frontpage_id) {
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					if ($parent_id != $frontpage_id) {
						$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
					}
					$parent_id = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs) - 1) echo $delimiter;
				}
			}
			if ($show_current == 1) {
				if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;
				echo $before . get_the_title() . $after;
			}
		} elseif (is_tag()) {
			echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
		} elseif (is_author()) {
			global $author;
			$userdata = get_userdata($author);
			echo $before . sprintf($text['author'], $userdata->display_name) . $after;
		} elseif (is_404()) {
			echo $before . $text['404'] . $after;
		}
		if (get_query_var('paged')) {
			if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ' (';
			echo __('Page') . ' ' . get_query_var('paged');
			if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ')';
		}
		echo '</div><!-- .breadcrumbs -->';
	}
} // end dimox_breadcrumbs()
function hour()
{
	return 60 * 60;
}
add_filter('wp_session_expiration',  'hour'); // Set expiration to 1 hour
function css_to_tree_select()
{
	wp_enqueue_style('wp_head_style', get_stylesheet_directory_uri() . '/css/jquery.tree-multiselect.min.css', array(), null);
}
add_action('admin_enqueue_scripts', 'css_to_tree_select');
function js_to_tree_select()
{
	wp_enqueue_script('wp_head_js', get_template_directory_uri() . '/js/jquery.tree-multiselect.min.js', array(), null);
}
add_action('admin_enqueue_scripts', 'js_to_tree_select');
function my_sorting()
{
	wp_enqueue_script('mysorting', get_template_directory_uri() . '/js/my-sorting.js', array(), null);
}
add_action('admin_enqueue_scripts', 'my_sorting');
include('meta_boxes.php');
function add_tematic_attr_block()
{
}
function get_tematic_mas()
{
	$wpdb = new wpdb('u390355', '', 'u390355_master', 'u390355.mysql.masterhost.ru');
	$wpdb->set_prefix('wp_');
	$categories = $wpdb->get_results("SELECT $wpdb->terms.term_id as id, $wpdb->terms.name as title FROM $wpdb->terms", 'ARRAY_A');
	foreach ($categories as $key => $value) {
		$value['title'] = trim($value['title']);
		$post_ids[$value['title']] = $wpdb->get_results("SELECT $wpdb->term_relationships.object_id as id, $wpdb->posts.post_title as title FROM $wpdb->term_relationships
 LEFT JOIN $wpdb->posts ON $wpdb->term_relationships.object_id=$wpdb->posts.ID WHERE $wpdb->term_relationships.term_taxonomy_id = {$value['id']}", 'ARRAY_A');
	}
	ksort($post_ids, SORT_NATURAL | SORT_LOCALE_STRING);
	global $post;
	// Вытягиваем все поля с поста
	$tematic_atr = get_post_meta($post->ID, "tematic_mas", true);
	echo "
          <script>
                jQuery(function() {
                    var options = { sortable: true, collapsible: true, startCollapsed: true };
                    jQuery(\"select#tematic_mas\").treeMultiselect(options);
                });
          </script>
            <select id=\"tematic_mas\" name=\"tematic_mas[]\" multiple=\"multiple\">";
	foreach ($post_ids as $key => $posts) {
		foreach ($posts as $mypost) {
			if (in_array($mypost['id'], $tematic_atr))
				$selected = "selected";
			else
				$selected = "";
			echo "<option " . $selected . " data-section=\"$key\" value=\"" . $mypost['id'] . "\">" . $mypost['title'] . "</option>";
		}
	}
	echo "</select>";
}
function go_filter($args, $catID)
{
	if (empty($args)) {
		$args = array();
	}
	$args['meta_query'] = array('relation' => 'AND');
	$args['paged'] = get_query_var('paged');
	$args['page'] = get_query_var('page');
	if ($_GET['razdel'] != '') {
		$args['meta_query'][] = array(
			'key' => 'razdel',
			'value' => (int)$_GET['razdel'],
			'type' => 'id'
		);
	}
	if ($_GET['price_ot'] != '' || $_GET['price_do'] != '') {
		if ($_GET['price_ot'] == '') $_GET['price_ot'] = 0;
		if ($_GET['price_do'] == '') $_GET['price_do'] = 9999999;
		$args['meta_query'][] = array(
			'key' => 'wpcf-price_stuff',
			'value' => array((int)$_GET['price_ot'], (int)$_GET['price_do']),
			'type' => 'numeric',
			'compare' => 'BETWEEN'
		);
	}
	if (!empty($_GET['rooms'])) {
		$args['meta_query'][] = array(
			'key' => 'rooms',
			'value' => $_GET['rooms'],
			'type' => 'numeric',
			'compare' => 'IN'
		);
	}
	if ($_GET['photo'] != '') {
		$args['meta_query'][] = array(
			'key' => '_thumbnail_id',
		);
	}
	if ($_GET['keyword'] != '') {
		$args['s'] = $_GET['keyword'];
	}
	if (isset($_GET['sort'])) {
		switch ($_GET['sort']) {
			case 'name':
				if (isset($_GET['order']) && ($_GET['order'] == 'desc' || $_GET['order'] == 'asc')) {
					$order = $_GET['order'];
					query_posts("cat={$catID}&post_type=post&paged={$args['paged']}&page={$args['page']}&orderby=post_title&order=$order");
				} else {
					query_posts("cat={$catID}&post_type=post&paged={$args['paged']}&page={$args['page']}&orderby=post_title&order=ASC");
				}
				break;
			case 'asc':
				query_posts("cat={$catID}&post_type=post&paged={$args['paged']}&page={$args['page']}&meta_key=wpcf-price_stuff&orderby=meta_value_num&order=ASC");
				break;
			case 'desc':
				query_posts("cat={$catID}&post_type=post&paged={$args['paged']}&page={$args['page']}&meta_key=wpcf-price_stuff&orderby=meta_value_num&order=DESC"); //cat={$catID}
				break;
			case 'price':
				if (isset($_GET['order']) && ($_GET['order'] == 'desc' || $_GET['order'] == 'asc')) {
					$order = $_GET['order'];
					query_posts("cat={$catID}&post_type=post&paged={$args['paged']}&page={$args['page']}&meta_key=wpcf-price_stuff&orderby=meta_value_num&order={$order}");
				}
				break;
			default:
				break;
		}
	} else {
		query_posts($catID . '&orderby=post_title&order=ASC');
	}
}
function cmp_function($a, $b)
{
	if (isset($_GET['sort'])) {
		switch ($_GET['sort']) {
			case 'name':
				$la = mb_substr($a->title, 0, 1, 'utf-8');
				$lb = mb_substr($b->title, 0, 1, 'utf-8');
				if (ord($la) > 122 && ord($lb) > 122) {
					return $a->title > $b->title ? 1 : -1;
				}
				if (ord($la) > 122 || ord($lb) > 122) {
					return $a->title < $b->title ? 1 : -1;
				}
				break;
			case 'asc':
				$a = intval(preg_replace('/\D/', '', $a->price));
				$b = intval(preg_replace('/\D/', '', $b->price));
				return $a - $b; // $b - $a
				break;
			case 'desc':
				$a = intval(preg_replace('/\D/', '', $a->price));
				$b = intval(preg_replace('/\D/', '', $b->price));
				return $b - $a; // $b - $a
				break;
			default:
				break;
		}
	} else {
		$la = mb_substr($a->title, 0, 1, 'utf-8');
		$lb = mb_substr($b->title, 0, 1, 'utf-8');
		if (ord($la) > 122 && ord($lb) > 122) {
			return $a->title > $b->title ? 1 : -1;
		}
		if (ord($la) > 122 || ord($lb) > 122) {
			return $a->title < $b->title ? 1 : -1;
		}
	}
}
function phone(&$number)
{
	$number = strval($number);
	$str = '(' . substr($number, 0, 3) . ')' . substr($number, 3, 3) . '-' . substr($number, 6, 2) . '-' . substr($number, 8, 2);
	return $str;
}
//отключение обновления плагинов start
function disable_updates($value)
{
	unset($value->response['types/wpcf.php']);
	return $value;
}
add_filter('site_transient_update_plugins', 'disable_updates');
add_action('wp_enqueue_scripts', 'add_scripts');
function add_scripts()
{
	// отменяем зарегистрированный jQuery
	wp_deregister_script('jquery-core');
	wp_deregister_script('jquery');
	// регистрируем
	wp_register_script('jquery-core', get_template_directory_uri().'/js/jquery3.3.1.min.js', false, null, true);
	wp_register_script('jquery', false, array('jquery-core'), null, true);
	// подключаем
	wp_enqueue_script('jquery');
	if (!is_admin()) {
		// отменяем зарегистрированный jQuery
		wp_deregister_script('jquery-core');
		wp_deregister_script('jquery');
		// регистрируем
		wp_register_script('jquery-core', get_template_directory_uri().'/js/jquery3.5.1.min.js', false, null, true);
		wp_register_script('jquery', false, array('jquery-core'), null, true);
		// подключаем
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-mouse');
		wp_enqueue_script('jquery-ui-draggable');
	}
}
if (!is_admin()) {
	wp_deregister_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'bitrix24' );
function replain()
{
	wp_enqueue_script('prointeractiv', get_stylesheet_directory_uri() . '/js/replain.js', array('jquery'), null, true);
}
function bitrix24()
{
	wp_enqueue_script('prointeractiv', get_stylesheet_directory_uri() . '/js/bitrix24.js', array('jquery'), null, true);
}
function js_var()
{
	$variables = array(
		'ajax_url' => admin_url('admin-ajax.php'),
		'is_mobile' => wp_is_mobile()
	);
	echo '<script type="text/javascript">window.wp_data = ', json_encode($variables), ';</script>';
}
add_action('wp_head', 'js_var');
add_action('wp_ajax_nopriv_get_searchresult', 'get_searchresult'); // For anonymous
add_action('wp_ajax_get_searchresult', 'get_searchresult');
function get_searchresult()
{
	if (is_string($_REQUEST['s'])) {
		//Запрос к API Яндекс.Поиск
		$uri = "https://api.multisearch.io/?id=10742&query={$_REQUEST['s']}&uid=cc441f080&categories=0&limit=1000";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, $uri);
		$result = curl_exec($ch);
		curl_close($ch);
		$array = json_decode($result, true);
		if (empty($array['total'])) {
			$str = '
            <div id="customize_search_results_ya" class="customize-search-ya">
                <div class="heading-ya">Ничего не найдено!</div>
            </div>
            ';
			echo $str;
			exit;
		}
		if (isset($array['errorCode']) && $array['errorCode'] >= 400) {
			$str = '
            <div id="customize_search_results_ya" class="customize-search-ya">
                <div class="heading-ya">Ошибка поиска, обратитесь в техподдержку сайта!</div>
            </div>
            ';
			echo $str;
			exit;
		}
		$count_products = $array['total'];
		$str = '
        <div id="customize_search_results_ya" class="customize-search-ya">
        ';
		if (!empty($array['misspell']['reask']['text'])) {
			$str .= '
                <div class="small-text-ya">' . $array['misspell']['reask']['text'] . '</div>
            ';
		}
		$str .= '
            <div class="products-ya">
            <div class="heading-ya">Товары (' . $count_products . ')</div>
        ';
		if (!empty($count_products) && $count_products > 0) {
			query_posts(array(
				'post_type' => 'post',
				'post__in' => $array['results']['ids'],
				'post_status' => 'publish',
				'orderby' => 'date',
				'order' => 'DESC'
			));
			while (have_posts()) {
				the_post();
				$idpost = get_the_id();
				if ((int)get_post_meta(get_the_id(), 'wpcf-is_myot', true) > 0) $ot = 'От ';
				else $ot = '';
				$str .= '
                <div class="product-ya">
                    <a href="' . get_permalink() . '" title="' . get_the_title() . '">
                        <div class="product-image-ya"><img src="' . get_the_post_thumbnail_url($idpost) . '" alt="' . get_the_title() . '"></div>
                        <div class="product-info-ya">
                            <div class="product-name-ya">' . get_the_title() . '</div>
                            <div class="product-price-ya">' . $ot . number_format((int)get_post_meta(get_the_id(), 'wpcf-price_stuff', true), 0, '', ' ') . ' р.</div>
                        </div>
                    </a>
                </div>
                ';
			}
			$str .= '
                </div>
            ';
		}
		$str .= '
        </div>
        ';
		echo $str;
	}
	wp_die();
}
function fix_pagination_pages()
{
	global $wp_query;
	$is_force = false;
	// 1. Get the post object
	$current_obj = get_queried_object();
	// 2. Check if post object is defined
	if (!empty($current_obj->post_type)) {
		// 3. Check if pagination is detected
		$current_page = (!empty($wp_query->query_vars['page'])) ? $wp_query->query_vars['page'] : 1;
		$current_page = (empty($wp_query->query_vars['page']) && !empty($wp_query->query_vars['paged'])) ? $wp_query->query_vars['paged'] : $current_page;
		// 4. Count post pages
		$num_pages = substr_count(strtolower($current_obj->post_content), '<!--nextpage-->') + 1;
		if ($current_page > 1 && ($current_page > $num_pages)) {
			$is_force = true;
		}
	} else if (is_tag() || is_category()) {
		global $wp;
		$current_url = parse_url(home_url(add_query_arg(array(), $wp->request)));
		$current_url = trailingslashit($current_url['path']);
		$possible_url_array = array();
		$full = trailingslashit(parse_url(get_term_link($current_obj))['path']);
		$short = '/' . trailingslashit($current_obj->slug);
		array_push($possible_url_array, $full);
		array_push($possible_url_array, '/tag' . $full);
		array_push($possible_url_array, '/category' . $full);
		array_push($possible_url_array, $short);
		array_push($possible_url_array, '/tag' . $short);
		array_push($possible_url_array, '/category' . $short);
		if (!in_array($current_url, $possible_url_array)) {
			$is_force = true;
		}
	}
	if ($is_force) {
		$wp_query->is_404 = true;
		$wp_query->query = $wp_query->queried_object = $wp_query->queried_object_id = null;
		$wp_query->set_404();
		status_header(404);
		nocache_headers();
		include(get_query_template('404'));
		die();
	}
}
function my_dashicons()
{
	wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'my_dashicons');
function emm_paginate($args = null)
{
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
			$output .= sprintf(
				'%s%s%s',
				emm_paginate_loop(1, $anchor),
				$ellipsis,
				emm_paginate_loop($block_min, $pages, $page)
			);
		} else if ($left_gap && $right_gap) {
			$output .= sprintf(
				'%s%s%s%s%s',
				emm_paginate_loop(1, $anchor),
				$ellipsis,
				emm_paginate_loop($block_min, $block_high, $page),
				$ellipsis,
				emm_paginate_loop(($pages - $anchor + 1), $pages)
			);
		} else if ($right_gap && !$left_gap) {
			$output .= sprintf(
				'%s%s%s',
				emm_paginate_loop(1, $block_high, $page),
				$ellipsis,
				emm_paginate_loop(($pages - $anchor + 1), $pages)
			);
		} else {
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
function emm_paginate_loop($start, $max, $page = 0)
{
	$output = "";
	for ($i = $start; $i <= $max; $i++) {
		$output .= ($page === intval($i))
			? "<a href='" . get_pagenum_link($i) . "' class='emm-page emm-current'>$i</a>"
			: "<a href='" . get_pagenum_link($i) . "' class='emm-page'>$i</a>";
		//$output .= "<a href='" . get_pagenum_link($i) . "' class='emm-page'>$i</a>";
	}
	return $output;
}
function page_tagfix_redirect()
{
	$terms = get_terms('post_tag', [
		'hide_empty' => false,
		'slug' => get_queried_object()->slug
	]);
	$url_query = parse_url($_SERVER["REQUEST_URI"]);
	$url_query = explode('/', $url_query['path']);
	if (is_category() && !is_user_logged_in() && is_array($terms) && $url_query[1] == 'tag') {
		wp_redirect(home_url('/' . get_queried_object()->slug), 301);
		exit();
	} else if ($url_query[1] == 'rasshirennyj_poisk_gruppy') {
		wp_redirect(home_url('/' . get_queried_object()->slug), 301);
		exit();
	}
}
add_action('template_redirect', 'page_tagfix_redirect');
add_filter('the_content', 'filter_nbsp', 999, 1);
function filter_nbsp($content)
{
	$content = mb_ereg_replace("\s", " ", $content);
	return $content;
}
function loadmore_script()
{
	wp_enqueue_script('jquery'); // подключает библиотеку jQuery необходимую для работы скрипта
	wp_enqueue_script('loadmore', get_stylesheet_directory_uri() . '/js/loadmore.js', array('jquery')); // подключаем loadmore.js
}

function custom_css() {
    echo wp_enqueue_style( 'style', get_template_directory_uri() . '/main.css', array(), '4.0.0' );
}

add_action('admin_head','custom_css');
function loadmore_get_posts()
{
	global $post;
	$args = unserialize(stripslashes($_POST['query']));
	$args['paged'] = $_POST['page'] + 1;
	session_start();
	$sort_data = $_SESSION['sort_data'];
	if($sort_data == 'price_up') {
		$args['meta_key'] = 'wpcf-price_stuff';
		$args['orderby'] = 'meta_value';
		$args['order'] = 'ASC';
	} elseif($sort_data == 'price_down') {
		$args['meta_key'] = 'wpcf-price_stuff';
		$args['orderby'] = 'meta_value';
		$args['order'] = 'DESC';
	} elseif($sort_data == 'date_up') {
		$args['orderby'] = 'date';
		$args['order'] = 'ASC';
	} elseif($sort_data == 'date_down') {
		$args['orderby'] = 'date';
		$args['order'] = 'DESC';
	}
	$offset = $args['paged'];
	$query = new WP_Query($args);
	while ($query->have_posts()) {
		$query->the_post();
		$title = get_the_title();
		$isot = get_post_meta($post->ID, 'wpcf-is_myot', true);
		$price = $priceCheck = get_post_meta($post->ID, 'wpcf-price_stuff', true);
		$short_description = get_post_meta($post->ID, 'wpcf-short_description', true);
		if(function_exists('types_render_field')) {
			$images_thumb = explode("|", types_render_field("photo", array("raw" => "true", "output" => "", "show_name" => "false", "url" => "false", "separator" => "|")));
			$images_thumb = array_slice($images_thumb, 0, 3);
		}
		$price = number_format((int)$price, 0, '', ' ').' Р';
		if ($isot) $price = "от $price";
		if (has_post_thumbnail()) {
			$thumbSrc = get_the_post_thumbnail_url(null, 'medium');
		}
		if(empty($priceCheck)) $price = 'по запросу'; ?>
			<div <?=isset($offset) ? "id=\"page-$offset\"" : ""?> class="col">
				<div id="product-<?= get_the_ID(); ?>" class="product card text-center h-100" data-href="<?= get_permalink() ?>">
					<div class="btn-favorites position-absolute top-0 end-0"><?= do_shortcode('[ccc_my_favorite_select_button post_id="" style="1"]') ?>
							<!-- <i class="bi bi-suit-heart fs-4"></i>-->
						</div>
					<div style="width: 230px;height: auto;overflow:hidden;" class="img-items brazz">
						<img width="230" height="230" src="<?= $thumbSrc ?>" alt="">
						<?php foreach ($images_thumb as $img_src) { ?>
							<img width="230" height="230" src="<?= $img_src ?>" alt="">
						<?php } ?>
					</div>
					<div class="card-body py-0">
						<h5 class="card-title"><?= $title ?></h5>
						<p class="card-text text-center d-none d-sm-block"><?= $short_description ? $short_description : '' ?></p>
					</div>
					<div class="card-footer bg-white border-top-0">
						<div class="d-flex flex-column flex-sm-column flex-lg-row justify-content-between align-items-center">
							<div class="price-new"><?= $price ?></div>
							<a href="<?= get_permalink() ?>" class="btn btn-light stretched-link">Подробнее</a>
						</div>
					</div>
				</div>
			</div>
		<?php
		unset($offset);
	}
	wp_reset_postdata();
	die();
}
function opengraph_metas($metas = [])
{
	global $post;
	if (is_category() || is_single() || is_tax() || is_tag() || is_front_page()) {
		if (is_category()) {
			$current_id = get_cat_id(single_cat_title('', false));
			$tax_meta = get_option("category_$current_id");
			if (esc_attr($tax_meta['seo_meta_tag_title']) != '') {
				$metas['title'] = esc_attr($tax_meta['seo_meta_tag_title']); //.' '.$sep.' ';
				$metas['description'] = esc_attr($tax_meta['seo_meta_tag_description']);
			}
			return $metas;
		} elseif (is_tag()) {
			$current_id = get_query_var('tag_id');
			$tax_meta = get_option("post_tag_$current_id");
			if (esc_attr($tax_meta['seo_meta_tag_title']) != '') {
				$metas['title'] = esc_attr($tax_meta['seo_meta_tag_title']);
				$metas['description'] = esc_attr($tax_meta['seo_meta_tag_description']);
			}
			return $metas;
		} elseif (is_tax()) {
			$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
			$tax_meta = get_option($term->taxonomy . "_" . $term->term_id);
			if (esc_attr($tax_meta['seo_meta_tag_title']) != '') {
				$metas['title'] = esc_attr($tax_meta['seo_meta_tag_title']);
				$metas['description'] = esc_attr($tax_meta['seo_meta_tag_description']);
			}
			return $metas;
		} elseif (is_single()) {
			$metas['title'] = trim(strip_tags(get_post_meta($post->ID, 'title', true)));
			$metas['description'] = trim(strip_tags(get_post_meta($post->ID, 'description', true)));
			return $metas;
		} elseif (is_single() || is_page()) {
			$tags = get_post_meta($post->ID, 'wp_post_meta_tags', true);
			if (isset($tags) && is_array($tags)) {
				if (isset($tags['wp_post_meta_tag_title']) && (esc_attr($tags['wp_post_meta_tag_title']) != '')) {
					$metas['title'] = trim(esc_attr($tags['wp_post_meta_tag_title']));
					$metas['description'] = trim(esc_attr($tags['wp_post_meta_tag_description']));
				}
				return $metas;
			}
		}
	}
	return $metas;
}
add_filter('aioseop_description_title', 'opengraph_metas');
function itsme_disable_feed()
{
	wp_die(__('No feed available, please visit the <a href="' . esc_url(home_url('/')) . '">homepage</a>!'));
}
add_action('do_feed', 'itsme_disable_feed', 1);
add_action('do_feed_rdf', 'itsme_disable_feed', 1);
add_action('do_feed_rss', 'itsme_disable_feed', 1);
add_action('do_feed_rss2', 'itsme_disable_feed', 1);
add_action('do_feed_atom', 'itsme_disable_feed', 1);
add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('template_redirect', 'wp_shortlink_header', 11);
add_action('admin_print_footer_scripts', 'check_textarea_length');
function check_textarea_length()
{  ?>
	<script type="text/javascript">
		//var visual_editor_char_limit = 0;
		//var html_editor_char_limit = 0;
		//var char_limit_warning="Превышен лимит символов!";
		window.onload = function() {
			var visual = (typeof tinyMCE != "undefined") && tinyMCE.activeEditor && !tinyMCE.activeEditor.isHidden() ? true : false;
			if (visual) {
				editor_content = tinyMCE.activeEditor.getContent().replace(/(<[a-zA-Z\/][^<>]*>|\[([^\]]+)\])|(\s+)/ig, '');
				if (jQuery('.word-count-message').length > 0) {
					jQuery('.word-count-message').text('Количество символов (без пробелов): ' + editor_content.length);
				} else {
					jQuery('#wp-word-count, .mce-statusbar').append('<div class="word-count-message">Количество символов (без пробелов): ' + editor_content.length + '</div>');
				}
				tinyMCE.activeEditor.on('keyup', function(ed, e) {
					editor_content = this.getContent().replace(/(<[a-zA-Z\/][^<>]*>|\[([^\]]+)\])|(\s+)/ig, '');
					// debug
					console.log("tinymce редактор кол-во символов: " + editor_content.length);
					if (jQuery('.word-count-message').length > 0) {
						jQuery('.word-count-message').text('Количество символов (без пробелов): ' + editor_content.length);
					} else {
						jQuery('#wp-word-count, .mce-statusbar').append('<div class="word-count-message">Количество символов (без пробелов): ' + editor_content.length + '</div>');
					}
				});
			}
			// HTML
			if (jQuery("#content").length) {
				jQuery("#content").keyup(function() {
					// debug
					console.log("html редактор кол-во символов: " + jQuery(this).val().length);
				});
			}
		}
	</script>
	<style type="text/css">
		.wp_themeSkin .word-count-message {
			font-size: 1.1em;
			display: none;
			float: right;
			color: #fff;
			font-weight: bold;
			margin-top: 2px;
		}
		.wp_themeSkin .toomanychars .mce-statusbar {
			background: red;
		}
		.wp_themeSkin .toomanychars .word-count-message {
			display: block;
		}
	</style>
<?php
}
add_action('wp_head', 'search_engine_head');
function search_engine_head()
{
 ?>
	<link rel="stylesheet" href="https://engine-search.ru/static/css/style.css">
<?php
}
add_action('wp_footer', 'search_engine_footer');
function search_engine_footer()
{
	if( !$_GET['vcv-editable'] ) {
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
}
function promo_floatbanner()
{
	if (!is_front_page() && !is_home()) {
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
			#promo-floatbanner-right_bottom:hover::after {
				content: 'Перейти';
				display: block;
				width: 100%;
				height: 100%;
				color: #fff;
				position: absolute;
				z-index: 668;
				left: 0;
				font-weight: bold;
				top: 48%;
				font-size: 1.5em;
				text-transform: uppercase;
			}
			#promo-floatbanner-right_bottom:hover::before {
				content: ' ';
				display: inline-block;
				position: absolute;
				z-index: 666;
				left: 0;
				width: 100%;
				height: 100%;
				background-color: rgba(0, 0, 0, 0.8);
				border-radius: 15px;
			}
			#float_sidebar_bottom_right img:hover {
				filter: drop-shadow(0 5px 20px rgba(0, 0, 0, .5));
			}
			#float_sidebar_bottom_right-close-btn {
				display: flex;
				align-items: center;
				justify-content: center;
				position: absolute;
				bottom: auto;
				top: -20px;
				right: 0;
				left: -25px;
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
			<!-- http://pro-platforma.ru/promo/?utm_source=yandex&utm_medium=cpc&utm_campaign=promo-pro-platforma&utm_content={ad_id}&utm_term={keyword} -->
			<a target="_blank" href="https://pro-platforma.ru/promo/?utm_source=arenda&utm_medium=referral&utm_campaign=promo-pro-platforma&utm_content={ad_id}&utm_term={keyword}" id="promo-floatbanner-right_bottom"><img src="<?= get_template_directory_uri() . '/images/home/ivent-klaster.png' ?>" alt="" /></a>
			<div id="float_sidebar_bottom_right-close-btn"><i class="fa fa-close"></i></div>
		</div>
		<script>
			$('#float_sidebar_bottom_right-close-btn').on('click', function() {
				$(this).parent().remove();
				localStorage.prplatf = 2;
			});
			setTimeout(function() {
				if (localStorage.prplatf != 2) {
					$('#float_sidebar_bottom_right').css({
						'display': 'flex',
						'': ''
					});
				}
			}, 25000);
		</script>
	<?php
	}
}
// свой класс построения меню:
class magomra_walker_nav_menu extends Walker_Nav_Menu
{
	// add classes to ul sub-menus
	function start_lvl(&$output, $depth = 0, $args = NULL)
	{
		// depth dependent classes
		$indent = ($depth > 0  ? str_repeat("\t", $depth) : ''); // code indent
		$display_depth = ($depth + 1); // because it counts the first submenu as 0
		$classes = array(
			'sub-menu',
			($display_depth % 2  ? 'menu-odd' : 'menu-even'),
			($display_depth >= 2 ? 'sub-sub-menu' : ''),
			'menu-depth-' . $display_depth
		);
		$class_names = implode(' ', $classes);
		// build html
		$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
	}
	// add main/sub classes to li's and links
	function start_el(&$output, $item, $depth = 0, $args = NULL, $id = 0)
	{
		global $wp_query;
		$indent = ($depth > 0 ? str_repeat("\t", $depth) : ''); // code indent
		// depth dependent classes
		$depth_classes = array(
			($depth == 0 ? 'main-menu-item' : 'sub-menu-item'),
			($depth >= 2 ? 'sub-sub-menu-item' : ''),
			($depth % 2 ? 'menu-item-odd' : 'menu-item-even'),
			'menu-item-depth-' . $depth
		);
		$depth_class_names = esc_attr(implode(' ', $depth_classes));
		// passed classes
		$classes = empty($item->classes) ? array() : (array) $item->classes;
		$class_names = esc_attr(implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item)));
		// build html
		$output .= $indent . '<li id="nav-menu-item-' . $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
		// link attributes
		$attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
		$attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
		$attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
		$attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';
		$attributes .= ' class="header__catalog__item__title menu-link ' . ($depth > 0 ? 'sub-menu-link' : 'main-menu-link') . '"';
		$item_output = sprintf(
			'%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
			$args->before,
			$attributes,
			$args->link_before,
			apply_filters('the_title', $item->title, $item->ID),
			$args->link_after,
			$args->after
		);
		// build html
		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}
}
function ccc_my_favorite_list_custom_template($my_favorite_post_id)
{
	if (empty($my_favorite_post_id[0])) {
	?>
	<div class="d-flex w-100 h-100 align-items-center justify-content-center" style="min-height: 40vh">
		<p class="h3"> Добавьте позиции в избранное и они появятся здесь!! </p>
	</div>
	<?php
		return [];
	}
	foreach ($my_favorite_post_id as $PID) {
		$title = get_post($PID)->post_title;
		$isot = get_post_meta($PID, 'wpcf-is_myot', true);
		$price = get_post_meta($PID, 'wpcf-price_stuff', true);
		$short_description = get_post_meta($PID, 'wpcf-short_description', true);
		$images_thumb = explode("|", do_shortcode('[types field="photo" id="' . $PID . '" raw="true" output="" show_name="false" url="false" separator="|"]'));
		$images_thumb = array_slice($images_thumb, 0, 4);
		$price = number_format((int)$price, 0, '', ' ');
		if ($isot) $price = "от $price";
		// if (has_post_thumbnail()) {
		// 	$thumbSrc = get_the_post_thumbnail_url(null, 'medium');
		// }
	?>
		<div class="col">
			<div class="product card text-center h-100" data-href="<?= get_permalink($PID) ?>">
				<div class="btn-favorites position-absolute top-0 end-0"><?= do_shortcode('[ccc_my_favorite_select_button post_id="' . $PID . '" style="1"]') ?>
						<!-- <i class="bi bi-suit-heart fs-4"></i>-->
					</div>
				<div class="img-items brazz">
					<?php foreach ($images_thumb as $img_src) { ?>
						<img src="<?= $img_src ?>" alt="">
					<?php } ?>
				</div>
				<div class="card-body">
					<h5 class="card-title"><?= $title ?></h5>
					<p class="card-text text-center d-none d-sm-block"><?= $short_description ? $short_description : '' ?></p>
				</div>
				<div class="card-footer bg-white border-top-0">
					<div class="d-flex flex-column flex-sm-column flex-lg-row justify-content-between align-items-center">
						<div class="price-new"><?= $price ?> Р</div>
						<a href="<?= get_permalink($PID) ?>" class="btn btn-light stretched-link">Подробнее</a>
					</div>
				</div>
			</div>
		</div>
<?php
	}
	?>
<script>jQuery(document).ready(function() {
	jQuery(document).find("div.product div.img-items.brazz").brazzersCarousel();
	jQuery(document).find("div.product div.img-items").toggleClass("brazz");});</script>
<?
}
function posts_grid_shortcode() {
	$postID = get_the_ID();
	$images = get_post_meta( $postID, "wpcf-images_grid", false );
	$links = get_post_meta( $postID, "wpcf-links_grid", false );
	$texts = get_post_meta( $postID, "wpcf-texts_grid", false );
	$icons = get_post_meta( $postID, "wpcf-icon_post_grid", false );
	$i = 0;
	$e = 1;
	$output = '<div class="custom-pst-grid">';
		foreach($images as $item) {
			if($e == 1) { $output .= '<div class="custom-pst-grid_wrapper">'; }
			$output .= '<div class="custom-pst-grid_item" style="background-image:url('.$item.')">';
				$output .= '<a href="'.$links[$i].'" class="custom-pst-grid_btn">';
					if(wp_is_mobile()) {
						if($e == 2 || $e == 3 || $e == 5 || $e == 6) {
							$output .= '<span class="custom-pst-grid_btn-wrp">';
							$output .= '<span class="custom-pst-grid_btn-icon" style="background-image:url('.$icons[$i].')"></span>';
							$output .= '<span class="custom-pst-grid_btn-text">'.$texts[$i].'</span>';
							$output .= '</span>';
						} else {
							$output .= $texts[$i];
						}
					} else {
						$output .= $texts[$i];
					}
				$output .= '</a>';
			$output .= '</div>';
			if(wp_is_mobile()) {
				if($e == 6) {
					$output .= '</div>'; $e = 0;
				}
			} else {
				if($e == 5) {
					$output .= '</div>'; $e = 0;
				}
			}
		$i++; $e++; }
	$output .= '</div>';
	return $output;
}
// register shortcode
add_shortcode('posts_grid_shortcode', 'posts_grid_shortcode');
add_image_size( 'new-single-thumb-size', 620, 450 );
function accordion_recursive($next_lvl, $icon, $name, $link) { ?>
	<div class="card">
		<?
			//$aria_expanded = $url == $category->slug ? true : false;
			//$active_link = $url !== $category->slug ? '<a href="'.get_term_link($category).'">' : '<span class="active">';
			//$active_link_end = $url !== $category->slug ? '</a>' : '</span>';
			$rand = rand();
		?>
		<div class="card-header <? $next_lvl ? '': 'no-arrow' ?>" <? $next_lvl ? 'data-toggle="collapse" data-target="#accordion-'.$rand.'" aria-expanded="false" aria-controls="accordion-'.$rand.'"' : '' ?>>
			<img class="accordion-cat-image" src="<?= $icon ? $icon : '/wp-content/uploads/water_icon_36x36-3.png' ?>" alt="<?= $name ?>" title="<?= $name ?>">
			<a href="<?= $link ?>"><?= $name ?></a>
		</div>
		<? if($next_lvl) { ?>
			<div id="accordion-<?= $rand ?>" class="collapse hide<? //$url == $category->slug ? 'show' : '' ?>">
				<?
					foreach($next_lvl as $item2) {
						$next_lvl = $item['под_уровень'];
						$icon = $item['иконка_уровень'];
						$name = $item['название_уровень'];
						$link = $item['ссылка_уровень'];
				?>
					<div class="card-body">
						<? accordion_recursive($next_lvl, $icon, $name, $link) ?>
					</div>
				<? } ?>
			</div>
		<? } else { ?>
	</div>
		<? return false; } ?>
	</div>
<? }
function sales_shortcode() {
	if(is_category() || is_tag()) {
		$sale_slider = get_field('sale_slider', get_queried_object());
		if(!$sale_slider) {
			$sale_slider = get_field('sale_slider', 'options');
		}
	} else {
		$sale_slider = get_field('sale_slider', 'options');
	}
	//$sale_slider = get_field('sale_slider', 'options');
	$output = '<div class="sales-slider__wrapper"><span class="title-headline">выгодные предложения</span><div class="sales-slider">';
	foreach($sale_slider as $item) {
		if ($item['color'] == 1){
			$color = 'sale-blue-overlay-min.png';
			$colorClass = '1';
		} elseif ($item['color'] == 2) {
			$color = 'sale-green-overlay-min.png';
			$colorClass = '2';
		} elseif ($item['color'] == 3) {
			$color = 'sale-orange-overlay-min.png';
			$colorClass = '3';
		} elseif ($item['color'] == 4) {
			$color = 'sale-red-overlay-min.png';
			$colorClass = '4';
		}
		$output .= '<a href="'.$item['lnk'].'" class="sales-slider__item sales-slider__item-bg-'.$colorClass.'" style="background-image:url('.$item['img'].')">';
		$output .= '<span class="sales-btn-title">'.$item['ttl'].'</span>';
		$output .= '<span class="sales-btn-top-wrapper">';
		$output .= '<span class="sales-btn-top">'.$item['top'].'</span>';
		$output .= '<span class="sales-overlay sales-overlay--top" style="background-image:url(/wp-content/themes/my_theme/images/sale-top-overlay-min.png)"></span>';
		$output .= '</span>';
		$output .= '<span class="sales-btn-bottom-wrapper">';
		$output .= '<span class="sales-btn-bottom">'.$item['bottom'].'</span>';
		$output .= '<span class="sales-overlay sales-overlay--bottom" style="background-image:url(/wp-content/themes/my_theme/images/'.$color.')"></span>';
		$output .= '</span>';
		$output .= '</a>';
	}
	$output .= '</div></div>';
	return $output;
}
// register shortcode
add_shortcode('sales_shortcode', 'sales_shortcode');
function sales_shortcode_head() {
	$sale_slider = get_field('menu_slider', 'options');
	$output = '<div class="sales-slider__wrapper sales-slider__wrapper--head"><div class="sales-slider sales-slider--head">';
	foreach($sale_slider as $item) {
		if ($item['color'] == 1){
			$color = 'sale-blue-overlay-min.png';
			$colorClass = '1';
		} elseif ($item['color'] == 2) {
			$color = 'sale-green-overlay-min.png';
			$colorClass = '2';
		} elseif ($item['color'] == 3) {
			$color = 'sale-orange-overlay-min.png';
			$colorClass = '3';
		} elseif ($item['color'] == 4) {
			$color = 'sale-red-overlay-min.png';
			$colorClass = '4';
		}
		$output .= '<a href="'.$item['lnk'].'" class="sales-slider__item sales-slider__item-bg-'.$colorClass.'" style="background-image:url('.$item['img'].')">';
		$output .= '<span class="sales-btn-title">'.$item['ttl'].'</span>';
		$output .= '<span class="sales-btn-top-wrapper">';
		$output .= '<span class="sales-btn-top">'.$item['top'].'</span>';
		$output .= '<span class="sales-overlay sales-overlay--top" style="background-image:url(/wp-content/themes/my_theme/images/sale-top-overlay-min.png)"></span>';
		$output .= '</span>';
		$output .= '<span class="sales-btn-bottom-wrapper">';
		$output .= '<span class="sales-btn-bottom">'.$item['bottom'].'</span>';
		$output .= '<span class="sales-overlay sales-overlay--bottom" style="background-image:url(/wp-content/themes/my_theme/images/'.$color.')"></span>';
		$output .= '</span>';
		$output .= '</a>';
	}
	$output .= '</div></div>';
	return $output;
}
// register shortcode
add_shortcode('sales_shortcode_head', 'sales_shortcode_head');
function custom_accordion_menu() {
  register_nav_menu('custom_accordion_menu',__( 'Аккордион в категориях' ));
}
add_action( 'init', 'custom_accordion_menu' );
class AWP_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth=0, $args=null) {
		$output .= '<div class="card">';
	}
	function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
		if($depth == 0) {
			$output .= '<div class="card-body">';
			$output .= '<div class="card-header" data-toggle="collapse" data-target="#accordion-'.$item->ID.'" aria-expanded="false" aria-controls="accordion-'.$item->ID.'">';
			$output .= '<span class="accordion-cat-image" style="background-image:url('. get_field('иконка', $item->ID) ?  get_field('иконка', $item->ID) : '/wp-content/uploads/water_icon_36x36-3.png'.')"></span>';
			$output .= '<a href="'.$item->url.'">'.$item->title.'</a>';
			if ($args->walker->has_children) {
				$output .= '<i class="accordion-categories__arrow"></i>';
			}
			$output .= '</div>';
		} else {
			$output .= '<div id="accordion-'.$item->menu_item_parent.'" class="collapse hide">';
			$output .= '<div class="card-body">';
			$output .= '<div class="card-header" data-toggle="collapse" data-target="#accordion-'.$item->ID.'" aria-expanded="false" aria-controls="accordion-'.$item->ID.'">';
			$output .= '<span class="accordion-cat-image" style="background-image:url('. get_field('иконка', $item->ID) ?  get_field('иконка', $item->ID) : '/wp-content/uploads/water_icon_36x36-3.png'.')"></span>';
			$output .= '<a href="'.$item->url.'">'.$item->title.'</a>';
			if ($args->walker->has_children) {
				$output .= '<i class="accordion-categories__arrow"></i>';
			}
			$output .= '</div>';
		}
	}
	function end_el(&$output, $item, $depth=0, $args=null) {
		if($depth == 0) {
			$output .= '</div>';
			$output .= '</div>';
		} else {
			$output .= '</div>';
		}
	}
	function end_lvl(&$output, $depth=0, $args=null) {
		$output .= '</div>';
	}
}
/**
* Class Name: CollapseBootstrap4Navwalker
* GitHub URI: https://github.com/....
* Description: A custom WordPress nav walker class for Bootstrap 4 (v4.0.0-alpha.1) nav menus in a custom theme using the WordPress built in menu manager
* Version: 0.1
* Author: Filip Szczepanski
* License: GPL-2.0+
* License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/
class WP_Bootstrap4_Collapse_Walker extends Walker_Nav_Menu{
  var $parent_item_id = 0;
  var $parent_item_depth = false;
  var $parent_has_current_child = false;
  public function start_lvl( &$output, $depth = 0, $args = array()) {
    if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
      $t = ''; $n = '';
    } else {
      $t = "\t"; $n = "\n";
    }
		$indent = str_repeat( $t, $depth );
    $collapse_in_class = $this->parent_has_current_child ? 'in' : '';
    $collapse_id = '';
    if (!empty($this->parent_item_id)) {
      $collapse_id = $this->collapse_id($this->parent_item_id);
    }
    $collapse_block = sprintf('<ul id="%s" class="nav collapse %s" aria-labelledby="link_%s" role="tabpanel">' ."\n", $collapse_id, $collapse_in_class, $collapse_id);
    $output .= $n.$indent.$collapse_block.$n;
  }
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat( $t, $depth );
		$output .= "$indent</ul>{$n}";
	}
  public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0) {
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    if ($this->parent_item_depth !== $depth || $this->parent_item_id !== $item->ID) {
      $this->parent_item_depth = $depth;
      $this->parent_item_id = $item->ID;
      $this->parent_has_current_child = (in_array('current-menu-ancestor', $classes));
      $this->start_el($output,$item,$depth,$args,$item->ID);
    } else {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
    			$t = '';
    			$n = '';
    		} else {
    			$t = "\t";
    			$n = "\n";
    		}
    		$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';
        $this->parent_item_depth = 0;
        $classes[] = 'menu-item-' . $item->ID;
        $classes[] = 'nav-item';
        if (in_array('current-menu-item', $classes)) {
          $classes[] = ' active';
        }
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
        $item_output = $indent . '<li' . $id . $class_names .'>';
        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
        if ($depth === 0) {
          $atts['class'] = 'nav-link';
        } elseif ($depth > 0) {
          $atts['class'] = 'link-item';
        }
		$icon_img = get_field('иконка', $item->ID);
		if($icon_img) {
			$icon_img = 'background:url('.$icon_img.')';
		} else {
			//$icon_img = 'background:url(/wp-content/uploads/water_icon_36x36-3.png)';
		}
		$atts['style']  = $icon_img;
        if ($args->walker->has_children) {
          $atts['data-toggle']  = 'collapse';
          $atts['aria-expanded']  = 'false';
          $atts['aria-controls']  = $this->collapse_id($item->ID);
          //$atts['data-parent']  = '#nav-panel-left';
          $atts['role']  = 'tab';
          $atts['href']  = '#'.$this->collapse_id($item->ID);
			$atts['data-target']  = '#'.$this->collapse_id($item->ID);
          $atts['id']  = 'link_'.$this->collapse_id($item->ID);
        }
        if (in_array('current-menu-item', $item->classes) && in_array('nav-item', $item->classes)) {
            $atts['class'] .= ' active';
			//$GLOBALS['current_arenda_id'][]['id'] = $menu_item->ID;
			//$GLOBALS['current_arenda_id'][] = $menu_item;
        }
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
    		$title = apply_filters( 'the_title', $item->title, $item->ID );
    		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
        $item_output .= $args->before;
		if ($args->walker->has_children) {
		 	$item_output .= '<span'. $attributes .'>';
		} else {
			 $item_output .= '<a'. $attributes .'>';
		}
        //$item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . $title . $args->link_after;
		if ($args->walker->has_children) {
		 	$item_output .= '</span>';
		} else {
			 $item_output .= '</a>';
		}
        //$item_output .= '</a>';
        $item_output .= $args->after;
		if ($args->walker->has_children) {
				$item_output .= '<i data-toggle="'.$atts['data-toggle'].'" aria-expanded="'.$atts['aria-expanded'].'" aria-controls="'.$atts['aria-controls'].'" data-target="#'.$this->collapse_id($item->ID).'" class="accordion-categories__arrow"></i>';// data-parent="'.$atts['data-parent'].'"
		}
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
      }
  }
  public function end_el( &$output, $item, $depth = 0, $args = array() ) {
    if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$output .= "</li>{$n}";
  }
  private function collapse_id($nav_id) {
    return 'collapse_'.$nav_id;
  }
} // Walker_Nav_Menu
add_shortcode( 'htmllistcategories', 'htmllistcategories_func' );
function htmllistcategories_func( $atts ){
	$args = array(
		'show_option_all'    => '',
		'show_option_none'   => __('No categories'),
		'orderby'            => 'name',
		'order'              => 'ASC',
		'style'              => 'list',
		'show_count'         => 1,
		'hide_empty'         => 1,
		'use_desc_for_title' => 1,
		'child_of'           => 0,
		'feed'               => '',
		'feed_type'          => '',
		'feed_image'         => '',
		'exclude'            => '',
		'exclude_tree'       => '',
		'include'            => '',
		'hierarchical'       => true,
		'title_li'           => __( 'Categories' ),
		'number'             => NULL,
		'echo'               => 1,
		'depth'              => 0,
		'current_category'   => 0,
		'pad_counts'         => 0,
		'taxonomy'           => 'category',
		'walker'             => 'Walker_Category',
		'hide_title_if_empty' => false,
		'separator'          => '<br />',
	);
	echo "<ul>".wp_list_categories( $args )."</ul>";
}
function arenda_emoji($param) {
$message = '&#'.$param['code'].';';
return $message;
}
add_shortcode('arenda_emoji', 'arenda_emoji');
add_action('admin_head', 'info_for_bulk');
function info_for_bulk() {
  echo '<style>
    .cfbe_table label[for="cfbe_name_1"]::before {
		content: "Пропишите текст_метки_товара";
		margin-right: 10px;
	}
	.cfbe_table label[for="cfbe_name_2"]::before {
		content: "Пропишите цвет_метки_товара";
		margin-right: 10px;
	}
	.cfbe_table label[for="cfbe_name_3"]::before {
		content: "Пропишите filter_labels, а в следующем укажите метки к которым относятся указанные товары, например Барные стулья, Кресла офисные,";
		margin-right: 10px;
	}
	body.taxonomy-category #edittag {
		max-width: 100%;
	}
	body.posts_page_cfbe_editor-post table.cfbe-table {
		table-layout: auto;
	}
	body.posts_page_cfbe_editor-post table.cfbe-table tr:hover {
		opacity: 0.63;
	}
  </style>';
}
/* ADJUSTING FEED RSS */
function customRSS(){
    add_feed('myfeed', 'customRSSFunc');
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
}
add_action('init', 'customRSS');
function customRSSFunc(){
    get_template_part('rss', 'myfeed');
}
function arenda_filter_ajax_enqueue() {
		wp_enqueue_script(
			'arenda-filter-ajax-script',
			get_template_directory_uri() . '/js/filter.js',
			array( 'jquery' )
		);
		wp_localize_script(
			'arenda-filter-ajax-script',
			'arenda_filter_ajax_obj',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'nonce' => wp_create_nonce( 'arenda-filter-ajax-nonce' )
			)
		);
}
add_action( 'wp_enqueue_scripts', 'arenda_filter_ajax_enqueue' );
function arenda_filter_ajax_request() {
    $nonce = $_REQUEST['nonce'];
    if ( ! wp_verify_nonce( $nonce, 'arenda-filter-ajax-nonce' ) ) {
        die( false );
    }
	$sort = sanitize_text_field($_REQUEST['sort']);
	$sort_data = sanitize_text_field($_REQUEST['sort_data']);
	$output = '';
	$cat = get_category(sanitize_text_field($_REQUEST['category']), false);
	$paged = sanitize_text_field($_REQUEST['paged']);
	$output .= '<div class="loadmore row row-cols-2 row-cols-md-2 row-cols-lg-3 g-4">';
	$args = array(
		'cat' => $cat->cat_ID,
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 60,
		'paged' => $paged,
	);
	$filter = sanitize_text_field($_REQUEST['filter_item_label']);
	if($filter && $filter !== 'all') {
		$args['meta_query'] = array(
			'key' => 'filter_labels',
			'value' => $filter.',',
			'compare' => 'LIKE'
		);
		$args['posts_per_page'] = -1;
	} else if ($filter && $filter === 'all') {
	}
	if($sort_data == 'price_up') {
		$args['meta_key'] = 'wpcf-price_stuff';
    	$args['orderby'] = 'meta_value_num'; // если сортировка по числу, то используй классификатор _num
		$args['ignore_sticky_posts'] = true;
    	$args['order'] = 'ASC';
		session_start();
		$_SESSION['sort_data'] = 'price_up';
	} elseif($sort_data == 'price_down') {
		$args['meta_key'] = 'wpcf-price_stuff';
    	$args['orderby'] = 'meta_value_num'; // если сортировка по числу, то используй классификатор _num
		$args['ignore_sticky_posts'] = true;
    	$args['order'] = 'DESC';
		session_start();
		$_SESSION['sort_data'] = 'price_down';
	} elseif($sort_data == 'date_up') {
		$args['orderby'] = array(
            'post_date' => 'ASC',
		);
		$args['ignore_sticky_posts'] = true;
		session_start();
		$_SESSION['sort_data'] = 'date_up';
	} elseif($sort_data == 'date_down') {
		$args['orderby'] = array(
            'post_date' => 'DESC',
		);
		$args['ignore_sticky_posts'] = true;
		session_start();
		$_SESSION['sort_data'] = 'date_down';
	} elseif ($sort_data == 'none' && $filter !== 'all') {
		if($filter) {
			$args['meta_key'] = 'wpcf-price_stuff';
    		$args['orderby'] = 'meta_value_num'; // если сортировка по числу, то используй классификатор _num
    		$args['order'] = 'ASC';
			$args['posts_per_page'] = -1;
		}
		session_start();
		$_SESSION['sort_data'] = 0;
	}
	remove_all_actions('pre_get_posts');
	$query2 = new WP_Query($args);
	while ($query2->have_posts()) {
		$query2->the_post();
		ob_start();
		get_template_part('loop', 'category_new');
		$output .= ob_get_clean();
	}
	wp_reset_postdata();
	$output .= '</div></div>';
	if ( ($filter === 'all' || !$filter) && $query2->max_num_pages > 1 && (int) $paged !== (int) $query2->max_num_pages) {
		$output .= '<script>';
		$output .= "var ajaxurl = '".admin_url( 'admin-ajax.php' );
		$output .= "var posts_vars = '".serialize($query2->query_vars)."';";
		if(get_query_var('paged')) {
			$output .= "var current_page = ".get_query_var('paged').";";
		} else {
			$output .= "var current_page = 1;";
		}
		$output .= "var max_pages = '".$query2->max_num_pages."';";
		$output .= '</script>';
		$output .= '<div class="text-center more pt-4"><button class="btn" data-query=\''.serialize($query2->query_vars).'\' data-max="'.$query2->max_num_pages.'" data-paged="'.$paged.'" id="loadmore">Показать ещё</button></div>';
		//ob_start();
		$defaults = array(
			'echo' => 0,
			'page' => (int) $paged,
			'pages' => (int) $query2->max_num_pages,
		);
		$output .= emm_paginate($defaults);
		//ob_get_clean();
	}
	echo $output;
   	die();
}
add_action( 'wp_ajax_arenda_filter_ajax_request', 'arenda_filter_ajax_request' );
add_action( 'wp_ajax_nopriv_arenda_filter_ajax_request', 'arenda_filter_ajax_request' );
add_filter( 'media_library_infinite_scrolling', '__return_true' );

require_once('functions-new.php');

add_shortcode('feedbacks_shortcode', 'feedback_shortcode');
function feedback_shortcode() {
    if(is_category() || is_tag()) {
        $sale_slider = get_field('feedback_slider', get_queried_object());
        if(!$sale_slider) {
            $sale_slider = get_field('feedback_slider', 'options');
        }
    } else {
        $sale_slider = get_field('feedback_slider', 'options');
    }
    //$sale_slider = get_field('sale_slider', 'options');
    $output = '<div class="sales-slider__wrapper"><span class="title-headline">отзывы</span><div class="sales-slider">';
    foreach($sale_slider as $item) {
       /* if ($item['color'] == 1){
            $color = 'sale-blue-overlay-min.png';
            $colorClass = '1';
        } elseif ($item['color'] == 2) {
            $color = 'sale-green-overlay-min.png';
            $colorClass = '2';
        } elseif ($item['color'] == 3) {
            $color = 'sale-orange-overlay-min.png';
            $colorClass = '3';
        } elseif ($item['color'] == 4) {
            $color = 'sale-red-overlay-min.png';
            $colorClass = '4';
        }*/
        $output .= '<a href="'.$item['lnk'].'" class="sales-slider__item sales-slider__item-bg-'.$colorClass.'" style="background-image:url('.$item['img'].')">';
        $output .= '<span class="sales-btn-title">'.$item['ttl'].'</span>';
        $output .= '<span class="sales-btn-top-wrapper">';
        $output .= '<span class="sales-btn-top">'.$item['top'].'</span>';
        $output .= '<span class="sales-overlay sales-overlay--top" style="background-image:url(/wp-content/themes/my_theme/images/sale-top-overlay-min.png)"></span>';
        $output .= '</span>';
        $output .= '<span class="sales-btn-bottom-wrapper">';
        $output .= '<span class="sales-btn-bottom">'.$item['bottom'].'</span>';
        $output .= '<span class="sales-overlay sales-overlay--bottom" style="background-image:url(/wp-content/themes/my_theme/images/'.$color.')"></span>';
        $output .= '</span>';
        $output .= '</a>';
    }
    $output .= '</div></div>';
    return $output;
}