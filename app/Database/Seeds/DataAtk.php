<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataAtk extends Seeder
{
	public function run()
	{
			// data atk
		$atk = [
			[
				'atk_id'		=> 1,
				'kode_barang'	=> 'ATK01',
				'nama_barang'	=> 'Pulpen',
				'jenis_barang'	=> 'Alat Tulis',
				'stock_awal' 	=> 5,
				'stock_masuk'	=> 15,
				'stock_keluar'	=> 3,
				'stock_akhir'	=> 17,
				'karyawan_id'	=> 5
			],
			[
				'atk_id'		=> 2,
				'kode_barang'	=> 'ATK02',
				'nama_barang'	=> 'Pensil',
				'jenis_barang'	=> 'Alat Tulis',				
				'stock_awal' 	=> 10,
				'stock_masuk'	=> 5,
				'stock_keluar'	=> 2,
				'stock_akhir'	=> 13,
				'karyawan_id'	=> 5
			],
			[
				'atk_id'		=> 3,
				'kode_barang'	=> 'ATK03',
				'nama_barang'	=> 'Solasi',
				'jenis_barang'	=> 'Perekat',				
				'stock_awal' 	=> 3,
				'stock_masuk'	=> 12,
				'stock_keluar'	=> 5,
				'stock_akhir'	=> 10,
				'karyawan_id'	=> 5
			],
			[
				'atk_id'		=> 4,
				'kode_barang'	=> 'ATK04',
				'nama_barang'	=> 'Spidol Hitam',
				'jenis_barang'	=> 'Alat Tulis',				
				'stock_awal' 	=> 2,
				'stock_masuk'	=> 10,
				'stock_keluar'	=> 3,
				'stock_akhir'	=> 9,
				'karyawan_id'	=> 5
			],
			[
				'atk_id'		=> 5,
				'kode_barang'	=> 'ATK05',
				'nama_barang'	=> 'Kertas A4',
				'jenis_barang'	=> 'Kertas HVS',				
				'stock_awal' 	=> 4,
				'stock_masuk'	=> 9,
				'stock_keluar'	=> 2,
				'stock_akhir'	=> 11,
				'karyawan_id'	=> 5
			],
			[
				'atk_id'		=> 6,
				'kode_barang'	=> 'ATK06',
				'nama_barang'	=> 'Kertas A3',
				'jenis_barang'	=> 'Kertas HVS',				
				'stock_awal' 	=> 3,
				'stock_masuk'	=> 9,
				'stock_keluar'	=> 1,
				'stock_akhir'	=> 11,
				'karyawan_id'	=> 5
			],
			[
				'atk_id'		=> 7,
				'kode_barang'	=> 'ATK07',
				'nama_barang'	=> 'Kertas F4',
				'jenis_barang'	=> 'Kertas HVS',				
				'stock_awal' 	=> 5,
				'stock_masuk'	=> 5,
				'stock_keluar'	=> 1,
				'stock_akhir'	=> 9,
				'karyawan_id'	=> 5
			],
			[
				'atk_id'		=> 8,
				'kode_barang'	=> 'ATK08',
				'nama_barang'	=> 'Bantex Ordner',
				'jenis_barang'	=> 'Ordner',				
				'stock_awal' 	=> 10,
				'stock_masuk'	=> 15,
				'stock_keluar'	=> 7,
				'stock_akhir'	=> 18,
				'karyawan_id'	=> 5
			],
			[
				'atk_id'		=> 9,
				'kode_barang'	=> 'ATK09',
				'nama_barang'	=> 'Amplop Coklat',
				'jenis_barang'	=> 'Amplop',				
				'stock_awal' 	=> 5,
				'stock_masuk'	=> 10,
				'stock_keluar'	=> 2,
				'stock_akhir'	=> 13,
				'karyawan_id'	=> 5
			],
			[
				'atk_id'		=> 10,
				'kode_barang'	=> 'ATK10',
				'nama_barang'	=> 'Stapler',
				'jenis_barang'	=> 'Stapler',				
				'stock_awal' 	=> 3,
				'stock_masuk'	=> 5,
				'stock_keluar'	=> 3,
				'stock_akhir'	=> 5,
				'karyawan_id'	=> 5
			],
			[
				'atk_id'		=> 11,
				'kode_barang'	=> 'ATK11',
				'nama_barang'	=> 'Staples',
				'jenis_barang'	=> 'Staples',				
				'stock_awal' 	=> 2,
				'stock_masuk'	=> 15,
				'stock_keluar'	=> 2,
				'stock_akhir'	=> 15,
				'karyawan_id'	=> 5
			],
			[
				'atk_id'		=> 12,
				'kode_barang'	=> 'ATK12',
				'nama_barang'	=> 'Memo',
				'jenis_barang'	=> 'Memo',				
				'stock_awal' 	=> 5,
				'stock_masuk'	=> 20,
				'stock_keluar'	=> 15,
				'stock_akhir'	=> 10,
				'karyawan_id'	=> 5
			],
			[
				'atk_id'		=> 13,
				'kode_barang'	=> 'ATK13',
				'nama_barang'	=> 'Glue Stick',
				'jenis_barang'	=> 'Perekat',				
				'stock_awal' 	=> 4,
				'stock_masuk'	=> 10,
				'stock_keluar'	=> 7,
				'stock_akhir'	=> 7,
				'karyawan_id'	=> 5
			],
			[
				'atk_id'		=> 14,
				'kode_barang'	=> 'ATK14',
				'nama_barang'	=> 'Cutter',
				'jenis_barang'	=> 'Cutter',				
				'stock_awal' 	=> 4,
				'stock_masuk'	=> 5,
				'stock_keluar'	=> 1,
				'stock_akhir'	=> 8,
				'karyawan_id'	=> 5
			],
			[
				'atk_id'		=> 15,
				'kode_barang'	=> 'ATK15',
				'nama_barang'	=> 'Box File',
				'jenis_barang'	=> 'Box',				
				'stock_awal' 	=> 2,
				'stock_masuk'	=> 10,
				'stock_keluar'	=> 4,
				'stock_akhir'	=> 8,
				'karyawan_id'	=> 5
			],
			
		];
		$this->db->table('atk')->insertBatch($atk);
			
	}
}
