<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSurveiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'kode_survei' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'nama_survei' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'kegiatan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'tanggal_mulai' => ['type' => 'DATE'],
            'tanggal_selesai' => ['type' => 'DATE'],
            'satuan' => [
                'type' => 'ENUM',
                'constraint' => ['DOK','O-B','BS','RUTA','EA', 'SGMN']
            ],
            'harga_satuan' => [
                'type' => 'INT',
                'constraint' => 12
            ],
            'kode_beban_anggaran' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('survei');
    }

    public function down()
    {
        //
    }
}
