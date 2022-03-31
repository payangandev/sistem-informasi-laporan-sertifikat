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


	// validasi untuk  setiap field yang ada di base 
	public $iso = [
		'perusahaan_id'     	=> 'required',
		'kode_iso'     			=> 'required',
		'tanggal_terbit'   		=> 'required',
		'survailance_one'   	=> 'required',
		'survailance_two'   	=> 'required',
		'tanggal_berakhir'   	=> 'required',
		'tanggal_proses'   		=> 'required',
		'tanggal_selesai'   	=> 'required',
		'no_resi'   			=> 'required',
		'marketing'   			=> 'required',
		'harga_jual'   			=> 'required',
	];

	public $iso_errors = [

		'perusahaan_id'     	=> [
			'required'			=> 'Nama Perusahaan Required'
		],

		'kode_iso'    			=> [
			'required'			=> 'Kode Iso Required'
		],

		'tanggal_terbit'   		=> [
			'required'			=> 'Tanggal Terbit Required'
		],
		'survailance_one'   	=>  [
			'required'			=> 'Survailance 1 Required'
		],
		'survailance_two'   	=>  [
			'required'			=> 'Survailance 2 Required'
		],
		'tanggal_berakhir'   	=>  [
			'required'			=> 'Tanggal Berakhir Required'
		],
		'tanggal_proses'   		=>  [
			'required'			=> 'Tanggal Proses Required'
		],
		'tanggal_selesai'   	=>  [
			'required'			=> 'Tanggal Selesai Required'
		],
		'no_resi'   			=>  [
			'required'			=> 'No Resi Required'
		],
		'marketing'   			=>  [
			'required'			=> 'Marketing Required'
		],
		'harga_jual'   			=>  [
			'required'			=> 'Harga Jual Required'
		],
	];


	// validasi untuk  setiap field yang ada di base 
	public $ktiga = [
		'nama_personil'     	=> 'required',
		'sub_bidang'     		=> 'required',
		'perusahaan_id'   		=> 'required',
		'harga_setor'   		=> 'required',
		'order_lencana'   		=> 'required',
		'harga_jual'   			=> 'required',
		'tanggal_proses'   		=> 'required',
		'marketing'   			=> 'required',
		'tanggal_selesai'   	=> 'required',
		'no_resi'   			=> 'required',


	];

	public $ktiga_errors = [

		'nama_personil'     => [
			'required'		=> 'Nama Personil Required'
		],

		'sub_bidang'    	=> [
			'required'		=> 'Bidang Required'
		],

		'perusahaan_id'   	=> [
			'required'		=> 'Perusahaan Required'
		],
		'harga_setor'   	=>  [
			'required'		=> 'Harga Setor Required'
		],
		'order_lencana'   	=>  [
			'required'		=> 'Order Lencana Required'
		],
		'harga_jual'   		=>  [
			'required'		=> 'Harga Jual Required'
		],
		'tanggal_proses'   	=>  [
			'required'		=> 'Tanggal Proses Required'
		],
		'marketing'   		=>  [
			'required'		=> 'Marketing  Required'
		],
		'tanggal_selesai'   =>  [
			'required'		=> 'Tanggal Selesai Required'
		],
		'no_resi'   		=>  [
			'required'		=> 'No Resi Required'
		],

	];


	// validasi untuk  setiap field yang ada di base 
	public $perusahaan = [
		'nama_perusahaan'		=> 'required',
		'tanggal_input'     	=> 'required',
	];

	public $perusahaan_errors = [

		'nama_perusahaan'   => [
			'required'		=> 'Nama Perusahaan Required'
		],
		'tanggal_input'   	=> [
			'required'		=> 'Tanggal Input Required'
		],
	];


	// validasi untuk  setiap field yang ada di base 
	public $skt = [
		'karyawan_id'		=> 'required',
		'nama'     			=> 'required',
		'kode'     			=> 'required',
		'tanggal_input'   	=> 'required',
	];

	public $skt_errors = [

		'nama'     			=> [
			'required'		=> 'Nama Required'
		],
		'kode'    			=> [
			'required'		=> 'Kode Required'
		],
		'tanggal_input'   	=> [
			'required'		=> 'Tanggal Input Required'
		],
		'karyawan_id'   	=>  [
			'required'		=> 'Staff Required'
		]
	];



	// validasi untuk  setiap field yang ada di base 
	public $ska = [
		'karyawan_id'		=> 'required',
		'nama'     			=> 'required',
		'kode'     			=> 'required',
		'tanggal_input'   	=> 'required',
	];

	public $ska_errors = [

		'nama'     			=> [
			'required'		=> 'Nama Required'
		],
		'kode'    			=> [
			'required'		=> 'Kode Required'
		],
		'tanggal_input'   	=> [
			'required'		=> 'Tanggal Input Required'
		],
		'karyawan_id'   	=>  [
			'required'		=> 'Staff Required'
		]
	];

// validasi untuk  karyawan

	public $karyawan = [
		'nama_karyawan'     	=> 'required',
		'divisi'   				=> 'required',
		'jabatan'   			=> 'required',
		'status'   				=> 'required',
		'tanggalmasuk'   		=> 'required',



	];

	public $karyawan_errors = [

		'nama_karyawan'    	=> [
			'required'		=> 'Nama Karyawan Required'
		],

		'divisi'   			=> [
			'required'		=> 'Divisi Required'
		],
		'jabatan'   		=>  [
			'required'		=> 'Vendor Required'
		],
		'status'   			=>  [
			'required'		=> 'Status  Required'
		],
		'tanggalmasuk'   	=>  [
			'required'		=> 'Tanggal Join Required'
		]
	];



	// validasi untuk  setiap field yang ada di base 
	public $users = [
		'nama_user'			=> 'required',
		'username'     		=> 'required',
		'password'     		=> 'required',
		'level'   			=> 'required',

	];

	public $users_errors = [

		'nama_user'     	=> [
			'required'		=> 'Nama Users Required'
		],
		'username'     			=> [
			'required'		=> 'Username Required'
		],
		'password'   		=> [
			'required'		=> 'Password Required'
		],
		'level'   			=>  [
			'required'		=> 'Level Users Required'
		]
	];
}
