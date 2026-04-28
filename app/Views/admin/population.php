<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Kependudukan</h1>
    <a href="<?= site_url('admin/kependudukan/tambah') ?>" class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-xl text-sm font-medium transition-colors">+ Tambah</a>
</div>
<?= alert_message() ?>

<!-- Year filter -->
<?php if (!empty($years)): ?>
<div class="mb-4 flex items-center gap-2 flex-wrap">
    <span class="text-sm font-medium text-gray-500">Filter Tahun:</span>
    <a href="<?= site_url('admin/kependudukan') ?>" class="px-3 py-1 rounded-lg text-sm font-medium transition-colors <?= empty($selectedYear) ? 'bg-primary text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' ?>">Semua</a>
    <?php foreach ($years as $y): ?>
    <a href="<?= site_url('admin/kependudukan') ?>?year=<?= $y ?>" class="px-3 py-1 rounded-lg text-sm font-medium transition-colors <?= ($selectedYear ?? '') == $y ? 'bg-primary text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' ?>"><?= $y ?></a>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<div class="bg-white rounded-2xl shadow-sm border overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b"><tr>
                <th class="text-left px-4 py-3 font-medium text-gray-500">No</th>
                <th class="text-left px-4 py-3 font-medium text-gray-500">Kategori Usia</th>
                <th class="text-right px-4 py-3 font-medium text-gray-500">Laki-laki</th>
                <th class="text-right px-4 py-3 font-medium text-gray-500">Perempuan</th>
                <th class="text-center px-4 py-3 font-medium text-gray-500">Tahun</th>
                <th class="text-right px-4 py-3 font-medium text-gray-500">Aksi</th>
            </tr></thead>
            <tbody class="divide-y">
            <?php if (empty($population)): ?>
                <tr><td colspan="6" class="px-4 py-8 text-center text-gray-400">Belum ada data kependudukan</td></tr>
            <?php else: ?>
            <?php foreach ($population as $i => $p): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3"><?= $i + 1 ?></td>
                    <td class="px-4 py-3 font-medium"><?= esc($p['category']) ?></td>
                    <td class="px-4 py-3 text-right"><?= number_format($p['male_count']) ?></td>
                    <td class="px-4 py-3 text-right"><?= number_format($p['female_count']) ?></td>
                    <td class="px-4 py-3 text-center"><?= $p['year'] ?></td>
                    <td class="px-4 py-3 text-right">
                        <a href="<?= site_url('admin/kependudukan/edit/' . $p['id']) ?>" class="text-primary hover:underline text-sm mr-3">Edit</a>
                        <form action="<?= site_url('admin/kependudukan/hapus/' . $p['id']) ?>" method="POST" class="inline" onsubmit="return confirm('Hapus data ini?')">
                            <?= csrf_field() ?>
                            <button type="submit" class="text-red-500 hover:underline text-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
