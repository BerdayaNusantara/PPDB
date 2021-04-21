<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class prestasi extends CI_Controller {

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
		$this->load->model("m_siswa");
		$this->load->model("m_prestasi");
	}

	public function simpan_prestasi()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri")||($level=="Administrator")||($level=="Jenjang"))
		{
			$id = $this->input->post("id");
			$iduniq = $this->session->userdata("iduniq");
			$prestasi = $this->input->post("prestasi");
			$nisn = $this->input->post("nisn");
			
			$where["id"]=$id;
			$datainsert["prestasi"]=$prestasi;
			$datainsert["iduniq"]=$iduniq;
			
			$namastr = "Prestasi_".str_replace(' ', '_', $prestasi);
			$unikimg= date('Ymdhis');
			if (!is_dir('upload/santri/'.$nisn)) {
    		    mkdir('./upload/santri/' . $nisn, 0777, TRUE);
    		}
    		
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
	public function data_list()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri")||($level=="Jenjang"))
		{
		    $id_santri = $this->session->userdata("iduniq");
			$data_santri = $this->m_siswa->listing(" WHERE id_uniq = '$id_santri'");
			foreach($data_santri as $ds){
			    $nisn=$ds->nisn;
			}
			$id = $this->input->post("id");
			$iduniq = $this->session->userdata("iduniq");
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
		      				<button onclick='updateData(".$l->id.")' class='btn btn-warning btn-sm'><span class='fa fa-edit'></span></button>
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
	public function data_detail()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri")||($level=="Administrator")||($level=="Jenjang"))
		{
			$id=$this->input->post('id');
		    $data_user=$this->m_prestasi->listing("WHERE id='$id'");
		    $X = array('hasildata'=>$data_user);               
		    echo json_encode($X);  
		}else{
			redirect("home/login");
		}
	}
	public function data_hapus()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri")||($level=="Administrator")||($level=="Jenjang"))
		{
			$id = $this->input->post("id");
			 $id_santri = $this->session->userdata("iduniq");
			$data_santri = $this->m_siswa->listing(" WHERE id_uniq = '$id_santri'");
			foreach($data_santri as $ds){
			    $nisn=$ds->nisn;
			}
			$data_prestasi=$this->m_prestasi->listing("WHERE id='$id'");
			foreach ($data_prestasi as $dp) {
				if(!empty($dp->file))
				{
					unlink("upload/santri/".$nisn."/".$dp->file);
				}
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
}