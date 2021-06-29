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
        redirect("product-add");
        
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
        redirect("product-add");
    }
    else {
        $result = $this->product_model->AddProductData($data);
        /* if($result) { print_r($result); die;} */
        $sdata=array();
        $sdata['msg'] = '<span style="color:green">Data added Succesfully</span>';
        $this->session->set_flashdata($sdata);
        redirect("product-add");
    }

    }
    public function productlist(){
    $data['title'] = 'Product List';
    $data['header']     = $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar']    = $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    $data['productdata']    = $this->product_model->getProductData();
    $data['content'] = $this->load->view('inc/listproduct', $data , TRUE); // Load Content Part
    $data['footer']     = $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.
   }
    public function editproduct($id){
    $data['title'] = 'Edit Product';
    $data['header']     = $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar']    = $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    //$data['productdata']    = $this->product_model->getProductData();
    $data['unitdata']    = $this->unit_model->getUnitData();
    $data['taxdata']    = $this->tax_model->getTaxData();
    $data['categorydata']    = $this->category_model->getCategoryData();
    $data['productById']    = $this->product_model->getProductById($id);
    $data['content'] = $this->load->view('inc/productedit', $data , TRUE); // Load Content Part
    $data['footer']     = $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.
   }
   public function updateProduct(){
    
    $data['id'] = $this->input->post('id');
    $data['name'] = $this->input->post('name');
    $data['cat'] = $this->input->post('category');
    $data['unit'] = $this->input->post('unit');
    $data['tax'] = $this->input->post('tax');
    $data['rate'] = $this->input->post('rate');

    $id = $data['id'];
    $name = $data['name'];
    $category = $data['cat'];
    $unit = $data['unit'];
    $tax = $data['tax'];
    $rate = $data['rate'];
    if(empty($name) || empty($category) || empty($unit) || empty($tax) || empty($rate)) {
        $sdata=array();
        $sdata['msg'] = '<span style="color:red">Empty Filed not allowed</span>';
        $this->session->set_flashdata($sdata);
        redirect("product/editproduct/".$id);
    }
    else {
        $this->product_model->UpdateProductData($data);
        $sdata=array();
        $sdata['msg'] = '<span style="color:green">Data Updated Succesfully</span>';
        $this->session->set_flashdata($sdata);
        //redirect("student/editstudent/".$sid);
        redirect("product/productlist");
    }

    }

  public function deleteproduct($id)  {
    //$this->db->delete('tbl_product', array('id' => $id));
    $this->product_model->deleteProductById($id);
    /*$sdata = array();
    $sdata['msg'] = '<span style="color:red">Record has deleted Successfully</span>';
    $this->session->set_flashdata($sdata);
    redirect("product/productlist");
 */
  }   
}