# Product Specification

## Problem
Mailbox migration between IMAP providers is often manual, fragile, and hard to resume after interruption. MailBridge aims to provide a WordPress-admin workflow for controlled, auditable IMAP-to-IMAP migration.

## MVP users
WordPress administrators or trusted operators who are authorized to configure source and destination mailboxes.

## MVP scope
- Manage named source/destination IMAP server profiles.
- Test connectivity and authentication without exposing secrets.
- Migrate one mailbox with explicit source and destination settings.
- Queue work and resume interrupted migrations.
- Map folders and transfer messages while preserving supported flags and timestamps where possible.
- Import multiple mailbox jobs from a validated CSV.
- Show job state, counts, warnings, failures, and exportable reports.
- Keep source mail unchanged.
- Encrypt stored credentials and restrict access by WordPress capabilities.

## Explicit non-goals
- Hosting mailboxes, SMTP sending, marketing campaigns, or mail delivery.
- Cloud SaaS control plane or mandatory external account.
- Deleting source messages, folders, or mailboxes.
- Destructive two-way synchronization.
- Guaranteeing preservation of every provider-specific attribute.

## Functional requirements
1. Server profiles support hostname, port, encryption mode, username, and secret.
2. Connection tests use timeouts, certificate validation, and safe error messages.
3. Migration jobs have stable IDs, status, progress, retry controls, and audit events.
4. Work is chunked and resumable; long transfers never run in a single web request.
5. Folder and message mapping is explicit and deterministic.
6. Duplicate prevention must not rely on Message-ID alone.
7. Interrupted/uncertain APPEND operations must be reconciled before retry where feasible.
8. Reports omit credentials and message bodies.
9. CSV uploads are bounded, validated, and processed without logging sensitive rows.
10. Every privileged REST route checks capabilities and validates inputs.

## Acceptance criteria
- Unit tests cover domain decisions and failure paths.
- Integration tests run against controlled IMAP servers and prove source messages remain unchanged.
- Restarting a worker does not silently restart completed work or duplicate messages.
- Invalid TLS, invalid credentials, malformed CSV, unauthorized REST calls, and timeout cases fail safely.
- Security checklist and test evidence are documented before release.
