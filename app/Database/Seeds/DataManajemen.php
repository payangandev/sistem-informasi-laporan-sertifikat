<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataManajemen extends Seeder
{
	public function run()
	{
		$karyawan = [
			[
				'karyawan_id' 	=> 1,
				'nama_karyawan'	=> 'Didit Mulyana',
				'divisi'		=> 'Engineer',
				'jabatan'		=> 'Manager',
				'status'		=> 'AKTIF',
				'tanggalmasuk'	=> '2021-07-03'
			],
			[
				'karyawan_id' 	=> 2,
				'nama_karyawan'	=> 'Dainara',
				'divisi'		=> 'Engineer',
				'jabatan'		=> 'Translator',
				'status'		=> 'AKTIF',
				'tanggalmasuk'	=> '2021-07-03'
			],
			[
				'karyawan_id' 	=> 3,
				'nama_karyawan'	=> 'Sheila M',
				'divisi'		=> 'Engineer',
				'jabatan'		=> 'Translator',
				'status'		=> 'AKTIF',
				'tanggalmasuk'	=> '2021-07-03'
			],
			[
				'karyawan_id' 	=> 4,
				'nama_karyawan'	=> 'Waladun Shalihun',
				'divisi'		=> 'Engineer',
				'jabatan'		=> 'Staff Engginer',
				'status'		=> 'AKTIF',
				'tanggalmasuk'	=> '2021-07-03'
			],
			[
				'karyawan_id' 	=> 5,
				'nama_karyawan'	=> 'Utari Pratiwi',
				'divisi'		=> 'Engineer',
				'jabatan'		=> 'Staff Engginer',
				'status'		=> 'AKTIF',
				'tanggalmasuk'	=> '2021-07-03'
			],

		];
		$this->db->table('karyawan')->insertBatch($karyawan);

		$user = [
			[
				'id'		=> 1,
				'nama_user'	=> 'Didit Mulyana',
				'username'	=> 'didit001',
				'password'	=> 'didit001',
				'level'		=> 1
			],

			[
				'id'		=> 2,
				'nama_user'	=> 'Dainara',
				'username'	=> 'dainara001',
				'password'	=> 'dainara001',
				'level'		=> 2
			],

			[
				'id'		=> 3,
				'nama_user'	=> 'Sheila .M',
				'username'	=> 'sheila001',
				'password'	=> 'sheila001',
				'level'		=> 2
			],

			[
				'id'		=> 4,
				'nama_user'	=> 'Waladun Shalihun',
				'username'	=> 'waladun001',
				'password'	=> 'waladun001',
				'level'		=> 3
			],

			[
				'id'		=> 5,
				'nama_user'	=> 'Utari Pratiwi',
				'username'	=> 'utari001',
				'password'	=> 'utari001',
				'level'		=> 3
			],
			[
				'id'		=> 6,
				'nama_user'	=> 'Ajuar Ramanda',
				'username'	=> 'ajuar001',
				'password'	=> 'ajuar001',
				'level'		=> 4
			],
		];

		$this->db->table('user')->insertBatch($user);


		$nota = [
			[
				'nota_id'			=> 1,
				'kode_nota'			=> 'EC-1441',
				'vendor'			=> 'KJB',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '10',
				'status_document'			=> 'Masuk',
				'tanggal_masuk'		=> '2021-06-08',
				'karyawan_id'		=> 5,


			],
			[
				'nota_id'			=> 2,
				'kode_nota'			=> 'EC-1442',
				'vendor'			=> 'KJB',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '10',
				'status_document'	=> 'Masuk',
				'tanggal_masuk'		=> '2021-06-08',
				'karyawan_id'		=> 5,


			],
			[
				'nota_id'			=> 3,
				'kode_nota'			=> 'EC-1443',
				'vendor'			=> 'KJB',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '10',
				'status_document'	=> 'Masuk',
				'tanggal_masuk'		=> '2021-06-08',
				'karyawan_id'		=> 5,


			],
			[
				'nota_id'			=> 4,
				'kode_nota'			=> 'EC-1453',
				'vendor'			=> 'KJB',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '10',
				'status_document'	=> 'Masuk',
				'tanggal_masuk'		=> '2021-06-07',
				'karyawan_id'		=> 5,


			],
			[
				'nota_id'			=> 5,
				'kode_nota'			=> 'EC-1991',
				'vendor'			=> 'KJB',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '8',
				'status_document'	=> 'Masuk',
				'tanggal_masuk'		=> '2021-06-06',
				'karyawan_id'		=> 5,


			],
			[
				'nota_id'			=> 6,
				'kode_nota'			=> 'EC-1994',
				'vendor'			=> 'KJB',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '10',
				'status_document'	=> 'Masuk',
				'tanggal_masuk'		=> '2021-06-06',
				'karyawan_id'		=> 5,


			],
			[
				'nota_id'			=> 7,
				'kode_nota'			=> 'EC-1995',
				'vendor'			=> 'KJB',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '10',
				'status_document'	=> 'Masuk',
				'tanggal_masuk'		=> '2021-06-06',
				'karyawan_id'		=> 5,


			],
			[
				'nota_id'			=> 8,
				'kode_nota'			=> 'EC-1996',
				'vendor'			=> 'KJB',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '8',
				'status_document'	=> 'Masuk',
				'tanggal_masuk'		=> '2021-06-06',
				'karyawan_id'		=> 5,


			],
			[
				'nota_id'			=> 9,
				'kode_nota'			=> 'EC-1492',
				'vendor'			=> 'KJB',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '8',
				'status_document'	=> 'Masuk',
				'tanggal_masuk'		=> '2021-06-05',
				'karyawan_id'		=> 5,


			],
			[
				'nota_id'			=> 10,
				'kode_nota'			=> 'EC-3554',
				'vendor'			=> 'KJB',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '10',
				'status_document'	=> 'Masuk',
				'tanggal_masuk'		=> '2021-06-04',
				'karyawan_id'		=> 5,


			],
			[
				'nota_id'			=> 12,
				'kode_nota'			=> 'EC-1493',
				'vendor'			=> 'KJB',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '8',
				'status_document'	=> 'Masuk',
				'tanggal_masuk'		=> '2021-06-04',
				'karyawan_id'		=> 5,


			],
			[
				'nota_id'			=> 13,
				'kode_nota'			=> 'EC-2354',
				'vendor'			=> 'KJB',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '10',
				'status_document'	=> 'Masuk',
				'tanggal_masuk'		=> '2021-06-04',
				'karyawan_id'		=> 5,


			],
			[
				'nota_id'			=> 14,
				'kode_nota'			=> 'EC-1453',
				'vendor'			=> 'KJB',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '10',
				'status_document'	=> 'Masuk',
				'tanggal_masuk'		=> '2021-06-04',
				'karyawan_id'		=> 5,


			],
			[
				'nota_id'			=> 15,
				'kode_nota'			=> 'EC-1953',
				'vendor'			=> 'KJB',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '8',
				'status_document'	=> 'Masuk',
				'tanggal_masuk'		=> '2021-06-04',
				'karyawan_id'		=> 5,


			],
			[
				'nota_id'			=> 16,
				'kode_nota'			=> 'EC-1963',
				'vendor'			=> 'KJB',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '8',
				'status_document'	=> 'Masuk',
				'tanggal_masuk'		=> '2021-06-04',
				'karyawan_id'		=> 5,


			],
			[
				'nota_id'			=> 17,
				'kode_nota'			=> 'EC-1973',
				'vendor'			=> 'KJB',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '10',
				'status_document'	=> 'Masuk',
				'tanggal_masuk'		=> '2021-06-03',
				'karyawan_id'		=> 5,


			],
			[
				'nota_id'		=> 18,
				'kode_nota'			=> 'EC-1983',
				'vendor'			=> 'KJB',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '8',
				'status_document'			=> 'Masuk',
				'tanggal_masuk'		=> '2021-06-03',
				'karyawan_id'		=> 5,


			],
			[
				'nota_id'		=> 19,
				'kode_nota'			=> 'EC-1993',
				'vendor'			=> 'KJB',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '10',
				'status_document'			=> 'Masuk',
				'tanggal_masuk'		=> '2021-06-03',
				'karyawan_id'		=> 5,


			],
			[
				'nota_id'		=> 20,
				'kode_nota'			=> 'EC-2445',
				'vendor'			=> 'KJB',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '10',
				'status_document'			=> 'Masuk',
				'tanggal_masuk'		=> '2021-06-03',
				'karyawan_id'		=> 5,


			],

		];
		$this->db->table('nota')->insertBatch($nota);


		$notakeluar = [
			[
				'notakeluar_id'		=> 1,
				'kode_nota'			=> 'EC-1887',
				'vendor'			=> 'HSRCC',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '10',
				'status_document'			=> 'Keluar',
				'tanggal_keluar'	=> '2021-06-02',
				'karyawan_id'		=> 4
			],
			[
				'notakeluar_id'		=> 2,
				'kode_nota'			=> 'EC-1888',
				'vendor'			=> 'HSRCC',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '8',
				'status_document'			=> 'Keluar',
				'tanggal_keluar'	=> '2021-06-02',
				'karyawan_id'		=> 4
			],
			[
				'notakeluar_id'		=> 3,
				'kode_nota'			=> 'EC-1889',
				'vendor'			=> 'HSRCC',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '10',
				'status_document'			=> 'Keluar',
				'tanggal_keluar'	=> '2021-06-01',
				'karyawan_id'		=> 4
			],
			[
				'notakeluar_id'		=> 4,
				'kode_nota'			=> 'EC-1890',
				'vendor'			=> 'HSRCC',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '10',
				'status_document'			=> 'Keluar',
				'tanggal_keluar'	=> '2021-06-01',
				'karyawan_id'		=> 4
			],
			[
				'notakeluar_id'		=> 5,
				'kode_nota'			=> 'EC-1890',
				'vendor'			=> 'HSRCC',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '8',
				'status_document'			=> 'Keluar',
				'tanggal_keluar'	=> '2021-06-01',
				'karyawan_id'		=> 4
			],
			[
				'notakeluar_id'		=> 6,
				'kode_nota'			=> 'EC-1891',
				'vendor'			=> 'HSRCC',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '10',
				'status_document'			=> 'Keluar',
				'tanggal_keluar'	=> '2021-05-31',
				'karyawan_id'		=> 4
			],
			[
				'notakeluar_id'		=> 7,
				'kode_nota'			=> 'EC-1892',
				'vendor'			=> 'HSRCC',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '8',
				'status_document'			=> 'Keluar',
				'tanggal_keluar'	=> '2021-05-31',
				'karyawan_id'		=> 4
			],
			[
				'notakeluar_id'		=> 8,
				'kode_nota'			=> 'EC-1893',
				'vendor'			=> 'HSRCC',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '8',
				'status_document'			=> 'Keluar',
				'tanggal_keluar'	=> '2021-05-31',
				'karyawan_id'		=> 4
			],
			[
				'notakeluar_id'		=> 9,
				'kode_nota'			=> 'EC-1894',
				'vendor'			=> 'HSRCC',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '10',
				'status_document'			=> 'Keluar',
				'tanggal_keluar'	=> '2021-05-30',
				'karyawan_id'		=> 4
			],
			[
				'notakeluar_id'		=> 10,
				'kode_nota'			=> 'EC-1895',
				'vendor'			=> 'HSRCC',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '10',
				'status_document'			=> 'Keluar',
				'tanggal_keluar'	=> '2021-05-30',
				'karyawan_id'		=> 4
			],
			[
				'notakeluar_id'		=> 11,
				'kode_nota'			=> 'EC-1896',
				'vendor'			=> 'HSRCC',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '8',
				'status_document'			=> 'Keluar',
				'tanggal_keluar'	=> '2021-05-30',
				'karyawan_id'		=> 4
			],
			[
				'notakeluar_id'		=> 12,
				'kode_nota'			=> 'EC-1897',
				'vendor'			=> 'HSRCC',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '10',
				'status_document'			=> 'Keluar',
				'tanggal_keluar'	=> '2021-05-29',
				'karyawan_id'		=> 4
			],
			[
				'notakeluar_id'		=> 13,
				'kode_nota'			=> 'EC-1898',
				'vendor'			=> 'HSRCC',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '8',
				'status_document'			=> 'Keluar',
				'tanggal_keluar'	=> '2021-05-29',
				'karyawan_id'		=> 4
			],
			[
				'notakeluar_id'		=> 14,
				'kode_nota'			=> 'EC-1900',
				'vendor'			=> 'HSRCC',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '10',
				'status_document'			=> 'Keluar',
				'tanggal_keluar'	=> '2021-05-29',
				'karyawan_id'		=> 4
			],
			[
				'notakeluar_id'		=> 15,
				'kode_nota'			=> 'EC-1991',
				'vendor'			=> 'HSRCC',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '8',
				'status_document'			=> 'Keluar',
				'tanggal_keluar'	=> '2021-05-28',
				'karyawan_id'		=> 4
			],
			[
				'notakeluar_id'		=> 16,
				'kode_nota'			=> 'EC-1992',
				'vendor'			=> 'HSRCC',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '10',
				'status_document'			=> 'Keluar',
				'tanggal_keluar'	=> '2021-05-28',
				'karyawan_id'		=> 4
			],
			[
				'notakeluar_id'		=> 17,
				'kode_nota'			=> 'EC-1993',
				'vendor'			=> 'HSRCC',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '8',
				'status_document'			=> 'Keluar',
				'tanggal_keluar'	=> '2021-05-28',
				'karyawan_id'		=> 4
			],
			[
				'notakeluar_id'		=> 18,
				'kode_nota'			=> 'EC-1994',
				'vendor'			=> 'HSRCC',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '8',
				'status_document'			=> 'Keluar',
				'tanggal_keluar'	=> '2021-05-27',
				'karyawan_id'		=> 4
			],
			[
				'notakeluar_id'		=> 19,
				'kode_nota'			=> 'EC-1995',
				'vendor'			=> 'HSRCC',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '10',
				'status_document'			=> 'Keluar',
				'tanggal_keluar'	=> '2021-05-27',
				'karyawan_id'		=> 4
			],
			[
				'notakeluar_id'		=> 20,
				'kode_nota'			=> 'EC-1996',
				'vendor'			=> 'HSRCC',
				'nama_barang'		=> 'document',
				'jumlah_barang'		=> '10',
				'status_document'			=> 'Keluar',
				'tanggal_keluar'	=> '2021-05-27',
				'karyawan_id'		=> 4
			],


		];
		$this->db->table('notakeluar')->insertBatch($notakeluar);



		$document = [
			[
				'document_id'		=> 1,
				'kode_dokumen'			=> 'DK22+657.44',
				'document_type'			=> 'BRIDGE',
				'document_number'		=> 'JBHSR-1-RB-B-DR-004-03',
				'judul_dokumen'			=> 'CONSTRUCTION DRAWING DESIGN DK226 BRIDGE MILEAGE DK22+657.44',
				'vendor'				=> 'KJB',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'status_document'				=> 'Masuk',
				'tanggal_masuk'			=> '2021-06-08',
				'karyawan_id'			=> 2,
			],
			[
				'document_id'		=> 2,
				'kode_dokumen'			=> 'DK18+134.10-DK18+589.09',
				'document_type'			=> 'BRIDGE',
				'document_number'		=> 'JBHSR-1-RB-B-DR-004-04',
				'judul_dokumen'			=> 'CONSTRUCTION DRAWING DESIGN DK226 BRIDGE MILEAGE DK22+657.44 (DK18+134.10-DK18+589.09)',
				'vendor'				=> 'KJB',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'status_document'				=> 'Masuk',
				'tanggal_masuk'			=> '2021-06-08',
				'karyawan_id'			=> 2,
			],
			[
				'document_id'		=> 3,
				'kode_dokumen'			=> 'DIK115+244.60~DIK116+585.35',
				'document_type'			=> 'BRIDGE',
				'document_number'		=> 'JBHSR-1-RB-DR-031-01',
				'judul_dokumen'			=> 'SUPER MAJOR BRIDGE (DIK115+244.60~DIK116+585.35)',
				'vendor'				=> 'KJB',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'status_document'				=> 'Masuk',
				'tanggal_masuk'			=> '2021-06-08',
				'karyawan_id'			=> 3,
			],
			[
				'document_id'		=> 4,
				'kode_dokumen'			=> 'DK48+641.50~DK49+529.50',
				'document_type'			=> 'BRIDGE',
				'document_number'		=> 'JBHSR-1-RB-DR-008',
				'judul_dokumen'			=> 'CONSTRUCTION DRAWING DESIGN (CONSULTING EDITION) DK490 BRIDGE MILEAGE DK49+085.50',
				'vendor'				=> 'KJB',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'status_document'				=> 'Masuk',
				'tanggal_masuk'			=> '2021-06-07',
				'karyawan_id'			=> 2,
			],
			[
				'document_id'		=> 5,
				'kode_dokumen'			=> 'DK75+540~DK76+275',
				'document_type'			=> 'TUNNEL NO.3',
				'document_number'		=> 'JBHSR-1-TR-DR-03-01~08',
				'judul_dokumen'			=> 'Design Drawing of Tunnel No. 3',
				'vendor'				=> 'KJB',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'status_document'				=> 'Masuk',
				'tanggal_masuk'			=> '2021-06-06',
				'karyawan_id'			=> 4,
			],
			[
				'document_id'		=> 6,
				'kode_dokumen'			=> 'DK74+010 - DK76+895',
				'document_type'			=> 'ALIGNMENT',
				'document_number'		=> 'JBHSR-1-RL-DR-02-01-01',
				'judul_dokumen'			=> 'ALIGNMENT PLAN DK74+010 - DK76+895',
				'vendor'				=> 'KJB',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'status_document'				=> 'Masuk',
				'tanggal_masuk'			=> '2021-06-06',
				'karyawan_id'			=> 4,
			],
			[
				'document_id'		=> 7,
				'kode_dokumen'			=> 'DK75+050.00-DK75+105.16',
				'document_type'			=> 'SUBGRADE',
				'document_number'		=> 'JBHSR-1-RS-DR-11',
				'judul_dokumen'			=> 'SUBGRADE CONSTRUCTION DRAWING DK75+050.00-DK75+105.16',
				'vendor'				=> 'KJB',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'status_document'				=> 'Masuk',
				'tanggal_masuk'			=> '2021-06-06',
				'karyawan_id'			=> 4,
			],
			[
				'document_id'		=> 8,
				'kode_dokumen'			=> 'DK31+016.56~DK32+733.66',
				'document_type'			=> 'BRIDGE',
				'document_number'		=> 'JBHSR-1-RB-DR-004-06',
				'judul_dokumen'			=> 'DK226 EXTRA LARGE BRIDGE（DK31+016.56~DK32+733.66）',
				'vendor'				=> 'KJB',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'status_document'				=> 'Masuk',
				'tanggal_masuk'			=> '2021-06-06',
				'karyawan_id'			=> 2,
			],
			[
				'document_id'		=> 9,
				'kode_dokumen'			=> 'DK85+043.00~DK85+228.32',
				'document_type'			=> 'BRIDGE',
				'document_number'		=> 'JBHSR-1-RB-DR-023',
				'judul_dokumen'			=> 'DK851 LARGE BRIDGE（DK85+043.00~DK85+228.32）',
				'vendor'				=> 'KJB',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'status_document'				=> 'Masuk',
				'tanggal_masuk'			=> '2021-06-05',
				'karyawan_id'			=> 3,
			],
			[
				'document_id'		=> 10,
				'kode_dokumen'			=> 'DK96+124.03',
				'document_type'			=> 'CULVERT',
				'document_number'		=> 'JBHSR-1-RB-B-DR-004-03',
				'judul_dokumen'			=> '1-3,0m Reinforced Concrete Frame Box Culvert',
				'vendor'				=> 'KJB',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'status_document'				=> 'Masuk',
				'tanggal_masuk'			=> '2021-06-04',
				'karyawan_id'			=> 3,
			],
			[
				'document_id'		=> 11,
				'kode_dokumen'			=> 'DK22+154.44',
				'document_type'			=> 'BRIDGE',
				'document_number'		=> 'JBHSR-1-RB-B-DR-004-04',
				'judul_dokumen'			=> 'C1-3,0m Reinforced Concrete Frame Box Culvert(DK22+154.44)',
				'vendor'				=> 'KJB',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'status_document'				=> 'Masuk',
				'tanggal_masuk'			=> '2021-06-04',
				'karyawan_id'			=> 3,
			],
			[
				'document_id'		=> 12,
				'kode_dokumen'			=> 'DK87+1544.42',
				'document_type'			=> 'BRIDGE',
				'document_number'		=> 'JBHSR-1-RB-B-DR-005-03',
				'judul_dokumen'			=> 'CONSTRUCTION DRAWING DESIGN DK143 BRIDGE MILEAGE DK87+1544.44',
				'vendor'				=> 'KJB',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'status_document'				=> 'Masuk',
				'tanggal_masuk'			=> '2021-06-04',
				'karyawan_id'			=> 2,
			],
			[
				'document_id'		=> 13,
				'kode_dokumen'			=> 'DK545+654.33',
				'document_type'			=> 'BRIDGE',
				'document_number'		=> 'JBHSR-1-RB-B-DR-004-03',
				'judul_dokumen'			=> 'CONSTRUCTION DRAWING DESIGN DK142 BRIDGE MILEAGE DK545+654.33',
				'vendor'				=> 'KJB',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'status_document'				=> 'Masuk',
				'tanggal_masuk'			=> '2021-06-04',
				'karyawan_id'			=> 2,
			],
			[
				'document_id'			=> 14,
				'kode_dokumen'			=> 'DK65+432.12',
				'document_type'			=> 'SUBGRADE',
				'document_number'		=> 'JBHSR-1-RS-DR-14',
				'judul_dokumen'			=> 'SUBGRADE CONSTRUCTION DRAWING DDK65+432.12-DK75+105.16',
				'vendor'				=> 'KJB',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'status_document'		=> 'Masuk',
				'tanggal_masuk'			=> '2021-06-04',
				'karyawan_id'			=> 2,
			],
			[
				'document_id'			=> 15,
				'kode_dokumen'			=> 'DK14+541.15',
				'document_type'			=> 'SUBGRADE',
				'document_number'		=> 'JBHSR-1-RS-DR-13',
				'judul_dokumen'			=> 'SUBGRADE CONSTRUCTION DRAWING DK75+050.00-DK14+541.15',
				'vendor'				=> 'KJB',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'status_document'				=> 'Masuk',
				'tanggal_masuk'			=> '2021-06-04',
				'karyawan_id'			=> 4,
			],
			[
				'document_id'			=> 16,
				'kode_dokumen'			=> 'DK66+212.13',
				'document_type'			=> 'SUBGRADE',
				'document_number'		=> 'JBHSR-1-RS-DR-12',
				'judul_dokumen'			=> 'SUBGRADE CONSTRUCTION DRAWING DK66+212.13+105.16',
				'vendor'				=> 'KJB',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'status_document'		=> 'Masuk',
				'tanggal_masuk'			=> '2021-06-04',
				'karyawan_id'			=> 4,
			],
			[
				'document_id'			=> 17,
				'kode_dokumen'			=> 'DK78+132.45',
				'document_type'			=> 'BRIDGE',
				'document_number'		=> 'JBHSR-1-RB-B-DR-004-13',
				'judul_dokumen'			=> 'CONSTRUCTION DRAWING DESIGN DK226 BRIDGE MILEAGE DK78+132.45',
				'vendor'				=> 'KJB',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'status_document'				=> 'Masuk',
				'tanggal_masuk'			=> '2021-06-03',
				'karyawan_id'			=> 4,
			],
			[
				'document_id'			=> 18,
				'kode_dokumen'			=> 'DK154+312.44',
				'document_type'			=> 'TUNNEL NO.3',
				'document_number'		=> 'JBHSR-1-TR-DR-03-01~18',
				'judul_dokumen'			=> 'Design Drawing of Tunnel No. 3 (DK154+312.44)',
				'vendor'				=> 'KJB',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'status_document'				=> 'Masuk',
				'tanggal_masuk'			=> '2021-06-03',
				'karyawan_id'			=> 3,
			],
			[
				'document_id'		=> 19,
				'kode_dokumen'			=> 'DK154+312.44',
				'document_type'			=> 'TUNNEL NO.3',
				'document_number'		=> 'JBHSR-1-TR-DR-03-01~28',
				'judul_dokumen'			=> 'Design Drawing of Tunnel No. 3 (DK154+312.44)',
				'vendor'				=> 'KJB',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'status_document'				=> 'Masuk',
				'tanggal_masuk'			=> '2021-06-03',
				'karyawan_id'			=> 3,
			],
			[
				'document_id'		=> 20,
				'kode_dokumen'			=> 'DK14+784.16',
				'document_type'			=> 'TUNNEL NO.3',
				'document_number'		=> 'JBHSR-1-TR-DR-03-02~08',
				'judul_dokumen'			=> 'Design Drawing of Tunnel No. 3(DK14+784.16)',
				'vendor'				=> 'KJB',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'status_document'				=> 'Masuk',
				'tanggal_masuk'			=> '2021-06-03',
				'karyawan_id'			=> 3,
			],
		];
		$this->db->table('document')->insertBatch($document);

		$documentkeluar = [
			[
				'document_keluar_id'	=> 1,
				'kode_dokumen'			=> 'DK114+242.44',
				'document_type'			=> 'TUNNEL NO.3',
				'document_number'		=> 'JBHSR-1-TR-DR-03-01~10',
				'judul_dokumen'			=> 'Design Drawing of Tunnel No. 3 (DK114+242.44)',
				'nomer_box'				=> '2',
				'isi_box'				=> '10',
				'tanggal_keluar'		=> '2021-04-20',
				'vendor'				=> 'KCIC',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'approved'				=> 'Didit Mulyana',
				'jabatan'				=> 'MANAGER',
				'status_document'		=> 'Keluar',
				'karyawan_id'			=> 2

			],
			[
				'document_keluar_id'	=> 2,
				'kode_dokumen'			=> 'DK641+357.12',
				'document_type'			=> 'BRIDGE',
				'document_number'		=> 'JBHSR-1-RB-B-DR-004-05',
				'judul_dokumen'			=> 'CONSTRUCTION DRAWING DESIGN DK641 BRIDGE MILEAGE DK641+357.12',
				'nomer_box'				=> '5',
				'isi_box'				=> '10',
				'tanggal_keluar'		=> '2021-04-20',
				'vendor'				=> 'CREC',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'approved'				=> 'Didit Mulyana',
				'jabatan'				=> 'MANAGER',
				'status_document'				=> 'Keluar',
				'karyawan_id'			=> 2

			],
			[
				'document_keluar_id'	=> 3,
				'kode_dokumen'			=> 'DK631+357.12',
				'document_type'			=> 'BRIDGE',
				'document_number'		=> 'JBHSR-1-RB-B-DR-002-10',
				'judul_dokumen'			=> 'CONSTRUCTION DRAWING DESIGN DK631 BRIDGE MILEAGE DK631+357.12',
				'nomer_box'				=> '10',
				'isi_box'				=> '8',
				'tanggal_keluar'		=> '2021-04-23',
				'vendor'				=> 'CREC',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'approved'				=> 'Didit Mulyana',
				'jabatan'				=> 'MANAGER',
				'status_document'				=> 'Keluar',
				'karyawan_id'			=> 2

			],
			[
				'document_keluar_id'	=> 4,
				'kode_dokumen'			=> 'DK311+327.12',
				'document_type'			=> 'BRIDGE',
				'document_number'		=> 'JBHSR-1-RB-B-DR-002-10',
				'judul_dokumen'			=> 'CONSTRUCTION DRAWING DESIGN DK631 BRIDGE MILEAGE DK311+327.12',
				'nomer_box'				=> '8',
				'isi_box'				=> '10',
				'tanggal_keluar'		=> '2021-04-25',
				'vendor'				=> 'CREC',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'approved'				=> 'Didit Mulyana',
				'jabatan'				=> 'MANAGER',
				'status_document'				=> 'Keluar',
				'karyawan_id'			=> 2

			],
			[
				'document_keluar_id'	=> 5,
				'kode_dokumen'			=> 'DK15+432.12',
				'document_type'			=> 'SUBGRADE',
				'document_number'		=> 'JBHSR-1-RS-DR-14',
				'judul_dokumen'			=> 'SUBGRADE CONSTRUCTION DRAWING DDK45+432.12-DK15+432.12',
				'nomer_box'				=> '3',
				'isi_box'				=> '10',
				'tanggal_keluar'		=> '2021-04-27',
				'vendor'				=> 'CDJO',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'approved'				=> 'Didit Mulyana',
				'jabatan'				=> 'MANAGER',
				'status_document'				=> 'Keluar',
				'karyawan_id'			=> 2

			],
			[
				'document_keluar_id'	=> 6,
				'kode_dokumen'			=> 'DK15+432.12',
				'document_type'			=> 'SUBGRADE',
				'document_number'		=> 'JBHSR-1-RS-DR-14',
				'judul_dokumen'			=> 'SUBGRADE CONSTRUCTION DRAWING DK15+432.12',
				'nomer_box'				=> '7',
				'isi_box'				=> '10',
				'tanggal_keluar'		=> '2021-04-27',
				'vendor'				=> 'CDJO',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'approved'				=> 'Didit Mulyana',
				'jabatan'				=> 'MANAGER',
				'status_document'				=> 'Keluar',
				'karyawan_id'			=> 2

			],
			[
				'document_keluar_id'	=> 7,
				'kode_dokumen'			=> 'DK15+432.12',
				'document_type'			=> 'SUBGRADE',
				'document_number'		=> 'JBHSR-1-RS-DR-14',
				'judul_dokumen'			=> 'SUBGRADE CONSTRUCTION DRAWING DDK45+432.12-DK15+105.16',
				'nomer_box'				=> '7',
				'isi_box'				=> '10',
				'tanggal_keluar'		=> '2021-04-27',
				'vendor'				=> 'CDJO',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'approved'				=> 'Didit Mulyana',
				'jabatan'				=> 'MANAGER',
				'status_document'				=> 'Keluar',
				'karyawan_id'			=> 2

			],
			[
				'document_keluar_id'	=> 8,
				'kode_dokumen'			=> 'DK15+432.12',
				'document_type'			=> 'SUBGRADE',
				'document_number'		=> 'JBHSR-1-RS-DR-14',
				'judul_dokumen'			=> 'SUBGRADE CONSTRUCTION DRAWING DDK45+432.12-DK15+105.16',
				'nomer_box'				=> '7',
				'isi_box'				=> '10',
				'tanggal_keluar'		=> '2021-04-28',
				'vendor'				=> 'CDJO',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'approved'				=> 'Didit Mulyana',
				'jabatan'				=> 'MANAGER',
				'status_document'				=> 'Keluar',
				'karyawan_id'			=> 2

			],
			[
				'document_keluar_id'	=> 9,
				'kode_dokumen'			=> 'DK15+432.12',
				'document_type'			=> 'SUBGRADE',
				'document_number'		=> 'JBHSR-1-RS-DR-14',
				'judul_dokumen'			=> 'SUBGRADE CONSTRUCTION DRAWING DDK45+432.12-DK15+105.16',
				'nomer_box'				=> '7',
				'isi_box'				=> '10',
				'tanggal_keluar'		=> '2021-04-28',
				'vendor'				=> 'CDJO',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'approved'				=> 'Didit Mulyana',
				'jabatan'				=> 'MANAGER',
				'status_document'				=> 'Keluar',
				'karyawan_id'			=> 2

			],
			[
				'document_keluar_id'	=> 10,
				'kode_dokumen'			=> 'DK15+432.12',
				'document_type'			=> 'SUBGRADE',
				'document_number'		=> 'JBHSR-1-RS-DR-14',
				'judul_dokumen'			=> 'SUBGRADE CONSTRUCTION DRAWING DDK45+432.12-DK15+105.16',
				'nomer_box'				=> '7',
				'isi_box'				=> '10',
				'tanggal_keluar'		=> '2021-04-29',
				'vendor'				=> 'CDJO',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'approved'				=> 'Didit Mulyana',
				'jabatan'				=> 'MANAGER',
				'status_document'				=> 'Keluar',
				'karyawan_id'			=> 2

			],
			[
				'document_keluar_id'	=> 11,
				'kode_dokumen'			=> 'DK74+010 - DK76+895',
				'document_type'			=> 'ALIGNMENT',
				'document_number'		=> 'JBHSR-1-RL-DR-02-01-01',
				'judul_dokumen'			=> 'ALIGNMENT PLAN DK74+010 - DK76+895',
				'nomer_box'				=> '2',
				'isi_box'				=> '8',
				'tanggal_keluar'		=> '2021-05-29',
				'vendor'				=> 'CRDC',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'approved'				=> 'Didit Mulyana',
				'jabatan'				=> 'MANAGER',
				'status_document'				=> 'Keluar',
				'karyawan_id'			=> 2

			],
			[
				'document_keluar_id'	=> 12,
				'kode_dokumen'			=> 'DK74+010 - DK76+895',
				'document_type'			=> 'ALIGNMENT',
				'document_number'		=> 'JBHSR-1-RL-DR-02-01-01',
				'judul_dokumen'			=> 'ALIGNMENT PLAN DK74+010 - DK76+895',
				'nomer_box'				=> '2',
				'isi_box'				=> '8',
				'tanggal_keluar'		=> '2021-05-29',
				'vendor'				=> 'CRDC',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'approved'				=> 'Didit Mulyana',
				'jabatan'				=> 'MANAGER',
				'status_document'				=> 'Keluar',
				'karyawan_id'			=> 2

			],
			[
				'document_keluar_id'	=> 13,
				'kode_dokumen'			=> 'DK74+010 - DK76+895',
				'document_type'			=> 'ALIGNMENT',
				'document_number'		=> 'JBHSR-1-RL-DR-02-01-01',
				'judul_dokumen'			=> 'ALIGNMENT PLAN DK74+010 - DK76+895',
				'nomer_box'				=> '2',
				'isi_box'				=> '8',
				'tanggal_keluar'		=> '2021-05-30',
				'vendor'				=> 'CRDC',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'approved'				=> 'Didit Mulyana',
				'jabatan'				=> 'MANAGER',
				'status_document'		=> 'Keluar',
				'karyawan_id'			=> 2

			],
			[
				'document_keluar_id'	=> 14,
				'kode_dokumen'			=> 'DK96+124.03',
				'document_type'			=> 'CULVERT',
				'document_number'		=> 'JBHSR-1-RB-B-DR-004-03',
				'judul_dokumen'			=> '1-3,0m Reinforced Concrete Frame Box Culvert',
				'nomer_box'				=> '2',
				'isi_box'				=> '8',
				'tanggal_keluar'		=> '2021-05-30',
				'vendor'				=> 'CRDC',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'approved'				=> 'Didit Mulyana',
				'jabatan'				=> 'MANAGER',
				'status_document'		=> 'Keluar',
				'karyawan_id'			=> 2

			],
			[
				'document_keluar_id'	=> 15,
				'kode_dokumen'			=> 'DK96+124.03',
				'document_type'			=> 'CULVERT',
				'document_number'		=> 'JBHSR-1-RB-B-DR-005-08',
				'judul_dokumen'			=> '1-3,0m Reinforced Concrete Frame Box Culvert',
				'nomer_box'				=> '2',
				'isi_box'				=> '8',
				'tanggal_keluar'		=> '2021-05-31',
				'vendor'				=> 'CRDC',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'approved'				=> 'Didit Mulyana',
				'jabatan'				=> 'MANAGER',
				'status_document'		=> 'Keluar',
				'karyawan_id'			=> 2

			],
			[
				'document_keluar_id'	=> 16,
				'kode_dokumen'			=> 'DK96+124.03',
				'document_type'			=> 'CULVERT',
				'document_number'		=> 'JBHSR-1-RB-B-DR-005-13',
				'judul_dokumen'			=> '1-3,0m Reinforced Concrete Frame Box Culvert',
				'nomer_box'				=> '2',
				'isi_box'				=> '8',
				'tanggal_keluar'		=> '2021-05-31',
				'vendor'				=> 'CRDC',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'approved'				=> 'Didit Mulyana',
				'jabatan'				=> 'MANAGER',
				'status_document'				=> 'Keluar',
				'karyawan_id'			=> 2

			],
			[
				'document_keluar_id'	=> 17,
				'kode_dokumen'			=> 'DK18+134.10-DK18+589.09',
				'document_type'			=> 'BRIDGE',
				'document_number'		=> 'JBHSR-1-RB-B-DR-005-12',
				'judul_dokumen'			=> 'CONSTRUCTION DRAWING DESIGN DK226 BRIDGE MILEAGE DK22+657.44 (DK18+134.10-DK18+589.09)',
				'nomer_box'				=> '2',
				'isi_box'				=> '8',
				'tanggal_keluar'		=> '2021-05-01',
				'vendor'				=> 'CDJO',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'approved'				=> 'Didit Mulyana',
				'jabatan'				=> 'MANAGER',
				'status_document'		=> 'Keluar',
				'karyawan_id'			=> 2

			],
			[
				'document_keluar_id'	=> 18,
				'kode_dokumen'			=> 'DK18+134.10-DK18+589.09',
				'document_type'			=> 'BRIDGE',
				'document_number'		=> 'JBHSR-1-RB-B-DR-005-16',
				'judul_dokumen'			=> 'CONSTRUCTION DRAWING DESIGN DK226 BRIDGE MILEAGE DK22+657.44 (DK18+134.10-DK18+589.09)',
				'nomer_box'				=> '2',
				'isi_box'				=> '8',
				'tanggal_keluar'		=> '2021-05-01',
				'vendor'				=> 'CDJO',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'approved'				=> 'Didit Mulyana',
				'jabatan'				=> 'MANAGER',
				'status_document'		=> 'Keluar',
				'karyawan_id'			=> 2

			],
			[
				'document_keluar_id'	=> 19,
				'kode_dokumen'			=> 'DK10+114.19-DK18+589.09',
				'document_type'			=> 'BRIDGE',
				'document_number'		=> 'JBHSR-1-RB-B-DR-005-13',
				'judul_dokumen'			=> 'CONSTRUCTION DRAWING DESIGN DK226 BRIDGE MILEAGE DK10+114.19',
				'nomer_box'				=> '2',
				'isi_box'				=> '8',
				'tanggal_keluar'		=> '2021-05-02',
				'vendor'				=> 'CDJO',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'approved'				=> 'Didit Mulyana',
				'jabatan'				=> 'MANAGER',
				'status_document'		=> 'Keluar',
				'karyawan_id'			=> 2

			],
			[
				'document_keluar_id'	=> 20,
				'kode_dokumen'			=> 'DK17+124.12-DK17+185.09',
				'document_type'			=> 'BRIDGE',
				'document_number'		=> 'JBHSR-1-RB-B-DR-005-14',
				'judul_dokumen'			=> 'CONSTRUCTION DRAWING DESIGN DK226 BRIDGE MILEAGE DK17+124.12',
				'nomer_box'				=> '5',
				'isi_box'				=> '10',
				'tanggal_keluar'		=> '2021-05-02',
				'vendor'				=> 'CDJO',
				'bahasa'				=> 'ENGLISH & CHINESE',
				'approved'				=> 'Didit Mulyana',
				'jabatan'				=> 'MANAGER',
				'status_document'		=> 'Keluar',
				'karyawan_id'			=> 2

			],
		];

		$this->db->table('documentkeluar')->insertBatch($documentkeluar);


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
			
		// data elektronik 
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