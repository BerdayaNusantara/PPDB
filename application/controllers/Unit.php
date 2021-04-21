<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class unit extends CI_Controller {

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
		$this->load->model("m_siswaunit");
		$this->load->model("m_pengumuman");
		$this->load->model("m_konfigurasi");
		$this->load->model("m_jadwalujianunit");
		$this->load->model("m_pesertaujian");
		$this->load->model("m_setjadwal");
		$this->load->model("m_jenjang");
		$this->load->model("m_kelas");
	}
	public function index()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if($logged=="yes")
		{

			if($level=="Administrator"){
				redirect("backoffice");	
			}elseif ($level=="Jenjang") {
				redirect("unit/dashboard");
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
		if(($logged=="yes")&&($level=="Jenjang"))
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

			$data_akun = $this->m_user->listing(" WHERE id='$idakun'");
			if(count($data_akun)>0)
			{
				foreach($data_akun as $da){
					$datapub["nama_akun"]=$da->username;
					$datapub["jenjang"]=$da->jenjang;
					$jenjang=$da->jenjang;
					$data_jenjang = $this->m_jenjang->listing(" WHERE id='$da->jenjang'");
					if(count($data_jenjang)>0)
					{
						foreach($data_jenjang as $dj)
						{
							$datapub["nama_jenjang"]=$dj->nama;
						}
					}
				}
			}

			$data_siswa = $this->m_siswa->listing_count_all(" WHERE jenjang='$jenjang'");
			$data_pembayaran_berhasil = $this->m_pembayaran->listing_jumlah_view(" WHERE status='berhasil' and jenjang='$jenjang'");
			$data_pembayaran_pending = $this->m_pembayaran->listing_jumlah_view(" WHERE jenjang='$jenjang' and status='pending' OR status='' ");
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
			
			$footer = $this->load->view("pubs/footer-admin",$datapub,TRUE);
			$sidebar = $this->load->view("pubs/sidebar-unit",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar",$datapub,TRUE);
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;
			$datapub["jumlah_siswa"]=$jumlah_siswa;
			$datapub["jumlah_berhasil"]=$jumlah_berhasil;
			$datapub["jumlah_pending"]=$jumlah_pending;
			$datapub["charts_jenjang"]=json_encode($datachartjen);

			$this->load->view("unit/dashboard",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function siswa()
	{
		$idakun = $this->session->userdata("id");
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Jenjang"))
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
			$sidebar = $this->load->view("pubs/sidebar-unit",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar",$datapub,TRUE);
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;

			$this->load->view("unit/siswa",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function data_siswa()
	{
		$idakun = $this->session->userdata("id");
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Jenjang"))
		{
			$data_akun = $this->m_user->listing(" WHERE id='$idakun'");
			if(count($data_akun)>0)
			{
				foreach($data_akun as $da){
					$datapub["nama_akun"]=$da->username;
					$datapub["jenjang"]=$da->jenjang;
					$jenjang=$da->jenjang;
					$data_jenjang = $this->m_jenjang->listing(" WHERE id='$da->jenjang'");
					if(count($data_jenjang)>0)
					{
						foreach($data_jenjang as $dj)
						{
							$datapub["nama_jenjang"]=$dj->nama;
						}
					}
				}
			}
			$list = $this->m_siswaunit->get_datatables($jenjang);
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
		      $row[] = "<div style='text-align: center;'>
		      				<a href=".base_url()."unit/siswa_detail/".$l->id_uniq." class='btn btn-success btn-sm'><span class='fa fa-eye'></span></a>
		      				<button onclick='hapusUser(".$l->id.")' class='btn btn-danger btn-sm'><span class='fa fa-trash'></span></button>
		      				
		      				<button onclick='updateUser(".$l->id.")' class='btn btn-warning btn-sm'><span class='fa fa-edit'></span></button>
		      			</div>";
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_siswaunit->count_all($jenjang),
		     "recordsFiltered" => $this->m_siswaunit->count_filtered($jenjang),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
	}
	public function siswa_detail($id_uniq)
	{
		$idakun = $this->session->userdata("id");
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Jenjang"))
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
			$sidebar = $this->load->view("pubs/sidebar-unit",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar",$datapub,TRUE);
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;
			$datapub["id_uniq"]=$id_uniq;
			$datapub["data_jenjang"]=$data_jenjang;

			$this->load->view("unit/santri_detail",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function data_prestasi($value='')
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
		{
			$id = $this->input->post("id");
			$iduniq = $this->input->post("iduniq");
			$list = $this->m_prestasi->get_datatables($iduniq);
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->prestasi;
		      if((substr($l->file,-4)=='.PDF')||(substr($l->file,-4)=='.pdf')){
		      	$row[]= "<a href='".base_url()."/upload/santri/".$l->file."' target='_blank' class='btn btn-sm btn-success'><span class='fa fa-download'></span> Lihat File</a>";
		      }else{
		      	$row[]= "<img src='".base_url()."/upload/santri/".$l->file."' width=100/>";
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
	public function profile_santri()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
		{
			$id_uniq=$this->input->post('id_uniq');
		    $data_siswa=$this->m_siswa->listing(" WHERE id_uniq='$id_uniq'");
		    $X = array('hasildata'=>$data_siswa);               
		    echo json_encode($X);
		}else{
			redirect("home/login");
		}
	}
	public function data_orangtua()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
		{
			$iduniq = $this->input->post("iduniq");
		    $data_user=$this->m_siswa->listing_orangtua("WHERE iduniq='$iduniq'");
		    $X = array('hasildata'=>$data_user);               
		    echo json_encode($X);  
		}else{
			redirect("home/login");
		}
	}
	public function update_orangtua()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
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
	public function update_santri()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
		{
			$id_uniq = $this->input->post("id_uniq");
			$nama = $this->input->post("nama");
			$jenis_kelamin = $this->input->post("jenis_kelamin");
			$nisn = $this->input->post("nisn");
			$nik = $this->input->post("nik");
			$tempat_lahir = $this->input->post("tempat_lahir");
			$tanggal_lahir = $this->input->post("tanggal_lahir");
			$alamat = $this->input->post("alamat");
			$sekolah_asal = $this->input->post("sekolah_asal");
			$punya_saudara = $this->input->post("punya_saudara");
			$jenjang_saudara = $this->input->post("jenjang_saudara");
			$ukuran_seragam = $this->input->post("ukuran_seragam");
			$hobi = $this->input->post("hobi");
			$riwayat_penyakit = $this->input->post("riwayat_penyakit");
			$email = $this->input->post("email");
			$whatsapp = $this->input->post("whatsapp");
			
			$where["id_uniq"]=$id_uniq;
			$datainsert["nama"]=$nama;
			$datainsert["nisn"]=$nisn;
			$datainsert["nik"]=$nik;
			$datainsert["jenis_kelamin"]=$jenis_kelamin;
			$datainsert["tempat_lahir"]=$tempat_lahir;
			$datainsert["tanggal_lahir"]=substr($tanggal_lahir, 6,4)."-".substr($tanggal_lahir, 3,2)."-".substr($tanggal_lahir, 0,2);
			$datainsert["alamat"]=$alamat;
			$datainsert["sekolah_asal"]=$sekolah_asal;
			$datainsert["punya_saudara"]=$punya_saudara;
			$datainsert["jenjang_saudara"]=$jenjang_saudara;
			$datainsert["ukuran_seragam"]=$ukuran_seragam;
			$datainsert["hobi"]=$hobi;
			$datainsert["riwayat_penyakit"]=$riwayat_penyakit;
			$datainsert["email"]=$email;
			$datainsert["whatsapp"]=$whatsapp;

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
	public function simpan_prestasi()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
		{
			$id = $this->input->post("id");
			$iduniq = $this->input->post("iduniq");
			$prestasi = $this->input->post("prestasi");
			
			$where["id"]=$id;
			$datainsert["prestasi"]=$prestasi;
			$datainsert["iduniq"]=$iduniq;
			
			$namastr = "Prestasi_".str_replace(' ', '_', $prestasi);
			$unikimg= date('Ymdhis');
			if($_FILES['foto']['size'] != 0 ){
				$config['upload_path'] = './upload/santri';
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

	public function dokumen_kartu_keluarga()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
		{
			$id_uniq = $this->input->post('id_uniq');
			$nisn=$this->input->post('nisn');
		
			if(!empty($_FILES['kartu_keluarga']['name'])){
				$config['file_name']= "kartu_keluarga_".$nisn;
				$config['upload_path']='./upload/santri';
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
		if(($logged=="yes")&&($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
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
		if(($logged=="yes")&&($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
		{
			$id_uniq = $this->input->post('id_uniq');
			$nisn=$this->input->post('nisn');
		
			if(!empty($_FILES['kartu_identitas']['name'])){
				$config['file_name']= "kartu_identitas_".$nisn;
				$config['upload_path']='./upload/santri';
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
		if(($logged=="yes")&&($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
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
		if(($logged=="yes")&&($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
		{
			$id_uniq = $this->input->post('id_uniq');
			$nisn=$this->input->post('nisn');
		
			if(!empty($_FILES['rapor']['name'])){
				$config['file_name']= "rapor_".$nisn;
				$config['upload_path']='./upload/santri';
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
		if(($logged=="yes")&&($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
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
		if(($logged=="yes")&&($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
		{
			$id_uniq = $this->input->post('id_uniq');
			$nisn=$this->input->post('nisn');
		
			if(!empty($_FILES['akta_kelahiran']['name'])){
				$config['file_name']= "akta_kelahiran_".$nisn;
				$config['upload_path']='./upload/santri';
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
		if(($logged=="yes")&&($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
		{
			$id=$this->input->post('id');
			$data_calon = $this->m_siswa->listing_dokumen(" WHERE iduniq='$id' AND type='Akta Kelahiran' ");
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
		if(($logged=="yes")&&($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
		{
			$id_uniq = $this->input->post('id_uniq');
			$nisn=$this->input->post('nisn');
		
			if(!empty($_FILES['skhun']['name'])){
				$config['file_name']= "skhun_".$nisn;
				$config['upload_path']='./upload/santri';
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
		if(($logged=="yes")&&($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
		{
			$id=$this->input->post('id');
			$data_calon = $this->m_siswa->listing_dokumen(" WHERE iduniq='$id' AND type='SKHUN' ");
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
		if(($logged=="yes")&&($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
		{
			$id_file = $this->input->post("id_file");
			$nisn = $this->input->post("nisn");
			$file = $this->m_siswa->listing_dokumen(" WHERE id='$id_file'");
			foreach ($file as $f) {
				unlink("upload/santri/".$f->file);
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
	public function pembayaran()
	{
		$idakun = $this->session->userdata("id");
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Jenjang"))
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
					$datapub["jenjang"]=$da->jenjang;
					$jenjang=$da->jenjang;
					$data_jenjang = $this->m_jenjang->listing(" WHERE id='$da->jenjang'");
					if(count($data_jenjang)>0)
					{
						foreach($data_jenjang as $dj)
						{
							$datapub["nama_jenjang"]=$dj->nama;
						}
					}
				}
			}


			$footer = $this->load->view("pubs/footer-admin",$datapub,TRUE);
			$sidebar = $this->load->view("pubs/sidebar-unit",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar",$datapub,TRUE);
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;

			$this->load->view("unit/pembayaran",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function data_pembayaran()
	{
		$idakun = $this->session->userdata("id");
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Jenjang"))
		{
			$data_akun = $this->m_user->listing(" WHERE id='$idakun'");
			if(count($data_akun)>0)
			{
				foreach($data_akun as $da){
					$datapub["nama_akun"]=$da->username;
					$datapub["jenjang"]=$da->jenjang;
					$jenjang=$da->jenjang;
					$data_jenjang = $this->m_jenjang->listing(" WHERE id='$da->jenjang'");
					if(count($data_jenjang)>0)
					{
						foreach($data_jenjang as $dj)
						{
							$datapub["nama_jenjang"]=$dj->nama;
						}
					}
				}
			}
			$list = $this->m_pembayaran->get_datatables($jenjang);
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->trx_id;
		      $row[] = $l->tanggal;
		      $row[] = "Rp.".number_format($l->price);
		      $row[] = $l->nama;
		      $row[] = $l->email;
		      if($l->status=="")
		      {
				$row[] = "<a href='#' onclick='konfirmManual(".$l->id.")'  class='btn btn-sm btn-success'>Konfirmasi Manual</a>
						<a href='#' class='btn btn-sm btn-danger'>Belum Checkout</a>";	      	
		      }else if($l->status=="pending"){
				  $row[] = "<a href='#' onclick='konfirmManual(".$l->id.")' class='btn btn-sm btn-success'>Konfirmasi Manual</a>
				  		<a href='#' class='btn btn-sm btn-warning'>Pending</a>";	
		      }else if($l->status=="berhasil"){
		      	$row[] = "<a href='#' class='btn btn-sm btn-success'>Berhasil</a>";	
		      }
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_pembayaran->count_all($jenjang),
		     "recordsFiltered" => $this->m_pembayaran->count_filtered($jenjang),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
	}
	public function pengumuman()
	{
		$idakun = $this->session->userdata("id");
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Jenjang"))
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

			$data_akun = $this->m_user->listing(" WHERE id='$idakun'");
			if(count($data_akun)>0)
			{
				foreach($data_akun as $da){
					$datapub["nama_akun"]=$da->username;
					$datapub["jenjang"]=$da->jenjang;
					$jenjang=$da->jenjang;
					$data_jenjang = $this->m_jenjang->listing(" WHERE id='$da->jenjang'");
					if(count($data_jenjang)>0)
					{
						foreach($data_jenjang as $dj)
						{
							$datapub["nama_jenjang"]=$dj->nama;
						}
					}
				}
			}

			$data_kelas = $this->m_kelas->listing();
			$footer = $this->load->view("pubs/footer-admin",$datapub,TRUE);
			$sidebar = $this->load->view("pubs/sidebar-unit",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar",$datapub,TRUE);
			$datapub["kelas"]=$data_kelas;
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;

			$this->load->view("unit/pengumuman",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function data_list_pengumuman()
	{
		$idakun = $this->session->userdata("id");
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Jenjang"))
		{
			$data_akun = $this->m_user->listing(" WHERE id='$idakun'");
			if(count($data_akun)>0)
			{
				foreach($data_akun as $da){
					$datapub["nama_akun"]=$da->username;
					$datapub["jenjang"]=$da->jenjang;
					$jenjang=$da->jenjang;
					$data_jenjang = $this->m_jenjang->listing(" WHERE id='$da->jenjang'");
					if(count($data_jenjang)>0)
					{
						foreach($data_jenjang as $dj)
						{
							$datapub["nama_jenjang"]=$dj->nama;
						}
					}
				}
			}
			$list = $this->m_pengumuman->get_datatables($jenjang);
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
		      $row[] = $l->jalur;
		      $row[] = $l->status_lulus;
		      $row[] = "<div style='text-align: center;'>
		      				<a href='".base_url()."/unit/pengumuman_input/".$l->iduniq."' class='btn btn-warning btn-sm'><span class='fa fa-edit'></span> Input Pengumuman</a>
		      			</div>";
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_pengumuman->count_all($jenjang),
		     "recordsFiltered" => $this->m_pengumuman->count_filtered($jenjang),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
	}
	public function pengumuman_input($id_uniq)
	{
		$idakun = $this->session->userdata("id");
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Jenjang"))
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
			$sidebar = $this->load->view("pubs/sidebar-unit",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar",$datapub,TRUE);
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;
			$datapub["data_santri"]=$data_santri;
			$datapub["id_uniq"]=$id_uniq;
			$datapub["data_pengumunan"]=$data_pengumunan;

			$this->load->view("unit/pengumuman_input",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function pengumuman_simpan()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
		{
			$iduniq = $this->input->post("id_uniq");
			$id_pengumuman = $this->input->post("id_pengumuman");
			$status = $this->input->post("status_lulus");
			$whatsapp = $this->input->post("whatsapp");
			
			$data_sistem = $this->m_konfigurasi->listing();
			foreach ($data_sistem as $db) {
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
					curl_setopt($curl, CURLOPT_URL, "https://ampel.wablas.com/api/send-message");
					curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
					$result = curl_exec($curl);
					curl_close($curl);

				// 	echo "<pre>";
				// 	print_r($result);
			
				
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
	public function kelas()
	{
		$idakun = $this->session->userdata("id");
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Jenjang"))
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
			$sidebar = $this->load->view("pubs/sidebar-unit",$datapub,TRUE);
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
	public function report()
	{
		$idakun = $this->session->userdata("id");
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Jenjang"))
		{
			$data_akun = $this->m_user->listing(" WHERE id='$idakun'");
			if(count($data_akun)>0)
			{
				foreach($data_akun as $da){
					$datapub["nama_akun"]=$da->username;
					$datapub["jenjang"]=$da->jenjang;
					$jenjang=$da->jenjang;
					$data_jenjang = $this->m_jenjang->listing(" WHERE id='$da->jenjang'");
					if(count($data_jenjang)>0)
					{
						foreach($data_jenjang as $dj)
						{
							$datapub["nama_jenjang"]=$dj->nama;
						}
					}
				}
			}
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
			$sidebar = $this->load->view("pubs/sidebar-unit",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar",$datapub,TRUE);
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;

			$this->load->view("unit/report",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function data_list_santri()
	{
		$idakun = $this->session->userdata("id");
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Jenjang"))
		{
			$data_akun = $this->m_user->listing(" WHERE id='$idakun'");
			if(count($data_akun)>0)
			{
				foreach($data_akun as $da){
					$datapub["nama_akun"]=$da->username;
					$datapub["jenjang"]=$da->jenjang;
					$jenjang=$da->jenjang;
					$data_jenjang = $this->m_jenjang->listing(" WHERE id='$da->jenjang'");
					if(count($data_jenjang)>0)
					{
						foreach($data_jenjang as $dj)
						{
							$datapub["nama_jenjang"]=$dj->nama;
						}
					}
				}
			}
			$list = $this->m_siswaunit->get_datatables($jenjang);
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
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_siswaunit->count_all($jenjang),
		     "recordsFiltered" => $this->m_siswaunit->count_filtered($jenjang),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
	}
	public function report_bayar()
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
			$sidebar = $this->load->view("pubs/sidebar-unit",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar",$datapub,TRUE);
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;

			$this->load->view("unit/report_bayar",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function data_report_pembayaran()
	{
		$idakun = $this->session->userdata("id");
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="Jenjang"))
		{
			$data_akun = $this->m_user->listing(" WHERE id='$idakun'");
			if(count($data_akun)>0)
			{
				foreach($data_akun as $da){
					$datapub["nama_akun"]=$da->username;
					$datapub["jenjang"]=$da->jenjang;
					$jenjang=$da->jenjang;
					$data_jenjang = $this->m_jenjang->listing(" WHERE id='$da->jenjang'");
					if(count($data_jenjang)>0)
					{
						foreach($data_jenjang as $dj)
						{
							$datapub["nama_jenjang"]=$dj->nama;
						}
					}
				}
			}
			$list = $this->m_pembayaran->get_datatables_report($jenjang);
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->trx_id;
		      $row[] = $l->tanggal;
		      $row[] = "Rp.".number_format($l->price);
		      $row[] = $l->nama;
		      $row[] = $l->email;
		      $row[] = $l->whatsapp;
		      if($l->status=="")
		      {
		      	$row[] = "Belum Checkout";	      	
		      }else if($l->status=="pending"){
		      	$row[] = "Pending";	
		      }else if($l->status=="berhasil"){
		      	$row[] = "Berhasil";	
		      }
		      $row[] = $l->jenjang;
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_pembayaran->count_all_report($jenjang),
		     "recordsFiltered" => $this->m_pembayaran->count_filtered_report($jenjang),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
	}
	public function report_lulus()
	{
		$idakun = $this->session->userdata("id");
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Jenjang"))
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
			$sidebar = $this->load->view("pubs/sidebar-unit",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar",$datapub,TRUE);
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;

			$this->load->view("unit/report_lulus",$datapub);
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
			$sidebar = $this->load->view("pubs/sidebar-unit",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar",$datapub,TRUE);
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;

			$this->load->view("profil_akun",$datapub);
		}else{
			redirect("home/login");
		}
	}
	public function data_list_lulus()
	{
		$idakun = $this->session->userdata("id");
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Jenjang"))
		{
			$data_akun = $this->m_user->listing(" WHERE id='$idakun'");
			if(count($data_akun)>0)
			{
				foreach($data_akun as $da){
					$datapub["nama_akun"]=$da->username;
					$datapub["jenjang"]=$da->jenjang;
					$jenjang=$da->jenjang;
					$data_jenjang = $this->m_jenjang->listing(" WHERE id='$da->jenjang'");
					if(count($data_jenjang)>0)
					{
						foreach($data_jenjang as $dj)
						{
							$datapub["nama_jenjang"]=$dj->nama;
						}
					}
				}
			}
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
	public function jadwal()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
		{
		    if ($level=="UnitTKIT") {
				$jenjang = "TKIT";
			}elseif ($level=="UnitSDIT") {
				$jenjang = "SDIT";
			}elseif ($level=="UnitSMPIT") {
				$jenjang = "SMPIT";
			}elseif ($level=="UnitSMAIT") {
				$jenjang = "SMAIT";
			}
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

			$footer = $this->load->view("pubs/footer-admin",$datapub,TRUE);
			$sidebar = $this->load->view("pubs/sidebar-unit",$datapub,TRUE);
			$navbar = $this->load->view("pubs/navbar",$datapub,TRUE);
			$datapub["sidebar"]=$sidebar;
			$datapub["navbar"]=$navbar;
			$datapub["footer"]=$footer;
			$datapub["jenjang"]=$jenjang;

			$this->load->view("unit/jadwal",$datapub);
		}else{
			redirect("home/login");
		}
	}
	
	
	public function jadwal_data()
	{
	    $logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
		{
		    
		    if ($level=="UnitTKIT") {
				$jenjang = "TKIT";
			}elseif ($level=="UnitSDIT") {
				$jenjang = "SDIT";
			}elseif ($level=="UnitSMPIT") {
				$jenjang = "SMPIT";
			}elseif ($level=="UnitSMAIT") {
				$jenjang = "SMAIT";
			}
		    $list = $this->m_jadwalujianunit->get_datatables($jenjang);
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->jenjang;
		      $row[] = $l->tanggal;
		      $row[] = $l->kuota;
		      $row[] = $l->kuota-$l->jumlah_peserta;
		      $row[] = "<div style='text-align: center;'>
		      				<a href='".base_url()."unit/jadwal_peserta/".$l->id."' class='btn btn-sm btn-info'><span class='fa fa-eye'></span> Lihat Peserta</a>
		      			    	<button onclick='updateJadwal(".$l->id.")' class='btn btn-warning btn-sm'><span class='fa fa-calendar'></span> Edit Jadwal</button>
		      			    	<button onclick='hapusJadwal(".$l->id.")' class='btn btn-danger btn-sm'><span class='fa fa-trash'></span> Hapus</button>
		      			</div>";
		      $data[] = $row;
		      				// <a href='".base_url()."/backoffice/jadwal_input/".$l->id_uniq."' class='btn btn-warning btn-sm'><span class='fa fa-calendar'></span> Kirim Jadwal</a>

		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_jadwalujianunit->count_all($jenjang),
		     "recordsFiltered" => $this->m_jadwalujianunit->count_filtered($jenjang),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
	}
	public function jadwal_peserta($idjadwal)
	{
	    $logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="UnitTKIT")||($level=="UnitSDIT")||($level=="UnitSMPIT")||($level=="UnitSMAIT"))
		{
		    if ($level=="UnitTKIT") {
				$jenjang = "TKIT";
			}elseif ($level=="UnitSDIT") {
				$jenjang = "SDIT";
			}elseif ($level=="UnitSMPIT") {
				$jenjang = "SMPIT";
			}elseif ($level=="UnitSMAIT") {
				$jenjang = "SMAIT";
			}
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

			$footer = $this->load->view("pubs/footer-admin",$datapub,TRUE);
			$sidebar = $this->load->view("pubs/sidebar-unit",$datapub,TRUE);
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

}