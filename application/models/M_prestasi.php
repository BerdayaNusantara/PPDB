<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_prestasi extends CI_Model{

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    var $table = 'siswa_prestasi';
	var $column_order = array(null, 'id');
	var $column_search = array('prestasi');
	var $order = array('id'=>'asc');

	public function listing($where='')
	{
        $data = $this->db->query("SELECT *, (SELECT nisn FROM siswa WHERE id_uniq=siswa_prestasi.iduniq) AS nisn FROM siswa_prestasi ".$where);
        return $data->result();

	}
	private function _get_datatables_query($where)
    {
    	$this->db->from($this->table);
        $this->db->where("iduniq",$where);
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
        $this->db->where("iduniq",$where);
        return $this->db->count_all_results();
    } 
}