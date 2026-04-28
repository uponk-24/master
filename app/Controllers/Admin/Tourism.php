<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TourismSpotModel;

class Tourism extends BaseController
{
    protected TourismSpotModel $model;

    public function __construct() { $this->model = new TourismSpotModel(); }

    public function index()
    {
        $data['spots'] = $this->model->getAllOrdered();
        return view('admin/tourism', $data);
    }

    public function create()
    {
        return view('admin/tourism_form', ['spot' => null]);
    }

    public function store()
    {
        $data = [
            'id' => generate_id('trm-'),
            'name' => sanitize_input($this->request->getPost('name')),
            'description' => $this->request->getPost('description'),
            'category' => sanitize_input($this->request->getPost('category')) ?: 'Alam',
            'location' => sanitize_input($this->request->getPost('location')),
            'order_num' => (int)$this->request->getPost('order_num'),
            'image_url' => '',
        ];

        $image = $this->request->getFile('image');
        if ($image && $image->isValid()) {
            $path = upload_file($image, 'tourism/');
            if ($path) $data['image_url'] = $path;
        }

        $this->model->insert($data);
        return redirect()->to(site_url('admin/wisata'))->with('success', 'Wisata berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $data['spot'] = $this->model->find($id);
        if (!$data['spot']) return redirect()->to(site_url('admin/wisata'))->with('error', 'Data tidak ditemukan');
        return view('admin/tourism_form', $data);
    }

    public function update(string $id)
    {
        $spot = $this->model->find($id);
        if (!$spot) return redirect()->to(site_url('admin/wisata'))->with('error', 'Data tidak ditemukan');

        $data = [
            'name' => sanitize_input($this->request->getPost('name')),
            'description' => $this->request->getPost('description'),
            'category' => sanitize_input($this->request->getPost('category')) ?: 'Alam',
            'location' => sanitize_input($this->request->getPost('location')),
            'order_num' => (int)$this->request->getPost('order_num'),
        ];

        $image = $this->request->getFile('image');
        if ($image && $image->isValid()) {
            $path = upload_file($image, 'tourism/');
            if ($path) {
                if (!empty($spot['image_url'])) delete_file($spot['image_url']);
                $data['image_url'] = $path;
            }
        }

        $this->model->update($id, $data);
        return redirect()->to(site_url('admin/wisata'))->with('success', 'Wisata berhasil diperbarui');
    }

    public function delete(string $id)
    {
        $spot = $this->model->find($id);
        if ($spot && !empty($spot['image_url'])) delete_file($spot['image_url']);
        $this->model->delete($id);
        return redirect()->to(site_url('admin/wisata'))->with('success', 'Wisata berhasil dihapus');
    }
}
