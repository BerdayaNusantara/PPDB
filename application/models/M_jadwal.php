<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_jadwal extends CI_Model{

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    var $table = 'jadwal_ujian';
    var $column_order = array(null, 'id');
    var $column_search = array('tanggal','keterangan');
    var $order = array('id'=>'asc');

    public function openppdb($where ='')
    {
        $data = $this->db->query("SELECT 
        tgl_buka,
        tgl_tutup,
        (CASE 
        WHEN now() between tgl_buka and tgl_tutup THEN 'Buka'
        WHEN tgl_buka>NOW() THEN 'Belum buka'
        WHEN tgl_tutup<NOW() THEN 'Sudah tutup'
        
        else 'Tutup' end)as status
        
        
        FROM setting_buka sb ");
        return $data->result();
    }
    public function listingopenppdn($where='')
    {
    	$data = $this->db->query("SELECT *, date_format(tgl_buka, '%d/%m/%Y')as tgl_buka_format, date_format(tgl_tutup, '%d/%m/%Y')as tgl_tutup_format FROM setting_buka ".$where);
    	return $data->result();
    }
    public function listing($where="")
	{
		$data = $this->db->query("SELECT * , date_format(tanggal,'%d/%m/%Y') as tanggal FROM siswa_ujian ".$where);
        return $data->result();
	}
    private function _get_datatables_query()
    {
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