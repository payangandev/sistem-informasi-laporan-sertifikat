<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KaryawanModel;
use App\Models\AssetModel;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AssetController extends BaseController
{
public function __construct()
	{
		helper(['form']);
		$this->karyawan_model = new KaryawanModel();
		$this->asset_model = new AssetModel();
	}

	public function index()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_asset') ? $this->request->getVar('page_asset') : 1;

		// paginate
		$paginate = 1000000;
		$data['asset']   		= $this->asset_model->join('karyawan', 'karyawan.karyawan_id = asset.karyawan_id')->paginate($paginate, 'asset');
		$data['pager']        	= $this->asset_model->pager;
		$data['currentPage']  	= $currentPage;
		echo view('asset/index', $data);
	}


	public function excel(){
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}


	 $asset = new AssetModel();
     $dataAsset = $asset->getData();
	
		$spreadsheet = new Spreadsheet();


 // tulis header/nama kolom 
    $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('B1', 'Nama Kendaraan')
                ->setCellValue('C1', 'Tanggal Masuk')
                ->setCellValue('D1', 'Unit')
                ->setCellValue('E1', 'Harga')
				->setCellValue('F1', 'Jumlah')
                ->setCellValue('G1', 'Kondisi')
                ->setCellValue('H1', 'Keterangan')
                ->setCellValue('I1', 'Staff');

    
    $column = 2;
    // tulis data mobil ke cell
    foreach($dataAsset as $data) {
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('B' . $column, $data['nama_kendaraan'])
                    ->setCellValue('C' . $column, $data['tanggal_masuk'])
                    ->setCellValue('D' . $column, $data['unit'])
                    ->setCellValue('E' . $column, $data['harga'])
                    ->setCellValue('F' . $column, $data['jumlah'])
					->setCellValue('G' . $column, $data['kondisi'])
					->setCellValue('H' . $column, $data['keterangan'])
                    ->setCellValue('I' . $column, $data['nama_karyawan']);

        $column++;
    }


	// tulis dalam format .xlsx
    $writer = new Xlsx($spreadsheet);
    $fileName = 'Data Asset';

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
			'asset'	=> $this->asset_model->getData(),	
		);
		$html =  view('asset/pdf', $data);

		// test pdf

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4 POTRAIT', true, 'UTF-8', false);
		// set font tulisan
		$pdf->SetFont('dejavusans', '', 10);
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// $pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Utari Pratiwi');
		$pdf->SetTitle('Data Asset HSRCC');
		$pdf->SetSubject('Data Asset');
		// add a page
		$pdf->AddPage();
		
		// write html
		$pdf->writeHTML($html);
		$this->response->setContentType('application/pdf');
		// ouput pdf
		$pdf->Output('data_asset.pdf', 'I');


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
		return view('asset/create', $data);
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
			'nama_kendaraan'        	=> $this->request->getPost('nama_kendaraan'),
			'tanggal_masuk'    			=> $this->request->getPost('tanggal_masuk'),
			'unit'         				=> $this->request->getPost('unit'),
			'harga'         			=> $this->request->getPost('harga'),
			'jumlah'       				=> $this->request->getPost('jumlah'),
			'kondisi'       		 	=> $this->request->getPost('kondisi'),
			'keterangan'        		=> $this->request->getPost('keterangan'),
			'karyawan_id'        		=> $this->request->getPost('karyawan_id'),

		);

		if ($validation->run($data, 'asset') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('asset/create'));
		} else {
			// insert
			$simpan = $this->asset_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Tambah Data Berhasil');
				return redirect()->to(base_url('asset'));
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
		$data['asset'] = $this->asset_model->getData($id);
		echo view('asset/edit', $data);
	}

	public function update()
	{
		// proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('asset_id');

		$validation =  \Config\Services::validation();

		$data = array(
			'nama_kendaraan'        	=> $this->request->getPost('nama_kendaraan'),
			'tanggal_masuk'    			=> $this->request->getPost('tanggal_masuk'),
			'unit'         				=> $this->request->getPost('unit'),
			'harga'         			=> $this->request->getPost('harga'),
			'jumlah'       				=> $this->request->getPost('jumlah'),
			'kondisi'       		 	=> $this->request->getPost('kondisi'),
			'keterangan'        		=> $this->request->getPost('keterangan'),
			'karyawan_id'        		=> $this->request->getPost('karyawan_id'),
		);
		if ($validation->run($data, 'asset') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('asset/edit/' . $id));
		} else {
			$ubah = $this->asset_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Update Data Berhasil');
				return redirect()->to(base_url('asset'));
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
		$hapus = $this->asset_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Data Berhasil');
			return redirect()->to(base_url('asset'));
		}
	}
}
