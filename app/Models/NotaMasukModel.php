<?php

namespace App\Models;

use CodeIgniter\Model;

class NotaMasukModel extends Model
{
	protected $table = 'notamasuk';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('notamasuk')
				->join('karyawan', 'karyawan.karyawan_id = notamasuk.karyawan_id')
				->get()
				->getResultArray();
		} else {
			return $this->table('notamasuk')
				->join('karyawan', 'karyawan.karyawan_id = notamasuk.karyawan_id')
				->where('notamasuk.notamasuk_id', $id)
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
		return $this->db->table($this->table)->update($data, ['notamasuk_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['notamasuk_id' => $id]);
	}
}
