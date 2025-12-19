<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSurveiTable extends Migration
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
            'kode_survei' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'nama_survei' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('kode_survei');

        $this->forge->createTable('survei', true);
    }

    public function down()
    {
        $this->forge->dropTable('survei', true);
    }
}
