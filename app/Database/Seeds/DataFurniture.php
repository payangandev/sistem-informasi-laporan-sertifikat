<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataFurniture extends Seeder
{
	public function run()
	{
		// data furniture 
		$furniture = [
			[
				'furniture_id' 		=> 1,
				'nama_item' 		=> 'Meja Direktur',
				'kode'     			=> 'HSRCC-03.02 01 01.001.17',
				'harga' 			=> 5000000,
				'qty'     			=> 2,
				'tanggal_beli'     	=> "2017-02-03",
				'total'				=> 10000000,
				'kondisi' 			=> 'BARU',
				'karyawan_id' 		=> 3,
			],

			[
				'furniture_id' 		=> 2,
				'nama_item' 		=> 'Meja Junior Direktur',
				'kode'     			=> 'HSRCC-03.02 01 01.002.17',
				'harga' 			=> 3000000,
				'qty'     			=> 1,
				'tanggal_beli'     	=> "2017-02-03",
				'total'				=> 3000000,
				'kondisi' 			=> 'BARU',
				'karyawan_id' 		=> 3,
			],

			[
				'furniture_id' 		=> 3,
				'nama_item' 		=> 'Meja General Manager Direktur',
				'kode'     			=> 'HSRCC-03.02 01 01.003.17',
				'harga' 			=> 2500000,
				'qty'     			=> 6,
				'tanggal_beli'     	=> "2017-02-03",
				'total'				=> 15000000,
				'kondisi' 			=> 'BARU',
				'karyawan_id' 		=> 3,
			],

			[
				'furniture_id' 		=> 4,
				'nama_item' 		=> 'Meja Manajer',
				'kode'     			=> 'HSRCC-03.02 01 01.004.17',
				'harga' 			=> 5000000,
				'qty'     			=> 2,
				'tanggal_beli'     	=> "2017-02-03",
				'total'				=> 19000000,
				'kondisi' 			=> 'BARU',
				'karyawan_id' 		=> 3,
			],

			[
				'furniture_id' 		=> 5,
				'nama_item' 		=> 'Meja Staff',
				'kode'     			=> 'HSRCC-03.02 01 01.005.17',
				'harga' 			=> 750000,
				'qty'     			=> 41,
				'tanggal_beli'     	=> "2017-02-03",
				'total'				=> 30750000,
				'kondisi' 			=> 'BARU',
				'karyawan_id' 		=> 3,
			],
						[
				'furniture_id' 		=> 6,
				'nama_item' 		=> 'Kursi Direktur',
				'kode'     			=> 'HSRCC-03.02 01 01.006.17',
				'harga' 			=> 2200000,
				'qty'     			=> 4,
				'tanggal_beli'     	=> "2017-02-03",
				'total'				=> 4400000,
				'kondisi' 			=> 'BARU',
				'karyawan_id' 		=> 3,
			],
						[
				'furniture_id' 		=> 7,
				'nama_item' 		=> 'Kursi Junior Direktur',
				'kode'     			=> 'HSRCC-03.02 01 01.007.17',
				'harga' 			=> 1800000,
				'qty'     			=> 2,
				'tanggal_beli'     	=> "2017-02-03",
				'total'				=> 1800000,
				'kondisi' 			=> 'BARU',
				'karyawan_id' 		=> 3,
			],
						[
				'furniture_id' 		=> 8,
				'nama_item' 		=> 'Kursi General Manager',
				'kode'     			=> 'HSRCC-03.02 01 01.008.17',
				'harga' 			=> 1500000,
				'qty'     			=> 6,
				'tanggal_beli'     	=> "2017-02-03",
				'total'				=> 9000000,
				'kondisi' 			=> 'BARU',
				'karyawan_id' 		=> 3,
			],
				[
				'furniture_id' 		=> 9,
				'nama_item' 		=> 'Kursi Staff',
				'kode'     			=> 'HSRCC-03.02 01 01.009.17',
				'harga' 			=> 850000,
				'qty'     			=> 151,
				'tanggal_beli'     	=> "2017-02-03",
				'total'				=> 128350000,
				'kondisi' 			=> 'BARU',
				'karyawan_id' 		=> 3,
			],
		];
		$this->db->table('furniture')->insertBatch($furniture);
	}
}
