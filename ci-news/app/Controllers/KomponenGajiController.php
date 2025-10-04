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

    public function create()
    {
        return view('admin/komponen_gaji/create');
    }

    public function store()
    {
        $komponenGajiModel = new KomponenGajiModel();

        $data = [
            'id_komponen_gaji'  => $this->request->getPost('id_komponen_gaji'),
            'nama_komponen'     => $this->request->getPost('nama_komponen'),
            'kategori'          => $this->request->getPost('kategori'),
            'jabatan'           => $this->request->getPost('jabatan'),
            'nominal'           => $this->request->getPost('nominal'),
            'satuan'            => $this->request->getPost('satuan'),
        ];

        $komponenGajiModel->insert($data);

        session()->setFlashdata('success', 'Komponen gaji berhasil ditambahkan.');

        return redirect()->to('/admin/komponen-gaji');
    }
}