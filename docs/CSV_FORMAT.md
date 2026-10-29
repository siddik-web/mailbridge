# CSV Bulk Import Format

CSV import creates migration job requests; it must not begin migration until the user reviews validation results and explicitly confirms.

## Rules
- UTF-8 input, optional UTF-8 BOM.
- Require an exact documented header row; reject unknown or duplicate headers unless the parser deliberately supports them.
- Bound file bytes, row count, column count, and individual field length.
- Reject malformed rows and report row numbers without echoing passwords or full credential values.
- Do not log raw CSV lines or persist the original upload longer than necessary.
- Treat CSV cells as untrusted data. Reports exported for spreadsheets must neutralize formula-leading cells.
- Never include secrets in preview responses; mask them or indicate only that a value was supplied.
- Never commit real mailbox CSVs or credentials to source control.

## Suggested initial columns
`source_host,source_port,source_encryption,source_username,source_password,destination_host,destination_port,destination_encryption,destination_username,destination_password,source_mailbox,destination_mailbox`

This is a proposal, not a final API contract. Before implementation, review whether server profiles should be referenced by profile ID rather than repeating credentials in every row. Prefer profile IDs to reduce secret duplication.

## Validation flow
1. Validate upload size and encoding.
2. Parse header and verify the schema.
3. Validate every row and field using allowlists and length limits.
4. Return a preview with row numbers and sanitized errors.
5. Require explicit confirmation before creating jobs.
6. Delete temporary upload data as soon as practical.
