<?php
/*
 * Illustrative HTML-text-context output encoding.
 * Encoding must match the output context (HTML, attribute, JS, URL, CSS).
 */

$name = $_GET['name'] ?? '';

if (!is_string($name)) {
    http_response_code(400);
    exit('Invalid input');
}

echo htmlspecialchars(
    $name,
    ENT_QUOTES | ENT_SUBSTITUTE,
    'UTF-8'
);

/*
 * Do not place untrusted input directly into inline JavaScript,
 * CSS, or raw HTML. Prefer safe DOM APIs and context-specific encoders.
 * A Content Security Policy is useful defense in depth, not a replacement
 * for correct output encoding.
 */
