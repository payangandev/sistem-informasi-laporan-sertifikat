<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
	protected $table = 'users';

	public function getCountUser()
	{
		return $this->db->table("users")->countAll();
	}

	public function getCountKaryawan()
	{
		return $this->db->table("karyawan")->countAll();
	}

	public function getCountDocumentMasuk()
	{
		return $this->db->table("documentmasuk")->countAll();
	}

	public function getCounDocumentKeluar()
	{
		return $this->db->table("documentkeluar")->countAll();
	}

	public function getCountNotaMasuk()
	{
		return $this->db->table("notamasuk")->countAll();
	}

	public function getCountNotaKeluar()
	{
		return $this->db->table("notakeluar")->countAll();
	}
}
