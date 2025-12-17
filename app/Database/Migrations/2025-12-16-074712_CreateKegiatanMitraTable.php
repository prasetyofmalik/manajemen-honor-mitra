<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKegiatanMitraTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'mitra_id' => ['type' => 'INT'],
            'survei_id' => ['type' => 'INT'],
            'kegiatan' => ['type' => 'VARCHAR', 'constraint' => 100],
            'bulan_kegiatan' => ['type' => 'CHAR', 'constraint' => 7],
            'bulan_pembayaran_honor' => ['type' => 'CHAR', 'constraint' => 7],
            'bulan_pembayaran_pulsa' => ['type' => 'CHAR', 'constraint' => 7],
            'honor' => ['type' => 'INT',],
            'pulsa' => ['type' => 'INT', 'default' => 0],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('mitra_id', 'mitra', 'id');
        $this->forge->addForeignKey('survei_id', 'survei', 'id');
        $this->forge->createTable('kegiatan_mitra');
    }

    public function down()
    {
        //
    }
}
