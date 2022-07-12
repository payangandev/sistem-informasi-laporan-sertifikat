<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientModel;
use App\Models\PenerimaanArsip;
use TCPDF;

class PenerimaanArsipController extends BaseController
{ public function __construct()
    {
        helper(['form']);
        $this->penerimaan_model = new PenerimaanArsip();
        $this->client_model = new ClientModel();
    }

    public function index()
    {
        // paginate
        $paginate = 5000;
        $data['penerimaan']   = $this->penerimaan_model->join('client', 'client.client_id = penerimaan.client_id', 'INNER JOIN')->paginate($paginate, 'penerimaan');
        echo view('penerimaan/index', $data);
    }


    public function pdf()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }

        $data = array(
            'client'    => $this->client_model->getData(),
        );
        $html =  view('client/pdf', $data);

        // test pdf

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
        // set font tulisan
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Dita Apriliyani');
        $pdf->SetTitle('Report Data Penerimaan Arsip');
        $pdf->SetSubject('Data Penerimaan Arsip');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Data Penerimaan Arsip', '');

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
        $pdf->Output('data_penerimaan_arsip.pdf', 'I');
    }

    public function create()
    {
        $client = $this->client_model->findAll();
        $data['client'] = ['' => 'client'] + array_column($client, 'nama', 'client_id');
        return view('penerimaan/create', $data);
    }

    public function store()
    {
        $validation =  \Config\Services::validation();
        $dataPenerimaan = $this->request->getFile('bukti_penerimaan');
        $filePenerimaan = $dataPenerimaan->getRandomName();


        $data = array(
            'bukti_penerimaan'          => $filePenerimaan,
            'proggress'       			=> $this->request->getPost('proggress'),
            'tanggal_penerimaan'        => $this->request->getPost('tanggal_penerimaan'),
            'client_id'             	=> $this->request->getPost('client_id'),

        );

        $dataPenerimaan->move('uploads/penerimaan/', $filePenerimaan);

        if ($validation->run($data, 'penerimaan') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('penerimaan/create'));
        } else {
            // insert
            $simpan = $this->penerimaan_model->insertData($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Tambah Data Berhasil');
                return redirect()->to(base_url('penerimaan'));
            }
        }
    }

    public function edit($id)
    {
        $client = $this->client_model->findAll();
        $data['client'] = ['' => 'Pilih client'] + array_column($client, 'nama', 'client_id');
        $data['penerimaan'] = $this->penerimaan_model->getData($id);
        echo view('penerimaan/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('penerimaan_id');

        $validation =  \Config\Services::validation();

        $data = array(
            'bukti_penerimaan'          => $this->request->getPost('bukti_penerimaan'),
            'proggress'       			=> $this->request->getPost('proggress'),
            'tanggal_penerimaan'       	=> $this->request->getPost('tanggal_penerimaan'),
            'client_id'             	=> $this->request->getPost('client_id'),
        );
        if ($validation->run($data, 'penerimaan') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('penerimaan/edit/' . $id));
        } else {
            $ubah = $this->penerimaan_model->updateData($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Update Data Berhasil');
                return redirect()->to(base_url('penerimaan'));
            }
        }
    }

    public function delete($id)
    {
        $hapus = $this->penerimaan_model->deleteData($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Delete Data  Berhasil');
            return redirect()->to(base_url('penerimaan'));
        }
    }
}
