# Issue-Driven Development and Coding-Agent Workflow

## Source of truth
GitHub Issues define the work: https://github.com/siddik-web/mailbridge/issues
Work only on one issue per branch and pull request. If a task cannot be completed and verified in one short coding session, stop and split it into smaller issues rather than expanding scope.

## Session size
- Change at most one small subsystem and preferably fewer than 5–8 files.
- Have one observable outcome and explicit acceptance criteria.
- Be independently testable with one focused test command plus relevant quality checks.
- Avoid broad refactors, dependency upgrades, and unrelated cleanup.
- End with changed files, commands run, results, and known gaps.
- If work needs more than roughly 30–60 minutes, requires several independent design decisions, or touches multiple architectural layers, propose a split before coding. This is a guideline, not permission to skip tests.

## Start every task
1. Check `git status`; do not overwrite or discard user changes.
2. Read `CLAUDE.md`, `AGENTS.md`, the issue, and only relevant architecture/security/testing docs.
3. Check issue dependencies and current `main`.
4. State a short plan and list expected files.
5. Create a branch from up-to-date `main`: `issue/<number>-<short-slug>`.
6. Implement only the issue scope and add/update tests and docs as required.

## Pull request rules
- Open a draft PR early if the task is not ready for review.
- PR title should be concise and reference the issue; include `Closes #N` only when the issue is fully completed.
- Include exact commands run and honest pass/fail results.
- Prefer one issue per PR; if two issues are inseparable, explain why.
- Do not merge with failing required checks, unresolved security findings, or unverified behavior.
- Do not claim CI or tests passed based on configuration alone.

## Multiple agents
- Maximum three concurrent agents, including the coordinating agent.
- Give each agent a distinct issue and non-overlapping file ownership.
- One agent owns a file at a time. Do not have parallel agents editing shared manifests, bootstrap, architecture docs, or lockfiles.
- Architect and security reviewer should be read-only unless explicitly assigned an implementation issue.
- Integrate one branch/PR at a time when changes touch shared foundations.
- Require each agent to report changed files, commands/results, assumptions, and unresolved questions.
- The coordinating agent reviews the combined diff and runs the relevant gates; subagent claims are not verification.

## Security and data integrity stop rules
Stop and ask for a design decision if a task would require real mailbox credentials or production mailbox access; disabling TLS verification, weakening coding standards, or bypassing authorization; storing plaintext credentials or returning secrets to the browser; source deletion, destructive synchronization, or unbounded transfer in a web request; a new external dependency without license, maintenance, compatibility, and security review; or guessing at uncertain IMAP APPEND/retry outcomes or UIDVALIDITY semantics.

## Definition of done
- [ ] Acceptance criteria in the issue are met.
- [ ] Tests cover the new behavior and relevant failure cases.
- [ ] Relevant PHPCS/PHPStan/PHPUnit and frontend checks were actually run.
- [ ] Security and source-mail immutability implications were reviewed.
- [ ] Docs are updated where behavior or setup changed.
- [ ] Diff contains no secrets, generated noise, or unrelated refactors.
- [ ] PR describes exact test evidence and known limitations.
- [ ] Issue is closed only after the completed work is merged.

## Recommended execution order
1. Unblock CI and merge the Phase 0 baseline (#3, then #4).
2. Reproducible local commands and module boundaries (#5–#8).
3. Capabilities and safe REST/error conventions (#9–#11).
4. IMAP interface, dependency decision, host policy, TLS, and secrets (#12–#17).
5. Profile validation, persistence, and connection test (#18–#20).
6. Job state/checkpoints, bounded worker, queue, and transfer planning (#21–#28).
7. Controlled IMAP tests and frontend slices (#29–#31).
8. Security evidence/release gate (#32).

Dependencies may change after architecture review; update issue descriptions rather than letting agents guess.