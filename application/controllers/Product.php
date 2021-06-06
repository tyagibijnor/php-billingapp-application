<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct()
    {
    parent::__construct();
    $this->load->model("product_model");
    $this->load->model("category_model");
    $this->load->model("unit_model");
    $this->load->model("tax_model");
    $this->load->library('form_validation');
    $data = array();
    }
    public function addproduct(){
    $data['title'] = 'Add New Product';
    $data['header'] 	= $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar'] 	= $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    $data['productdata']    = $this->product_model->getProductData();
    $data['unitdata']    = $this->unit_model->getUnitData();
    $data['catdata']    = $this->category_model->getCategoryData();
    $data['taxdata']    = $this->tax_model->getTaxData();
    $data['content'] = $this->load->view('inc/productadd', $data , TRUE); // Load Content Part
    $data['footer'] 	= $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.
   }
   public function addproductform(){
    $this->load->library('form_validation');
    $this->form_validation->set_rules('name' , 'Name' , 'trim|required|is_unique[tbl_product.name]');
    $this->form_validation->set_rules('unit' , 'Unit' , 'trim|required');
    $this->form_validation->set_rules('tax' , 'Tax' , 'trim|required');
    $this->form_validation->set_rules('cat' , 'Category' , 'trim|required');
    $this->form_validation->set_rules('rate' , 'Rate' , 'is_numeric|greater_than[0]|required');
    if($this->form_validation->run()==FALSE) {
      $sdata['msg'] = '<span style="color:red">'.validation_errors().'</span>';
      //$sdata['msg'] = validation_errors();
        $this->session->set_flashdata($sdata);
        redirect("product/addproduct");
        
    }
    /* if(validation_errors()) { print_r(validation_errors();); die; } */

    $data['name'] = $this->input->post('name');
    $data['unit'] = $this->input->post('unit');
    $data['tax'] = $this->input->post('tax');
    $data['cat'] = $this->input->post('cat');
    $data['rate'] = $this->input->post('rate');
    $name = $data['name'];
    $unit = $data['unit'];
    $tax = $data['tax'];
    $cat = $data['cat'];
    $rate = $data['rate'];
    if(empty($name)) { // || empty($unit) || empty($tax) || empty($cat) || empty($rate)) {
        $sdata=array();
        $sdata['msg'] = '<span style="color:red">Empty Filed not allowed</span>';
        $this->session->set_flashdata($sdata);
        redirect("product/addproduct");
    }
    else {
        $result = $this->product_model->AddProductData($data);
        if($result) { print_r($result);}
        $sdata=array();
        $sdata['msg'] = '<span style="color:green">Data added Succesfully</span>';
        $this->session->set_flashdata($sdata);
        redirect("product/addproduct");
    }

    }
    public function studentlist(){
    $data['title'] = 'Student List';
    $data['header']     = $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar']    = $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    $data['studentdata']    = $this->student_model->getStudentData();
    $data['content'] = $this->load->view('inc/liststudent', $data , TRUE); // Load Content Part
    $data['footer']     = $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.
   }
    public function editstudent($sid){
    $data['title'] = 'Edit Student';
    $data['header']     = $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar']    = $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    $data['departmentdata']    = $this->department_model->getDepartmentData();
    $data['studentById']    = $this->student_model->getStudentById($sid);
    $data['content'] = $this->load->view('inc/studentedit', $data , TRUE); // Load Content Part
    $data['footer']     = $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.
   }
   public function updateStudent(){
    $data['sid'] = $this->input->post('sid');
    $data['studentname'] = $this->input->post('studentname');
    $data['department'] = $this->input->post('department');
    $data['rollnumber'] = $this->input->post('rollnumber');
    $data['regnumber'] = $this->input->post('regnumber');
    $data['phone'] = $this->input->post('phone');

    $sid = $data['sid'];
    $studentname = $data['studentname'];
    $department = $data['department'];
    $rollnumber = $data['rollnumber'];
    $regnumber = $data['regnumber'];
    $phone = $data['phone'];
    if(empty($studentname) || empty($department) || empty($rollnumber) || empty($regnumber) || empty($phone)) {
        $sdata=array();
        $sdata['msg'] = '<span style="color:red">Empty Filed not allowed</span>';
        $this->session->set_flashdata($sdata);
        redirect("student/editstudent/".$sid);
    }
    else {
        $this->student_model->UpdateStudentData($data);
        $sdata=array();
        $sdata['msg'] = '<span style="color:green">Data Updated Succesfully</span>';
        $this->session->set_flashdata($sdata);
        //redirect("student/editstudent/".$sid);
        redirect("student/studentlist");
    }

    }

  public function deletestudent($sid)  {
    $this->student_model->deleteStudentById($sid);
    $sdata = array();
    $sdata['msg'] = '<span style="color:red">Record has deleted Successfully</span>';
    $this->session->set_flashdata($sdata);
    redirect("student/studentlist");

  }   
}