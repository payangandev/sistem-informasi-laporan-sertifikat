<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Client extends Migration
{

    public function up()
    {
        $this->forge->addField([
            'client_id'  => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'        => 'VARCHAR',
                'constraint'  => 50,
            ],
            'email' => [
                'type'        => 'VARCHAR',
                'constraint'  => 50,
            ],
            'alamat' => [
                'type'        => 'VARCHAR',
                'constraint'  => 50,
            ],
            'telephone' => [
                'type'        => 'VARCHAR',
                'constraint'  => 50,
            ]
        ]);
        $this->forge->addKey('client_id', true);
        $this->forge->createTable('client');
    }

    public function down()
    {
        $this->forge->dropTable('client');
    }
}
