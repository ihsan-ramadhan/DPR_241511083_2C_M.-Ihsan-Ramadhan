<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KomponenGajiModel;

class KomponenGajiController extends BaseController
{
    public function index()
    {
        $komponenGajiModel = new KomponenGajiModel();
        $data['komponen_gaji'] = $komponenGajiModel->findAll();
        
        return view('admin/komponen_gaji/index', $data);
    }
}