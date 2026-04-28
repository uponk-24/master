<!-- Berita Desa -->
<section id="berita" class="py-16 sm:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="inline-block px-4 py-1 rounded-full bg-primary/10 text-primary text-xs font-semibold tracking-wider uppercase mb-3">Informasi</span>
            <h2 class="text-3xl sm:text-4xl font-bold mb-4">Berita <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-cyan-600">Desa</span></h2>
            <p class="text-gray-500 max-w-2xl mx-auto">Informasi terbaru seputar kegiatan dan program desa</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
            <?php foreach ($news as $article): ?>
            <a href="/berita/<?= $article['id'] ?>" class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1 overflow-hidden">
                <div class="h-44 bg-gradient-to-br from-teal-50 via-emerald-50 to-cyan-50 relative overflow-hidden">
                    <?php if (!empty($article['image_url'])): ?>
                    <img src="<?= image_url($article['image_url']) ?>" alt="<?= esc($article['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <?php else: ?>
                    <div class="flex items-center justify-center h-full">
                        <svg class="w-12 h-12 text-teal-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    </div>
                    <?php endif; ?>
                    <span class="absolute top-3 left-3 px-2.5 py-1 rounded-full bg-primary text-white text-[10px] font-medium"><?= esc($article['category']) ?></span>
                </div>
                <div class="p-5">
                    <p class="text-xs text-gray-400 mb-2"><?= format_date_id($article['date']) ?></p>
                    <h4 class="font-bold mb-2 group-hover:text-primary transition-colors line-clamp-2"><?= esc($article['title']) ?></h4>
                    <p class="text-sm text-gray-500 line-clamp-2"><?= esc($article['excerpt']) ?></p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
