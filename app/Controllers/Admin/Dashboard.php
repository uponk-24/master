<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\NewsModel;
use App\Models\GalleryModel;
use App\Models\ContactMessageModel;
use App\Models\OfficialModel;
use App\Models\TourismSpotModel;
use App\Models\ServiceModel;
use App\Models\BudgetModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'newsCount'      => (new NewsModel())->countAll(),
            'galleryCount'   => (new GalleryModel())->countAll(),
            'unreadMessages' => (new ContactMessageModel())->countUnread(),
            'officialCount'  => (new OfficialModel())->countAll(),
            'tourismCount'   => (new TourismSpotModel())->countAll(),
            'serviceCount'   => (new ServiceModel())->where('is_active', 1)->countAllResults(),
            'budgetTotal'    => (new BudgetModel())->selectSum('amount')->where('type', 'PENDAPATAN')->where('year', date('Y'))->first()['amount'] ?? 0,
            'recentMessages' => (new ContactMessageModel())->where('is_read', 0)->orderBy('created_at','DESC')->limit(5)->findAll(),
        ];
        return view('admin/dashboard', $data);
    }
}
