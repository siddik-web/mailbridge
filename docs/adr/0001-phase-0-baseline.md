# ADR 0001: Phase 0 engineering baseline

- Status: accepted (project owner, 2026-10-29)

## Context and constraints
`docs/ROADMAP.md` Phase 0 requires agreeing on the plugin slug, namespace, PHP/WordPress support matrix and dependency policy before code is added. The repository was docs-only with no manifests, so CI skipped every check.

## Decision
- **Slug / text domain:** `mailbridge-migrator`. Global prefix `mailbridge_migrator_` / `MAILBRIDGE_MIGRATOR_`.
- **Namespace:** `MailBridge\Migrator\`, PSR-4 from `src/`.
- **Support matrix:** PHP 8.1+ and WordPress 6.4+. CI runs PHP 8.1, 8.2 and 8.3.
- **PHP tooling:** PHPUnit 10.5, PHPStan level 6, PHPCS with WordPress-Extra, WordPress-Docs and PHPCompatibilityWP.
- **Frontend tooling:** `@wordpress/scripts` with TypeScript (strict). Source in `assets/src`, build output in `assets/build` (git-ignored).
- **Queue dependency:** undecided. Evaluate Action Scheduler versus WP-Cron in a Phase 4 ADR; Phase 0 adds no queue dependency.
- **Runtime dependencies:** none. Dev dependencies only.

## Alternatives considered
- PHP 7.4+ / WP 6.0+: wider host reach, but forfeits typed properties, enums and readonly, and PHP 7.4 is long past end of life.
- Slug `mailbridge`: shorter, but more likely to clash with existing plugins.

## Security, operations and migration implications
No runtime behavior, secrets, network access or storage are added. The plugin file only defines two constants and loads the Composer autoloader if present.

## Consequences and follow-up
- `composer.lock` is not committed yet because it could not be generated in the authoring environment (Packagist unreachable). Generate and commit it from a normal environment, then switch CI to a locked install.
- The IMAP adapter choice (PHP `imap` extension versus a userland client) needs its own ADR before Phase 2/3.
- WordPress integration tests (Phase 1) need a database service in CI.
