<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableDocumentKeluarSchema extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'document_keluar_id'	=> [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'kode_dokumen'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '100'
			],
			'document_type'			=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'BRIDGE','ALIGNMENT','CULVERT','TUNNEL NO.3','SUBGRADE'",
			],
			'document_number'		=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '100',

			],
			'judul_dokumen'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '100'
			],
			'nomer_box'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '100'
			],
			'isi_box'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '100'
			],
			'tanggal_keluar'		=> [
				'type'				=> 'DATE',
			],
			'vendor'				=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'KCIC','CREC','CRDC','CDJO'",
			],
			'bahasa'				=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'ENGLISH & CHINESE','ENGLISH','CHINESE'",
			],
			'approved'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'jabatan'				=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'MANAGER','STAFF','TRANSLATOR'",
			],
			'status_document'		=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'Masuk','Keluar'",
			],
			'karyawan_id'			 => [
				'type'				=> 'INT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			]
		]);


		$this->forge->addKey('document_keluar_id', true);
		$this->forge->addForeignKey('karyawan_id', 'karyawan', 'karyawan_id', 'cascade', 'cascade');
		$this->forge->createTable('documentkeluar', true);
	}

	public function down()
	{
		$this->forge->dropTable('documentkeluar', true);
	}
}
