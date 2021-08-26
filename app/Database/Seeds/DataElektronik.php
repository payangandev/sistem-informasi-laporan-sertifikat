<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataElektronik extends Seeder
{
	public function run()
	{
				$elektronik = [
			[
				'elektronik_id' 	=> 1,
				'tanggal_masuk' 	=> '2018-04-15',
				'kode_inventaris'	=> 'HSRCC-02.01 01 01.006.18',
				'nama_item'    		=> 'Personal Computer',
				'merk' 				=> 'CPU core i3',
				'satuan' 			=> 'UNIT',
				'vol'				=> '20',
				'harga' 			=> 6800000,
				'jumlah' 			=> 136000000,
				'kondisi' 			=> 'BARU',
				'keterangan' 		=> 'HSRCC',
				'karyawan_id' 		=> 3
			],

			[
				'elektronik_id' 	=> 2,
				'tanggal_masuk' 	=> '2018-04-16',
				'kode_inventaris'	=> 'HSRCC-02.01 02 01.001.18',
				'nama_item'    		=> 'Laptop',
				'merk' 				=> 'Dell Inspiron (Core i5)',
				'satuan' 			=> 'UNIT',
				"vol"				=> '20',
				'harga' 			=> 12450000,
				'jumlah' 			=> 249000000,
				'kondisi' 			=> 'BARU',
				'keterangan' 		=> 'HSRCC',
				'karyawan_id' 		=> 3
			],

			[
				'elektronik_id' 	=> 3,
				'tanggal_masuk' 	=> '2018-04-17',
				'kode_inventaris'	=> 'HSRCC-02.01 03 01.007.18',
				'nama_item'    		=> 'Printer',
				'merk' 				=> 'Epson L120',
				'satuan' 			=> 'UNIT',
				'vol'				=> '10',
				'harga' 			=> 1600000,
				'jumlah' 			=> 16000000,
				'kondisi' 			=> 'BARU',
				'keterangan' 		=> 'HSRCC',
				'karyawan_id' 		=> 3
			],

			[
				'elektronik_id' 	=> 4,
				'tanggal_masuk' 	=> '2018-04-18',
				'kode_inventaris'	=> 'HSRCC-02.01 04 01.010.18',
				'nama_item'    		=> 'Monitor',
				'merk' 				=> 'Dell',
				'satuan' 			=> 'UNIT',
				'vol'				=> '20',
				'harga' 			=> 1200000,
				'jumlah' 			=> 24000000,
				'kondisi' 			=> 'BARU',
				'keterangan' 		=> 'HSRCC',
				'karyawan_id' 		=> 3
			],

			[
				'elektronik_id' 	=> 5,
				'tanggal_masuk' 	=> '2018-04-25',
				'kode_inventaris'	=> 'HSRCC-02.02 01 01.010.18',
				'nama_item'    		=> 'AC',
				'merk' 				=> 'LG',
				'satuan' 			=> 'UNIT',
				'vol'				=> '5',
				'harga' 			=> 3500000,
				'jumlah' 			=> 17500000,
				'kondisi' 			=> 'BARU',
				'keterangan' 		=> 'HSRCC',
				'karyawan_id' 		=> 3
			],

			[
				'elektronik_id' 	=> 6,
				'tanggal_masuk' 	=> '2019-08-04',
				'kode_inventaris'	=> 'HSRCC-02.02 01 01.010.19',
				'nama_item'    		=> 'TV',
				'merk' 				=> 'Samsung Smart TV 32"',
				'satuan' 			=> 'UNIT',
				'vol'				=> '3',
				'harga' 			=> 2500000,
				'jumlah' 			=> 7500000,
				'kondisi' 			=> 'BARU',
				'keterangan' 		=> 'HSRCC',
				'karyawan_id' 		=> 3
			],
		];

		$this->db->table('elektronik')->insertBatch($elektronik);
	}
}
