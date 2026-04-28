<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>404 - Halaman Tidak Ditemukan</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; background: #f5f5f5; color: #333; display: flex; align-items: center; justify-content: center; min-height: 100vh; }
        .error-container { text-align: center; padding: 40px; }
        .error-container h1 { font-size: 72px; color: #dc3545; margin-bottom: 10px; }
        .error-container h2 { font-size: 24px; margin-bottom: 15px; }
        .error-container p { font-size: 16px; color: #666; margin-bottom: 20px; }
        .error-container a { color: #007bff; text-decoration: none; font-size: 16px; }
        .error-container a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>404</h1>
        <h2>Halaman Tidak Ditemukan</h2>
        <p>Maaf, halaman yang Anda cari tidak ditemukan.</p>
        <a href="<?= site_url('/') ?>">← Kembali ke Beranda</a>
    </div>
</body>
</html>
