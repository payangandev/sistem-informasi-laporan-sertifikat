<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataKaryawan extends Seeder
{
	public function run()
	{
		$karyawan = [
			[
				'karyawan_id' 	=> 1,
				'nama_karyawan'	=> 'Febra Siahaan',
				'jabatan'		=> 'Manager',
				'status'		=> 'AKTIF',
				'tanggalmasuk'	=> '2018-04-23'
			],
			[
				'karyawan_id' 	=> 2,
				'nama_karyawan'	=> 'Dita',
				'jabatan'		=> 'Admin',
				'status'		=> 'AKTIF',
				'tanggalmasuk'	=> '2021-05-12'
			],
			[
				'karyawan_id' 	=> 3,
				'nama_karyawan'	=> 'Lili',
				'jabatan'		=> 'Super Admin',
				'status'		=> 'AKTIF',
				'tanggalmasuk'	=> '2019-03-09'
			]
		];
		$this->db->table('karyawan')->insertBatch($karyawan);

	}
}
