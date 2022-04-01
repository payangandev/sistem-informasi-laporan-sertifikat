<?php

namespace App\Models;

use CodeIgniter\Model;

class PerusahaanModel extends Model
{
	protected $table = 'perusahaan';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('perusahaan')
				->get()
				->getResultArray();
		} else {
			return $this->table('perusahaan')
				->where('perusahaan.perusahaan_id', $id)
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
		return $this->db->table($this->table)->update($data, ['perusahaan_id' => $id]);
	}


	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['perusahaan_id' => $id]);
	}
}
