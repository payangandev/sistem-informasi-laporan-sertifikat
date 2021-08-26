<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataAudioVisual extends Seeder
{
	public function run()
	{
				
	
		// data audiovisual
		$audiovisual = [
			[
					'audiovisual_id'    => 1,
					'tanggal_masuk'		=> '2019-01-03',
					'kode_inventaris'	=> 'HSRCC-03.01 01 01.001.17',
					'nama_item' 		=> 'Micropone',
					'merk'     			=> 'Shure SM57',
					'satuan' 			=> 'UNIT',
					'vol'				=> 1,
					'harga' 			=> 1440000,
					'jumlah' 			=> 1440000,
					'kondisi' 			=> 'BARU',
					'keterangan' 		=> 'Meeting Room 1',
					'karyawan_id' 		=> 3
			],
			
			[
					'audiovisual_id'    => 2,
					'tanggal_masuk'		=> '2019-01-03',
					'kode_inventaris'	=> 'HSRCC-03.02 01 01.002.17',
					'nama_item' 		=> 'Speaker',
					'merk'     			=> 'Harman Kardon',
					'satuan' 			=> 'UNIT',
					'vol'				=> 1,
					'harga' 			=> 2399000,
					'jumlah' 			=> 2399000,
					'kondisi' 			=> 'BARU',
					'keterangan' 		=> 'Meeting Room 1',
					'karyawan_id' 		=> 3
			],
		];
		$this->db->table('audiovisual')->insertBatch($audiovisual);
	}
}
