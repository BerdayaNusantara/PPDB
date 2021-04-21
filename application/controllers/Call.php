<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class call extends CI_Controller {

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
	}
	public function data_list()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator"))
		{
			$list = $this->m_call->get_datatables();
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->kontak;
		      $row[] = "<div style='text-align: center;'>
		      				<button onclick='updateKontak(".$l->id.")' class='btn btn-warning btn-sm'><span class='fa fa-edit'></span></button>
		      				<button onclick='hapusKontak(".$l->id.")' class='btn btn-danger btn-sm'><span class='fa fa-trash'></span></button>
		      			</div>";
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_call->count_all(),
		     "recordsFiltered" => $this->m_call->count_filtered(),
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
		if(($logged=="yes")&&($level=="Administrator"))
		{
			$id = $this->input->post("id_call");
			$kontak = $this->input->post("kontak");
			
			$datainsert["kontak"]=$kontak;

			if($id<>""){
				$where['id']=$id;
				if($this->m_aplikasi->UpdateData('ppdb_call',$datainsert,$where)){
					$input['hasil']=1;
		            $input['pesan']='Data berhasil di update';
				}else{
					$input['hasil']=0;
		            $input['pesan']='Data gagal di update';
				}
			}else{
				if($this->m_aplikasi->InsertData("ppdb_call",$datainsert)){
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
		if(($logged=="yes")&&($level=="Administrator"))
		{
			$imageUser="";
			$id=$this->input->post("id");
			$data_user = $this->m_call->listing("WHERE id='$id'");
			$where['id']=$id;
			if($this->m_aplikasi->DeleteData("ppdb_call",$where)){
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
			$id=$this->input->post('id_call');
		    $data_user=$this->m_call->listing("WHERE id='$id'");
		    $X = array('hasildata'=>$data_user);               
		    echo json_encode($X);  
		}else{
			redirect("home/login");
		}
	}
}