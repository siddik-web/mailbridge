<?php
/**
 * Plugin identity constants.
 *
 * Phase 0 only: no hooks, no side effects. Bootstrap wiring arrives in Phase 1.
 *
 * @package MailBridge\Migrator
 */

declare(strict_types=1);

namespace MailBridge\Migrator;

/**
 * Static plugin identity. Kept free of WordPress calls so it is unit-testable.
 */
final class Plugin {

	public const SLUG        = 'mailbridge-migrator';
	public const TEXT_DOMAIN = 'mailbridge-migrator';
	public const MIN_PHP     = '8.1';
	public const MIN_WP      = '6.4';

	/**
	 * Whether a PHP version string satisfies the minimum supported version.
	 *
	 * @param string $php_version Version string, e.g. PHP_VERSION.
	 */
	public static function php_version_supported( string $php_version ): bool {
		return version_compare( $php_version, self::MIN_PHP, '>=' );
	}
}
