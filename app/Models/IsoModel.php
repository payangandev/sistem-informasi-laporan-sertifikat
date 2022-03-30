<?php

namespace App\Models;

use CodeIgniter\Model;

class IsoModel extends Model
{
	protected $table = 'iso';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('iso')
				->join('perusahaan', 'perusahaan.perusahaan_id = iso.perusahaan_id')
				->get()
				->getResultArray();
		} else {
			return $this->table('iso')
				->join('perusahaan', 'perusahaan.perusahaan_id = iso.perusahaan_id')
				->where('iso.iso_id', $id)
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
		return $this->db->table($this->table)->update($data, ['document_keluar_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['document_keluar_id' => $id]);
	}
}
