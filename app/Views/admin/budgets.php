<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Anggaran Desa</h1>
    <a href="/admin/anggaran/tambah" class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-xl text-sm font-medium transition-colors">+ Tambah</a>
</div>
<?= alert_message() ?>
<div class="bg-white rounded-2xl shadow-sm border overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b"><tr>
                <th class="text-left px-4 py-3 font-medium text-gray-500">Tahun</th>
                <th class="text-left px-4 py-3 font-medium text-gray-500">Kategori</th>
                <th class="text-left px-4 py-3 font-medium text-gray-500">Jenis</th>
                <th class="text-right px-4 py-3 font-medium text-gray-500">Jumlah</th>
                <th class="text-right px-4 py-3 font-medium text-gray-500">Aksi</th>
            </tr></thead>
            <tbody class="divide-y">
            <?php foreach ($budgets as $b): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3"><?= $b['year'] ?></td>
                    <td class="px-4 py-3 font-medium"><?= esc($b['category']) ?></td>
                    <td class="px-4 py-3"><span class="px-2 py-0.5 rounded-full text-xs font-medium <?= $b['type']==='PENDAPATAN' ? 'bg-emerald-50 text-emerald-700' : 'bg-amber-50 text-amber-700' ?>"><?= $b['type'] ?></span></td>
                    <td class="px-4 py-3 text-right font-medium"><?= format_rupiah($b['amount']) ?></td>
                    <td class="px-4 py-3 text-right">
                        <a href="/admin/anggaran/edit/<?= $b['id'] ?>" class="text-primary hover:underline text-sm mr-3">Edit</a>
                        <form action="/admin/anggaran/hapus/<?= $b['id'] ?>" method="POST" class="inline" onsubmit="return confirm('Hapus?')"><?= csrf_field() ?><button type="submit" class="text-red-500 hover:underline text-sm">Hapus</button></form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
