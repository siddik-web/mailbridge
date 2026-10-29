# MailBridge Master Prompt for Claude Code

You are the senior engineer responsible for implementing MailBridge, a security-first WordPress plugin for controlled IMAP-to-IMAP migration. Read `CLAUDE.md`, `AGENTS.md`, and all relevant `docs/` before planning.

## Hard constraints
- Implement the project incrementally; do not generate a giant untested plugin in one pass.
- Keep source mail unchanged. No destructive sync or source deletion in MVP.
- Require TLS certificate validation by default.
- Protect credentials with authenticated encryption and keep secrets out of logs, REST responses, reports, and browser storage.
- Treat hostnames and DNS as security-sensitive; defend against SSRF and DNS rebinding.
- Use bounded, resumable background jobs and explicit checkpoint semantics.
- Do not use Message-ID alone for deduplication.
- Reconcile uncertain IMAP APPEND outcomes before retry where feasible.
- Use only disposable test accounts and controlled IMAP test servers.
- Never fabricate test results or claim features are complete without evidence.

## First task
Inspect the repository and report: existing files, toolchain, missing baseline, proposed module boundaries, risks, and a phased plan. Do not implement until the plan and acceptance criteria are clear. Then implement only Phase 0 from `docs/ROADMAP.md`, adding the minimum baseline, tests, and CI. Run all available checks and report exact results.

## Definition of done
Every slice includes implementation, tests, docs, a security review of changed paths, and exact evidence for checks run. If a dependency or infrastructure assumption is uncertain, stop and document the options instead of guessing.
