# 04 — Durable Queue and Recovery

Implement a queue adapter and bounded worker processing with job claims, concurrency limits, retry/backoff, timeouts, checkpoints, sanitized audit events, and recovery after interruption. Evaluate Action Scheduler versus WP-Cron/system cron based on existing dependencies and hosting assumptions; record the decision in an ADR. Test worker crashes, duplicate claims, retry exhaustion, race conditions, and ambiguous APPEND outcomes. Never run a full mailbox migration inside one web request.
