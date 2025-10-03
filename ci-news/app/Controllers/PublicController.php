<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;

class PublicController extends BaseController
{
    public function index()
    {
        $anggotaModel = new AnggotaModel();

        $data['anggota'] = $anggotaModel->findAll();

        return view('public/dashboard', $data);
    }
}