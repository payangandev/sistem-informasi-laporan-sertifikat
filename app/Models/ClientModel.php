<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
	protected $table = 'client';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('client')
				->get()
				->getResultArray();
		} else {
			return $this->table('client')
				->where('client.client_id', $id)
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
		return $this->db->table($this->table)->update($data, ['client_id' => $id]);
	}


	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['client_id' => $id]);
	}
}
