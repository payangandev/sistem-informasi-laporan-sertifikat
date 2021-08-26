<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataMultimedia extends Seeder
{
	public function run()
	{
			// data multimedia
		$multimedia = [
			[
				'multimedia_id'		=> 1,
				'tanggal_masuk'		=> '2017-11-17',
				'kode_inventaris'	=> 'HSRCC-04.01 BEN 01.001.17',
				'nama_item' 		=> 'Projector',
				'merk'     			=> 'BENQ MS 527',
				'satuan' 			=> 'UNIT',
				'vol'				=> 1,
				'harga' 			=> 3850000,
				'jumlah' 			=> 3850000,
				'kondisi' 			=> 'BARU',
				'keterangan' 		=> 'Meeting Room 2',
				'karyawan_id' 		=> 3
			],

			[
				'multimedia_id'		=> 2,
				'tanggal_masuk'		=> '2017-11-17',
				'kode_inventaris'	=> 'HSRCC-04.01 EPS 01.002.17',
				'nama_item' 		=> 'Projector',
				'merk'     			=> 'EPSON EB-X450',
				'satuan' 			=> 'UNIT',
				'vol'				=> 1,
				'harga' 			=> 6000000,
				'jumlah' 			=> 6000000,
				'kondisi' 			=> 'BARU',
				'keterangan' 		=> 'Ground Floor',
				'karyawan_id' 		=> 3
			],
			
			[
				'multimedia_id'		=> 3,
				'tanggal_masuk'		=> '2018-04-18',
				'kode_inventaris'	=> 'HSRCC-04.01 INF 01.003.18',
				'nama_item' 		=> 'Projector',
				'merk'     			=> 'INFOCUS IN 112X',
				'satuan' 			=> 'UNIT',
				'vol'				=> 1,
				'harga' 			=> 4000000,
				'jumlah' 			=> 4000000,
				'kondisi' 			=> 'BARU',
				'keterangan' 		=> 'Meeting Room 4',
				'karyawan_id' 		=> 3
			],

			[
				'multimedia_id'		=> 4,
				'tanggal_masuk'		=> '2019-12-02',
				'kode_inventaris'	=> 'HSRCC-04.01 EPS 01.004.19',
				'nama_item' 		=> 'Projector',
				'merk'     			=> 'EPSON EB - U42',
				'satuan' 			=> 'UNIT',
				'vol'				=> 1,
				'harga' 			=> 11350000,
				'jumlah' 			=> 11350000,
				'kondisi' 			=> 'BARU',
				'keterangan' 		=> 'Meeting Room 1',
				'karyawan_id' 		=> 3
			],

			[
				'multimedia_id'		=> 5,
				'tanggal_masuk'		=> '2018-12-07',
				'kode_inventaris'	=> 'HSRCC-04.02 LET 01.001.18',
				'nama_item' 		=> 'Screen',
				'merk'     			=> 'Letaec',
				'satuan' 			=> 'UNIT',
				'vol'				=> 1,
				'harga' 			=> 325000,
				'jumlah' 			=> 325000,
				'kondisi' 			=> 'BARU',
				'keterangan' 		=> 'Meeting Room 2',
				'karyawan_id' 		=> 3
			],

			[
				'multimedia_id'		=> 6,
				'tanggal_masuk'		=> '2018-12-07',
				'kode_inventaris'	=> 'HSRCC-04.02 LET 01.002.18',
				'nama_item' 		=> 'Screen',
				'merk'     			=> 'HQ',
				'satuan' 			=> 'UNIT',
				'vol'				=> 1,
				'harga' 			=> 10500000,
				'jumlah' 			=> 10500000,
				'kondisi' 			=> 'BARU',
				'keterangan' 		=> 'Meeting Room 1',
				'karyawan_id' 		=> 3
			],
			
			[
				'multimedia_id'		=> 7,
				'tanggal_masuk'		=> '2019-01-03',
				'kode_inventaris'	=> 'HSRCC-04.03 CAN 01.001.19',
				'nama_item' 		=> 'Kamera DSLR',
				'merk'     			=> 'CANON 4000D',
				'satuan' 			=> 'UNIT',
				'vol'				=> 1,
				'harga' 			=> 6900000,
				'jumlah' 			=> 6900000,
				'kondisi' 			=> 'BARU',
				'keterangan' 		=> 'Mr. Zhang Shibin',
				'karyawan_id' 		=> 3
			],

			[
				'multimedia_id'		=> 8,
				'tanggal_masuk'		=> '2019-01-03',
				'kode_inventaris'	=> 'HSRCC-04.03 CAN 01.001.19',
				'nama_item' 		=> 'Kamera Digital',
				'merk'     			=> 'FUJI FILM X-A10',
				'satuan' 			=> 'UNIT',
				'vol'				=> 1,
				'harga' 			=> 69500000,
				'jumlah' 			=> 69500000,
				'kondisi' 			=> 'BARU',
				'keterangan' 		=> 'QSHE',
				'karyawan_id' 		=> 3
			],

			[
				'multimedia_id'		=> 9,
				'tanggal_masuk'		=> '2019-01-03',
				'kode_inventaris'	=> 'HSRCC-04.03 DJI 01.003.20',
				'nama_item' 		=> 'Drone',
				'merk'     			=> 'DJI Mavic 2 Pro',
				'satuan' 			=> 'UNIT',
				'vol'				=> 1,
				'harga' 			=> 22500000,
				'jumlah' 			=> 22500000,
				'kondisi' 			=> 'BARU',
				'keterangan' 		=> 'HC and GA',
				'karyawan_id' 		=> 3
			],

		];
		$this->db->table('multimedia')->insertBatch($multimedia);
			
	}
}
