<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KtigaModel;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ktigaController extends BaseController
{
	public function __construct()
	{
		helper(['form']);
		$this->ktiga_model = new KtigaModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_ktiga') ? $this->request->getVar('page_ktiga') : 1;

		// paginate
		$paginate = 1000000;
		$data['ktiga']   = $this->ktiga_model->paginate($paginate, 'ktiga');
		$data['pager']        = $this->ktiga_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('ktiga/index', $data);
	}

	public function excel()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}


		$ktiga = new KtigaModel();
		$dataktiga = $ktiga->getData();

		$spreadsheet = new Spreadsheet();


		// tulis header/nama kolom 
		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('B1', 'Nama')
			->setCellValue('C1', 'Tanggal Terbit');



		$column = 2;
		// tulis data mobil ke cell
		foreach ($dataktiga as $data) {
			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('B' . $column, $data['nama'])
				->setCellValue('C' . $column, $data['tanggal_terbit']);
			$column++;
		}


		// tulis dalam format .xlsx
		$writer = new Xlsx($spreadsheet);
		$fileName = 'Data ktiga';

		// Redirect hasil generate xlsx ke web client
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
		header('Cache-Control: max-age=0');
		$this->response->setContentType('application/excel');

		$writer->save('php://output');
	}

	public function pdf()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}

		$data = array(
			'ktiga'	=> $this->ktiga_model->getData(),
		);
		$html =  view('ktiga/pdf', $data);

		// test pdf

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
		// set font tulisan
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Dita Apriliyani');
		$pdf->SetTitle('Report Data Sertifikasi K3');
		$pdf->SetSubject('DATA ISO');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'DATA SERTIFIKASI K3', '');

		// set header and footer fonts
		$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

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
		$pdf->Output('data_sertifikasi_k3.pdf', 'I');
	}

	public function create()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		return view('ktiga/create');
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
			'nama'        				=> $this->request->getPost('nama'),
			'tanggal_terbit'         	=> $this->request->getPost('tanggal_terbit'),
		);

		if ($validation->run($data, 'ktiga') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('ktiga/create'));
		} else {
			// insert
			$simpan = $this->ktiga_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Tambah Data Berhasil');
				return redirect()->to(base_url('ktiga'));
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
		$data['ktiga'] = $this->ktiga_model->getData($id);
		echo view('ktiga/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('ktiga_id');

		$validation =  \Config\Services::validation();

		$data = array(
			'nama'        				=> $this->request->getPost('nama'),
			'tanggal_terbit'         	=> $this->request->getPost('tanggal_terbit'),

		);
		if ($validation->run($data, 'ktiga') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('ktiga/edit/' . $id));
		} else {
			$ubah = $this->ktiga_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Update Data Berhasil');
				return redirect()->to(base_url('ktiga'));
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
		$hapus = $this->ktiga_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Data  Berhasil');
			return redirect()->to(base_url('ktiga'));
		}
	}
}
