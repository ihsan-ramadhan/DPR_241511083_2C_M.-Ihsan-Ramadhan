<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenggajianModel;

class PenggajianController extends BaseController
{
    public function admin()
    {
        $penggajianModel = new PenggajianModel();
        $data['penggajian'] = $penggajianModel->getPenggajianWithTakeHomePay();
        return view('admin/penggajian/index', $data);
    }

    public function public()
    {
        $penggajianModel = new PenggajianModel();
        $data['penggajian'] = $penggajianModel->getPenggajianWithTakeHomePay();
        return view('public/penggajian/index', $data);
    }
}