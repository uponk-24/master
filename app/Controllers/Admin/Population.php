<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PopulationModel;

class Population extends BaseController
{
    protected PopulationModel $model;

    public function __construct() { $this->model = new PopulationModel(); }

    public function index()
    {
        $allStats = $this->model->orderBy('year', 'DESC')->orderBy('category', 'ASC')->findAll();

        // Get unique years
        $years = array_unique(array_column($allStats, 'year'));
        rsort($years);

        // Filter by year if requested
        $selectedYear = $this->request->getGet('year');
        if ($selectedYear) {
            $population = array_filter($allStats, fn($row) => $row['year'] == $selectedYear);
            $population = array_values($population);
        } else {
            $population = $allStats;
        }

        $data = [
            'population'   => $population,
            'years'        => $years,
            'selectedYear' => $selectedYear,
        ];

        return view('admin/population', $data);
    }

    public function create()
    {
        return view('admin/population_form', ['population' => null]);
    }

    public function store()
    {
        $data = [
            'id'           => generate_id('pop-'),
            'category'     => sanitize_input($this->request->getPost('category')),
            'male_count'   => (int)$this->request->getPost('male_count'),
            'female_count' => (int)$this->request->getPost('female_count'),
            'year'         => (int)$this->request->getPost('year'),
        ];

        $this->model->insert($data);
        return redirect()->to(site_url('admin/kependudukan'))->with('success', 'Data kependudukan berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $data['population'] = $this->model->find($id);
        if (!$data['population']) return redirect()->to(site_url('admin/kependudukan'))->with('error', 'Data tidak ditemukan');
        return view('admin/population_form', $data);
    }

    public function update(string $id)
    {
        $stat = $this->model->find($id);
        if (!$stat) return redirect()->to(site_url('admin/kependudukan'))->with('error', 'Data tidak ditemukan');

        $data = [
            'category'     => sanitize_input($this->request->getPost('category')),
            'male_count'   => (int)$this->request->getPost('male_count'),
            'female_count' => (int)$this->request->getPost('female_count'),
            'year'         => (int)$this->request->getPost('year'),
        ];

        $this->model->update($id, $data);
        return redirect()->to(site_url('admin/kependudukan'))->with('success', 'Data kependudukan berhasil diperbarui');
    }

    public function delete(string $id)
    {
        $this->model->delete($id);
        return redirect()->to(site_url('admin/kependudukan'))->with('success', 'Data kependudukan berhasil dihapus');
    }
}
