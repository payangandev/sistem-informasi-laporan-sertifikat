<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KaryawanModel;
use App\Models\IsoModel;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class IsoController extends BaseController
{
	public function __construct()
	{
		helper(['form']);
		$this->karyawan_model = new KaryawanModel();
		$this->iso_model = new IsoModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_iso') ? $this->request->getVar('page_iso') : 1;

		// paginate
		$paginate = 1000000;
		$data['iso']   = $this->iso_model->join('karyawan', 'karyawan.karyawan_id = iso.karyawan_id')->paginate($paginate, 'iso');
		$data['pager']        = $this->iso_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('iso/index', $data);
	}

	public function excel(){
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}


	 $iso = new IsoModel();
     $dataiso = $iso->getData();
	
		$spreadsheet = new Spreadsheet();


 // tulis header/nama kolom 
    $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('B1', 'Perusahaan')
                ->setCellValue('C1', 'Kode Iso')
                ->setCellValue('D1', 'Tanggal Terbit')
                ->setCellValue('E1', 'Survailance 1')
				->setCellValue('F1', 'Survailance 2')
                ->setCellValue('G1', 'Tanggal Berakhir')
                ->setCellValue('H1', 'Tanggal Proses')
				->setCellValue('I1', 'Tanggal Selesai')
                ->setCellValue('J1', 'No Resi')
                ->setCellValue('K1', 'Marketing')
                ->setCellValue('L1', 'Harga Jual');

    
    $column = 2;
    // tulis data mobil ke cell
    foreach($dataiso as $data) {
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('B' . $column, $data['nama_perusahaan'])
                    ->setCellValue('C' . $column, $data['kode_iso'])
                    ->setCellValue('D' . $column, $data['tanggal_terbit'])
                    ->setCellValue('E' . $column, $data['survailance_one'])
                    ->setCellValue('F' . $column, $data['survailance_two'])
					->setCellValue('G' . $column, $data['tanggal_berakhir'])
					->setCellValue('H' . $column, $data['tanggal_proses'])
					->setCellValue('I' . $column, $data['tanggal_selesai'])
					->setCellValue('J' . $column, $data['no_resi'])
					->setCellValue('K' . $column, $data['marketing'])
                    ->setCellValue('L' . $column, $data['harga_jual']);

        $column++;
    }


	// tulis dalam format .xlsx
    $writer = new Xlsx($spreadsheet);
    $fileName = 'Data Audio Visual';

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
			'iso'	=> $this->iso_model->getData(),	
		);
		$html =  view('iso/pdf', $data);

		// test pdf

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A2', true, 'UTF-8', false);
		// set font tulisan
		$pdf->SetFont('dejavusans', '', 10);
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// $pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Dita');
		$pdf->SetTitle('Data Sertifikasi ISO');
		$pdf->SetSubject('Data Sertifikasi ISO');
		// add a page
		$pdf->AddPage();
		// write html
		$pdf->writeHTML($html);
		$this->response->setContentType('application/pdf');
		// ouput pdf
		$pdf->Output('data_sertifikasi_iso.pdf', 'I');


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
		return view('iso/create', $data);
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
			'kode_iso'        		=> $this->request->getPost('kode_iso'),
			'tanggal_terbit'    	=> $this->request->getPost('tanggal_terbit'),
			'survailance_one'       => $this->request->getPost('survailance_one'),
			'survailance_two'       => $this->request->getPost('survailance_two'),
			'tanggal_berakhir'      => $this->request->getPost('tanggal_berakhir'),
			'tanggal_proses'       	=> $this->request->getPost('tanggal_proses'),
			'tanggal_selesai'       => $this->request->getPost('tanggal_selesai'),
			'no_resi'        		=> $this->request->getPost('no_resi'),
			'marketing'        		=> $this->request->getPost('marketing'),
			'harga_jual'        	=> $this->request->getPost('harga_jual'),
			'perusahaan_id'        	=> $this->request->getPost('perusahaan_id'),

		);

		if ($validation->run($data, 'iso') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('iso/create'));
		} else {
			// insert
			$simpan = $this->iso_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Tambah Data Berhasil');
				return redirect()->to(base_url('iso'));
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
		$data['iso'] = $this->iso_model->getData($id);
		echo view('iso/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('iso_id');

		$validation =  \Config\Services::validation();

		$data = array(
			
			'kode_iso'        		=> $this->request->getPost('kode_iso'),
			'tanggal_terbit'    	=> $this->request->getPost('tanggal_terbit'),
			'survailance_one'       => $this->request->getPost('survailance_one'),
			'survailance_two'       => $this->request->getPost('survailance_two'),
			'tanggal_berakhir'      => $this->request->getPost('tanggal_berakhir'),
			'tanggal_proses'       	=> $this->request->getPost('tanggal_proses'),
			'tanggal_selesai'       => $this->request->getPost('tanggal_selesai'),
			'no_resi'        		=> $this->request->getPost('no_resi'),
			'marketing'        		=> $this->request->getPost('marketing'),
			'harga_jual'        	=> $this->request->getPost('harga_jual'),
			'perusahaan_id'        	=> $this->request->getPost('perusahaan_id'),


		);
		if ($validation->run($data, 'iso') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('iso/edit/' . $id));
		} else {
			$ubah = $this->iso_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Update Data Berhasil');
				return redirect()->to(base_url('iso'));
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
		$hapus = $this->iso_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Data Berhasil');
			return redirect()->to(base_url('iso'));
		}
	}
}
