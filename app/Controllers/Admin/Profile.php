<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\VillageProfileModel;

class Profile extends BaseController
{
    public function index()
    {
        $model = new VillageProfileModel();
        $data['profile'] = $model->getProfile();
        return view('admin/profile', $data);
    }

    public function update()
    {
        $model = new VillageProfileModel();
        $profile = $model->getProfile();
        if (!$profile) return redirect()->to(site_url('admin/profil'))->with('error', 'Profil desa belum ada');

        $data = [
            'name' => sanitize_input($this->request->getPost('name')),
            'motto' => sanitize_input($this->request->getPost('motto')),
            'description' => $this->request->getPost('description'),
            'history' => $this->request->getPost('history'),
            'vision' => $this->request->getPost('vision'),
            'mission' => $this->request->getPost('mission'),
            'area_size' => sanitize_input($this->request->getPost('area_size')),
            'population' => (int)$this->request->getPost('population'),
            'family_count' => (int)$this->request->getPost('family_count'),
            'hamlets' => sanitize_input($this->request->getPost('hamlets')),
            'district' => sanitize_input($this->request->getPost('district')),
            'regency' => sanitize_input($this->request->getPost('regency')),
            'province' => sanitize_input($this->request->getPost('province')),
            'phone' => sanitize_input($this->request->getPost('phone')),
            'email' => sanitize_input($this->request->getPost('email')),
            'address' => $this->request->getPost('address'),
            'postal_code' => sanitize_input($this->request->getPost('postal_code')),
            'latitude' => sanitize_input($this->request->getPost('latitude')),
            'longitude' => sanitize_input($this->request->getPost('longitude')),
            'service_hours' => sanitize_input($this->request->getPost('service_hours')),
        ];

        $logo = $this->request->getFile('logo');
        if ($logo && $logo->isValid()) {
            $logoPath = upload_file($logo, 'village/');
            if ($logoPath) {
                if (!empty($profile['logo_url'])) delete_file($profile['logo_url']);
                $data['logo_url'] = $logoPath;
            }
        }

        $heroImage = $this->request->getFile('hero_image');
        if ($heroImage && $heroImage->isValid()) {
            $heroPath = upload_file($heroImage, 'village/');
            if ($heroPath) {
                if (!empty($profile['hero_image'])) delete_file($profile['hero_image']);
                $data['hero_image'] = $heroPath;
            }
        }

        $model->update($profile['id'], $data);
        return redirect()->to(site_url('admin/profil'))->with('success', 'Profil desa berhasil diperbarui');
    }
}
