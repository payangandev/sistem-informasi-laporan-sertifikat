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

			'kode_barang'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '50'
			],


			'jenis_barang'			=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'Alat Tulis','Perekat','Kertas HVS','Ordner','Amplop','Stapler','Staples','Memo','Perekat','Glue Stick','Cutter','Box'",
			],

			'stock_awal'			=> [
				'type'				=> 'Int',
				'constraint'		=> '50'
			],

			'stock_masuk'			=> [
				'type'				=> 'INT',
				'constraint'		=> 50
			],
			'stock_keluar'			=> [
				'type'				=> 'INT',
				'constraint'		=> 50
			],
			'stock_akhir'			=> [
				'type'				=> 'INT',
				'constraint'		=> 50
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
