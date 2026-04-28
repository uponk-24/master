<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; background: #f5f5f5; color: #333; padding: 20px; }
        .error-container { max-width: 900px; margin: 0 auto; background: #fff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); overflow: hidden; }
        .error-header { background: #dc3545; color: #fff; padding: 20px; }
        .error-header h1 { font-size: 22px; margin-bottom: 5px; }
        .error-header p { font-size: 14px; opacity: 0.9; word-break: break-word; }
        .error-body { padding: 20px; }
        .error-body h2 { font-size: 16px; margin-bottom: 10px; color: #dc3545; }
        .error-body p { margin-bottom: 10px; line-height: 1.6; word-break: break-word; }
        .trace { background: #f8f9fa; border: 1px solid #e9ecef; border-radius: 4px; padding: 15px; overflow-x: auto; }
        .trace p { font-family: 'Courier New', monospace; font-size: 13px; margin-bottom: 5px; word-break: break-all; }
        .file-info { color: #6c757d; font-size: 12px; word-break: break-all; }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-header">
            <h1><?php echo is_string($type ?? null) ? htmlspecialchars($type) : 'Error'; ?></h1>
            <p><?php echo is_string($message ?? null) ? htmlspecialchars($message) : 'An error occurred'; ?></p>
        </div>
        <div class="error-body">
            <?php if (isset($file) && is_string($file) && isset($line)): ?>
                <h2>Location</h2>
                <p class="file-info"><?php echo htmlspecialchars($file); ?> at line <?php echo htmlspecialchars((string)$line); ?></p>
            <?php endif; ?>

            <?php if (isset($trace) && is_array($trace) && !empty($trace)): ?>
                <h2 style="margin-top: 20px;">Stack Trace</h2>
                <div class="trace">
                    <?php foreach ($trace as $index => $item): ?>
                        <p>#<?php echo (int)$index; ?> <?php echo is_array($item) ? htmlspecialchars(print_r($item, true)) : htmlspecialchars((string)$item); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
