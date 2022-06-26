<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ktiga extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'ktiga_id'			=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'nama'					=> [
				'type'       		=> 'VARCHAR',
				'constraint' 		=> 50,
			],
			'tanggal_terbit'		=> [
				'type'				=> 'date',
			]

		]);


		$this->forge->addKey('ktiga_id', true);
		$this->forge->createTable('ktiga', true);
	}

	public function down()
	{
		$this->forge->dropTable('ktiga', true);
	}
}
