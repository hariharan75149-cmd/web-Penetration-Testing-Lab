# DVWA Web Application Penetration Test Report

**Prepared by:** Harisharan  
**Report version:** 1.0 (editable template)  
**Assessment date:** [Enter date]  
**Target:** DVWA on Metasploitable 2  
**Assessor workstation:** Kali Linux

## 1. Executive summary

A controlled security assessment is being performed against a deliberately vulnerable DVWA instance hosted in an isolated virtual lab. The assessment focuses on service discovery and three common web-application risk areas: SQL Injection, Reflected Cross-Site Scripting, and insecure file upload.

This report must be finalized using only results personally reproduced in the lab. At the time this template was created, no new scan output or screenshots had been independently reviewed. Therefore, the findings below are test records to complete, not verified claims.

## 2. Scope

**In scope:** The self-owned DVWA instance and its host within the isolated lab network.

**Out of scope:** Public websites, third-party infrastructure, denial-of-service testing, and systems without explicit authorization.

**Target IP:** [Verify and enter actual address]  
**DVWA security level:** [Enter actual setting]  
**Assessment window:** [Enter date/time]

## 3. Methodology

1. Confirm authorization and lab isolation.
2. Identify the target IP and check connectivity.
3. Discover relevant ports and service versions.
4. Inspect application requests and responses.
5. Validate selected DVWA modules using controlled test inputs.
6. Assess demonstrated impact and assign evidence-based severity.
7. Recommend and review mitigations.
8. Sanitize evidence and finalize the report.

## 4. Environment and tools

- Kali Linux
- Metasploitable 2
- Damn Vulnerable Web Application (DVWA)
- Nmap
- Burp Suite Community Edition
- SQLmap
- Netcat

## 5. Findings

### WEB-01: SQL Injection

**Status:** [Not tested / Observed / Confirmed / Not reproducible]  
**Severity:** [Assign after impact assessment]  
**Affected endpoint/parameter:** [Record exact path and parameter]

**Description:** SQL Injection may occur when application input is incorporated into SQL statements without safe parameterization.

**Evidence:** [Add sanitized request/response and screenshot references]

**Impact:** Depending on query context and database privileges, an attacker may read or modify database information.

**Remediation:** Use parameterized queries, least-privilege database accounts, and safe error handling. See `../Remediation/sql-injection-fix.php`.

### WEB-02: Reflected Cross-Site Scripting

**Status:** [Not tested / Observed / Confirmed / Not reproducible]  
**Severity:** [Assign after impact assessment]  
**Affected endpoint/parameter:** [Record exact path and parameter]

**Description:** Reflected XSS may occur when untrusted input is returned in a page without context-appropriate output encoding.

**Evidence:** [Add sanitized request/response and screenshot references]

**Impact:** Script may execute in a victim's browser in the context of the vulnerable site. A harmless alert is proof of script execution, not proof of cookie theft.

**Remediation:** Use context-aware output encoding and a restrictive Content Security Policy as defense in depth. See `../Remediation/xss-fix.php`.

### WEB-03: Insecure File Upload

**Status:** [Not tested / Observed / Confirmed / Not reproducible]  
**Severity:** [Assign after impact assessment]  
**Affected endpoint:** [Record exact page]

**Description:** Inadequate file-upload controls may allow unexpected content to be stored. Remote code execution requires additional conditions, including server-side execution of the uploaded file.

**Evidence:** [Record accepted file type, storage path, execution behavior, and sanitized screenshot]

**Impact:** Ranges from unsafe content hosting to server compromise, depending on server configuration and demonstrated behavior.

**Remediation:** Apply allowlisted file types, content inspection, size limits, generated filenames, storage outside the web root, and disabled script execution. See `../Remediation/file-upload-fix.php`.

## 6. Separate service observations

If TCP/1524 is found open on Metasploitable 2, record it as a separate host service observation. Do not attribute that service to DVWA's file-upload feature or use it as proof of upload-based RCE.

## 7. Risk assessment

For each confirmed finding, record the rationale and, if used, the CVSS version, vector, and score. Do not infer a Critical rating without evidence of the relevant impact and attack conditions.

## 8. Remediation priority

1. Fix confirmed injection and output-encoding issues.
2. Restrict and safely store uploaded files.
3. Review database and web-server privileges.
4. Retest each issue after applying fixes.
5. Retain sanitized evidence of the retest.

## 9. Conclusion

[Summarize only verified findings, their business impact, limitations, and retest outcome.]

## 10. Appendix: evidence register

| Evidence ID | Filename | What it demonstrates |
|---|---|---|
| E-01 | `01-nmap-services.png` | Actual service scan |
| E-02 | `02-sqli-test.png` | SQLi validation result |
| E-03 | `03-xss-test.png` | XSS validation result |
| E-04 | `04-file-upload-test.png` | Upload validation result |
| E-05 | `05-remediation-retest.png` | Fix/retest result |
