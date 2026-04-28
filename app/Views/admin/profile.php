<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Profil Desa</h1>
</div>

<?= alert_message() ?>

<?php $p = $profile ?? []; ?>
<form action="/admin/profil/update" method="POST" enctype="multipart/form-data" class="space-y-6">
    <?= csrf_field() ?>

    <!-- Basic Info -->
    <div class="bg-white rounded-2xl shadow-sm border p-6">
        <h3 class="font-bold mb-4 text-lg">Informasi Dasar</h3>
        <div class="grid sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium mb-1">Nama Desa</label>
                <input type="text" name="name" value="<?= esc($p['name'] ?? '') ?>" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Motto</label>
                <input type="text" name="motto" value="<?= esc($p['motto'] ?? '') ?>" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Luas Wilayah</label>
                <input type="text" name="area_size" value="<?= esc($p['area_size'] ?? '') ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Jumlah Dusun</label>
                <input type="text" name="hamlets" value="<?= esc($p['hamlets'] ?? '') ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Penduduk</label>
                <input type="number" name="population" value="<?= esc($p['population'] ?? 0) ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">KK</label>
                <input type="number" name="family_count" value="<?= esc($p['family_count'] ?? 0) ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
        </div>
    </div>

    <!-- Description -->
    <div class="bg-white rounded-2xl shadow-sm border p-6">
        <h3 class="font-bold mb-4 text-lg">Deskripsi & Sejarah</h3>
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium mb-1">Deskripsi</label>
                <textarea name="description" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm resize-none"><?= esc($p['description'] ?? '') ?></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Sejarah</label>
                <textarea name="history" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm resize-none"><?= esc($p['history'] ?? '') ?></textarea>
            </div>
        </div>
    </div>

    <!-- Vision & Mission -->
    <div class="bg-white rounded-2xl shadow-sm border p-6">
        <h3 class="font-bold mb-4 text-lg">Visi & Misi</h3>
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium mb-1">Visi</label>
                <textarea name="vision" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm resize-none"><?= esc($p['vision'] ?? '') ?></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Misi (satu per baris)</label>
                <textarea name="mission" rows="6" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm resize-none"><?= esc($p['mission'] ?? '') ?></textarea>
            </div>
        </div>
    </div>

    <!-- Location -->
    <div class="bg-white rounded-2xl shadow-sm border p-6">
        <h3 class="font-bold mb-4 text-lg">Lokasi & Kontak</h3>
        <div class="grid sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium mb-1">Kecamatan</label>
                <input type="text" name="district" value="<?= esc($p['district'] ?? '') ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Kabupaten</label>
                <input type="text" name="regency" value="<?= esc($p['regency'] ?? '') ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Provinsi</label>
                <input type="text" name="province" value="<?= esc($p['province'] ?? '') ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Telepon</label>
                <input type="text" name="phone" value="<?= esc($p['phone'] ?? '') ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" value="<?= esc($p['email'] ?? '') ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Kode Pos</label>
                <input type="text" name="postal_code" value="<?= esc($p['postal_code'] ?? '') ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
            <div class="sm:col-span-2">
                <label class="block text-sm font-medium mb-1">Alamat</label>
                <textarea name="address" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm resize-none"><?= esc($p['address'] ?? '') ?></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Latitude</label>
                <input type="text" name="latitude" value="<?= esc($p['latitude'] ?? '') ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Longitude</label>
                <input type="text" name="longitude" value="<?= esc($p['longitude'] ?? '') ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Jam Pelayanan</label>
                <input type="text" name="service_hours" value="<?= esc($p['service_hours'] ?? '') ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Logo</label>
                <input type="file" name="logo" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-medium file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
            </div>
        </div>
    </div>

    <div class="flex justify-end">
        <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-8 py-3 rounded-xl font-semibold transition-colors shadow-lg shadow-primary/25">Simpan Perubahan</button>
    </div>
</form>

<?= $this->endSection() ?>
