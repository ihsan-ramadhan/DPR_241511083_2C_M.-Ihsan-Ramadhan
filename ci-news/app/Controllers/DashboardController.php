<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;
use App\Models\PenggajianModel;
use App\Models\KomponenGajiModel;

class DashboardController extends BaseController
{
    public function admin()
    {
        $anggotaModel = new AnggotaModel();
        $penggajianModel = new PenggajianModel();
        $komponenGajiModel = new KomponenGajiModel();
        
        $data['anggota'] = $anggotaModel->findAll(); 
        $data['penggajian'] = $penggajianModel->getPenggajianWithTakeHomePay();
        $data['komponen_gaji'] = $komponenGajiModel->findAll();

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