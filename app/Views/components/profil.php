<!-- Profil Desa -->
<section id="profil" class="py-16 sm:py-20 bg-gradient-to-b from-white to-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="inline-block px-4 py-1 rounded-full bg-primary/10 text-primary text-xs font-semibold tracking-wider uppercase mb-3">Profil Desa</span>
            <h2 class="text-3xl sm:text-4xl font-bold mb-4">Tentang <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-cyan-600"><?= esc($village['name'] ?? 'Desa') ?></span></h2>
            <p class="text-gray-500 max-w-2xl mx-auto">Mengenal lebih dekat <?= esc($village['name'] ?? 'desa') ?>, sejarah, visi, dan misi pembangunan</p>
        </div>

        <!-- Description -->
        <div class="mb-14">
            <div class="border-0 shadow-lg rounded-2xl bg-gradient-to-br from-teal-50 via-emerald-50 to-cyan-50 p-6 sm:p-8" data-animate>
                <p class="text-base sm:text-lg leading-relaxed text-gray-700"><?= esc($village['description'] ?? '') ?></p>
            </div>
        </div>

        <!-- Vision & Mission -->
        <div class="grid md:grid-cols-2 gap-6 mb-14">
            <div class="border-l-4 border-teal-500 shadow-md rounded-2xl p-6 sm:p-8 hover:shadow-lg transition-shadow" data-animate>
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-teal-50 to-cyan-50 flex items-center justify-center">
                        <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold">Visi</h3>
                </div>
                <p class="text-gray-600 leading-relaxed italic">&ldquo;<?= esc($village['vision'] ?? '') ?>&rdquo;</p>
            </div>

            <div class="border-l-4 border-amber-400 shadow-md rounded-2xl p-6 sm:p-8 hover:shadow-lg transition-shadow" data-animate>
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center">
                        <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold">Misi</h3>
                </div>
                <ol class="space-y-3">
                    <?php $missions = array_filter(explode("\n", $village['mission'] ?? '')); ?>
                    <?php foreach ($missions as $i => $m): ?>
                    <li class="flex gap-3 text-gray-600 text-sm sm:text-base">
                        <span class="flex-shrink-0 w-6 h-6 rounded-full bg-primary/10 text-primary text-xs font-bold flex items-center justify-center mt-0.5"><?= $i + 1 ?></span>
                        <span><?= esc(preg_replace('/^\d+\.\s*/', '', trim($m))) ?></span>
                    </li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>

        <!-- History -->
        <div class="mb-14">
            <div class="shadow-md rounded-2xl p-6 sm:p-8" data-animate>
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-teal-50 to-emerald-50 flex items-center justify-center">
                        <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <h3 class="text-xl font-bold">Sejarah Desa</h3>
                </div>
                <div class="space-y-4">
                    <?php foreach (array_filter(explode("\n", $village['history'] ?? '')) as $p): ?>
                    <p class="text-gray-600 leading-relaxed"><?= esc(trim($p)) ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Quick Info -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
            <?php $infoCards = [
                ['icon'=>'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z','label'=>'Luas Wilayah','value'=>$village['area_size']??'-','color'=>'text-emerald-600 bg-emerald-50'],
                ['icon'=>'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4','label'=>'Kecamatan','value'=>str_replace('Kecamatan ','',$village['district']??'-'),'color'=>'text-teal-600 bg-teal-50'],
                ['icon'=>'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4','label'=>'Kabupaten','value'=>str_replace('Kabupaten ','',$village['regency']??'-'),'color'=>'text-amber-600 bg-amber-50'],
                ['icon'=>'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z','label'=>'Telepon','value'=>$village['phone']??'-','color'=>'text-sky-600 bg-sky-50'],
            ]; ?>
            <?php foreach ($infoCards as $card): ?>
            <div class="flex items-center gap-3 p-4 rounded-xl bg-white border shadow-sm" data-animate>
                <div class="w-10 h-10 rounded-lg <?= $card['color'] ?> flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= $card['icon'] ?>"/></svg>
                </div>
                <div class="min-w-0">
                    <p class="text-xs text-gray-500"><?= $card['label'] ?></p>
                    <p class="text-sm font-semibold truncate"><?= esc($card['value']) ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
