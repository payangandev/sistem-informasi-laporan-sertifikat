<?php

namespace App\Models;

use CodeIgniter\Model;

class AssetModel extends Model
{
	protected $table = 'asset';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('asset')
				->join('karyawan', 'karyawan.karyawan_id = asset.karyawan_id')
				->get()
				->getResultArray();
		} else {
			return $this->table('asset')
				->join('karyawan', 'karyawan.karyawan_id = asset.karyawan_id')
				->where('asset.asset_id', $id)
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
		return $this->db->table($this->table)->update($data, ['asset_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['asset_id' => $id]);
	}
}
