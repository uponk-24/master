<?php

// platform_check.php - minimal version check
$issues = array();
if (PHP_VERSION_ID < 80100) {
    $issues[] = 'Your PHP version ' . PHP_VERSION . ' is too old. PHP 8.1+ is required.';
}
if ($issues) {
    echo implode("\n", $issues);
    exit(1);
}
