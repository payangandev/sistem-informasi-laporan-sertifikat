<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientModel;
use App\Models\PenyerahanArsip;
use TCPDF;

class PenyerahanArsipController extends BaseController
{
    public function __construct()
    {
        helper(['form']);
        $this->penyerahan_model = new PenyerahanArsip();
        $this->client_model = new ClientModel();
    }

    public function index()
    {
        // paginate
        $paginate = 5000;
        $data['penyerahan']   = $this->penyerahan_model->join('client', 'client.client_id = penyerahan.client_id', 'INNER JOIN')->paginate($paginate, 'penyerahan');
        echo view('penyerahan/index', $data);
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
        $pdf->SetTitle('Report Data Penyerahan Arsip');
        $pdf->SetSubject('Data Penyerahan Arsip');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Data Penyerahan Arsip', '');

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
        $pdf->Output('data_penyerahan_arsip.pdf', 'I');
    }

    public function create()
    {
        $client = $this->client_model->findAll();
        $data['client'] = ['' => 'client'] + array_column($client, 'nama', 'client_id');
        return view('penyerahan/create', $data);
    }

    public function store()
    {
        $validation =  \Config\Services::validation();
        $dataPenyerahan = $this->request->getFile('bukti_penyerahan');
        $filePenyerahan = $dataPenyerahan->getName();

        $data = array(
            'bukti_penyerahan'          => $filePenyerahan,
            'proggress'       			=> $this->request->getPost('proggress'),
            'tanggal_penyerahan'       	=> $this->request->getPost('tanggal_penyerahan'),
            'client_id'             	=> $this->request->getPost('client_id'),

        );
            $dataPenyerahan->move('uploads/penyerahan/', $filePenyerahan);

        if ($validation->run($data, 'penyerahan') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('penyerahan/create'));
        } else {
            // insert
            $simpan = $this->penyerahan_model->insertData($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Tambah Data Berhasil');
                return redirect()->to(base_url('penyerahan'));
            }
        }
    }

    public function edit($id)
    {
        $client = $this->client_model->findAll();
        $data['client'] = ['' => 'Pilih client'] + array_column($client, 'nama', 'client_id');
        $data['penyerahan'] = $this->penyerahan_model->getData($id);
        echo view('penyerahan/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('penyerahan_id');

        $validation =  \Config\Services::validation();

        $data = array(
            'bukti_penyerahan'          => $this->request->getPost('bukti_penyerahan'),
            'proggress'      		 	=> $this->request->getPost('proggress'),
            'tanggal_penyerahan'       	=> $this->request->getPost('tanggal_penyerahan'),
            'client_id'             	=> $this->request->getPost('client_id'),
        );
        if ($validation->run($data, 'penyerahan') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('penyerahan/edit/' . $id));
        } else {
            $ubah = $this->penyerahan_model->updateData($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Update Data Berhasil');
                return redirect()->to(base_url('penyerahan'));
            }
        }
    }

    public function delete($id)
    {
        $hapus = $this->penyerahan_model->deleteData($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Delete Data  Berhasil');
            return redirect()->to(base_url('penyerahan'));
        }
    }
}
