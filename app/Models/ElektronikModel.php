<?php

namespace App\Models;

use CodeIgniter\Model;

class ElektronikModel extends Model
{
	protected $table = 'elektronik';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('elektronik')
				->join('karyawan', 'karyawan.karyawan_id = elektronik.karyawan_id')
				->get()
				->getResultArray();
		} else {
			return $this->table('elektronik')
				->join('karyawan', 'karyawan.karyawan_id = elektronik.karyawan_id')
				->where('elektronik.elektronik_id', $id)
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
		return $this->db->table($this->table)->update($data, ['elektronik_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['elektronik_id' => $id]);
	}
}
