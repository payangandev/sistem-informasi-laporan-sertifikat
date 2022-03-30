<?php

namespace App\Models;

use CodeIgniter\Model;

class SkaModel extends Model
{
	protected $table = 'ska';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('ska')
				->join('karyawan', 'karyawan.karyawan_id = ska.karyawan_id')
				->get()
				->getResultArray();
		} else {
			return $this->table('ska')
				->join('karyawan', 'karyawan.karyawan_id = ska.karyawan_id')
				->where('ska.ska_id', $id)
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
		return $this->db->table($this->table)->update($data, ['ska_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['ska_id' => $id]);
	}
}
