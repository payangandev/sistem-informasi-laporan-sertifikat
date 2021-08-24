<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataAtk extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'atk_id'		=> [
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
				'constraint'		=> "'PC','UNIT','BOX'",
				'default'			=> 'UNIT'
			],

			'harga'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],

			'jumlah'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
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


		$this->forge->addKey('atk_id', true);
		$this->forge->addForeignKey('karyawan_id', 'karyawan', 'karyawan_id', 'cascade', 'cascade');
		$this->forge->createTable('atk', true);
	}

	public function down()
	{
		$this->forge->dropTable('atk', true);
	}
}
