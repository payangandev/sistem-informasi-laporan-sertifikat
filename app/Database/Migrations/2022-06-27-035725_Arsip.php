<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Arsip extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'arsip_id'     => [
                'type'               => 'INT',
                'constraint'         => 11,
                'unsigned'           => true,
                'auto_increment'     => true,
            ],
            'client_id'               => [
                'type'                => 'INT',
                'constraint'          => 11,
                'unsigned'            => TRUE,
                'null'                => TRUE
            ],
            'nama_kayawan'           => [
                'type'                => 'VARCHAR',
                'constraint'          => 50,
            ],
            'type_sertifikat'         => [
                'type'                => 'ENUM',
                'constraint'          => "'ISO','SKT', 'SKA', 'K3'",
            ],
            'status'                  => [
                'type'                => 'ENUM',
                'constraint'          => "'proses','pending', 'selesai'",
            ],
            'description'             => [
                'type'                => 'VARCHAR',
                'constraint'          => 50,
            ]
        ]);

        $this->forge->addKey('arsip_id', true);
        $this->forge->addForeignKey('client_id', 'client', 'client_id', 'cascade', 'cascade');
        $this->forge->createTable('arsip', true);
    }

    public function down()
    {
        $this->forge->dropTable('arsip', true);
    }
}
