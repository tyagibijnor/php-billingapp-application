<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_Model extends CI_Model {

	public function AddStudentData($data)
	{
//			$this->load->model("student_model");

		$this->db->insert('tbl_student',$data);
	}
	public function getStudentData()
	{


		$this->db->select('*');
		$this->db->from('tbl_student');
		$this->db->order_by('sid','desc');
		$qresult = $this->db->get();
		$result = $qresult->result();
		return $result;

	}
	public function getStudentById($sid) {

		$this->db->select('*');
		$this->db->from('tbl_student');
		$this->db->where('sid',$sid);
		$qresult = $this->db->get();
		$result = $qresult->row();
		return $result;
	}
	public function UpdateStudentData($data) {

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