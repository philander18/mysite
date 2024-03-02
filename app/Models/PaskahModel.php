<?php

namespace App\Models;

use CodeIgniter\Model;

class PaskahModel extends Model
{
    protected $table = 'jemaat';
    protected $allowedFields = ['nama', 'hp', 'anggota', 'transportasi', 'dewasa', 'anak', 'bayar', 'pic', 'status', 'updated_at'];

    public function searchhp($keyword, $jumlahlist, $index)
    {
        $where = "hp like '%" . $keyword . "%'";
        $all = $this->db->table('jemaat')->select('hp, dewasa, anak, bayar')->where($where)->get()->getResultArray();
        $jumlahdata = count($all);
        $lastpage = ceil($jumlahdata / $jumlahlist);
        $tabel = array_splice($all, $index);
        array_splice($tabel, $jumlahlist);
        $data['lastpage'] = $lastpage;
        $data['tabel'] = $tabel;
        return $data;
    }
}
