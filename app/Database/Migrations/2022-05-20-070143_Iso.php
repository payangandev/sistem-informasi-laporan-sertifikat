<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Iso extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'iso_id'		=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'nama'       => [
				'type'       => 'VARCHAR',
				'constraint' => 50,
			],
			'kode_iso'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '50'
			],
			'tanggal_terbit'		=> [
				'type'				=> 'date',
			]
		]);

		$this->forge->addKey('iso_id', true);
		$this->forge->createTable('iso', true);
	}

	public function down()
	{
		$this->forge->dropTable('iso', true);
	}
}
