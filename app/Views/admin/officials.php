<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Perangkat Desa</h1>
    <a href="/admin/perangkat/tambah" class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-xl text-sm font-medium transition-colors">+ Tambah</a>
</div>
<?= alert_message() ?>
<div class="bg-white rounded-2xl shadow-sm border overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b"><tr>
                <th class="text-left px-4 py-3 font-medium text-gray-500">No</th>
                <th class="text-left px-4 py-3 font-medium text-gray-500">Nama</th>
                <th class="text-left px-4 py-3 font-medium text-gray-500">Jabatan</th>
                <th class="text-left px-4 py-3 font-medium text-gray-500">NIP</th>
                <th class="text-left px-4 py-3 font-medium text-gray-500">Urutan</th>
                <th class="text-right px-4 py-3 font-medium text-gray-500">Aksi</th>
            </tr></thead>
            <tbody class="divide-y">
            <?php foreach ($officials as $i => $o): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3"><?= $i + 1 ?></td>
                    <td class="px-4 py-3 font-medium"><?= esc($o['name']) ?></td>
                    <td class="px-4 py-3 text-gray-500"><?= esc($o['position']) ?></td>
                    <td class="px-4 py-3 text-gray-500"><?= esc($o['nip'] ?? '-') ?></td>
                    <td class="px-4 py-3"><?= $o['order_num'] ?></td>
                    <td class="px-4 py-3 text-right">
                        <a href="/admin/perangkat/edit/<?= $o['id'] ?>" class="text-primary hover:underline text-sm mr-3">Edit</a>
                        <form action="/admin/perangkat/hapus/<?= $o['id'] ?>" method="POST" class="inline" onsubmit="return confirm('Hapus data ini?')">
                            <?= csrf_field() ?>
                            <button type="submit" class="text-red-500 hover:underline text-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
