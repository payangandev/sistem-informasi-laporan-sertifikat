<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataAsset extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'asset_id'		=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'nama_kendaraan'		=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '100'
			],
			'tanggal_masuk'			=> [
				'type'				=> 'DATE',
			],
			'unit'				    => [
				'type'				=> 'VARCHAR',
				'constraint'		=> '100'
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

			'kondisi'				=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'BARU','BEKAS'",
			],
			'keterangan'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '250'
			],


			'karyawan_id'			=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			]
		]);


		$this->forge->addKey('asset_id', true);
		$this->forge->addForeignKey('karyawan_id', 'karyawan', 'karyawan_id', 'cascade', 'cascade');
		$this->forge->createTable('asset', true);
	}

	public function down()
	{
		$this->forge->dropTable('asset', true);
	}
}
