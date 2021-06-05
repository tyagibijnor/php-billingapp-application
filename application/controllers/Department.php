<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

    public function __construct()
    {
    parent::__construct();
    $this->load->model("department_model");
    $data = array();
    }
    public function adddepartment(){
    $data['title'] = 'Add New Department';
    $data['header'] 	= $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar'] 	= $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    $data['content'] = $this->load->view('inc/departmentadd', '' , TRUE); // Load Content Part
    $data['footer'] 	= $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.
   }
   public function adddepartmentform(){
    $data['department'] = $this->input->post('department');
    
    $department = $data['department'];
    if(empty($department)) {
        $sdata=array();
        $sdata['msg'] = '<span style="color:red">Empty Filed not allowed</span>';
        $this->session->set_flashdata($sdata);
        redirect("department/adddepartment");
    }
    else {
        $this->department_model->AddDepartmentData($data);
        $sdata=array();
        $sdata['msg'] = '<span style="color:green">Data added Succesfully</span>';
        $this->session->set_flashdata($sdata);
        redirect("department/adddepartment");
    }
   }

    public function departmentlist(){
    $data['title'] = 'Department List';
    $data['header']     = $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar']    = $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    $data['departmentdata']    = $this->department_model->getDepartmentData();
    $data['content'] = $this->load->view('inc/listdepartment', $data , TRUE); // Load Content Part
    $data['footer']     = $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.
   }
    public function editdepartment($did){
    $data['title'] = 'Edit Department';
    $data['header']     = $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar']    = $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    $data['departmenttById']    = $this->department_model->getDepartmentById($did);
    $data['content'] = $this->load->view('inc/departmentedit', $data , TRUE); // Load Content Part
    $data['footer']     = $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.
   }
   public function updateDepartment(){
    $data['did'] = $this->input->post('did');
    $data['department'] = $this->input->post('department');
    $did = $data['did'];
    $department = $data['department'];
    if(empty($department)) {
        $sdata=array();
        $sdata['msg'] = '<span style="color:red">Empty Filed not allowed</span>';
        $this->session->set_flashdata($sdata);
        redirect("department/editdepartment/".$sid);
    }
    else {
        $this->department_model->UpdateDepartmentData($data);
        $sdata=array();
        $sdata['msg'] = '<span style="color:green">Data Updated Succesfully</span>';
        $this->session->set_flashdata($sdata);
        //redirect("student/editstudent/".$sid);
        redirect("department/departmentlist");
    }

    }

  public function deletedepartment($did)  {
    $this->department_model->deleteDepartmentById($did);
    $sdata = array();
    $sdata['msg'] = '<span style="color:red">Record has deleted Successfully</span>';
    $this->session->set_flashdata($sdata);
    redirect("department/departmentlist");

  }   

}
   ?>