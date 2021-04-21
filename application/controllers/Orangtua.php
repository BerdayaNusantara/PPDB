<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class orangtua extends CI_Controller {

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

	public function simpan_data()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri"))
		{
			$id = $this->input->post("id");
			$iduniq = $this->session->userdata("iduniq");
			$nik_ayah = $this->input->post("nik_ayah");
			$nama_ayah = $this->input->post("nama_ayah");
			$tmp_lhr_ayah = $this->input->post("tmp_lhr_ayah");
			$tgl_lhr_ayah = $this->input->post("tgl_lhr_ayah");
			$pend_ayah = $this->input->post("pend_ayah");
			$pkjn_ayah = $this->input->post("pkjn_ayah");
			$pekerjaan_ayah_lainnya = $this->input->post("pekerjaan_ayah_lainnya");
			$nomor_ayah = $this->input->post("nomor_ayah");
			$penghasilan_ayah = $this->input->post("penghasilan_ayah");
			$nik_ibu = $this->input->post("nik_ibu");
			$nama_ibu = $this->input->post("nama_ibu");
			$tmp_lhr_ibu = $this->input->post("tmp_lhr_ibu");
			$tgl_lhr_ibu = $this->input->post("tgl_lhr_ibu");
			$pend_ibu = $this->input->post("pend_ibu");
			$pkjn_ibu = $this->input->post("pkjn_ibu");
			$pekerjaan_ibu_lainnya = $this->input->post("pekerjaan_ibu_lainnya");
			$nomor_ibu = $this->input->post("nomor_ibu");
			$penghasilan_ibu = $this->input->post("penghasilan_ibu");

			
			$where["id"]=$id;
			$datainsert["iduniq"]=$iduniq;
			$datainsert["nama_ayah"]=$nama_ayah;
			$datainsert["pend_ayah"]=$pend_ayah;
			$datainsert["pekerjaan_ayah"]=$pkjn_ayah;
			$datainsert["pekerjaan_ayah_lain"]=$pekerjaan_ayah_lainnya;
			$datainsert["nik_ayah"]=$nik_ayah;
			$datainsert["tmp_lhr_ayah"]=$tmp_lhr_ayah;
			$datainsert["tgl_lhr_ayah"]=substr($tgl_lhr_ayah, 6,4)."-".substr($tgl_lhr_ayah, 3,2)."-".substr($tgl_lhr_ayah, 0,2);
			$datainsert["nomor_ayah"]=$nomor_ayah;
			$datainsert["penghasilan_ayah"]=$penghasilan_ayah;
			$datainsert["nama_ibu"]=$nama_ibu;
			$datainsert["pend_ibu"]=$pend_ibu;
			$datainsert["pekerjaan_ibu"]=$pkjn_ibu;
			$datainsert["pekerjaan_ibu_lain"]=$pekerjaan_ibu_lainnya;
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
	public function data_detail()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Santri")||($level=="Administrator"))
		{
			$iduniq = $this->session->userdata("iduniq");
		    $data_user=$this->m_siswa->listing_orangtua("WHERE iduniq='$iduniq'");
		    $X = array('hasildata'=>$data_user);               
		    echo json_encode($X);  
		}else{
			redirect("home/login");
		}
	}
}