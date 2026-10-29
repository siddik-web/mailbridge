# 03 — Single Mailbox Migration

Implement one controlled IMAP-to-IMAP migration vertical slice using the agreed interfaces. Define folder mapping, supported flags/internal dates, checkpoint semantics, bounded batches, and explicit job states. Handle UIDVALIDITY changes safely; never use Message-ID alone for deduplication. Reconcile uncertain APPEND outcomes before retry where feasible. Source messages and folders must remain unchanged. Add controlled IMAP integration tests for success, interruption/resume, partial failures, and data integrity. Report provider-specific limitations.
