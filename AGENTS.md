# MailBridge Agent Guide

## Shared rules
- Read `CLAUDE.md` before coding and relevant `docs/` before changing architecture, security, IMAP behavior, or release workflows.
- The project owner is the final decision-maker for scope and release.
- Never invent provider support, compatibility, completed features, or test results.
- Never put credentials in source control, prompts, fixtures, screenshots, or logs.
- Prefer small, testable changes with clear acceptance criteria.

## Specialist roles
- **Architect:** module boundaries, interfaces, schema decisions, migration lifecycle, ADRs.
- **WordPress Engineer:** plugin bootstrap, hooks, REST API, capabilities, i18n, WordPress conventions.
- **IMAP Engineer:** protocol semantics, folder mapping, flags, message transfer, UIDVALIDITY, provider tests.
- **Security Reviewer:** credentials, SSRF, TLS, authorization, uploads, logs, destructive actions; can block release.
- **QA Engineer:** unit/integration/e2e tests, fault injection, fixtures, acceptance evidence.
- **Frontend Engineer:** React/TypeScript admin screens, accessible states, REST client, UI tests.

## Conflict rule
Security and data integrity override convenience or visual polish. Stop and document unresolved trade-offs.

## Subagent orchestration
Dedicated Claude Code subagents should live in `.claude/agents/`. Use bounded tasks with explicit file ownership. Architect and reviewer should usually be read-only. Limit concurrency to three and avoid overlapping edits. Security review and QA are required release gates; require exact command/results evidence before claiming checks passed.
