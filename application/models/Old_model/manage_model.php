<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('student_model');
		$this->load->model('department_model');
		$this->load->model('author_model');
		$this->load->model('book_model');
		$this->load->model('manage_model');
	}

	public function getBookByDep($dep){

		$this->db->select('*');
		$this->db->from('tbl_book');
		$this->db->where('department',$dep);
		$qresult = $this->db->get();
		$result = $qresult->result();
		return $result;
	}

	public function AddBookIssueData($data){
		$this->db->insert('tbl_issuebook',$data);
	}
	public function getAllIssueBookData(){

		$this->db->select('*');
		$this->db->from('tbl_issuebook');
		$this->db->order_by('id','desc');
		$qresult = $this->db->get();
		$result = $qresult->result();
		return $result;
	}
	public function deleteIssueRecordById($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_issuebook');
	}
	public function getStudentByRegistrationNumber($reg){
		$this->db->select('*');
		$this->db->from('tbl_student');
		$this->db->where('regnumber',$reg);
		$qresult = $this->db->get();
		$result = $qresult->row();
		//print_r($result);
		//die();
		return $result;
	}

}