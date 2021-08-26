<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataKendaraan extends Seeder
{
	public function run()
	{
		// data kendaraan

		$kendaraan = [
			[
				'kendaraan_id'		=> 1,
				'tanggal_masuk'		=> '2017-04-03',
				'kode_inventaris'	=> 'HSRCC-01.01 01 01.001.17',
				'nama_item'			=> 'MOTOR',
				'merek'				=> 'Honda Vario 125 cc AT',
				'satuan'			=> 'UNIT',
				'harga'				=> '18.000.000',
				'jumlah'			=> '1',
				'karyawan_id'		=> 4
			],
			[
				'kendaraan_id'		=> 2,
				'tanggal_masuk'		=> '2017-04-03',
				'kode_inventaris'	=> 'HSRCC-01.01 01 01.002.17',
				'nama_item'			=> 'MOTOR',
				'merek'				=> 'Honda Beat 110 cc AT',
				'satuan'			=> 'UNIT',
				'harga'				=> '15.000.000',
				'jumlah'			=> '1',
				'karyawan_id'		=> 4
			],
			[
				'kendaraan_id'		=> 3,
				'tanggal_masuk'		=> '2017-11-24',
				'kode_inventaris'	=> 'HSRCC-01.02 01 01.001.18',
				'nama_item'			=> 'Mobil SUV',
				'merek'				=> 'Toyota Fortuner VRZ AT',
				'satuan'			=> 'UNIT',
				'harga'				=> '519.500.000',
				'jumlah'			=> '1',
				'karyawan_id'		=> 4
			],
			[
				'kendaraan_id'		=> 4,
				'tanggal_masuk'		=> '2017-11-24',
				'kode_inventaris'	=> 'HSRCC-01.02 01 01.002.18',
				'nama_item'			=> 'Mobil SUV',
				'merek'				=> 'Toyota Fortuner VRZ AT',
				'satuan'			=> 'UNIT',
				'harga'				=> '519.500.000',
				'jumlah'			=> '1',
				'karyawan_id'		=> 4
			],
			[
				'kendaraan_id'		=> 5,
				'tanggal_masuk'		=> '2017-11-24',
				'kode_inventaris'	=> 'HSRCC-01.02 02 01.003.18',
				'nama_item'			=> 'Mobil MPV',
				'merek'				=> 'Toyota Innova type V MT',
				'satuan'			=> 'UNIT',
				'harga'				=> '35.040.0000',
				'jumlah'			=> '1',
				'karyawan_id'		=> 4
			],
			[
				'kendaraan_id'		=> 6,
				'tanggal_masuk'		=> '2017-11-24',
				'kode_inventaris'	=> 'HSRCC-01.02 02 01.004.18',
				'nama_item'			=> 'Mobil MPV',
				'merek'				=> 'Toyota Innova type V MT',
				'satuan'			=> 'UNIT',
				'harga'				=> '350400000',
				'jumlah'			=> '1',
				'karyawan_id'		=> 4
			],
			[
				'kendaraan_id'		=> 7,
				'tanggal_masuk'		=> '2017-11-24',
				'kode_inventaris'	=> 'HSRCC-01.02 02 01.005.18',
				'nama_item'			=> 'Mobil MPV',
				'merek'				=> 'Toyota Innova type V MT',
				'satuan'			=> 'UNIT',
				'harga'				=> '350400000',
				'jumlah'			=> '1',
				'karyawan_id'		=> 4
			],
			[
				'kendaraan_id'		=> 8,
				'tanggal_masuk'		=> '2018-08-18',
				'kode_inventaris'	=> 'HSRCC-01.02 02 01.006.18',
				'nama_item'			=> 'Mobil MPV',
				'merek'				=> 'Toyota Innova type G MT',
				'satuan'			=> 'UNIT',
				'harga'				=> '305150000',
				'jumlah'			=> '1',
				'karyawan_id'		=> 4
			],
			[
				'kendaraan_id'		=> 9,
				'tanggal_masuk'		=> '2018-08-18',
				'kode_inventaris'	=> 'HSRCC-01.02 02 01.007.18',
				'nama_item'			=> 'Mobil MPV',
				'merek'				=> 'Toyota Innova type G MT',
				'satuan'			=> 'UNIT',
				'harga'				=> '305150000',
				'jumlah'			=> '1',
				'karyawan_id'		=> 4
			],
			[
				'kendaraan_id'		=> 10,
				'tanggal_masuk'		=> '2018-08-18',
				'kode_inventaris'	=> 'HSRCC-01.02 02 01.008.18',
				'nama_item'			=> 'Mobil MPV',
				'merek'				=> 'Toyota Innova type G MT',
				'satuan'			=> 'UNIT',
				'harga'				=> '305150000',
				'jumlah'			=> '1',
				'karyawan_id'		=> 4
			],
			[
				'kendaraan_id'		=> 11,
				'tanggal_masuk'		=> '2018-08-18',
				'kode_inventaris'	=> 'HSRCC-01.02 02 01.009.18',
				'nama_item'			=> 'MiniBus',
				'merek'				=> 'Isuzu ELF',
				'satuan'			=> 'UNIT',
				'harga'				=> '350000000',
				'jumlah'			=> '1',
				'karyawan_id'		=> 4
			],
			[
				'kendaraan_id'		=> 12,
				'tanggal_masuk'		=> '2018-04-18',
				'kode_inventaris'	=> 'HSRCC-01.02 02 01.010.18',
				'nama_item'			=> 'MiniBus',
				'merek'				=> 'Isuzu ELF',
				'satuan'			=> 'UNIT',
				'harga'				=> '350000000',
				'jumlah'			=> '1',
				'karyawan_id'		=> 4
			],
			[
				'kendaraan_id'		=> 13,
				'tanggal_masuk'		=> '2018-04-18',
				'kode_inventaris'	=> 'HSRCC-01.02 02 01.011.20',
				'nama_item'			=> 'Mobil MPV',
				'merek'				=> 'Toyota Innova type G AT',
				'satuan'			=> 'UNIT',
				'harga'				=> '349800000',
				'jumlah'			=> '1',
				'karyawan_id'		=> 4
			],

		];
		$this->db->table('kendaraan')->insertBatch($kendaraan);
	}
}
