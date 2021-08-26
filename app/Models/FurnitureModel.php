2<?php

namespace App\Models;

use CodeIgniter\Model;

class FurnitureModel extends Model
{
	protected $table = 'furniture';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('furniture')
				->join('karyawan', 'karyawan.karyawan_id = furniture.karyawan_id')
				->get()
				->getResultArray();
		} else {
			return $this->table('furniture')
				->join('karyawan', 'karyawan.karyawan_id = furniture.karyawan_id')
				->where('furniture.furniture_id', $id)
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
		return $this->db->table($this->table)->update($data, ['furniture_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['furniture_id' => $id]);
	}
}