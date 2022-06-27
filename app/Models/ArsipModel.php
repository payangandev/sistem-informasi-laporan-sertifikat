<?php

namespace App\Models;

use CodeIgniter\Model;

class ArsipModel extends Model
{
    public function getData($id = false)
    {
        if ($id === false) {
            return $this->table('arsip')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('arsip')
                ->where('arsip.arsip_id', $id)
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
        return $this->db->table($this->table)->update($data, ['arsip_id' => $id]);
    }


    public function deleteData($id)
    {
        return $this->db->table($this->table)->delete(['arsip_id' => $id]);
    }
}
