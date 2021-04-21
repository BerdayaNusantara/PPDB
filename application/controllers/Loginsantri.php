<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginsantri extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','download','file'));
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->library('form_validation');
		$this->load->model("m_aplikasi");
		$this->load->model("m_kontak");
		$this->load->model("m_kontenhome");
		$this->load->model("m_call");
		$this->load->model("m_alasan");
		$this->load->model("m_konfigurasi");
		$this->load->model("m_biaya");
		
	}
	public function index()
	{
		

		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri"))
		{
			redirect("santri/dashboard");
		}else{
			$data_app = $this->m_aplikasi->listing();
			foreach ($data_app as $da) {
				$nama_app=$da->nama;
				$instansi=$da->instansi;
				$tahun=$da->tahun;
				$logo=$da->logo;
			}
			
			$page="Login";

			$data_profil = $this->m_aplikasi->GetProfilSekolah();
			if(count($data_profil)>0)
			{
				foreach ($data_profil as $db) {
					$datapub["nama_sekolah"]=$db->nama;
					$datapub["logo_sekolah"]=$db->logo;
					$datapub["alamat_sekolah"]=$db->alamat;
					$datapub["telp_sekolah"]=$db->telp;
					$datapub["email_sekolah"]=$db->email;
				}
			}

			$datapub["page"]=$page;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;

			$this->load->view("page/login",$datapub);
		}

		
	}
	public function proses()
	{
		$email = $this->input->post("email");
		$pass = $this->input->post("password");
		$login = $this->m_aplikasi->GetLoginSantri($email,$pass);
		if($login)
		{
			$output['hasil']=1;
	        $output['pesan']='Selamat datang kembali';  
		}else{
			$output['hasil']=0;
	        $output['pesan']='Mohon periksa kembali email/nomor whatsapp dan password anda';  
		}
		echo json_encode($output);
	}
}