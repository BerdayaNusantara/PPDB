<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kelas extends CI_Controller {

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
		$this->load->model("m_kelas");
    }
	
    public function data_list()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$list = $this->m_kelas->get_datatables();
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->nama;
		      $row[] = $l->jenjang_nama;
		      $row[] = "<div style='text-align: center;'>
		      				<button onclick='updateKelas(".$l->id.")' class='btn btn-warning btn-sm'><span class='fa fa-edit'></span></button>
		      				<button onclick='hapusKelas(".$l->id.")' class='btn btn-danger btn-sm'><span class='fa fa-trash'></span></button>
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
			$jenjang = $this->input->post("jenjang");
			
            $datainsert["nama"]=$nama;
			$datainsert["jenjang_id"]=$jenjang;

			if($id<>""){
                $where['id']=$id;
                if($this->m_aplikasi->UpdateData('kelas',$datainsert,$where)){
                    $input['hasil']=1;
                    $input['pesan']='Data berhasil di update';
                }else{
                    $input['hasil']=0;
                    $input['pesan']='Data gagal di update';
                }
            }else{
                if($this->m_aplikasi->InsertData("kelas",$datainsert)){
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
    public function data_hapus()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes"))
		{
			$id=$this->input->post("id");
			
			$where['id']=$id;
			if($this->m_aplikasi->DeleteData("kelas",$where)){
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
		    $data_user=$this->m_kelas->listing("WHERE id='$id'");
		    $X = array('hasildata'=>$data_user);               
		    echo json_encode($X);  
		}else{
			redirect("home/login");
		}
	}
}