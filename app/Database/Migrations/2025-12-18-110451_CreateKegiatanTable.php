<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKegiatanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'survei_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'nama_kegiatan' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'tanggal_mulai' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'tanggal_selesai' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'satuan' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
            'harga_satuan' => [
                'type'       => 'INT',
                'constraint' => 15,
                'null'       => false,
            ],
            'kode_beban_anggaran' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('survei_id');

        $this->forge->addForeignKey(
            'survei_id',
            'survei',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('kegiatan', true);
    }

    public function down()
    {
        $this->forge->dropTable('kegiatan', true);
    }
}
