<?php

namespace App\Models;

use CodeIgniter\Model;

class KendaraanModel extends Model
{
	protected $table = 'kendaraan';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('kendaraan')
				->join('karyawan', 'karyawan.karyawan_id = kendaraan.karyawan_id')
				->get()
				->getResultArray();
		} else {
			return $this->table('kendaraan')
				->join('karyawan', 'karyawan.karyawan_id = kendaraan.karyawan_id')
				->where('kendaraan.kendaraan_id', $id)
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
		return $this->db->table($this->table)->update($data, ['kendaraan_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['kendaraan_id' => $id]);
	}
}
