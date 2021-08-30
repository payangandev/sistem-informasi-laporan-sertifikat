<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\KaryawanModel;
use App\Models\AtkModel;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AtkController extends BaseController
{
public function __construct()
	{
		helper(['form']);
		$this->karyawan_model = new KaryawanModel();
		$this->atk_model = new AtkModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_atk') ? $this->request->getVar('page_atk') : 1;

		// paginate
		$paginate = 1000000;
		$data['atk']   = $this->atk_model->join('karyawan', 'karyawan.karyawan_id = atk.karyawan_id')->paginate($paginate, 'atk');
		$data['pager']        = $this->atk_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('atk/index', $data);
	}

	public function excel(){

		// $data = array(
		// 	'atk'	=> $this->atk_model->getAllData(),	
		// );
	 $atk = new AtkModel();
    $dataAtk = $atk->getAllData();
	
		$spreadsheet = new Spreadsheet();


 // tulis header/nama kolom 
    $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('B1', 'Kode Barang')
                ->setCellValue('C1', 'Nama')
                ->setCellValue('D1', 'Jenis')
                ->setCellValue('E1', 'Stock Awal')
				->setCellValue('F1', 'Stock Masuk')
                ->setCellValue('G1', 'Stock Keluar')
                ->setCellValue('H1', 'Stock Akhir')
                ->setCellValue('I1', 'Staff');

    
    $column = 2;
    // tulis data mobil ke cell
    foreach($dataAtk as $data) {
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('B' . $column, $data['kode_barang'])
                    ->setCellValue('C' . $column, $data['nama_barang'])
                    ->setCellValue('D' . $column, $data['jenis_barang'])
                    ->setCellValue('E' . $column, $data['stock_awal'])
                    ->setCellValue('F' . $column, $data['stock_masuk'])
					->setCellValue('G' . $column, $data['stock_keluar'])
					->setCellValue('H' . $column, $data['stock_akhir'])
                    ->setCellValue('I' . $column, $data['nama_karyawan']);

        $column++;
    }


	// tulis dalam format .xlsx
    $writer = new Xlsx($spreadsheet);
    $fileName = 'Data ATK';

    // Redirect hasil generate xlsx ke web client
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
    header('Cache-Control: max-age=0');
	$this->response->setContentType('application/excel');

    $writer->save('php://output');
	}

	public function pdf(){
		$data = array(
			'atk'	=> $this->atk_model->getAllData(),	
		);
		$html =  view('atk/pdf', $data);

		// test pdf

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
		// set font tulisan
		$pdf->SetFont('dejavusans', '', 10);
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// $pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Utari Pratiwi');
		$pdf->SetTitle('Data ATK HSRCC');
		$pdf->SetSubject('Data ATK');
		// add a page
		$pdf->AddPage();
		// write html
		$pdf->writeHTML($html);
		$this->response->setContentType('application/pdf');
		// ouput pdf
		$pdf->Output('data_atk.pdf', 'I');


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
		return view('atk/create', $data);
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
			'kode_barang'        		=> $this->request->getPost('kode_barang'),
			'nama_barang'    			=> $this->request->getPost('nama_barang'),
			'jenis_barang'         		=> $this->request->getPost('jenis_barang'),
			'stock_awal'         		=> $this->request->getPost('stock_awal'),
			'stock_masuk'       		=> $this->request->getPost('stock_masuk'),
			'stock_keluar'        		=> $this->request->getPost('stock_keluar'),
			'stock_akhir'        		=> $this->request->getPost('stock_akhir'),
			'karyawan_id'        		=> $this->request->getPost('karyawan_id'),

		);

		if ($validation->run($data, 'atk') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('atk/create'));
		} else {
			// insert
			$simpan = $this->atk_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Tambah Data Berhasil');
				return redirect()->to(base_url('atk'));
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
		$data['atk'] = $this->atk_model->getData($id);
		echo view('atk/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('atk_id');

		$validation =  \Config\Services::validation();

		$data = array(
			'kode_barang'        		=> $this->request->getPost('kode_barang'),
			'nama_barang'    			=> $this->request->getPost('nama_barang'),
			'jenis_barang'         		=> $this->request->getPost('jenis_barang'),
			'stock_awal'         		=> $this->request->getPost('stock_awal'),
			'stock_masuk'       		=> $this->request->getPost('stock_masuk'),
			'stock_keluar'        		=> $this->request->getPost('stock_keluar'),
			'stock_akhir'        		=> $this->request->getPost('stock_akhir'),
			'karyawan_id'        		=> $this->request->getPost('karyawan_id'),

		);
		if ($validation->run($data, 'atk') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('atk/edit/' . $id));
		} else {
			$ubah = $this->atk_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Update Data Berhasil');
				return redirect()->to(base_url('atk'));
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
		$hapus = $this->atk_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Data  Berhasil');
			return redirect()->to(base_url('atk'));
		}
	}
}
