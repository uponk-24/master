<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($village['name'] ?? 'Website Desa') ?> - Website Resmi</title>
    <meta name="description" content="<?= esc($village['description'] ?? 'Website resmi desa') ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#059669',
                        'primary-dark': '#047857',
                        'primary-light': '#d1fae5',
                        accent: '#f59e0b',
                        'accent-light': '#fef3c7',
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="<?= base_url('css/custom.css') ?>">
    <link rel="icon" href="<?= base_url('img/logo.svg') ?>" type="image/svg+xml">
</head>
<body class="bg-white text-gray-900 font-sans antialiased scroll-smooth">

<?= $this->include('components/navbar') ?>

<main>
    <?= $this->include('components/hero') ?>
    <?= $this->include('components/profil') ?>
    <?= $this->include('components/statistik') ?>
    <?= $this->include('components/perangkat') ?>
    <?= $this->include('components/anggaran') ?>
    <?= $this->include('components/layanan') ?>
    <?= $this->include('components/wisata') ?>
    <?= $this->include('components/berita') ?>
    <?= $this->include('components/galeri') ?>
    <?= $this->include('components/kontak') ?>
</main>

<?= $this->include('components/footer') ?>

<script src="<?= base_url('js/app.js') ?>"></script>
</body>
</html>
