<!-- Navbar -->
<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-transparent">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-18">
            <!-- Logo -->
            <a href="<?= site_url('/') ?>" class="flex items-center gap-2.5 group">
                <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-teal-600 to-emerald-600 flex items-center justify-center shadow-md group-hover:shadow-lg transition-shadow">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v18l7-3 7 3V3H5z"/></svg>
                </div>
                <div>
                    <span id="nav-title" class="font-bold text-sm leading-tight text-white transition-colors"><?= esc($village['name'] ?? 'Desa') ?></span>
                    <span id="nav-subtitle" class="block text-[10px] leading-tight text-white/70 transition-colors"><?= esc(str_replace(['Kabupaten ','Kecamatan '], '', $village['regency'] ?? '')) ?></span>
                </div>
            </a>

            <!-- Desktop Nav -->
            <div class="hidden lg:flex items-center gap-1">
                <?php $navItems = [
                    ['label'=>'Beranda','href'=>'#beranda'], ['label'=>'Profil','href'=>'#profil'],
                    ['label'=>'Perangkat','href'=>'#perangkat'], ['label'=>'Anggaran','href'=>'#anggaran'],
                    ['label'=>'Layanan','href'=>'#layanan'], ['label'=>'Wisata','href'=>'#wisata'],
                    ['label'=>'Berita','href'=>'#berita'], ['label'=>'Kontak','href'=>'#kontak']
                ]; ?>
                <?php foreach ($navItems as $item): ?>
                <a href="<?= $item['href'] ?>" class="nav-link px-3 py-1.5 rounded-full text-sm font-medium text-white/80 hover:text-white hover:bg-white/10 transition-all"><?= $item['label'] ?></a>
                <?php endforeach; ?>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="lg:hidden p-2 text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden lg:hidden bg-white/95 backdrop-blur-xl shadow-lg border-t">
        <div class="px-4 py-3 space-y-1">
            <?php foreach ($navItems ?? [] as $item): ?>
            <a href="<?= $item['href'] ?>" class="block px-4 py-2.5 rounded-lg text-sm font-medium text-gray-600 hover:text-primary hover:bg-teal-50 transition-colors" onclick="closeMobileMenu()"><?= $item['label'] ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</nav>
