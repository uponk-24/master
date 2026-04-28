<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ServiceModel;

class Services extends BaseController
{
    protected ServiceModel $model;

    public function __construct() { $this->model = new ServiceModel(); }

    public function index()
    {
        $data['services'] = $this->model->orderBy('order_num','ASC')->findAll();
        return view('admin/services', $data);
    }

    public function create()
    {
        return view('admin/services_form', ['service' => null]);
    }

    public function store()
    {
        $this->model->insert([
            'id' => generate_id('svc-'),
            'name' => sanitize_input($this->request->getPost('name')),
            'description' => $this->request->getPost('description'),
            'icon' => sanitize_input($this->request->getPost('icon')) ?: 'FileText',
            'requirements' => $this->request->getPost('requirements') ?: null,
            'procedure' => $this->request->getPost('procedure') ?: null,
            'order_num' => (int)$this->request->getPost('order_num'),
            'is_active' => $this->request->getPost('is_active') ? 1 : 0,
        ]);
        return redirect()->to(site_url('admin/layanan'))->with('success', 'Layanan berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $data['service'] = $this->model->find($id);
        if (!$data['service']) return redirect()->to(site_url('admin/layanan'))->with('error', 'Data tidak ditemukan');
        return view('admin/services_form', $data);
    }

    public function update(string $id)
    {
        $this->model->update($id, [
            'name' => sanitize_input($this->request->getPost('name')),
            'description' => $this->request->getPost('description'),
            'icon' => sanitize_input($this->request->getPost('icon')) ?: 'FileText',
            'requirements' => $this->request->getPost('requirements') ?: null,
            'procedure' => $this->request->getPost('procedure') ?: null,
            'order_num' => (int)$this->request->getPost('order_num'),
            'is_active' => $this->request->getPost('is_active') ? 1 : 0,
        ]);
        return redirect()->to(site_url('admin/layanan'))->with('success', 'Layanan berhasil diperbarui');
    }

    public function delete(string $id)
    {
        $this->model->delete($id);
        return redirect()->to(site_url('admin/layanan'))->with('success', 'Layanan berhasil dihapus');
    }
}
