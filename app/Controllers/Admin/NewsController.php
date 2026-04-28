<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\NewsModel;

class NewsController extends BaseController
{
    protected NewsModel $model;

    public function __construct() { $this->model = new NewsModel(); }

    public function index()
    {
        $data['news'] = $this->model->orderBy('date','DESC')->findAll();
        return view('admin/news', $data);
    }

    public function create()
    {
        return view('admin/news_form', ['article' => null]);
    }

    public function store()
    {
        $data = [
            'id' => generate_id('nws-'),
            'title' => sanitize_input($this->request->getPost('title')),
            'content' => $this->request->getPost('content'),
            'excerpt' => sanitize_input($this->request->getPost('excerpt')),
            'category' => sanitize_input($this->request->getPost('category')),
            'is_published' => $this->request->getPost('is_published') ? 1 : 0,
            'date' => $this->request->getPost('date') ?: date('Y-m-d'),
            'image_url' => null,
        ];

        $image = $this->request->getFile('image');
        if ($image && $image->isValid()) {
            $path = upload_file($image, 'news/');
            if ($path) $data['image_url'] = $path;
        }

        $this->model->insert($data);
        return redirect()->to('/admin/berita')->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $data['article'] = $this->model->find($id);
        if (!$data['article']) return redirect()->to('/admin/berita')->with('error', 'Data tidak ditemukan');
        return view('admin/news_form', $data);
    }

    public function update(string $id)
    {
        $article = $this->model->find($id);
        if (!$article) return redirect()->to('/admin/berita')->with('error', 'Data tidak ditemukan');

        $data = [
            'title' => sanitize_input($this->request->getPost('title')),
            'content' => $this->request->getPost('content'),
            'excerpt' => sanitize_input($this->request->getPost('excerpt')),
            'category' => sanitize_input($this->request->getPost('category')),
            'is_published' => $this->request->getPost('is_published') ? 1 : 0,
            'date' => $this->request->getPost('date') ?: date('Y-m-d'),
        ];

        $image = $this->request->getFile('image');
        if ($image && $image->isValid()) {
            $path = upload_file($image, 'news/');
            if ($path) {
                if (!empty($article['image_url'])) delete_file($article['image_url']);
                $data['image_url'] = $path;
            }
        }

        $this->model->update($id, $data);
        return redirect()->to('/admin/berita')->with('success', 'Berita berhasil diperbarui');
    }

    public function delete(string $id)
    {
        $article = $this->model->find($id);
        if ($article && !empty($article['image_url'])) delete_file($article['image_url']);
        $this->model->delete($id);
        return redirect()->to('/admin/berita')->with('success', 'Berita berhasil dihapus');
    }
}
