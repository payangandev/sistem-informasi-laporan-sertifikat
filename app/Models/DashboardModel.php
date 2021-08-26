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

	public function getCountAtk() { return $this->db->table("atk")->countAll(); }

	public function getCountKendaraan(){return $this->db->table("kendaraan")->countAll();}

	public function getCountAsset(){return $this->db->table("asset")->countAll();}

	public function getCountAudioVisual() {return $this->db->table("audiovisual")->countAll();}

	public function getCountFurniture() {return $this->db->table("furniture")->countAll();}

	public function getCountMultimedia() {return $this->db->table("multimedia")->countAll();}

	public function getCountElektronik() {return $this->db->table("elektronik")->countAll();}
}
