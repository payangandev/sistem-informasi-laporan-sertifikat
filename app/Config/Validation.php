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
		'nama'     				=> 'required',
		'kode_iso'     			=> 'required',
		'tanggal_terbit'   		=> 'required',
	];

	public $iso_errors = [

		'nama'     	=> [
			'required'			=> 'Nama  Required'
		],

		'kode_iso'    			=> [
			'required'			=> 'Kode Iso Required'
		],

		'tanggal_terbit'   		=> [
			'required'			=> 'Tanggal Terbit Required'
		]
	];


	// validasi untuk  setiap field yang ada di base 
	public $ktiga = [
		'nama'     		=> 'required',
		'tanggal_terbit'   		=> 'required',
	];

	public $ktiga_errors = [

		'nama'     => [
			'required'		=> 'Nama Required'
		],
		'tanggal_terbit'   	=> [
			'required'		=> 'Tanggal Terbit Required'
		]
	];


	// validasi untuk  setiap field yang ada di base 
	public $perusahaan = [
		'nama_perusahaan'		=> 'required',
	];

	public $perusahaan_errors = [

		'nama_perusahaan'   => [
			'required'		=> 'Nama Perusahaan Required'
		]
	];


	// validasi untuk  setiap field yang ada di base 
	public $skt = [
		'nama'     			=> 'required',
		'tanggal_terbit'   	=> 'required',
	];

	public $skt_errors = [

		'nama'     			=> [
			'required'		=> 'Nama Required'
		],
		'tanggal_terbit'   	=> [
			'required'		=> 'Tanggal Terbit Required'
		]
	];


	// validasi untuk  setiap field yang ada di base 
	public $ska = [
		'nama'     			=> 'required',
		'tanggal_terbit'   	=> 'required',
	];

	public $ska_errors = [

		'nama'     			=> [
			'required'		=> 'Nama Required'
		],
		'tanggal_terbit'   	=> [
			'required'		=> 'Tanggal Terbit Required'
		]
	];

	// validasi untuk  karyawan

	public $karyawan = [
		'nama_karyawan'     	=> 'required',
		'jabatan'   			=> 'required',
		'status'   				=> 'required',
		'tanggalmasuk'   		=> 'required',
	];

	public $karyawan_errors = [

		'nama_karyawan'    	=> [
			'required'		=> 'Nama Karyawan Required'
		],
		'jabatan'   		=>  [
			'required'		=> 'Jabatan Required'
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
