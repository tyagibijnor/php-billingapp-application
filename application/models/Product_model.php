<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Model extends CI_Model {

	public function AddProductData($data)
	{
		// $this->db->db_debug = true;
		$this->db->insert('tbl_product',$data);
	}
	public function getProductData()
	{
		$this->db->select('*');
		$this->db->from('tbl_product');
		$this->db->order_by('id','desc');
		$qresult = $this->db->get();
		$result = $qresult->result();
		return $result;
	}
	public function getProductId($id)
	{
 		$this->db->select('*');
		$this->db->from('tbl_product');
		$this->db->where('id',$id);
		$qresult = $this->db->get();
		$result = $qresult->row();
		return $result;
	}
	public function UpdateProductData($data) {

		$this->db->set('name',$data['name']);
		$this->db->set('unit',$data['unit']);
		$this->db->set('rate',$data['rate']);
		$this->db->set('cat',$data['cat']);
		$this->db->set('tax',$data['tax']);
		$this->db->where('sid',$data['id']);
		$this->db->update('tbl_product');
	}

	public function deleteProductById($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_product');
	}

	public function getProduct($Id){
		$this->db->select('*');
		$this->db->from('tbl_product');
		$this->db->where('id',$Id);
		$qresult = $this->db->get();
		$result = $qresult->row();
		return $result;		
	}



}

?> 