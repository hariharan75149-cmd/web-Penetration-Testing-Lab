🛡️ Web Application Penetration Testing Lab (DVWA)

Project: Web Application Penetration Testing
Prepared by: Hariharan
Target: Damn Vulnerable Web Application (DVWA)
Environment: Kali Linux + Metasploitable 2
Category: Ethical Hacking / Web Application Security

📌 1. Project Overview

This project demonstrates practical web application penetration testing using DVWA in an isolated virtual lab environment.

The objective was to identify security vulnerabilities, understand their impact, perform controlled exploitation, and recommend appropriate security fixes.

🖥️ 2. Lab Architecture

- Attacker Machine: Kali Linux
- Target Machine: Metasploitable 2
- Vulnerable Application: DVWA
- Virtualization: Oracle VirtualBox
- Target IP: 10.0.2.16 (private lab IP)

🛠️ 3. Tools Used

- Nmap – Network scanning and service discovery
- Burp Suite – HTTP request interception and analysis
- SQLmap – SQL injection testing
- Netcat – Network connection testing

🔍 4. Vulnerabilities Tested

1. SQL Injection (SQLi)

- Tested the vulnerable "id" parameter.
- Used a controlled SQL injection payload.
- Observed multiple database records being returned.
- Recommended prepared statements and input validation.

2. Reflected Cross-Site Scripting (XSS)

- Tested unsanitized user input.
- Demonstrated JavaScript execution through a browser alert.
- Recommended context-aware output encoding.

3. File Upload Vulnerability

- Tested insecure PHP file upload handling.
- Demonstrated server-side command execution.
- Observed "www-data" as the execution account.
- Recommended secure file validation and restricted upload permissions.

📸 5. Project Evidence

Screenshots of the penetration testing activities are available in the Evidence folder.

"View Project Evidence" (./Evidence/)

📄 6. Detailed Project Report

"Download / View DVWA Penetration Testing Report" (./DVWA_Penetration_Test_Report_Hariharan-1.pdf)

🔐 7. Security Remediation

Vulnerability| Recommended Fix
SQL Injection| Prepared Statements
Reflected XSS| Output Encoding
Unsafe File Upload| File Validation and Execution Restrictions
Exposed Services| Firewall and Service Hardening

🎯 8. Learning Outcomes

- Understanding web application security fundamentals.
- Practical experience with Nmap and Burp Suite.
- Identifying common web vulnerabilities.
- Understanding exploitation impact.
- Learning secure coding and remediation techniques.
- Preparing vulnerability assessment documentation.

⚠️ Disclaimer

This project was conducted strictly for educational purposes in an isolated, authorized virtual lab environment.

Never perform penetration testing on systems without explicit permission.

---

Author: Hariharan
GitHub: "hariharan75149-cmd" (https://github.com/hariharan75149-cmd)
