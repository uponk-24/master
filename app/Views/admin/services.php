<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Layanan Desa</h1>
    <a href="/admin/layanan/tambah" class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-xl text-sm font-medium transition-colors">+ Tambah</a>
</div>
<?= alert_message() ?>
<div class="bg-white rounded-2xl shadow-sm border overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b"><tr>
                <th class="text-left px-4 py-3 font-medium text-gray-500">No</th>
                <th class="text-left px-4 py-3 font-medium text-gray-500">Nama</th>
                <th class="text-left px-4 py-3 font-medium text-gray-500">Icon</th>
                <th class="text-left px-4 py-3 font-medium text-gray-500">Status</th>
                <th class="text-right px-4 py-3 font-medium text-gray-500">Aksi</th>
            </tr></thead>
            <tbody class="divide-y">
            <?php foreach ($services as $i => $s): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3"><?= $i+1 ?></td>
                    <td class="px-4 py-3 font-medium"><?= esc($s['name']) ?></td>
                    <td class="px-4 py-3 text-gray-500"><?= esc($s['icon']) ?></td>
                    <td class="px-4 py-3"><span class="px-2 py-0.5 rounded-full text-xs font-medium <?= $s['is_active'] ? 'bg-emerald-50 text-emerald-700' : 'bg-gray-100 text-gray-500' ?>"><?= $s['is_active'] ? 'Aktif' : 'Nonaktif' ?></span></td>
                    <td class="px-4 py-3 text-right">
                        <a href="/admin/layanan/edit/<?= $s['id'] ?>" class="text-primary hover:underline text-sm mr-3">Edit</a>
                        <form action="/admin/layanan/hapus/<?= $s['id'] ?>" method="POST" class="inline" onsubmit="return confirm('Hapus?')"><?= csrf_field() ?><button type="submit" class="text-red-500 hover:underline text-sm">Hapus</button></form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
