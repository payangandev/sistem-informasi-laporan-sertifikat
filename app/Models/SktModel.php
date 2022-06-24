<?php

namespace App\Models;

use CodeIgniter\Model;

class SktModel extends Model
{
	protected $table = 'skt';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('skt')
				->get()
				->getResultArray();
		} else {
			return $this->table('skt')
				->where('skt.skt_id', $id)
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
		return $this->db->table($this->table)->update($data, ['skt_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['skt_id' => $id]);
	}
}
