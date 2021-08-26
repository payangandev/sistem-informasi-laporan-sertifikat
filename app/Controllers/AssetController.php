<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KaryawanModel;
use App\Models\AssetModel;

class AssetController extends BaseController
{
public function __construct()
	{
		helper(['form']);
		$this->karyawan_model = new KaryawanModel();
		$this->asset_model = new AssetModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_asset') ? $this->request->getVar('page_asset') : 1;

		// paginate
		$paginate = 1000000;
		$data['asset']   		= $this->asset_model->join('karyawan', 'karyawan.karyawan_id = asset.karyawan_id')->paginate($paginate, 'asset');
		$data['pager']        	= $this->asset_model->pager;
		$data['currentPage']  	= $currentPage;
		echo view('asset/index', $data);
	}

	public function laporan()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_asset') ? $this->request->getVar('page_asset') : 1;

		// paginate
		$paginate = 1000000;
		$data['asset']   = $this->asset_model->join('karyawan', 'karyawan.karyawan_id = asset.karyawan_id')->paginate($paginate, 'asset');
		$data['pager']        = $this->asset_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('asset/laporan', $data);
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
		return view('asset/create', $data);
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
			'nama_kendaraan'        	=> $this->request->getPost('nama_kendaraan'),
			'tanggal_masuk'    			=> $this->request->getPost('tanggal_masuk'),
			'unit'         				=> $this->request->getPost('unit'),
			'harga'         			=> $this->request->getPost('harga'),
			'jumlah'       				=> $this->request->getPost('jumlah'),
			'kondisi'       		 	=> $this->request->getPost('kondisi'),
			'keterangan'        		=> $this->request->getPost('keterangan'),
			'karyawan_id'        		=> $this->request->getPost('karyawan_id'),

		);

		if ($validation->run($data, 'asset') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('asset/create'));
		} else {
			// insert
			$simpan = $this->asset_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Tambah Data Berhasil');
				return redirect()->to(base_url('asset'));
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
		$data['asset'] = $this->asset_model->getData($id);
		echo view('asset/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('asset_id');

		$validation =  \Config\Services::validation();

		$data = array(
			'nama_kendaraan'        	=> $this->request->getPost('nama_kendaraan'),
			'tanggal_masuk'    			=> $this->request->getPost('tanggal_masuk'),
			'unit'         				=> $this->request->getPost('unit'),
			'harga'         			=> $this->request->getPost('harga'),
			'jumlah'       				=> $this->request->getPost('jumlah'),
			'kondisi'       		 	=> $this->request->getPost('kondisi'),
			'keterangan'        		=> $this->request->getPost('keterangan'),
			'karyawan_id'        		=> $this->request->getPost('karyawan_id'),
		);
		if ($validation->run($data, 'asset') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('asset/edit/' . $id));
		} else {
			$ubah = $this->asset_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Update Data Berhasil');
				return redirect()->to(base_url('asset'));
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
		$hapus = $this->asset_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Data Berhasil');
			return redirect()->to(base_url('asset'));
		}
	}
}
