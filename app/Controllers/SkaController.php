<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KaryawanModel;
use App\Models\SkaModel;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SkaController extends BaseController
{
public function __construct()
	{
		helper(['form']);
		$this->karyawan_model = new KaryawanModel();
		$this->ska_model = new SkaModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_ska') ? $this->request->getVar('page_ska') : 1;

		// paginate
		$paginate = 1000000;
		$data['ska']   		= $this->ska_model->join('karyawan', 'karyawan.karyawan_id = ska.karyawan_id')->paginate($paginate, 'ska');
		$data['pager']        	= $this->ska_model->pager;
		$data['currentPage']  	= $currentPage;
		echo view('ska/index', $data);
	}


	public function excel(){
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}


	 $ska = new SkaModel();
     $dataska = $ska->getData();
	
		$spreadsheet = new Spreadsheet();


 // tulis header/nama kolom 
    $spreadsheet->setActiveSheetIndex(0)
	->setCellValue('B1', 'Nama')
	->setCellValue('C1', 'Kode')
	->setCellValue('D1', 'Tanggal Input')
	->setCellValue('E1', 'Karyawan');

    
    $column = 2;
    // tulis data mobil ke cell
    foreach($dataska as $data) {
        $spreadsheet->setActiveSheetIndex(0)
		->setCellValue('B' . $column, $data['nama'])
		->setCellValue('C' . $column, $data['kode'])
		->setCellValue('D' . $column, $data['tanggal_input'])
		->setCellValue('E' . $column, $data['nama_karyawan']);

        $column++;
    }


	// tulis dalam format .xlsx
    $writer = new Xlsx($spreadsheet);
    $fileName = 'Data ska';

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
			'ska'	=> $this->ska_model->getData(),	
		);
		$html =  view('ska/pdf', $data);

			// test pdf

			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
			// set font tulisan
			// set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('Dita Apriliyani');
			$pdf->SetTitle('Report Data Sertifikasi SKA');
			$pdf->SetSubject('DATA SKA');
	
			// set default header data
			$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,'DATA SERTIFIKASI SKA','');
	
			// set header and footer fonts
			$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	
			// set default monospaced font
			$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
			// set margins
			$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
			$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
			$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	
			// set auto page breaks
			$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	
			$pdf->SetFont('dejavusans', '', 10);
			$pdf->AddPage();
			// write html
			$pdf->writeHTML($html, true, false, true, false, '');
			$this->response->setContentType('application/pdf');
			// ouput pdf
			$pdf->Output('data_sertifikasi_SKA.pdf', 'I');
	
	
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
		return view('ska/create', $data);
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
			'nama'        			=> $this->request->getPost('nama'),
			'kode'        			=> $this->request->getPost('kode'),
			'tanggal_input'       	=> $this->request->getPost('tanggal_input'),
			'karyawan_id'        	=> $this->request->getPost('karyawan_id'),

		);

		if ($validation->run($data, 'ska') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('ska/create'));
		} else {
			// insert
			$simpan = $this->ska_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Tambah Data Berhasil');
				return redirect()->to(base_url('ska'));
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
		$data['ska'] = $this->ska_model->getData($id);
		echo view('ska/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('ska_id');

		$validation =  \Config\Services::validation();

		$data = array(
			'nama'        			=> $this->request->getPost('nama'),
			'kode'        			=> $this->request->getPost('kode'),
			'tanggal_input'       	=> $this->request->getPost('tanggal_input'),
			'karyawan_id'        	=> $this->request->getPost('karyawan_id'),
		);
		if ($validation->run($data, 'ska') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('ska/edit/' . $id));
		} else {
			$ubah = $this->ska_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Update Data Berhasil');
				return redirect()->to(base_url('ska'));
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
		$hapus = $this->ska_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Data Berhasil');
			return redirect()->to(base_url('ska'));
		}
	}
}
