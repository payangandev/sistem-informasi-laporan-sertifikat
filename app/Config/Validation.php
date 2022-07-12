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

		// validasi penyerahan untuk  setiap field yang ada di base 
		public $penyerahan = [
			'tanggal_penerimaan'     				=> 'required',
			'bukti_penerimaan'     => 'required',
			'proggress' 			=> 'required',
			'client_id'   		=> 'required',
		];
	
		public $penyerahan_errors = [
	
			'tanggal_penerimaan'    => [
				'required'			=> 'Tanggal Penerimaan  Required'
			],
	
			'bukti_penerimaan'    	=> [
				'required'			=> 'Bukti Penerimaan Required'
			],
	
			'proggress'   			=> [
				'required'			=> 'Proggress Required'
			],
	
			'client_id'   			=> [
				'required'			=> 'Nama Perusahaan Required'
			]
			
		];
	// validasi penerimaan untuk  setiap field yang ada di base 
	public $penerimaan = [
		'nama'     				=> 'required',
		'kode_iso'     			=> 'required',
		'tanggal_terbit'   		=> 'required',
	];

	public $penerimaan_errors = [

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
	public $client = [
		'nama'				=> 'required',
		'email'     		=> 'required',		
		'alamat'     		=> 'required',
		'telephone'     	=> 'required',
	];

	public $client_errors = [

		'nama'   => [
			'required'		=> 'Nama Client Required'
		],
		'email'   => [
			'required'		=> 'Email RCequired'
		],
		'alamat'   => [
			'required'		=> 'Alamat Required'
		],
		'telephone'   => [
			'required'		=> 'Telephone Required'
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

	// validasi untuk  setiap field yang ada di base 
	public $arsip = [
		'client_id'					=> 'required',
		'nama_karyawan'     		=> 'required',
		'type_sertifikat'     		=> 'required',
		'status'   					=> 'required',
		'description'   			=> 'required',

	];

	public $arsip_errors = [

		'client_id'     	=> [
			'required'		=> 'Perusahaan Required'
		],
		'nama_karyawan'     	=> [
			'required'		=> 'nama Required'
		],
		'type_sertifikat'   => [
			'required'		=> 'Type sertifikat Required'
		],
		'status'   			=>  [
			'required'		=> 'Status Required'
		],
		'description'   			=>  [
			'required'		=> 'Description Required'
		]
	];
}
