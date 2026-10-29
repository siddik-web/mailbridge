<?php
/**
 * Plugin identity and bootstrap.
 *
 * @package MailBridge\Migrator
 */

declare(strict_types=1);

namespace MailBridge\Migrator;

use MailBridge\Migrator\Admin\SettingsPage;

/**
 * Plugin bootstrap and identity.
 */
final class Plugin {

	public const SLUG        = 'mailbridge-migrator';
	public const TEXT_DOMAIN = 'mailbridge-migrator';
	public const MIN_PHP     = '8.1';
	public const MIN_WP      = '6.4';

	/**
	 * Register WordPress integration points.
	 */
	public static function boot(): void {
		add_action( 'admin_menu', array( SettingsPage::class, 'register' ) );
	}

	/**
	 * Whether a PHP version string satisfies the minimum supported version.
	 *
	 * @param string $php_version Version string, e.g. PHP_VERSION.
	 */
	public static function php_version_supported( string $php_version ): bool {
		return version_compare( $php_version, self::MIN_PHP, '>=' );
	}
}
