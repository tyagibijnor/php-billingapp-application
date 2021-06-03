<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {

    public function __construct()
    {
    parent::__construct();
    $this->load->model("student_model");
    $this->load->model("department_model");
    $this->load->model("author_model");
    $this->load->model("book_model");
    $this->load->model("manage_model");
    $data = array();
    }

    public function issuebook(){
    $data['title'] = 'Issue Book';
    $data['header'] 	= $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar'] 	= $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    $data['departmentdata']    = $this->department_model->getDepartmentData();
    $data['content'] = $this->load->view('inc/issuebook', $data , TRUE); // Load Content Part
    $data['footer'] 	= $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.
   }

   public function getBookByDepartmentId($dep){
   	$getAllBookByDep = $this->manage_model->getBookByDep($dep);
   	$output=null;
   	$output .='<option value="0">Select One</option>';
   	foreach ($getAllBookByDep as $book) {
   	$output .='<option value=" '.$book->bid.'">'.$book->book.'</option>';
   			# code...
   	}
   	echo $output; 

   }
    public function addissueform(){
    $data['studentname'] = $this->input->post('studentname');
    $data['registrationnumber'] = $this->input->post('registrationnumber');
    $data['department'] = $this->input->post('department');
    $data['book'] = $this->input->post('book');
    $data['returndate'] = $this->input->post('returndate');
    

    $studentname = $data['studentname'];
    $registrationnumber = $data['registrationnumber'];
    $returndate = $data['returndate'];
   
    if(empty($studentname) || empty($registrationnumber) || empty($returndate)) {
        $sdata=array();
        $sdata['msg'] = '<span style="color:red">Empty Filed not allowed</span>';
        $this->session->set_flashdata($sdata);
        redirect("manage/issuebook");
    }
    else {
        $this->manage_model->AddBookIssueData($data);
        $sdata=array();
        $sdata['msg'] = '<span style="color:green">Data added Succesfully</span>';
        $this->session->set_flashdata($sdata);
        redirect("manage/issuebook");
    }

    }

  public function issuebooklist(){
  	$data['title'] = 'Issue Book List';
    $data['header']     = $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar']    = $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    $data['allissuebookdata']    = $this->manage_model->getAllIssueBookData();
    //$data['allbookdata']    = $this->book_model->getBookData();
    //$data['alldepartmentdata']    = $this->department_model->getDepartmentData();
    $data['content'] = $this->load->view('inc/issuebooklist', $data , TRUE); // Load Content Part
    $data['footer']     = $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.

  }
  public function deleteissuebook($id){
  	$this->manage_model->deleteIssueRecordById($id);
    $sdata = array();
    $sdata['msg'] = '<span style="color:red">Record has deleted Successfully</span>';
    $this->session->set_flashdata($sdata);
    redirect("manage/issuebooklist");

  }

    public function viewstudent($reg){
  	$data['title'] = 'Student Details';
    $data['header']     = $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar']    = $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    $data['studentbyregistration']    = $this->manage_model->getStudentByRegistrationNumber($reg);
    //$data['allbookdata']    = $this->book_model->getBookData();
    $data['alldepartmentdata']    = $this->department_model->getDepartmentData();
    $data['content'] = $this->load->view('inc/viewstudent', $data , TRUE); // Load Content Part
    $data['footer']     = $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.

  }

  public function viewbook($bookId){
    $data['title'] = 'Book Details';
    $data['header']     = $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar']    = $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    $data['getbookdetails']    = $this->book_model->getBookById($bookId);
    //$data['alldepartmentdata']    = $this->department_model->getDepartmentData();
    $data['content'] = $this->load->view('inc/viewbook', $data , TRUE); // Load Content Part
    $data['footer']     = $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.

  }

}

?>