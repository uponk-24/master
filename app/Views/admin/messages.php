<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<div class="mb-6"><h1 class="text-2xl font-bold">Pesan Masuk</h1></div>
<?= alert_message() ?>
<div class="space-y-3">
<?php if (empty($messages)): ?>
    <div class="bg-white rounded-2xl shadow-sm border p-8 text-center text-gray-400">Belum ada pesan</div>
<?php endif; ?>
<?php foreach ($messages as $m): ?>
    <div class="bg-white rounded-2xl shadow-sm border p-5 <?= $m['is_read'] ? '' : 'border-l-4 border-l-primary' ?>">
        <div class="flex items-start justify-between gap-4">
            <div class="flex-1 min-w-0">
                <div class="flex items-center gap-2 mb-1">
                    <span class="font-bold text-sm"><?= esc($m['name']) ?></span>
                    <span class="text-xs text-gray-400"><?= esc($m['email']) ?></span>
                    <?php if (!$m['is_read']): ?><span class="px-2 py-0.5 rounded-full bg-primary/10 text-primary text-[10px] font-bold">BARU</span><?php endif; ?>
                </div>
                <p class="text-sm text-gray-600"><?= esc($m['message']) ?></p>
                <p class="text-xs text-gray-400 mt-2"><?= date('d/m/Y H:i', strtotime($m['created_at'])) ?></p>
            </div>
            <div class="flex gap-2 flex-shrink-0">
                <?php if (!$m['is_read']): ?>
                <a href="/admin/pesan/baca/<?= $m['id'] ?>" class="text-xs text-primary hover:underline">Tandai Dibaca</a>
                <?php endif; ?>
                <form action="/admin/pesan/hapus/<?= $m['id'] ?>" method="POST" class="inline" onsubmit="return confirm('Hapus?')"><?= csrf_field() ?><button type="submit" class="text-xs text-red-500 hover:underline">Hapus</button></form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>
<?= $this->endSection() ?>
