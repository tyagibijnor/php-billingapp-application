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

		$this->db->set('name',$data['name']);
		$this->db->set('value',$data['value']);
		$this->db->where('id',$data['id']);
		$this->db->update('tbl_tax');
	}

	public function deleteTaxById($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_tax');
	}
	public function getTax($Id){
		$this->db->select('*');
		$this->db->from('tbl_tax');
		$this->db->where('id',$Id);
		$qresult = $this->db->get();
		$result = $qresult->row();
		return $result;
		
	}



}

?> 