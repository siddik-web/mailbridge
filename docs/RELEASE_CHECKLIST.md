# Release Checklist

## Scope and documentation
- [ ] Product scope and supported versions are documented.
- [ ] Known limitations and provider-specific behavior are documented.
- [ ] Installation, upgrade, backup, and recovery instructions are complete.
- [ ] No claim of production readiness without test evidence.

## Security
- [ ] Capability checks and REST permission callbacks reviewed.
- [ ] TLS certificate and hostname validation verified.
- [ ] SSRF and DNS rebinding protections tested.
- [ ] Stored credentials use authenticated encryption and key limitations are documented.
- [ ] Secrets and message bodies are absent from logs, REST responses, and reports.
- [ ] CSV limits, sanitized errors, and spreadsheet formula injection protections tested.
- [ ] No source deletion or destructive sync exists in MVP.
- [ ] Critical/high security findings are resolved or release is blocked.

## Data integrity
- [ ] Controlled IMAP integration matrix completed.
- [ ] Folder mapping and supported flags tested.
- [ ] UIDVALIDITY changes handled safely.
- [ ] Retry/restart behavior tested, including uncertain APPEND outcomes.
- [ ] Source mailbox remains unchanged.
- [ ] Partial failures and recovery are clearly reported.

## Quality and packaging
- [ ] Unit and WordPress integration tests pass.
- [ ] PHPCS and PHPStan checks pass or documented exceptions are approved.
- [ ] Frontend lint/type/test/build checks pass.
- [ ] Playwright smoke tests pass where supported.
- [ ] Clean install and upgrade tested.
- [ ] Plugin ZIP contains required files and excludes development-only material.
- [ ] Version, changelog, readme, and license are consistent.
- [ ] Final diff and package inspected.
