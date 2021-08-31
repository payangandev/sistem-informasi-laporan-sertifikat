<?php

namespace App\Models;

use CodeIgniter\Model;

class AtkModel extends Model
{
	protected $table = 'atk';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('atk')
				->join('karyawan', 'karyawan.karyawan_id = atk.karyawan_id')
				->get()
				->getResultArray();
		} else {
			return $this->table('atk')
				->join('karyawan', 'karyawan.karyawan_id = atk.karyawan_id')
				->where('atk.atk_id', $id)
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
		return $this->db->table($this->table)->update($data, ['atk_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['atk_id' => $id]);
	}


}	
