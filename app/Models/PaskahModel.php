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
    public function searchpanitia($keyword, $jumlahlist, $index)
    {
        $where = "hp like '%" . $keyword . "%' or nama like '%" . $keyword . "%'";
        $all = $this->db->table('jemaat')->select('id, nama, hp, bayar')->where($where)->get()->getResultArray();
        $jumlahdata = count($all);
        $lastpage = ceil($jumlahdata / $jumlahlist);
        $tabel = array_splice($all, $index);
        array_splice($tabel, $jumlahlist);
        $data['lastpage'] = $lastpage;
        $data['tabel'] = $tabel;
        return $data;
    }
    function getDatabyid($id)
    {
        $query = $this->db->table('jemaat')->where('id', $id)->get();
        return $query->getResult();
    }

    function updatejemaat($data, $id)
    {
        return $this->db->table('jemaat')->where('id', $id)->update($data);
    }
}
