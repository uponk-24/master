<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - <?= $title ?? 'Dashboard' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config = { theme: { extend: { colors: { primary: '#059669', 'primary-dark': '#047857' } } } }</script>
    <link rel="stylesheet" href="/css/custom.css">
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Top Bar -->
    <header class="bg-white shadow-sm border-b sticky top-0 z-30">
        <div class="flex items-center justify-between px-4 sm:px-6 h-16">
            <div class="flex items-center gap-3">
                <button id="sidebar-toggle" class="lg:hidden p-2 rounded-lg hover:bg-gray-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-primary flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v18l7-3 7 3V3H5z"/></svg>
                    </div>
                    <span class="font-bold text-sm hidden sm:block">Admin Desa</span>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <a href="/" target="_blank" class="text-sm text-gray-500 hover:text-primary transition-colors">Lihat Website &rarr;</a>
                <a href="/admin/logout" class="text-sm text-red-500 hover:text-red-700 font-medium">Logout</a>
            </div>
        </div>
    </header>

    <div class="flex">
        <!-- Sidebar -->
        <aside id="sidebar" class="fixed lg:sticky top-16 left-0 z-20 h-[calc(100vh-4rem)] w-64 bg-gradient-to-b from-slate-800 to-slate-900 shadow-lg transform -translate-x-full lg:translate-x-0 transition-transform duration-200 overflow-y-auto">
            <nav class="p-4 space-y-1">
                <?php $currentUri = service('request')->getUri()->getPath(); ?>
                <?php $menuItems = [
                    ['icon'=>'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0a1 1 0 01-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 01-1 1','label'=>'Dashboard','url'=>'/admin/dashboard'],
                    ['icon'=>'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4','label'=>'Profil Desa','url'=>'/admin/profil'],
                    ['icon'=>'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z','label'=>'Perangkat Desa','url'=>'/admin/perangkat'],
                    ['icon'=>'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z','label'=>'Kependudukan','url'=>'/admin/kependudukan'],
                    ['icon'=>'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4','label'=>'Infrastruktur','url'=>'/admin/infrastruktur'],
                    ['icon'=>'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z','label'=>'Anggaran','url'=>'/admin/anggaran'],
                    ['icon'=>'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01','label'=>'Layanan','url'=>'/admin/layanan'],
                    ['icon'=>'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064','label'=>'Wisata','url'=>'/admin/wisata'],
                    ['icon'=>'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z','label'=>'Berita','url'=>'/admin/berita'],
                    ['icon'=>'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z','label'=>'Galeri','url'=>'/admin/galeri'],
                    ['icon'=>'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z','label'=>'Pesan ('.($unreadMessages ?? 0).')','url'=>'/admin/pesan'],
                    ['separator' => true],
                    ['icon'=>'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z','label'=>'Pengaturan','url'=>'/admin/pengaturan'],
                ]; ?>
                <?php foreach ($menuItems as $item): ?>
                    <?php if (isset($item['separator'])): ?>
                        <div class="border-t border-white/10 my-3"></div>
                    <?php else: ?>
                    <a href="<?= $item['url'] ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-colors <?= str_starts_with($currentUri, parse_url($item['url'], PHP_URL_PATH)) && $item['url'] !== '/admin/dashboard' ? 'bg-white/10 text-white border-l-3 border-primary' : 'text-white/70 hover:bg-white/10 hover:text-white' ?>">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= $item['icon'] ?>"/></svg>
                        <?= $item['label'] ?>
                    </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </nav>
            <!-- User section at bottom -->
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-white/10">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-primary/20 flex items-center justify-center">
                        <span class="text-primary text-sm font-bold"><?= strtoupper(substr(session()->get('admin_name'), 0, 1)) ?></span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-white truncate"><?= esc(session()->get('admin_name')) ?></p>
                        <p class="text-xs text-white/50">Administrator</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Overlay for mobile sidebar -->
        <div id="sidebar-overlay" class="fixed inset-0 bg-black/30 z-10 hidden lg:hidden" onclick="closeSidebar()"></div>

        <!-- Content -->
        <main class="flex-1 p-4 sm:p-6 lg:p-8 min-h-[calc(100vh-4rem)]">
            <?= $this->renderSection('content') ?>
        </main>
    </div>

    <script>
    function closeSidebar() {
        document.getElementById('sidebar').classList.add('-translate-x-full');
        document.getElementById('sidebar-overlay').classList.add('hidden');
    }
    document.getElementById('sidebar-toggle')?.addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('-translate-x-full');
        document.getElementById('sidebar-overlay').classList.toggle('hidden');
    });
    </script>
</body>
</html>
