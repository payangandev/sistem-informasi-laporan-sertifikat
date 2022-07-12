<?php

namespace App\Models;

use CodeIgniter\Model;

class PenerimaanArsip extends Model
{
   
    protected $table = 'penerimaan';

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->table('penerimaan')
                ->join('client', 'client.client_id = penerimaan.client_id')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('penerimaan')
                ->join('client', 'client.client_id = penerimaan.client_id')
                ->where('penerimaan.penerimaan_id', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function insertData($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateData($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['penerimaan_id' => $id]);
    }


    public function deleteData($id)
    {
        return $this->db->table($this->table)->delete(['penerimaan_id' => $id]);
    }
}
