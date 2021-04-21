<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class alasan extends CI_Controller {

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
			$list = $this->m_alasan->get_datatables();
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->judul;
		      $row[] = $l->deskripsi;
		      $row[] = "<div style='text-align: center;'>
		      				<button onclick='updateAlasan(".$l->id.")' class='btn btn-warning btn-sm'><span class='fa fa-edit'></span></button>
		      				<button onclick='hapusAlasan(".$l->id.")' class='btn btn-danger btn-sm'><span class='fa fa-trash'></span></button>
		      			</div>";
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_alasan->count_all(),
		     "recordsFiltered" => $this->m_alasan->count_filtered(),
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
			$id = $this->input->post("id");
			$judul = $this->input->post("judul");
			$deskripsi = $this->input->post("deskripsi");
			
			$datainsert["judul"]=$judul;
			$datainsert["deskripsi"]=$deskripsi;

			if($id<>""){
				$where['id']=$id;
				if($this->m_aplikasi->UpdateData('alasan',$datainsert,$where)){
					$input['hasil']=1;
		            $input['pesan']='Data berhasil di update';
				}else{
					$input['hasil']=0;
		            $input['pesan']='Data gagal di update';
				}
			}else{
				if($this->m_aplikasi->InsertData("alasan",$datainsert)){
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
			$data_user = $this->m_alasan->listing("WHERE id='$id'");
			$where['id']=$id;
			if($this->m_aplikasi->DeleteData("alasan",$where)){
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
		    $data_user=$this->m_alasan->listing("WHERE id='$id'");
		    $X = array('hasildata'=>$data_user);               
		    echo json_encode($X);  
		}else{
			redirect("home/login");
		}
	}
}