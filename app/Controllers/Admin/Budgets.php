<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BudgetModel;

class Budgets extends BaseController
{
    protected BudgetModel $model;

    public function __construct() { $this->model = new BudgetModel(); }

    public function index()
    {
        $data['budgets'] = $this->model->orderBy('year','DESC')->orderBy('type','ASC')->orderBy('amount','DESC')->findAll();
        return view('admin/budgets', $data);
    }

    public function create()
    {
        return view('admin/budgets_form', ['budget' => null]);
    }

    public function store()
    {
        $this->model->insert([
            'id' => generate_id('bgt-'),
            'year' => (int)$this->request->getPost('year'),
            'category' => sanitize_input($this->request->getPost('category')),
            'amount' => (float)str_replace(['Rp',' ','.',','], '', $this->request->getPost('amount')),
            'type' => sanitize_input($this->request->getPost('type')),
            'description' => sanitize_input($this->request->getPost('description')) ?: null,
        ]);
        return redirect()->to('/admin/anggaran')->with('success', 'Anggaran berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $data['budget'] = $this->model->find($id);
        if (!$data['budget']) return redirect()->to('/admin/anggaran')->with('error', 'Data tidak ditemukan');
        return view('admin/budgets_form', $data);
    }

    public function update(string $id)
    {
        $this->model->update($id, [
            'year' => (int)$this->request->getPost('year'),
            'category' => sanitize_input($this->request->getPost('category')),
            'amount' => (float)str_replace(['Rp',' ','.',','], '', $this->request->getPost('amount')),
            'type' => sanitize_input($this->request->getPost('type')),
            'description' => sanitize_input($this->request->getPost('description')) ?: null,
        ]);
        return redirect()->to('/admin/anggaran')->with('success', 'Anggaran berhasil diperbarui');
    }

    public function delete(string $id)
    {
        $this->model->delete($id);
        return redirect()->to('/admin/anggaran')->with('success', 'Anggaran berhasil dihapus');
    }
}
