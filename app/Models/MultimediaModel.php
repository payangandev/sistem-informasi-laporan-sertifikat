<?php

namespace App\Models;

use CodeIgniter\Model;

class MultimediaModel extends Model
{
		protected $table = 'multimedia';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('multimedia')
				->join('karyawan', 'karyawan.karyawan_id = multimedia.karyawan_id')
				->get()
				->getResultArray();
		} else {
			return $this->table('multimedia')
				->join('karyawan', 'karyawan.karyawan_id = multimedia.karyawan_id')
				->where('multimedia.multimedia_id', $id)
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
		return $this->db->table($this->table)->update($data, ['multimedia_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['multimedia_id' => $id]);
	}
}
