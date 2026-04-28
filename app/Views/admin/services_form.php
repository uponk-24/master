<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<div class="mb-6"><h1 class="text-2xl font-bold"><?= $service ? 'Edit' : 'Tambah' ?> Layanan</h1></div>
<?= alert_message() ?>
<form action="<?= $service ? site_url('admin/layanan/update/'.$service['id']) : site_url('admin/layanan/simpan') ?>" method="POST" class="bg-white rounded-2xl shadow-sm border p-6 space-y-4">
    <?= csrf_field() ?>
    <div class="grid sm:grid-cols-2 gap-4">
        <div><label class="block text-sm font-medium mb-1">Nama Layanan</label>
            <input type="text" name="name" value="<?= esc($service['name'] ?? '') ?>" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm"></div>
        <div><label class="block text-sm font-medium mb-1">Icon</label>
            <select name="icon" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
                <?php $icons = ['FileText','Heart','CreditCard','Briefcase','Baby','FileCheck','Users','PartyPopper']; ?>
                <?php foreach ($icons as $ic): ?>
                <option value="<?= $ic ?>" <?= ($service['icon'] ?? 'FileText') === $ic ? 'selected' : '' ?>><?= $ic ?></option>
                <?php endforeach; ?>
            </select></div>
        <div><label class="block text-sm font-medium mb-1">Urutan</label>
            <input type="number" name="order_num" value="<?= esc($service['order_num'] ?? 1) ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm"></div>
        <div class="flex items-end"><label class="flex items-center gap-2"><input type="checkbox" name="is_active" value="1" <?= ($service['is_active'] ?? 1) ? 'checked' : '' ?> class="w-4 h-4 text-primary rounded"><span class="text-sm">Aktif</span></label></div>
    </div>
    <div><label class="block text-sm font-medium mb-1">Deskripsi</label>
        <textarea name="description" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm resize-none"><?= esc($service['description'] ?? '') ?></textarea></div>
    <div><label class="block text-sm font-medium mb-1">Persyaratan (pisah dengan koma)</label>
        <textarea name="requirements" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm resize-none"><?= esc($service['requirements'] ?? '') ?></textarea></div>
    <div><label class="block text-sm font-medium mb-1">Prosedur (satu langkah per baris)</label>
        <textarea name="procedure" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm resize-none"><?= esc($service['procedure'] ?? '') ?></textarea></div>
    <div class="flex gap-3 pt-2">
        <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-6 py-2.5 rounded-xl font-medium transition-colors">Simpan</button>
        <a href="<?= site_url('admin/layanan') ?>" class="px-6 py-2.5 rounded-xl border hover:bg-gray-50 text-sm font-medium">Batal</a>
    </div>
</form>
<?= $this->endSection() ?>
