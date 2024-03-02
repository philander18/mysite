<?php

namespace App\Controllers;

use App\Models\PaskahModel;
use DateTime;

class Paskah extends BaseController
{
    protected $PaskahModel;
    protected $jumlahlist = 8;
    public function __construct()
    {
        $this->PaskahModel = new PaskahModel();
    }
    public function index(): string
    {
        $data = [
            'judul' => 'Paskah'
        ];
        return view('paskah/index', $data);
    }
    public function pendaftaran(): string
    {
        if (!is_null($this->request->getVar('hp'))) {
            $date = new DateTime();
            $date = $date->format('Y-m-d H:i:s');
            if (empty($this->request->getVar('anak'))) {
                $anak = 0;
            } else {
                $anak = $this->request->getVar('anak');
            }
            if (empty($this->request->getVar('dewasa'))) {
                $dewasa = 0;
            } else {
                $dewasa = $this->request->getVar('dewasa');
            }
            $anggota = $this->request->getVar('nama') . "\r\n" . $this->request->getVar('anggota');
            $datatambah = [
                'nama' => $this->request->getVar('nama'),
                'hp' => $this->request->getVar('hp'),
                'anggota' => $anggota,
                'transportasi' => $this->request->getVar('transportasi'),
                'dewasa' => $dewasa,
                'anak' => $anak,
                'updated_at' => $date
            ];
            if ($this->PaskahModel->insert($datatambah)) {
                session()->setFlashdata('pesan', 'Pendaftaran nama  ' . $this->request->getVar('nama') . ' Berhasil.');
            } else {
                session()->setFlashdata('pesan', 'Pendaftaran nama ' . $this->request->getVar('nama') . ' Gagal.');
            }
        }
        $data = [
            'judul' => 'Paskah'
        ];
        return view('paskah/pendaftaran', $data);
    }
    public function panitia(): string
    {
        $data = [
            'judul' => 'Paskah'
        ];
        return view('paskah/pendaftaran', $data);
    }

    public function cekData()
    {
        $page = 1;
        $data = [
            'judul' => 'Pendaftaran',
            'jemaat' => $this->PaskahModel->searchhp("", $this->jumlahlist, 0, false)['tabel'],
            'pagination' => $this->pagination($page, $this->PaskahModel->searchhp("", $this->jumlahlist, 0, false)['lastpage']),
            'last' => $this->PaskahModel->searchhp("", $this->jumlahlist, 0, false)['lastpage'],
            'page' => $page,
        ];
        return view('paskah/cekumum', $data);
    }
    public function searchData()
    {
        $page = $_POST['page'];
        $keyword = $_POST['keyword'];
        if ($page == 1) {
            $index = 0;
        } else {
            $index = ($page - 1) * $this->jumlahlist;
        }
        $jemaat = $this->PaskahModel->searchhp($keyword, $this->jumlahlist, $index)['tabel'];
        $last = $this->PaskahModel->searchhp($keyword, $this->jumlahlist, $index)['lastpage'];
        $pagination = $this->pagination($page, $last);
        $data = [
            'jemaat' => $jemaat,
            'pagination' => $pagination,
            'last' => $last,
            'page' => $page,
        ];
        echo view('paskah/tabel/cekData', $data);
    }

    public function pagination($page, $lastpage)
    {
        $pagination = [
            'first' => false,
            'previous' => false,
            'next' => false,
            'last' => false
        ];
        if ($lastpage == 1) {
            $pagination['number'] = [1];
        } elseif ($lastpage == 2) {
            $pagination['number'] = [1, 2];
        } elseif ($lastpage == 3) {
            $pagination['number'] = [1, 2, 3];
        } elseif ($lastpage == 4) {
            $pagination['number'] = [1, 2, 3, 4];
        } elseif ($lastpage == 5) {
            $pagination['number'] = [1, 2, 3, 4, 5];
        } else {
            if ($page >= 1 and $page <= 3) {
                $pagination['next'] = true;
                $pagination['last'] = true;
                $pagination['number'] = [1, 2, 3];
            } elseif ($page >= $lastpage - 2 and $page <= $lastpage) {
                $pagination['first'] = true;
                $pagination['previous'] = true;
                $pagination['number'] = [$lastpage - 2, $lastpage - 1, $lastpage];
            } else {
                $pagination['first'] = true;
                $pagination['previous'] = true;
                $pagination['next'] = true;
                $pagination['last'] = true;
                $pagination['number'] = [$page - 1, $page, $page + 1];
            }
        };
        $pagination['page'] = $page;
        return $pagination;
    }
}
