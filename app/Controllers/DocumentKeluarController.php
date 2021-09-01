<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DocumentKeluarModel;
use App\Models\KaryawanModel;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

	public function excel(){
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}


	 $documentkeluar = new DocumentKeluarModel();
     $dataDocumentKeluar = $documentkeluar->getData();
	
		$spreadsheet = new Spreadsheet();


 // tulis header/nama kolom 
    $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('B1', 'Kode')
                ->setCellValue('C1', 'Type')
                ->setCellValue('D1', 'Number')
                ->setCellValue('E1', 'Judul')
				->setCellValue('F1', 'Nomer Box')
                ->setCellValue('G1', 'Isi Box')
                ->setCellValue('H1', 'Tanggal Keluar')
                ->setCellValue('I1', 'Vendor')
				->setCellValue('J1', 'Bahasa')
                ->setCellValue('K1', 'Approved')
                ->setCellValue('L1', 'Jabatan')
                ->setCellValue('M1', 'Status')
                ->setCellValue('N1', 'Staff');

    $column = 2;
    // tulis data mobil ke cell
    foreach($dataDocumentKeluar as $data) {
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('B' . $column, $data['kode_dokumen'])
                    ->setCellValue('C' . $column, $data['document_type'])
                    ->setCellValue('D' . $column, $data['document_number'])
                    ->setCellValue('E' . $column, $data['judul_dokumen'])
                    ->setCellValue('F' . $column, $data['nomer_box'])
					->setCellValue('G' . $column, $data['isi_box'])
					->setCellValue('H' . $column, $data['tanggal_keluar'])
                    ->setCellValue('I' . $column, $data['vendor'])
					->setCellValue('J' . $column, $data['bahasa'])
					->setCellValue('K' . $column, $data['approved'])
					->setCellValue('L' . $column, $data['jabatan'])
					->setCellValue('M' . $column, $data['status_document'])
					->setCellValue('N' . $column, $data['nama_karyawan']);
        $column++;
    }


	// tulis dalam format .xlsx
    $writer = new Xlsx($spreadsheet);
    $fileName = 'Data Document Keluar';

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
			'documentkeluar'	=> $this->documentkeluar_model->getData(),	
		);
		$html =  view('documentkeluar/pdf', $data);

		// test pdf

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A2', true, 'UTF-8', false);
		// set font tulisan
		$pdf->SetFont('dejavusans', '', 10);
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// $pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Utari Pratiwi');
		$pdf->SetTitle('Data Document Keluar HSRCC');
		$pdf->SetSubject('Data Document Keluar');
		// add a page
		$pdf->AddPage();
		// write html
		$pdf->writeHTML($html);
		$this->response->setContentType('application/pdf');
		// ouput pdf
		$pdf->Output('data_document_keluar.pdf', 'I');

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
			return redirect()->to(base_url('documentkeluar/create'));
		} else {
			// insert
			$simpan = $this->documentkeluar_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Tambah Data Berhasil');
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
				session()->setFlashdata('info', 'Update Data Berhasil');
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
			session()->setFlashdata('warning', 'Delete Data Berhasil');
			return redirect()->to(base_url('documentkeluar'));
		}
	}
}
