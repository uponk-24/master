<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<div class="mb-6"><h1 class="text-2xl font-bold"><?= $spot ? 'Edit' : 'Tambah' ?> Wisata</h1></div>
<?= alert_message() ?>
<form action="<?= $spot ? site_url('admin/wisata/update/'.$spot['id']) : site_url('admin/wisata/simpan') ?>" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-sm border p-6 space-y-4">
    <?= csrf_field() ?>
    <div class="grid sm:grid-cols-2 gap-4">
        <div><label class="block text-sm font-medium mb-1">Nama Wisata</label>
            <input type="text" name="name" value="<?= esc($spot['name'] ?? '') ?>" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm"></div>
        <div><label class="block text-sm font-medium mb-1">Kategori</label>
            <select name="category" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
                <?php foreach (['Alam','Kuliner','Agrowisata','Budaya','Edukasi'] as $cat): ?>
                <option value="<?= $cat ?>" <?= ($spot['category'] ?? 'Alam') === $cat ? 'selected' : '' ?>><?= $cat ?></option>
                <?php endforeach; ?>
            </select></div>
        <div><label class="block text-sm font-medium mb-1">Lokasi</label>
            <input type="text" name="location" value="<?= esc($spot['location'] ?? '') ?>" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm"></div>
        <div><label class="block text-sm font-medium mb-1">Urutan</label>
            <input type="number" name="order_num" value="<?= esc($spot['order_num'] ?? 1) ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm"></div>
    </div>
    <div><label class="block text-sm font-medium mb-1">Deskripsi</label>
        <textarea name="description" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm resize-none"><?= esc($spot['description'] ?? '') ?></textarea></div>
    <div><label class="block text-sm font-medium mb-1">Foto</label>
        <input type="file" name="image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-medium file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
        <?php if (!empty($spot['image_url'])): ?><p class="text-xs text-gray-400 mt-1">Foto saat ini: <?= esc($spot['image_url']) ?></p><?php endif; ?>
    </div>
    <div class="flex gap-3 pt-2">
        <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-6 py-2.5 rounded-xl font-medium transition-colors">Simpan</button>
        <a href="<?= site_url('admin/wisata') ?>" class="px-6 py-2.5 rounded-xl border hover:bg-gray-50 text-sm font-medium">Batal</a>
    </div>
</form>
<?= $this->endSection() ?>
