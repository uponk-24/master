<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<div class="mb-6"><h1 class="text-2xl font-bold"><?= $budget ? 'Edit' : 'Tambah' ?> Anggaran</h1></div>
<?= alert_message() ?>
<form action="<?= $budget ? site_url('admin/anggaran/update/'.$budget['id']) : site_url('admin/anggaran/simpan') ?>" method="POST" class="bg-white rounded-2xl shadow-sm border p-6 space-y-4">
    <?= csrf_field() ?>
    <div class="grid sm:grid-cols-2 gap-4">
        <div><label class="block text-sm font-medium mb-1">Tahun</label>
            <input type="number" name="year" value="<?= esc($budget['year'] ?? date('Y')) ?>" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm"></div>
        <div><label class="block text-sm font-medium mb-1">Kategori</label>
            <input type="text" name="category" value="<?= esc($budget['category'] ?? '') ?>" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm"></div>
        <div><label class="block text-sm font-medium mb-1">Jumlah (Rp)</label>
            <input type="text" name="amount" value="<?= esc($budget['amount'] ?? '') ?>" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm"></div>
        <div><label class="block text-sm font-medium mb-1">Jenis</label>
            <select name="type" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
                <option value="PENDAPATAN" <?= ($budget['type'] ?? '') === 'PENDAPATAN' ? 'selected' : '' ?>>Pendapatan</option>
                <option value="BELANJA" <?= ($budget['type'] ?? '') === 'BELANJA' ? 'selected' : '' ?>>Belanja</option>
            </select></div>
        <div class="sm:col-span-2"><label class="block text-sm font-medium mb-1">Keterangan</label>
            <input type="text" name="description" value="<?= esc($budget['description'] ?? '') ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm"></div>
    </div>
    <div class="flex gap-3 pt-2">
        <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-6 py-2.5 rounded-xl font-medium transition-colors">Simpan</button>
        <a href="<?= site_url('admin/anggaran') ?>" class="px-6 py-2.5 rounded-xl border hover:bg-gray-50 text-sm font-medium">Batal</a>
    </div>
</form>
<?= $this->endSection() ?>
