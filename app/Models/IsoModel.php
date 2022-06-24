<?php

namespace App\Models;

use CodeIgniter\Model;

class IsoModel extends Model
{
	protected $table = 'iso';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('iso')
				->get()
				->getResultArray();
		} else {
			return $this->table('iso')
				->where('iso.iso_id', $id)
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
		return $this->db->table($this->table)->update($data, ['iso_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['iso_id' => $id]);
	}
}
