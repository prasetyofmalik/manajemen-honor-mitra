<?php

namespace App\Models;

use CodeIgniter\Model;

class MitraModel extends Model
{
    protected $table = 'mitra';
    protected $allowedFields = [
        'sobat_id',
        'nama_lengkap',
        'posisi',
        'alamat',
        'jk',
        'pendidikan',
        'pekerjaan',
        'no_telp',
        'email',
        'nik',
        'nama_bank',
        'nomor_rekening',
        'rekening_nama'
    ];
}
