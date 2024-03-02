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
        $all = $this->db->table('jemaat')->select('hp, dewasa, anak, bayar')->where($where)->orderBy('bayar', 'ASC')->get()->getResultArray();
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
        $all = $this->db->table('jemaat')->select('id, nama, hp, bayar')->where($where)->orderBy('nama', 'ASC')->get()->getResultArray();
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
    public function statusSummary($pic)
    {
        return $this->db->table('jemaat')->select('pic, sum(bayar) as total')->where('pic', $pic)->groupBy('pic')->orderBy('total', 'desc')->get()->getResultArray();
    }
}
