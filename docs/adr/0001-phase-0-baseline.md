# ADR 0001: Phase 0 engineering baseline

- Status: accepted (project owner, 2026-10-29)

## Context and constraints
The repository establishes the plugin slug, namespace, PHP/WordPress support matrix, and dependency policy before migration behavior is introduced.

## Decision
- **Slug / text domain:** `mailbridge-migrator`.
- **Namespace:** `MailBridge\\Migrator\\`, PSR-4 from `src/`.
- **Support matrix:** PHP 8.1+ and WordPress 6.4+. CI targets PHP 8.1, 8.2 and 8.3.
- **PHP tooling:** PHPUnit 10.5, PHPStan level 6, PHPCS with WordPress-Extra, WordPress-Docs and PHPCompatibilityWP.
- **Frontend tooling:** `@wordpress/scripts` with strict TypeScript. Source in `assets/src`, build output in `assets/build`.
- **Queue dependency:** undecided. Evaluate Action Scheduler versus WP-Cron in a Phase 4 ADR.
- **Runtime dependencies:** none currently; dev dependencies only.

## Consequences and follow-up
- Generate and commit `composer.lock` from an environment with Packagist access, then use a locked install in CI.
- Decide between PHP's IMAP extension and a userland client in an ADR before implementing the IMAP adapter.
- Add WordPress integration tests before implementing persistent settings or REST endpoints.
- Phase 1 now adds only the plugin bootstrap and a capability-protected admin landing page. No mailbox credentials, network calls, migrations, or persistent settings are implemented.
