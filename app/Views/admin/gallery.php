<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Galeri Desa</h1>
    <a href="<?= site_url('admin/galeri/tambah') ?>" class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-xl text-sm font-medium transition-colors">+ Tambah</a>
</div>
<?= alert_message() ?>
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
<?php foreach ($gallery as $g): ?>
    <div class="bg-white rounded-2xl shadow-sm border overflow-hidden group">
        <div class="aspect-[4/3] bg-gradient-to-br from-emerald-100 to-teal-100 flex items-center justify-center relative">
            <?php if (!empty($g['image_url'])): ?>
            <img src="<?= image_url($g['image_url']) ?>" class="w-full h-full object-cover">
            <?php else: ?>
            <svg class="w-8 h-8 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            <?php endif; ?>
        </div>
        <div class="p-3">
            <p class="font-medium text-sm truncate"><?= esc($g['title']) ?></p>
            <p class="text-xs text-gray-400"><?= esc($g['category']) ?></p>
            <div class="flex gap-2 mt-2">
                <a href="<?= site_url('admin/galeri/edit/' . $g['id']) ?>" class="text-primary hover:underline text-xs">Edit</a>
                <form action="<?= site_url('admin/galeri/hapus/' . $g['id']) ?>" method="POST" class="inline" onsubmit="return confirm('Hapus?')"><?= csrf_field() ?><button type="submit" class="text-red-500 hover:underline text-xs">Hapus</button></form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>
<?= $this->endSection() ?>
