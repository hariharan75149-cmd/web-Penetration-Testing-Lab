<?php
/*
 * Illustrative image-upload validation.
 * Configure $uploadDir outside the public web root and ensure the web
 * server cannot execute scripts from that directory.
 */

$uploadDir = '/var/www/private_uploads/';

if (!isset($_FILES['file']) || !is_uploaded_file($_FILES['file']['tmp_name'])) {
    http_response_code(400);
    exit('No valid upload received');
}

$file = $_FILES['file'];

if ($file['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    exit('Upload failed');
}

$maxBytes = 2 * 1024 * 1024; // 2 MB
if ($file['size'] <= 0 || $file['size'] > $maxBytes) {
    http_response_code(400);
    exit('File size is not allowed');
}

$finfo = new finfo(FILEINFO_MIME_TYPE);
$mime = $finfo->file($file['tmp_name']);

$allowed = [
    'image/jpeg' => 'jpg',
    'image/png'  => 'png',
];

if (!isset($allowed[$mime])) {
    http_response_code(415);
    exit('Unsupported file type');
}

if (!is_dir($uploadDir) || !is_writable($uploadDir)) {
    http_response_code(500);
    exit('Upload storage is unavailable');
}

$filename = bin2hex(random_bytes(16)) . '.' . $allowed[$mime];
$destination = rtrim($uploadDir, DIRECTORY_SEPARATOR)
    . DIRECTORY_SEPARATOR . $filename;

if (!move_uploaded_file($file['tmp_name'], $destination)) {
    http_response_code(500);
    exit('Could not store uploaded file');
}

echo 'Upload accepted';
