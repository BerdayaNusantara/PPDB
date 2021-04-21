<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

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
			$list = $this->m_user->get_datatables();
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->email;
			  $row[] = $l->username;
			  if(substr($l->level,0,7)=="jenjang")
			  {
				$row[] = "Jenjang ";
			  }else{
				$row[] = $l->level;
			  }
		      
		      if(empty($l->foto)){
		      	$row[] = "<img src='".base_url()."/asset/image/image_def.png' width='100'/>";
		      }else{
		      	$row[] = "<img src='".base_url()."/upload/profil/".$l->foto."' width='100'/>";
		      }
		      $row[] = "<div style='text-align: center;'>
		      				<button onclick='updateUser(".$l->id.")' class='btn btn-warning btn-sm'><span class='fa fa-edit'></span></button>
		      				<button onclick='hapusUser(".$l->id.")' class='btn btn-danger btn-sm'><span class='fa fa-trash'></span></button>
		      			</div>";
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_user->count_all(),
		     "recordsFiltered" => $this->m_user->count_filtered(),
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
			$username = $this->input->post("username");
			$email = $this->input->post("email");
			$level = $this->input->post("level");
			$jenjang = $this->input->post("jenjang");
			$password = $this->input->post("password");
			
			$datainsert["username"]=$username;
			$datainsert["email"]=$email;
			$datainsert["level"]=$level;
			$datainsert["jenjang"]=$jenjang;

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
					$dates = date('Ymdhis');
					$datainsert["id_uniq"]=md5($dates);
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
					$dates = date('Ymdhis');
					$datainsert["id_uniq"]=md5($dates);
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
		if(($logged=="yes")&&($level=="Administrator"))
		{
			$imageUser="";
			$id=$this->input->post("id");
			$data_user = $this->m_user->listing("WHERE id='$id'");
			foreach ($data_user as $du) {
				$imageUser = $du->foto;
			}
			if($imageUser!="")
			{
				unlink("./upload/profil/".$imageUser);
			}
			$where['id']=$id;
			if($this->m_aplikasi->DeleteData("user",$where)){
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
}