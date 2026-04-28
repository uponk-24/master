<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<div class="mb-6"><h1 class="text-2xl font-bold"><?= $population ? 'Edit' : 'Tambah' ?> Data Kependudukan</h1></div>
<?= alert_message() ?>
<form action="<?= $population ? site_url('admin/kependudukan/update/'.$population['id']) : site_url('admin/kependudukan/simpan') ?>" method="POST" class="bg-white rounded-2xl shadow-sm border p-6 space-y-4">
    <?= csrf_field() ?>
    <div class="grid sm:grid-cols-2 gap-4">
        <div><label class="block text-sm font-medium mb-1">Kategori Usia</label>
            <input type="text" name="category" value="<?= esc($population['category'] ?? '') ?>" required placeholder="Contoh: 0-14 tahun" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm"></div>
        <div><label class="block text-sm font-medium mb-1">Tahun</label>
            <input type="number" name="year" value="<?= esc($population['year'] ?? date('Y')) ?>" required min="1900" max="2100" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm"></div>
        <div><label class="block text-sm font-medium mb-1">Laki-laki</label>
            <input type="number" name="male_count" value="<?= esc($population['male_count'] ?? 0) ?>" required min="0" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm"></div>
        <div><label class="block text-sm font-medium mb-1">Perempuan</label>
            <input type="number" name="female_count" value="<?= esc($population['female_count'] ?? 0) ?>" required min="0" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm"></div>
    </div>
    <div class="flex gap-3 pt-2">
        <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-6 py-2.5 rounded-xl font-medium transition-colors">Simpan</button>
        <a href="<?= site_url('admin/kependudukan') ?>" class="px-6 py-2.5 rounded-xl border hover:bg-gray-50 text-sm font-medium">Batal</a>
    </div>
</form>
<?= $this->endSection() ?>
