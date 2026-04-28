<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GalleryModel;

class GalleryController extends BaseController
{
    protected GalleryModel $model;

    public function __construct() { $this->model = new GalleryModel(); }

    public function index()
    {
        $data['gallery'] = $this->model->getAllOrdered();
        return view('admin/gallery', $data);
    }

    public function create()
    {
        return view('admin/gallery_form', ['item' => null]);
    }

    public function store()
    {
        $data = [
            'id' => generate_id('gal-'),
            'title' => sanitize_input($this->request->getPost('title')),
            'category' => sanitize_input($this->request->getPost('category')) ?: 'Umum',
            'order_num' => (int)$this->request->getPost('order_num'),
            'image_url' => '',
        ];

        $image = $this->request->getFile('image');
        if ($image && $image->isValid()) {
            $path = upload_file($image, 'gallery/');
            if ($path) $data['image_url'] = $path;
        }

        $this->model->insert($data);
        return redirect()->to('/admin/galeri')->with('success', 'Galeri berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $data['item'] = $this->model->find($id);
        if (!$data['item']) return redirect()->to('/admin/galeri')->with('error', 'Data tidak ditemukan');
        return view('admin/gallery_form', $data);
    }

    public function update(string $id)
    {
        $item = $this->model->find($id);
        if (!$item) return redirect()->to('/admin/galeri')->with('error', 'Data tidak ditemukan');

        $data = [
            'title' => sanitize_input($this->request->getPost('title')),
            'category' => sanitize_input($this->request->getPost('category')) ?: 'Umum',
            'order_num' => (int)$this->request->getPost('order_num'),
        ];

        $image = $this->request->getFile('image');
        if ($image && $image->isValid()) {
            $path = upload_file($image, 'gallery/');
            if ($path) {
                if (!empty($item['image_url'])) delete_file($item['image_url']);
                $data['image_url'] = $path;
            }
        }

        $this->model->update($id, $data);
        return redirect()->to('/admin/galeri')->with('success', 'Galeri berhasil diperbarui');
    }

    public function delete(string $id)
    {
        $item = $this->model->find($id);
        if ($item && !empty($item['image_url'])) delete_file($item['image_url']);
        $this->model->delete($id);
        return redirect()->to('/admin/galeri')->with('success', 'Galeri berhasil dihapus');
    }
}
