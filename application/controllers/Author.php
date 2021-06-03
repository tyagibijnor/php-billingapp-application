<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {

    public function __construct()
    {
    parent::__construct();
    $this->load->model("author_model");
    $data = array();
    }
    public function addauthor(){
    $data['title'] = 'Add New Author';
    $data['header'] 	= $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar'] 	= $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    $data['content'] = $this->load->view('inc/authoradd', '' , TRUE); // Load Content Part
    $data['footer'] 	= $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.
   }
   public function addauthorform(){
    $data['author'] = $this->input->post('author');
    
    $author = $data['author'];
    if(empty($author)) {
        $sdata=array();
        $sdata['msg'] = '<span style="color:red">Empty Filed not allowed</span>';
        $this->session->set_flashdata($sdata);
        redirect("author/addauthor");
    }
    else {
        $this->author_model->AddAuthorData($data);
        $sdata=array();
        $sdata['msg'] = '<span style="color:green">Data added Succesfully</span>';
        $this->session->set_flashdata($sdata);
        redirect("author/addauthor");
    }
   }

    public function authorlist(){
    $data['title'] = 'Author List';
    $data['header']     = $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar']    = $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    $data['authordata']    = $this->author_model->getAuthorData();
    $data['content'] = $this->load->view('inc/listauthor', $data , TRUE); // Load Content Part
    $data['footer']     = $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.
   }
    public function editauthor($aid){
    $data['title'] = 'Edit Author';
    $data['header']     = $this->load->view('inc/header', $data , TRUE); // Load Header Part
    $data['sidebar']    = $this->load->view('inc/sidebar', '' , TRUE);// Load Sidebar Part
    $data['authorById']    = $this->author_model->getAuthorById($aid);
    $data['content'] = $this->load->view('inc/authoredit', $data , TRUE); // Load Content Part
    $data['footer']     = $this->load->view('inc/footer', '' , TRUE); // Load Footer Part
    $this->load->view('home', $data); // Load one page which i create in our main view folder.
   }
   public function updateAuthor(){
    $data['aid'] = $this->input->post('aid');
    $data['author'] = $this->input->post('author');
    $aid = $data['aid'];
    $author = $data['author'];
    if(empty($author)) {
        $sdata=array();
        $sdata['msg'] = '<span style="color:red">Empty Filed not allowed</span>';
        $this->session->set_flashdata($sdata);
        redirect("author/editauthor/".$aid);
    }
    else {
        $this->author_model->UpdateAuthorData($data);
        $sdata=array();
        $sdata['msg'] = '<span style="color:green">Data Updated Succesfully</span>';
        $this->session->set_flashdata($sdata);
        //redirect("student/editstudent/".$sid);
        redirect("author/authorlist");
    }

    }

  public function deleteauthor($aid)  {
    $this->author_model->deleteAuthorById($aid);
    $sdata = array();
    $sdata['msg'] = '<span style="color:red">Record has deleted Successfully</span>';
    $this->session->set_flashdata($sdata);
    redirect("author/authorlist");

  }   

}
   ?>