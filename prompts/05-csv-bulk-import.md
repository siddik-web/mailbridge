# 05 — CSV Bulk Import

Implement a bounded CSV upload and validation preview using `docs/CSV_FORMAT.md`. Enforce encoding, file/row/field limits, strict headers, safe errors, and private temporary-file handling. Prefer server-profile IDs over repeated credentials where possible. Import must not create/start jobs until explicit confirmation. Never log raw rows or return secrets. Add tests for malformed input, oversized files, missing fields, duplicate headers, unauthorized access, and spreadsheet formula injection in exports.
