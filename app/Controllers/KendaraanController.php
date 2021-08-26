<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KaryawanModel;
use App\Models\KendaraanModel;

class KendaraanController extends BaseController
{
	public function __construct()
	{
		helper(['form']);
		$this->karyawan_model = new KaryawanModel();
		$this->kendaraan_model = new KendaraanModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_kendaraan') ? $this->request->getVar('page_kendaraan') : 1;

		// paginate
		$paginate = 1000000;
		$data['kendaraan']   = $this->kendaraan_model->join('karyawan', 'karyawan.karyawan_id = kendaraan.karyawan_id')->paginate($paginate, 'kendaraan');
		$data['pager']        = $this->kendaraan_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('kendaraan/index', $data);
	}

	public function laporan()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_kendaraan') ? $this->request->getVar('page_kendaraan') : 1;

		// paginate
		$paginate = 1000000;
		$data['kendaraan']   = $this->kendaraan_model->join('karyawan', 'karyawan.karyawan_id = kendaraan.karyawan_id')->paginate($paginate, 'kendaraan');
		$data['pager']        = $this->kendaraan_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('kendaraan/laporan', $data);
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
		return view('kendaraan/create', $data);
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
			'tanggal_masuk'        	=> $this->request->getPost('tanggal_masuk'),
			'kode_inventaris'    	=> $this->request->getPost('kode_inventaris'),
			'nama_item'         	=> $this->request->getPost('nama_item'),
			'merek'         		=> $this->request->getPost('merek'),
			'satuan'       			=> $this->request->getPost('satuan'),
			'harga'        			=> $this->request->getPost('harga'),
			'jumlah'        		=> $this->request->getPost('jumlah'),
			'kondisi'        		=> $this->request->getPost('kondisi'),
			'keterangan'        	=> $this->request->getPost('keterangan'),
			'karyawan_id'        	=> $this->request->getPost('karyawan_id'),

		);

		if ($validation->run($data, 'kendaraan') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('kendaraan/create'));
		} else {
			// insert
			$simpan = $this->kendaraan_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Tambah Data Berhasil');
				return redirect()->to(base_url('kendaraan'));
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
		$data['kendaraan'] = $this->kendaraan_model->getData($id);
		echo view('kendaraan/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('kendaraan_id');

		$validation =  \Config\Services::validation();

		$data = array(
			'tanggal_masuk'        	=> $this->request->getPost('tanggal_masuk'),
			'kode_inventaris'    	=> $this->request->getPost('kode_inventaris'),
			'nama_item'         	=> $this->request->getPost('nama_item'),
			'merek'         		=> $this->request->getPost('merek'),
			'satuan'       			=> $this->request->getPost('satuan'),
			'harga'        			=> $this->request->getPost('harga'),
			'jumlah'        		=> $this->request->getPost('jumlah'),
			'kondisi'        		=> $this->request->getPost('kondisi'),
			'keterangan'        	=> $this->request->getPost('keterangan'),
			'karyawan_id'        	=> $this->request->getPost('karyawan_id'),

		);
		if ($validation->run($data, 'kendaraan') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('kendaraan/edit/' . $id));
		} else {
			$ubah = $this->kendaraan_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Update Data Berhasil');
				return redirect()->to(base_url('kendaraan'));
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
		$hapus = $this->kendaraan_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Data Berhasil');
			return redirect()->to(base_url('kendaraan'));
		}
	}
}
