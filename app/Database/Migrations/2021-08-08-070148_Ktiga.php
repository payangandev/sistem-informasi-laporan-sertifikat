<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ktiga extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'ktiga_id'			=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'nama_personil'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '50',
			],

			'sub_bidang'			=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'AHLI K3 UMUM','AHLI MADYA K3 KONTRUKSI','AHLI K3 BIDANG LISTRIK','SKP AHLI K3 LIFT & EKSKALATOR','TENAGA KERJA PADA KETINGGIAN TINGKAT 1 '",
				'default'			=> 'UNIT'
			],

			'perusahaan_id'				=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],

			'harga_setor'			=> [
				'type'				=> 'INT',
				'constraint'		=> 100,
			],

			'order_lencana'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 50,
			],

			'harga_jual'			=> [
				'type'				=> 'INT',
				'constraint'		=> 100,
			],

			'tanggal_proses'		=> [
				'type'				=> 'date'
			],

			'marketing'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '50'
			],

			'tanggal_selesai'		=> [
				'type'				=> 'date'
			],

			'no_resi'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '50'
			],


		]);


		$this->forge->addKey('ktiga_id', true);
		$this->forge->addForeignKey('perusahaan_id', 'perusahaan', 'perusahaan_id', 'cascade', 'cascade');
		$this->forge->createTable('ktiga', true);
	}

	public function down()
	{
		$this->forge->dropTable('ktiga', true);
	}
}
