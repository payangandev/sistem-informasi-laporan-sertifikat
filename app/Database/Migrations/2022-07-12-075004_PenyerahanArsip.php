<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PenyerahanArsip extends Migration
{
    public function up()
	{
		$this->forge->addField([
			'penyerahan_id'     => [
				'type'      		=> 'INT',
				'constraint' 		=> 11,
				'unsigned'   		=> true,
				'auto_increment' 	=> true,
			],
            'client_id'               => [
                'type'                => 'INT',
                'constraint'          => 11,
                'unsigned'            => TRUE,
                'null'                => TRUE
            ],
			'bukti_penyerahan'      => [
				'type'       		=> 'VARCHAR',
				'constraint' 		=> 50,
			],
			'proggress'   => [
				'type'           	=> 'enum',
                'constraint'		=> "'Diterima','Diserahkan'"

            ],
            'tanggal_penyerahan'	=> [
				'type'				=> 'DATE',
			],

		]);

		$this->forge->addKey('penyerahan_id', true);
		$this->forge->addForeignKey('client_id', 'client', 'client_id', 'cascade', 'cascade');
		$this->forge->createTable('penyerahan', true);
	}

	public function down()
	{
		$this->forge->dropTable('penyerahan', true);
	}
}
