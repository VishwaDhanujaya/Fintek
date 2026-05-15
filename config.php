<?php
/**
 * SMTP Configuration for Fintek
 */

// SMTP Server Settings
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'gallagevishwa@gmail.com');
define('SMTP_PASSWORD', 'zrlo furk mkfk sstr');
define('SMTP_ENCRYPTION', 'tls');

// Recipient Settings
define('RECIPIENT_EMAIL', 'fintek@finteksl.com');
define('RECIPIENT_NAME', 'Fintek Inquiries');

// Base URL for Pretty URLs (Dynamic Detection)
$scriptPath = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
$rootPath = ($scriptPath == '/' || $scriptPath == '\\' || $scriptPath == '.') ? '/' : rtrim($scriptPath, '/') . '/';
define('BASE_URL', $rootPath);
?>