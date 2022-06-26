<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ska extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'ska_id'     => [
				'type'      		=> 'INT',
				'constraint' 		=> 11,
				'unsigned'   		=> true,
				'auto_increment' 	=> true,
			],
			'nama'       			=> [
				'type'       		=> 'VARCHAR',
				'constraint' 		=> 50,
			],
			'tanggal_terbit'		=> [
				'type'				=> 'date',
			]

		]);

		$this->forge->addKey('ska_id', true);
		$this->forge->createTable('ska', true);
	}

	public function down()
	{
		$this->forge->dropTable('ska', true);
	}
}
