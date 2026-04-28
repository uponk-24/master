<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($article['title']) ?> - <?= esc($village['name'] ?? 'Desa') ?></title>
    <meta name="description" content="<?= esc($article['excerpt'] ?? '') ?>">
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
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="icon" href="/img/logo.svg" type="image/svg+xml">
</head>
<body class="bg-white text-gray-900 font-sans antialiased">

<?= $this->include('components/navbar') ?>

<!-- Mini Hero -->
<section class="relative py-20 bg-gradient-to-r from-slate-900 via-teal-900 to-emerald-900 overflow-hidden">
    <!-- Animated gradient overlay -->
    <div class="absolute inset-0 animate-gradient bg-gradient-to-br from-slate-900/50 via-teal-800/30 to-emerald-900/50"></div>

    <!-- Background pattern (same as hero) -->
    <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=60 height=60 viewBox=%270 0 60 60%27 xmlns=%27http://www.w3.org/2000/svg%27%3E%3Cg fill=%27none%27 fill-rule=%27evenodd%27%3E%3Cg fill=%27%23ffffff%27 fill-opacity=%270.4%27%3E%3Cpath d=%27M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%27/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')"></div>

    <!-- Decorative blurs -->
    <div class="absolute top-10 left-10 w-48 h-48 bg-emerald-400/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 right-10 w-64 h-64 bg-amber-400/10 rounded-full blur-3xl"></div>

    <!-- Floating decorative shapes -->
    <div class="absolute top-1/4 left-[10%] w-3 h-3 bg-teal-400/20 rounded-full animate-float"></div>
    <div class="absolute bottom-1/3 right-[15%] w-4 h-4 bg-cyan-400/15 rounded-full animate-float" style="animation-delay: 2s;"></div>
    <div class="absolute top-[60%] left-[60%] w-2 h-2 bg-emerald-400/20 rounded-full animate-float" style="animation-delay: 1s;"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <nav class="flex justify-center items-center gap-2 text-sm text-white/60 mb-6">
            <a href="/" class="hover:text-white transition-colors">Beranda</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <a href="/#berita" class="hover:text-white transition-colors">Berita</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-white/90"><?= esc($article['category'] ?? 'Berita') ?></span>
        </nav>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-5 max-w-4xl mx-auto leading-tight"><?= esc($article['title']) ?></h1>
        <div class="flex items-center justify-center gap-4 text-sm text-white/60">
            <span class="px-3 py-1 rounded-full bg-primary/20 text-primary-light text-xs font-medium"><?= esc($article['category'] ?? 'Umum') ?></span>
            <span><?= format_date_id($article['date'] ?? $article['created_at'] ?? date('Y-m-d')) ?></span>
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="py-12 sm:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <?php if (!empty($article['image_url'])): ?>
                <img src="<?= image_url($article['image_url']) ?>" alt="<?= esc($article['title']) ?>" class="w-full rounded-2xl shadow-lg mb-8 max-h-[400px] object-cover">
                <?php endif; ?>

                <?php if (!empty($article['excerpt'])): ?>
                <div class="text-lg text-gray-600 font-medium mb-6 border-l-4 border-primary pl-4 italic"><?= esc($article['excerpt']) ?></div>
                <?php endif; ?>

                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                    <?php foreach (array_filter(explode("\n", $article['content'])) as $paragraph): ?>
                    <?php $trimmed = trim($paragraph); ?>
                    <?php if (!empty($trimmed)): ?>
                    <p class="mb-4"><?= esc($trimmed) ?></p>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <!-- Share buttons -->
                <div class="mt-10 pt-6 border-t border-gray-200">
                    <p class="text-sm text-gray-500 mb-3 font-medium">Bagikan berita ini:</p>
                    <div class="flex flex-wrap gap-2">
                        <a href="https://wa.me/?text=<?= urlencode($article['title'] . ' - ' . current_url()) ?>" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-green-50 text-green-700 text-sm font-medium hover:bg-green-100 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.625.846 5.059 2.284 7.034L.789 23.492a.5.5 0 00.611.611l4.458-1.496A11.932 11.932 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-2.327 0-4.542-.681-6.435-1.966l-.246-.166-3.044 1.021 1.021-3.044-.166-.246A9.956 9.956 0 012 12C2 6.486 6.486 2 12 2s10 4.486 10 10-4.486 10-10 10z"/></svg>
                            WhatsApp
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(current_url()) ?>" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-blue-50 text-blue-700 text-sm font-medium hover:bg-blue-100 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?text=<?= urlencode($article['title']) ?>&url=<?= urlencode(current_url()) ?>" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-sky-50 text-sky-700 text-sm font-medium hover:bg-sky-100 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            Twitter
                        </a>
                    </div>
                </div>

                <!-- Back link -->
                <div class="mt-6">
                    <a href="/#berita" class="inline-flex items-center gap-2 text-sm text-primary hover:text-primary-dark font-medium transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        Kembali ke Berita
                    </a>
                </div>
            </div>

            <!-- Sidebar -->
            <div>
                <div class="bg-gradient-to-b from-gray-50 to-slate-50 rounded-2xl p-6 sticky top-20 border border-gray-100">
                    <h3 class="font-bold text-lg mb-1">Berita Terbaru</h3>
                    <p class="text-xs text-gray-400 mb-4">Berita terkini dari desa</p>
                    <div class="space-y-3">
                        <?php foreach ($recent as $r): ?>
                        <?php if (($r['id'] ?? '') !== ($article['id'] ?? '')): ?>
                        <a href="/berita/<?= $r['id'] ?>" class="block group p-3 rounded-xl hover:bg-white hover:shadow-sm transition-all">
                            <p class="text-xs text-gray-400 mb-1"><?= format_date_id($r['date'] ?? $r['created_at'] ?? '') ?></p>
                            <h4 class="text-sm font-medium text-gray-800 group-hover:text-primary transition-colors line-clamp-2 leading-snug"><?= esc($r['title']) ?></h4>
                            <?php if (!empty($r['category'])): ?>
                            <span class="inline-block mt-1.5 text-xs text-primary font-medium"><?= esc($r['category']) ?></span>
                            <?php endif; ?>
                        </a>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <a href="/#berita" class="block text-center text-sm text-primary font-medium mt-4 pt-3 border-t border-gray-200 hover:underline">Lihat Semua Berita &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->include('components/footer') ?>
<script src="/js/app.js"></script>
</body>
</html>
