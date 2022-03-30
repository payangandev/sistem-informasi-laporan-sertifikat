<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Karyawan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'karyawan_id'          	=> [
				'type'           	=> 'INT',
				'constraint'     	=> 11,
				'unsigned'       	=> TRUE,
				'auto_increment' 	=> TRUE
			],
			'nama'      	=> [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '50',
			],
			'address'      		  	=> [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '50'
			],
            'telephone'             => [
                'type'              => 'VARCHAR',
                'constraint'        => '50'
            ],
			'jabatan'				=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'Manager','Admin','Super Admin'",
			],
			'status'				=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'AKTIF','OFF'",
			],
			'createdDate'			=> [
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
