<?php

namespace App\Models;

use CodeIgniter\Model;

class KtigaModel extends Model
{
	protected $table = 'ktiga';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('ktiga')
				->get()
				->getResultArray();
		} else {
			return $this->table('ktiga')
				->where('ktiga.ktiga_id', $id)
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
		return $this->db->table($this->table)->update($data, ['ktiga_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['ktiga_id' => $id]);
	}
}
