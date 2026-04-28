<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<div class="mb-6"><h1 class="text-2xl font-bold"><?= $item ? 'Edit' : 'Tambah' ?> Galeri</h1></div>
<?= alert_message() ?>
<form action="<?= $item ? '/admin/galeri/update/'.$item['id'] : '/admin/galeri/simpan' ?>" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-sm border p-6 space-y-4">
    <?= csrf_field() ?>
    <div class="grid sm:grid-cols-2 gap-4">
        <div><label class="block text-sm font-medium mb-1">Judul Foto</label>
            <input type="text" name="title" value="<?= esc($item['title'] ?? '') ?>" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm"></div>
        <div><label class="block text-sm font-medium mb-1">Kategori</label>
            <input type="text" name="category" value="<?= esc($item['category'] ?? 'Umum') ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm"></div>
        <div><label class="block text-sm font-medium mb-1">Urutan</label>
            <input type="number" name="order_num" value="<?= esc($item['order_num'] ?? 1) ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm"></div>
        <div><label class="block text-sm font-medium mb-1">Foto</label>
            <input type="file" name="image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-medium file:bg-primary/10 file:text-primary hover:file:bg-primary/20"></div>
    </div>
    <?php if (!empty($item['image_url'])): ?>
    <p class="text-xs text-gray-400">Foto saat ini: <?= esc($item['image_url']) ?></p>
    <?php endif; ?>
    <div class="flex gap-3 pt-2">
        <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-6 py-2.5 rounded-xl font-medium transition-colors">Simpan</button>
        <a href="/admin/galeri" class="px-6 py-2.5 rounded-xl border hover:bg-gray-50 text-sm font-medium">Batal</a>
    </div>
</form>
<?= $this->endSection() ?>
