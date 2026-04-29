<!-- Hero Section -->
<section id="beranda" class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <?php $heroImage = !empty($village['hero_image']) ? image_url($village['hero_image']) : ''; ?>

    <?php if ($heroImage): ?>
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="<?= esc($heroImage) ?>" alt="<?= esc($village['name'] ?? 'Desa') ?>" class="w-full h-full object-cover">
    </div>
    <!-- Dark overlay agar teks terbaca -->
    <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/50 to-black/70"></div>
    <?php else: ?>
    <!-- Fallback gradient jika belum ada gambar -->
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-teal-900 to-emerald-900"></div>
    <div class="absolute inset-0 animate-gradient bg-gradient-to-br from-slate-900/50 via-teal-800/30 to-emerald-900/50"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=60 height=60 viewBox=%270 0 60 60%27 xmlns=%27http://www.w3.org/2000/svg%27%3E%3Cg fill=%27none%27 fill-rule=%27evenodd%27%3E%3Cg fill=%27%23ffffff%27 fill-opacity=%270.4%27%3E%3Cpath d=%27M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%27/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')"></div>
    <?php endif; ?>

    <!-- Decorative blurs -->
    <div class="absolute top-20 left-10 w-64 h-64 bg-emerald-400/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-amber-400/10 rounded-full blur-3xl"></div>

    <!-- Floating decorative shapes -->
    <div class="absolute top-1/4 left-[10%] w-4 h-4 bg-teal-400/20 rounded-full animate-float"></div>
    <div class="absolute top-1/3 right-[15%] w-6 h-6 bg-cyan-400/15 rounded-full animate-float" style="animation-delay: 2s;"></div>
    <div class="absolute bottom-1/3 left-[20%] w-3 h-3 bg-emerald-400/20 rounded-full animate-float" style="animation-delay: 4s;"></div>
    <div class="absolute bottom-1/4 right-[25%] w-5 h-5 bg-amber-400/15 rounded-full animate-float" style="animation-delay: 1s;"></div>
    <div class="absolute top-[60%] left-[40%] w-2 h-2 bg-teal-300/20 rounded-full animate-float" style="animation-delay: 3s;"></div>

    <div class="relative z-10 text-center px-4 sm:px-6 max-w-4xl mx-auto">
        <span class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-white/15 backdrop-blur-sm text-white/90 text-sm font-medium mb-6 border border-white/20">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            <?= esc($village['district'] ?? '') ?>, <?= esc(str_replace('Kabupaten ', '', $village['regency'] ?? '')) ?>
        </span>

        <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-white mb-4 leading-tight" id="hero-title">
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-300 via-emerald-300 to-cyan-300"><?= esc($village['name'] ?? 'Desa') ?></span>
        </h1>

        <p class="text-lg sm:text-xl text-white/80 mb-2"><?= esc($village['motto'] ?? '') ?></p>
        <p class="text-base text-white/50 mb-8">Desa yang Asri, Masyarakat yang Mandiri</p>

        <!-- Stats -->
        <div class="flex flex-wrap justify-center gap-4 sm:gap-6 mb-10">
            <div class="flex items-center gap-2 px-5 py-3 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20">
                <svg class="w-5 h-5 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                <div class="text-left">
                    <p class="text-xl font-bold text-white counter" data-target="<?= $village['population'] ?? 0 ?>"><?= number_format($village['population'] ?? 0, 0, ',', '.') ?></p>
                    <p class="text-xs text-white/60">Penduduk</p>
                </div>
            </div>
            <div class="flex items-center gap-2 px-5 py-3 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20">
                <svg class="w-5 h-5 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/></svg>
                <div class="text-left">
                    <p class="text-xl font-bold text-white"><?= esc($village['area_size'] ?? '0') ?></p>
                    <p class="text-xs text-white/60">Luas Wilayah</p>
                </div>
            </div>
            <div class="flex items-center gap-2 px-5 py-3 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20">
                <svg class="w-5 h-5 text-sky-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                <div class="text-left">
                    <p class="text-xl font-bold text-white">4</p>
                    <p class="text-xs text-white/60">Dusun</p>
                </div>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="#profil" class="bg-gradient-to-r from-teal-600 to-emerald-600 hover:from-teal-500 hover:to-emerald-500 text-white px-8 py-3 rounded-full shadow-lg shadow-teal-600/25 font-medium transition-all duration-300">Jelajahi Desa</a>
            <a href="#layanan" class="bg-white/10 backdrop-blur-md border border-white/30 text-white hover:bg-white/20 px-8 py-3 rounded-full font-medium transition-colors">Layanan Desa</a>
        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
    </div>
</section>
