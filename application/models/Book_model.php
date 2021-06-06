<?php
class Book_Model extends CI_Model {

	public function AddBookData($data)
	{
		$this->db->insert('tbl_book',$data);
	}
    public function getBookData()
	{
		$this->db->select('*');
		$this->db->from('tbl_book');
		$this->db->order_by('bid','desc');
		$qresult = $this->db->get();
		$result = $qresult->result();
		return $result;

	}
		public function getBookById($bid) {

		$this->db->select('*');
		$this->db->from('tbl_book');
		$this->db->where('bid',$bid);
		$qresult = $this->db->get();
		$result = $qresult->row();
		return $result;
	}
	public function UpdateBookData($data) {
		$this->db->set('book',$data['book']);
		$this->db->set('department',$data['department']);
		$this->db->set('author',$data['author']);
		$this->db->set('totalbook',$data['totalbook']);
		
		$this->db->where('bid',$data['bid']);
		$this->db->update('tbl_book');
	}

	public function deleteBookById($bid){
		$this->db->where('bid',$bid);
		$this->db->delete('tbl_book');
	}




}	?>