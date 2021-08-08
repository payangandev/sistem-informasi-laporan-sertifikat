<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataMultimedia extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'multimedia_id'		=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'tanggal_masuk'			=> [
				'type'				=> 'DATE',
			],

			'kode_inventaris'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],

			'nama_item'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],

			'merk'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],

			'satuan'				=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'UNIT','BOX'",
				'default'			=> 'UNIT'
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


		$this->forge->addKey('multimedia_id', true);
		$this->forge->addForeignKey('karyawan_id', 'karyawan', 'karyawan_id', 'cascade', 'cascade');
		$this->forge->createTable('multimedia', true);
	}

	public function down()
	{
		$this->forge->dropTable('multimedia', true);
	}
}
