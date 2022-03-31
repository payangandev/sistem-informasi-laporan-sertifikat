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

		$data['data_user']       	= $this->dashboard_model->getCountUser();
		$data['data_ktiga']    		= $this->dashboard_model->getCountKtiga();
		$data['data_iso']   		= $this->dashboard_model->getCountIso();
		$data['data_perusahaan']    = $this->dashboard_model->getCountPerusahaan();
		$data['data_ska']       	= $this->dashboard_model->getCountSka();
		$data['data_karyawan']     = $this->dashboard_model->getCountKaryawan();
		$data['data_skt']			= $this->dashboard_model->getCountSkt();

		return view('dashboard',  $data);
	}
}
