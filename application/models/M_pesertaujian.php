<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_pesertaujian extends CI_Model{

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    var $table = 'v_ujiansiswa';
	var $column_order = array(null, 'tanggal_ujian','kode', 'nama');
	var $column_search = array('nama','kode');
	var $order = array('id'=>'asc');

    public function listing($where)
    {
        $data = $this->db->query("SELECT * FROM v_ujiansiswa ".$where);
        return $data->result();
    }

	private function _get_datatables_query($idjadwal)
    {
    	$this->db->from($this->table);
    	$this->db->where("idjadwal",$idjadwal);
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

 	function get_datatables($idjadwal)
    {
        $this->_get_datatables_query($idjadwal);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered($idjadwal)
    {
        $this->_get_datatables_query($idjadwal);
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all($idjadwal)
    {
        $this->db->from($this->table);
    	$this->db->where("idjadwal",$idjadwal);
        return $this->db->count_all_results();
    } 
}