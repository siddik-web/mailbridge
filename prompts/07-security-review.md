# 07 — Independent Security Review

Act as a read-only security auditor. Inspect the current diff and relevant implementation for authorization, CSRF assumptions, SSRF/DNS rebinding, TLS verification, credential encryption/key management, secret leakage, CSV abuse, SQL safety, XSS, resource exhaustion, job races, retry/idempotency, and source mailbox integrity. Do not make edits. Return findings ranked by severity with file/line evidence, impact, reproduction guidance, and remediation. Clearly distinguish verified vulnerabilities from questions requiring runtime testing.
