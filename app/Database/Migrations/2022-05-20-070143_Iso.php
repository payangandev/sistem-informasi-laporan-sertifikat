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
			'perusahaan_id'			=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],
			'kode_iso'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '50'
			],

			'tanggal_terbit'		=> [
				'type'				=> 'date',
			],

			'survailance_one'		=> [
				'type'				=> 'date',
			],

			'survailance_two'		=> [
				'type'				=> 'date',
			],
			'tanggal_berakhir'		=> [
				'type'				=> 'date',

			],
			'tanggal_proses'		=> [
				'type'				=> 'date',

			],
			'tanggal_selesai'		=> [
				'type'				=> 'date',

			],
			'no_resi'				=> [
				'type'				=> 'varchar',
				'constraint'		=> 50,

			],
			'marketing'				=> [
				'type'				=> 'varchar',
				'constraint'		=> 50,
			],
			'harga_jual'			=> [
				'type'				=> 'INT',
				'constraint'		=> 50
			]
		]);


		$this->forge->addKey('iso_id', true);
		$this->forge->addForeignKey('perusahaan_id', 'perusahaan', 'perusahaan_id', 'cascade', 'cascade');
		$this->forge->createTable('iso', true);
	}

	public function down()
	{
		$this->forge->dropTable('iso', true);
	}
}
