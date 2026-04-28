<!-- Statistik Desa -->
<section id="statistik" class="py-16 sm:py-20 bg-gradient-to-b from-gray-50 to-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="inline-block px-4 py-1 rounded-full bg-primary/10 text-primary text-xs font-semibold tracking-wider uppercase mb-3">Data Desa</span>
            <h2 class="text-3xl sm:text-4xl font-bold mb-4">Statistik & <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-cyan-600">Infrastruktur</span></h2>
        </div>

        <?php if (!empty($population)): ?>
        <!-- Population Chart -->
        <div class="bg-white rounded-2xl shadow-md p-6 sm:p-8 mb-8" data-animate>
            <h3 class="text-lg font-bold mb-6 flex items-center gap-2">
                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                Kependudukan (<?= max(array_column($population, 'year')) ?>)
            </h3>
            <div class="space-y-3">
                <?php $latestPop = array_filter($population, fn($p) => $p['year'] == max(array_column($population, 'year'))); ?>
                <?php $totalMale = array_sum(array_column($latestPop, 'male_count')); ?>
                <?php $totalFemale = array_sum(array_column($latestPop, 'female_count')); ?>
                <?php $total = $totalMale + $totalFemale; ?>

                <div class="flex items-center gap-4 mb-4">
                    <div class="flex-1 text-center p-4 rounded-xl bg-sky-50">
                        <p class="text-2xl font-bold text-sky-600"><?= number_format($totalMale) ?></p>
                        <p class="text-xs text-gray-500">Laki-laki</p>
                    </div>
                    <div class="flex-1 text-center p-4 rounded-xl bg-pink-50">
                        <p class="text-2xl font-bold text-pink-600"><?= number_format($totalFemale) ?></p>
                        <p class="text-xs text-gray-500">Perempuan</p>
                    </div>
                    <div class="flex-1 text-center p-4 rounded-xl bg-emerald-50">
                        <p class="text-2xl font-bold text-primary"><?= number_format($total) ?></p>
                        <p class="text-xs text-gray-500">Total</p>
                    </div>
                </div>

                <?php foreach ($latestPop as $stat): ?>
                <?php $rowTotal = $stat['male_count'] + $stat['female_count']; ?>
                <div class="flex items-center gap-3">
                    <span class="w-20 text-xs text-gray-600 flex-shrink-0"><?= esc($stat['category']) ?></span>
                    <div class="flex-1 h-6 bg-gray-100 rounded-full overflow-hidden flex">
                        <div class="bg-sky-400 h-full flex items-center justify-center text-[10px] text-white font-bold" style="width:<?= $total > 0 ? ($stat['male_count']/$total*100) : 0 ?>%"><?= $stat['male_count'] ?></div>
                        <div class="bg-pink-400 h-full flex items-center justify-center text-[10px] text-white font-bold" style="width:<?= $total > 0 ? ($stat['female_count']/$total*100) : 0 ?>%"><?= $stat['female_count'] ?></div>
                    </div>
                    <span class="w-16 text-xs text-gray-500 text-right"><?= number_format($rowTotal) ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

        <?php if (!empty($infrastructure)): ?>
        <!-- Infrastructure -->
        <div class="bg-white rounded-2xl shadow-md p-6 sm:p-8" data-animate>
            <h3 class="text-lg font-bold mb-6 flex items-center gap-2">
                <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5"/></svg>
                Infrastruktur Desa
            </h3>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3">
                <?php $infraColors = ['Transportasi'=>'bg-blue-50 text-blue-700','Pemerintahan'=>'bg-purple-50 text-purple-700','Kesehatan'=>'bg-red-50 text-red-700','Pendidikan'=>'bg-yellow-50 text-yellow-700','Keagamaan'=>'bg-green-50 text-green-700','Olahraga'=>'bg-orange-50 text-orange-700','Pertanian'=>'bg-lime-50 text-lime-700','Ekonomi'=>'bg-cyan-50 text-cyan-700']; ?>
                <?php foreach ($infrastructure as $infra): ?>
                <div class="p-4 rounded-xl border hover:shadow-md transition-shadow">
                    <span class="inline-block px-2 py-0.5 rounded text-[10px] font-medium mb-2 <?= $infraColors[$infra['category']] ?? 'bg-gray-50 text-gray-700' ?>"><?= esc($infra['category']) ?></span>
                    <p class="font-semibold text-sm"><?= esc($infra['name']) ?></p>
                    <p class="text-lg font-bold text-primary"><?= $infra['quantity'] ?> <span class="text-xs text-gray-500 font-normal"><?= esc($infra['unit']) ?></span></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
