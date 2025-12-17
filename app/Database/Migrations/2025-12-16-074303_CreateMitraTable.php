<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMitraTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'sobat_id' => ['type' => 'VARCHAR', 'constraint' => 30],
            'nama_lengkap' => ['type' => 'VARCHAR', 'constraint' => 150],
            'posisi' => ['type' => 'VARCHAR', 'constraint' => 100],
            'alamat' => ['type' => 'TEXT'],
            'jk' => ['type' => 'VARCHAR', 'constraint' => 5],
            'pendidikan' => ['type' => 'VARCHAR', 'constraint' => 50],
            'pekerjaan' => ['type' => 'VARCHAR', 'constraint' => 50],
            'no_telp' => ['type' => 'VARCHAR', 'constraint' => 25],
            'email' => ['type' => 'VARCHAR', 'constraint' => 100],
            'nik' => ['type' => 'VARCHAR', 'constraint' => 20],
            'nama_bank' => ['type' => 'VARCHAR', 'constraint' => 50],
            'nomor_rekening' => ['type' => 'VARCHAR', 'constraint' => 50],
            'rekening_nama' => ['type' => 'VARCHAR', 'constraint' => 150],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('mitra');
    }

    public function down()
    {
        //
    }
}
