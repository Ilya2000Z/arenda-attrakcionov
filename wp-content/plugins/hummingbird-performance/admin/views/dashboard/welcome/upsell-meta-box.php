<?php
/**
 * Upsell Hummingbird meta box for Free users.
 *
 * @since 2.0.1
 * @package Hummingbird
 */

use Hummingbird\Core\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<p>
	<?php esc_html_e( 'Get our full WordPress performance optimization suite with Hummingbird Pro and additional benefits of WPMU DEV membership.', 'wphb' ); ?>
</p>

<ol class="sui-upsell-list">
	<li><span class="sui-icon-check sui-md" aria-hidden="true"></span> <?php esc_html_e( 'Enhanced file minification with CDN', 'wphb' ); ?></li>
	<li><span class="sui-icon-check sui-md" aria-hidden="true"></span> <?php esc_html_e( 'Delay JavaScript Execution', 'wphb' ); ?></li>
	<li><span class="sui-icon-check sui-md" aria-hidden="true"></span> <?php esc_html_e( 'Prioritize critical CSS for more page speed ', 'wphb' ); ?><span class="sui-tag sui-tag-blue sui-tag-sm" style="margin-left: 10px;"><?php esc_html_e( 'Coming Soon', 'wphb' ); ?></span></li>
	<li><span class="sui-icon-check sui-md" aria-hidden="true"></span> <?php esc_html_e( 'Instant site health alerts and notifications', 'wphb' ); ?></li>
	<li><span class="sui-icon-check sui-md" aria-hidden="true"></span> <?php esc_html_e( 'White label automated reporting', 'wphb' ); ?></li>
	<li><span class="sui-icon-check sui-md" aria-hidden="true"></span> <?php esc_html_e( 'Smush Pro for the best image optimization', 'wphb' ); ?></li>
	<li><span class="sui-icon-check sui-md" aria-hidden="true"></span> <?php esc_html_e( 'Premium WordPress plugins', 'wphb' ); ?></li>
	<li><span class="sui-icon-check sui-md" aria-hidden="true"></span> <?php esc_html_e( 'Manage unlimited WordPress sites', 'wphb' ); ?></li>
	<li><span class="sui-icon-check sui-md" aria-hidden="true"></span> <?php esc_html_e( '24/7 live WordPress support', 'wphb' ); ?></li>
	<li><span class="sui-icon-check sui-md" aria-hidden="true"></span> <?php esc_html_e( 'The WPMU DEV Guarantee', 'wphb' ); ?></li>
</ol>

<br>

<a href="<?php echo esc_url( Utils::get_link( 'plugin', 'hummingbird_dashboard_upsellwidget_button' ) ); ?>" class="sui-button sui-button-purple" target="_blank">
	<?php esc_html_e( 'UNLOCK NOW WITH PRO', 'wphb' ); ?>
</a>
