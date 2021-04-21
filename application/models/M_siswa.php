<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_siswa extends CI_Model{

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    var $table = 'siswa';
	var $column_order = array(null, 'kode','nama');
	var $column_search = array('kode','nama','jenis_kelamin','jenjang','email');
	var $order = array('id'=>'asc');
    public function chart_siswa($where="")
    {
        $data = $this->db->query("SELECT count(id) as jumlah, (SELECT nama FROM jenjang WHERE id=siswa.jenjang)as jenjang from siswa GROUP by jenjang ".$where);
        return $data->result();
    }
    public function chart_jenkel($where="")
    {
        $data = $this->db->query("SELECT count(id) as jumlah, jenis_kelamin from siswa ".$where." GROUP by jenis_kelamin ");
        return $data->result();
    }
	public function listing($where="")
	{
		$data = $this->db->query("SELECT * , (SELECT nama FROM jenjang WHERE id=siswa.jenjang) as jurusan_nama, date_format(tanggal_lahir,'%d/%m/%Y') as tanggal_lahir FROM siswa ".$where);
        return $data->result();
	}
    public function listing_jadwal($where="")
    {
        $data = $this->db->query("SELECT * ,date_format(tanggal,'%d/%m/%Y') as tanggal FROM siswa_ujian ".$where);
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
        $data = $this->db->query("SELECT max(id) as max_id FROM siswa ".$where);
        return $data->result();
    }
    public function listing_dokumen($where="")
    {
        $data = $this->db->query("SELECT *  FROM siswa_dokumen ".$where);
        return $data->result();
    }
	private function _get_datatables_query()
    {
        $this->db->select("*, (SELECT nama FROM jenjang WHERE id=siswa.jenjang) as jenjang_nama");
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

    private function _get_datatables_query_filter()
    {
        $jenjang = $this->input->post("jenjang");
        $this->db->select("*, (SELECT nama FROM jenjang WHERE id=siswa.jenjang) as jenjang_nama");
    	$this->db->from($this->table);
        $this->db->where("jenjang",$jenjang);
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
    public function get_datatables_filter()
    {
        $this->_get_datatables_query_filter();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_filter()
    {
        $this->_get_datatables_query_filter();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all_filter()
    {
        $jenjang = $this->input->post("jenjang");
        $this->db->from($this->table);
        $this->db->where("jenjang",$jenjang);
        return $this->db->count_all_results();
    } 

    public function _get_datatables_query_kelas()
    {
        // $kelas = $this->input->post("kelas");
        $this->db->select("siswa.id,
        id_uniq ,
        kode,
        siswa.nama ,
        jenis_kelamin ,
        whatsapp ,
        email ,
        nisn ,
        nik ,
        no_kk ,
        kode_pos ,
        password ,
        jenjang ,
        tempat_lahir ,
        tanggal_lahir ,
        alamat ,
        sekolah_asal ,
        ukuran_seragam ,
        riwayat_penyakit ,
        hobi ,
        foto ,
        punya_saudara ,
        jenjang_saudara ,
        nama_saudara ,
        tinggi_badan ,
        berat_badan ,
        lingkar_kepala ,
        anak_ke ,
        status_anak ,
        jalur , (SELECT nama FROM jenjang WHERE id=siswa.jenjang) as jenjang_nama, kelas.nama as nama_kelas");
    	$this->db->from($this->table);
        $this->db->join("siswa_kelas","siswa_kelas.siswa_id=siswa.kode");
        $this->db->join("kelas","kelas.id=siswa_kelas.kelas_id");
        // $this->db->where("siswa_kelas.kelas",$kelas);
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
    public function get_datatables_kelas()
    {
        $this->_get_datatables_query_kelas();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_kelas()
    {
        $this->_get_datatables_query_kelas();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_kelas()
    {
        // $kelas = $this->input->post("kelas");
        $this->db->select("*, (SELECT nama FROM jenjang WHERE id=siswa.jenjang) as jenjang_nama");
    	$this->db->from($this->table);
        $this->db->join("siswa_kelas","siswa_kelas.siswa_id=siswa.kode");
        $this->db->join("kelas","kelas.id=siswa_kelas.kelas_id");
        // $this->db->where("siswa_kelas.kelas",$kelas);
        return $this->db->count_all_results();
    }
    
    public function _get_datatables_query_kelas_filter()
    {
        $kelas = $this->input->post("kelas");
        $this->db->select("siswa.id,
        id_uniq ,
        kode,
        siswa.nama ,
        jenis_kelamin ,
        whatsapp ,
        email ,
        nisn ,
        nik ,
        no_kk ,
        kode_pos ,
        password ,
        jenjang ,
        tempat_lahir ,
        tanggal_lahir ,
        alamat ,
        sekolah_asal ,
        ukuran_seragam ,
        riwayat_penyakit ,
        hobi ,
        foto ,
        punya_saudara ,
        jenjang_saudara ,
        nama_saudara ,
        tinggi_badan ,
        berat_badan ,
        lingkar_kepala ,
        anak_ke ,
        status_anak ,
        jalur , (SELECT nama FROM jenjang WHERE id=siswa.jenjang) as jenjang_nama, kelas.nama as nama_kelas");
    	$this->db->from($this->table);
        $this->db->join("siswa_kelas","siswa_kelas.siswa_id=siswa.kode");
        $this->db->join("kelas","kelas.id=siswa_kelas.kelas_id");
        $this->db->where("siswa_kelas.kelas_id",$kelas);
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
    public function get_datatables_kelas_filter()
    {
        $this->_get_datatables_query_kelas_filter();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_kelas_filter()
    {
        $this->_get_datatables_query_kelas_filter();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_kelas_filter()
    {
        $kelas = $this->input->post("kelas");
        $this->db->select("*, (SELECT nama FROM jenjang WHERE id=siswa.jenjang) as jenjang_nama");
    	$this->db->from($this->table);
        $this->db->join("siswa_kelas","siswa_kelas.siswa_id=siswa.kode");
        $this->db->join("kelas","kelas.id=siswa_kelas.kelas_id");
        $this->db->where("siswa_kelas.kelas_id",$kelas);
        return $this->db->count_all_results();
    }
}