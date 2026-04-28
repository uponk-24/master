<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ContactMessageModel;

class Messages extends BaseController
{
    protected ContactMessageModel $model;

    public function __construct() { $this->model = new ContactMessageModel(); }

    public function index()
    {
        $data['messages'] = $this->model->orderBy('created_at','DESC')->findAll();
        return view('admin/messages', $data);
    }

    public function markRead(string $id)
    {
        $this->model->update($id, ['is_read' => 1]);
        return redirect()->to(site_url('admin/pesan'))->with('success', 'Pesan ditandai sudah dibaca');
    }

    public function delete(string $id)
    {
        $this->model->delete($id);
        return redirect()->to(site_url('admin/pesan'))->with('success', 'Pesan berhasil dihapus');
    }
}
