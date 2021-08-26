<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KaryawanModel;
use App\Models\MultimediaModel;


class MultimediaController extends BaseController
{
	public function __construct()
	{
		helper(['form']);
		$this->karyawan_model = new KaryawanModel();
		$this->multimedia_model = new MultimediaModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_multimedia') ? $this->request->getVar('page_multimedia') : 1;

		// paginate
		$paginate = 1000000;
		$data['multimedia']   = $this->multimedia_model->join('karyawan', 'karyawan.karyawan_id = multimedia.karyawan_id')->paginate($paginate, 'multimedia');
		$data['pager']        = $this->multimedia_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('multimedia/index', $data);
	}

	public function laporan()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_multimedia') ? $this->request->getVar('page_multimedia') : 1;

		// paginate
		$paginate = 1000000;
		$data['multimedia']   = $this->multimedia_model->join('karyawan', 'karyawan.karyawan_id = multimedia.karyawan_id')->paginate($paginate, 'multimedia');
		$data['pager']        = $this->multimedia_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('multimedia/laporan', $data);
	}


	// method untuk membuat sebuah penambahan data
	public function create()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$karyawan = $this->karyawan_model->findAll();
		$data['karyawan'] = ['' => 'karyawan'] + array_column($karyawan, 'nama_karyawan', 'karyawan_id');
		return view('multimedia/create', $data);
	}


	// method untuk mengelola pemrosessan sebuah penambahan data
	public function store()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$validation =  \Config\Services::validation();
		$data = array(
			'tanggal_masuk'        		=> $this->request->getPost('tanggal_masuk'),
			'kode_inventaris'    		=> $this->request->getPost('kode_inventaris'),
			'nama_item'         		=> $this->request->getPost('nama_item'),
			'merk'         				=> $this->request->getPost('merk'),
			'satuan'       				=> $this->request->getPost('satuan'),
			'vol'        				=> $this->request->getPost('vol'),
			'harga'        				=> $this->request->getPost('harga'),
			'jumlah'        			=> $this->request->getPost('jumlah'),
			'kondisi'       	 		=> $this->request->getPost('kondisi'),
			'keterangan'        		=> $this->request->getPost('keterangan'),
			'karyawan_id'        		=> $this->request->getPost('karyawan_id'),

		);

		if ($validation->run($data, 'multimedia') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('multimedia/create'));
		} else {
			// insert
			$simpan = $this->multimedia_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Tambah Data Nota Keluar Berhasil');
				return redirect()->to(base_url('multimedia'));
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
		$data['multimedia'] = $this->multimedia_model->getData($id);
		echo view('multimedia/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('multimedia_id');

		$validation =  \Config\Services::validation();

		$data = array(
			'tanggal_masuk'        		=> $this->request->getPost('tanggal_masuk'),
			'kode_inventaris'    		=> $this->request->getPost('kode_inventaris'),
			'nama_item'         		=> $this->request->getPost('nama_item'),
			'merk'         				=> $this->request->getPost('merk'),
			'satuan'       				=> $this->request->getPost('satuan'),
			'vol'        				=> $this->request->getPost('vol'),
			'harga'        				=> $this->request->getPost('harga'),
			'jumlah'        			=> $this->request->getPost('jumlah'),
			'kondisi'       	 		=> $this->request->getPost('kondisi'),
			'keterangan'        		=> $this->request->getPost('keterangan'),
			'karyawan_id'        		=> $this->request->getPost('karyawan_id'),

		);
		if ($validation->run($data, 'multimedia') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('multimedia/edit/' . $id));
		} else {
			$ubah = $this->multimedia_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Update Data Nota Keluar Berhasil');
				return redirect()->to(base_url('multimedia'));
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
		$hapus = $this->multimedia_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Data Nota Keluar Berhasil');
			return redirect()->to(base_url('multimedia'));
		}
	}
}
