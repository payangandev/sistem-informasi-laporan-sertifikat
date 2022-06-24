<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Perusahaan extends Migration
{

    public function up()
    {
        $this->forge->addField([
            'perusahaan_id'  => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'auto_increment' => true,
            ],
            'nama_perusahaan' => [
                'type'        => 'VARCHAR',
                'constraint'  => 50,
            ]
        ]);
        $this->forge->addKey('perusahaan_id', true);
        $this->forge->createTable('perusahaan');
    }

    public function down()
    {
        $this->forge->dropTable('perusahaan');
    }
}
