<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Upload extends BaseController
{
    public function index()
    {
        $file = $this->request->getFile('file');
        if (!$file || !$file->isValid()) {
            return $this->response->setJSON(['error' => 'No valid file'])->setStatusCode(400);
        }

        $subdir = $this->request->getPost('subdir') ?? 'general/';
        $path = upload_file($file, $subdir);

        if ($path) return $this->response->setJSON(['url' => '/' . $path]);
        return $this->response->setJSON(['error' => 'Upload gagal'])->setStatusCode(400);
    }
}
