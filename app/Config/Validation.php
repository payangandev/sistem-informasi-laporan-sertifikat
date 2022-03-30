<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------


	// validasi untuk  setiap field yang ada di Database 
	public $documentkeluar = [
		'kode_dokumen'     			=> 'required',
		'document_type'     		=> 'required',
		'document_number'   		=> 'required',
		'judul_dokumen'   			=> 'required',
		'nomer_box'   				=> 'required',
		'isi_box'   				=> 'required',
		'tanggal_keluar'   			=> 'required',
		'vendor'   					=> 'required',
		'bahasa'   					=> 'required',
		'approved'   				=> 'required',
		'jabatan'   				=> 'required',
		'status_document'   		=> 'required',
		'karyawan_id'   			=> 'required',


	];

	public $documentkeluar_errors = [

		'kode_dokumen'     	=> [
			'required'		=> 'Kode Dokumen Wajib Di isi'
		],

		'document_type'    	=> [
			'required'		=> 'Data dokumen Type Wajib Di isi'
		],

		'document_number'   => [
			'required'		=> 'Data dokumen Kode Wajib Di isi'
		],
		'judul_dokumen'   	=>  [
			'required'		=> 'Data judul dokumen Wajib Di isi'
		],
		'nomer_box'   		=>  [
			'required'		=> 'Data Nomer Box Wajib Di isi'
		],
		'isi_box'   		=>  [
			'required'		=> 'Data isi Box Wajib Di isi'
		],
		'tanggal_keluar'   	=>  [
			'required'		=> 'Data Tanggal Keluar Document Wajib Di isi'
		],
		'vendor'   			=>  [
			'required'		=> 'Data Vendor Wajib Di isi'
		],
		'bahasa'   			=>  [
			'required'		=> 'Data Bahasa Wajib Di isi'
		],
		'approved'   		=>  [
			'required'		=> 'Data Approved Wajib Di isi'
		],
		'jabatan'   		=>  [
			'required'		=> 'Data Jabatan Wajib Di isi'
		],

		'status_document'   =>  [
			'required'		=> 'Data status_document  Document Wajib Di isi'
		],
		'karyawan_id'   	=>  [
			'required'		=> 'Data Penanggung Jawab Document Wajib Di isi'
		]

	];





	// validasi untuk  setiap field yang ada di Database 
	public $documentmasuk = [
		'kode_dokumen'     			=> 'required',
		'document_type'     		=> 'required',
		'document_number'   		=> 'required',
		'judul_dokumen'   			=> 'required',
		'vendor'   					=> 'required',
		'bahasa'   					=> 'required',
		'status_document'   		=> 'required',
		'tanggal_masuk'   			=> 'required',
		'karyawan_id'   			=> 'required',

	];

	public $documentmasuk_errors = [

		'kode_dokumen'     	=> [
			'required'		=> 'Kode Dokumen Wajib Di isi'
		],

		'document_type'    => [
			'required'		=> 'Data document Type Wajib Di isi'
		],

		'document_number'   	=> [
			'required'		=> 'Data document Kode Wajib Di isi'
		],
		'judul_dokumen'   	=>  [
			'required'		=> 'Data Judul Dokumen Wajib Di isi'
		],
		'vendor'   		=>  [
			'required'		=> 'Data Vendor Wajib Di isi'
		],
		'bahasa'   		=>  [
			'required'		=> 'Data Bahasa Wajib Di isi'
		],
		'tanggal_masuk'   	=>  [
			'required'		=> 'Data Tanggal Masuk Document Wajib Di isi'
		],
		'status_document'   	=>  [
			'required'		=> 'Data status_document  Document Wajib Di isi'
		],
		'karyawan_id'   	=>  [
			'required'		=> 'Data Penanggung Jawab Document Wajib Di isi'
		],

	];




	// validasi untuk  setiap field yang ada di Database 
	public $notamasuk = [
		'karyawan_id'		=> 'required',
		'kode_nota'     	=> 'required',
		'vendor'     		=> 'required',
		'nama_barang'   	=> 'required',
		'jumlah_barang'   	=> 'required',
		'status_document'   => 'required',
		'tanggal_masuk'   	=> 'required',


	];

	public $notamasuk_errors = [

		'kode_nota'     	=> [
			'required'		=> 'Kode Nota Wajib Di isi'
		],

		'nama_barang'    => [
			'required'		=> 'Nama Barang Wajib Di isi'
		],

		'jumlah_barang'   	=> [
			'required'		=> 'Jumlah Barang Wajib Di isi'
		],
		'vendor'   		=>  [
			'required'		=> 'Data Vendor Wajib Di isi'
		],
		'tanggal_keluar'   	=>  [
			'required'		=> 'Data Tanggal keluar nota Wajib Di isi'
		],
		'status_document'   	=>  [
			'required'		=> 'Data status_document nota Wajib Di isi'
		],
		'karyawan_id'   	=>  [
			'required'		=> 'Data Penanggung Jawab nota Wajib Di isi'
		]
	];




	// validasi untuk  setiap field yang ada di Database 
	public $notakeluar = [
		'karyawan_id'		=> 'required',
		'kode_nota'     	=> 'required',
		'vendor'     		=> 'required',
		'nama_barang'   	=> 'required',
		'jumlah_barang'   	=> 'required',
		'status_document'   => 'required',
		'tanggal_keluar'   	=> 'required',


	];

	public $notakeluar_errors = [

		'kode_nota'     	=> [
			'required'		=> 'Kode Nota Wajib Di isi'
		],

		'nama_barang'    => [
			'required'		=> 'Nama Barang Wajib Di isi'
		],

		'jumlah_barang'   	=> [
			'required'		=> 'Jumlah Barang Wajib Di isi'
		],
		'vendor'   		=>  [
			'required'		=> 'Data Vendor Wajib Di isi'
		],
		'tanggal_keluar'   	=>  [
			'required'		=> 'Data Tanggal keluar nota Wajib Di isi'
		],
		'status_document'   	=>  [
			'required'		=> 'Data status_document nota Wajib Di isi'
		],
		'karyawan_id'   	=>  [
			'required'		=> 'Data Penanggung Jawab nota Wajib Di isi'
		]
	];

// validasi untuk data karyawan

	public $karyawan = [
		'nama_karyawan'     	=> 'required',
		'divisi'   				=> 'required',
		'jabatan'   			=> 'required',
		'status'   				=> 'required',
		'tanggalmasuk'   		=> 'required',



	];

	public $karyawan_errors = [

		'nama_karyawan'    	=> [
			'required'		=> 'Nama Barang Wajib Di isi'
		],

		'divisi'   			=> [
			'required'		=> 'Jumlah Barang Wajib Di isi'
		],
		'jabatan'   		=>  [
			'required'		=> 'Data Vendor Wajib Di isi'
		],
		'status'   			=>  [
			'required'		=> 'Data status_document nota Wajib Di isi'
		],
		'tanggalmasuk'   	=>  [
			'required'		=> 'Data Penanggung Jawab nota Wajib Di isi'
		]
	];



	// validasi untuk  setiap field yang ada di Database 
	public $users = [
		'nama_user'			=> 'required',
		'username'     		=> 'required',
		'password'     		=> 'required',
		'level'   			=> 'required',

	];

	public $users_errors = [

		'nama_user'     	=> [
			'required'		=> 'Nama Users Wajib Di isi'
		],
		'username'     			=> [
			'required'		=> 'Username Wajib Di isi'
		],
		'password'   		=> [
			'required'		=> 'Password Wajib Di isi'
		],
		'level'   			=>  [
			'required'		=> ' Level status_document Wajib Di isi'
		]
	];
}
