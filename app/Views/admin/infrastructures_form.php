<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<div class="mb-6"><h1 class="text-2xl font-bold"><?= $infrastructure ? 'Edit' : 'Tambah' ?> Infrastruktur</h1></div>
<?= alert_message() ?>
<form action="<?= $infrastructure ? '/admin/infrastruktur/update/'.$infrastructure['id'] : '/admin/infrastruktur/simpan' ?>" method="POST" class="bg-white rounded-2xl shadow-sm border p-6 space-y-4">
    <?= csrf_field() ?>
    <div class="grid sm:grid-cols-2 gap-4">
        <div><label class="block text-sm font-medium mb-1">Nama</label>
            <input type="text" name="name" value="<?= esc($infrastructure['name'] ?? '') ?>" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm"></div>
        <div><label class="block text-sm font-medium mb-1">Kategori</label>
            <select name="category" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
                <option value="">-- Pilih Kategori --</option>
                <?php $categories = ['Transportasi','Pemerintahan','Kesehatan','Pendidikan','Keagamaan','Olahraga','Pertanian','Ekonomi']; ?>
                <?php foreach ($categories as $cat): ?>
                <option value="<?= $cat ?>" <?= ($infrastructure['category'] ?? '') === $cat ? 'selected' : '' ?>><?= $cat ?></option>
                <?php endforeach; ?>
            </select></div>
        <div><label class="block text-sm font-medium mb-1">Jumlah</label>
            <input type="number" name="quantity" value="<?= esc($infrastructure['quantity'] ?? 1) ?>" required min="0" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm"></div>
        <div><label class="block text-sm font-medium mb-1">Satuan</label>
            <input type="text" name="unit" value="<?= esc($infrastructure['unit'] ?? '') ?>" required placeholder="Contoh: Unit, Buah, Km" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm"></div>
        <div class="sm:col-span-2"><label class="block text-sm font-medium mb-1">Kondisi</label>
            <select name="condition" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
                <option value="">-- Pilih Kondisi --</option>
                <?php $conditions = ['Baik','Sedang','Rusak']; ?>
                <?php foreach ($conditions as $cond): ?>
                <option value="<?= $cond ?>" <?= ($infrastructure['condition'] ?? '') === $cond ? 'selected' : '' ?>><?= $cond ?></option>
                <?php endforeach; ?>
            </select></div>
    </div>
    <div class="flex gap-3 pt-2">
        <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-6 py-2.5 rounded-xl font-medium transition-colors">Simpan</button>
        <a href="/admin/infrastruktur" class="px-6 py-2.5 rounded-xl border hover:bg-gray-50 text-sm font-medium">Batal</a>
    </div>
</form>
<?= $this->endSection() ?>
