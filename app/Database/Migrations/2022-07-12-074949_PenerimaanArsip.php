<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PenerimaanArsip extends Migration
{
    public function up()
	{
		$this->forge->addField([
			'penerimaan_id'     => [
				'type'      		=> 'INT',
				'constraint' 		=> 11,
				'unsigned'   		=> true,
				'auto_increment' 	=> true,
			],
            'client_id'               => [
                'type'                => 'INT',
                'constraint'          => 11,
                'unsigned'            => TRUE,
                'null'                => TRUE
            ],
			'bukti_penerimaan'      => [
				'type'       		=> 'VARCHAR',
				'constraint' 		=> 50,
			],
			'proggress'   => [
				'type'           	=> 'enum',
                'constraint'		=> "'Diterima','Diserahkan'"

            ],
            'tanggal_penerimaan'	=> [
				'type'				=> 'DATE',
			],

		]);

		$this->forge->addKey('penerimaan_id', true);
		$this->forge->addForeignKey('client_id', 'client', 'client_id', 'cascade', 'cascade');
		$this->forge->createTable('penerimaan', true);
	}

	public function down()
	{
		$this->forge->dropTable('penerimaan', true);
	}
}
