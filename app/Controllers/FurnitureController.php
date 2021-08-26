<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KaryawanModel;
use App\Models\FurnitureModel;

class FurnitureController extends BaseController
{
public function __construct()
	{
		helper(['form']);
		$this->karyawan_model = new KaryawanModel();
		$this->furniture_model = new FurnitureModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_furniture') ? $this->request->getVar('page_furniture') : 1;

		// paginate
		$paginate = 1000000;
		$data['furniture']   = $this->furniture_model->join('karyawan', 'karyawan.karyawan_id = furniture.karyawan_id')->paginate($paginate, 'furniture');
		$data['pager']        = $this->furniture_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('furniture/index', $data);
	}

	public function laporan()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_furniture') ? $this->request->getVar('page_furniture') : 1;

		// paginate
		$paginate = 1000000;
		$data['furniture']   = $this->furniture_model->join('karyawan', 'karyawan.karyawan_id = furniture.karyawan_id')->paginate($paginate, 'furniture');
		$data['pager']        = $this->furniture_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('furniture/laporan', $data);
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
		return view('furniture/create', $data);
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
			'nama_item'        	=> $this->request->getPost('nama_item'),
			'kode'    			=> $this->request->getPost('kode'),
			'harga'         	=> $this->request->getPost('harga'),
			'qty'        		=> $this->request->getPost('qty'),
			'tanggal_beli'      => $this->request->getPost('tanggal_beli'),
			'total'        		=> $this->request->getPost('total'),
			'kondisi'        	=> $this->request->getPost('kondisi'),
			'karyawan_id'       => $this->request->getPost('karyawan_id'),

		);

		if ($validation->run($data, 'furniture') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('furniture/create'));
		} else {
			// insert
			$simpan = $this->furniture_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Tambah Data Nota Keluar Berhasil');
				return redirect()->to(base_url('furniture'));
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
		$data['furniture'] = $this->furniture_model->getData($id);
		echo view('furniture/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('furniture_id');

		$validation =  \Config\Services::validation();

		$data = array(
			'nama_item'        	=> $this->request->getPost('nama_item'),
			'kode'    			=> $this->request->getPost('kode'),
			'harga'         	=> $this->request->getPost('harga'),
			'qty'        		=> $this->request->getPost('qty'),
			'tanggal_beli'      => $this->request->getPost('tanggal_beli'),
			'total'        		=> $this->request->getPost('total'),
			'kondisi'        	=> $this->request->getPost('kondisi'),
			'karyawan_id'       => $this->request->getPost('karyawan_id'),

		);
		if ($validation->run($data, 'furniture') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('furniture/edit/' . $id));
		} else {
			$ubah = $this->furniture_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Update Data Nota Keluar Berhasil');
				return redirect()->to(base_url('furniture'));
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
		$hapus = $this->furniture_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Data Nota Keluar Berhasil');
			return redirect()->to(base_url('furniture'));
		}
	}
}
