<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model {

	public function checkUser($data)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('username',$data['username']);
		$this->db->where('userpassword',md5($data['userpassword']));
		$qresult = $this->db->get();
		$user = $qresult->num_rows();
		if ($user === 1) {
		$result = $qresult->row();
		return $result;
		}		
	}

}