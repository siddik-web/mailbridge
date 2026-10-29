# 00b — Specialist Subagent Workflow

Use specialist agents only for bounded, non-overlapping tasks. Read each agent definition first. Keep concurrency to three maximum. The architect should review plans/ADRs before major changes; implementation agents must own distinct file sets. The security auditor and code reviewer should normally be read-only. QA independently designs tests and reports exact commands/results.

Before delegating, provide objective, acceptance criteria, relevant files, allowed files to edit, and expected evidence. After delegation, inspect every diff yourself, reconcile conflicts, run the relevant tests, and do not accept unsupported claims. Stop if a security or data-integrity decision is unresolved.
