<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyerahanArsip extends Model
{
 
    protected $table = 'penyerahan';

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->table('penyerahan')
                ->join('client', 'client.client_id = penyerahan.client_id')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('penyerahan')
                ->join('client', 'client.client_id = penyerahan.client_id')
                ->where('penyerahan.penyerahan_id', $id)
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
        return $this->db->table($this->table)->update($data, ['penyerahan_id' => $id]);
    }


    public function deleteData($id)
    {
        return $this->db->table($this->table)->delete(['penyerahan_id' => $id]);
    }
}
