<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }
    public function test(): string
    {
        $data = [
            'judul' => 'Paskah'
        ];
        return view('auth/login', $data);
    }
}
