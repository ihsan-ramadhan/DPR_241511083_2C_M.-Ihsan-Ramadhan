<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;

class DashboardController extends BaseController
{
    public function admin()
    {
        $anggotaModel = new AnggotaModel();

        $data['anggota'] = $anggotaModel->findAll();

        return view('admin/dashboard', $data);
    }

    public function public()
    {
        $anggotaModel = new AnggotaModel();

        $data['anggota'] = $anggotaModel->findAll();

        return view('public/dashboard', $data);
    }
}