<!-- Layanan Desa -->
<section id="layanan" class="py-16 sm:py-20 bg-gradient-to-b from-white to-teal-50/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="inline-block px-4 py-1 rounded-full bg-primary/10 text-primary text-xs font-semibold tracking-wider uppercase mb-3">Pelayanan Publik</span>
            <h2 class="text-3xl sm:text-4xl font-bold mb-4">Layanan <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-cyan-600">Desa</span></h2>
            <p class="text-gray-500 max-w-2xl mx-auto">Berbagai layanan administrasi dan pelayanan publik yang tersedia</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
            <?php $iconColors = ['bg-emerald-50 text-emerald-600','bg-rose-50 text-rose-600','bg-sky-50 text-sky-600','bg-amber-50 text-amber-600','bg-pink-50 text-pink-600','bg-teal-50 text-teal-600','bg-violet-50 text-violet-600','bg-orange-50 text-orange-600']; ?>
            <?php $svgIcons = [
                'FileText'=>'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                'Heart'=>'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
                'CreditCard'=>'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z',
                'Briefcase'=>'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
                'Baby'=>'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
                'FileCheck'=>'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                'Users'=>'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
                'PartyPopper'=>'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z',
            ]; ?>
            <?php foreach ($services as $i => $service): ?>
            <div class="group bg-white border border-transparent hover:border-teal-200 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1 cursor-pointer rounded-2xl" onclick="openServiceModal('<?= esc($service['id']) ?>')">
                <div class="p-5 sm:p-6">
                    <div class="w-12 h-12 rounded-xl <?= $iconColors[$i % count($iconColors)] ?> flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= $svgIcons[$service['icon']] ?? $svgIcons['FileText'] ?>"/></svg>
                    </div>
                    <h4 class="text-base font-bold mb-2 group-hover:text-primary transition-colors"><?= esc($service['name']) ?></h4>
                    <p class="text-sm text-gray-500 leading-relaxed line-clamp-2 mb-3"><?= esc($service['description']) ?></p>
                    <span class="inline-flex items-center gap-1 text-xs font-medium text-primary">Selengkapnya <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></span>
                </div>
            </div>

            <!-- Modal (hidden) -->
            <div id="modal-<?= esc($service['id']) ?>" class="fixed inset-0 z-50 hidden">
                <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="closeServiceModal('<?= esc($service['id']) ?>')"></div>
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white rounded-2xl shadow-2xl w-[90%] max-w-lg max-h-[85vh] overflow-y-auto p-6">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-10 h-10 rounded-lg <?= $iconColors[$i % count($iconColors)] ?> flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= $svgIcons[$service['icon']] ?? $svgIcons['FileText'] ?>"/></svg>
                        </div>
                        <h3 class="text-lg font-bold"><?= esc($service['name']) ?></h3>
                    </div>
                    <p class="text-sm text-gray-500 mb-4"><?= esc($service['description']) ?></p>

                    <?php if (!empty($service['requirements'])): ?>
                    <div class="mb-4">
                        <h4 class="text-sm font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                            Persyaratan
                        </h4>
                        <div class="bg-gray-50 rounded-lg p-3">
                            <ul class="space-y-1">
                                <?php foreach (explode(', ', $service['requirements']) as $req): ?>
                                <li class="flex items-start gap-2 text-sm">
                                    <svg class="w-3.5 h-3.5 text-emerald-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                    <span><?= esc(trim($req)) ?></span>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($service['procedure'])): ?>
                    <div class="mb-4">
                        <h4 class="text-sm font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                            Prosedur
                        </h4>
                        <div class="bg-gray-50 rounded-lg p-3">
                            <ol class="space-y-2">
                                <?php foreach (explode("\n", $service['procedure']) as $j => $step): ?>
                                <li class="flex items-start gap-2 text-sm">
                                    <span class="flex-shrink-0 w-5 h-5 rounded-full bg-primary/10 text-primary text-xs font-bold flex items-center justify-center"><?= $j + 1 ?></span>
                                    <span><?= esc(preg_replace('/^\d+\.\s*/', '', trim($step))) ?></span>
                                </li>
                                <?php endforeach; ?>
                            </ol>
                        </div>
                    </div>
                    <?php endif; ?>

                    <a href="#kontak" onclick="closeServiceModal('<?= esc($service['id']) ?>')" class="block w-full text-center bg-primary hover:bg-primary-dark text-white py-2.5 rounded-xl font-medium transition-colors">Hubungi Kantor Desa</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
