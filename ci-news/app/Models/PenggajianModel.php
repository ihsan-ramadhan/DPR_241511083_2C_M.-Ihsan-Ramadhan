<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggajianModel extends Model
{
    protected $table = 'penggajian';
    public function getPenggajianWithTakeHomePay()
    {
        return $this->db->table('anggota a')
            ->select('a.id_anggota, a.gelar_depan, a.nama_depan, a.nama_belakang, a.gelar_belakang, a.jabatan, SUM(kg.nominal) as take_home_pay')
            ->join('penggajian p', 'p.id_anggota = a.id_anggota')
            ->join('komponen_gaji kg', 'kg.id_komponen_gaji = p.id_komponen_gaji')
            ->groupBy('a.id_anggota')
            ->orderBy('a.id_anggota', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function getDetailPenggajian($id_anggota)
    {
        $anggota = $this->db->table('anggota')->where('id_anggota', $id_anggota)->get()->getRowArray();

        $komponen = $this->db->table('penggajian p')
            ->select('kg.nama_komponen, kg.nominal')
            ->join('komponen_gaji kg', 'kg.id_komponen_gaji = p.id_komponen_gaji')
            ->where('p.id_anggota', $id_anggota)
            ->get()
            ->getResultArray();

        return [
            'anggota' => $anggota,
            'komponen' => $komponen
        ];
    }
}