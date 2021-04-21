<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_aplikasi extends CI_Model{

	public function listing($where='')
	{
		$this->db->select("*");
		$this->db->from("app_information");
		$query = $this->db->get();
		return $query->result();
	}

	public function GetLogin($e,$p)
	{
		$email = $e;
		$pass = md5($p);

		$this->db->where('email', $email);
		$this->db->where('password', $pass);
		$query = $this->db->get('user');

		if($query->num_rows()>0)
		{
			$query2 = $this->db->query("SELECT id, email, password, username, foto, level FROM user  where email='".$email."' AND password='".$pass."' ");
			foreach ($query2->result() as $data) {
				$sess_data['id'] = $data->id;
				$sess_data['level'] = $data->level;
				$sess_data['logged_in'] = 'yes';
				$this->session->set_userdata($sess_data);
				// header('location:'.base_url().'home');
				return true;
			}
		}else{
			return false;
		}
	}
	public function GetLoginSantri($e,$p)
	{
		$email = $e;
		$pass = md5($p);

		$this->db->where('email', $email);
		$this->db->or_where("whatsapp",$email);
		$this->db->where('password', $pass);
		$query = $this->db->get('siswa');

		if($query->num_rows()>0)
		{
			$query2 = $this->db->query("SELECT id, id_uniq, kode, nama, jenis_kelamin, email, nisn FROM siswa  where (email='".$email."' OR whatsapp='".$email."') AND password='".$pass."' ");
			foreach ($query2->result() as $data) {
				$sess_data['id'] = $data->id;
				$sess_data['iduniq'] = $data->id_uniq;
				$sess_data['level'] = "Santri";
				$sess_data['logged_in'] = 'yes';
				$this->session->set_userdata($sess_data);
				// header('location:'.base_url().'home');
				return true;
			}
		}else{
			return false;
		}
	}

	public function GetProfilSekolah()
	{
		$this->db->select("*");
		$this->db->from("profil_sekolah");
		$query = $this->db->get();
		return $query->result();
	}
	
	public function UpdateData($tableName,$data,$where){
		$res = $this->db->update($tableName,$data,$where);
		return $res;
	}
	public function DeleteData($tableName,$where){
		$res = $this->db->delete($tableName,$where);
		return $res;
	}
	public function InsertData($tableName, $data)
	{
		$res = $this->db->insert($tableName, $data);
		return $res;
	}

}