<?php

namespace App\Models;

use CodeIgniter\Model;

class PaskahModel extends Model
{
    protected $table = 'jemaat';
    protected $allowedFields = ['nama', 'hp', 'anggota', 'transportasi', 'dewasa', 'anak', 'bayar', 'pic', 'status', 'updated_at'];
    // Melakukan update data pada tabel Lisensi sesuai kode perangkat
}
