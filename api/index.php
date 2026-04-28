<?php
// Vercel Serverless PHP entry point
// This routes all requests through CodeIgniter 4

// Set paths for Vercel environment
$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['SCRIPT_FILENAME'] = __DIR__ . '/../public/index.php';

// Change to public directory for asset resolution
chdir(__DIR__ . '/../public');

// Load the CI4 entry point
require __DIR__ . '/../public/index.php';
