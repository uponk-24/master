<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\InfrastructureModel;

class Infrastructures extends BaseController
{
    protected InfrastructureModel $model;

    public function __construct() { $this->model = new InfrastructureModel(); }

    public function index()
    {
        $data['infrastructures'] = $this->model->orderBy('category', 'ASC')->orderBy('name', 'ASC')->findAll();
        return view('admin/infrastructures', $data);
    }

    public function create()
    {
        return view('admin/infrastructures_form', ['infrastructure' => null]);
    }

    public function store()
    {
        $data = [
            'id'        => generate_id('infra-'),
            'name'      => sanitize_input($this->request->getPost('name')),
            'category'  => sanitize_input($this->request->getPost('category')),
            'quantity'  => (int)$this->request->getPost('quantity'),
            'unit'      => sanitize_input($this->request->getPost('unit')),
            'condition' => sanitize_input($this->request->getPost('condition')),
        ];

        $this->model->insert($data);
        return redirect()->to('/admin/infrastruktur')->with('success', 'Data infrastruktur berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $data['infrastructure'] = $this->model->find($id);
        if (!$data['infrastructure']) return redirect()->to('/admin/infrastruktur')->with('error', 'Data tidak ditemukan');
        return view('admin/infrastructures_form', $data);
    }

    public function update(string $id)
    {
        $infrastructure = $this->model->find($id);
        if (!$infrastructure) return redirect()->to('/admin/infrastruktur')->with('error', 'Data tidak ditemukan');

        $data = [
            'name'      => sanitize_input($this->request->getPost('name')),
            'category'  => sanitize_input($this->request->getPost('category')),
            'quantity'  => (int)$this->request->getPost('quantity'),
            'unit'      => sanitize_input($this->request->getPost('unit')),
            'condition' => sanitize_input($this->request->getPost('condition')),
        ];

        $this->model->update($id, $data);
        return redirect()->to('/admin/infrastruktur')->with('success', 'Data infrastruktur berhasil diperbarui');
    }

    public function delete(string $id)
    {
        $this->model->delete($id);
        return redirect()->to('/admin/infrastruktur')->with('success', 'Data infrastruktur berhasil dihapus');
    }
}
