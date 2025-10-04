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

    public function create()
    {
        return view('admin/anggota/create');
    }

    public function store()
    {
        $anggotaModel = new AnggotaModel();

        $gelar_depan = $this->request->getPost('gelar_depan');
        $gelar_belakang = $this->request->getPost('gelar_belakang');

        $data = [
            'id_anggota'        => $this->request->getPost('id_anggota'),
            'nama_depan'        => $this->request->getPost('nama_depan'),
            'nama_belakang'     => $this->request->getPost('nama_belakang'),
            'gelar_depan'       => ($gelar_depan === '') ? null : $gelar_depan,
            'gelar_belakang'    => ($gelar_belakang === '') ? null : $gelar_belakang,
            'jabatan'           => $this->request->getPost('jabatan'),
            'status_pernikahan' => $this->request->getPost('status_pernikahan'),
        ];

        $anggotaModel->insert($data);

        session()->setFlashdata('success', 'Data anggota berhasil ditambahkan.');

        return redirect()->to('/admin/anggota');
    }

    public function edit($id)
    {
        $anggotaModel = new AnggotaModel();
        $data['anggota'] = $anggotaModel->find($id);

        if (empty($data['anggota'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data anggota tidak ditemukan.');
        }
        
        return view('admin/anggota/edit', $data);
    }

    public function update($id)
    {
        $anggotaModel = new AnggotaModel();

        $originalData = $anggotaModel->find($id);

        $gelar_depan = $this->request->getPost('gelar_depan');
        $gelar_belakang = $this->request->getPost('gelar_belakang');

        $data = [
            'nama_depan'        => $this->request->getPost('nama_depan'),
            'nama_belakang'     => $this->request->getPost('nama_belakang'),
            'gelar_depan'       => ($gelar_depan === '') ? null : $gelar_depan,
            'gelar_belakang'    => ($gelar_belakang === '') ? null : $gelar_belakang,
            'jabatan'           => $this->request->getPost('jabatan'),
            'status_pernikahan' => $this->request->getPost('status_pernikahan'),
        ];

        $isChanged = false;
        foreach ($data as $key => $value) {
            if ($originalData[$key] != $value) {
                $isChanged = true;
                break;
            }
        }

        if ($isChanged) {
            $anggotaModel->update($id, $data);
            session()->setFlashdata('success', 'Data anggota berhasil diubah.');
        } else {
            session()->setFlashdata('info', 'Tidak ada perubahan data yang dilakukan.');
        }

        return redirect()->to('/admin/anggota');
    }

    public function public()
    {
        $anggotaModel = new AnggotaModel();

        $data['anggota'] = $anggotaModel->findAll();

        return view('public/anggota/index', $data);
    }
}