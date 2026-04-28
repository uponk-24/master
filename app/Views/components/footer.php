<!-- Footer -->
<footer class="bg-gradient-to-b from-gray-900 to-slate-900 text-white/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8 sm:gap-10">
            <!-- Brand -->
            <div class="sm:col-span-2 lg:col-span-1">
                <div class="flex items-center gap-2.5 mb-4">
                    <div class="w-9 h-9 rounded-lg bg-primary/20 flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v18l7-3 7 3V3H5z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-white text-sm"><?= esc($village['name'] ?? 'Desa') ?></h3>
                        <p class="text-[10px] text-white/50"><?= esc(str_replace('Kabupaten ','',$village['regency']??'')) ?></p>
                    </div>
                </div>
                <p class="text-sm text-white/60 leading-relaxed mb-4">Website resmi Pemerintah <?= esc($village['name'] ?? 'Desa') ?>, <?= esc($village['district'] ?? '') ?>, <?= esc($village['regency'] ?? '') ?>, <?= esc($village['province'] ?? '') ?>.</p>
                <p class="text-xs text-white/40 italic">&ldquo;<?= esc($village['motto'] ?? '') ?>&rdquo;</p>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="font-semibold text-white text-sm mb-4">Tautan Cepat</h4>
                <ul class="space-y-2.5">
                    <?php foreach ([['Profil Desa','#profil'],['Perangkat Desa','#perangkat'],['Anggaran Desa','#anggaran'],['Layanan Desa','#layanan'],['Potensi Wisata','#wisata']] as $link): ?>
                    <li><a href="<?= $link[1] ?>" class="text-sm text-white/60 hover:text-primary transition-colors"><?= $link[0] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Layanan -->
            <div>
                <h4 class="font-semibold text-white text-sm mb-4">Layanan</h4>
                <ul class="space-y-2.5">
                    <?php foreach (['Surat Keterangan','Pengurusan KTP','Pengurusan KK','Surat Izin Keramaian','Surat Keterangan Usaha'] as $item): ?>
                    <li><span class="text-sm text-white/60"><?= $item ?></span></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="font-semibold text-white text-sm mb-4">Kontak</h4>
                <ul class="space-y-3">
                    <li class="flex items-start gap-2.5">
                        <svg class="w-4 h-4 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                        <span class="text-sm text-white/60"><?= esc($village['address'] ?? '-') ?></span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span class="text-sm text-white/60"><?= esc($village['phone'] ?? '-') ?></span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span class="text-sm text-white/60"><?= esc($village['email'] ?? '-') ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex flex-col sm:flex-row items-center justify-between gap-3">
            <p class="text-xs text-white/40 text-center sm:text-left">&copy; <?= date('Y') ?> <?= esc($village['name'] ?? 'Desa') ?>. Hak Cipta Dilindungi.</p>
            <div class="flex items-center gap-3">
                <p class="text-xs text-white/30"><?= esc($village['district'] ?? '') ?> · <?= esc($village['regency'] ?? '') ?> · <?= esc($village['province'] ?? '') ?></p>
                <button onclick="window.scrollTo({top:0,behavior:'smooth'})" class="w-8 h-8 rounded-full bg-white/5 hover:bg-primary/20 text-white/40 hover:text-primary transition-colors flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                </button>
            </div>
        </div>
    </div>
</footer>
