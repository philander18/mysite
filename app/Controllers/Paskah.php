<?php

namespace App\Controllers;

use App\Models\PaskahModel;
use DateTime;

class Paskah extends BaseController
{
    protected $PaskahModel;
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
}
