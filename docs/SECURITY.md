# Security Requirements and Threat Model

## Assets
Mailbox credentials, mailbox contents, server profile data, migration reports, WordPress admin access, and job/checkpoint integrity.

## Threats
Unauthorized migration initiation; credential disclosure; SSRF to internal services; DNS rebinding; TLS interception; CSV formula or parser abuse; log leakage; forged REST requests; malicious email content; duplicate or lost messages after retries; resource exhaustion.

## Required controls
- Capability checks and REST permission callbacks for every privileged route.
- Nonces for browser request protection where applicable; never as a substitute for authorization.
- TLS certificate and hostname verification enabled by default.
- No silent fallback to plaintext authentication or transport.
- SSRF policy covering loopback, link-local, private, IPv4-mapped IPv6, redirects (avoid them), and DNS changes between validation and connect.
- Authenticated encryption for stored secrets; document key storage and rotation limits.
- Never return secrets from REST endpoints, and never log passwords, auth exchanges, raw CSV rows, or message bodies.
- Validate and bound CSV uploads by file size, encoding, row count, header names, and field lengths.
- Prepared SQL statements for values; allowlist any dynamic table/column identifiers.
- Request and socket timeouts, worker limits, per-job batch limits, bounded retry/backoff.
- Safe escaping and output encoding; treat all email content as untrusted.
- No telemetry, remote code execution, arbitrary URL fetching, or source deletion.
- Clear, sanitized error reporting and minimal audit data.

## Credential handling
Prefer authenticated encryption with key material outside the database. If WordPress salts are used as key material, document that salt changes can affect decryptability and that database plus configuration compromise defeats protection. Never pretend encryption provides protection if the key is stored alongside ciphertext without independent protection.

## Release security gate
Test unauthorized access, CSRF assumptions, SSRF/private IP behavior, TLS failures, secret redaction, CSV limits, SQL injection boundaries, job race conditions, and interrupted transfer recovery. A reviewer must document unresolved risks and mitigations before release.
