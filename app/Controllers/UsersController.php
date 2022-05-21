<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class UsersController extends BaseController
{
	protected $helpers = [];

	public function __construct()
	{
		helper(['form']);
		$this->users_model = new UserModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_users') ? $this->request->getVar('page_users') : 1;
		// paginate
		$paginate = 100000;
		$data['users']   = $this->users_model->paginate($paginate, 'users');
		$data['pager']        = $this->users_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('users/index', $data);
	}
	
	public function excel(){
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}


	 $users = new UserModel();
     $dataUsers = $users->getData();
	
		$spreadsheet = new Spreadsheet();


 // tulis header/nama kolom 
    $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('B1', 'Nama Users')
                ->setCellValue('C1', 'Username')
                ->setCellValue('D1', 'Password')
                ->setCellValue('E1', 'Level');
    
    $column = 2;
    // tulis data mobil ke cell
    foreach($dataUsers as $data) {
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('B' . $column, $data['nama_user'])
                    ->setCellValue('C' . $column, $data['username'])
                    ->setCellValue('D' . $column, $data['password'])
                    ->setCellValue('E' . $column, $data['level']);

        $column++;
    }


	// tulis dalam format .xlsx
    $writer = new Xlsx($spreadsheet);
    $fileName = 'Data Users';

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
			'users'	=> $this->users_model->getData(),	
		);
		$html =  view('users/pdf', $data);


		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
		// set font tulisan
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Dita Apriliyani');
		$pdf->SetTitle('Report Data User ');
		$pdf->SetSubject('DATA User');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,'DATA USER','');

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
		$pdf->Output('data_user.pdf', 'I');



	}


	public function create()
	{
		return view('users/create');
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
			'nama_user'             => $this->request->getPost('nama_user'),
			'username'              => $this->request->getPost('username'),
			'password'              => $this->request->getPost('password'),
			'level'                 => $this->request->getPost('level'),

		);

		if ($validation->run($data, 'users') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('users/create'));
		} else {

			$simpan = $this->users_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Tambah Data Berhasil');
				return redirect()->to(base_url('users'));
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
		$data['users'] = $this->users_model->getData($id);
		echo view('users/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('id');

		$validation =  \Config\Services::validation();


		$data = array(
			'nama_user'             => $this->request->getPost('nama_user'),
			'username'              => $this->request->getPost('username'),
			'password'              => $this->request->getPost('password'),
			'level'                 => $this->request->getPost('level'),

		);

		if ($validation->run($data, 'users') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('users/edit/' . $id));
		} else {

			$ubah = $this->users_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Update Data Berhasil');
				return redirect()->to(base_url('users'));
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
		$hapus = $this->users_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Data Berhasil');
			return redirect()->to(base_url('users'));
		}
	}
}
