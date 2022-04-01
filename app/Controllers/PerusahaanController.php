<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PerusahaanModel;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PerusahaanController extends BaseController
{
	protected $helpers = [];

	public function __construct()
	{
		helper(['form']);
		$this->perusahaan_model = new PerusahaanModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_perusahaan') ? $this->request->getVar('page_perusahaan') : 1;
		// paginate
		$paginate = 100000;
		$data['perusahaan']   = $this->perusahaan_model->paginate($paginate, 'perusahaan');
		$data['pager']        = $this->perusahaan_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('perusahaan/index', $data);
	}
	
	public function excel(){
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}


	 $perusahaan = new PerusahaanModel();
     $dataperusahaan = $perusahaan->getData();
	
		$spreadsheet = new Spreadsheet();


 // tulis header/nama kolom 
    $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('B1', 'Nama perusahaan')
                ->setCellValue('C1', 'Tanggal Input');    
    $column = 2;
    // tulis data mobil ke cell
    foreach($dataperusahaan as $data) {
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('B' . $column, $data['nama_user'])
                    ->setCellValue('C' . $column, $data['tanggal_input']);

        $column++;
    }


	// tulis dalam format .xlsx
    $writer = new Xlsx($spreadsheet);
    $fileName = 'Data perusahaan';

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
			'perusahaan'	=> $this->perusahaan_model->getData(),	
		);
		$html =  view('perusahaan/pdf', $data);

		// test pdf

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
		// set font tulisan
		$pdf->SetFont('dejavusans', '', 10);
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// $pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Deni');
		$pdf->SetTitle('Data Perusahaan');
		$pdf->SetSubject('Data Perusahaan');
		// add a page
		$pdf->AddPage();
		// write html
		$pdf->writeHTML($html);
		$this->response->setContentType('application/pdf');
		// ouput pdf
		$pdf->Output('data_perusahaan.pdf', 'I');


	}


	public function create()
	{
		return view('perusahaan/create');
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
			'nama_perusahaan'             => $this->request->getPost('nama_perusahaan'),
			'tanggal_input'               => $this->request->getPost('tanggal_input'),

		);

		if ($validation->run($data, 'perusahaan') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('perusahaan/create'));
		} else {

			$simpan = $this->perusahaan_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Tambah Data Berhasil');
				return redirect()->to(base_url('perusahaan'));
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
		$data['perusahaan'] = $this->perusahaan_model->getData($id);
		echo view('perusahaan/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('perusahaan_id');

		$validation =  \Config\Services::validation();


		$data = array(
			'nama_perusahaan'             => $this->request->getPost('nama_perusahaan'),
			'tanggal_input'               => $this->request->getPost('tanggal_input'),

		);

		if ($validation->run($data, 'perusahaan') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('perusahaan/edit/' . $id));
		} else {

			$ubah = $this->perusahaan_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Update Data Berhasil');
				return redirect()->to(base_url('perusahaan'));
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
		$hapus = $this->perusahaan_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Data Berhasil');
			return redirect()->to(base_url('perusahaan'));
		}
	}
}
