<?php

namespace App\Controllers;

use App\Models\VillageProfileModel;
use App\Models\OfficialModel;
use App\Models\BudgetModel;
use App\Models\ServiceModel;
use App\Models\TourismSpotModel;
use App\Models\NewsModel;
use App\Models\PopulationModel;
use App\Models\InfrastructureModel;
use App\Models\GalleryModel;
use App\Models\ContactMessageModel;

class Home extends BaseController
{
    public function index()
    {
        $villageModel    = new VillageProfileModel();
        $officialModel   = new OfficialModel();
        $budgetModel     = new BudgetModel();
        $serviceModel    = new ServiceModel();
        $tourismModel    = new TourismSpotModel();
        $newsModel       = new NewsModel();
        $populationModel = new PopulationModel();
        $infraModel      = new InfrastructureModel();
        $galleryModel    = new GalleryModel();

        $data = [
            'village'       => $villageModel->getProfile(),
            'officials'     => $officialModel->getAllOrdered(),
            'budgets'       => $budgetModel->orderBy('year','DESC')->orderBy('type','ASC')->orderBy('amount','DESC')->findAll(),
            'services'      => $serviceModel->getActive(),
            'tourism'       => $tourismModel->getAllOrdered(),
            'news'          => $newsModel->getPublished(6),
            'population'    => $populationModel->findAll(),
            'infrastructure'=> $infraModel->findAll(),
            'gallery'       => $galleryModel->getAllOrdered(),
        ];

        return view('public/home', $data);
    }

    public function beritaDetail(string $id)
    {
        $newsModel = new NewsModel();
        $article = $newsModel->findById($id);
        if (!$article) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $data = [
            'village' => (new VillageProfileModel())->getProfile(),
            'article' => $article,
            'recent'  => $newsModel->getPublished(5),
        ];
        return view('public/berita_detail', $data);
    }

    public function kirimPesan()
    {
        $rules = ['name'=>'required|min_length[2]', 'email'=>'required|valid_email', 'message'=>'required|min_length[5]'];
        if (!$this->validate($rules)) {
            return redirect()->to('/#kontak')->withInput()->with('error', 'Mohon lengkapi form dengan benar');
        }

        (new ContactMessageModel())->insert([
            'id'      => generate_id('msg-'),
            'name'    => sanitize_input($this->request->getPost('name')),
            'email'   => sanitize_input($this->request->getPost('email')),
            'message' => sanitize_input($this->request->getPost('message')),
            'is_read' => 0,
        ]);

        return redirect()->to('/#kontak')->with('success', 'Pesan berhasil dikirim! Terima kasih.');
    }
}
