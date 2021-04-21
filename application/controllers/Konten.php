<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class konten extends CI_Controller {

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
		$this->load->model("m_syarat_admin");
		$this->load->model("m_jadwal_daftar");
		$this->load->model("m_alur_daftar");
		$this->load->model("m_biaya");
		$this->load->model("m_keringanan");
    }
    public function data_syarat()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$list = $this->m_syarat_admin->get_datatables();
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->nama;
		      $row[] = "<div style='text-align: center;'>
		      				<button onclick='updateSyarat(".$l->id.")' class='btn btn-warning btn-sm'><span class='fa fa-edit'></span></button>
		      				<button onclick='hapusSyarat(".$l->id.")' class='btn btn-danger btn-sm'><span class='fa fa-trash'></span></button>
		      			</div>";
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_syarat_admin->count_all(),
		     "recordsFiltered" => $this->m_syarat_admin->count_filtered(),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
    }
    public function syarat_simpan()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$id = $this->input->post("id");
			$nama = $this->input->post("nama");
			
            $datainsert["nama"]=$nama;
            
            if($id<>""){
                $where['id']=$id;
                if($this->m_aplikasi->UpdateData('syarat_administrasi',$datainsert,$where)){
                    $input['hasil']=1;
                    $input['pesan']='Data berhasil di update';
                }else{
                    $input['hasil']=0;
                    $input['pesan']='Data gagal di update';
                }
            }else{
                if($this->m_aplikasi->InsertData("syarat_administrasi",$datainsert)){
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
    public function syarat_hapus()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$id=$this->input->post("id");
			
			$where['id']=$id;
			if($this->m_aplikasi->DeleteData("syarat_administrasi",$where)){
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
	public function syarat_detail()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$id=$this->input->post('id');
		    $data_user=$this->m_syarat_admin->listing("WHERE id='$id'");
		    $X = array('hasildata'=>$data_user);               
		    echo json_encode($X);  
		}else{
			redirect("home/login");
		}
	}
    public function data_jadwal()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$list = $this->m_jadwal_daftar->get_datatables();
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->nama;
		      $row[] = $l->tanggal_mulai_format;
		      $row[] = $l->tanggal_selesai_format;
		      $row[] = "<div style='text-align: center;'>
		      				<button onclick='updateJadwal(".$l->id.")' class='btn btn-warning btn-sm'><span class='fa fa-edit'></span></button>
		      				<button onclick='hapusJadwal(".$l->id.")' class='btn btn-danger btn-sm'><span class='fa fa-trash'></span></button>
		      			</div>";
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_jadwal_daftar->count_all(),
		     "recordsFiltered" => $this->m_jadwal_daftar->count_filtered(),
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
		if(($logged=="yes"))
		{
			$id = $this->input->post("id");
			$nama = $this->input->post("nama");
			$tanggal_mulai = $this->input->post("tanggal_mulai");
			$tanggal_selesai = $this->input->post("tanggal_selesai");
			
            $datainsert["nama"]=$nama;
            $datainsert["tanggal_mulai"]=substr($tanggal_mulai, 6,4)."-".substr($tanggal_mulai, 3,2)."-".substr($tanggal_mulai, 0,2);
            $datainsert["tanggal_selesai"]=substr($tanggal_selesai, 6,4)."-".substr($tanggal_selesai, 3,2)."-".substr($tanggal_selesai, 0,2);
            
            if($id<>""){
                $where['id']=$id;
                if($this->m_aplikasi->UpdateData('jadwal_pendaftaran',$datainsert,$where)){
                    $input['hasil']=1;
                    $input['pesan']='Data berhasil di update';
                }else{
                    $input['hasil']=0;
                    $input['pesan']='Data gagal di update';
                }
            }else{
                if($this->m_aplikasi->InsertData("jadwal_pendaftaran",$datainsert)){
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
    public function jadwal_hapus()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$id=$this->input->post("id");
			
			$where['id']=$id;
			if($this->m_aplikasi->DeleteData("jadwal_pendaftaran",$where)){
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
		if(($logged=="yes"))
		{
			$id=$this->input->post('id');
		    $data_user=$this->m_jadwal_daftar->listing("WHERE id='$id'");
		    $X = array('hasildata'=>$data_user);               
		    echo json_encode($X);  
		}else{
			redirect("home/login");
		}
	}
    public function data_alur()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$list = $this->m_alur_daftar->get_datatables();
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->nama;
		      $row[] = $l->tanggal_format;
		      $row[] = $l->keterangan;
		      $row[] = "<div style='text-align: center;'>
		      				<button onclick='updateAlur(".$l->id.")' class='btn btn-warning btn-sm'><span class='fa fa-edit'></span></button>
		      				<button onclick='hapusAlur(".$l->id.")' class='btn btn-danger btn-sm'><span class='fa fa-trash'></span></button>
		      			</div>";
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_alur_daftar->count_all(),
		     "recordsFiltered" => $this->m_alur_daftar->count_filtered(),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
    }
    public function alur_simpan()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$id = $this->input->post("id");
			$nama = $this->input->post("nama");
			$tanggal = $this->input->post("tanggal");
			$keterangan = $this->input->post("keterangan");
			
            $datainsert["nama"]=$nama;
            $datainsert["keterangan"]=$keterangan;
            $datainsert["tanggal"]=substr($tanggal, 6,4)."-".substr($tanggal, 3,2)."-".substr($tanggal, 0,2);

            if($id<>""){
                $where['id']=$id;
                if($this->m_aplikasi->UpdateData('alur_pendaftaran',$datainsert,$where)){
                    $input['hasil']=1;
                    $input['pesan']='Data berhasil di update';
                }else{
                    $input['hasil']=0;
                    $input['pesan']='Data gagal di update';
                }
            }else{
                if($this->m_aplikasi->InsertData("alur_pendaftaran",$datainsert)){
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
    public function alur_hapus()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$id=$this->input->post("id");
			
			$where['id']=$id;
			if($this->m_aplikasi->DeleteData("alur_pendaftaran",$where)){
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
	public function alur_detail()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$id=$this->input->post('id');
		    $data_user=$this->m_alur_daftar->listing("WHERE id='$id'");
		    $X = array('hasildata'=>$data_user);               
		    echo json_encode($X);  
		}else{
			redirect("home/login");
		}
	}
    public function data_biaya()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$list = $this->m_biaya->get_datatables();
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = "Rp. ".number_format($l->biaya);
		      $row[] = $l->keterangan;
		      $row[] = "<div style='text-align: center;'>
		      				<button onclick='updateBiaya(".$l->id.")' class='btn btn-warning btn-sm'><span class='fa fa-edit'></span></button>
		      				<button onclick='hapusBiaya(".$l->id.")' class='btn btn-danger btn-sm'><span class='fa fa-trash'></span></button>
		      			</div>";
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_biaya->count_all(),
		     "recordsFiltered" => $this->m_biaya->count_filtered(),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
    }
    public function biaya_simpan()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$id = $this->input->post("id");
			$biaya = $this->input->post("biaya");
			$keterangan = $this->input->post("keterangan");
			
            $datainsert["keterangan"]=$keterangan;
            $datainsert["biaya"]=$biaya;

            if($id<>""){
                $where['id']=$id;
                if($this->m_aplikasi->UpdateData('biaya_pendidikan',$datainsert,$where)){
                    $input['hasil']=1;
                    $input['pesan']='Data berhasil di update';
                }else{
                    $input['hasil']=0;
                    $input['pesan']='Data gagal di update';
                }
            }else{
                if($this->m_aplikasi->InsertData("biaya_pendidikan",$datainsert)){
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
    public function biaya_hapus()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$id=$this->input->post("id");
			
			$where['id']=$id;
			if($this->m_aplikasi->DeleteData("biaya_pendidikan",$where)){
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
	public function biaya_detail()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$id=$this->input->post('id');
		    $data_user=$this->m_biaya->listing("WHERE id='$id'");
		    $X = array('hasildata'=>$data_user);               
		    echo json_encode($X);  
		}else{
			redirect("home/login");
		}
	}
    public function data_keringanan()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$list = $this->m_keringanan->get_datatables();
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->keterangan;
		      $row[] = "<div style='text-align: center;'>
		      				<button onclick='updateKeringanan(".$l->id.")' class='btn btn-warning btn-sm'><span class='fa fa-edit'></span></button>
		      				<button onclick='hapusKeringanan(".$l->id.")' class='btn btn-danger btn-sm'><span class='fa fa-trash'></span></button>
		      			</div>";
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_keringanan->count_all(),
		     "recordsFiltered" => $this->m_keringanan->count_filtered(),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
    }
    public function keringanan_simpan()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$id = $this->input->post("id");
			$keterangan = $this->input->post("keterangan");
			
            $datainsert["keterangan"]=$keterangan;

            if($id<>""){
                $where['id']=$id;
                if($this->m_aplikasi->UpdateData('keringanan_biaya',$datainsert,$where)){
                    $input['hasil']=1;
                    $input['pesan']='Data berhasil di update';
                }else{
                    $input['hasil']=0;
                    $input['pesan']='Data gagal di update';
                }
            }else{
                if($this->m_aplikasi->InsertData("keringanan_biaya",$datainsert)){
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
    public function keringanan_hapus()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$id=$this->input->post("id");
			
			$where['id']=$id;
			if($this->m_aplikasi->DeleteData("keringanan_biaya",$where)){
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
	public function keringanan_detail()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$id=$this->input->post('id');
		    $data_user=$this->m_keringanan->listing("WHERE id='$id'");
		    $X = array('hasildata'=>$data_user);               
		    echo json_encode($X);  
		}else{
			redirect("home/login");
		}
	}
    public function data_kontak()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$list = $this->m_kontak->get_datatables();
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->nama;
		      $row[] = $l->kontak;
		      $row[] = "<div style='text-align: center;'>
		      				<button onclick='updateKontak(".$l->id.")' class='btn btn-warning btn-sm'><span class='fa fa-edit'></span></button>
		      				<button onclick='hapusKontak(".$l->id.")' class='btn btn-danger btn-sm'><span class='fa fa-trash'></span></button>
		      			</div>";
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_kontak->count_all(),
		     "recordsFiltered" => $this->m_kontak->count_filtered(),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
    }
    public function kontak_simpan()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$id = $this->input->post("id");
			$nama = $this->input->post("nama");
			$kontak = $this->input->post("kontak");
			
            $datainsert["nama"]=$nama;
            $datainsert["kontak"]=$kontak;

            if($id<>""){
                $where['id']=$id;
                if($this->m_aplikasi->UpdateData('kontak_ppdb',$datainsert,$where)){
                    $input['hasil']=1;
                    $input['pesan']='Data berhasil di update';
                }else{
                    $input['hasil']=0;
                    $input['pesan']='Data gagal di update';
                }
            }else{
                if($this->m_aplikasi->InsertData("kontak_ppdb",$datainsert)){
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
    public function kontak_hapus()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$id=$this->input->post("id");
			
			$where['id']=$id;
			if($this->m_aplikasi->DeleteData("kontak_ppdb",$where)){
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
	public function kontak_detail()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$id=$this->input->post('id');
		    $data_user=$this->m_kontak->listing_kontak("WHERE id='$id'");
		    $X = array('hasildata'=>$data_user);               
		    echo json_encode($X);  
		}else{
			redirect("home/login");
		}
	}
}