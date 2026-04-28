<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="mb-8">
    <h1 class="text-2xl font-bold">Dashboard</h1>
    <p class="text-gray-500 text-sm">Selamat datang, <?= esc(session()->get('admin_name')) ?></p>
</div>

<?= alert_message() ?>

<!-- Stats Cards -->
<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
    <?php $stats = [
        [
            'label' => 'Total Berita',
            'value' => $newsCount,
            'icon'  => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z',
            'gradient' => 'from-emerald-50 to-teal-50',
            'iconBg'   => 'bg-emerald-100 text-emerald-600',
        ],
        [
            'label' => 'Galeri Foto',
            'value' => $galleryCount,
            'icon'  => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z',
            'gradient' => 'from-sky-50 to-blue-50',
            'iconBg'   => 'bg-sky-100 text-sky-600',
        ],
        [
            'label' => 'Pesan Baru',
            'value' => $unreadMessages,
            'icon'  => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
            'gradient' => 'from-amber-50 to-yellow-50',
            'iconBg'   => 'bg-amber-100 text-amber-600',
        ],
        [
            'label' => 'Perangkat Desa',
            'value' => $officialCount,
            'icon'  => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z',
            'gradient' => 'from-purple-50 to-violet-50',
            'iconBg'   => 'bg-purple-100 text-purple-600',
        ],
        [
            'label' => 'Wisata Desa',
            'value' => $tourismCount,
            'icon'  => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064',
            'gradient' => 'from-teal-50 to-cyan-50',
            'iconBg'   => 'bg-teal-100 text-teal-600',
        ],
        [
            'label' => 'Layanan Aktif',
            'value' => $serviceCount,
            'icon'  => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4',
            'gradient' => 'from-rose-50 to-pink-50',
            'iconBg'   => 'bg-rose-100 text-rose-600',
        ],
    ]; ?>
    <?php foreach ($stats as $stat): ?>
    <div class="bg-gradient-to-br <?= $stat['gradient'] ?> rounded-2xl shadow-sm p-5 border border-white/80">
        <div class="flex items-center justify-between mb-3">
            <div class="w-11 h-11 rounded-xl <?= $stat['iconBg'] ?> flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= $stat['icon'] ?>"/></svg>
            </div>
        </div>
        <p class="text-2xl font-bold text-gray-900"><?= $stat['value'] ?></p>
        <p class="text-sm text-gray-500"><?= $stat['label'] ?></p>
    </div>
    <?php endforeach; ?>
</div>

<!-- Budget Summary -->
<div class="bg-gradient-to-br from-indigo-50 to-violet-50 rounded-2xl shadow-sm border border-white/80 p-6 mb-8">
    <div class="flex items-center gap-3 mb-2">
        <div class="w-11 h-11 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <div>
            <p class="text-sm text-gray-500">Total Pendapatan Desa <?= date('Y') ?></p>
            <p class="text-2xl font-bold text-gray-900"><?= format_rupiah((float)$budgetTotal) ?></p>
        </div>
    </div>
    <a href="<?= site_url('admin/anggaran') ?>" class="text-sm text-indigo-600 font-medium hover:underline">Lihat Detail Anggaran &rarr;</a>
</div>

<!-- Recent Messages -->
<?php if (!empty($recentMessages)): ?>
<div class="bg-white rounded-2xl shadow-sm border p-6">
    <div class="flex items-center justify-between mb-4">
        <h3 class="font-bold">Pesan Terbaru</h3>
        <a href="<?= site_url('admin/pesan') ?>" class="text-sm text-primary font-medium hover:underline">Lihat Semua &rarr;</a>
    </div>
    <div class="space-y-3">
        <?php foreach ($recentMessages as $msg): ?>
        <div class="flex items-start gap-3 p-3 rounded-xl bg-gray-50 hover:bg-gray-100 transition-colors">
            <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0">
                <span class="text-xs font-bold text-primary"><?= strtoupper(substr($msg['name'], 0, 1)) ?></span>
            </div>
            <div class="flex-1 min-w-0">
                <div class="flex items-center justify-between gap-2">
                    <p class="text-sm font-semibold truncate"><?= esc($msg['name']) ?></p>
                    <span class="text-[10px] text-gray-400 flex-shrink-0"><?= date('d/m/Y', strtotime($msg['created_at'])) ?></span>
                </div>
                <p class="text-xs text-gray-500 truncate"><?= esc($msg['message']) ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>

<?= $this->endSection() ?>
