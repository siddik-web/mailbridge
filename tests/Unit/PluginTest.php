<?php
/**
 * Unit tests for plugin identity.
 *
 * @package MailBridge\Migrator
 */

declare(strict_types=1);

namespace MailBridge\Migrator\Tests\Unit;

use MailBridge\Migrator\Plugin;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MailBridge\Migrator\Plugin
 */
final class PluginTest extends TestCase {

	public function test_slug_and_text_domain_match(): void {
		$this->assertSame( 'mailbridge-migrator', Plugin::SLUG );
		$this->assertSame( Plugin::SLUG, Plugin::TEXT_DOMAIN );
	}

	/**
	 * @dataProvider php_versions
	 */
	public function test_php_version_supported( string $version, bool $expected ): void {
		$this->assertSame( $expected, Plugin::php_version_supported( $version ) );
	}

	/**
	 * @return array<string, array{string, bool}>
	 */
	public static function php_versions(): array {
		return array(
			'too old 7.4'     => array( '7.4.33', false ),
			'too old 8.0'     => array( '8.0.30', false ),
			'minimum 8.1.0'   => array( '8.1.0', true ),
			'newer 8.3'       => array( '8.3.6', true ),
		);
	}

	public function test_running_php_is_supported(): void {
		$this->assertTrue( Plugin::php_version_supported( PHP_VERSION ) );
	}
}
