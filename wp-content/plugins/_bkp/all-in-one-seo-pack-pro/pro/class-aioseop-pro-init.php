<?php
/**
 * AIOSEOP Pro Initializer
 *
 * Used to initialize Pro.
 *
 * @see aioseop_init_class() File loaded in from `all_in_one_seo_pack.php`.
 *
 * @package all-in-one-seo-pack
 * @since ?
 * @since 3.4.0 Changed filename.
 */

/**
 * Class All_in_One_SEO_Pack_Pro_Init
 *
 * @since ?
 * @since 3.4.0 Renamed class name.
 */
class All_in_One_SEO_Pack_Pro_Init {

	/**
	 * @since 3.4.2
	 */
	public static function init() {
		self::require_files();

		// Load extended sitemap class for Pro.
		add_filter( 'aioseop_class_sitemap', array( 'All_in_One_SEO_Pack_Pro_Init', 'load_pro_sitemap_class' ) );
	}

	/**
	 * Loads all files in the Pro directory.
	 *
	 * @since ?
	 * @since 3.4.0 Changed to static method.
	 */
	private static function require_files() {
		require_once( AIOSEOP_PLUGIN_DIR . 'pro/functions_general.php' );
		require_once( AIOSEOP_PLUGIN_DIR . 'pro/functions_class.php' );
		require_once( AIOSEOP_PLUGIN_DIR . 'pro/aioseop_pro_updates_class.php' );
		require_once( AIOSEOP_PLUGIN_DIR . 'pro/class-translations_check.php' );
		require_once( AIOSEOP_PLUGIN_DIR . 'pro/admin/aioseop-helper-filters.php' );
		require_once( AIOSEOP_PLUGIN_DIR . 'pro/aioseop_taxonomy_functions.php' );
		require_once( AIOSEOP_PLUGIN_DIR . 'pro/class-aioseop-pro-sitemap.php' );
		require_once( AIOSEOP_PLUGIN_DIR . 'pro/inc/schema/schema-builder-ext.php' );

		new AIOSEOP_Schema_Builder_Ext();
	}

	/**
	 * Loads all classes that extend functionality in the free plugin.
	 *
	 * @since 3.4.2
	 */
	public static function load_pro_sitemap_class( $class_name ) {
		return 'All_in_One_SEO_Pack_Sitemap_Pro';
	}
}

All_in_One_SEO_Pack_Pro_Init::init();
