<?php
/**
 * Minimal admin landing page for the Phase 1 foundation.
 *
 * @package MailBridge\Migrator
 */

declare(strict_types=1);

namespace MailBridge\Migrator\Admin;

/**
 * Registers and renders the MailBridge admin screen.
 */
final class SettingsPage {

	/**
	 * Register the plugin page in the WordPress admin menu.
	 */
	public static function register(): void {
		add_menu_page(
			__( 'MailBridge', 'mailbridge-migrator' ),
			__( 'MailBridge', 'mailbridge-migrator' ),
			'manage_options',
			'mailbridge-migrator',
			array( self::class, 'render' ),
			'dashicons-migrate',
			80
		);
	}

	/**
	 * Render a safe placeholder until settings and migration workflows are implemented.
	 */
	public static function render(): void {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'You are not allowed to access this page.', 'mailbridge-migrator' ) );
		}
		?>
		<div class="wrap">
			<h1><?php echo esc_html__( 'MailBridge Migrator', 'mailbridge-migrator' ); ?></h1>
			<p><?php echo esc_html__( 'The plugin foundation is installed. Mailbox profiles and migration jobs are not available yet.', 'mailbridge-migrator' ); ?></p>
		</div>
		<?php
	}
}
