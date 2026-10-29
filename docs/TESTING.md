# Testing Strategy

## Required quality gates
- PHPUnit unit tests for domain services and state transitions.
- WordPress integration tests for activation/schema upgrade, capabilities, REST permissions, and persistence.
- PHPCS with WordPress Coding Standards.
- PHPStan at a documented level with baseline reviewed and minimized.
- JavaScript linting, TypeScript checks, and frontend unit tests.
- Playwright smoke tests for admin flows where a runnable test environment exists.
- Controlled IMAP integration tests using disposable test mailboxes and no production credentials.

## Core test scenarios
1. Valid and invalid connection settings; timeout and TLS certificate failure.
2. Unauthorized users cannot read or mutate profiles/jobs.
3. Secret values never appear in API responses, logs, reports, or exceptions.
4. CSV malformed headers, invalid encoding, oversized files, excessive rows, and missing values.
5. Folder hierarchy mapping, flags, internal dates, large messages, and unsupported attributes.
6. UIDVALIDITY change and stale checkpoint handling.
7. Worker interruption, resume, bounded retries, and concurrent worker claims.
8. Ambiguous APPEND result is reconciled before retry where feasible.
9. Duplicate detection does not rely on Message-ID alone.
10. Source mailbox messages and folders remain unchanged.
11. Partial failures are reported without marking the entire job falsely successful.
12. Deactivation/reactivation and schema upgrades preserve job integrity.

## Evidence policy
Record exact commands, tool versions, test counts, and failures. Do not mark a test as passed if it was not run. Document external services or IMAP server capabilities required for tests. Keep test credentials disposable and outside version control.
