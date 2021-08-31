<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DocumentMasukModel;
use App\Models\KaryawanModel;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DocumentMasukController extends BaseController
{
	public function __construct()
	{
		helper(['form']);
		$this->karyawan_model 		= new KaryawanModel();
		$this->documentmasuk_model  = new DocumentMasukModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}

		$currentPage = $this->request->getVar('page_documentmasuk') ? $this->request->getVar('page_documentmasuk') : 1;
		$paginate = 1000000;
		$data = [
			'documentmasuk'  => $this->documentmasuk_model->join('karyawan', 'karyawan.karyawan_id = documentmasuk.karyawan_id')->paginate($paginate, 'documentmasuk'),
			'pager'			 => $this->documentmasuk_model->pager,
			'currentPage'	 => $currentPage
		];
		echo view('documentmasuk/index', $data);
	}

	public function excel(){
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}


	 $atk = new AtkModel();
     $dataAtk = $atk->getData();
	
		$spreadsheet = new Spreadsheet();


 // tulis header/nama kolom 
    $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('B1', 'Kode Barang')
                ->setCellValue('C1', 'Nama')
                ->setCellValue('D1', 'Jenis')
                ->setCellValue('E1', 'Stock Awal')
				->setCellValue('F1', 'Stock Masuk')
                ->setCellValue('G1', 'Stock Keluar')
                ->setCellValue('H1', 'Stock Akhir')
                ->setCellValue('I1', 'Staff');

    
    $column = 2;
    // tulis data mobil ke cell
    foreach($dataAtk as $data) {
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('B' . $column, $data['kode_barang'])
                    ->setCellValue('C' . $column, $data['nama_barang'])
                    ->setCellValue('D' . $column, $data['jenis_barang'])
                    ->setCellValue('E' . $column, $data['stock_awal'])
                    ->setCellValue('F' . $column, $data['stock_masuk'])
					->setCellValue('G' . $column, $data['stock_keluar'])
					->setCellValue('H' . $column, $data['stock_akhir'])
                    ->setCellValue('I' . $column, $data['nama_karyawan']);

        $column++;
    }


	// tulis dalam format .xlsx
    $writer = new Xlsx($spreadsheet);
    $fileName = 'Data ATK';

    // Redirect hasil generate xlsx ke web client
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
    header('Cache-Control: max-age=0');
	$this->response->setContentType('application/excel');

    $writer->save('php://output');
	}

	public function pdf(){
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		
		$data = array(
			'atk'	=> $this->atk_model->getData(),	
		);
		$html =  view('atk/pdf', $data);

		// test pdf

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
		// set font tulisan
		$pdf->SetFont('dejavusans', '', 10);
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// $pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Utari Pratiwi');
		$pdf->SetTitle('Data ATK HSRCC');
		$pdf->SetSubject('Data ATK');
		// add a page
		$pdf->AddPage();
		// write html
		$pdf->writeHTML($html);
		$this->response->setContentType('application/pdf');
		// ouput pdf
		$pdf->Output('data_atk.pdf', 'I');


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
		return view('documentmasuk/create', $data);
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
			'document_type'        	=> $this->request->getPost('document_type'),
			'document_number'       => $this->request->getPost('document_number'),
			'judul_dokumen'        	=> $this->request->getPost('judul_dokumen'),
			'vendor'        		=> $this->request->getPost('vendor'),
			'bahasa'        		=> $this->request->getPost('bahasa'),
			'status_document'    	=> $this->request->getPost('status_document'),
			'tanggal_masuk'         => $this->request->getPost('tanggal_masuk'),
			'karyawan_id'        	=> $this->request->getPost('karyawan_id'),
		);

		if ($validation->run($data, 'documentmasuk') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('documentmasuk/create'));
		} else {
			// insert
			$simpan = $this->documentmasuk_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Tambah Data Berhasil');
				return redirect()->to(base_url('documentmasuk'));
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
			'karyawan'  => ['' => 'Pilih karyawan'] + array_column($karyawan, 'nama_karyawan', 'karyawan_id'),
			'documentmasuk'	=>   $this->documentmasuk_model->getData($id)
		];
		echo view('documentmasuk/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('documentmasuk_id');

		$validation =  \Config\Services::validation();

		$data = array(
			'kode_dokumen'        	=> $this->request->getPost('kode_dokumen'),
			'document_type'        	=> $this->request->getPost('document_type'),
			'document_number'       => $this->request->getPost('document_number'),
			'judul_dokumen'        	=> $this->request->getPost('judul_dokumen'),
			'vendor'        		=> $this->request->getPost('vendor'),
			'bahasa'        		=> $this->request->getPost('bahasa'),
			'status_document'    	=> $this->request->getPost('status_document'),
			'tanggal_masuk'         => $this->request->getPost('tanggal_masuk'),
			'karyawan_id'        	=> $this->request->getPost('karyawan_id'),

		);
		if ($validation->run($data, 'documentmasuk') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('documentmasuk/edit/' . $id));
		} else {
			$ubah = $this->documentmasuk_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Update Data Berhasil');
				return redirect()->to(base_url('documentmasuk'));
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
		$hapus = $this->documentmasuk_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Data Berhasil');
			return redirect()->to(base_url('documentmasuk'));
		}
	}
}
