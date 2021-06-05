<?php
class Department_Model extends CI_Model {

	public function AddDepartmentData($data)
	{
		$this->db->insert('tbl_department',$data);
	}
    public function getDepartmentData()
	{
		$this->db->select('*');
		$this->db->from('tbl_department');
		$this->db->order_by('did','desc');
		$qresult = $this->db->get();
		$result = $qresult->result();
		return $result;

	}
		public function getDepartmentById($did) {

		$this->db->select('*');
		$this->db->from('tbl_department');
		$this->db->where('did',$did);
		$qresult = $this->db->get();
		$result = $qresult->row();
		return $result;
	}
	public function UpdateDepartmentData($data) {

		$this->db->set('department',$data['department']);
		$this->db->where('did',$data['did']);
		$this->db->update('tbl_department');
	}

	public function deleteDepartmentById($did){
		$this->db->where('did',$did);
		$this->db->delete('tbl_department');
	}
	public function getDepartment($depId){
		$this->db->select('*');
		$this->db->from('tbl_department');
		$this->db->where('did',$depId);
		$qresult = $this->db->get();
		$result = $qresult->row();
		return $result;
		
	}





}	?>