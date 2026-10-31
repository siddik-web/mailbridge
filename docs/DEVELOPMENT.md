# Development Guide

## Before starting
- Confirm the PHP and WordPress version support policy.
- Install supported PHP, Composer, Node.js, npm, and a local WordPress environment.
- Use disposable IMAP test accounts or local controlled IMAP servers only.
- Never copy production mailbox credentials into development.

## Versions and services
- PHP 8.1+ (CI runs 8.1, 8.2, 8.3); Composer 2. CI uses the default `setup-php` extension set.
- Node.js 22 (CI) with npm; `package.json` allows Node >=20.
- WordPress 6.4+ is the support floor, but no check below needs a running WordPress or database yet.
- No IMAP server or other service is needed by any current check.

## Fresh-checkout setup
```
composer install
npm ci
```
`composer.lock` is not committed yet (see ADR 0001), so `composer install` resolves the latest allowed versions. `npm ci` uses the committed `package-lock.json`.

## Commands
Every command below is defined in `composer.json` or `package.json`. Run them from the repository root.

| Purpose | Command | Notes |
|---|---|---|
| PHP coding standards | `composer run phpcs` | WordPress-Extra, WordPress-Docs, PHPCompatibilityWP |
| Auto-fix standards | `composer run phpcbf` | Review the diff afterwards |
| PHP static analysis | `composer run phpstan` | Level 6 with WordPress stubs |
| PHP unit tests | `composer run test` | PHPUnit, `tests/Unit` only |
| JS lint | `npm run lint` | `wp-scripts lint-js assets/src` |
| TypeScript check | `npm run typecheck` | `tsc --noEmit` |
| Frontend build | `npm run build` | Output in `assets/build` (git-ignored) |
| Frontend watch | `npm start` | Development only |

## Not available yet
Do not run or cite these as passing; they do not exist:
- Frontend unit tests (no `npm test` script).
- WordPress integration tests, Playwright smoke tests, and IMAP integration tests.
- Package/ZIP validation.

## Verification status
Last verified for commit `ceb89c3` (PR #2): the GitHub Actions run https://github.com/siddik-web/mailbridge/actions/runs/40850180458 passed `composer validate --strict`, `composer run phpcs`, `composer run phpstan` and `composer run test` on PHP 8.1, 8.2 and 8.3, plus `npm ci`, `npm run lint`, `npm run typecheck` and `npm run build`. Update this line when the commands change; a stale line is worse than none.

## Workflow
1. Create a focused branch for one vertical slice.
2. Read `CLAUDE.md`, `AGENTS.md`, and relevant architecture/security docs.
3. Define acceptance criteria and test cases before implementation.
4. Implement with tests and documentation.
5. Run the checks available in the repository.
6. Review the complete diff, particularly secret handling, REST authorization, SQL, and IMAP retry behavior.
7. Report exact commands and results. Clearly mark checks not run.

## Local configuration
Keep local environment settings and secrets out of Git. Provide a safe example configuration containing placeholders only. Do not expose secrets in screenshots, issue reports, or debug logs.
