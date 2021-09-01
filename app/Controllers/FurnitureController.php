<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KaryawanModel;
use App\Models\FurnitureModel;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class FurnitureController extends BaseController
{
public function __construct()
	{
		helper(['form']);
		$this->karyawan_model = new KaryawanModel();
		$this->furniture_model = new FurnitureModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_furniture') ? $this->request->getVar('page_furniture') : 1;

		// paginate
		$paginate = 1000000;
		$data['furniture']   = $this->furniture_model->join('karyawan', 'karyawan.karyawan_id = furniture.karyawan_id')->paginate($paginate, 'furniture');
		$data['pager']        = $this->furniture_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('furniture/index', $data);
	}
	public function excel(){
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}


	 $furniture = new FurnitureModel();
     $dataFurniture = $furniture->getData();
	
		$spreadsheet = new Spreadsheet();


 // tulis header/nama kolom 
    $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('B1', 'Nama Barang')
                ->setCellValue('C1', 'Kode Inventaris')
                ->setCellValue('D1', 'Harga')
                ->setCellValue('E1', 'Jumlah')
				->setCellValue('F1', 'Tanggal Beli')
                ->setCellValue('G1', 'Total')
                ->setCellValue('H1', 'Kondisi')
                ->setCellValue('I1', 'Staff');

    
    $column = 2;
    // tulis data mobil ke cell
    foreach($dataFurniture as $data) {
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('B' . $column, $data['nama_item'])
                    ->setCellValue('C' . $column, $data['kode'])
                    ->setCellValue('D' . $column, $data['harga'])
                    ->setCellValue('E' . $column, $data['qty'])
                    ->setCellValue('F' . $column, $data['tanggal_beli'])
					->setCellValue('G' . $column, $data['total'])
					->setCellValue('H' . $column, $data['kondisi'])
                    ->setCellValue('I' . $column, $data['nama_karyawan']);

        $column++;
    }


	// tulis dalam format .xlsx
    $writer = new Xlsx($spreadsheet);
    $fileName = 'Data Furniture';

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
			'furniture'	=> $this->furniture_model->getData(),	
		);
		$html =  view('furniture/pdf', $data);

		// test pdf

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A3', true, 'UTF-8', false);
		// set font tulisan
		$pdf->SetFont('dejavusans', '', 10);
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// $pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Utari Pratiwi');
		$pdf->SetTitle('Data Furniture HSRCC');
		$pdf->SetSubject('Data Furniture');
		// add a page
		$pdf->AddPage();
		// write html
		$pdf->writeHTML($html);
		$this->response->setContentType('application/pdf');
		// ouput pdf
		$pdf->Output('data_furniture.pdf', 'I');


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
		return view('furniture/create', $data);
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
			'nama_item'        	=> $this->request->getPost('nama_item'),
			'kode'    			=> $this->request->getPost('kode'),
			'harga'         	=> $this->request->getPost('harga'),
			'qty'        		=> $this->request->getPost('qty'),
			'tanggal_beli'      => $this->request->getPost('tanggal_beli'),
			'total'        		=> $this->request->getPost('total'),
			'kondisi'        	=> $this->request->getPost('kondisi'),
			'karyawan_id'       => $this->request->getPost('karyawan_id'),

		);

		if ($validation->run($data, 'furniture') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('furniture/create'));
		} else {
			// insert
			$simpan = $this->furniture_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Tambah Data Berhasil');
				return redirect()->to(base_url('furniture'));
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
		$data['furniture'] = $this->furniture_model->getData($id);
		echo view('furniture/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('furniture_id');

		$validation =  \Config\Services::validation();

		$data = array(
			'nama_item'        	=> $this->request->getPost('nama_item'),
			'kode'    			=> $this->request->getPost('kode'),
			'harga'         	=> $this->request->getPost('harga'),
			'qty'        		=> $this->request->getPost('qty'),
			'tanggal_beli'      => $this->request->getPost('tanggal_beli'),
			'total'        		=> $this->request->getPost('total'),
			'kondisi'        	=> $this->request->getPost('kondisi'),
			'karyawan_id'       => $this->request->getPost('karyawan_id'),

		);
		if ($validation->run($data, 'furniture') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('furniture/edit/' . $id));
		} else {
			$ubah = $this->furniture_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Update Data Berhasil');
				return redirect()->to(base_url('furniture'));
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
		$hapus = $this->furniture_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Data Berhasil');
			return redirect()->to(base_url('furniture'));
		}
	}
}
