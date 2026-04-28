<?php

echo "ERROR: " . esc($type ?? 'Error') . "\n";
echo "Message: " . esc($message ?? 'An error occurred') . "\n";

if (isset($file) && isset($line)) {
    echo "Location: " . esc($file) . " at line " . esc((string)$line) . "\n";
}

if (isset($trace) && !empty($trace)) {
    echo "\nStack Trace:\n";
    foreach ($trace as $index => $item) {
        echo "  #" . esc((string)$index) . " " . esc($item ?? '') . "\n";
    }
}
