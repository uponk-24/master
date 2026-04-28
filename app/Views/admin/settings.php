<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<div class="mb-6"><h1 class="text-2xl font-bold">Pengaturan</h1></div>
<?= alert_message() ?>

<div class="max-w-lg">
    <div class="bg-white rounded-2xl shadow-sm border p-6">
        <h3 class="font-bold text-lg mb-4">Ubah Password</h3>
        <form action="/admin/pengaturan/password" method="POST">
            <?= csrf_field() ?>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Password Saat Ini</label>
                    <input type="password" name="current_password" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Password Baru</label>
                    <input type="password" name="new_password" required minlength="6" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Konfirmasi Password Baru</label>
                    <input type="password" name="confirm_password" required minlength="6" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
                </div>
                <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-6 py-2.5 rounded-xl font-medium transition-colors">Simpan Password</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
