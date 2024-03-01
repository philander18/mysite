<?php

namespace App\Controllers;

class Paskah extends BaseController
{
    public function index(): string
    {
        $data = [
            'judul' => 'Paskah'
        ];
        return view('paskah/index', $data);
    }
    public function pendaftaran(): string
    {
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
