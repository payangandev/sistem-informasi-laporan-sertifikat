<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Skt extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'skt_id'     			=> [
				'type'      		=> 'INT',
				'constraint'	 	=> 11,
				'unsigned'   		=> true,
				'auto_increment' 	=> true,
			],
			'nama'       			=> [
				'type'       		=> 'VARCHAR',
				'constraint' 		=> 50,
			],
			'kode'           		=> [
				'type'       		=> 'VARCHAR',
				'constraint' 		=> 50,
			],
			'tanggal_terbit'		=> [
				'type'				=> 'date',
			]
		]);

		$this->forge->addKey('skt_id', true);
		$this->forge->addForeignKey('karyawan_id', 'karyawan', 'karyawan_id', 'cascade', 'cascade');
		$this->forge->createTable('skt', true);
	}

	public function down()
	{
		$this->forge->dropTable('skt', true);
	}
}
