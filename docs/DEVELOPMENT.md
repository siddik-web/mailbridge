# Development Guide

## Before starting
- Confirm the PHP and WordPress version support policy.
- Install supported PHP, Composer, Node.js, npm, and a local WordPress environment.
- Use disposable IMAP test accounts or local controlled IMAP servers only.
- Never copy production mailbox credentials into development.

## Expected checks
Use the commands actually defined in the project manifests; do not assume these scripts exist before checking them. Typical categories include:
- Composer install and PHPUnit
- PHPCS with WordPress Coding Standards
- PHPStan
- npm install, lint, type checking, and frontend tests
- Playwright smoke tests
- Build/package validation

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
