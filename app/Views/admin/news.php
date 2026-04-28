<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Berita Desa</h1>
    <a href="/admin/berita/tambah" class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-xl text-sm font-medium transition-colors">+ Tambah</a>
</div>
<?= alert_message() ?>
<div class="bg-white rounded-2xl shadow-sm border overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b"><tr>
                <th class="text-left px-4 py-3 font-medium text-gray-500">Judul</th>
                <th class="text-left px-4 py-3 font-medium text-gray-500">Kategori</th>
                <th class="text-left px-4 py-3 font-medium text-gray-500">Tanggal</th>
                <th class="text-left px-4 py-3 font-medium text-gray-500">Status</th>
                <th class="text-right px-4 py-3 font-medium text-gray-500">Aksi</th>
            </tr></thead>
            <tbody class="divide-y">
            <?php foreach ($news as $n): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 font-medium max-w-xs truncate"><?= esc($n['title']) ?></td>
                    <td class="px-4 py-3"><span class="px-2 py-0.5 rounded-full bg-primary/10 text-primary text-xs font-medium"><?= esc($n['category']) ?></span></td>
                    <td class="px-4 py-3 text-gray-500"><?= date('d/m/Y', strtotime($n['date'])) ?></td>
                    <td class="px-4 py-3"><span class="px-2 py-0.5 rounded-full text-xs font-medium <?= $n['is_published'] ? 'bg-emerald-50 text-emerald-700' : 'bg-gray-100 text-gray-500' ?>"><?= $n['is_published'] ? 'Terbit' : 'Draft' ?></span></td>
                    <td class="px-4 py-3 text-right">
                        <a href="/admin/berita/edit/<?= $n['id'] ?>" class="text-primary hover:underline text-sm mr-3">Edit</a>
                        <form action="/admin/berita/hapus/<?= $n['id'] ?>" method="POST" class="inline" onsubmit="return confirm('Hapus?')"><?= csrf_field() ?><button type="submit" class="text-red-500 hover:underline text-sm">Hapus</button></form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
