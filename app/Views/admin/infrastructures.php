<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Infrastruktur</h1>
    <a href="<?= site_url('admin/infrastruktur/tambah') ?>" class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-xl text-sm font-medium transition-colors">+ Tambah</a>
</div>
<?= alert_message() ?>
<div class="bg-white rounded-2xl shadow-sm border overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b"><tr>
                <th class="text-left px-4 py-3 font-medium text-gray-500">No</th>
                <th class="text-left px-4 py-3 font-medium text-gray-500">Nama</th>
                <th class="text-left px-4 py-3 font-medium text-gray-500">Kategori</th>
                <th class="text-right px-4 py-3 font-medium text-gray-500">Jumlah</th>
                <th class="text-left px-4 py-3 font-medium text-gray-500">Satuan</th>
                <th class="text-center px-4 py-3 font-medium text-gray-500">Kondisi</th>
                <th class="text-right px-4 py-3 font-medium text-gray-500">Aksi</th>
            </tr></thead>
            <tbody class="divide-y">
            <?php if (empty($infrastructures)): ?>
                <tr><td colspan="7" class="px-4 py-8 text-center text-gray-400">Belum ada data infrastruktur</td></tr>
            <?php else: ?>
            <?php foreach ($infrastructures as $i => $inf): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3"><?= $i + 1 ?></td>
                    <td class="px-4 py-3 font-medium"><?= esc($inf['name']) ?></td>
                    <td class="px-4 py-3 text-gray-500"><?= esc($inf['category']) ?></td>
                    <td class="px-4 py-3 text-right"><?= number_format($inf['quantity']) ?></td>
                    <td class="px-4 py-3 text-gray-500"><?= esc($inf['unit']) ?></td>
                    <td class="px-4 py-3 text-center">
                        <?php
                            $condClass = match($inf['condition'] ?? '') {
                                'Baik' => 'bg-emerald-50 text-emerald-700',
                                'Sedang' => 'bg-amber-50 text-amber-700',
                                'Rusak' => 'bg-red-50 text-red-700',
                                default => 'bg-gray-50 text-gray-700',
                            };
                        ?>
                        <span class="px-2 py-0.5 rounded-full text-xs font-medium <?= $condClass ?>"><?= esc($inf['condition']) ?></span>
                    </td>
                    <td class="px-4 py-3 text-right">
                        <a href="<?= site_url('admin/infrastruktur/edit/' . $inf['id']) ?>" class="text-primary hover:underline text-sm mr-3">Edit</a>
                        <form action="<?= site_url('admin/infrastruktur/hapus/' . $inf['id']) ?>" method="POST" class="inline" onsubmit="return confirm('Hapus data ini?')">
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
