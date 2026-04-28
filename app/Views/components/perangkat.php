<!-- Perangkat Desa -->
<section id="perangkat" class="py-16 sm:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="inline-block px-4 py-1 rounded-full bg-primary/10 text-primary text-xs font-semibold tracking-wider uppercase mb-3">Perangkat Desa</span>
            <h2 class="text-3xl sm:text-4xl font-bold mb-4">Aparatur <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-cyan-600">Desa</span></h2>
            <p class="text-gray-500 max-w-2xl mx-auto">Perangkat desa yang melayani masyarakat dengan penuh dedikasi</p>
        </div>

        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
            <?php foreach ($officials as $official): ?>
            <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1 overflow-hidden border border-transparent hover:border-teal-200" data-animate>
                <div class="h-48 bg-gradient-to-br from-teal-50 via-emerald-50 to-cyan-50 flex items-center justify-center relative overflow-hidden">
                    <?php if (!empty($official['photo_url'])): ?>
                    <img src="<?= image_url($official['photo_url']) ?>" alt="<?= esc($official['name']) ?>" class="w-full h-full object-cover">
                    <?php else: ?>
                    <svg class="w-20 h-20 text-emerald-300" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                    <?php endif; ?>
                </div>
                <div class="p-4 text-center">
                    <h4 class="font-bold text-sm mb-1"><?= esc($official['name']) ?></h4>
                    <p class="text-xs text-primary font-medium"><?= esc($official['position']) ?></p>
                    <?php if (!empty($official['nip'])): ?>
                    <p class="text-[10px] text-gray-400 mt-1">NIP: <?= esc($official['nip']) ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
