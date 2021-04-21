<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_pembayaran extends CI_Model{

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    var $table = 'v_pembayaran2';
	var $column_order = array(null, 'id','status','tanggal');
	var $column_search = array('nama','email','trx_id','status');
	var $order = array('id'=>'desc');

	public function listing($where='')
	{
        $data = $this->db->query("SELECT * FROM siswa_bayar ".$where);
        return $data->result();

	}
    public function listing_jumlah($where='')
    {
        $data = $this->db->query("SELECT SUM(price) as price FROM siswa_bayar ".$where);
        return $data->result();

    }
    public function listing_jumlah_view($where='')
    {
        $data = $this->db->query("SELECT SUM(price) as price FROM v_pembayaran ".$where);
        return $data->result();

    }
	private function _get_datatables_query($where)
    {
        $this->db->select("*, (SELECT nama FROM jenjang WHERE id=v_pembayaran2.jenjang) as jenjang_nama");
    	$this->db->from($this->table);
        $this->db->order_by("id","desc");
        if($where!="")
        {
            $this->db->where("jenjang",$where);
        }
        $this->db->order_by("id","desc");
    	$i=0;
    	foreach ($this->column_search as $item) {
    		if($_POST['search']['value'])
    		{
    			if($i===0)
    			{
    				$this->db->group_start();
    				$this->db->like($item, $_POST['search']['value']);
    			}else{
    				$this->db->or_like($item, $_POST['search']['value']);
    			}

    			if(count($this->column_search) -1 == $i)
    				$this->db->group_end();
    		}
    		$i++;
    	}
    	if(isset($_POST['order']))
    	{
    		$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order)){
        	$order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

 	function get_datatables($where="")
    {
        $this->_get_datatables_query($where);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered($where="")
    {
        $this->_get_datatables_query($where);
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all($where="")
    {
        $this->db->from($this->table);
        if($where!="")
        {
            $this->db->where("jenjang",$where);
        }
        return $this->db->count_all_results();
    } 



    private function _get_datatables_query_report($where)
    {
        $tglawal=$this->input->post("tgl_mulai");
        $tglakhir=$this->input->post("tgl_selesai");
        $tglawaldates = substr($tglawal, 6,4)."-".substr($tglawal, 3,2)."-".substr($tglawal, 0,2);
        $tglakhirdates = substr($tglakhir, 6,4)."-".substr($tglakhir, 3,2)."-".substr($tglakhir, 0,2);
        $this->db->select("*, (SELECT nama FROM jenjang WHERE id=v_pembayaran2.jenjang) as jenjang_nama");
    	$this->db->from($this->table);
        $this->db->where('tanggaldate BETWEEN "'.$tglawaldates.' 00:00:00" and "'.$tglakhirdates.' 12:00:00"');
        if($where!="")
        {
            $this->db->where("jenjang",$where);
        }
        $this->db->order_by("id","desc");
       
    	$i=0;
    	foreach ($this->column_search as $item) {
    		if($_POST['search']['value'])
    		{
    			if($i===0)
    			{
    				$this->db->group_start();
    				$this->db->like($item, $_POST['search']['value']);
    			}else{
    				$this->db->or_like($item, $_POST['search']['value']);
    			}

    			if(count($this->column_search) -1 == $i)
    				$this->db->group_end();
    		}
    		$i++;
    	}
    	if(isset($_POST['order']))
    	{
    		$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order)){
        	$order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

 	function get_datatables_report($where="")
    {
        $this->_get_datatables_query_report($where);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered_report($where="")
    {
        $this->_get_datatables_query_report($where);
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all_report($where="")
    {

        $tglawal=$this->input->post("tgl_mulai");
        $tglakhir=$this->input->post("tgl_selesai");
        $tglawaldates = substr($tglawal, 6,4)."-".substr($tglawal, 3,2)."-".substr($tglawal, 0,2);
        $tglakhirdates = substr($tglakhir, 6,4)."-".substr($tglakhir, 3,2)."-".substr($tglakhir, 0,2);
        $this->db->from($this->table);
        $this->db->where('tanggal BETWEEN "'.$tglawaldates.' 00:00:00" and "'.$tglakhirdates.' 12:00:00"');
        if($where!="")
        {
            $this->db->where("jenjang",$where);
        }
        return $this->db->count_all_results();
    } 
}