# Architecture

## Design principles
- WordPress-native administration and permissions.
- PHP-first domain layer with clear interfaces.
- React + TypeScript admin UI, built with `@wordpress/scripts`.
- Background jobs are bounded, resumable, observable, and safe to retry.
- Keep secrets and message contents out of logs.
- No source deletion in MVP.

## Proposed layers
1. **Plugin bootstrap:** activation, dependency wiring, hooks, schema version.
2. **Admin UI:** React screens for profiles, migration setup, job progress, and reports.
3. **REST controllers:** route registration, permission callbacks, input validation, response shaping.
4. **Application services:** create/test profile, schedule migration, pause/resume/cancel, report generation.
5. **Domain:** migration job state machine, folder mapping, checkpoints, transfer decisions, error taxonomy.
6. **Infrastructure:** IMAP adapter, encrypted secret store, repository implementations, queue adapter, logger.
7. **Persistence:** versioned custom tables for jobs, checkpoints, and audit events where justified.

## Job lifecycle
Suggested states: draft, queued, running, paused, retrying, completed, completed_with_warnings, failed, cancelled. Define valid transitions in one place and test them.

## Queue
Hide scheduling behind a queue interface. Evaluate Action Scheduler as an explicit dependency versus WP-Cron/system cron. Jobs must process bounded batches and yield. Document hosting requirements and recovery behavior.

## IMAP transfer concerns
- Treat UIDVALIDITY changes as checkpoint invalidation requiring reconciliation.
- Do not assume UIDs are stable across servers.
- Do not use Message-ID as a unique key by itself.
- Preserve flags and internal dates only when the target server supports the operation.
- Reconcile ambiguous APPEND outcomes before retrying to reduce duplicates.
- Handle folder hierarchy, special-use folders, server limits, throttling, and partial failures.
- Keep source mailbox untouched.

## Persistence
Use schema versioning and safe upgrades. Choose indexes based on expected job/checkpoint query patterns. Never store secrets or full message bodies in job/audit rows. Keep audit events concise and sanitized.

## REST
Use namespaced routes, strict schemas, capability checks in permission callbacks, prepared persistence access, and sanitized errors. Return job IDs rather than secrets. Do not rely on nonces as authorization.

## Frontend
Accessible forms and status indicators, explicit confirmation before starting a migration, clear validation, safe error messages, and no secret values in browser storage or debug logs.
