<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SktModel;
use App\Models\KaryawanModel;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SktController extends BaseController
{
	public function __construct()
	{
		helper(['form']);
		$this->karyawan_model 		 = new KaryawanModel();
		$this->skt_model 			 = new SktModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}

		$currentPage = $this->request->getVar('page_skt') ? $this->request->getVar('page_skt') : 1;
		$paginate = 1000000;
		$data = [
			'skt'  => $this->skt_model->join('karyawan', 'karyawan.karyawan_id = skt.karyawan_id')->paginate($paginate, 'skt'),
			'pager'			 => $this->skt_model->pager,
			'currentPage'	 => $currentPage
		];
		echo view('skt/index', $data);
	}

	public function excel(){
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}


	 $skt = new SktModel();
     $dataskt = $skt->getData();
	
		$spreadsheet = new Spreadsheet();


 // tulis header/nama kolom 
    $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('B1', 'Nama')
                ->setCellValue('C1', 'Kode')
                ->setCellValue('D1', 'Tanggal Input')
                ->setCellValue('E1', 'Karyawan');

    
    $column = 2;
    // tulis data mobil ke cell
    foreach($dataskt as $data) {
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('B' . $column, $data['nama'])
                    ->setCellValue('C' . $column, $data['kode'])
                    ->setCellValue('D' . $column, $data['tanggal_input'])
                    ->setCellValue('E' . $column, $data['nama_karyawan']);
        $column++;
    }


	// tulis dalam format .xlsx
    $writer = new Xlsx($spreadsheet);
    $fileName = 'skt';

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
			'skt'	=> $this->skt_model->getData(),	
		);
		$html =  view('skt/pdf', $data);

		// test pdf

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
		// set font tulisan
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Dita Apriliyani');
		$pdf->SetTitle('Report Data Sertifikasi SKT');
		$pdf->SetSubject('DATA SKT');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,'DATA SERITIFIKASI SKT','');

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
		$pdf->Output('data_sertifikasi_SKT.pdf', 'I');

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
		return view('skt/create', $data);
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

		if ($validation->run($data, 'skt') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('skt/create'));
		} else {
			// insert
			$simpan = $this->skt_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Tambah Data Berhasil');
				return redirect()->to(base_url('skt'));
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
			'skt'	=>   $this->skt_model->getData($id)
		];
		echo view('skt/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('skt_id');

		$validation =  \Config\Services::validation();

		$data = array(
			'nama'        			=> $this->request->getPost('nama'),
			'kode'        			=> $this->request->getPost('kode'),
			'tanggal_input'       	=> $this->request->getPost('tanggal_input'),
			'karyawan_id'        	=> $this->request->getPost('karyawan_id'),

		);
		if ($validation->run($data, 'skt') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('skt/edit/' . $id));
		} else {
			$ubah = $this->skt_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Update Data Berhasil');
				return redirect()->to(base_url('skt'));
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
		$hapus = $this->skt_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Data Berhasil');
			return redirect()->to(base_url('skt'));
		}
	}
}
