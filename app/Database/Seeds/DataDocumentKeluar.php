<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataDocumentKeluar extends Seeder
{
	public function run()
	{
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
				'status_document'		=> 'Keluar',
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
				'status_document'		=> 'Keluar',
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
				'status_document'		=> 'Keluar',
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
				'status_document'		=> 'Keluar',
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
				'status_document'		=> 'Keluar',
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
				'status_document'		=> 'Keluar',
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
				'status_document'		=> 'Keluar',
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
				'status_document'		=> 'Keluar',
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
				'status_document'		=> 'Keluar',
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
				'status_document'		=> 'Keluar',
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
				'status_document'		=> 'Keluar',
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

	}
}
