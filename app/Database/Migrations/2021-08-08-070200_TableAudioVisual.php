<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableAudioVisual extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'audiovisual_id'		=> [
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
			'vol'					=>[
				'type'				=> 'VARCHAR',
				'constraint'		=> '100'
			],
			
			'harga'					=> [
				'type'				=> 'INT',
				'constraint'		=> 250
			],

			'jumlah'				=> [
				'type'				=> 'INT',
				'constraint'		=> 250
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


		$this->forge->addKey('audiovisual_id', true);
		$this->forge->addForeignKey('karyawan_id', 'karyawan', 'karyawan_id', 'cascade', 'cascade');
		$this->forge->createTable('audiovisual', true);
	}

	public function down()
	{
		$this->forge->dropTable('audiovisual', true);
	}
}
