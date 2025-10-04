<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KomponenGajiModel;
use App\Models\PenggajianModel;

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

    public function edit($id)
    {
        $komponenGajiModel = new KomponenGajiModel();
        $data['komponen'] = $komponenGajiModel->find($id);

        if (empty($data['komponen'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Komponen gaji tidak ditemukan.');
        }
        
        return view('admin/komponen_gaji/edit', $data);
    }

    public function update($id)
    {
        $komponenGajiModel = new KomponenGajiModel();
        $originalData = $komponenGajiModel->find($id);

        $data = [
            'nama_komponen'     => $this->request->getPost('nama_komponen'),
            'kategori'          => $this->request->getPost('kategori'),
            'jabatan'           => $this->request->getPost('jabatan'),
            'nominal'           => $this->request->getPost('nominal'),
            'satuan'            => $this->request->getPost('satuan'),
        ];

        $isChanged = false;
        foreach ($data as $key => $value) {
            if ($key == 'nominal') {
                if ((float)$originalData[$key] != (float)$value) {
                    $isChanged = true;
                    break;
                }
            } elseif ($originalData[$key] != $value) {
                $isChanged = true;
                break;
            }
        }

        if ($isChanged) {
            $komponenGajiModel->update($id, $data);
            session()->setFlashdata('success', 'Komponen gaji berhasil diubah.');
        } else {
            session()->setFlashdata('info', 'Tidak ada perubahan data yang dilakukan.');
        }

        return redirect()->to('/admin/komponen-gaji');
    }

    public function delete($id)
    {
        $komponenGajiModel = new KomponenGajiModel();
        $penggajianModel = new PenggajianModel();

        $penggajianModel->where('id_komponen_gaji', $id)->delete();

        $komponenGajiModel->delete($id);

        session()->setFlashdata('success', 'Komponen gaji berhasil dihapus.');

        return redirect()->to('/admin/komponen-gaji');
    }
}