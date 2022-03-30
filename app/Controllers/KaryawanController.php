<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KaryawanModel;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class karyawanController extends BaseController
{
    protected $helpers = [];
    public $db;

    public function __construct()
    {
        helper(['form']);
        $this->karyawan_model = new KaryawanModel();
        $this->db = \Config\Database::connect();
    }



    public function index()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }

        $currentPage = $this->request->getVar('page_karyawan') ? $this->request->getVar('page_karyawan') : 1;
        $paginate = 1000000;
        $data = [
            'karyawan'      =>  $this->karyawan_model->paginate($paginate, 'karyawan'),
            'pager'         =>  $this->karyawan_model->pager,
            'currentPage'   => $currentPage,
        ];
        echo view('karyawan/index', $data);
    }

  	public function excel(){
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}


	 $karyawan = new KaryawanModel();
     $dataKaryawan = $karyawan->getData();
	
		$spreadsheet = new Spreadsheet();


 // tulis header/nama kolom 
    $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('B1', 'Nama Karyawan')
                ->setCellValue('C1', 'Divisi')
                ->setCellValue('D1', 'Jabatan')
                ->setCellValue('E1', 'Status')
				->setCellValue('F1', 'Tanggal Masuk');
    
    $column = 2;
    // tulis data mobil ke cell
    foreach($dataKaryawan as $data) {
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('B' . $column, $data['nama_karyawan'])
                    ->setCellValue('C' . $column, $data['divisi'])
                    ->setCellValue('D' . $column, $data['jabatan'])
                    ->setCellValue('E' . $column, $data['status'])
                    ->setCellValue('F' . $column, $data['tanggalmasuk']);

        $column++;
    }


	// tulis dalam format .xlsx
    $writer = new Xlsx($spreadsheet);
    $fileName = 'Data Karyawan';

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
			'karyawan'	=> $this->karyawan_model->getData(),	
		);
		$html =  view('karyawan/pdf', $data);

		// test pdf

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
		// set font tulisan
		$pdf->SetFont('dejavusans', '', 10);
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// $pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Dita');
		$pdf->SetTitle('Data Karyawan');
		$pdf->SetSubject('Data Karyawan');
		// add a page
		$pdf->AddPage();
		// write html
		$pdf->writeHTML($html);
		$this->response->setContentType('application/pdf');
		// ouput pdf
		$pdf->Output('data_karyawan.pdf', 'I');


	}


    public function create()
    {
        return view('karyawan/create');
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
            'nama_karyawan'             => $this->request->getPost('nama_karyawan'),
            'divisi'                    => $this->request->getPost('divisi'),
            'jabatan'                   => $this->request->getPost('jabatan'),
            'status'                    => $this->request->getPost('status'),
            'tanggalmasuk'              => $this->request->getPost('tanggalmasuk')
        );

        if ($validation->run($data, 'karyawan') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('karyawan/create'));
        } else {

            $simpan = $this->karyawan_model->insertData($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Tambah Data Berhasil');
                return redirect()->to(base_url('karyawan'));
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
        $data['karyawan'] = $this->karyawan_model->getData($id);
        echo view('karyawan/edit', $data);
    }

    public function update()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        $id = $this->request->getPost('karyawan_id');

        $validation =  \Config\Services::validation();


        $data = array(
            'nama_karyawan'             => $this->request->getPost('nama_karyawan'),
            'divisi'                    => $this->request->getPost('divisi'),
            'jabatan'                   => $this->request->getPost('jabatan'),
            'status'                    => $this->request->getPost('status'),
            'tanggalmasuk'              => $this->request->getPost('tanggalmasuk'),

        );

        if ($validation->run($data, 'karyawan') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('karyawan/edit/' . $id));
        } else {

            $ubah = $this->karyawan_model->updateData($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Update Data Berhasil');
                return redirect()->to(base_url('karyawan'));
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
        $hapus = $this->karyawan_model->deleteData($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Delete Data Berhasil');
            return redirect()->to(base_url('karyawan'));
        }
    }
}
