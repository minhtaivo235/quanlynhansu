<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nhansu_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insertData($ten, $tuoi, $sdt, $anhavatar, $linkfb, $sodonhang)
	{
		# code...
		$dulieu = array(
			'ten' => $ten ,
			'tuoi' => $tuoi,
			'sdt' => $sdt,
			'anhavatar' => $anhavatar,
			'linkfb' => $linkfb,
			'sodonhang' => $sodonhang 
		);

		$this->db->insert('nhan_vien', $dulieu);
		return $this->db->insert_id();
	}

	// lấy dữ liệu
	public function getAllData()
	{
		# code...
		$this->db->select('*');
		$data = $this->db->get('nhan_vien');
		$data = $data->result_array();
		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		return $data;
	}
	public function getDataById($id)
	{
		# code...
		$this->db->select('*');
		$this->db->order_by('id', 'asc');
		$this->db->where('id', $id);
		
		$dulieu = $this->db->get('nhan_vien');
		$dulieu = $dulieu->result_array();
		// echo "<pre>";
		// var_dump($dulieu);
		return $dulieu;
	}

	public function updateById($id, $ten, $tuoi, $sdt, $anhavatar, $linkfb, $sodonhang)
		{
			$data = array(
				'id' => $id,
				'ten' => $ten,
				'tuoi' => $tuoi,
				'sdt' => $sdt,
				'anhavatar' => $anhavatar,
				'linkfb' => $linkfb,
				'sodonhang' => $sodonhang
			);
			$this->db->where('id', $id);
			return $this->db->update('nhan_vien', $data);
		}

	public function removeById($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('nhan_vien');
	}

}

/* End of file nhansu_model.php */
/* Location: ./application/models/nhansu_model.php */