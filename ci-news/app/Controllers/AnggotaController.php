<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;

class AnggotaController extends BaseController
{
    public function admin()
    {
        $anggotaModel = new AnggotaModel();

        $data['anggota'] = $anggotaModel->findAll();

        return view('admin/anggota/index', $data);
    }

    public function public()
    {
        $anggotaModel = new AnggotaModel();

        $data['anggota'] = $anggotaModel->findAll();

        return view('public/anggota/index', $data);
    }
}