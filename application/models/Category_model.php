<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_Model extends CI_Model {

	public function AddCategoryData($data)
	{
		$this->db->insert('tbl_category',$data);
	}
	public function getCategoryData()
	{


		$this->db->select('*');
		$this->db->from('tbl_category');
		$this->db->order_by('id','desc');
		$qresult = $this->db->get();
		$result = $qresult->result();
		return $result;

	}
	public function getCategoryById($id) {

		$this->db->select('*');
		$this->db->from('tbl_category');
		$this->db->where('id',$id);
		$qresult = $this->db->get();
		$result = $qresult->row();
		return $result;
	}
	public function UpdateCategoryData($data) {

		$this->db->set('name',$data['name']);
		$this->db->where('id',$data['id']);
		$this->db->update('tbl_category');
	}

	public function deleteCategoryById($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_Category');
	}


}

?> 