<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<div class="mb-6"><h1 class="text-2xl font-bold"><?= $article ? 'Edit' : 'Tambah' ?> Berita</h1></div>
<?= alert_message() ?>
<form action="<?= $article ? '/admin/berita/update/'.$article['id'] : '/admin/berita/simpan' ?>" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-sm border p-6 space-y-4">
    <?= csrf_field() ?>
    <div class="grid sm:grid-cols-2 gap-4">
        <div><label class="block text-sm font-medium mb-1">Judul</label>
            <input type="text" name="title" value="<?= esc($article['title'] ?? '') ?>" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm"></div>
        <div class="flex gap-4">
            <div class="flex-1"><label class="block text-sm font-medium mb-1">Kategori</label>
                <input type="text" name="category" value="<?= esc($article['category'] ?? '') ?>" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm"></div>
            <div><label class="block text-sm font-medium mb-1">Tanggal</label>
                <input type="date" name="date" value="<?= esc($article['date'] ?? date('Y-m-d')) ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm"></div>
        </div>
    </div>
    <div><label class="block text-sm font-medium mb-1">Ringkasan</label>
        <textarea name="excerpt" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm resize-none"><?= esc($article['excerpt'] ?? '') ?></textarea></div>
    <div><label class="block text-sm font-medium mb-1">Isi Berita</label>
        <textarea name="content" rows="8" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm resize-none"><?= esc($article['content'] ?? '') ?></textarea></div>
    <div class="grid sm:grid-cols-2 gap-4">
        <div><label class="block text-sm font-medium mb-1">Foto</label>
            <input type="file" name="image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-medium file:bg-primary/10 file:text-primary hover:file:bg-primary/20"></div>
        <div class="flex items-end"><label class="flex items-center gap-2"><input type="checkbox" name="is_published" value="1" <?= ($article['is_published'] ?? 1) ? 'checked' : '' ?> class="w-4 h-4 text-primary rounded"><span class="text-sm">Terbitkan</span></label></div>
    </div>
    <div class="flex gap-3 pt-2">
        <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-6 py-2.5 rounded-xl font-medium transition-colors">Simpan</button>
        <a href="/admin/berita" class="px-6 py-2.5 rounded-xl border hover:bg-gray-50 text-sm font-medium">Batal</a>
    </div>
</form>
<?= $this->endSection() ?>
