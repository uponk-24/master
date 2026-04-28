<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OfficialModel;

class Officials extends BaseController
{
    protected OfficialModel $model;

    public function __construct() { $this->model = new OfficialModel(); }

    public function index()
    {
        $data['officials'] = $this->model->getAllOrdered();
        return view('admin/officials', $data);
    }

    public function create()
    {
        return view('admin/officials_form', ['official' => null]);
    }

    public function store()
    {
        $data = [
            'id' => generate_id('off-'),
            'name' => sanitize_input($this->request->getPost('name')),
            'position' => sanitize_input($this->request->getPost('position')),
            'nip' => sanitize_input($this->request->getPost('nip')) ?: null,
            'order_num' => (int)$this->request->getPost('order_num'),
            'photo_url' => '',
        ];

        $photo = $this->request->getFile('photo');
        if ($photo && $photo->isValid()) {
            $path = upload_file($photo, 'officials/');
            if ($path) $data['photo_url'] = $path;
        }

        $this->model->insert($data);
        return redirect()->to(site_url('admin/perangkat'))->with('success', 'Perangkat desa berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $data['official'] = $this->model->find($id);
        if (!$data['official']) return redirect()->to(site_url('admin/perangkat'))->with('error', 'Data tidak ditemukan');
        return view('admin/officials_form', $data);
    }

    public function update(string $id)
    {
        $official = $this->model->find($id);
        if (!$official) return redirect()->to(site_url('admin/perangkat'))->with('error', 'Data tidak ditemukan');

        $data = [
            'name' => sanitize_input($this->request->getPost('name')),
            'position' => sanitize_input($this->request->getPost('position')),
            'nip' => sanitize_input($this->request->getPost('nip')) ?: null,
            'order_num' => (int)$this->request->getPost('order_num'),
        ];

        $photo = $this->request->getFile('photo');
        if ($photo && $photo->isValid()) {
            $path = upload_file($photo, 'officials/');
            if ($path) {
                if (!empty($official['photo_url'])) delete_file($official['photo_url']);
                $data['photo_url'] = $path;
            }
        }

        $this->model->update($id, $data);
        return redirect()->to(site_url('admin/perangkat'))->with('success', 'Perangkat desa berhasil diperbarui');
    }

    public function delete(string $id)
    {
        $official = $this->model->find($id);
        if ($official && !empty($official['photo_url'])) delete_file($official['photo_url']);
        $this->model->delete($id);
        return redirect()->to(site_url('admin/perangkat'))->with('success', 'Perangkat desa berhasil dihapus');
    }
}
