<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jenjang extends CI_Controller {

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
		$this->load->model("m_jenjang");
    }
	public function cek_kuota()
	{
		$jenjang = $this->input->post("jenjang");
		$data_kuota = $this->m_jenjang->listingkuota(" WHERE j.id='$jenjang'");
		if(count($data_kuota)>0){
			foreach ($data_kuota as $dk) {
				$jumdaf = $dk->jumlah;
				$kuota = $dk->kuota;
				$sisa = $dk->sisa;
			}
		}else{
			$sisa="0";
		}
		$input['sisa']=$sisa;
		echo json_encode($input);
	}
    public function data_list()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$list = $this->m_jenjang->get_datatables();
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->nama;
		      $row[] = $l->kuota;
			  $row[] = $l->keterangan;
			  if(!empty($l->logo))
			  {
				$row[] = "<img src='".base_url()."upload/logo/".$l->logo."' width='100'/>";
			  }else{
				$row[] = "<img src='".base_url()."assets/image_def.png' width='100'/>";
			  }
		      $row[] = "<div style='text-align: center;'>
		      				<button onclick='updateJenjang(".$l->id.")' class='btn btn-warning btn-sm'><span class='fa fa-edit'></span></button>
		      				<button onclick='hapusJenjang(".$l->id.")' class='btn btn-danger btn-sm'><span class='fa fa-trash'></span></button>
		      			</div>";
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_jenjang->count_all(),
		     "recordsFiltered" => $this->m_jenjang->count_filtered(),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
    }
    public function data_simpan()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$id = $this->input->post("id");
			$nama = $this->input->post("nama");
			$kuota = $this->input->post("kuota");
			$keterangan = $this->input->post("keterangan");
			
            $datainsert["nama"]=$nama;
			$datainsert["kuota"]=$kuota;
			$datainsert["keterangan"]=$keterangan;
			
			$namastr = "logo_".str_replace(' ', '_', $nama);
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
					if($this->m_aplikasi->UpdateData('jenjang',$datainsert,$where)){
						$input['hasil']=1;
						$input['pesan']='Data berhasil di update';
					}else{
						$input['hasil']=0;
						$input['pesan']='Data gagal di update';
					}
				}else{
					if($this->m_aplikasi->InsertData("jenjang",$datainsert)){
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
					if($this->m_aplikasi->UpdateData('jenjang',$datainsert,$where)){
						$input['hasil']=1;
						$input['pesan']='Data berhasil di update';
					}else{
						$input['hasil']=0;
						$input['pesan']='Data gagal di update';
					}
				}else{
					if($this->m_aplikasi->InsertData("jenjang",$datainsert)){
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
    public function data_hapus()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$id=$this->input->post("id");
			$data_user = $this->m_jenjang->listing("WHERE id='$id'");
			
			$where['id']=$id;
			if($this->m_aplikasi->DeleteData("jenjang",$where)){
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
		if(($logged=="yes"))
		{
			$id=$this->input->post('id');
		    $data_user=$this->m_jenjang->listing("WHERE id='$id'");
		    $X = array('hasildata'=>$data_user);               
		    echo json_encode($X);  
		}else{
			redirect("home/login");
		}
	}
}