<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tax extends CI_Controller {

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
    public function addTax(){
    $data['title'] = 'Add New Tax';
    $data['header'] 	= $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar'] 	= $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    $data['productdata']    = $this->product_model->getProductData();
    $data['unitdata']    = $this->unit_model->getUnitData();
    $data['catdata']    = $this->category_model->getCategoryData();
    $data['taxdata']    = $this->tax_model->getTaxData();
    $data['content'] = $this->load->view('inc/taxadd', $data , TRUE); // Load Content Part
    $data['footer'] 	= $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.
   }
   public function addtaxform(){
    $this->load->library('form_validation');
    $this->form_validation->set_rules('name' , 'Name' , 'trim|required|is_unique[tbl_tax.name]');
    $this->form_validation->set_rules('value' , 'Value' , 'is_numeric|greater_than[0]|required');
    if($this->form_validation->run()==FALSE) {
      $sdata['msg'] = '<span style="color:red">'.validation_errors().'</span>';
      //$sdata['msg'] = validation_errors();
        $this->session->set_flashdata($sdata);
        redirect("tax/addtax");
        
    }
    /* if(validation_errors()) { print_r(validation_errors();); die; } */

    $data['name'] = $this->input->post('name');
    $data['value'] = $this->input->post('value');
    $name = $data['name'];
    $unit = $data['value'];
    if(empty($name) || empty($value)) {
        $sdata=array();
        $sdata['msg'] = '<span style="color:red">Empty Filed not allowed</span>';
        $this->session->set_flashdata($sdata);
        redirect("tax/addtax");
    }
    else {
        $result = $this->tax_model->AddTaxData($data);
        //if($result) { print_r($result);}
        $sdata=array();
        $sdata['msg'] = '<span style="color:green">Data added Succesfully</span>';
        $this->session->set_flashdata($sdata);
        redirect("tax/addtax");
    }

    }
    public function taxlist(){
    $data['title'] = 'Tax List';
    $data['header']     = $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar']    = $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    $data['taxdata']    = $this->tax_model->getTaxData();
    $data['content'] = $this->load->view('inc/listtax', $data , TRUE); // Load Content Part
    $data['footer']     = $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.
   }
    public function editstudent($id){
    $data['title'] = 'Edit Tax';
    $data['header']     = $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar']    = $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    $data['taxById']    = $this->tax_model->getTaxById($id);
    $data['content'] = $this->load->view('inc/taxedit', $data , TRUE); // Load Content Part
    $data['footer']     = $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.
   }
   public function updateTax(){
    $data['id'] = $this->input->post('id');
    $data['name'] = $this->input->post('name');
    $data['value'] = $this->input->post('value');
    
    $id = $data['id'];
    $name = $data['name'];
    $value = $data['value'];
    if(empty($name) || empty($value)) {
        $sdata=array();
        $sdata['msg'] = '<span style="color:red">Empty Filed not allowed</span>';
        $this->session->set_flashdata($sdata);
        redirect("tax/edittax/".$id);
    }
    else {
        $this->tax_model->UpdateTaxData($data);
        $sdata=array();
        $sdata['msg'] = '<span style="color:green">Data Updated Succesfully</span>';
        $this->session->set_flashdata($sdata);
        //redirect("student/editstudent/".$sid);
        redirect("tax/taxlist");
    }

    }

  public function deletetax($id)  {
    $this->tax_model->deleteTaxById($id);
    $sdata = array();
    $sdata['msg'] = '<span style="color:red">Record has deleted Successfully</span>';
    $this->session->set_flashdata($sdata);
    redirect("tax/taxlist");

  }   
}