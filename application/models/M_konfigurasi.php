<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_konfigurasi extends CI_Model{

	public function listing($where='')
	{
		$this->db->select("*");
		$this->db->from("konfigurasi_sistem");
		$query = $this->db->get();
		return $query->result();
	}
}