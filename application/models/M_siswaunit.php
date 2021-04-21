<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_siswaunit extends CI_Model{

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    var $table = 'siswa';
	var $column_order = array(null, 'kode','nama', 'whatsapp', 'email');
	var $column_search = array('kode','nama','whatsapp');
	var $order = array('id'=>'asc');
    public function chart_siswa($where="")
    {
        $data = $this->db->query("SELECT count(id) as jumlah, jenjang from siswa GROUP by jenjang ".$where);
        return $data->result();
    }
    public function chart_jenkel($where="")
    {
        $data = $this->db->query("SELECT count(id) as jumlah, jenis_kelamin from siswa ".$where." GROUP by jenis_kelamin ");
        return $data->result();
    }
	public function listing($where="")
	{
		$data = $this->db->query("SELECT * , date_format(tanggal_lahir,'%d/%m/%Y') as tanggal_lahir FROM siswa ".$where);
        return $data->result();
	}
    public function listing_count_all($where="")
    {
        $data = $this->db->query("SELECT count(*) as count_all FROM siswa ".$where);
        return $data->result();
    }

    public function listing_orangtua($where="")
    {
        $data = $this->db->query("SELECT * , date_format(tgl_lhr_ayah,'%d/%m/%Y') as tgl_lhr_ayah, date_format(tgl_lhr_ibu,'%d/%m/%Y') as tgl_lhr_ibu FROM siswa_orangtua ".$where);
        return $data->result();
    }
    public function listing_nilai($where="")
    {
        $data = $this->db->query("SELECT *  FROM siswa_pengumuman ".$where);
        return $data->result();
    }
    public function listing_pembayaran($where="")
    {
        $data = $this->db->query("SELECT * FROM siswa_bayar ".$where);
        return $data->result();
    }
    public function max_siswa($where="")
    {
        $data = $this->db->query("SELECT count(id) as max_id FROM siswa ".$where);
        return $data->result();
    }
    public function listing_dokumen($where="")
    {
        $data = $this->db->query("SELECT *  FROM siswa_dokumen ".$where);
        return $data->result();
    }
	private function _get_datatables_query($where)
    {
    	$this->db->from($this->table);
    	if($where=="SMPIT")
    	{
    	    $where = "jenjang='SMPIT Quran' OR jenjang='SMPIT Akademik'";
    	    $this->db->where($where);
    	}else{
    	    $this->db->where("jenjang",$where);
    	}
        
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

 	function get_datatables($where)
    {
        $this->_get_datatables_query($where);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered($where)
    {
        $this->_get_datatables_query($where);
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all($where)
    {
        $this->db->from($this->table);
        if($where=="SMPIT")
    	{
    	    $where = "jenjang='SMPIT Quran' OR jenjang='SMPIT Akademik'";
    	    $this->db->where($where);
    	}else{
    	    $this->db->where("jenjang",$where);
    	}
        return $this->db->count_all_results();
    } 
}