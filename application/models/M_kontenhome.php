<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_kontenhome extends CI_Model{

	public function listing($where='')
	{
		$this->db->select("*");
		$this->db->from("kontenhome");
		$query = $this->db->get();
		return $query->result();
	}
}