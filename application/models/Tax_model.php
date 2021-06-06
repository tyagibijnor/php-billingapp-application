<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tax_Model extends CI_Model {

	public function AddTaxData($data)
	{
		$this->db->insert('tbl_tax',$data);
	}

    public function getTaxData()
	{
		$this->db->select('*');
		$this->db->from('tbl_tax');
		$this->db->order_by('id','desc');
		$qresult = $this->db->get();
		$result = $qresult->result();
		return $result;

	}
	public function getTaxById($id) {

		$this->db->select('*');
		$this->db->from('tbl_tax');
		$this->db->where('id',$id);
		$qresult = $this->db->get();
		$result = $qresult->row();
		return $result;
	}
	public function UpdateTaxData($data) {

		$this->db->set('studentname',$data['studentname']);
		$this->db->set('department',$data['department']);
		$this->db->set('rollnumber',$data['rollnumber']);
		$this->db->set('regnumber',$data['regnumber']);
		$this->db->set('phone',$data['phone']);
		$this->db->where('sid',$data['sid']);
		$this->db->update('tbl_student');
	}

	public function deleteStudentById($sid){
		$this->db->where('sid',$sid);
		$this->db->delete('tbl_student');
	}


}

?> 