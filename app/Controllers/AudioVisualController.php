<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AudioVisualController extends BaseController
{
	public function __construct()
	{
		helper(['form']);
		$this->karyawan_model = new KaryawanModel();
		$this->audiovisual_model = new AudioVisualModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_audiovisual') ? $this->request->getVar('page_audiovisual') : 1;

		// paginate
		$paginate = 1000000;
		$data['audiovisual']   = $this->audiovisual_model->join('karyawan', 'karyawan.karyawan_id = audiovisual.karyawan_id')->paginate($paginate, 'audiovisual');
		$data['pager']        = $this->audiovisual_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('audiovisual/index', $data);
	}

	public function laporan()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_audiovisual') ? $this->request->getVar('page_audiovisual') : 1;

		// paginate
		$paginate = 1000000;
		$data['audiovisual']   = $this->audiovisual_model->join('karyawan', 'karyawan.karyawan_id = audiovisual.karyawan_id')->paginate($paginate, 'audiovisual');
		$data['pager']        = $this->audiovisual_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('audiovisual/laporan', $data);
	}


	public function create()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$karyawan = $this->karyawan_model->findAll();
		$data['karyawan'] = ['' => 'karyawan'] + array_column($karyawan, 'nama_karyawan', 'karyawan_id');
		return view('audiovisual/create', $data);
	}

	public function store()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$validation =  \Config\Services::validation();
		$data = array(
			'kode_nota'        		=> $this->request->getPost('kode_nota'),
			'vendor'    			=> $this->request->getPost('vendor'),
			'nama_barang'         	=> $this->request->getPost('nama_barang'),
			'jumlah_barang'         => $this->request->getPost('jumlah_barang'),
			'status_document'       => $this->request->getPost('status_document'),
			'tanggal_keluar'        => $this->request->getPost('tanggal_keluar'),
			'karyawan_id'        	=> $this->request->getPost('karyawan_id'),

		);

		if ($validation->run($data, 'audiovisual') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('audiovisual/create'));
		} else {
			// insert
			$simpan = $this->audiovisual_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Tambah Data Nota Keluar Berhasil');
				return redirect()->to(base_url('audiovisual'));
			}
		}
	}


	public function edit($id)
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$karyawan = $this->karyawan_model->findAll();
		$data['karyawan'] = ['' => 'Pilih karyawan'] + array_column($karyawan, 'nama_karyawan', 'karyawan_id');
		$data['audiovisual'] = $this->audiovisual_model->getData($id);
		echo view('audiovisual/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('audiovisual_id');

		$validation =  \Config\Services::validation();

		$data = array(
			'kode_nota'        		=> $this->request->getPost('kode_nota'),
			'vendor'    			=> $this->request->getPost('vendor'),
			'nama_barang'         	=> $this->request->getPost('nama_barang'),
			'jumlah_barang'         => $this->request->getPost('jumlah_barang'),
			'status_document'       => $this->request->getPost('status_document'),
			'tanggal_keluar'        => $this->request->getPost('tanggal_keluar'),
			'karyawan_id'        	=> $this->request->getPost('karyawan_id'),

		);
		if ($validation->run($data, 'audiovisual') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('audiovisual/edit/' . $id));
		} else {
			$ubah = $this->audiovisual_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Update Data Nota Keluar Berhasil');
				return redirect()->to(base_url('audiovisual'));
			}
		}
	}
	public function delete($id)
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$hapus = $this->audiovisual_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Data Nota Keluar Berhasil');
			return redirect()->to(base_url('audiovisual'));
		}
	}
}
