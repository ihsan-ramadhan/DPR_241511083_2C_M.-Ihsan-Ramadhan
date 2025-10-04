<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;
use App\Models\PenggajianModel;

class DashboardController extends BaseController
{
    public function admin()
    {
        $anggotaModel = new AnggotaModel();
        $penggajianModel = new PenggajianModel();
        
        $data['anggota'] = $anggotaModel->findAll(); 
        $data['penggajian'] = $penggajianModel->getPenggajianWithTakeHomePay();

        return view('admin/dashboard', $data);
    }

    public function public()
    {
        $anggotaModel = new AnggotaModel();
        $penggajianModel = new PenggajianModel();

        $data['anggota'] = $anggotaModel->findAll();
        $data['penggajian'] = $penggajianModel->getPenggajianWithTakeHomePay();
        
        return view('public/dashboard', $data);
    }
}