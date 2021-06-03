<?php
class Author_Model extends CI_Model {

	public function AddAuthorData($data)
	{
		$this->db->insert('tbl_author',$data);
	}
    public function getAuthorData()
	{
		$this->db->select('*');
		$this->db->from('tbl_author');
		$this->db->order_by('aid','desc');
		$qresult = $this->db->get();
		$result = $qresult->result();
		return $result;

	}
		public function getAuthorById($aid) {

		$this->db->select('*');
		$this->db->from('tbl_author');
		$this->db->where('aid',$aid);
		$qresult = $this->db->get();
		$result = $qresult->row();
		return $result;
	}
	public function UpdateAuthorData($data) {

		$this->db->set('author',$data['author']);
		$this->db->where('aid',$data['aid']);
		$this->db->update('tbl_author');
	}

	public function deleteAuthorById($aid){
		$this->db->where('aid',$aid);
		$this->db->delete('tbl_author');
	}

	public function getAuthor($autId){
		$this->db->select('*');
		$this->db->from('tbl_author');
		$this->db->where('aid',$autId);
		$qresult = $this->db->get();
		$result = $qresult->row();
		return $result;
		
	}


}	?>