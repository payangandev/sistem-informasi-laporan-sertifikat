<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DocumentKeluarModel;
use App\Models\KaryawanModel;

class DocumentKeluarController extends BaseController
{
	public function __construct()
	{
		helper(['form']);
		$this->karyawan_model 		= new KaryawanModel();
		$this->documentkeluar_model = new DocumentKeluarModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}

		$currentPage = $this->request->getVar('page_documentkeluar') ? $this->request->getVar('page_documentkeluar') : 1;
		$paginate = 1000000;
		$data = [
			'documentkeluar'  => $this->documentkeluar_model->join('karyawan', 'karyawan.karyawan_id = documentkeluar.karyawan_id')->paginate($paginate, 'documentkeluar'),
			'pager'			 => $this->documentkeluar_model->pager,
			'currentPage'	 => $currentPage
		];
		echo view('documentkeluar/index', $data);
	}

	public function laporan()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}

		$currentPage = $this->request->getVar('page_documentkeluar') ? $this->request->getVar('page_documentkeluar') : 1;
		$paginate = 100;
		$data = [
			'documentkeluar'   	=> $this->documentkeluar_model->join('karyawan', 'karyawan.karyawan_id = documentkeluar.karyawan_id')->paginate($paginate, 'documentkeluar'),
			'pager'   			=> $this->documentkeluar_model->pager,
			'currentPage'		=> $currentPage
		];

		echo view('documentkeluar/laporan', $data);
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
		return view('documentkeluar/create', $data);
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
			'kode_dokumen'        	=> $this->request->getPost('kode_dokumen'),
			'document_type'        	=> $this->request->getPost('vendor_id'),
			'document_number'       => $this->request->getPost('document_number'),
			'judul_dokumen'        	=> $this->request->getPost('judul_dokumen'),
			'nomer_box'        		=> $this->request->getPost('nomer_box'),
			'isi_box'    			=> $this->request->getPost('isi_box'),
			'vendor'    			=> $this->request->getPost('vendor'),
			'bahasa'         		=> $this->request->getPost('bahasa'),
			'approved'        		=> $this->request->getPost('approved'),
			'jabatan'        		=> $this->request->getPost('jabatan'),
			'status_document'       => $this->request->getPost('status_document'),
			'tanggal_keluar'        => $this->request->getPost('tanggal_keluar'),
			'karyawan_id'        	=> $this->request->getPost('karyawan_id'),

		);

		if ($validation->run($data, 'documentkeluar') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('documentkeluar/create'));
		} else {
			// insert
			$simpan = $this->documentkeluar_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Tambah Data Document Keluar Berhasil');
				return redirect()->to(base_url('documentkeluar'));
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
		$data = [
			'karyawan'		=>  ['' => 'karyawan'] + array_column($karyawan, 'nama_karyawan', 'karyawan_id'),
			'documentkeluar' => $this->documentkeluar_model->getData($id)
		];

		echo view('documentkeluar/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('document_keluar_id');

		$validation =  \Config\Services::validation();

		$data = array(
			'kode_dokumen'        	=> $this->request->getPost('kode_dokumen'),
			'document_type'        	=> $this->request->getPost('document_type'),
			'document_number'       => $this->request->getPost('document_number'),
			'judul_dokumen'        	=> $this->request->getPost('judul_dokumen'),
			'nomer_box'        		=> $this->request->getPost('nomer_box'),
			'isi_box'    			=> $this->request->getPost('isi_box'),
			'vendor'    			=> $this->request->getPost('vendor'),
			'bahasa'         		=> $this->request->getPost('bahasa'),
			'approved'        		=> $this->request->getPost('approved'),
			'jabatan'        		=> $this->request->getPost('jabatan'),
			'status_document'       => $this->request->getPost('status_document'),
			'tanggal_keluar'        => $this->request->getPost('tanggal_keluar'),
			'karyawan_id'        	=> $this->request->getPost('karyawan_id'),

		);
		if ($validation->run($data, 'documentkeluar') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('documentkeluar/edit/' . $id));
		} else {
			$ubah = $this->documentkeluar_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Update Data Document Keluar Berhasil');
				return redirect()->to(base_url('documentkeluar'));
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
		$hapus = $this->documentkeluar_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Data Document Keluar Berhasil');
			return redirect()->to(base_url('documentkeluar'));
		}
	}
}
