<!-- Anggaran Desa -->
<section id="anggaran" class="py-16 sm:py-20 bg-gradient-to-b from-slate-50 to-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="inline-block px-4 py-1 rounded-full bg-primary/10 text-primary text-xs font-semibold tracking-wider uppercase mb-3">Transparansi</span>
            <h2 class="text-3xl sm:text-4xl font-bold mb-4">Anggaran <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-cyan-600">Desa</span></h2>
            <p class="text-gray-500 max-w-2xl mx-auto">Transparansi pengelolaan keuangan desa untuk masyarakat</p>
        </div>

        <?php
        $years = array_unique(array_column($budgets, 'year'));
        rsort($years);
        $selectedYear = $years[0] ?? 2024;
        $yearBudgets = array_filter($budgets, fn($b) => $b['year'] == $selectedYear);
        $income = array_filter($yearBudgets, fn($b) => $b['type'] === 'PENDAPATAN');
        $expense = array_filter($yearBudgets, fn($b) => $b['type'] === 'BELANJA');
        $totalIncome = array_sum(array_column($income, 'amount'));
        $totalExpense = array_sum(array_column($expense, 'amount'));
        ?>

        <!-- Year tabs -->
        <div class="flex justify-center gap-2 mb-8">
            <?php foreach ($years as $y): ?>
            <button class="px-4 py-2 rounded-full text-sm font-medium transition-colors <?= $y == $selectedYear ? 'bg-primary text-white' : 'bg-white text-gray-600 hover:bg-gray-100' ?>" onclick="this.parentElement.querySelectorAll('button').forEach(b=>b.className='px-4 py-2 rounded-full text-sm font-medium transition-colors bg-white text-gray-600 hover:bg-gray-100');this.className='px-4 py-2 rounded-full text-sm font-medium transition-colors bg-primary text-white'"><?= $y ?></button>
            <?php endforeach; ?>
        </div>

        <!-- Summary -->
        <div class="grid sm:grid-cols-3 gap-4 mb-8">
            <div class="bg-emerald-50 rounded-2xl p-5 text-center">
                <p class="text-sm text-emerald-600 mb-1">Total Pendapatan</p>
                <p class="text-xl font-bold text-emerald-700"><?= format_rupiah($totalIncome) ?></p>
            </div>
            <div class="bg-amber-50 rounded-2xl p-5 text-center">
                <p class="text-sm text-amber-600 mb-1">Total Belanja</p>
                <p class="text-xl font-bold text-amber-700"><?= format_rupiah($totalExpense) ?></p>
            </div>
            <div class="bg-sky-50 rounded-2xl p-5 text-center">
                <p class="text-sm text-sky-600 mb-1">Selisih</p>
                <p class="text-xl font-bold text-sky-700"><?= format_rupiah($totalIncome - $totalExpense) ?></p>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <!-- Income -->
            <div class="bg-white rounded-2xl shadow-md p-6">
                <h3 class="font-bold mb-4 text-emerald-700 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"/></svg>
                    Pendapatan
                </h3>
                <div class="space-y-3">
                    <?php foreach ($income as $item): ?>
                    <div class="flex justify-between items-center p-3 rounded-lg bg-emerald-50/50">
                        <div>
                            <p class="text-sm font-medium"><?= esc($item['category']) ?></p>
                            <?php if ($item['description']): ?><p class="text-xs text-gray-500"><?= esc($item['description']) ?></p><?php endif; ?>
                        </div>
                        <span class="text-sm font-bold text-emerald-700"><?= format_rupiah($item['amount']) ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Expense -->
            <div class="bg-white rounded-2xl shadow-md p-6">
                <h3 class="font-bold mb-4 text-amber-700 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 13l-5 5m0 0l-5-5m5 5V6"/></svg>
                    Belanja
                </h3>
                <div class="space-y-3">
                    <?php foreach ($expense as $item): ?>
                    <div class="flex justify-between items-center p-3 rounded-lg bg-amber-50/50">
                        <div>
                            <p class="text-sm font-medium"><?= esc($item['category']) ?></p>
                            <?php if ($item['description']): ?><p class="text-xs text-gray-500"><?= esc($item['description']) ?></p><?php endif; ?>
                        </div>
                        <span class="text-sm font-bold text-amber-700"><?= format_rupiah($item['amount']) ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
