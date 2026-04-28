<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Potensi Wisata</h1>
    <a href="/admin/wisata/tambah" class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-xl text-sm font-medium transition-colors">+ Tambah</a>
</div>
<?= alert_message() ?>
<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
<?php foreach ($spots as $s): ?>
    <div class="bg-white rounded-2xl shadow-sm border overflow-hidden">
        <div class="h-36 bg-gradient-to-br from-emerald-100 to-teal-100 flex items-center justify-center">
            <?php if (!empty($s['image_url'])): ?>
            <img src="<?= image_url($s['image_url']) ?>" class="w-full h-full object-cover">
            <?php else: ?>
            <svg class="w-10 h-10 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            <?php endif; ?>
        </div>
        <div class="p-4">
            <span class="text-xs text-primary font-medium"><?= esc($s['category']) ?></span>
            <h4 class="font-bold text-sm"><?= esc($s['name']) ?></h4>
            <p class="text-xs text-gray-500 mt-1"><?= esc($s['location']) ?></p>
            <div class="flex gap-2 mt-3">
                <a href="/admin/wisata/edit/<?= $s['id'] ?>" class="text-primary hover:underline text-xs">Edit</a>
                <form action="/admin/wisata/hapus/<?= $s['id'] ?>" method="POST" class="inline" onsubmit="return confirm('Hapus?')"><?= csrf_field() ?><button type="submit" class="text-red-500 hover:underline text-xs">Hapus</button></form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>
<?= $this->endSection() ?>
