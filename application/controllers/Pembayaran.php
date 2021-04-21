<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pembayaran extends CI_Controller {

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
		$this->load->model("m_pembayaran");
		$this->load->model("m_historybayar");
	}
	public function data_list()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="Jenjang"))
		{
			$list = $this->m_pembayaran->get_datatables();
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->trx_id;
		      $row[] = $l->jenjang_nama;
		      $row[] = $l->tanggal;
		      $row[] = "Rp.".number_format($l->price);
		      $row[] = $l->nama;
		      $row[] = $l->email;
		      if($l->status=="")
		      {
		      	$row[] = "<a href='#' onclick='konfirmManual(".$l->id.")'  class='btn btn-sm btn-success'>Konfirmasi Manual</a>
		      	<a href='#'class='btn btn-sm btn-danger'>Belum Checkout</a>";	      	
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
		     "recordsTotal" => $this->m_pembayaran->count_all(),
		     "recordsFiltered" => $this->m_pembayaran->count_filtered(),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
	}
	public function data_report()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator")||($level=="Jenjang"))
		{
			$list = $this->m_pembayaran->get_datatables_report();
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
		     "recordsTotal" => $this->m_pembayaran->count_all_report(),
		     "recordsFiltered" => $this->m_pembayaran->count_filtered_report(),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
	}
	public function history_list()
	{
		$logged = $this->session->userdata("logged_in");
		$level = $this->session->userdata("level");
		if(($logged=="yes")&&($level=="Administrator"))
		{
			$idhis = $this->input->post("idhis");
			$list = $this->m_historybayar->get_datatables($idhis);
		    $data = array();
		    $no = $_POST['start'];
		    foreach ($list as $l) {
		      $no++;
		      $row = array();
		      $row[] = $no;
		      $row[] = $l->trx_id;
		      $row[] = $l->tanggal;
		      $row[] = $l->status;
		      $data[] = $row;
		    }
		    $output = array(
		     "draw" => $_POST['draw'],
		     "recordsTotal" => $this->m_historybayar->count_all($idhis),
		     "recordsFiltered" => $this->m_historybayar->count_filtered($idhis),
		     "data" => $data,
		    );
		    echo json_encode($output);
		}else{
			redirect("home/login");
		}
	}
}