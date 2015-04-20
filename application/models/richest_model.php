<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Richest_model extends CI_Model{
	public function __construct()
	{
		parent::__construct();

	}

	public function save($data)
	{
		$this->db->insert('user',$data);

		return $this->db->insert_id();

	}
	public function share($userid)
	{
		$this->db->where('userid',$userid);
		$result = $this->db->get('user');
		if($result = $result->row_array())
		{
			return $result;
		}
	}

}