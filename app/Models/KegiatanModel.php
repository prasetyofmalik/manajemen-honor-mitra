<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanModel extends Model
{
    protected $table            = 'kegiatan';
    protected $primaryKey       = 'id';

    protected $allowedFields    = [
        'survei_id',
        'nama_kegiatan',
        'tanggal_mulai',
        'tanggal_selesai',
        'satuan',
        'harga_satuan',
        'kode_beban_anggaran',
    ];
}
