# MailBridge for WordPress — Project Starter

MailBridge is a planned security-first WordPress plugin for controlled IMAP-to-IMAP mailbox migration.

> **Status:** This branch contains project instructions and an implementation plan, not a finished migration plugin. Do not use it with production mailboxes. Implement features incrementally and require test evidence before release.

## Start with Claude Code
1. Review `CLAUDE.md`, `AGENTS.md`, and `docs/`.
2. Start Claude Code in the repository root.
3. Give it `prompts/00-bootstrap.md` first.
4. Review the plan and diff before proceeding through the numbered prompts.
5. Use only disposable credentials and controlled test mailboxes.

## MVP scope
- IMAP server profiles and connection tests
- Single mailbox migration with bounded, resumable background jobs
- Folder mapping, supported flags, checkpoints, and sanitized reports
- CSV bulk import after validation and explicit confirmation
- React/TypeScript WordPress admin UI
- Encrypted credential storage, TLS validation, SSRF defenses, capability checks

## Explicit non-goals
No SMTP sending, hosted mailbox service, SaaS control plane, source deletion, or destructive two-way synchronization in MVP.

## Architecture and security
See `docs/PRODUCT_SPEC.md`, `docs/ARCHITECTURE.md`, and `docs/SECURITY.md`. Message-ID must not be the only deduplication key. Handle UIDVALIDITY changes and reconcile uncertain IMAP APPEND outcomes before retry where feasible. Source mail must remain unchanged.

## Implementation sequence
See `docs/ROADMAP.md`. Use `MASTER_PROMPT.md` as the overarching instruction and `prompts/` for individual vertical slices. Specialist agent definitions live in `.claude/agents/`.

## Verification
See `docs/TESTING.md` and `docs/RELEASE_CHECKLIST.md`. This repository's CI workflow is a scaffold and skips checks not configured yet; a green workflow alone does not prove the product works or is production-ready.
