<?php
/**
 * Plugin Name:       MailBridge Migrator
 * Description:       Security-first IMAP-to-IMAP mailbox migration for WordPress.
 * Version:           0.1.0
 * Requires at least: 6.4
 * Requires PHP:      8.1
 * Author:            MailBridge contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       mailbridge-migrator
 *
 * @package MailBridge\Migrator
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'MAILBRIDGE_MIGRATOR_VERSION', '0.1.0' );
define( 'MAILBRIDGE_MIGRATOR_FILE', __FILE__ );

$mailbridge_migrator_autoload = __DIR__ . '/vendor/autoload.php';
if ( is_readable( $mailbridge_migrator_autoload ) ) {
	require_once $mailbridge_migrator_autoload;
}
unset( $mailbridge_migrator_autoload );

if ( class_exists( '\\MailBridge\\Migrator\\Plugin' ) ) {
	\MailBridge\Migrator\Plugin::boot();
}
