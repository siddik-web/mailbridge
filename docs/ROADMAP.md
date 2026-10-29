# Implementation Roadmap

## Phase 0 — Repository and engineering baseline
- Inspect the current repository and agree on the plugin slug, namespace, PHP/WordPress support matrix, and dependency policy.
- Add plugin bootstrap, Composer/npm manifests, coding standards, test configuration, and CI.
- Establish lint, static analysis, unit tests, and a reproducible local environment.
- Exit gate: CI runs on a clean checkout and its actual results are documented.

## Phase 1 — WordPress foundation
- Add activation/deactivation lifecycle and versioned schema migration.
- Add capability model, admin menu, REST namespace, and sanitized error handling.
- Define domain interfaces and dependency wiring.
- Exit gate: activation, permissions, REST authorization, and schema tests pass.

## Phase 2 — Server profiles and secrets
- Add profile CRUD, validation, connection test, TLS verification, and authenticated encryption.
- Define SSRF/private-address policy and protect DNS resolution/connect behavior.
- Exit gate: secret redaction, TLS failure, invalid credentials, and unauthorized access tests pass.

## Phase 3 — Single mailbox vertical slice
- Add migration job state machine, folder discovery, bounded message batches, checkpoints, and progress.
- Preserve source mailbox unchanged. Reconcile uncertain APPEND outcomes before retry where possible.
- Exit gate: controlled IMAP integration tests cover restart/resume, flags, folders, and failure paths.

## Phase 4 — Durable queue and reports
- Add queue adapter, bounded workers, concurrency control, retry/backoff, audit events, and reports.
- Exit gate: worker interruption, duplicate worker claims, partial failure, and sanitized reporting tests pass.

## Phase 5 — CSV bulk import and admin UI
- Add strict CSV parsing and preview/validation before job creation.
- Build accessible React screens for profiles, migration setup, progress, and reports.
- Exit gate: CSV abuse tests, REST contract tests, UI checks, and Playwright smoke tests pass.

## Phase 6 — Security review and release candidate
- Run all quality gates, threat-model review, controlled IMAP test matrix, packaging checks, and documentation review.
- Fix critical/high findings before release; document residual risks.
- Exit gate: release checklist is complete with evidence. Do not claim production readiness without evidence.
