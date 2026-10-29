# Claude Code Instructions — MailBridge

## Mission
Build MailBridge, a secure WordPress plugin that migrates email messages between IMAP-compatible servers. Work in small, verifiable vertical slices.

## Mandatory rules
- Read `AGENTS.md` and relevant `docs/` files before implementation.
- Inspect the repository and toolchain before changing files; plan non-trivial changes.
- Implement only the current milestone and keep changes small.
- Never claim tests passed unless actually run; report exact commands and results.
- Never use real mailbox credentials in development or tests.
- Never delete source messages or modify production mailboxes.
- Do not commit secrets, local environment files, logs, or real mailbox exports.
- Do not add telemetry or phone-home behavior.

## Architecture
- Keep domain logic independent of WordPress presentation and REST controllers.
- Use interfaces for IMAP clients, queues, and secret storage where useful.
- Use WordPress APIs for capabilities, REST permissions, escaping, internationalization, and lifecycle.
- Use versioned custom tables for high-volume jobs/checkpoints where appropriate.
- Background work must be bounded, resumable, and safe to retry.
- Do not run a full mailbox transfer inside a single admin or REST request.
- Never expose credentials, tokens, or raw message bodies through REST responses or logs.

## Security
- Enforce server-side capability checks and REST permission callbacks.
- Defend against SSRF and DNS rebinding; define an explicit policy for private/loopback IPs.
- Require encrypted transport and validate TLS certificates by default; never silently downgrade.
- Encrypt stored secrets with authenticated encryption; document key-management limitations.
- Validate CSV size, encoding, headers, rows, and fields. Never log credential rows.
- Use prepared SQL for values and allowlist dynamic identifiers.
- Treat email content as untrusted. Apply timeouts, concurrency limits, and bounded retries.
- MVP must not delete source mail, delete folders, or perform destructive sync.

## Issue-driven development
- Treat GitHub Issues as the source of truth; pick one small issue per coding session and PR.
- Read `docs/AGENT_WORKFLOW.md` before starting a task.
- If the issue is too large for one short session, split it before implementation.
- Use `issue/<number>-<short-slug>` branches from current `main`; do not mix unrelated tasks.
- Maximum three concurrent agents, with distinct issues and non-overlapping file ownership.

## Workflow
1. State objective and acceptance criteria.
2. Inspect related code and relevant docs.
3. Propose a short plan.
4. Implement the smallest useful slice and add tests.
5. Run tests, static analysis, linting, and formatting relevant to the change.
6. Review the diff for security and accidental changes.
7. Report files changed, exact commands/results, limitations, and next step.

## Release gate
Do not call the plugin production-ready until the test matrix in `docs/TESTING.md` and security checklist in `docs/SECURITY.md` have documented evidence.

## Subagents
Use `.claude/agents/` for bounded specialist tasks. Limit concurrency to three. Avoid overlapping file ownership. Security review and QA are release gates. Never assume an agent ran tests unless its report includes exact commands and results.
