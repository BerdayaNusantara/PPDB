<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class backoffice extends CI_Controller {

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
		$this->load->model("m_siswa");
		$this->load->model("m_pembayaran");
		$this->load->model("m_user");
		$this->load->model("m_prestasi");
		$this->load->model("m_biaya");
		$this->load->model("m_pengumuman");
		$this->load->model("m_konfigurasi");
		$this->load->model("m_jenjang");
		$this->load->model("m_jadwal");
		$this->load->model("m_kelas");
		$this->load->model("m_tahun");
	}
	public function index()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if($logged=="yes")
		{
			if($level=="Administrator"){
				redirect("backoffice/dashboard");	
			}elseif ($level=="UnitTKIT") {
				redirect("unit");
			}elseif ($level=="UnitSDIT") {
				redirect("unit");
			}elseif ($level=="UnitSDIT") {
				redirect("unit");
			}elseif ($level=="UnitSMPIT") {
				redirect("unit");
			}elseif ($level=="UnitSMAIT") {
				redirect("unit");
			}
		}else{
			redirect("home/login");
		}
	}
	public function dashboard()
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
			$page="Dashboard";

			$datapub["page"]=$page;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;

			$data_siswa = $this->m_siswa->listing_count_all();
			$data_pembayaran_berhasil = $this->m_pembayaran->listing_jumlah(" WHERE status='berhasil'");
			$data_pembayaran_pending = $this->m_pembayaran->listing_jumlah(" WHERE status='pending' OR status='' ");
			$data_user = $this->m_user->listing_jumlah();
			$chart_jenjang = $this->m_siswa->chart_siswa();

			if(count($data_siswa)>0)
			{
				foreach ($data_siswa as $ds) {
					$jumlah_siswa = $ds->count_all;
				}
			}else{
				$jumlah_siswa = 0;
			}
			if(count($data_pembayaran_berhasil)>0)
			{
				foreach ($data_pembayaran_berhasil as $dpb) {
					$jumlah_berhasil = $dpb->price;
				}
			}else{
				$jumlah_berhasil = 0;
			}
			if(count($data_pembayaran_pending)>0)
			{
				foreach ($data_pembayaran_pending as $dpp) {
					$jumlah_pending = $dpp->price;
				}
			}else{
				$jumlah_pending = 0;
			}
			if(count($data_user)>0)
			{
				foreach ($data_user as $du) {
					$jum_user = $du->jum_user;
				}
			}else{
				$jun_user= 0;
			}
			if(count($chart_jenjang)>0)
			{
				foreach ($chart_jenjang as $cj) {
					$datachartjen["label"][]= $cj->jenjang;
					$datachartjen["data"][]= (int) $cj->jumlah; 
				}
			}else{
				$datachartjen["label"][]= "";
				$datachartjen["data"][]= 0; 
			}
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
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;
			$datapub["jumlah_siswa"]=$jumlah_siswa;
			$datapub["jumlah_berhasil"]=$jumlah_berhasil;
			$datapub["jumlah_pending"]=$jumlah_pending;
			$datapub["jum_user"]=$jum_user;
			$datapub["charts_jenjang"]=json_encode($datachartjen);

			$this->load->view("dashboard",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function profil_akun()
	{
		$idakun = $this->session->userdata("id");
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="Jenjang"))
		{
			$data_app = $this->m_aplikasi->listing();
			foreach ($data_app as $da) {
				$nama_app=$da->nama;
				$instansi=$da->instansi;
				$tahun=$da->tahun;
				$logo=$da->logo;
			}
			$page="Profil User";

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
					$datapub["email_akun"]=$da->email;
					$datapub["level_akun"]=$da->level;
				}
			}
			$footer = $this->load->view("pubs/footer-admin",$datapub,TRUE);
			$sidebar = $this->load->view("pubs/sidebar",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar",$datapub,TRUE);
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;

			$this->load->view("profil_akun",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function akun_detail()
	{
		$idakun = $this->session->userdata("id");
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="Jenjang"))
		{
			$id_akun =$this->input->post("id");
			$data_akun = $this->m_user->listing(" WHERE id = '$id_akun'");
			$X = array('hasildata'=>$data_akun);               
		    echo json_encode($X);  
		}else{
			redirect("home/login");
		}
	}
	public function akun_simpan()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="Jenjang"))
		{
			$id = $this->input->post("id");
			$username = $this->input->post("username");
			$email = $this->input->post("email");
			$password = $this->input->post("password");
			
			$where["id"]=$id;
			$datainsert["username"]=$username;
			$datainsert["email"]=$email;
			if(!empty($password))
			{
				$datainsert["password"]=md5($password);
			}
			if($this->m_aplikasi->UpdateData('user',$datainsert,$where)){
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
	public function updatejalur()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri"))
		{
			$id_uniq = $this->input->post("id_uniq");
			$jalur = $this->input->post("jalur");
			
			$where["id_uniq"]=$id_uniq;
			$datainsert["jalur"]=$jalur;
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
	public function user()
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
			$page="User";
			$data_akun = $this->m_user->listing(" WHERE id='$idakun'");
			if(count($data_akun)>0)
			{
				foreach($data_akun as $da){
					$datapub["nama_akun"]=$da->username;
				}
			}
			$data_jenjang = $this->m_jenjang->listing();
			if(count($data_jenjang)>0)
			{
				$datapub["jenjang"]=$data_jenjang;
			}
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

			$this->load->view("user",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function konten_beranda()
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
			$page="Konten Beranda";

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

			$this->load->view("konten_beranda",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function daftar_siswa()
	{
		$nama = $this->input->post("nama");
		$jenis_kelamin = $this->input->post("jenis_kelamin");
		$no_wali_santri = $this->input->post("no_wali_santri");
		$email_wali_santri = $this->input->post("email_wali_santri");
		$password = $this->input->post("password");
		$jenjang = $this->input->post("jenjang");
		$nisn = $this->input->post("nisn");

		$data_siswa_email = $this->m_siswa->listing(" WHERE email='$email_wali_santri'");

		$max_siswa = $this->m_siswa->max_siswa();
		foreach ($max_siswa as $ms) {
			$max_id = $ms->max_id;
		}
		if(strlen($max_id)==0){
			$no_urut_daftar ="000".($max_id+1);
		}elseif (strlen($max_id)==1) {
			$no_urut_daftar ="000".($max_id+1);
		}elseif (strlen($max_id)==2) {
			$no_urut_daftar ="00".($max_id+1);
		}elseif (strlen($max_id)==3) {
			$no_urut_daftar ="0".($max_id+1);
		}elseif(strlen($max_id)==4){
			$no_urut_daftar =($max_id+1);
		}
		$data_nomor = $this->m_konfigurasi->listing();
		if(count($data_nomor)>0)
		{
			foreach($data_nomor as $da)
			{
				$nomor_daftar = $da->nomor_daftar;
			}
		}else{
			$nomor_daftar="";
		}

		$kode_daftarack = $jenjang."-".date('Ym').$no_urut_daftar;
		$kode_daftar = $nomor_daftar."-".$no_urut_daftar;
		$id_uniq = md5($kode_daftarack);

		$data_tahun_akademik = $this->m_tahun->listing(" WHERE status='Aktif' ");
		if(count($data_tahun_akademik)>0)
		{
			foreach($data_tahun_akademik as $dta)
			{
				$id_akademik = $dta->id;
			}
			$datainsert["tahun_ajar"]=$id_akademik;
		}
		$datainsert["id_uniq"]=$id_uniq;
		$datainsert["kode"]=$kode_daftar;
		$datainsert["nama"]=$nama;
		$datainsert["nisn"]=$nisn;
		$datainsert["jenis_kelamin"]=$jenis_kelamin;
		$datainsert["whatsapp"]=$no_wali_santri;
		$datainsert["email"]=$email_wali_santri;
		$datainsert["password"]=md5($password);
		$datainsert["jenjang"]=$jenjang;
		if(count($data_siswa_email)>0){
			$output['hasil']=0;
	        $output['pesan']='Email Sudah Terdaftar';
		}else{
			$insertsiswa= $this->m_aplikasi->InsertData("siswa",$datainsert);
			if($insertsiswa)
			{
				$output['hasil']=1;
		        $output['pesan']='Silahkan melakukan pembayaran biaya pendaftaran';  
		        $output['iduniq']=$id_uniq;  
			}else{
				$output['hasil']=0;
		        $output['pesan']='Error';  
			}
		}

		echo json_encode($output);
	}
	public function ceknik()
	{
		$nisn = $this->input->post("nisn");
		$data_santri = $this->m_siswa->listing(" WHERE nisn = '$nisn'");
		if(count($data_santri)>0)
		{
			foreach($data_santri as $ds){
				$id_santri = $ds->id_uniq;
			}
			$data_bayar = $this->m_siswa->listing_pembayaran(" WHERE iduniq = '$id_santri'");
			if(count($data_bayar)>0){
				foreach ($data_bayar as $db) {
					$status_bayar = $db->status;
				}
			}else{
				$status_bayar="";
			}
			if(($status_bayar=="")||($status_bayar=="pending"))
			{
				$output['pesan']="Pembayaran belum berhasil";
				$output['hasil']="0";
			}else{
				$data_pengumunan =$this->m_pengumuman->listing(" WHERE iduniq='$id_santri' ");
				if(count($data_pengumunan)>0){
					foreach ($data_pengumunan as $dp) {
						$status_lulus = $dp->status;
					}
					if($status_lulus=="Lulus")
					{
						$output['pesan']="Selamat anda lulus";
						$output['hasil']="1";
					}else{
						$output['pesan']="Mohon maaf anda belum lulus";
						$output['hasil']="0";
					}
					
				}else{
					$output['pesan']="Mohon maaf belum ada pengumuman kelulusan";
					$output['hasil']="0";
				}
			}
		}else{
			$output['pesan']="NISN Tidak terdaftar";
			$output['hasil']="0";
		}

		
		echo json_encode($output);
	}
	public function kelas()
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
			$page="Kelas";

			$datapub["page"]=$page;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;

			$data_kelas = $this->m_kelas->listing();
			
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
			$datapub["kelas"]=$data_kelas;
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;

			$this->load->view("kelas",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function pengumuman()
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
			$page="Pengumuman";

			$datapub["page"]=$page;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;

			$data_kelas = $this->m_kelas->listing();
			
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
			$datapub["kelas"]=$data_kelas;
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;

			$this->load->view("pengumuman",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function pengumuman_input($id_uniq)
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
			$page="Pengumuman";

			$datapub["page"]=$page;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;
			$data_santri = $this->m_siswa->listing(" WHERE id_uniq = '$id_uniq'");
			
			$data_pengumunan =$this->m_pengumuman->listing(" WHERE iduniq='$id_uniq' ");
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
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;
			$datapub["data_santri"]=$data_santri;
			$datapub["id_uniq"]=$id_uniq;
			$datapub["data_pengumunan"]=$data_pengumunan;

			$this->load->view("pengumuman_input",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function data_profile()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="Jenjang"))
		{
			
			$id_santri =$this->input->post("id_uniq");
			$data_santri = $this->m_siswa->listing(" WHERE id_uniq = '$id_santri'");
			$X = array('hasildata'=>$data_santri);               
		    echo json_encode($X);  
		}else{
			redirect("loginsantri");
		}
	}
	public function data_prestasi()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="Jenjang"))
		{
			$id = $this->input->post("id");
			$iduniq = $this->input->post("iduniq");
			$data_siswa=$this->m_siswa->listing(" WHERE id_uniq='$iduniq'");
			if(count($data_siswa)>0)
			{
			    foreach($data_siswa as $ds)
			    {
			        $nisn = $ds->nisn;
			    }
			}
			
			$list = $this->m_prestasi->get_datatables($iduniq);
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->prestasi;
		      if((substr($l->file,-4)=='.PDF')||(substr($l->file,-4)=='.pdf')){
		      	$row[]= "<a href='".base_url()."/upload/santri/".$nisn."/".$l->file."' target='_blank' class='btn btn-sm btn-success'><span class='fa fa-download'></span> Lihat File</a>";
		      }else{
		      	$row[]= "<img src='".base_url()."/upload/santri/".$nisn."/".$l->file."' width=100/>";
		      }
		      $row[] = "<div style='text-align: center;'>
		      				<button onclick='updateDataPrestasi(".$l->id.")' class='btn btn-warning btn-sm'><span class='fa fa-edit'></span></button>
		      				<button onclick='hapusPrestasi(".$l->id.")' class='btn btn-danger btn-sm'><span class='fa fa-trash'></span></button>
		      			</div>";
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_prestasi->count_all($iduniq),
		     "recordsFiltered" => $this->m_prestasi->count_filtered($iduniq),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
	}
	public function data_orangtua()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="Jenjang"))
		{
			$iduniq = $this->input->post("iduniq");
		    $data_user=$this->m_siswa->listing_orangtua("WHERE iduniq='$iduniq'");
		    $X = array('hasildata'=>$data_user);               
		    echo json_encode($X);  
		}else{
			redirect("home/login");
		}
	}
	public function pidahkelas()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="Jenjang"))
		{
			$siswa = $this->input->post("siswa");
			$kelas = $this->input->post("kelas");
			$exsiswa = explode(',',$siswa);
			$lengsis = count($exsiswa);
			for ($i=0; $i <$lengsis; $i++) { 
				$datainsert["siswa_id"]=$exsiswa[$i];
				$datainsert["kelas_id"]=$kelas;
				$this->m_aplikasi->InsertData("siswa_kelas",$datainsert);
			}
			$input['hasil']=1;
			$input['pesan']='Data berhasil di simpan';  
			echo json_encode($input);
		}else{
			redirect("home/login");
		}
	}
	public function simpan_prestasi()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="Jenjang"))
		{
			$id = $this->input->post("id_prestasi");
			$iduniq = $this->input->post("iduniq");
			$prestasi = $this->input->post("prestasi");
			$data_siswa=$this->m_siswa->listing(" WHERE id_uniq='$iduniq'");
			if(count($data_siswa)>0)
			{
			    foreach($data_siswa as $ds)
			    {
			        $nisn = $ds->nisn;
			    }
			}
			
			$where["id"]=$id;
			$datainsert["prestasi"]=$prestasi;
			$datainsert["iduniq"]=$iduniq;
			
			$namastr = "Prestasi_".str_replace(' ', '_', $prestasi);
			$unikimg= date('Ymdhis');
			if($_FILES['foto']['size'] != 0 ){
				$config['upload_path'] = './upload/santri/'.$nisn;
	            $config['allowed_types'] = 'jpg|png|jpeg|pdf|JPG|PNG|JPEG|PDF';
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
	               	$datainsert["file"]=$namastr."_".$unikimg.".".$eks;
	            }
		        if($id<>""){
					$where['id']=$id;
					if($this->m_aplikasi->UpdateData('siswa_prestasi',$datainsert,$where)){
						$input['hasil']=1;
			            $input['pesan']='Data berhasil di update';
					}else{
						$input['hasil']=0;
			            $input['pesan']='Data gagal di update';
					}
				}else{
					if($this->m_aplikasi->InsertData("siswa_prestasi",$datainsert)){
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
					if($this->m_aplikasi->UpdateData('siswa_prestasi',$datainsert,$where)){
						$input['hasil']=1;
			            $input['pesan']='Data berhasil di update';
					}else{
						$input['hasil']=0;
			            $input['pesan']='Data gagal di update';
					}
				}else{
					if($this->m_aplikasi->InsertData("siswa_prestasi",$datainsert)){
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
	public function data_hapus_prestasi()
	{
	    $logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="Jenjang"))
		{
			$id = $this->input->post("id");
			
			$data_prestasi=$this->m_prestasi->listing("WHERE id='$id'");
			foreach ($data_prestasi as $dp) {
			    $nisn = $dp->nisn;
				unlink("upload/santri/".$nisn."/".$dp->file);
			}	
			$where["id"]=$id;
			if($this->m_aplikasi->DeleteData('siswa_prestasi',$where)){
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
	public function daftar_siswa_bayar()
	{
		$iduniq = $this->input->post("iduniq");
		$urlpayment = $this->input->post("urlpayment");
		$price = $this->input->post("price");
		$sid = substr($urlpayment,30);
		$buyer_name= $this->input->post("buyer_name");
		$buyer_phone= $this->input->post("buyer_phone");
		$jenjang= $this->input->post("jenjang");
		$data_jen = $this->m_jenjang->listing(" WHERE id='$jenjang'");
		if(count($data_jen)>0){
			foreach($data_jen as $j){ $jenjang= $j->nama; }
		}
		$email_send= $this->input->post("buyer_email");
		$data_sistem = $this->m_konfigurasi->listing();
		foreach ($data_sistem as $db) {
			$api_server=$db->api_server;
			$api_whatsapp=$db->api_whatsapp;
			$wa_konfbayar_awal=$db->wa_konfbayar_awal;
			$wa_konfbayar_akhir=$db->wa_konfbayar_akhir;
			$email=$db->email;
			$email_subject=$db->email_subject;
			$email_port=$db->email_port;
			$email_host=$db->email_host;
			$email_pass=$db->email_pass;
		}


		$datainsert["iduniq"]=$iduniq;
		$datainsert["urlpayment"]=$urlpayment;
		$datainsert["tanggal"]=date('Y-m-d h:i:s');
		$datainsert["sid"]=$sid;
		$datainsert["price"]=$price;
		$insertsiswa= $this->m_aplikasi->InsertData("siswa_bayar",$datainsert);
		if($insertsiswa)
		{
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
	        $this->email->subject('Pembayaran Pendaftaran');
	        $this->email->message($wa_konfbayar_awal." \nNama : ".$buyer_name."\nUnit Daftar : ".$jenjang."\nTotal Bayar : Rp.".number_format($price)."\nLink Pembayaran : ".$urlpayment."\n".$wa_konfbayar_akhir." ");
	        $this->email->send();
				$output['hasil']=1;
	        	$output['pesan']='Silahkan melakukan pembayaran biaya pendaftaran';  
	        	$output['iduniq']=$iduniq;  
		}else{
				$output['hasil']=0;
	        	$output['pesan']='Error';  
		}
		$curl = curl_init();
		
		$token = $api_whatsapp;
		$data = [
		    'phone' => $buyer_phone,
		    'message' => $wa_konfbayar_awal." \nNama : ".$buyer_name."\nUnit Daftar : ".$jenjang."\nTotal Bayar : Rp.".number_format($price)."\nLink Pembayaran : ".$urlpayment."\n".$wa_konfbayar_akhir."",
		];

		curl_setopt($curl, CURLOPT_HTTPHEADER,
		    array(
		        "Authorization: $token",
		    )
		);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($curl, CURLOPT_URL, $api_server."/api/send-message");
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		$result = curl_exec($curl);
		curl_close($curl);

		// echo "<pre>";
		print_r($result);
	}
	public function kirimotp()
	{
		$otp = $this->input->post("otp");
		$nomor = $this->input->post("nomor");
		$status = "0";
		
		$data_siswa_whatsapp = $this->m_siswa->listing(" WHERE whatsapp='$nomor'");
		if(count($data_siswa_whatsapp)>0)
		{
			$output['hasil']=0;
			$output['pesan']='Nomor anda sudah terdaftar di sistem'; 
		}else{
			$data_sistem = $this->m_konfigurasi->listing();
			foreach ($data_sistem as $db) {
				$api_server=$db->api_server;
				$api_whatsapp=$db->api_whatsapp;
				$wa_otp=$db->wa_otp;
				$wa_konfbayar_awal=$db->wa_konfbayar_awal;
				$wa_konfbayar_akhir=$db->wa_konfbayar_akhir;
			}
			$datainsert["otp"]=$otp;
			$datainsert["nomor"]=$nomor;
			$datainsert["status"]=$status;

			$insertsiswa= $this->m_aplikasi->InsertData("siswa_otp",$datainsert);

			$curl = curl_init();
			
			$token = $api_whatsapp;
			$data = [
				'phone' => $nomor,
				'message' => $wa_otp." ".$otp."",
			];

			curl_setopt($curl, CURLOPT_HTTPHEADER,
				array(
					"Authorization: $token",
				)
			);
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
			curl_setopt($curl, CURLOPT_URL, $api_server."/api/send-message");
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
			$result = curl_exec($curl);
			curl_close($curl);
			// echo "<pre>";
			// print_r($result);
			$output['hasil']=1;
			$output['pesan']='Success';  
		}
		echo json_encode($output);
	}
	public function konfirmotp()
	{
		$otp = $this->input->post("otp");
		$nomor = $this->input->post("nomor");
		$status = "1";
		
		$datainsert["status"]=$status;
		$where["otp"]=$otp;
		$where["nomor"]=$nomor;

		$statotp = $this->m_user->listingotp("WHERE otp='$otp' AND nomor='$nomor' ");
		if(count($statotp)>0)
		{
			$insertsiswa= $this->m_aplikasi->UpdateData("siswa_otp",$datainsert,$where);
			if($insertsiswa)
			{
				$output['hasil']=1;
				$output['pesan']='Success'; 
			}else{
				$output['hasil']=0;
				$output['pesan']='Error';  
			}
		}else{
			$output['hasil']=0;
				$output['pesan']='Error';  
		}
		
		echo json_encode($output);
	}
	public function pengumuman_simpan()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="Jenjang"))
		{
			$iduniq = $this->input->post("id_uniq");
			$id_pengumuman = $this->input->post("id_pengumuman");
			$status = $this->input->post("status_lulus");
			$whatsapp = $this->input->post("whatsapp");
			
			$data_sistem = $this->m_konfigurasi->listing();
			foreach ($data_sistem as $db) {
                $api_server=$db->api_server;
				$api_whatsapp=$db->api_whatsapp;
				$wa_lulus=$db->wa_lulus;
				$wa_tidak_lulus=$db->wa_tidak_lulus;
				$wa_cadangan=$db->wa_cadangan;
			}

			$datainsert["status"]=$status;
			$datainsert["iduniq"]=$iduniq;
			if($status=="Lulus"){
				$message=$wa_lulus;
			}else if($status=="Tidak Lulus"){
				$message=$wa_tidak_lulus;
			}else if($status=="Cadangan"){
				$message=$wa_cadangan;
			}
			if($id_pengumuman<>""){
				$where["id"]=$id_pengumuman;
				$insertsiswa = $this->m_aplikasi->UpdateData("siswa_pengumuman",$datainsert,$where);
			}else{
				$insertsiswa = $this->m_aplikasi->InsertData("siswa_pengumuman",$datainsert);
			}
			
			if($insertsiswa)
			{
				$curl = curl_init();
					$token = $api_whatsapp;
					$data = [
					    'phone' => $whatsapp,
					    'message' => $message,
					];

					curl_setopt($curl, CURLOPT_HTTPHEADER,
					    array(
					        "Authorization: $token",
					    )
					);
					curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
					curl_setopt($curl, CURLOPT_URL, $api_server."/api/send-message");
					curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
					$result = curl_exec($curl);
					curl_close($curl);

					// echo "<pre>";
					// print_r($result);
			
				
				$output['hasil']=1;
		        $output['pesan']='Data Pengumuman Sudah di update';  
			}else{
				$output['hasil']=0;
		        $output['pesan']='Error';  
			}
			echo json_encode($output);
		}else{
			redirect("loginsantri");
		}
		
	}

	public function santri()
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
			$page="Calon Santri";

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
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;

			$this->load->view("santri",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function santri_detail($id_uniq)
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
			$page="Calon Santri";

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
			$data_jenjang = $this->m_jenjang->listing();
			
			$footer = $this->load->view("pubs/footer-admin",$datapub,TRUE);
			$sidebar = $this->load->view("pubs/sidebar",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar",$datapub,TRUE);
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;
			$datapub["id_uniq"]=$id_uniq;
			$datapub["data_jenjang"]=$data_jenjang;

			$this->load->view("santri_detail",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function santri_detail_cetak($id_uniq)
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
			$page="Calon Santri";

			$datapub["page"]=$page;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;

			$datapub["id_uniq"]=$id_uniq;

			$this->load->view("santri_detail_cetak",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function profile_santri()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="Jenjang"))
		{
			$id_uniq=$this->input->post('id_uniq');
		    $data_siswa=$this->m_siswa->listing(" WHERE id_uniq='$id_uniq'");
		    $X = array('hasildata'=>$data_siswa);               
		    echo json_encode($X);
		}else{
			redirect("home/login");
		}
	}
	public function pembayaran()
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
			$page="Data Pembayaran";

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
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;

			$this->load->view("pembayaran",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function konfirm_manual()
	{
	    $logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="Jenjang"))
		{   
		    $id_user = $this->session->userdata("id");
		    $id=$this->input->post("idbayar");
		    $data_siswa = $this->m_pembayaran->listing(" WHERE id='$id'");
		    if(count($data_siswa)>0){
		        foreach($data_siswa as $ds){
		            $iduniq =$ds->iduniq;
		        }
		    }
		    $data_insert["status"]="berhasil";
		    $data_insert["user"]=$id_user;
		    $data_insert["siswa"]=$iduniq;
		    $data_insert["tanggal"]=date('Y-m-d h:i:s');
		    
		    $data_update["status"]="berhasil";
		    
			$where['id']=$id;
			if($this->m_aplikasi->UpdateData("siswa_bayar",$data_update,$where)){
				$this->m_aplikasi->InsertData("siswa_bayar_history",$data_insert);
				$input['hasil']=1;
	            $input['pesan']='Data berhasil di update';
			}else{
				$input['hasil']=0;
	            $input['pesan']='Data gagal di hapus';
			}
			echo json_encode($input);
		}else{
			redirect("home/login");
		}
	}
	public function siswa_bayar_status()
	{
		$trx_id = $this->input->post("trx_id");
		$sid = $this->input->post("sid");
		$status = $this->input->post("status");
		
		$data_update["status"]=$status;
		$data_update["trx_id"]=$trx_id;
		$where["sid"]=$sid;

		$updatebayar = $this->m_aplikasi->UpdateData("siswa_bayar",$data_update,$where);
		
		$data_sistem = $this->m_konfigurasi->listing();
		foreach ($data_sistem as $db) {
			$api_server=$db->api_server;
			$api_whatsapp=$db->api_whatsapp;
			$wa_suksesbayar=$db->wa_suksesbayar;
		}


		$datainsert["tanggal"]=date('Y-m-d h:i:s');
		$datainsert["trx_id"]=$trx_id;
		$datainsert["sid"]=$sid;
		$datainsert["status"]=$status;
		$insertsiswa= $this->m_aplikasi->InsertData("siswa_bayar_history",$datainsert);
		$data_bayar = $this->m_siswa->listing_pembayaran(" WHERE trx_id = '$trx_id'");
		foreach ($data_bayar as $db) {
			$id_siswa = $db->iduniq;
		}

		if($insertsiswa)
		{
			if($status=="berhasil"){
				$data_siswa = $this->m_siswa->listing(" WHERE id_uniq = '$id_siswa'");
				foreach ($data_siswa as $db) {
					$whatsapp = $db->whatsapp;
				}
				$curl = curl_init();
				$token = $api_whatsapp;
				$data = [
				    'phone' => $whatsapp,
				    'message' => $wa_suksesbayar,
				];

				curl_setopt($curl, CURLOPT_HTTPHEADER,
				    array(
				        "Authorization: $token",
				    )
				);
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
				curl_setopt($curl, CURLOPT_URL, $api_server."/api/send-message");
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
				$result = curl_exec($curl);
				curl_close($curl);

				// echo "<pre>";
				//print_r($result);
			}
			
			$output['hasil']=1;
	        $output['pesan']='Silahkan melakukan pembayaran biaya pendaftaran';  
		}else{
			$output['hasil']=0;
	        $output['pesan']='Error';  
		}
		echo json_encode($output);
	}
	public function update_santri()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="Jenjang"))
		{
			$id_uniq = $this->input->post("id_uniq");
			$nama = $this->input->post("nama");
			$nik = $this->input->post("nik");
			$nisn = $this->input->post("nisn");
			$no_kk = $this->input->post("no_kk");
			$jenjang = $this->input->post("jenjang");
			$jenis_kelamin = $this->input->post("jenis_kelamin");
			$tempat_lahir = $this->input->post("tempat_lahir");
			$tanggal_lahir = $this->input->post("tanggal_lahir");
			$alamat = $this->input->post("alamat");
			$kode_pos = $this->input->post("kode_pos");
			$sekolah_asal = $this->input->post("sekolah_asal");
			$hobi = $this->input->post("hobi");
			$whatsapp = $this->input->post("whatsapp");
			$email = $this->input->post("email");
			
			$where["id_uniq"]=$id_uniq;
			$datainsert["nama"]=$nama;
			$datainsert["nik"]=$nik;
			$datainsert["nisn"]=$nisn;
			$datainsert["no_kk"]=$no_kk;
			$datainsert["jenjang"]=$jenjang;
			$datainsert["jenis_kelamin"]=$jenis_kelamin;
			$datainsert["tempat_lahir"]=$tempat_lahir;
			$datainsert["tanggal_lahir"]=substr($tanggal_lahir, 6,4)."-".substr($tanggal_lahir, 3,2)."-".substr($tanggal_lahir, 0,2);
			$datainsert["alamat"]=$alamat;
			$datainsert["kode_pos"]=$kode_pos;
			$datainsert["sekolah_asal"]=$sekolah_asal;
			$datainsert["hobi"]=$hobi;
			$datainsert["whatsapp"]=$whatsapp;
			$datainsert["email"]=$email;

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
		        if($id_uniq<>""){
					$where['id_uniq']=$id_uniq;
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
				if($id_uniq<>""){
					$where['id_uniq']=$id_uniq;
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
	public function update_orangtua()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="Jenjang"))
		{
			$id = $this->input->post("id_orangtua");
			$iduniq = $this->input->post("id_uniq_orangtua");
			$nik_ayah = $this->input->post("nik_ayah");
			$nama_ayah = $this->input->post("nama_ayah");
			$tmp_lhr_ayah = $this->input->post("tmp_lhr_ayah");
			$tgl_lhr_ayah = $this->input->post("tgl_lhr_ayah");
			$pend_ayah = $this->input->post("pend_ayah");
			$pkjn_ayah = $this->input->post("pekerjaan_ayah");
			$pkjn_ayah_lain = $this->input->post("pekerjaan_ayah_lainnya");
			$nomor_ayah = $this->input->post("nomor_ayah");
			$penghasilan_ayah = $this->input->post("penghasilan_ayah");
			$nik_ibu = $this->input->post("nik_ibu");
			$nama_ibu = $this->input->post("nama_ibu");
			$tmp_lhr_ibu = $this->input->post("tmp_lhr_ibu");
			$tgl_lhr_ibu = $this->input->post("tgl_lhr_ibu");
			$pend_ibu = $this->input->post("pend_ibu");
			$pkjn_ibu = $this->input->post("pekerjaan_ibu");
			$pkjn_ibu_lain = $this->input->post("pekerjaan_ibu_lainnya");
			$nomor_ibu = $this->input->post("nomor_ibu");
			$penghasilan_ibu = $this->input->post("penghasilan_ibu");

			
			$where["id"]=$id;
			$datainsert["iduniq"]=$iduniq;
			$datainsert["nama_ayah"]=$nama_ayah;
			$datainsert["pend_ayah"]=$pend_ayah;
			$datainsert["pekerjaan_ayah"]=$pkjn_ayah;
			$datainsert["pekerjaan_ayah_lain"]=$pkjn_ayah_lain;
			$datainsert["nik_ayah"]=$nik_ayah;
			$datainsert["tmp_lhr_ayah"]=$tmp_lhr_ayah;
			$datainsert["tgl_lhr_ayah"]=substr($tgl_lhr_ayah, 6,4)."-".substr($tgl_lhr_ayah, 3,2)."-".substr($tgl_lhr_ayah, 0,2);
			$datainsert["nomor_ayah"]=$nomor_ayah;
			$datainsert["penghasilan_ayah"]=$penghasilan_ayah;
			$datainsert["nama_ibu"]=$nama_ibu;
			$datainsert["pend_ibu"]=$pend_ibu;
			$datainsert["pekerjaan_ibu"]=$pkjn_ibu;
			$datainsert["pekerjaan_ibu_lain"]=$pkjn_ibu_lain;
			$datainsert["nik_ibu"]=$nik_ibu;
			$datainsert["tmp_lhr_ibu"]=$tmp_lhr_ibu;
			$datainsert["tgl_lhr_ibu"]=substr($tgl_lhr_ibu, 6,4)."-".substr($tgl_lhr_ibu, 3,2)."-".substr($tgl_lhr_ibu, 0,2);
			$datainsert["nomor_ibu"]=$nomor_ibu;
			$datainsert["penghasilan_ibu"]=$penghasilan_ibu;
			
			if($id<>""){
				$where['id']=$id;
				if($this->m_aplikasi->UpdateData('siswa_orangtua',$datainsert,$where)){
					$input['hasil']=1;
			        $input['pesan']='Data berhasil di update';
				}else{
					$input['hasil']=0;
			        $input['pesan']='Data gagal di update';
				}
			}else{
				if($this->m_aplikasi->InsertData("siswa_orangtua",$datainsert)){
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

	public function report()
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
			$page="Report";

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
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;

			$this->load->view("report",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function report_jurusan()
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
			$page="Report Jurusan";

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

			$jenjang = $this->m_jenjang->listing();

			$footer = $this->load->view("pubs/footer-admin",$datapub,TRUE);
			$sidebar = $this->load->view("pubs/sidebar",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar",$datapub,TRUE);
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;
			$datapub["data_jurusan"]=$jenjang;

			$this->load->view("report_jurusan",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function report_lulus()
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
			$page="Report Lulus";

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
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;

			$this->load->view("report_lulus",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function report_bayar()
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
			$page="Report Pembayaran";

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
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;

			$this->load->view("report_bayar",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function setprofil()
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
			$page="Profil Sekolah";

			$datapub["page"]=$page;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;

			$data_profil = $this->m_aplikasi->GetProfilSekolah();
			if(count($data_profil)>0)
			{
				foreach ($data_profil as $db) {
					$datapub["id"]=$db->id;
					$datapub["nama"]=$db->nama;
					$datapub["logo"]=$db->logo;
					$datapub["alamat"]=$db->alamat;
					$datapub["telp"]=$db->telp;
					$datapub["email"]=$db->email;
				}
			}
			
			
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

			
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;

			$this->load->view("setprofil",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function setprofil_update()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator"))
		{
			$id = $this->input->post("id");
			$nama = $this->input->post("nama");
			$telp = $this->input->post("telp");
			$email = $this->input->post("email");
			$alamat = $this->input->post("alamat");
			
			$datainsert["nama"]=$nama;
			$datainsert["telp"]=$telp;
			$datainsert["email"]=$email;
			$datainsert["alamat"]=$alamat;
			
			$namastr = "logo_";
			$unikimg= date('Ymdhis');
			if($_FILES['logo']['size'] != 0 ){
				$config['upload_path'] = './upload/logo';
	            $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
	            $config['file_name'] = "logo_".$unikimg;
	            $config['max_size']     = '1000';
	            $config['overwrite']     = TRUE;

	            $this->load->library('upload', $config);
				$this->upload->initialize($config);

	            if(!$this->upload->do_upload('logo')){
	               	$hasil="success";
					echo json_encode($hasil);
	            } else {
	            	$data = array('upload_data' => $this->upload->data());
					$eks = explode('.', $_FILES['logo']['name']);
					$eks = $eks[count($eks)-1];
	               	$datainsert["logo"]="logo_".$unikimg.".".$eks;
	            }
		        if($id<>""){
					$where['id']=$id;
					if($this->m_aplikasi->UpdateData('profil_sekolah',$datainsert,$where)){
						$input['hasil']=1;
						$input['pesan']='Data berhasil di update';
					}else{
						$input['hasil']=0;
						$input['pesan']='Data gagal di update';
					}
				}else{
					if($this->m_aplikasi->InsertData("profil_sekolah",$datainsert)){
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
					if($this->m_aplikasi->UpdateData('profil_sekolah',$datainsert,$where)){
						$input['hasil']=1;
						$input['pesan']='Data berhasil di update';
					}else{
						$input['hasil']=0;
						$input['pesan']='Data gagal di update';
					}
				}else{
					if($this->m_aplikasi->InsertData("profil_sekolah",$datainsert)){
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
	public function setprice()
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
			$page="Pengaturan Biaya";

			$datapub["page"]=$page;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;

			$data_biaya = $this->m_biaya->listing_biaya();
			if(count($data_biaya)>0)
			{
				foreach ($data_biaya as $db) {
					$id=$db->id;
					$biaya=$db->biaya;
					$datapub["id"]=$id;
					$datapub["biaya"]=$biaya;
				}
			}
			
			
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

			
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;

			$this->load->view("setprice",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function setprice_update($value='')
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator"))
		{
			$id = $this->input->post("id");
			$biaya = $this->input->post("biaya");
			
			$datainsert["biaya"]=$biaya;
			
			
			if($id<>""){
				$where['id']=$id;
				if($this->m_aplikasi->UpdateData('biaya',$datainsert,$where)){
					$input['hasil']=1;
			        $input['pesan']='Data berhasil di update';
				}else{
					$input['hasil']=0;
			        $input['pesan']='Data gagal di update';
				}
			}else{
				if($this->m_aplikasi->InsertData("biaya",$datainsert)){
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
	public function setsistem()
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
			$page="Pengaturan Sistem";

			$datapub["page"]=$page;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;

			$data_sistem = $this->m_konfigurasi->listing();
			foreach ($data_sistem as $db) {
				$id=$db->id;
				$apiserver=$db->api_server;
				$apiwa=$db->api_whatsapp;
				$apiipaymu=$db->api_ipaymu;
				$email=$db->email;
				$email_subject=$db->email_subject;
				$email_host=$db->email_host;
				$email_port=$db->email_port;
				$email_user=$db->email_user;
				$email_pass=$db->email_pass;
				$wa_lulus=$db->wa_lulus;
				$wa_tidak_lulus=$db->wa_tidak_lulus;
				$wa_cadangan=$db->wa_cadangan;
				$wa_konfbayar_awal=$db->wa_konfbayar_awal;
				$wa_konfbayar_akhir=$db->wa_konfbayar_akhir;
				$wa_suksesbayar=$db->wa_suksesbayar;
			}

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
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;
			$datapub["id"]=$id;
			$datapub["apiserver"]=$apiserver;
			$datapub["apiwa"]=$apiwa;
			$datapub["apiipaymu"]=$apiipaymu;
			$datapub["email"]=$email;
			$datapub["email_subject"]=$email_subject;
			$datapub["email_host"]=$email_host;
			$datapub["email_port"]=$email_port;
			$datapub["email_user"]=$email_user;
			$datapub["email_pass"]=$email_pass;
			$datapub["wa_lulus"]=$wa_lulus;
			$datapub["wa_tidak_lulus"]=$wa_tidak_lulus;
			$datapub["wa_cadangan"]=$wa_cadangan;
			$datapub["wa_konfbayar_awal"]=$wa_konfbayar_awal;
			$datapub["wa_konfbayar_akhir"]=$wa_konfbayar_akhir;
			$datapub["wa_suksesbayar"]=$wa_suksesbayar;

			$this->load->view("setsistem",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function setnomor()
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
			$page="Pengaturan Nomor Peserta";

			$datapub["page"]=$page;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;

			$data_sistem = $this->m_konfigurasi->listing();
			foreach ($data_sistem as $db) {
				$id=$db->id;
				$nomor_daftar=$db->nomor_daftar;
			}

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
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;
			$datapub["id"]=$id;
			$datapub["nomor_daftar"]=$nomor_daftar;

			$this->load->view("setnomor",$datapub);
		}else{
			redirect("home/login");
		}
	}

	public function setnomor_update()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator"))
		{
			$id = $this->input->post("id");
			$nomor_daftar = $this->input->post("nomor_daftar");


			$datainsert["nomor_daftar"]=$nomor_daftar;
			if($id<>""){
				$where['id']=$id;
				if($this->m_aplikasi->UpdateData('konfigurasi_sistem',$datainsert,$where)){
					$input['hasil']=1;
			        $input['pesan']='Data berhasil di update';
				}else{
					$input['hasil']=0;
			        $input['pesan']='Data gagal di update';
				}
			}else{
				if($this->m_aplikasi->InsertData("konfigurasi_sistem",$datainsert)){
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
	public function setopenppdb()
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
			$page="Pengaturan Buka PPDB";

			$datapub["page"]=$page;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;

			$data_open = $this->m_jadwal->listingopenppdn();
			if(count($data_open)>0)
			{
				foreach ($data_open as $do) {
					$datapub["id"]=$do->id;
					$datapub["tgl_buka"]=$do->tgl_buka_format;
					$datapub["tgl_tutup"]=$do->tgl_tutup_format;
				}
			}else{
					$datapub["id"]="";
					$datapub["tgl_buka"]="";
					$datapub["tgl_tutup"]="";
			}

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
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;
			

			$this->load->view("setopenppdb",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function setsistemppdb_update()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator"))
		{
			$id = $this->input->post("id");
			$tgl_buka = $this->input->post("tgl_buka");
			$tgl_tutup = $this->input->post("tgl_tutup");


			$datainsert["tgl_buka"]=substr($tgl_buka, 6,4)."-".substr($tgl_buka, 3,2)."-".substr($tgl_buka, 0,2);
			$datainsert["tgl_tutup"]=substr($tgl_tutup, 6,4)."-".substr($tgl_tutup, 3,2)."-".substr($tgl_tutup, 0,2);
			if($id<>""){
				$where['id']=$id;
				if($this->m_aplikasi->UpdateData('setting_buka',$datainsert,$where)){
					$input['hasil']=1;
			        $input['pesan']='Data berhasil di update';
				}else{
					$input['hasil']=0;
			        $input['pesan']='Data gagal di update';
				}
			}else{
				if($this->m_aplikasi->InsertData("setting_buka",$datainsert)){
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
	public function setsistemapi_update()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator"))
		{
			$id = $this->input->post("id");
			$api_server = $this->input->post("api_server");
			$api_ipaymu = $this->input->post("api_ipaymu");
			$api_whatsapp = $this->input->post("api_whatsapp");

			$datainsert["api_server"]=$api_server;
			$datainsert["api_ipaymu"]=$api_ipaymu;
			$datainsert["api_whatsapp"]=$api_whatsapp;
			if($id<>""){
				$where['id']=$id;
				if($this->m_aplikasi->UpdateData('konfigurasi_sistem',$datainsert,$where)){
					$input['hasil']=1;
			        $input['pesan']='Data berhasil di update';
				}else{
					$input['hasil']=0;
			        $input['pesan']='Data gagal di update';
				}
			}else{
				if($this->m_aplikasi->InsertData("konfigurasi_sistem",$datainsert)){
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
	public function setsistemwhatsapp_update()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator"))
		{
			$id = $this->input->post("id");
			$wa_lulus = $this->input->post("wa_lulus");
			$wa_tidak_lulus = $this->input->post("wa_tidak_lulus");
			$wa_cadangan = $this->input->post("wa_cadangan");
			$wa_konfbayar_awal = $this->input->post("wa_konfbayar_awal");
			$wa_konfbayar_akhir = $this->input->post("wa_konfbayar_akhir");
			$wa_suksesbayar = $this->input->post("wa_suksesbayar");


			$datainsert["wa_lulus"]=$wa_lulus;
			$datainsert["wa_tidak_lulus"]=$wa_tidak_lulus;
			$datainsert["wa_cadangan"]=$wa_cadangan;
			$datainsert["wa_konfbayar_awal"]=$wa_konfbayar_awal;
			$datainsert["wa_konfbayar_akhir"]=$wa_konfbayar_akhir;
			$datainsert["wa_suksesbayar"]=$wa_suksesbayar;
			if($id<>""){
				$where['id']=$id;
				if($this->m_aplikasi->UpdateData('konfigurasi_sistem',$datainsert,$where)){
					$input['hasil']=1;
			        $input['pesan']='Data berhasil di update';
				}else{
					$input['hasil']=0;
			        $input['pesan']='Data gagal di update';
				}
			}else{
				if($this->m_aplikasi->InsertData("konfigurasi_sistem",$datainsert)){
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

	public function setsistememail_update()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator"))
		{
			$id = $this->input->post("id");
			$email = $this->input->post("email");
			$email_subject = $this->input->post("email_subject");
			$email_host = $this->input->post("email_host");
			$email_port = $this->input->post("email_port");
			$email_pass = $this->input->post("email_pass");


			$datainsert["email"]=$email;
			$datainsert["email_subject"]=$email_subject;
			$datainsert["email_host"]=$email_host;
			$datainsert["email_port"]=$email_port;
			$datainsert["email_pass"]=$email_pass;
			if($id<>""){
				$where['id']=$id;
				if($this->m_aplikasi->UpdateData('konfigurasi_sistem',$datainsert,$where)){
					$input['hasil']=1;
			        $input['pesan']='Data berhasil di update';
				}else{
					$input['hasil']=0;
			        $input['pesan']='Data gagal di update';
				}
			}else{
				if($this->m_aplikasi->InsertData("konfigurasi_sistem",$datainsert)){
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
	public function jadwal()
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
			$data_akun = $this->m_user->listing(" WHERE id='$idakun'");
			if(count($data_akun)>0)
			{
				foreach($data_akun as $da){
					$datapub["nama_akun"]=$da->username;
				}
			}
			$data_jenjang = $this->m_jenjang->listing();

			$datapub["page"]=$page;
			$datapub["nama_app"]=$nama_app;
			$datapub["instansi"]=$instansi;
			$datapub["tahun"]=$tahun;
			$datapub["logo"]=$logo;
			$datapub["data_jenjang"]=$data_jenjang;

			
			$footer = $this->load->view("pubs/footer-admin",$datapub,TRUE);
			$sidebar = $this->load->view("pubs/sidebar",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar",$datapub,TRUE);

			
			
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;

			$this->load->view("jadwal",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function settahun()
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
			$page="Tahun Akademik";

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
			$data_jenjang = $this->m_jenjang->listing();
			if(count($data_jenjang)>0)
			{
				$datapub["jenjang"]=$data_jenjang;
			}

			$footer = $this->load->view("pubs/footer-admin",$datapub,TRUE);
			$sidebar = $this->load->view("pubs/sidebar",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar",$datapub,TRUE);

			
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;
			
			$this->load->view("settahun",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function data_list_tahun()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$list = $this->m_tahun->get_datatables();
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->tahun;
		      $row[] = $l->status;
		      $row[] = "<div style='text-align: center;'>
		      				<button onclick='updateTahun(".$l->id.")' class='btn btn-warning btn-sm'><span class='fa fa-edit'></span></button>
		      				<button onclick='hapusTahun(".$l->id.")' class='btn btn-danger btn-sm'><span class='fa fa-trash'></span></button>
		      			</div>";
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_tahun->count_all(),
		     "recordsFiltered" => $this->m_tahun->count_filtered(),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
    }

    public function data_simpan_tahun()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$id = $this->input->post("id");
			$tahun = $this->input->post("tahun");
			$status = $this->input->post("status");
			
            $datainsert["tahun"]=$tahun;
			$datainsert["status"]=$status;


			if($id<>""){
				$where['id']=$id;
				$data_tahun_aktif = $this->m_tahun->listing(" WHERE id='$id' ");
				foreach($data_tahun_aktif as $dta){
					$status_exist = $dta->status;
					if($status_exist=="Aktif")
					{
						if($this->m_aplikasi->UpdateData('tahun_akademik',$datainsert,$where)){
							$input['hasil']=1;
							$input['pesan']='Data berhasil di update';
						}else{
							$input['hasil']=0;
							$input['pesan']='Data gagal di update';
						}
					}else{
						$data_tahun = $this->m_tahun->listing(" WHERE status='Aktif' ");
						if(count($data_tahun)>0){
							$input['hasil']=0;
							$input['pesan']='Maaf sudah ada tahun akademik aktif';
						}else{
							if($this->m_aplikasi->UpdateData('tahun_akademik',$datainsert,$where)){
								$input['hasil']=1;
								$input['pesan']='Data berhasil di update';
							}else{
								$input['hasil']=0;
								$input['pesan']='Data gagal di update';
							}
						}
					}
				}
			}else{
				if($status=="Aktif")
				{
					$data_tahun = $this->m_tahun->listing(" WHERE status='Aktif' ");
					if(count($data_tahun)>0){
						$input['hasil']=0;
						$input['pesan']='Maaf sudah ada tahun akademik aktif';
					}else{
						if($this->m_aplikasi->InsertData("tahun_akademik",$datainsert)){
							$input['hasil']=1;
							$input['pesan']='Data berhasil di simpan';  
						}else{
							$input['hasil']=0;
							$input['pesan']='Data gagal di simpan';
						};
					}
				}else{
					if($this->m_aplikasi->InsertData("tahun_akademik",$datainsert)){
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

    public function data_hapus_tahun()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$id=$this->input->post("id");
			
			$where['id']=$id;
			if($this->m_aplikasi->DeleteData("tahun_akademik",$where)){
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
	public function data_detail_tahun()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$id=$this->input->post('id');
		    $data_user=$this->m_tahun->listing("WHERE id='$id'");
		    $X = array('hasildata'=>$data_user);               
		    echo json_encode($X);  
		}else{
			redirect("home/login");
		}
	}
	public function setkelas()
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
			$page="Master Kelas";

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
			$data_jenjang = $this->m_jenjang->listing();
			if(count($data_jenjang)>0)
			{
				$datapub["jenjang"]=$data_jenjang;
			}

			$footer = $this->load->view("pubs/footer-admin",$datapub,TRUE);
			$sidebar = $this->load->view("pubs/sidebar",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar",$datapub,TRUE);

			
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;
			
			$this->load->view("setkelas",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function setjenjang()
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
			$page="Pengaturan Jenjang";

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

			
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;
			
			$this->load->view("setjenjang",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function syarat_administrasi()
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
			$page="Syarat Administrasi";

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

			
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;
			
			$this->load->view("syarat_administrasi",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function jadwal_daftar()
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
			$page="Jadwal Pendaftaran";

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

			
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;
			
			$this->load->view("jadwal_daftar",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function alur_daftar()
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
			$page="Alur Pendaftaran";

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

			
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;
			
			$this->load->view("alur_daftar",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function biaya_pendidikan()
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
			$page="Biaya Pendidikan";

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

			
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;
			
			$this->load->view("biaya_pendidikan",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function keringanan_biaya()
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
			$page="Keringanan Biaya";

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

			
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;
			
			$this->load->view("keringanan_biaya",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function kontak_daftar()
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
			$page="Kontak Pendaftaran";

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

			
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;
			
			$this->load->view("kontak_daftar",$datapub);
		}else{
			redirect("home/login");
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home/login');
	}
	
}