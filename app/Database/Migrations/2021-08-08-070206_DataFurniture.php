<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataFurniture extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'furniture_id'		=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'nama'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'kode'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'harga'					=> [
				'type'				=> 'decimal',
				'constraint'		=> '10,2',
				'null'				=> FALSE,
				'default'			=> 0.00
			],

			'jumlah'				=> [
				'type'				=> 'decimal',
				'constraint'		=> '10,2',
				'null'				=> FALSE,
				'default'			=> 0.00
			],
			'tanggal_beli'			=> [
				'type'				=> 'DATE',
			],
			'kondisi'			=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'BARU','BEKAS'",
				'default'			=> 'BARU'
			],
			'keterangan'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],

			'karyawan_id'			=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			]
		]);


		$this->forge->addKey('furniture_id', true);
		$this->forge->addForeignKey('karyawan_id', 'karyawan', 'karyawan_id', 'cascade', 'cascade');
		$this->forge->createTable('furniture', true);
	}

	public function down()
	{
		$this->forge->dropTable('furniture', true);
	}
}
