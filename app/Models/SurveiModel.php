<?php

namespace App\Models;

use CodeIgniter\Model;

class SurveiModel extends Model
{
    protected $table = 'survei';
    protected $allowedFields = [
        'kode_survei',
        'nama_survei',
        'kegiatan',
        'tanggal_mulai',
        'tanggal_selesai',
        'satuan',
        'harga_satuan',
        'kode_beban_anggaran'
    ];
}
