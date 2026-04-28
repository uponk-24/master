<!-- Galeri Desa -->
<section id="galeri" class="py-16 sm:py-20 bg-gradient-to-b from-gray-50 to-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="inline-block px-4 py-1 rounded-full bg-primary/10 text-primary text-xs font-semibold tracking-wider uppercase mb-3">Dokumentasi</span>
            <h2 class="text-3xl sm:text-4xl font-bold mb-4">Galeri <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-cyan-600">Desa</span></h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <?php foreach ($gallery as $img): ?>
            <div class="group relative rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all aspect-[4/3] bg-gradient-to-br from-teal-50 via-emerald-50 to-cyan-50 cursor-pointer" onclick="openGallery(this)">
                <?php if (!empty($img['image_url'])): ?>
                <img src="<?= image_url($img['image_url']) ?>" alt="<?= esc($img['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <?php else: ?>
                <div class="flex items-center justify-center h-full">
                    <svg class="w-10 h-10 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <?php endif; ?>
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
                    <div>
                        <p class="text-white font-semibold text-sm"><?= esc($img['title']) ?></p>
                        <p class="text-white/70 text-xs"><?= esc($img['category']) ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Gallery Lightbox -->
<div id="gallery-lightbox" class="fixed inset-0 z-50 hidden bg-black/90 flex items-center justify-center" onclick="closeGallery()">
    <img id="lightbox-img" src="" class="max-w-[90%] max-h-[90%] object-contain rounded-lg">
    <button class="absolute top-4 right-4 text-white text-3xl">&times;</button>
</div>
