<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KaryawanModel;
use App\Models\NotaKeluarModel;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class NotaKeluarController extends BaseController
{
	public function __construct()
	{
		helper(['form']);
		$this->karyawan_model = new KaryawanModel();
		$this->notakeluar_model = new NotaKeluarModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_notakeluar') ? $this->request->getVar('page_notakeluar') : 1;

		// paginate
		$paginate = 1000000;
		$data['notakeluar']   = $this->notakeluar_model->join('karyawan', 'karyawan.karyawan_id = notakeluar.karyawan_id')->paginate($paginate, 'notakeluar');
		$data['pager']        = $this->notakeluar_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('notakeluar/index', $data);
	}

	public function excel(){
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}


	 $notakeluar = new NotaKeluarModel();
     $dataNotaKeluar = $notakeluar->getData();
	
		$spreadsheet = new Spreadsheet();


 // tulis header/nama kolom 
    $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('B1', 'Kode Nota')
                ->setCellValue('C1', 'Vendor')
                ->setCellValue('D1', 'Status Barang')
                ->setCellValue('E1', 'Jumlah Barang')
				->setCellValue('F1', 'Tanggal Keluar')
                ->setCellValue('G1', 'Nama Barang')
                ->setCellValue('H1', 'Staff');
    
    $column = 2;
    // tulis data mobil ke cell
    foreach($dataNotaKeluar as $data) {
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('B' . $column, $data['kode_nota'])
                    ->setCellValue('C' . $column, $data['vendor'])
                    ->setCellValue('D' . $column, $data['status_document'])
                    ->setCellValue('E' . $column, $data['jumlah_barang'])
                    ->setCellValue('F' . $column, $data['tanggal_keluar'])
					->setCellValue('G' . $column, $data['nama_barang'])
					->setCellValue('H' . $column, $data['nama_karyawan']);
        $column++;
    }


	// tulis dalam format .xlsx
    $writer = new Xlsx($spreadsheet);
    $fileName = 'Data Nota Keluar';

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
			'notakeluar'	=> $this->notakeluar_model->getData(),	
		);
		$html =  view('notakeluar/pdf', $data);

		// test pdf

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
		// set font tulisan
		$pdf->SetFont('dejavusans', '', 10);
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// $pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Utari Pratiwi');
		$pdf->SetTitle('Data Nota Keluar HSRCC');
		$pdf->SetSubject('Data Nota Keluar');
		// add a page
		$pdf->AddPage();
		// write html
		$pdf->writeHTML($html);
		$this->response->setContentType('application/pdf');
		// ouput pdf
		$pdf->Output('data_notakeluar.pdf', 'I');


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
		return view('notakeluar/create', $data);
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
			'kode_nota'        		=> $this->request->getPost('kode_nota'),
			'vendor'    			=> $this->request->getPost('vendor'),
			'nama_barang'         	=> $this->request->getPost('nama_barang'),
			'jumlah_barang'         => $this->request->getPost('jumlah_barang'),
			'status_document'       => $this->request->getPost('status_document'),
			'tanggal_keluar'        => $this->request->getPost('tanggal_keluar'),
			'karyawan_id'        	=> $this->request->getPost('karyawan_id'),

		);

		if ($validation->run($data, 'notakeluar') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('notakeluar/create'));
		} else {
			// insert
			$simpan = $this->notakeluar_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Tambah Data Berhasil');
				return redirect()->to(base_url('notakeluar'));
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
		$data['notakeluar'] = $this->notakeluar_model->getData($id);
		echo view('notakeluar/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('notakeluar_id');

		$validation =  \Config\Services::validation();

		$data = array(
			'kode_nota'        		=> $this->request->getPost('kode_nota'),
			'vendor'    			=> $this->request->getPost('vendor'),
			'nama_barang'         	=> $this->request->getPost('nama_barang'),
			'jumlah_barang'         => $this->request->getPost('jumlah_barang'),
			'status_document'       => $this->request->getPost('status_document'),
			'tanggal_keluar'        => $this->request->getPost('tanggal_keluar'),
			'karyawan_id'        	=> $this->request->getPost('karyawan_id'),

		);
		if ($validation->run($data, 'notakeluar') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('notakeluar/edit/' . $id));
		} else {
			$ubah = $this->notakeluar_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Update Data Berhasil');
				return redirect()->to(base_url('notakeluar'));
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
		$hapus = $this->notakeluar_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Data Berhasil');
			return redirect()->to(base_url('notakeluar'));
		}
	}
}
