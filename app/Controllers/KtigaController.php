<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\KaryawanModel;
use App\Models\KtigaModel;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ktigaController extends BaseController
{
public function __construct()
	{
		helper(['form']);
		$this->karyawan_model = new KaryawanModel();
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
		$data['ktiga']   = $this->ktiga_model->join('karyawan', 'karyawan.karyawan_id = ktiga.karyawan_id')->paginate($paginate, 'ktiga');
		$data['pager']        = $this->ktiga_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('ktiga/index', $data);
	}

	public function excel(){
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
                ->setCellValue('B1', 'Nama Personil')
                ->setCellValue('C1', 'Sub Bidang')
                ->setCellValue('D1', 'Nama Perusahaan')
                ->setCellValue('E1', 'Harga Setor')
				->setCellValue('F1', 'Order Lencana')
                ->setCellValue('G1', 'Harga Jual')
                ->setCellValue('H1', 'Tanggal Proses')
                ->setCellValue('I1', 'Marketing')
				->setCellValue('J1', 'Tanggal Selesai')
                ->setCellValue('K1', 'No Resi');


    
    $column = 2;
    // tulis data mobil ke cell
    foreach($dataktiga as $data) {
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('B' . $column, $data['nama_personil'])
                    ->setCellValue('C' . $column, $data['sub_bidang'])
                    ->setCellValue('D' . $column, $data['nama_perusahaan'])
                    ->setCellValue('E' . $column, $data['harga_setor'])
                    ->setCellValue('F' . $column, $data['order_lencana'])
					->setCellValue('G' . $column, $data['harga_jual'])
					->setCellValue('H' . $column, $data['tanggal_proses'])
                    ->setCellValue('I' . $column, $data['marketing'])
					->setCellValue('J' . $column, $data['tanggal_selesai'])
                    ->setCellValue('K' . $column, $data['no_resi']);

        $column++;
    }


	// tulis dalam format .xlsx
    $writer = new Xlsx($spreadsheet);
    $fileName = 'Data ktiga';

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
			'ktiga'	=> $this->ktiga_model->getData(),	
		);
		$html =  view('ktiga/pdf', $data);

		// test pdf

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
		// set font tulisan
		$pdf->SetFont('dejavusans', '', 10);
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// $pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Dita');
		$pdf->SetTitle('Data Sertifikasi K3');
		$pdf->SetSubject('Data Sertifikasi K3');
		// add a page
		$pdf->AddPage();
		// write html
		$pdf->writeHTML($html);
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
		$karyawan = $this->karyawan_model->findAll();
		$data['karyawan'] = ['' => 'karyawan'] + array_column($karyawan, 'nama_karyawan', 'karyawan_id');
		return view('ktiga/create', $data);
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
			'nama_personil'        		=> $this->request->getPost('nama_personil'),
			'sub_bidang'    			=> $this->request->getPost('sub_bidang'),
			'perusahaan_id'         	=> $this->request->getPost('perusahaan_id'),
			'harga_setor'         		=> $this->request->getPost('harga_setor'),
			'order_lencana'       		=> $this->request->getPost('order_lencana'),
			'harga_jual'        		=> $this->request->getPost('harga_jual'),
			'tanggal_proses'        	=> $this->request->getPost('tanggal_proses'),
			'marketing'        			=> $this->request->getPost('marketing'),
			'tanggal_selesai'        	=> $this->request->getPost('tanggal_selesai'),
			'no_resi'        			=> $this->request->getPost('no_resi'),
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
		$karyawan = $this->karyawan_model->findAll();
		$data['karyawan'] = ['' => 'Pilih karyawan'] + array_column($karyawan, 'nama_karyawan', 'karyawan_id');
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
			'nama_personil'        		=> $this->request->getPost('nama_personil'),
			'sub_bidang'    			=> $this->request->getPost('sub_bidang'),
			'perusahaan_id'         	=> $this->request->getPost('perusahaan_id'),
			'harga_setor'         		=> $this->request->getPost('harga_setor'),
			'order_lencana'       		=> $this->request->getPost('order_lencana'),
			'harga_jual'        		=> $this->request->getPost('harga_jual'),
			'tanggal_proses'        	=> $this->request->getPost('tanggal_proses'),
			'marketing'        			=> $this->request->getPost('marketing'),
			'tanggal_selesai'        	=> $this->request->getPost('tanggal_selesai'),
			'no_resi'        			=> $this->request->getPost('no_resi'),

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
