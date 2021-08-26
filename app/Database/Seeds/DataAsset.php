<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataAsset extends Seeder
{
	public function run()
	{
			
		// data asset
		$asset = [
			[
				'asset_id' 			=> 1,
				'nama_kendaraan'    => 'Toyota Fortuner VRZ AT DIESEL LUX',
				'tanggal_masuk' 	=> '2017-11-24',
				'unit' 				=> 2,
				'harga' 			=> 519500000,
				'jumlah' 			=> 1039000000,
				'kondisi' 			=> 'BARU',
				'keterangan' 		=> 'HSRCC',
				'karyawan_id' 		=> 3
			],
						
			[
				'asset_id' 			=> 2,
				'nama_kendaraan'    => 'Toyota Innova V AT BENSIN LUX',
				'tanggal_masuk' 	=> '2017-11-24',
				'unit' 				=> 1,
				'harga' 			=> 370200000,
				'jumlah' 			=> 370200000,
				'kondisi' 			=> 'BARU',
				'keterangan' 		=> 'HSRCC',
				'karyawan_id' 		=> 3
			], 
						
			[
				'asset_id' 			=> 3,
				'nama_kendaraan'    => 'Toyota Innova V MT BENSIN LUX',
				'tanggal_masuk' 	=> '2017-11-24',
				'unit' 				=> 2,
				'harga' 			=> 350400000,
				'jumlah' 			=> 700800000,
				'kondisi' 			=> 'BARU',
				'keterangan' 		=> 'HSRCC',
				'karyawan_id' 		=> 3
			], 
						
			[
				'asset_id' 			=> 4,
				'nama_kendaraan'    => 'Toyota Innova G MT BENSIN LUX',
				'tanggal_masuk' 	=> '2017-11-24',
				'unit' 				=> 1,
				'harga' 			=> 303100000,
				'jumlah' 			=> 303100000,
				'kondisi' 			=> 'BARU',
				'keterangan' 		=> 'HSRCC',
				'karyawan_id' 		=> 3
			],
						
			[
				'asset_id' 			=> 5,
				'nama_kendaraan'    => 'Isuzu ELF NKR 55LWB',
				'tanggal_masuk' 	=> '2017-11-29',
				'unit' 				=> 1,
				'harga' 			=> 350000000,
				'jumlah' 			=> 350000000,
				'kondisi' 			=> 'BARU',
				'keterangan' 		=> 'HSRCC',
				'karyawan_id' 		=> 3
			], 
						
			[
				'asset_id' 			=> 6,
				'nama_kendaraan'    => 'Isuzu ELF',
				'tanggal_masuk' 	=> '2018-05-01',
				'unit' 				=> 1,
				'harga' 			=> 386300000,
				'jumlah' 			=> 386300000,
				'kondisi' 			=> 'BARU',
				'keterangan' 		=> 'HSRCC',
				'karyawan_id' 		=> 3
			], 
				
			[
				'asset_id' 			=> 7,
				'nama_kendaraan'    => 'Toyota Innova G MT BENSIN LUX',
				'tanggal_masuk' 	=> '2018-08-31',
				'unit' 				=> 2,
				'harga' 			=> 305150000,
				'jumlah' 			=> 610300000,
				'kondisi' 			=> 'BARU',
				'keterangan' 		=> 'HSRCC',
				'karyawan_id' 		=> 3
			], 
			
			[
				'asset_id' 			=> 8,
				'nama_kendaraan'    => 'Honda Vario 125 cc AT',
				'tanggal_masuk' 	=> '2019-04-15',
				'unit' 				=> 1,
				'harga' 			=> 18000000,
				'jumlah' 			=> 18000000,
				'kondisi' 			=> 'BARU',
				'keterangan' 		=> 'HSRCC',
				'karyawan_id' 		=> 3
			], 
						
			[
				'asset_id' 			=> 9,
				'nama_kendaraan'    => 'Honda Beat 110 cc AT',
				'tanggal_masuk' 	=> '2019-04-15',
				'unit' 				=> 1,
				'harga' 			=> 15000000,
				'jumlah' 			=> 15000000,
				'kondisi' 			=> 'BARU',
				'keterangan' 		=> 'HSRCC',
				'karyawan_id' 		=> 3
			], 
			
		];
		$this->db->table('asset')->insertBatch($asset);
			
	}
}
