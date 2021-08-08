<?php

namespace App\Controllers;

use App\Models\DashboardModel;

class Home extends BaseController
{
	public function __construct()
	{
		$this->dashboard_model = new DashboardModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}


		$data['total_user']       		= $this->dashboard_model->getCountUser();
		$data['total_documentmasuk']    = $this->dashboard_model->getCountDocumentMasuk();
		$data['total_documentkeluar']   = $this->dashboard_model->getCounDocumentKeluar();
		$data['total_notamasuk']        = $this->dashboard_model->getCountNotaMasuk();
		$data['total_notakeluar']       = $this->dashboard_model->getCountNotaKeluar();
		$data['total_karyawan']         = $this->dashboard_model->getCountKaryawan();



		return view('dashboard',  $data);
	}
}
