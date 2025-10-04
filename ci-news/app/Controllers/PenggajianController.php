<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenggajianModel;
use App\Models\AnggotaModel;
use App\Models\KomponenGajiModel;

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

    public function detailAdmin($id_anggota)
    {
        $penggajianModel = new PenggajianModel();
        $data['detail'] = $penggajianModel->getDetailPenggajian($id_anggota);
        return view('admin/penggajian/detail', $data);
    }

    public function create()
    {
        $anggotaModel = new AnggotaModel();
        $komponenGajiModel = new KomponenGajiModel();

        $data['anggota'] = $anggotaModel->findAll();
        $data['komponen_gaji'] = $komponenGajiModel->findAll();

        return view('admin/penggajian/create', $data);
    }

    public function store()
    {
        $penggajianModel = new PenggajianModel();
        
        $id_anggota = $this->request->getPost('id_anggota');

        $newKomponenIds = $this->request->getPost('id_komponen_gaji') ?? [];

        $originalKomponen = $penggajianModel->where('id_anggota', $id_anggota)->findAll();
        $originalKomponenIds = array_column($originalKomponen, 'id_komponen_gaji');

        sort($newKomponenIds);
        sort($originalKomponenIds);

        if ($newKomponenIds === $originalKomponenIds) {
            session()->setFlashdata('info', 'Tidak ada perubahan data yang dilakukan.');
        } else {
            $penggajianModel->where('id_anggota', $id_anggota)->delete();

            $dataToInsert = [];
            if (!empty($newKomponenIds)) {
                foreach ($newKomponenIds as $id_komponen) {
                    $dataToInsert[] = [
                        'id_anggota' => $id_anggota,
                        'id_komponen_gaji' => $id_komponen
                    ];
                }
                $penggajianModel->insertBatch($dataToInsert);
            }
            
            session()->setFlashdata('success', 'Data penggajian untuk anggota berhasil diatur.');
        }

        return redirect()->to('/admin/penggajian');
    }

    public function getKomponenByAnggota($id_anggota)
    {
        $anggotaModel = new AnggotaModel();
        $komponenGajiModel = new KomponenGajiModel();
        $penggajianModel = new PenggajianModel();

        $anggota = $anggotaModel->find($id_anggota);
        if (!$anggota) {
            return $this->response->setJSON(['error' => 'Anggota tidak ditemukan'])->setStatusCode(404);
        }
        $jabatan = $anggota['jabatan'];

        $komponen = $komponenGajiModel
            ->where('jabatan', $jabatan)
            ->orWhere('jabatan', 'Semua')
            ->findAll();

        $existingKomponen = $penggajianModel->where('id_anggota', $id_anggota)->findAll();
        $existingIds = array_column($existingKomponen, 'id_komponen_gaji');

        return $this->response->setJSON([
            'komponen' => $komponen,
            'existing' => $existingIds
        ]);
    }

    public function edit($id_anggota)
    {
        $anggotaModel = new AnggotaModel();
        $komponenGajiModel = new KomponenGajiModel();
        $penggajianModel = new PenggajianModel();

        $data['anggota'] = $anggotaModel->find($id_anggota);
        if (empty($data['anggota'])) {
            return $this->response->setJSON(['error' => 'Anggota tidak ditemukan'])->setStatusCode(404);
        }
        $jabatan = $data['anggota']['jabatan'];
        
        $data['komponen_gaji'] = $komponenGajiModel
            ->where('jabatan', $jabatan)
            ->orWhere('jabatan', 'Semua')
            ->findAll();
        
        $existingKomponen = $penggajianModel->where('id_anggota', $id_anggota)->findAll();
        $data['existing_ids'] = array_column($existingKomponen, 'id_komponen_gaji');

        return view('admin/penggajian/edit', $data);
    }

    public function delete($id_anggota)
    {
        $penggajianModel = new PenggajianModel();

        $penggajianModel->where('id_anggota', $id_anggota)->delete();

        session()->setFlashdata('success', 'Data penggajian untuk anggota berhasil dihapus.');

        return redirect()->to('/admin/penggajian');
    }
}