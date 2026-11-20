<?php
/*
 * Illustrative PDO prepared-statement example.
 * Assumes $pdo is an existing PDO connection configured with
 * exception mode and native prepared statements where supported.
 */

$id = $_GET['id'] ?? '';

if (!is_string($id) || !ctype_digit($id)) {
    http_response_code(400);
    exit('Invalid user ID');
}

$stmt = $pdo->prepare(
    'SELECT first_name, last_name FROM users WHERE user_id = :id'
);

$stmt->execute(['id' => $id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user === false) {
    http_response_code(404);
    exit('User not found');
}

// Escape values when rendering them into HTML.
echo htmlspecialchars($user['first_name'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
