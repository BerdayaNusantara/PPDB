<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_kelas extends CI_Model{

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    var $table = 'kelas';
	var $column_order = array(null, 'nama');
	var $column_search = array('nama');
	var $order = array('id'=>'asc');

	public function listing($where='')
	{
        $data = $this->db->query("SELECT *, (SELECT nama FROM jenjang WHERE id=kelas.jenjang_id) as jenjang_nama  FROM kelas ".$where);
        return $data->result();

	}
	private function _get_datatables_query()
    {
        $this->db->select("id, nama, jenjang_id, (SELECT nama FROM jenjang WHERE id=kelas.jenjang_id)as jenjang_nama ");
    	$this->db->from($this->table);
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

 	function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    } 
}