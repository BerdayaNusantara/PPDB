<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class santri extends CI_Controller {

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
		$this->load->model("m_user");
		$this->load->model("m_pembayaran");
		$this->load->model("m_pembayaransiswa");
		$this->load->model("m_siswa");
		$this->load->model("m_jadwal");
		$this->load->model("m_pengumuman");
		$this->load->model("m_jadwalujian");
		$this->load->model("m_pesertaujian");
		$this->load->model("m_setjadwal");
	}
	public function index()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri"))
		{
			redirect("siswa/dashboard");
		}else{
			redirect("loginsiswa");
		}
	}
	public function dashboard()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri"))
		{
			$data_app = $this->m_aplikasi->listing();
			foreach ($data_app as $da) {
				$nama_app=$da->nama;
				$instansi=$da->instansi;
				$tahun=$da->tahun;
				$logo=$da->logo;
			}
			$page="Dashboard";

			$status_bayar="";
			$id_santri = $this->session->userdata("iduniq");
			$data_bayar = $this->m_siswa->listing_pembayaran(" WHERE iduniq = '$id_santri'");
			foreach ($data_bayar as $db) {
				$status_bayar = $db->status;
			}
			$data_santri = $this->m_siswa->listing(" WHERE id_uniq = '$id_santri'");

			foreach ($data_santri as $db) {
				$datapub["nama_siswa"]=$db->nama;
				$datapub["id_uniq"]=$id_santri;
				$nama = $db->nama;
				$jenis_kelamin = $db->jenis_kelamin;
				$email = $db->email;
				$whatsapp = $db->whatsapp;
				$nisn = $db->nisn;
				$jenjang = $db->jenjang;
				$tempat_lahir = $db->tempat_lahir;
				$tanggal_lahir = $db->tanggal_lahir;
				$alamat = $db->alamat;
				$sekolah_asal = $db->sekolah_asal;
				$foto = $db->foto;
				$jalur= $db->jalur;
				$datapub["jalur"]=$jalur;
			}
			if(($nama!="")&&($jenis_kelamin!="")&&($email!="")&&($whatsapp!="")&&($nisn!="")&&($jenjang!="")&&($tanggal_lahir!="")&&($alamat!="")&&($sekolah_asal!="")&&($tempat_lahir!="")&&($foto!="")){
				$status_profile="Lengkap";
			}else{
				$status_profile="Belum Lengkap";
			}

				$nama_ayah = "";
				$pend_ayah = "";
				$pekerjaan_ayah = "";
				$nik_ayah = "";
				$tmp_lhr_ayah = "";
				$tgl_lhr_ayah = "";
				$nomor_ayah = "";
				$penghasilan_ayah = "";
				$nama_ibu ="";
				$pend_ibu ="";
				$pekerjaan_ibu = "";
				$nik_ibu ="";
				$tmp_lhr_ibu = "";
				$tgl_lhr_ibu = "";
				$nomor_ibu = "";
				$penghasilan_ibu = "";
			$data_ortu = $this->m_siswa->listing_orangtua(" WHERE iduniq = '$id_santri'");
			foreach ($data_ortu as $db) {
				$nama_ayah = $db->nama_ayah;
				$pend_ayah = $db->pend_ayah;
				$pekerjaan_ayah = $db->pekerjaan_ayah;
				$nik_ayah = $db->nik_ayah;
				$tmp_lhr_ayah = $db->tmp_lhr_ayah;
				$tgl_lhr_ayah = $db->tgl_lhr_ayah;
				$nomor_ayah = $db->nomor_ayah;
				$penghasilan_ayah = $db->penghasilan_ayah;
				$nama_ibu = $db->nama_ibu;
				$pend_ibu = $db->pend_ibu;
				$pekerjaan_ibu = $db->pekerjaan_ibu;
				$nik_ibu = $db->nik_ibu;
				$tmp_lhr_ibu = $db->tmp_lhr_ibu;
				$tgl_lhr_ibu = $db->tgl_lhr_ibu;
				$nomor_ibu = $db->nomor_ibu;
				$penghasilan_ibu = $db->penghasilan_ibu;
			}
			if(($nama_ayah!="")&&($pend_ayah!="")&&($pekerjaan_ayah!="")&&($nik_ayah!="")&&($tmp_lhr_ayah!="")&&($tgl_lhr_ayah!="")&&($nomor_ayah!="")&&($penghasilan_ayah!="")&&($nama_ibu!="")&&($pend_ibu!="")&&($pekerjaan_ibu!="")&&($nik_ibu!="")&&($tmp_lhr_ibu!="")&&($tgl_lhr_ibu!="")&&($nomor_ibu!="")&&($penghasilan_ibu!="")){
				$status_ortu="Lengkap";
			}else{
				$status_ortu="Belum Lengkap";
			}
			$data_ujian=$this->m_jadwal->listing(" WHERE iduniq = '$id_santri'");
			if(count($data_ujian)>0){
				foreach ($data_ujian as $du) {
					$tanggal_ujian = $du->tanggal;
				}
			}else{
				$tanggal_ujian="";
			}

			$datapub["status_ortu"]=$status_ortu;
			$datapub["status_profile"]=$status_profile;
			$datapub["status_bayar"]=$status_bayar;
			$datapub["page"]=$page;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;

			$footer = $this->load->view("pubs/footer-admin",$datapub,TRUE);
			$sidebar = $this->load->view("pubs/sidebar-santri",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar-santri",$datapub,TRUE);

			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;
			$datapub["data_bayar"]=$data_bayar;
			$datapub["tanggal_ujian"]=$tanggal_ujian;

			$this->load->view("pagesantri/dashboard",$datapub);
		}else{
			redirect("loginsantri");
		}
	}
	public function profile()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri"))
		{
			$data_app = $this->m_aplikasi->listing();
			foreach ($data_app as $da) {
				$nama_app=$da->nama;
				$instansi=$da->instansi;
				$tahun=$da->tahun;
				$logo=$da->logo;
			}
			$page="Profile Santri";
			$id_santri = $this->session->userdata("iduniq");
			$data_bayar = $this->m_siswa->listing_pembayaran(" WHERE iduniq = '$id_santri'");
			foreach ($data_bayar as $db) {
				$status_bayar = $db->status;
			}
			$datapub["status_bayar"]=$status_bayar;

			$datapub["page"]=$page;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;

			$footer = $this->load->view("pubs/footer-admin",$datapub,TRUE);
			$sidebar = $this->load->view("pubs/sidebar-santri",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar-santri",$datapub,TRUE);
			$id_santri = $this->session->userdata("iduniq");

			$data_santri = $this->m_siswa->listing(" WHERE id_uniq = '$id_santri'");

			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;
			$datapub["data_santri"]=$data_santri;

			$this->load->view("pagesantri/profile",$datapub);
		}else{
			redirect("loginsantri");
		}
	}
	public function profil_akun()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri"))
		{
			$data_app = $this->m_aplikasi->listing();
			foreach ($data_app as $da) {
				$nama_app=$da->nama;
				$instansi=$da->instansi;
				$tahun=$da->tahun;
				$logo=$da->logo;
			}
			$page="Profil Akun";
			$id_santri = $this->session->userdata("iduniq");
			$data_bayar = $this->m_siswa->listing_pembayaran(" WHERE iduniq = '$id_santri'");
			foreach ($data_bayar as $db) {
				$status_bayar = $db->status;
			}
			$datapub["status_bayar"]=$status_bayar;

			$datapub["page"]=$page;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;

			$footer = $this->load->view("pubs/footer-admin",$datapub,TRUE);
			$sidebar = $this->load->view("pubs/sidebar-santri",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar-santri",$datapub,TRUE);
			$id_santri = $this->session->userdata("iduniq");

			$data_santri = $this->m_siswa->listing(" WHERE id_uniq = '$id_santri'");

			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;
			$datapub["data_santri"]=$data_santri;

			$this->load->view("pagesantri/profile_akun",$datapub);
		}else{
			redirect("loginsantri");
		}
	}
	public function akun_detail()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri"))
		{
			$id_santri = $this->session->userdata("iduniq");
			$data_santri = $this->m_siswa->listing(" WHERE id_uniq = '$id_santri'");
			$X = array('hasildata'=>$data_santri);               
		    echo json_encode($X);  
		}else{
			redirect("loginsantri");
		}
	}

	public function akun_simpan()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri"))
		{
			$id_uniq = $this->input->post("id");
			
			$password = $this->input->post("password");
			
			$where["id_uniq"]=$id_uniq;
			if(!empty($password))
			{
				$datainsert["password"]=md5($password);
			}
			if($this->m_aplikasi->UpdateData('siswa',$datainsert,$where)){
				$input['hasil']=1;
				$input['pesan']='Data berhasil di update';
			}else{
				$input['hasil']=0;
				$input['pesan']='Data gagal di update';
			}
			echo json_encode($input);
		}else{
			redirect("home/login");
		}
	}
	public function data_profile()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri"))
		{
			
			$id_santri = $this->session->userdata("iduniq");
			$data_santri = $this->m_siswa->listing(" WHERE id_uniq = '$id_santri'");
			$X = array('hasildata'=>$data_santri);               
		    echo json_encode($X);  
		}else{
			redirect("loginsantri");
		}
	}
	public function simpan_profile()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri"))
		{
			$id = $this->input->post("id");
			$nama = $this->input->post("nama");
			$nik = $this->input->post("nik");
			$nisn = $this->input->post("nisn");
			$no_kk = $this->input->post("no_kk");
			$jalur = $this->input->post("jalur");
			$jenis_kelamin = $this->input->post("jenis_kelamin");
			$tempat_lahir = $this->input->post("tempat_lahir");
			$tanggal_lahir = $this->input->post("tanggal_lahir");
			$alamat = $this->input->post("alamat");
			$kode_pos = $this->input->post("kode_pos");
			$sekolah_asal = $this->input->post("sekolah_asal");
			$hobi = $this->input->post("hobi");
			
			$where["id"]=$id;
			$datainsert["nama"]=$nama;
			$datainsert["nik"]=$nik;
			$datainsert["nisn"]=$nisn;
			$datainsert["no_kk"]=$no_kk;
			$datainsert["jalur"]=$jalur;
			$datainsert["jenis_kelamin"]=$jenis_kelamin;
			$datainsert["tempat_lahir"]=$tempat_lahir;
			$datainsert["tanggal_lahir"]=substr($tanggal_lahir, 6,4)."-".substr($tanggal_lahir, 3,2)."-".substr($tanggal_lahir, 0,2);
			$datainsert["alamat"]=$alamat;
			$datainsert["kode_pos"]=$kode_pos;
			$datainsert["sekolah_asal"]=$sekolah_asal;
			$datainsert["hobi"]=$hobi;
			
			$namastr = str_replace(' ', '_', $nama);
			$unikimg= date('Ymdhis');
			if($_FILES['foto']['size'] != 0 ){
				$config['upload_path'] = './upload/santri';
	            $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
	            $config['file_name'] = $namastr."_".$unikimg;
	            $config['max_size']     = '1000';
	            $config['overwrite']     = TRUE;

	            $this->load->library('upload', $config);
				$this->upload->initialize($config);

	            if(!$this->upload->do_upload('foto')){
	               	$hasil="success";
					echo json_encode($hasil);
	            } else {
	            	$data = array('upload_data' => $this->upload->data());
					$eks = explode('.', $_FILES['foto']['name']);
					$eks = $eks[count($eks)-1];
	               	$datainsert["foto"]=$namastr."_".$unikimg.".".$eks;
	            }
		        if($id<>""){
					$where['id']=$id;
					if($this->m_aplikasi->UpdateData('siswa',$datainsert,$where)){
						$input['hasil']=1;
			            $input['pesan']='Data berhasil di update';
					}else{
						$input['hasil']=0;
			            $input['pesan']='Data gagal di update';
					}
				}else{
					if($this->m_aplikasi->InsertData("siswa",$datainsert)){
						$input['hasil']=1;
			            $input['pesan']='Data berhasil di simpan';  
					}else{
						$input['hasil']=0;
			            $input['pesan']='Data gagal di simpan';
					};
				}
			}else{
				if($id<>""){
					$where['id']=$id;
					if($this->m_aplikasi->UpdateData('siswa',$datainsert,$where)){
						$input['hasil']=1;
			            $input['pesan']='Data berhasil di update';
					}else{
						$input['hasil']=0;
			            $input['pesan']='Data gagal di update';
					}
				}else{
					if($this->m_aplikasi->InsertData("siswa",$datainsert)){
						$input['hasil']=1;
			            $input['pesan']='Data berhasil di simpan';  
					}else{
						$input['hasil']=0;
			            $input['pesan']='Data gagal di simpan';
					};
				}
			}
			echo json_encode($input);
		}else{
			redirect("home/login");
		}
	}
	public function prestasi()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri"))
		{
			$data_app = $this->m_aplikasi->listing();
			foreach ($data_app as $da) {
				$nama_app=$da->nama;
				$instansi=$da->instansi;
				$tahun=$da->tahun;
				$logo=$da->logo;
			}
			$page="Prestasi Santri";

			$id_santri = $this->session->userdata("iduniq");
			$data_bayar = $this->m_siswa->listing_pembayaran(" WHERE iduniq = '$id_santri'");
			foreach ($data_bayar as $db) {
				$status_bayar = $db->status;
			}
			$datapub["status_bayar"]=$status_bayar;

			$datapub["page"]=$page;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;

			$footer = $this->load->view("pubs/footer-admin",$datapub,TRUE);
			$sidebar = $this->load->view("pubs/sidebar-santri",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar-santri",$datapub,TRUE);
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;

			$this->load->view("pagesantri/prestasi",$datapub);
		}else{
			redirect("loginsantri");
		}
	}
	public function orangtua()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri"))
		{
			$data_app = $this->m_aplikasi->listing();
			foreach ($data_app as $da) {
				$nama_app=$da->nama;
				$instansi=$da->instansi;
				$tahun=$da->tahun;
				$logo=$da->logo;
			}
			$page="Orang Tua";
			$id_santri = $this->session->userdata("iduniq");
			$data_bayar = $this->m_siswa->listing_pembayaran(" WHERE iduniq = '$id_santri'");
			foreach ($data_bayar as $db) {
				$status_bayar = $db->status;
			}
			$datapub["status_bayar"]=$status_bayar;

			$datapub["page"]=$page;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;

			$footer = $this->load->view("pubs/footer-admin",$datapub,TRUE);
			$sidebar = $this->load->view("pubs/sidebar-santri",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar-santri",$datapub,TRUE);
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;

			$this->load->view("pagesantri/orangtua",$datapub);
		}else{
			redirect("loginsantri");
		}
	}
	public function dokumen()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri"))
		{
			$data_app = $this->m_aplikasi->listing();
			foreach ($data_app as $da) {
				$nama_app=$da->nama;
				$instansi=$da->instansi;
				$tahun=$da->tahun;
				$logo=$da->logo;
			}
			$page="Dokumen";
			$id_santri = $this->session->userdata("iduniq");
			$data_bayar = $this->m_siswa->listing_pembayaran(" WHERE iduniq = '$id_santri'");
			foreach ($data_bayar as $db) {
				$status_bayar = $db->status;
			}
			$datapub["status_bayar"]=$status_bayar;

			$datapub["page"]=$page;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;

			$footer = $this->load->view("pubs/footer-admin",$datapub,TRUE);
			$sidebar = $this->load->view("pubs/sidebar-santri",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar-santri",$datapub,TRUE);
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;
			$datapub["id_uniq"]=$this->session->userdata("iduniq");

			$this->load->view("pagesantri/dokumen",$datapub);
		}else{
			redirect("loginsantri");
		}
	}
	public function pembayaran()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri"))
		{
			$data_app = $this->m_aplikasi->listing();
			foreach ($data_app as $da) {
				$nama_app=$da->nama;
				$instansi=$da->instansi;
				$tahun=$da->tahun;
				$logo=$da->logo;
			}
			$page="Pembayaran";

			$id_santri = $this->session->userdata("iduniq");
			$data_bayar = $this->m_siswa->listing_pembayaran(" WHERE iduniq = '$id_santri'");
			foreach ($data_bayar as $db) {
				$status_bayar = $db->status;
			}
			$datapub["status_bayar"]=$status_bayar;

			$datapub["page"]=$page;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;

			$footer = $this->load->view("pubs/footer-admin",$datapub,TRUE);
			$sidebar = $this->load->view("pubs/sidebar-santri",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar-santri",$datapub,TRUE);
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;

			$this->load->view("pagesantri/pembayaran",$datapub);
		}else{
			redirect("loginsantri");
		}
	}
	public function pengumuman()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri"))
		{
			$data_app = $this->m_aplikasi->listing();
			foreach ($data_app as $da) {
				$nama_app=$da->nama;
				$instansi=$da->instansi;
				$tahun=$da->tahun;
				$logo=$da->logo;
			}
			$page="Pengumuman";

			$id_santri = $this->session->userdata("iduniq");
			$data_bayar = $this->m_siswa->listing_pembayaran(" WHERE iduniq = '$id_santri'");
			if(count($data_bayar)>0)
			{
			    foreach ($data_bayar as $db) {
				    $status_bayar = $db->status;
			    }
			}else{
			    $status_bayar = "";
			}
		

			$data_nilai = $this->m_siswa->listing_nilai(" WHERE iduniq = '$id_santri'");
			if(count($data_nilai)>0)
			{
			    foreach ($data_nilai as $db) {
				    $nilai = $db->nilai;
				    $status = $db->status;
			    }
			}else{
			    $nilai = "";
				$status = "";
			}
		
			$datapub["status_bayar"]=$status_bayar;

			$datapub["page"]=$page;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;

			$footer = $this->load->view("pubs/footer-admin",$datapub,TRUE);
			$sidebar = $this->load->view("pubs/sidebar-santri",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar-santri",$datapub,TRUE);
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;
			$datapub["nilai"]=$nilai;
			$datapub["status"]=$status;

			$this->load->view("pagesantri/pengumuman",$datapub);
		}else{
			redirect("loginsantri");
		}
	}

	public function cetak_kartucp()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri"))
		{
			$data_app = $this->m_aplikasi->listing();
			foreach ($data_app as $da) {
				$nama_app=$da->nama;
				$instansi=$da->instansi;
				$tahun=$da->tahun;
				$logo=$da->logo;
			}
			$page="Cetak Kartu";

			$id_santri = $this->session->userdata("iduniq");
			$data_bayar = $this->m_siswa->listing_pembayaran(" WHERE iduniq = '$id_santri'");
			foreach ($data_bayar as $db) {
				$status_bayar = $db->status;
			}
			$datapub["status_bayar"]=$status_bayar;
			$data_santri = $this->m_siswa->listing(" WHERE id_uniq = '$id_santri'");
			foreach ($data_santri as $db) {
				$nama = $db->nama;
				$jenis_kelamin = $db->jenis_kelamin;
				$email = $db->email;
				$whatsapp = $db->whatsapp;
				$nisn = $db->nisn;
				$jenjang = $db->jenjang;
				$tempat_lahir = $db->tempat_lahir;
				$tanggal_lahir = $db->tanggal_lahir;
				$alamat = $db->alamat;
				$sekolah_asal = $db->sekolah_asal;
				$ukuran_seragam = $db->ukuran_seragam;
				$foto = $db->foto;
				$datapub["jenjang_nama"]=$db->jurusan_nama;
			}
			if(($nama!="")&&($jenis_kelamin!="")&&($email!="")&&($whatsapp!="")&&($nisn!="")&&($jenjang!="")&&($tanggal_lahir!="")&&($alamat!="")&&($sekolah_asal!="")&&($tempat_lahir!="")&&($ukuran_seragam!="")&&($foto!="")){
				$status_profile="Lengkap";
			}else{
				$status_profile="Belum Lengkap";
			}
			$data_ujian=$this->m_pesertaujian->listing(" WHERE id_uniq = '$id_santri'");
			if(count($data_ujian)>0)
			{
			    foreach ($data_ujian as $du) {
				    $tanggal_ujian = $du->tanggal_ujian;
				    $hari_ujian = $du->hari_ujian;
				    $keterangan = $du->keterangan;
				    $nama_tes = $du->nama_tes;
			    }
			}else{
			    $tanggal_ujian="0";
			    $hari_ujian="";
			    $keterangan="";
			    $nama_tes="";
			}
			
			$data_ortu = $this->m_siswa->listing_orangtua(" WHERE iduniq = '$id_santri'");
			if(count($data_ortu)>0){
			    foreach ($data_ortu as $db) {
    				$nama_ayah = $db->nama_ayah;
    				$pend_ayah = $db->pend_ayah;
    				$pekerjaan_ayah = $db->pekerjaan_ayah;
    				$nik_ayah = $db->nik_ayah;
    				$tmp_lhr_ayah = $db->tmp_lhr_ayah;
    				$tgl_lhr_ayah = $db->tgl_lhr_ayah;
    				$nomor_ayah = $db->nomor_ayah;
    				$penghasilan_ayah = $db->penghasilan_ayah;
    				$nama_ibu = $db->nama_ibu;
    				$pend_ibu = $db->pend_ibu;
    				$pekerjaan_ibu = $db->pekerjaan_ibu;
    				$nik_ibu = $db->nik_ibu;
    				$tmp_lhr_ibu = $db->tmp_lhr_ibu;
    				$tgl_lhr_ibu = $db->tgl_lhr_ibu;
    				$nomor_ibu = $db->nomor_ibu;
    				$penghasilan_ibu = $db->penghasilan_ibu;
			    }
			    if(($nama_ayah!="")&&($pend_ayah!="")&&($pekerjaan_ayah!="")&&($nik_ayah!="")&&($tmp_lhr_ayah!="")&&($tgl_lhr_ayah!="")&&($nomor_ayah!="")&&($penghasilan_ayah!="")&&($nama_ibu!="")&&($pend_ibu!="")&&($pekerjaan_ibu!="")&&($nik_ibu!="")&&($tmp_lhr_ibu!="")&&($tgl_lhr_ibu!="")&&($nomor_ibu!="")&&($penghasilan_ibu!="")){
				$status_ortu="Lengkap";
			}else{
				$status_ortu="Belum Lengkap";
			}
			}
			
			if($hari_ujian=="Sunday")
			{
			    $hari_ujian="Minggu";
			}else if($hari_ujian=="Monday")
			{
			    $hari_ujian="Senin";
			}else if($hari_ujian=="Tuesday")
			{
			    $hari_ujian="Selasa";
			}else if($hari_ujian=="Wednesday")
			{
			    $hari_ujian="Rabu";
			}else if($hari_ujian=="Thursday")
			{
			    $hari_ujian="Kamis";
			}else if($hari_ujian=="Friday")
			{
			    $hari_ujian="Jumat";
			}else if($hari_ujian=="Saturday")
			{
			    $hari_ujian="Sabtu";
			}else{
			    $hari_ujian="0";
			}
			
			$doc_kk = $this->m_siswa->listing_dokumen(" WHERE iduniq='$id_santri' AND type='Kartu Keluarga' ");
			$doc_akta = $this->m_siswa->listing_dokumen(" WHERE iduniq='$id_santri' AND type='Akta Kelahiran' ");
			
			if(count($doc_kk)>0)
			{$stat_kk="1";}else{$stat_kk="0";}
			if(count($doc_akta)>0)
			{$stat_akta="1";}else{$stat_akta="0";}
			
			
			if(($stat_kk=="1")&&($stat_akta=="1"))
			{
			    $dokumen_status = "1";
			}else{
			    $dokumen_status = "0";
			}
			
			$status_ortu="Belum Lengkap";
			
			$datapub["status_ortu"]=$status_ortu;
			$datapub["status_profile"]=$status_profile;
			$datapub["page"]=$page;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;
			$datapub["data_santri"]=$data_santri;
			$datapub["tanggal_ujian"]=$hari_ujian.",".$tanggal_ujian;
			$datapub["keterangan"]=$keterangan;
			$datapub["dokumen_status"]=$dokumen_status;
			$datapub["nama_tes"]=$nama_tes;


			$footer = $this->load->view("pubs/footer-admin",$datapub,TRUE);
			$sidebar = $this->load->view("pubs/sidebar-santri",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar-santri",$datapub,TRUE);
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;

			$this->load->view("pagesantri/cetak_kartucp",$datapub);
		}else{
			redirect("loginsantri");
		}
	}
	public function cetak_kartu()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri"))
		{
			$data_app = $this->m_aplikasi->listing();
			foreach ($data_app as $da) {
				$nama_app=$da->nama;
				$instansi=$da->instansi;
				$tahun=$da->tahun;
				$logo=$da->logo;
			}
			$page="Cetak Kartu";

			$id_santri = $this->session->userdata("iduniq");
			$data_bayar = $this->m_siswa->listing_pembayaran(" WHERE iduniq = '$id_santri'");
			foreach ($data_bayar as $db) {
				$status_bayar = $db->status;
			}
			$datapub["status_bayar"]=$status_bayar;
			$data_santri = $this->m_siswa->listing(" WHERE id_uniq = '$id_santri'");
			foreach ($data_santri as $db) {
				$nama = $db->nama;
				$jenis_kelamin = $db->jenis_kelamin;
				$email = $db->email;
				$whatsapp = $db->whatsapp;
				$nisn = $db->nisn;
				$jenjang = $db->jenjang;
				$tempat_lahir = $db->tempat_lahir;
				$tanggal_lahir = $db->tanggal_lahir;
				$alamat = $db->alamat;
				$sekolah_asal = $db->sekolah_asal;
				$ukuran_seragam = $db->ukuran_seragam;
				$foto = $db->foto;
				$datapub["jenjang_nama"]=$db->jurusan_nama;
			}
			if(($nama!="")&&($jenis_kelamin!="")&&($email!="")&&($whatsapp!="")&&($nisn!="")&&($jenjang!="")&&($tanggal_lahir!="")&&($alamat!="")&&($sekolah_asal!="")&&($tempat_lahir!="")&&($ukuran_seragam!="")&&($foto!="")){
				$status_profile="Lengkap";
			}else{
				$status_profile="Belum Lengkap";
			}
			$data_ujian=$this->m_pesertaujian->listing(" WHERE id_uniq = '$id_santri'");
			if(count($data_ujian)>0)
			{
			    foreach ($data_ujian as $du) {
				    $tanggal_ujian = $du->tanggal_ujian;
				    $hari_ujian = $du->hari_ujian;
				    $keterangan = $du->keterangan;
				    $nama_tes = $du->nama_tes;
			    }
			}else{
			    $tanggal_ujian="0";
			    $hari_ujian="";
			    $keterangan="";
			    $nama_tes="";
			}
			
			$data_ortu = $this->m_siswa->listing_orangtua(" WHERE iduniq = '$id_santri'");
			if(count($data_ortu)>0){
			    foreach ($data_ortu as $db) {
    				$nama_ayah = $db->nama_ayah;
    				$pend_ayah = $db->pend_ayah;
    				$pekerjaan_ayah = $db->pekerjaan_ayah;
    				$nik_ayah = $db->nik_ayah;
    				$tmp_lhr_ayah = $db->tmp_lhr_ayah;
    				$tgl_lhr_ayah = $db->tgl_lhr_ayah;
    				$nomor_ayah = $db->nomor_ayah;
    				$penghasilan_ayah = $db->penghasilan_ayah;
    				$nama_ibu = $db->nama_ibu;
    				$pend_ibu = $db->pend_ibu;
    				$pekerjaan_ibu = $db->pekerjaan_ibu;
    				$nik_ibu = $db->nik_ibu;
    				$tmp_lhr_ibu = $db->tmp_lhr_ibu;
    				$tgl_lhr_ibu = $db->tgl_lhr_ibu;
    				$nomor_ibu = $db->nomor_ibu;
    				$penghasilan_ibu = $db->penghasilan_ibu;
			    }
			    if(($nama_ayah!="")&&($pend_ayah!="")&&($pekerjaan_ayah!="")&&($nik_ayah!="")&&($tmp_lhr_ayah!="")&&($tgl_lhr_ayah!="")&&($nomor_ayah!="")&&($penghasilan_ayah!="")&&($nama_ibu!="")&&($pend_ibu!="")&&($pekerjaan_ibu!="")&&($nik_ibu!="")&&($tmp_lhr_ibu!="")&&($tgl_lhr_ibu!="")&&($nomor_ibu!="")&&($penghasilan_ibu!="")){
				$status_ortu="Lengkap";
			}else{
				$status_ortu="Belum Lengkap";
			}
			}
			
			if($hari_ujian=="Sunday")
			{
			    $hari_ujian="Minggu";
			}else if($hari_ujian=="Monday")
			{
			    $hari_ujian="Senin";
			}else if($hari_ujian=="Tuesday")
			{
			    $hari_ujian="Selasa";
			}else if($hari_ujian=="Wednesday")
			{
			    $hari_ujian="Rabu";
			}else if($hari_ujian=="Thursday")
			{
			    $hari_ujian="Kamis";
			}else if($hari_ujian=="Friday")
			{
			    $hari_ujian="Jumat";
			}else if($hari_ujian=="Saturday")
			{
			    $hari_ujian="Sabtu";
			}else{
			    $hari_ujian="0";
			}
			
			$doc_kk = $this->m_siswa->listing_dokumen(" WHERE iduniq='$id_santri' AND type='Kartu Keluarga' ");
			$doc_akta = $this->m_siswa->listing_dokumen(" WHERE iduniq='$id_santri' AND type='Akta Kelahiran' ");
			
			if(count($doc_kk)>0)
			{$stat_kk="1";}else{$stat_kk="0";}
			if(count($doc_akta)>0)
			{$stat_akta="1";}else{$stat_akta="0";}
			
			
			if(($stat_kk=="1")&&($stat_akta=="1"))
			{
			    $dokumen_status = "1";
			}else{
			    $dokumen_status = "0";
			}
			
			$status_ortu="Belum Lengkap";
			
			$datapub["status_ortu"]=$status_ortu;
			$datapub["status_profile"]=$status_profile;
			$datapub["page"]=$page;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;
			$datapub["data_santri"]=$data_santri;
			$datapub["tanggal_ujian"]=$hari_ujian.",".$tanggal_ujian;
			$datapub["keterangan"]=$keterangan;
			$datapub["dokumen_status"]=$dokumen_status;
			$datapub["nama_tes"]=$nama_tes;


			$footer = $this->load->view("pubs/footer-admin",$datapub,TRUE);
			$sidebar = $this->load->view("pubs/sidebar-santri",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar-santri",$datapub,TRUE);
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;

			$this->load->view("pagesantri/cetak_kartu",$datapub);
		}else{
			redirect("loginsantri");
		}
	}
	public function print_cetak_kartu()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri"))
		{
			$data_app = $this->m_aplikasi->listing();
			foreach ($data_app as $da) {
				$nama_app=$da->nama;
				$instansi=$da->instansi;
				$tahun=$da->tahun;
				$logo=$da->logo;
			}
			$page="Cetak Kartu";

			$id_santri = $this->session->userdata("iduniq");
			$data_bayar = $this->m_siswa->listing_pembayaran(" WHERE iduniq = '$id_santri'");
			foreach ($data_bayar as $db) {
				$status_bayar = $db->status;
			}
			$datapub["status_bayar"]=$status_bayar;
			$data_santri = $this->m_siswa->listing(" WHERE id_uniq = '$id_santri'");
			foreach($data_santri as $ds)
			{
				$datapub["jenjang_nama"]=$ds->jurusan_nama;
			}


			$data_ujian=$this->m_pesertaujian->listing(" WHERE id_uniq = '$id_santri'");
			if(count($data_ujian)>0)
			{
			    foreach ($data_ujian as $du) {
				    $tanggal_ujian = $du->tanggal_ujian;
				    $hari_ujian = $du->hari_ujian;
				    $keterangan = $du->keterangan;

				    $nama_tes = $du->nama_tes;

			$datapub["nama_tes"]=$nama_tes;
			    }
			}else{
			    $tanggal_ujian = "";
			    $hari_ujian="";

			    $nama_tes="";
			}
			
            if($hari_ujian=="Sunday")
			{
			    $hari_ujian="Minggu";
			}else if($hari_ujian=="Monday")
			{
			    $hari_ujian="Senin";
			}else if($hari_ujian=="Tuesday")
			{
			    $hari_ujian="Selasa";
			}else if($hari_ujian=="Wednesday")
			{
			    $hari_ujian="Rabu";
			}else if($hari_ujian=="Thursday")
			{
			    $hari_ujian="Kamis";
			}else if($hari_ujian=="Friday")
			{
			    $hari_ujian="Jumat";
			}else if($hari_ujian=="Saturday")
			{
			    $hari_ujian="Sabtu";
			}
			$datapub["page"]=$page;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;
			$datapub["data_santri"]=$data_santri;
			$datapub["tanggal_ujian"]=$hari_ujian.",".$tanggal_ujian;
			$datapub["keterangan"]=$keterangan;


			$footer = $this->load->view("pubs/footer-admin",$datapub,TRUE);
			$sidebar = $this->load->view("pubs/sidebar-santri",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar-santri",$datapub,TRUE);
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;

			$this->load->view("pagesantri/cetak_kartu_print",$datapub);
		}else{
			redirect("loginsantri");
		}
	}
	public function data_list()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator"))
		{
			$list = $this->m_siswa->get_datatables();
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->kode;
		      $row[] = $l->nama;
		      $row[] = $l->jenis_kelamin;
		      $row[] = $l->email;
		      $row[] = $l->jenjang_nama;
		      $row[] = "<div style='text-align: center;'>
		      				<a href=".base_url()."backoffice/siswa_detail/".$l->id_uniq." class='btn btn-success btn-sm'><span class='fa fa-eye'></span></a>
		      				<button onclick='hapusUser(".$l->id.")' class='btn btn-danger btn-sm'><span class='fa fa-trash'></span></button>
		      				<button onclick='updateUser(".$l->id.")' class='btn btn-warning btn-sm'><span class='fa fa-edit'></span></button>
		      			</div>";
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_siswa->count_all(),
		     "recordsFiltered" => $this->m_siswa->count_filtered(),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
	}
	public function data_list_pengumuman()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator"))
		{
			$list = $this->m_pengumuman->get_datatables();
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = "";
		      $row[] = $no;
		      $row[] = $l->kode;
		      $row[] = $l->nama;
		      $row[] = $l->jenis_kelamin;
		      $row[] = $l->email;
		      $row[] = $l->jenjang_nama;
		      $row[] = $l->jalur;
		      $row[] = $l->status_lulus;
		      $row[] = "<div style='text-align: center;'>
		      				<a href='".base_url()."/backoffice/pengumuman_input/".$l->iduniq."' class='btn btn-warning btn-sm'><span class='fa fa-edit'></span> Input Pengumuman</a>
		      			</div>";
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_pengumuman->count_all(),
		     "recordsFiltered" => $this->m_pengumuman->count_filtered(),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
	}
	public function data_list_report_kelas()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="Jenjang"))
		{
			$list = $this->m_siswa->get_datatables_kelas();
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->kode;
		      $row[] = $l->nama;
		      $row[] = $l->jenis_kelamin;
		      $row[] = $l->email;
		      $row[] = $l->jenjang_nama;
		      $row[] = $l->nama_kelas;
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_siswa->count_all_kelas(),
		     "recordsFiltered" => $this->m_siswa->count_filtered_kelas(),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
	}
	public function data_list_report_kelas_filter()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="Jenjang"))
		{
			$list = $this->m_siswa->get_datatables_kelas_filter();
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->kode;
		      $row[] = $l->nama;
		      $row[] = $l->jenis_kelamin;
		      $row[] = $l->email;
		      $row[] = $l->jenjang_nama;
		      $row[] = $l->nama_kelas;
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_siswa->count_all_kelas_filter(),
		     "recordsFiltered" => $this->m_siswa->count_filtered_kelas_filter(),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
	}
	public function data_list_report_jurusan()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator"))
		{
			$list = $this->m_siswa->get_datatables_filter();
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->kode;
		      $row[] = $l->nama;
		      $row[] = $l->jenis_kelamin;
		      $row[] = $l->email;
		      $row[] = $l->jenjang_nama;
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_siswa->count_all_filter(),
		     "recordsFiltered" => $this->m_siswa->count_filtered_filter(),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
	}
	
	public function data_list_report()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator"))
		{
			$list = $this->m_siswa->get_datatables();
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->kode;
		      $row[] = $l->nama;
		      $row[] = $l->jenis_kelamin;
		      $row[] = $l->email;
		      $row[] = $l->jenjang_nama;
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_siswa->count_all(),
		     "recordsFiltered" => $this->m_siswa->count_filtered(),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
	}
	public function data_list_lulus()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator"))
		{
			$list = $this->m_pengumuman->get_datatables();
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->kode;
		      $row[] = $l->nama;
		      $row[] = $l->jenis_kelamin;
		      $row[] = $l->email;
		      $row[] = $l->jenjang_nama;
		      $row[] = $l->status_lulus;
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_pengumuman->count_all(),
		     "recordsFiltered" => $this->m_pengumuman->count_filtered(),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
	}
	// public function data_list_jadwal()
	// {
	// 	$logged = $this->session->userdata("logged_in");
	// 	$level = $this->session->userdata("level");
	// 	if(($logged=="yes")&&($level=="Administrator")||($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
	// 	{
	// 		$list = $this->m_jadwal->get_datatables();
	// 	    $data = array();
	// 	    $no = $_POST['start'];
	// 	    foreach ($list as $l) {
	// 	      $no++;
	// 	      $row = array();
	// 	      $row[] = $no;
	// 	      $row[] = $l->kode;
	// 	      $row[] = $l->nama;
	// 	      $row[] = $l->jenis_kelamin;
	// 	      $row[] = $l->email;
	// 	      $row[] = $l->whatsapp;
	// 	      $row[] = $l->jenjang;
	// 	      $row[] = $l->tanggal_ujian;
	// 	      $row[] = $l->iduniq;
	// 	      // $row[] = "<div style='text-align: center;'>
	// 	      // 				<button onclick='updateUser(".$l->id.")' class='btn btn-warning btn-sm'><span class='fa fa-calendar'></span> Kirim Jadwal</button>
	// 	      // 			</div>";
	// 	      $data[] = $row;
	// 	      				// <a href='".base_url()."/backoffice/jadwal_input/".$l->id_uniq."' class='btn btn-warning btn-sm'><span class='fa fa-calendar'></span> Kirim Jadwal</a>

	// 	    }
	// 	    $output = array(
	// 	     "draw" => $_POST['draw'],
	// 	     "recordsTotal" => $this->m_jadwal->count_all(),
	// 	     "recordsFiltered" => $this->m_jadwal->count_filtered(),
	// 	     "data" => $data,
	// 	    );
	// 	    echo json_encode($output);
	// 	}else{
	// 		redirect("home/login");
	// 	}
	// }
	public function jadwal_ujian()
	{
	    $logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri"))
		{
			$data_app = $this->m_aplikasi->listing();
			foreach ($data_app as $da) {
				$nama_app=$da->nama;
				$instansi=$da->instansi;
				$tahun=$da->tahun;
				$logo=$da->logo;
			}
			$page="Jadwal Ujian";
			$id_santri = $this->session->userdata("iduniq");
			$data_bayar = $this->m_siswa->listing_pembayaran(" WHERE iduniq = '$id_santri'");
			foreach ($data_bayar as $db) {
				$status_bayar = $db->status;
			}
				$data_santri = $this->m_siswa->listing(" WHERE id_uniq = '$id_santri'");

			foreach ($data_santri as $db) {
				$nama = $db->nama;
				$jenis_kelamin = $db->jenis_kelamin;
				$email = $db->email;
				$whatsapp = $db->whatsapp;
				$nisn = $db->nisn;
				$jenjang = $db->jenjang;
				$tempat_lahir = $db->tempat_lahir;
				$tanggal_lahir = $db->tanggal_lahir;
				$alamat = $db->alamat;
				$sekolah_asal = $db->sekolah_asal;
				$foto = $db->foto;
			}
			if(($nama!="")&&($jenis_kelamin!="")&&($email!="")&&($whatsapp!="")&&($nisn!="")&&($jenjang!="")&&($tanggal_lahir!="")&&($alamat!="")&&($sekolah_asal!="")&&($tempat_lahir!="")&&($foto!="")){
				$status_profile="Lengkap";
			}else{
				$status_profile="Belum Lengkap";
			}

				$nama_ayah = "";
				$pend_ayah = "";
				$pekerjaan_ayah = "";
				$nik_ayah = "";
				$tmp_lhr_ayah = "";
				$tgl_lhr_ayah = "";
				$nomor_ayah = "";
				$penghasilan_ayah = "";
				$nama_ibu ="";
				$pend_ibu ="";
				$pekerjaan_ibu = "";
				$nik_ibu ="";
				$tmp_lhr_ibu = "";
				$tgl_lhr_ibu = "";
				$nomor_ibu = "";
				$penghasilan_ibu = "";
			$data_ortu = $this->m_siswa->listing_orangtua(" WHERE iduniq = '$id_santri'");
			foreach ($data_ortu as $db) {
				$nama_ayah = $db->nama_ayah;
				$pend_ayah = $db->pend_ayah;
				$pekerjaan_ayah = $db->pekerjaan_ayah;
				$nik_ayah = $db->nik_ayah;
				$tmp_lhr_ayah = $db->tmp_lhr_ayah;
				$tgl_lhr_ayah = $db->tgl_lhr_ayah;
				$nomor_ayah = $db->nomor_ayah;
				$penghasilan_ayah = $db->penghasilan_ayah;
				$nama_ibu = $db->nama_ibu;
				$pend_ibu = $db->pend_ibu;
				$pekerjaan_ibu = $db->pekerjaan_ibu;
				$nik_ibu = $db->nik_ibu;
				$tmp_lhr_ibu = $db->tmp_lhr_ibu;
				$tgl_lhr_ibu = $db->tgl_lhr_ibu;
				$nomor_ibu = $db->nomor_ibu;
				$penghasilan_ibu = $db->penghasilan_ibu;
			}
			if(($nama_ayah!="")&&($pend_ayah!="")&&($pekerjaan_ayah!="")&&($nik_ayah!="")&&($tmp_lhr_ayah!="")&&($tgl_lhr_ayah!="")&&($nomor_ayah!="")&&($penghasilan_ayah!="")&&($nama_ibu!="")&&($pend_ibu!="")&&($pekerjaan_ibu!="")&&($nik_ibu!="")&&($tmp_lhr_ibu!="")&&($tgl_lhr_ibu!="")&&($nomor_ibu!="")&&($penghasilan_ibu!="")){
				$status_ortu="Lengkap";
			}else{
				$status_ortu="Belum Lengkap";
			}
			$datapub["status_bayar"]=$status_bayar;
            $datapub["status_ortu"]=$status_ortu;
			$datapub["status_profile"]=$status_profile;
			$datapub["page"]=$page;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;

			$footer = $this->load->view("pubs/footer-admin",$datapub,TRUE);
			$sidebar = $this->load->view("pubs/sidebar-santri",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar-santri",$datapub,TRUE);
			$id_santri = $this->session->userdata("iduniq");

			$data_santri = $this->m_siswa->listing(" WHERE id_uniq = '$id_santri'");
			if(count($data_santri)>0)
			{
			    foreach($data_santri as $ds){
			    	$jenjang = $ds->jenjang;
			    }
			}
			$data_jadwal = $this->m_jadwalujian->listingview(" WHERE jenjang='$jenjang'");
			$data_jadwalujian = $this->m_jadwalujian->listingjadwal(" WHERE iduniq='$id_santri'");
			if(count($data_jadwalujian)>0){
			   	foreach($data_jadwalujian as $dju){
			        $idjadwal = $dju->idjadwal;
			        $iddetailjad = $dju->id;
			    } 
			}else{
			    $idjadwal = "";
			    $iddetailjad = "";
			}
		

			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;
			$datapub["data_santri"]=$data_santri;
			$datapub["data_jadwal"]=$data_jadwal;
			$datapub["idjadwal"]=$idjadwal;
			$datapub["iddetailjad"]=$iddetailjad;

			$this->load->view("pagesantri/jadwal_ujian",$datapub);
		}else{
			redirect("loginsantri");
		}
	}
	public function pilihJadwal()
	{
	    $logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri"))
		{
			$idsantri = $this->session->userdata("iduniq");
		    $idjadwal= $this->input->post("idjadwal");
		    $data_insert = array(
		        'iduniq'=>$idsantri,
		        'idjadwal'=>$idjadwal
		    );
		    
		    if($this->m_aplikasi->InsertData("siswa_ujian",$data_insert)){
        	        $input['hasil']=1;
        		    $input['pesan']='Data berhasil di simpan';  
        		}else{
        			$input['hasil']=0;
        		    $input['pesan']='Data gagal di simpan';
        		};
		    
			echo json_encode($input);
		}else{
			redirect("loginsantri");
		}
	}
	public function ubahJadwal()
	{
	    $logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri"))
		{
			$idsantri = $this->session->userdata("iduniq");
		    $idjadwal= $this->input->post("idjadwal");
		    $data_insert = array(
		        'idjadwal'=>$idjadwal
		    );
		    $where["iduniq"]=$idsantri;
		    if($this->m_aplikasi->UpdateData("siswa_ujian",$data_insert,$where)){
        	        $input['hasil']=1;
        		    $input['pesan']='Data berhasil di simpan';  
        		}else{
        			$input['hasil']=0;
        		    $input['pesan']='Data gagal di simpan';
        		};
		    
			echo json_encode($input);
		}else{
			redirect("loginsantri");
		}
	}
	public function data_list_jadwal()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
		{
			$list = $this->m_jadwal->get_datatables();
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->tanggal;
		      $row[] = $l->keterangan;
		      $row[] = "<div style='text-align: center;'>
		      				<a href='".base_url()."/santri/jadwal_detail' class='btn btn-warning'><span class='fa fa-eye'></span> Detail Jadwal</a>
		      			</div>";
		      $data[] = $row;
		      				// <a href='".base_url()."/backoffice/jadwal_input/".$l->id_uniq."' class='btn btn-warning btn-sm'><span class='fa fa-calendar'></span> Kirim Jadwal</a>

		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_jadwal->count_all(),
		     "recordsFiltered" => $this->m_jadwal->count_filtered(),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
	}
	public function data_list_santri()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator"))
		{
			$list = $this->m_siswa->get_datatables();
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->kode;
		      $row[] = $l->nama;
		      $row[] = $l->jenis_kelamin;
		      $row[] = $l->email;
		      $row[] = $l->jenjang;
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_siswa->count_all(),
		     "recordsFiltered" => $this->m_siswa->count_filtered(),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
	}
	public function jadwal_simpan()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
		{
		    $id = $this->input->post("id");
		    $nama_tes = $this->input->post("nama_tes");
		    $jenjang = $this->input->post("jenjang");
		    $keterangan = $this->input->post("keterangan");
		    $tanggal = $this->input->post("tanggal");
		    $kuota = $this->input->post("kuota");
		    $data_insert = array(
		        'nama_tes'=>$nama_tes,
		        'jenjang'=>$jenjang,
		        'keterangan'=>$keterangan,
		        'tanggal'=>substr($tanggal, 6,4)."-".substr($tanggal, 3,2)."-".substr($tanggal, 0,2),
		        'kuota'=>$kuota
		    );
		    if($id<>"")
		    {
		        $where["id"]=$id;
		        if($this->m_aplikasi->UpdateData("jadwal",$data_insert,$where)){
    			    $input['hasil']=1;
    		        $input['pesan']='Data berhasil di simpan';  
    			}else{
    			    $input['hasil']=0;
    		        $input['pesan']='Data gagal di simpan';
    		    };
		    }else{
		        if($this->m_aplikasi->InsertData("jadwal",$data_insert)){
    			    $input['hasil']=1;
    		        $input['pesan']='Data berhasil di simpan';  
    			}else{
    			    $input['hasil']=0;
    		        $input['pesan']='Data gagal di simpan';
    		    };
		    }
		    
			echo json_encode($input);
		}else{
			redirect("home/login");
		}
	}
	public function jadwal_data()
	{
	    $logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="Jenjang"))
		{
		    $list = $this->m_jadwalujian->get_datatables();
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->jenjang_nama;
		      $row[] = $l->nama_tes;
		      $row[] = $l->tanggal;
		      $row[] = $l->keterangan;
		      $row[] = $l->kuota;
		      $row[] = $l->kuota-$l->jumlah_peserta;
		      $row[] = "<div style='text-align: center;'>
		      				<a href='".base_url()."siswa/jadwal_peserta/".$l->id."' class='btn btn-sm btn-info'><span class='fa fa-eye'></span> Lihat Peserta</a>
		      			    	<button onclick='updateJadwal(".$l->id.")' class='btn btn-warning btn-sm'><span class='fa fa-calendar'></span> Edit Jadwal</button>
		      			    	<button onclick='hapusJadwal(".$l->id.")' class='btn btn-danger btn-sm'><span class='fa fa-trash'></span> Hapus</button>
		      			</div>";
		      $data[] = $row;
		      				// <a href='".base_url()."/backoffice/jadwal_input/".$l->id_uniq."' class='btn btn-warning btn-sm'><span class='fa fa-calendar'></span> Kirim Jadwal</a>

		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_jadwalujian->count_all(),
		     "recordsFiltered" => $this->m_jadwalujian->count_filtered(),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
	}
	public function jadwal_peserta($idjadwal)
	{
		$idakun = $this->session->userdata("id");
	    $logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator"))
		{
			$data_app = $this->m_aplikasi->listing();
			foreach ($data_app as $da) {
				$nama_app=$da->nama;
				$instansi=$da->instansi;
				$tahun=$da->tahun;
				$logo=$da->logo;
			}
			$page="Jadwal Ujian";

			$datapub["page"]=$page;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;

			$data_akun = $this->m_user->listing(" WHERE id='$idakun'");
			if(count($data_akun)>0)
			{
				foreach($data_akun as $da){
					$datapub["nama_akun"]=$da->username;
				}
			}

			$footer = $this->load->view("pubs/footer-admin",$datapub,TRUE);
			$sidebar = $this->load->view("pubs/sidebar",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar",$datapub,TRUE);
			
			$datapub["idjadwal"]=$idjadwal;
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;

			$this->load->view("jadwal_peserta",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function peserta_ujian_report()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
		{
		    $idjadwal = $this->input->post("idjadwal");
			$list = $this->m_pesertaujian->get_datatables($idjadwal);
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->tanggal_ujian;
		      $row[] = $l->kode;
		      $row[] = $l->nama;
		      $row[] = $l->jenis_kelamin;
		      $row[] = $l->jenjang_nama;
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_pesertaujian->count_all($idjadwal),
		     "recordsFiltered" => $this->m_pesertaujian->count_filtered($idjadwal),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
	}
	public function data_detail_jadwal()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
		{
			$idu=$this->input->post('idu');
			$data_siswa=$this->m_siswa->listing(" WHERE id='$idu'");
			foreach ($data_siswa as $ds) {
				$id_uniq = $ds->id_uniq;
				
			}
		    $data_user=$this->m_siswa->listing_jadwal("WHERE iduniq='$id_uniq'");
		    $X = array('hasildata'=>$data_user);               
		    echo json_encode($X);  
		}else{
			redirect("home/login");
		}
	}
	
	public function jadwal_hapus()
	{
	    $logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
		{
			$id=$this->input->post("id");
			$where['id']=$id;
			if($this->m_aplikasi->DeleteData("jadwal",$where)){
				$input['hasil']=1;
	            $input['pesan']='Data berhasil di hapus';
			}else{
				$input['hasil']=0;
	            $input['pesan']='Data gagal di hapus';
			}
			echo json_encode($input);
		}else{
			redirect("home/login");
		}
	}
	
	public function jadwal_detail()
    {
        $logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
		{
			$id=$this->input->post('id');
		    $data_user=$this->m_jadwalujian->listing("WHERE id='$id'");
		    $X = array('hasildata'=>$data_user);               
		    echo json_encode($X);  
		}else{
			redirect("home/login");
		}
    }
	
	public function data_simpan()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator"))
		{
			$id = $this->input->post("id");
			$username = $this->input->post("username");
			$email = $this->input->post("email");
			$level = $this->input->post("level");
			$password = $this->input->post("password");
			
			$datainsert["username"]=$username;
			$datainsert["email"]=$email;
			$datainsert["level"]=$level;

			$namastr = str_replace(' ', '_', $username);
			$unikimg= date('Ymdhis');
			if($_FILES['foto']['size'] != 0 ){
				$config['upload_path'] = './upload/profil';
	            $config['allowed_types'] = 'jpg|png|jpeg';
	            $config['file_name'] = $namastr."_".$unikimg;
	            $config['max_size']     = '1000';
	            $config['overwrite']     = TRUE;

	            $this->load->library('upload', $config);
				$this->upload->initialize($config);

	            if(!$this->upload->do_upload('foto')){
	               	$hasil="success";
					echo json_encode($hasil);
	            } else {
	            	$data = array('upload_data' => $this->upload->data());
					$eks = explode('.', $_FILES['foto']['name']);
					$eks = $eks[count($eks)-1];
	               	$datainsert["foto"]=$namastr."_".$unikimg.".".$eks;
	            }
	            if($id<>""){
					$where['id']=$id;
					if($this->m_aplikasi->UpdateData('user',$datainsert,$where)){
						$input['hasil']=1;
		                $input['pesan']='Data berhasil di update';
					}else{
						$input['hasil']=0;
		                $input['pesan']='Data gagal di update';
					}
				}else{
					$datainsert["password"]=md5($password);
					if($this->m_aplikasi->InsertData("user",$datainsert)){
						$input['hasil']=1;
		                $input['pesan']='Data berhasil di simpan';  
					}else{
						$input['hasil']=0;
		                $input['pesan']='Data gagal di simpan';
					};
				}
			}else{
				 if($id<>""){
					$where['id']=$id;
					if($this->m_aplikasi->UpdateData('user',$datainsert,$where)){
						$input['hasil']=1;
		                $input['pesan']='Data berhasil di update';  
					}else{
						$input['hasil']=0;
		                $input['pesan']='Data gagal di update';
					}
				}else{
					$datainsert["password"]=md5($password);
					if($this->m_aplikasi->InsertData("user",$datainsert)){
						$input['hasil']=1;
		                $input['pesan']='Data berhasil di simpan';
					}else{
						$input['hasil']=0;
		                $input['pesan']='Data gagal di simpan';
					}
				}
			}
			echo json_encode($input);
		}else{
			redirect("home/login");
		}
	}
	public function data_hapus()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="Jenjang"))
		{
			$imageUser="";
			$id=$this->input->post("id");
			$data_user = $this->m_siswa->listing("WHERE id='$id'");
			foreach ($data_user as $du) {
				$idunik = $du->id_uniq;
			}
			$wheresiswa['id']=$id;
			$where['iduniq']=$idunik;
			if($this->m_aplikasi->DeleteData("siswa",$wheresiswa)){
				$this->m_aplikasi->DeleteData("siswa_bayar",$where);
				$this->m_aplikasi->DeleteData("siswa_dokumen",$where);
				$this->m_aplikasi->DeleteData("siswa_orangtua",$where);
				$this->m_aplikasi->DeleteData("siswa_pengumuman",$where);
				$this->m_aplikasi->DeleteData("siswa_prestasi",$where);
				$this->m_aplikasi->DeleteData("siswa_ujian",$where);
				$input['hasil']=1;
	            $input['pesan']='Data berhasil di hapus';
			}else{
				$input['hasil']=0;
	            $input['pesan']='Data gagal di hapus';
			}
			echo json_encode($input);
		}else{
			redirect("home/login");
		}
	}
	public function data_detail()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator"))
		{
			$id=$this->input->post('id');
		    $data_user=$this->m_user->listing("WHERE id='$id'");
		    $X = array('hasildata'=>$data_user);               
		    echo json_encode($X);  
		}else{
			redirect("home/login");
		}
	}
	
	public function report_setjadwal()
	{
	    $logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator"))
		{
			$data_app = $this->m_aplikasi->listing();
			foreach ($data_app as $da) {
				$nama_app=$da->nama;
				$instansi=$da->instansi;
				$tahun=$da->tahun;
				$logo=$da->logo;
			}
			$page="Report Belum Pilih Jadwal";

			$datapub["page"]=$page;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;

			$footer = $this->load->view("pubs/footer-admin",$datapub,TRUE);
			$sidebar = $this->load->view("pubs/sidebar",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar",$datapub,TRUE);
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;

			$this->load->view("report_setjadwal",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function setjadwal_report()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator"))
		{
			$list = $this->m_setjadwal->get_datatables();
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->kode;
		      $row[] = $l->nama;
		      $row[] = $l->jenis_kelamin;
		      $row[] = $l->email;
		      $row[] = $l->jenjang;
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_setjadwal->count_all(),
		     "recordsFiltered" => $this->m_setjadwal->count_filtered(),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
	}
	
	public function detail_santri()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="Jenjang"))
		{
			$id=$this->input->post('id');
			$data_santri = $this->m_siswa->listing(" WHERE id = '$id'");
			$X = array('hasildata'=>$data_santri);               
		    echo json_encode($X);  
		}else{
			redirect("home/login");
		}
	}
	public function reset_password()
    {
        $logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="Jenjang"))
		{
			$id = $this->input->post("id");
			$password = $this->input->post("password");
			
			if(!empty($password))
			{
				$datainsert["password"]=md5($password);
			}
			$where['id']=$id;
		    if($this->m_aplikasi->UpdateData('siswa',$datainsert,$where)){
				$input['hasil']=1;
				$input['pesan']='Data berhasil di update';  
			}else{
			    $input['hasil']=0;
		        $input['pesan']='Data gagal di update';
			}
			echo json_encode($input);
		}else{
			redirect("home/login");
		}
    }
	public function data_pembayaran()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri"))
		{
			$id_santri = $this->session->userdata("iduniq");
			$list = $this->m_pembayaransiswa->get_datatables($id_santri);
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->trx_id;
		      $row[] = $l->tanggal;
		      $row[] = "Rp.".number_format($l->price);
		      $row[] = $l->email;
		      if($l->status=="berhasil"){
		      	$row[] = "<a href='#' class='btn btn-sm btn-success'>Berhasil</a>";		      	
		      }else{
		      	$row[] = "<a href='#' class='btn btn-sm btn-warning'>Pending</a>";		 
		      }
		       if($l->status=="berhasil"){
		      	$row[] = "-";		      	
		      }else{
		      	$row[] = "<a href='https://my.ipaymu.com/payment/".$l->sid."' target='_blank' class='btn btn-sm btn-success'><span class='fa fa-money-bill'></span> Link Pembayaran</a>";		 
		      }
		     
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_pembayaransiswa->count_all($id_santri),
		     "recordsFiltered" => $this->m_pembayaransiswa->count_filtered($id_santri),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('loginsiswa');
	}
	public function dokumen_kartu_keluarga()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri")||($level=="Administrator")||($level=="Jenjang"))
		{
			$id_uniq = $this->input->post('id_uniq');
			$nisn=$this->input->post('nisn');
    		if (!is_dir('upload/santri/'.$nisn)) {
    		    mkdir('./upload/santri/' . $nisn, 0777, TRUE);
    		}
			if(!empty($_FILES['kartu_keluarga']['name'])){
				$config['file_name']= "kartu_keluarga_".$nisn;
				$config['upload_path']='./upload/santri/'.$nisn;
				$config['allowed_types']='jpg|png|jpeg|pdf|JPG|PNG|JPEG|PDF';
				$config['max_size']='50000';
				$config['max_width']='0';
				$config['max_height']='0';
				$config['overwrite']= TRUE;
				$config['remove_spaces']= FALSE;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if (!$this->upload->do_upload('kartu_keluarga'))
				{
				
				}else{
					$data = array('upload_data' => $this->upload->data());
					$eks = explode('.', $_FILES['kartu_keluarga']['name']);
					$eks = $eks[count($eks)-1];

					$data = array('upload_data' => $this->upload->data());
					$eks = explode('.', $_FILES['kartu_keluarga']['name']);
					$eks = $eks[count($eks)-1];

					$data_insert = array('iduniq'=>$id_uniq,
											'file'=>"kartu_keluarga_".$nisn.".".$eks,
											'type'=>"Kartu Keluarga");
					$this->m_aplikasi->InsertData('siswa_dokumen',$data_insert);
				}
			}
			echo "Success";
		}else{
			redirect("home/login");
		}
	}
	public function detail_kartu_keluarga()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri")||($level=="Administrator")||($level=="Jenjang"))
		{
			$id=$this->input->post('id');
			$data_calon = $this->m_siswa->listing_dokumen(" WHERE iduniq='$id' AND type='Kartu Keluarga' ");
		    $X = array('hasildata'=>$data_calon);               
		    echo json_encode($X);
		}else{
			redirect("home/login");
		}
	}
	public function dokumen_kartu_identitas()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri")||($level=="Administrator"))
		{
			$id_uniq = $this->input->post('id_uniq');
			$nisn=$this->input->post('nisn');
		    if (!is_dir('upload/santri/'.$nisn)) {
    		    mkdir('./upload/santri/' . $nisn, 0777, TRUE);
    		}
			if(!empty($_FILES['kartu_identitas']['name'])){
				$config['file_name']= "kartu_identitas_".$nisn;
				$config['upload_path']='./upload/santri/'.$nisn;
				$config['allowed_types']='jpg|png|jpeg|pdf|JPG|PNG|JPEG|PDF';
				$config['max_size']='50000';
				$config['max_width']='0';
				$config['max_height']='0';
				$config['overwrite']= TRUE;
				$config['remove_spaces']= FALSE;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if (!$this->upload->do_upload('kartu_identitas'))
				{
				
				}else{
					$data = array('upload_data' => $this->upload->data());
					$eks = explode('.', $_FILES['kartu_identitas']['name']);
					$eks = $eks[count($eks)-1];

					$data = array('upload_data' => $this->upload->data());
					$eks = explode('.', $_FILES['kartu_identitas']['name']);
					$eks = $eks[count($eks)-1];

					$data_insert = array('iduniq'=>$id_uniq,
											'file'=>"kartu_identitas_".$nisn.".".$eks,
											'type'=>"Kartu Identitas");
					$this->m_aplikasi->InsertData('siswa_dokumen',$data_insert);
				}
			}
			echo "Success";
		}else{
			redirect("home/login");
		}
	}
	public function detail_kartu_identitas()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri")||($level=="Administrator"))
		{
			$id=$this->input->post('id');
			$data_calon = $this->m_siswa->listing_dokumen(" WHERE iduniq='$id' AND type='Kartu Identitas' ");
		    $X = array('hasildata'=>$data_calon);               
		    echo json_encode($X);
		}else{
			redirect("home/login");
		}
	}
	public function dokumen_rapor()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri")||($level=="Administrator"))
		{
			$id_uniq = $this->input->post('id_uniq');
			$nisn=$this->input->post('nisn');
		
		    if (!is_dir('upload/santri/'.$nisn)) {
    		    mkdir('./upload/santri/' . $nisn, 0777, TRUE);
    		}
			if(!empty($_FILES['rapor']['name'])){
				$config['file_name']= "rapor_".$nisn;
				$config['upload_path']='./upload/santri/'.$nisn;
				$config['allowed_types']='jpg|png|jpeg|pdf|JPG|PNG|JPEG|PDF';
				$config['max_size']='50000';
				$config['max_width']='0';
				$config['max_height']='0';
				$config['overwrite']= TRUE;
				$config['remove_spaces']= FALSE;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if (!$this->upload->do_upload('rapor'))
				{
				
				}else{
					$data = array('upload_data' => $this->upload->data());
					$eks = explode('.', $_FILES['rapor']['name']);
					$eks = $eks[count($eks)-1];

					$data = array('upload_data' => $this->upload->data());
					$eks = explode('.', $_FILES['rapor']['name']);
					$eks = $eks[count($eks)-1];

					$data_insert = array('iduniq'=>$id_uniq,
											'file'=>"rapor_".$nisn.".".$eks,
											'type'=>"Rapor");
					$this->m_aplikasi->InsertData('siswa_dokumen',$data_insert);
				}
			}
			echo "Success";
		}else{
			redirect("home/login");
		}
	}
	public function detail_rapor()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri")||($level=="Administrator"))
		{
			$id=$this->input->post('id');
			$data_calon = $this->m_siswa->listing_dokumen(" WHERE iduniq='$id' AND type='Rapor' ");
		    $X = array('hasildata'=>$data_calon);               
		    echo json_encode($X);
		}else{
			redirect("home/login");
		}
	}
	public function dokumen_akta_kelahiran()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri")||($level=="Administrator")||($level=="Jenjang"))
		{
			$id_uniq = $this->input->post('id_uniq');
			$nisn=$this->input->post('nisn');
		
		    if (!is_dir('upload/santri/'.$nisn)) {
    		    mkdir('./upload/santri/' . $nisn, 0777, TRUE);
    		}
			if(!empty($_FILES['akta_kelahiran']['name'])){
				$config['file_name']= "akta_kelahiran_".$nisn;
				$config['upload_path']='./upload/santri/'.$nisn;
				$config['allowed_types']='jpg|png|jpeg|pdf|JPG|PNG|JPEG|PDF';
				$config['max_size']='50000';
				$config['max_width']='0';
				$config['max_height']='0';
				$config['overwrite']= TRUE;
				$config['remove_spaces']= FALSE;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if (!$this->upload->do_upload('akta_kelahiran'))
				{
				
				}else{
					$data = array('upload_data' => $this->upload->data());
					$eks = explode('.', $_FILES['akta_kelahiran']['name']);
					$eks = $eks[count($eks)-1];

					$data = array('upload_data' => $this->upload->data());
					$eks = explode('.', $_FILES['akta_kelahiran']['name']);
					$eks = $eks[count($eks)-1];

					$data_insert = array('iduniq'=>$id_uniq,
											'file'=>"akta_kelahiran_".$nisn.".".$eks,
											'type'=>"Akta Kelahiran");
					$this->m_aplikasi->InsertData('siswa_dokumen',$data_insert);
				}
			}
			echo "Success";
		}else{
			redirect("home/login");
		}
	}
	public function detail_akta_kelahiran()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri")||($level=="Administrator")||($level=="Jenjang"))
		{
			$id=$this->input->post('id');
			$data_calon = $this->m_siswa->listing_dokumen(" WHERE iduniq='$id' AND type='Akta Kelahiran' ");
		    $X = array('hasildata'=>$data_calon);               
		    echo json_encode($X);
		}else{
			redirect("home/login");
		}
	}
	public function dokumen_tidak_mampu()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri")||($level=="Administrator")||($level=="Jenjang"))
		{
			$id_uniq = $this->input->post('id_uniq');
			$nisn=$this->input->post('nisn');
		
		    if (!is_dir('upload/santri/'.$nisn)) {
    		    mkdir('./upload/santri/' . $nisn, 0777, TRUE);
    		}
			if(!empty($_FILES['tidak_mampu']['name'])){
				$config['file_name']= "tidak_mampu_".$nisn;
				$config['upload_path']='./upload/santri/'.$nisn;
				$config['allowed_types']='jpg|png|jpeg|pdf|JPG|PNG|JPEG|PDF';
				$config['max_size']='50000';
				$config['max_width']='0';
				$config['max_height']='0';
				$config['overwrite']= TRUE;
				$config['remove_spaces']= FALSE;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if (!$this->upload->do_upload('tidak_mampu'))
				{
				
				}else{
					$data = array('upload_data' => $this->upload->data());
					$eks = explode('.', $_FILES['tidak_mampu']['name']);
					$eks = $eks[count($eks)-1];

					$data = array('upload_data' => $this->upload->data());
					$eks = explode('.', $_FILES['tidak_mampu']['name']);
					$eks = $eks[count($eks)-1];

					$data_insert = array('iduniq'=>$id_uniq,
											'file'=>"tidak_mampu_".$nisn.".".$eks,
											'type'=>"Tidak Mampu");
					$this->m_aplikasi->InsertData('siswa_dokumen',$data_insert);
				}
			}
			echo "Success";
		}else{
			redirect("home/login");
		}
	}
	public function detail_tidak_mampu()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri")||($level=="Administrator")||($level=="Jenjang"))
		{
			$id=$this->input->post('id');
			$data_calon = $this->m_siswa->listing_dokumen(" WHERE iduniq='$id' AND type='Tidak Mampu' ");
		    $X = array('hasildata'=>$data_calon);               
		    echo json_encode($X);
		}else{
			redirect("home/login");
		}
	}
	
	public function dokumen_skhun()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri")||($level=="Administrator"))
		{
			$id_uniq = $this->input->post('id_uniq');
			$nisn=$this->input->post('nisn');
		
		    if (!is_dir('upload/santri/'.$nisn)) {
    		    mkdir('./upload/santri/' . $nisn, 0777, TRUE);
    		}
    		
			if(!empty($_FILES['skhun']['name'])){
				$config['file_name']= "skhun_".$nisn;
				$config['upload_path']='./upload/santri/'.$nisn;
				$config['allowed_types']='jpg|png|jpeg|pdf|JPG|PNG|JPEG|PDF';
				$config['max_size']='50000';
				$config['max_width']='0';
				$config['max_height']='0';
				$config['overwrite']= TRUE;
				$config['remove_spaces']= FALSE;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if (!$this->upload->do_upload('skhun'))
				{
				
				}else{
					$data = array('upload_data' => $this->upload->data());
					$eks = explode('.', $_FILES['skhun']['name']);
					$eks = $eks[count($eks)-1];

					$data = array('upload_data' => $this->upload->data());
					$eks = explode('.', $_FILES['skhun']['name']);
					$eks = $eks[count($eks)-1];

					$data_insert = array('iduniq'=>$id_uniq,
											'file'=>"skhun_".$nisn.".".$eks,
											'type'=>"SKHUN");
					$this->m_aplikasi->InsertData('siswa_dokumen',$data_insert);
				}
			}
			echo "Success";
		}else{
			redirect("home/login");
		}
	}
	public function detail_skhun()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri")||($level=="Administrator")||($level=="Jenjang"))
		{
			$id=$this->input->post('id');
			$data_calon = $this->m_siswa->listing_dokumen(" WHERE iduniq='$id' AND type='SKHUN' ");
		    $X = array('hasildata'=>$data_calon);               
		    echo json_encode($X);
		}else{
			redirect("home/login");
		}
	}
	
	public function dokumen_sttb()
	{
	    $logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri")||($level=="Administrator")||($level=="Jenjang"))
		{
			$id_uniq = $this->input->post('id_uniq');
			$nisn=$this->input->post('nisn');
		
		    if (!is_dir('upload/santri/'.$nisn)) {
    		    mkdir('./upload/santri/' . $nisn, 0777, TRUE);
    		}
    		
			if(!empty($_FILES['sttb']['name'])){
				$config['file_name']= "sttb_".$nisn;
				$config['upload_path']='./upload/santri/'.$nisn;
				$config['allowed_types']='jpg|png|jpeg|pdf|JPG|PNG|JPEG|PDF';
				$config['max_size']='50000';
				$config['max_width']='0';
				$config['max_height']='0';
				$config['overwrite']= TRUE;
				$config['remove_spaces']= FALSE;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if (!$this->upload->do_upload('sttb'))
				{
				
				}else{
					$data = array('upload_data' => $this->upload->data());
					$eks = explode('.', $_FILES['sttb']['name']);
					$eks = $eks[count($eks)-1];

					$data = array('upload_data' => $this->upload->data());
					$eks = explode('.', $_FILES['sttb']['name']);
					$eks = $eks[count($eks)-1];

					$data_insert = array('iduniq'=>$id_uniq,
											'file'=>"sttb_".$nisn.".".$eks,
											'type'=>"STTB");
					$this->m_aplikasi->InsertData('siswa_dokumen',$data_insert);
				}
			}
			echo "Success";
		}else{
			redirect("home/login");
		}
	}
	public function detail_sttb()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri")||($level=="Administrator")||($level=="Jenjang"))
		{
			$id=$this->input->post('id');
			$data_calon = $this->m_siswa->listing_dokumen(" WHERE iduniq='$id' AND type='STTB' ");
		    $X = array('hasildata'=>$data_calon);               
		    echo json_encode($X);
		}else{
			redirect("home/login");
		}
	}
	
	public function dokumen_ktp_ayah()
	{
	    $logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri")||($level=="Administrator")||($level=="Jenjang"))
		{
			$id_uniq = $this->input->post('id_uniq');
			$nisn=$this->input->post('nisn');
		
		    if (!is_dir('upload/santri/'.$nisn)) {
    		    mkdir('./upload/santri/' . $nisn, 0777, TRUE);
    		}
    		
			if(!empty($_FILES['ktp_ayah']['name'])){
				$config['file_name']= "ktp_ayah_".$nisn;
				$config['upload_path']='./upload/santri/'.$nisn;
				$config['allowed_types']='jpg|png|jpeg|pdf|JPG|PNG|JPEG|PDF';
				$config['max_size']='50000';
				$config['max_width']='0';
				$config['max_height']='0';
				$config['overwrite']= TRUE;
				$config['remove_spaces']= FALSE;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if (!$this->upload->do_upload('ktp_ayah'))
				{
				
				}else{
					$data = array('upload_data' => $this->upload->data());
					$eks = explode('.', $_FILES['ktp_ayah']['name']);
					$eks = $eks[count($eks)-1];

					$data = array('upload_data' => $this->upload->data());
					$eks = explode('.', $_FILES['ktp_ayah']['name']);
					$eks = $eks[count($eks)-1];

					$data_insert = array('iduniq'=>$id_uniq,
											'file'=>"ktp_ayah_".$nisn.".".$eks,
											'type'=>"KTP Ayah");
					$this->m_aplikasi->InsertData('siswa_dokumen',$data_insert);
				}
			}
			echo "Success";
		}else{
			redirect("home/login");
		}
	}
	public function detail_ktp_ayah()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri")||($level=="Administrator")||($level=="Jenjang"))
		{
			$id=$this->input->post('id');
			$data_calon = $this->m_siswa->listing_dokumen(" WHERE iduniq='$id' AND type='KTP Ayah' ");
		    $X = array('hasildata'=>$data_calon);               
		    echo json_encode($X);
		}else{
			redirect("home/login");
		}
	}
	
	
	
	
	public function calon_hapus_file_ajax()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri")||($level=="Administrator")||($level=="Jenjang"))
		{
			$id_file = $this->input->post("id_file");
			$nisn = $this->input->post("nisn");
			$file = $this->m_siswa->listing_dokumen(" WHERE id='$id_file'");
			foreach ($file as $f) {
				if(!empty($f->file))
				{
					unlink("upload/santri/".$nisn."/".$f->file);
				}
			}
			$where = array('id'=>$id_file);
			$this->m_aplikasi->DeleteData('siswa_dokumen',$where);
			$input['hasil']=1;
			$input['pesan']="Dokumen berhasil dihapus";
			echo json_encode($input);
		}else{
			redirect("home/login");
		}
	}
	public function download_cetak_kartu()
	{
			$data_app = $this->m_aplikasi->listing();
			foreach ($data_app as $da) {
				$nama_app=$da->nama;
				$instansi=$da->instansi;
				$tahun=$da->tahun;
				$logo=$da->logo;
			}
			$page="Cetak Kartu";

			$id_santri = $this->session->userdata("iduniq");
			$data_bayar = $this->m_siswa->listing_pembayaran(" WHERE iduniq = '$id_santri'");
			foreach ($data_bayar as $db) {
				$status_bayar = $db->status;
			}
			$datapub["status_bayar"]=$status_bayar;
			$data_santri = $this->m_siswa->listing(" WHERE id_uniq = '$id_santri'");


			$data_ujian=$this->m_jadwal->listing(" WHERE iduniq = '$id_santri'");
			if(count($data_ujian)>0)
			{
			    foreach ($data_ujian as $du) {
				    $tanggal_ujian = $du->tanggal;
			    }
			}else{
			    $tanggal_ujian = "";
			}
			

			$datapub["page"]=$page;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;
			$datapub["data_santri"]=$data_santri;
			$datapub["tanggal_ujian"]=$tanggal_ujian;


			$footer = $this->load->view("pubs/footer-admin",$datapub,TRUE);
			$sidebar = $this->load->view("pubs/sidebar-santri",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar-santri",$datapub,TRUE);
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;


		$this->load->library('mypdf');
        $this->mypdf->generate("pagesantri/download_kartu",$datapub,"Kartu Ujian");
	}

}