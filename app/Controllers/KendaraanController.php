<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KaryawanModel;
use App\Models\KendaraanModel;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class KendaraanController extends BaseController
{
	public function __construct()
	{
		helper(['form']);
		$this->karyawan_model = new KaryawanModel();
		$this->kendaraan_model = new KendaraanModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_kendaraan') ? $this->request->getVar('page_kendaraan') : 1;

		// paginate
		$paginate = 1000000;
		$data['kendaraan']   = $this->kendaraan_model->join('karyawan', 'karyawan.karyawan_id = kendaraan.karyawan_id')->paginate($paginate, 'kendaraan');
		$data['pager']        = $this->kendaraan_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('kendaraan/index', $data);
	}

	public function excel(){
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}


	 $kendraan = new KendaraanModel();
     $dataKendaraan = $kendraan->getData();
	
		$spreadsheet = new Spreadsheet();


 // tulis header/nama kolom 
    $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('B1', 'Tanggal Masuk')
                ->setCellValue('C1', 'Kode Inventaris')
                ->setCellValue('D1', 'Nama Item')
                ->setCellValue('E1', 'Merk')
				->setCellValue('F1', 'Satuan')
                ->setCellValue('G1', 'Harga')
                ->setCellValue('H1', 'Jumlah')
                ->setCellValue('I1', 'Kondisi')
				->setCellValue('J1', 'Keterangan')
				->setCellValue('K1', 'Staff');

    
    $column = 2;
    // tulis data mobil ke cell
    foreach($dataKendaraan as $data) {
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('B' . $column, $data['tanggal_masuk'])
                    ->setCellValue('C' . $column, $data['kode_inventaris'])
                    ->setCellValue('D' . $column, $data['nama_item'])
                    ->setCellValue('E' . $column, $data['merek'])
                    ->setCellValue('F' . $column, $data['satuan'])
					->setCellValue('G' . $column, $data['harga'])
					->setCellValue('H' . $column, $data['jumlah'])
                    ->setCellValue('I' . $column, $data['kondisi'])
					->setCellValue('J' . $column, $data['keterangan'])
                    ->setCellValue('K' . $column, $data['nama_karyawan']);


        $column++;
    }


	// tulis dalam format .xlsx
    $writer = new Xlsx($spreadsheet);
    $fileName = 'Data Kendaraan';

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
			'kendaraan'	=> $this->kendaraan_model->getData(),	
		);
		$html =  view('kendaraan/pdf', $data);

		// test pdf

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
		// set font tulisan
		$pdf->SetFont('dejavusans', '', 10);
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// $pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Utari Pratiwi');
		$pdf->SetTitle('Data Kendaraan HSRCC');
		$pdf->SetSubject('Data Kendaraan');
		// add a page
		$pdf->AddPage();
		// write html
		$pdf->writeHTML($html);
		$this->response->setContentType('application/pdf');
		// ouput pdf
		$pdf->Output('data_kendaraan.pdf', 'I');


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
		return view('kendaraan/create', $data);
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
			'tanggal_masuk'        	=> $this->request->getPost('tanggal_masuk'),
			'kode_inventaris'    	=> $this->request->getPost('kode_inventaris'),
			'nama_item'         	=> $this->request->getPost('nama_item'),
			'merek'         		=> $this->request->getPost('merek'),
			'satuan'       			=> $this->request->getPost('satuan'),
			'harga'        			=> $this->request->getPost('harga'),
			'jumlah'        		=> $this->request->getPost('jumlah'),
			'kondisi'        		=> $this->request->getPost('kondisi'),
			'keterangan'        	=> $this->request->getPost('keterangan'),
			'karyawan_id'        	=> $this->request->getPost('karyawan_id'),

		);

		if ($validation->run($data, 'kendaraan') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('kendaraan/create'));
		} else {
			// insert
			$simpan = $this->kendaraan_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Tambah Data Berhasil');
				return redirect()->to(base_url('kendaraan'));
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
		$data['kendaraan'] = $this->kendaraan_model->getData($id);
		echo view('kendaraan/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('kendaraan_id');

		$validation =  \Config\Services::validation();

		$data = array(
			'tanggal_masuk'        	=> $this->request->getPost('tanggal_masuk'),
			'kode_inventaris'    	=> $this->request->getPost('kode_inventaris'),
			'nama_item'         	=> $this->request->getPost('nama_item'),
			'merek'         		=> $this->request->getPost('merek'),
			'satuan'       			=> $this->request->getPost('satuan'),
			'harga'        			=> $this->request->getPost('harga'),
			'jumlah'        		=> $this->request->getPost('jumlah'),
			'kondisi'        		=> $this->request->getPost('kondisi'),
			'keterangan'        	=> $this->request->getPost('keterangan'),
			'karyawan_id'        	=> $this->request->getPost('karyawan_id'),

		);
		if ($validation->run($data, 'kendaraan') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('kendaraan/edit/' . $id));
		} else {
			$ubah = $this->kendaraan_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Update Data Berhasil');
				return redirect()->to(base_url('kendaraan'));
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
		$hapus = $this->kendaraan_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Data Berhasil');
			return redirect()->to(base_url('kendaraan'));
		}
	}
}
