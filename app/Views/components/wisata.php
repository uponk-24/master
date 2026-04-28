<!-- Potensi Wisata -->
<section id="wisata" class="py-16 sm:py-20 bg-gradient-to-b from-gray-50 to-emerald-50/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="inline-block px-4 py-1 rounded-full bg-primary/10 text-primary text-xs font-semibold tracking-wider uppercase mb-3">Destinasi</span>
            <h2 class="text-3xl sm:text-4xl font-bold mb-4">Potensi <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-cyan-600">Wisata</span></h2>
            <p class="text-gray-500 max-w-2xl mx-auto">Keindahan alam dan potensi wisata yang dimiliki <?= esc($village['name'] ?? 'desa') ?></p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
            <?php foreach ($tourism as $spot): ?>
            <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">
                <div class="h-48 bg-gradient-to-br from-teal-50 via-emerald-50 to-cyan-50 relative overflow-hidden">
                    <?php if (!empty($spot['image_url'])): ?>
                    <img src="<?= image_url($spot['image_url']) ?>" alt="<?= esc($spot['name']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <?php else: ?>
                    <div class="flex items-center justify-center h-full">
                        <svg class="w-16 h-16 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <?php endif; ?>
                    <span class="absolute top-3 right-3 px-2.5 py-1 rounded-full bg-white/90 backdrop-blur-sm text-xs font-medium text-gray-700"><?= esc($spot['category']) ?></span>
                </div>
                <div class="p-5">
                    <h4 class="font-bold mb-2 group-hover:text-primary transition-colors"><?= esc($spot['name']) ?></h4>
                    <p class="text-sm text-gray-500 mb-3 line-clamp-2"><?= esc($spot['description']) ?></p>
                    <div class="flex items-center gap-1.5 text-xs text-gray-400">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                        <?= esc($spot['location']) ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
