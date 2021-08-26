<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableElektronik extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'elektronik_id'			=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'tanggal_masuk'			=> [
				'type'				=> 'DATE',
			],

			'kode_inventaris'		=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '100'
			],

			'nama_item'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '100'
			],

			'merk'					=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '100'
			],

			'satuan'				=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'UNIT','BOX'",
			],
			'vol'					=> [
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
				'constraint'		=> '255'
			],
			'karyawan_id'			=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			]
		]);


		$this->forge->addKey('elektronik_id', true);
		$this->forge->addForeignKey('karyawan_id', 'karyawan', 'karyawan_id', 'cascade', 'cascade');
		$this->forge->createTable('elektronik', true);
	}

	public function down()
	{
		$this->forge->dropTable('elektronik', true);
	}
}
