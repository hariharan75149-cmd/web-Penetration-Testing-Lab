# Lab command notes

Run these only against your own isolated lab target.

## Identify Kali network configuration

```bash
ip addr
```

## Check target reachability

Replace the example address with the verified target IP:

```bash
ping -c 4 10.0.2.16
```

A failed ping is not conclusive; ICMP may be blocked.

## Discover selected services

```bash
nmap -sV -p 80,1524 10.0.2.16
```

Save output:

```bash
nmap -sV -p 80,1524 10.0.2.16 -oN nmap-scan.txt
```

## Evidence hygiene

- Save command output and screenshots from your own lab.
- Redact cookies, session IDs, passwords, tokens, and personal data.
- Do not commit database dumps or credentials.
- Record the date, target IP, and DVWA security level for reproducibility.

## Important interpretation notes

- TCP/1524 on Metasploitable 2 is a separate service; it does not prove DVWA upload RCE.
- A successful upload is not proof of server-side code execution.
- A JavaScript alert demonstrates script execution, not session theft.
- A Boolean SQLi test is not automatically a UNION-based SQLi test.
