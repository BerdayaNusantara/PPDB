<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$this->load->model("m_siswa");
		$this->load->model("m_user");
		$this->load->model("m_jenjang");
		$this->load->model("m_jadwal_daftar");
		$this->load->model("m_jadwal");
		$this->load->model("m_syarat_admin");
		$this->load->model("m_alur_daftar");
		$this->load->model("m_keringanan");
		
	}
	public function cek_buka()
	{
		$data_open = $this->m_jadwal->openppdb();
		if(count($data_open)>0){
			foreach ($data_open as $do) {
				$status = $do->status;
			}
		}else{
			$status="Tutup";
		}
		$input['status']=$status;
		echo json_encode($input);
	}
	public function home()
	{
		$data_app = $this->m_aplikasi->listing();
		foreach ($data_app as $da) {
			$nama_app=$da->nama;
			$instansi=$da->instansi;
			$tahun=$da->tahun;
			$logo=$da->logo;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;
		}
		$data_jadwal=$this->m_jadwal_daftar->listing();
		$data_syarat=$this->m_syarat_admin->listing();
		$data_jenjang= $this->m_jenjang->listing();

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
		$datapub["page"]="Beranda";
		$datapub["jadwal"]=$data_jadwal;
		$datapub["syarat"]=$data_syarat;
		$datapub["data_jenjang"]=$data_jenjang;
		$navbar = $this->load->view("pubs/navbar-home",$datapub,TRUE);
		$footer = $this->load->view("pubs/footer-home",$datapub,TRUE);

		$datapub["navbar"]=$navbar;
		$datapub["footer"]=$footer;
		$this->load->view('home',$datapub);
	}
	public function alur()
	{
		$data_app = $this->m_aplikasi->listing();
		foreach ($data_app as $da) {
			$nama_app=$da->nama;
			$instansi=$da->instansi;
			$tahun=$da->tahun;
			$logo=$da->logo;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;
		}
		$data_jadwal=$this->m_jadwal_daftar->listing();
		$data_syarat=$this->m_syarat_admin->listing();
		$data_alur = $this->m_alur_daftar->listing();

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

		$datapub["page"]="Alur";
		$datapub["jadwal"]=$data_jadwal;
		$datapub["syarat"]=$data_syarat;
		$datapub["data_alur"]=$data_alur;
		$navbar = $this->load->view("pubs/navbar-home",$datapub,TRUE);
		$footer = $this->load->view("pubs/footer-home",$datapub,TRUE);

		$datapub["navbar"]=$navbar;
		$datapub["footer"]=$footer;
		$this->load->view('alur',$datapub);
	}
	public function biaya()
	{
		$data_app = $this->m_aplikasi->listing();
		foreach ($data_app as $da) {
			$nama_app=$da->nama;	
			$instansi=$da->instansi;
			$tahun=$da->tahun;
			$logo=$da->logo;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;
		}
		$data_jadwal=$this->m_jadwal_daftar->listing();
		$data_syarat=$this->m_syarat_admin->listing();
		$data_biaya = $this->m_biaya->listing();
		$data_biaya_ringan = $this->m_keringanan->listing();

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

		$datapub["page"]="Biaya";
		$datapub["jadwal"]=$data_jadwal;
		$datapub["syarat"]=$data_syarat;
		$datapub["data_biaya"]=$data_biaya;
		$datapub["data_biaya_ringan"]=$data_biaya_ringan;
		$navbar = $this->load->view("pubs/navbar-home",$datapub,TRUE);
		$footer = $this->load->view("pubs/footer-home",$datapub,TRUE);

		$datapub["navbar"]=$navbar;
		$datapub["footer"]=$footer;
		$this->load->view('biaya',$datapub);
	}
	public function kontak()
	{
		$data_app = $this->m_aplikasi->listing();
		foreach ($data_app as $da) {
			$nama_app=$da->nama;	
			$instansi=$da->instansi;
			$tahun=$da->tahun;
			$logo=$da->logo;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;
		}
		$data_jadwal=$this->m_jadwal_daftar->listing();
		$data_syarat=$this->m_syarat_admin->listing();
		$data_kontak = $this->m_kontak->listing_kontak();

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

		$datapub["page"]="Kontak";
		$datapub["jadwal"]=$data_jadwal;
		$datapub["syarat"]=$data_syarat;
		$datapub["data_kontak"]=$data_kontak;
		$navbar = $this->load->view("pubs/navbar-home",$datapub,TRUE);
		$footer = $this->load->view("pubs/footer-home",$datapub,TRUE);

		$datapub["navbar"]=$navbar;
		$datapub["footer"]=$footer;
		$this->load->view('kontak',$datapub);
	}
	public function forgetpassword()
	{
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

		$this->load->view("page/forget",$datapub);
	}
	public function prosesforget()
	{
		$email_send = $this->input->post("email");
		$data_siswa=$this->m_siswa->listing(" WHERE email='$email_send'");
		foreach ($data_siswa as $ds) {
			$id_unik = $ds->id_uniq;
		}
		$data_sistem = $this->m_konfigurasi->listing();
		foreach ($data_sistem as $db) {
			$email=$db->email;
			$email_subject=$db->email_subject;
			$email_port=$db->email_port;
			$email_host=$db->email_host;
			$email_pass=$db->email_pass;

		}
		$config = Array(
          'mailtype'  => 'html',
		  'protocol' => 'smtp',
		  'smtp_host' => $email_host,
		  'smtp_crypto' => 'ssl',
		  'smtp_port' => $email_port,
		  'smtp_user' => $email,
		  'smtp_pass' => $email_pass,
		  'crlf' => "\r\n",
		  'newline' => "\r\n"
		);
 
        $this->load->library('email', $config);

        $this->email->from($email, $email_subject);
          $this->email->to($email_send);
          $this->email->subject('Reset Password');
          $this->email->message("Berikut ini link untuk reset password akun anda ".base_url()."resetpassword/".$id_unik."");

          if($this->email->send()) {
               	$output['hasil']=1;
	        	$output['pesan']='Selamat datang kembali';  
          }
          else {
          		$output['hasil']=0;
	        	$output['pesan']='Mohon periksa kembali email password anda';  
          }
          echo json_encode($output);
	}
	public function prosesforgetadmin()
	{
		$email_send = $this->input->post("email");
		$data_admin=$this->m_user->listing(" WHERE email='$email_send'");
		foreach ($data_admin as $ds) {
			$id_unik = $ds->id_uniq;
		}
		$data_sistem = $this->m_konfigurasi->listing();
		foreach ($data_sistem as $db) {
			$email=$db->email;
			$email_subject=$db->email_subject;
			$email_port=$db->email_port;
			$email_host=$db->email_host;
			$email_pass=$db->email_pass;
		}
		$config = Array(
          'mailtype'  => 'html',
		  'protocol' => 'smtp',
		  'smtp_host' => $email_host,
		  'smtp_crypto' => 'ssl',
		  'smtp_port' => $email_port,
		  'smtp_user' => $email,
		  'smtp_pass' => $email_pass,
		  'crlf' => "\r\n",
		  'newline' => "\r\n"
		);
 
        $this->load->library('email', $config);

        $this->email->from($email, $email_subject);
          $this->email->to($email_send);
          $this->email->subject('Reset Password');
          $this->email->message("Berikut ini link untuk reset password akun anda ".base_url()."resetpasswordadmin/".$id_unik."");

          if($this->email->send()) {
               	$output['hasil']=1;
	        	$output['pesan']='Selamat datang kembali';  
          }
          else {
          		$output['hasil']=0;
	        	$output['pesan']='Mohon periksa kembali email password anda';  
          }
          echo json_encode($output);
	}
	public function resetpassword($id_uniq)
	{
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
		$datapub["id_uniq"]=$id_uniq;


		$this->load->view("page/resetpassword",$datapub);
	}
	public function resetpasswordadmin($id_uniq)
	{
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
		$datapub["id_uniq"]=$id_uniq;


		$this->load->view("page/resetpasswordadmin",$datapub);
	}
	public function prosesresetpass()
	{
		$idunik = $this->input->post("idunik");
		$password = $this->input->post("password");
		
		$where["id_uniq"]=$idunik;
		$datainsert["password"]=md5($password);
		$insertsiswa= $this->m_aplikasi->UpdateData("siswa",$datainsert,$where);
		if($insertsiswa)
		{
			$output['hasil']=1;
	        	$output['pesan']='Password sudah berhasil di reset silahkan login kembali';  
		}else{
			$output['hasil']=0;
	        	$output['pesan']='Error';  
		}
		echo json_encode($output);
	}
	public function prosesresetpassadmin()
	{
		$idunik = $this->input->post("idunik");
		$password = $this->input->post("password");
		
		$where["id_uniq"]=$idunik;
		$datainsert["password"]=md5($password);
		$insertsiswa= $this->m_aplikasi->UpdateData("user",$datainsert,$where);
		if($insertsiswa)
		{
			$output['hasil']=1;
	        	$output['pesan']='Password sudah berhasil di reset silahkan login kembali';  
		}else{
			$output['hasil']=0;
	        	$output['pesan']='Error';  
		}
		echo json_encode($output);
	}
	public function forgetadminpassword()
	{
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

		$this->load->view("page/forgetadmin",$datapub);
	}
	public function index()
	{
		redirect('home');
	}
	public function daftar()
	{	
		$data_app = $this->m_aplikasi->listing();
		foreach ($data_app as $da) {
			$nama_app=$da->nama;	
			$instansi=$da->instansi;
			$tahun=$da->tahun;
			$logo=$da->logo;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;
		}
		$data_jadwal=$this->m_jadwal_daftar->listing();
		$data_syarat=$this->m_syarat_admin->listing();
		$data_kontak = $this->m_kontak->listing_kontak();
		$data_jenjang = $this->m_jenjang->listing();
		$data_api = $this->m_konfigurasi->listing();
		foreach ($data_api as $da){
	 		$api_ipay = $da->api_ipaymu;
		}
		$data_biaya = $this->m_biaya->listing_biaya();
		if(count($data_biaya)>0)
		{
			foreach ($data_biaya as $db) {
				$id=$db->id;
				$biaya=$db->biaya;
				$datapub["biaya"]=$biaya;
			}
		}

		$datapub["page"]="Daftar";
		$datapub["jadwal"]=$data_jadwal;
		$datapub["syarat"]=$data_syarat;
		$datapub["data_kontak"]=$data_kontak;
		$datapub["data_jenjang"]=$data_jenjang;
		$datapub["ipaymu"]=$api_ipay;

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

		$navbar = $this->load->view("pubs/navbar-home",$datapub,TRUE);
		$footer = $this->load->view("pubs/footer-home",$datapub,TRUE);

		$datapub["navbar"]=$navbar;
		$datapub["footer"]=$footer;
		$this->load->view('page/daftar_form',$datapub);
	}
	public function login()
	{
		
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

		$this->load->view("login",$datapub);
	}
	public function login_proses()
	{
		$email = $this->input->post("email");
		$pass = $this->input->post("password");
		$login = $this->m_aplikasi->GetLogin($email,$pass);
		if($login)
		{
			$level = $this->session->userdata("level");
			$output['hasil']=1;
			$output['level']=$level;
	        $output['pesan']='Selamat datang kembali';  
		}else{
			$output['hasil']=0;
	        $output['pesan']='Mohon periksa kembali email password anda';  
		}
		echo json_encode($output);
	}
	public function daftar_bayar($id_user)
	{
		$data_app = $this->m_aplikasi->listing();
		foreach ($data_app as $da) {
			$nama_app=$da->nama;
			$instansi=$da->instansi;
			$tahun=$da->tahun;
			$logo=$da->logo;
		}
		$data_kontak = $this->m_kontak->listing();
		$data_konten_home = $this->m_kontenhome->listing();
		$data_call = $this->m_call->listing();
		$data_alasan = $this->m_alasan->listing();

		foreach ($data_konten_home as $dkh) {
			$tentang = $dkh->tentang;
			$tk= $dkh->tk;
			$sd=$dkh->sd;
			$smp=$dkh->smp;
			$sma=$dkh->sma;
			$video=$dkh->video;
			$paunduan=$dkh->link_panduan;
			$brosur=$dkh->link_brosur;
		}

		$page="Daftar";

		$datapub["page"]=$page;
		$datapub["nama_app"]=$nama_app;
		$datapub["instansi"]=$instansi;
		$datapub["tahun"]=$tahun;
		$datapub["logo"]=$logo;
		$datapub["kontak"]=$data_kontak;

		$include["header"] = $this->load->view("pubs/header", $datapub, TRUE);
		$include["footer"] = $this->load->view("pubs/footer", $datapub, TRUE);


		$data["header"]=$include["header"];
		$data["footer"]=$include["footer"];
		$data["tentang"]=$tentang;
		$data["tk"]=$tk;
		$data["sd"]=$sd;
		$data["smp"]=$smp;
		$data["sma"]=$sma;
		$data["video"]=$video;
		$data["call"]=$data_call;
		$data["alasan"]=$data_alasan;
		$data["brosur"]=$brosur;
		$data["paunduan"]=$paunduan;
		$data["id_user"]=$id_user;
		$this->load->view("page/daftar_bayar",$data);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home/login');
	}
}