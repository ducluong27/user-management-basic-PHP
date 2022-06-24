<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nhansu_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insertDataToMysql($ten,$tuoi,$sdt,$anhavatar,$linkfb,$sodonhang)
	{
		$dulieu = [
		    'ten' =>$ten,
		    'tuoi' =>$tuoi,
		    'sdt' =>$sdt,
		    'anhavatar' =>$anhavatar,
		    'linkfb' =>$linkfb,
		    'sodonhang' =>$sodonhang 
		];
		$this->db->insert('nhan_vien', $dulieu);
		return $this->db->insert_id();
	}
	public function getAllData()
	{
		$this->db->select('*');
		$this->db->order_by('id', 'asc');
		$dulieu = $this->db->get('nhan_vien');
		$dulieu = $dulieu->result_array();
		return $dulieu;
	}
	public function GetDataByID($key)
	{
		$this->db->select('*');
		$this->db->where('id', $key);
		$dulieu = $this->db->get('nhan_vien');
		$dulieu = $dulieu->result_array();
		// echo '<pre>';
		// var_dump($dulieu);
		return $dulieu;
	}
	public function UpdateByID($id,$ten,$tuoi,$sdt,$anhavatar,$linkfb,$sodonhang)
	{
		$data = [
		    'id' => $id,
		    'ten' => $ten,
		    'tuoi' => $tuoi,
		    'sdt' => $sdt,
		    'anhavatar' => $anhavatar,
		    'linkfb' => $linkfb,
		    'sodonhang' => $sodonhang
		];
		$this->db->where('id', $id);
		return $this->db->update('nhan_vien', $data);
	}
	public function RemoveDataByID($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('nhan_vien');
	}
}

/* End of file nhansu_model.php */
/* Location: ./application/models/nhansu_model.php */