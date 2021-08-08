<?php

namespace App\Models;

use CodeIgniter\Model;

class NotaKeluarModel extends Model
{
	protected $table = 'notakeluar';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('notakeluar')
				->join('karyawan', 'karyawan.karyawan_id = notakeluar.karyawan_id')
				->get()
				->getResultArray();
		} else {
			return $this->table('notakeluar')
				->join('karyawan', 'karyawan.karyawan_id = notakeluar.karyawan_id')
				->where('notakeluar.notakeluar_id', $id)
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
		return $this->db->table($this->table)->update($data, ['notakeluar_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['notakeluar_id' => $id]);
	}
}
