<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_Model extends CI_Model {

	public function AddUnitData($data)
	{
		$this->db->insert('tbl_student',$data);
	}

	public function getUnitData()
	{
		$this->db->select('*');
		$this->db->from('tbl_unit');
		$this->db->order_by('id','desc');
		$qresult = $this->db->get();
		$result = $qresult->result();
		return $result;
	}

	public function getUnitById($id) 	{

		$this->db->select('*');
		$this->db->from('tbl_unit');
		$this->db->where('id',$id);
		$qresult = $this->db->get();
		$result = $qresult->row();
		return $result;
	}
	public function UpdateUnitData($data) {

		$this->db->set('name',$data['name']);
		$this->db->where('sid',$data['id']);
		$this->db->update('tbl_data');
	}

	public function deleteUnitById($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_unit');
	}

	public function getUnit($Id){
		$this->db->select('*');
		$this->db->from('tbl_unit');
		$this->db->where('id',$Id);
		$qresult = $this->db->get();
		$result = $qresult->row();
		return $result;
		
	}



}

?> 