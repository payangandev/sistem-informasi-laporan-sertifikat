<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Karyawan extends Migration
{
	public function up()
	{

		//list field
		$this->forge->addField([
			'karyawan_id'          	=> [
				'type'           	=> 'INT',
				'constraint'     	=> 36,
				'unsigned'       	=> TRUE,
				'auto_increment' 	=> TRUE
			],
			'nama_karyawan'      	=> [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '50',
			],
			'jabatan'				=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'Manager','Admin'",
			],
			'status'				=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'AKTIF','OFF'",
			],
			'tanggalmasuk'			=> [
				'type'				=> 'DATE',
			],

		]);
		//primary key
		$this->forge->addKey('karyawan_id', TRUE);
		$this->forge->createTable('karyawan', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('karyawan');
	}
}
