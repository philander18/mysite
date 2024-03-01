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
}
