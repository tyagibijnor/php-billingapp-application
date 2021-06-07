<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

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
    public function addCategory(){
    $data['title'] = 'Add New Category';
    $data['header'] 	= $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar'] 	= $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    $data['productdata']    = $this->product_model->getProductData();
    $data['unitdata']    = $this->unit_model->getUnitData();
    $data['catdata']    = $this->category_model->getCategoryData();
    $data['taxdata']    = $this->tax_model->getTaxData();
    $data['content'] = $this->load->view('inc/catadd', $data , TRUE); // Load Content Part
    $data['footer'] 	= $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.
   }
   public function addcatform(){
    $this->load->library('form_validation');
    $this->form_validation->set_rules('name' , 'Name' , 'trim|required|is_unique[tbl_category.name]');
    if($this->form_validation->run()==FALSE) {
      $sdata['msg'] = '<span style="color:red">'.validation_errors().'</span>';
      //$sdata['msg'] = validation_errors();
        $this->session->set_flashdata($sdata);
        redirect("category/addcategory");
        
    }
    /* if(validation_errors()) { print_r(validation_errors();); die; } */

    $data['name'] = $this->input->post('name');
    
    $name = $data['name'];
    if(empty($name)) {
        $sdata=array();
        $sdata['msg'] = '<span style="color:red">Empty Filed not allowed</span>';
        $this->session->set_flashdata($sdata);
        redirect("category/addcategory");
    }
    else {
        $result = $this->category_model->AddCategory($data);
        //if($result) { print_r($result);}
        $sdata=array();
        $sdata['msg'] = '<span style="color:green">Data added Succesfully</span>';
        $this->session->set_flashdata($sdata);
        redirect("category/addcategory");
    }

    }
    public function categorylist(){
    $data['title'] = 'Category List';
    $data['header']     = $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar']    = $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    $data['categorydata']    = $this->tax_model->getCategoryData();
    $data['content'] = $this->load->view('inc/listcategory', $data , TRUE); // Load Content Part
    $data['footer']     = $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.
   }
    public function editcategory($id){
    $data['title'] = 'Edit Category';
    $data['header']     = $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar']    = $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    $data['categoryById']    = $this->category_model->getCategoryId($id);
    $data['content'] = $this->load->view('inc/categoryedit', $data , TRUE); // Load Content Part
    $data['footer']     = $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.
   }
   public function updateCategory(){
    $data['id'] = $this->input->post('id');
    $data['name'] = $this->input->post('name');
    
    
    $id = $data['id'];
    $name = $data['name'];
    if(empty($name)) {
        $sdata=array();
        $sdata['msg'] = '<span style="color:red">Empty Filed not allowed</span>';
        $this->session->set_flashdata($sdata);
        redirect("category/editcategory/".$id);
    }
    else {
        $this->tax_model->UpdateCategoryData($data);
        $sdata=array();
        $sdata['msg'] = '<span style="color:green">Data Updated Succesfully</span>';
        $this->session->set_flashdata($sdata);
        //redirect("student/editstudent/".$sid);
        redirect("category/categorylist");
    }

    }

  public function deletecategory($id)  {
    $this->tax_model->deleteCategoryById($id);
    $sdata = array();
    $sdata['msg'] = '<span style="color:red">Record has deleted Successfully</span>';
    $this->session->set_flashdata($sdata);
    redirect("category/categorylist");

  }   
}