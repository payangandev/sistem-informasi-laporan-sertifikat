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

	public function getCountKtiga()
	{
		return $this->db->table("ktiga")->countAll();
	}

	public function getCountSka()
	{
		return $this->db->table("ska")->countAll();
	}

	public function  getCountSkt()
	{
		return $this->db->table("skt")->countAll();
	}

	public function getCountIso()
	{
		return $this->db->table("iso")->countAll();
	}

	public function getCountClient()
	{
		return $this->db->table("client")->countAll();
	}

	public function getCountArsip()
	{
		return $this->db->table("arsip")->countAll();
	}
}
