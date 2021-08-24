<?php

namespace App\Models;

use CodeIgniter\Model;

class AudioVisualModel extends Model
{
	protected $table = 'audiovisual';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('audiovisual')
				->join('karyawan', 'karyawan.karyawan_id = audiovisual.karyawan_id')
				->get()
				->getResultArray();
		} else {
			return $this->table('audiovisual')
				->join('karyawan', 'karyawan.karyawan_id = audiovisual.karyawan_id')
				->where('audiovisual.audiovisual_id', $id)
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
		return $this->db->table($this->table)->update($data, ['audiovisual_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['audiovisual_id' => $id]);
	}
}
